<?php

class Vehiculos extends Validator
{
    private $id_vehiculo = null;
    private $tipo_vehiculo = null;
    private $año = null;
    private $valor_actual = null;
    private $id_propiedad= null;

    public function setIdVehiculo($value)
    {
        if($this->validateId($value))
        {
            $this->id_vehiculo = $value;
            return true;
        }
        else
        {
            return false;
        }
    }
    public function getIdVehiculo()
    {
        return $this->id_vehiculo;
    }

    public function setTipoVehiculo($value)
    {
        if($this->validateAlphanumeric($value, 1, 25))
        {
            $this->tipo_vehiculo = $value;
            return true;
        }
        else
        {
            return false;
        }
    }
    public function getTipoVehiculo()
    {
        return $this->tipo_vehiculo;
    }

    public function setAño($value)
    {
        if($this->validateAlphanumeric($value, 1, 4))
        {
            $this->año = $value;
            return true;
        }
        else
        {
            return false;
        }
    }
    public function getAño()
    {
        return $this->año;
    }

    public function setValorVehiculo($value)
    {
        if($this->validateMoney($value))
        {
            $this->valor_actual = $value;
            return true;
        }
        else
        {
            return false;
        }
    }
    public function getValorVehiculo()
    {
        return $this->valor_actual;
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

    //Metodos para el SCRUD de la tabla vehiculos
    public function getVehiculos()
    {
        $sql = "SELECT * FROM vehiculos WHERE id_propiedad = ?";
        $params = array($this->id_propiedad);
        return Database::getRows($sql, $params);
    }
    public function createVehiculo()
    {
        $sql = "INSERT INTO vehiculos(tipo_vehiculo, año, valor_actual, id_propiedad) VALUES (?, ?, ?, ?)";
        $params = array($this->tipo_vehiculo, $this->año, $this->valor_actual, $this->id_propiedad);
        return Database::executeRow($sql, $params);
    }
}
?>