<?php
//error_reporting(0);
require_once("../../config/cors.php");
require_once("../models/repuestos.models.php");

$Respuestos = new repuestos;

switch ($_GET["op"]) {
    case 'todos':
        $datos = $Respuestos->todos();
        $todos = array();
        while ($row = mysqli_fetch_assoc($datos)) {
            $todos[] = $row;
        }
        mysqli_free_result($datos);
        echo json_encode($todos);
        break;

    case 'uno':
        $idRespuesto = $_POST["id"];
        $datos = $Respuestos->uno($idRespuesto);
        $res = mysqli_fetch_assoc($datos);
        echo json_encode($res);
        break;

    case 'insertar':
        $repuesto = $_POST["repuesto"];
        $datos = $Respuestos->Insertar($repuesto);
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
        $datos = $Respuestos->Eliminar($idRepuesto);
        echo json_encode($datos);
        break; 
}
?>
