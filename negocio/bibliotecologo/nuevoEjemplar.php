<?php

session_start();
include "../../negocio/configuracion/configuracion.php";
include "../../persistencia/conexion.php";
include "../../persistencia/Bibliotecologo.php";
$admin = new Bibliotecologo();

extract($_POST);

//echo $_POST['codigoMat'];
//echo"";
//echo $_POST['codigoEstado'];
$resultado = $admin->nuevoEjemplar($_POST['codigoMat'], $_POST['codigoEstado']);
?>
<!--<script>
    function ingresoSatisfactorio() {
        alert("Ingreso Correcto");
        return true;
    }
    function error() {
        alert("No se pudo ingresar el ejemplar");

    }
</script>-->

<?php
//
//function phpAlert($msg) {
//    echo '<script type="text/javascript">alert("' . $msg . '")</script>';
//    return true;
//}
//
//if ($resultado) {
////    echo '<form id="asd" onload="ingresoSatisfactorio();"></form>';    
////    phpAlert("Ingreso Correcto");
////    echo '<body onload="ingresoSatisfactorio()" />';
//    if (phpAlert("Ingreso Correcto")) {
//        header("Location: ../../presentacion/paginas/bibliotecologo/index.php?pag=altaEjemplares");
//    }
//} else {
//    echo '<body onload="error()" />';
//}
?>