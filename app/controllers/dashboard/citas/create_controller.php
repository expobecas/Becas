<?php
require_once("../../../models/database.class.php");
require_once("../../../helpers/validator.class.php");
require_once("../../../helpers/component.class.php");
require_once("../../../models/citas.class.php");
try
{
    class Controlador
    {
        function create()
        {
            $citas = new Citas;
            $citas->setIdDetalle($_POST['id_detalle']);
            $titulo = $_POST['title']; 
            $descripcion = $_POST['descripcion'];
            $color = $_POST['color'];
            $colortext = $_POST['textColor'];
            $inicio = $_POST['start'];
            $fin = $_POST['end'];
            $citas->createEvento($titulo, $descripcion, $color, $colortext, $inicio, $fin);
        }
    }

    $object = new Controlador();
    $object->create();
}
catch(Exception $error)
{
    Component::showMessage(4, $error->getMessage(), null);
}
?>