// FILTROS DE FONDO
document.addEventListener('DOMContentLoaded', function() {
    const background = document.querySelector('.background-container');
    const buttons = document.querySelectorAll('.circle-btn'); 

    buttons.forEach(button => {
        button.addEventListener('mouseenter', () => {
            background.classList.add('hover-active');
        });
        button.addEventListener('mouseleave', () => {
            background.classList.remove('hover-active');
        });
    });
});