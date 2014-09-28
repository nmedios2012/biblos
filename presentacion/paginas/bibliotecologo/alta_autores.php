<p>ADMINISTRACI&Oacute;N DE ARTISTAS Y AUTORES - ALTA DE ARTISTAS Y AUTORES</p>
		<form name="input" action="../../../negocio/bibliotecologo/artista_autor.php" method="post">
                <p>C&oacute;digo Artista <input type="text" name="cod_art" size="6" maxlength="6"></p></br>
		<p>Artista/Autor 1 <input type="text" name="art_1" size="20" maxlength="20">
		<p>Artista/Autor 2 <input type="text" name="art_2" size="20" maxlength="20">
                <p>Artista/Autor 3 <input type="text" name="art_3" size="20" maxlength="20">
                <p>Nro Pa&iacute;s <input type="text" name="id_pais" size="4" maxlength="4">
                <p>Nro Rol <input type="text" name="id_rol" size="4" maxlength="4">
                &nbsp;&nbsp;Rol <input type="text" name="rol" size="15" maxlength="15"></p></br>
		
		<p>Fecha de alta &nbsp;&nbsp;D&iacute;a <select name="dia" id="dia">
			  <option></option>
              <option>1</option>
              <option>2</option>
              <option>3</option>
              <option>4</option>
              <option>5</option>
              <option>6</option>
              <option>7</option>
              <option>8</option>
              <option>9</option>
              <option>10</option>
              <option>11</option>
              <option>12</option>
              <option>13</option>
              <option>14</option>
              <option>15</option>
              <option>16</option>
              <option>17</option>
              <option>18</option>
              <option>19</option>
              <option>20</option>
              <option>21</option>
              <option>22</option>
              <option>23</option>
              <option>24</option>
              <option>25</option>
              <option>26</option>
              <option>27</option>
              <option>28</option>
              <option>29</option>
              <option>30</option>
              <option>31</option>
			  </select>
		   &nbsp;&nbsp;Mes <select name="mes" id="mes">
			  <option></option>
              <option>1</option>
              <option>2</option>
              <option>3</option>
              <option>4</option>
              <option>5</option>
              <option>6</option>
              <option>7</option>
              <option>8</option>
              <option>9</option>
              <option>10</option>
              <option>11</option>
              <option>12</option>
			  </select>
		   &nbsp;&nbsp;A&ntilde;o <select name="anios" id="anios">
			  <option></option>
              <option>2013</option>
              <option>2012</option>
              <option>2011</option>
              <option>2010</option>
              <option>2009</option>
              <option>2008</option>
              <option>2007</option>
              <option>2006</option>
              <option>2005</option>
              <option>2004</option>
              <option>2003</option>
              <option>2002</option>
              <option>2001</option>
              <option>2000</option>
              <option>1999</option>
              <option>1998</option>
              <option>1997</option>
              <option>1996</option>
              <option>1995</option>
              <option>1994</option>
              <option>1993</option>
              <option>1992</option>
              <option>1991</option>
              <option>1990</option>
			  </select></p></br>
		
               <p>Estado l&oacute;gico <select name="est_log" id="est_log">
		    <option>SI</option>
                          </select></p>
                </br>
		<p><input type="submit" value="Aceptar"> 
		&nbsp;&nbsp;<input type="reset" value="Limpiar"> <!--Borra el formulario pero no la base de datos-->
		</form>

