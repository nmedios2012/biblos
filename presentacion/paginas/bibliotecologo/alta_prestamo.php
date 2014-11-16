<?php
if (isset($_SESSION["resultado"]) && $_SESSION["resultado"] != NULL) {

    extract($_SESSION["resultado"]);
    $_SESSION["editar"]=$_SESSION["resultado"];
    //$mensaje=$_SESSION["mensaje"];
    $mensaje="";
   
    //unset($_SESSION["resultado"]);
    $activar = "";
    
} else {
    $nombre = "";
    $apellido = "";
    $documento = "";
    $activar = " disabled='disabled' ";
    $mensaje="";
    $ci="";
    
    
    
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
<form name="input" action="../../../negocio/bibliotecologo/buscarSocioPrestamo.php" method="post" id="frmBuscar">
    <p>Documento <input type="number" id="documento" name="documento" min="8" max="8">
        &nbsp;&nbsp;&nbsp;&nbsp; <input type="button" id="buscar" value="Buscar"></p>
    <input type="hidden" name="pagina" value="alta_prestamo" />
</form>
<div id="mensaje">
    
</div>
<div>
    <div id="usuarioprestamo">
    <img src="../../imagenes/fotousuario/<?php echo $foto; ?>" width="150" height="150"/>
<p>CI : <label><?php echo $ci; ?></label><br/>
<p>Nombre : <label><?php echo $nombre; ?></label><br/>
<p>Apellido : <label><?php echo $apellido; ?></label>
    <br />
    
</div>
<div id="ejemplar">
    Codigo Ejemplar: <?php echo $codigoEjemplar; ?>
    
</div>
    
    
    
</div>
<div>
    <form name="prestar" method="post" action="../../../negocio/bibliotecologo/sugerenciaFechaPrestamo.php">
      <input type="hidden" name="codigo" value="<?php echo $codigoEjemplar; ?>" />
    &nbsp;&nbsp; <input type="submit" value="Prestar"/> 
</form>
&nbsp;&nbsp; <input type="button" value="Cancelar">		
<?php
    echo $mensaje;
?>
    
</div>
