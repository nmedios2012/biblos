<?php

        session_start();
        include "../../negocio/configuracion/configuracion.php";	
        include "../../persistencia/conexion.php";
        
        include "../../persistencia/Bibliotecologo.php";
        $admin=new Bibliotecologo();
        
        $resultado=$admin->listarPrestamos();
        $resultadoSanciones=$admin->cargarSanciones();
        
        $_SESSION['listadoPrestamos']= serialize($resultado);
        $_SESSION['sanciones'] = serialize($resultadoSanciones);
        
        header("Location: ../../presentacion/paginas/bibliotecologo/index.php?pag=listaPrestamos")

?>