<?php
//TODO: Requerimientos 
require_once('../config/conexion.php');

class Usuarios
{
    /*TODO: Procedimiento para sacar todos los registros*/
    public function login($correo){
        $con = null;
        try {
            $con = new ClaseConectar();
            $con = $con->ProcedimientoConectar();

            // Preparar la consulta
            $cadena = "SELECT usuario.id, usuario.nombreUsuario, usuario.contrasenia, usuario.apellidoUsuario, usuario.correo, roles.rol, roles.id 
                   FROM usuario 
                   INNER JOIN usuario_roles ON usuario.id = usuario_roles.idUsuario 
                   INNER JOIN roles ON usuario_roles.idRol = roles.id 
                   WHERE correo = ?";

            $stmt = $con->prepare($cadena);
            if (!$stmt) {
                throw new Exception("Error en la preparación de la consulta: " . $con->error);
            }
            $stmt->bind_param("s", $correo);
            $stmt->execute();
            $result = $stmt->get_result();
            return $result->fetch_assoc();
        } catch (Throwable $th) {
            error_log($th->getMessage());
            return null;
        } finally {
            if ($stmt) {
                $stmt->close();
            }
            if ($con) {
                $con->close();
            }
        }
    }

    public function todos(){
        $con = new ClaseConectar();
        $con = $con->ProcedimientoConectar();
        $cadena = "SELECT usuario.id, usuario.nombreUsuario, usuario.apellidoUsuario, usuario.contrasenia, usuario.correo, roles.rol, roles.id from usuario INNER JOIN usuario_roles on usuario.id = usuario_roles.idUsuario INNER JOIN roles ON usuario_roles.idRol = roles.id";
        $datos = mysqli_query($con, $cadena);
        return $datos;
        $con->close();
    }
    /*TODO: Procedimiento para sacar un registro*/
    public function uno($idUsuarios){
        $con = new ClaseConectar();
        $con = $con->ProcedimientoConectar();
        $cadena = "SELECT usuario.id, usuario.nombreUsuario, usuario.contrasenia, usuario.apellidoUsuario, usuario.correo, roles.rol, roles.id from usuario INNER JOIN usuario_roles on usuario.id = usuario_roles.idUsuario INNER JOIN roles ON usuario_roles.idRol = roles.id WHERE usuario.id = $idUsuarios";
        $datos = mysqli_query($con, $cadena);
        return $datos;
        $con->close();
    }/*
    public function unoconCedula($Cedula)
    {
        $con = new ClaseConectar();
        $con = $con->ProcedimientoConectar();
        $cadena = "SELECT * FROM `Usuarios` WHERE `Cedula`='$Cedula'";

        $datos = mysqli_query($con, $cadena);
        return $datos;
        $con->close();
    }*/

    /*TODO: Procedimiento para actualizar */
    public function Actualizar($idUsuarios, $Nombres, $Apellidos, $Correo, $Contrasenia, $idRoles, $Cedula){
        $con = new ClaseConectar();
        $con = $con->ProcedimientoConectar();
        $cadena = "update usuario set nombreUsuario='$Nombres',apellidoUsuario='$Apellidos',contrasenia='$Contrasenia',correo='$Correo' where id= $idUsuarios";
        if (mysqli_query($con, $cadena)) {
            return ($idUsuarios);
        } else {
            return 'error al actualizar el registro';
        }
        $con->close();
    }
    

}

class ImagenModel
{
    public static function guardarImagen($imageData, $fileName)
    {
        // Directorio donde se guardarán las imágenes
        $uploadDirectory = 'uploads/';

        // Decodificar la imagen base64
        $imageData = str_replace('data:image/png;base64,', '', $imageData);
        $imageData = str_replace(' ', '+', $imageData);
        $imageData = base64_decode($imageData);

        // Guardar la imagen en el directorio
        if (file_put_contents($uploadDirectory . $fileName, $imageData)) {
            return true;
        } else {
            return false;
        }
    }
}
