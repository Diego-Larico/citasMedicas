<?php
require_once dirname(__DIR__) . "/modelo/Usuario.php";

class UsuarioController {
    public function mostrarUsuarios() {
        $usuarios = Usuario::obtenerUsuarios();
        require_once dirname(__DIR__) . "/vista/home.php";
    }
}

$controller = new UsuarioController();
$controller->mostrarUsuarios();
?>