<?php 
require_once("../../app/models/usuario.class.php");
try{
    $usuarios = new Usuario;
    if(isset($_POST['ingresar'])){
        $_POST = $usuarios->validateForm($_POST);
        if($usuarios->setUsuario($_POST['usuario'])){
            if($usuarios->checkUsuario()){
                if($usuarios->setClave($_POST['clave'])){
                    if($usuarios->checkClave()){
                        $_SESSION['id_usuario'] = $usuarios->getId();
                        $_SESSION['usuario'] = $usuarios-> getUsuario();
                        $_SESSION['id_tipo'] = $usuarios-> getTipo();
                        if($_SESSION['id_tipo'] == 1){
                            Page::showMessage(1, "Autenticación correcta", "../../dashboard/index/index.php");
                        }
                        if($_SESSION['id_tipo'] == 3){
                            Page::showMessage(1, "Autenticación correcta", "../../public/jefes/index/index.php");
                        }
                        if($_SESSION['id_tipo'] == 2){
                            Page::showMessage(1, "Autenticación correcta", "../../public/empresa/index/index.php");
                        }
                    }else{
                        throw new Exception("Clave incorrecta");
                    }
                }else{
                    throw new Exception($usuarios->getErrorPassword());
                }
            }else{
                throw new Exception("Usuario invalido");
            }
        }else{
            throw new Exception("Usuario incorrecto");
        }
    }
}catch(Exception $error){
    Page::showMessage(2,$error->getMessage(), null);
}
require_once("../../app/views/dashboard/ingresar/acceder_view.php");
?> 