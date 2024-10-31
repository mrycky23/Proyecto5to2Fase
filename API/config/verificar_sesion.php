<?php

// verificar_sesion.php2
session_start();

// Verifica si el usuario ha iniciado sesión
if (!isset($_SESSION["idUsuarios"])) {
    // Si no ha iniciado sesión, redirige al login
    header("Location: ../../login.php");
    exit();
}
