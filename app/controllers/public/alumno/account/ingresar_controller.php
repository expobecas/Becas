<?php
require_once("../../../app/models/estudiantes.class.php");
try{
    $alumno = new Estudiantes;
    if($alumno->getEstudiantes()){
        if(isset($_POST['ingresar'])){
            $_POST = $alumno->validateForm($_POST);
            if($alumno->setUsuario($_POST['usuario'])){
                if($alumno->checkAlumno()){
                    if($alumno->setContraseña($_POST['clave'])){
                        if($alumno->checkClave()){
                            $_SESSION['id_estudiante'] = $alumno->getId();
                            $_SESSION['usuario'] = $alumno->getUsuario();
                            Page::showMessage(1, "Autenticación correcta", "../../../public/alumno/index/index.php");
                        }else{
                            throw new Exception("Clave incorrecta");
                        }
                    }else{
                        throw new Exception("Clave menor a 6 caracteres");
                    }
                }else{
                    throw new Exception("Usuario invalido");
                }
            }else{
                throw new Exception("Usuario incorrecto");
            }
        }
    }else{
        Page::showMessage(3, "No hay usuarios disponibles");
    }
}catch(Exception $error){
    Page::showMessage(2,$error->getMessage(), null);
}
require_once("../../../app/views/public/alumno/account/ingresar_view.php");
?>