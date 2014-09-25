<?php

        session_start();
        include "../configuracion/configuracion.php";	
        include "../../persistencia/conexion.php";
        include "../../persistencia/Bibliotecologo.php";
        
        $admin=new Bibliotecologo();
        extract($_POST);
        $admin->encriptar($mail,$documento,$encrypt_passwd);
        header("Location: ../../presentacion/paginas/bibliotecologo/index.php?pag=cambio_contrasenia")
        

?>
