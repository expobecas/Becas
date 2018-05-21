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
	/*//PRIMERA PARTE DEL FOMULARIO SOLICITUD
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
	}*/
	

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
						if($solicitud->setTelFijo($_POST['fijo']) || $solicitud->setTelFijo($_POST['fijo'] == NULL))
						{
							if($solicitud->setCelMama($_POST['madre']) || $solicitud->setCelMama($_POST['madre']) == NULL)
							{
								if($solicitud->setCelPapa($_POST['padre']) || $solicitud->setCelPapa($_POST['padre']) == NULL)
								{
									if($solicitud->setCelHijo($_POST['hijo']) || $solicitud->setCelHijo($_POST['hijo']) == NULL)
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
															if($_POST['fijo'] == NULL && $_POST['madre'] == NULL && $_POST['padre'] == NULL && $_POST['hijo'] == NULL)
															{
																throw new Exception("Ingresar por lo menos un número de telefono");
															}
															elseif($_POST['fijo'] != NULL)
															{
																if($_POST['fijo'] == $_POST['madre'] || $_POST['fijo'] == $_POST['padre'] || $_POST['fijo'] == $_POST['hijo'])
																{
																	throw new Exception("Los números de telefono no deben de ser iguales");
																}
															}
															elseif($_POST['madre'] != NULL)
															{
																if($_POST['madre'] == $_POST['fijo'] || $_POST['madre'] == $_POST['padre'] || $_POST['madre'] == $_POST['hijo'])
																{
																	throw new Exception("Los números de telefono no deben de ser iguales");
																}
															}
															/*elseif($_POST['padre'] != NULL)
															{
																if($_POST['padre'] == $_POST['fijo'] || $_POST['padre'] == $_POST['madre'] || $_POST['padre'] == $_POST['hijo'])
																{
																	throw new Exception("Los números de telefono no deben de ser iguales");
																}
															}
															elseif($_POST['hijo'] != NULL)
															{
																if($_POST['hijo'] == $_POST['fijo'] || $_POST['hijo'] == $_POST['padre'] || $_POST['hijo'] == $_POST['madre'])
																{
																	throw new Exception("Los números de telefono no deben de ser iguales");
																}
															}*/
															else
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
										throw new Exception("Ingrese numero de telefono hijo");
									}
								}
								else
								{
									throw new Exception("Ingrese numero de telefono papa");
								}
							}
							else
							{
								throw new Exception("Ingrese numero de telefono mama");
							}
						}
						else
						{
							throw new Exception("Ingrese numero de telefono fijo");
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

/*
    //SEGUNDA PARTE DEL FOMULARIO SOLICITUD
    //Para llenar la tabla integrantes
    $integrante = new Integrante_familia;

    //Para llenar la tabla familiares estudiante
    $familiares_estudiante = new Familiares_estudiante;

    //Para llenar la tabla imagenes_vehiculo
    $imagenes_vehiculo = new Imagenes_vehiculo;

    //Para llenar la tabla propiedad
    $propiedad = new Propiedad;

    //para llenar la intermedia propiedad
    $intermedia_propiedad = new Intermedia_propiedad;


    //TERCERA PARTE DEL FOMULARIO SOLICITUD
    //Para llenar la tabla gastos mensuales
    $gastos_mensuales = new Gastos_mensuales;

    //Para llenar la tabla grupo familiar
    $grupo_familiar = new Grupo_familiar;

    //Para llenar la tabla remesa familiar
    $remesa_familiar = new Remesa_familiar;*/

    
}
catch(Exception $error)
{
	Page::showMessage(2, $error->getMessage(), null);
}
require_once("../../app/views/public/solicitud/solicitud_view.php");

?>