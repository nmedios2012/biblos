<?php

	session_start();
        include "../configuracion/configuracion.php";	
        include "../../persistencia/conexion.php";
        include "../../persistencia/Administrador.php";
        $admin=new Administrador();
        extract($_POST);
        $resultado=$admin->buscar($documento);//Devuelve un usuario del documento dado. Sino existe devuelve null
        $telefono=$admin->buscarTelefono($documento);
        $_SESSION["resultado"]= $resultado;//El resultado se guarda en una session
        $_SESSION["telefono"]=$telefono[0];
        $_SESSION["celular"]=$telefono[1];
        header("Location: ../../presentacion/paginas/administrador/index.php?pag=alta_prestamo_admin")//vuelve a la pagina de busqueda
        
?>
