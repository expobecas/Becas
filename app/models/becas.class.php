<?php
class Becas extends Validator {
    //DATOS DE LA TABLA BECAS
     private $id = null;
     private $detalle = null;
     private $patrocinador = null;
     private $monto = null;
     private $periodo_pago = null;
     private $fecha_inicio = null;
     private $nombre1 = null;
     private $nombre2 = null;
     private $apellido1 = null;
     private $apellido2 = null;
     private $num_carnet = null;
     private $grado = null;
     private $nombres = null;
     private $apellidos = null;
     private $cargo = null;
     private $nombre_empresa = null;
     private $direccion = null;
     private $religion = null;
     private $encargado = null;
     private $telefono = null;

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
            $this->id = $value;
            return true;
        }else{
            return false;
        }
    }
    public function getMonto(){
        return $this->monto;
    }
    
    public function setPeriodo_pago(){
        if($this->validateAlphanumeric($value, 1, 50)){
            $this->perido_pago = $value;
            return true;
        }else{
            return false;
        }
    }
    public function getPeriodo_pago(){
        return $this->periodo_pago;
    }

    public function setFecha_inicio(){
        if($this->validateAlphanumeric($value, 1, 50)){
            $this->fecha_inicio = $value;
            return true;
        }else{
            return false;
        }
    }
    public function getFecha_inicio(){
        return $this->fecha_inicio;
    }
        //ESTUDIANTE
        public function getNombre1(){
            return $this->nombre1;
        }
        public function getNombre2(){
            return $this->nombre2;
        }
        public function getApellido1(){
            return $this->apellido1;
        }
        public function getApellido2(){
            return $this->apellido2;
        }
        public function getNum_carnet(){
            return $this->num_carnet;
        }
        public function getGrado(){
            return $this->grado;
        }
        public function getDireccion()
        {
            return $this->direccion;
        }
        //PATROCINADOR
        public function getNombres()
        {
            return $this->nombres;
        }
        public function getApellidos()
        {
            return $this->apellidos;
        }
         public function getNombre_empresa()
        {
            return $this->nombre_empresa;
        }
        public function getReligion()
        {
            return $this->religion;
        }
        public function getEncargado()
        {
            return $this->encargado;
        }
        public function getTelefono()
        {
            return $this->telefono;
        }

    //METODOS PARA EL CRUD
    public function getBecas(){
        $sql = "SELECT id_becas, n_carnet, primer_nombre, segundo_nombre, primer_apellido, segundo_apellido, grado, monto, periodo_pago, estado_solicitud FROM detalle_solicitud INNER JOIN solicitud USING(id_solicitud) INNER JOIN estado_solicitud USING(id_estado) INNER JOIN becas ON detalle_solicitud.id_detalle = becas.id_detalle INNER JOIN estudiantes ON solicitud.id_estudiante = estudiantes.id_estudiante";
        $params = array(null);
        return Database::getRows($sql, $params);
    }

        public function getBecas2(){
            $sql = "SELECT id_becas, id_detalle, p.nombre_empresa, monto, periodo_pago, fecha_ini_beca FROM becas INNER JOIN patrocinadores p USING(id_patrocinador) INNER JOIN detalle_solicitud USING(id_detalle) "; 
            $params = array($this->id);
            return Database::getRows($sql, $params);
        }
    
        public function getPatrocinadores(){
            $sql = "SELECT id_patrocinador, nombre_empresa FROM patrocinadores";
            $params = array(null);
            return Database::getRow($sql, $params);	
       }
       public function getDetalles(){
        $sql = "SELECT id_detalle, id_solicitud  FROM detalle_solicitud ";
        $params = array(null);
        return Database::getRow($sql, $params);	
    }
    
        public function readBecas(){
            $sql = "SELECT id_becas, id_detalle, id_patrocinador ,monto, periodo_pago, fecha_ini_beca FROM becas INNER JOIN patrocinadores USING(id_patrocinador) INNER JOIN detalle_solicitud USING(id_detalle) ";
            $params = array($this->id);
            $becas = Database::getRow($sql, $params);
            if($becas){
                $this->detalle = $becas['id_detalle'];
                $this->patrocinador = $becas['id_patrocinador'];
                $this->monto = $becas['monto'];
                $this->periodo = $becas['periodo_pago'];
                $this->fecha = $becas['fecha_ini_beca'];
                return true;
            }else{
                return null;
            }
        }
        public function createBecas(){
            $sql = "INSERT INTO becas (id_detalle, id_patrocinador, monto, periodo_pago, fecha_ini_beca)
            VALUES (?,?,?,?,?)";
            $params = array($this->detalle, $this->patrocinador,$this->monto, $this->periodo, $this->fecha);
            return Database::executeRow($sql, $params);   
        }
            public function updateBecas(){
                $sql = "UPDATE becas SET id_detalle= ?, id_patrocinador= ?, monto= ?, periodo_pago= ?, fecha_ini_beca= ? WHERE id_becas = ?";
                $params = array($this->detalle, $this->patrocinador,$this->monto, $this->periodo,$this->fecha, $this->id);
                return Database::executeRow($sql, $params);
            
        }
        public function getTotal(){
            $sql = "SELECT estudiantes.primer_nombre, estudiantes.primer_apellido, estudiantes.n_carnet, becas.monto, becas.periodo_pago, becas.fecha_ini_beca FROM becas INNER JOIN detalle_solicitud ON becas.id_detalle = detalle_solicitud.id_detalle INNER JOIN solicitud ON detalle_solicitud.id_solicitud = solicitud.id_solicitud INNER JOIN estudiantes ON solicitud.id_estudiante = estudiantes.id_estudiante INNER JOIN patrocinadores ON patrocinadores.id_patrocinador = becas.id_patrocinador INNER JOIN usuarios ON usuarios.id_usuario = patrocinadores.id_usuario WHERE usuarios.id_usuario = ?";
            $params = array($_SESSION['id_usuario']);
            return Database::getRows($sql, $params);
        }
        public function getDetallebecas(){
            $sql = "SELECT becas.id_becas, n_carnet, primer_nombre, segundo_nombre, primer_apellido, segundo_apellido, religion, encargado, solicitud.direccion, tel_fijo, grado, monto, periodo_pago, nombres, apellidos, nombre_empresa FROM detalle_solicitud INNER JOIN solicitud USING(id_solicitud) INNER JOIN estado_solicitud USING(id_estado) INNER JOIN becas ON detalle_solicitud.id_detalle = becas.id_detalle INNER JOIN estudiantes ON solicitud.id_estudiante = estudiantes.id_estudiante INNER JOIN patrocinadores ON becas.id_patrocinador = patrocinadores.id_patrocinador WHERE becas.id_becas = ?";
            $params = array($this->id);
            $detalle = Database::getRow($sql, $params);
            if($detalle){
                $this->id = $detalle['id_becas'];
                $this->num_carnet = $detalle['n_carnet'];
                $this->nombre1 = $detalle['primer_nombre'];
                $this->nombre2 = $detalle['segundo_nombre'];
                $this->apellido1 = $detalle['primer_apellido'];
                $this->apellido2 = $detalle['segundo_apellido'];
                $this->religion = $detalle['religion'];
                $this->encargado = $detalle['encargado'];
                $this->direccion = $detalle['direccion'];
                $this->telefono = $detalle['tel_fijo'];
                $this->grado = $detalle['grado'];
                $this->monto = $detalle['monto'];
                $this->periodo_pago = $detalle['periodo_pago'];
                $this->nombres = $detalle['nombres'];
                $this->apellidos = $detalle['apellidos'];
                $this->nombre_empresa = $detalle['nombre_empresa'];
                return true;
            }else{
                return null;
            }
        }
    }
?>