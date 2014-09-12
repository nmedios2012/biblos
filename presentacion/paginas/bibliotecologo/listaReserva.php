
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
                
            </tr> 
        </tfoot>

        <tbody>    
            <?php
            $resultado = unserialize($_SESSION['listadoResBiblo']);
//    unset($_SESSION['listadoResBiblo']);
            $cantidad = count($resultado);

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

                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
    <?php
    //echo $resultado[0]["mate.nombre"];
    //echo $resultado[1]["mate.nombre"];
    ?>
</fieldset>
