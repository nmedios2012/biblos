
	<p>ADMINISTRACI&Oacute;N DE SOCIOS - ALTA DE SOCIOS</p>
		<form name="input" action="../../../negocio/bibliotecologo/altausuario.php" method="post">
                <p>Nombre <input type="text" name="nombre" size="15" maxlength="15">
		&nbsp; Apellido <input type="text" name="apellido" size="15" maxlength="15"></p>
		<p>Sexo <input type="radio" name="sexo" value="hombre">Hombre 
		&nbsp; <input type="radio" name="sexo" value="mujer">Mujer</p>
		<p>Documento <input type="text" name="documento" size="11" maxlength="11"></p></br>
		<p>Direcci&oacute;n <input type="text" name="direccion" size="50" maxlength="60"></p>
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
		&nbsp; Celular <input type="text" name="celular" size="9" maxlength="9"></p>
		&nbsp; Mail <input type="text" name="mail" size="30" maxlength="30"></p><br/>
		<p>Fecha de alta &nbsp;&nbsp;D&iacute;a <select name="dia" id="dia">
			  <option>1</option>
              <option>2</option>
              <option>3</option>
              <option>4</option>
              <option>5</option>
              <option>6</option>
              <option>7</option>
			  </select>
		   &nbsp;&nbsp;Mes <select name="mes" id="mes">
			  <option>1</option>
              <option>2</option>
              <option>3</option>
              <option>4</option>
              <option>5</option>
              <option>6</option>
              <option>7</option>
			  </select>
		   &nbsp;&nbsp;A&ntilde;o <select name="anio" id="anio">
			  <option>2013</option>
              <option>2012</option>
              <option>2011</option>
              <option>2010</option>
              <option>2009</option>
              <option>2008</option>
              <option>2007</option>
			  </select></p>
		<p>Agregar foto
		<!--<div id="search-box"><form method="get" action="/search.forum" id="search"><p class="nomargin"><input type="text" name="search_keywords" id="keywords" maxlength="128" class="inputbox search" value="Buscar..." onclick="if (this.value == 'Buscar...') this.value = '';" onblur="if (this.value == '') this.value = 'Buscar...';" /><input class="button2" type="submit" value="Buscar" /></p></form></div></p></br>
		&nbsp;&nbsp; Estado L&oacute;gico <select name="estado_logico" id="estado_logico">
		      <option>SI</option>
			  </select></p>
		</br>-->
		&nbsp;&nbsp; <input type="submit" value="Aceptar"> 
		&nbsp;&nbsp; <input type="reset" value="Limpiar"> <!--Borra el formulario pero no la base de datos-->
		</form>

