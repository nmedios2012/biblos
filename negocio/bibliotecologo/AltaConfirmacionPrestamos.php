<?php

        session_start();
        include "../configuracion/configuracion.php";	
        include "../../persistencia/conexion.php";
        include "../../persistencia/Bibliotecologo.php";
        $admin=new Bibliotecologo();
        
        $fecha=$_SESSION["fecha"];
        $documento=$_SESSION["ci"];
        $codigoEjemplar=$_SESSION["codigo"];

        $admin->agregarPrestamo($documento, $codigoEjemplar, $fecha);
        //Falta actualizar el estadoi en ejemplar
        $libro=$admin->buscarLibro($codigoEjemplar);
        
        $_SESSION["titulo"]=$libro;
        header("Location: ../../presentacion/paginas/bibliotecologo/index.php?pag=confirmacion_prestamo");

?>
