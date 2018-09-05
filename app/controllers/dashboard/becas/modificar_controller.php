<?php
require_once("../../app/models/becas.class.php");
try{
    if(isset($_GET['id'])){
        $becas = new Becas;
        if($becas->setId($_GET['id'])){
            if($becas->readBecas()){
                if(isset($_POST['actualizar'])){
                    $_POST = $becas->validateForm($_POST);
                    if($becas->setDetalle($_POST['detalle'])){
                        if($becas->setPatrocinador($_POST['patrocinador'])){
                            if($becas->setMonto($_POST['monto'])){
                            if($becas->setPeriodo($_POST['periodo'])){
                                if($becas->setFech($_POST['fecha'])){
                                        if($becas->updateBecas()){
                                            Page::showMessage(1, "Beca modificada", "index.php");
                                        }
                                        else{
                                            throw new Exception(Database::getException());
                                        }
                                    }else{
                                        throw new Exception("Tipo incorrecta");
                                    }
                                }else{
                                    throw new Exception("Clave incorrecto");
                                }
                            }else{
                                throw new Exception("Usuario incorrecto");
                            }
                        }else{
                            throw new Exception("Apellidos incorrectos");
                        }
                    }else{
                        throw new Exception("Nombres incorrectos");
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
require_once("../../app/views/dashboard/becas/modificar_view.php");
?>