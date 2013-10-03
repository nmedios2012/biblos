<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Usuario
 *
 * @author informix
 */
class Usuario extends Conexion{
   
    public function __construct(){
        parent::__construct();
    }
    
    public function loguearse($usuario,$pass){
        $stmt=$this->consultar("SELECT trim(rol) FROM usuarios WHERE usuario='$usuario' AND contrasenia='$pass'");
        $row=$stmt->fetch(PDO::FETCH_NUM);
        $respuesta=false;
        if ($row!=NULL){
            
           $respuesta=$row[0];
        }
        return $respuesta;


    }
    
}

?>
