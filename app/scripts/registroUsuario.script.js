function init() {
  
    $("#btn-guardar").click(function (e) {
      e.preventDefault();
  
      var formData = $("#form-registro").serialize();
  
      $.ajax({
        url: "../../controllers/registroUsuario.controllers.php?op=insertar",
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
            console.error("Error en la solicitud AJAX:", error);
        },
      });
    });
  }