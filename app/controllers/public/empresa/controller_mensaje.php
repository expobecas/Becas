<?php
require_once("../../../app/models/mensaje_beca.php");
try{
    $mensaje = new Mensaje;
    if(isset($_POST['crear'])){
        $_POST = $mensaje->validateForm($_POST);
        if($mensaje->setMensaje($_POST['mensaje'])){
            if($mensaje->createMensaje()){
                    Page::showMessage(1, "Mensaje creado", "index.php");
                }else{
                    throw new Exception("Ocurrio un problema");
                }
        }else{
                throw new Exception("MENSAJE incorrecto");
        }
    }
}catch(Exception $error){
    Page::showMessage(2, $error->getMessage(), null);
}
require_once("../../../app/views/public/empresa/index/create_view.php");
?>