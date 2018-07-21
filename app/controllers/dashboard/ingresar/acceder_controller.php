<?php
require_once("../../app/models/usuario.class.php"); //Llamando al modelo
try {
    $usuarios = new Usuario;
    if ($usuarios->getUsuarios()) {
        if (isset($_POST['ingresar'])) {
            $_POST = $usuarios->validateForm($_POST);
            if ($usuarios->setUsuario($_POST['usuario'])) {
                if ($usuarios->checkUsuario()) {
                    if ($usuarios->setClave($_POST['clave'])) {
                        if ($usuarios->checkClave()) {
                            $_SESSION['id_usuario'] = $usuarios->getId();
                            $_SESSION['usuario']    = $usuarios->getUsuario();
                            $_SESSION['id_tipo']    = $usuarios->getTipo();
                            echo $_SESSION['id_tipo'];//Tomando el tipo, para redirigirle según su cargo
                            if ($_SESSION['id_tipo'] == 1) {
                                Page::showMessage(1, "Autenticación correcta", "../../dashboard/index/index.php");
                            }
<<<<<<< HEAD
=======
<<<<<<< HEAD
=======
<<<<<<< HEAD
                            if($_SESSION['id_tipo'] == 3){
                                Page::showMessage(1, "Autenticación correcta", "../../public/empresa/index/index.php");
                            }
                            if($_SESSION['id_tipo'] == 2){
                                Page::showMessage(1, "Autenticación correcta", "../../public/jefes/index/index.php");
=======
<<<<<<< HEAD
                            if($_SESSION['id_tipo'] == 2){
                                Page::showMessage(1, "Autenticación correcta", "../../public/empresa/index/index.php");
                            }
                            if($_SESSION['id_tipo'] == 3){
                                Page::showMessage(1, "Autenticación correcta", "../../public/jefes/index/index.php");
=======
>>>>>>> 543950ee2d7d39aee51bd0cfab3fa78f8f8ddf53
>>>>>>> 6d79f6c71e6a90f57e7dd4f34ca4dd212de07a6f
                            if ($_SESSION['id_tipo'] == 2) {
                                Page::showMessage(1, "Autenticación correcta", "../../public/jefes/index/index.php");
                            }
                            if ($_SESSION['id_tipo'] == 3) {
<<<<<<< HEAD
                                Page::showMessage(1, "Autenticación correcta", "../../public/empresa/index/index.php");
=======
<<<<<<< HEAD
                                Page::showMessage(1, "Autenticación correcta", "../../public/empresa/index/index.php");
=======
                                Page::showMessage(1, "Autenticación correcta", "../../dashboard/index/index.php");
>>>>>>> cd05825b6095487627f61f207137a49a45f908f6
>>>>>>> 5fa3c353cd7c6962fd67c551785619ba461af590
>>>>>>> 543950ee2d7d39aee51bd0cfab3fa78f8f8ddf53
>>>>>>> 6d79f6c71e6a90f57e7dd4f34ca4dd212de07a6f
                            }
                        } else {
                            throw new Exception("Clave incorrecta");
                        }
                    } else {
                        throw new Exception("Clave menor a 6 caracteres");
                    }
                } else {
                    throw new Exception("Usuario invalido");
                }
            } else {
                throw new Exception("Usuario incorrecto");
            }
        }
    } else {
        Page::showMessage(3, "No hay usuarios disponibles");
    }
}
catch (Exception $error) {
    Page::showMessage(2, $error->getMessage(), null);
}
require_once("../../app/views/dashboard/ingresar/acceder_view.php");
?> 