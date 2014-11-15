<?php

class Bibliotecologo extends Conexion {

    public function __construct() {//El constructor del objeto biblotecologo
        parent::__construct(SERVIDOR, PUERTO, USUARIO_BIBLIOTECOLOGO, PASS_BIBLIOTECOLOGO);
    }

    //Se guarda en la tabla tel_usuario el telefono correspondiente a la cedula
    public function insertarTelefono($documento, $telefono) {

        $this->consultar("INSERT INTO tel_usuario (ci,tel_usu,estado_logico)VALUES($documento,$telefono,'si')");
        return true;
    }

    //Se guarda en la tabla usuario los datos
    public function agregarUsuario($documento, $nombre, $apellido, $ciudad, $calle, $nro_apto, $nro_puerta, $email) {
        $this->consultar("INSERT INTO usuario (ci,nombre,apellido,link_foto,ciudad,calle,
                                numero_apartamento,numero_puerta,e_mail,estado_logico)
                                VALUES ($documento,'$nombre','$apellido','   ','$ciudad','$calle',$nro_apto,$nro_puerta,'$email','si')
                                ");

        return true;
    }

    //Se guarda en la tabla usuarios los datos para la cuenta
    public function agregarCuenta_Usuario($nombre, $apellido, $mail, $documento) {
        $this->consultar("INSERT INTO usuarios (nombre,apellido,usuario,rol,contrasenia)
                                VALUES ('$nombre','$apellido','$mail','socio', $documento)");

        return true;
    }

    //Script de encriptación de contraseña.
    public function encriptar($mail, $documento) {
        $encrypt_passwd = md5($documento);
        $this->consultar("UPDATE usuarios 
                          SET
                            contrasenia='$encrypt_passwd' 
                          WHERE usuario='$mail'");

        return true;
    }

    //Se editan los datos de la tabla usuario desde la cedula
    public function editarUsuario($documento, $nombre, $apellido, $ciudad, $calle, $nro_apto, $nro_puerta, $email) {
        $this->consultar("UPDATE usuario 
                          SET
                            nombre='$nombre',
                            apellido='$apellido',
                            ciudad='$ciudad',
                            calle='$calle',
                            numero_apartamento=$nro_apto,
                            numero_puerta=$nro_puerta,
                            e_mail='$email'
                           WHERE ci=$documento");
        if ($telefono1 != $telefono) {
            $this->consultar("UPDATE tel_usuario
                              SET 
                          
                                tel_usu=$telefono
                          WHERE ci=$documento and tel_usu=$telefono1");
        }
        if ($telefono2 != $celular) {
            $this->consultar("UPDATE tel_usuario
                              SET 
                          
                                tel_usu=$celular
                              WHERE ci=$documento and tel_usu=$telefono2");
        }
        return true;
    }

    public function obtenerCodigoEjemplar($codigoMaterial) {
        $stmt = $this->consultar("SELECT codigo_ejem FROM ejemplar_material WHERE codigo_material=$codigoMaterial");
        foreach ($stmt as $fila) {

            return $fila[0];
        }
    }

    public function agregarLibro($cod_mat, $isbn, $edicion, $est_log) {
        $this->consultar("INSERT INTO libro (codigo_material,isbn,edicion,estado_logico) VALUES 
                         ($cod_mat,$isbn,$edicion,'$est_log')");
        return true;
    }

    public function agregarMaterial($cod_mat, $titulo, $anio, $com_gral, $est_log) {
        $fecha = date("d/m/Y");
        $this->consultar("INSERT INTO material (codigo_material,nombre,anio,comentario_general,fecha_alta,estado_logico) VALUES 
                         ($cod_mat,'$titulo',$anio,'$com_gral','$fecha','$est_log')");
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

    public function agregarOtro($cod_mat, $cod_otro, $tipo, $est_log) {
        $this->consultar("INSERT INTO otro (codigo_material,codigo_otro,tipo,estado_logico) VALUES 
                        ($cod_mat,$cod_otro,'$tipo','$est_log')");
        return true;
    }

    public function agregarEditorial($cod_emp, $nom_edit, $id_pais, $ciudad, $calle, $nro_puerta, $nro_apto, $mail, $est_log) {
        $this->consultar("INSERT INTO editorial_empresa (codigo_empresa,nombre,id_pais,ciudad,calle,numero_puerta,
                          numero_apartamento,e_mail,fecha_alta,estado_logico) VALUES ($cod_emp,'$nom_edit',$id_pais,
                          '$ciudad','$calle','$nro_puerta','$nro_apto','$mail','12/12/13','$est_log')");
        return true;
    }

    public function agregarTelefono($cod_emp, $tel1_emp, $tel2_emp, $interno, $est_log) {
        $this->consultar("INSERT INTO tel_empresa (codigo_empresa,tel1_empresa,tel2_empresa,interno,estado_logico)
                          VALUES ($cod_emp,$tel1_emp,$tel2_emp,$interno,'$est_log')");
        return true;
    }

    public function agregarRol($nombre, $id_rol, $cod_emp, $est_log) {
        $this->consultar("INSERT INTO rol_empresa (nombre,id_rol,codigo_empresa,estado_logico) VALUES
                          ('$nombre',$id_rol,$cod_emp,'$est_log')");

        return true;
    }

    public function agregarPais($pais, $id_pais, $est_log) {
        $this->consultar("INSERT INTO pais (nombre,id_pais,estado_logico) VALUES
                          ('$pais',$id_pais,'$est_log')");

        return true;
    }

    public function agregarTema($cod_tema, $nom_tema, $est_log) {
        $this->consultar("INSERT INTO tema (codigo_tema,nombre,estado_logico) VALUES
                          ($cod_tema,'$nom_tema','$est_log')");

        return true;
    }

    public function agregarEspecializacion($cod_tema, $cod_esp, $nom_esp, $est_log) {
        $this->consultar("INSERT INTO especializacion (codigo_es,codigo_tema,nombre,estado_logico) VALUES
                          ($cod_esp,$cod_tema,'$nom_esp','$est_log')");

        return true;
    }

    public function agregarConservacion($cod_cnsv, $nom_cnsv, $est_log) {
        $this->consultar("INSERT INTO conservacion (codigo_conservacion,nombre,estado_logico) VALUES
                          ($cod_cnsv,'$nom_cnsv','$est_log')");

        return true;
    }

    public function agregarAutor($cod_art, $art_1, $art_2, $art_3, $id_pais, $fec_alta, $est_log) {
        $this->consultar("INSERT INTO artista_autor (codigo_artista,autor_1,autor_2,autor_3,id_pais,
                          fecha_alta,estado_logico)
      VALUES ($cod_art,'$art_1','$art_2','$art_3',$id_pais,'$fec_alta','$est_log')");
    }

    public function agregarRol_Autor($id_rol, $cod_art, $est_log) {
        $this->consultar("INSERT INTO contiene_rol (id_rol,codigo_artista,estado_logico) 
                          VALUES ($id_rol,'$cod_art','$est_log')");
    }

    /* public function agregarPosterior($cod_cnsv,$nom_pst,$cod_pst,$est_log){
      $this->consultar("INSERT INTO conservacion_posterior (codigo_conservacion,nombre_post,
      codigo_post,estado_logico) VALUES ($cod_cnsv,'$nom_pst',$cod_pst,'$est_log')");

      return true;
      No es necesaria esta función al momento de cargar nuevo tipo de conservación,
      debería tomar desde tabla conservación y agregarlo a esta tabla

      } */

    public function agregarSancion($codigo, $tipo_penaliz, $nombre, $descripcion, $est_log) {
        $this->consultar("INSERT INTO penalizaciones (codigo,tipo_penaliz,nombre,descripcion,estado_logico)
                          VALUES ('$codigo','$tipo_penaliz','$nombre','$descripcion','$est_log')");

        return true;
    }

    public function agregarEstados($cod_est, $estado_anterior, $est_log) {
        $this->consultar("INSERT INTO estado (cod_est,estado_anterior,estado_logico)
                          VALUES ('$cod_est','$estado_anterior','$est_log')");

        return true;
    }

    // Se busca un socio por número de documento
    public function buscar($documento) {
        $stmt = $this->consultar("SELECT ci,nombre, apellido,ciudad, calle, numero_apartamento, numero_puerta, e_mail FROM usuario WHERE ci='$documento' AND estado_logico='si'");
        $row = $stmt->fetch(PDO::FETCH_NUM);
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

    public function buscarLibro($codigo_ejemplar) {
        return $this->escalar("  SELECT material.nombre 
                            FROM ejemplar_material INNER JOIN material ON ejemplar_material.codigo_material=material.codigo_material 
                            WHERE ejemplar_material.codigo_ejem=$codigo_ejemplar");
    }

    public function buscarTelefono($documento) {
        $stmt = $this->consultar("SELECT tel_usu FROM tel_usuario WHERE ci=$documento AND estado_logico='si'");
        $fila = $stmt->fetch(PDO::FETCH_NUM);
        $respuesta = array();

        foreach ($stmt as $fila) {
            $respuesta[count($respuesta)] = $fila[0];
        }
        return $respuesta;
    }

    public function eliminar($documento) {
        $this->consultar("  UPDATE usuario 
                            SET
                                estado_logico='no',
                                fecha_borrado=today
                            WHERE ci=$documento");


        return true;
    }

    public function agregarPrestamo($documento, $codigoEjemplar, $fecha) {
        $codigo_conservacion = $this->escalar("  SELECT first 1 mantiene.codigo_conservacion
                            FROM mantiene INNER JOIN ejemplar_material ON mantiene.codigo_ejem=ejemplar_material.codigo_ejem
                            WHERE mantiene.codigo_ejem=$codigoEjemplar ORDER BY mantiene.fecha_inicio ASC");

        $this->consultar("  INSERT INTO prestamos(ci,codigo_conservacion,codigo_ejem,estado_logico,fecha_inicio,fecha_fin)     
                            VALUES($documento,$codigo_conservacion,$codigoEjemplar,'si',current,'$fecha') ");
        $this->cambiarEstadoEjemplar($codigo_ejemplar, 4); //4 EN PRESTAMO
    }

    //Se devuelve la lista de materiales
    public function listadoEjemplarMaterial() {
        $stmt = $this->consultar("SELECT nombre,anio,comentario_general,COUNT(*),material.codigo_material FROM ejemplar_material INNER JOIN material ON ejemplar_material.codigo_material=material.codigo_material GROUP BY ejemplar_material.codigo_material,nombre,anio,comentario_general,material.codigo_material");
        $respuesta = array();

        $i = 0;
        foreach ($stmt as $fila) {
            $dato = array();
            $dato["nombre"] = $fila[0];
            $dato["anio"] = $fila[1];
            $dato["descripcion"] = $fila[2];

            if ($fila[3] > 1) {
                $dato["disponibilidad"] = "disponibleCasa";
                $dato["mostrardisponibilidad"] = "<a href='../../../negocio/bibliotecologo/altaprestamo.php?codigo=" . $fila[4] . "'>Prestamo</a><a href='#'>En SALA</a>";
            } else {

                $dato["disponibilidad"] = "disponibleSala";
                $dato["mostrardisponibilidad"] = "<a href='#'>En SALA</a>";
            }

            $respuesta[$i] = $dato;
            $i++;
        }

        return $respuesta;
    }

    //Se devuelve la lista de usuarios
    public function listadoUsuario() {
        $stmt = $this->consultar("SELECT ci,nombre, apellido,ciudad, calle, numero_apartamento, numero_puerta, e_mail FROM usuario WHERE estado_logico='si'");

//        if ($stmt->fetchColumn() > 0) {

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
//        }

        return $respuesta;
    }

    //Se devuelve la lista de reservas
    public function listadoReservas() {
        $stmt = $this->consultar("
            SELECT 
                res.ci,
                mate.nombre,
                res.edicion,
                res.isbn,
                res.nro_reserva,
                res.fecha_inicio,
                res.fecha_fin,
                res.estado_logico,
                res.fecha_borrado,
                res.codigo_material 
                FROM reserva res 
                LEFT OUTER JOIN material mate ON mate.codigo_material = res.codigo_material
                WHERE res.fecha_fin>=current");

//        if ($stmt->fetchColumn() > 0) {

        $respuesta = array();
        $i = 0;
        foreach ($stmt as $fila) {
            $dato = array();

            $dato["ci"] = $fila[0];
            //$dato["cur.nombre"] = $fila[1];
            $dato["mate.nombre"] = $fila[1];
            $dato["edicion"] = $fila[2];
            $dato["isbn"] = $fila[3];
            $dato["nro_reserva"] = $fila[4];
            $dato["fecha_inicio"] = $fila[5];
            $dato["fecha_fin"] = $fila[6];
            $dato["estado_logico"] = $fila[7];
            $dato["fecha_borrado"] = $fila[8];
            $dato["codigo_material"] = $fila[9];
            $respuesta[$i] = $dato;

            $i++;
        }
//        }

        return $respuesta;
    }

    public function asignarUsuarioCurso($documento, $codCurso) {
        $this->consultar("insert into pertenece (ci,codigo_curso,tipo_usuario) values ($documento,$codCurso,'socio');");
        return true;
    }

    //Se devuelve la lista de materiales
    public function obtenerReservar($nro) {
        $stmt = $this->consultar("SELECT ci,codigo_material FROM reserva WHERE nro_reserva=$nro");
        $row = $stmt->fetch(PDO::FETCH_NUM);
        $respuesta = array();

        if ($row != NULL) {

            $respuesta["ci"] = $row[0];
            $respuesta["codigo_material"] = $row[1];
        }
        return $respuesta;
    }

    public function cargarCursos() {

        $stmt = $this->consultar("select * from curso;");
        $respuesta = array();
        $i = 0;
        foreach ($stmt as $fila) {
            $dato = array();
            $dato['codigo_curso'] = $fila[0];
            $dato['nombre'] = $fila[1];
            $dato['turno'] = $fila[2];
            $dato['grupo'] = $fila[3];
            $dato['egresado'] = $fila[4];
            $dato['estado_logico'] = $fila[5];
            $dato['fecha_borrado'] = $fila[6];
            $respuesta[$i] = $dato;

            $i++;
        }
        return $respuesta;
    }

    public function listarMateriales() {

        $stmt = $this->consultar("select * from material;");

        $respuesta = array();
        $i = 0;
        foreach ($stmt as $fila) {
            $dato = array();
            $dato['codigo_material'] = $fila[0];
            $dato['nombre'] = $fila[1];
            $dato['anio'] = $fila[2];
            $dato['comentario_general'] = $fila[3];
            $dato['fecha_alta'] = $fila[4];
            $dato['fecha_baja'] = $fila[5];
            $dato['estado_logico'] = $fila[6];
            $dato['fecha_borrado'] = $fila[7];
            $respuesta[$i] = $dato;

            $i++;
        }
        return $respuesta;
    }

    public function cargarEstadoEjemplar() {

        $stmt = $this->consultar("select * from estado;");
        $respuesta = array();
        $i = 0;
        foreach ($stmt as $fila) {
            $dato = array();
            $dato['cod_est'] = $fila[0];
            $dato['estado_anterior'] = $fila[1];
            $dato['estado_logico'] = $fila[2];
            $dato['fecha_borrado'] = $fila[3];
            $respuesta[$i] = $dato;
            $i++;
        }
        return $respuesta;
    }

    public function nuevoEjemplar($cod_material, $cod_estado) {
        $fecha = date("d/m/Y");
        $this->consultar("insert into ejemplar_material (cod_est,codigo_ejem,codigo_material,fecha_alta) 
                          values ($cod_estado,0,$cod_material,'$fecha')");
        return true;
    }

    //Me dan el codigo material, buscamos el primer codigo ejemplar disponible

    public function codigoEjemplar($codigo_material) {
        return $this->escalar(" SELECT ce.codigo_ejem
                                FROM ejemplar_material AS ce
                                WHERE ce.codigo_material=$codigo_material AND ce.codigo_ejem
                                      NOT IN (  SELECT ejemplar_material.codigo_ejem
                                                FROM ejemplar_material INNER JOIN prestamos
                                                ON ejemplar_material.codigo_ejem =prestamos.codigo_ejem
                                                WHERE codigo_material=$codigo_material AND cod_est=1 AND
                                                fecha_devolucion IS NULL)");
        /*return $this->escalar(" SELECT codigo_ejem
                                FROM ejemplar_material
                                WHERE codigo_material=$codigo_material AND cod_est=1");*/
    }

    public function listarPrestamos() {

        $stmt = $this->consultar("select * from prestamos where fecha_devolucion is null;");
//UPDATE prestamos SET fecha_fin='' WHERE ci='41510608'
        $respuesta = array();
        $i = 0;
        foreach ($stmt as $fila) {
            $dato = array();
            $dato['ci'] = $fila[0];
            $dato['codigo_conservacion'] = $fila[1];
            $dato['nombre_conservacion'] = $this->cargarConservacion($fila[1]);
            $dato['codigo_ejem'] = $fila[2];
            $dato['fecha_inicio'] = $fila[3];
            $dato['fecha_fin'] = $fila[4];
            $respuesta[$i] = $dato;

            $i++;
        }
        return $respuesta;
    }

    public function cargarConservacion($estadoConservacion) {
        $stmt = $this->consultar("select nombre from conservacion where codigo_conservacion=$estadoConservacion");
        $row = $stmt->fetch(PDO::FETCH_NUM);
        if ($row != NULL) {
            return $row[0];
        } else {
            return null;
        }
    }

    public function cargarConservaciones() {
        $stmt = $this->consultar("select * from conservacion");
        $respuesta = array();
        $i = 0;
        foreach ($stmt as $fila) {
            $dato = array();
            $dato['codigo_conservacion'] = $fila[0];
            $dato['nombre'] = $fila[1];
            $dato['estado_logico'] = $fila[2];
            $dato['fecha_borrado'] = $fila[3];
            $respuesta[$i] = $dato;

            $i++;
        }
        return $respuesta;
    }

    public function cargarSanciones() {

        $stmt = $this->consultar("select * from penalizaciones;");
        $respuesta = array();
        $i = 0;
        foreach ($stmt as $fila) {
            $dato = array();
            $dato['codigo'] = $fila[0];
            $dato['nombre'] = $fila[1];
            $dato['tipo_penaliz'] = $fila[2];
            $dato['descripcion'] = $fila[3];
            $respuesta[$i] = $dato;

            $i++;
        }
        return $respuesta;
    }

    public function sancion($ci, $codigoEjemplar, $codigoPenalizacion) {

        $respuesta = $this->obtenerDatosSancion($codigoEjemplar);
        $codigoCurso = $this->obtenerCodigoCursoUsuario($ci);
        $fecha = date("d-m-Y");
        $fechafin = date("d-m-Y", strtotime($fecha . ' + 10 days'));

        $caca = $this->consultar("INSERT INTO sufre(codigo_material,ci,codigo,codigo_curso,codigo_conservacion,codigo_ejem,fecha_inicio,fecha_fin)
VALUES(" . $respuesta['codigo_material'] . ",$ci,$codigoPenalizacion,$codigoCurso," . $respuesta["cod_est"] . "," . $respuesta['codigo_ejem'] . ",'$fecha','$fechafin')");

        return "Sancion agregada con exito fecha finalizacion: $fechafin";
    }

    public function obtenerDatosSancion($codigoEjemplar) {

        $stmt = $this->consultar("SELECT cod_est,codigo_ejem,codigo_material FROM ejemplar_material WHERE codigo_ejem=$codigoEjemplar");
        $row = $stmt->fetch(PDO::FETCH_NUM);
        $respuesta = array();

        if ($row != NULL) {

            $respuesta["cod_est"] = $row[0];
            $respuesta["codigo_ejem"] = $row[1];
            $respuesta["codigo_material"] = $row[2];
        }
        return $respuesta;
    }

    public function obtenerCodigoCursoUsuario($ci) {
        $stmt = $this->consultar("select codigo_curso from pertenece where ci=$ci");
        $row = $stmt->fetch(PDO::FETCH_NUM);
        if ($row != NULL) {
            return $row[0];
        } else {
            return null;
        }
    }

    public function devolucion($ci, $ejemplar, $estadoConservacion) {
        $fecha = date("Y-m-d H:i");
        $retornoEE = $this->cambiarEstadoEjemplar($ejemplar, 1);
        $this->consultar("UPDATE prestamos SET fecha_devolucion='$fecha' WHERE  ci=$ci AND codigo_ejem=$ejemplar AND fecha_devolucion is null");
        $retornoEC = $this->estadoConservacion($ejemplar, $estadoConservacion);
        return "Se realizo la devolucion correctamente: " . $retornoEC . "  " . $retornoEE;
    }

    public function cambiarEstadoEjemplar($codigo_ejemplar, $nuevo_estado) {
        $this->consultar("UPDATE ejemplar_material SET cod_est=$nuevo_estado WHERE codigo_ejem=$codigo_ejemplar");
        return "Modificando Disponibilidad del ejemplar";
    }

    public function estadoConservacion($ejemplar, $estadoConservacion) {
        $fecha_hoy = date("d-m-Y");

            $fechaEstadoAnterior = $this->consultar("SELECT mantiene.fecha_inicio
 FROM mantiene INNER JOIN ejemplar_material ON mantiene.codigo_ejem=ejemplar_material.codigo_ejem
 WHERE mantiene.codigo_ejem=$ejemplar AND mantiene.fecha_final is null
ORDER BY mantiene.fecha_inicio ASC");
            $row = $fechaEstadoAnterior->fetch(PDO::FETCH_NUM);
        if ($row != NULL) {
            $fechaEstadoAnterior= $row[0];
        } else {
            $fechaEstadoAnterior= null;
        }
       
        if (isset($fechaEstadoAnterior)) {
            //Ponemos la fecha de devolucion como la fecha de finalizacion de ese estado de ejemplar
            $this->consultar("UPDATE mantiene SET fecha_final='$fecha_hoy' 
                              WHERE codigo_ejem=$ejemplar AND fecha_inicio='$fechaEstadoAnterior'");
            //luego agregamos el nuevo estado material con fecha de devolucion como fecha de inicio
            //y ponemos el estado del material que se devolvio
            $this->consultar("INSERT INTO mantiene(codigo_ejem,codigo_conservacion,fecha_inicio) 
                  VALUES($ejemplar,$estadoConservacion,'$fecha_hoy')");
        } else {
            //como no existe el estado anterior generamos uno nuevo para este ejemplar
            //con el nuevo estado de conservacion pasado por el bibliotecologo...
            $this->consultar("INSERT INTO mantiene(codigo_ejem,codigo_conservacion,fecha_inicio) 
                VALUES($ejemplar,$estadoConservacion,'$fecha_hoy')");
        }

//        return "Estado de conservacion actualizado Correctamente!!! ".$ejemplar ." ".$estadoConservacion ." ". $fecha_hoy;
        return "Estado de conservacion actualizado Correctamente!!! ";
    }


//***********************************************************************************************************************


    //Se devuelve la lista de materiales
    public function listadoEjemplarMaterialPrestamo() {
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
                $dato["mostrardisponibilidad"] = "<a href='../../../negocio/bibliotecologo/altaprestamobiblo.php?codigo=" . $fila[4] . "'> EN DOMICILIO </a></br><a href='../../../negocio/bibliotecologo/altaprestamo_sala.php?codigo=" . $fila[4] . "'>EN SALA</a>";
                } else {

                $dato["disponibilidad"] = "disponibleSala";
                $dato["mostrardisponibilidad"] = "<a href='../../../negocio/bibliotecologo/altaprestamo_sala.php?codigo=" . $fila[4] . "'> SALA </a>";
                }

                $respuesta[$i] = $dato;

                $i++;
            }
        

        return $respuesta;
    }
    
        public function codigoEjemplarPrestamo($codigo_material){
        
        return $this->escalar(" SELECT ce.codigo_ejem
                                FROM ejemplar_material AS ce
                                WHERE ce.codigo_material=$codigo_material AND ce.codigo_ejem
                                      NOT IN (  SELECT ejemplar_material.codigo_ejem
                                                FROM ejemplar_material INNER JOIN prestamos
                                                ON ejemplar_material.codigo_ejem =prestamos.codigo_ejem
                                                WHERE codigo_material=$codigo_material AND cod_est=1 AND
                                                fecha_devolucion IS NULL)");
        
    }
        public function agregarPrestamoAdmin($ci,$codigoEjemplar,$fecha){
        

        $codigo_conservacion=$this->escalar("  SELECT first 1 mantiene.codigo_conservacion
                            FROM mantiene INNER JOIN ejemplar_material ON mantiene.codigo_ejem=ejemplar_material.codigo_ejem
                            WHERE mantiene.codigo_ejem=$codigoEjemplar ORDER BY mantiene.fecha_inicio ASC");

        $cantidad=$this->escalar("   SELECT COUNT(*) 
                                    FROM reserva INNER JOIN ejemplar_material ON reserva.codigo_material=ejemplar_material.codigo_material 
                                    WHERE codigo_ejem=$codigoEjemplar AND reserva.ci=$ci AND reserva.fecha_fin>=today");
       
        if($cantidad>0){
             $this->consultar("  UPDATE reserva
                                 SET
                                    fecha_fin=current
                                 WHERE reserva.codigo_material IN ( SELECT ejemplar_material.codigo_material
                                                            FROM ejemplar_material
                                                            WHERE codigo_ejem=$codigoEjemplar  AND reserva.ci=$ci AND reserva.fecha_fin>=today)");
            
        }
        
        $this->consultar("  INSERT INTO prestamos(ci,codigo_conservacion,codigo_ejem,estado_logico,fecha_inicio,fecha_fin)     
                            VALUES($ci,$codigo_conservacion,$codigoEjemplar,'si',today,'$fecha') ");

    }
    
    
 
    
    public function existeUsuario($ci,$email){
        $esta=$this->escalar("SELECT COUNT(*) FROM usuario WHERE ci=$ci OR e_mail='$email'");
        $esta2=$this->escalar("SELECT COUNT(*) FROM usuarios WHERE usuario='$email'");
        return ($esta>0 || $esta2>0);
    }
    
       }
?>
