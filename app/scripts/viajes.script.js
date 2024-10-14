function init() {
  CargaLista();

  $("#btn-guardar").click(function (e) {
    e.preventDefault(); // Evita el envío del formulario por defecto

    /*TODO: Obtener los datos del formulario */
    var formData = $("#form-viajes").serialize();
    var idVehiculo= $("#placa").val();
    var idConductor = $("#conductor").val();

    console.log("ID Vehículo seleccionado: ", idVehiculo);
    console.log("ID Conductor seleccionado: ", idConductor);


    if (!idVehiculo || !idConductor) {
          // Mostrar mensajes de error específicos si faltan datos
          if (!idVehiculo) {
            alert("Por favor, selecciona un vehículo.");
            console.error("El campo idVehiculo está vacío");
          }
          if (!idConductor) {
            alert("Por favor, selecciona un conductor.");
            console.error("El campo idConductor está vacío");
          }
          return; // Detener la ejecución si faltan datos
        }

    /*TODO: insertar registro*/
    $.ajax({
      url: "../../../API/controllers/viajes.controllers.php?op=insertar",
      type: "POST",
      data: formData,
      success: function (response) {
        console.log(response);
        var viajeId = response.idViaje;

      /*TODO: insertar relacion viaje_vehiculo  */
        
        if(viajeId && idVehiculo) {
          $.ajax({
            url: "../../../API/controllers/viajes.controllers.php?op=insertarViajesVehiculo",
            type: "POST",
            data: { idVehiculo: idVehiculo, viajeId: viajeId },
            success: function (vehiculoResponse){
              console.log("Vehiculo asociado:", vehiculoResponse);
            },
            error: function (xhr, status, error) {
              console.error(xhr.responseText);
            },
          })
        } else {
          console.error("El campo vehiculo esta vacio o no definido");
        }
        /*TODO: insertar realacion viaje_conductor  */
        
        if(viajeId && idConductor){
          $.ajax({
            url: "../../../API/controllers/viajes.controllers.php?op=insertarViajesConductor",
            type: "POST",
            data: { idConductor: idConductor, viajeId: viajeId },
            success: function (conductorResponse){
              console.log("Conductor asociado:", conductorResponse);
            },
            error: function (xhr, status, error) {
              console.error(xhr.responseText);
            },
          })
        } else {
          console.error("El campo conductor esta vacio o no definido");
        }

        LimpiarCajas();
        ActualizarTabla();
      },
      error: function (xhr, status, error) {
        console.error(xhr.responseText);
      },
    });


  });
}

function ActualizarTabla() {
  CargaLista();
}
var CargaLista = () => {
  var html = "";
  $.get(
    "../../../API/controllers/viajes.controllers.php?op=todos",
    (ListaViajes) => {
      ListaViajes = JSON.parse(ListaViajes);
      $.each(ListaViajes, (index, viajes) => {
        html += `
          <tr>
            <td>${index + 1}</td>
            <td>${viajes.placa_vehiculo}</td>
            <td>${viajes.nombre_conductor}</td>
            <td>${viajes.fechaInicio}</td>
            <td>${viajes.fechaFin}</td>
            <td>${viajes.lugarPartida}</td>
            <td>${viajes.lugarDestino}</td> 
            <td>${viajes.KmSalida}</td>
            <td>${viajes.KmLlegada}</td>
            <td>${viajes.ordenTrabajo}</td>
            <td>
            <button class='btn btn-warning btn-editar' onclick='editar(${
              viajes.id
            })'>Editar</button>
            <button class='btn btn-info btn-eliminar' onclick='eliminar(${
              viajes.id
            })'>Eliminar</button>
          </td>
          </tr>`;
      });
      $("#ListaViajes").html(html);
    }
  );
};

function cargarPlaca() {
  //TODO: Obtener las placas
  $.ajax({
    url: "../../../API/controllers/vehiculos.controllers.php",
    type: "GET",
    data: {
      op: "placasVehiculos",
    },
    dataType: "json",
    success: function (response) {
      // Limpiar opciones existentes en el select
      $("#placa").empty();
      // Agregar la opción "Seleccionar" por defecto
      $("#placa").append('<option value="">Seleccionar</option>');
      // Iterar sobre los repuestos obtenidos y agregarlos al select
      $.each(response, function (index, placas) {
        $("#placa").append(
          '<option value="' + placas.id + '">' + placas.placa + "</option>"
        );
      });
    },
    error: function (xhr, status, error) {
      console.error("Error al obtener las placas:", error);
    },
  });
}

function cargarConductor() {
  //TODO: obtener los repuestos
  $.ajax({
    url: "../../../API/controllers/conductores.controllers.php?op=nombresConductores",
    type: "GET",
    dataType: "json",
    success: function (response) {
      // Limpiar opciones existentes en el select
      $("#conductor").empty();
      // Agregar la opción "Seleccionar" por defecto
      $("#conductor").append('<option value="">Seleccionar</option>');
      // Iterar sobre los repuestos obtenidos y agregarlos al select
      $.each(response, function (index, conductor) {
        $("#conductor").append(
          '<option value="' +
            conductor.id +
            '">' +
            conductor.nombre +
            "</option>"
        );
      });
    },
    error: function (xhr, status, error) {
      console.error("Error al obtener los nombres del conductor:", error);
    },
  });
}

// Cargar selects
$(document).ready(function () {
  cargarPlaca();
  cargarConductor();
});

var eliminar = (id) => {
  // lógica para eliminar el conductor con el ID proporcionado
};

var editar = (id) => {
  // lógica para editar el conductor con el ID proporcionado
};

var LimpiarCajas = () => {
  $("#res").val("");
  $("#placa").val("");
  $("#conductor").val("");
  $("#fechaPartida").val("");
  $("#fechaLlegada").val("");
  $("#lugarPartida").val("");
  $("#lugarDestino").val("");
  $("#kmInicial").val("");
  $("#kmFinal").val("");
  $("#ordenTrabajo").val("");
  $("#nota").val("");
};
init();
