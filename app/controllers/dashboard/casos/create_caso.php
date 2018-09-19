<?php
require_once("../../../models/database.class.php");
require_once("../../../helpers/validator.class.php");
require_once('../../../models/casos.class.php');
require_once('../../../models/detalle_solicitud.php');
try
{
    class create_caso
    {
        function create()
        {
            $caso = new Casos;
            $detalle_solicitud = new Detalle_solicitud;

            $id_encrypt = $_POST['id'];
            if($id_encrypt != null || strlen($id_encrypt) == 60)
            {
                $ids_detalle = $caso->getIdDetalles();
                foreach($ids_detalle as $row)
                {
                    $id_detalle = $row[0];
                    if(password_verify($id_detalle, $id_encrypt))
                    {
                        $id = $id_detalle;
                    }
                }

                $detalle_solicitud->setIdDetalle($id);
                $id_citatbCitas = $detalle_solicitud->checkCitatbCitas();
            

                date_default_timezone_set("America/El_Salvador");
                $fecha = date("d/m/Y");
                $_POST = $caso->validateForm($_POST);
                if($caso->setDescripcion($_POST['descripcion_c']))
                {
                    if($caso->setIdCita($id_citatbCitas[0]))
                    {
                        if($caso->setFecha($fecha))
                        {
                            if($caso->createCaso())
                            {

                            }
                            else
                            {
                                echo Database::getException();
                            }

                            if($detalle_solicitud->setIdDetalle($id))
                            {
                                if($_POST['accion'] == 'aprobar')
                                {
                                    $detalle_solicitud->setIdEstado(3);
                                }
                                if($_POST['accion'] == 'rechazar')
                                {
                                    $detalle_solicitud->setIdEstado(2);
                                }
                                if($detalle_solicitud->updateDetalleSolicitud())
                                {
                                    
                                }
                                else
                                {
                                    echo Database::getException();
                                }
                            }
                            else
                            {
                                echo 'neles';
                            }
                        }
                        else
                        {
                            echo "Ocurrió un problema, contacte al administrador";
                        }
                    }
                    else
                    {
                        echo "Ocurrió un problema, contacte al administrador";
                    }
                }
                else
                {
                    echo "Describa el caso y no sobre pase 500 digitos";
                }
                $id_caso = $caso->getIdCaso();
                echo $id_caso;
            }
            else
            {
                echo 'id';
            }
        }
    }

    $object = new create_caso;
    $object->create();
}
catch(Exception $error)
{
    echo $error->getMessage();
}
?>