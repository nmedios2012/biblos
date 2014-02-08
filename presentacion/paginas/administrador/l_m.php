
    <table border="1">
    <tr>
        
        <td>Nombre</td>
        <td>Año</td>
        <td>Descripcion</td>
        <td>Disponible</td>
    </tr>
<?php

$resultado=unserialize($_SESSION["probando"]);

    $cantidad=count($resultado);
    
    for($i=0;$i<$cantidad;$i++){
        
        
        echo"<tr>";
        echo "<td>".$resultado[$i]["nombre"]."</td>";
        echo "<td>".$resultado[$i]["anio"]."</td>";
        echo "<td>".$resultado[$i]["descripcion"]."</td>";
        echo "<td class='disponibleCasa'>En Sala</td>";

        echo "</tr>";
    }
            

?>    
</table>

