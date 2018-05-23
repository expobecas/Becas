<?php

class Gastos_mensuales extends Validator
{
    private $id_gastos = null;
    private $alimentacion = null;
    private $pago_vivienda = null;
    private $energia_electrica = null;
    private $agua = null;
    private $telefono = null;
    private $vigilancia = null;
    private $servicio_domestico = null;
    private $alcaldia = null;
    private $pago_deudas = null;
    private $cotizacion = null;
    private $seguro_personal = null;
    private $seguro_vehiculo = null;
    private $seguro_inmuebles = null;
    private $transporte = null;
    private $gastos_man_vehiculo = null;
    private $salud = null;
    private $pagos_asociasiones = null;
    private $pago_colegiatura = null;
    private $pago_universidad = null;
    private $gastos_material_estudios = null;
    private $impuesto_renta = null;
    private $iva = null;
    private $tarjeta_credito = null;
    private $otros = null;


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

    public function setAlimentacion($value)
    {
        if($this->validateMoney($value))
        {
            $this->alimentacion = $value;
            return true;
        }
        else
        {
            return false;
        }
    }
    public function getAlimentacion()
    {
        return $this->alimentacion;
    }

    public function setPagoVivienda($value)
    {
        if($this->validateMoney($value))
        {
            $this->pago_vivienda = $value;
            return true;
        }
        else
        {
            return false;
        }
    }
    public function getPagoVivienda()
    {
        return $this->pago_vivienda;
    }

    public function setEnergiaElectrica($value)
    {
        if($this->validateMoney($value))
        {
            $this->energia_electrica = $value;
            return true;
        }
        else
        {
            return false;
        }
    }
    public function getEnergiaElectrica()
    {
        return $this->energia_electrica;
    }

    public function setAgua($value)
    {
        if($this->validateMoney($value))
        {
            $this->agua = $value;
            return true;
        }
        else
        {
            return false;
        }
    }
    public function getAgua()
    {
        return $this->agua;
    }

    public function setTelefono($value)
    {
        if($this->validateMoney($value))
        {
            $this->telefono = $value;
            return true;
        }
        else
        {
            return false;
        }
    }
    public function getTelefono()
    {
        return $this->telefono;
    }

    public function setVigilancia($value)
    {
        if($this->validateMoney($value))
        {
            $this->vigilancia = $value;
            return true;
        }
        else
        {
            return false;
        }
    }
    public function getVigilancia()
    {
        return $this->vigilancia;
    }
    
    public function setServicioDomestico($value)
    {
        if($this->validateMoney($value))
        {
            $this->servicio_domestico = $value;
            return true;
        }
        else
        {
            return false;
        }
    }
    public function getServicioDomestico()
    {
        return $this->servicio_domestico;
    }

    public function setAlcaldia($value)
    {
        if($this->validateMoney($value))
        {
            $this->alcaldia = $value;
            return true;
        }
        else
        {
            return false;
        }
    }
    public function getAlcaldia()
    {
        return $this->alcaldia;
    }

    public function setPagoDeudas($value)
    {
        if($this->validateMoney($value))
        {
            $this->pago_deudas = $value;
            return true;
        }
        else
        {
            return false;
        }
    }
    public function getPagoDeudas()
    {
        return $this->pago_deudas;
    }

    public function setCotizacion($value)
    {
        if($this->validateMoney($value))
        {
            $this->cotizacion = $value;
            return true;
        }
        else
        {
            return false;
        }
    }
    public function getCotizacion()
    {
        return $this->cotizacion;
    }

    public function setSeguroPersonal($value)
    {
        if($this->validateMoney($value))
        {
            $this->seguro_personal = $value;
            return true;
        }
        else
        {
            return false;
        }
    }
    public function getSeguroPersonal()
    {
        return $this->seguro_personal;
    }

    public function setSeguroVehiculo($value)
    {
        if($this->validateMoney($value))
        {
            $this->seguro_vehiculo = $value;
            return true;
        }
        else
        {
            return false;
        }
    }
    public function getSeguroVehiculo()
    {
        return $this->seguro_vehiculo;
    }

    public function setSeguroInmuebles($value)
    {
        if($this->validateMoney($value))
        {
            $this->seguro_inmuebles = $value;
            return true;
        }
        else
        {
            return false;
        }
    }
    public function getSeguroInmuebles()
    {
        return $this->seguro_inmuebles;
    }

