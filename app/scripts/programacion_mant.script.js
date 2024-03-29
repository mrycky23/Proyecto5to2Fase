function init() {
    $("#form-conductores").on("submit", (e) => {
        GuardarEditar(e);
    });
}



//Insertar repuesto
$(document).ready(function () {
    $('#btn-guardar').click(function (e) {
        e.preventDefault(); // Evita el envío del formulario por defecto

        // Obtener los datos del formulario
        var formData = $('#form-conductores').serialize();

        $.ajax({
            url: '../../controllers/repuestos.controllers.php?op=insertar',
            type: 'POST',
            data: formData,
            success: function (response) {
                console.log(response);
            },
            error: function (xhr, status, error) {
                console.error(xhr.responseText);
            }
        });
    });
});

//Cargar repuestos en el select
$(document).ready(function(){
    // Función para cargar opciones en el select
    function cargarRepuestos() {
        // Petición AJAX para obtener los datos de los repuestos desde el controlador
        $.ajax({
            url: '../../controllers/repuestos.controllers.php', 
            type: 'GET',
            data: {op: 'todos'},
            dataType: 'json',
            success: function(response) {
                // Limpiar opciones existentes en el select
                $('#repuesto').empty();
                // Agregar la opción "Seleccionar" por defecto
                $('#repuesto').append('<option value="">Seleccionar</option>');
                // Iterar sobre los repuestos obtenidos y agregarlos al select
                $.each(response, function(index, repuesto) {
                    $('#repuesto').append('<option value="' + repuesto.id + '">' + repuesto.nombre + '</option>');
                });
            },
            error: function(xhr, status, error) {
                console.error('Error al obtener los repuestos:', error);
            }
        });
    }
    // Llamar a la función para cargar los repuestos al cargar la página
    cargarRepuestos();

    // Si necesitas cargar los repuestos en respuesta a algún evento, como cambiar otro select, puedes descomentar este bloque y adaptarlo a tus necesidades.
    /*
    $('#otroSelect').on('change', function() {
        cargarRepuestos();
    });
    */
});

//Cargar vehiculos en el select
$(document).ready(function(){
    // Función para cargar opciones en el select
    function cargarVehiculos() {
        // Petición AJAX para obtener los datos de los repuestos desde el controlador
        $.ajax({
            url: '../../controllers/vehiculos.controllers.php', 
            type: 'GET',
            data: {op: 'todos'},
            dataType: 'json',
            success: function(response) {
                // Limpiar opciones existentes en el select
                $('#repuesto').empty();
                // Agregar la opción "Seleccionar" por defecto
                $('#repuesto').append('<option value="">Seleccionar</option>');
                // Iterar sobre los repuestos obtenidos y agregarlos al select
                $.each(response, function(index, repuesto) {
                    $('#repuesto').append('<option value="' + repuesto.id + '">' + repuesto.placa + '</option>');
                });
            },
            error: function(xhr, status, error) {
                console.error('Error al obtener los repuestos:', error);
            }
        });
    }
    // Llamar a la función para cargar los repuestos al cargar la página
    cargarVehiculos();

    // Si necesitas cargar los repuestos en respuesta a algún evento, como cambiar otro select, puedes descomentar este bloque y adaptarlo a tus necesidades.
    /*
    $('#otroSelect').on('change', function() {
        cargarRepuestos();
    });
    */
});


var GuardarEditar = (e) => {
    e.preventDefault();
    var DatosFormularioConductores = new FormData($("#form-conductores")[0]);
    var accion = "../../controllers/conductores.controllers.php?op=insertar";

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