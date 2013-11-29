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
    
    public function agregarLibro($cod_mat,$isbn,$edicion,$est_log){
        $this->consultar("INSERT INTO libro (codigo_material,isbn,edicion,estado_logico) VALUES 
                         ($cod_mat,$isbn,$edicion,'$est_log')");
        return true;
    }
    
    public function agregarMaterial($cod_mat,$titulo,$anio,$com_gral,$est_log){
        $this->consultar("INSERT INTO material (codigo_material,nombre,anio,comentario_general,fecha_alta,estado_logico) VALUES 
                         ($cod_mat,'$titulo',$anio,'$com_gral','25/7/2013','$est_log')");
        return true;
    }
     
    public function agregarRevista($cod_mat,$nro_revista,$est_log){
        $this->consultar("INSERT INTO revista (codigo_material,numrevista,estado_logico) VALUES 
                         ($cod_mat,$nro_revista,'$est_log')");     
        return true;
        
    }
    
    public function agregarFotocopia($cod_mat,$cant_pag,$est_log){
        $this->consultar("INSERT INTO fotocopia (codigo_material,cantidadpag,estado_logico) VALUES 
                         ($cod_mat,$cant_pag,$est_log)");
        return true;
    
    }
    
    public function agregarOtro($cod_mat,$cod_otro,$tipo,$est_log){
        $this->consultar("INSERT INTO otro (codigo_material,codigo_otro,tipo,estado_logico) VALUES 
                        ($cod_mat,$cod_otro,'$tipo','$est_log')");
        return true;
    
    }
    
    public function agregarEditorial($cod_emp,$nom_edit,$id_pais,$ciudad,$calle,$nro_puerta,
                                        $nro_apto,$mail,$est_log){
        $this->consultar("INSERT INTO editorial_empresa (codigo_empresa,nombre,id_pais,ciudad,calle,numero_puerta,
                          numero_apartamento,e_mail,fecha_alta,estado_logico) VALUES ($cod_emp,'$nom_edit',$id_pais,
                          '$ciudad','$calle','$nro_puerta','$nro_apto','$mail','12/12/13','$est_log')");
        return true;
      
    }
    
    public function agregarTelefono($cod_emp,$tel1_emp,$tel2_emp,$interno,$est_log){
        $this->consultar("INSERT INTO tel_empresa (codigo_empresa,tel1_empresa,tel2_empresa,interno,estado_logico)
                          VALUES ($cod_emp,$tel1_emp,$tel2_emp,$interno,'$est_log')");
        return true;
        
    }
    
    public function agregarRol($nombre,$id_rol,$cod_emp,$est_log){
        $this->consultar("INSERT INTO rol_empresa (nombre,id_rol,codigo_empresa,estado_logico) VALUES
                          ('$nombre',$id_rol,$cod_emp,'$est_log')");

        return true;
    
    }
    
     public function agregarPais($pais,$id_pais,$est_log){
        $this->consultar("INSERT INTO pais (nombre,id_pais,estado_logico) VALUES
                          ('$pais',$id_pais,'$est_log')");

        return true;
    
    }
    
    public function agregarTema($cod_tema,$nom_tema,$est_log){
        $this->consultar("INSERT INTO tema (codigo_tema,nombre,estado_logico) VALUES
                          ($cod_tema,'$nom_tema','$est_log')");

        return true;
    
    }
    
    public function agregarEspecializacion($cod_tema,$cod_esp,$nom_esp,$est_log){
        $this->consultar("INSERT INTO especializacion (codigo_es,codigo_tema,nombre,estado_logico) VALUES
                          ($cod_esp,$cod_tema,'$nom_esp','$est_log')");

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
