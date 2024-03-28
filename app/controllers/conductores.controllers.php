<?php
/*TODO: Requerimientos */
require_once("../config/cors.php");
require_once("../models/conductores.models.php");
error_reporting(0);

$Conductor = new conductores;
switch ($_GET["op"]) {
        /*TODO: Procedimiento para listar todos los registros */
    case 'todos':
        $datos = array();
        $datos = $Conductor->todos();
        while ($row = mysqli_fetch_assoc($datos)) {
            $todos[] = $row;
        }
        echo json_encode($todos);

        break;
        /*TODO: Procedimiento para sacar un registro */
    case 'uno':
        $idConductor = $_POST["idConductor"];
        $datos = array();
        $datos = $Sucursal->uno($idconductor);
        $res = mysqli_fetch_assoc($datos);
        echo json_encode($res);
        break;
        /*TODO: Procedimiento para insertar */
    case 'insertar':

        $nombre= $_POST["nombreConductor"];
        $apellido= $_POST["apellidoConductor"];
        $telefono= $_POST["telefonoConductor"];
        $cedula= $_POST["cedulaConductor"];
        $tipoLicencia= $_POST["tipoLicencia"];
        $ExpLicenci= $_POST["vigencia"]; 
        $direccion= $_POST["direccionConductor"];
        $datos = array();
        $datos = $Conductor->Insertar($nombre, $apellido, $telefono, $cedula, $tipoLicencia, $ExpLicencia, $direccion);
        echo json_encode($datos);
        break;
       
    case 'actualizar':
        $idConductor = $_POST["idConductor"];
        $Ultimo = $_POST["Ultimo"];
        $idUsuario = $_POST["idUsuario"];
        $datos = array();
        $datos = $Sucursal->Actualizar($idAccesos, $Ultimo, $Usuarios_idUsuarios);
        echo json_encode($datos);
        break;
       
    case 'eliminar':
        $idConductor = $_POST["idConductor"];
        $datos = array();
        $datos = $Sucursal->Eliminar($idAccesos);
        echo json_encode($datos);
        break; 
}
