<?php
require_once("../../app/models/estudiantes.class.php");
try{
	if(isset($_GET['id'])){
		$clientes = new Estudiantes;
		if($clientes->setId($_GET['id'])){
			if($clientes->readPerfil()){
				if(isset($_POST['eliminar'])){
					if($clientes->deleteEstudiante()){
						Page::showMessage(1, "Estudiante eliminado", "index.php");
					}else{
						throw new Exception(Database::getException());
					}
				}
			}else{
				throw new Exception("Estudiante inexistente");
			}	
		}else{
			throw new Exception("Estudiante incorrecto");
		}
	}else{
		Page::showMessage(3, "Seleccione Estudiante", "index.php");
	}
}catch (Exception $error){
	Page::showMessage(2, $error->getMessage(), "index.php");
}
require_once("../../app/views/dashboard/estudiantes/eliminar_view.php");
?>