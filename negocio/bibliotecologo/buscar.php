<?php

	session_start();
        include "../configuracion/configuracion.php";	
        include "../../persistencia/conexion.php";
        include "../../persistencia/Bibliotecologo.php";
        $admin=new Bibliotecologo();
        extract($_POST);
        $resultado=$admin->buscar($documento);
        $_SESSION["resultado"]= $resultado;
        
        header("Location: ../../presentacion/paginas/bibliotecologo/index.php?pag=b_s")
        
?>
