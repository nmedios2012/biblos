<!-- DataTables CSS -->
<link rel="stylesheet" type="text/css" href="../../js/datatable/DataTables-1.10.1/media/css/jquery.dataTables.css">

<!-- jQuery -->
<script type="text/javascript" charset="utf8" src="../../js/datatable/DataTables-1.10.1/media/js/jquery.js"></script>

<!-- DataTables -->
<script type="text/javascript" charset="utf8" src="../../js/datatable/DataTables-1.10.1/media/js/jquery.dataTables.js"></script>
<script>
    $(document).ready(function() {
        $('#PrestamoLibros').dataTable();
    });
</script>
<script>
    $(document).ready(function() {
        $('#Usuarios').dataTable();
    });
</script>
<script type="text/javascript">
    function enviarForm() {
        var x = document.getElementById("selectcodConservacion").selectedIndex;
        var y = document.getElementById("selectcodConservacion").options;
//        alert("Index: " + y[x].value);
        if (y[x].value == 1) {
            if (confirm('Enviar solicitud con codigo de estado Nuevo?')) {
                // Save it!
                document.forms["formConfPrest"].submit();
            } else {
                // Do nothing!
            }
        }
//        document.forms["formConfPrest"].submit();
    }

    function seleccionarMaterial(valorEjemplarCodigo, valorEjemplarNombre) {
        ejemplarNombre.value = valorEjemplarNombre.value;
        ejemplarCodigo.value = valorEjemplarCodigo.value;
        var mdiv = document.getElementById("materialesDiv");
        mdiv.style.display = "none";
        var usuarioDiv = document.getElementById("usuariosDiv");
        usuarioDiv.style.display = "block";
    }
    function seleccionarSocio(valorCedula, valorNombre, valorApellido) {
        cedula.value = valorCedula.value;
        nombre.value = valorNombre.value;
        apellido.value = valorApellido.value;
        var udiv = document.getElementById("usuariosDiv");
        udiv.style.display = "none";
        var prestamoDiv = document.getElementById("prestamoDiv");
        prestamoDiv.style.display = "block";
    }
    function reiniciar() {
        var materialesDiv = document.getElementById("materialesDiv");
        materialesDiv.style.display = "block";

        var usuarioDiv = document.getElementById("usuariosDiv");
        usuarioDiv.style.display = "none";

        var prestamoDiv = document.getElementById("prestamoDiv");
        prestamoDiv.style.display = "none";
    }

</script>


<div id="materialesDiv">

    <fieldset>
        <legend>Materiales (Libros):</legend>
        <table id="PrestamoLibros" class="display" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <td>Nombre</td>
                    <td>Año</td>
                    <td>Cod.Material</td>
                    <td>N.Ejemplares</td>
                    <td>ESTADO</td>
                    <td>DISPONIBLE</td>
                </tr> 
            </thead>

            <tfoot>
                <tr>
                    <td>Nombre</td>
                    <td>Año</td>
                    <td>Cod.Material</td>
                    <td>N.Ejemplares</td>
                    <td>ESTADO</td>
                    <td>DISPONIBLE</td>
                </tr> 
            </tfoot>
            <tbody>   
                <?php
                $resultado = unserialize($_SESSION['busquedaLibros']);

                $cantidad1 = count($resultado);

                for ($i = 0; $i < $cantidad1; $i++) {
                    echo"<tr>";
                    echo "<td>" . $resultado[$i]['m.nombre'] . "</td>";
                    echo "<td>" . $resultado[$i]['m.anio'] . "</td>";
                    echo "<td>" . $resultado[$i]['m.codigo_material'] . "</td>";
                    echo "<td>" . $resultado[$i]['cantidadEjemplares'] . "</td>";
                    echo "<td>" . $resultado[$i]['e.estado_anterior'] . "</td>";
//                    $ejemplarAReservar = $resultado[$i]['m.codigo_material'];
                    $temporal = $resultado[$i]["e.estado_anterior"];
                    if (strpos($temporal, "DISPONIBLE") !== FALSE) {
                        echo "<td style='background-color:#00FF00'>";
                        echo "<input type='button' value='Seleccionar' onclick='seleccionarMaterial(ejemplarMaterial" . $i . ",nombreMaterial" . $i . ")'/>";
                        echo "<input type='hidden' id='ejemplarMaterial" . $i . "' value='" . $resultado[$i]['m.codigo_material'] . "'/>";
                        echo "<input type='hidden' id='nombreMaterial" . $i . "' value='" . $resultado[$i]['m.nombre'] . "'/>";
//                        echo "<td style='background-color:#00FF00'>
//                <form name='input' action='../../../negocio/socio/prestamoDirectoNuevo.php' method='post' id='reserva'>
//                <input type='hidden' name='seleccionado' value='$ejemplarAReservar'>";
//                        echo"<input type='submit' value='Reservar' />";
                    } else {
                        echo "<td style='background-color:#FF0000'>";
                        echo "<input type='button' value='Seleccionar' onclick='seleccionarMaterial(ejemplarMaterial" . $i . ",nombreMaterial" . $i . ")' disabled='true'/>";
                        echo "<input type='hidden' id='ejemplarMaterial" . $i . "' value='" . $resultado[$i]['m.codigo_material'] . "'/>";
                        echo "<input type='hidden' id='nombreMaterial" . $i . "' value='" . $resultado[$i]['m.nombre'] . "'/>";
//                        echo "<td style='background-color:#FF0000'>
//                <form name='input' action='../../../negocio/socio/prestamoDirectoNuevo.php' method='post' id='reserva'>
//                <input type='hidden' name='seleccionado' value='$ejemplarAReservar'>";
//                        echo"<input type='submit' value='Reservar' disabled='true'/>";
                    }
                    echo"  </td>";
                    echo "</tr>";
                }
                echo "  </tbody></table>";
