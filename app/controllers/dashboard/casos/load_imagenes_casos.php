<?php
require_once("../../../models/database.class.php");
require_once("../../../helpers/validator.class.php");
require_once('../../../models/imagenes_casos.class.php');

try
{
	$imagenes_casos = new Imagenes_casos;
	$imagenes_casos->setIdCaso($_POST['id_caso']);
	$imagenes = $imagenes_casos->getImagenes();
	echo json_encode($imagenes);
}
catch(Exception $error)
{
	echo $error->getMessage();
}
?>