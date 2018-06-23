<?php
require_once("../../../models/database.class.php");
require_once("../../../helpers/validator.class.php");
require_once("../../../helpers/component.class.php");
require_once("../../../models/integrante_familia.class.php");
require_once("../../../models/familiares_estudiante.class.php");
try
{
    class Integrante
	{
		function delete()
		{
			$integrante = new Integrante_familia;
			$familiar_estudiante = new Familiares_estudiante;

			$familiar_estudiante->setIdIntegrante($_POST['id_integrante']);
			$integrante->setIdIntegrante($_POST['id_integrante']);
			

			$familiar_estudiante->deleteFamiliarEstudiante();
			$integrante->deleteIntegrante();
		}
    }
    
	$object = new Integrante();
	$object->delete();
}
catch(Exception $error)
{
	Component::showMessage(2, $error->getMessage(), null);
}
?>