<?php
require_once('../config/conexion.php');

class viajes_vehiculos
{
public function InsertarViajeVehiculo($idVehiculo, $idViaje)
    {
        $con = new ClaseConectar();
        $con = $con->ProcedimientoConectar();
        $cadena = "INSERT INTO `viajes_vehiculo`(`idVehiculo`, `idViaje`) VALUES('$idVehiculo', '$idViaje')";

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