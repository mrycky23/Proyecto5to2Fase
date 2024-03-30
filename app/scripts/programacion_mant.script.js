function init() {
    $("#form-conductores").on("submit", (e) => {
        GuardarEditar(e);
    });
}

function cargarRepuestos() {
    // Petición AJAX para obtener los datos de los repuestos desde el controlador
    $.ajax({
        url: '../../controllers/repuestos.controllers.php',
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
//Cargar repuestos en el select
$(document).ready(function () {
    cargarRepuestos();

    // Si necesitas cargar los repuestos en respuesta a algún evento, como cambiar otro select, puedes descomentar este bloque y adaptarlo a tus necesidades.
    /*
    $('#otroSelect').on('change', function() {
        cargarRepuestos();
    });
    */
});

//Insertar repuesto
$(document).ready(function () {
    $('#btn-ingresar').click(function (e) {
        e.preventDefault(); // Evita el envío del formulario por defecto

        // Obtener los datos del formulario
        var repuesto = $('#campoRepuesto').val();
        // Verificar si el campo está vacío
        if (repuesto === '') {
            console.log('El campo está vacío');
            return; // Detener el proceso si el campo está vacío
        }

        // Verificar si el repuesto ya existe
        if (repuestoExistente(repuesto)) {
            console.log('El repuesto ya existe');
            return; // Detener el proceso si el repuesto ya existe
        }
        $.ajax({
            url: '../../controllers/repuestos.controllers.php?op=insertar',
            type: 'POST',
            data: {
                campoRepuesto: repuesto
            },
            success: function (response) {
                console.log(response);
                cargarRepuestos();
            },
            error: function (xhr, status, error) {
                console.error(xhr.responseText);
            }
        });
    });
});


// Función para verificar si el repuesto ya existe
function repuestoExistente(repuesto) {
    var existe = false;
    $.ajax({
        url: '../../controllers/repuestos.controllers.php?op=verificarExistencia',
        type: 'POST',
        data: {
            repuesto: repuesto
        },
        async: false, // Hacer la solicitud AJAX síncrona para que la función espere la respuesta
        success: function (response) {
            existe = response === 'true'; // La respuesta será 'true' si el repuesto existe, 'false' si no existe
            console.log('Existe el repuesto');
        },
        error: function (xhr, status, error) {
            console.error('Error al verificar la existencia del repuesto:', error);
        }
    });
    return false; // Temporalmente retornamos falso para propósitos de demostración
};


function cargarVehiculos() {
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
                $('#vehiculo').empty();
                // Agregar la opción "Seleccionar" por defecto
                $('#vehiculo').append('<option value="">Seleccionar</option>');
                // Iterar sobre los repuestos obtenidos y agregarlos al select
                $.each(response, function (index, vehiculo) {
                    $('#vehiculo').append('<option value="' + vehiculo.id + '">' + vehiculo.placa + '</option>');
                });
            },
            error: function (xhr, status, error) {
                console.error('Error al obtener los repuestos:', error);
            }
        });
    }

//Cargar vehiculos en el select
$(document).ready(function () {
    cargarVehiculos();
    // Si necesitas cargar los repuestos en respuesta a algún evento, como cambiar otro select, puedes descomentar este bloque y adaptarlo a tus necesidades.
    /*
    $('#otroSelect').on('change', function() {
        cargarRepuestos();
    });
    */
});

$(document).ready(function () {
    // Escuchar el evento de clic en el botón de guardar
    $('#btn-guardar').click(function (e) {
        e.preventDefault(); // Evitar el envío del formulario por defecto

        // Obtener los valores del formulario
        var nombreMantenimiento = $('#nombreMantenimiento').val();
        var repuesto = $('#repuesto').val();
        var idVehiculo = $('#vehiculo').val();
        var frecuencia = $('#frecuencia').val(); // Obtener el valor seleccionado en el campo frecuencia
        var duracion = $('#duracion').val();
        var nota = $('#nota').val();

        // Determinar los valores para los atributos km, hora, día, mes, año
        var km = 0;
        var hora = 0;
        var dia = 0;
        var mes = 0;
        var anio = 0;
        switch (frecuencia) {
            case 'Kilometros':
                km = duracion; // La duración se asigna a km si la frecuencia es Kilómetros
                break;
            case 'Horas':
                hora = duracion; // La duración se asigna a hora si la frecuencia es Horas
                break;
            case 'Dia':
                dia = duracion; // La duración se asigna a día si la frecuencia es Día
                break;
            case 'Mes':
                mes = duracion; // La duración se asigna a mes si la frecuencia es Mes
                break;
            case 'Anio':
                anio = duracion; // La duración se asigna a año si la frecuencia es Año
                break;
            default:
                break;
        }

        // Crear objeto con los datos del formulario
        var datosFormulario = {
            nombreMantenimiento: nombreMantenimiento,
            repuesto: repuesto,
            idVehiculo: idVehiculo,
            km: km,
            hora: hora,
            dia: dia,
            mes: mes,
            anio: anio,
            nota: nota
        };

        // Realizar la petición AJAX para insertar los datos en la tabla programacion
        $.ajax({
            url: '../../controllers/programacion_mantenimientos.controllers.php?op=insertar', // Ruta del controlador que maneja la inserción en la tabla programacion
            type: 'POST',
            data: datosFormulario,
            success: function (response) {
                console.log(response);
                // Aquí puedes agregar lógica adicional si lo necesitas
            },
            error: function (xhr, status, error) {
                console.error(xhr.responseText);
                console.error(status.responseText);
                console.error(error.responseText);
            }
        });
    });
});




var eliminar = (id) => {
    // lógica para eliminar el conductor con el ID proporcionado
};

var editar = (id) => {
    // lógica para editar el conductor con el ID proporcionado
};


var LimpiarCajas = () => {
    $("#nombreMantenimiento").val("");
    $("#campoRepuesto").val("");
    $("#repuesto").val("");
    $("#vehiculo").val("");
    $("#frecuencia").val("");
    $("#duracion").val("");
    $("#nota").val("");
};
init();