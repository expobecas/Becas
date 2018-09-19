<?php
require_once("../../app/models/estudiantes.class.php");
try{
    if(isset($_GET['id'])){
        $estudiantes = new Estudiantes;
        if($estudiantes->setId($_GET['id'])){
            if($estudiantes->readPerfil()){
                if(isset($_POST['actualizar'])){
                    $_POST = $estudiantes->validateForm($_POST);
                    if($estudiantes->setNombre1($_POST['nombre1'])){
                        if($estudiantes->setNombre2($_POST['nombre2'])){
                            if($estudiantes->setApellido1($_POST['apellido1'])){
                                if($estudiantes->setApellido2($_POST['apellido2'])){
                                    if($estudiantes->setUsuario($_POST['usuario'])){
                                                 if($estudiantes->setNum_carnet($_POST['carnet'])){
                                                        if($estudiantes->setGrado($_POST['grado'])){
                                                            if($estudiantes->setEspecialidad($_POST['especialidad'])){
                                        if($estudiantes->updateEstudiantes()){
                                            Page::showMessage(1, "Beca modificada", "index.php");
                                        }
                                        else{
                                            throw new Exception(Database::getException());
                                        }
                                    }else{
                                        throw new Exception("Especialidad incorrecta");
                                    }
                                        }else{
                                        throw new Exception("Grado incorrecto");
                                    }
                                    }else{
                                        throw new Exception("Carnet incorrecta");
                                    }
                                    }else{
                                        throw new Exception("Usuario incorrecto");
                                    }
                                    }else{
                                        throw new Exception("Segundo apellido incorrecto");
                                    }
                                    }else{
                                        throw new Exception("Primer apellido incorrecto");
                                    }
                                }else{
                                    throw new Exception("Segundo nombre incorrecto");
                                }
                        }else{
                            throw new Exception("Primer nombre incorrectos");
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
require_once("../../app/views/dashboard/estudiantes/modificar_view.php");
?>