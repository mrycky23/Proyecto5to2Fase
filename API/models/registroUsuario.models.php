<?php
// Requerimientos
require_once('../config/conexion.php');

class registroUsuario
{
    public function insertar($nombre, $apellido, $correo, $hashContrasenia)
{
    $con = new ClaseConectar();
    $con = $con->ProcedimientoConectar();
    $cadena = "INSERT INTO `usuario`(`nombreUsuario`, `apellidoUsuario`, `contrasenia`, `correo`) VALUES(?,?,?,?)";

    $stmt = $con->prepare($cadena);
    if(!$stmt){
        return "Error en la preparación de la consulta: " . $con->error;
    }
    $stmt->bind_param("ssss", $nombre, $apellido, $hashContrasenia, $correo);

    $result = $stmt->execute();
    if($result){
        $stmt->close();
        $con->close();
        return "ok";
    }else {
        $error = $stmt->error;
        $stmt->close();
        $con->close();
        return "Error al insertar registro: " .$error;
    }
}

    public function ultimoIdUsuario()
{
    $con = new ClaseConectar();
    $con = $con->ProcedimientoConectar();
    $cadena = "SELECT MAX(id) AS id FROM usuario";
    $datos = mysqli_query($con, $cadena);

    if($datos){
        if($row = mysqli_fetch_assoc($datos)){
            $ultimoId = $row['id'];
        } else {
            $ultimoId = null;
        }
    } else {
        $ultimoId = null;
        error_log("Error en la consulta SQL ".mysqli_error($con));
    }
    mysqli_close($con);
    return $ultimoId; 
    }

}
?>