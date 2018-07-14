<?php 
require_once("../../app/models/patrocinadores.class.php");
try{
    if(isset($_GET['id'])){
        $patrocinadores = new Patrocinadores;
        if($patrocinadores->setId_patrocinador($_GET['id'])){
            if($patrocinadores->ReadPatrocinadores()){
                if(isset($_POST['actualizar'])){
                    $_POST = $patrocinadores->validateForm($_POST);
                    if($patrocinadores->setTipo($_POST['categoria'])){
                        if($patrocinadores->setProfesion($_POST['profesion'])){
                            if($patrocinadores->setNombres($_POST['nombres'])){
                                if($patrocinadores->setApellidos($_POST['apellidos'])){
                                    if($patrocinadores->setCargo($_POST['cargo'])){
                                        if($patrocinadores->setNombre_empresa($_POST['empresa'])){
                                            if($patrocinadores->setDireccion($_POST['direccion'])){
                                                if($patrocinadores->setTelefono($_POST['telefono'])){
                                                    if($patrocinadores->UpdatePatrocinadores()){
                                                        Page::showMessage(1, "Categoría actualizada","../../dashboard/patrocinadores/index.php");
                                                    }else{
                                                        throw new Exception("Error al actualizar");
                                                    }
                                                }else{
                                                    throw new Exception("Telefono invalida");
                                                }
                                            }else{
                                                throw new Exception("Dirección invalida");
                                            }
                                        }else{
                                            throw new Exception("Empresa invalida");
                                        }
                                    }else{
                                        throw new Exception("Cargo invalida");
                                    }
                                }else{
                                    throw new Exception("Apellidos invalida");
                                }
                            }else{
                                throw new Exception("Nombres invalida");
                            }
                        }else{
                            throw new Exception("Profesion invalida");
                        }
                    }else{
                        throw new Exception("Error al envíar los datos");
                    }
                }
            }else{}
        }else{}
    }else{}
}catch(Exception $error){
    Page::showMessage(2, $error->getMessage(), "");
}
require_once("../../app/views/dashboard/patrocinadores/modificar_view.php");
?>