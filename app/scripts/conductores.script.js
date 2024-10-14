function init() {
  CargaLista();
  $("#btn-guardar").click(function (e) {
    e.preventDefault();
    var formData = $("#form-conductores").serialize();
    $.ajax({
      url: "../../../API/controllers/conductores.controllers.php?op=insertar",
      type: "POST",
      data: formData,
      success: function (response) {
        console.log(response);
        LimpiarCajas();
        ActualizarTabla();
      },
      error: function (xhr, status, error) {
        console.error(xhr.responseText);
      },
    });
  });

  $("#form-conductores").on("submit", (e) => {
    GuardarEditar(e);
  });
}

function ActualizarTabla() {
  CargaLista();
}
$(document).ready(function () {
  $("#btn-editar").click(function () {
    $("#contenidoModal").html("Aquí puedes poner tu contenido HTML dinámico");
    $("#miModal").modal("show");
  });
});

var GuardarEditar = (e) => {
  e.preventDefault();
  var DatosFormularioConductores = new FormData($("#form-conductores")[0]);
  var accion =
    "../../../API/controllers/conductores.controllers.php?op=insertar";
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
    "../../../API/controllers/conductores.controllers.php?op=todos",
    (ListaConductores) => {
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
            <button id="btn-editar" class='btn btn-primary' onclick='editar(${
              conductores.id
            })'>Editar</button>
            <button id="btn-eliminar" class='btn btn-info' onclick='eliminar(${
              conductores.id
            })'>Eliminar</button>
          </td>
        </tr>`;
      });
      $("#ListaConductores").html(html);

      // Después de cargar la lista, asignar eventos de clic a los botones de editar y eliminar
      $(".btn-editar").click(function () {
        // Lógica para editar el conductor con el ID proporcionado
      });

      $(".btn-eliminar").click(function () {
        // Lógica para eliminar el conductor con el ID proporcionado
      });
    }
  );
};

var eliminar = (id) => {
  Swal.fire({
    title: "¿Estás seguro?",
    text: "¡No podrás revertir esto!",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Sí, eliminarlo!",
  }).then((result) => {
    if (result.isConfirmed) {
      $.ajax({
        url: "../../../API/controllers/conductores.controllers.php?op=eliminar",
        type: "POST",
        data: {
          id: id,
        },
        success: function (response) {
          console.log(response);
          Swal.fire("Eliminado!", "El conductor ha sido eliminado.", "success");
          CargaLista(); // Actualiza la lista después de eliminar
        },
        error: function (xhr, status, error) {
          console.error(xhr.responseText);
        },
      });
    }
  });
};

var editar = (id) => {
  $.ajax({
    url: "../../../API/controllers/conductores.controllers.php?op=uno",
    type: "POST",
    data: {
      idConductor: id,
    },
    success: function (response) {
      console.log(response); // Verifica la respuesta antes de parsear JSON
        try {
            var data = JSON.parse(response);
            let conductor = JSON.parse(response);
            $("#nombreConductor").val(conductor.nombre);
            $("#apellidoConductor").val(conductor.apellido);
            $("#telefonoConductor").val(conductor.telefono);
            $("#cedulaConductor").val(conductor.cedula);
            $("#tipoLicencia").val(conductor.tipoLicencia);
            $("#fechaExpLicencia").val(conductor.fechaExpLicencia);
            $("#direccionConductor").val(conductor.direccion);
            $("#form-conductores").append(`<input type="hidden" name="idConductor" value="${conductor.id}">`);
            $("#btn-guardar").hide(); // Ocultar el botón de "Guardar"
            $("#btn-actualizar").show(); // Mostrar el botón de "Actualizar"
            $("#miModal").modal("show"); // Abrir el modal para editar
        } catch (error) {
            console.error("Error al analizar JSON:", error);
        }
    },
    error: function (xhr, status, error) {
      console.error(xhr.responseText);
      console.error(status.responseText);
      console.error(error.responseText);
    },
  });
};

$("#btn-actualizar").click(function (e) {
  e.preventDefault();

  var formData = $("#form-conductores").serialize();

  $.ajax({
    url: "../../../API/controllers/conductores.controllers.php?op=actualizar",
    type: "POST",
    data: formData,
    success: function (response) {
      console.log(response);
      Swal.fire({
        title: "Conductor!",
        text: "Se actualizó con éxito",
        icon: "success",
      });
      LimpiarCajas();
      CargaLista();
      $("#miModal").modal("hide");
    },
    error: function (xhr, status, error) {
      console.error(xhr.responseText);
    }
  });
});

var LimpiarCajas = () => {
  $("#nombreConductor").val("");
  $("#apellidoConductor").val("");
  $("#telefonoConductor").val("");
  $("#cedulaConductor").val("");
  $("#tipoLicencia").val("");
  $("#fechaExpLicencia").val("");
  $("#direccionConductor").val("");
  //aqui para probar
  $("#ModalConductores").modal("hide");
};

init();
