<?php
require_once("../../../models/database.class.php");
require_once("../../../helpers/validator.class.php");
require_once("../../../helpers/component.class.php");
require_once("../../../models/detalle_solicitud.php");

try
{
    class detallesolicitud
    {
        function create()
        {
            $detalle_solicitud = new Detalle_solicitud;
            $detalle_solicitud->setIdEstado(1);
            $detalle_solicitud->setIdSolicitud($_POST['id_solicitud']);
            if($detalle_solicitud->createDetalle())
            {
                echo 1;
            }
            else
            {
                echo 0;
            }
        }
    }
    $object = new detallesolicitud();
    $object->create();
}
catch(Exception $error)
{
    Component::showMessage(4, $error->getMessage(), null);
}
?>