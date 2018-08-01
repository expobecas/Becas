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
            $institucion_proveniente->setNombre($_POST['institucion_prov']);
            $institucion_proveniente->setLugar($_POST['departamento'].', '.$_POST['pais']);
            $cuota = 0.00;
            if($_POST['cuotacoma'] != null)
            {
                $cuota = $_POST['cuotacoma'];
            }
            $institucion_proveniente->setCuotaPagaba($cuota);
            $institucion_proveniente->setAño($_POST['año_realizaba']);

            if($institucion_proveniente->createInstitucion())
            {
                
            }
            else
            {
                echo json_decode(Database::getException());
            }
            $id_institucion = $institucion_proveniente->getIdInstitucion();
            echo json_decode($id_institucion);
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