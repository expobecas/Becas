<?php
require_once('../../app/models/casos.class.php');
require_once('../../app/models/detalle_solicitud.php');
try
{
    $caso = new Casos;
    $detalle_solicitud = new Detalle_solicitud;
    $casos = $caso->getCasos();
    if($casos)
    {
        require_once('../../app/views/dashboard/casos/index.php');
    }
    else
    {
        Page::showMessage(3, 'No hay Casos', '../solicitudes/index.php');
    }
}
catch(Exception $error)
{
    Page::showMessage(2, $error->getMessage(), "");
}
?>