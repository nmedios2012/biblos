<!--<fieldset>-->

<!--    
    <legend>Seleccionar Socio:</legend>-->
<!--<html>
    <head>-->
<!-- DataTables CSS -->
<link rel="stylesheet" type="text/css" href="../../js/datatable/DataTables-1.10.1/media/css/jquery.dataTables.css">

<!-- jQuery -->
<script type="text/javascript" charset="utf8" src="../../js/datatable/DataTables-1.10.1/media/js/jquery.js"></script>

<!-- DataTables -->
<script type="text/javascript" charset="utf8" src="../../js/datatable/DataTables-1.10.1/media/js/jquery.dataTables.js"></script>

<script>
    $(document).ready(function() {
        $('#example').dataTable();
    });
</script>
<script type="text/javascript">
    function seleccionarCurso() {
        var x = document.getElementById("selectCurso").selectedIndex;
        var y = document.getElementById("selectCurso").options;
//        alert("Index: " + y[x].value);
        curso.value = y[x].text;
        codigocurso.value =  y[x].value;
    }
    function seleccionarSocio(valorCedula, valorNombre, valorApellido) {
        cedula.value = valorCedula.value;
        nombre.value = valorNombre.value;
        apellido.value = valorApellido.value;
    }
</script>
<fieldset>



    <legend>Usuarios:</legend>
    <table id="example" class="display" cellspacing="0" width="100%">
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
            $resultado = unserialize($_SESSION['listadoUsuarios']);
            $cantidad = count($resultado);

//        $resultCursos = unserialize($_SESSION['CURSOS']);
//        $cantidadCurso = count($resultCursos);
            for ($i = 0; $i < $cantidad; $i++) {

                echo "<tr>";
                if (file_exists("../../imagenes/fotousuario/" . $resultado[$i]["ci"] . ".jpg")) {
                    echo "<td><img src='../../imagenes/fotousuario/" . $resultado[$i]["ci"] . ".jpg' alt='' height='30'/>  </td>";
                } else {
                    echo "<td><img src='../../imagenes/fotousuario/silueta.jpg' alt='' height='30'/>  </td>";
                }


                echo "<td>" . $resultado[$i]["nombre"] . "</td>";
                echo "<td>" . $resultado[$i]["apellido"] . "</td>";
                echo "<td>" . $resultado[$i]["ci"] . "</td>";
                echo "<td>" . $resultado[$i]["ciudad"] . "</td>";
                echo "<td>";
                echo "<input type='button' value='Seleccionar' onclick='seleccionarSocio(cedula" . $i . ",nombre" . $i . ",apellido" . $i . ")'/>";
                echo "<input type='hidden' id='cedula" . $i . "' value='" . $resultado[$i]["ci"] . "'/>";
                echo "<input type='hidden' id='nombre" . $i . "' value='" . $resultado[$i]["nombre"] . "'/>";
                echo "<input type='hidden' id='apellido" . $i . "' value='" . $resultado[$i]["apellido"] . "'/>";
                echo "</td>";
                echo "</tr>";
            }
            echo "  </tbody></table>";
            echo" </fieldset>";
            ?>
        <fieldset>



            <legend>Curso:</legend>

            <?php
            $resultCursos = unserialize($_SESSION['CURSOS']);

            $cantidadCurso = count($resultCursos);
            echo "   <select  id='selectCurso' name='selectCurso'>";

            for ($i = 0; $i < $cantidadCurso; $i++) {

                echo "<option id='curso" . $i . " nombre='curso" . $i . "' value=" . $resultCursos[$i]['codigo_curso'] . ">" . $resultCursos[$i]['nombre'] . "</option>";
            }

            echo "</select> <input type='button' value='Seleccionar Curso' onclick='seleccionarCurso()'/>";
            ?>

        </fieldset>

        <fieldset>
            <legend>
                Usuario -> Curso:
            </legend>
            <form name='input' action='../../../negocio/bibliotecologo/asignarUsuarioACurso.php' method='post' id='frmBuscar'>
                Nombre:</br>
                <input id="nombre" name="nombre" readonly></br>
                Apellido:</br>
                <input id="apellido" name="apellido" readonly></br>
                Cedula:</br>
                <input id="cedula" name="cedula" readonly></br>
                Curso:</br>
                <input id="curso" name="curso" readonly></br>
                Codigo Curso:</br>
                <input  id="codigocurso" name="codigocurso" readonly></br>
                </br>

                <input type="submit" value="Asignar Usuario-Curso"/>
                
            </form>
        </fieldset>






