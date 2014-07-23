<p>INGRESO DE PA&Iacute;SES</p>
		<form name="input" action="../../../negocio/administrador/altapais.php" method="post">
                <p>Pa&iacute;s <input type="text" name="pais" size="35" maxlength="35"></p></br>
		<p>Nro Identificaci&oacute;n Pa&iacute;s <input type="text" name="id_pais" size="10" maxlength="10"></p></br>
		
                <p>Estado l&oacute;gico <select name="est_log" id="est_log">
		    <option>SI</option>
                          </select></p>
                </br>
		<p><input type="submit" value="Aceptar"> 
		&nbsp;&nbsp;<input type="reset" value="Limpiar"> <!--Borra el formulario pero no la base de datos-->
		</form>