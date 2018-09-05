<?php
require_once("../../../app/models/comentarios.class.php");
try{
    if(isset($_GET['id'])){
        $comentarios = new Comentarios;
        if($comentarios->setId($_GET['id'])){
            if($comentarios->GetPatrocinadores()){
                if(isset($_POST['enviar'])){
                    $_POST = $comentarios->validateForm($_POST); 
                    if($comentarios->setPatrocinador($_POST['patrocinador'])){
                    if($comentarios->setComentario($_POST['mensaje'])){
                            if ($comentarios->CreateMensaje()){
                                Page::showMessage(1, "Mensaje envíado", "../../../public/becados/account/mensajes.php");
                            }else{
                                throw new Exception("MATATE :)");
                            }                     
                        }else{
                            throw new Exception("Mensaje incorrecto");
                        }                      
                    }else{
                        throw new Exception("Codigo incorrecto");
                    }                    
                }
            }else{
                Page::showMessage(2, "Patrocinador inexistente", "../../../public/becados/account/mensajes.php");
            }
        }else{
            Page::showMessage(2, "CPatrocinador incorrecta", "../../../public/becados/account/mensajes.php");
        }        
    }else{
        Page::showMessage(3, "Seleccione un mensaje", "../../../public/becados/account/mensajes.php");
    }
}catch(Exception $error){
    Page::showMessage(2, $error->getMessage(), null);
}
require_once("../../../app/views/public/becados/mensajes/enviar_view.php");

?>