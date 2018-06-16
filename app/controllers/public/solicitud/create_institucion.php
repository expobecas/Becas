<?php
require_once("../../../models/database.class.php");
require_once("../../../helpers/validator.class.php");
require_once("../../../helpers/component.class.php");
require_once("../../../models/institucion_proveniente.class.php");

try
{
    class institucion
    {
        function create()
        {
            $institucion_proveniente = new Institucion_Proveniente;

            //Obteniendo datos para el insert de la tabla institucion_proveniente
            $nombre_institucion = $_POST['institucion_prov'];
            $lugar_institucion = $_POST['departamento'];
            $institucion_proveniente->setCuotaPagaba($_POST['cuotacoma']);
            $cuota_pagaba = $_POST['cuotacoma'];
            $año = $_POST['año_realizaba'];

            if($institucion_proveniente->createInstitucion($nombre_institucion, $lugar_institucion, $cuota_pagaba, $año))
            {
                Component::showMessage(1, "integrante agregada", "");
            }
            else
            {
                throw new Exception(Database::getException());
            }
        }
    }
    $object = new institucion();
    $object->create();
}
catch(Exception $error)
{
    Component::showMessage(4, $error->getMessage(), null);
}
?>