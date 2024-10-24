<?php
// Requerimientos
require_once('../config/conexion.php');

class viajes
{
    /* Procedimiento para sacar todos los registros */
    public function todos()
    {
        $con = new ClaseConectar();
        $con = $con->ProcedimientoConectar();
        $cadena = "SELECT v.placa AS placa_vehiculo, 
        c.nombre AS nombre_conductor, 
        vj.fechaInicio, 
        vj.fechaFin, 
        vj.lugarPartida, 
        vj.lugarDestino, 
        vj.KmSalida, 
        vj.KmLlegada, 
        vj.ordenTrabajo 
        FROM viajes_vehiculo vv 
        INNER JOIN viajes vj ON vv.idViaje = vj.id 
        INNER JOIN vehiculo v ON vv.idVehiculo = v.id 
        INNER JOIN viajes_conductor vc ON vv.idViaje = vc.idViaje 
        INNER JOIN conductor c ON vc.idConductor = c.id;";
        $datos = mysqli_query($con, $cadena);
        $con->close();
        return $datos;
    }

    /* Procedimiento para sacar un registro */
    public function uno($conductorId)
    {
        $con = new ClaseConectar();
        $con = $con->ProcedimientoConectar();
        $cadena = "SELECT * FROM `conductor` WHERE `id`=$conductorId";
        $datos = mysqli_query($con, $cadena);
        $con->close();
        return $datos;
    }

    /* Procedimiento para insertar */
    public function Insertar($fechaPartida, $fechaLlegada, $lugarPartida, $lugarDestino, $kmInicial, $kmFinal, $ordenTrabajo, $nota)
    {
        $con = new ClaseConectar();
        $con = $con->ProcedimientoConectar();
        $cadena = "INSERT INTO `viajes`(`fechaInicio`, `fechaFin`, `lugarPartida`, `lugarDestino`, `kmSalida`, `kmLlegada`, `ordenTrabajo`, `nota`) VALUES('$fechaPartida','$fechaLlegada','$lugarPartida','$lugarDestino','$kmInicial','$kmFinal','$ordenTrabajo', '$nota' )";

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

    public function ultimoIdViaje() {
        $con = new ClaseConectar();
        $con = $con->ProcedimientoConectar();
        $cadena = "SELECT MAX(id) AS id FROM viajes";
        $datos = mysqli_query($con, $cadena);
    
        if ($datos) { // Verificar si la consulta fue exitosa
            if ($row = mysqli_fetch_assoc($datos)) {
                $ultimoId = $row['id']; // Almacenar el id del último registro
            } else {
                $ultimoId = null; // No hay registros
            }
        } else {
            // Error en la consulta
            $ultimoId = null;
            error_log("Error en la consulta SQL: " . mysqli_error($con)); // Registrar el error
        }
    
        mysqli_close($con); // Cerrar la conexión correctamente
        return $ultimoId;
    }
    
}
?>
