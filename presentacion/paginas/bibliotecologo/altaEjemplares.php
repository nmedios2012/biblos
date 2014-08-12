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
    function seleccionarEstado() {
        var x = document.getElementById("selectEstado").selectedIndex;
        var y = document.getElementById("selectEstado").options;
//        alert("Index: " + y[x].value);
        nombreEstado.value = y[x].text;
        codigoEstado.value = y[x].value;
    }
    function seleccionarMaterial(codigoMaterial, nombreMaterial) {
        codigoMat.value = codigoMaterial.value;
        nomEjSel.value = nombreMaterial.value;
    }

    function mostrarDiv() {
        ejemplarNuevo.style.visibility = 'visible';
    }
</script>

<fieldset>
    <legend>Materiales:</legend>
    <table id="example" class="display" cellspacing="0" width="100%">
        <thead>
            <tr>
                <td>Codigo Material</td>
                <td>Nombre</td>
                <td>anio</td>
                <td>Comentario</td>
                <td></td>
<!--                <td>Fecha Alta</td>
                <td>Fecha Baja</td>
                <td>EstadoLogic</td>
                <td>Fecha Borrado</td>-->
            </tr> 
        </thead>

        <tfoot>
            <tr>
                <td>Codigo Material</td>
                <td>Nombre</td>
                <td>anio</td>
                <td>Comentario</td>
                <td></td>
<!--                <td>Fecha Alta</td>
                <td>Fecha Baja</td>
                <td>EstadoLogic</td>
                <td>Fecha Borrado</td>-->
            </tr> 
        </tfoot>

        <tbody>    
            <?php
            $resultado = unserialize($_SESSION['altaEjemplares']);
            $cantidad = count($resultado);

            for ($i = 0; $i < $cantidad; $i++) {
                echo "<td>" . $resultado[$i]["codigo_material"] . "</td>";
                echo "<input type='hidden' id='codigo_material" . $i . "' value='" . $resultado[$i]["codigo_material"] . "'/>";
                echo "<td>" . $resultado[$i]["nombre"] . "</td>";
                echo "<input type='hidden' id='nombre" . $i . "' value='" . $resultado[$i]["nombre"] . "'/>";
                echo "<td>" . $resultado[$i]["anio"] . "</td>";
                echo "<td>" . $resultado[$i]["comentario_general"] . "</td>";
                echo "<td><input type='button' value='Nuevo Ejemplar' onclick='seleccionarMaterial(codigo_material" . $i . ",nombre" . $i . ");seleccionarEstado();mostrarDiv()'/></td>";
                echo "</tr>";
            }
            echo "  </tbody></table>";
            echo" </fieldset>";
            ?>

        <div id="ejemplarNuevo" name="ejemplarNuevo" style="visibility: hidden">
            <fieldset>



                <legend>Ejemplar Nuevo:</legend>


                <?php
                $resultEstadoEjem = unserialize($_SESSION['estadoEjemplar']);

                $cantidadEstado = count($resultEstadoEjem);
                echo "<form name='input' action='../../../negocio/bibliotecologo/nuevoEjemplar.php' method='post' id='frmNuevoEjemplar'>";
                echo 'Estado del nuevo ejemplar: </br>';
                echo "   <select  id='selectEstado' name='selectEstado' onclick='seleccionarEstado()'>";

                for ($i = 0; $i < $cantidadEstado; $i++) {

                    echo "<option id='estado" . $i . " nombre='estado" . $i . "' value=" . $resultEstadoEjem[$i]['cod_est'] . ">" . $resultEstadoEjem[$i]['estado_anterior'] . "</option>";
                }
                echo "</select> </br>";
                echo "<div>";
                echo 'Nombre Material seleccionado: </br>';
                echo "<input type='text' id='nomEjSel' name='nomEjSel'  ></br>";
                echo 'Codigo Material seleccionado: </br>';
                echo "<input type='text' id='codigoMat' name='codigoMat'  ></br>";
                echo "</div>";
                echo "<div>";
//                echo "Estado del Ejemplar Nuevo: </br>";
                echo "<input type='hidden' id='nombreEstado' name='nombreEstado'  >";
//                echo "Codigo est1ado Nuevo: </br>";
                echo "<input type='hidden' id='codigoEstado' name='codigoEstado'  >";

                echo" <input type='submit' value='Generar Nuevo Ejemplar' />";
                echo"</from>";
                echo "</div>";

                echo "</br>";
                ?>


        </div>

