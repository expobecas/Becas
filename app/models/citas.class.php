<?php
class Citas extends Validator
{
    private $id = null;
    private $titulo = null;
    private $descripcion = null;
    private $color = null;
    private $colortext = null;
    private $inicio = null;
    private $fin = null;

    public function setId($value)
    {
        if($this->validateId($value))
        {
            $this->id = $value;
            return true;
        }
        else
        {
            return false;
        }
    }
    public function getId()
    {
        return $this->id;
    }

    public function setTitulo($value)
    {
        if($this->validateAlphabetic($value, 1, 100))
        {
            $this->titulo = $value;
            return true;
        }
        else
        {
            return false;
        }
    }
    public function getTitulo()
    {
        return $this->titulo;
    }

    public function setDescripcion($value)
    {
        if($this->validateAlphabetic($value, 1, 200))
        {
            $this->descripcion = $value;
            return true;
        }
        else
        {
            return false;
        }
    }
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    public function setColor($value)
    {
        if($this->validateAlphabetic($value, 1, 100))
        {
            $this->color = $value;
            return true;
        }
        else
        {
            return false;
        }
    }
    public function getColor()
    {
        return $this->color;
    }

    public function setColortext($value)
    {
        if($this->validateAlphabetic($value, 1, 100))
        {
            $this->colortext = $value;
            return true;
        }
        else
        {
            return false;
        }
    }
    public function getColortext()
    {
        return $this->colortext;
    }

    public function setInicio($value)
    {
        if($this->validateAlphabetic($value, 1, 20))
        {
            $this->inicio = $value;
            return true;
        }
        else
        {
            return false;
        }
    }
    public function getInicio()
    {
        return $this->inicio;
    }

    public function setFin($value)
    {
        if($this->validateAlphabetic($value, 1, 20))
        {
            $this->fin = $value;
            return true;
        }
        else
        {
            return false;
        }
    }
    public function getFin()
    {
        return $this->fin;
    }

    //metodos para CRUD del calendario

    public function getEventos()
    {
        $sql = "SELECT * FROM citas";
        $params = array(null);
        return database::getRows($sql, $params);
    }

    public function createEvento($titulo, $descripcion, $color, $colortext, $inicio, $fin)
    {
        $sql = "INSERT INTO eventos(title, descripcion, color, textColor, start, end) VALUES(?, ?, ?, ?, ?, ?)";
        $params = array($titulo, $descripcion, $color, $colortext, $inicio, $fin);
        return database::executeRow($sql, $params);
    }

    public function updateEvento($titulo, $descripcion, $inicio, $fin, $id)
    {
        $sql = "UPDATE eventos SET title = ?, descripcion = ?, start = ?, end = ? WHERE id = ?";
        $params = array($titulo, $descripcion, $inicio, $fin, $id);
        return database::executeRow($sql, $params);
    }

    public function deleteEvento($id)
    {
        $sql = "DELETE FROM eventos WHERE id = ?";
        $params = array($id);
        return database::executeRow($sql, $params);
    }
}
?>