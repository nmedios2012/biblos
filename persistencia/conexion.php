<?php

    abstract class Conexion{
        private $conexion;
        
        public function __construct($servidor=SERVIDOR,$puerto=PUERTO,$usuario=USUARIO,$pass=PASS,$base=BASE){
            $this->conexion=  new PDO("informix:host=$servidor; service=$puerto; database=$base; server=nmedios_informix;
            protocol=onsoctcp; EnableScrollableCursors=1;",$usuario, $pass);
        }
        
        public function isConexion(){
            return ($this->conexion!=null);
            
        }
        
        public function consultar($sql){
            return $this->conexion->query($sql);
            
        }
        
       
    }



?>