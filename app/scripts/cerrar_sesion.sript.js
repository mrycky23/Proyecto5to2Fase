document.getElementById('cerrarSesion-btn').addEventListener('click', function(e) {
    e.preventDefault();
    if (confirm('¿Estás seguro de que quieres cerrar sesión?')) {
        window.location.href = '../../API/controllers/usuarios.controllers.php?action=cerrarSesion';
    }
});