<?php

class Institucion_Proveniente extends Validator
{
    private $id_institucion_proveniente = null;
    private $nombre_institucion = null;
    private $lugar_institucion = null;
    private $cuota_pagaba = null;
    private $año = null;

    public function setIdInstitucion($value)
    {
        if($this->validateId($value))
        {
            $this->id_institucion_proveniente = $value;
            return true;
        }
        else
        {
            return false;
        }
    }
    public function getIdInstitucion()
    {
        return $this->id_institucion_proveniente;
    }

    public function setNombre($value)
    {
        if($this->validateAlphanumeric($value, 1, 60))
        {
            $this->nombre_institucion = $value;
            return true;
        }
        else
        {
            return false;
        }
    }
    public function getNombre()
    {
        return $this->nombre_institucion;
    }

    public function setLugar($value)
    {
        if($this->validateAlphanumeric($value, 1, 60))
        {
            $this->lugar_institucion = $value;
            return true;
        }
        else
        {
            return false;
        }
    }
    public function getLugar()
    {
        return $this->lugar_institucion;
    }

    public function setCuotaPagaba($value)
    {
        if($this->validateMoney($value))
        {
            $this->cuota_pagaba = $value;
            return true;
        }
        else
        {
            return false;
        }
    }
    public function getCuotaPagaba()
    {
        return $this->cuota_pagaba;
    }

    public function setAño($value)
    {
        if($this->validateAlphanumeric($value, 1, 20))
        {
            $this->anio = $value;
            return true;
        }
        else
        {
            return false;
        }
    }
    public function getAño()
    {
        return $this->anio;
    }

    //Metodos para el manejo de SCRUD
    public function createInstitucion($nombre_institucion, $lugar_institucion, $cuota_pagaba, $año)
    {
        $sql = "INSERT INTO institucion_proveniente(nombre_institucion, lugar_institucion, cuota_pagada, año) VALUES(?, ?, ?, ?)";
        $params = array($nombre_institucion, $lugar_institucion, $cuota_pagaba, $año);
        return Database::executeRow($sql, $params);
    }
}
?>