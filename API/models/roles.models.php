<?php
//TODO: Requerimientos 
require_once('../config/conexion.php');
class Rol
{
    /*TODO: Procedimiento para sacar todos los registros*/
    public function todos()
    {
        $con = new ClaseConectar();
        $con = $con->ProcedimientoConectar();
        $cadena = "SELECT id, rol FROM `roles`";
        $datos = mysqli_query($con, $cadena);
        $con->close();
        return $datos;
    }

    /*TODO: Procedimiento para sacar un registro
    public function uno($SucursalId)
    {
        $con = new ClaseConectar();
        $con = $con->ProcedimientoConectar();
        $cadena = "SELECT * FROM `Sucursales` WHERE `SucursalId`=$SucursalId";
        $datos = mysqli_query($con, $cadena);
        return $datos;
        $con->close();
    }*/

    //TODO: Procedimiento para insertar 
    public function insertar($rol)
    {
        $con = new ClaseConectar();
        $con = $con->ProcedimientoConectar();
        $cadena = "INSERT INTO `roles`(`rol`) VALUES(?)";

        if($stmt = mysqli_prepare($con, $cadena)){
            mysqli_stmt_bind_param($stmt, "s", $rol);

            if(mysqli_stmt_execute($stmt)){
                $result = "ok";
            } else {
                $result = "Error al ejecutar la consulta: ". mysqli_stmt_error($stmt);
            }
            mysqli_stmt_close($stmt);
        } else {
            $result = "Error al preparar la consulta: ". mysqli_error($con);
        }
        $con->close();
        return $result;
    }

    /*TODO: Procedimiento para actualizar */
    public function actualizar()
    {
        $con = new ClaseConectar();
        $con = $con->ProcedimientoConectar();
        $cadena = "";
        if (mysqli_query($con, $cadena)) {
            return "ok";
        } else {
            return 'error al actualizar el registro';
        }
        $con->close();
    }
    /*TODO: Procedimiento para Eliminar */
    public function eliminar($idAccesos)
    {
        $con = new ClaseConectar();
        $con = $con->ProcedimientoConectar();
        $cadena = "";
        if (mysqli_query($con, $cadena)) {
            return true;
        } else {
            return false;
        }
        $con->close();
    }

    /*TODO: Verificar existencia */
    public function verificarExistencia($Rol)
    {
        $con = new ClaseConectar();
        $con = $con->ProcedimientoConectar();

        $cadena = "SELECT COUNT(*) as cantidad FROM roles WHERE rol = '$Rol'";
        $resultado = mysqli_query($con, $cadena);   
        if($resultado) {
            $fila = mysqli_fetch_assoc($resultado);
            if($fila['cantidad']>0){
                $con->close();
                return true;
            } else {
            $con->close();
            return false;
            }  
    } else {
        $con->close();
        return false;
    }
    } 
}
