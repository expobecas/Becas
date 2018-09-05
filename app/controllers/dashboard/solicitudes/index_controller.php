<?php 
require_once("../../app/models/solicitud.class.php");
try{
    $solicitud2 = new Solicitud;
    $data = $solicitud2->getVistageneral();
    $data2 = $solicitud2->getUltimasSol();
    /*VISTA GENERAL DE SOLICITUDES*/
    if($data){
        require_once("../../app/views/dashboard/solicitudes/index_view.php");
    }else{
        Page::showMessage(3, "No se encontraron solicitudes", "");
    }
    /*ULTIMAS SOLICITUDES ENTRANTES*/
    if($data2){
        require_once("../../app/views/dashboard/solicitudes/index_view.php");
    }else{
        Page::showMessage(3, "No se encontraron solicitudes", "");
    }

}catch(Exception $error){
    Page::showMessage(2, $error->getMessage(), "");
}
?>