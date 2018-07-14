<?php
require_once("../../../models/database.class.php");
require_once("../../../helpers/validator.class.php");
require_once("../../../helpers/component.class.php");
require_once("../../../models/solicitud.class.php");

try
{
    session_start();
    class Datos_estudiante
    {
        function create()
        {
            $solicitud = new Solicitud;
            
            $solicitud->setIdEstudiante($_SESSION['id_estudiante']);
            $solicitud->setIdGenero($_POST['genero']);
            $solicitud->setReligion($_POST['religion']);
            $solicitud->setEncargado($_POST['familia']);
            $solicitud->setDireccion($_POST['direccion']);
            $solicitud->setCorreo($_POST['correo']);
            $solicitud->setTelFijo($_POST['fijo']);
            $solicitud->setCelMama($_POST['madre']);
            $solicitud->setCelPapa($_POST['padre']);
            $solicitud->setCelHijo($_POST['hijo']);
            $solicitud->setFechaNacimiento($_POST['fecha_naci']);
            $solicitud->setLugarNacimiento($_POST['lugar']);
            $solicitud->setPaisNacimiento($_POST['pais_naci']);
            $solicitud->setEstudiosFinan($_POST['financiados']);
            
            $data = $solicitud->getInstitucion();
            $id_institucion_proveniente = $data[0];

            $solicitud->setIdInstitucion($id_institucion_proveniente);
            $solicitud->createSolicitud();
        }
    }
    $object = new Datos_estudiante();
    $object->create();
}
catch(Exception $error)
{
    Component::showMessage(4, $error->getMessage(), null);
}
?>