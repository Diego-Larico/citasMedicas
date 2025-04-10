<?php
session_start();

require '../vendor/autoload.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

header('Content-Type: application/json'); // Asegurarse de devolver JSON

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_GET['action'])) {
    $action = $_GET['action'];

    // Acción: Enviar código de recuperación
    if ($action === 'enviar_codigo') {
        $correo = $_POST['correo'];
        $_SESSION['correo'] = $correo;
        $codigo = rand(100000, 999999);
        $expiracion = date('Y-m-d H:i:s', strtotime('+15 minutes'));

        $conexion = new mysqli('localhost', 'root', '', 'citasmedicas');
        if ($conexion->connect_error) {
            echo json_encode(['success' => false, 'message' => 'Error de conexión a la base de datos.']);
            exit;
        }

        $stmt = $conexion->prepare("SELECT email FROM usuario WHERE email = ?");
        $stmt->bind_param('s', $correo);
        $stmt->execute();
        $resultado = $stmt->get_result();

        if ($resultado->num_rows === 0) {
            echo json_encode(['success' => false, 'message' => 'El correo electrónico no está registrado.']);
            exit;
        }

        $stmt = $conexion->prepare("UPDATE usuario SET codigo_verificacion = ?, codigo_verificacion_expira = ? WHERE email = ?");
        $stmt->bind_param('iss', $codigo, $expiracion, $correo);
        if (!$stmt->execute()) {
            echo json_encode(['success' => false, 'message' => 'Error al guardar el código de verificación.']);
            exit;
        }

        $stmt->close();
        $conexion->close();

        $mail = new PHPMailer(true);
        try {
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'diego.larico.09.03@gmail.com';
            $mail->Password = 'vhbj vubm uwno kxwm';
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587;

            $mail->CharSet = 'UTF-8'; // Configurar la codificación de caracteres
            $mail->setFrom('diego.larico.09.03@gmail.com', 'Sistema de Citas Médicas');
            $mail->addAddress($correo);
            $mail->isHTML(true);
            $mail->Subject = 'Código de Recuperación de Contraseña';
            $mail->Body = "<p>Hola,</p>
                           <p>Tu código de recuperación de contraseña es: <strong>$codigo</strong></p>
                           <p>Este código es válido por 15 minutos.</p>
                           <p>Si no solicitaste este código, ignora este mensaje.</p>";

            if ($mail->send()) {
                echo json_encode([
                    'success' => true,
                    'redirect' => '../vista/contrasena.php?step=verificar' // Redirigir al paso de verificación
                ]);
                exit;
            }
        } catch (Exception $e) {
            echo json_encode(['success' => false, 'message' => 'Error al enviar el correo: ' . $mail->ErrorInfo]);
            exit;
        }
    }

    // Acción: Verificar código de recuperación
    if ($action === 'verificar_codigo') {
        $codigoIngresado = $_POST['codigo'];
        $correo = $_SESSION['correo'];

        $conexion = new mysqli('localhost', 'root', '', 'citasmedicas');
        if ($conexion->connect_error) {
            echo json_encode(['success' => false, 'message' => 'Error de conexión a la base de datos.']);
            exit;
        }

        $stmt = $conexion->prepare("SELECT codigo_verificacion, codigo_verificacion_expira FROM usuario WHERE email = ?");
        $stmt->bind_param('s', $correo);
        $stmt->execute();
        $resultado = $stmt->get_result();

        if ($resultado->num_rows === 0) {
            echo json_encode(['success' => false, 'message' => 'No se encontró un código asociado al correo.']);
            exit;
        }

        $fila = $resultado->fetch_assoc();
        $codigoGuardado = $fila['codigo_verificacion'];
        $expiracion = $fila['codigo_verificacion_expira'];

        if ($codigoIngresado != $codigoGuardado) {
            echo json_encode(['success' => false, 'message' => 'El código ingresado es incorrecto.']);
            exit;
        }

        if (strtotime($expiracion) < time()) {
            echo json_encode(['success' => false, 'message' => 'El código ha expirado. Por favor, solicita uno nuevo.']);
            exit;
        }

        // Si el código es correcto, redirigir al paso de nueva contraseña
        echo json_encode([
            'success' => true,
            'redirect' => '../vista/contrasena.php?step=nueva_contrasena'
        ]);
        exit;
    }

    // Acción: Actualizar contraseña
    if ($action === 'actualizar_contrasena') {
        $nuevaContrasena = $_POST['nueva_contrasena'];
        $confirmarContrasena = $_POST['confirmar_contrasena'];
        $correo = $_SESSION['correo'];

        if ($nuevaContrasena !== $confirmarContrasena) {
            echo json_encode(['success' => false, 'message' => 'Las contraseñas no coinciden.']);
            exit;
        }

        $nuevaContrasenaHash = password_hash($nuevaContrasena, PASSWORD_DEFAULT);

        $conexion = new mysqli('localhost', 'root', '', 'citasmedicas');
        if ($conexion->connect_error) {
            echo json_encode(['success' => false, 'message' => 'Error de conexión a la base de datos.']);
            exit;
        }

        $stmt = $conexion->prepare("UPDATE usuario SET password = ? WHERE email = ?");
        $stmt->bind_param('ss', $nuevaContrasenaHash, $correo);
        if ($stmt->execute()) {
            // Redirigir al login después de actualizar la contraseña
            echo json_encode([
                'success' => true,
                'redirect' => '../vista/login.php'
            ]);
            exit;
        } else {
            echo json_encode(['success' => false, 'message' => 'Error al actualizar la contraseña.']);
            exit;
        }
    }
}
?>