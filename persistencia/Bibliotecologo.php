<?php

class Bibliotecologo extends Conexion{
    
    public function __construct(){//El constructor del objeto biblotecologo
        parent::__construct(SERVIDOR,PUERTO,USUARIO_BIBLIOTECOLOGO,PASS_BIBLIOTECOLOGO);
    }
    
    //Se guarda en la tabla tel_usuario el telefono correspondiente a la cedula
    public function  insertarTelefono($documento,$telefono){
        
        $this->consultar("INSERT INTO tel_usuario (ci,tel_usu,estado_logico)VALUES($documento,$telefono,'si')");
        return true;
    }
    
    //Se guarda en la tabla usuario los datos
    public function agregarUsuario($documento,$nombre,$apellido,$ciudad,$calle,$nro_apto,$nro_puerta,$email){
        $this->consultar("INSERT INTO usuario (ci,nombre,apellido,link_foto,ciudad,calle,
                                numero_apartamento,numero_puerta,e_mail,estado_logico)
                                VALUES ($documento,'$nombre','$apellido','   ','$ciudad','$calle',$nro_apto,$nro_puerta,'$email','si')
                                ");
                
        return true;
        
    }
    //Se editan los datos de la tabla usuario desde la cedula
    public function editarUsuario($documento,$nombre,$apellido,$ciudad,$calle,$nro_apto,$nro_puerta,$email){
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
        
        return true;
        
    }
    
    public function agregarLibro($cod_mat,$isbn,$edicion,$est_log){
        $this->consultar("INSERT INTO libro (codigo_material,isbn,edicion,estado_logico) VALUES 
                         ($cod_mat,$isbn,$edicion,'$est_log')");
        return true;
    }
    
    public function agregarMaterial($cod_mat,$titulo,$anio,$com_gral,$est_log){
        $this->consultar("INSERT INTO material (codigo_material,nombre,anio,comentario_general,fecha_alta,cod_est,estado_logico) VALUES 
                         ($cod_mat,'$titulo',$anio,'$com_gral',to_date(),1,'$est_log')");
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
    
    public function agregarConservacion($cod_cnsv,$nom_cnsv,$est_log){
        $this->consultar("INSERT INTO conservacion (codigo_conservacion,nombre,estado_logico) VALUES
                          ($cod_cnsv,'$nom_cnsv','$est_log')");

        return true;
    
    }
    
    public function agregarAutor($cod_art,$nom_art,$ape_art,$id_pais,$fec_alta,$est_log){
        $this->consultar("INSERT INTO artista_autor (codigo_artista,nombre,apellido,fecha_alta,estado_logico)
                          VALUES ($cod_art,'$nom_art','$ape_art',$id_pais,'$fec_alta,'$est_log')");
    }
    
    public function agregarRol_Autor($id_rol,$rol,$est_log){
        $this->consultar ("INSERT INTO rol_autor (id_rol,nombre,estado_logico) VALUES ($id_rol,'$rol','$est_log')");
    }
    
    /*public function agregarPosterior($cod_cnsv,$nom_pst,$cod_pst,$est_log){
        $this->consultar("INSERT INTO conservacion_posterior (codigo_conservacion,nombre_post,
                         codigo_post,estado_logico) VALUES ($cod_cnsv,'$nom_pst',$cod_pst,'$est_log')");

        return true;
      No es necesaria esta función al momento de cargar nuevo tipo de conservación, 
      debería tomar desde tabla conservación y agregarlo a esta tabla
    
    }*/
    
    public function agregarSancion($codigo,$tipo_penaliz,$nombre,$descripcion,$est_log){
        $this->consultar("INSERT INTO penalizaciones (codigo,tipo_penaliz,nombre,descripcion,estado_logico)
                          VALUES ('$codigo','$tipo_penaliz','$nombre','$descripcion','$est_log')");

        return true;
    }
    
    public function agregarEstados($cod_est,$estado_anterior,$est_log){
        $this->consultar("INSERT INTO estado (cod_est,estado_anterior,estado_logico)
                          VALUES ('$cod_est','$estado_anterior','$est_log')");

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
    
    //Revisar desde aqui No ingresa en la base de datos el prestamo
    public function agregarPrestamo($ci,$codigoEjemplar,$fecha){
        $codigo_conservacion=$this->escalar("  SELECT first 1 codigo_conservacion
                            FROM mantiene
                            WHERE codigo_ejem=@codigoEjemplar AND fecha_final IS NULL");
        echo $codigo_conservacion;
        $this->consultar("  INSERT INTO prestamos(ci,codigo_conservacion,codigo_ejem,fecha_inicio,fecha_fin,estado_logico)
                            VALUES($ci,$codigo_conservacion,$codigoEjemplar,today,date($fecha),'si')");

    }
    
    //Se devuelve la lista de usuarios
    public function listadoEjemplarMaterial(){
        $stmt=$this->consultar("SELECT nombre,anio,comentario_general,COUNT(*),material.codigo_material FROM ejemplar_material INNER JOIN material ON ejemplar_material.codigo_material=material.codigo_material GROUP BY ejemplar_material.codigo_material,nombre,anio,comentario_general,material.codigo_material");
        $respuesta=array();

            $i=0;
            foreach ($stmt as $fila){
               $dato=array();
               $dato["nombre"]=$fila[0];
               $dato["anio"]=$fila[1];
               $dato["descripcion"]=$fila[2];
               
               if($fila[3]>1){
                   $dato["disponibilidad"]="disponibleCasa";
                   $dato["mostrardisponibilidad"]="<a href='../../../negocio/bibliotecologo/altaprestamo.php?codigo=".$fila[4]."'>Prestamo</a><a href='#'>En SALA</a>";
               }
               else{
                   
                        $dato["disponibilidad"]="disponibleSala";
                        $dato["mostrardisponibilidad"]="<a href='#'>En SALA</a>";

                    }
               
               $respuesta[$i]=$dato;
               $i++;
            }
               
        return $respuesta;
    }
}
?>
