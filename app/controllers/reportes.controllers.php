<?php
require_once("../../config/cors.php");
require_once("../models/reportes.models.php");

$Reportes = new reportes;

switch ($_GET["op"]) {
    case 'todos':
        $datos = $Reportes->todos();
        $todos = array();
        while ($row = mysqli_fetch_assoc($datos)) {
            $todos[] = $row;
        }
        mysqli_free_result($datos);
        echo json_encode($todos);
        break;

    /*case 'uno':
        $Reportes = $_POST["id"];
        $datos = $Reportes->uno($idRepuesto);
        $res = mysqli_fetch_assoc($datos);
        echo json_encode($res);
        break;*/
    }
?>