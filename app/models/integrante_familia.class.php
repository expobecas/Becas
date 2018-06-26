<?php

class Integrante_familia extends Validator
{
    private $id_integrante = null;
    private $nombres = null;
    private $apellidos = null;
    private $paretesco = null;
    private $fecha_nacimiento = null;
    private $profesion_ocupacion = null;
    private $lugar_trabajo = null;
    private $tel_trabajo = null;
    private $salario = null;
    private $id_solicitud = null;

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

    public function setNombres($value)
    {
        if($this->validateAlphanumeric($value, 1, 50))
        {
            $this->nombres = $value;
            return true;
        }
        else
        {
            return false;
        }
    }
    public function getNombres()
    {
        return $this->nombres;
    }

    public function setApellidos($value)
    {
        if($this->validateAlphanumeric($value, 1, 50))
        {
            $this->apellidos = $value;
            return true;
        }
        else
        {
            return false;
        }
    }
    public function getApellidos()
    {
        return $this->apellidos;
    }

    public function setParentesco($value)
    {
        if($this->validateAlphanumeric($value, 1, 30))
        {
            $this->parentesco = $value;
            return true;
        }
        else
        {
            return false;
        }
    }
    public function getParentesco()
    {
        return $this->parentesco;
    }

    public function setFechaNacimiento($value)
    {
        if($this->validateAlphanumeric($value, 1, 10))
        {
            $this->fecha_nacimiento = $value;
            return true;
        }
        else
        {
            return false;
        }
    }
    public function getFechaNacimiento()
    {
        return $this->fecha_nacimiento;
    }

    public function setProfesionOcupacion($value)
    {
        if($this->validateAlphanumeric($value, 1, 40))
        {
            $this->profesion_ocupacion = $value;
            return true;
        }
        else
        {
            return false;
        }
    }
    public function getProfesionOcupacion()
    {
        return $this->profesion_ocupacion;
    }

    public function setLugarTrabajo($value)
    {
        if($this->validateAlphanumeric($value, 1, 50))
        {
            $this->lugar_trabajo = $value;
            return true;
        }
        else
        {
            return false;
        }
    }
    public function getLugarTrabajo()
    {
        return $this->lugar_trabajo;
    }

    public function setTelTrabajo($value)
    {
        if($this->validateId($value))
        {
            $this->tel_trabajo = $value;
            return true;
        }
        else
        {
            return false;
        }
    }
    public function getTelTrabajo()
    {
        return $this->tel_trabajo;
    }

    public function setSalario($value)
    {
        if($this->validateMoney($value))
        {
            $this->salario = $value;
            return true;
        }
        else
        {
            return false;
        }
    }
    public function getSalario()
    {
        return $this->salario;
    }

    public function setIdSolicitud($value)
    {
        if($this->validateId($value))
        {
            $this->id_solicitud = $value;
            return true;
        }
        else
        {
            return false;
        }
    }
    public function getIdSolicitud()
    {
        return $this->id_solicitud;
    }

    //Metodos para el control del SCRUD

    public function getSolicitud()
    {
        $sql = "SELECT id_solicitud FROM solicitud ORDER BY id_solicitud DESC LIMIT 1";
        $params = array(null);
        return Database::getRow($sql, $params);
    }

    public function getIntegranteTable()
    {
        $sql = "SELECT i.id_integrante, i.nombres, i.apellidos, i.parentesco, i.fecha_nacimiento, i.profesion_ocupacion, i.lugar_trabajo, i.tel_trabajo, i.salario, f.depende, f.grado, f.institucion, f.cuota 
        FROM integrante_familia i LEFT JOIN familiares_estudiante f ON i.id_integrante = f.id_integrante 
        WHERE i.id_solicitud = (SELECT id_solicitud FROM solicitud ORDER BY id_solicitud DESC LIMIT 1) ORDER BY i.id_integrante ASC";
        $params = array(null);
        return Database::getRows($sql, $params);
    }
    
    public function getIntegrantes()
    {
        $sql = "SELECT nombres, apellidos, parentesco, fecha_nacimiento, profesion_ocupacion, lugar_trabajo, tel_trabajo, salario, depende, grado, institucion, cuota 
        FROM  integrante_familia INNER JOIN familiares_estudiante ON integrante_familia.id_integrante = familiares_estudiante.id_integrante";
        $params = array(null);
        return Database::getRows($sql, $params);
    }

    public function createIntegrante($nombres, $apellidos, $paretesco, $fecha_nacimiento, $profesion_ocupacion)
    {
        $sql = "INSERT INTO integrante_familia(nombres, apellidos, parentesco, fecha_nacimiento, profesion_ocupacion, lugar_trabajo, tel_trabajo, salario, id_solicitud) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $params = array($nombres, $apellidos, $paretesco, $fecha_nacimiento, $profesion_ocupacion, $this->lugar_trabajo, $this->tel_trabajo, $this->salario, $this->id_solicitud);
        return Database::executeRow($sql, $params);
    }

    public function updateIntegrante($nombres, $apellidos, $paretesco, $fecha_nacimiento, $profesion_ocupacion)
    {
        $sql = "UPDATE integrante_familia SET nombres = ?, apellidos = ? ,parentesco = ?, fecha_nacimiento = ?, profesion_ocupacion = ?, lugar_trabajo = ?, tel_trabajo = ?, salario = ? WHERE id_integrante = ? AND id_solicitud = ?";
        $params = array($nombres, $apellidos, $paretesco, $fecha_nacimiento, $profesion_ocupacion, $this->lugar_trabajo, $this->tel_trabajo, $this->salario, $this->id_integrante, $this->id_solicitud);
        return Database::executeRow($sql, $params);
    }

    public function deleteIntegrante()
    {
        $sql = "DELETE FROM integrante_familia WHERE id_integrante = ?";
        $params = array($this->id_integrante);
        return Database::executeRow($sql, $params);
    }
}
?>