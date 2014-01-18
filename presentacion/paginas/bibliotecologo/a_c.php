<p>ADMINISTRACI&Oacute;N DE MATERIALES - CONSERVACI&Oacute;N</p>
		<form name="input" action="../../../negocio/bibliotecologo/alta_conservacion.php" method="post">
                <p>C&oacute;digo Conservaci&oacute;n <input type="text" name="cod_cnsv" size="15" maxlength="15"></p></br>
		<p>Conservaci&oacute;n <input type="text" name="nom_cnsv" size="20" maxlength="20"></p></br>
		<p>C&oacute;digo Posterior <input type="text" name="cod_pst" size="10" maxlength="10"></p></br>
                <p>Conservaci&oacute;n Posterior <input type="text" name="nom_pst" size="20" maxlength="20"></p></br>
		<p>Estado l&oacute;gico <select name="est_log" id="est_log">
		    <option>SI</option>
                          </select></p>
                </br>
		<p><input type="submit" value="Aceptar"> 
		&nbsp;&nbsp;<input type="reset" value="Limpiar"> <!--Borra el formulario pero no la base de datos-->
		</form>