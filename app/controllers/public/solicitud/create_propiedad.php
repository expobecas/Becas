<?php
require_once("../../../models/database.class.php");
require_once("../../../helpers/validator.class.php");
require_once("../../../helpers/component.class.php");
require_once("../../../models/propiedad.class.php");

try
{
    class casa
    {
        function create()
        {
            $propiedad = new Propiedad;
            $propiedad->setTipoPropiedad($_POST['tipo_casa']);
            $cuota_mesual = str_replace(',', '.', str_replace('.', '', $_POST['cuota_mensual']));
            $propiedad->setCuotaMensual($cuota_mesual);
            $valor_actual = str_replace(',', '.', str_replace('.', '', $_POST['valor_actual']));
            $propiedad->setValorCasa($valor_actual);


            if(!$propiedad->createPropiedad())
            {
                echo json_decode(Database::getException());
            }
            $id_propiedad = $propiedad->getIdPropiedad();
            echo json_decode($id_propiedad);
        }
    }
    $object = new casa();
    $object->create();
}
catch(Exception $error)
{
    Component::showMessage(4, $error->getMessage(), null);
}
?>