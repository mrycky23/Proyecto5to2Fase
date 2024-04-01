<?php
//error_reporting(0);
require_once("../../config/cors.php");
require_once("../models/programacion_mantenimientos.models.php");

$ProgramacionMantenimientos = new ProgramacionMantenimientos;

switch ($_GET["op"]) {
    case 'todos':
        $datos = $Repuestos->todos();
        $todos = array();
        while ($row = mysqli_fetch_assoc($datos)) {
            $todos[] = $row;
        }
        mysqli_free_result($datos);
        echo json_encode($todos);
        break;

    case 'uno':
        $programacion = $_POST["id"];
        $datos = $Repuestos->uno($idRepuesto);
        $res = mysqli_fetch_assoc($datos);
        echo json_encode($res);
        break;

    case 'buscarIdVehiculo':
            // Obtener el nombre del vehículo enviado desde la solicitud AJAX
            $nombreVehiculo = $_POST["nombreVehiculo"];
            
            // Realizar la búsqueda del ID del vehículo en función de su nombre
            $vehiculo = $Vehiculos->BuscarIdVehiculo($nombreVehiculo);
        
            // Verificar si se encontró el vehículo
            if ($vehiculo) {
                // Si se encontró, devolver el ID del vehículo como respuesta en formato JSON
                echo json_encode(array("success" => true, "idVehiculo" => $vehiculo['id']));
            } else {
                // Si no se encontró el vehículo, devolver un mensaje de error en formato JSON
                echo json_encode(array("success" => false, "error" => "No se pudo encontrar el ID del vehículo"));
            }
            break;    
        
    
    case 'insertar':
            // Validar y sanitizar los datos del formulario
            $nombreMantenimiento = isset($_POST["nombreMantenimiento"]) ? $_POST["nombreMantenimiento"] : '';
            $repuesto = isset($_POST["repuesto"]) ? $_POST["repuesto"] : '';
            $idVehiculo = isset($_POST["vehiculo"]) ? $_POST["vehiculo"] : '';
            $frecuencia = isset($_POST["frecuencia"]) ? $_POST["frecuencia"] : '';
            $duracion = isset($_POST["duracion"]) ? $_POST["duracion"] : '';
            $nota = isset($_POST["nota"]) ? $_POST["nota"] : '';
            // Determinar los valores para los atributos km, hora, día, mes, año
            $km = 0;
            $hora = 0;
            $dia = 0;
            $mes = 0;
            $anio = 0;
            switch ($frecuencia) {
                case 'Kilometros':
                    $km = $duracion;
                    break;
                case 'Horas':
                    $hora = $duracion;
                    break;
                case 'Dia':
                    $dia = $duracion;
                    break;
                case 'Mes':
                    $mes = $duracion;
                    break;
                case 'Anio':
                    $anio = $duracion;
                    break;
                default:
                    break;
            }
            
            // Insertar los datos en la tabla programacion
            $datos = $ProgramacionMantenimientos->Insertar($nombreMantenimiento, $repuesto, $idVehiculo, $km, $hora, $dia, $mes, $anio, $nota);
            
            echo json_encode($datos);
            break;
        

    case 'actualizar':
        $idRepuesto = $_POST["idRepuesto"];
        $repuesto = $_POST["repuesto"];
        $datos = $Respuestos->Actualizar($idRepuesto, $repuesto);
        echo json_encode($datos);
        break;

    case 'eliminar':
        $idRepuesto = $_POST["idRepuesto"];
        $datos = $Repuestos->Eliminar($idRepuesto);
        echo json_encode($datos);
        break; 
}
?>
