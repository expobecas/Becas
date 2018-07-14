<?php
class Solicitud2 extends Validator {
    
    /* DATOS DE LA SOLICITUD*/
    private $encargado = null;
    private $tel_fijo = null;
    
    /*DATOS DE EL ESTUDIANTE*/
    private $nombre1_es = null;
    private $apellido1_es = null;
    private $carnet = null;
    private $grado = null;
    private $especialidad = null;
    
    /*SET & GET DE LA SOLICITUD*/
    public function setEncargado($value) {
        if ($this->validateAlphabetic($value, 1, 30)) {
            $this->encargado = $value;
            return true;
        } else {
            return false;
        }
    }
    public function getEncargado() {
        return $this->encargado;
    }
    
    public function setTelFijo($value) {
        if ($this->validateId($value)) {
            $this->tel_fijo = $value;
            return true;
        } else {
            return false;
        }
    }
    public function getTelFijo() {
        return $this->tel_fijo;
    }
    
    /*SET & GET DE INFORMACIÓN DEL ESTUDIANTE */
    
    public function setNombre1_es($value) {
        if ($this->validateAlphanumeric($value)) {
            $this->nombre1_es = $value;
            return true;
        } else {
            return false;
        }
    }
    public function getNombre1_es() {
        return $this->nombre1_es;
    }
    public function setApellido1_es($value) {
        if ($this->validateAlphanumeric($value)) {
            $this->apellido1_es = $value;
            return true;
        } else {
            return false;
        }
    }
    public function getApellido1_es() {
        return $this->apellido1_es;
    }
    public function setCarnet($value) {
        if ($this->validateAlphanumeric($value)) {
            $this->carnet = $value;
            return true;
        } else {
            return false;
        }
    }
    public function getCarnet() {
        return $this->carnet;
    }
    public function setGrado($value) {
        if ($this->validateAlphanumeric($value)) {
            $this->grado = $value;
            return true;
        } else {
            return false;
        }
    }
    public function getGrado() {
        return $this->grado;
    }
    public function setEspecialidad($value) {
        if ($this->validateAlphanumeric($value)) {
            $this->especialidad = $value;
            return true;
        } else {
            return false;
        }
    }
    public function getEspecialidad($value) {
        return $this->especialidad;
    }
    
    /*METODOS PARA EL MANEJO DE EL CRUD (MOSTRAR Y EDICION DE SOLICITUD - DASHBOARD)*/
    
    /*VISTA DE TABLAS - INDEX VIEW*/
    public function getVistageneral() {
        $sql    = "SELECT solicitud.id_solicitud, primer_nombre, primer_apellido, n_carnet, grado, especialidad, encargado, tel_fijo, detalle_solicitud.id_detalle FROM solicitud INNER JOIN estudiantes USING(id_estudiante) INNER JOIN detalle_solicitud ON detalle_solicitud.id_solicitud = solicitud.id_solicitud";
        $params = array(
            null
        );
        return Database::getRows($sql, $params);
    }
    public function getUltimasSol() {
        $sql    = "SELECT solicitud.id_solicitud, primer_nombre, primer_apellido, n_carnet, grado, especialidad, encargado, tel_fijo FROM solicitud INNER JOIN estudiantes USING(id_estudiante) ORDER BY solicitud.id_solicitud ASC";
        $params = array(
            null
        );
        return Database::getRows($sql, $params);
    }
    /*DETALLE DE LA SOLICITUD (PARTES)*/
    
    /*INFORMACIÓN DEL ESTUDIANTE*/
    
}
?> 