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

    public function setMonto($value)
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

    public function setPeriodoRecibido($value)
    {
        if($this->validateAlphanumeric($value, 0, 25))
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

    public function setBenefactor($value)
    {
        if($this->validateAlphanumeric($value, 0, 50))
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

    public function setIdFamilia($value)
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

    //Metodos para el manejo del SCRUD
    public function getFamilia()
    {
        $sql = "SELECT id_familia FROM grupo_familiar ORDER BY id_familia DESC LIMIT 1";
        $params = array(null);
        return Database::getRow($sql, $params);
    }

    public function createRemesa()
    {
        $sql = "INSERT INTO remesas_familiar(monto, periodo_recibido, benefactor, id_familia) VALUES(?, ?, ?, ?)";
        $params = array($this->monto, $this->periodo_recibido, $this->benefactor, $this->id_familia);
        return Database::executeRow($sql, $params);
    }
}
?>