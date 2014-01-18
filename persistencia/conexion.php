<?php

    abstract class Conexion{
        private $conexion;//Atributos de la clase conexion
        
        public function __construct($servidor=SERVIDOR,$puerto=PUERTO,$usuario=USUARIO,$pass=PASS,$base=BASE){//Es el constructo de la clase conexion
            $this->conexion=  new PDO("informix:host=$servidor; service=$puerto; database=$base; server=nmedios_informix;
            protocol=onsoctcp; EnableScrollableCursors=1;",$usuario, $pass);
        }
        
        //Me dice si hay conexion a la base
        public function isConexion(){
            return ($this->conexion!=null);
            
        }
        
        //Administra la consulta con nuestra base de datos que esta actualmente conectado
        public function consultar($sql){
            return $this->conexion->query($sql);
            
        }
       
    }



?>