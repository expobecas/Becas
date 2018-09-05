<?php
require_once ("../../../app/models/estudiantes.class.php");
try {
    $_SESSION['lapso'] = time();
    if (isset($_GET['id'])) {
        $estudiantes = new Estudiantes;
        $id_encrypt = $_GET['id'];
        $ids_estudiantes = $estudiantes->getIdEstudiantes();
        $id = "";
        foreach($ids_estudiantes as $row)
        {
            $id_estudiante = $row['id_estudiante'];
            if(password_verify($id_estudiante, $id_encrypt))
            {
                $id = $id_estudiante;
            }
        }

        if ($estudiantes->setId($id))
        {
            if ($estudiantes->readPerfil())
            {
                if (isset($_POST['editar']))
                {
                    $_POST = $estudiantes->validateForm($_POST);
                    if ($estudiantes->setUsuario($_POST['usuario']))
                    {
                        if ($estudiantes->updatePerfil())
                        {
                            Page::showMessage(1, "Perfil modificado", "../../../public/becados/index/becado.php");
                        }
                        else
                        {
                            throw new Exception("MATATE :)");
                        }
                    }
                    else
                    {
                        throw new Exception("Usuario invalido");
                    }   
                }
            }
            else
            {
                throw new Exception("No se encontraron resultados");
            }
        }
        else
        {
            Page::showMessage(2, "Usuario incorrecto", '../index/becado.php');
        }
    }
    else
    {
        Page::showMessage(2, "No hay un usuario seleccionado", '../index/becado.php');
    }
}
catch(Exception $error){
    Page::showMessage(2, $error->getMessage(), null);
}
require_once ("../../../app/views/public/becados/account/editar_view.php");
?>