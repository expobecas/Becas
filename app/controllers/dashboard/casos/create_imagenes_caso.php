<?php
require_once("../../../models/database.class.php");
require_once("../../../helpers/validator.class.php");
require_once("../../../helpers/utility.class.php");
require_once('../../../models/imagenes_casos.class.php');

try
{
    class create_imagenes_casos
    {
        function create()
        {
            $imagenes_caso = new Imagenes_casos;
            $imagenes_caso->setIdCaso($_POST['id_caso']);
            $i = 0;
            $archivo = $_FILES['archivo'];
            print_r($archivo);
            for($i; $i<count($_FILES['archivo']['name']); $i++)
            {
                $extension = strtolower(pathinfo($_FILES['archivo']['name'][$i], PATHINFO_EXTENSION));
                $nombre = uniqid().".".$extension;
                if($imagenes_caso->setImagenCaso($nombre))
                {
                    if($imagenes_caso->createImagenCaso())
                    {
                        if(move_uploaded_file($_FILES['archivo']['tmp_name'][$i], $imagenes_caso->getRuta().$nombre))
                        {
                            print('Se subio');
                        }
                        else
                        {
                            print('Neles man');
                        }
                    }
                    else
                    {
                        print(Database::getException());
                    }
                }
                else
                {
                    print($imagenes_caso->getImageError());
                }
            }
        }
    }
    $object = new create_imagenes_casos;
    $object->create();
}
catch(Exception $error)
{
    echo $error->getMessage();
}
?>