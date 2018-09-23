<?php
require_once("../../../app/models/usuario.class.php");
try {
    // Accioón que se va a ejecutar cuando se de click en el input con nombre "cambiar"
    if (isset($_POST['cambiar'])) 
    {
        $cliente = new Usuario;
        $_SESSION['tiempo'] = time();
        $_POST   = $cliente->validateForm($_POST);
        if ($cliente->setId($_SESSION['id_usuario'])) 
        {
            // Se que clave actual de los dos campos sean iguales
            if ($_POST['clave_actual_1'] == $_POST['clave_actual_2']) 
            {
                if ($cliente->setClave($_POST['clave_actual_1']))
                 {
                    if ($cliente->checkClave()) 
                    {
                        $clave = $_POST['clave_nueva_1'];
                        if ($_POST['clave_actual_1'] != $_POST['clave_nueva_1'])
                        {
                            $cliente->ReadUsuario();
                            if($_POST['clave_nueva_1']!= $cliente->getUsuario())
                            { 
                            if ($_POST['clave_nueva_1'] == $_POST['clave_nueva_2'])
                            {
                                if (strlen($clave) > 7)}
                                {
                                    if (preg_match('`[a-z]`', $clave))
                                    {
                                        if (preg_match('`[A-Z]`', $clave))
                                        {
                                            if (preg_match('`[0-9]`', $clave)) 
                                            {
                                                if ($cliente->setClave($_POST['clave_nueva_1']))
                                                {
                                                    // con mto. ChangePassword se actualiza la contraseña 
                                                    if ($cliente->changePassword())
                                                    {
                                                        Page::showMessage(1, "Clave cambiada", "../../public/index/index.php");
                                                    }
                                                    else
                                                    {
                                                        echo Database::getException();
                                                        throw new Exception(Database::getException());
                                                    }
                                                }
                                                else
                                                {
                                                    throw new Exception("Clave inválida");
                                                }
                                            }
                                            else
                                            {
                                                throw new Exception("La clave debe tener al menos un caracter numérico");
                                            }
                                        }
                                        else 
                                        {
                                            throw new Exception("La clave debe tener al menos una letra mayúscula");
                                        }
                                        
                                    }
                                    else
                                    {
                                        throw new Exception("La clave debe tener al menos un caracter alfanumérico");
                                    }
                                }
                                else
                                {
                                    throw new Exception("La clave debe de poseer al menos 8 caracteres");
                                }
                                
                            } 
                            else
                            {
                                throw new Exception("Claves nuevas diferentes");
                            }
                        }
                        else
                        {
                            throw new Exception("La clave es igual al usuario");
                        }
                        
                        }
                        else
                        {
                            throw new Exception("La clave no debe de ser igual a la anterior");
                        }
                        
                    } 
                    else
                    {
                        throw new Exception("Clave actual incorrecta");
                    }
                } 
                else 
                {
                    throw new Exception("Clave inválida");
                }
            } 
            else 
            {
                throw new Exception("Claves actuales diferentes");
            }
        } 
        else
        {
            Page::showMessage(2, "Usuario incorrecto", "index.php");
        }
    }
}
catch (Exception $error) {
    Page::showMessage(2, $error->getMessage(), null);
}
require_once("../../../app/views/dashboard/ingresar/contraseña_view.php");
?>