<?php
require_once("../../../models/database.class.php");
require_once("../../../helpers/validator.class.php");
require_once("../../../helpers/component.class.php");
require_once("../../../models/vehiculos.class.php");

try
{
    class vehiculo
    {
        function create()
        {
            $vehiculo = new Vehiculos;
            $vehiculo->setTipoVehiculo($_POST['tipo_vehiculo']);
            $vehiculo->setAño($_POST['año_vehiculo']);
            $valor_vehiculo = str_replace(',', '.', str_replace('.', '', $_POST['valor_vehiculo']));
            $vehiculo->setValorVehiculo($valor_vehiculo);
            $vehiculo->setIdPropiedad($_POST['id_propiedad']);
            if($vehiculo->createVehiculo())
            {
            }
            else
            {
                echo json_decode(Database::getException());
            }
            $vehiculos = $vehiculo->getVehiculos();
            echo json_encode($vehiculos);
        }
    }
    $object = new vehiculo();
    $object->create();
}
catch(Exception $error)
{
    Component::showMessage(4, $error->getMessage(), null);
}
?>