<?php
require_once dirname(__DIR__) . "/modelo/conexion.php";

class Usuario {
    public static function obtenerUsuarios() {
        $conexion = Conexion::conectar();
        $sql = "SELECT * FROM usuario";
        $stmt = $conexion->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>