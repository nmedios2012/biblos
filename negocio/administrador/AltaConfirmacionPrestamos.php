<?php

        session_start();
        
        //Incluirmos archivos de base de datos,clase administrador y configuracion
        include "../configuracion/configuracion.php";	
        include "../../persistencia/conexion.php";
        include "../../persistencia/Administrador.php";
        
        //Creamos el objeto
        $admin=new Administrador();

        //Controlamos el prestamos
        $fecha=$_SESSION["fecha"];
        $ci=$_SESSION["ci"];
        $codigoEjemplar=$_SESSION["codigo"];
        
        //El usuario que cumpla con las condiciones de politica para prestar
        if($admin->controlPrestamo($ci,$codigoEjemplar)){
            //Controla que el usuario no tenga mas libro de lo permitido
            if($admin->cantidadLibros($ci,$codigoEjemplar)<3){
                //Controla que el usuario este habilitado para sacar libros
                if(!$admin->sancionado($ci)){
                    
                    $admin->agregarPrestamo($ci, $codigoEjemplar, $fecha);
                    
                    //Buscar el libro correspondiente al ejemplar
                    $libro=$admin->buscarLibro($codigoEjemplar);

                    //Registramos el resultamos
                    $_SESSION["titulo"]=$libro;
                    
                    //Redireccionar si hay exito
                    header("Location: ../../presentacion/paginas/administrador/index.php?pag=confirmacion_prestamo");
                }
                else{
                    //Redireccionar que el usuario esta supendido
                    header("Location: ../../presentacion/paginas/administrador/index.php?pag=el_usuario_sancionado");
                    
                }
            }
            else{
                //Redireccionar tiene demasiado prestado
                header("Location: ../../presentacion/paginas/administrador/index.php?pag=ya_se_paso");
            }
        }
        else{
         //Redireccionar ya esta prestado
         header("Location: ../../presentacion/paginas/administrador/index.php?pag=ya_tiene_prestado");
            
        }

?>
