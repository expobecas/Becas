<?php

require_once('../../app/models/usuario.class.php');
require_once ("../../app/libraries/recaptcha-1.0.0/php/recaptchalib.php");
try
{
    $usuario = new Usuario;
    $usuarios = $usuario->getUsuarios();
    /*if(!$usuarios)
    {*/
        require_once('../../app/views/dashboard/usuarios/create_admin_view.php');
    /*}
    else
    {
        Page::showMessage(2, 'Ya existen usuarios', '../ingresar/acceder.php');
    }*/
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
                        throw new Exception('El correo electronico ya sido guardado, por favor ingrese otro');                        
                    }
                }

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
                                        $response_recaptcha = $_POST['g-recaptcha-response'];
                                        if (isset($response_recaptcha) && $response_recaptcha) {	
                                            $secret = "6LdE7WsUAAAAAPMBlXANwFIK4CWyeg_kW2i-zWD7"; //CLAVE SECRETA QUE DA EL SITIO DE CAPTCHA
                                            $ip = $_SERVER['REMOTE_ADDR'];
                                            $validation_server = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$secret&response=$response_recaptcha&remoteip=$ip");
                                            if ($validation_server != null) {
                                        if($usuario->createAdmin())
                                        {
                                            Page::showMessage(1, 'El administrador se ha creado', '../ingresar/acceder.php');
                                        }
                                        else
                                        {
                                            echo Database::getException();
                                            throw new Exception(Database::getException());
                                        }
                                    }
                                    else {
                                        throw new Exception("NO");
                                    }
                                }
                                else {
                                    throw new Exception("Debe de confirmar que no es un robot");
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
                    Page::showMessage(2, 'Ingrese el correo electronico de la administradora', null);
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