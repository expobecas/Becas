<?php

class Grupo_Familiar extends Validator
{
    private $id_familia = null;
    private $ingreso_familiar = null;
    private $id_gastos = null;
    private $total_gastos = null;
    private $id_solicitud = null;
    private $monto_deuda = null;

    public function setIdFamilia($value)
    {
        if($this->validateId($value))
        {
            $this->id_familia = $value;
            return true;
        }
        else
        {
            return false;
        }
    }
    public function getIdFamilia()
    {
        return $this->id_familia;
    }

    public function setIngresoFamiliar($value)
    {
        if($this->validateMoney($value))
        {
            $this->ingreso_familiar = $value;
            return true;
        }
        else
        {
            return false;
        }
    }
    public function getIngresoFamiliar()
    {
        return $this->ingreso_familiar;
    }

    public function setIdGastos($value)
    {
        if($this->validateId($value))
        {
            $this->id_gastos = $value;
            return true;
        }
        else
        {
            return false;
        }
    }
    public function getIdGastos()
    {
        return $this->id_gastos;
    }

    public function setTotalGastos($value)
    {
        if($this->validateMoney($value))
        {
            $this->total_gastos = $value;
            return true;
        }
        else
        {
            return false;
        }
    }
    public function getTotalGastos()
    {
        return $this->total_gastos;
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

    public function setMontoDeuda($value)
    {
        if($this->validateMoney($value))
        {
            $this->monto_deuda = $value;
            return true;
        }
        else
        {
            return false;
        }
    }
    public function getMontoDeuda()
    {
        return $this->monto_deuda;
    }


    //Metodos para el SCRUD
    public function createFamilia()
    {
        $sql = "INSERT INTO grupo_familiar(ingreso_familiar, id_gastos, total_gastos, id_solicitud, monto_deuda) VALUES(?, ?, ?, ?, ?)";
        $params = array($this->ingreso_familiar, $this->id_gastos, $this->total_gastos, $this->id_solicitud, $this->monto_deuda);
        $grupo_familiar = Database::executeRow($sql, $params);
        if($grupo_familiar)
        {
            $this->id_familia = Database::getLastRowId();
        }
    }
}
?>