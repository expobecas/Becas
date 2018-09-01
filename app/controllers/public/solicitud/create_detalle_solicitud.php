<?php
require_once("../../../models/database.class.php");
require_once("../../../helpers/validator.class.php");
require_once("../../../helpers/component.class.php");
require_once("../../../models/detalle_solicitud.php");

try
{
    class detalle_solicitud
    {
        function create()
        {
            $detalle_solicitud = new Detalle_solicitud;
            $detalle_solicitud->setIdEstado(1);
            $detalle_solicitud->setIdSolicitud($_POST['id_solicitud']);
            if($detalle_solicitud->createDetalle())
            {
                Page::showMessage(1, "Solicitud enviada, por favor descarge el PDF, por si ocurre algun problema", "");
            }
        }
    }
    $object = new detalle_solicitud();
    $object->create();
}
catch(Exception $error)
{
    Component::showMessage(4, $error->getMessage(), null);
}
?>