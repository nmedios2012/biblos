<?php
session_start();
$_SESSION["codigo"]=$_GET["codigo"];
header("Location: ../../presentacion/paginas/bibliotecologo/index.php?pag=prestamo");
?>
