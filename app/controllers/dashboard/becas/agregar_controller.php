<?php
require_once("../../app/models/becas.class.php");
try{
    $becas = new Becas;
    if(isset($_POST['crear'])){
        $_POST = $becas->validateForm($_POST);
        if($becas->setDetalle($_POST['detalle'])){
            if($becas->setPatrocinador($_POST['patrocinador'])){ 
            if($becas->setMonto($_POST['monto'])){
                if($becas->setPeriodo($_POST['periodo'])){
                    if($becas->setFecha($_POST['fecha'])){
                                    if($becas->createBecas()){
                                        Page::showMessage(1, "Beca ingresada", "index.php");
                                    }
                                    else{
                                        throw new Exception(Database::getException());
                                    }
                                }else{
                                    throw new Exception("Fecha incorrecta");
                                }
                        }else{
                            throw new Exception("Usuario incorrecto");
                        }
                    }else{
                        throw new Exception("Monto incorrect0");
                    }
                    }else{
                        throw new Exception("Patrocinador incorrecto");
                    }
                }else
                {
                    throw new Exception("Detalle incorrecto");
                }
            }
            } catch (Exception $error){
    Page::showMessage(2, $error->getMessage(), null);
}
require_once("../../app/views/dashboard/becas/agregar_view.php");