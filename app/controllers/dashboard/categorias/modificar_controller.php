<?php
require_once("../../app/models/categorias.class.php");
try{
    if(isset($_GET['id'])){
        $categorias = new Categorias;
        if($categorias->setId($_GET['id'])){
            if($categorias->ReadCategoria()){
                if(isset($_POST['modificar'])){
                    $_POST = $categorias->validateForm($_POST); 
                    if($categorias->setTipo($_POST['tipo'])){
                            if($categorias->UpdateCategoria()){
                                Page::showMessage(1, "Categoría modificada", "../../dashboard/patrocinadores/index.php");
                            }else{
                                throw new Exception(Database::getException());
                            }                       
                    }else{
                        throw new Exception("Nombre incorrecto");
                    }                    
                }
            }else{
                Page::showMessage(2, "Categoría inexistente", "../../dashboard/patrocinadores/index.php");
            }
        }else{
            Page::showMessage(2, "Categoría incorrecta", "../../dashboard/patrocinadores/index.php");
        }        
    }else{
        Page::showMessage(3, "Seleccione categoría", "../../dashboard/patrocinadores/index.php");
    }
}catch(Exception $error){
    Page::showMessage(2, $error->getMessage(), null);
}
require_once("../../app/views/dashboard/categorias/modificar_view.php");
?>