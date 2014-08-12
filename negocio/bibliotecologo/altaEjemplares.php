<?php

session_start();
include "../../negocio/configuracion/configuracion.php";
include "../../persistencia/conexion.php";
include "../../persistencia/Bibliotecologo.php";
$admin = new Bibliotecologo();


$resultado = $admin->listarMateriales();
$resultado1 =$admin->cargarEstadoEjemplar();

$_SESSION['altaEjemplares'] = serialize($resultado);
$_SESSION['estadoEjemplar'] = serialize($resultado1);
//////////si quieres borrar una sola variable de session usas unset();
//unset($_SESSION['cliente']); 

header("Location: ../../presentacion/paginas/bibliotecologo/index.php?pag=altaEjemplares");

?>
