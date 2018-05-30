<?php 
class Usuario extends Validator{
    private $id = null;
    private $usuario = null;
    private $clave = null;
    private $nombres = null;
    private $apellidos = null;
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
    public function setUsuario($value){
        if($this->validateAlphanumeric($value, 1, 50)){
            $this->usuario = $value;
            return true;
        }else{
            return false;
        }
    }
    public function getUsuario(){
        return $this->usuario;
    }
    public function setClave($value){
		if($this->validateAlphanumeric($value, 1, 50)){
			$this->clave = $value;
			return true;
		}else{
			return false;
		}
	}
	public function getClave(){
		return $this->clave;
    }
    public function setNombres($value){
        if($this->validateAlphanumeric($value, 1, 50)){
            $this->nombres = $value;
            return true;
        }else{
            return false;
        }
    }
    public function getNombres(){
        return $this->nombres;
    }
    public function setApellidos($value){
        if($this->validateAlphanumeric($value, 1, 50)){
            $this->apellidos = $value;
            return true;
        }else{
            return false;
        }
    }
    public function getApellidos(){
        return $this->apellidos;
    }
    public function setTipo($value){
        if($this->validateId($value)){
            $this->tipo = $value;
            return true;
        }else{
            return false;
        }
    }
    public function getTipo(){
        return $this->tipo;
    }
    //VERIFICACIÓN
    public function checkUsuario(){
        $sql = "SELECT id_usuario, id_tipo FROM usuarios WHERE usuario = ?";
        $params = array($this->usuario);
        $data =Database::getRow($sql, $params);
        if($data){
            $this->id = $data['id_usuario'];
            $this->tipo = $data['id_tipo'];
            return true;
        }else{
            return false;
        }
    }
    public function checkClave(){
		$sql = "SELECT id_usuario FROM usuarios WHERE contraseña = ?";
		$params = array($this->clave);
		$data = Database::getRow($sql, $params);
		if($data){
            $this->id = $data['id_usuario'];
			return true;
		}else{
			return false;
		}
    }
    public function logOut(){
		return session_destroy();
	}
    //Metodos para manejar el CRUD
    public function getUsuarios(){
        $sql = "SELECT id_usuario, nombres, apellidos, id_tipo, usuario, nombres, apellidos FROM usuarios";
        $params = array(null);
        return Database::getRows($sql, $params);
    }
}
?>