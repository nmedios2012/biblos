<?php

class Administrador extends Conexion {

    public function __construct() {//El constructor de la clase administrativo
        parent::__construct(SERVIDOR, PUERTO, USUARIO_ADMINISTRATIVO, PASS_ADMINISTRATIVO);
    }

    //Se guarda en la tabla tel_usuario el telefono correspondiente a la cedula
    public function insertarTelefono($ci, $tel) {

        $this->consultar("INSERT INTO tel_usuario (ci,tel_usu,estado_logico)VALUES('$ci','$tel','si')");
        return true;
    }

    //Se guarda en la tabla usuario los datos
    public function agregarUsuario($ci, $nombre, $apellido, $ciudad, $calle, $nro_apto, $nro_puerta, $email) {
        
        $esta=$this->escalar("SELECT COUNT(*) FROM usuario WHERE ci=$ci OR e_mail='$email'");
        if($esta==0){
            $this->consultar("INSERT INTO usuario (ci,nombre,apellido,link_foto,ciudad,calle,
                              numero_apartamento,numero_puerta,e_mail,estado_logico)
                              VALUES ($ci,'$nombre','$apellido','   ','$ciudad','$calle',$nro_apto,$nro_puerta,'$email','si')
                                    ");
            return true;
        }
        else{
            return false;
        }
        
    }

    //Me dan el codigo material, buscamos el primer codigo ejemplar disponible
    
