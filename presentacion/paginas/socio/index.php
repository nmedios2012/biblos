<?php
session_start();
if (!isset($_SESSION["tipo"]))
    header("Location:../../index.php");
else
if ($_SESSION["tipo"] != "socio")
    header("Location:../../index.php");
?>

<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Biblos Administracion</title>
        <link 
        <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
        <link href="../../css/admin.css" rel="stylesheet" type="text/css">
        <script type="text/javascript" src="../../js/jquery.js"></script>
        <script type="text/javascript" src="../../js/socio.js"></script>
        <script>
            function startTime() {
                var today = new Date();
                var h = today.getHours();
                var m = today.getMinutes();
                var s = today.getSeconds();
                m = checkTime(m);
                s = checkTime(s);
                document.getElementById('clock').innerHTML = h + ":" + m + ":" + s;
                var t = setTimeout(function() {
                    startTime()
                }, 500);
            }

            function checkTime(i) {
                if (i < 10) {
                    i = "0" + i
                }
                ;  // add zero in front of numbers < 10
                return i;
            }
        </script>
    </head>

    <body onload="startTime()">

        <div class="container">
            <header>
                <a href="#">
                    <img src="../../../presentacion/imagenes/logo.jpg" alt="" width="180" height="90" id="Insert_logo" style="background-color: #FFF580; display:block;" />
                </a>                
                <?php
                if ($_SESSION['tipo']) { //Si hay un usuario lo mostramos
                    echo" <strong>USUARIO: " . $_SESSION['usuario'] . "<BR/>   ROL: " . $_SESSION['tipo'] . "</strong><br />";
                }
                ?>
                <div id="clock" align="right"/>

            </header>
            <div id='flyout_menu' class="sidebar1">
                <ul class="nav">

                    <li><a href='#'><span>Socios</span></a>
                        <ul>
                            <li>
                                <a href="index.php?pag=pepe">Administrar Datos Personales</a>
                            </li>
                            <li>
                                <a href="index.php?pag=b_s">Historial de Prestamos</a>
                            </li>
                            <li>
                                <a href="index.php?pag=penalizaciones">Sanciones</a>
                            </li>
                        </ul>
                    </li>
                    <li><a href='#'><span>Biblioteca</span></a>
                        <ul>

                            <li>
                                <a href="../../../negocio/socio/busquedaLibros.php">Buscar Libros</a>
                            </li>
<!--                            <li>
                                <a href="../../../negocio/socio/altaMaterial.php">Buscar Libros</a>
                            </li>-->

                        </ul>
                    </li>
                    <li><a href="../../../negocio/desloguearse.php">Cerrar session</a></li>

                </ul>
                <aside>
                    <p> </p>
                </aside>
            </div>
            <article class="content">
                <?php
                if (isset($_GET["pag"])) {

                    include($_GET["pag"] . ".php");
                }
                ?>

            </article>
            <footer>
                <p></p>
                <address>
                    Contenido PHP
                    <?php
                    print '<pre>' . htmlspecialchars(print_r(get_defined_vars(), true)) . '</pre>';
                    print '<pre>' . htmlspecialchars(print_r($_SERVER, true)) . '</pre>';
                    ?>
                </address>
            </footer>
            <!-- end .container --></div>
    </body>
</html>
