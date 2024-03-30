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
        $idRepuesto = $_POST["id"];
        $datos = $Repuestos->uno($idRepuesto);
        $res = mysqli_fetch_assoc($datos);
        echo json_encode($res);
        break;

        case 'insertar':
            // Obtener los datos del formulario
            $nombreMantenimiento = $_POST["nombreMantenimiento"];
            $repuesto = $_POST["repuesto"];
            $idVehiculo = $_POST["vehiculo"];
            $frecuencia = $_POST["frecuencia"];
            $duracion = $_POST["duracion"];
            $nota = $_POST["nota"];
            
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
