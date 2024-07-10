 // Función para cargar la vista mediante AJAX
 function cargarVista(vista) {
    // Realizar una solicitud AJAX para obtener el contenido de la vista
    var xhr = new XMLHttpRequest();
    xhr.open('GET', vista + '.php', true);
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            // Actualizar el contenido del contenedor con la vista cargada
            document.getElementById('contenido').innerHTML = xhr.responseText;
            // Cambiar la URL sin recargar la página
            history.pushState(null, null, vista);
        }
    };
    xhr.send();
}
// Función para manejar el evento popstate y cargar la vista correspondiente
window.onpopstate = function (event) {
 cargarVista(location.pathname.substring(1));
};

// Cargar la vista inicial
cargarVista('mantenimientos/dashboard');                               
   