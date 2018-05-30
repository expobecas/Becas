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
    
    public function getIngreso()
    {
        $sql = "";
        $params = array(null);
        return Database::getRow($sql, $params);
    }
    public function getGastos()
    {
        $sql = "SELECT SUM(alimentacion + pago_vivienda + energia_electrica + agua + telefono + COALESCE(vigilancia, 0) + COALESCE( servicio_domestico, 0) + alcadia + pago_deudas + cotizacion + seguro_personal + COALESCE(seguro_vehiculo, 0) + COALESCE(seguro_inmuebles, 0) + transporte + COALESCE(gastos_man_vehiculo, 0) + salud + COALESCE(pagos_asociasiones, 0) + pago_colegiatura + COALESCE(pago_universidad, 0) + gastos_material_estudios + impuesto_renta + iva + tarjeta_credito + COALESCE(otros, 0)) AS Total FROM gastos_mensuales WHERE id_gastos = ?";
        $params = array($this->id_gastos);
        return Database::getRow($sql, $params);
    }

    public function createFamilia()
    {
        $sql = "";
        $params = array();
        return Database::executeRow($sql, $params);
    }
}
?>