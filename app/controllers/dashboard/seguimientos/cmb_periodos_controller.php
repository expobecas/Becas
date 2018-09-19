<?php
require_once("../../../models/database.class.php");
require_once("../../../helpers/validator.class.php");
require_once('../../../models/seguimiento_casos.class.php');
try
{
    $seguimiento = new Seguimiento_casos;
    $periodos = $seguimiento->getPeriodos();
    echo json_encode($periodos);

}
catch(Exception $error)
{
    echo $error->getMessage();
}
?>