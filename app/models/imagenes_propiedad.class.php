<?php

class Imagenes_propiedad extends Validator
{
    private $id_img_propiedad = null;
    private $imagen_propiedad = null;
    private $id_propiedad = null;
    private $ruta = "../../../../web/img/propiedad/";

    public function setIdImagen($value)
    {
        if($this->validateId($value))
        {
            $this->id_img_propiedad = $value;
            return true;
        }
        else
        {
            return false;
        }
    }
    public function getIdImagen()
    {
        return $this->id_img_propiedad;
    }

    public function setImagenPropiedad($file){
        if($this->validateImage($file, $this->imagen_propiedad, 5000, 5000))
        {
			$this->imagen_propiedad = $this->getImageName();
			return true;
        }
        else
        {
			return false;
		}
	}
    public function getImagenPropiedad()
    {
		return $this->imagen_propiedad;
    }
    
    public function getRuta()
    {
        return $this->ruta;
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
    public function createImagenPropiedad()
    {
        $sql = "INSERT INTO imagenes_propiedad(imagen, id_propiedad) VALUES(?, ?)";
        $params = array($this->imagen_propiedad, $this->id_propiedad);
        return Database::executeRow($sql, $params);
    } 
}
?>