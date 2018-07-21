<?php
class Becas extends Validator {
    //DATOS DE LA TABLA BECAS
     private $id = null;
     private $detalle = null;
     private $patrocinador = null;
     private $monto = null;
     private $periodo_pago = null;
     private $fecha_inicio = null;

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

    public function setDetalle($value){
        if($this->validateId($value)){
            $this->detalle = $value;
            return true;
        }else{
            return false;
        }
    }
    public function getDetalle(){
        return $this->detalle;
    }

    public function setPatrocinador($value){
        if($this->validateId($value)){
            $this->patrocinador = $value;
            return true;
        }else{
            return false;
        }
    }
    public function getPatrocinador(){
        return $this->patrocinador;
    }

    public function setMonto($value){
        if($this->validateMoney($value)){
            $this->id = $value;
            return true;
        }else{
            return false;
        }
    }
    public function getMonto(){
        return $this->monto;
    }
    
    public function setPeriodo_pago(){
        if($this->validateAlphanumeric($value, 1, 50)){
            $this->perido_pago = $value;
            return true;
        }else{
            return false;
        }
    }
    public function getPeriodo_pago(){
        return $this->periodo_pago;
    }

    public function setFecha_inicio(){
        if($this->validateAlphanumeric($value, 1, 50)){
            $this->fecha_inicio = $value;
            return true;
        }else{
            return false;
        }
    }
    public function getFecha_inicio(){
        return $this->fecha_inicio;
    }

    //METODOS PARA EL CRUD
    public function getBecas(){
        $sql = "SELECT n_carnet, primer_nombre, segundo_nombre, primer_apellido, segundo_apellido, grado, monto, periodo_pago, estado_solicitud FROM detalle_solicitud INNER JOIN solicitud USING(id_solicitud) INNER JOIN estado_solicitud USING(id_estado) INNER JOIN becas ON detalle_solicitud.id_detalle = becas.id_detalle INNER JOIN estudiantes ON solicitud.id_estudiante = estudiantes.id_estudiante";
        $params = array(null);
        return Database::getRows($sql, $params);
    }

}
?>