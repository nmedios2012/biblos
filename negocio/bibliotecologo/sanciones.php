<?php

        session_start();
        include "../configuracion/configuracion.php";	
        include "../../persistencia/conexion.php";
        include "../../persistencia/Bibliotecologo.php";
        $admin=new Bibliotecologo();
        extract($_POST);
        $admin->agregarSancion($codigo,$tipo_penaliz,$nombre,$descripcion,$est_log);
        header("Location: ../../presentacion/paginas/bibliotecologo/index.php?pag=penalizaciones")
        
?>
