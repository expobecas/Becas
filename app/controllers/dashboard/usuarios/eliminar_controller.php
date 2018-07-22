<?php 
require_once("../../app/models/usuario.class.php");
try{
    if(isset($_GET['id'])){
        $usuario = new Usuario;
        if($usuario->setId($_GET['id'])){
            if($usuario->readUsuario()){
                if(isset($_POST['eliminar'])){
                    if($usuario->deleteUsuario()){
                        Page::showMessage(1, "Usuario eliminado", "../../dashboard/usuarios/index.php");
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
        Page::showMessage(3, "Seleccione un usuario", "../../dashboard/usuarios/index.php");
    }
}catch(Exception $error){
    Page::showMessage(2, $error->getMessage(), "");
}
require_once("../../app/views/dashboard/usuarios/eliminar_view.php");
?>