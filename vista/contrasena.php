<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cambiar Contraseña</title>
    <link rel="stylesheet" href="../css/contrasena.css">
</head>
<body>
    <div class="password-reset-container">
        <h2>Cambiar Contraseña</h2>

        <?php
        // Determinar el paso actual
        $step = isset($_GET['step']) ? $_GET['step'] : 'recuperar';

        // Paso 1: Recuperar contraseña (ingresar correo)
        if ($step === 'recuperar') {
        ?>
            <form id="recoveryForm" method="POST" action="../controlador/contrasenaController.php?action=enviar_codigo">
                <div class="form-group">
                    <label for="correo">Correo Electrónico</label>
                    <input type="email" id="correo" name="correo" placeholder="Ingresar email" required>
                </div>
                <button type="submit" class="btn-recovery">Enviar Código</button>
            </form>
        <?php
        }

        // Paso 2: Verificar código
        if ($step === 'verificar') {
        ?>
            <form id="codeForm" method="POST" action="../controlador/contrasenaController.php?action=verificar_codigo">
                <div class="form-group">
                    <label for="codigo">Código de Verificación</label>
                    <input type="text" id="codigo" name="codigo" placeholder="Ingresar código" required>
                </div>
                <button type="submit" class="btn-verify">Verificar</button>
            </form>
        <?php
        }

        // Paso 3: Cambiar contraseña
        if ($step === 'nueva_contrasena') {
            ?>
                <form id="passwordForm" method="POST" action="../controlador/contrasenaController.php?action=actualizar_contrasena">
                    <div class="form-group">
                        <label for="nueva_contrasena">Nueva Contraseña</label>
                        <input type="password" id="nueva_contrasena" name="nueva_contrasena" placeholder="Ingresar nueva contraseña" required>
                    </div>
                    <div class="form-group">
                        <label for="confirmar_contrasena">Confirmar Contraseña</label>
                        <input type="password" id="confirmar_contrasena" name="confirmar_contrasena" placeholder="Confirmar nueva contraseña" required>
                    </div>
                    <button type="submit" class="btn-reset">Restablecer</button>
                </form>
            <?php
        }
        ?>
    </div>
</body>
<script src="../js/contrasena.js"></script>
</html>