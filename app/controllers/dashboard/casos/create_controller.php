<?php
require_once('../../app/models/casos.class.php');
require_once('../../app/models/detalle_solicitud.php');
require_once('../../app/models/imagenes_casos.class.php');
require_once("../../app/helpers/component.class.php");
try
{
    $caso = new Casos;
    $detalle_solicitud = new Detalle_solicitud;
    $imagenes_casos = new Imagenes_casos;
    $id = '';
    $id_encrypt = $_GET['id'];
    if($id_encrypt == null || strlen($id_encrypt) != 60)
    {
        Page::showMessage(3, 'Seleccione una solicitud', '../solicitudes/index.php');
    }
    else
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
        $id_citatbCasos = $detalle_solicitud->checkCitatbCasos();
        $id_citatbCitas = $detalle_solicitud->checkCitatbCitas();

        if($id_citatbCitas == null)
        {
            Page::showMessage(3, 'No se puede generar un caso, porque no ha asignado una cita a la solicitud', '../solicitudes/index.php');
        }
        /*if($id_citatbCasos != null)
        {
            Page::showMessage(3, 'Ya generó un caso para está solicitud', '../solicitudes/index.php');
        }
        /*if($id_citatbCasos == null)
        {*/
            require_once('../../app/views/dashboard/casos/create_view.php');
        //}
    }
}
catch(Exception $error)
{
    Page::showMessage(2, $error->getMessage(), "");
}
?>