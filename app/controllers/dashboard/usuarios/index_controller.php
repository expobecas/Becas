<?php 
require_once("../../app/models/usuario.class.php");
try{
<<<<<<< HEAD
    $usuario = new Usuario; //Definiendo el modelo
    $data = $usuario->getUsuarios();
    /*VISTA GENERAL DE USUARIOS*/
    if($data){
        require_once("../../app/views/dashboard/usuarios/index_view.php");
    }else{
        Page::showMessage(3, "No se encontraron usuarios", "");
=======
    $usuario = new Usuario;
    $data = $usuario->getUsuarios();
    /*VISTA GENERAL DE SOLICITUDES*/
    if($data){
        require_once("../../app/views/dashboard/usuarios/index_view.php");
    }else{
        Page::showMessage(3, "No se encontraron solicitudes", "");
>>>>>>> 5fa3c353cd7c6962fd67c551785619ba461af590
    }

}catch(Exception $error){
    Page::showMessage(2, $error->getMessage(), "");
}
?>