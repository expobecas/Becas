<?php 
require_once("../../app/models/tipo_usuario.class.php");
try{
    $tipo = new Tipo;
    if(isset($_POST['crear'])){
        $_POST = $tipo->validateForm($_POST);
        if($tipo->setTipo($_POST['tipo'])){
            if($tipo->CreateTipo()){
                Page::showMessage(1, "Tipo creada","../../dashboard/tipo_usuario/index.php");
            }else{
                throw new Exception("Tipo invalida");
            }
        }else{
            throw new Exception("Error al envíar los datos");
        }
    }
}catch(Exception $error){
    Page::showMessage(2, $error->getMessage(), "");
}
require_once("../../app/views/dashboard/tipo_usuario/agregar_view.php");
?>