<?php

        session_start();
        include "../../negocio/configuracion/configuracion.php";	
        include "../../persistencia/conexion.php";
        
        include "../../persistencia/Bibliotecologo.php";
        $admin=new Bibliotecologo();
        
        $resultado=$admin->listadoUsuario();
        
        $_SESSION["probando"]= serialize($resultado);
        
        header("Location: ../../presentacion/paginas/bibliotecologo/index.php?pag=listasocios")

?>