<?php

class Empresa extends Validator{
    private $id = null;
    private $detalle = null;
    private $patrocinador = null;
    private $monto = null;
    private $periodo = null;
	private $fecha = null;
	private $id_usuario = null;


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
			$this->monto = $value;
			return true;
		}else{
			return false;
		}
	}
	public function getMonto(){
		return $this->monto;
    }

    public function setPeriodo($value){
		if($this->validateAlphanumeric($value, 1, 50)){
			$this->periodo = $value;
			return true;
		}else{
			return false;
		}
	}
	public function getPeriodo(){
		return $this->periodo;
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

		public function setIdUsuario($value){
			if($this->validateId($value)){
				$this->id_usuario = $value;
				return true;
			}else{
				return false;
			}
		}
		public function getIdUsuario(){
			return $this->id_usuario;
		}

    //Metodos para el manejo del CRUD

	public function getBecas(){
		$sql = "SELECT monto, periodo_pago, fecha_ini_beca FROM becas"; 
		$params = array($this->id);
		return Database::getRows($sql, $params);
	}

	public function getIdPatrocinador(){
        $sql = "SELECT id_patrocinador FROM patrocinadores INNER JOIN usuarios USING(id_usuario) WHERE id_usuario = ?";
        $params = array($this->id_usuario);
		return Database::getRow($sql, $params);	
   }

	public function readBecas(){
		$sql = "SELECT monto, periodo_pago, fecha_ini_beca FROM becas INNER JOIN patrocinadores USING(id_patrocinador) INNER JOIN usuarios USING(id_usuario) WHERE usuarios.id_usuario = ?";
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
	public function getBecas2(){
		$sql = "SELECT estudiantes.primer_nombre, estudiantes.primer_apellido, estudiantes.n_carnet, becas.monto, becas.periodo_pago, becas.fecha_ini_beca FROM becas INNER JOIN detalle_solicitud ON becas.id_detalle = detalle_solicitud.id_detalle INNER JOIN solicitud ON detalle_solicitud.id_solicitud = solicitud.id_solicitud INNER JOIN estudiantes ON solicitud.id_estudiante = estudiantes.id_estudiante INNER JOIN patrocinadores ON patrocinadores.id_patrocinador = becas.id_patrocinador INNER JOIN usuarios ON usuarios.id_usuario = patrocinadores.id_usuario WHERE usuarios.id_usuario = ?";
		$params = array($_SESSION['id_usuario']);
		return Database::getRows($sql, $params);

	}
	public function getTotal(){
		$sql = "SELECT estudiantes.primer_nombre, estudiantes.primer_apellido, estudiantes.n_carnet, becas.monto, becas.periodo_pago, becas.fecha_ini_beca FROM becas INNER JOIN detalle_solicitud ON becas.id_detalle = detalle_solicitud.id_detalle INNER JOIN solicitud ON detalle_solicitud.id_solicitud = solicitud.id_solicitud INNER JOIN estudiantes ON solicitud.id_estudiante = estudiantes.id_estudiante INNER JOIN patrocinadores ON patrocinadores.id_patrocinador = becas.id_patrocinador INNER JOIN usuarios ON usuarios.id_usuario = patrocinadores.id_usuario WHERE usuarios.id_usuario = ?";
		$params = array($_SESSION['id_usuario']);
		return Database::getRows($sql, $params);
	}
}

?>