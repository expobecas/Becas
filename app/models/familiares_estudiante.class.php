<?php

class Familiares_estudiante extends Validator
{
    private $id_fam_estudiante = null;
    private $depende = null;
    private $grado = null;
    private $institucion = null;
    private $cuota = null;

    public function setIdFamEstudiante($value)
    {
        if($this->validateId($value))
        {
            $this->id_fam_estudiante = $value;
            return true;
        }
        else
        {
            return false;
        }
    }
    public function getIdFamEstudiante()
    {
        return $this->id_fam_estudiante;
    }

    public function setDepende($value)
    {
        if($this->validateAlphanumeric($value, 1, 10))
        {
            $this->depende = $value;
            return true;
        }
        else
        {
            return false;
        }
    }
    public function getDepende()
    {
        return $this->depende;
    }

    public function setGrado($value)
    {
        if($this->validateAlphanumeric($value, 1, 40))
        {
            $this->grado = $value;
            return true;
        }
        else
        {
            return false;
        }
    }
    public function getGrado()
    {
        return $this->grado;
    }

    public function setInstitucion($value)
    {
        if($this->validateAlphanumeric($value, 1, 50))
        {
            $this->institucion = $value;
            return true;
        }
        else
        {
            return false;
        }
    }
    public function getInstitucion()
    {
        return $this->institucion;
    }

    public function setCuota($value)
    {
        if($this->validateMoney($value))
        {
            $this->cuota = $value;
            return true;
        }
        else
        {
            return false;
        }
    }
    public function getCuota()
    {
        return $this->cuota;
    }
}

?>