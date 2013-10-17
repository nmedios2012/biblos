<?php
        session_start();
        include "../configuracion/configuracion.php";	
        include "../../persistencia/conexion.php";
        include "../../persistencia/Bibliotecologo.php";
        $admin=new Bibliotecologo();
        extract($_POST);
        $admin->agregarUsuario($documento, $nombre, $apellido, $ciudad,$direccion,$nro_apto,$nro_puerta,$mail);
        header("Location: ../../presentacion/paginas/bibliotecologo/index.php?pag=a_s")
        
?>

