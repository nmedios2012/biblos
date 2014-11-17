<?php

session_start();
include "../../negocio/configuracion/configuracion.php";
include "../../persistencia/conexion.php";

include "../../persistencia/Bibliotecologo.php";
$admin = new Bibliotecologo();

$resultado = $admin->listadoReservas();
$resultadoCodConservacion = $admin->cargarEstadosConservacion();
$cantidad = count($resultado);
$codigosEjemplares =array();
for ($i = 0; $i < $cantidad; $i++) {
    
    $codigosEjemplares[$i]=$admin->obtTodosEjemSegunCodMatYEst($resultado[$i]["codigo_material"], 3); //RESERVADO
    ;
}

$_SESSION['listadoResBiblo'] = serialize($resultado);
$_SESSION['ejemplaresPorMaterial'] = serialize($codigosEjemplares);
$_SESSION['codConservacion'] = serialize($resultadoCodConservacion);



header("Location: ../../presentacion/paginas/bibliotecologo/index.php?pag=listaReserva")
?>