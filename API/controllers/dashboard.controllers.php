<?php
require_once("../config/cors.php");
require_once("../models/dashboard.models.php");

$Dashboard = new dashboard;
switch($_GET["op"]){
    case 'todos':
        $datos = $Dashboard->todos();
        $todos = array();
        while ($row = mysqli_fetch_assoc($datos)) {
            $todos[] = $row;
        }
        echo json_encode($todos);
        break;
}
?>