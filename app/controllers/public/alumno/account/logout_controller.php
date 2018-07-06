<?php
require_once("../../../app/models/estudiantes.class.php");
$object = new Estudiantes;
if($object->logOut()){
    Page::showMessage(1, "Autenticación eliminada", "../../../public/alumno/account/ingresar.php");
}else{
    Page::showMessage(2, "Ocurrió un problema", "../../../public/alumno/index/index.php");
}
?>