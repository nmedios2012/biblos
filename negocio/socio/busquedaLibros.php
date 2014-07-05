<?php

        session_start();
        include "../../negocio/configuracion/configuracion.php";	
        include "../../persistencia/conexion.php";
        include "../../persistencia/Socio.php";
        $admin=new Socio();
        
        $resultado=$admin->listadoLibros();
        
        $_SESSION['busquedaLibros']= serialize($resultado);
        
        header("Location: ../../presentacion/paginas/socio/index.php?pag=busquedaLibros")

?>
