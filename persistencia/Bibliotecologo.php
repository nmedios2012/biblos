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
    public function agregarLibro($cod_mat,$isbn,$edicion,$est_log){
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

    public function agregarAutor($cod_art, $nom_art, $ape_art, $id_pais, $fec_alta, $est_log) {
        $this->consultar("INSERT INTO artista_autor (codigo_artista,nombre,apellido,fecha_alta,estado_logico)
                          VALUES ($cod_art,'$nom_art','$ape_art',$id_pais,'$fec_alta,'$est_log')");
    }

    public function agregarRol_Autor($id_rol, $rol, $est_log) {
        $this->consultar("INSERT INTO rol_autor (id_rol,nombre,estado_logico) VALUES ($id_rol,'$rol','$est_log')");
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
    public function buscar($documento)
    {
        $stmt=$this->consultar("SELECT ci,nombre, apellido,ciudad, calle, numero_apartamento, numero_puerta, e_mail FROM usuario WHERE ci='$documento' AND estado_logico='si'");
        $row=$stmt->fetch(PDO::FETCH_NUM);
        $respuesta=array();
        if ($row!=NULL){
           $respuesta["ci"]=$row[0];
           $respuesta["nombre"]=$row[1];
           $respuesta["apellido"]=$row[2];
           $respuesta["ciudad"]=$row[3];
           $respuesta["calle"]=$row[4];
           $respuesta["numero_apartamento"]=$row[5];
           $respuesta["numero_puerta"]=$row[6];
           $respuesta["email"]=$row[7];
           if (file_exists("../../presentacion/imagenes/fotousuario/".$row[0].".jpg")){
               $respuesta["foto"]=$row[0].".jpg";
           }
           else
           {
               $respuesta["foto"]="silueta.jpg";
           }
        }
        return $respuesta;
    }
    
    public function buscarLibro($codigo_ejemplar){
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
    
    public function eliminar($ci){
        $this->consultar("  UPDATE usuario 
                            SET
                                estado_logico='no',
                                fecha_borrado=today
                            WHERE ci=$documento");
                                
        
        return true;
    }
    
    public function agregarPrestamo($documento,$codigoEjemplar,$fecha){
        $codigo_conservacion=$this->escalar("  SELECT first 1 mantiene.codigo_conservacion
                            FROM mantiene INNER JOIN ejemplar_material ON mantiene.codigo_ejem=ejemplar_material.codigo_ejem
                            WHERE mantiene.codigo_ejem=$codigoEjemplar ORDER BY mantiene.fecha_inicio ASC");
        
        $this->consultar("  INSERT INTO prestamos(ci,codigo_conservacion,codigo_ejem,estado_logico,fecha_inicio,fecha_fin)     
                            VALUES($documento,$codigo_conservacion,$codigoEjemplar,'si',today,'$fecha') ");

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

    //Se devuelve la lista de reservas
    public function listadoReservas() {
        $stmt = $this->consultar("
            SELECT 
                res.ci,
                cur.nombre,
                mate.nombre,
                res.edicion,
                res.isbn,
                res.nro_reserva,
                res.fecha_inicio,
                res.fecha_fin,
                res.estado_logico,
                res.fecha_borrado
            FROM reserva res 
            LEFT OUTER JOIN curso cur ON cur.codigo_curso = res.codigo_curso
            LEFT OUTER JOIN material mate ON mate.codigo_material = res.codigo_material");

        if ($stmt->fetchColumn() > 0) {

            $respuesta = array();
            $i = 0;
            foreach ($stmt as $fila) {
                $dato = array();

                $dato["ci"] = $fila[0];
                $dato["cur.nombre"] = $fila[1];
                $dato["mate.nombre"] = $fila[2];
                $dato["edicion"] = $fila[3];
                $dato["isbn"] = $fila[4];
                $dato["nro_reserva"] = $fila[5];
                $dato["fecha_inicio"] = $fila[6];
                $dato["fecha_fin"] = $fila[7];
                $dato["estado_logico"] = $fila[8];
                $dato["fecha_borrado"] = $fila[9];

                $respuesta[$i] = $dato;

                $i++;
            }
        }

        return $respuesta;
    }

    public function asignarUsuarioCurso($ci, $codCurso) {

      $this->consultar("INSERT INTO pertenece (ci,codigo_curso,tipo_usuario) VALUES($ci,$codCurso,'socio')");
        
//        
//        
//ci                   integer                                 no
//codigo_curso         integer                                 no
//fecha_alta           date                                    no
//fecha_baja           date                                    yes
//tipo_usuario         char(20)                                no



        return true;
    }

    public function cargarCursos() {

        $stmt = $this->consultar("select * from curso;");
//        $stmt->fetch(PDO::FETCH_NUM);
                
//        if ($stmt->fetchColumn() > 0) {

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
//        } else {
//            return "ERROR";
//        }



//codigo_curso         integer                                 no
//nombre               char(20)                                no
//turno                char(10)                                no
//grupo                char(10)                                no
//egresado             char(2)                                 no
//estado_logico        char(2)                                 no
//fecha_borrado        datetime year to minute                 yes
    }

}

?>
