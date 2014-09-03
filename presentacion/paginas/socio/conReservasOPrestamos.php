<fieldset>
    <legend>Usuario Con Reservas:</legend>
    </br></br>

    <p>USUARIO CON RESERVAS ACTIVAS, NO ES POSIBLE REALIZAR MAS RESERVAS</p>

    </br></br>
    <table id="reservaActiva" cellspacing="0" width="100%" border="1">
        <thead>
            <tr>
                <td  align='center'>Cedula</td>
                <td  align='center'>NombreCurso</td>
                <td  align='center'>Libro</td>
                <td  align='center'>Edicion</td>
                <td  align='center'>ISBN</td>
                <td  align='center'>Num.Reserva</td>
                <td  align='center'>Fecha Reserva</td>
                <td  align='center'>Fecha FinReserva</td>    

            </tr> 
        </thead>
        <?php
        $resultado = unserialize($_SESSION['reservasActivas']);

        $cantidad = count($resultado);

        for ($i = 0; $i < $cantidad; $i++) {

            echo "<tr>";
            echo "<td  align='center'>" . $resultado[$i]["ci"] . "</td>";
            echo "<td  align='center'>" . $resultado[$i]["cur.nombre"] . "</td>";
            echo "<td  align='center'>" . $resultado[$i]["mate.nombre"] . "</td>";
            echo "<td  align='center'>" . $resultado[$i]["edicion"] . "</td>";
            echo "<td  align='center'>" . $resultado[$i]["isbn"] . "</td>";
            echo "<td  align='center'>" . $resultado[$i]["nro_reserva"] . "</td>";
            echo "<td  align='center'>" . $resultado[$i]["fecha_inicio"] . "</td>";
            echo "<td  align='center'>" . $resultado[$i]["fecha_fin"] . "</td>";

            echo "</tr>";
        }
        ?>
    </table>
</fieldset>
<fieldset>
    <legend>Usuario Con Prestamos:</legend>
    </br></br>

    <p>USUARIO CON PRESTAMOS ACTIVOS, NO ES POSIBLE REALIZAR MAS RESERVAS</p>

    </br></br>
    <table id="prestamoActivo" cellspacing="0" width="100%" border="1">
        <thead>
            <tr>
                <td  align='center'>Cedula</td>
                <td  align='center'>CodigoConservacion</td>
                <td  align='center'>CodigoEjemplar</td>
                <td  align='center'>Fecha Prestado</td>
                <td  align='center'>Fecha Fin Prestamo</td>    
                <td  align='center'>Fecha Devolucion</td>
            </tr> 
        </thead>
        <?php
        $resultadoPrestamo = unserialize($_SESSION['prestamoActivo']);

        $cantidad = count($resultadoPrestamo);

        for ($i = 0; $i < $cantidad; $i++) {
            
            echo "<tr>";
            echo "<td  align='center'>" . $resultadoPrestamo[$i]["ci"] . "</td>";
            echo "<td  align='center'>" . $resultadoPrestamo[$i]["codigo_conservacion"] . "</td>";
            echo "<td  align='center'>" . $resultadoPrestamo[$i]["codigo_ejem"] . "</td>";
            echo "<td  align='center'>" . $resultadoPrestamo[$i]["fecha_inicio"] . "</td>";
            echo "<td  align='center'>" . $resultadoPrestamo[$i]["fecha_fin"] . "</td>";
            echo "<td  align='center'>" . $resultadoPrestamo[$i]["fecha_devolucion"] . "</td>";

            echo "</tr>";
        }
        ?>
    </table>
</fieldset>
