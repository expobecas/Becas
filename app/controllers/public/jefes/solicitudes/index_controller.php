<?php 
require_once("../../../app/models/solicitud.class.php");
try{
    $solicitud2 = new Solicitud;
    $data = $solicitud2->getAprobadas();
    $data2 = $solicitud2->getRechazadas();
    /*VISTA GENERAL DE SOLICITUDES APROBADAS*/
    if($data){
        require_once("../../../app/views/public/jefes/solicitudes/index_view.php");
    }else{
        Page::showMessage(3, "No se encontraron solicitudes aprobadas", "");
    }
    /*VISTA GENERAL DE SOLICITUDES REPROBADAS*/
    if($data2){
        require_once("../../../app/views/public/jefes/solicitudes/index_view.php");
    }else{
        Page::showMessage(3, "No se encontraron solicitudes rechazadas", "");
    }

}catch(Exception $error){
    Page::showMessage(2, $error->getMessage(), "");
}
?>