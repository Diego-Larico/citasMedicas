document.getElementById('loginForm').addEventListener('submit', function (event) {
    event.preventDefault();

    const formData = new FormData(this);

    fetch('../controlador/loginController.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            window.location.href = '../index.php';
        } else {
            alert(data.message);
        }
    })
    .catch(error => {
        console.error('Error:', error);
        alert('Ocurrió un error al procesar el inicio de sesión.');
    });

    // Guardar el correo ingresado en sessionStorage
    const correo = document.getElementById('correo').value;
    sessionStorage.setItem('loginEmail', correo);
});

// Guardar el correo si el usuario hace clic en "¿Olvidaste tu contraseña?"
document.querySelector('.forgot-password-link a').addEventListener('click', function () {
    const correo = document.getElementById('correo').value;
    sessionStorage.setItem('loginEmail', correo);
});