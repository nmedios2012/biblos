<?php

        session_start();
        
        //Incluirmos archivos de base de datos,clase bibloteca y configuracion
        include "../../negocio/configuracion/configuracion.php";	
        include "../../persistencia/conexion.php";
        include "../../persistencia/Bibliotecologo.php";
        
        //Creamos el objeto
        $admin=new Bibliotecologo();
        
        //Traemos de las reservas 
        $resultado=$admin->listadoReservas();
        
        //Registramos el resultamos 
        $_SESSION['listadoResBiblo']= serialize($resultado);
        
        //Redireccionamos
        header("Location: ../../presentacion/paginas/administrador/index.php?pag=lista_reserva")

?>