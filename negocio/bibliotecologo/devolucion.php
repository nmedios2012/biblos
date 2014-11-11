<?php

    session_start();
    include "../../negocio/configuracion/configuracion.php";
    include "../../persistencia/conexion.php";
    include "../../persistencia/Bibliotecologo.php";
    $admin = new Bibliotecologo();
    extract($_POST);
                
    $resultado = $admin->devolucion($_POST['ci'],$_POST['ejemplar'],$_POST['estadoDevolucion']);
    
    header("Location: ../../presentacion/paginas/bibliotecologo/index.php?pag=devolucion&resultado=$resultado")
?>
