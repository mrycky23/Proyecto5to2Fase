<?php
    
require_once('../config/conexion.php');

class programacion_repuestos
{

    public function insertarProgramacionRepuesto($idProgramacion, $idRepuesto)
    {
        $con = new ClaseConectar();
        $con = $con->ProcedimientoConectar();
        $cadena = "INSERT INTO `programacion_repuestos`(`idProgramacion`, `idRepuesto`) VALUES('$idProgramacion', '$idRepuesto')";

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