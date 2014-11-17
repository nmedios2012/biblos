
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

<fieldset>



    <legend>Listado Reservas:</legend>
    <table id="example" class="display" cellspacing="0" width="100%">
        <thead>
            <tr>
                <td>Cedula</td>
                <td>Libro</td>
                <td>Edicion</td>
                <td>ISBN</td>
                <td>Num.Reserva</td>
                <td>Fec.Reserva</td>
                <td>Fec.FinReserva</td>
                <td>Préstamo</td>

            </tr> 
        </thead>

        <tfoot>
            <tr>
                <td>Cedula</td>
                <td>Libro</td>
                <td>Edicion</td>
                <td>ISBN</td>
                <td>Num.Reserva</td>
                <td>Fec.Reserva</td>
                <td>Fec.FinReserva</td>
                <td>Préstamo</td>

            </tr> 
        </tfoot>

        <tbody>    
            <?php
            $resultado = unserialize($_SESSION['listadoResBiblo']);
//    unset($_SESSION['listadoResBiblo']);
            $cantidad = count($resultado);
            $resultadoEjemplares = unserialize($_SESSION['ejemplaresPorMaterial']);
//$cantidadEjemplares = count($resultadoEjemplares);
            for ($i = 0; $i < $cantidad; $i++) {

                echo "<tr>";
                echo "<td>" . $resultado[$i]["ci"] . "</td>";
                //echo "<td>" . $resultado[$i]["cur.nombre"] . "</td>";
                echo "<td>" . $resultado[$i]["mate.nombre"] . "</td>";
                echo "<td>" . $resultado[$i]["edicion"] . "</td>";
                echo "<td>" . $resultado[$i]["isbn"] . "</td>";
                echo "<td>" . $resultado[$i]["nro_reserva"] . "</td>";
                echo "<td>" . $resultado[$i]["fecha_inicio"] . "</td>";
                echo "<td>" . $resultado[$i]["fecha_fin"] . "</td>";
//                echo "<td><a href='../../../negocio/bibliotecologo/altaprestamoporreserva.php?m=".  $resultado[$i]["codigo_material"] . "&r=".  $resultado[$i]["nro_reserva"] . "&c=" . $resultado[$i]["ci"] . "'>Prestar</a></td>";
//                echo "<td>                                   
//<a href='../../../negocio/bibliotecologo/altaprestamoporreserva.php?nro_reserva=".  $resultado[$i]["nro_reserva"] . "&ci=" . $resultado[$i]["ci"] . "&codigo_material=".  $resultado[$i]["codigo_material"]."'>Prestar</a>
//                        
//                    </td>";
                echo '<td>';
                echo "<form name='input' action='../../../negocio/bibliotecologo/altaprestamoporreserva.php' method='post' id='PrestamoReserva'>";
                echo"<input type='hidden' name='nro_reserva' value='" . $resultado[$i]["nro_reserva"] . "'>";
                echo"<input type='hidden' name='ci' value='" . $resultado[$i]["ci"] . "'>";
                echo"<input type='hidden' name='codigo_material' value='" . $resultado[$i]["codigo_material"] . "'>";
                echo "Numero De Ejemplar:<select  id='ejemplar' name='ejemplar'>";
                for ($index = 0; $index < count($resultadoEjemplares[$i]); $index++) {
                    echo "<option id='numEjemplar" . $i . $index . " nombre='numEjemplar" . $i . $index . "' value=" . $resultadoEjemplares[$i][$index]["codigo_ejem"] . ">" . $resultadoEjemplares[$i][$index]["codigo_ejem"] . "</option>";
                }
                echo "</select></br>";
                $resultCodConservacion = unserialize($_SESSION['codConservacion']);

                $cantidadCodConservacion = count($resultCodConservacion);
                echo "Estado Conservacion:<select  id='selectcodConservacion' name='selectcodConservacion'>";

                for ($ix = 0; $ix < $cantidadCodConservacion; $ix++) {

                    echo "<option id='codConservacion" . $ix . " nombre='codConservacion" . $ix . "' value=" . $resultCodConservacion[$ix]['codigo_conservacion'] . ">" . $resultCodConservacion[$ix]['nombre'] . "</option>";
                }

                echo "</select></br>";
                echo"<input type='submit' value='Prestar' />";
                echo "</form>";
                echo '</td>';





                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
</fieldset>
