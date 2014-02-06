<p>INGRESO DE SANCIONES</p>
		<form name="input" action="../../../negocio/bibliotecologo/sanciones.php" method="post">
                <p>Penalizaci&oacute;n nro&nbsp;<input type="text" name="codigo" size="4" maxlength="4"></p></br>
		<p>Penalizaci&oacute;n tipo&nbsp;<input type="text" name="tipo_penaliz" size="40" maxlength="40"></p></br>
		<p>Nombre&nbsp;<input type="text" name="nombre" size="15" maxlength="15"></p></br>
                <p>Descripci&oacute;n &nbsp;<input type="textarea" name="descripcion" size="50" maxlength="50"></p></br>
                <p>Estado l&oacute;gico &nbsp;<select name="est_log" id="est_log">
		    <option>SI</option>
                          </select></p>
                </br>
		&nbsp;<p><input type="submit" value="Aceptar"> 
		&nbsp;&nbsp;<input type="reset" value="Limpiar"> <!--Borra el formulario pero no la base de datos-->
		</form>