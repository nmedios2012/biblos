<?php

        session_start();
        include "../configuracion/configuracion.php";	
        include "../../persistencia/conexion.php";
        include "../../persistencia/Administrador.php";
        $admin=new Administrador();
        
        $fecha=$_SESSION["fecha"];
        $ci=$_SESSION["ci"];
        $codigoEjemplar=$_SESSION["codigo"];
        unset($_SESSION["fecha"]);
        unset($_SESSION["ci"]);
        unset($_SESSION["codigo"]);
       
        $admin->agregarPrestamo($ci, $codigoEjemplar, $fecha);
       // header("Location: ../../presentacion/paginas/administrador/index.php?pag=e_p");
        
        
?>
