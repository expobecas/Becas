<?php 
require_once("../../app/models/patrocinadores.class.php");
try{
    if(isset($_GET['id'])){
        $patrocinadores = new Patrocinadores;
        if($patrocinadores->setId_patrocinador($_GET['id'])){
            if($patrocinadores->ReadPatrocinadores()){
                if(isset($_POST['eliminar'])){
                    if($patrocinadores->EliminarPatrocinador()){
                        Page::showMessage(1, "Patrocinador eliminado", "../../dashboard/patrocinadores/index.php");
                    }else{
                        throw new Exception(Database::getException());
                    }
                }
            }else{
                throw new Exception("Patrocinador inexistente");
            }
        }else{
            throw new Exception("Tuvimos problemas con el dato");
        }
    }else{
        Page::showMessage(3, "Seleccione patrocinador", "../../dashboard/patrocinadores/index.php");
    }
}catch(Exception $error){
    Page::showMessage(2, $error->getMessage(), "");
}
require_once("../../app/views/dashboard/patrocinadores/eliminar_view.php");
?>