<?php
    session_start();
    
    //Obtenenmos el codigo material de otra pagina 
    $_SESSION["codigo"] = $_POST["codigo"];

    //El sistema suma fecha de hoy dos dias
    $fecha_devolucion = mktime(0,0,0,date("m"),date("d")+2,date("Y"));

    //Analizar el dia de la semana que el sistema asigno en la variable $fecha_devolucion.
    //Si cae fin de semana corre para adelante la asignacion fecha devolucion
    $dia_semana = date("w", $fecha_devolucion);
    if ($dia_semana == 4) {
        $fecha_devolucion = mktime(0,0,0,date("m"),date("d")+4,date("Y"));
    } else {
        if ($dia_semana == 5) {
            $fecha_devolucion = mktime(0,0,0,date("m"),date("d")+3,date("Y"));
        }
    }
    
    //Guarda los resultados de la asgnicion
    $_SESSION["fecha"] =date("d-m-Y",$fecha_devolucion);
    $_SESSION["dia"] =date("d",$fecha_devolucion);
    $_SESSION["mes"] =date("m",$fecha_devolucion);
    $_SESSION["anio"] =date("Y",$fecha_devolucion);
    
    //Redireccionar
    header("Location: ../../presentacion/paginas/bibliotecologo/index.php?pag=sugerencia_fecha_prestamo");
?>
