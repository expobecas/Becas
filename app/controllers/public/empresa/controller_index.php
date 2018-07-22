<?php
//Controlador para ver el carrito
require_once("../../../app/models/empresa_beca.php");
try{
	if(isset($_SESSION['id_usuario'])){
		$beca = new Empresa;
		$beca->setIdUsuario($_SESSION['id_usuario']);
		$data = $beca->getBecas2();
		$total = $beca->getTotal();
		if(!$data)
		{
			throw new Exception("Murio4");
		}
		else
		{
			require_once("../../../app/views/public/empresa/index/becado_view.php");
		}
		}else{
			throw new Exception("Murio2");
		}
		}catch(Exception $error){
			Page::showMessage(2, $error->getMessage(), "../index");
		}

	
		
		
?>
		