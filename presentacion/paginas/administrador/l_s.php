
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

$resultado=unserialize($_SESSION["probando"]);

    $cantidad=count($resultado);
    
    for($i=0;$i<$cantidad;$i++){
        
        echo "<tr>";
        if (file_exists("../../imagenes/fotousuario/".$resultado[$i]["ci"].".jpg")){
               echo "<td><img src='../../imagenes/fotousuario/".$resultado[$i]["ci"].".jpg' alt='' height='30'/>  </td>";
           }
           else
           {
               echo "<td><img src='../../imagenes/fotousuario/silueta.jpg' alt='' height='30'/>  </td>";
           }
        
        
        echo "<td>".$resultado[$i]["nombre"]."</td>";
        echo "<td>".$resultado[$i]["apellido"]."</td>";
        echo "<td>".$resultado[$i]["ci"]."</td>";
        echo "<td>".$resultado[$i]["ciudad"]."</td>";
        echo "<td>
                <form name='input' action='../../../negocio/administrador/buscar.php' method='post' id='frmBuscar'>
                    <input type='submit' value='Modificar/Eliminar' /><input type='hidden' name='documento' value='".$resultado[$i]["ci"]."'/>
                </form>
            </td>";
        echo "</tr>";
    }
            

?>    
</table>