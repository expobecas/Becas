<?php
require_once("../../../models/database.class.php");
require_once("../../../helpers/validator.class.php");
require_once('../../../models/casos.class.php');
try
{
    $_SESSION['lapso'] = time();
    $caso = new Casos;
    $casos = $caso->getCasos();
    echo json_encode($casos);
}
catch(Exception $error)
{
    Page::showMessage(2, $error->getMessage(), "");
}
?>