<?php

        session_start();
        include "../configuracion/configuracion.php";	
        include "../../persistencia/conexion.php";
        include "../../persistencia/Administrador.php";
        $admin=new Administrador();
        extract($_POST);
        $admin->agregarPais($pais,$id_pais,$est_log);
        header("Location: ../../presentacion/paginas/administrador/index.php?pag=alta_pais_web")//a_p
        
?>
