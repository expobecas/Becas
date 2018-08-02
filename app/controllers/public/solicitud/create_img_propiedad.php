<?php
require_once("../../../models/database.class.php");
require_once("../../../helpers/validator.class.php");
require_once("../../../helpers/utility.class.php");
require_once("../../../helpers/component.class.php");
require_once("../../../models/imagenes_propiedad.class.php");

try
{
    class imagen_propiedad
    {
        function create()
        {
            $imagen_propiedad = new Imagenes_propiedad;
            //echo $_FILES['archivo']['name'];
            $imagen_propiedad->setIdPropiedad($_POST['id_propiedad']);
            if($imagen_propiedad->setImagenPropiedad($_FILES['archivo']))
            {
                if($imagen_propiedad->createImagenPropiedad())
                {
                    if(Utility::saveFile($_FILES['archivo'], $imagen_propiedad->getRuta(), $imagen_propiedad->getImagenPropiedad()))
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
                print($imagen_propiedad->getImageError());
            }
        }
    }
    $object = new imagen_propiedad();
    $object->create();
}
catch(Exception $error)
{
    Component::showMessage(4, $error->getMessage(), null);
}
?>