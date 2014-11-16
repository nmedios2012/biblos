
<fieldset>
    <legend>ADMINISTRACI&Oacute;N DE SOCIOS - ALTA DE SOCIOS:</legend>

    <form name="input" action="../../../negocio/bibliotecologo/altausuario.php" enctype="multipart/form-data" method="post">
    <p>Nombre <input type="text" name="nombre" size="15" maxlength="15"required>
        &nbsp; Apellido <input type="text" name="apellido" size="15" maxlength="15" required></p>
         
    <p>Documento <input type="number" name="documento" min="8" max="8" required></p></br>
    <p>Direcci&oacute;n <input type="text" name="direccion" size="50" maxlength="60" required>
        &nbsp; Nro Puerta <input type="text" name="nro_puerta" size="4" maxlength="4" required>
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
    <p>Tel&eacute;fono <input type="number" name="telefono" min="6" max="11"required>
        &nbsp; Celular <input type="number" name="celular" size="9" maxlength="9"></p><br/>
        &nbsp; Mail <input type="text" name="mail" size="30" maxlength="30" required></p><br/>

    <p>Agregar foto <input type="file" name="foto" />
    </p>
        <?php
        if(isset($_SESSION["mensaje"])){
            $mensaje=$_SESSION["mensaje"];
        }
        
        ?>
    &nbsp;&nbsp; <input type="submit" value="Enviar"> 
    &nbsp;&nbsp; <input type="reset" value="Limpiar"> <!--Borra el formulario pero no la base de datos-->
    </form>

</fieldset>