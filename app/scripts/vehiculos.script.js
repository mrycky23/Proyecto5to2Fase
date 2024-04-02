function init() {
  CargaLista();
  $('#btn-guardar').click(function(e) {
    e.preventDefault(); // Evita el envío del formulario por defecto

    // Obtener los datos del formulario
    var formData = $('#form-vehiculos').serialize();

    $.ajax({
        url: '../../controllers/vehiculos.controllers.php?op=insertar', 
        type: 'POST',
        data: formData,
        success: function(response) {
            console.log(response);
            ActualizarTabla();
            LimpiarCajas();
        },
        error: function(xhr, status, error) {
            console.error(xhr.responseText);
            console.error(status.responseText);
            console.error(error.responseText);
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
    "../../controllers/vehiculos.controllers.php?op=todos",
    (ListaVehiculos) => {
      console.log(ListaVehiculos);
      ListaVehiculos = JSON.parse(ListaVehiculos);
      $.each(ListaVehiculos, (index, vehiculos) => {
        html += `
        <tr>
          <td>${index + 1}</td>
          <td>${vehiculos.placa}</td>
          <td>${vehiculos.tipo}</td>
          <td>${vehiculos.tonelaje}</td>
          <td>${vehiculos.clase}</td>
          <td>${vehiculos.color}</td>
          <td>${vehiculos.anio}</td> 
          <td>${vehiculos.marca}</td>
          <td>${vehiculos.chasis}</td>
          <td>${vehiculos.motor}</td>
        </tr>`;
      });
      $("#ListaVehiculos").html(html);
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
    $("#placa").val("");
    $("#tipo").val("");
    $("#tonelaje").val("");
    $("#clase").val("");
    $("#color").val("");
    $("#anio").val("");
    $("#marca").val("");
    $("#chasis").val("");
    $("#motor").val("");
  };
  init();