<?php

require_once('../../config/conexion.php');

class programacion_vehiculos
{

    public function insertarVehiculoProgramacion($idVehiculo)
    {
        $con = new ClaseConectar();
        $con = $con->ProcedimientoConectar();

        // Consulta para obtener el último idProgramacion creado
        $query_id_programacion = "SELECT id FROM programacion ORDER BY id DESC LIMIT 1";
        $result_id_programacion = mysqli_query($con, $query_id_programacion);

        if ($result_id_programacion) {
            $row = mysqli_fetch_assoc($result_id_programacion);
            $idProgramacion = $row['id'];

            // Consulta para insertar el repuesto asociado al último idProgramacion
            $query_insertar_vehiculo = "INSERT INTO programacion_vehiculos (idProgramacion, idVehiculo) VALUES ('$idProgramacion', '$idVehiculo')";

            if (mysqli_query($con, $query_insertar_vehiculo)) {
                $con->close();
                return "ok";
            } else {
                $error = mysqli_error($con);
                $con->close();
                return $error;
            }
        } else {
            $error = mysqli_error($con);
            $con->close();
            return $error;
        }
    }
}
