<?php

class Propiedad extends Validator
{
    private $id_propiedad = null;
    private $tipo_propiedad = null;
    private $cuota_mensual = null;
    private $valor_casa = null;

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

    public function setTipoPropiedad($value)
    {
        if($this->validateAlphanumeric($value, 1, 20))
        {
            $this->tipo_propiedad = $value;
            return true;
        }
        else
        {
            return false;
        }
    }
    public function getTipoPropiedad()
    {
        return $this->tipo_propiedad;
    }

    public function setCuotaMensual($value)
    {
        if($this->validateMoney($value))
        {
            $this->cuota_mensual = $value;
            return true;
        }
        else
        {
            return false;
        }
    }
    public function getCuotaMensual()
    {
        return $this->cuota_mensual;
    }
    
    public function setValorCasa($value)
    {
        if($this->validateMoney($value))
        {
            $this->valor_casa = $value;
            return true;
        }
        else
        {
            return false;
        }
    }
    public function getValorCasa()
    {
        return $this->valor_casa;
    }    
    //Metodos para el mantenimiento SCRUD
    public function createPropiedad()
    {
        $sql = "INSERT INTO propiedad(tipo_propiedad, cuota_mensual, valor_casa) VALUES(?, ?, ?)";
        $params = array($this->tipo_propiedad, $this->cuota_mensual, $this->valor_casa);
        $propiedad = Database::executeRow($sql, $params);
        if($propiedad)
        {
            $this->id_propiedad = Database::getLastRowId();
        }
    }
}
?>