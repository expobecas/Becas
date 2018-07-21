<?php
require_once('../../app/models/casos.class.php');
<<<<<<< HEAD
=======
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> 5fa3c353cd7c6962fd67c551785619ba461af590
>>>>>>> 543950ee2d7d39aee51bd0cfab3fa78f8f8ddf53
require_once('../../app/models/detalle_solicitud.php');
try
{
    $caso = new Casos;
    $detalle_solicitud = new Detalle_solicitud;
<<<<<<< HEAD
=======
<<<<<<< HEAD
=======
=======
try
{
    $caso = new Casos;
>>>>>>> cd05825b6095487627f61f207137a49a45f908f6
>>>>>>> 5fa3c353cd7c6962fd67c551785619ba461af590
>>>>>>> 543950ee2d7d39aee51bd0cfab3fa78f8f8ddf53
    $casos = $caso->getCasos();
    if($casos)
    {
        require_once('../../app/views/dashboard/casos/index.php');
    }
    else
    {
        Page::showMessage(3, 'No hay Casos', '../solicitudes/index.php');
    }
}
catch(Exception $error)
{
    Page::showMessage(2, $error->getMessage(), "");
}
?>