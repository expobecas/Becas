<?php 
require_once("../../app/models/usuario.class.php");
try{
    $_SESSION['lapso'] = time();
    $usuario = new Usuario;
    $data = $usuario->getUsuarios();
    /*VISTA GENERAL DE SOLICITUDES*/
    if($data){
        require_once("../../app/views/dashboard/usuarios/index_view.php");
    }else{
        Page::showMessage(3, "No se encontraron usuarios", "");
    }

}catch(Exception $error){
    Page::showMessage(2, $error->getMessage(), "");
}
?>