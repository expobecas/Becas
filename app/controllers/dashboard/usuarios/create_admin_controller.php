<?php

require_once('../../app/models/usuario.class.php');
try
{
    $_SESSION['lapso'] = time();
    $usuario = new Usuario;
    $usuarios = $usuario->getUsuarios();

    if(!$usuarios)
    {
        require_once('../../app/views/dashboard/usuarios/create_admin_view.php');
    }
    else
    {
        Page::showMessage(2, 'Ya existen usuarios', '../ingresar/acceder.php');
    }
    if(isset($_POST['crear']))
    {
        $_POST = $usuario->validateForm($_POST);
        if($usuario->setNombres($_POST['nombre']))
        {
            if($usuario->setApellidos($_POST['apellido']))
            {
                $correos = $usuario->getCorreos();
                foreach($correos as $row)
                {
                    $correo = $row['correo'];
                    if($correo == $_POST['correo'])
                    {
                        Page::showMessage(2, 'El correo electronico ya sido guardado, por favor ingrese otro', null);
                    }
                    else
                    {
                        if($usuario->setCorreo($_POST['correo']))
                        {
                            if($usuario->setUsuario($_POST['usuario']))
                            {
                                if($_POST['contraseña'] != $_POST['usuario'])
                                {
                                    if($_POST['contraseña'] != $_POST['correo'])
                                    {
                                        if($_POST['contraseña'] == $_POST['contraseña_c'])
                                        {
                                            $usuario->setTipo(1);
                                            if($usuario->setClave($_POST['contraseña']))
                                            {
                                                if($usuario->createAdmin())
                                                {
                                                    Page::showMessage(1, 'El administrador se ha creado', '../ingresar/acceder.php');
                                                }
                                                else
                                                {
                                                    throw new Exception(Database::getException());
                                                }
                                            }
                                            else
                                            {
                                                Page::showMessage(2, $usuario->getErrorPassword(), null);
                                            }
                                        }
                                        else
                                        {
                                            Page::showMessage(2, 'Las contraseñas no son las mismas', null);
                                        }
                                    }
                                    else
                                    {
                                        Page::showMessage(2, 'La contraseña no puede ser igual al correo electrónico', null);
                                    }
                                }
                                else
                                {
                                    Page::showMessage(2, 'La contraseña no puede ser igual al usuario', null);
                                }
                            }
                            else
                            {
                                Page::showMessage(2, 'Ingrese el usuario de la administradora', null);
                            }
                        }
                        else
                        {
                            Page::showMessage(2, 'Ingrese los correo electronico de la administradora', null);
                        }
                    }
                }
            }
            else
            {
                Page::showMessage(2, 'Ingrese los apellidos de la administradora', null);
            }
        }
        else
        {
            Page::showMessage(2, 'Ingrese los nombres de la administradora', null);
        }
    }
    
}
catch(Exception $error)
{
    Page::showMessage(2, $error->getMessage(), null);
}
?>