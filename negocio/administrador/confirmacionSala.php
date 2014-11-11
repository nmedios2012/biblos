<?php
        session_start();
        
        include "../configuracion/configuracion.php";	
        include "../../persistencia/conexion.php";
        include "../../persistencia/Administrador.php";
        $admin=new Administrador();

        $codigoEjemplar=$_SESSION["codigo"];
        $ci=$_POST["ci"];
        $_SESSION["ci"]=$ci;
        
           
                if(!$admin->sancionado($ci)){
                    
                    $admin->agregarSala($ci, $codigoEjemplar);
                    //Falta actualizar el estadoi en ejemplar
                    $libro=$admin->buscarLibro($codigoEjemplar);

                    $_SESSION["titulo"]=$libro;
                    header("Location: ../../presentacion/paginas/administrador/index.php?pag=confirmacion_sala");
                }
                else{
                    header("Location: ../../presentacion/paginas/administrador/index.php?pag=el_usuario_sancionado");
                    
                }
            

        

?>
