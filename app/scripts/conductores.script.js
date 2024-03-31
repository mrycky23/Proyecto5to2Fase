function init() {
  CargaLista();
// btn-guardar

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
               LimpiarCajas();
               ActualizarTabla();
              
          },
          error: function(xhr, status, error) {
              console.error(xhr.responseText);
          }
      });
  });

}
function ActualizarTabla() {
  // Llamada a la función CargaLista para obtener los nuevos datos
  CargaLista();
}
//Cargar Lista
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
  $("#fechaExpLicencia").val("");
  $("#direccionConductor").val("");
};
init();