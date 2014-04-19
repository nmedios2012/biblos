<?php

	session_start();
        include "../configuracion/configuracion.php";	
        include "../../persistencia/conexion.php";
        include "../../persistencia/Bibliotecologo.php";
        $admin=new Bibliotecologo();
        extract($_POST);
        $resultado=$admin->buscar($documento);//Devuelve un usuario del documento dado. Sino existe devuelve null
        $_SESSION["resultado"]= $resultado;//El resultado se guarda en una sesión
        
        header("Location: ../../presentacion/paginas/bibliotecologo/index.php?pag=b_s")//vuelve a la pagina de busqueda
        
?>
