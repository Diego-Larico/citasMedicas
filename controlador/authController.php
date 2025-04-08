<?php
require_once '../modelo/conexion.php';

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre'];
    $usuario = $_POST['usuario'];
    $correo = $_POST['correo'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirm-password'];

    // VERIFICACION DE CONTRASEÑAS
    if ($password !== $confirmPassword) {
        echo json_encode(['success' => false, 'message' => 'Las contraseñas no coinciden.']);
        exit;
    }

    try {
        $conexion = Conexion::conectar();

        // VERIFICACION DE CORREO
        $sqlCorreo = "SELECT * FROM usuario WHERE email = :correo";
        $stmtCorreo = $conexion->prepare($sqlCorreo);
        $stmtCorreo->bindParam(':correo', $correo);
        $stmtCorreo->execute();

        if ($stmtCorreo->rowCount() > 0) {
            echo json_encode(['success' => false, 'message' => 'El correo ya está registrado.']);
            exit;
        }

        // VERIFICACION DE NOMBRE DE USUARIO
        $sqlUsuario = "SELECT * FROM usuario WHERE usuario = :usuario";
        $stmtUsuario = $conexion->prepare($sqlUsuario);
        $stmtUsuario->bindParam(':usuario', $usuario);
        $stmtUsuario->execute();

        if ($stmtUsuario->rowCount() > 0) {
            echo json_encode(['success' => false, 'message' => 'El nombre de usuario ya está registrado.']);
            exit;
        }

        // ENCRIPTACION DE CONTRASEÑA
        $passwordEncriptada = password_hash($password, PASSWORD_BCRYPT);

        // INSERCION EN LA BASE DE DATOS
        $sql = "INSERT INTO usuario (nombre, usuario, email, password) VALUES (:nombre, :usuario, :correo, :password)";
        $stmt = $conexion->prepare($sql);
        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':usuario', $usuario);
        $stmt->bindParam(':correo', $correo);
        $stmt->bindParam(':password', $passwordEncriptada);

        if ($stmt->execute()) {
            echo json_encode(['success' => true]);
        } else {
            echo json_encode(['success' => false, 'message' => 'Error al registrar. Inténtelo de nuevo.']);
        }
    } catch (PDOException $e) {
        echo json_encode(['success' => false, 'message' => 'Error en la base de datos: ' . $e->getMessage()]);
    }
}
?>