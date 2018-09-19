<?php 
require_once("../../app/models/pagos.class.php");
try{
    $pagos = new Pagos;
    $data = $pagos->getPagos();
    /*VISTA GENERAL DE SOLICITUDES*/
    if($data){
        require_once("../../app/views/dashboard/pagos/index_view.php");
    }else{
        Page::showMessage(3, "No se encontraron", "");
    }

}catch(Exception $error){
    Page::showMessage(2, $error->getMessage(), "");
}
?>