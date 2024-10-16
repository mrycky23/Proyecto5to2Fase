<?php
// Requerimientos
require_once('../config/conexion.php');

class vehiculos
{
    /* Procedimiento para sacar todos los registros */
    public function todos()
    {//SELECT placa, tipo, tonelaje, clase, color, anio, marca, chasis, motor FROM `vehiculo`"
        $con = new ClaseConectar();
        $con = $con->ProcedimientoConectar();
        $cadena = "SELECT * FROM `vehiculo`";
        $datos = mysqli_query($con, $cadena);
        $con->close();
        return $datos;
    }
    public function placasVehiculos()
    {   
        $con = new ClaseConectar();
        $con = $con->ProcedimientoConectar();
        $cadena = "SELECT id, placa FROM `vehiculo`";
        $datos = mysqli_query($con, $cadena);
        $con->close();
        return $datos;
    }
    /* Procedimiento para sacar un registro */
    public function uno($idRespuesto)
    {
        $con = new ClaseConectar();
        $con = $con->ProcedimientoConectar();
        $cadena = "SELECT * FROM `vehiculo` WHERE `id`=$idRespuesto";
        $datos = mysqli_query($con, $cadena);
        $con->close();
        return $datos;
    }

    /* Procedimiento para insertar */
    public function Insertar($placa, $tipo, $tonelaje, $clase, $color, $anio, $marca, $chasis, $motor)
    {
        $con = new ClaseConectar();
        $con = $con->ProcedimientoConectar();
        $cadena = "INSERT INTO `vehiculo`(`placa`, `tipo`, `tonelaje`, `clase`, `color`, `anio`, `marca`, `chasis`, `motor`) VALUES('$placa', '$tipo', '$tonelaje', '$clase', '$color',' $anio', '$marca', '$chasis',' $motor')";

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
    public function Actualizar($idRepuesto, $repuesto)
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
