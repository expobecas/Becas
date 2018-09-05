<?php 
require_once("../../app/models/categorias.class.php");
try{
    if(isset($_GET['id'])){
        $categorias = new Categorias;
        if($categorias->setId($_GET['id'])){
            if($categorias->ReadCategoria()){
                if(isset($_POST['eliminar'])){
                    if($categorias->EliminarCategoria()){
                        Page::showMessage(1, "Categoría eliminado", "../../dashboard/patrocinadores/index.php");
                    }else{
                        throw new Exception(Database::getException());
                    }
                }
            }else{
                throw new Exception("Categoría inexistente");
            }
        }else{
            throw new Exception("Tuvimos problemas con el dato");
        }
    }else{
        Page::showMessage(3, "Seleccione proveedor", "../../dashboard/patrocinadores/index.php");
    }
}catch(Exception $error){
    Page::showMessage(2, $error->getMessage(), "");
}
require_once("../../app/views/dashboard/categorias/eliminar_view.php");
?>