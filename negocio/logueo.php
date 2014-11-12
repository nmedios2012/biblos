<?php
        session_start();        
        include "../negocio/configuracion/configuracion.php";	
        include "../persistencia/conexion.php";
	include "../persistencia/Usuario.php";
        $comunicacion=new Usuario();
        extract($_POST);
$rolUsuario=$comunicacion->loguearse($usuario, $pass);
	if($rolUsuario!=NULL){
		$_SESSION["usuario"]=$usuario;
                $_SESSION["tipo"]=$rolUsuario;
                $_SESSION["logueado"]=true;
		header("location:".RUTA."presentacion/paginas/$rolUsuario/index.php");
	}
	else{
                $_SESSION["mensajelogueo"]="Usuario y/o contraseña equivocada";
		header("location:".RUTA."index.php");                   
	}        
         
         
?>
