<?php
require_once("../../../models/database.class.php");
require_once("../../../helpers/validator.class.php");
require_once("../../../helpers/component.class.php");
require_once("../../../models/familiares_estudiante.class.php");
try
{
    class Familiares_estudiando
	{
		function create()
		{
            $familiares_estudiante = new Familiares_estudiante;
            $familiares_estudiante->setDepende($_POST['depende']);
            $familiares_estudiante->setGrado($_POST['grado']);
            $familiares_estudiante->setInstitucion($_POST['institucion']);
            $cuota = str_replace(',', '.', str_replace('.', '', $_POST['cuota_inte']));
            $familiares_estudiante->setCuota($cuota);
            $familiares_estudiante->setIdIntegrante($_POST['id_integrante']);
            if($familiares_estudiante->createFamiliarEstudiante())
            {
                Component::showMessage(1, "familiar estudiante agregado", "");
            }
            else
            {
                throw new Exception(Database::getException());
            }
            
		}
    }
    
	$object = new Familiares_estudiando();
	$object->create();
}
catch(Exception $error)
{
	Component::showMessage(2, $error->getMessage(), null);
}
?>