<?php
// Requerimientos
require_once('../../config/conexion.php');

class registroUsuario
{
public function Insertar($nombre, $apellido, $correo, $contrasenia)
    {
        $con = new ClaseConectar();
        $con = $con->ProcedimientoConectar();
        $cadena = "INSERT INTO `usuario`(`nombreUsuario`, `apellidoUsuario`, `contrasenia`, `correo`) VALUES('$nombre', '$apellido', '$contrasenia', '$correo')";

        if (mysqli_query($con, $cadena)) {
            $con->close();
            return "ok";
        } else {
            $error = mysqli_error($con);
            $con->close();
            return $error;
        }
    }

}
?>