<?php
require_once('../config/conexion.php');
class usuarios_accesos{

    /* Procedimiento para insertar */
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
}
    
?>


