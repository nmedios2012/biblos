<?php

	session_start();
        include "../configuracion/configuracion.php";	
        include "../../persistencia/conexion.php";
        include "../../persistencia/Bibliotecologo.php";
        $admin=new Bibliotecologo();
        extract($_POST);
        $resultado=$admin->buscar($documento);//Devuelve un usuario del documento dado. Sino existe devuelve null
        $telefono=$admin->buscarTelefono($documento);
        $_SESSION["resultado"]= $resultado;//El resultado se guarda en una session
        $_SESSION["telefono"]=$telefono[0];
        $_SESSION["celular"]=$telefono[1];
        header("Location: ../../presentacion/paginas/bibliotecologo/index.php?pag=alta_prestamo")//vuelve a la pagina de busqueda
        
?>
