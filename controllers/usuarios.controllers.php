<?php
error_reporting(0);
/*TODO: Requerimientos */
require_once('../config/sesiones.php');
require_once("../models/usuarios.models.php");
//require_once("../models/Accesos.models.php");
$Usuarios = new Usuarios;
//$Accesos = new Accesos;

class ImagenController {
    public function guardarImagen($imageData, $fileName) {
        $resultado = ImagenModel::guardarImagen($imageData, $fileName);
        if ($resultado) {
            return 'Imagen guardada correctamente';
        } else {
            return 'Error al guardar la imagen';
        }
    }
}

$imagenController = new ImagenController();

switch ($_GET["op"]) {
        /*TODO: Procedimiento para listar todos los registros */
    case 'todos':
        $datos = array();
        $datos = $Usuarios->todos();
        while ($row = mysqli_fetch_assoc($datos)) {
            $todos[] = $row;
        }
        echo json_encode($todos);
        break;
        /*TODO: Procedimiento para sacar un registro */
    case 'uno':
        $idUsuarios = $_POST["id"];
        $datos = array();
        $datos = $Usuarios->uno($id);
        $res = mysqli_fetch_assoc($datos);
        echo json_encode($res);
        break;/*
    case "unoconCedula":
        $Cedula = $_POST["cedula"];
        $datos = array();
        $datos = $Usuarios->unoconCedula($Cedula);
        $res = mysqli_fetch_assoc($datos);
        echo json_encode($res);
        break;
        /*TODO: Procedimiento para insertar */
    case 'insertar':
        $Nombres = $_POST["Nombres"];
        $Apellidos = $_POST["Apellidos"];
        $Contrasenia = $_POST["contrasenia"];
        $Correo = $_POST["correo"];
        
        //$SucursalId = $_POST["SucursalId"];
        $RolId = $_POST["RolId"];
        //$Cedula = $_POST["Cedula"];
        $datos = array();
        $datos = $Usuarios->Insertar($Nombres, $Apellidos, $Correo, $Contrasenia, $SucursalId, $RolId, $Cedula);
        echo json_encode($datos);
        break;
        /*TODO: Procedimiento para actualizar */
    case 'actualizar':
        $idUsuarios = $_POST["id"];
        $Nombres = $_POST["nombreUsuario"];
        $Apellidos = $_POST["apellidoUsuario"];
        $Contrasenia = $_POST["contrasenia"];
        $Correo = $_POST["correo"];
        $Roles_idRoles = $_POST["Roles_idRoles"];
        $Cedula = $_POST["Cedula"];
        $datos = array();
        $datos = $Usuarios->Actualizar($idUsuarios, $Nombres, $Apellidos, $Correo, $Contrasenia, $Roles_idRoles, $Cedula);
        echo json_encode($datos);
        break;
        /*TODO: Procedimiento para eliminar */
    case 'eliminar':
        $idUsuarios = $_POST["idUsuarios"];
        $datos = array();
        $datos = $Usuarios->Eliminar($idUsuarios);
        echo json_encode($datos);
        break;
        /*TODO: Procedimiento para insertar */
    case 'login':
        $correo = $_POST['correo'];
        $contrasenia = $_POST['contrasenia'];

        //TODO: Si las variables estab vacias rgersa con error
        if (empty($correo) or  empty($contrasenia)) {
            header("Location:../login.php?op=2");
            exit();
        }

        try {
            $datos = array();
            $datos = $Usuarios->login($correo, $contrasenia);
            $res = mysqli_fetch_assoc($datos);
        } catch (Throwable $th) {
            header("Location:../login.php?op=1");
            exit();
        }
        //TODO:Control de si existe el registro en la base de datos
        try {
            if (is_array($res) and count($res) > 0) {
                //if ((md5($contrasenia) == ($res["Contrasenia"]))) {
                if ((($contrasenia) == ($res["Contrasenia"]))) {
                    //$datos2 = array();
                    // $datos2 = $Accesos->Insertar(date("Y-m-d H:i:s"), $res["idUsuarios"], 'ingreso');

                    $_SESSION["idUsuarios"] = $res["idUsuarios"];
                    $_SESSION["Usuarios_Nombres"] = $res["Nombres"];
                    $_SESSION["Usuarios_Apellidos"] = $res["Apellidos"];
                    $_SESSION["Usuarios_Correo"] = $res["Correo"];
                    $_SESSION["Usuario_IdRoles"] = $res["idRoles"];
                    $_SESSION["Rol"] = $res["Rol"];



                    header("Location:../views/home.php");
                    exit();
                } else {
                    header("Location:../login.php?op=1");
                    exit();
                }
            } else {
                header("Location:../login.php?op=1");
                exit();
            }
        } catch (Exception $th) {
            echo ($th->getMessage());
        }
        break;
}
