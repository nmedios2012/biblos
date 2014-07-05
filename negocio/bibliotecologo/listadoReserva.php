<?php

        session_start();
        include "../../negocio/configuracion/configuracion.php";	
        include "../../persistencia/conexion.php";
        
        include "../../persistencia/Bibliotecologo.php";
        $admin=new Bibliotecologo();
        
        $resultado=$admin->listadoReservas();
        
        $_SESSION['listadoResBiblo']= serialize($resultado);
        
        header("Location: ../../presentacion/paginas/bibliotecologo/index.php?pag=listaReserva")

?>