//            echo" </fieldset>";
                ?>


                </fieldset>

                </div>
            <div id="usuariosDiv">
                <fieldset>
                    <legend>Usuarios:</legend>
                    <table id="Usuarios" class="display" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <td></td>
                                <td>Nombre</td>
                                <td>Apellido</td>
                                <td>Cedula</td>
                                <td>Ciudad</td>
                                <td>Seleccionar</td>
                            </tr> 
                        </thead>

                        <tfoot>
                            <tr>
                                <td></td>
                                <td>Nombre</td>
                                <td>Apellido</td>
                                <td>Cedula</td>
                                <td>Ciudad</td>
                                <td>Seleccionar</td>
                            </tr> 
                        </tfoot>

                        <tbody>    
                            <?php
                            $resultadoListUsuarios = unserialize($_SESSION['listadoUsuarios']);
                            $cantidad = count($resultadoListUsuarios);

//        $resultCursos = unserialize($_SESSION['CURSOS']);
//        $cantidadCurso = count($resultCursos);
                            for ($i = 0; $i < $cantidad; $i++) {

                                echo "<tr>";
                                if (file_exists("../../imagenes/fotousuario/" . $resultadoListUsuarios[$i]["ci"] . ".jpg")) {
                                    echo "<td><img src='../../imagenes/fotousuario/" . $resultadoListUsuarios[$i]["ci"] . ".jpg' alt='' height='30'/>  </td>";
                                } else {
                                    echo "<td><img src='../../imagenes/fotousuario/silueta.jpg' alt='' height='30'/>  </td>";
                                }


                                echo "<td>" . $resultadoListUsuarios[$i]["nombre"] . "</td>";
                                echo "<td>" . $resultadoListUsuarios[$i]["apellido"] . "</td>";
                                echo "<td>" . $resultadoListUsuarios[$i]["ci"] . "</td>";
                                echo "<td>" . $resultadoListUsuarios[$i]["ciudad"] . "</td>";
                                echo "<td>";
                                echo "<input type='button' value='Seleccionar' onclick='seleccionarSocio(cedula" . $i . ",nombre" . $i . ",apellido" . $i . ")'/>";
                                echo "<input type='hidden' id='cedula" . $i . "' value='" . $resultadoListUsuarios[$i]["ci"] . "'/>";
                                echo "<input type='hidden' id='nombre" . $i . "' value='" . $resultadoListUsuarios[$i]["nombre"] . "'/>";
                                echo "<input type='hidden' id='apellido" . $i . "' value='" . $resultadoListUsuarios[$i]["apellido"] . "'/>";
                                echo "</td>";
                                echo "</tr>";
                            }
                            echo "  </tbody></table>";
//            echo" </fieldset>";
                            ?>
                            </fieldset>

                            </div>


                        <div id="prestamoDiv">

                            <fieldset>
                                <legend>
                                    Prestar Ejemplar a Usuario:
                                </legend>
                                <form name='input' action='../../../negocio/bibliotecologo/prestamoDirectoNuevoConfirmacion.php' method='post' id='formConfPrest'>
                                    Nombre:</br>
                                    <input id="nombre" name="nombre" readonly></br>
                                    Apellido:</br>
                                    <input id="apellido" name="apellido" readonly></br>
                                    Cedula:</br>
                                    <input id="cedula" name="cedula" readonly></br>
                                    Ejemplar:</br>
                                    <input id="ejemplarNombre" name="ejemplarNombre" readonly></br>
                                    Codigo Ejemplar:</br>
                                    <input id="ejemplarCodigo" name="ejemplarCodigo" readonly></br>
                                    Estado de conservacion:</br>

                                    <?php
                                    $resultCodConservacion = unserialize($_SESSION['codConservacion']);

                                    $cantidadCodConservacion = count($resultCodConservacion);
                                    echo "   <select  id='selectcodConservacion' name='selectcodConservacion'>";

                                    for ($i = 0; $i < $cantidadCodConservacion; $i++) {

                                        echo "<option id='codConservacion" . $i . " nombre='codConservacion" . $i . "' value=" . $resultCodConservacion[$i]['codigo_conservacion'] . ">" . $resultCodConservacion[$i]['nombre'] . "</option>";
                                    }

                                    echo "</select></br>";
                                    ?>
                                    <input type='button' value='Enviar Solicitud' onclick='enviarForm()'/>
                                                                        <!--<input type="button" value="Prestar" />-->
                                    <input type="button" onclick="reiniciar();" value="Limpiar"/>
                                </form>
                            </fieldset>

                        </div>