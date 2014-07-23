
<table border="1">
    <tr style="background-color: grey;">
        <td>Cedula</td>
        <td>NombreCurso</td>
        <td>Material/Libro</td>
        <td>Edicion</td>
        <td>ISBN</td>
        <td>NumeroReserva</td>
        <td>FechaReserva</td>
        <td>FechaFinReserva</td>        

    </tr>   
    <?php
//include_once('../../../negocio/bibliotecologo/listadoUsuario.php');

    $resultado = unserialize($_SESSION['listadoResBiblo']);

    $cantidad = count($resultado);

    for ($i = 0; $i < $cantidad; $i++) {

        echo "<tr>";
//        if (file_exists("../../imagenes/fotousuario/".$resultado[$i]["ci"].".jpg")){
//               echo "<td><img src='../../imagenes/fotousuario/".$resultado[$i]["ci"].".jpg' alt='' height='30'/>  </td>";
//           }
//           else
//           {
//               echo "<td><img src='../../imagenes/fotousuario/silueta.jpg' alt='' height='30'/>  </td>";
//           }

        echo "<td>" . $resultado[$i]["ci"] . "</td>";
        echo "<td>" . $resultado[$i]["cur.nombre"] . "</td>";
        echo "<td>" . $resultado[$i]["mate.nombre"] . "</td>";
        echo "<td>" . $resultado[$i]["edicion"] . "</td>";
        echo "<td>" . $resultado[$i]["isbn"] . "</td>";
        echo "<td>" . $resultado[$i]["nro_reserva"] . "</td>";
        echo "<td>" . $resultado[$i]["fecha_inicio"] . "</td>";
        echo "<td>" . $resultado[$i]["fecha_fin"] . "</td>";
//        echo "<td>" . $resultado[$i]["estado_logico"]."</td>";
//        echo "<td>" . $resultado[$i]["fecha_borrado"] ."</td>";
//        echo "<td>
//                <form name='input' action='../../../negocio/bibliotecologo/buscar.php' method='post' id='frmBuscar'>
//                    <input type='submit' value='Modificar/Eliminar' /><input type='hidden' name='documento' value='" . $resultado[$i]["ci"] . "'/>
//                </form>
//            </td>";
        echo "</tr>";
    }
    ?>    
</table>