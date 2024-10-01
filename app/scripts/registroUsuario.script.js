$(document).ready(function(){
    cargarRoles();
});

function guardar() {
  $("#btn-guardar").click(function (e) {
  e.preventDefault();
  var formData = $("#form-registroUsuario").serialize();

    $.ajax({
      url: "../../../API/controllers/registroUsuario.controllers.php?op=insertar",
      type: "POST",
      data: formData,
      success: function (response) {
          if (response.success) {
              console.log("Los datos se han guardado correctamente.");
          } else {
              console.error("Ocurrió un error al guardar los datos.");
          }
      },
      error: function (xhr, status, error) {
          console.xhr("Error en la solicitud AJAX:", error);
          console.status("Error en la solicitud AJAX:", error);
          console.error("Error en la solicitud AJAX:", error);
      },
    });
  });
}
function cargarRoles(){
  $.ajax({
    url: '../../../API/controllers/usuarios.controllers.php',
    type: 'GET',
    data: {op: 'cargarRoles'},
    datatype: 'json',
    success: function(response){
      // Limpiar opciones existentes en el select
      $('#rol').empty();
      // Agregar la opción "Seleccionar" por defecto
      $('#rol').append('<option value="">Seleccionar</option>');
      // Iterar sobre los roles obtenidos y agregarlos al select
      $.each(response, function (index, roles) {
        $('#rol').append('<option value="' + roles.id + '">' + roles.rol + '</option>');
      });
    },
    error: function (xhr, status, error){
      console.error('Error al obtener los roles:', error);
    }
    });
}

function cargarVehiculos() {
  // Petición AJAX para obtener los datos de los vehículos desde el controlador
  $.ajax({
      url: '../../../API/controllers/vehiculos.controllers.php',
      type: 'GET',
      data: {
          op: 'todos'
      },
      dataType: 'json',
      success: function (response) {
          // Limpiar opciones existentes en el select
          $('#vehiculo').empty();
          // Agregar la opción "Seleccionar" por defecto
          $('#vehiculo').append('<option value="">Seleccionar</option>');
          // Iterar sobre los vehículos obtenidos y agregarlos al select
          $.each(response, function (index, vehiculo) {
              $('#vehiculo').append('<option value="' + vehiculo.id + '">' + vehiculo.placa + '</option>');
          });
      },
      error: function (xhr, status, error) {
          console.error('Error al obtener los vehículos:', error);
      }
  });
}
function limpiarCajas(){
  $("#nombre").val("");
  $("#apellido").val("");
  $("#correo").val("");
  $("#contrasenia").val("");
  $("#confirmaContrasenia").val("");
}
guardar();
limpiarCajas();
