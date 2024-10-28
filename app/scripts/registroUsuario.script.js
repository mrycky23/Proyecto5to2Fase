$(document).ready(function () {
  console.log("Documento listo"); // Verifica que jQuery funcione
  cargarRoles();
  

  //TODO: Registrar un rol
  $("#btn-ingresarRol").click(function (e){
  e.preventDefault();
  var rol = $("#nuevoRol").val();
  
  if (rol === "") {
    alert("Por favor, selecciona un rol.");
    console.log("El campo rol está vacío");
    return;
  }

  rolExistente(rol, function (existe){
    if(existe) {
      console.log("El rol ya existe");
      return;
    } else {
      $.ajax({
        url: "../../../API/controllers/roles.controllers.php?op=insertar",
        type: "POST",
        data: {
          campoRol: rol
        },
        success: function (response) {
            console.log(response);
            cargarRoles();
            limpiarCajas();
        },
        error: function (xhr, status, error) {
          console.error("Error en la solicitud AJAX:", error);
        },
      });
    }
  });
 });

  //TODO: Registrar un usuario
  $("#btn-guardar").click(function (e) {
    console.log("Botón guardar clickeado");
    e.preventDefault();
    var formData = $("#form-registroUsuario").serialize();
    var idRol = $("#rol").val();
    $.ajax({
      url: "../../../API/controllers/registroUsuario.controllers.php?op=insertar",
      type: "POST",
      data: formData,
      success: function (response) {
        console.log(response);
        var idUsuario = response.idUsuario;
        if(idUsuario && idRol){
          $.ajax({
            url:  "../../../API/controllers/registroUsuario.controllers.php?op=insertarUsuarioRol",
            type: "POST",
            data:{ idUsuario: idUsuario, idRol: idRol},
            success: function (response){
              console.log(response);
            },
            error: function (xhr,status, error) {
              console.error(xhr.reponseText);
            }
          });
        }
      },
      error: function (xhr, status, error) {
        console.xhr("Error en la solicitud AJAX:", xhr);
        console.status("Error en la solicitud AJAX:", status);
        console.error("Error en la solicitud AJAX:", error);
      },
    });
  });
});

//TODO: verificar si el rol ya existe
function rolExistente(rol, callback) {
  $.ajax({
    url: "../../../API/controllers/roles.controllers.php?op=verificarExistencia",
    type: "POST",
    data: {
      campoRol: rol,
    },
    success: function (response) {
      callback(response === "true");
    },
    error: function (xhr, status, error) {
      console.error("Error al verificar la existencia del rol:", error);
      callback(false);
    },
  });
}

function cargarRoles() {
  $.ajax({
    url: "../../../API/controllers/roles.controllers.php",
    type: "GET",
    data: { op: "todos" },
    dataType: "json",
    success: function (response) {
      $("#rol").empty();
      $("#rol").append('<option value="">Seleccionar</option>');
      $.each(response, function (index, roles) {
        $("#rol").append(
          '<option value="' + roles.id + '">' + roles.rol + "</option>"
        );
      });
    },
    error: function (xhr, status, error) {
      console.error("Error al obtener los roles:", xhr);
    },
  });
}

function limpiarCajas() {
  $("#nombre").val("");
  $("#apellido").val("");
  $("#correo").val("");
  $("#contrasenia").val("");
  $("#confirmaContrasenia").val("");
}
limpiarCajas();
