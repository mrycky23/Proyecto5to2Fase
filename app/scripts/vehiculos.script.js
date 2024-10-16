function init() {
  CargaLista();

  $("#btn-guardar").click(function (e) {
    e.preventDefault();

    var formData = $("#form-vehiculos").serialize();

    $.ajax({
      url: "../../../API/controllers/vehiculos.controllers.php?op=insertar",
      type: "POST",
      data: formData,
      success: function (response) {
        console.log(response);
        ActualizarTabla();
        LimpiarCajas();
      },
      error: function (xhr, status, error) {
        console.error(xhr.responseText);
        console.error(status.responseText);
        console.error(error.responseText);
      },
    });
  });
  $("#form-vehiculos").on("submit", (e) => {
    GuardarEditar(e);
  });
}

function GuardarEditar(e) {
  e.preventDefault();
  var DatosFormularioVehiculos = new FormData($("#form-vehiculos")[0]);
  var accion = "../../../API/controllers/vehiculos.controllers.php?op=insertar";

  for (var pair of DatosFormularioVehiculos.entries()) {
    console.log(pair[0] + ", " + pair[1]);
  }

  $.ajax({
    url: accion,
    type: "post",
    data: DatosFormularioVehiculos,
    processData: false,
    contentType: false,
    cache: false,
    success: (respuesta) => {
      console.log(respuesta);
      respuesta = JSON.parse(respuesta);
      if (respuesta == "ok") {
        Swal.fire({
          title: "Vehiculo!",
          text: "Se guardó con éxito",
          icon: "success",
        });
        CargaLista();
        LimpiarCajas();
      } else {
        Swal.fire({
          title: "Vehiculo!",
          text: "Error al guardar",
          icon: "error",
        });
      }
    },
  });
}

function ActualizarTabla() {
  CargaLista();
}

var CargaLista = () => {
  var html = "";
  $.get(
    "../../../API/controllers/vehiculos.controllers.php?op=todos",
    (ListaVehiculos) => {
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
                  <td>
                      <button class='btn btn-warning btn-editar' data-id='${
                        vehiculos.id
                      }'>Editar</button>
                      <button class='btn btn-info btn-eliminar' data-id='${
                        vehiculos.id
                      }'>Eliminar</button>
                  </td>
              </tr>`;
      });
      $("#ListaVehiculos").html(html);
    }
  );
};

var eliminar = (id) => {
  // Lógica para eliminar el vehículo con el ID proporcionado
  if (confirm("¿Estás seguro de que quieres eliminar este vehiculo?")) {
    $.post(
      "../../../API/controllers/vehiculos.controllers.php?op=eliminar",
      {
        idRepuesto: idRepuesto,
      },
      (resultado) => {
        resultado = JSON.parse(resultado);
        if (resultado === "ok") {
          alert("Vehiculo eliminado correctamente");
          CargaLista();
        } else {
          alert("Error al eliminar el vehiculo");
        }
      }
    );
  }
};

var editar = (id) => {
  // Lógica para editar el vehículo con el ID proporcionado
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
