<?php 
require_once("../../../app/models/becas.class.php");
try{
    $becas = new Becas;
    $data = $becas->getBecas();
    /*VISTA GENERAL DE SOLICITUDES*/
    if($data){
        require_once("../../../app/views/public/jefes/becas/index_view.php");
    }else{
        Page::showMessage(3, "No se encontraron becas", "");
    }

}catch(Exception $error){
    Page::showMessage(2, $error->getMessage(), "");
}
?>