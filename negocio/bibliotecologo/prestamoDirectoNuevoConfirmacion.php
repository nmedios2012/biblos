
<?php 

session_start();
include "../../negocio/configuracion/configuracion.php";
include "../../persistencia/conexion.php";
include "../../persistencia/Bibliotecologo.php";
$admin = new Bibliotecologo();

extract($_POST);            
//verificar sanciones anteriormente o prestamos y esas cosas que ya esta resueltlo en
//socio
$resultado = $admin->prestamoDirectoNuevo($_POST["cedula"], $_POST["ejemplarCodigo"] ,$_POST["selectcodConservacion"]);

echo $resultado;
//
//$_SESSION['a'] = serialize($resultado);
//
////////////si quieres borrar una sola variable de session usas unset();
////unset($_SESSION['cliente']); 
//
//header("Location: ../../presentacion/paginas/bibliotecologo/index.php?pag=prestamoDirectoNuevoConfirmacion");
?>