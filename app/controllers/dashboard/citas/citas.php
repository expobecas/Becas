<?php
require_once("../../app/models/citas.class.php");
try
{
    $citas = new Citas;
    $data = $citas->getEventos();
    $id_detalle = $citas->setIdDetalle($_GET['id']);
    require_once("../../app/views/dashboard/citas/index.php");
}
catch(Exception $error)
{
    Page::showMessage(2, $error->getMessage(), null);
}
?>