<?php

        session_start();
        include "../configuracion/configuracion.php";	
        include "../../persistencia/conexion.php";
        include "../imagenes.php";
        include "../../persistencia/Administrador.php";
        $admin=new Administrador();
        extract($_POST);
        $foto=$_FILES["foto"];
        $insertado=false;
        if($foto!=NULL){//Se revisa si se quiere modificar la imagen
            $array=Array("jpg","jpeg","gif","png","bmp");//los formatos validos
            $archivo=new uploadImagen($foto,$array,1048576);//creamo el objeto que administrata la imagen
            if($archivo->pesoByte()){//Se controla el mb que este dentro de lo autorizado
                if($archivo->validarExtension()){//controla la extension de la imagen
                    if(file_exists("../../presentacion/imagenes/fotousuario/".$documento .".jpg")){//Controlamos si existe la imagen
                        unlink("../../presentacion/imagenes/fotousuario/".$documento .".jpg");//Se intenta borra la imagen desde php(problema permiso de apache,linux o alguien)
                        
                    }
                    if($archivo->moverArchivo("../../presentacion/imagenes/fotousuario/", $documento .".jpg")){//Se guarda la imagen
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
                $_SESSION["mensaje"]="Error supera el mb";
            }
        }
        else{
            $insertado=true;
        }
        
            $admin->editarUsuario($documento, $nombre, $apellido, $ciudad,$direccion,$nro_apto,$nro_puerta,$mail,$telefono1,$telefono2,$telefono,$celular);//Se manda la informacion del usuario para modificar
            //$_SESSION["mensaje"]="Se edito correctamente los datos";
            if(!$inserto)
                $_SESSION["mensaje"]=$_SESSION["mensaje"]." pero no la imagen";
       
       header("Location: ../../presentacion/paginas/administrador/index.php?pag=editar_socio_admin")//Se vuelve a la pagina de busqueda

?>
