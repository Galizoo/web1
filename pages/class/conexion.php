<?php
    class Conexion {
        private $usuario = "root";
        private $clave = "";
        private $servidor = "localhost";
        private $bd = "bd_upc";

        public function Conectar() {
            try {
                $con = new PDO("mysql:host=$this->servidor;dbname=$this->bd;", $this->usuario, $this->clave);
                $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                return $con;
            } catch (PDOException $e) {
                echo "Hubo un error: ".$e->getMessage();
            }
        }
    }
