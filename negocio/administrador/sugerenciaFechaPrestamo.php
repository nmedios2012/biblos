<?php
    session_start();
    $_SESSION["codigo"] = $_POST["codigo"];

    $fecha_devolucion = mktime(0,0,0,date("m"),date("d")+2,date("Y"));

    $dia_semana = date("w", $fecha_devolucion);
    if ($dia_semana == 4) {
        $fecha_devolucion = mktime(0,0,0,date("m"),date("d")+4,date("Y"));
    } else {
        if ($dia_semana == 5) {
            $fecha_devolucion = mktime(0,0,0,date("m"),date("d")+3,date("Y"));
        }
    }
    
    $_SESSION["fecha"] =date("d-m-Y",$fecha_devolucion);
    $_SESSION["dia"] =date("d",$fecha_devolucion);
    $_SESSION["mes"] =date("m",$fecha_devolucion);
    $_SESSION["anio"] =date("Y",$fecha_devolucion);
    header("Location: ../../presentacion/paginas/administrador/index.php?pag=sugerencia_fecha_prestamo");
?>
