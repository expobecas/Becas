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
            if($_POST['id_detalle'] != null)
            {
                $citas = new Citas;
                $titulo = $_POST['title']; 
                $descripcion = $_POST['descripcion'];
                $color = $_POST['color'];
                $colortext = $_POST['textColor'];
                $inicio = $_POST['start'];
                $fin = $_POST['end'];
                
                $ids_detalle = $citas->getIdDetalles();
                $ids_detalle = $ids_detalle[0];
                $id_encrypt = $_POST['id_detalle'];
                $id_detalle = "";
                $id = "";
                foreach($ids_detalle as $row)
                {
                    $id_detalle = $row[0];
                    if(password_verify($id_detalle, $id_encrypt))
                    {
                        
                        $id = $id_detalle;
                        
                    }
                }
                if($citas->setIdDetalle($id))
                {
                    if($citas->createEvento($titulo, $descripcion, $color, $colortext, $inicio, $fin))
                    {

                    }
                    else
                    {
                        echo Database::getException();
                    }
                }
                else
                {
                    echo 'id_error';
                }
            }
            else
            {
                echo 'id_error';
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