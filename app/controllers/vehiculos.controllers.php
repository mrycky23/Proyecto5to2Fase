<?php
//error_reporting(0);
require_once("../../config/cors.php");
require_once("../models/vehiculos.models.php");

$Vehiculos = new vehiculos;

switch ($_GET["op"]) {
    case 'todos':
        $datos = $Vehiculos->todos();
        $todos = array();
        while ($row = mysqli_fetch_assoc($datos)) {
            $todos[] = $row;
        }
        mysqli_free_result($datos);
        echo json_encode($todos);
        break;

    case 'uno':
        $idRespuesto = $_POST["id"];
        $datos = $Vehiculos->uno($idRespuesto);
        $res = mysqli_fetch_assoc($datos);
        echo json_encode($res);
        break;

    case 'insertar':
        $repuesto = $_POST["vehiculo"];
        $datos = $Vehiculos->Insertar($repuesto);
        echo json_encode($datos);
        break;

    case 'actualizar':
        $idRepuesto = $_POST["idVehiculo"];
        $repuesto = $_POST["vehiculo"];
        $datos = $Vehiculos->Actualizar($idRepuesto, $repuesto);
        echo json_encode($datos);
        break;

    case 'eliminar':
        $idRepuesto = $_POST["idVehiculo"];
        $datos = $Vehiculos->Eliminar($idRepuesto);
        echo json_encode($datos);
        break; 
}
?>
