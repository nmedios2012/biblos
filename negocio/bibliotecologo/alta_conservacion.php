<?php

        session_start();
        include "../configuracion/configuracion.php";	
        include "../../persistencia/conexion.php";
        include "../../persistencia/Bibliotecologo.php";
        $admin=new Bibliotecologo();
        extract($_POST);
        $admin->agregarConservacion($cod_cnsv,$nom_cnsv,$est_log);
        //$admin->agregarPosterior($cod_cnsv,$cod_pst,$nom_pst,$est_log);
        header("Location: ../../presentacion/paginas/bibliotecologo/index.php?pag=a_c")
?>
