<?php
require_once("../../../models/database.class.php");
require_once("../../../helpers/validator.class.php");
require_once('../../../models/casos.class.php');
try
{
    $_SESSION['lapso'] = time();
    $caso = new Casos;
    $caso->setIdCaso($_POST['id_caso']);
    $caso->setDescripcion($_POST['descripcion']);
    $caso->updateCaso();
}
catch(Exception $error)
{
    Page::showMessage(2, $error->getMessage(), "");
}
?>