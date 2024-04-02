function init() {
    CargaLista();
    // btn-guardar

    $('#btn-guardar').click(function (e) {
        e.preventDefault(); // Evita el envío del formulario por defecto

        // Obtener los datos del formulario
        var formData = $('#form-viajes').serialize();

        $.ajax({
            url: '../../controllers/viajes.controllers.php?op=insertar',
            type: 'POST',
            data: formData,
            success: function (response) {
                console.log(response);
                LimpiarCajas();
                ActualizarTabla();

            },
            error: function (xhr, status, error) {
                console.error(xhr.responseText);
            }
        });
    });

}

function ActualizarTabla() {
    CargaLista();
}
var CargaLista = () => {
    var html = "";
    $.get(
        "../../controllers/viajes.controllers.php?op=todos",
        (ListaViajes) => {
            console.log(ListaViajes);
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
          </tr>`;
            });
            $("#ListaViajes").html(html);
        }
    );
};

function cargarPlaca() {
    // Petición AJAX para obtener los datos de los repuestos desde el controlador
    $.ajax({
        url: '../../controllers/vehiculos.controllers.php',
        type: 'GET',
        data: {
            op: 'placasVehiculos'
        },
        dataType: 'json',
        success: function (response) {
            // Limpiar opciones existentes en el select
            $('#placa').empty();
            // Agregar la opción "Seleccionar" por defecto
            $('#placa').append('<option value="">Seleccionar</option>');
            // Iterar sobre los repuestos obtenidos y agregarlos al select
            $.each(response, function (index, placas) {
                $('#placa').append('<option value="' + placas.id + '">' + placas.placa + '</option>');
            });
        },
        error: function (xhr, status, error) {
            console.error('Error al obtener las placas:', error);
        }
    });
}

function cargarConductor() {
    // Petición AJAX para obtener los datos de los repuestos desde el controlador
    $.ajax({
        url: '../../controllers/conductores.controllers.php?op=nombresConductores',
        type: 'GET',
        dataType: 'json',
        success: function (response) {
            console.log(response);
            // Limpiar opciones existentes en el select
            $('#conductor').empty();
            // Agregar la opción "Seleccionar" por defecto
            $('#conductor').append('<option value="">Seleccionar</option>');
            // Iterar sobre los repuestos obtenidos y agregarlos al select
            $.each(response, function (index, conductor) {
                $('#conductor').append('<option value="' + conductor.id + '">' + conductor.nombre + '</option>');
            });
        },
        error: function (xhr, status, error) {
            console.error('Error al obtener los nombres del conductor:', error);
        }
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