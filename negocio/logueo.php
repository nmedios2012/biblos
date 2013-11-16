<?php
        session_start();        
        include "../negocio/configuracion/configuracion.php";	
        include "../persistencia/conexion.php";
	include "../persistencia/Usuario.php";
        $comunicacion=new Usuario();
        extract($_POST);
	$usuario=$comunicacion->loguearse($usuario, $pass);
	if($usuario!=NULL){
		$_SESSION["tipo"]=$usuario;
		header("location:".RUTA."presentacion/paginas/$usuario/index.php");
	}
	else{
                $_SESSION["mensajelogueo"]="Usuario y/o contraseña equivocada";
		header("location:".RUTA."index.php");
	}
         
         
?>
