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
    public function readUsuario(){
        $sql = "SELECT id_usuario, nombres, apellidos, t.tipo_usuario, usuario, contraseña FROM usuarios INNER JOIN tipo_usuario t USING (id_tipo) WHERE id_usuario = ?";
        $params = array($this->id);
        $usuario = Database::getRow($sql, $params);
        if($usuario){
            $this->nombres = $usuario['nombres'];
            $this->apellidos = $usuario['apellidos'];
            $this->tipo = $usuario['tipo_usuario'];
            $this->usuario = $usuario['usuario'];
            $this->clave = $usuario['contraseña'];
            return true;
        }else{
            return null;
    }
}
    public function GetDatosUsuario(){
        $sql = "SELECT id_usuario, nombres, apellidos FROM usuarios WHERE id_tipo = 1 AND id_usuario = ?";
        $id_usuario = 1;
        $params = array($id_usuario);
        $admin = Database::getRows($sql, $params);
        if($admin){
            $this->nombres = $admin['nombres'];
            $this->apellidos = $admin['apellidos'];
            return true;
        }else{
            return false;
        }
    }
    public function createUsuario(){
		$sql = "INSERT INTO usuarios(nombres, apellidos, id_tipo, usuario, contraseña) VALUES (?,?,?,?,?)";
		$params = array($this->nombres, $this->apellidos,$this->tipo, $this->usuario, $this->clave);
        return Database::executeRow($sql, $params);    
        
    }
    public function updateUsuario(){
		$sql = "UPDATE usuarios SET nombres= ?, apellidos= ?, id_tipo= ?, usuario= ?, contraseña= ? WHERE id_usuario = ?";
		$params = array($this->nombres, $this->apellidos,$this->tipo, $this->usuario,$this->clave, $this->id);
		return Database::executeRow($sql, $params);
	}
	public function deleteUsuario(){
		$sql = "DELETE FROM usuarios WHERE id_usuario = ?";
		$params = array($this->id);
        return Database::executeRow($sql, $params);   
    }  
    public function getTipoe(){
		$sql = "SELECT id_tipo, tipo_usuario FROM tipo_usuario"; 
		$params = array(null);
		return Database::getRows($sql, $params);

    }
public function getTipoUsuario(){
    $sql = "SELECT id_usuario, nombres, apellidos, id_tipo, usuario FROM usuarios WHERE id_tipo = 1  "; 
    $params = array(null);
    return Database::getRows($sql, $params);

}
public function getTipoUsuario2(){
    $sql = "SELECT id_usuario, nombres, apellidos, id_tipo, usuario FROM usuarios WHERE id_tipo = 2 "; 
    $params = array(null);
    return Database::getRows($sql, $params);

}
public function getTipoUsuario3(){
    $sql = "SELECT id_usuario, nombres, apellidos, id_tipo, usuario FROM usuarios WHERE id_tipo = 3 "; 
    $params = array(null);
    return Database::getRows($sql, $params);

}
    //CONSULTAS PARA REPORTES
    public function getInformacion(){
        $sql = "SELECT id_usuario, nombres, apellidos, id_tipo, usuario, nombres, apellidos FROM usuarios WHERE id_usuario = ?";
        $params = array($this->id);
        $usuario = Database::getRows($sql, $params);
        if($usuario){
            $this->id = $usuario['id_usuario'];
            $this->usuario = $usuario['usuario'];
            $this->nombres = $usuario['nombres'];
            $this->apellidos = $usuario['apellidos'];
            return true;
        }else{
            return null;
        }
    }

}
?>