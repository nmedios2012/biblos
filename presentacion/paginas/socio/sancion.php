
<fieldset>
    <legend>Usuario Sancionado:</legend>
    </br></br></br>

    <p>USUARIO SANCIONADO NO ES POSIBLE ATENDER SU SOLICITUD</p>
    </br></br>
    <?php
    $resultado = unserialize($_SESSION['sancionado']);

    echo "<p>Dias restantes de penalizacion: $resultado  </p>";
    ?>    

</fieldset>