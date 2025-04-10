// Completar automáticamente el correo si está almacenado en sessionStorage
document.addEventListener('DOMContentLoaded', function () {
    const loginEmail = sessionStorage.getItem('loginEmail');
    if (loginEmail && document.getElementById('correo')) {
        document.getElementById('correo').value = loginEmail;
    }
});

document.addEventListener('DOMContentLoaded', function () {
    const forms = document.querySelectorAll('form');

    forms.forEach(form => {
        form.addEventListener('submit', function (event) {
            event.preventDefault();

            const formData = new FormData(this);
            const action = this.getAttribute('action');

            fetch(action, {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (!data.success) {
                    alert(data.message); // Mostrar el mensaje de error en un modal
                } else if (data.redirect) {
                    window.location.href = data.redirect; // Redirigir al siguiente paso o al login
                } else {
                    window.location.reload(); // Recargar la página si no hay redirección
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Ocurrió un error al procesar la solicitud.');
            });
        });
    });
});