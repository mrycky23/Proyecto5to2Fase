<?php

require_once("../../config/cors.php");
require_once("../models/registroUsuario.models.php");

$registroUsuario = new registroUsuario;

// Verificar que se haya proporcionado un parámetro "op" en la solicitud
if(isset($_GET["op"])) {
    $operacion = $_GET["op"];

    switch ($operacion) {
        case 'insertar':
            // Verificar que se hayan recibido todos los datos necesarios del formulario
            if(isset($_POST["nombre"], $_POST["apellido"], $_POST["correo"], $_POST["contrasenia"])) {
                // Obtener los datos del formulario
                $nombre = $_POST["nombre"];
                $apellido = $_POST["apellido"];
                $correo = $_POST["correo"];
                $contrasenia = $_POST["contrasenia"];
                
                // Insertar los datos en la base de datos
                $datos = $registroUsuario->Insertar($nombre, $apellido, $correo, $contrasenia);

                // Devolver los resultados de la operación en formato JSON
                echo json_encode($datos);
            } else {
                // Devolver un mensaje de error si faltan datos del formulario
                echo json_encode(array("success" => false, "mensaje" => "Faltan datos del formulario."));
            }
            break;

        default:
            // Devolver un mensaje de error si la operación solicitada no está permitida
            echo json_encode(array("success" => false, "mensaje" => "Operación no válida."));
            break;
    }
} else {
    // Devolver un mensaje de error si no se proporcionó el parámetro "op" en la solicitud
    echo json_encode(array("success" => false, "mensaje" => "Falta el parámetro 'op' en la solicitud."));
}
?>
