<?php

class Propiedad extends Validator
{
    private $id_propiedad = null;
    private $tipo_propiedad = null;
    private $cuota_mensual = null;
    private $valor_casa = null;
    private $tipo_vehiculo = null;
    private $año_vehiculo = null;
    private $valor_vehiculo = null;
    private $croquis = null;

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
            $this->cuota_mensual = $value;
            return true;
        }
        else
        {
            return false;
        }
    }
    public function getValorCasa()
    {
        return $this->cuota_mensual;
    }

    public function setTipoVehiculo($value)
    {
        if($this->validateAlphanumeric($value, 1, 30))
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

    public function setAñoVehiculo($value)
    {
        if($this->validateAlphanumeric($value, 1, 4))
        {
            $this->anio_vehiculo = $value;
            return true;
        }
        else
        {
            return false;
        }
    }
    public function getAñoVehiculo()
    {
        return $this->anio_vehiculo;
    }

    public function setValorVehiculo($value)
    {
        if($this->validateMoney($value))
        {
            $this->valor_vehiculo = $value;
            return true;
        }
        else
        {
            return false;
        }
    }
    public function getValorVehiculo()
    {
        return $this->valor_vehiculo;
    }

    public function setCroquis($file){
		if($this->validateImage($file, $this->croquis, "../../web/img/", 5000, 5000)){
			$this->croquis = $this->getImageName();
			return true;
		}else{
			return false;
		}
	}
	public function getCroquis(){
		return $this->croquis;
	}
	public function unsetCroquis(){
		if(unlink("../../web/img/".$this->croquis)){
			$this->croquis = null;
			return true;
		}else{
			return false;
		}
    }
    
    //Metodos para el mantenimiento SCRUD
    public function createPropiedad()
    {
        $sql = "INSERT INTO propiedad(tipo_propiedad, cuota_mensual, valor_casa, tipo_vehiculo, año_vehiculo, valor_vehiculo, croquis) VALUES(?, ?, ?, ?, ?, ?, ?)";
        $params = array($this->tipo_propiedad, $this->cuota_mensual, $this->valor_casa, $this->tipo_vehiculo, $this->año_vehiculo, $this->valor_vehiculo, $this->croquis);
        return Database::executeRow($sql, $params);
    }
}
?>