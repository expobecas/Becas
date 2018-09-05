<?php 
require_once("../../app/models/categorias.class.php");
try{
    $categorias = new Categorias;
    if(isset($_POST['crear'])){
        $_POST = $categorias->validateForm($_POST);
        if($categorias->setTipo($_POST['tipo'])){
            if($categorias->CreateCategorias()){
                Page::showMessage(1, "Categoría creada","../../dashboard/patrocinadores/index.php");
            }else{
                throw new Exception("Categoría invalida");
            }
        }else{
            throw new Exception("Error al envíar los datos");
        }
    }
}catch(Exception $error){
    Page::showMessage(2, $error->getMessage(), "");
}
require_once("../../app/views/dashboard/categorias/agregar_view.php");
?>