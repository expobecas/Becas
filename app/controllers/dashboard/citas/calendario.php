<?php
require_once("../../../models/database.class.php");
require_once("../../../helpers/validator.class.php");
require_once("../../../models/citas.class.php");
try
{
    $_SESSION['lapso'] = time();
    $citas = new Citas;
    $data = $citas->getEventos();
    echo json_encode($data);

}
catch(Exception $error)
{
    Page::showMessage(2, $error->getMessage(), null);
}
?>