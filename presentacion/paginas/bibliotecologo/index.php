<?php
session_start();
if (!isset($_SESSION["tipo"]))
    header("Location:../../index.php");
else
if ($_SESSION["tipo"] != "bibliotecologo")
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
        <script type="text/javascript" src="../../js/bibliotecologo.js"></script>
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
                echo date("d/m/Y");
                ?>
                <div id="clock" align="right"/>

            </header>
            <div id='flyout_menu' class="sidebar1">
                <ul class="nav">

                    <li><a href='#'><span>Socios</span></a>
                        <ul>
                            <li>
                                <a href="index.php?pag=a_s">Alta socio</a>
                            </li>
                            <li>
                                <a href="index.php?pag=b_s">Baja socio</a>
                            </li>
                            <li>
                                <!--index.php?pag=usuarioACurso-->
                                <!--<a href="index.php?pag=usuarioACurso">Asignar Usuario a Curso</a>-->
                                <a href="../../../negocio/bibliotecologo/usuarioACurso.php">Asignar Usuario a Curso</a>
                            </li>

                            <li>
                                <a href="../../../negocio/bibliotecologo/listadoUsuario.php">Listar socios</a>
                            </li>
                             <li>
                                <a href="../../../negocio/bibliotecologo/listadoMateriales.php">Listar Materiales</a>
                            </li>
                            <li>
                                <a href="../../../negocio/bibliotecologo/altaprestamo.php">Pr&eacute;stamo</a>
                            </li>
                            <li>
                                <a href="index.php?pag=penalizaciones">Sanciones</a>
                            </li>
                        </ul>
                    </li>
                    <li><a href='#'><span>Administracion</span></a>
                        <ul>
                            <li><a href='#'><span>Biblioteca</span></a>
                            <li>
                                <a href="../../../negocio/bibliotecologo/listadoReserva.php">Listar Reservas</a>
                            </li>
                            <li><a href="index.php?pag=a_e">Alta editorial/empresa</a></li>
                            <li><a href="index.php?pag=alta_autores">Artista/Autor</a></li>
                            <li><a href="index.php?pag=a_p">Ingreso de Pa&iacute;s</a></li>
                        </ul>
                    </li>
                    <li><a href='#'><span>Materiales</span></a>
                        <ul>
                            <li><a href="index.php?pag=a_l">Alta libros</a>
                                <ul>
                                    <li><a href="../../../negocio/bibliotecologo/altaEjemplares.php">Alta Ejemplares</a></li>
                                </ul>
                            </li>
                            <li><a href="index.php?pag=a_r">Alta revistas</a></li>
                            <li><a href="index.php?pag=a_f">Alta fotocopias</a></li>
                            <li><a href="index.php?pag=a_o">Alta otros</a></li>
                            <li><a href="index.php?pag=a_t_e">Tema/Especializaci&oacute;n</a></li>
                            <li><a href="index.php?pag=a_c">Conservaci&oacute;n</a></li>
                            <li><a href="index.php?pag=estado">Estado de material</a></li>
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
                    Contenido de dirección
                    <?php
//                    print '<pre>' . htmlspecialchars(print_r(get_defined_vars(), true)) . '</pre>';
//                    print '<pre>' . htmlspecialchars(print_r($_SERVER, true)) . '</pre>';
                    ?>
                </address>
            </footer>
            <!-- end .container --></div>
    </body>
</html>