<?php 
require_once("../../../app/models/comentarios.class.php");
try{
    if(isset($_GET['id'])){
        $comentarios = new Comentarios;
        if($comentarios->setId_estudiante($_GET['id'])){
            $data = $comentarios->getMensajes();
            if($data){
                require_once("../../../app/views/public/becados/account/mensajes_view.php");
            }else{
                throw new Exception("No se encontro ningun mensaje o comentario");
            }
        }else{
            throw new Exception("Problema con id");
        }
    }else{
        throw new Exception("Problema con id x2");
    }
}catch(Exception $error){
    Page::showMessage(2, $error->getMessage(), null);   
}
?>