<?php
require_once("../../../models/database.class.php");
require_once("../../../helpers/validator.class.php");
require_once("../../../helpers/component.class.php");
require_once("../../../models/remesa_familiar.class.php");

try
{
	class Create_Remesa
	{
		function create()
		{
			$remesa_familiar = new Remesa_familiar;
			$remesa_familiar->setMonto($_POST['monto_remesa']);
			$remesa_familiar->setPeriodoRecibido($_POST['periodo']);
			$remesa_familiar->setBenefactor($_POST['benefactor']);
			$remesa_familiar->setIdFamilia($_POST['id_familia']);
			if($remesa_familiar->createRemesa())
			{
				echo 1;
			}
			else
			{
				echo Database::getException(); 
			}

		}
	}
	$object = new Create_Remesa;
	$object->create();

}
catch(Exception $error)
{
	echo $error->getMessage();
}
?>