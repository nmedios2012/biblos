<?php

session_start();
include "../../negocio/configuracion/configuracion.php";
include "../../persistencia/conexion.php";
include "../../persistencia/Bibliotecologo.php";
$admin = new Bibliotecologo();
extract($_POST);
//echo " Numero Reserva  ".$_POST["nro_reserva"];
//echo "  CEdula ".$_POST["ci"];
//echo "   CodigoMaterial".$_POST["codigo_material"];
//echo "   CodigoMaterial".$_POST["ejemplar"];
//echo "   CodigoMaterial".$_POST["selectcodConservacion"];


    $prestamoSala="";
    $resultado= $admin->prestamoDeReservaNuevo($_POST["ci"], $_POST["ejemplar"], $_POST["selectcodConservacion"], $prestamoSala);
    $resultadoBreserva=$admin->bajaReserva($_POST["nro_reserva"]);
    header("Location: ../../presentacion/paginas/bibliotecologo/index.php?pag=confirmacionPrestamoDeReserva&resultado=$resultado&resultadoBreserva=$resultadoBreserva");
//        
//    $codigoReserva=$_GET["r"];
//    
//    $dato=$admin->obtenerReservar($codigoReserva);
//    
//    $dato2=$admin->codigoEjemplar($dato["codigo_material"]);
//    $_SESSION["ci"]=$dato["ci"];
//    $_SESSION["codigo"] = $dato2;
//    $_SESSION["ci"]=$_GET["c"];
//    if (file_exists("../../presentacion/imagenes/fotousuario/" . $_GET["c"] . ".jpg")) {
//        $_SESSION["foto"] = $_GET["c"] . ".jpg";
//    } else {
//        $_SESSION["foto"] = "silueta.jpg";
//     }
//
//    
//
//    $fecha_devolucion = mktime(0,0,0,date("m"),date("d")+2,date("Y"));
//
//    $dia_semana = date("w", $fecha_devolucion);
//    if ($dia_semana == 4) {
//        $fecha_devolucion = mktime(0,0,0,date("m"),date("d")+4,date("Y"));
//    } else {
//        if ($dia_semana == 5) {
//            $fecha_devolucion = mktime(0,0,0,date("m"),date("d")+3,date("Y"));
//        }
//    }
//    
//    $_SESSION["fecha"] =date("d-m-Y",$fecha_devolucion);
//    $_SESSION["dia"] =date("d",$fecha_devolucion);
//    $_SESSION["mes"] =date("m",$fecha_devolucion);
//    $_SESSION["anio"] =date("Y",$fecha_devolucion);
//    if(!isset($_GET["c"])){
//        header("Location: ../../presentacion/paginas/bibliotecologo/index.php?pag=sugerencia_fecha_prestamo");
//    }
//    else{
//        
//        header("Location: ../../presentacion/paginas/bibliotecologo/index.php?pag=sugerencia_fecha_prestamo&c=1");
//    }
?>
