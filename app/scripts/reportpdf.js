document.getElementById('btn-guardar').addEventListener('click', function() {
   
    // Función para generar el reporte PDF utilizando AJAX
    function generarReportePDF() {
        // Petición AJAX para generar el reporte PDF
        $.ajax({
            url: '../../views/reportespdf.php', // Ruta del script PHP que genera el PDF}
            type: 'GET',
            success: function (response) {
                // La respuesta es el PDF generado
                // Abre una nueva ventana del navegador con el PDF
                window.open(response);
            },
            error: function (_xhr, _status, error) {
                console.error('Error al generar el reporte PDF:', error);
            }
        });
    }

    // Llama a la función para generar el reporte PDF
    generarReportePDF();
    
});
