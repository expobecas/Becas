<?php
class Patrocinadores extends Validator{
    /*DATOS DE LOS PATROCINADORES*/
    private $id_patrocinador = null;
    private $tipo = null;
    private $profesion = null;
    private $nombres = null;
    private $apellidos = null;
    private $cargo = null;
    private $nombre_empresa = null;
    private $direccion = null;
    private $telefono = null;
    private $tipo2 = null;

    /*SET & GET PATROCINADORES*/
    public function setId_patrocinador($value)
    {
        if($this->validateId($value))
        {
            $this->id_patrocinador = $value;
            return true;
        }
        else
        {
            return false;
        }
    }
    public function getId_patrocinador()
    {
        return $this->id_patrocinador;
    }
    public function setTipo($value)
    {
        if($this->validateId($value))
        {
            $this->tipo = $value;
            return true;
        }
        else
        {
            return false;
        }
    }
    public function getTipo()
    {
        return $this->tipo;
    }
    public function setProfesion($value)
    {
        if($this->validateAlphanumeric($value, 1, 30))
        {
            $this->profesion = $value;
            return true;
        }
        else
        {
            return false;
        }
    }
    public function getProfesion()
    {
        return $this->profesion;
    }
    public function setNombres($value)
    {
        if($this->validateAlphanumeric($value, 1, 30))
        {
            $this->nombres = $value;
            return true;
        }
        else
        {
            return false;
        }
    }
    public function getNombres()
    {
        return $this->nombres;
    }
    public function setApellidos($value)
    {
        if($this->validateAlphanumeric($value, 1, 30))
        {
            $this->apellidos = $value;
            return true;
        }
        else
        {
            return false;
        }
    }
    public function getApellidos()
    {
        return $this->apellidos;
    }
    public function setCargo($value)
    {
        if($this->validateAlphanumeric($value, 1, 30))
        {
            $this->cargo = $value;
            return true;
        }
        else
        {
            return false;
        }
    }
    public function getCargo()
    {
        return $this->cargo;
    }
    public function setNombre_empresa($value)
    {
        if($this->validateAlphanumeric($value, 1, 30))
        {
            $this->nombre_empresa = $value;
            return true;
        }
        else
        {
            return false;
        }
    }
    public function getNombre_empresa()
    {
        return $this->nombre_empresa;
    }
    public function setDireccion($value)
    {
        if($this->validateAlphanumeric($value, 1, 50))
        {
            $this->direccion = $value;
            return true;
        }
        else
        {
            return false;
        }
    }
    public function getDireccion()
    {
        return $this->direccion;
    }
    public function setTelefono($value)
    {
        if($this->validateAlphanumeric($value, 1, 50))
        {
            $this->telefono = $value;
            return true;
        }
        else
        {
            return false;
        }
    }
    public function getTelefono()
    {
        return $this->telefono;
    }
    public function setTipo2($value)
    {
        if($this->validateId($value))
        {
            $this->tipo2 = $value;
            return true;
        }
        else
        {
            return false;
        }
    }
    public function getTipo2()
    {
        return $this->tipo2;
    }

