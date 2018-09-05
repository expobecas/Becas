<?php
require_once("../../app/models/citas.class.php");
try
{
    $_SESSION['lapso'] = time();
    $citas = new Citas;
    $data = $citas->getEventos();
    require_once("../../app/views/dashboard/citas/index.php");
}
catch(Exception $error)
{
    Page::showMessage(2, $error->getMessage(), null);
}
?>