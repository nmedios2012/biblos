<?php

        session_start();
        
        //Incluirmos archivos de base de datos,clase administrador y configuracion
        include "../../negocio/configuracion/configuracion.php";	
        include "../../persistencia/conexion.php";
        include "../../persistencia/Bibliotecologo.php";
        
        //Creamos el objeto
        $admin=new Bibliotecologo();
        
        //Traemos de los ejemplares que cumple con las condiciones:
              //Que haya disponibilidad, si hay mas de uno aparece la
              //opcion prestamos domicilio
        $resultado=$admin->listadoEjemplarMaterialPrestamo();
       
        //Registramos el resultamos  
        $_SESSION["probando"]= serialize($resultado);
        
        //Redireccionamos
        header("Location: ../../presentacion/paginas/bibliotecologo/index.php?pag=listado_material_biblo")

?>
