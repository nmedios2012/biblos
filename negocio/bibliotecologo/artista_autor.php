<?php

        session_start();
        include "../configuracion/configuracion.php";	
        include "../../persistencia/conexion.php";
        include "../../persistencia/Bibliotecologo.php";
        $admin=new Bibliotecologo();
        extract($_POST);
        $admin->agregarAutor($cod_art,$art_1,$art_2,$art_3,$id_pais,$fec_alta,$est_log);
        $admin->agregarRol_Autor($id_rol,$rol,$est_log);
        header("Location: ../../presentacion/paginas/bibliotecologo/index.php?pag=alta_autores.php")
?>
