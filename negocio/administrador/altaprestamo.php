<?php
    session_start();
    $_SESSION["codigo"] = $_GET["codigo"];

    $fecha_devolucion = mktime(0,0,0,date("m"),date("d")+2,date("Y"));

    $dia_semana = date("w", $fecha_devolucion);
    if ($dia_semana == 4) {
        $fecha_devolucion = mktime(0,0,0,date("m"),date("d")+4,date("Y"));
    } else {
        if ($dia_semana == 5) {
            $fecha_devolucion = mktime(0,0,0,date("m"),date("d")+3,date("Y"));
        }
    }
    
    $_SESSION["fecha"] =$fecha_devolucion;
    header("Location: ../../presentacion/paginas/administrador/index.php?pag=a_p");
?>
