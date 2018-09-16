<?php
require_once("../../../models/database.class.php");
require_once("../../../helpers/validator.class.php");
require_once("../../../helpers/component.class.php");
require_once("../../../models/integrante_familia.class.php");
try
{
    class Integrante
	{
		function update()
		{
            $integrante = new Integrante_familia;
            
            $integrante->setNombres($_POST['nombres']);
            $integrante->setApellidos($_POST['apellidos']);
            $integrante->setParentesco($_POST['parentesco']);
            $fecha = str_replace('-', '/', $_POST['fecha_nacimiento']);
            $integrante->setFechaNacimiento($fecha);
            $integrante->setProfesionOcupacion($_POST['profesion']);
            $integrante->setLugarTrabajo($_POST['lugar_trabajo']);
            $integrante->setTelTrabajo($_POST['tel_trabajo']);
            $integrante->setSalario($_POST['salariocoma']);
            $integrante->setIdIntegrante($_POST['id']);
            if($integrante->updateIntegrante())
            {
                
            }
            else
            {
                echo Database::getException();
            }
            
		}
    }
    
	$object = new Integrante();
	$object->update();
}
catch(Exception $error)
{
	Component::showMessage(2, $error->getMessage(), null);
}
?>