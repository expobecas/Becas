<?php
require_once ("../../app/models/usuario.class.php");

try
	{
	$usuario = new Usuario;
	if (isset($_POST['crear']))
		{
		$_POST = $usuario->validateForm($_POST);
		$contra = $_POST['contraseña'];
		if ($_POST['contraseña'] == $_POST['contraseña1'])
			{
			if ($_POST['contraseña'] != $_POST['usuario'])
				{
				if ($_POST['contraseña'] != $_POST['correo'])
					{
					if ($_POST['contraseña'] != $_POST['nombres'])
						{
						if ($_POST['contraseña'] != $_POST['apellidos'])
							{
							if ($usuario->setNombres($_POST['nombres']))
								{
								if ($usuario->setApellidos($_POST['apellidos']))
									{
									if ($usuario->setUsuario($_POST['usuario']))
										{
										if ($usuario->setClave($_POST['contraseña']))
											{
											if ($usuario->setTipo($_POST['tipo']))
												{
												if ($usuario->setCorreo($_POST['correo']))
													{
													if ($usuario->createUsuario())
														{
														Page::showMessage(1, "Usuario creado", "index.php");
														}
													  else
														{
														throw new Exception(Database::getException());
														}
													}
												  else
													{
													throw new Exception("Correo incorrecto");
													}
												}
											  else
												{
												throw new Exception("Categoría incorrecta");
												}
											}
										  else
											{
											throw new Exception("Contraseña incorrecta");
											}
										}
									  else
										{
										throw new Exception("Usuario incorrecto");
										}
									}
								  else
									{
									throw new Exception("Apellidos incorrectos");
									}
								}
							  else
								{
								throw new Exception("Nombres incorrectos");
								}
							}
						  else
							{
							throw new Exception("La contraseña debe ser diferente a los apellidos");
							}
						}
					  else
						{
						throw new Exception("La contraseña debe ser diferente a los nombres");
						}
					}
				  else
					{
					throw new Exception("La contraseña debe ser direfente al correo");
					}
				}
			  else
				{
				throw new Exception("La contraseña debe ser diferente al usuario");
				}
			}
		  else
			{
			throw new Exception("Las contraseñas deben ser iguales");
			}
		}
	}catch(Exception $error)
	{
	Page::showMessage(2, $error->getMessage() , "");
	}

require_once ("../../app/views/dashboard/usuarios/agregar_view.php");

?>