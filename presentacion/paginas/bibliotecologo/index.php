<?php
	session_start();
	if(!isset($_SESSION["tipo"]))
		header("Location:../index.php");
	else
		if($_SESSION["tipo"]!="administrador")
			header("Location:../index.php");
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Documento sin título</title>
<link 
<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
<link href="../css/admin.css" rel="stylesheet" type="text/css">
</head>

<body>

<div class="container">
  <header>
    <a href="#"><img src="" alt="Insertar logotipo aquí" width="180" height="90" id="Insert_logo" style="background-color: #C6D580; display:block;" /></a>
  </header>
  <div class="sidebar1">
    <ul class="nav">
        <li><a href="administrador.php?pag=a_s">Alta socio</a></li>
        <li><a href="administrador.php?pag=b_s">Baja socio</a></li>
        <li><a href="../_php/desloguearse.php">Cerrar session</a></li>
        <li><a href="#">Vínculo cuatro</a></li>
    </ul>
    <aside>
      <p> Los vínculos anteriores muestran una estructura de navegación básica que emplea una lista no ordenada con estilo de CSS. Utilícela como punto de partida y modifique las propiedades para lograr el aspecto deseado. Si necesita menús desplegables, créelos empleando un menú de Spry, un widget de menú de Adobe Exchange u otras soluciones de javascript o CSS.</p>
      <p>Si desea que la navegación se sitúe a lo largo de la parte superior, simplemente mueva ul a la parte superior de la página y vuelva a crear el estilo.</p>
    </aside>
  <!-- end .sidebar1 --></div>
  <article class="content">
    <?php
	if(isset($_GET["pag"])){
		
			include($_GET["pag"].".html");


	}

?>
    
  </article>
  <aside>
    <h4>Lateral </h4>
    <p>Por naturaleza, el color de fondo de cualquier elemento del bloque sólo se muestra a lo largo del contenido. Si desea usar una línea divisoria en lugar de un color, coloque un borde en el lado del bloque .content (pero sólo en el caso de que siempre vaya a tener más contenido).</p>
  </aside>
  <footer>
    <p>Este footer contiene la declaración position:relative; para dar a Internet Explorer 6 hasLayout para footer y provocar que se borre correctamente. Si no es necesario proporcionar compatibilidad con IE6, puede quitarlo.</p>
    <address>
      Contenido de dirección
    </address>
  </footer>
  <!-- end .container --></div>
</body>
</html>
