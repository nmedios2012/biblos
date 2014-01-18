
<p>ADMINISTRACI&Oacute;N DE SOCIOS - ALTA DE SOCIOS</p>
<form name="input" action="../../../negocio/administrador/altausuario.php" enctype="multipart/form-data" method="post">
    <p>Nombre <input type="text" name="nombre" size="15" maxlength="15">
        &nbsp; Apellido <input type="text" name="apellido" size="15" maxlength="15"></p>

    <p>Documento <input type="text" name="documento" size="11" maxlength="11"></p></br>
    <p>Direcci&oacute;n <input type="text" name="direccion" size="50" maxlength="60">
        &nbsp; Nro Puerta <input type="text" name="nro_puerta" size="4" maxlength="4">
        &nbsp; Nro Apartamento <input type="text" name="nro_apto" size="3" maxlength="3">
        &nbsp; Block <input type="text" name="block" size="3" maxlength="3"></p>
    <p>Ciudad <select name="ciudad" id="ciudad">
            <option>Nueva</option>
            <option>Montevideo</option>
            <option>Maldonado</option>
            <option>Canelones</option>
            <option>Florida</option>
            <option>Salto</option>
        <option>Durazno</option>
        </select>
        &nbsp; Zona <select name="zona" id="zona">
            <option>Nueva</option>
            <option>Uni&oacute;n</option>
            <option>Buceo</option>
            <option>Centro</option>
            <option>Cord&oacute;n</option>
            <option>Manga</option>
            <option>Cerro</option>
        </select></p><br/>
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

