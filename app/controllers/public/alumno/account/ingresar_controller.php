<?php
require_once("../../../app/models/estudiantes.class.php");
try{
    date_default_timezone_set("America/El_Salvador");
    $fecha_actual = date("Y-m-d H:i:s");//Formato que tendrá la fecha
    $fecha_actual = DateTime::createFromFormat('Y-m-d H:i:s', $fecha_actual);//convierto y le doy formato de fecha al string

    $alumno = new Estudiantes;
    if($alumno->getEstudiantes())
    {
        if(isset($_POST['ingresar']))
        {
            $_POST = $alumno->validateForm($_POST);
            if($alumno->setUsuario($_POST['usuario']))
            {
                if($alumno->checkAlumno())
                {
                    $estado_sesion = $alumno->getEstadoSesion();
                    echo $estado_sesion;
                    if($estado_sesion == 0)
                    {
                        $intentos = $alumno->getIntentos();//Obtengo los datos por medio del get y la  guardo en una variable
                        echo $intentos;
                        $estado = $alumno->getEstado();//Obtengo los datos por medio del get y la  guardo en una variable
                        $fecha_contra = $alumno->getFechaContraseña();//Obtengo los datos por medio del get y la  guardo en una variable
                        $fecha_contra = DateTime::createFromFormat('Y-m-d H:i:s', $fecha_contra);//convierto y le doy formato de fecha al string

                        $intervalo = $fecha_contra->diff($fecha_actual);//con diff() saca la diferencia que hay de dos fechas

                        $dias = $intervalo->format('%d');//Aqui saco la diferencia de dias que tienen las fechas
                        //Aqui si se cumple que el estado es 1(inactivo) pero los dias que lleva inactivo es 1 o mayor lo deje pasar. Y si el el estado es 0(activo)
                        if($estado == 1 && $dias >= '1' || $estado == 0)
                        {
                            if($alumno->setContraseña($_POST['clave']))
                            {
                                if($alumno->checkClave())
                                {
                                    $contraseña = $alumno->getContraseña();
                                    if(strlen($contraseña) < 60)
                                    {
                                        $alumno->encryptContraseña();
                                    }

                                    //Si la contraseña esta bien y inicia sesion que los intentos vuelvan a 0
                                    $estado = 0;
                                    $id_usuario = $alumno->getId();
                                    $estado_sesion = 1;
                                    
                                    $alumno->setEstado($estado);
                                    $alumno->setEstadoSesion($estado_sesion);
                                    $alumno->setId($id_usuario);

                                    $alumno->UpdateEstadoSesion();
                                    $alumno->resetIntentos();
                                    $alumno->updateEstado();

                                    $_SESSION['id_estudiante'] = $alumno->getId();
                                    $_SESSION['usuario'] = $alumno-> getUsuario();
                                    Page::showMessage(1, "Autenticación correcta", "../../../public/alumno/index/index.php");
                                }
                                else
                                {
                                    //Si se equivoca en la contraseña que los intentos sumen 1 cada vez que se equivoque y se actualice en la base
                                    $intentos = $intentos + 1;

                                    if($intentos == 3)
                                    {
                                        $intentos = $intentos - 3;
                                        $estado = 1;
                                        $alumno->setIntentos($intentos);
                                        $fecha = $fecha_actual->format('Y-m-d H:i:s');
                                        $alumno->setFechaContraseña($fecha);
                                        $alumno->setEstado($estado);
                                        $alumno->blockUsuario();//Ejecuta el funcion para bloquear el usuario
                                        Page::showMessage(3, "El usuario ha sido bloqueado, espere un dia para volver a iniciar sesion", null);
                                    }
                                    else
                                    {
                                        $alumno->setIntentos($intentos);
                                        $alumno->updateIntentos();
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
                                    $alumno->setIntentos($intentos);
                                    $fecha = $fecha_actual->format('Y-m-d H:i:s');
                                    $alumno->setFechaContraseña($fecha);
                                    $alumno->setEstado($estado);
                                    $alumno->blockUsuario();//Ejecuta el funcion para bloquear el usuario
                                    Page::showMessage(3, "El usuario ha sido bloqueado, espere un dia para volver a iniciar sesion", null);
                                }
                                else
                                {
                                    $alumno->setIntentos($intentos);
                                    $alumno->updateIntentos();
                                    throw new Exception($alumno->getErrorPassword().' vuelva a intentar');
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
        Page::showMessage(3, "No hay usuarios disponibles");
    }
}
catch(Exception $error)
{
    Page::showMessage(2,$error->getMessage(), null);
}
require_once("../../../app/views/public/becados/account/ingresar_view.php");
?>