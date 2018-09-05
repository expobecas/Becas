<?php
require_once("../../../app/models/empresa_casos.php");
try{
	$casos = new Casos; 
	if(isset($_POST['buscar'])){
		$_POST = $casos->validateForm($_POST);
		$data = $casos->searchCasos($_POST['busqueda']);
		if($data){
			$rows = count($data);
			Page::showMessage(4, "Se encontraron $rows resuldatos", null);
		}else{
			Page::showMessage(4, "No se encontraron resultados", null);
			$data = $casos->getCasos();
		}
	}else{
		$data = $casos->getCasos();
	}
	if($data){
		require_once("../../../app/views/public/empresa/index/casos_view.php");
	}else{
		Page::showMessage(3, "No hay casos disponibles", "create.php");
	}
}catch(Exception $error){
	Page::showMessage(2, $error->getMessage(), "../account/");
}
?> 