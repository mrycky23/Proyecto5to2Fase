<?php
// Requerimientos
require_once('../../config/conexion.php');

class repuestos
{
    /* Procedimiento para sacar todos los registros */
    public function todos()
    {
        $con = new ClaseConectar();
        $con = $con->ProcedimientoConectar();
        $cadena = "SELECT * FROM `repuestos`";
        $datos = mysqli_query($con, $cadena);
        $con->close();
        return $datos;
    }

    /* Procedimiento para sacar un registro */
    public function uno($idRepuesto)
    {
        $con = new ClaseConectar();
        $con = $con->ProcedimientoConectar();
        $cadena = "SELECT * FROM `repuestos` WHERE `id`=$idRepuesto";
        $datos = mysqli_query($con, $cadena);
        $con->close();
        return $datos;
    }

    /* Procedimiento para insertar */
    public function Insertar($repuesto)
    {
        $con = new ClaseConectar();
        $con = $con->ProcedimientoConectar();
        $cadena = "INSERT INTO `repuestos`(`nombre`) VALUES('$repuesto')";

        if (mysqli_query($con, $cadena)) {
            $con->close();
            return "ok";
        } else {
            $error = mysqli_error($con);
            $con->close();
            return $error;
        }
    }
    public function existeRepuesto($nombreRepuesto)
    {
    $con = new ClaseConectar();
    $con = $con->ProcedimientoConectar();
    $nombreRepuesto = mysqli_real_escape_string($con, $nombreRepuesto); // Escapar el nombre del repuesto para prevenir inyecciones SQL
    $consulta = "SELECT COUNT(*) AS cantidad FROM `repuestos` WHERE `nombre` = '$nombreRepuesto'";
    $resultado = mysqli_query($con, $consulta);
    
    if ($resultado) {
        $fila = mysqli_fetch_assoc($resultado);
        $cantidad = $fila['cantidad'];
        mysqli_free_result($resultado);
        $con->close();
        return $cantidad > 0; // Devolver true si existe al menos un repuesto con ese nombre, false en caso contrario
    } else {
        // Manejo de errores si la consulta falla
        $con->close();
        return false;
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
