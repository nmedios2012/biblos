<?php
?>
<p>ADMINISTRACI&Oacute;N DE SOCIOS - CAMBIO DE PASSWORDS</p>
<form name="input" action="../../../negocio/bibliotecologo/cambio_passwd.php" enctype="multipart/form-data" method="post">
<p>Usuario <input type="text" name="mail" size="30" maxlength="30" required>
<p>Nuevo password <input type="text" name="documento" size="20" maxlength="20" required>

&nbsp;&nbsp; <input type="submit" value="Enviar"> 
&nbsp;&nbsp; <input type="reset" value="Limpiar"> <!--Borra el formulario pero no la base de datos-->
</form>