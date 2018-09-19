<?php
class Imagenes_casos extends Validator
{
    private $id_img_caso = null;
    private $imagen_caso = null;
    private $id_caso = null;
    private $ruta = "../../../../web/img/casos/";

    public function setIdImagenCaso($value)
    {
        if($this->validateId($value))
        {
            $this->id_img_caso = $value;
            return true;
        }
        else
        {
            return false;
        }
    }
    public function getIdImagenCaso()
    {
        return $this->id_img_caso;
    }

    public function setImagenCaso($file)
    {
        if($this->validateAlphanumeric($file, 1, 50))
        {
            $this->imagen_caso = $file;
            return true;
        }
        else
        {
            return false;
        }
    }
    public function getImagenCaso()
    {
        return $this->imagen_caso;
    }

    public function getRuta()
    {
        return $this->ruta;
    }

    public function setIdCaso($value)
    {
        if($this->validateId($value))
        {
            $this->id_caso = $value;
            return true;
        }
        else
        {
            return false;
        }
    }
    public function getIdCaso()
    {
        return $this->id_caso;
    }

    //METODOS PARA EL MANEJO DEL SCRUD

    public function getImagenes()
    {
        $sql = 'SELECT ic.id_img_caso, ic.imagen_caso FROM imagenes_casos ic INNER JOIN casos c ON ic.id_caso = c.id_caso WHERE c.id_caso = ?';
        $params = array($this->id_caso);
        return Database::getRows($sql, $params);
    }

    public function createImagenCaso()
    {
        $sql = "INSERT INTO imagenes_casos(imagen_caso, id_caso) VALUES (?, ?)";
        $params = array($this->imagen_caso, $this->id_caso);
        return Database::executeRow($sql, $params);
    }
}
?>