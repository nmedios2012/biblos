<link rel="stylesheet" type="text/css" href="../../js/datatable/DataTables-1.10.1/media/css/jquery.dataTables.css">

<!-- jQuery -->
<script type="text/javascript" charset="utf8" src="../../js/datatable/DataTables-1.10.1/media/js/jquery.js"></script>

<!-- DataTables -->
<script type="text/javascript" charset="utf8" src="../../js/datatable/DataTables-1.10.1/media/js/jquery.dataTables.js"></script>

<script>
    $(document).ready(function() {
        $('#listadoMaterialBiblo').dataTable();
    });
</script>
<legend>Listado Materiales:</legend>
<fieldset>
    <table id="listadoMaterialBiblo" class="display" cellspacing="0" width="100%">
        <thead>
            <tr>
                
                <td>Nombre</td>
                <td>Año</td>
                <td>Descripcion</td>
                <td>Prestamo Disponible</td>
            </tr> 
        </thead>

        <tfoot>
            <tr>
                
                <td>Nombre</td>
                <td>Año</td>
                <td>Descripcion</td>
                <td>Prestamo Disponible</td>
            </tr> 
        </tfoot>

    
            <?php
            $resultado = unserialize($_SESSION["probando"]);

            $cantidad = count($resultado);

            for ($i = 0; $i < $cantidad; $i++) {

                echo"<tr>";
                echo "<td>" . $resultado[$i]["nombre"] . "</td>";
                echo "<td>" . $resultado[$i]["anio"] . "</td>";
                echo "<td>" . $resultado[$i]["descripcion"] . "</td>";
                echo "<td class='" . $resultado[$i]["disponibilidad"] . "'>" . $resultado[$i]["mostrardisponibilidad"] . "</td>";

                echo "</tr>";
            }
            ?>    
        </table>

</fieldset>