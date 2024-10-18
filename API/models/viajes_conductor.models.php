<?php
require_once('../config/conexion.php');

class viajes_conductores
{
public function insertarViajeConductor($idConductor, $idViaje)
    {
        $con = new ClaseConectar();
        $con = $con->ProcedimientoConectar();
        $cadena = "INSERT INTO `viajes_conductor`(`idConductor`, idViaje) VALUES('$idConductor', '$idViaje')";

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