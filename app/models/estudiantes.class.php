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
        if($this->validateAlphanumeric($value, 1 ,50)){
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

    //VERIFICACIÓN 
    public function checkAlumno(){
        $sql = "SELECT id_estudiante FROM estudiantes WHERE usuario = ?";
        $params = array($this->usuario);
        $data = Database::getRow($sql, $params);
        if($data){
            $this->id = $data['id_estudiante'];
            return true;
        }else{
            return false;
        }
    }
    public function checkClave(){
        $sql = "SELECT contraseña FROM estudiantes WHERE id_estudiante = ?";
        $params = array($this->id);
        $data = Database::getRow($sql, $params);
        if($this->contraseña == $data['contraseña']){
            return true;
        }else{
            return false;
        }
    }
    public function logOut(){
		return session_destroy();
	}

    //Metodos para manejar el CRUD
    public function getEstudiantes(){
        $sql = "SELECT id_estudiante, primer_nombre, segundo_nombre, primer_apellido, segundo_apellido, usuario, contraseña, n_carnet, grado, especialidad FROM estudiantes";
        $params = array(null);
        return Database::getRows($sql, $params);
    }
    public function updatePerfil(){
        $sql = "UPDATE estudiantes SET usuario = ? WHERE id_estudiante = ?";
        $params = array($this->usuario, $this->id);
        return Database::executeRow($sql, $params);
    }
    public function readPerfil(){
        $sql = "SELECT id_estudiante, primer_nombre, segundo_nombre, primer_apellido, segundo_apellido, usuario, n_carnet, grado, especialidad FROM estudiantes WHERE id_estudiante = ?";
        $params = array($this->id);
        $estudiantes = Database::getRow($sql, $params);
        if($estudiantes){
            $this->nombre1 = $estudiantes['primer_nombre'];
            $this->nombre2 = $estudiantes['segundo_nombre'];
            $this->apellido1 = $estudiantes['primer_apellido'];
            $this->apellido2 = $estudiantes['segundo_apellido'];
            $this->usuario = $estudiantes['usuario'];
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