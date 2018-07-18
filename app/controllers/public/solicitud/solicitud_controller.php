<?php
require_once("../../app/models/familiares_estudiante.class.php");
require_once("../../app/models/gastos_mensuales.class.php");
require_once("../../app/models/grupo_familiar.class.php");
require_once("../../app/models/imagenes_vehiculo.class.php");
require_once("../../app/models/institucion_proveniente.class.php");
require_once("../../app/models/integrante_familia.class.php");
require_once("../../app/models/intermedia_propiedad.class.php");
require_once("../../app/models/propiedad.class.php");
require_once("../../app/models/remesa_familiar.class.php");
require_once("../../app/models/solicitud.class.php");
require_once("../../app/models/detalle_solicitud.php");
try
{
	if($_SESSION['id_estudiante'] == "")
	{
		Page::showMessage(3, "Por favor inicie sessión", "../alumno/account/ingresar.php");
	}
	//PRIMERA PARTE DEL FOMULARIO SOLICITUD
	//Para llenar la tabla institucion proveniente
	$institucion_proveniente = new Institucion_proveniente;
	

	//Para llenar la tabla solicitud
	$solicitud = new Solicitud;
	$solicitud->setIdEstudiante($_SESSION['id_estudiante']);
	$datos = $solicitud->checkSolicitud();
	if($datos)
	{
		Page::showMessage(3, "Ya no puede llenar otra solicitud", "../alumno/index/index.php");
		print("<script>
		$(document).ready(function(){
			$('#estudiante').addClass('disabled');
		});
		</script>");
	}
    //SEGUNDA PARTE DEL FOMULARIO SOLICITUD
    //Para llenar la tabla integrantes*/
	$integrante = new Integrante_familia;

    //Para llenar la tabla familiares estudiante
    $familiares_estudiante = new Familiares_estudiante;

    //Para llenar la tabla imagenes_vehiculo
	/*$imagenes_vehiculo = new Imagenes_vehiculo;
	if(isset($_POST['enviar']))
	{
		$_POST = $imagenes_vehiculo->validateForm($_POST['']);
		if($imagenes_vehiculo->setImagenVehiculo())
		{
			if($imagenes_vehiculo->setIdPropiedad($_POST['']))
			{
				if($imagenes_vehiculo->createImagenVehiculo())
				{
					Page::showMessage(1, "Imagen agregada", "");
				}
				else
				{
					throw new Exception(Database::getException());
				}
			}
		}
		else
		{
			throw new Exception("Agrege una imagen de su vehiculo");
		}
	}*/

    //Para llenar la tabla propiedad
	$propiedad = new Propiedad;


    //para llenar la intermedia propiedad
	$intermedia_propiedad = new Intermedia_propiedad;
	if(isset($_POST['enviar']))
	{
		$data = $intermedia_propiedad->getSolicitud();
		if($data)
		{
			foreach($data as $id)
			{
				$id_solicitud = $id;
			}
			$intermedia_propiedad->setIdSolicitud($id_solicitud);
		}
		else
		{
			throw new Exception(Database::getException());
		}

		$integrantes = $intermedia_propiedad->getIntegrantes();
		$idpropiedad = $intermedia_propiedad->getPropiedad();
		if($integrantes && $idpropiedad)
		{
			$i = 0;
			$j = 0;
			$c=count($integrantes);

			for($i ; $i<$c; $i++)
			{
				$intermedia_propiedad->setIdIntegrante($integrantes[$i][$j]);
				$intermedia_propiedad->setIdPropiedad($idpropiedad[0][0]);
				if($intermedia_propiedad->createInterPropiedad())
				{
					
				}
				else
				{
					throw new Exception(Database::getException());
				}

			}
		}
		else
		{
			throw new Exception(Database::getException());
		}
	}


    //TERCERA PARTE DEL FOMULARIO SOLICITUD
	//Para llenar la tabla gastos mensuales
	$gastos_mensuales = new Gastos_mensuales;
	if(isset($_POST['enviar']))
	{
		$_POST = $gastos_mensuales->validateForm($_POST);
		$alimentacion = str_replace(',', '.', str_replace('.', '', $_POST['alimentacion']));
		if($gastos_mensuales->setAlimentacion($alimentacion))
		{
			$casa = str_replace(',', '.', str_replace('.', '', $_POST['casa']));
			if($gastos_mensuales->setPagoVivienda($casa))
			{
				$energia_electrica = str_replace(',', '.', str_replace('.', '', $_POST['energia_electrica']));
				if($gastos_mensuales->setEnergiaElectrica($energia_electrica))
				{
					$agua = str_replace(',', '.', str_replace('.', '', $_POST['agua']));
					if($gastos_mensuales->setAgua($agua))
					{
						$telefono = str_replace(',', '.', str_replace('.', '', $_POST['telefono']));
						if($gastos_mensuales->setTelefono($telefono))
						{
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
							if($gastos_mensuales->setAlcaldia($alcaldia))
							{
								$pago_deudas = $_POST['pago_deudas'];
								if($pago_deudas != null)
								{
									$pago_deudas = str_replace(',', '.', str_replace('.', '', $pago_deudas));
									$gastos_mensuales->setPagoDeudas($pago_deudas);
								}
								$cotizaciones = str_replace(',', '.', str_replace('.', '', $_POST['cotizaciones']));
								if($gastos_mensuales->setCotizacion($cotizaciones))
								{
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
									if($gastos_mensuales->setTransporte($transporte))
									{
										$mant_vehiculo = $_POST['mant_vehiculo'];
										if($mant_vehiculo != null)
										{
											$mant_vehiculo = str_replace(',', '.', str_replace('.', '', $mant_vehiculo));
											$gastos_mensuales->setGastosManteVehiculo($mant_vehiculo);
										}
										$salud = str_replace(',', '.', str_replace('.', '', $_POST['salud']));
										if($gastos_mensuales->setSalud($salud))
										{
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
											if($gastos_mensuales->setGastosMaterialEstudios($materiales))
											{
												$renta = str_replace(',', '.', str_replace('.', '', $_POST['renta']));
												if($gastos_mensuales->setImpuestoRenta($renta))
												{
													$iva = str_replace(',', '.', str_replace('.', '', $_POST['iva']));
													if($gastos_mensuales->setIva($iva))
													{
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
															throw new Exception(Database::getException());
														}
													}
													else
													{
														throw new Exception("Ingrese El iva");
													}
												}
												else
												{
													throw new Exception("Ingrese la cantidad del impuesto sobre la renta");
												}
											}
											else
											{
												throw new Exception("Ingrese el gasto de materiales de los estudios");
											}
										}
										else
										{
											throw new Exception("Ingrese el gasto mensual de salud e higiene");
										}
									}
									else
									{
										throw new Exception("Ingrese el gasto de bus/taxi en el caso que obtenga vehiculo el gasto de la gasolina");
									}
								}
								else
								{
									throw new Exception("Ingrese las cotizaciones que tiene ya sea hacia el ISSS o la AFP");
								}
							}
							else
							{
								throw new Exception("Ingrese el gasto mensual que paga a la alcaldia");
							}						
						}
						else
						{
							throw new Exception("Ingrese el gasto de telefono(ultimo recibo)");
						}
					}
					else
					{
						throw new Exception("Ingrese el gasto del servicio de agua(ultimo recibo)");
					}
				}
				else
				{
					throw new Exception("Ingrese el gasto del servicio de energia electrica(ultimo recibo)");
				}
			}
			else
			{
				throw new Exception("Ingrese el gasto del alquiler de casa o pago al boanco mensual");
			}
		}
		else
		{
			throw new Exception("Ingrese el gasto de alimentacion mensual");
		}
	}

    //Para llenar la tabla grupo familiar
	$grupo_familiar = new Grupo_familiar;
	if(isset($_POST['enviar']))
	{
		$_POST = $grupo_familiar->validateForm($_POST);
		if($grupo_familiar->setIngresoFamiliar($_POST['ingreso_familiar']))
		{
			$id_gasto = $grupo_familiar->getIdGasto();
			if($id_gasto)
			{
				$grupo_familiar->setIdGastos($id_gasto[0]);
				$total_gasto = $grupo_familiar->getGastos();
				if($total_gasto)
				{
					$grupo_familiar->setTotalGastos($total_gasto[0]);
					$id_solicitud = $grupo_familiar->getSolicitud();
					if($id_solicitud)
					{
						$grupo_familiar->setIdSolicitud($id_solicitud[0]);
						if($_POST['monto_deuda'] !=null)
						{
							$monto_deuda = str_replace(',', '.', str_replace('.', '', $_POST['monto_deuda']));
							$grupo_familiar->setMontoDeuda($monto_deuda);
						}
						if($grupo_familiar->createFamilia())
						{
							
						}
						else
						{
							throw new Exception(Database::getException());
						}
					}
					else
					{
						throw new Exception("Ocurrio un error, por favor contactar con el administrador(id solicitud)");
					}
				}
				else
				{
					throw new Exception("Ocurrio un error, por favor contactar con el administrador(total gasto)");
				}
			}
			else
			{
				throw new Exception("Ocurrio un error, por favor contactar con el administrador(id gasto)");
			}
		}
		else
		{
			throw new Exception("Ocurrio un error, por favor contactar con el administrador(ingreso familiar)");
		}
	}

    //Para llenar la tabla remesa familiar
	$remesa_familiar = new Remesa_familiar;
	if(isset($_POST['enviar']))
	{
		$_POST = $remesa_familiar->validateForm($_POST);
		if($_POST['monto_remesa'] != null && $_POST['periodo'] != null)
		{
			if($_POST['periodo'] != null && $_POST['benecfactor'] != null)
			{
				$monto_remesa = str_replace(',', '.', str_replace('.', '', $_POST['monto_remesa']));
				if($remesa_familiar->setMonto($monto_remesa))
				{
					if($remesa_familiar->setPeriodoRecibido($_POST['periodo']))
					{
						if($remesa_familiar->setBenefactor($_POST['benecfactor']))
						{
							$idfamilia = $remesa_familiar->getFamilia();
							if($remesa_familiar->setIdFamilia($idfamilia[0][0]))
							{
								if($remesa_familiar->createRemesa())
								{
									Page::showMessage(1, "Remesa creada", "");
								}
								else
								{
									throw new Exception(Database::getException());
								}
							}
							else
							{
								throw new Exception("Ocurrió un error al guardar los datos de la remesa");
							}
						}
						else
						{
							throw new Exception("Ingrese el benefactor de la remesa");
						}
					}
					else
					{
						throw new Exception("Ingrese el periodo que recibe la remesa");
					}
				}
				else
				{
					throw new Exception("Ingrese el monto que recibe de la remesa");
				}
			}
			else
			{
				throw new Exception("llene todos los campos si recibe una remesa");
			}
		}
		else
		{
			throw new Exception("llene todos los campos si recibe una remesa");
		}
	}

	$detalle_solicitud = new Detalle_solicitud;
	if(isset($_POST['enviar']))
	{
		$id_solicitud = $detalle_solicitud->getSolicitud();
		$detalle_solicitud->setIdSolicitud($id_solicitud[0]);
		$detalle_solicitud->createDetalle();				
	}
}
catch(Exception $error)
{
	Page::showMessage(2, $error->getMessage(), null);
}
require_once("../../app/views/public/solicitud/solicitud_view.php");

?>