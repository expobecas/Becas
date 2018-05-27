<?php

class Imagenes_vehiculo extends Validator
{
    private $id_img_vehiculo = null;
    private $imagen_vehiculo = null;
    private $id_propiedad = null;

    public function setIdImagen($value)
    {
        if($this->validateId($value))
        {
            $this->id_img_vehiculo = $value;
            return true;
        }
        else
        {
            return false;
        }
    }
    public function getIdImagen()
    {
        return $this->id_img_vehiculo;
    }

    public function setImagenVehiculo($file){
        if($this->validateImage($file, $this->imagen1, "../../web/img/", 5000, 5000))
        {
			$this->imagen_vehiculo = $this->getImageName();
			return true;
        }
        else
        {
			return false;
		}
	}
    public function getImagenVehiculo()
    {
		return $this->imagen_vehiculo;
	}
    public function unsetImagenVehiculo()
    {
        if(unlink("../../web/img/".$this->imagen_vehiculo))
        {
			$this->imagen_vehiculo = null;
			return true;
        }
        else
        {
			return false;
		}
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

    //Metodos para el control SCRUD
    public function createImagenVehiculo()
    {
        $sql = "INSERT INTO imagenes_vehiculo(imagen_vehiculo, id_propiedad) VALUES(?, ?)";
        $params = array($this->imagen_vehiculo, $this->id_propiedad);
        return Database::execute($sql, $params);
    } 
}
?>