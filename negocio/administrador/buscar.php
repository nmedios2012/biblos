<?php

	session_start();
        include "../configuracion/configuracion.php";	
        include "../../persistencia/conexion.php";
        include "../../persistencia/Administrador.php";
        $admin=new Administrador();
        extract($_POST);
        $resultado=$admin->buscar($documento);//Devuelve un usuario del documento dado. Sino existe devuelve null
        $_SESSION["resultado"]= $resultado;//El resultado se guarda en una session
        
        header("Location: ../../presentacion/paginas/administrador/index.php?pag=editar_socio_admin")//vuelve a la pagina de busqueda
        
?>
