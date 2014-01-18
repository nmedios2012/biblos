<?php
        session_start();
        include "../configuracion/configuracion.php";	
        include "../../persistencia/conexion.php";
        include "../imagenes.php";
        include "../../persistencia/Bibliotecologo.php";
        $admin=new Bibliotecologo();
        extract($_POST);
        $foto=$_FILES["foto"];
        $insertado=false;
        if($foto!=NULL){
            $array=Array("jpg","gif","png","bmp");
            $archivo=new uploadImagen($foto,$array,1048576);
            if($archivo->pesoByte()){
                if($archivo->validarExtension()){
                    if($archivo->moverArchivo("../../presentacion/imagenes/fotousuario/", $documento .".jpg")){
                        $insertado=true;
                    }
                    else{
                        $_SESSION["mensaje"]="Error de movimiento";
                    }
                }
                else{
                    $_SESSION["mensaje"]="Extension no valida";
                }
            }
            else{
                $_SESSION["mensaje"]="Error superar el mb";
            }
        }
        else{
            $insertado=true;
        }
        
        if($insertado){
            $admin->agregarUsuario($documento, $nombre, $apellido, $ciudad,$direccion,$nro_apto,$nro_puerta,$mail);
            $_SESSION["mensaje"]="Se ingreso correctamente";
        }
        
       header("Location: ../../presentacion/paginas/bibliotecologo/index.php?pag=a_s")
        

        /*$admin->agregarUsuario($documento, $nombre, $apellido, $ciudad,$direccion,$nro_apto,$nro_puerta,$mail);
        header("Location: ../../presentacion/paginas/bibliotecologo/index.php?pag=a_s")*/
        
?>

