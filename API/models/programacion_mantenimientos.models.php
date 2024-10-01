<?php
// Requerimientos
require_once('../config/conexion.php');

class ProgramacionMantenimientos
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

    public function actualizarEstado()
    {
        $con = new ClaseConectar();
        $con = $con->ProcedimientoConectar();
        $cadena = "CALL actualizar_estado_programacion()";
        $datos = mysqli_query($con, $cadena);
        $con->close();
        return $datos;
    }


    public function actualizarEstadoDiaMesAnio(){
        $con = new ClaseConectar();
        $con = $con->ProcedimientoConectar();
        $cadena = "SELECT vv.idVehiculo FROM viajes_vehiculo vv GROUP BY vv.idVehiculo";
        $result = mysqli_query($con, $cadena);
        
        // Verificar si hay resultados
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $vehiculo_id_val = $row["idVehiculo"];

                // Calcular el total de kilómetros recorridos por el vehículo en todos los viajes
                $km_total_viajes_query = "SELECT SUM(v.KmLlegada - v.KmSalida) AS km_total_viajes
                                          FROM viajes v
                                          INNER JOIN viajes_vehiculo vv ON v.id = vv.idViaje
                                          WHERE vv.idVehiculo = $vehiculo_id_val";

                // Ejecutar la consulta
                $km_total_viajes_result = $con->query($km_total_viajes_query);

                // Obtener el resultado
                $km_total_viajes_row = $km_total_viajes_result->fetch_assoc();
                $km_total_viajes = $km_total_viajes_row["km_total_viajes"];

                // Obtener el total de kilómetros programados para el vehículo
                $km_programacion_query = "SELECT km FROM programacion WHERE idVehiculo = $vehiculo_id_val LIMIT 1";

                // Ejecutar la consulta
                $km_programacion_result = $con->query($km_programacion_query);

                // Obtener el resultado
                $km_programacion_row = $km_programacion_result->fetch_assoc();
                $km_programacion = $km_programacion_row["km"];

                // Calcular el porcentaje de kilómetros recorridos en comparación con la programación
                $porcentaje_km = ($km_total_viajes / $km_programacion) * 100;

                // Determinar estado de la programación
                if ($porcentaje_km > 100) {
                    $estado_programacion = 'Mantenimiento atrasado';
                } elseif ($porcentaje_km <= 100 && $porcentaje_km > 80) {
                    $estado_programacion = 'Alerta';
                } elseif ($porcentaje_km <= 80 && $porcentaje_km > 20) {
                    $estado_programacion = 'Próximo a mantenimiento';
                } else {
                    $estado_programacion = 'Buen estado';
                }

                // Actualizar estado en la tabla programacion para el vehículo actual
                $update_query = "UPDATE programacion SET Estado = '$estado_programacion' WHERE idVehiculo = $vehiculo_id_val";

                // Ejecutar la consulta de actualización
                $con->query($update_query);
            }
        }

        $datos = mysqli_query($con, $cadena);
        $con->close();
        return $datos;
    }

    //TODO: Procedimiento para sacar un registro */
    public function BuscarIdVehiculo($nombreVehiculo)
    {
        // Obtener una conexión a la base de datos
        $conexion = new ClaseConectar();
        $con = $conexion->ProcedimientoConectar();
    
        // Preparar la consulta SQL con una instrucción preparada
        $consulta = "SELECT id FROM vehiculo WHERE placa = ?"; //
        $sentencia = $con->prepare($consulta);
    
        // Vincular el parámetro de nombreVehiculo a la consulta preparada
        $sentencia->bind_param("s", $nombreVehiculo);
    
        // Ejecutar la consulta preparada
        $sentencia->execute();
    
        // Obtener el resultado de la consulta
        $resultado = $sentencia->get_result();
    
        // Verificar si se encontró el vehículo
        if ($resultado && $resultado->num_rows > 0) {
            // Si se encontró, obtener el ID del vehículo
            $datos = $resultado->fetch_assoc();
            $idVehiculo = $datos['id'];
        } else {
            // Si no se encontró el vehículo, establecer el ID del vehículo como falso
            $idVehiculo = false;
        }
    
        // Cerrar la consulta y la conexión a la base de datos
        $sentencia->close();
        $conexion->close();
    
        // Devolver el ID del vehículo encontrado o false si no se encontró
        return $idVehiculo;
    }
    
    public function Insertar($nombreMantenimiento, $repuesto, $idVehiculo, $km, $hora, $dia, $mes, $anio, $nota)
    {
    $con = new ClaseConectar();
    $con = $con->ProcedimientoConectar();
    $cadena = "INSERT INTO `programacion`(`nombreMantenimiento`, `idRepuesto`, `idVehiculo`, `km`, `hora`, `dia`, `mes`, `anio`, `nota`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
    
    // Preparar la sentencia
    $stmt = $con->prepare($cadena);
    if (!$stmt) {
        // Si la preparación falla, devolver un mensaje de error
        return "Error al preparar la consulta: " . $con->error;
    }
     // Corregir los tipos de los parámetros en bind_param
     $stmt->bind_param("ssiiiiiis", $nombreMantenimiento, $repuesto, $idVehiculo, $km, $hora, $dia, $mes, $anio, $nota);

    // Ejecutar la consulta
    $result = $stmt->execute();
    if ($result) {
        // Si la consulta se ejecuta correctamente, cerrar la conexión y devolver "ok"
        $stmt->close();
        $con->close();
        return "ok";
    } else {
        // Si la consulta falla, devolver un mensaje de error
        $error = $stmt->error;
        $stmt->close();
        $con->close();
        return "Error al insertar el registro: " . $error;
    }
    }


    //TODO: Procedimiento para actualizar */
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

    //TODO: Procedimiento para Eliminar */
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
