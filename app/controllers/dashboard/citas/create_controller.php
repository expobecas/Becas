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
            $titulo = $_POST['title']; 
            $descripcion = $_POST['descripcion'];
            $color = $_POST['color'];
            $colortext = $_POST['textColor'];
            $inicio = $_POST['start'];
            $fin = $_POST['end'];
            $citas->setIdDetalle($_POST['id_detalle']);
            if($citas->createEvento($titulo, $descripcion, $color, $colortext, $inicio, $fin))
            {

            }
            else
            {
                echo json_encode(Database::getException());
            }
        }
    }

    $object = new Controlador();
    $object->create();
}
catch(Exception $error)
{
    echo json_encode($error->getMessage());
}
?>