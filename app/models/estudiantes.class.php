<?php 
class Estudiantes extends Validator{
    private $id = null;
    private $nombre1 = null;
    private $nombre2 = null;
    private $apellido1 = null;
    private $apellido2 = null;
    private $usuario = null;
    private $contraseña = null;
    private $num_carnet = null;
    private $grado = null;
    private $especialidad = null;
    private $intentos = null;
    private $estado_sesion = null;
    private $fecha_contraseña = null;
    private $estado = null;

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
    public function setNombre1($value){
        if($this->validateAlphanumeric($value, 1, 50)){
            $this->nombre1 = $value;
            return true;
        }else{
            return false;
        }
    }
    public function getNombre1(){
        return $this->nombre1;
    }
    public function setNombre2($value){
        if($this->validateAlphanumeric($value, 1, 50)){
            $this->nombre2 = $value;
            return true;
        }else{
            return false;
        }
    }
    public function getNombre2(){
        return $this->nombre2;
    }
    public function setApellido1($value){
        if($this->validateAlphanumeric($value, 1, 50)){
            $this->apellido1 = $value;
            return true;
        }else{
            return $this->apellido1;
        }
    }
    public function getApellido1(){
        return $this->apellido1;
    }
    public function setApellido2($value){
        if($this->validateAlphanumeric($value, 1, 50)){
            $this->apellido2 = $value;
            return true;
        }else{
            return $this->apellido2;
        }
    }
    public function getApellido2(){
        return $this->apellido2;
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
    public function setContraseña($value){
        if($this->validateAlphanumeric($value, 1, 60)){
            $this->contraseña = $value;
            return true;
        }else{
            return false;
        }
    }
    public function getContraseña(){
        return $this->contraseña;
    }
    public function setNum_carnet($value){
        if($this->validateAlphanumeric($value, 1, 50)){
            $this->num_carnet = $value;
            return true;
        }else{
            return $this->num_carnet;
        }
    }
    public function getNum_carnet(){
        return $this->num_carnet;
    }
    public function setGrado($value){
        if($this->validateAlphanumeric($value, 1, 50)){
            $this->grado = $value;
            return true;
        }else{
            return false;
        }
    }
    public function getGrado(){
		return $this->grado;
    }
    public function setEspecialidad($value){
        if($this->validateAlphanumeric($value, 1, 50)){
            $this->especialidad = $value;
            return true;
        }else{
            return false;
        }
    }
    public function getEspecialidad(){
        return $this->especialidad;
    }

    public function setIntentos($value)
    {
        if($this->validateId($value))
        {
            $this->intentos = $value;
            return true;
        }
        else
        {
            return false;
        }
    }
    public function getIntentos()
    {
        return $this->intentos;
    }

    public function setEstadoSesion($value)
    {
        if($this->validateId($value))
        {
            $this->estado_sesion = $value;
            return true;
        }
        else
        {
            return false;
        }
    }
    public function getEstadoSesion()
    {
        return $this->estado_sesion;
    }

    public function setFechaContraseña($value)
    {
      if($this->validateAlphanumeric($value, 1, 60))
      {
          $this->fecha_contraseña = $value;
          return true;
      }
      else
      {
          return false;
      }
    }
    public function getFechaContraseña()
    {
        return $this->fecha_contraseña;
    }

    public function setEstado($value)
    {
        if($this->validateId($value))
        {
            $this->estado = $value;
            return true;
        }
        else
        {
            return false;
        }
    }
    public function getEstado()
    {
        return $this->estado;
    }

    //VERIFICACIÓN 
    public function checkAlumno(){
        $sql = "SELECT id_estudiante, fecha_contraseña, intentos, estado, estado_sesion FROM estudiantes WHERE usuario = ?";
        $params = array($this->usuario);
        $data = Database::getRow($sql, $params);
        if($data){
            $this->id = $data['id_estudiante'];
            $this->fecha_contraseña = $data['fecha_contraseña'];
            $this->intentos = $data['intentos'];
            $this->estado = $data['estado'];
            $this->estado_sesion = $data['estado_sesion'];
            return true;
        }
        else
        {
            return false;
        }
    }
    public function checkClave(){
        $sql = "SELECT contraseña FROM estudiantes WHERE id_estudiante = ?";
        $params = array($this->id);
        $data = Database::getRow($sql, $params);
        if($data)
        {
            if(strlen($data['contraseña']) == 60)
            {
                if(password_verify($this->contraseña, $data['contraseña']))
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
                if($this->contraseña == $data['contraseña'])
                {
                    $this->contraseña = $data['contraseña'];
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
        $hash = password_hash($this->contraseña, PASSWORD_DEFAULT);
        $sql = "UPDATE estudiantes SET contraseña = ? WHERE id_estudiante = ?";
        $params = array($hash, $this->id);
        return Database::executeRow($sql, $params);
    }

    //Cada vez que se equivoque se actualizara los intentos en la base
    public function updateIntentos()
    {
        $sql = "UPDATE estudiantes SET intentos = ? WHERE id_estudiante = ?";
        $params = array($this->intentos, $this->id);
        return Database::executeRow($sql, $params);
    }

    public function resetIntentos()
    {
        $intentos = 0;
        $sql = "UPDATE estudiantes SET intentos = ? WHERE id_estudiante = ?";
        $params = array($intentos, $this->id);
        return Database::executeRow($sql, $params);
    }

    public function updateEstado()
    {
        $sql = "UPDATE estudiantes SET estado = ? WHERE id_estudiante = ?";
        $params = array($this->estado, $this->id);
        return Database::executeRow($sql, $params);
    }

    //Cuando los intentos sean 3 se bloqueará el usuario cambiandole el estado
    public function blockUsuario()
    {
        $intentos = 0;
        $fecha_contraseña = date("Y-m-d H:i:s");
        $sql = "UPDATE estudiantes SET intentos = ?, fecha_contraseña = ?, estado = ? WHERE id_estudiante = ?";
        $params = array($intentos, $fecha_contraseña, $this->estado, $this->id);
        print_r($params);
        return Database::executeRow($sql, $params);
    }

    public function updateEstadoSesion()
    {
        $sql = "UPDATE estudiantes SET estado_sesion = ? WHERE id_estudiante = ?";
        $params = array($this->estado_sesion, $this->id);
        return database::executeRow($sql, $params);
    }

    public function logOut(){
		return session_destroy();
	}

    //Metodos para manejar el CRUD
    public function getIdEstudiantes()
    {
        $sql = "SELECT id_estudiante FROM estudiantes";
        $params = array(null);
        return Database::getRows($sql, $params);
    }

    public function getEstudiantes(){
        $sql = "SELECT id_estudiante, primer_nombre, segundo_nombre, primer_apellido, segundo_apellido, usuario, contraseña, n_carnet, grado, especialidad FROM estudiantes";
        $params = array(null);
        return Database::getRows($sql, $params);
    }

    public function updateEstudiantes(){
		$sql = "UPDATE estudiantes SET primer_nombre= ?, segundo_nombre= ?, primer_apellido= ?, segundo_apellido= ?, usuario= ?, n_carnet= ?, grado= ?, especialidad= ? WHERE id_estudiante = ?";
		$params = array($this->nombre1, $this->nombre2,$this->apellido1, $this->apellido2, $this->usuario, $this->num_carnet, $this->grado, $this->especialidad, $this->id);
		return Database::executeRow($sql, $params);
	}
    public function createEstudiante(){
        $hash = password_hash($this->contraseña, PASSWORD_DEFAULT);
		$sql = "INSERT INTO estudiantes(primer_nombre, segundo_nombre , primer_apellido, segundo_apellido, usuario, contraseña, n_carnet, grado, especialidad) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
		$params = array($this->nombre1, $this->nombre2,$this->apellido1, $this->apellido2, $this->usuario, $hash, $this->num_carnet, $this->grado, $this->especialidad);
        return Database::executeRow($sql, $params);    
        
    }
    public function verificacion_carnet() {
        $sql = "SELECT * FROM estudiantes WHERE n_carnet =?";
        $params = array($this->num_carnet);
        return Database::getRows($sql, $params);
    }
    public function deleteEstudiante(){
		$sql = "DELETE FROM estudiantes WHERE id_estudiante = ?";
		$params = array($this->id);
		return Database::executeRow($sql, $params);
	}


    public function updatePerfil(){
        $sql = "UPDATE estudiantes SET usuario = ? WHERE id_estudiante = ?";
        $params = array($this->usuario, $this->id);
        return Database::executeRow($sql, $params);
    }
    public function readPerfil(){
        $sql = "SELECT id_estudiante, primer_nombre, segundo_nombre, primer_apellido, segundo_apellido, usuario, contraseña, n_carnet, grado, especialidad FROM estudiantes WHERE id_estudiante = ?";
        $params = array($this->id);
        $estudiantes = Database::getRow($sql, $params);
        if($estudiantes){
            $this->nombre1 = $estudiantes['primer_nombre'];
            $this->nombre2 = $estudiantes['segundo_nombre'];
            $this->apellido1 = $estudiantes['primer_apellido'];
            $this->apellido2 = $estudiantes['segundo_apellido'];
            $this->usuario = $estudiantes['usuario'];
            $this->contraseña = $estudiantes['contraseña'];
            $this->num_carnet = $estudiantes['n_carnet'];
            $this->grado = $estudiantes['grado'];
            $this->especialidad = $estudiantes['especialidad'];
            return true;
        }else{
            return false;
        }
    }
    public function GetDatosGenerales(){
        $sql="SELECT id_estudiante, primer_nombre, primer_apellido, n_carnet, grado, especialidad FROM estudiantes WHERE id_estudiante = ?";
        $params = array($_SESSION['id_estudiante']);
        $estudiantes = Database::getRow($sql, $params);
        if($estudiantes){
            $this->id = $estudiantes['id_estudiante'];
            $this->nombre1 = $estudiantes['primer_nombre'];
            $this->apellido1 = $estudiantes['primer_apellido'];
            $this->num_carnet = $estudiantes['n_carnet'];
            $this->grado = $estudiantes['grado'];
            $this->especialidad = $estudiantes['especialidad'];
        }
    }
}
?>