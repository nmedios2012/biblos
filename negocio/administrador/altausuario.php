<?php
        session_start();
        include "../configuracion/configuracion.php";	
        include "../../persistencia/conexion.php";
        include "../imagenes.php";
        include "../../persistencia/Administrador.php";
        $admin=new Administrador();
        extract($_POST);//Traer los valores de la variable
        $foto=$_FILES["foto"];
        $insertado=false;
        if($foto!=NULL){//Controlamos si el usuario subio foto o no
            $array=Array("jpg","gif","png","bmp","jpeg");//Autorizacion de los formatos de imagen
            $archivo=new uploadImagen($foto,$array,1048576);//Creamos el objeto que administrara nuestra foto
            if($archivo->pesoByte()){//Dice si los mb de la imagen esta dentro de los intervalos propuesto
                if($archivo->validarExtension()){//
                    if($archivo->moverArchivo("../../presentacion/imagenes/fotousuario/", $documento .".jpg")){//se mueve la imagen al servidor
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
            if(isset($telefono)){//si ingreso telefono en el formulario alta usuario
                $admin->insertarTelefono($ci, $telefono);//Se guarda en la tabla de telefonos
            }
            if(isset($celular)){//si ingreso celular en el formulario alta usuario
                $admin->insertarTelefono($ci, $celular);//Se guarda en la tabla de telefonos
            }
            $admin->agregarUsuario($documento, $nombre, $apellido, $ciudad,$direccion,$nro_apto,$nro_puerta,$mail);//Se guardar los datos restante en la tabla usuario
            $_SESSION["mensaje"]="Se ingreso correctamente";
        }
        else{
            echo $_SESSION["mensaje"];
        }
        header("Location: ../../presentacion/paginas/administrador/index.php?pag=a_s")//Se vuelve a la pagina de alta
        
?>

