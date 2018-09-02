<?php 
class Usuario extends Validator{
    private $id = null;
    private $usuario = null;
    private $clave = null;
    private $nombres = null;
    private $apellidos = null;
    private $correo = null;
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
		if($this->validatePassword($value)){
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
    public function setCorreo($value){
        if($this->validateAlphanumeric($value, 1, 50)){
            $this->correo = $value;
            return true;
        }else{
            return false;
        }
    }
    public function getCorreo(){
        return $this->correo;
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
		$sql = "SELECT contraseña FROM usuarios WHERE id_usuario = ?";
		$params = array($this->id);
		$data = Database::getRow($sql, $params);
        if($data)
        {
            if(strlen($data['contraseña']) == 60)
            {
                if(password_verify($this->clave, $data['contraseña']))
                {
                    return true;
                }
                else
                {
                    return false;
                }
            }
            else
            {
                if($this->clave == $data['contraseña'])
                {
                    $this->clave = $data['contraseña'];
                    return true;
                }
                else
                {
                    return false;
                }                
            }			
        }
        else
        {
			return false;
		}
    }

    public function encryptContraseña()
    {
        $hash = password_hash($this->clave, PASSWORD_DEFAULT);
        $sql = "UPDATE usuarios SET contraseña = ? WHERE id_usuario= ?";
        $params = array($hash, $this->id);
        return Database::executeRow($sql, $params);
    }

    public function logOut(){
		return session_destroy();
	}
    //Metodos para manejar el CRUD
    public function getUsuarios(){
        $sql = "SELECT id_usuario, nombres, apellidos, tipo_usuario, usuario, correo FROM usuarios INNER JOIN tipo_usuario USING(id_tipo)";
        $params = array(null);
        return Database::getRows($sql, $params);
    }
    public function readUsuario(){
        $sql = "SELECT id_usuario, t.tipo_usuario, usuario, contraseña FROM usuarios INNER JOIN tipo_usuario t USING (id_tipo) WHERE id_usuario = ?";
        $params = array($this->id);
        $usuario = Database::getRow($sql, $params);
        if($usuario){
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
    public function getCorreos()
    {
        $sql = "SELECT correo FROM usuarios";
        $params = array(null);
        return Database::getRows($sql, $params);
    }

    public function createAdmin()
    {
        $hash = password_hash($this->clave, PASSWORD_DEFAULT);
        $sql = "INSERT INTO usuarios(nombres, apellidos, id_tipo, usuario, contraseña, correo) VALUES (?, ?, ?, ?, ?, ?)";
        $params = array($this->nombres, $this->apellidos, $this->tipo, $this->usuario, $hash, $this->correo);
        return Database::executeRow($sql, $params); 
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
    $sql = "SELECT tipo_usuario, nombres, apellidos, usuario, correo FROM usuarios INNER JOIN tipo_usuario USING(id_tipo)ORDER BY tipo_usuario "; 
    $params = array(null);
    return Database::getRows($sql, $params);

}
    //CONSULTAS PARA REPORTES
    public function getInformacion(){
        $sql = "SELECT id_usuario, nombres, apellidos, id_tipo, usuario, nombres, apellidos FROM usuarios WHERE id_usuario = ?";
        $params = array($this->id);
        $usuario = Database::getRows($sql, $params);
        if($usuario){
            $this->id = usuario['id_usuario'];
            $this->usuario = usuario['usuario'];
            $this->nombres = usuario['nombres'];
            $this->apellidos = usuario['apellidos'];
        }
    }

}
?>