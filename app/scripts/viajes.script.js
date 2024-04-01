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
            <td>${viajes.placa}</td>
            <td>${viajes.conductor}</td>
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
            op: 'todos'
        },
        dataType: 'json',
        success: function (response) {
            // Limpiar opciones existentes en el select
            $('#repuesto').empty();
            // Agregar la opción "Seleccionar" por defecto
            $('#repuesto').append('<option value="">Seleccionar</option>');
            // Iterar sobre los repuestos obtenidos y agregarlos al select
            $.each(response, function (index, vehiculo) {
                $('#repuesto').append('<option value="' + vehiculo.id + '">' + vehiculo.placa + '</option>');
            });
        },
        error: function (xhr, status, error) {
            console.error('Error al obtener los repuestos:', error);
        }
    });
}

function cargarConductor() {
    // Petición AJAX para obtener los datos de los repuestos desde el controlador
    $.ajax({
        url: '../../controllers/conductor.controllers.php',
        type: 'GET',
        data: {
            op: 'todos'
        },
        dataType: 'json',
        success: function (response) {
            // Limpiar opciones existentes en el select
            $('#repuesto').empty();
            // Agregar la opción "Seleccionar" por defecto
            $('#repuesto').append('<option value="">Seleccionar</option>');
            // Iterar sobre los repuestos obtenidos y agregarlos al select
            $.each(response, function (index, repuesto) {
                $('#repuesto').append('<option value="' + repuesto.id + '">' + repuesto.nombre + '</option>');
            });
        },
        error: function (xhr, status, error) {
            console.error('Error al obtener los repuestos:', error);
        }
    });
}

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