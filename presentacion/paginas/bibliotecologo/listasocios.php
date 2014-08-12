


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

<legend>Usuarios:</legend>
<fieldset>
    <table id="example" class="display" cellspacing="0" width="100%">
        <thead>
            <tr>
                <td></td>
                <td>Nombre</td>
                <td>Apellido</td>
                <td>Cedula</td>
                <td>Ciudad</td>
                <td>Seleccionar</td>
            </tr> 
        </thead>

        <tfoot>
            <tr>
                <td></td>
                <td>Nombre</td>
                <td>Apellido</td>
                <td>Cedula</td>
                <td>Ciudad</td>
                <td>Seleccionar</td>
            </tr> 
        </tfoot>

        <tbody>    
            <?php
            $resultado = unserialize($_SESSION['listadoUsuarios']);
//            unset($_SESSION['listadoUsuarios']);
            $cantidad = count($resultado);

//        $resultCursos = unserialize($_SESSION['CURSOS']);
//        $cantidadCurso = count($resultCursos);
            for ($i = 0; $i < $cantidad; $i++) {

                echo "<tr>";
                if (file_exists("../../imagenes/fotousuario/" . $resultado[$i]["ci"] . ".jpg")) {
                    echo "<td><img src='../../imagenes/fotousuario/" . $resultado[$i]["ci"] . ".jpg' alt='' height='30'/>  </td>";
                } else {
                    echo "<td><img src='../../imagenes/fotousuario/silueta.jpg' alt='' height='30'/>  </td>";
                }


                echo "<td>" . $resultado[$i]["nombre"] . "</td>";
                echo "<td>" . $resultado[$i]["apellido"] . "</td>";
                echo "<td>" . $resultado[$i]["ci"] . "</td>";
                echo "<td>" . $resultado[$i]["ciudad"] . "</td>";
                echo "<td>";
                echo "<input type='button' value='Seleccionar' onclick='seleccionarSocio(cedula" . $i . ",nombre" . $i . ",apellido" . $i . ")'/>";
                echo "<input type='hidden' id='cedula" . $i . "' value='" . $resultado[$i]["ci"] . "'/>";
                echo "<input type='hidden' id='nombre" . $i . "' value='" . $resultado[$i]["nombre"] . "'/>";
                echo "<input type='hidden' id='apellido" . $i . "' value='" . $resultado[$i]["apellido"] . "'/>";
                echo "</td>";
                echo "</tr>";
            }
            echo "  </tbody></table>";
            echo" </fieldset>";
            ?>
<!--        <fieldset>-->


<!--
<table border="1">
    <tr>
        <td></td>
        <td>Nombre</td>
        <td>Apellido</td>
        <td>Cedula</td>
        <td>Ciudad</td>
        <td>Ir</td>
    </tr>   
<?php
//include_once('../../../negocio/bibliotecologo/listadoUsuario.php');
//        
//$resultado=unserialize($_SESSION["probando"]);
//
//    $cantidad=count($resultado);
//    
//    for($i=0;$i<$cantidad;$i++){
//        
//        echo "<tr>";
//        if (file_exists("../../imagenes/fotousuario/".$resultado[$i]["ci"].".jpg")){
//               echo "<td><img src='../../imagenes/fotousuario/".$resultado[$i]["ci"].".jpg' alt='' height='30'/>  </td>";
//           }
//           else
//           {
//               echo "<td><img src='../../imagenes/fotousuario/silueta.jpg' alt='' height='30'/>  </td>";
//           }
//        
//        
//        echo "<td>".$resultado[$i]["nombre"]."</td>";
//        echo "<td>".$resultado[$i]["apellido"]."</td>";
//        echo "<td>".$resultado[$i]["ci"]."</td>";
//        echo "<td>".$resultado[$i]["ciudad"]."</td>";
//        echo "<td>
//                <form name='input' action='../../../negocio/bibliotecologo/buscar.php' method='post' id='frmBuscar'>
//                    <input type='submit' value='Modificar/Eliminar' /><input type='hidden' name='documento' value='".$resultado[$i]["ci"]."'/>
//                </form>
//            </td>";
//        echo "</tr>";
//    }
//            
//
?>    
</table>-->