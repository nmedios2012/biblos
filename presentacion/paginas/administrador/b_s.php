<?php
if (isset($_SESSION["resultado"]) && $_SESSION["resultado"] != NULL) {

    extract($_SESSION["resultado"]);
    unset($_SESSION["resultado"]);
    $activar = "";
} else {
    $nombre = "";
    $apellido = "";
    $ci = "";
    $activar = " disabled='disabled' ";
}
?>
<script type="text/javascript">
    $(document).ready(inicializar);
    function inicializar(){
        $("#buscar").click(controlar);
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



<p>ADMINISTRACI&Oacute;N DE SOCIOS - BAJA DE SOCIOS</p>
<form name="input" action="../../../negocio/administrador/buscar.php" method="post" id="frmBuscar">
    <p>Documento <input type="text" id="documento" name="documento" size="11" maxlength="11">
        &nbsp;&nbsp;&nbsp;&nbsp; <input type="button" id="buscar" value="Buscar"></p>
</form>
<div id="mensaje">
    
</div>
<p>CI : <label><?php echo $ci; ?></label><br/>
<p>Nombre : <label><?php echo $nombre; ?></label><br/>
    &nbsp; Apellido : <label><?php echo $apellido; ?></label>
    <br />
    &nbsp;&nbsp; <input type="submit" value="Editar"> 
<form name="eliminar" method="post" action="../../../negocio/administrador/eliminado.php">
      <input type="hidden" name="documento" value="<?php echo $ci; ?>" />
    &nbsp;&nbsp; <input type="submit" <?php echo $activar; ?> value="Eliminar"/> 
</form>
&nbsp;&nbsp; <input type="button" value="Cancelar">		

