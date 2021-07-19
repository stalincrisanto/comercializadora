<?php 
    class Conexion{
        private $servidor;
        private $usuario;
        private $contrasena;
        private $db;
        public $conexion;

        public function __construct()
        {
            $this->servidor = "localhost";
            $this->usuario = "root";
            $this->contrasena = "";
            $this->db = "comercializadora";
        }

        function conectar()
        {
            $this->conexion = new mysqli($this->servidor,$this->usuario, $this->contrasena,$this->db);
            $this->conexion->set_charset("utf8");
        }

        function cerrar()
        {
            $this->conexion->close();
        }
    }
?>