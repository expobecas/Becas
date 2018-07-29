<?php
require_once("../../../models/database.class.php");
require_once("../../../helpers/validator.class.php");
require_once("../../../helpers/component.class.php");
require_once("../../../models/familiares_estudiante.class.php");
try
{
    class Familiares_estudiando
	{
		function update()
		{
            $familiares_estudiante = new Familiares_estudiante;
            $familiares_estudiante->setDepende($_POST['depende']);
            $familiares_estudiante->setGrado($_POST['grado']);
            $familiares_estudiante->setInstitucion($_POST['institucion']);
            $cuota = str_replace(',', '.', str_replace('.', '', $_POST['cuota_inte']));
            $familiares_estudiante->setCuota($cuota);

            $familiares_estudiante->setIdIntegrante($_POST['id']);

            $familiar = $familiares_estudiante->getFamiliarEstudiante();
            if(!$familiar)
            {
                $familiares_estudiante->createFamiliarEstudiante();
            }
            else
            {
                if($familiares_estudiante->updateFamiliarEstudiante())
                {

                }
                else
                {
                    echo json_decode(Database::getException());
                }
            }           
		}
    }
    
	$object = new Familiares_estudiando();
	$object->update();
}
catch(Exception $error)
{
    echo json_decode($error->getMessage());
}
?>