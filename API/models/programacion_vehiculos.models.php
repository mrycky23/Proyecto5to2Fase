<?php

require_once('../config/conexion.php');

class programacion_vehiculos
{

    public function insertarProgramacionVehiculo($idProgramacion, $idVehiculo)
    {
        $con = new ClaseConectar();
        $con = $con->ProcedimientoConectar();
        $cadena = "INSERT INTO `programacion_vehiculos`(`idProgramacion`, `idVehiculo`) VALUES('$idProgramacion', '$idVehiculo')";

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
