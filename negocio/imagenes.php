<?php


class uploadImagen {
    //Atributos de la clase UploadImagen
    private $archivo;
    private $extensiones;
    private $peso;
    
    
    public function __construct($archivo,$extensiones,$peso) {//El constructor de la clase UploadImagen
        $this->archivo=$archivo;
        $this->extensiones=$extensiones;
        $this->peso=$peso;
    }
    
    //Indica si esta bien la extension
    public function validarExtension(){
        $path_parts = pathinfo($this->archivo["name"]);//Obtenemos la extension de la imagen
        
        return in_array($path_parts["extension"], $this->extensiones) ;//Valida si la extension esta autorizado
    }
    
    //Si el peso (byte)? esta en el intervalo autorizado
    public function pesoByte(){
        return $this->archivo["size"]<$this->peso;
    }
    //Copiamos la imagen que esta en memoria temporiaria hacia path de destino
    public function moverArchivo($pathDestino,$nombreArchivo){
        //Se tratantado conseguir autorizacion de linux para la modificacion de imagen
        /*chown( $pathDestino."/$nombreArchivo", $informix);
        chmod($pathDestino."/$nombreArchivo",007);*/
        copy($this->archivo["tmp_name"], $pathDestino."/$nombreArchivo");
        return true;
    }
}

?>
