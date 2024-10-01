<?php
//error_reporting(0);
require_once("../config/cors.php");
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
    case 'placasVehiculos':
        $datos = $Vehiculos->placasVehiculos();
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
        $placa = $_POST["placa"];
        $tipo = $_POST["tipo"];
        $tonelaje = $_POST["tonelaje"];
        $clase = $_POST["clase"];
        $color = $_POST["color"];
        $anio = $_POST["anio"];
        $marca = $_POST["marca"];
        $chasis = $_POST["chasis"];
        $motor = $_POST["motor"];
        $datos = $Vehiculos->Insertar($placa, $tipo, $tonelaje, $clase, $color, $anio, $marca, $chasis, $motor);
        echo json_encode($datos);
        break;

    case 'actualizar':
        $idRepuesto = $_POST["placa"];
        $repuesto = $_POST["tipo"];
        $repuesto = $_POST["tonelaje"];
        $repuesto = $_POST["clase"];
        $repuesto = $_POST["color"];
        $repuesto = $_POST["anio"];
        $repuesto = $_POST["marca"];
        $repuesto = $_POST["chasis"];
        $repuesto = $_POST["motor"];
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
