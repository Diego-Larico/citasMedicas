<?php
require_once '../modelo/conexion.php';

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $correo = $_POST['correo'];
    $password = $_POST['password'];

    try {
        $conexion = Conexion::conectar();

        // VERIFICACION DE CORREO
        $sqlCorreo = "SELECT * FROM usuario WHERE email = :correo";
        $stmtCorreo = $conexion->prepare($sqlCorreo);
        $stmtCorreo->bindParam(':correo', $correo);
        $stmtCorreo->execute();

        if ($stmtCorreo->rowCount() === 0) {
            echo json_encode(['success' => false, 'message' => 'El correo electrónico no está registrado.']);
            exit;
        }

        // VERIFICACION DE CONTRASEÑA
        $usuario = $stmtCorreo->fetch(PDO::FETCH_ASSOC);
        if (!password_verify($password, $usuario['password'])) {
            echo json_encode(['success' => false, 'message' => 'La contraseña es incorrecta.']);
            exit;
        }

        echo json_encode(['success' => true]);
    } catch (PDOException $e) {
        echo json_encode(['success' => false, 'message' => 'Error en la base de datos: ' . $e->getMessage()]);
    }
}
?>