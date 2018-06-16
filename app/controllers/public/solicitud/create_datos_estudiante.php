<?php
require_once("../../../models/database.class.php");
require_once("../../../helpers/validator.class.php");
require_once("../../../helpers/component.class.php");
require_once("../../../models/solicitud.class.php");

try
{
    class Datos_estudiante
    {
        function create()
        {
            $solicitud = new Solicitud;

            $id_genero = $_POST['genero'];
            $religion = $_POST['religion'];
            $encargado = $_POST['familia'];
            $direccion = $_POST['direccion'];
            $correo = $_POST['correo'];
            $solicitud->setTelFijo($_POST['fijo']);
            $solicitud->setCelMama($_POST['madre']);
            $solicitud->setCelPapa($_POST['padre']);
            $solicitud->setCelHijo($_POST['hijo']);
            $fecha_nacimiento = $_POST['fecha_naci'];
            $lugar_nacimiento = $_POST['lugar'];
            $pais_nacimiento = $_POST['pais_naci'];
            $estudios_finan = $_POST['financiados'];
            
            $data = $solicitud->getInstitucion();
            foreach($data as $row)
            {
                $id_institucion_proveniente = $row;
            }
            $solicitud->setIdInstitucion($id_institucion_proveniente);
            $solicitud->createSolicitud($id_genero, $religion, $encargado, $direccion, $correo, $fecha_nacimiento, $lugar_nacimiento, $pais_nacimiento, $estudios_finan, $id_institucion_proveniente);
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