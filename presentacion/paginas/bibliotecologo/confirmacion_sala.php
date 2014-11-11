
<?php

    $fecha=$_SESSION["fecha"];
    $documento=$_SESSION["ci"];
    $codigo=$_SESSION["codigo"];
    $titulo=$_SESSION["titulo"];
    
    unset($_SESSION["fecha"]);
    unset($_SESSION["ci"]);
    unset($_SESSION["codigo"]);
    unset($_SESSION["titulo"]);
    
?>



<p>ADMINISTRACI&Oacute;N DE PRESTAMO - EN SALA</p>

<div>
    Falta actualizar a la tabla ejemplar_material dla columna estado
    Se realizo exitosamente el prestamos para la cedula <?php echo $documento; ?> y el titulo del libro es  <?php echo $titulo; ?> con el codigo <?php echo $codigo; ?>
    <br/>Debe devolver para el <?php echo $fecha; ?>
</div>