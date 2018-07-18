<?php 
require_once("../../../app/models/patrocinadores.class.php");
try{
    $patrocinadores = new Patrocinadores;
    $data = $patrocinadores->getPatrocinadores();
    /*VISTA GENERAL DE SOLICITUDES*/
    if($data){
        require_once("../../../app/views/public/jefes/patrocinadores/index_view.php");
    }else{
        Page::showMessage(3, "No se encontraron solicitudes", "");
    }

}catch(Exception $error){
    Page::showMessage(2, $error->getMessage(), "");
}
?>