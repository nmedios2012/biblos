<?php
$codigoEjemplar=$_SESSION["codigo"];

if(isset($_SESSION["error"])){
    $mensaje="La cantidad de reservas mas prestamos superan lo permitido";
    unset($_SESSION["error"]);
    unset($_SESSION["resultado"]);
}

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
    $ci = "";
    $activar = " disabled='disabled' ";
    $mensaje="";
    
    
    
}




?>
<script type="text/javascript">
    $(document).ready(inicializar);
    function inicializar(){
        $("#buscar").click(controlar);
        $("#editar").click(editar_pro);
    }
    function editar_pro(){
    
        $(location).attr('href',"index.php?pag=editar_usuario_admin");
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



<p>ADMINISTRACI&Oacute;N DE PRESTAMO - SALA</p>

<form name="input" action="../../../negocio/administrador/buscarSocioSala.php" method="post" id="frmBuscar">
    <p>Documento <input type="text" id="documento" name="documento" size="11" maxlength="11">
        &nbsp;&nbsp;&nbsp;&nbsp; <input type="button" id="buscar" value="Buscar"></p>
    <input type="hidden" name="codigo" value="<?php echo $codigoEjemplar; ?>" />
    <input type="hidden" name="pagina" value="alta_prestamo_admin" />
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
    <form name="prestar" method="post" action="../../../negocio/administrador/confirmacionSala.php">
      <input type="hidden" name="codigo" value="<?php echo $codigoEjemplar; ?>" />
      <input type="hidden" name="ci" value="<?php echo $ci; ?>" />
    &nbsp;&nbsp; <input type="submit" value="Prestar"/> 
</form>
&nbsp;&nbsp; <input type="button" value="Cancelar">		
<?php
    if(isset($mensaje)){
        echo $mensaje;
        unset($mensaje);
    }

?>
    
</div>

