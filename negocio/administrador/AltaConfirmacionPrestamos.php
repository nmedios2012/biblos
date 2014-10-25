<?php

        session_start();
        
        include "../configuracion/configuracion.php";	
        include "../../persistencia/conexion.php";
        include "../../persistencia/Administrador.php";
        $admin=new Administrador();

        $fecha=$_SESSION["fecha"];
        $ci=$_SESSION["ci"];
        $codigoEjemplar=$_SESSION["codigo"];
        if($admin->controlPrestamo($ci,$codigoEjemplar)){
            $admin->agregarPrestamo($ci, $codigoEjemplar, $fecha);
            //Falta actualizar el estadoi en ejemplar
            $libro=$admin->buscarLibro($codigoEjemplar);

            $_SESSION["titulo"]=$libro;

            header("Location: ../../presentacion/paginas/administrador/index.php?pag=confirmacion_prestamo");
        }
        else{
         header("Location: ../../presentacion/paginas/administrador/index.php?pag=ya_tiene_prestado");
            
        }

?>
