<?php
//TODO: Requerimientos 
require_once('../config/conexion.php');

class reportes
{
    /*TODO: Procedimiento para sacar todos los registros*/
    public function todos()
    {
        $con = new ClaseConectar();
        $con = $con->ProcedimientoConectar();
        $cadena = "SELECT 
        p.nombreMantenimiento, 
        v.placa AS placa_vehiculo, 
        r.nombre AS nombre_repuesto, 
        p.km, 
        p.hora, 
        p.dia, 
        p.mes, 
        p.anio, 
        p.nota, 
        p.estado
    FROM 
        programacion p
    INNER JOIN 
        vehiculo v ON p.idVehiculo = v.id
    LEFT JOIN 
        programacion_repuestos pr ON p.id = pr.idProgramacion
    LEFT JOIN 
        repuestos r ON pr.idRepuesto = r.id";
        $datos = mysqli_query($con, $cadena);
        return $datos;
        $con->close();
    }
}
?>