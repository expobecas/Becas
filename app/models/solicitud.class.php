<?php

class Solicitud extends Validator
{
    private $id_solicitud = null;
    private $id_estudiante = null;
    private $id_genero = null;
    private $religion = null;
    private $encargado = null;
    private $direccion = null;
    private $correo = null;
    private $tel_fijo = null;
    private $tel_papa = null;
    private $tel_mama = null;
    private $tel_hijo = null;
    private $fecha_nacimiento = null;
    private $estudios_finan = null;
    private $id_institucion_proveniente = null;

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

    public function setIdEstudiante($value)
    {
        if($this->validateId($value))
        {
            $this->id_estudiante = $value;
            return true;
        }
        else
        {
            return false;
        }
    }
    public function getIdEstudiante()
    {
        return $this->id_estudiante;
    }

    public function setIdGenero($value)
    {
        if($this->validateId($value))
        {
            $this->id_genero = $value;
            return true;
        }
        else
        {
            return false;
        }
    }
    public function getIdGenero()
    {
        return $this->id_genero;
    }

    public function setReligion($value)
    {
        if($this->validateAlphabetic($value, 1, 30))
        {
            $this->religion = $value;
            return true;
        }
        else
        {
            return false;
        }
    }
    public function getReligion()
    {
        return $this->religion;
    }

    public function setEncargado($value)
    {
        if($this->validateAlphabetic($value, 1, 30))
        {
            $this->encargado = $value;
            return true;
        }
        else
        {
            return false;
        }
    }
    public function getEncargado()
    {
        return $this->encargado;
    }

    public function setDireccion($value)
    {
        if($this->validateAlphanumeric($value, 1, 50))
        {
            $this->direccion = $value;
            return true;
        }
        else
        {
            return false;
        }
    }
    public function getDireccion()
    {
        return $this->direccion;
    }

    public function setCorreo($value)
    {
        if($this->validateAlphabetic($value, 1, 50))
        {
            $this->correo = $value;
            return true;
        }
        else
        {
            return false;
        }
    }
    public function getCorreo()
    {
        return $this->correo;
    }

    public function setTelFijo($value)
    {
        if($this->validateId($value))
        {
            $this->tel_fijo = $value;
            return true;
        }
        else
        {
            return false;
        }
    }
    public function getTelFijo()
    {
        return $this->tel_fijo;
    }

    public function setCelMama($value)
    {
        if($this->validateId($value))
        {
            $this->cel_mama = $value;
            return true;
        }
        else
        {
            return false;
        }
    }
    public function getCelMama()
    {
        return $this->cel_mama;
    }

    public function setCelPapa($value)
    {
        if($this->validateId($value))
        {
            $this->cel_papa = $value;
            return true;
        }
        else
        {
            return false;
        }
    }
    public function getCelPapa()
    {
        return $this->cel_papa;
    }

    public function setCelHijo($value)
    {
        if($this->validateId($value))
        {
            $this->cel_hijo = $value;
            return true;
        }
        else
        {
            return false;
        }
    }
    public function getCelHijo()
    {
        return $this->cel_hijo;
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

    public function setEstudiosFinan($value)
    {
        if($this->validateAlphanumeric($value, 1, 30))
        {
            $this->estudios_finan = $value;
            return true;
        }
        else
        {
            return false;
        }
    }
    public function getEstudiosFinan()
    {
        return $this->estudios_finan;
    }

    public function setIdInstitucion($value)
    {
        if($this->validateId($value))
        {
            $this->id_institucion_proveniente = $value;
            return true;
        }
        else
        {
            return false;
        }
    }
    public function getIdInstitucion()
    {
        return $this->id_institucion_proveniente;
    }

    //Metodos para el manejo del SCRUD
    public function getGeneros()
    {
        $sql = "SELECT id_genero, genero FROM genero";
        $params = array(null);
        return database::getRows($sql, $params);
    }
}
?>