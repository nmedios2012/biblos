<?php

class Socio extends Conexion {

    public function __construct() {//El constructor del objeto Socio
        parent::__construct(SERVIDOR, PUERTO, USUARIO_SALA, PASS_USALA);
    }

    
//      public function listadoLibros() {
//        $stmt=$this->consultar("SELECT nombre,anio,comentario_general,COUNT(*),material.codigo_material FROM ejemplar_material INNER JOIN material ON ejemplar_material.codigo_material=material.codigo_material GROUP BY ejemplar_material.codigo_material,nombre,anio,comentario_general,material.codigo_material");
//        $respuesta=array();
//
//            $i=0;
//            foreach ($stmt as $fila){
//               $dato=array();
//               $dato["nombre"]=$fila[0];
//               $dato["anio"]=$fila[1];
//               $dato["descripcion"]=$fila[2];
//               
//               if($fila[3]>1){
//                   $dato["disponibilidad"]="disponibleCasa";
//                   $dato["mostrardisponibilidad"]="<a href='../../../negocio/bibliotecologo/altaprestamo.php?codigo=".$fila[4]."'>Prestamo</a><a href='#'>En SALA</a>";
//               }
//               else{
//                   
//                        $dato["disponibilidad"]="disponibleSala";
//                        $dato["mostrardisponibilidad"]="<a href='#'>En SALA</a>";
//
//                    }
//               
//               $respuesta[$i]=$dato;
//               $i++;
//            }
//               
//        return $respuesta;
//    }

    
    public function listadoLibros() {


        $stmt = $this->consultar("
select
m.codigo_material
,m.nombre         
,m.anio
,m.comentario_general
,m.fecha_alta
,m.fecha_baja
,m.estado_logico
,m.fecha_borrado
,ej.cod_est
,ej.codigo_ejem
,ej.codigo_material
,ej.fecha_alta
,ej.fecha_baja
,ej.estado_logico
,ej.fecha_borrado
,e.cod_est
,e.estado_anterior
,e.estado_logico 
,e.fecha_borrado  
from material m ,ejemplar_material ej ,estado e
WHERE e.cod_est=ej.cod_est 
and ej.codigo_material= m.codigo_material;");//and e.estado_anterior='DISPONIBLE'

        if ($stmt->fetchColumn() > 0) {
//            array_push($array, $stmt);
            $respuesta = array();
            $i = 0;
            foreach ($stmt as $fila) {
                $dato = array();

$dato['m.codigo_material'] = $fila[0];
$dato['m.nombre'] = $fila[1];
$dato['m.anio'] = $fila[2];
$dato['m.comentario_general'] = $fila[3];
$dato['m.fecha_alta'] = $fila[4];
$dato['m.fecha_baja'] = $fila[5];
$dato['m.estado_logico'] = $fila[6];
$dato['m.fecha_borrado'] = $fila[7];
$dato['ej.cod_est'] = $fila[8];
$dato['ej.codigo_ejem'] = $fila[9];
$dato['ej.codigo_material'] = $fila[10];
$dato['ej.fecha_alta'] = $fila[11];
$dato['ej.fecha_baja'] = $fila[12];
$dato['ej.estado_logico'] = $fila[13];
$dato['ej.fecha_borrado'] = $fila[14];
$dato['e.cod_est'] = $fila[15];
$dato['e.estado_anterior'] = $fila[16];
$dato['e.estado_logico'] = $fila[17];
$dato['e.fecha_borrado'] = $fila[18];

                $respuesta[$i] = $dato;

                $i++;
            }
        }

        return $respuesta;
    }

}

?>
