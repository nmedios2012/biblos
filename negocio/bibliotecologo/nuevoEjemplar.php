<?php

session_start();
include "../../negocio/configuracion/configuracion.php";
include "../../persistencia/conexion.php";
include "../../persistencia/Bibliotecologo.php";
$admin = new Bibliotecologo();

extract($_POST);

//echo $_POST['codigoMat'];
//echo"";
//echo $_POST['codigoEstado'];
$resultado = $admin->nuevoEjemplar($_POST['codigoMat'], $_POST['codigoEstado']);
echo 'SE EJECUTO LA PUTA QUE TE PARIO';
?>