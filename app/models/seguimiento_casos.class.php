<?php
class Seguimiento_casos extends Validator
{
    private $id_seguimiento = null;
    private $periodo = null;
    private $descripcion = null;
    private $soluciones = null;
    private $id_caso = null;

    public function setIdSeguimiento($value)
    {
        if($this->validateId($value))
        {
            $this->id_seguimiento = $value;
            return true;
        }
        else
        {
            return false;
        }
    }
    public function getIdSegrimiento()
    {
        return $this->id_seguimiento;
    }

    public function setPeriodo($value)
    {
        if($this->validateId($value))
        {
            $this->periodo = $value;
            return true;
        }
        else
        {
            return false;
        }
    }
    public function getPeriodo()
    {
        return $this->periodo;
    }

    public function setDescripcion($value)
    {
        if($this->validateAlphanumeric($value, 1, 700))
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

    public function setSoluciones($value)
    {
        if($this->validateAlphanumeric($value, 1, 700))
        {
            $this->soluciones = $value;
            return true;
        }
        else
        {
            return false;
        }
    }
    public function getSoluciones()
    {
        return $this->soluciones;
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

    //Metodos para el SCRUD
    public function getSeguimientos()
    {
        $sql = "SELECT sc.id_seguimiento, p.periodo, sc.descripcion, sc.soluciones FROM seguimiento_casos sc INNER JOIN casos c ON sc.id_caso = c.id_caso INNER JOIN periodos p ON sc.id_periodo = p.id_periodo WHERE sc.id_caso = ? ORDER by p.id_periodo";
        $params = array($this->id_caso);
        return Database::getRows($sql, $params);
    }

    public function getPeriodos()
    {
        $sql = "SELECT id_periodo, periodo FROM periodos";
        $params = array(null);
        return Database::getRows($sql, $params);
    }

    public function createSeguimiento()
    {
        $sql = "INSERT INTO seguimiento_casos(id_periodo, descripcion, soluciones, id_caso) VALUES (?, ?, ?, ?)";
        $params = array($this->periodo, $this->descripcion, $this->soluciones, $this->id_caso);
        print_r($params);
        return Database::executeRow($sql, $params);
    }
}
?>