
<div>
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
</div>
<table border="1">
    <tr>

        <td>Nombre</td>
        <td>Año</td>
        <td>N.Ejemplares</td>
        <!--<td>Disponible</td>-->
        <!--<td>Reserva</td>-->
        <td>ESTADO</td>
        <td>DISPONIBLE</td>
    </tr>
    <?php
    $resultado = unserialize($_SESSION['busquedaLibros']);

    $cantidad = count($resultado);

    for ($i = 0; $i < $cantidad; $i++) {
        echo"<tr>";

        echo "<td>" . $resultado[$i]['m.nombre'] . "</td>";
        echo "<td>" . $resultado[$i]['m.anio'] . "</td>";
        echo "<td>" . $resultado[$i]['m.codigo_material'] . "</td>";

//echo "<td>" . $resultado[$i]['m.comentario_general'] . "</td>";
//echo "<td>" . $resultado[$i]['m.fecha_alta'] . "</td>";
//echo "<td>" . $resultado[$i]['m.fecha_baja'] . "</td>";
//echo "<td>" . $resultado[$i]['m.estado_logico'] . "</td>";
//echo "<td>" . $resultado[$i]['m.fecha_borrado'] . "</td>";
//        echo "<td>" . $resultado[$i]['ej.cod_est'] . "</td>";cantidadEjemplares
        echo "<td>" . $resultado[$i]['cantidadEjemplares'] . "</td>";
//echo "<td>" . $resultado[$i]['ej.codigo_ejem'] . "</td>";
//echo "<td>" . $resultado[$i]['ej.codigo_material'] . "</td>";
//echo "<td>" . $resultado[$i]['ej.fecha_alta'] . "</td>";
//echo "<td>" . $resultado[$i]['ej.fecha_baja'] . "</td>";
//echo "<td>" . $resultado[$i]['ej.estado_logico'] . "</td>";
//echo "<td>" . $resultado[$i]['ej.fecha_borrado'] . "</td>";
//echo "<td>" . $resultado[$i]['e.cod_est'] . "</td>";
        echo "<td>" . $resultado[$i]['e.estado_anterior'] . "</td>";
//echo "<td>" . $resultado[$i]['e.estado_logico'] . "</td>";
//echo "<td>" . $resultado[$i]['e.fecha_borrado'] . "</td>";  
//        echo "<td>" . $resultado[$i]["m.nombre"] . "</td>";
//        echo "<td>" . $resultado[$i]["m.anio"] . "</td>";
//        echo "<td>" . $resultado[$i]["ej.codigo_material"] . "</td>";
//        echo "<td>" . $resultado[$i]["e.estado_anterior"] . "</td>";
//        echo "<td>" . $resultado[$i]["isbn"] . "</td>";        
//        echo "<td><input type="hidden' name='isbn' value='" . $resultado[$i]["isbn"] . "</td>";
        $disponible[$i] = '';

        if (($resultado[$i]["e.estado_anterior"] == 'DISPONIBLE') && ( $resultado[$i]["m.codigo_material"] >= 1)) {

            $disponible[$i] = "#FF0000"; //DISPONIBLE
        } else {
            $disponible[$i] = "#00FF00"; //NO DISPONIBLE
        }

        $ejemplarAReservar = $resultado[$i]['m.codigo_material'];
        echo "<td style='background-color:$disponible[$i]'/>
                <form name='input' action='../../../negocio/socio/reservar.php' method='post' id='reserva'>
                <input type='hidden' name='seleccionado' value='$ejemplarAReservar'>";

        if ($disponible[$i] == "#FF0000") {
            echo"<input type='submit' value='Reservar' disabled/>";
        } else {
            echo"<input type='submit' value='Reservar' />";
        }

        echo"  </form>
            </td>";
        echo "</tr>";
    }
    ?>    
</table>


