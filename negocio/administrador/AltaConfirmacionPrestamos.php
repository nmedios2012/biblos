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
        //
        if($admin->controlPrestamo($ci,$codigoEjemplar)){
            //Controla que el usuario no tenga mas libro de lo permitido
            if($admin->cantidadLibros($ci)<3){
                //Controla que el usuario este habilitado para sacar libros
                if(!$admin->sancionado($ci)){
                    
                    $admin->agregarPrestamo($ci, $codigoEjemplar, $fecha);
                    
                    //Buscar el libro correspondiente al ejemplar
                    $libro=$admin->buscarLibro($codigoEjemplar);

                    //Registramos el resultamos
                    $_SESSION["titulo"]=$libro;
                    
                    
                    header("Location: ../../presentacion/paginas/administrador/index.php?pag=confirmacion_prestamo");
                }
                else{
                    header("Location: ../../presentacion/paginas/administrador/index.php?pag=el_usuario_sancionado");
                    
                }
            }
            else{
                header("Location: ../../presentacion/paginas/administrador/index.php?pag=ya_se_paso");
            }
        }
        else{
         header("Location: ../../presentacion/paginas/administrador/index.php?pag=ya_tiene_prestado");
            
        }

?>
