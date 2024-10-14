<?php
//error_reporting(0);
require_once("../config/cors.php");
require_once("../models/viajes.models.php");
require_once("../models/viajes_vehiculos.models.php");
require_once("../models/viajes_conductor.models.php");

$Viaje = new viajes;
$ViajeVehiculo = new viajes_vehiculos;
$ViajeConductor = new viajes_conductores;
switch ($_GET["op"]) {
    case 'todos':
        $datos = $Viaje->todos();
        $todos = array();
        while ($row = mysqli_fetch_assoc($datos)) {
            $todos[] = $row;
        }
        echo json_encode($todos);
        break;

    case 'uno':
        $idViaje = $_POST["idViaje"];
        $datos = $Conductor->uno($idViaje);
        $res = mysqli_fetch_assoc($datos);
        echo json_encode($res);
        break;

        case 'insertar':
            // Obtener los datos del formulario enviados a través de POST
            $fechaPartida = $_POST["fechaPartida"];
            $fechaLlegada = $_POST["fechaLlegada"];
            $lugarPartida = $_POST["lugarPartida"];
            $lugarDestino = $_POST["lugarDestino"];
            $kmInicial = $_POST["kmInicial"];
            $kmFinal = $_POST["kmFinal"];
            $ordenTrabajo = $_POST["ordenTrabajo"];
            $nota = $_POST["nota"];
            
            // Verificar si los campos idVehiculo y idConductor están definidos
            $idVehiculo = isset($_POST["placa"]) ? $_POST["placa"] : null;
            $idConductor = isset($_POST["conductor"]) ? $_POST["conductor"] : null;
        
            // Insertar el viaje en la base de datos
            $datos = $Viaje->Insertar($fechaPartida, $fechaLlegada, $lugarPartida, $lugarDestino, $kmInicial, $kmFinal, $ordenTrabajo, $nota);
            $idViaje = $Viaje->ultimoId();
        
            // Verificar si se obtuvo correctamente el idViaje
            if ($idViaje) {
                if ($idVehiculo) {
                    $resultVehiculo = $ViajeVehiculo->insertarViajeVehiculo($idVehiculo, $idViaje);
                    if (!$resultVehiculo) {
                        //echo json_encode(['status' => 'error', 'message' => 'Error al insertar relación viaje-vehículo']);
                        exit;
                    }
                } else {
                    //echo json_encode(['status' => 'error', 'message' => 'El campo idVehiculo está vacío']);
                    exit;
                }
                // Verificar si el idConductor no está vacío antes de insertar la relación
                if ($idConductor) {
                    $resultConductor = $ViajeConductor->InsertarViajeConductor($idConductor, $idViaje);
                    if (!$resultConductor) {
                        //echo json_encode(['status' => 'error', 'message' => 'Error al insertar relación viaje-conductor']);
                        exit;
                    }
                } else {
                    echo json_encode(['status' => 'error', 'message' => 'El campo idConductor está vacío']);
                    exit;
                }
                //echo json_encode(['status' => 'success', 'message' => 'Viaje y relaciones insertadas correctamente', 'idViaje' => $idViaje]);
            } else {
                //echo json_encode(['status' => 'error', 'message' => 'Error al obtener el ID del último viaje']);
            }
            break;

    case 'actualizar':
        $idConductor = $_POST["idConductor"];
        $Ultimo = $_POST["Ultimo"];
        $idUsuario = $_POST["idUsuario"];
        $datos = $Conductor->Actualizar($idConductor, $Ultimo, $idUsuario);
        echo json_encode($datos);
        break;

    case 'eliminar':
        $idConductor = $_POST["idConductor"];
        $datos = $Conductor->Eliminar($idConductor);
        echo json_encode($datos);
        break; 
}
?>
