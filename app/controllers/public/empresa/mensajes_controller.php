<?php 
require_once("../../../app/models/comentarios_empresa.class.php");
try{
        $comentarios = new Comentarios;
        $data = $comentarios->getMensajes();
}catch(Exception $error){
    Page::showMessage(2, $error->getMessage(), null);   
}
require_once("../../../app/views/public/empresa/index/bandeja_view.php");
?>