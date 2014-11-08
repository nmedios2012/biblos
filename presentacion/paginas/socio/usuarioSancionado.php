<fieldset>
    <legend>Usuario Sancionado:</legend>
    </br></br>

    <p>USUARIO SANCIONADO, NO ES POSIBLE REALIZAR MAS RESERVAS</p></br>
    <table id="sancionActiva" cellspacing="0" width="100%" border="1">
        <thead>
            <tr>
                <td  align='center'>Cedula</td>
                <td  align='center'>Sancion</td>
                <td  align='center'>Fecha Inicio Sancion</td>
                <td  align='center'>Fecha Fin Sancion</td>    

            </tr> 
        </thead>
        <?php
        $resultado = unserialize($_SESSION['sancionesActivas']);

        $cantidad = count($resultado);

        for ($i = 0; $i < $cantidad; $i++) {

            echo "<tr>";
            echo "<td  align='center'>" . $resultado[$i]["ci"] . "</td>";
            echo "<td  align='center'>" . $resultado[$i]["codigo"] . "</td>";
            echo "<td  align='center'>" . $resultado[$i]["fecha_inicio"] . "</td>";
            echo "<td  align='center'>" . $resultado[$i]["fecha_fin"] . "</td>";

            echo "</tr>";
        }
        ?>
    </table>

</fieldset>