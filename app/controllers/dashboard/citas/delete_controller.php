<?php
require_once("../../../models/database.class.php");
require_once("../../../helpers/validator.class.php");
require_once("../../../helpers/component.class.php");
require_once("../../../models/citas.class.php");
try
{
    class Controlador
    {
        function delete()
        {
            $evento = new Citas;
            $id = $_POST['id'];
            $evento->deleteEvento($id);
        }
    }

    $object = new Controlador();
    $object->delete();
}
catch(Exception $error)
{
    Component::showMessage(4, $error->getMessage(), null);
}
?>