<?php 
require_once("../../../app/models/comentarios.class.php");
try{
        $comentarios = new Comentarios;
        $data = $comentarios->getMensajes();
}catch(Exception $error){
    Page::showMessage(2, $error->getMessage(), null);   
}
require_once("../../../app/views/public/becados/account/mensajes_view.php");
?>