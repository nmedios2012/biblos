<?php
    session_start();
        include "../configuracion/configuracion.php";	
        include "../../persistencia/conexion.php";
        include "../../persistencia/Administrador.php";
        $admin=new Administrador();
        extract($_POST);
    
        $resultado=$admin->eliminar($documento);//Se obtiene el documento que se desea borrar
       header("Location: ../../presentacion/paginas/administrador/index.php?pag=editar_socio_admin")





?>