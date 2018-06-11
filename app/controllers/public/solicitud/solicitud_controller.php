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
try
{
	//PRIMERA PARTE DEL FOMULARIO SOLICITUD
	//Para llenar la tabla institucion proveniente
	$institucion_proveniente = new Institucion_proveniente;
	if(isset($_POST['enviar']))
	{
		$_POST = $institucion_proveniente->validateForm($_POST);
		if($institucion_proveniente->setNombre($_POST['institucion_prov']))
		{
			if($institucion_proveniente->setLugar($_POST['departamento'])) 
			{
				$Cuota = str_replace(',', '.', str_replace('.', '', $_POST['cuota']));
				if($institucion_proveniente->setCuotaPagaba($Cuota))
				{
					if($institucion_proveniente->setAño($_POST['año_realizaba']))
					{
						if($institucion_proveniente->createInstitucion())
						{
							Page::showMessage(1, "institucion agregada", "");
						}
						else
						{
							throw new Exception(Database::getException());
						}
					}
					else
					{
						throw new Exception("Seleccione grado o año que realizaba");
					}
				}
				else
				{
					throw new Exception("Ingrese la cuota que pagaba");
				}
			}
			else
			{
				throw new Exception("Escriba el departamento y el pais de la institución proveniente");
			}
		}
		else
		{
			throw new Exception("Escriba el nombre de la institucion donde proviene");	
		}
	}
	

	//Para llenar la tabla solicitud
	$solicitud = new Solicitud;
	if(isset($_POST['enviar']))
	{
		$_POST = $solicitud->validateForm($_POST);
		if($solicitud->setIdGenero($_POST['genero']))
		{
			if($solicitud->setReligion($_POST['religion']))
			{
				if($solicitud->setEncargado($_POST['familia']))
				{
					if($solicitud->setDireccion($_POST['direccion']))
					{
						if($solicitud->setCorreo($_POST['correo']))
						{
							$errorTelefono = false;
							if($solicitud->setTelFijo($_POST['fijo']))
							{
								$errorTelefono = true;
							}
							if($solicitud->setCelMama($_POST['madre']))
							{
								$errorTelefono = true;
							}
							if($solicitud->setCelPapa($_POST['padre']))
							{
								$errorTelefono = true;
							}
							if($solicitud->setCelHijo($_POST['hijo']))
							{
								$errorTelefono = true;
							}
							if($errorTelefono)
							{
								if($solicitud->setFechaNacimiento($_POST['fecha_naci']))
								{
									if($solicitud->setLugarNacimiento($_POST['lugar']))
									{
										if($solicitud->setPaisNacimiento($_POST['pais_naci']))
										{
											if($solicitud->setEstudiosFinan($_POST['financiados']))
											{
												$data = $solicitud->getInstitucion();
												foreach($data as $row)
												{
													$Id = $row;
													echo $Id;
												}														
												if($solicitud->setIdInstitucion($Id))
												{
													if($solicitud->createSolicitud())
													{
														Page::showMessage(1, "solicitud agregada", "");
													}
													else
													{
														throw new Exception(Database::getException());
													}
												}
												else
												{
													throw new Exception("No hay institucion");
												}
											}
											else
											{
												throw new Exception("Seleccione quien financia sus estudios");
											}
										}
										else
										{
											throw new Exception("Ingrese el pais de nacimiento");
										}
									}
									else
									{
										throw new Exception("Ingrese el lugar de nacimiento");
									}											
								}
								else
								{
									throw new Exception("Seleccione la fecha de nacimiento");
								}
							}
							else
							{
								throw new Exception("Ingrese al menos un número telefónico");
							}
						}
						else
						{
							throw new Exception("Ingrese un correo electrónico");
						}
					}
					else
					{
						throw new Exception("Ingrese la direccion de su casa");
					}
				}
				else
				{
					throw new Exception("Seleccione con quien vive");
				}
			}
			else
			{
				throw new Exception("Ingrese la religion en la que pertenece");
			}
		}
		else
		{
			throw new Exception("Seleccione un genero");
		}
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
	if(isset($_POST['enviar']))
	{
		$_POST = $propiedad->validateForm($_POST);
		if($propiedad->setTipoPropiedad($_POST['tipocasa']))
		{
			if($propiedad->setCuotaMensual($_POST['cuota_mensual']))
			{
				if($propiedad->setValorCasa($_POST['valor_actual']))
				{
					if($propiedad->setTipoVehiculo($_POST['tipo']))
					{
						if($propiedad->setAñoVehiculo($_POST['año']))
						{
							if($propiedad->setValorVehiculo($_POST['valor_vehiculo']))
							{
								if(is_uploaded_file($_FILES['croquis']['tmp_name']))
								{
									if($propiedad->setCroquis($_FILES['croquis']))
									{
										if($propiedad->createPropiedad())
										{
											Page::showMessage(1, "Propiedad creada", "");
										}
										else
										{
											if($propiedad->unsetCroquis())
											{
												throw new Exception(Database::getException());
											}
											else
											{
												throw new Exception("Elimine la imagen manualmente");
											}
										}			
									}
									else
									{
										throw new Exception($propiedad->getImageError());
									}
								}
								else
								{
									throw new Exception("Seleccione una imagen de su vivienda");
								}
							}
						}
					}
				}
			}
		}
	}
	

    //para llenar la intermedia propiedad
    $intermedia_propiedad = new Intermedia_propiedad;


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
							$vigilancia = str_replace(',', '.', str_replace('.', '', $_POST['vigilancia']));
							if($gastos_mensuales->setVigilancia($vigilancia))
							{
								$domesticos = str_replace(',', '.', str_replace('.', '', $_POST['domesticos']));
								if($gastos_mensuales->setServicioDomestico($domesticos))
								{
									$alcaldia = str_replace(',', '.', str_replace('.', '', $_POST['alcaldia']));
									if($gastos_mensuales->setAlcaldia($alcaldia))
									{
										$pago_deudas = str_replace(',', '.', str_replace('.', '', $_POST['pago_deudas']));
										if($gastos_mensuales->setPagoDeudas($pago_deudas))
										{
											$cotizaciones = str_replace(',', '.', str_replace('.', '', $_POST['cotizaciones']));
											if($gastos_mensuales->setCotizacion($cotizaciones))
											{
												$seguro_personal = str_replace(',', '.', str_replace('.', '', $_POST['seguro_personal']));
												if($gastos_mensuales->setSeguroPersonal($seguro_personal))
												{
													$seguro_vehiculo = str_replace(',', '.', str_replace('.', '', $_POST['seguro_vehiculo']));
													if($gastos_mensuales->setSeguroVehiculo($seguro_vehiculo))
													{
														$seguro_inmuebles = str_replace(',', '.', str_replace('.', '', $_POST['seguro_inmuebles']));
														if($gastos_mensuales->setSeguroInmuebles($seguro_inmuebles))
														{
															$transporte = str_replace(',', '.', str_replace('.', '', $_POST['transporte']));
															if($gastos_mensuales->setTransporte($transporte))
															{
																$mant_vehiculo = str_replace(',', '.', str_replace('.', '', $_POST['mant_vehiculo']));
																if($gastos_mensuales->setGastosManteVehiculo($mant_vehiculo))
																{
																	$salud = str_replace(',', '.', str_replace('.', '', $_POST['salud']));
																	if($gastos_mensuales->setSalud($salud))
																	{
																		$pago_asociaciones = str_replace(',', '.', str_replace('.', '', $_POST['pago_asociaciones']));
																		if($gastos_mensuales->setPagosAsociasiones($pago_asociaciones))
																		{
																			$pago_colegiatura = str_replace(',', '.', str_replace('.', '', $_POST['pago_colegiatura']));
																			if($gastos_mensuales->setPagoColegiatura($pago_colegiatura))
																			{
																				$pago_universitarios = str_replace(',', '.', str_replace('.', '', $_POST['pago_universitarios']));
																				if($gastos_mensuales->setPagoUniversidad($pago_universitarios))
																				{
																					$materiales = str_replace(',', '.', str_replace('.', '', $_POST['materiales']));
																					if($gastos_mensuales->setGastosMaterialEstudios($materiales))
																					{
																						$renta = str_replace(',', '.', str_replace('.', '', $_POST['renta']));
																						if($gastos_mensuales->setImpuestoRenta($renta))
																						{
																							$iva = str_replace(',', '.', str_replace('.', '', $_POST['iva']));
																							if($gastos_mensuales->setIva($iva))
																							{
																								$tarjetas_credito = str_replace(',', '.', str_replace('.', '', $_POST['tarjetas_credito']));
																								if($gastos_mensuales->setTarjetaCredito($tarjetas_credito))
																								{
																									$otros_gastos = str_replace(',', '.', str_replace('.', '', $_POST['otros_gastos']));
																									if($gastos_mensuales->setOtros($otros_gastos))
																									{
																										if($gastos_mensuales->createGastos())
																										{
																											Page::showMessage(1, "Los gastos se han guardado", "");
																										}
																										else
																										{
																											throw new Exception(Database::getException());
																										}
																									}
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
																			}
																		}
																	}
																	else
																	{
																		throw new Exception("Ingrese el gasto mensual de salud e higiene");
																	}
																}
															}
															else
															{
																throw new Exception("Ingrese el gasto de bus/taxi en el caso que obtenga vehiculo el gasto de la gasolina");
															}
														}
													}
												}
											}
											else
											{
												throw new Exception("Ingrese las cotizaciones que tiene ya sea hacia el ISSS o la AFP");
											}
										}
									}
									else
									{
										throw new Exception("Ingrese el gasto mensual que paga a la alcaldia");
									}
								}
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
		if($grupo_familiar->setIngresoFamiliar()){}
	}

    //Para llenar la tabla remesa familiar
	$remesa_familiar = new Remesa_familiar;
	if(isset($_POST['enviar']))
	{
		$_POST = $remesa_familiar->validateForm($_POST);
		if($remesa_familiar->setMonto($_POST['monto']))
		{
			if($remesa_familiar->setPeriodoRecibido($_POST['periodo']))
			{
				if($remesa_familiar->setBenefactor($_POST['benecfactor']))
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
			}
		}
	}

    
}
catch(Exception $error)
{
	Page::showMessage(2, $error->getMessage(), null);
}
require_once("../../app/views/public/solicitud/solicitud_view.php");

?>