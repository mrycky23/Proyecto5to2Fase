function init() {
  CargaLista();

  $('#btn-guardar').click(function(e) {
      e.preventDefault();

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

  $("#form_conductores").on("submit", (e) => {
    GuardarEditar(e);
  });
}

var GuardarEditar = (e) => {
  e.preventDefault();
  var DatosFormularioConductores = new FormData($("#form_conductores")[0]);
  var accion = "../../controllers/conductores.controllers.php?op=insertar";

  for (var pair of DatosFormularioConductores.entries()) {
    console.log(pair[0] + ", " + pair[1]);
  }

 /* if ($("#id").val() != "") {
    accion = ruta + "Actualizar";
  } else {
    accion = ruta + "Insertar";
  }*/

  $.ajax({
    url: accion,
    type: "post",
    data: DatosFormularioConductores,
    processData: false,
    contentType: false,
    cache: false,
    success: (respuesta) => {
      console.log(respuesta);
      respuesta = JSON.parse(respuesta);
      if (respuesta == "ok") {
        Swal.fire({
          title: "Conductor!",
          text: "Se guardó con éxito",
          icon: "success",
        });
        CargaLista();
        LimpiarCajas();
      } else {
        Swal.fire({
          title: "Conductor!",
          text: "Error al guardar",
          icon: "error",
        });
      }
    },
  });
};

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
          <td>
            <button class='btn btn-primary' onclick='editar(${
              conductores.id
            })'>Editar</button>
            <button class='btn btn-info' onclick='eliminar(${
              conductores.id
            })'>Eliminar</button>
          </td>
        </tr>`;
      });
      $("#ListaConductores").html(html);
    }
  );
};

var eliminar = (id) => {
  // Lógica para eliminar el conductor con el ID proporcionado
};

var editar = (id) => {
  // Lógica para editar el conductor con el ID proporcionado
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
