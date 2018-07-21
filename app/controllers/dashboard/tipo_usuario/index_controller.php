<?php 
require_once("../../app/models/tipo_usuario.class.php");
try{
    $tipo = new Tipo;
    $data = $tipo->getTipos();
    /*VISTA GENERAL DE SOLICITUDES*/
    if($data){
        require_once("../../app/views/dashboard/tipo_usuario/index_view.php");
    }else{
        Page::showMessage(3, "No se encontraron solicitudes", "");
    }

}catch(Exception $error){
    Page::showMessage(2, $error->getMessage(), "");
}
?>