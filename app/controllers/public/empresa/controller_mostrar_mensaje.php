<?php
require_once("../../../app/models/mensaje_beca.php");
try{
	$mensaje = new Mensaje; 
	if(isset($_POST['buscar'])){
		$_POST = $mensaje->validateForm($_POST);
		$data = $mensaje->searchCasos($_POST['busqueda']);
		if($data){
			$rows = count($data);
			Page::showMessage(4, "Se encontraron $rows resuldatos", null);
		}else{
			Page::showMessage(4, "No se encontraron resultados", null);
			$data = $mensaje->getMensajes();
		}
	}else{
		$data = $mensaje->getMensajes();
	}
	if($data){
		require_once("../../../app/views/public/empresa/index/bandeja_view.php");
	}else{
		Page::showMessage(3, "No hay casos disponibles", "create.php");
	}
}catch(Exception $error){
	Page::showMessage(2, $error->getMessage(), "../account/");
}
?> 