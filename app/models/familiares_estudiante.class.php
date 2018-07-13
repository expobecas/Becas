<?php

class Familiares_estudiante extends Validator
{
    private $id_fam_estudiante = null;
    private $depende = null;
    private $grado = null;
    private $institucion = null;
    private $cuota = null;
    private $id_integrante = null;

    public function setIdFamEstudiante($value)
    {
        if($this->validateId($value))
        {
            $this->id_fam_estudiante = $value;
            return true;
        }
        else
        {
            return false;
        }
    }
    public function getIdFamEstudiante()
    {
        return $this->id_fam_estudiante;
    }

    public function setDepende($value)
    {
        if($this->validateAlphanumeric($value, 1, 10))
        {
            $this->depende = $value;
            return true;
        }
        else
        {
            return false;
        }
    }
    public function getDepende()
    {
        return $this->depende;
    }

    public function setGrado($value)
    {
        if($this->validateAlphanumeric($value, 1, 40))
        {
            $this->grado = $value;
            return true;
        }
        else
        {
            return false;
        }
    }
    public function getGrado()
    {
        return $this->grado;
    }

    public function setInstitucion($value)
    {
        if($this->validateAlphanumeric($value, 1, 50))
        {
            $this->institucion = $value;
            return true;
        }
        else
        {
            return false;
        }
    }
    public function getInstitucion()
    {
        return $this->institucion;
    }

    public function setCuota($value)
    {
        if($this->validateMoney($value))
        {
            $this->cuota = $value;
            return true;
        }
        else
        {
            return false;
        }
    }
    public function getCuota()
    {
        return $this->cuota;
    }

    public function setIdIntegrante($value)
    {
        if($this->validateId($value))
        {
            $this->id_integrante = $value;
            return true;
        }
        else
        {
            return false;
        }
    }
    public function getIdIntegrante()
    {
        return $this->id_integrante;
    }

    //Metodos para el major del SCRUD
    public function getIdInte()
    {
        $sql = "SELECT id_integrante FROM integrante_familia ORDER BY id_integrante DESC LIMIT 1";
        $params = array(null);
        return Database::getRow($sql, $params);
    }

    public function getFamiliarEstudiante()
    {
        $sql = "SELECT id_integrante FROM familiares_estudiante WHERE id_integrante = ?";
        $params = array($this->id_integrante);
        return Database::getRow($sql, $params);
    }

    public function createFamiliarEstudiante($depende, $grado, $institucion, $cuota, $id_integrante)
    {
        $sql = "INSERT INTO familiares_estudiante(depende, grado, institucion, cuota, id_integrante) VALUES (?, ?, ?, ?, ?)";
        $params = array($depende, $grado, $institucion, $cuota, $id_integrante);
        return Database::executeRow($sql, $params);
    }

    public function updateFamiliarEstudiante($depende, $grado, $institucion, $cuota)
    {
        $sql = "UPDATE familiares_estudiante SET depende = ?, grado = ?, institucion = ?, cuota = ? WHERE id_integrante = ?";
        $params = array($depende, $grado, $institucion, $cuota, $this->id_integrante);
        return Database::executeRow($sql, $params);
    }

    public function deleteFamiliarEstudiante()
    {
        $sql = "DELETE FROM familiares_estudiante WHERE id_integrante = ?";
        $params = array($this->id_integrante);
        return Database::executeRow($sql, $params);
    }
}

?>