<?php
require_once("../../app/models/tipo_usuario.class.php");
try{
    if(isset($_GET['id'])){
        $tipo = new Tipo;
        if($tipo->setId($_GET['id'])){
            if($tipo->ReadTipo()){
                if(isset($_POST['modificar'])){
                    $_POST = $tipo->validateForm($_POST); 
                    if($tipo->setTipo($_POST['tipo'])){
                            if($tipo->UpdateTipo()){
                                Page::showMessage(1, "Tipo modificada", "../../dashboard/usuarios/index.php");
                            }else{
                                throw new Exception(Database::getException());
                            }                       
                    }else{
                        throw new Exception("Nombre incorrecto");
                    }                    
                }
            }else{
                Page::showMessage(2, "Tipo inexistente", "../../dashboard/tipo_usuario/modificar.php");
            }
        }else{
            Page::showMessage(2, "Tipo incorrecta", "../../dashboard/tipo_usuario/modificar.php");
        }        
    }else{
        Page::showMessage(3, "Seleccione tipo", "../../dashboard/tipo_usuario/modificar.php");
    }
}catch(Exception $error){
    Page::showMessage(2, $error->getMessage(), null);
}
require_once("../../app/views/dashboard/tipo_usuario/modificar_view.php");
?>