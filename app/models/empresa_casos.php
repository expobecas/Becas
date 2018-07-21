<?php

class Casos extends Validator{
    private $id = null;
    private $descripcion = null;
    private $fecha = null;
    private $cita = null;


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

    public function setDescripcion($value){
		if($this->validateAlphanumeric($value, 1, 50)){
			$this->descripcion = $value;
			return true;
		}else{
			return false;
		}
	}
	public function getDescripcion(){
		return $this->descripcion;
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

            public function setCita($value){
                if($this->validateId($value)){
                    $this->cita = $value;
                    return true;
                }else{
                    return false;
                }
        }
            public function getCita(){
                return $this->cita;
            }

    //Metodos para el manejo del CRUD

	public function getCasos(){
		$sql = "SELECT s.id_solicitud, e.primer_nombre, e.primer_apellido, e.n_carnet, e.grado, e.especialidad, s.encargado, s.cel_mama FROM solicitud s INNER JOIN estudiantes e USING (id_estudiante)"; 
		$params = array(null);
		return Database::getRows($sql, $params);
	}

	public function getIdPatrocinador(){
        $sql = "SELECT id_patrocinador FROM patrocinadores INNER JOIN usuarios USING(id_usuario) WHERE id_usuario = ?";
        $params = array($this->id_usuario);
		return Database::getRow($sql, $params);	
   }

	public function read(){
		$sql = "SELECT s.id_solicitud, e.primer_nombre, e.primer_apellido, e.n_carnet, e.grado, e.especialidad, s.encargado, s.cel_mama FROM solicitud s INNER JOIN estudiantes e USING (id_estudiante)";
		$params = array($this->id_usuario);
		$becas = Database::getRow($sql, $params);
		if($becas){
			$this->monto = $becas['monto'];
			$this->periodo = $becas['periodo_pago'];
			$this->fecha = $becas['fecha_ini_beca'];
            return true;
		}else{
			return null;
		}
	}
}

?>