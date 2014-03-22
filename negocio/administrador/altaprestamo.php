<?php
session_start();
$_SESSION["codigo"]=$_GET["codigo"];
header("Location: ../../presentacion/paginas/administrador/index.php?pag=a_p");
?>
