<?php
require_once('../../app/models/casos.class.php');
require_once('../../app/models/detalle_solicitud.php');
try
{
    $_SESSION['lapso'] = time();
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
        $id_citatbCasos = $caso->checkCitatbCasos();
        $id_citatbCitas = $caso->checkCitatbCitas();

        if($id_citatbCitas == null)
        {
            Page::showMessage(3, 'No se puede generar un caso, porque no ha asignado una cita a la solicitud', '../solicitudes/index.php');
        }
        if($id_citatbCasos != null)
        {
            Page::showMessage(3, 'Ya generó un caso para está solicitud', '../solicitudes/index.php');
        }
        if($id_citatbCasos == null)
        {
            require_once('../../app/views/dashboard/casos/create_view.php');
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
                        $detalle_solicitud->setIdEstado(3);
                    }
                    if(isset($_POST['rechazar']))
                    {
                        $detalle_solicitud->setIdEstado(2);
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
            throw new Exception("Describa el caso y no sobre pase 500 digitos");
        }
    }
}
catch(Exception $error)
{
    Page::showMessage(2, $error->getMessage(), "");
}
?>