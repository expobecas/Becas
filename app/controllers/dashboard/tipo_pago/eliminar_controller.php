<?php 
require_once("../../app/models/tipo_pago.class.php");
try{
    if(isset($_GET['id'])){
        $tipo = new Tipos;
        if($tipo->setId($_GET['id'])){
            if($tipo->ReadTipo()){
                if(isset($_POST['eliminar'])){
                    if($tipo->deleteTipo()){
                        Page::showMessage(1, "Tipo eliminado", "../../dashboard/tipo_pago/index.php");
                    }else{
                        throw new Exception(Database::getException());
                    }
                }
            }else{
                throw new Exception("Tipo inexistente");
            }
        }else{
            throw new Exception("Tuvimos problemas con el dato");
        }
    }else{
        Page::showMessage(3, "Seleccione tipo", "../../dashboard/tipo_pago/index.php");
    }
}catch(Exception $error){
    Page::showMessage(2, $error->getMessage(), "");
}
require_once("../../app/views/dashboard/tipo_usuario/eliminar_view.php");
?>