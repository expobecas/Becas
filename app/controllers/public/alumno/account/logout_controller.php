<?php
require_once("../../../app/models/estudiantes.class.php");
$object = new Estudiantes;
$object->setEstadoSesion(0);
$object->setId($_SESSION['id_estudiante']);
$object->updateEstadoSesion();
if($object->logOut()){
    Page::showMessage(1, "Autenticación eliminada", "../../../public/alumno/account/ingresar.php");
}else{
    Page::showMessage(2, "Ocurrió un problema", "../../../public/alumno/index/index.php");
}
?>