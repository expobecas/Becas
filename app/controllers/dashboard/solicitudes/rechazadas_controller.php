<?php 
require_once("../../app/models/solicitud.class.php");
try{
    $solicitud = new Solicitud;
    if($solicitud->setId_estado(3)){
         $data = $solicitud->getArchivoSolicitud();
        if($data){
            require_once("../../app/views/dashboard/solicitudes/rechazadas_view.php");
        }else{
            Page::showMessage(3, "No se encontraron solicitudes rechazadas", "../../dashboard/solicitudes/index.php");
        }
    }else{
        Page::showMessage(3, "No se encontraron solicitudes", "../../dashboard/solicitudes/index.php");
    }
}catch(Exception $error){
    Page::showMessage(2, $error->getMessage(), "");
}
?>