<?php

session_start();
include "../../negocio/configuracion/configuracion.php";
include "../../persistencia/conexion.php";
include "../../persistencia/Socio.php";
$admin = new Socio();
extract($_POST);

$conReserva = $admin->reservasActivas($_SESSION['usuario']);
$conPrestamo = $admin->prestamosActivos($_SESSION['usuario']);
$conSanciones = $admin->sancionesActivas($_SESSION['usuario']);

echo "RESERVA:";
echo $conReserva;
echo "    PRESTAMO:";
echo $conPrestamo;
echo "   SANCION:";
echo $conSanciones;

//
if ($conSanciones >= 1) {
     $resultadoSancion = $admin->obtenerSancionUsuario($_SESSION['usuario']);
     $_SESSION['sancionesActivas'] = serialize($resultadoSancion);
    header("Location: ../../presentacion/paginas/socio/index.php?pag=usuarioSancionado");
} else {

    if (($conReserva + $conPrestamo) >= 3) {
        $resultadoReserva = $admin->obtenerReservaUsuario($_SESSION['usuario']);
        $_SESSION['reservasActivas'] = serialize($resultadoReserva);
        $resultadoPrestamo = $admin->obtenerPrestamoUsuario($_SESSION['usuario']);
        $_SESSION['prestamoActivo'] = serialize($resultadoPrestamo);

        header("Location: ../../presentacion/paginas/socio/index.php?pag=conReservasOPrestamos");
    } else {
//si no esta sancionado entra a buscar libros
        $resultado = $admin->listadoLibros();

        $_SESSION['busquedaLibros'] = serialize($resultado);

        header("Location: ../../presentacion/paginas/socio/index.php?pag=busquedaLibros");
    }
}
?>
