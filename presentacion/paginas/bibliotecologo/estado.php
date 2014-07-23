<p>INGRESO DE ESTADO PARA MATERIALES</p>
		<form name="input" action="../../../negocio/bibliotecologo/estados.php" method="post">
                <p>Estado nro&nbsp;<input type="text" name="cod_est" size="3" maxlength="3"></p></br>
		<p>Estado tipo&nbsp;<input type="text" name="estado_anterior" size="30" maxlength="30"></p></br>
		<p>Estado l&oacute;gico &nbsp;<select name="est_log" id="est_log">
		    <option>SI</option>
                          </select></p>
                </br>
		&nbsp;<p><input type="submit" value="Aceptar"> 
		&nbsp;&nbsp;<input type="reset" value="Limpiar"> <!--Borra el formulario pero no la base de datos-->
		</form>
