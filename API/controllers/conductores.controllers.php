<?php
require_once("../config/cors.php");
require_once("../models/conductores.models.php");
//header('Content-Type: application/json');


$Conductor = new conductores;

switch ($_GET["op"]) {
    case 'todos':
        $datos = $Conductor->todos();
        $todos = array();
        while ($row = mysqli_fetch_assoc($datos)) {
            $todos[] = $row;
        }
        echo json_encode($todos);
        break;
        
    case 'nombresConductores':
        $datos = $Conductor->nombresConductores();
        $todos = array();
        while ($row = mysqli_fetch_assoc($datos)) {
            $todos[] = $row;
        }
        echo json_encode($todos);
        break;

    case 'uno':
        if (isset($_POST["idConductor"])) {
            $idConductor = $_POST["idConductor"];
            $datos = $Conductor->uno($idConductor);
    
            if ($datos) {
                $res = mysqli_fetch_assoc($datos);
                echo json_encode($res);
            } else {
                echo json_encode(["error" => "Conductor no encontrado"]);
            }
        } else {
            echo json_encode(["error" => "ID del conductor no proporcionado"]);
        }
        break;

    case 'insertar':
        $nombre = $_POST["nombreConductor"];
        $apellido = $_POST["apellidoConductor"];
        $telefono = $_POST["telefonoConductor"];
        $cedula = $_POST["cedulaConductor"];
        $tipoLicencia = $_POST["tipoLicencia"];
        $ExpLicencia = $_POST["fechaExpLicencia"]; 
        $direccion = $_POST["direccionConductor"];
        $datos = $Conductor->Insertar($nombre, $apellido, $telefono, $cedula, $tipoLicencia, $ExpLicencia, $direccion);
        echo json_encode($datos);
        break;

    case 'actualizar':
        $idConductor = $_POST["idConductor"];
        $nombre = $_POST["nombreConductor"];
        $apellido = $_POST["apellidoConductor"];
        $telefono = $_POST["telefonoConductor"];
        $cedula = $_POST["cedulaConductor"];
        $tipoLicencia = $_POST["tipoLicencia"];
        $ExpLicencia = $_POST["fechaExpLicencia"]; 
        $direccion = $_POST["direccionConductor"];
        $datos = $Conductor->Actualizar($idConductor,$nombre, $apellido, $telefono, $cedula, $tipoLicencia, $ExpLicencia, $direccion);
        echo json_encode($datos);
        break;

    case 'eliminar':
        $idConductor = $_POST["idConductor"];
        $datos = $Conductor->Eliminar($idConductor);
        echo json_encode($datos);
        break; 
}
?>
