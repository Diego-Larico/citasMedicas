<?php
class Conexion {
    private static $host = "localhost";
    private static $dbname = "citasMedicas";
    private static $user = "root";
    private static $password = "";

    public static function conectar() { 
        try {
            $conexion = new PDO("mysql:host=" . self::$host . ";dbname=" . self::$dbname, self::$user, self::$password);
            $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $conexion;
        } catch (PDOException $e) {
            die("Error en la conexión: " . $e->getMessage());
        }
    }
}
?>