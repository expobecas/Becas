<?php
require_once("../../../models/database.class.php");
require_once("../../../helpers/validator.class.php");
require_once('../../../models/seguimiento_casos.class.php');
try
{
    $seguimiento = new Seguimiento_casos;
    $seguimiento->setIdCaso($_POST['id_caso']);
    $seguimientos = $seguimiento->getSeguimientos();
    echo json_encode($seguimientos);

}
catch(Exception $error)
{
    echo $error->getMessage();
}
?>