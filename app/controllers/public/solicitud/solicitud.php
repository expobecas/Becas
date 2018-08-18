<?php
require_once("../../../models/database.class.php");
require_once("../../../helpers/validator.class.php");
require_once("../../../helpers/component.class.php");
require_once("../../../models/integrante_familia.class.php");
try
{
    class Integrante
	{
		function create()
		{
            $integrante = new Integrante_familia;

            $integrante->setNombres($_POST['nombres']);
            $integrante->setApellidos($_POST['apellidos']);
            $integrante->setParentesco($_POST['parentesco']);
            $integrante->setFechaNacimiento($_POST['fecha_nacimiento']);
            $integrante->setProfesionOcupacion($_POST['profesion']);
            $integrante->setLugarTrabajo($_POST['lugar_trabajo']);
            $integrante->setTelTrabajo($_POST['tel_trabajo']);
            $integrante->setSalario($_POST['salariocoma']);
            $integrante->setIdSolicitud($_POST['id_solicitud']);
            if($integrante->createIntegrante())
            {

            }
            else
            {
                echo json_decode(Database::getException());
            }
            $id_integrante = $integrante->getIdIntegrante();
            echo json_decode($id_integrante);
            
		}
    }
    
	$object = new Integrante();
	$object->create();
}
catch(Exception $error)
{
	Component::showMessage(2, $error->getMessage(), null);
}
?>