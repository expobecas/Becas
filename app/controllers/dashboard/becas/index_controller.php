<?php 
require_once("../../app/models/becas.class.php");
try{
    $_SESSION['lapso'] = time();
    $becas = new Becas;
    $data = $becas->getBecas2();
    /*VISTA GENERAL DE SOLICITUDES*/
    if($data){
        require_once("../../app/views/dashboard/becas/index_view.php");
    }else{
        Page::showMessage(3, "No se encontraron becas", "");
    }

}catch(Exception $error){
    Page::showMessage(2, $error->getMessage(), "");
}
?>