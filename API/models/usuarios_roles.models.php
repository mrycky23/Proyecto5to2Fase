<?php
//TODO: Requerimientos 
require_once('../config/conexion.php');
class Usuarios_Roles
{
    /*TODO: Procedimiento para sacar todos los registros*/
    public function todos()
    {
        $con = new ClaseConectar();
        $con = $con->ProcedimientoConectar();
        $cadena = "SELECT * FROM usuario_roles";
        $datos = mysqli_query($con, $cadena);
        return $datos;
        $con->close();
    }
    public function insertarUsuarioRol($idUsuario, $idRol)
    {
        $con = new ClaseConectar();
        $con = $con->ProcedimientoConectar();
        $cadena = "INSERT INTO usuario_roles(idUsuario,idRol) values (?,?)";

        $stmt = $con->prepare($cadena);
        if(!$stmt){
            return "Error al preparar la consulta";
        }

        $stmt->bind_param("ii", $idUsuario, $idRol);
        $result = $stmt->execute();
        if($result){
            $stmt->close();
            $con->close();
            return "ok";
        } else {
            $error = $stmt->error;
            $stmt->close();
            $con->close();
            return "Error al ejecutar la consulta: $error";
        }
    }
    /*TODO: Procedimiento para actualizar */
    public function Actualizar($Usuarios_idUsuarios, $Roles_idRoles, $idUsuariosRoles,)
    {
        $con = new ClaseConectar();
        $con = $con->ProcedimientoConectar();
        $cadena = "update usuario_roles set idUsuario=$Usuarios_idUsuarios,idRol=$Roles_idRoles, where idUsuarioRol= $idUsuariosRoles";
        if (mysqli_query($con, $cadena)) {
            return "ok";
        } else {
            return 'error al actualizar el registro';
        }
        $con->close();
    }
}
