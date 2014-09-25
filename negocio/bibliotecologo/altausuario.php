<?php
        session_start();
        include "../configuracion/configuracion.php";	
        include "../../persistencia/conexion.php";
        include "../imagenes.php";
        include "../../persistencia/Bibliotecologo.php";
        $admin=new Bibliotecologo();
        extract($_POST); //Trae los valores de la variable
        $foto=$_FILES["foto"];
        $insertado=false;
        if($foto!=NULL){ //Controlamos si el usuario sube foto o no
            $array=Array("jpg","gif","png","bmp"); //Autorización de los formatos de imágen
            $archivo=new uploadImagen($foto,$array,1048576); // Creamos el objeto que administrará nuestra foto
            if($archivo->pesoByte()){ //Dice si los mb de la imágen está dentro de los interválos propuestos
                if($archivo->validarExtension()){
                    if($archivo->moverArchivo("../../presentacion/imagenes/fotousuario/", $documento .".jpg")){ // Se mueve la imágen al servidor
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
        
            
            if(isset($telefono)){//si ingreso telefono en el formulario alta usuario
                $admin->insertarTelefono($documento, $telefono);//Se guarda en la tabla de telefonos
            }
            if(isset($celular)){//si ingreso celular en el formulario alta usuario
                $admin->insertarTelefono($documento, $celular);//Se guarda en la tabla de telefonos
            }
           
            $admin->agregarUsuario($documento, $nombre, $apellido, $ciudad,$direccion,$nro_apto,$nro_puerta,$mail);//Se guardar los datos restante en la tabla usuario
            //Crea una cuenta de usuario
            $admin->agregarCuenta_Usuario($nombre, $apellido, $mail, $documento);
            $admin->encriptar($mail,$documento,$encrypt_passwd);
            $_SESSION["mensaje"]="Se ingreso correctamente";
            
        
       header("Location: ../../presentacion/paginas/bibliotecologo/index.php?pag=a_s")
        
              
?>

