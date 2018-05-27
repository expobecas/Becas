<?php
class Remesa_familiar extends Validator
{
    private $id_remesa = null;
    private $monto = null;
    private $periodo_recibido = null;
    private $benefactor = null;
    private $id_familia = null;

    public function setIdRemesa()
    {
        if($this->validateId($value))
        {
            $this->id_remesa = $value;
            return true;
        }
        else
        {
            return false;
        }
    }
    public function getIdRemesa()
    {
        return $this->id_remesa;
    }

    public function setMonto()
    {
        if($this->validateMoney($value))
        {
            $this->monto = $value;
            return true;
        }
        else
        {
            return false;
        }
    }
    public function getMonto()
    {
        return $this->monto;
    }

    public function setPeriodoRecibido()
    {
        if($this->validateId($value))
        {
            $this->periodo_recibido = $value;
            return true;
        }
        else
        {
            return false;
        }
    }
    public function getPeriodoRecibido()
    {
        return $this->periodo_recibido;
    }

    public function setBenefactor()
    {
        if($this->validateId($value))
        {
            $this->benefactor = $value;
            return true;
        }
        else
        {
            return false;
        }
    }
    public function getBenefactor()
    {
        return $this->benefactor;
    }

    public function setIdFamilia()
    {
        if($this->validateId($value))
        {
            $this->id_familia = $value;
            return true;
        }
        else
        {
            return false;
        }
    }
    public function getIdFamilia()
    {
        return $this->id_familia;
    }
}
?>