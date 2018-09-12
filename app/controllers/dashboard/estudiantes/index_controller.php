<?php 
require_once("../../app/models/estudiantes.class.php");
try{
    $estudiantes = new Estudiantes;
    $data = $estudiantes->getEstudiantes();
    /*VISTA GENERAL DE SOLICITUDES*/
    if($data){
        require_once("../../app/views/dashboard/estudiantes/index_view.php");
    }else{
        Page::showMessage(3, "No se encontraron patrocinadores", "");
    }

}catch(Exception $error){
    Page::showMessage(2, $error->getMessage(), "");
}
?>