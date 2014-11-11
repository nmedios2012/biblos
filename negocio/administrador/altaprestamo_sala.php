<?php
    session_start();
    include "../../negocio/configuracion/configuracion.php";	
    include "../../persistencia/conexion.php";
    include "../../persistencia/Administrador.php";
    $admin=new Administrador();
    
    
        $codigo_material=$_GET["codigo"];
        $dato=$admin->codigoEjemplar($codigo_material);

        $_SESSION["codigo"] = $dato;
   
        $fecha_devolucion = mktime(0,0,0,date("m"),date("d"),date("Y"));

        $dia_semana = date("w", $fecha_devolucion);

        $_SESSION["fecha"] =$fecha_devolucion;
        header("Location: ../../presentacion/paginas/administrador/index.php?pag=alta_sala_admin");

?>
