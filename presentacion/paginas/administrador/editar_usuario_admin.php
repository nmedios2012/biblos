<?php
if (isset($_SESSION["editar"]) && $_SESSION["editar"] != NULL) {

    extract($_SESSION["editar"]);
   
    
}

?>
<p>ADMINISTRACI&Oacute;N DE SOCIOS - EDITAR DE SOCIOS</p>
<form name="input" action="../../../negocio/administrador/editarusuario.php" enctype="multipart/form-data" method="post">
    <p>Nombre <input type="text" name="nombre" size="15" maxlength="15" value="<?php echo $nombre; ?>">
        &nbsp; Apellido <input type="text" name="apellido" size="15" maxlength="15" value="<?php echo $apellido; ?>"></p>

    <p>Documento <input type="text" name="documento" size="11" maxlength="11"value="<?php echo $ci; ?>"></p></br>
    <p>Direcci&oacute;n <input type="text" name="direccion" size="50" maxlength="60"value="<?php echo $calle; ?>">
        &nbsp; Nro Puerta <input type="text" name="nro_puerta" size="4" maxlength="4" value="<?php echo $numero_puerta; ?>">
        &nbsp; Nro Apartamento <input type="text" name="nro_apto" size="3" maxlength="3" value="<?php echo $numero_apartamento; ?>">
        
    <p>Departamento <select name="ciudad" id="ciudad">
            
            <option <?php echo (trim($ciudad)=="Montevideo")? "selected='selected'":""; ?>value="Montevideo" >Montevideo</option>
            <option <?php echo (trim($ciudad)=="Maldonado")? "selected='selected'":""; ?>value="Maldonado">Maldonado</option>
            <option <?php echo (trim($ciudad)=="Canelones")? "selected='selected'":""; ?>value="Canelones">Canelones</option>
            <option <?php echo (trim($ciudad)=="Florida")? "selected='selected'":""; ?>value="Florida">Florida</option>
            <option <?php echo (trim($ciudad)=="Salto")? "selected='selected'":""; ?>value="Salto">Salto</option>
            <option <?php echo (trim($ciudad)=="Durazno")? "selected='selected'":""; ?>value="Durazno">Durazno</option>
        </select>
        </p><br/>
    <p>Tel&eacute;fono <input type="text" name="telefono" size="11" maxlength="11">
        &nbsp; Celular <input type="text" name="celular" size="9" maxlength="9">
        &nbsp; Mail <input type="text" name="mail" size="30" maxlength="30"value="<?php echo $email; ?>"></p><br/>

    <p>Agregar foto <input type="file" name="foto" />
    </p>
    <?php
        if(isset($_SESSION["mensaje"])){
            $mensaje=$_SESSION["mensaje"];
            unset($_SESSION["mensaje"]);
        }
        
    ?>
    &nbsp;&nbsp; <input type="submit" value="Aceptar"> 
    &nbsp;&nbsp; <input type="reset" value="Limpiar"> <!--Borra el formulario pero no la base de datos-->
</form>

