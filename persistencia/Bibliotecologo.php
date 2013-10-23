<?php

class Bibliotecologo extends Conexion{
   
    public function __construct(){
        parent::__construct(SERVIDOR,PUERTO,USUARIO_BIBLIOTECOLOGO,PASS_BIBLIOTECOLOGO);
    }
    
    public function agregarUsuario($ci,$nombre,$apellido,$ciudad,$calle,$nro_apto,$nro_puerta,$email){
        $this->consultar("INSERT INTO usuario (ci,nombre,apellido,link_foto,ciudad,calle,
                                numero_apartamento,numero_puerta,e_mail,estado_logico)
                                VALUES ($ci,'$nombre','$apellido','   ','$ciudad','$calle',$nro_apto,$nro_puerta,'$email','si')
                                ");
        
        return true;
        
    }
    public function agregarLibro($cod_mat,$titulo,$isbn,$edicion,$anio,$com_gral,$fec_alta,$est_log){
        $this->consultar("INSERT INTO libro (codigo_material,isbn,edicion,fecha_alta,estado_logico) VALUES ($cod_mat,$isbn,             				$edicion,'$fec_alta','$est_log')");
        $this->consultar("INSERT INTO material (codigo_material,nombre,anio,comentario_general,fecha_alta,estado_logico) VALUES 				($cod_mat,'$titulo',$anio,'$com_gral','$fec_alta','$est_log')");
       
        return true;
        
    }
    public function agregarRevista($cod_mat,$titulo,$nro_revista,$anio,$com_gral,$fec_alta,$est_log){
        $this->consultar("INSERT INTO revista (codigo_material,numrevista,estado_logico) VALUES ($cod_mat,$nro_revista,'$est_log')");
        $this->consultar("INSERT INTO material (codigo_material,nombre,anio,comentario_general,fecha_alta,estado_logico) VALUES 			($cod_mat,'$titulo',$anio,'$com_gral','$fec_alta','$est_log')");
       
        return true;
        
    }
    public function agregarFotocopia($cod_mat,$titulo,$cant_pag,$anio,$com_gral,$fec_alta,$est_log){
        $this->consultar("INSERT INTO fotocopia (codigo_material,cantidadpag,estado_logico) VALUES ($cod_mat,$cant_pag,$est_log)");
        $this->consultar("INSERT INTO material (codigo_material,nombre,anio,comentario_general,fecha_alta,estado_logico) VALUES
			($cod_mat,'$titulo',$anio,'$com_gral','$fec_alta','$est_log')");

        return true;
    
    }
    public function agregarOtro($cod_mat,$titulo,$cod_otro,$tipo,$anio,$com_gral,$fec_alta,$est_log){
        $this->consultar("INSERT INTO otro (codigo_material,codigo_otro,tipo,estado_logico) VALUES 					  				($cod_mat,$cod_otro,'$tipo','$est_log')");
        $this->consultar("INSERT INTO material (codigo_material,nombre,anio,comentario_general,fecha_alta,estado_logico) VALUES
                        ($cod_mat,'$titulo',$anio,'$com_gral','$fec_alta','$est_log')");

        return true;
    
    }
    public function buscar($ci)
    {
        $stmt=$this->consultar("SELECT ci,nombre, apellido FROM usuario WHERE ci='$ci' AND estado_logico='si'");
        $row=$stmt->fetch(PDO::FETCH_NUM);
        $respuesta=array();
        if ($row!=NULL){
           $respuesta["ci"]=$row[0];
           $respuesta["nombre"]=$row[1];
           $respuesta["apellido"]=$row[2];
        }
        return $respuesta;
        
    }
    public function eliminar($ci){
        $this->consultar("  UPDATE usuario 
                            SET
                                estado_logico='no',
                                fecha_borrado=today
                            WHERE ci=$ci");
                                
        
        return true;
        
    }
}
?>
