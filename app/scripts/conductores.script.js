function init() {
  $("#form-conductores").on("submit", (e) => {
    GuardarEditar(e);
  });
}

$().ready(() => {
  CargaLista();
});

var CargaLista = () => {
  var html = "";
  $.get(
    "../../controllers/conductores.controllers.php?op=todos",
    (ListaConductores) => {
      ListaConductores = JSON.parse(ListaConductores);
      $.each(ListaConductores, (index, conductores) => {
        html += `<tr>
          <td>${index + 1}</td>
          <td>${conductores.Nombre}</td>
          <td>${conductores.Apellido}</td>
          <td>${conductores.Licencia}</td>
          <td>${conductores.Vigencia}</td>
          <td>${conductores.Edad}</td>
          <td>${conductores.Telefono}</td> 
          <td>${conductores.Cedula}</td>
          <td>${conductores.Direccion}</td>
  <td>
  <button class='btn btn-primary' click='uno(${
            conductores.id
          })'>Editar</button>
  <button class='btn btn-warning' click='eliminar(${
    conductores.id
          })'>Eliminar</button>
              `;
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
    /*success: (respuesta) => {
      console.log(respuesta);
      respuesta = JSON.parse(respuesta);
      if (respuesta == "ok") {
        alert("Se guardo con éxito");
        CargaLista();
        LimpiarCajas();
      } else {
        alert("no tu pendejada");
      }
    },*/
  });
};



var eliminar = () => {};

var LimpiarCajas = () => {
  (document.getElementById("nombreConductor").value = "")
  (document.getElementById("apellidoConductor").value = "")
  (document.getElementById("telefonoConductor").value = "")
  (document.getElementById("cedulaConductor").value = "")
  (document.getElementById("tipoLicencia").value = "")
  (document.getElementById("vigencia").value = "")
  (document.getElementById("direccionConductor").value = "")
};
init();