<?php

class Imagenes_vehiculo extends Validator
{
    private $id_img_vehiculo = null;
    private $imagen1 = null;
    private $imagen2= null;
    private $imagen3 = null;
    private $imagen4 = null;
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

    public function setImagen1($file){
        if($this->validateImage($file, $this->imagen1, "../../web/img/", 500, 500))
        {
			$this->imagen1 = $this->getImageName();
			return true;
        }
        else
        {
			return false;
		}
	}
    public function getImagen1()
    {
		return $this->imagen1;
	}
    public function unsetImagen1()
    {
        if(unlink("../../web/img/".$this->imagen1))
        {
			$this->imagen1 = null;
			return true;
        }
        else
        {
			return false;
		}
    }
    
    public function setImagen2($file){
        if($this->validateImage($file, $this->imagen2, "../../web/img/", 500, 500))
        {
			$this->imagen2 = $this->getImageName();
			return true;
        }
        else
        {
			return false;
		}
	}
    public function getImagen2()
    {
		return $this->imagen2;
	}
    public function unsetImagen2()
    {
        if(unlink("../../web/img/".$this->imagen2))
        {
			$this->imagen2 = null;
			return true;
        }
        else
        {
			return false;
		}
    }
    
    public function setImagen3($file){
        if($this->validateImage($file, $this->imagen3, "../../web/img/", 500, 500))
        {
			$this->imagen3 = $this->getImageName();
			return true;
        }
        else
        {
			return false;
		}
	}
    public function getImagen3()
    {
		return $this->imagen;
	}
    public function unsetImagen3()
    {
        if(unlink("../../web/img/".$this->imagen3))
        {
			$this->imagen3 = null;
			return true;
        }
        else
        {
			return false;
		}
    }
    
    public function setImagen4($file){
        if($this->validateImage($file, $this->imagen4, "../../web/img/", 500, 500))
        {
			$this->imagen4 = $this->getImageName();
			return true;
        }
        else
        {
			return false;
		}
	}
    public function getImagen4()
    {
		return $this->imagen4;
	}
    public function unsetImagen4()
    {
        if(unlink("../../web/img/".$this->imagen4))
        {
			$this->imagen4 = null;
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
}
?>