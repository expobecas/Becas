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
                                    throw new Exception("Contraseña incorrecta");
                                }
                        }else{
                            throw new Exception("Usuario incorrecto");
                        }
                    }else{
                        throw new Exception("direccion incorrecta");
                    }
                    }else{
                        throw new Exception("Telefono incorrecto");
                    }
                }else
                {
                    throw new Exception("Genero incorrecto");
                }
            }
            } catch (Exception $error){
    Page::showMessage(2, $error->getMessage(), null);
}
require_once("../../app/views/dashboard/becas/agregar_view.php");