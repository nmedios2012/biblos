<?php

session_start();
include "../../negocio/configuracion/configuracion.php";
include "../../persistencia/conexion.php";
include "../../persistencia/Bibliotecologo.php";
$admin = new Bibliotecologo();
extract($_POST);
//foreach ($_POST as $key => $value) {
//    echo "<tr>";
//    echo "<td>";
//    echo $key;
//    echo "</td>";
//    echo "<td>";
//    echo $value;
//    echo "</td>";
//    echo "</tr>";
//}
$resultado = $admin->sancion($_POST["ci"], $_POST["ejemplar"],$_POST["selectSanciones"]);
echo $resultado;


//    $_SESSION['confirmarReserva'] = serialize($resultado);
//    header("Location: ../../presentacion/paginas/socio/index.php?pag=reservar")
?>
