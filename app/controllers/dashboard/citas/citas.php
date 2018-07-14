<?php
require_once("../../app/models/citas.class.php");
try
{
    $evento = new Citas;
    $data = $evento->getEventos();
    if($data)
    {
        require_once("../../app/views/dashboard/citas/index.php");
    }
}
catch(Exception $error)
{
    Page::showMessage(2, $error->getMessage(), null);
}
?>