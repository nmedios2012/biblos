<?php

        session_start();
        include "../../negocio/configuracion/configuracion.php";	
        include "../../persistencia/conexion.php";
        
        include "../../persistencia/Administrador.php";
        $admin=new Administrador();
        
        $resultado=$admin->listadoMaterial();
       
        $_SESSION["probando"]= serialize($resultado);
        
        header("Location: ../../presentacion/paginas/administrador/index.php?pag=l_m")

?>
