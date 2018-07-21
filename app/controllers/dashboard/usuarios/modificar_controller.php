<?php
require_once("../../app/models/usuario.class.php");
try{
    if(isset($_GET['id'])){
        $usuario = new Usuario;
        if($usuario->setId($_GET['id'])){
            if($usuario->readUsuario()){
                if(isset($_POST['actualizar'])){
                    $_POST = $usuario->validateForm($_POST);
                    if($usuario->setNombres($_POST['nombres'])){
                        if($usuario->setApellidos($_POST['apellidos'])){
                            if($usuario->setTipo($_POST['tipo'])){
                            if($usuario->setUsuario($_POST['usuario'])){
                                if($usuario->setClave($_POST['contraseña'])){
                                        if($usuario->updateUsuario()){
                                            Page::showMessage(1, "Usuario ", "index.php");
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
require_once("../../app/views/dashboard/usuarios/modificar_view.php");
?>