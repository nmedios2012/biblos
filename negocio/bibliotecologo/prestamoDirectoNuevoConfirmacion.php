
<?php 

session_start();
include "../../negocio/configuracion/configuracion.php";
include "../../persistencia/conexion.php";
include "../../persistencia/Bibliotecologo.php";
$admin = new Bibliotecologo();

extract($_POST);            
//verificar sanciones anteriormente o prestamos y esas cosas que ya esta resueltlo en
//socio



$conReserva = $admin->reservasActivas($_POST["cedula"]);
$conPrestamo = $admin->prestamosActivos($_POST["cedula"]);
$conSanciones = $admin->sancionesActivas($_POST["cedula"]);

echo "RESERVA:";
echo $conReserva;
echo "    PRESTAMO:";
echo $conPrestamo;
echo "   SANCION:";
echo $conSanciones;
echo $_POST["prestamoSala"];
//
if ($conSanciones >= 1) {
    $resultado="Usuario Sancionado prestamos deshabilitados";
} else if (($conReserva + $conPrestamo) >= 3) {
    $resultado="Usuario con mas de 3 prestamos o reservas";
    } else {
//si no esta sancionado habilitado a llevarse el libro
    $resultado = $admin->prestamoDirectoNuevo($_POST["cedula"], $_POST["ejemplarCodigo"] ,$_POST["selectcodConservacion"],$_POST["prestamoSala"]);
//header("Location: ../../presentacion/paginas/bibliotecologo/index.php?pag=prestamoDirectoNuevoConfirmacion&resultado=$resultado");
    }


header("Location: ../../presentacion/paginas/bibliotecologo/index.php?pag=prestamoDirectoNuevoConfirmacion&resultado=$resultado");




//$resultado = $admin->prestamoDirectoNuevo($_POST["cedula"], $_POST["ejemplarCodigo"] ,$_POST["selectcodConservacion"]);

//echo $resultado;
//
//$_SESSION['a'] = serialize($resultado);
//
////////////si quieres borrar una sola variable de session usas unset();
////unset($_SESSION['cliente']); 
//
//header("Location: ../../presentacion/paginas/bibliotecologo/index.php?pag=prestamoDirectoNuevoConfirmacion");
?>