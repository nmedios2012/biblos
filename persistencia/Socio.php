<?php

class Socio extends Conexion {

    public function __construct() {//El constructor del objeto Socio
        parent::__construct(SERVIDOR, PUERTO, USUARIO_SALA, PASS_USALA);
    }

    public function obtener($usuario) {
        $stmt = $this->consultar("SELECT ci FROM usuario WHERE e_mail='$usuario' AND estado_logico='si'");
        $row = $stmt->fetch(PDO::FETCH_NUM);
//        $respuesta=array();
        if ($row != NULL) {
//           $respuesta["ci"]=$row[0];
            return $row[0];
        }
//        return $respuesta;
//       return "Amigacho";
    }

    public function confirmarReserva($socio, $codigo_material) {
        $fecha = date("Y-m-d H:i");
        $fechafin = date("Y-m-d H:i", strtotime($fechafin . ' + 1 days'));

        $cedula = $this->obtener($socio);

        if ($cedula != NULL) {//&& $respuesta !=NULL
            $cod_curso = $this->obtenerCodigoCursoUsuario($cedula);

            if ($cod_curso != NULL) {
                $edicion = $this->obtenerEdicionEjemplar($codigo_material);
//$retornador=$socio ." ". $codigo_material ." ". $cedula ." ".$cod_curso ." ".$edicion;
                if ($edicion != NULL) {
                    $isbn = $this->obtenerIsbn($codigo_material);
                    if ($isbn != NULL) {
//                            $retornador = $cedula ." ". $codigo_material ." ". $cod_curso ." ". $edicion ." ". $isbn;
                        $this->consultar("INSERT INTO reserva (ci,codigo_curso,codigo_material,edicion,isbn,nro_reserva,fecha_inicio,fecha_fin)
                                      VALUES ($cedula,$cod_curso,$codigo_material,$edicion,$isbn,0,'$fecha','$fechafin')");
                        $cod_ejemplar = $this->obtPriEjemSegunCodMatYEst($codigo_material, 1); //obtiene un disponible
                        $putaso = $this->cambiarEstadoEjemplar($cod_ejemplar, 3); //reservado
                        $retornador = "VERIFICACION CORRECTA " . "codigo ejemplar" . $cod_ejemplar . " codmaterial " . $codigo_material . $putaso;
//                        $retornador = "PUTAMADREEE " . $cod_ejemplar;
                    }
                }
            }
        } else {
            return "ERROR PROCESANDO LOS DATOS";
        }


        return $retornador;
    }

    public function listadoLibros() {


        $stmt = $this->consultar("
                                SELECT
                                m.codigo_material
                                ,m.nombre
                                ,m.anio
                                ,COUNT(ej.cod_est)
                                ,e.estado_anterior
                                FROM material m ,ejemplar_material ej ,estado e
                                WHERE e.cod_est=ej.cod_est
                                and ej.codigo_material= m.codigo_material

                                GROUP BY m.codigo_material,m.nombre,m.anio,
                                e.estado_anterior"); //                                and ej.cod_est=1 

        if ($stmt->fetchColumn() > 0) {
//            array_push($array, $stmt);
            $respuesta = array();
            $i = 0;
            foreach ($stmt as $fila) {
                $dato = array();

                $dato['m.codigo_material'] = $fila[0];
                $dato['m.nombre'] = $fila[1];
                $dato['m.anio'] = $fila[2];
//$dato['m.comentario_general'] = $fila[3];
//$dato['m.fecha_alta'] = $fila[4];
//$dato['m.fecha_baja'] = $fila[5];
//$dato['m.estado_logico'] = $fila[6];
//$dato['m.fecha_borrado'] = $fila[7];
                $dato['cantidadEjemplares'] = $fila[3];
//$dato['ej.codigo_ejem'] = $fila[5];
//$dato['ej.codigo_material'] = $fila[10];
//$dato['ej.fecha_alta'] = $fila[11];
//$dato['ej.fecha_baja'] = $fila[12];
//$dato['ej.estado_logico'] = $fila[13];
//$dato['ej.fecha_borrado'] = $fila[14];
//$dato['e.cod_est'] = $fila[15];
                $dato['e.estado_anterior'] = $fila[4];
//$dato['ej.codigo_ejem'] = $fila[5];
//$dato['e.estado_logico'] = $fila[17];
//$dato['e.fecha_borrado'] = $fila[18];

                $respuesta[$i] = $dato;

                $i++;
            }
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

    public function obtenerEdicionEjemplar($codigo_material) {
        $stmt = $this->consultar("select edicion from libro where codigo_material=$codigo_material");
        $row = $stmt->fetch(PDO::FETCH_NUM);
        if ($row != NULL) {
            return $row[0];
        } else {
            return null;
        }
    }

    public function obtenerIsbn($codigo_material) {
        $stmt = $this->consultar("select isbn from libro where codigo_material=$codigo_material");
        $row = $stmt->fetch(PDO::FETCH_NUM);
        if ($row != NULL) {
            return $row[0];
        } else {
            return null;
        }
    }

    /*
     * Obtiene el primer ejemplar que cumpla con la condicion de tener un estado
     * y ser de un codigo de material especifico
     */

    public function obtPriEjemSegunCodMatYEst($codigo_material, $cod_estado) {

        $stmt = $this->consultar("select codigo_ejem from ejemplar_material where codigo_material=$codigo_material
                                  and cod_est=$cod_estado");

        $row = $stmt->fetch(PDO::FETCH_NUM);
        if ($row != NULL) {
            return $row[0];
        } else {
            return "CODIGO DE EJEMPLAR NO ENCONTRADO";
        }
    }

    public function cambiarEstadoEjemplar($codigo_ejemplar, $nuevo_estado) {
        $this->consultar("UPDATE ejemplar_material SET cod_est=$nuevo_estado WHERE codigo_ejem=$codigo_ejemplar");
        return "update realizada";
    }

    public function reservasActivas($socio) {
        $ciSocio = $this->obtener($socio);
        $stmt = $this->consultar("select count(ci) from reserva where ci=$ciSocio and fecha_fin >today");
        $row = $stmt->fetch(PDO::FETCH_NUM);
        if ($row != NULL) {
            return $row[0];
        }
        return $row[0];
    }

    public function prestamosActivos($socio) {
        $ciSocio = $this->obtener($socio);
        $stmt = $this->consultar("select count(ci) from prestamos where ci=$ciSocio and fecha_devolucion is null");
        $row = $stmt->fetch(PDO::FETCH_NUM);
        if ($row != NULL) {
            return $row[0];
        }
        return $row[0];
    }

    public function obtenerPrestamoUsuario($socio){
        $ciSocio = $this->obtener($socio);
        $stmt = $this->consultar("select * from prestamos where ci=$ciSocio and fecha_devolucion is null");
         if ($stmt->fetchColumn() > 0) {

            $respuesta = array();
            $i = 0;
            foreach ($stmt as $fila) {
                $dato = array();
                $dato["ci"] = $fila[0];
                $dato["codigo_conservacion"] = $fila[1];
                $dato["codigo_ejem"] = $fila[2];
                $dato["fecha_inicio"] = $fila[3];
                $dato["fecha_fin"] = $fila[4];
                $dato["fecha_devolucion"] = $fila[5];
                

                $respuesta[$i] = $dato;

                $i++;
            }
        }

        return $respuesta;
    }


    public function obtenerReservaUsuario($socio) {
        $ciSocio = $this->obtener($socio);
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
            LEFT OUTER JOIN material mate ON mate.codigo_material = res.codigo_material
            WHERE res.ci=$ciSocio and res.fecha_fin > today");

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

}
?>

