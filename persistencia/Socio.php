<?php

class Socio extends Conexion {

    public function __construct() {//El constructor del objeto Socio
        parent::__construct(SERVIDOR, PUERTO, USUARIO_SALA, PASS_USALA);
    }

     public function obtener($usuario)
    {
        $stmt=$this->consultar("SELECT ci FROM usuario WHERE e_mail='$usuario' AND estado_logico='si'");
        $row=$stmt->fetch(PDO::FETCH_NUM);
//        $respuesta=array();
        if ($row!=NULL){
//           $respuesta["ci"]=$row[0];
            return $row[0];
        }
//        return $respuesta;
//       return "Amigacho";
    }
      public function confirmarReserva($socio,$ejemplarAReservar){
//          INSERT INTO");
//          $stmt = $this->consultar("
//              
//SELECT ej.codigo_ejem
//FROM material m ,ejemplar_material ej ,estado e
//WHERE ej.codigo_material= $ejemplarAReservar
//and e.estado_anterior='Disponible'
//GROUP BY ej.codigo_ejem;");
//          
//           $row= $stmt->fetch(PDO::FETCH_NUM);
//        
//        if ($row != NULL) {
//        $respuesta = $row[0];    
//        }
        
        $cedula=$this->obtener($socio);
        
        if ($cedula !=NULL ) {//&& $respuesta !=NULL
            try {
                
$this->consultar("INSERT INTO reserva (ci,codigo_curso,codigo_material,edicion,isbn,nro_reserva,fecha_inicio,fecha_fin)
VALUES ($cedula,1,$ejemplarAReservar,2,12345699,1,'05/07/2014',17/07/2014)");
//INSERT INTO reserva (ci,codigo_curso,codigo_material,edicion,isbn,nro_reserva,fecha_borrado)
//VALUES (45829221,1,101,2,12345679,0,'2015-01-04 08:45');
            } catch (Exception $exc) {
                return  $exc->getTraceAsString();
            } 
            
        }else{
            return "ERROR PROCESANDO LOS DATOS";
        }
        
        
        return $respuesta;
    
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
e.estado_anterior");

//SELECT
//m.codigo_material
//,m.nombre         
//,m.anio
//,ej.cod_est
//,e.estado_anterior FROM material m ,ejemplar_material ej ,estado e
//WHERE e.cod_est=ej.cod_est 
//and ej.codigo_material= m.codigo_material;");//and e.estado_anterior='DISPONIBLE'

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

}

?>
<!--select
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
and ej.codigo_material= m.codigo_material;");//and e.estado_anterior='DISPONIBLE'-->
