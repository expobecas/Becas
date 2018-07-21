<?php 
require_once("../../app/models/usuario.class.php");
try{
    $usuario = new Usuario; //Definiendo el modelo
    $data = $usuario->getUsuarios();
    /*VISTA GENERAL DE USUARIOS*/
    if($data){
        require_once("../../app/views/dashboard/usuarios/index_view.php");
    }else{
        Page::showMessage(3, "No se encontraron usuarios", "");
    }

}catch(Exception $error){
    Page::showMessage(2, $error->getMessage(), "");
}
?>