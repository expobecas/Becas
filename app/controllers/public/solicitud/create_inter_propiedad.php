<?php
require_once("../../../models/database.class.php");
require_once("../../../helpers/validator.class.php");
require_once("../../../helpers/component.class.php");
require_once("../../../models/intermedia_propiedad.class.php");

try
{
    class inter_propiedad
    {
        function create()
        {
            $intermedia_propiedad = new Intermedia_propiedad;
            $intermedia_propiedad->setIdSolicitud($_POST['id_solicitud']);

            $integrantes = $intermedia_propiedad->getIntegrantes();
            $idpropiedad = $_POST['id_propiedad'];
            if($integrantes && $idpropiedad)
            {
                $i = 0;
                $j = 0;
                $c=count($integrantes);

                for($i ; $i<$c; $i++)
                {
                    $intermedia_propiedad->setIdIntegrante($integrantes[$i][$j]);
                    $intermedia_propiedad->setIdPropiedad($idpropiedad);
                    if($intermedia_propiedad->createInterPropiedad())
                    {
                    }
                    else
                    {
                        echo json_decode(Database::getException());
                    }
                }
            }
            else
            {
                echo json_decode(Database::getException());
            }
        }
    }
    $object = new inter_propiedad();
    $object->create();
}
catch(Exception $error)
{
    Component::showMessage(4, $error->getMessage(), null);
}
?>