<?php
require_once("../config/cors.php");
require_once("../models/programacion_mantenimientos.models.php");
require_once("../models/programacion_repuestos.models.php");
require_once("../models/programacion_vehiculos.models.php");


$ProgramacionMantenimientos = new ProgramacionMantenimientos;
$Programacion_repuestos = new programacion_repuestos;
$Programacion_vehiculos = new programacion_vehiculos;


switch ($_GET["op"]) {
    case 'actualizarEstado':
        $datos = $ProgramacionMantenimientos->actualizarEstadoDiaMesAnio();
        $res = mysqli_fetch_assoc($datos);
        echo json_encode($res);
        break;

    case 'insertar':
        $nombreMantenimiento = isset($_POST["nombreMantenimiento"]) ? $_POST["nombreMantenimiento"] : '';
        $repuesto = isset($_POST["repuesto"]) ? $_POST["repuesto"] : '';
        $idVehiculo = isset($_POST["idVehiculo"]) ? $_POST["idVehiculo"] : '';
        $frecuencia = isset($_POST["frecuencia"]) ? $_POST["frecuencia"] : '';
        $duracion = isset($_POST["duracion"]) ? $_POST["duracion"] : '';
        $nota = isset($_POST["nota"]) ? $_POST["nota"] : '';

        $hora = isset($_POST["hora"]) ? $_POST["hora"] : 0;
        $km = isset($_POST["km"]) ? $_POST["km"] : 0;
        $dia = isset($_POST["dia"]) ? $_POST["dia"] : 0;
        $mes = isset($_POST["mes"]) ? $_POST["mes"] : 0;
        $anio = isset($_POST["anio"]) ? $_POST["anio"] : 0;

        // Determinar los valores para los atributos km, hora, día, mes, año
        switch ($frecuencia) {

            case 'hora':
                $hora = $duracion;
                break;
            case 'kilometraje':
                $km = $duracion;
                break;
            case 'dia':
                $dia = $duracion;
                break;
            case 'mes':
                $mes = $duracion;
                break;
            case 'anio':
                $anio = $duracion;
                break;
            default:
                break;
        }


        // Insertar los datos en la tabla programacion
        $datos = $ProgramacionMantenimientos->Insertar($nombreMantenimiento, $repuesto, $idVehiculo, $km, $hora, $dia, $mes, $anio, $nota);

        echo json_encode($datos);
        if ($datos) {
            echo json_encode(["success" => true, "message" => "Insertado correctamente"]);
        } else {
            echo json_encode(["success" => false, "message" => "Error al insertar"]);
        }
        
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
