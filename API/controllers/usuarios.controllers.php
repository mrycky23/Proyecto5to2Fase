<?php
error_reporting(0);
/*TODO: Requerimientos */
require_once('../config/sesiones.php');
require_once("../models/usuarios.models.php");
//require_once("../models/Accesos.models.php");
$Usuarios = new Usuarios;
//$Accesos = new Accesos;

class ImagenController
{
    public function guardarImagen($imageData, $fileName)
    {
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
        break;
    case 'insertar':
        $Nombres = $_POST["Nombres"];
        $Apellidos = $_POST["Apellidos"];
        $Contrasenia = $_POST["contrasenia"];
        $Correo = $_POST["correo"];

        //$SucursalId = $_POST["SucursalId"];
        $RolId = $_POST["RolId"];
        //$Cedula = $_POST["Cedula"];
        $datos = array();
        $datos = $Usuarios->Insertar($Nombres, $Apellidos, $Correo, $Contrasenia, $RolId);
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
        session_start();
        $correo = trim($_POST['correo']);
        $contrasenia = trim($_POST['contrasenia']);
        if (empty($correo) || empty($contrasenia)) {
            echo json_encode(["success" => false, "message" => "Correo o contraseña vacíos"]);
            exit();
        }
        try {
            $res = $Usuarios->login($correo);

            if ($res) {
                if (password_verify($contrasenia, $res['contrasenia'])) {
                    $_SESSION["idUsuarios"] = $res["id"];
                    $_SESSION["Usuarios_Nombres"] = $res["nombreUsuario"];
                    $_SESSION["Usuarios_Apellidos"] = $res["apellidoUsuario"];
                    $_SESSION["Usuarios_Correo"] = $res["correo"];
                    $_SESSION["Usuario_IdRoles"] = $res["id"];
                    $_SESSION["Rol"] = $res["rol"];
                    header("Location:../../app/views/home.php");
                    exit();
                } else {
                    echo json_encode(["success" => false, "message" => "Contraseña incorrecta"]);
                    exit();
                }
            } else {
                echo json_encode(["success" => false, "message" => "Usuario no encontrado"]);
                exit();
            }
        } catch (Exception $e) {
            error_log($e->getMessage());
            echo json_encode(["success" => false, "message" => "Excepción: " . $e->getMessage()]);
            exit();
        }
        break;
    case 'CerrarSesion':
       
        break;
}
