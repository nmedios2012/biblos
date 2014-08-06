
    <table border="1">
    <tr>
        
        <th>Nombre</th>
        <th>Año</th>
        <th>Descripcion</th>
        <th>Prestamo Disponible</th>
    </tr>
<?php

$resultado=unserialize($_SESSION["probando"]);

    $cantidad=count($resultado);
    
    for($i=0;$i<$cantidad;$i++){

        echo"<tr>";
        echo "<td>".$resultado[$i]["nombre"]."</td>";
        echo "<td>".$resultado[$i]["anio"]."</td>";
        echo "<td>".$resultado[$i]["descripcion"]."</td>";
        echo "<td class='". $resultado[$i]["disponibilidad"] ."'>". $resultado[$i]["mostrardisponibilidad"] ."</td>";

        echo "</tr>";
    }
            

?>    
</table>

