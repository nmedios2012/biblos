
	<p>ADMINISTRACI&Oacute;N DE MATERIALES - ALTA DE LIBROS</p>
		<form name="input" action="../../../negocio/administrador/altalibro.php" method="post">
                    <p>C&oacute;digo Material <input type="text" name="cod_mat" size="10" maxlength="10">
		&nbsp; Titulo <input type="text" name="titulo" size="30" maxlength="30"></p></br>
                <p>Autor/es <select name="autor" id="autor">
			  <option>Seleccione autor</option>
                
			  </select></p></br>
		<p>ISBN <input type="text" name="isbn" size="10" maxlength="10"></p></br>
		<p>Edici&oacute;n <input type="text" name="edicion" size="10" maxlength="10">
		&nbsp; A&ntilde;o <input type="text" name="anio" size="5" maxlength="5"></p></br>
                <p>Editado <select name="editado" id="editado">

			  <option>Seleccione editor</option>

                
			  </select></p></br> 
		<p>Comentario Gral <input type="text" name="com_gral" size="30" maxlength="30"></p></br>
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
		   &nbsp;&nbsp;A&ntilde;o <select name="anio" id="anio">
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
			  </select></p>
		
		&nbsp;&nbsp; Estado L&oacute;gico <select name="est_log" id="est_log">
		      <option>SI</option>
			  </select></p>
		</br>
		&nbsp;&nbsp; <input type="submit" value="Aceptar"> 
		&nbsp;&nbsp; <input type="reset" value="Limpiar"> <!--Borra el formulario pero no la base de datos-->
		</form>

