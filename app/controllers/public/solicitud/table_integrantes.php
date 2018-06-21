<?php
require_once("../../../models/database.class.php");
require_once("../../../helpers/validator.class.php");
require_once("../../../helpers/component.class.php");
require_once("../../../models/integrante_familia.class.php");

try
{
    $integrante_familia = new Integrante_familia;
    $integrantes = $integrante_familia->getIntegranteTable();
    echo json_encode($integrantes);

}
catch(Exception $error)
{
	Component::showMessage(2, $error->getMessage(), null);
}
?>