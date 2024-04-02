<?php
require_once('../../config/conexion.php');
class dashboard{
    public function todos()
    {
    $con = new ClaseConectar();
    $con = $con->ProcedimientoConectar();
    
    // Modifica la consulta para incluir las tablas relacionadas y sus campos
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
    $con->close();
    return $datos;
}

}
?>