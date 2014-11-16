<?php

session_start();
include "../../negocio/configuracion/configuracion.php";
include "../../persistencia/conexion.php";
include "../../persistencia/Bibliotecologo.php";
$admin = new Bibliotecologo();

$resultadoUsuarios = $admin->listadoUsuario();
$resultadoLibros = $admin->listadoLibros();
$resultadoCodConservacion = $admin->cargarEstadosConservacion();

$_SESSION['listadoUsuarios'] = serialize($resultadoUsuarios);
$_SESSION['busquedaLibros'] = serialize($resultadoLibros);
$_SESSION['codConservacion'] = serialize($resultadoCodConservacion);

//////////si quieres borrar una sola variable de session usas unset();
//unset($_SESSION['cliente']); 

header("Location: ../../presentacion/paginas/bibliotecologo/index.php?pag=prestamoDirectoNuevo");
?>