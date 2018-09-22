<?php

class Tipos extends Validator{
    private $id = null;
    private $tipo = null;

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
    public function setTipo($value){
		if($this->validateAlphanumeric($value, 1, 50)){
			$this->tipo = $value;
			return true;
		}else{
			return false;
		}
	}
	public function getTipo(){
		return $this->tipo;
    }
    
    public function getTipos(){
		$sql = "SELECT id_periodo, periodo FROM periodo_pago ";
		$params = array(null);
		return Database::getRows($sql, $params);
	}
	public function getTiposReporte(){
		$sql = "SELECT id_tipousu, nombre_usu FROM tipo_usuario";
		$params = array(null);
		return Database::getRows($sql, $params);
    }
	public function createTipo(){
		$sql = "INSERT INTO periodo_pago (periodo) VALUES(?)";
		$params = array($this->tipo);
		return Database::executeRow($sql, $params);
	}
	public function searchTipo($value){
		$sql = "SELECT id_periodo, periodo FROM periodo_pago WHERE periodo LIKE ? ORDER BY periodo";
		$params = array("%$value%","%$value%");
		return Database::getRows($sql, $params);
	}
	public function readTipo(){
		$sql = "SELECT periodo FROM periodo_pago WHERE id_periodo = ?";
		$params = array($this->id);
		$tipo = Database::getRow($sql, $params);
		if($tipo){
			$this->tipo = $tipo['periodo'];
			return true;
		}else{
			return null;
		}
	}
	public function updateTipo(){
		$sql = "UPDATE periodo_pago SET periodo = ? WHERE id_periodo = ?";
		$params = array($this->tipo, $this->id);
		return Database::executeRow($sql, $params);
	}
	public function deleteTipo(){
		$sql = "DELETE FROM periodo WHERE id_periodo = ?";
		$params = array($this->id);
		return Database::executeRow($sql, $params);
	}
}
?>