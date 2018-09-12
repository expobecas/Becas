<?php 
require_once("../../app/models/usuario.class.php");
try{
    date_default_timezone_set("America/El_Salvador");
    $fecha_actual = date("Y-m-d H:i:s");//Formato que tendrá la fecha
    $fecha_actual = DateTime::createFromFormat('Y-m-d H:i:s', $fecha_actual);//convierto y le doy formato de fecha al string

    $usuarios = new Usuario;
    if($usuarios->getUsuarios())
    {
        if(isset($_POST['ingresar']))
        {
            $_POST = $usuarios->validateForm($_POST);
            if($usuarios->setUsuario($_POST['usuario']))
            {
                if($usuarios->checkUsuario())
                {
                    $estado_sesion = $usuarios->getEstadoSesion();
                    if($estado_sesion == 0)
                    {
                        $intentos = $usuarios->getIntentos();//Obtengo los datos por medio del get y la  guardo en una variable
                        $estado = $usuarios->getEstado();//Obtengo los datos por medio del get y la  guardo en una variable
                        $fecha_contra = $usuarios->getFechaContraseña();//Obtengo los datos por medio del get y la  guardo en una variable
                        $fecha_contra = DateTime::createFromFormat('Y-m-d H:i:s', $fecha_contra);//convierto y le doy formato de fecha al string

                        $intervalo = $fecha_contra->diff($fecha_actual);//con diff() saca la diferencia que hay de dos fechas

                        $dias = $intervalo->format('%d');//Aqui saco la diferencia de dias que tienen las fechas
                        //Aqui si se cumple que el estado es 1(inactivo) pero los dias que lleva inactivo es 1 o mayor lo deje pasar. Y si el el estado es 0(activo)
                        if($estado == 1 && $dias >= '1' || $estado == 0)
                        {
                            if($usuarios->setClave($_POST['clave']))
                            {
                                if($usuarios->checkClave())
                                {
                                    $contraseña = $usuarios->getClave();
                                    if(strlen($contraseña) < 60)
                                    {
                                        $usuarios->encryptContraseña();
                                    }

                                    //Si la contraseña esta bien y inicia sesion que los intentos vuelvan a 0
                                    $estado = 0;
                                    $id_usuario = $usuarios->getId();
                                    $estado_sesion = 1;
                                    
                                    $usuarios->setEstado($estado);
                                    $usuarios->setEstadoSesion($estado_sesion);
                                    $usuarios->setId($id_usuario);

                                    $usuarios->UpdateEstadoSesion();
                                    $usuarios->resetIntentos();
                                    $usuarios->updateEstado();

                                    $_SESSION['id_usuario'] = $usuarios->getId();
                                    $_SESSION['usuario'] = $usuarios->getUsuario();
                                    $_SESSION['id_tipo'] = $usuarios->getTipo();
                                    $_SESSION['fecha_creacion'] = $usuarios->getFechaContraseña();
                            
                                    $fechainicio = $_SESSION['fecha_creacion'];
							        $fechaLimite = strtotime('+90 day', strtotime($fechainicio));
							        $fechaLimite = date('Y-m-j', $fechaLimite); 
                                    $hoy = date("Y-m-j");
                                    if ($hoy >= $fechaLimite) {
										Page::showMessage(2, "El uso de tu contraseña ha expirado", "../../dashboard/usuarios/cambiar_contrasena.php");
									} else
                                    if($_SESSION['id_tipo'] == 1)
                                    {
                                        Page::showMessage(1, "Autenticación correcta", "../../dashboard/index/index.php");
                                    }else
                                    if($_SESSION['id_tipo'] == 2)
                                    {
                                        Page::showMessage(1, "Autenticación correcta", "../../public/jefes/index/index.php");
                                    }else
                                    if($_SESSION['id_tipo'] == 3)
                                    {
                                        Page::showMessage(1, "Autenticación correcta", "../../public/empresa/index/index.php");
                                    }
                                }
                                else
                                {
                                    //Si se equivoca en la contraseña que los intentos sumen 1 cada vez que se equivoque y se actualice en la base
                                    $intentos = $intentos + 1;

                                    if($intentos == 3)
                                    {
                                        $intentos = $intentos - 3;
                                        $estado = 1;
                                        $usuarios->setIntentos($intentos);
                                        $fecha = $fecha_actual->format('Y-m-d H:i:s');
                                        $usuarios->setFechaContraseña($fecha);
                                        $usuarios->setEstado($estado);
                                        $usuarios->blockUsuario();//Ejecuta el funcion para bloquear el usuario
                                        Page::showMessage(3, "El usuario ha sido bloqueado, espere un dia para volver a iniciar sesion", null);
                                    }
                                    else
                                    {
                                        $usuarios->setIntentos($intentos);
                                        $usuarios->updateIntentos();
                                        throw new Exception("Clave incorrecta");
                                    }
                                }
                            }
                            else
                            {
                                //Si se equivoca en la contraseña que los intentos sumen 1 cada vez que se equivoque y se actualice en la base
                                $intentos = $intentos + 1;

                                if($intentos == 3)
                                {
                                    $intentos = $intentos - 3;
                                    $estado = 1;
                                    $usuarios->setIntentos($intentos);
                                    $fecha = $fecha_actual->format('Y-m-d H:i:s');
                                    $usuarios->setFechaContraseña($fecha);
                                    $usuarios->setEstado($estado);
                                    $usuarios->blockUsuario();//Ejecuta el funcion para bloquear el usuario
                                    Page::showMessage(3, "El usuario ha sido bloqueado, espere un dia para volver a iniciar sesion", null);
                                }
                                else
                                {
                                    $usuarios->setIntentos($intentos);
                                    $usuarios->updateIntentos();
                                    throw new Exception($usuarios->getErrorPassword().' vuelva a intentar');
                                }
                            }
                        }
                        else
                        {
                            Page::showMessage(3, "Este usuario esta bloqueado por favor espere 24 horas",  null);
                        }
                    }
                    else
                    {
                        Page::showMessage(3, "Este usuario está siendo usado en estos momentos", null);
                    }
                }
                else
                {
                    throw new Exception("Usuario invalido");
                }
            }
            else
            {
                throw new Exception("Usuario incorrecto");
            }
        }
    }
    else
    {
		Page::showMessage(3, "No hay usuarios disponibles", "../usuarios/create_admin.php");
	}
    
}
catch(Exception $error)
{
    Page::showMessage(2,$error->getMessage(), null);
}
require_once("../../app/views/dashboard/ingresar/acceder_view.php");
?> 