    //METODOS PARA MANEJAR EL CRUD
    public function getPatrocinadores(){
        $sql = "SELECT id_patrocinador, tipo_patrocinador, profesion, nombres, apellidos, cargo, nombre_empresa, direccion, telefono FROM patrocinadores INNER JOIN tipo_patrocinador USING(id_tipo_patro)";
        $params = array(null);
        return Database::getRows($sql, $params);
    }
    public function getCategorias(){
        $sql = "SELECT id_tipo_patro, tipo_patrocinador FROM tipo_patrocinador";
        $params = array(null);
        return Database::getRows($sql, $params);
    }
    public function CreatePatrocinadores(){
        $sql = "INSERT INTO patrocinadores(id_tipo_patro, profesion, nombres, apellidos, cargo, nombre_empresa, direccion, telefono) VALUES(?, ?, ?, ?, ?, ?, ?, ?)";
        $params = array($this->tipo, $this->profesion, $this->nombres, $this->apellidos,$this->cargo, $this->nombre_empresa, $this->direccion, $this->telefono);
        return Database::executeRow($sql, $params);   
    }
    public function UpdatePatrocinadores(){
        $sql = "UPDATE patrocinadores SET id_tipo_patro = ?, profesion = ?, nombres = ?, apellidos = ?, cargo = ?, nombre_empresa = ?, direccion = ?, telefono = ? WHERE id_patrocinador = ?";
        $params = array($this->tipo, $this->profesion, $this->nombres, $this->apellidos,$this->cargo, $this->nombre_empresa, $this->direccion, $this->telefono, $this->id_patrocinador);
        return Database::executeRow($sql, $params);
    }
    public function ReadPatrocinadores(){
        $sql = "SELECT id_patrocinador, id_tipo_patro, tipo_patrocinador, profesion, nombres, apellidos, cargo, nombre_empresa, direccion, telefono FROM patrocinadores INNER JOIN tipo_patrocinador USING(id_tipo_patro) WHERE id_patrocinador = ?";
        $params = array($this->id_patrocinador);
        $patrocinadores = Database::getRow($sql, $params);
        if($patrocinadores){
            $this->id_patrocinador = $patrocinadores['id_patrocinador'];
            $this->tipo = $patrocinadores['id_tipo_patro'];
            $this->tipo2 = $patrocinadores['tipo_patrocinador'];
            $this->profesion = $patrocinadores['profesion'];
            $this->nombres = $patrocinadores['nombres'];
            $this->apellidos = $patrocinadores['apellidos'];
            $this->cargo = $patrocinadores['cargo'];
            $this->nombre_empresa = $patrocinadores['nombre_empresa'];
            $this->direccion = $patrocinadores['direccion'];
            $this->telefono = $patrocinadores['telefono'];
            return true;
        }else{
            return null;
        }
    }
    public function EliminarPatrocinador(){
        $sql = "DELETE FROM patrocinadores WHERE id_patrocinador = ?";
        $params = array($this->id_patrocinador);
        return Database::executeRow($sql, $params);
    }

    //CONSULTAS PARA REPORTES
    public function BecasCorrespondientes(){
        $sql = "SELECT n_carnet, primer_nombre, segundo_nombre, primer_apellido, segundo_apellido, grado, monto, periodo_pago,  estado_solicitud FROM detalle_solicitud INNER JOIN solicitud USING(id_solicitud) INNER JOIN estado_solicitud USING(id_estado) INNER JOIN becas ON detalle_solicitud.id_detalle = becas.id_detalle INNER JOIN estudiantes ON solicitud.id_estudiante = estudiantes.id_estudiante WHERE becas.id_patrocinador = ?";
        $params = array($this->id_patrocinador);
        return Database::getRows($sql, $params);

    }   
        public function getTipoPa(){
            $sql = "SELECT id_patrocinador, tipo_patrocinador, profesion, nombres, apellidos, cargo, nombre_empresa, direccion, telefono FROM patrocinadores INNER JOIN tipo_patrocinador USING(id_tipo_patro) WHERE id_tipo_patro = 1";
            $params = array(null);
            return Database::getRows($sql, $params);
        }   
        public function getTipoPa2(){
            $sql = "SELECT id_patrocinador, tipo_patrocinador, profesion, nombres, apellidos, cargo, nombre_empresa, direccion, telefono FROM patrocinadores INNER JOIN tipo_patrocinador USING(id_tipo_patro) WHERE id_tipo_patro = 2";
            $params = array(null);
            return Database::getRows($sql, $params);
        }   
        public function getTipoPa3(){
            $sql = "SELECT id_patrocinador, tipo_patrocinador, profesion, nombres, apellidos, cargo, nombre_empresa, direccion, telefono FROM patrocinadores INNER JOIN tipo_patrocinador USING(id_tipo_patro) WHERE id_tipo_patro = 3";
            $params = array(null);
            return Database::getRows($sql, $params);
       
    }
}
?>