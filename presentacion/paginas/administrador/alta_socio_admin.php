
<p>ADMINISTRACI&Oacute;N DE SOCIOS - ALTA DE SOCIOS</p>
<form name="input" action="../../../negocio/administrador/altausuario.php" enctype="multipart/form-data" method="post">
    <p>Nombre <input type="text" name="nombre" size="15" maxlength="15">
        &nbsp; Apellido <input type="text" name="apellido" size="15" maxlength="15"></p>

    <p>Documento <input type="text" name="documento" size="11" maxlength="11"></p></br>
    <p>Direcci&oacute;n <input type="text" name="direccion" size="50" maxlength="60">
        &nbsp; Nro Puerta <input type="text" name="nro_puerta" size="4" maxlength="4">
        &nbsp; Nro Apartamento <input type="text" name="nro_apto" size="3" maxlength="3">
        
    <p>Departamento <select name="ciudad" id="ciudad">
            <option <?php echo (trim($ciudad)=="Artigas")? "selected='selected'":""; ?>value="Artigas" >Artigas</option>
            <option <?php echo (trim($ciudad)=="Canelones")? "selected='selected'":""; ?>value="Canelones">Canelones</option>
            <option <?php echo (trim($ciudad)=="Cerro Largo")? "selected='selected'":""; ?>value="Cerro Largo">Cerro Largo</option>
            <option <?php echo (trim($ciudad)=="Colonia")? "selected='selected'":""; ?>value="Colonia">Colonia</option>
            <option <?php echo (trim($ciudad)=="Durazno")? "selected='selected'":""; ?>value="Durazno">Durazno</option>
            <option <?php echo (trim($ciudad)=="Flores")? "selected='selected'":""; ?>value="Flores">Flores</option>
            <option <?php echo (trim($ciudad)=="Florida")? "selected='selected'":""; ?>value="Florida">Florida</option>
            <option <?php echo (trim($ciudad)=="Lavalleja")? "selected='selected'":""; ?>value="Lavalleja">Lavalleja</option>
            <option <?php echo (trim($ciudad)=="Maldonado")? "selected='selected'":""; ?>value="Maldonado">Maldonado</option>
            <option <?php echo (trim($ciudad)=="Montevideo")? "selected='selected'":""; ?>value="Montevideo">Montevideo</option>
            <option <?php echo (trim($ciudad)=="Paysandú")? "selected='selected'":""; ?>value="Paysandú">Paysandú</option>
            <option <?php echo (trim($ciudad)=="Río Negro")? "selected='selected'":""; ?>value="Río Negro">Río Negro</option>
            <option <?php echo (trim($ciudad)=="Rivera")? "selected='selected'":""; ?>value="Rivera">Rivera</option>
            <option <?php echo (trim($ciudad)=="Rocha")? "selected='selected'":""; ?>value="Rocha">Rocha</option>
            <option <?php echo (trim($ciudad)=="Salto")? "selected='selected'":""; ?>value="Salto">Salto</option>
            <option <?php echo (trim($ciudad)=="San José")? "selected='selected'":""; ?>value="San José">San José</option>
            <option <?php echo (trim($ciudad)=="Soriano")? "selected='selected'":""; ?>value="Soriano">Soriano</option>
            <option <?php echo (trim($ciudad)=="Tacuarembó")? "selected='selected'":""; ?>value="Tacuarembó">Tacuarembó</option>
            <option <?php echo (trim($ciudad)=="Treinta y Tres")? "selected='selected'":""; ?>value="Treinta y Tres">Treinta y Tres</option>
            
        </select>
        </p><br/>
    <p>Tel&eacute;fono <input type="text" name="telefono" size="11" maxlength="11">
        &nbsp; Celular <input type="text" name="celular" size="9" maxlength="9">
        &nbsp; Mail <input type="text" name="mail" size="30" maxlength="30"></p><br/>

    <p>Agregar foto <input type="file" name="foto" />
    </p>
    <?php
        if(isset($_SESSION["mensaje"])){
            $mensaje=$_SESSION["mensaje"];
        }
        
    ?>
    &nbsp;&nbsp; <input type="submit" value="Aceptar"> 
    &nbsp;&nbsp; <input type="reset" value="Limpiar"> <!--Borra el formulario pero no la base de datos-->
</form>

