<?php 
require_once("../../app/models/estudiantes.class.php");
try{
    $estudiantes = new Estudiantes;
    if(isset($_POST['crear'])){
        $_POST = $estudiantes->validateForm($_POST);
        if($estudiantes->setNombre1($_POST['nombre1'])){
            if($estudiantes->setNombre2($_POST['nombre2'])){ 
            if($estudiantes->setApellido1($_POST['apellido1'])){
                if($estudiantes->setApellido2($_POST['apellido2'])){
                    if($estudiantes->setUsuario($_POST['usuario'])){
                            $clave = $_POST['clave1'];  
                            if($_POST['clave1'] == $_POST['clave2']){
                                if($estudiantes->setNum_carnet($_POST['carnet'])){
                                    $verificacion_carnet = $estudiantes->verificacion_carnet();
                                    if(!$verificacion_carnet) {
                                    if($estudiantes->setGrado($_POST['grado'])){
                                        if($estudiantes->setEspecialidad($_POST['especialidad'])){
                                    if($estudiantes->createEstudiante()){
                                        Page::showMessage(1, "Estudiante creado", "index.php");
                                    }
                                    else{
                                        throw new Exception(Database::getException());
                                    }
                                }else{
                                    throw new Exception("Especialidad incorrecto");
                                }

                                }else{
                                    throw new Exception("Grado incorrecto");
                                }
                            }else{
                                throw new Exception("Carnet duplicado");
                            }
                                }else{
                                    throw new Exception("Carnet incorrecto");
                                }
                                    
                                }else{
                                    throw new Exception("Contraseña diferentes");
                                }
                        }else{
                            throw new Exception("Usuario incorrecto");
                        }
                    }else{
                        throw new Exception("Segundo Apellido incorrecto");
                    }
                    }else{
                        throw new Exception("Primer apellido incorrecto");
                    }
                }else{
                    throw new Exception("Segundo nombre incorrecto");
                }
                }else
                {
                    throw new Exception("Primer nombre incorrecto");
                }
            }
}catch(Exception $error){
    Page::showMessage(2, $error->getMessage(), "");
}
require_once("../../app/views/dashboard/estudiantes/agregar_view.php");
?>