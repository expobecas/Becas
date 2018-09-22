<?php 
require_once("../../app/models/tipo_pago.class.php");
try{
    $tipo = new Tipos;
    $data = $tipo->getTipos();
    /*VISTA GENERAL DE SOLICITUDES*/
    if($data){
        require_once("../../app/views/dashboard/periodo_pago/index_view.php");
    }else{
        Page::showMessage(3, "No se encontraron tipos", "");
    }

}catch(Exception $error){
    Page::showMessage(2, $error->getMessage(), "");
}
?>