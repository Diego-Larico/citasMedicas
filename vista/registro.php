<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro - Reserva de Citas</title>
    <link rel="stylesheet" href="../css/registro.css">
</head>
<body>
    <div class="registro-container">
        <h2>Registro</h2>
        <form action="../controlador/authController.php" method="POST">
            <div class="registro-group">
                <label for="nombre">Nombre Completo</label>
                <input type="text" id="nombre" name="nombre" placeholder="Ingresar nombre" required>
            </div>
            <div class="registro-group">
                <label for="usuario">Usuario</label>
                <input type="text" id="usuario" name="usuario" placeholder="Ingresar usuario" required>
            </div>
            <div class="registro-group">
                <label for="correo">Correo Electrónico</label>
                <input type="email" id="correo" name="correo" placeholder="Ingresar email" required>
            </div>
            <div class="registro-group">
                <label for="password">Contraseña</label>
                <input type="password" id="password" name="password" placeholder="Ingresar contraseña" required>
            </div>
            <div class="registro-group">
                <label for="confirm-password">Confirmar Contraseña</label>
                <input type="password" id="confirm-password" name="confirm-password" placeholder="Confirmar contraseña" required>
            </div>
            <button type="submit" class="btn-registro">Registrarse</button>
        </form>
    </div>
</body>
</html>
<script src="../js/registro.js"></script>