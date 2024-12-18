var datosFormulario;

$(document).ready(function () {
  cargarRepuestos();
  cargarVehiculos();

  $("#btn-ingresarRepuesto").click(function (e) {
    e.preventDefault(); // Evitar el envío del formulario por defecto

    // Obtener los datos del formulario
    var repuesto = $("#campoRepuesto").val();

    // Verificar si el campo está vacío
    if (repuesto === "") {
      console.log("El campo está vacío");
      return; // Detener el proceso si el campo está vacío
    }

    // Verificar si el repuesto ya existe
    repuestoExistente(repuesto, function (existe) {
      if (existe) {
        console.log("El repuesto ya existe");
        return; // Detener el proceso si el repuesto ya existe
      } else {
        $.ajax({
          url: "../../../API/controllers/repuestos.controllers.php?op=insertar",
          type: "POST",
          data: {
            campoRepuesto: repuesto,
          },
          success: function (response) {
            console.log(response);
            cargarRepuestos();
          },
          error: function (xhr, status, error) {
            console.error(xhr.responseText);
          },
        });
      }
    });
  });
  
 //TODO: Regitrar progrmacion
  $("#btn-guardar").click(function (e) {
    e.preventDefault(); // Evitar el envío del formulario por defecto

    // Obtener los valores del formulario
    var nombreMantenimiento = $("#nombreMantenimiento").val();
    var idRepuesto = $("#repuesto").val();
    var idVehiculo = $("#vehiculo").val();
    var frecuencia = $("#frecuencia").val();
    var duracion = $("#duracion").val();
    var nota = $("#nota").val();

    if (!idRepuesto || !idVehiculo) {
      // Mostrar mensajes de error específicos si faltan datos
      if (!idRepuesto) {
        alert("Por favor, selecciona un repuesto.");
        console.error("El campo repuesto está vacío");
      }
      if (!idVehiculo) {
        alert("Por favor, selecciona un vehículo.");
        console.error("El campo vehiculo está vacío");
      }
      return; // Detener la ejecución si faltan datos
    }
    // Determinar los valores para los atributos km, hora, día, mes, año
    var hora = 0, km = 0, dia = 0, mes = 0, anio = 0;
    switch (frecuencia) {
      case "hora":
        hora = duracion;
        break;
      case "kilometraje":
        km = duracion;
        break;
      case "dia":
        dia = duracion;
        break;
      case "mes":
        mes = duracion;
        break;
      case "anio":
        anio = duracion;
        break;
      default:
        break;
    }
    datosFormulario = {
      nombreMantenimiento: nombreMantenimiento,
      idRepuesto: parseInt(idRepuesto, 10),
      idRepuesto: idRepuesto,
      idVehiculo: idVehiculo,
      km: km,
      hora: hora,
      dia: dia,
      mes: mes,
      anio: anio,
      nota: nota,
    };

    //TODO: insertar los datos en programacion
    $.ajax({
      url: "../../../API/controllers/programacion_mantenimientos.controllers.php?op=insertar",
      type: "POST",
      data: datosFormulario,
      success: function (response) {
        console.log("Datos enviados: ", datosFormulario);
        console.log(response);
        var idProgramacion = response.idProgramacion;

        if (idProgramacion && idRepuesto) {
          $.ajax({
            url: "../../../API/controllers/programacion_mantenimientos.controllers.php?op=insertarProgramacionRepuesto",
            type: "POST",
            data: { idProgramacion: idProgramacion, idRepuesto: idRepuesto },
            success: function (response) {
              console.log(response);
            },
            error: function (xhr, status, error) {
              console.error("Error al insertar programacion de repuesto: ", xhr.responseText);
            },
          });
        }

        if (idProgramacion && idVehiculo) {
          $.ajax({
            url: "../../../API/controllers/programacion_mantenimientos.controllers.php?op=insertarProgramacionVehiculo",
            type: "POST",
            data: { idProgramacion: idProgramacion, idVehiculo: idVehiculo },
            success: function (response) {
              console.log(response);
            },
            error: function (xhr, status, error) {
              console.error("Error al insertar programacion de vehiculos: ",xhr.responseText);
            },
          });
        }

        LimpiarCajas();
      },

      error: function (xhr, status, error) {
        console.error("Error al insertar programacion: ",{
          status: status,
          error: error,
          responseText: xhr.responseText,
        }
        );
      },
    });
  });
});

//TODO: actualizar el estado de la programación
function estadoProgramacion(datosFormulario) {
  $.ajax({
    url: "../../../API/controllers/programacion_mantenimientos.controllers.php?op=actualizarEstado",
    type: "POST",
    data: datosFormulario,
    success: function (response) {
      console.log(response);
    },
    error: function (xhr, status, error) {
      console.error(xhr.responseText);
    },
  });
}

//TODO: verificar si el repuesto ya existe
function repuestoExistente(repuesto, callback) {
  $.ajax({
    url: "../../../API/controllers/repuestos.controllers.php?op=verificarExistencia",
    type: "POST",
    data: {
      repuesto: repuesto,
    },
    success: function (response) {
      callback(response === "true");
    },
    error: function (xhr, status, error) {
      console.error("Error al verificar la existencia del repuesto:", error);
      callback(false);
    },
  });
}

function cargarVehiculos() {
  //TODO: obtener los datos de los vehículos desde el controlador
  $.ajax({
    url: "../../../API/controllers/vehiculos.controllers.php",
    type: "GET",
    data: {
      op: "placasVehiculos",
    },
    dataType: "json",
    success: function (response) {
      // Limpiar opciones existentes en el select
      $("#vehiculo").empty();
      // Agregar la opción "Seleccionar" por defecto
      $("#vehiculo").append('<option value="">Seleccionar</option>');
      $.each(response, function (index, vehiculo) {
        $("#vehiculo").append(
          '<option value="' + vehiculo.id + '">' + vehiculo.placa + "</option>"
        );
      });
    },
    error: function (xhr, status, error) {
      console.error("Error al obtener los vehículos:", error);
    },
  });
}

function cargarRepuestos() {
  //TODO: obtener los datos de los repuestos desde el controlador
  $.ajax({
    url: "../../../API/controllers/repuestos.controllers.php",
    type: "GET",
    data: {
      op: "nombresRepuestos",
    },
    dataType: "json",
    success: function (response) {
      // Limpiar opciones existentes en el select
      $("#repuesto").empty();
      // Agregar la opción "Seleccionar" por defecto
      $("#repuesto").append('<option value="">Seleccionar</option>');
      // Iterar sobre los repuestos obtenidos y agregarlos al select
      $.each(response, function (index, repuesto) {
        $("#repuesto").append(
          '<option value="' + repuesto.id + '">' + repuesto.nombre + "</option>"
        );
      });
    },
    error: function (xhr, status, error) {
      console.error("Error al obtener los repuestos:", error);
    },
  });
}

//TODO: limpiar los campos del formulario
var LimpiarCajas = () => {
  $("#nombreMantenimiento").val("");
  $("#campoRepuesto").val("");
  $("#repuesto").val("");
  $("#vehiculo").val("");
  $("#frecuencia").val("");
  $("#duracion").val("");
  $("#nota").val("");
};
