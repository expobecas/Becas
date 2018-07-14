<?php
require_once("../../../models/database.class.php");
require_once("../../../helpers/validator.class.php");
require_once("../../../helpers/component.class.php");
require_once("../../../models/citas.class.php");
try
{
    class Controlador
    {
        function update()
        {
            $evento = new Citas;
            $id = $_POST['id'];
            $titulo = $_POST['title']; 
            $descripcion = $_POST['descripcion'];
            $inicio = $_POST['start'];
            $fin = $_POST['end'];
            $evento->updateEvento($titulo, $descripcion, $inicio, $fin, $id);
        }
    }

    $object = new Controlador();
    $object->update();
}
catch(Exception $error)
{
    Component::showMessage(4, $error->getMessage(), null);
}
?>