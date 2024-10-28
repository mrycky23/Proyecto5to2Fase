<?php
/*TODO: Requerimientos */
require_once("../config/cors.php");
require_once("../models/roles.models.php");
error_reporting(0);

$rolModel= new Rol;
switch ($_GET["op"]) {

        /*TODO: Procedimiento para listar todos los registros */
    case 'todos':
        $datos = $rolModel->todos();
        $todos = array();
        while ($row = mysqli_fetch_assoc($datos)) {
            $todos[] = $row;
        }
        mysqli_free_result($datos);
        echo json_encode($todos);
        break;

        //TODO: Procedimiento para sacar un registro //
    case 'uno':
        $idAccesos = $_POST["idAccesos"];
        $datos = array();
        $datos = $Rol->uno($idAccesos);
        $res = mysqli_fetch_assoc($datos);
        echo json_encode($res);
        break;

        // TODO: Procedimiento para insertar //
    case 'insertar':
        $rol = $_POST["campoRol"];
        $datos = array();
        $datos = $rolModel->insertar($rol);
        echo json_encode($datos);
        break;
       
    case 'actualizar':
        $idAccesos = $_POST["idAccesos"];
        $Ultimo = $_POST["Ultimo"];
        $Usuarios_idUsuarios = $_POST["Usuarios_idUsuarios"];
        $datos = array();
        $datos = $Sucursal->Actualizar($idAccesos, $Ultimo, $Usuarios_idUsuarios);
        echo json_encode($datos);
        break;
       
    case 'eliminar':
        $idAccesos = $_POST["idAccesos"];
        $datos = array();
        $datos = $Rol->Eliminar($idAccesos);
        echo json_encode($datos);
        break; 

    case 'verificarExistencia':
        $rol = $_POST["campoRol"];
        $datos = array();
        $datos = $rolModel->verificarExistencia($rol);
        if ($datos) {
            echo json_encode(['existe' => true]);
        } else {
            echo json_encode(['existe' => false]);
        }
        break;

}
