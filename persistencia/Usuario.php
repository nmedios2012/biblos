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
   
    public function __construct(){//Construye el objeto usuario
        parent::__construct();
    }
    
    //Validar si la combinacion el usuario y password esta en la tabla usuarios
    public function loguearse($usuario,$pass){
        $encrypt_passwd = md5($pass);
        $stmt=$this->consultar("SELECT trim(rol) FROM usuarios WHERE usuario='$usuario' AND contrasenia='$encrypt_passwd'");
        $row=$stmt->fetch(PDO::FETCH_NUM);
        $respuesta=false;
        if ($row!=NULL){
            
           $respuesta=$row[0];
        }
        return $respuesta;

    }
    
    }

?>
