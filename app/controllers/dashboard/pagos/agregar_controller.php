<?php
require_once("../../app/models/pagos.class.php");
try{
    $pagos = new Pagos;
    if(isset($_POST['crear'])){
        $_POST = $pagos->validateForm($_POST);
        $fecha_recibo = $_POST['fecha1'];
        $fecha_entrega = $_POST['fecha2'];
        if($pagos->setFechaRecibo($_POST['fecha1'])){
            if($pagos->setId_patrocinador($_POST['tipo'])){ 
            if($pagos->setMonto($_POST['monto'])){
                if($pagos->setFechaEntregado($_POST['fecha2'])){
                    if($fecha_recibo<= $fecha_entrega){
                                    if($pagos->createPagos()){
                                        Page::showMessage(1, "Pago efectuado", "index.php");
                                    }
                                    else{
                                        throw new Exception(Database::getException());
                                    }
                                }else{
                                    throw new Exception("La fecha de recibo no puede ser mayor a la fecha de entrega");
                                }
                        }else{
                            throw new Exception("Fecha incorrecto");
                        }
                    }else{
                        throw new Exception("Monto incorrecto");
                    }
                    }else{
                        throw new Exception("Patrocinador incorrecto");
                    }
                }else
                {
                    throw new Exception("Fecha incorrecta");
                }
            }
            } catch (Exception $error){
    Page::showMessage(2, $error->getMessage(), null);
}
require_once("../../app/views/dashboard/pagos/agregar_view.php");