<?php
require_once("../../app/models/estudiantes.class.php");
$object = new Estudiantes;
if($object->logOut()){
    Page::showMessage(1, "Autenticación eliminada", "../../dashboard/ingresar/acceder.php");
}else{
    Page::showMessage(2, "Ocurrió un problema", "../../../dashboard/index/index.php");
}
?>