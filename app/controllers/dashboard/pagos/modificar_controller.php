<?php
require_once("../../app/models/pagos.class.php");
try{
    if(isset($_GET['id'])){
        $pagos = new Pagos;
        if($pagos->setId_recibo($_GET['id'])){
            if($pagos->readPagos()){
                if(isset($_POST['actualizar'])){
                    $_POST = $pagos->validateForm($_POST);
                    if($pagos->setFechaRecibo($_POST['fecha1'])){
                        if($pagos->setId_patrocinador($_POST['tipo'])){ 
                            if($pagos->setMonto($_POST['monto'])){
                                if($pagos->setFechaEntregado($_POST['fecha2'])){
                                        if($pagos->updatePagos()){
                                            Page::showMessage(1, "Pago modificado", "index.php");
                                        }
                                        else{
                                            throw new Exception(Database::getException());
                                        }
                                }else{
                                    throw new Exception("Fecha incorrecta");
                                }
                            }else{
                                throw new Exception("Monto incorrecto");
                            }
                        }else{
                            throw new Exception("Patrocinador incorrecto");
                        }
                    }else{
                        throw new Exception("Fecha incorrecta");
                    }
                }
            }else{
                throw new Exception("Read usuario");
                }
            }else{
                throw new Exception("Tomar id");
            }
        }
} 
catch (Exception $error){
Page::showMessage(2, $error->getMessage(), null);
}
require_once("../../app/views/dashboard/pagos/modificar_view.php");
?>