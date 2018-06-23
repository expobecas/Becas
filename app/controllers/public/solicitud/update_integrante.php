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
            $dato = $integrante->getSolicitud();
            foreach($dato as $row)
            {
                $id_solicitud = $row;
            }

			$nombres = $_POST['nombres'];
			$apellidos = $_POST['apellidos'];
            $paretesco = $_POST['parentesco'];
			$fecha_nacimiento = $fecha;
			$profesion_ocupacion = $_POST['profesion'];
			$lugar_trabajo = $_POST['lugar_trabajo'];
            $tel_trabajo = $_POST['tel_trabajo'];
            $integrante->setSalario($_POST['salariocoma']);
            $integrante->setIdIntegrante($_POST['id']);
            $integrante->setIdSolicitud($id_solicitud);
            if($integrante->updateIntegrante($nombres, $apellidos, $paretesco, $fecha_nacimiento, $profesion_ocupacion))
            {
                Component::showMessage(1, "integrante modificado", "");
            }
            else
            {
                throw new Exception(Database::getException());
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