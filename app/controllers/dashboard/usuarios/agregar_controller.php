<?php
require_once("../../app/models/usuario.class.php");
try{
    $usuario = new Usuario;
    if(isset($_POST['crear'])){
        $_POST = $usuario->validateForm($_POST);
        if($usuario->setNombres($_POST['nombres'])){
            if($usuario->setApellidos($_POST['apellidos'])){ 
            if($usuario->setUsuario($_POST['usuario'])){
                if($usuario->setClave($_POST['contraseña'])){
                    if($usuario->setTipo($_POST['tipo'])){
                                    if($usuario->createUsuario()){
                                        Page::showMessage(1, "Usuario creado", "index.php");
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
require_once("../../app/views/dashboard/usuarios/agregar_view.php");