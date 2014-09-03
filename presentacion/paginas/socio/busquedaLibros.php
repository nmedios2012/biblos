<!-- DataTables CSS -->
<link rel="stylesheet" type="text/css" href="../../js/datatable/DataTables-1.10.1/media/css/jquery.dataTables.css">

<!-- jQuery -->
<script type="text/javascript" charset="utf8" src="../../js/datatable/DataTables-1.10.1/media/js/jquery.js"></script>

<!-- DataTables -->
<script type="text/javascript" charset="utf8" src="../../js/datatable/DataTables-1.10.1/media/js/jquery.dataTables.js"></script>
<script>
    $(document).ready(function() {
        $('#reservaLibros').dataTable();
    });
</script>
<!--<div>
    <select>
        <option value="libros">Libros</option>
        <option value="revistas">Revistas</option>
        <option value="fotocopia">Fotocopias</option>
        <option value="otro">Otros</option>
    </select> 

    <select>
        <option value="disponibles">Disponibles</option>
        <option value="reservados">Reservados</option>
        <option value="prestados">En Prestamo</option>
    </select> 
</div>-->





<fieldset>
    <legend>Materiales (Libros):</legend>
    <table id="reservaLibros" class="display" cellspacing="0" width="100%">
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

            $cantidad = count($resultado);

            for ($i = 0; $i < $cantidad; $i++) {
                echo"<tr>";
                echo "<td>" . $resultado[$i]['m.nombre'] . "</td>";
                echo "<td>" . $resultado[$i]['m.anio'] . "</td>";
                echo "<td>" . $resultado[$i]['m.codigo_material'] . "</td>";
                echo "<td>" . $resultado[$i]['cantidadEjemplares'] . "</td>";
                echo "<td>" . $resultado[$i]['e.estado_anterior'] . "</td>";
                $ejemplarAReservar = $resultado[$i]['m.codigo_material'];
                $temporal=$resultado[$i]["e.estado_anterior"];
                if (strpos($temporal, "DISPONIBLE") !== FALSE){
                    echo "<td style='background-color:#00FF00'>
                <form name='input' action='../../../negocio/socio/reservar.php' method='post' id='reserva'>
                <input type='hidden' name='seleccionado' value='$ejemplarAReservar'>";
                    echo"<input type='submit' value='Reservar' />";
                }else{
                    echo "<td style='background-color:#FF0000'>
                <form name='input' action='../../../negocio/socio/reservar.php' method='post' id='reserva'>
                <input type='hidden' name='seleccionado' value='$ejemplarAReservar'>";
                    echo"<input type='submit' value='Reservar' disabled='true'/>";
                    
                }
                echo"  </form> </td>";
                echo "</tr>";
            }
            ?>    
        </tbody></table>


</fieldset>