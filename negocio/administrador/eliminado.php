<?php

    session_start();

    //Incluirmos archivos de base de datos,clase administrador y configuracion
    include "../configuracion/configuracion.php";
    include "../../persistencia/conexion.php";
    include "../../persistencia/Administrador.php";
    
    //Creamos el objeto
    $admin = new Administrador();
    
    //La informacion
    extract($_POST);

    
    $resultado = $admin->eliminar($documento); //Se obtiene el documento que se desea borrar
    header("Location: ../../presentacion/paginas/administrador/index.php?pag=editar_socio_admin")
?>