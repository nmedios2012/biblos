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
    public function agregarEjemplar($titulo,$editorial,$autores,$isbn,$anio,$estado,$materia,$tema,$idioma,$id_ejemplar,$cod_ejem){
        $this->consultar("INSERT INTO ejemplar_material (titulo,editorial,autores,isbn,anio,estado,
                                materia,tema,idioma,id_ejemplar,codigo_ejem)
                                VALUES ($ci,'$nombre','$apellido','   ','$ciudad','$calle',$nro_apto,$nro_puerta,'$email','si')
                                ");
        
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
