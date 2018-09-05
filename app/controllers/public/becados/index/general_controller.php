<?php
require_once("../../../app/models/estudiantes.class.php");
try{
    $estudiantes = new Estudiantes;
    $data = $estudiantes->GetDatosGenerales();
}catch(Exception $error){
	Page::showMessage(2, $error->getMessage(), "../../../public/becados/account/index/index.php");
}
require_once("../../../app/views/public/becados/index/becado_view.php");
?>
