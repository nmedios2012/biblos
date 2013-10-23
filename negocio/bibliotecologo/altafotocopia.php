<?php
        session_start();
        include "../configuracion/configuracion.php";	
        include "../../persistencia/conexion.php";
        include "../../persistencia/Bibliotecologo.php";
        $admin=new Bibliotecologo();
        extract($_POST);
        $admin->agregarFotocopia($cod_mat,$titulo,$cant_pag,$anio,$com_gral,$fec_alta,$est_log);
        header("Location: ../../presentacion/paginas/bibliotecologo/index.php?pag=a_f")
        
?>
