<?php


class uploadImagen {
    private $archivo;
    private $extensiones;
    private $peso;
    
    public function __construct($archivo,$extensiones,$peso) {
        $this->archivo=$archivo;
        $this->extensiones=$extensiones;
        $this->peso=$peso;
    }
    
    public function validarExtension(){
        $path_parts = pathinfo($this->archivo["name"]);
        
        return in_array($path_parts["extension"], $this->extensiones) ;
    }
    
    public function pesoByte(){
        return $this->archivo["size"];
    }
    
    public function moverArchivo($pathDestino,$nombreArchivo){
        return move_uploaded_file($this->archivo["tmp_name"], $pathDestino."/$nombreArchivo");
    }
}

?>
