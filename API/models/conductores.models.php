<?php
require_once('../config/conexion.php');

class conductores
{
    //TODO: sacar todos los registros */
    public function todos()
    {
        $con = new ClaseConectar();
        $con = $con->ProcedimientoConectar();
        $cadena = "SELECT * FROM `conductor`";
        $datos = mysqli_query($con, $cadena);
        $con->close();
        return $datos;
    }
    //TODO:Obtener nombres de conductores
    public function nombresConductores()
    {
        $con = new ClaseConectar();
        $con = $con->ProcedimientoConectar();
        $cadena = "SELECT id,nombre FROM `conductor`";
        $datos = mysqli_query($con, $cadena);
        $con->close();
        return $datos;
    }
/*
    public function nombresConductores(){
    $con = new ClaseConectar();
    $con = $con->ProcedimientoConectar();
    $cadena = "SELECT id, nombre FROM `conductor`";
    $datos = mysqli_query($con, $cadena);

    $conductores = array();  // Array para almacenar los resultados

    // Recorrer los resultados y agregarlos al array
    while ($row = mysqli_fetch_assoc($datos)) {
        $conductores[] = $row;  // Almacena cada fila como un array asociativo
    }

    $con->close();
    // Devolver los datos en formato JSON
    return json_encode($conductores);
    }

*/
    //TODO: sacar un registro */
    public function uno($conductorId)
    {
        $con = new ClaseConectar();
        $con = $con->ProcedimientoConectar();
        $cadena = "SELECT * FROM `conductor` WHERE `id`=$conductorId";
        $datos = mysqli_query($con, $cadena);
        $con->close();
        return $datos;
    }

    //TODO: insertar */
    public function Insertar($nombre, $apellido, $telefono, $cedula, $tipoLicencia, $ExpLicencia, $direccion)
    {
        $con = new ClaseConectar();
        $con = $con->ProcedimientoConectar();
        $cadena = "INSERT INTO `conductor`(`nombre`, `apellido`, `telefono`, `cedula`, `tipoLicencia`, `fechaExpLicencia`, `direccion`) VALUES('$nombre','$apellido','$telefono','$cedula','$tipoLicencia','$ExpLicencia','$direccion')";

        if (mysqli_query($con, $cadena)) {
            $con->close();
            return "ok";
        } else {
            $error = mysqli_error($con);
            $con->close();
            return $error;
        }
    }

    //TODO: Procedimiento para actualizar */
    public function Actualizar($id, $nombre, $apellido, $telefono, $cedula, $tipoLicencia, $fechaExpLicencia, $direccion)
    {
        $con = new ClaseConectar();
        $con = $con->ProcedimientoConectar();
        // Aquí deberías construir la consulta SQL para actualizar
        $cadena = "UPDATE conductor SET nombre = '$nombre', apellido = '$apellido', telefono = '$telefono', cedula = '$cedula', tipoLicencia='$tipoLicencia', fechaExpLicencia = '$fechaExpLicencia',direccion = '$direccion' WHERE id = '$id'";
        
        $datos = mysqli_query($con, $cadena);
        return $datos;
        $con->close();
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
