<?php 
require_once("../../app/models/patrocinadores.class.php");
try{
    $patrocinadores = new Patrocinadores;
    if(isset($_POST['crear'])){
        $_POST = $patrocinadores->validateForm($_POST);
        if($patrocinadores->setTipo($_POST['tipo'])){
            if($patrocinadores->setProfesion($_POST['profesion'])){
                if($patrocinadores->setNombres($_POST['nombres'])){
                    if($patrocinadores->setApellidos($_POST['apellidos'])){
                        if($patrocinadores->setCargo($_POST['cargo'])){
                            if($patrocinadores->setNombre_empresa($_POST['empresa'])){
                                if($patrocinadores->setDireccion($_POST['direccion'])){
                                    if($patrocinadores->setTelefono($_POST['telefono'])){
                                        if($patrocinadores->CreatePatrocinadores()){
                                            Page::showMessage(1, "Categoría creada","../../dashboard/patrocinadores/index.php");
                                        }else{
                                            throw new Exception("Error al crear");
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
}catch(Exception $error){
    Page::showMessage(2, $error->getMessage(), "");
}
require_once("../../app/views/dashboard/patrocinadores/agregar_view.php");
?>