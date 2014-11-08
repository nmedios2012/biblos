<?php

    session_start();
    include "../../negocio/configuracion/configuracion.php";
    include "../../persistencia/conexion.php";
    include "../../persistencia/Socio.php";
    $admin = new Socio();
    extract($_POST);
                
    $resultado = $admin->confirmarReserva($_SESSION['usuario'],$_POST["seleccionado"]);
    
//    $_SESSION['confirmarReserva'] = serialize($resultado);

    header("Location: ../../presentacion/paginas/socio/index.php?pag=reservar&resultado=$resultado")
?>