    public function codigoEjemplar($codigo_material){
        
        return $this->escalar(" SELECT ce.codigo_ejem
                                FROM ejemplar_material AS ce
                                WHERE ce.codigo_material=$codigo_material AND ce.codigo_ejem
                                      NOT IN (  SELECT ejemplar_material.codigo_ejem
                                                FROM ejemplar_material INNER JOIN prestamos
                                                ON ejemplar_material.codigo_ejem =prestamos.codigo_ejem
                                                WHERE codigo_material=$codigo_material AND cod_est=1 AND
                                                fecha_devolucion IS NULL)");
        
    }
    
    //Se editan los datos de la tabla usuario desde la cedula
    public function editarUsuario($ci, $nombre, $apellido, $ciudad, $calle, $nro_apto, $nro_puerta, $email,$telefono1,$telefono2,$telefono,$celular) {
        $this->consultar("UPDATE usuario 
                          SET
                            nombre='$nombre',
                            apellido='$apellido',
                            ciudad='$ciudad',
                            calle='$calle',
                            numero_apartamento=$nro_apto,
                            numero_puerta=$nro_puerta,
                            e_mail='$email'
                           WHERE ci=$ci");
        
        if($telefono1!=$telefono){
            $this->consultar("UPDATE tel_usuario
                              SET 
                          
                                tel_usu=$telefono
                          WHERE ci=$ci and tel_usu=$telefono1");
        }
        if($telefono2!=$celular){
            $this->consultar("UPDATE tel_usuario
                              SET 
                          
                                tel_usu=$celular
                              WHERE ci=$ci and tel_usu=$telefono2");
        }
        return true;
    }

    public function obtenerCodigoEjemplar($codigoMaterial){
        $stmt=$this->consultar("SELECT codigo_ejem FROM ejemplar_material WHERE codigo_material=$codigoMaterial");
        foreach ($stmt as $fila){
               
               return $fila[0];
        }
    }
   
    //Se devuelve la lista de usuarios
    public function listadoUsuario() {
        $stmt = $this->consultar("SELECT ci,nombre, apellido,ciudad, calle, numero_apartamento, numero_puerta, e_mail FROM usuario WHERE estado_logico='si'");

        if ($stmt->fetchColumn() > 0) {

            $respuesta = array();
            $i = 0;
            foreach ($stmt as $fila) {
                $dato = array();

                $dato["ci"] = $fila[0];
                $dato["nombre"] = $fila[1];
                $dato["apellido"] = $fila[2];
                $dato["ciudad"] = $fila[3];
                $dato["calle"] = $fila[4];
                $dato["numero_apartamento"] = $fila[5];
                $dato["numero_puerta"] = $fila[6];
                $dato["email"] = $fila[7];
                if (file_exists("../../presentacion/imagenes/fotousuario/" . $fila[0] . ".jpg")) {
                    $dato["foto"] = $fila[0] . ".jpg";
                } else {
                    $dato["foto"] = "silueta.jpg";
                }
                $respuesta[$i] = $dato;

                $i++;
            }
        }

        return $respuesta;
    }

    public function controlPrestamo($ci,$codigoEjemplar){
        $codigo=$this->escalar("    SELECT codigo_material
                                    FROM ejemplar_material
                                    WHERE codigo_ejem=$codigoEjemplar");
        
        $respuesta = $this->escalar("   SELECT COUNT(*)
                                        FROM prestamos INNER JOIN ejemplar_material ON prestamos.codigo_ejem=ejemplar_material.codigo_ejem
                                        WHERE fecha_devolucion IS NULL AND ci=$ci AND prestamos.codigo_ejem IN (   SELECT codigo_ejem
                                                                                                      FROM ejemplar_material 
                                                                                                      WHERE codigo_material=$codigo)");
        
      
        return ($respuesta==0);
    }
    
    //Se devuelve la lista de materiales
    public function listadoEjemplarMaterial() {
        $stmt = $this->consultar("  SELECT nombre,anio,comentario_general,COUNT(*)- (SELECT COUNT(*)
                                                                                    FROM reserva 
                                                                                     WHERE reserva.codigo_material=material.codigo_material
                                                                                          AND fecha_fin>today),material.codigo_material 
                                    FROM ejemplar_material INNER JOIN material ON ejemplar_material.codigo_material=material.codigo_material
                                    WHERE cod_est=1 AND NOT EXISTS( SELECT *
                                                                    FROM prestamos
                                                                    WHERE prestamos.codigo_ejem=ejemplar_material.codigo_ejem AND fecha_devolucion IS NULL)
                                    
                                    GROUP BY ejemplar_material.codigo_material,nombre,anio,comentario_general,material.codigo_material");
        $respuesta = array();

            $i = 0;
            foreach ($stmt as $fila) {
                $dato = array();
            $dato["nombre"] = $fila[0];
            $dato["anio"] = $fila[1];
            $dato["descripcion"] = $fila[2];
            
            $numero=$this->escalar("SELECT COUNT(*) 
                                    FROM reserva 
                                    WHERE reserva.codigo_material=".$fila[4]
                                          
                    );
            
            //$cantidadReserva= $fila[3];

            $cantidadReserva= $fila[3]-$numero;
            
            if ($cantidadReserva > 1) {
                $dato["disponibilidad"] = "disponibleCasa";
                $dato["mostrardisponibilidad"] = "<a href='../../../negocio/administrador/altaprestamo.php?codigo=" . $fila[4] . "'>En DOMICILIO</a><a href='../../../negocio/administrador/altaprestamo_sala.php?codigo=" . $fila[4] . "'>En SALA</a>";
                } else {

                $dato["disponibilidad"] = "disponibleSala";
                $dato["mostrardisponibilidad"] = "<a href='../../../negocio/administrador/altaprestamo_sala.php?codigo=" . $fila[4] . "'>SALA</a>";
                }

                $respuesta[$i] = $dato;

                $i++;
            }
        

        return $respuesta;
    }
    
    
    //Se devuelve la lista de materiales
    public function obtenerReservar($nro) {
        $stmt = $this->consultar("SELECT ci,codigo_material FROM reserva WHERE nro_reserva=$nro");
        $row= $stmt->fetch(PDO::FETCH_NUM);
        $respuesta = array();
        
        if ($row != NULL) {
            
            $respuesta["ci"] = $row[0];
            $respuesta["codigo_material"] = $row[1];
            
            

        }
        return $respuesta;
    }

    //Se busca el usuario a base de la cedula
    public function buscar($ci) {
        $stmt = $this->consultar("SELECT ci,nombre, apellido,ciudad, calle, numero_apartamento, numero_puerta, e_mail FROM usuario WHERE ci='$ci' AND estado_logico='si'");
        $row= $stmt->fetch(PDO::FETCH_NUM);
        $respuesta = array();
        if ($row != NULL) {
            
            $respuesta["ci"] = $row[0];
            $respuesta["nombre"] = $row[1];
            $respuesta["apellido"] = $row[2];
            $respuesta["ciudad"] = $row[3];
            $respuesta["calle"] = $row[4];
            $respuesta["numero_apartamento"] = $row[5];
            $respuesta["numero_puerta"] = $row[6];
            $respuesta["email"] = $row[7];
            
            if (file_exists("../../presentacion/imagenes/fotousuario/" . $row[0] . ".jpg")) {
                $respuesta["foto"] = $row[0] . ".jpg";
            } else {
                $respuesta["foto"] = "silueta.jpg";
            }

        }
        return $respuesta;
    }
    public function buscarTelefono($ci) {
        $stmt = $this->consultar("SELECT tel_usu FROM tel_usuario WHERE ci=$ci AND estado_logico='si'");
        $fila = $stmt->fetch(PDO::FETCH_NUM);
        $respuesta = array();
        
        foreach ($stmt as $fila) {
            $respuesta[count($respuesta)] = $fila[0];
        }
        return $respuesta;
    }
    //Se elimina a base de la cedula
    public function eliminar($ci) {
        $this->consultar("  UPDATE usuario 
                            SET
                                estado_logico='no',
                                fecha_borrado=today
                            WHERE ci=$ci");
        return true;
    }
   
    public function cantidadLibros($ci,$codigo_ejemplar){
        $cantidadPrestado=$this->escalar("  SELECT COUNT(*) 
                                            FROM prestamos
                                            WHERE ci=$ci AND fecha_devolucion IS NULL");

        if($cantidadPrestado==NULL)
            $cantidadPrestado=0;
        $cantidadReserva=$this->escalar("   SELECT COUNT(*) 
                                            FROM reserva
                                            WHERE ci=$ci AND fecha_fin>current AND codigo_material NOT IN (SELECT codigo_material
                                                                                                      FROM ejemplar_material
                                                                                                      WHERE codigo_ejem=$codigo_ejemplar)");
        
        if($cantidadReserva===NULL)
            $cantidadReserva==0;
        
        
        return $cantidadPrestado+$cantidadReserva;
        
    }

    public function agregarPrestamo($ci,$codigoEjemplar,$fecha){
        

        $codigo_conservacion=$this->escalar("  SELECT first 1 mantiene.codigo_conservacion
                            FROM mantiene INNER JOIN ejemplar_material ON mantiene.codigo_ejem=ejemplar_material.codigo_ejem
                            WHERE mantiene.codigo_ejem=$codigoEjemplar ORDER BY mantiene.fecha_inicio ASC");

        $cantidad=$this->escalar("   SELECT COUNT(*) 
                                    FROM reserva INNER JOIN ejemplar_material ON reserva.codigo_material=ejemplar_material.codigo_material 
                                    WHERE codigo_ejem=$codigoEjemplar AND reserva.ci=$ci AND reserva.fecha_fin>=current");
       
        if($cantidad>0){
             $this->consultar("  UPDATE reserva
                                 SET
                                    fecha_fin=current
                                 WHERE reserva.codigo_material IN ( SELECT ejemplar_material.codigo_material
                                                            FROM ejemplar_material
                                                            WHERE codigo_ejem=$codigoEjemplar  AND reserva.ci=$ci AND reserva.fecha_fin>=current)");
            
        }
        
        $this->consultar("  INSERT INTO prestamos(ci,codigo_conservacion,codigo_ejem,estado_logico,fecha_inicio,fecha_fin)     
                            VALUES($ci,$codigo_conservacion,$codigoEjemplar,'si',current,'$fecha') ");

    }
    public function agregarSala($ci,$codigoEjemplar){
        

        $codigo_conservacion=$this->escalar("  SELECT first 1 mantiene.codigo_conservacion
                            FROM mantiene INNER JOIN ejemplar_material ON mantiene.codigo_ejem=ejemplar_material.codigo_ejem
                            WHERE mantiene.codigo_ejem=$codigoEjemplar ORDER BY mantiene.fecha_inicio ASC");

        $this->consultar("  INSERT INTO prestamos(ci,codigo_conservacion,codigo_ejem,estado_logico,fecha_inicio,fecha_fin)     
                            VALUES($ci,$codigo_conservacion,$codigoEjemplar,'si',today,'Today') ");

    }

    public function buscarLibro($codigo_ejemplar){
        return $this->escalar("  SELECT material.nombre 
                            FROM ejemplar_material INNER JOIN material ON ejemplar_material.codigo_material=material.codigo_material 
                            WHERE ejemplar_material.codigo_ejem=$codigo_ejemplar");

    }
            
    
    public function agregarLibro($cod_mat, $isbn, $edicion, $est_log) {
        $this->consultar("INSERT INTO libro (codigo_material,isbn,edicion,estado_logico) VALUES 
                         ($cod_mat,$isbn,$edicion,'$est_log')");
        return true;
    }

    public function agregarMaterial($cod_mat, $titulo, $anio, $com_gral, $est_log) {
        $this->consultar("INSERT INTO material (codigo_material,nombre,anio,comentario_general,fecha_alta,cod_est,estado_logico) VALUES 
                         ($cod_mat,'$titulo',$anio,'$com_gral',to_date(),1,'$est_log')");
        return true;
    }

    public function agregarRevista($cod_mat, $nro_revista, $est_log) {
        $this->consultar("INSERT INTO revista (codigo_material,numrevista,estado_logico) VALUES 
                         ($cod_mat,$nro_revista,'$est_log')");
        return true;
    }

    public function agregarFotocopia($cod_mat, $cant_pag, $est_log) {
        $this->consultar("INSERT INTO fotocopia (codigo_material,cantidadpag,estado_logico) VALUES 
                         ($cod_mat,$cant_pag,$est_log)");
        return true;
    }

    public function agregarPais($pais, $id_pais, $est_log) {
        $this->consultar("INSERT INTO pais (nombre,id_pais,estado_logico) VALUES
                          ('$pais',$id_pais,'$est_log')");

        return true;
    }
    
    public function sancionado($ci){
        $respuesta= $this->escalar("    SELECT COUNT(*) 
                                        FROM sufre
                                        WHERE ci=$ci AND today>=fecha_inicio AND today<=fecha_fin");
        return ($respuesta>0);
    }
    
    public function existeUsuario($ci,$email){
        $esta=$this->escalar("SELECT COUNT(*) FROM usuario WHERE ci=$ci OR e_mail='$email'");
        $esta2=$this->escalar("SELECT COUNT(*) FROM usuarios WHERE usuario='$email'");
        return ($esta>0 || $esta2>0);
    }
    

}

?>
