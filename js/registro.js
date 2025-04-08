function validarContraseñas() {
    const password = document.getElementById('password').value;
    const confirmPassword = document.getElementById('confirm-password').value;

    if (password !== confirmPassword) {
        alert('Las contraseñas no coinciden.');
        return false;
    }
    return true;
}

document.querySelector('form').addEventListener('submit', function (event) {
    event.preventDefault();

    const formData = new FormData(this);

    fetch('../controlador/authController.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            alert('Registro exitoso.');
            window.location.href = '../vista/login.php';
        } else {
            alert(data.message);
        }
    })
    .catch(error => {
        console.error('Error:', error);
        alert('Ocurrió un error al procesar el registro.');
    });
});