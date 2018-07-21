<?php
require_once('../../app/models/casos.class.php');
require_once('../../app/models/detalle_solicitud.php');
try
{
    $caso = new Casos;
    $detalle_solicitud = new Detalle_solicitud;
    $id_detalle = $_GET['id'];
    if($id_detalle == null)
    {
        Page::showMessage(3, 'Seleccione una solicitud', '../solicitudes/index.php');
    }
    else
    {
        $caso->setIdCita($id_detalle);
        $id_cita = $caso->checkCita();
        if($id_cita == null)
        {
            
<<<<<<< HEAD
            
            require_once('../../app/views/dashboard/casos/create_view.php');
        }
        else
        {
            Page::showMessage(3, 'No se puede hacer un caso, porque no ha asignado una cita', '../solicitudes/index.php');   
=======
            Page::showMessage(3, 'No se puede hacer un caso, porque no ha asignado una cita', '../solicitudes/index.php');
        }
        else
        {
            require_once('../../app/views/dashboard/casos/create_view.php');
>>>>>>> cd05825b6095487627f61f207137a49a45f908f6
        }
    }

    $id_cita = null;
    if(isset($_POST['aprobar']) || isset($_POST['rechazar']))
    {
        date_default_timezone_set("America/El_Salvador");
        $fecha = date("d/m/Y");
        $_POST = $caso->validateForm($_POST);
        if($caso->setDescripcion($_POST['descripcion']))
        {
            if($caso->setFecha($fecha))
            {
                $id_cita = $caso->getIdCitas();
                if($caso->setIdCita($id_cita[0]))
                {
                    if($caso->createCaso())
                    {
                        
                    }
                    else
                    {
                        throw new Exception(Database::getException());
                    }

                    $detalle_solicitud->setIdDetalle($id_detalle);
                    if(isset($_POST['aprobar']))
                    {
<<<<<<< HEAD
                        $detalle_solicitud->setIdEstado(2);
                    }
                    if(isset($_POST['rechazar']))
                    {
                        $detalle_solicitud->setIdEstado(3);
=======
                        $detalle_solicitud->setIdEstado(3);
                    }
                    if(isset($_POST['rechazar']))
                    {
                        $detalle_solicitud->setIdEstado(2);
>>>>>>> cd05825b6095487627f61f207137a49a45f908f6
                    }
                    if($detalle_solicitud->updateDetalleSolicitud())
                    {
                        Page::showMessage(1, "El Caso se creo con exito", "../solicitudes/index.php");
                    }
                }
            }
            else
            {
                throw new Exception("Ocurrió un problema, contacte al administrador");
            }
        }
        else
        {
            throw new Exception("Describa el caso");
        }
    }
}
catch(Exception $error)
{
    Page::showMessage(2, $error->getMessage(), "");
}
?>