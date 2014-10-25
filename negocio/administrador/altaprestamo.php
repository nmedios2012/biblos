<?php
    session_start();
    include "../../negocio/configuracion/configuracion.php";	
    include "../../persistencia/conexion.php";
    include "../../persistencia/Administrador.php";
    $admin=new Administrador();
    
    
        $codigo_material=$_GET["codigo"];
        $dato=$admin->codigoEjemplar($codigo_material);

        $_SESSION["codigo"] = $dato;
   
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
        header("Location: ../../presentacion/paginas/administrador/index.php?pag=alta_prestamo_admin");

?>
