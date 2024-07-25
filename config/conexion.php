<?php
class ClaseConectar
{
    public $conexion;
    protected $db;
    private $host = "localhost";
    private $usu = "root";
    private $clave = "";
    private $base = "transjovalsa2";

    public function ProcedimientoConectar()
    {
        $this->conexion = mysqli_connect($this->host, $this->usu, $this->clave, $this->base);
        mysqli_query($this->conexion, "SET NAMES utf8");
        if ($this->conexion === false) die("Error al conectarse con mysql " . mysqli_connect_error());
        $this->db = mysqli_select_db($this->conexion, $this->base);
        if ($this->db == 0) die("Error al momento de la conexión con la base de datos " . mysqli_error($this->conexion));
        return $this->conexion;
    }

    public function ruta()
    {
        define('BASE_PATH', realpath(dirname(__FILE__) . '/../') . '/');
    }

    public function close()
    {
       if ($this->conexion) {
           $this->conexion->close();
       }
    }
}