    public function setTransporte($value)
    {
        if($this->validateMoney($value))
        {
            $this->transporte = $value;
            return true;
        }
        else
        {
            return false;
        }
    }
    public function getTRansporte()
    {
        return $this->transporte;
    }

    public function setGastosManteVehiculo($value)
    {
        if($this->validateMoney($value))
        {
            $this->gastos_man_vehiculo = $value;
            return true;
        }
        else
        {
            return false;
        }
    }
    public function getGastosManteVehiculo()
    {
        return $this->gastos_man_vehiculo;
    }

    public function setSalud($value)
    {
        if($this->validateMoney($value))
        {
            $this->salud = $value;
            return true;
        }
        else
        {
            return false;
        }
    }
    public function getSalud()
    {
        return $this->salud;
    }

    public function setPagosAsociasiones($value)
    {
        if($this->validateMoney($value))
        {
            $this->pagos_asociasiones = $value;
            return true;
        }
        else
        {
            return false;
        }
    }
    public function getPagosAsociasiones()
    {
        return $this->pagos_asociasiones;
    }

    public function setPagosColegiatura($value)
    {
        if($this->validateMoney($value))
        {
            $this->pagos_colegiatura = $value;
            return true;
        }
        else
        {
            return false;
        }
    }
    public function getPagosColegiatura()
    {
        return $this->pagos_colegiatura;
    }

    public function setPagoColegiatura($value)
    {
        if($this->validateMoney($value))
        {
            $this->pago_colegiatura = $value;
            return true;
        }
        else
        {
            return false;
        }
    }
    public function getPagoColegiatura()
    {
        return $this->pago_colegiatura;
    }

    public function setPagoUniversidad($value)
    {
        if($this->validateMoney($value))
        {
            $this->pago_universidad = $value;
            return true;
        }
        else
        {
            return false;
        }
    }
    public function getPagoUniversidad()
    {
        return $this->pago_universidad;
    }

    public function setGastosMaterialEstudios($value)
    {
        if($this->validateMoney($value))
        {
            $this->gastos_material_estudios = $value;
            return true;
        }
        else
        {
            return false;
        }
    }
    public function getGastosMaterialEstudios()
    {
        return $this->gastos_material_estudios;
    }

    public function setImpuestoRenta($value)
    {
        if($this->validateMoney($value))
        {
            $this->impuesto_renta = $value;
            return true;
        }
        else
        {
            return false;
        }
    }
    public function getImpuestoRenta()
    {
        return $this->impuesto_renta;
    }

    public function setIva($value)
    {
        if($this->validateMoney($value))
        {
            $this->iva = $value;
            return true;
        }
        else
        {
            return false;
        }
    }
    public function getIva()
    {
        return $this->iva;
    }

    public function setTarjetaCredito($value)
    {
        if($this->validateMoney($value))
        {
            $this->tarjeta_credito = $value;
            return true;
        }
        else
        {
            return false;
        }
    }
    public function getTarjetaCredito()
    {
        return $this->tarjeta_credito;
    }

    public function setOtros($value)
    {
        if($this->validateMoney($value))
        {
            $this->otros = $value;
            return true;
        }
        else
        {
            return false;
        }
    }
    public function getOtros()
    {
        return $this->otros;
    }

    //Metodos para el control del SCRUD
    public function createGastos()
    {
        $sql = "INSERT INTO gastos_mensuales(alimentacion, pago_vivienda, energia_electrica, agua, telefono, vigilancia, servicio_domestico, alcadia, pago_deudas, cotizacion, seguro_personal, seguro_vehiculo, seguro_inmuebles, transporte, gastos_man_vehiculo, salud, pagos_asociasiones, pago_colegiatura, pago_universidad, gastos_material_estudios, impuesto_renta, iva, tarjeta_credito, otros) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $params = array($this->alimentacion, $this->pago_vivienda, $this->energia_electrica, $this->agua, $this->telefono, $this->vigilancia, $this->servicio_domestico, $this->alcaldia, $this->pago_deudas, $this->cotizacion, $this->seguro_personal, $this->seguro_vehiculo, $this->seguro_inmuebles, $this->transporte, $this->gastos_man_vehiculo, $this->salud, $this->pagos_asociasiones, $this->pago_colegiatura, $this->pago_universidad, $this->gastos_material_estudios, $this->impuesto_renta, $this->iva, $this->tarjeta_credito, $this->otros);
        return Database::executeRow($sql, $params);
    }
}

?>