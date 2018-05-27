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
			$nombres = $_POST['nombres'];
			$apellidos = $_POST['apellidos'];
            $paretesco = $_POST['parentesco'];
            $fecha = str_replace('-', '/', $_POST['fecha_nacimiento']);
			$fecha_nacimiento = $fecha;
			$profesion_ocupacion = $_POST['profesion'];
			$lugar_trabajo = $_POST['lugar_trabajo'];
            $tel_trabajo = $_POST['tel_trabajo'];
            echo($tel_trabajo);
            $integrante->setSalario($_POST['salario']);
            if($integrante->createIntegrante($nombres, $apellidos, $paretesco, $fecha_nacimiento, $profesion_ocupacion, $lugar_trabajo, $tel_trabajo))
            {
                Component::showMessage(1, "integrante agregada", "");
            }
            else
            {
                throw new Exception(Database::getException());
            }
            
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