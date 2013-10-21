<?php
    session_start();
        include "../configuracion/configuracion.php";	
        include "../../persistencia/conexion.php";
        include "../../persistencia/Administrador.php";
        $admin=new Administrador();
        extract($_POST);
    
        $resultado=$admin->eliminar($documento);
       header("Location: ../../presentacion/paginas/administrador/index.php?pag=b_s")





?>