<?php
        session_start();
        include "../configuracion/configuracion.php";	
        include "../../persistencia/conexion.php";
        include "../../persistencia/Bibliotecologo.php";
        $admin=new Bibliotecologo();
        extract($_POST);
        $admin->agregarLibro($cod_mat,$isbn,$edicion,$est_log);
        $admin->agregarMaterial($cod_mat,$titulo,$anio,$com_gral,$est_log);
        header("Location: ../../presentacion/paginas/bibliotecologo/index.php?pag=a_l")
            
?>

