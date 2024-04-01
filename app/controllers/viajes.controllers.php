<?php
//error_reporting(0);
require_once("../../config/cors.php");
require_once("../models/viajes.models.php");

$Viaje = new viajes;

switch ($_GET["op"]) {
    case 'todos':
        $datos = $Viaje->todos();
        $todos = array();
        while ($row = mysqli_fetch_assoc($datos)) {
            $todos[] = $row;
        }
        echo json_encode($todos);
        break;

    case 'uno':
        $idViaje = $_POST["idViaje"];
        $datos = $Conductor->uno($idViaje);
        $res = mysqli_fetch_assoc($datos);
        echo json_encode($res);
        break;

    case 'insertar':
        $fechaPartida = $_POST["fechaPartida"];
        $fechaLlegada = $_POST["fechaLlegada"];
        $lugarPartida = $_POST["lugarPartida"];
        $lugarDestino = $_POST["lugarDestino"]; 
        $kmInicial = $_POST["kmInicial"];
        $kmFinal = $_POST["kmFinal"];
        $ordenTrabajo = $_POST["ordenTrabajo"];
        $nota = $_POST["nota"];
        $datos = $Viaje->Insertar($fechaPartida, $fechaLlegada, $lugarPartida, $lugarDestino, $kmInicial, $kmFinal, $ordenTrabajo, $nota);
        echo json_encode($datos);
        break;

    case 'actualizar':
        $idConductor = $_POST["idConductor"];
        $Ultimo = $_POST["Ultimo"];
        $idUsuario = $_POST["idUsuario"];
        $datos = $Conductor->Actualizar($idConductor, $Ultimo, $idUsuario);
        echo json_encode($datos);
        break;

    case 'eliminar':
        $idConductor = $_POST["idConductor"];
        $datos = $Conductor->Eliminar($idConductor);
        echo json_encode($datos);
        break; 
}
?>
