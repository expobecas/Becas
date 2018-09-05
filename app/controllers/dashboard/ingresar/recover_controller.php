<?php
require_once('../../app/models/usuario.class.php');
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require_once('../../app/helpers/mailer/PHPMailer.php');
require_once('../../app/helpers/mailer/SMTP.php');
require_once('../../app/helpers/mailer/Exception.php');
try
{
    $usuario = new Usuario;
    if(isset($_POST['recuperar']))
    {
        $contra = $usuario->generaPass();
        echo $contra;
        $_POST = $usuario->validateForm($_POST);
        $nombre_usuario = $_POST['usuario'];
        if($usuario->setUsuario($nombre_usuario))
        {
            if($usuario->checkUsuario())
            {
                $correo = $usuario->getCorreo();
                if($correo == $_POST['correo'])
                {
                    $message= "
                            Hola , $correo
                            <br /><br />
                            Nos solicitaron restablecer su contraseña
                            <br /><br />
                            Su nueva contraseña es: $contra
                            ";
                    $subject = utf8_decode("Restablecer contraseña");

                    
                    $mail = new PHPMailer();
                    $mail->IsSMTP();
                    $mail->SMTPDebug  = 0;
                    $mail->SMTPAuth   = true;
                    $mail->SMTPSecure = "ssl";
                    $mail->Host       = "smtp.gmail.com";
                    $mail->Port       = 465;
                    $mail->AddAddress($correo);
                    $mail->Username="thebestdestroyer6@gmail.com";
                    $mail->Password="Castillo.99";
                    $mail->SetFrom('thebestdestroyer6@gmail.com','Ricaldone');
                    $mail->AddReplyTo("thebestdestroyer6@gmail.com","Ricaldone");
                    $mail->Subject    = $subject;
                    $mail->MsgHTML($message);
                    if($mail->Send())
                    {
                        $clave = $usuario->getClave();
                        if($usuario->setClave($contra))
                        {
                            if($usuario->encryptContraseña())
                            {
                                Page::showMessage(1, 'La nueva contraseña se envia al correo electrónico', '../ingresar/acceder.php');
                            }
                        }
                        else
                        {
                            throw new Exception($usuario->getErrorPassword());
                            //Page::showMessage(2, 'Ocurrio un problema la enviar el correo, por favor intente de nuevo', null);
                        }                        
                    }
                    else
                    {
                        Page::showMessage(2, 'Ocurrio un problema la enviar el correo, por favor intente de nuevo', null);
                    }
                }
                else
                {
                    Page::showMessage(3, 'ingrese el correo electrónico que digitó cuando creo su usuario', null);
                }
            }
            else
            {
                Page::showMessage(3, 'Usuario invalido', null);
            }
        }
        else
        {
            Page::showMessage(3, 'Ingrese su usuario', null);
        }
    }
}
catch(Exception $error)
{
    Page::showMessage(2, $error->getMessage(), null);
}
require_once('../../app/views/dashboard/ingresar/recover.php');
?>