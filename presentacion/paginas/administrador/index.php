<?php
	session_start();
        
	if(!isset($_SESSION["tipo"]))
		header("Location:../../index.php");
	else
		if($_SESSION["tipo"]!="administrador")
			header("Location:../../index.php");
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Men&uacute; Principal</title>
<link 
<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
<link href="../../css/jquery-ui.css" rel="stylesheet" type="text/css">
<link href="../../css/admin.css" rel="stylesheet" type="text/css">



<script type="text/javascript" src="../../js/jquery.js"></script>
<script type="text/javascript" src="../../js/administrador.js"></script>
<script type="text/javascript" src="../../js/jquery-ui.min.js"></script>
</head>

<body>

<div class="container">
  <header>
    <a href="#"><img src="../../../presentacion/imagenes/logo.jpg" alt="" width="180" height="90" id="Insert_logo" style="background-color: #C6D580; display:block;" /></a>
  </header>
  <div class="sidebar1">
    <ul class="nav">
        <li><a href="index.php?pag=alta_socio_admin">Alta socio</a></li>
        <li><a href="index.php?pag=editar_socio_admin">Buscar/Editar/Eliminar Socio</a></li>
        <li><a href="../../../negocio/administrador/listadoUsuario.php">Listado Socio</a></li>
        <li><a href="../../../negocio/administrador/listadoMateriales.php">Listado Materiales</a></li>
        <li><a href="../../../negocio/administrador/listadoReserva.php">Listado Reserva</a></li>
        <li><a href="../../../negocio/administrador/altaprestamo.php">Pr&eacute;stamos</a></li>
        <li><a href="../../../negocio/desloguearse.php">Cerrar session</a></li>
        
        <li><a href="index.php?pag=alta_libro_admin_web">Alta libros</a></li>
        <li><a href="index.php?pag=alta_revista_admin_web">Alta revistas</a></li>
        <li><a href="index.php?pag=alta_pais_web">Ingreso de Pa&iacute;s</a></li>
        <li><a href="#">Otro vínculo</a></li>
    </ul>
    <aside>
      <p> </p>
      <p></p>
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
