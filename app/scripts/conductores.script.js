function init() {
  $("#form-conductores").on("submit", (e) => {
    GuardarEditar(e);
  });
}
//Cargar Lista
$(document).ready(() => {
  CargaLista();
});
var CargaLista = () => {
  var html = "";
  $.get(
    "../../controllers/conductores.controllers.php?op=todos",
    (ListaConductores) => {
      console.log(ListaConductores);
      ListaConductores = JSON.parse(ListaConductores);
      $.each(ListaConductores, (index, conductores) => {
        html += `
        <tr>
          <td>${index + 1}</td>
          <td>${conductores.nombre}</td>
          <td>${conductores.apellido}</td>
          <td>${conductores.telefono}</td>
          <td>${conductores.cedula}</td>
          <td>${conductores.tipoLicencia}</td>
          <td>${conductores.fechaExpLicencia}</td> 
          <td>${conductores.direccion}</td>
        </tr>`;
      });
      $("#ListaConductores").html(html);
    }
  );
};

// btn-guardar
$(document).ready(function() {
  $('#btn-guardar').click(function(e) {
      e.preventDefault(); // Evita el envío del formulario por defecto

      // Obtener los datos del formulario
      var formData = $('#form-conductores').serialize();

      $.ajax({
          url: '../../controllers/conductores.controllers.php?op=insertar', 
          type: 'POST',
          data: formData,
          success: function(response) {
              console.log(response);
          },
          error: function(xhr, status, error) {
              console.error(xhr.responseText);
          }
      });
  });
});


var GuardarEditar = (e) => {
  e.preventDefault();
  var DatosFormularioConductores = new FormData($("#form-conductores")[0]);
  var accion = "../../controllers/conductores.controllers.php?op=insertar";

  for (var pair of DatosFormularioConductores.entries()) {
    console.log(pair[0] + ", " + pair[1]);
  }
  $.ajax({
    url: accion,
    type: "post",
    data: DatosFormularioConductores,
    processData: false,
    contentType: false,
    cache: false,
    success: (respuesta) => {
      console.log(respuesta);
      if (respuesta.trim() !== "") {
        try {
          respuesta = JSON.parse(respuesta);
          if (respuesta === "ok") {
            alert("Se guardó con éxito");
            CargaLista();
            LimpiarCajas();
          } else {
            alert("Algo salió mal");
          }
        } catch (error) {
          console.error("Error al analizar la respuesta JSON:", error);
          alert("Error al procesar la respuesta del servidor");
        }
      } else {
        console.error("La respuesta del servidor está vacía");
        alert("La respuesta del servidor está vacía");
      }
    },
  });
};


var eliminar = (id) => {
  // lógica para eliminar el conductor con el ID proporcionado
};

var editar = (id) => {
  // lógica para editar el conductor con el ID proporcionado
};


var LimpiarCajas = () => {
  $("#nombreConductor").val("");
  $("#apellidoConductor").val("");
  $("#telefonoConductor").val("");
  $("#cedulaConductor").val("");
  $("#tipoLicencia").val("");
  $("#vigencia").val("");
  $("#direccionConductor").val("");
};
init();