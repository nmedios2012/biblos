<p>INGRESO DE SANCIONES</p>
		<form name="input" action="../../../negocio/bibliotecologo/sanciones.php" method="post">
                <p>Penalizaci&oacute;n nro&nbsp;<input type="text" name="codigo" size="35" maxlength="35"></p></br>
		<p>Penalizaci&oacute;n tipo&nbsp;<input type="text" name="tipo_penaliz" size="10" maxlength="10"></p></br>
		<p>Nombre&nbsp;<input type="text" name="nombre" size="10" maxlength="10"></p></br>
                <p>Descripci&oacute;n &nbsp;<input type="text" name="descripcion" size="10" maxlength="10"></p></br>
                <p>Estado l&oacute;gico &nbsp;<select name="est_log" id="est_log">
		    <option>SI</option>
                          </select></p>
                </br>
		&nbsp;<p><input type="submit" value="Aceptar"> 
		&nbsp;&nbsp;<input type="reset" value="Limpiar"> <!--Borra el formulario pero no la base de datos-->
		</form>