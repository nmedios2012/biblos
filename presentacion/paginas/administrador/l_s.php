
<table border="0">
<?php

$resultado=unserialize($_SESSION["probando"]);

    $cantidad=count($resultado);
    
    for($i=0;$i<$cantidad;$i++){
        
        echo "<tr>";
        echo "<td>".$resultado[$i]["nombre"]."</td>";
        echo "<td>".$resultado[$i]["apellido"]."</td>";
        echo "</tr>";
    }
            

?>    
</table>