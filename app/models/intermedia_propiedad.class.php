<?php

class Intermedia_propiedad extends Validator
{
    private $id_inter = null;
    private $id_integrante = null;
    private $id_propiedad = null;
    private $id_solicitud = null;

    public function setIdInter($value)
    {
        if($this->validateId($value))
        {
            $this->id_inter = $value;
            return true;
        }
        else
        {
            return false;
        }
    }
    public function getInInter()
    {
        return $this->id_inter;
    }

    public function setIdIntegrante($value)
    {
        if($this->validateId($value))
        {
            $this->id_integrante = $value;
            return true;
        }
        else
        {
            return false;
        }
    }
    public function getIdIntegrante()
    {
        return $this->id_integrante;
    }

    public function setIdPropiedad($value)
    {
        if($this->validateId($value))
        {
            $this->id_propiedad = $value;
            return true;
        }
        else
        {
            return false;
        }
    }
    public function getIdPropiedad()
    {
        return $this->id_propiedad;
    }

    public function setIdSolicitud($value)
    {
        if($this->validateId($value))
        {
            $this->id_solicitud = $value;
            return true;
        }
        else
        {
            return false;
        }
    }
    public function getIdSolicitud()
    {
        return $this->id_solicitud;
    }

    //Metodos para el manejo del SCRUD
    public function getSolicitud()
    {
        $sql = "SELECT id_solicitud FROM solicitud ORDER BY id_solicitud DESC LIMIT 1";
        $params = array(null);
        return Database::getRow($sql, $params);
    }

    public function getIntegrantes()
    {
        $sql = "SELECT id_integrante FROM integrante_familia WHERE id_solicitud = ?";
        $params = array($this->id_solicitud);
        return Database::getRows($sql, $params);
    }

    public function getPropiedad()
    {
        $sql = "SELECT id_propiedad FROM propiedad ORDER BY id_propiedad DESC LIMIT 1";
        $params = array(null);
        return Database::getRow($sql, $params);
    }

    public function createInterPropiedad()
    {
        $sql = "INSERT INTO intermedia_propiedad(id_integrante, id_propiedad) VALUES (?, ?)";
        $params = array($this->id_integrante, $this->id_propiedad);
        return Database::executeRow($sql, $params);
    }
}
?>