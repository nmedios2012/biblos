<?php

session_start();
include "../../negocio/configuracion/configuracion.php";
include "../../persistencia/conexion.php";
include "../../persistencia/Socio.php";
$admin = new Socio();
extract($_POST);

$conReserva = $admin->reservasActivas($_SESSION['usuario']);
$conPrestamo = $admin->prestamosActivos($_SESSION['usuario']);

echo 'RESERVA:';
echo $conReserva;
echo 'PRESTAMO:';
echo $conPrestamo;

if (($conReserva + $conPrestamo) >= 2) {
    $resultadoReserva = $admin->obtenerReservaUsuario($_SESSION['usuario']);
    $_SESSION['reservasActivas'] = serialize($resultadoReserva);
    $resultadoPrestamo=$admin->obtenerPrestamoUsuario($_SESSION['usuario']);
    $_SESSION['prestamoActivo'] = serialize($resultadoPrestamo);
    
    header("Location: ../../presentacion/paginas/socio/index.php?pag=conReservasOPrestamos");
} else {
//si no esta sancionado entra a buscar libros
    $resultado = $admin->listadoLibros();

    $_SESSION['busquedaLibros'] = serialize($resultado);

    header("Location: ../../presentacion/paginas/socio/index.php?pag=busquedaLibros");
}
?>
