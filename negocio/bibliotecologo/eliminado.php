<?php
    session_start();
        include "../configuracion/configuracion.php";	
        include "../../persistencia/conexion.php";
        include "../../persistencia/Bibliotecologo.php";
        $admin=new Bibliotecologo();
        extract($_POST);
    
        $resultado=$admin->eliminar($documento);// Se obtiene el documento que se desea borrar
       header("Location: ../../presentacion/paginas/bibliotecologo/index.php?pag=b_s")





?>