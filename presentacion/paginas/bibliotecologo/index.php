<?php
	session_start();
	if(!isset($_SESSION["tipo"]))
		header("Location:../../index.php");
	else
		if($_SESSION["tipo"]!="bibliotecologo")
			header("Location:../../index.php");
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Documento sin título</title>
<link 
<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
<link href="../../css/admin.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="../../js/jquery.js"></script>
<script type="text/javascript" src="../../js/bibliotecologo.js"></script>

</head>

<body>

<div class="container">
  <header>
    <a href="#"><img src="../../../presentacion/imagenes/logo.jpg" alt="" width="180" height="90" id="Insert_logo" style="background-color: #C6D580; display:block;" /></a>
  </header>
  <div class="sidebar1">
    <ul class="nav">
        <li><a href="index.php?pag=a_s">Alta socio</a></li>
        <li><a href="../../../negocio/bibliotecologo/listadoUsuario.php">Listar socios</a></li>
        <li><a href="index.php?pag=b_s">Baja socio</a></li>
        <li><a href="index.php?pag=a_l">Alta libros</a></li>
        <li><a href="index.php?pag=a_r">Alta revistas</a></li>
        <li><a href="index.php?pag=a_f">Alta fotocopias</a></li>
        <li><a href="index.php?pag=a_o">Alta otros</a></li>
        <li><a href="index.php?pag=a_e">Alta editorial/empresa</a></li>
        <li><a href="index.php?pag=a_p">Ingreso de Pa&iacute;s</a></li>
        <li><a href="index.php?pag=a_t_e">Tema/Especializaci&oacute;n</a></li>
        <li><a href="index.php?pag=a_c">Conservaci&oacute;n</a></li>
        <li><a href="../../../negocio/bibliotecologo/altaprestamo.php">Pr&eacute;stamo</a></li>
        <li><a href="index.php?pag=penalizaciones">Sanciones</a></li>
        <li><a href="index.php?pag=estado">Estado de material</a></li>
        <li><a href="index.php?pag=alta_autores">Artista/Autor</a></li>
        <li><a href="../../../negocio/desloguearse.php">Cerrar session</a></li>
        <li><a href="#">Otro vínculo</a></li>
    </ul>
    <aside>
      <p> </p>
    </aside>
  <!-- end .sidebar1 --></div>
  <article class="content">
    <?php
	if(isset($_GET["pag"])){
		
			include($_GET["pag"].".php");


	}

?>
    
  </article>
  <aside>
    <h4>Lateral </h4>
    <p></p>
  </aside>
  <footer>
    <p></p>
    <address>
      Contenido de dirección
    </address>
  </footer>
  <!-- end .container --></div>
</body>
</html>
