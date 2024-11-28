$(document).ready(function () {
    cargarRepuestos();

    //TODO:Registra Repuesto
    $("#btn-guardar").click(function (e) {
      e.preventDefault(); // Evitar el envío del formulario por defecto

      // Obtener los valores del formulario
      var nombreRepuesto = $("#campoRepuesto").val();

      // Verificar si el campo está vacío
      if (nombreRepuesto === "") {
        console.log("El campo está vacío");
        return; 
      }

      // Verificar si el repuesto ya existe
      repuestoExistente(nombreRepuesto, function (existe) {
        if (existe) {
          console.log("El repuesto ya existe");
          return; // Detener el proceso si el repuesto ya existe
        } else {
          $.ajax({
            url: "../../../API/controllers/repuestos.controllers.php?op=insertar",
            type: "POST",
            data: {
              campoRepuesto: nombreRepuesto,
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
})
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

  
var CargaLista = () => {
    var html = "";
    $.get(
      "../../../API/controllers/repuestos.controllers.php?op=todos",
      (ListaRepuestos) => {
        ListaRepuestos = JSON.parse(ListaRepuestos);
        $.each(ListaRepuestos, (index, repuestos) => {
          html += `
          <tr>
            <td>${index + 1}</td>
            <td>${repuestos.nombre}</td>
            <td>${repuestos.durabilidad}</td>
            <td>${repuestos.unidadCantidad}</td>
            <td>${repuestos.unidadCantidad}</td>
            <td>
              <button id="btn-editar" class='btn btn-primary' onclick='editar(${
                repuestos.id
              })'>Editar</button>
              <button id="btn-eliminar" class='btn btn-info' onclick='eliminar(${
                repuestos.id
              })'>Eliminar</button>
            </td>
          </tr>`;
        });
        $("#ListaRepuestos").html(html);
        
        $(".btn-editar").click(function () {
        });
  
        $(".btn-eliminar").click(function () {
        });
      }
    );
  };