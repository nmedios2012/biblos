
<!-- DataTables CSS -->
<link rel="stylesheet" type="text/css" href="../../js/datatable/DataTables-1.10.1/media/css/jquery.dataTables.css">

<!-- jQuery -->
<script type="text/javascript" charset="utf8" src="../../js/datatable/DataTables-1.10.1/media/js/jquery.js"></script>

<!-- DataTables -->
<script type="text/javascript" charset="utf8" src="../../js/datatable/DataTables-1.10.1/media/js/jquery.dataTables.js"></script>

<script>
    $(document).ready(function() {
        $('#listadoPrestamoBiblotecologo').dataTable();
    });
</script>

<fieldset>



    <legend>Listado Prestamos:</legend>
    <table id="listadoPrestamoBiblotecologo" class="display" cellspacing="0" width="100%">
        <thead>
            <tr>
                <!--ci,codigo_conservacion,codigo_ejem,fecha_inicio,fecha_fin,fecha_devolucion-->

                <td>Cedula</td>
                <td>codigo_conservacion</td>
                <td>codigo_ejem</td>
                <td>fecha_inicio</td>
                <td>fecha_fin</td>
                <td>Sancion</td>
                <td>Devolucion</td>

            </tr> 
        </thead>

        <tfoot>
            <tr>
                <td>Cedula</td>
                <td>codigo_conservacion</td>
                <td>codigo_ejem</td>
                <td>fecha_inicio</td>
                <td>fecha_fin</td>
                <td>Sancion</td>
                <td>Devolucion</td>

            </tr> 
        </tfoot>

        <tbody>    
            <?php
            $resultado = unserialize($_SESSION['listadoPrestamos']);
            $cantidad = count($resultado);


            $resultadoSanciones = unserialize($_SESSION['sanciones']);
            $cantidadSanciones = count($resultadoSanciones);

            $resultadoEstadosEjemplares = unserialize($_SESSION['estadoEjemplar']);
            $cantidadEE = count($resultadoEstadosEjemplares);
//            $fecha_hoy = date("d/m/Y");
            $fecha_hoy = date('Y-m-d');

//$fechaHoy = date('Y-m-d');
//$fechaHoy2 = strtotime("$fechaHoy");


            for ($i = 0; $i < $cantidad; $i++) {

                echo "<tr>";
                echo "<td>" . $resultado[$i]["ci"] . "</td>";
//                echo "<td>" . $resultado[$i]["codigo_conservacion"] . "</td>";
                echo "<td>" . $resultado[$i]["nombre_conservacion"] . "</td>";
                echo "<td>" . $resultado[$i]["codigo_ejem"] . "</td>";
                echo "<td>" . $resultado[$i]["fecha_inicio"] . "</td>";
                echo "<td>" . $resultado[$i]["fecha_fin"] . "</td>";
//                echo "<td>" . $resultado[$i]["fecha_devolucion"] . "</td>";
                $codigoConservacion = $resultado[$i]["codigo_conservacion"];
                $ejemplarPrestado = $resultado[$i]["codigo_ejem"];
                $ci = $resultado[$i]["ci"];

                if ($resultado[$i]["fecha_fin"] > $fecha_hoy) {
                    echo "<td style='background-color:#00FF00'>";
                } else {
                    echo "<td style='background-color:#FF0000'>";
                }

                echo"<form name='sancionForm' action='../../../negocio/bibliotecologo/sancionar.php' method='post' id='sancionForm'>
                <input type='hidden' name='ejemplar' value='$ejemplarPrestado'/>";
                echo" <input type='hidden' name='ci' value='$ci'>";
                echo "Tipo de sancion: <select  id='selectSanciones' name='selectSanciones'>";
                $cantidadSanciones = count($resultadoSanciones);
                for ($iy = 0; $iy < $cantidadSanciones; $iy++) {
                    echo "<option id='sancion" . $iy . " nombre='sancion" . $iy . "' value=" . $resultadoSanciones[$iy]['codigo'] . ">" . $resultadoSanciones[$iy]['nombre'] . "</option>";
                }

                echo "</select> ";
                echo"<input type='submit' value='Sancionar'/>";
                echo"  </form> </td>";



//                if ($resultado[$i]["fecha_fin"] > $fecha_hoy) {
                echo "<td style='background-color:#00FF00'>
                <form name='devolucionForm' action='../../../negocio/bibliotecologo/devolucion.php' method='post' id='devolucionForm'>
                <input type='hidden' name='ejemplar' value='$ejemplarPrestado'>
                <input type='hidden' name='ci' value='$ci'>
                <input type='hidden' name='codigoConservacion' value='$codigoConservacion'>";

//                echo"Estado de conservacion:<select id='estadoDevolucion' name='estadoDevolucion'>
//    <option id='est1' name='est1' value='1'>Opcion1</option>
//    <option id='est2' name='est2' value='2'>Opcion2</option>
//    <option id='est3' name='est3' value='3'>Opcion3</option>
//    <option id='est4' name='est4' value='4'>Opcion4</option>
//    <option id='est5' name='est5' value='5'>Opcion5</option>
//    
//</select>";
                $cantidadEE = count($resultadoEstadosEjemplares);
                echo"Estado de conservacion:<select id='estadoDevolucion' name='estadoDevolucion'>";
                for ($i2 = 0; $i2 < $cantidadEE; $i2++) {
                    echo "<option id='estadoCon" . $i2 . " nombre='estadoCon" . $i2 . "' value=" . $resultadoEstadosEjemplares[$i2]['codigo_conservacion'] . ">" . $resultadoEstadosEjemplares[$i2]['nombre'] . "</option>";
                }

                echo "</select> ";
                echo"<input type='submit' value='Devolucion' />";
                echo"  </form> </td>";
//                } else {
//                }




                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
</fieldset>
<!--<select id='estadoDevolucion' name='estadoDevolucion'>
    <option id='est1' name='est1' value='1'>Opcion1</option>
    <option id='est2' name='est2' value='2'>Opcion2</option>
    <option id='est3' name='est3' value='3'>Opcion3</option>
    <option id='est4' name='est4' value='4'>Opcion4</option>
    <option id='est5' name='est5' value='5'>Opcion5</option>
    
</select>-->