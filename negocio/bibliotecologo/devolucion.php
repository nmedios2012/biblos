<?php

    session_start();
    include "../../negocio/configuracion/configuracion.php";
    include "../../persistencia/conexion.php";
    include "../../persistencia/Bibliotecologo.php";
    $admin = new Bibliotecologo();
    extract($_POST);
                
    $resultado = $admin->devolucion($_POST['ci'],$_POST["ejemplar"]);
    
    echo $resultado;
    
    
//    $_SESSION['confirmarReserva'] = serialize($resultado);

//    header("Location: ../../presentacion/paginas/socio/index.php?pag=reservar")
?>
