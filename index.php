<?php
    session_start();
?>

﻿<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
<script type="text/javascript" src="presentacion/js/jquery.js"></script>
<script type="text/javascript"  src="presentacion/js/inicio.js"></script>
<link href="presentacion/css/estilos.css"  rel="stylesheet" type="text/css" />
</head>

<body>
    <h1>HOLA MUNDO</h1>
<div id="login">
        <table id="Principal">
          <tr>
            <td><pre><span class="nombre_usuario_logeado_css_biblos"> LOGIN</span></pre></td>			
          </tr>
          <tr>
          <td>
          <form id="formLogueo" action="negocio/logueo.php" method="post" >
          usuario<input type="text" class="logueando" name="usuario" id="usuario"  /><br/>
          pass&nbsp;&nbsp;&nbsp;&nbsp;<input class="logueando" type="password" name="pass" /><br />
          <div id="mensaje">  <?php
            if(isset($_SESSION["mensajelogueo"])){
                
                echo $_SESSION["mensajelogueo"]."<br/>";
                unset($_SESSION["mensajelogueo"]);
                
            }
          
          ?>
          </div>
            
          
          <input type="button" id="enviar" value="Enviar" />
          
          </form>
          </td>
          </tr>
        </table>
        <p>&nbsp;</p>
    </div>
</body>
</html>
