<?php
require_once("../../app/models/usuario.class.php");
$object = new Usuario;
if(isset($_GET['id']))
{
    if($object->logOut()){
        Page::showMessage(3, "La sesión se cerró por inactividad", "../../dashboard/ingresar/acceder.php");
    }else{
        Page::showMessage(2, "Ocurrió un problema", "../../../dashboard/index/index.php");
    }
}
else
{
    if($object->logOut()){
        Page::showMessage(1, "Autenticación eliminada", "../../dashboard/ingresar/acceder.php");
    }else{
        Page::showMessage(2, "Ocurrió un problema", "../../../dashboard/index/index.php");
    }
}

?>