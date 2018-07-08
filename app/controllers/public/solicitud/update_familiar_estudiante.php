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

            $depende = $_POST['depende'];
            $grado = $_POST['grado'];
            $institucion = $_POST['institucion'];
            $id_integrante = $_POST['id'];

            $familiares_estudiante->setIdIntegrante($_POST['id']);

            $familiar = $familiares_estudiante->getFamiliarEstudiante();
            if(!$familiar)
            {
                $familiares_estudiante->createFamiliarEstudiante($depende, $grado, $institucion, $cuota, $id_integrante);
            }
            else
            {
                $familiares_estudiante->updateFamiliarEstudiante($depende, $grado, $institucion, $cuota);
            }           
		}
    }
    
	$object = new Familiares_estudiando();
	$object->update();
}
catch(Exception $error)
{
	Component::showMessage(2, $error->getMessage(), null);
}
?>