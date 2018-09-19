<?php
require_once("../../../models/database.class.php");
require_once("../../../helpers/validator.class.php");
require_once('../../../models/casos.class.php');
try
{
    $caso = new Casos;
    if(isset($_POST['buscar']))
    {
        $casos = $caso->searchCasos($_POST['buscar']);
        echo json_encode($casos);
    }
    else
    {
        $casos = $caso->getCasos();
        echo json_encode($casos);
    }
}
catch(Exception $error)
{
    echo $error->getMessage();
}
?>