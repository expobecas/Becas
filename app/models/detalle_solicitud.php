<?php

class Detalle_slicitud Extends Validator
{
    private $id_detalle = null;
    private $id_estado = null;
    private $id_solicitud = null;

    public function setIdDetalle($value)
    {
        if($this->validateId($value))
        {
            $this->id_detalle = $value;
            return true;
        }
        else
        {
            return false;
        }
    }
    public function getIdDetalle()
    {
        return $this->id_detalle;
    }

    public function setIdEstado($value)
    {
        if($this->validateId($value))
        {
            $this->id_estado = $value;
            return true;
        }
        else
        {
            return false;
        }
    }
    public function getIdEstado()
    {
        return $this->id_estado;
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

    //Metodos para el matenimiento del SCRUD
    public function createDetalle()
    {
        $sql = "";
        $params = array();
        return Database::executeRow($sql, $params);
    }
}
?>