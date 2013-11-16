<?php

class Administrador extends Conexion{
   
    public function __construct(){
        parent::__construct(SERVIDOR,PUERTO,USUARIO_ADMINISTRATIVO,PASS_ADMINISTRATIVO);
    }
    
    public function agregarUsuario($ci,$nombre,$apellido,$ciudad,$calle,$nro_apto,$nro_puerta,$email){
        $this->consultar("INSERT INTO usuario (ci,nombre,apellido,link_foto,ciudad,calle,
                                numero_apartamento,numero_puerta,e_mail,estado_logico)
                                VALUES ($ci,'$nombre','$apellido','   ','$ciudad','$calle',$nro_apto,$nro_puerta,'$email','si')
                                ");
        
        return true;
        
    }
    public function buscar($ci)
    {
        $stmt=$this->consultar("SELECT ci,nombre, apellido,ciudad, calle, numero_apartamento, numero_puerta, e_mail FROM usuario WHERE ci='$ci' AND estado_logico='si'");
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
