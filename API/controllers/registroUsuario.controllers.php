<?php

require_once("../config/cors.php");
require_once("../models/registroUsuario.models.php");
require_once("../models/usuarios_roles.models.php");

$registroUsuario = new registroUsuario;
$usuarioRoles = new Usuarios_Roles;

if(isset($_GET["op"])) {
    $operacion = $_GET["op"];

    switch ($operacion) {
        case 'insertar':
            if(isset($_POST["nombre"], $_POST["apellido"], $_POST["correo"], $_POST["contrasenia"])) {
                $nombre = $_POST["nombre"];
                $apellido = $_POST["apellido"];
                $correo = $_POST["correo"];
                $contrasenia = $_POST["contrasenia"];
                $hashContrasenia = password_hash($contrasenia, PASSWORD_BCRYPT);

                $datos = $registroUsuario->insertar($nombre, $apellido, $correo, $hashContrasenia);
                $idUsuario = $registroUsuario->ultimoIdUsuario();
                $idRol = $_POST["rol"];

                if($idUsuario){
                    $resultRol = $usuarioRoles->insertarUsuarioRol($idUsuario, $idRol);
                    if(!$resultRol){
                        echo json_encode(['status' => 'error', 'message' => 'Error al insertar relación usuario-rol']);
                    exit;
                    }
                }
                echo json_encode($datos);
            } else {
                echo json_encode(array("success" => false, "mensaje" => "Faltan datos del formulario."));
            }
            break;
        default:
            echo json_encode(array("success" => false, "mensaje" => "Operación no válida."));
            break;
        
    }
    
} else {
    echo json_encode(array("success" => false, "mensaje" => "Falta el parámetro 'op' en la solicitud."));
}
?>
