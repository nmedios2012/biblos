



<?php

if(isset($_GET["c"])){
    $ci=$_SESSION["ci"];
    $fecha=$_SESSION["fecha"];
   $mes=$_SESSION["mes"]-1;
   $dia=$_SESSION["dia"];
   $anio=$_SESSION["anio"];
   $codigo=$_SESSION["codigo"];
   $foto=$_SESSION["foto"];
   $mensaje="";
}
else
if (isset($_SESSION["resultado"]) && $_SESSION["resultado"] != NULL) {

    extract($_SESSION["resultado"]);
    $_SESSION["editar"]=$_SESSION["resultado"];
    //$mensaje=$_SESSION["mensaje"];
    $mensaje="";
   $fecha=$_SESSION["fecha"];
   $mes=$_SESSION["mes"]-1;
   $dia=$_SESSION["dia"];
   $anio=$_SESSION["anio"];
   $codigo=$_SESSION["codigo"];
   $_SESSION["ci"]=$ci;
    $activar = "";
    
} else {
    $nombre = "";
    $apellido = "";
    $ci = "";
    $codigo="";
    $activar = " disabled='disabled' ";
    $mensaje="";
    $mes="";
    $dia="";
    $anio="";
    $fecha="";

}
$codigoEjemplar=$_SESSION["codigo"];
?>
<script type="text/javascript">
    $(document).ready(inicializar);
    function inicializar(){
        $("#buscar").click(controlar);
        $("#editar").click(editar_pro);
    }
    function editar_pro(){
    
        $(location).attr('href',"index.php?pag=e_s");
    }
    
    function controlar() {
        if ($("#documento").val().match(/\d/)) {

            $("#frmBuscar").submit();


        }
        else{
            $("#mensaje").html("Formato invalido de documento");
        }
    }
</script>



<p>ADMINISTRACI&Oacute;N DE PRESTAMO - DOMICILIO</p>
<!--<form name="input" action="../../../negocio/bibliotecologo/buscarSocioPrestamo.php" method="post" id="frmBuscar">
    <p>Documento <input type="text" id="documento" name="documento" size="11" maxlength="11">
        &nbsp;&nbsp;&nbsp;&nbsp; <input type="button" id="buscar" value="Buscar"></p>
    <input type="hidden" name="pagina" value="alta_prestamo" />
</form>
<div id="mensaje">
    
</div>-->
<div>
    <div id="usuarioprestamo">
    <img src="../../imagenes/fotousuario/<?php echo $foto; ?>" width="150" height="150"/>
<p>CI : <label><?php echo $ci; ?></label><br/>
    <br />
    
</div>
<div id="ejemplar">
    Codigo Ejemplar: <?php echo $codigo; ?><br/>
    Fecha de sugerencia:<?php echo $fecha; ?>
    <div id="datepicker"></div>
    <script>
    $( "#datepicker" ).datepicker();
    $( "#datepicker" ).datepicker( "setDate", new Date( <?php echo $anio;?>, <?php echo $mes;?>, <?php echo $dia;?>) );
    $( "#datepicker" ).datepicker( "option","dayNamesShort",[ "Domingo", "Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sabado" ]  );
    $( "#datepicker" ).datepicker( "option", "firstDay", 1 );
    $( "#datepicker" ).datepicker("option", "minDate", new Date() );
    $( "#datepicker" ).datepicker( "option", "maxDate", "+1m" );
    $( "#datepicker" ).datepicker("option", "monthNames", ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Setiembre", "Octubre", "Noviembre", "Diciembre"]);
    
</script>
</div>
    
    
    
</div>
<div>
    <form name="prestar" method="post" action="../../../negocio/bibliotecologo/AltaConfirmacionPrestamos.php">
          <div id="datepicker"></div>
    <script>
    $( "#datepicker" ).datepicker();
    $( "#datepicker" ).datepicker( "setDate", new Date( <?php echo $anio;?>, <?php echo $mes;?>, <?php echo $dia;?>) );
    $( "#datepicker" ).datepicker( "option","dayNamesShort",[ "Domingo", "Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sabado" ] );
    $( "#datepicker" ).datepicker( "option", "firstDay", 1 );
    $( "#datepicker" ).datepicker("option", "minDate", new Date() );
    $( "#datepicker" ).datepicker( "option", "maxDate", "+1m" );
    $( "#datepicker" ).datepicker("option", "monthNames", ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Setiembre", "Octubre", "Noviembre", "Diciembre"]);
    $('#datepicker').datepicker({
    onSelect: function(dateText, inst) { 
        alert("vxcvcxv");
    }
});
</script>
    &nbsp;&nbsp; <input type="submit" value="Confirmar"/> 
</form>
&nbsp;&nbsp; <input type="button" value="Cancelar">		
<?php
    echo $mensaje;
?>
    
</div>
<?php
    if(isset($_GET["c"]))
    {
        echo "<script type='text/javascript'>$('#frmBuscar').hide();</script>";
    }
?>
