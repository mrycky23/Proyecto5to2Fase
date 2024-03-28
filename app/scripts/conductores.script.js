function init() {
  $("#form-conductores").on("submit", (e) => {
    GuardarEditar(e);
  });
}

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
        html += `<tr>
          <td>${index + 1}</td>
          <td>${conductores.nombre}</td>
          <td>${conductores.apellido}</td>
          <td>${conductores.licencia}</td>
          <td>${conductores.vigencia}</td>
          <td>${conductores.edad}</td>
          <td>${conductores.Telefono}</td> 
          <td>${conductores.Cedula}</td>
          <td>${conductores.Direccion}</td>
          <td>
            <button class='btn btn-primary' data-id='${conductores.id}' onclick='editar(${conductores.id})'>Editar</button>
            <button class='btn btn-warning' data-id='${conductores.id}' onclick='eliminar(${conductores.id})'>Eliminar</button>
          </td>
        </tr>`;
      });
      $("#ListaConductores").html(html);
    }
  );
};


var GuardarEditar = (e) => {
  e.preventDefault();
  var DatosFormularioConductores = new FormData($("#form-conductores")[0]);
  var accion = "../../controllers/conductores.controllers.php?op=insertar";

  for (var pair of DatosFormularioConductores.entries()) {
    console.log(pair[0] + ", " + pair[1]);
  }

  /**
   * if(SucursalId >0){editar   accion='ruta para editar'}
   * else
   * { accion = ruta para insertar}
   */
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