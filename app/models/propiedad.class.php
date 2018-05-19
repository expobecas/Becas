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

    public function getIdPropiedad($value)
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
    public function setIdPropiedad()
    {
        return $this->id_propiedad;
    }

    public function getTipoPropiedad($value)
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
    public function setTipoPropiedad()
    {
        return $this->tipo_propiedad;
    }

    public function getCuotaMensual($value)
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
    public function setCuotaMensual()
    {
        return $this->cuota_mensual;
    }
    
    public function getValorCasa($value)
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
    public function setValorCasa()
    {
        return $this->cuota_mensual;
    }

    public function getTipoVehiculo($value)
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
    public function setTipoVehiculo()
    {
        return $this->tipo_vehiculo;
    }

    public function getAñoVehiculo($value)
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
    public function setAñogetAñoVehiculo()
    {
        return $this->anio_vehiculo;
    }

    public function getValorVehiculo($value)
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
    public function setValorVehiculo()
    {
        return $this->valor_vehiculo;
    }

    public function setCroquis($file){
		if($this->validateImage($file, $this->croquis, "../../web/img/", 500, 500)){
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
}
?>