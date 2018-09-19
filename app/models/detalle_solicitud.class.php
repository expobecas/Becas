<?php 
class Detalle_Sol extends Validator{
    private $id = null;
    private $id_estado = null;
    private $nombre1_es = null;
    private $nombre2_es = null;
    private $apellido1_es = null;
    private $apellido2_es = null;
    private $genero = null;
    private $religion = null;
    private $encargado = null;
    private $direccion = null;
    private $correo = null;
    
    public function setId($value){
        if($this->validateId($value)){
            $this->id = $value;
            return true;
        }
        else{
            return false;
        }
    }
    public function getId(){
        return $this->$id;
    }
    public function setId_Estado($value){
        if($this->validateId($value)){
            $this->id_estado = null;
            return true;
        }else{
            return false;
        }
    }
    public function getId_Estado(){
        return $this->$id_estado;
    }

    /*METODOS PARA EL CRUD*/
    public function getSol_aprobadas(){
        $sql = "SELECT id_solicitud, primer_nombre, primer_apellido, grado, especialidad, encargado, correo, tel_fijo FROM detalle_solicitud INNER JOIN solicitud USING(id_solicitud) INNER JOIN estado_solicitud USING(id_estado) INNER JOIN estudiantes ON estudiantes.id_estudiante = solicitud.id_estudiante WHERE detalle_solicitud.id_estado = 2";
        $params = array(null);
        return Database::getRow($sql, $params); 
    } 
}
?>