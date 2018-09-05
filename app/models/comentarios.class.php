<?php 
class Comentarios extends Validator{
    private $id = null;
    private $comentario = null;
    private $fecha = null;
    private $becas = null;
    private $nombres_p = null;
    private $apellidos_p = null;
    private $id_estudiante = null;

    public function setId($value){
        if($this->validateId($value)){
            $this->id = $value;
            return true;
        }else{
            return false;
        }
    }
    public function getId(){
        return $this->id;
    }
    public function setComentario($value){
        if($this->validateAlphanumeric($value, 1, 50)){
            $this->comentario = $value;
            return true;
        }else{
            return false;
        }
    }
    public function getComentario(){
        return $this->comentario;
    }
    public function setFecha($value){
        if($this->validateAlphanumeric($value, 1, 50)){
            $this->fecha = $value;
            return true;
        }else{
            return false;
        }
    }
    public function getFecha(){
        return $this->fecha;
    }
    public function setBecas($value){
        if($this->validateId($value)){
            $this->becas = $value;
            return true;
        }else{
            return false;
        }
    }
    public function getBecas(){
        return $this->becas;
    }
    public function setNombres_p($value){
        if($this->validateAlphanumeric($value, 1, 50)){
            $this->nombres_p = $value;
            return true;
        }else{
            return false;
        }
    }
    public function getNombres_p(){
        return $this->nombre_p;
    }
    public function setApellidos_p($value){
        if($this->validateAlphanumeric($value, 1, 50)){
            $this->apellidos_p = $value;
            return true;
        }else{
            return false;
        }
    }
    public function getApellidos_p(){
        return $this->apellidos_p;
    }
    public function setId_estudiante($value){
        if($this->validateId($value)){
            $this->id_estudiante = $value;
            return true;
        }else{
            return false;
        }
    }
    public function getId_estudiante(){
        return $this->id_estudiante;
    }

    public function getMensajes(){
        $sql = "SELECT estudiantes.primer_nombre, estudiantes.primer_apellido, comentario, fecha FROM comentarios INNER JOIN patrocinadores USING(id_patrocinador) INNER JOIN becas USING(id_becas) INNER JOIN detalle_solicitud ON detalle_solicitud.id_detalle = becas.id_detalle INNER JOIN solicitud on solicitud.id_solicitud = detalle_solicitud.id_solicitud INNER JOIN estudiantes ON estudiantes.id_estudiante = solicitud.id_estudiante INNER JOIN usuarios ON usuarios.id_usuario = comentarios.id_usuario WHERE comentarios.id_usuario = ?";
        $params = array($_SESSION['id_usuario']);
        return Database::getRows($sql, $params);
    }
    public function readComentario(){
        $sql = "SELECT comentario FROM comentarios WHERE id_comentario = ?";
        $params = array($this->id);
        $mensajes = Database::getRow($sql, $params); 
        if($mensajes){
            $this->comentario = $mensajes['comentario'];
            return true;
        }else{
           return false;
        }
    }
}
?>