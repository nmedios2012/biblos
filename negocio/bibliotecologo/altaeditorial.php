<?php
        session_start();
        include "../configuracion/configuracion.php";	
        include "../../persistencia/conexion.php";
        include "../../persistencia/Bibliotecologo.php";
        $admin=new Bibliotecologo();
        extract($_POST);
        $admin->agregarEditorial($cod_emp,$nom_edit,$id_rol,$rol,$id_pais,$ciudad,$calle,$nro_puerta,
                $nro_apto,$tel1_emp,$tel2_emp,$interno,$mail,$fec_alta,$est_log);
        header("Location: ../../presentacion/paginas/bibliotecologo/index.php?pag=a_e")

?>
