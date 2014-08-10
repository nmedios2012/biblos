<?php
    $ciudad="";

?>
<p>ADMINISTRACI&Oacute;N DE SOCIOS - ALTA DE SOCIOS</p>
<form name="input" action="../../../negocio/bibliotecologo/altausuario.php" enctype="multipart/form-data" method="post">
    <p>Nombre <input type="text" name="nombre" size="15" maxlength="15">
        &nbsp; Apellido <input type="text" name="apellido" size="15" maxlength="15"></p>

    <p>Documento <input type="text" name="documento" size="11" maxlength="11"></p></br>
    <p>Direcci&oacute;n <input type="text" name="direccion" size="50" maxlength="60">
        &nbsp; Nro Puerta <input type="text" name="nro_puerta" size="4" maxlength="4">
        &nbsp; Nro Apartamento <input type="text" name="nro_apto" size="3" maxlength="3">
        
    <p>Departamento <select name="ciudad" id="ciudad">
            <option value="Artigas" >Artigas</option>
            <option value="Canelones">Canelones</option>
            <option value="Cerro Largo">Cerro Largo</option>
            <option value="Colonia">Colonia</option>
            <option value="Durazno">Durazno</option>
            <option value="Flores">Flores</option>
            <option value="Florida">Florida</option>
            <option value="Lavalleja">Lavalleja</option>
            <option value="Maldonado">Maldonado</option>
            <option value="Montevideo">Montevideo</option>
            <option value="Paysandú">Paysandú</option>
            <option value="Río Negro">Río Negro</option>
            <option value="Rivera">Rivera</option>
            <option value="Rocha">Rocha</option>
            <option value="Salto">Salto</option>
            <option value="San José">San José</option>
            <option value="Soriano">Soriano</option>
            <option value="Tacuarembó">Tacuarembó</option>
            <option value="Treinta y Tres">Treinta y Tres</option>
            
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

