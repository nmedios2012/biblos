<?php

        session_start();
        
        //Incluirmos archivos de base de datos,clase administrador y configuracion
        include "../../negocio/configuracion/configuracion.php";	
        include "../../persistencia/conexion.php";
        include "../../persistencia/Administrador.php";
        
        //Creamos el objeto
        $admin=new Administrador();
        
        //Traemos de los ejemplares que cumple con las condiciones:
              //Que haya disponibilidad, si hay mas de uno aparece la
              //opcion prestamos domicilio
        $resultado=$admin->listadoEjemplarMaterial();
       
        //Registramos el resultamos  
        $_SESSION["probando"]= serialize($resultado);
        
        //Redireccionamos
        header("Location: ../../presentacion/paginas/administrador/index.php?pag=listado_material_admin")

?>
