<?php
namespace Classes;

use PHPMailer\PHPMailer\PHPMailer;

class Email{
    public $email;
    public $nombre;
    public $token;

    public function __construct($email,$nombre,$token)
    {
        $this->email=$email;
        $this->nombre=$nombre;
        $this->token=$token;
    }

    public function enviarConfirmacion(){
        //Crear el objeto de email
        $mail= new PHPMailer();
        $mail->isSMTP();
        $mail->Host = 'smtp.mailtrap.io';
        $mail->SMTPAuth = true;
        $mail->Port = 2525;
        $mail->Username = '342e3f6cad5c41';
        $mail->Password = '537b86853f7ee8';

        $mail->setFrom('cuentas@dogtoon.com');
        $mail->addAddress('cuentas@dogtoon.com', 'Dogtoon.com');
        $mail->Subject='Confirma tu cuenta';

        //Set HTML
        $mail->isHTML(TRUE);
        $mail->CharSet= 'UTF-8';

        $contenido= "<html>";
        $contenido.= "<p><strong>Hola " . $this->nombre . "</strong> Has creado tu cuenta en Dogtoon, solo debes confirmarla presionando en el siguiente enlace</p>";
        $contenido.="<p>Presiona aqui: <a href='". $_ENV['HOST'] ."/confirmar-cuenta?token=" . $this->token . "'>Confirmar Cuenta</a></p>";
        $contenido.="<p>Si tu no solicitaste esta cuenta, puedes ignorar este mensaje</p>";
        $contenido.="</html>";
        $mail->Body=$contenido;

        //Enviar el mail
        $mail->send();
    }

    public function enviarInstrucciones(){
        //Crear el objeto de email
        $mail= new PHPMailer();
        $mail->isSMTP();
        $mail->Host = 'smtp.mailtrap.io';
        $mail->SMTPAuth = true;
        $mail->Port = 2525;
        $mail->Username = '342e3f6cad5c41';
        $mail->Password = '537b86853f7ee8';

        $mail->setFrom('cuentas@dogtoon.com');
        $mail->addAddress('cuentas@dogtoon.com', 'Dogtoon.com');
        $mail->Subject='Reestablece tu contraseña';

        //Set HTML
        $mail->isHTML(TRUE);
        $mail->CharSet= 'UTF-8';

        $contenido= "<html>";
        $contenido.= "<p><strong>Hola " . $this->nombre . "</strong> Has solicitado reestablecer tu contraseña, sigue el siguiente enlace para hacerlo.</p>";
        $contenido.="<p>Presiona aqui: <a href='". $_ENV['HOST'] ."/recuperar?token=" . $this->token . "'>Reestablecer Contraseña</a></p>";
        $contenido.="<p>Si tu no solicitaste este cambio, puedes ignorar este mensaje</p>";
        $contenido.="</html>";
        $mail->Body=$contenido;

        //Enviar el mail
        $mail->send();
    }
}