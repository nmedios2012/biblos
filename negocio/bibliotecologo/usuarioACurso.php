<?php

session_start();
include "../../negocio/configuracion/configuracion.php";
include "../../persistencia/conexion.php";
include "../../persistencia/Bibliotecologo.php";
$admin = new Bibliotecologo();


$resultado = $admin->cargarCursos();
$resultado1 = $admin->listadoUsuario();

$_SESSION['listadoUsuarios'] = serialize($resultado1);
$_SESSION['CURSOS'] = serialize($resultado);
//////////si quieres borrar una sola variable de session usas unset();
//unset($_SESSION['cliente']); 

header("Location: ../../presentacion/paginas/bibliotecologo/index.php?pag=usuarioACurso");

?>
