<?php

        session_start();
        
        //Incluirmos archivos de base de datos,clase administrador y configuracion
        include "../../negocio/configuracion/configuracion.php";	
        include "../../persistencia/conexion.php";
        include "../../persistencia/Administrador.php";
        
        //Creamos un objeto
        $admin=new Administrador();
        
        //Traemos de las reservas 
        $resultado=$admin->listadoUsuario();
        
        //Registramos el resultamos 
        $_SESSION["probando"]= serialize($resultado);
        
        //Redireccionamos
        header("Location: ../../presentacion/paginas/administrador/index.php?pag=listado_socio_admin")

?>
