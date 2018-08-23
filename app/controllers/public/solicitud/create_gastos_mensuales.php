<?php
require_once("../../../models/database.class.php");
require_once("../../../helpers/validator.class.php");
require_once("../../../helpers/component.class.php");
require_once("../../../models/gastos_mensuales.class.php");

try
{
	class Datos_estudiante
    {
        function create()
        {
            $gastos_mensuales = new Gastos_mensuales;
            $alimentacion = str_replace(',', '.', str_replace('.', '', $_POST['alimentacion']));
            $gastos_mensuales->setAlimentacion($alimentacion);
			$casa = str_replace(',', '.', str_replace('.', '', $_POST['casa']));
			$gastos_mensuales->setPagoVivienda($casa);
			$energia_electrica = str_replace(',', '.', str_replace('.', '', $_POST['energia_electrica']));
			$gastos_mensuales->setEnergiaElectrica($energia_electrica);
			$agua = str_replace(',', '.', str_replace('.', '', $_POST['agua']));
			$gastos_mensuales->setAgua($agua);
			$telefono = str_replace(',', '.', str_replace('.', '', $_POST['telefono']));
			$gastos_mensuales->setTelefono($telefono);
			$vigilancia = $_POST['vigilancia'];
			if($vigilancia != null)
			{
				$vigilancia = str_replace(',', '.', str_replace('.', '', $vigilancia));
				$gastos_mensuales->setVigilancia($vigilancia);
			}
			$domesticos = $_POST['domesticos'];
			if($domesticos != null)
			{
				$domesticos = str_replace(',', '.', str_replace('.', '', $domesticos));
				$gastos_mensuales->setServicioDomestico($domesticos);
			}
			$alcaldia = str_replace(',', '.', str_replace('.', '', $_POST['alcaldia']));
			$gastos_mensuales->setAlcaldia($alcaldia);
			$pago_deudas = $_POST['pago_deudas'];
			if($pago_deudas != null)
			{
				$pago_deudas = str_replace(',', '.', str_replace('.', '', $pago_deudas));
				$gastos_mensuales->setPagoDeudas($pago_deudas);
			}
			$cotizaciones = str_replace(',', '.', str_replace('.', '', $_POST['cotizaciones']));
			$gastos_mensuales->setCotizacion($cotizaciones);
			$seguro_personal = $_POST['seguro_personal'];
			if($seguro_personal != null)
			{
				$seguro_personal = str_replace(',', '.', str_replace('.', '', $seguro_personal));
				$gastos_mensuales->setSeguroPersonal($seguro_personal);
			}
			$seguro_vehiculo = $_POST['seguro_vehiculo'];
			if($seguro_vehiculo != null)
			{
				$seguro_vehiculo = str_replace(',', '.', str_replace('.', '', $seguro_vehiculo));
				$gastos_mensuales->setSeguroVehiculo($seguro_vehiculo);
			}
			$seguro_inmuebles = $_POST['seguro_inmuebles'];
			if($seguro_inmuebles != null)
			{
				$seguro_inmuebles = str_replace(',', '.', str_replace('.', '', $seguro_inmuebles));
				$gastos_mensuales->setSeguroInmuebles($seguro_inmuebles);
			}
			$transporte = str_replace(',', '.', str_replace('.', '', $_POST['transporte']));
			$gastos_mensuales->setTransporte($transporte);
			$mant_vehiculo = $_POST['mant_vehiculo'];
			if($mant_vehiculo != null)
			{
				$mant_vehiculo = str_replace(',', '.', str_replace('.', '', $mant_vehiculo));
				$gastos_mensuales->setGastosManteVehiculo($mant_vehiculo);
			}
			$salud = str_replace(',', '.', str_replace('.', '', $_POST['salud']));
			$gastos_mensuales->setSalud($salud);
			$pago_asociaciones = $_POST['pago_asociaciones'];
			if($pago_asociaciones != null)
			{
				$pago_asociaciones = str_replace(',', '.', str_replace('.', '', $pago_asociaciones));
				$gastos_mensuales->setPagosAsociasiones($pago_asociaciones);
			}
			$pago_colegiatura = $_POST['pago_colegiatura'];
			if($pago_colegiatura != null)
			{
				$pago_colegiatura = str_replace(',', '.', str_replace('.', '', $pago_colegiatura));
				$gastos_mensuales->setPagoColegiatura($pago_colegiatura);
			}
			$pago_universitarios = $_POST['pago_universitarios'];
			if($pago_universitarios != null)
			{
				$pago_universitarios = str_replace(',', '.', str_replace('.', '', $pago_universitarios));
				$gastos_mensuales->setPagoUniversidad($pago_universitarios);
			}
			$materiales = str_replace(',', '.', str_replace('.', '', $_POST['materiales']));
			$gastos_mensuales->setGastosMaterialEstudios($materiales);
			$renta = str_replace(',', '.', str_replace('.', '', $_POST['renta']));
			$gastos_mensuales->setImpuestoRenta($renta);
			$iva = str_replace(',', '.', str_replace('.', '', $_POST['iva']));
			$gastos_mensuales->setIva($iva);
			$tarjetas_credito = $_POST['tarjetas_credito'];
			if($tarjetas_credito != null)
			{
				$tarjetas_credito = str_replace(',', '.', str_replace('.', '', $tarjetas_credito));
				$gastos_mensuales->setTarjetaCredito($tarjetas_credito);
			}
			$otros_gastos = $_POST['otros_gastos'];
			if($otros_gastos != null)
			{
				$otros_gastos = str_replace(',', '.', str_replace('.', '', $otros_gastos));
				$gastos_mensuales->setOtros($otros_gastos);
			}
			if($gastos_mensuales->createGastos())
			{
				
			}
			else
			{
				echo json_decode(Database::getException());
			}
		}
    }
    $object = new Datos_estudiante();
    $object->create();
}
catch(Excepcion $error)
{
	echo json_decode($error->getMessage());
}
?>