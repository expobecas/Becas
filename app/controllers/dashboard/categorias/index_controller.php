<?php 
require_once("../../app/models/categorias.class.php");
try{
    $categorias = new Categorias;
    $data = $categorias->getCategorias();
    /*VISTA GENERAL DE SOLICITUDES*/
    if($data){
        require_once("../../app/views/dashboard/categorias/index_view.php");
    }else{
        Page::showMessage(3, "No se encontraron solicitudes", "");
    }

}catch(Exception $error){
    Page::showMessage(2, $error->getMessage(), "");
}
?>