<?php
//TODO: Requerimientos 
require_once('../config/conexion.php');

class Usuarios
{
    /*TODO: Procedimiento para sacar todos los registros*/
    public function login($Correo)
    {
        try {
            $con = new ClaseConectar();
            $con = $con->ProcedimientoConectar();
            $cadena = "SELECT usuario.id, usuario.nombreUsuario, usuario.contrasenia, usuario.apellidoUsuario, usuario.correo, roles.rol, roles.id from usuario INNER JOIN usuario_roles on usuario.id = usuario_roles.idUsuario INNER JOIN roles ON usuario_roles.idRol = roles.id WHERE `correo`='$Correo'";
            $datos = mysqli_query($con, $cadena);
            return $datos;
        } catch (Throwable $th) {
            return $th->getMessage();
        }
        $con->close();
    }
    public function todos()
    {
        $con = new ClaseConectar();
        $con = $con->ProcedimientoConectar();
        $cadena = "SELECT usuario.id, usuario.nombreUsuario, usuario.apellidoUsuario, usuario.contrasenia, usuario.correo, roles.rol, roles.id from usuario INNER JOIN usuario_roles on usuario.id = usuario_roles.idUsuario INNER JOIN roles ON usuario_roles.idRol = roles.id";
        $datos = mysqli_query($con, $cadena);
        return $datos;
        $con->close();
    }
    /*TODO: Procedimiento para sacar un registro*/
    public function uno($idUsuarios)
    {
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
    /*TODO: Procedimiento para insertar */
    public function Insertar($Nombres, $Apellidos, $Correo, $Contrasenia, $idRoles)
    {
        $con = new ClaseConectar();
        $con = $con->ProcedimientoConectar();
        $cadena = "INSERT into usuario(nombreUsuario,apellidoUsuario,contrasenia,correo) values ( '$Nombres', '$Apellidos', '$Contrasenia', '$Correo')";

        if (mysqli_query($con, $cadena)) {
            require_once('../models/Usuarios_Roles.models.php');
            $UsRoles = new Usuarios_Roles();

            return $UsRoles->Insertar(mysqli_insert_id($con), $idRoles);
        } else {
            return 'Error al insertar en la base de datos';
        }
        $con->close();
    }

    /*TODO: Procedimiento para actualizar */
    public function Actualizar($idUsuarios, $Nombres, $Apellidos, $Correo, $Contrasenia, $idRoles, $Cedula)
    {
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
    /*TODO: Procedimiento para Eliminar */
    public function Eliminar($idUsuarios)
    {
        $UsRoles = new Usuarios_Roles();
        $UsRoles->Eliminar($idUsuarios);
        $con = new ClaseConectar();
        $con = $con->ProcedimientoConectar();
        $cadena = "delete from usuario where id = $idUsuarios";
        if (mysqli_query($con, $cadena)) {
            return true;
        } else {
            return false;
        }
        $con->close();
    }

}

class ImagenModel {
    public static function guardarImagen($imageData, $fileName) {
        // Directorio donde se guardarán las imágenes
        $uploadDirectory = 'uploads/';

        // Decodificar la imagen base64
        $imageData = str_replace('data:image/png;base64,', '', $imageData);
        $imageData = str_replace(' ', '+', $imageData);
        $imageData = base64_decode($imageData);

        // Guardar la imagen en el directorio
        if(file_put_contents($uploadDirectory . $fileName, $imageData)) {
            return true;
        } else {
            return false;
        }
    }
}