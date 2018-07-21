<?php

class Tipo extends Validator{
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
		$sql = "SELECT id_tipo, tipo_usuario FROM tipo_usuario";
		$params = array(null);
		return Database::getRows($sql, $params);
	}
	public function getTiposReporte(){
		$sql = "SELECT id_tipousu, nombre_usu FROM tipo_usuario";
		$params = array(null);
		return Database::getRows($sql, $params);
    }
	public function createTipo(){
		$sql = "INSERT INTO tipo_usuario (tipo_usuario) VALUES(?)";
		$params = array($this->tipo);
		return Database::executeRow($sql, $params);
	}
	public function searchTipo($value){
		$sql = "SELECT id_tipousu,nombre_usu FROM tipo_usuarios WHERE nombre_usu LIKE ? ORDER BY nombre_usu";
		$params = array("%$value%","%$value%");
		return Database::getRows($sql, $params);
	}
	public function readTipo(){
		$sql = "SELECT tipo_usuario FROM tipo_usuario WHERE id_tipo = ?";
		$params = array($this->id);
		$tipo = Database::getRow($sql, $params);
		if($tipo){
			$this->tipo = $tipo['tipo_usuario'];
			return true;
		}else{
			return null;
		}
	}
	public function updateTipo(){
		$sql = "UPDATE tipo_usuario SET tipo_usuario = ? WHERE id_tipo = ?";
		$params = array($this->tipo, $this->id);
		return Database::executeRow($sql, $params);
	}
	public function deleteTipo(){
		$sql = "DELETE FROM tipo_usuario WHERE id_tipo = ?";
		$params = array($this->id);
		return Database::executeRow($sql, $params);
	}
}
?>