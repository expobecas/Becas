<!--CONTROLADOR PARA AGREGAR PATROCINADOR-->
<?php
require_once ("../../app/models/patrocinadores.class.php");

try
	{
	$patrocinadores = new Patrocinadores;
	if (isset($_POST['crear'])) //NOMBRE DEL BOTÓN 
		{
		$_POST = $patrocinadores->validateForm($_POST); //MANDA OCULTA LAS VARIABLES, NO SE MUESTRAN EN LA URL
		if ($patrocinadores->setTipo($_POST['categoria']))
			{
			if ($patrocinadores->setProfesion($_POST['profesion']))
				{
				if ($patrocinadores->setCargo($_POST['cargo']))
					{
					if ($patrocinadores->setNombre_empresa($_POST['empresa']))
						{
						if ($patrocinadores->setNombres($_POST['nombres']))
							{
							if ($patrocinadores->setApellidos($_POST['apellidos']))
								{
								if ($patrocinadores->setDireccion($_POST['direccion']))
									{
									if ($patrocinadores->setTelefono($_POST['telefono']))
										{
										if ($patrocinadores->setCorreo($_POST['correo']))
											{
											if ($patrocinadores->CreatePatrocinadores()) //CONSULTA DONDE SE CREA EL PATROCINADOR
												{
												Page::showMessage(1, "Categoría creada", "../../dashboard/patrocinadores/index.php");
												}
											  else
												{
												throw new Exception("Error al crear");
												}
											}
										  else
											{
											throw new Exception("Correo invalida");
											}
										}
									  else
										{
										throw new Exception("Telefono invalida");
										}
									}
								  else
									{
									throw new Exception("Dirección invalida");
									}
								}
							  else
								{
								throw new Exception("Apellidos invalida");
								}
							}
						  else
							{
							throw new Exception("Nombres invalida");
							}
						}
					  else
						{
						throw new Exception("Empresa invalida");
						}
					}
				  else
					{
					throw new Exception("Cargo invalida");
					}
				}
			  else
				{
				throw new Exception("Profesion invalida");
				}
			}
		  else
			{
			throw new Exception("Error al envíar los datos");
			}
		}
	}

catch(Exception $error)
	{
	Page::showMessage(2, $error->getMessage() , "");
	}

require_once ("../../app/views/dashboard/patrocinadores/agregar_view.php"); //VISTA DEL FORM AGREGAR

?>
