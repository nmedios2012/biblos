<?php

session_start();
include "../../negocio/configuracion/configuracion.php";
include "../../persistencia/conexion.php";
include "../../persistencia/Bibliotecologo.php";
$admin = new Bibliotecologo();
extract($_POST);
$resultado = $admin->asignarUsuarioCurso($_POST["cedula"], $_POST["codigocurso"]);

if ($resultado) {
    echo $resultado;
    echo "</br>";
    echo $_POST["cedula"];
    echo "</br>";
    echo $_POST["codigocurso"];
} else {
    echo "NO " . $resultado;
}
?>
