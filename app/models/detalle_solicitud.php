<?php

class Detalle_solicitud Extends Validator
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

    public function getIdDetalles()
    {
        $sql = "SELECT id_detalle FROM citas WHERE id = ?";
        $params = array($this->id_solicitud);
        return Database::getRow($sql, $params);
    }
    
    public function createDetalle()
    {
        $sql = "INSERT INTO detalle_solicitud(id_estado, id_solicitud) VALUES (?, ?)";
        $params = array($this->id_estado, $this->id_solicitud);
        print_r($params);
        return Database::executeRow($sql, $params);
    }

    public function updateDetalleSolicitud()
    {
        $sql = "UPDATE detalle_solicitud SET id_estado = ? WHERE id_detalle = ?";
        $params = array($this->id_estado, $this->id_detalle);
        return Database::executeRow($sql, $params);
    }
}
?>