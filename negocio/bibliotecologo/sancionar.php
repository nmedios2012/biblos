<?php

session_start();
include "../../negocio/configuracion/configuracion.php";
include "../../persistencia/conexion.php";
include "../../persistencia/Bibliotecologo.php";
$admin = new Bibliotecologo();
extract($_POST);

$resultado = $admin->sancion($_POST["ci"], $_POST["ejemplar"],$_POST["selectSanciones"]);


    header("Location: ../../presentacion/paginas/bibliotecologo/index.php?pag=sancion&resultado=$resultado")

?>
