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
                print_r($ids_detalle);
                $id_encrypt = $_POST['id_detalle'];
                echo $id_encrypt;
                $i = 0;
                for($i; $i<count($ids_detalle); $i++)
                {
                    $id_detalle = $ids_detalle[$i][0];
                    echo 'id: '.$id_detalle;

                    if(password_verify($id_detalle, $id_encrypt))
                    {
                        $id = $id_detalle;
                        echo $id;
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