<?php

class Intermedia_propiedad extends Validator
{
    private $id_inter = null;
    private $id_integrante = null;
    private $id_propiedad = null;

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
}
?>