<?php
        session_start();
        
        
        include "../configuracion/configuracion.php";	
        include "../../persistencia/conexion.php";
        include "../../persistencia/Administrador.php";
        
        
        $admin=new Administrador();
        extract($_POST);
        $admin->agregarLibro($cod_mat,$isbn,$edicion,$est_log);
        $admin->agregarMaterial($cod_mat,$titulo,$anio,$com_gral,$est_log);
        header("Location: ../../presentacion/paginas/administrador/index.php?pag=alta_libro_admin_web")//a_l
            
?>

