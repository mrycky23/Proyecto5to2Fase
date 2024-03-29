<?php
// Requerimientos
require_once('../../config/conexion.php');

class conductores
{
    /* Procedimiento para sacar todos los registros */
    public function todos()
    {
        $con = new ClaseConectar();
        $con = $con->ProcedimientoConectar();
        $cadena = "SELECT * FROM `programacion`";
        $datos = mysqli_query($con, $cadena);
        $con->close();
        return $datos;
    }

    /* Procedimiento para sacar un registro */
    public function uno($conductorId)
    {
        $con = new ClaseConectar();
        $con = $con->ProcedimientoConectar();
        $cadena = "SELECT * FROM `programacion` WHERE `id`=$id";
        $datos = mysqli_query($con, $cadena);
        $con->close();
        return $datos;
    }

    public function Insertar($nombre, $apellido, $telefono, $cedula, $tipoLicencia, $ExpLicencia, $direccion)
    {
        $con = new ClaseConectar();
        $con = $con->ProcedimientoConectar();
        $cadena = "INSERT INTO `programacion`(`nombre`, `apellido`, `telefono`, `cedula`, `tipoLicencia`, `fechaExpLicencia`, `direccion`) VALUES('$nombre','$apellido','$telefono','$cedula','$tipoLicencia','$ExpLicencia','$direccion')";

        if (mysqli_query($con, $cadena)) {
            $con->close();
            return "ok";
        } else {
            $error = mysqli_error($con);
            $con->close();
            return $error;
        }
    }

    /* Procedimiento para actualizar */
    public function Actualizar($idConductor, $nuevosDatos)
    {
        $con = new ClaseConectar();
        $con = $con->ProcedimientoConectar();
        // Aquí deberías construir la consulta SQL para actualizar
        $cadena = ""; // Agrega tu consulta SQL aquí
        if (mysqli_query($con, $cadena)) {
            $con->close();
            return "ok";
        } else {
            $error = mysqli_error($con);
            $con->close();
            return $error;
        }
    }

    /* Procedimiento para Eliminar */
    public function Eliminar($idConductor)
    {
        $con = new ClaseConectar();
        $con = $con->ProcedimientoConectar();
        // Aquí deberías construir la consulta SQL para eliminar
        $cadena = ""; // Agrega tu consulta SQL aquí
        if (mysqli_query($con, $cadena)) {
            $con->close();
            return true;
        } else {
            $con->close();
            return false;
        }
    }
}
?>
