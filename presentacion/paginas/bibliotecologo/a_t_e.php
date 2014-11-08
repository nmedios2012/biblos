
<fieldset>
    
    <legend>ADMINISTRACI&Oacute;N DE MATERIALES - ALTA DE TEMAS Y ESPECIALIZACI&Oacute;N</legend>
		<form name="input" action="../../../negocio/bibliotecologo/alta_tema_especializacion.php" method="post">
                <p>C&oacute;digo Tema <input type="text" name="cod_tema" size="15" maxlength="15">
		&nbsp; Tema <input type="text" name="nom_tema" size="20" maxlength="20"></p></br>
		<p>C&oacute;digo Especializaci&oacute;n <input type="text" name="cod_esp" size="10" maxlength="10"></p></br>
                <p>Especializaci&oacute;n <input type="text" name="nom_esp" size="20" maxlength="20"></p></br>
		<p>Estado l&oacute;gico <select name="est_log" id="est_log">
		    <option>SI</option>
                          </select></p>
                </br>
		<p><input type="submit" value="Aceptar"> 
		&nbsp;&nbsp;<input type="reset" value="Limpiar"> <!--Borra el formulario pero no la base de datos-->
		</form>
</fieldset>