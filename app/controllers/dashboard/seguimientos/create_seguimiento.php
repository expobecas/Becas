<?php
require_once("../../../models/database.class.php");
require_once("../../../helpers/validator.class.php");
require_once('../../../models/seguimiento_casos.class.php');

try
{
	class create_seguimiento
	{
		function create()
		{

			$seguimiento_casos = new Seguimiento_casos;

			if($seguimiento_casos->setPeriodo($_POST['periodo']))
			{
				if($seguimiento_casos->setDescripcion($_POST['descripcion_segui']))
				{
					if($seguimiento_casos->setSoluciones($_POST['solucion']))
					{
						if($seguimiento_casos->setIdCaso($_POST['id_caso']))
						{
							if($seguimiento_casos->createSeguimiento())
							{

							}
							else
							{
								echo Database::getException();
							}
						}
						else
						{
							throw new Exception("Seleccione un caso");
						}
					}
					else
					{
						throw new Exception("Ingrese las soluciones");		
					}
				}
				else
				{
					throw new Exception("Ingrese la descripcion");
				}
			}
			else
			{
				throw new Exception("Seleccione un periodo");
			}	
		}
	}
	$object = new create_seguimiento;
	$object->create();
	
}
catch(Exception $error)
{
	echo $error->getMessage();
}
?>