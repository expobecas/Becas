<?php 
require_once("../../../app/models/estudiantes.class.php");
try{
    if(isset($_GET['id'])){
        $estudiantes = new Estudiantes;
        if($estudiantes->setId($_GET['id'])){
            if($estudiantes->readPerfil()){
                if(isset($_POST['editar'])){
                    $_POST = $estudiantes->validateForm($_POST);
                    if($estudiantes->setNombre1($_POST['nombre1'])){
                        if($estudiantes->setNombre2($_POST['nombre2'])){
                            if($estudiantes->setApellido1($_POST['apellido1'])){
                                if($estudiantes->setApellido2($_POST['apellido2'])){
                                    if($estudiantes->setUsuario($_POST['usuario'])){
                                        if($estudiantes->updatePerfil()){
                                            Page::showMessage(1, "Perfil modificado", "../../../public/becados/index/becado.php");
                                        }else{
                                            throw new Exception("MATATE :)");
                                        }
                                    }else{
                                        throw new Exception("Usuario invalido");
                                    }
                                }else{
                                    throw new Exception("Apellido Invalido");
                                }
                            }else{
                                throw new Exception("Apellido invalido x2");
                            }
                        }else{
                            throw new Exception("Nombre invalido x2");
                        }
                    }else{
                        throw new Exception("Nombre invalido");
                    }
                }
            }else{
                throw new Exception("No se encontraron resultados");
            }
        }else{
            throw new Exception("Usuario incorrecto");
        }
    }else{
        throw new Exception("No hay un usuario seleccionado");
    }
}catch(Exception $error){
    Page::showMessage(2, $error->getMessage(), null);
}
require_once("../../../app/views/public/becados/account/editar_view.php");
?>