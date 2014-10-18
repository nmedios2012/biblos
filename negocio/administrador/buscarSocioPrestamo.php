<?php

	session_start();
        include "../configuracion/configuracion.php";	
        include "../../persistencia/conexion.php";
        include "../../persistencia/Administrador.php";
        $admin=new Administrador();
        extract($_POST);
        
        $resultado=$admin->buscar($documento);//Devuelve un usuario del documento dado. Sino existe devuelve null
        $_SESSION["resultado"]= $resultado;//El resultado se guarda en una session
        if($documento!=null){
            if($admin->cantidadLibros($documento)<3){
                $telefono=$admin->buscarTelefono($documento);
                echo $admin->cantidadLibros($documento);
               if(isset($telefono[0]))
                    $_SESSION["telefono"]=$telefono[0];
               
                if(isset($telefono[1]))
                    $_SESSION["celular"]=$telefono[1];
            }
            else{
                $_SESSION["error"]=true;
                echo "ssss";
               
            }
        }

       header("Location: ../../presentacion/paginas/administrador/index.php?pag=alta_prestamo_admin")//vuelve a la pagina de busqueda
        
?>
