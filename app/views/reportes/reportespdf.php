<?php
// Función para obtener datos de la base de datos
require_once('../../config/conexion.php');
//require_once 'tcpdf.php';
require_once ('../reportes/TCPDF-main/tcpdf.php');
//require_once('tcpdf.php');

function obtener_datos_de_base_de_datos() {
    // Verificar si hay errores de conexión
    $con = new ClaseConectar();
    $con = $con->ProcedimientoConectar();

    // Consulta SQL para seleccionar datos
    $consulta = "SELECT id, idUsuario , fechaReporte,idVehiculo ,idProgramacion  FROM reportes";

    // Ejecutar la consulta
    $resultado = $con->query($consulta);

    // Verificar si la consulta fue exitosa
    if (!$resultado) {
        die('Error en la consulta: ' . $con->error);
    }

    // Array para almacenar los datos
    $datos = array();

    // Recorrer el resultado y almacenar los datos en el array
    while ($fila = $resultado->fetch_assoc()) {
        $datos[] = $fila;
    }

    // Cerrar la conexión
    $con->close();

    // Devolver los datos obtenidos de la base de datos
    return $datos;
}

// Ahora puedes utilizar esta función en tu script principal para obtener los datos
$datos = obtener_datos_de_base_de_datos();

// Función para generar el reporte PDF
function generar_reporte_pdf($datos) {
    // Crear un nuevo objeto TCPDF
    $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

    // Establecer información del documento
    $pdf->SetCreator(PDF_CREATOR);
    $pdf->SetAuthor('Nombre del autor');
    $pdf->SetTitle('Reporte de datos');
    $pdf->SetSubject('Reporte PDF generado desde datos de la base de datos');
    $pdf->SetKeywords('TCPDF, PDF, reporte, datos, base de datos');

    // Establecer márgenes
    $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
    $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
    $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

    // Establecer auto página de ruptura
    $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

    // Establecer información de la fuente
    $pdf->SetFont('helvetica', '', 12);

    // Agregar una página
    $pdf->AddPage();

    // Cabecera del reporte
    $html = '<h1>Reporte de Datos</h1>';

    // Construir la tabla de datos
    $html .= '<table border="1">';
    $html .= '<tr><th>ID</th><th>ID Usuario</th><th>Fecha de Reporte</th><th>ID Vehículo</th><th>ID Programación</th></tr>';
    foreach ($datos as $dato) {
        $html .= '<tr>';
        $html .= '<td>' . $dato['id'] . '</td>';
        $html .= '<td>' . $dato['idUsuario'] . '</td>';
        $html .= '<td>' . $dato['fechaReporte'] . '</td>';
        $html .= '<td>' . $dato['idVehiculo'] . '</td>';
        $html .= '<td>' . $dato['idProgramacion'] . '</td>';
        $html .= '</tr>';
    }
    $html .= '</table>';

    // Escribir la tabla en el PDF
    $pdf->writeHTML($html, true, false, true, false, '');

    // Cerrar el PDF y generar la salida
    $pdf->Output('reporte.pdf', 'I');
}

// Llamar a la función para generar el reporte PDF con los datos obtenidos de la base de datos
generar_reporte_pdf($datos);
?>
