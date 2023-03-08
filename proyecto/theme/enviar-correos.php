<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require_once './../../valida.php';
require './../../vendor/autoload.php';

try {
    $mail = new PHPMailer(true);
    $mail->isSMTP();
    $mail->SMTPDebug = 

    //Set the hostname of the mail server
    $mail->Host = 'smtp.gmail.com';
    $mail->Port = 465; // o 587

    // Propiedad para establecer la seguridad de encripción de la comunicación
    $mail->SMTPSecure    = PHPMailer::ENCRYPTION_SMTPS; // tls o ssl para gmail obligado

    // Para activar la autenticación smtp del servidor
    $mail->SMTPAuth      = true;

    // Credenciales de la cuenta
    $email = 'programador_isc@itesa.edu.mx';
    $mail->Username     = $email;
    $mail->Password     = '9641GDH2023';

    // Quien envía este mensaje
    $mail->setFrom($email, 'Instrumentaciones didácticas ITESA');


    // Destinatario
    $mail->addAddress('18030290@itesa.edu.mx');
    // Asunto del correo
    $mail->Subject = 'Prueba';

    // Contenido
    $mail->IsHTML(true);
    $mail->CharSet = 'UTF-8';
    $mail->Body    = sprintf('<h1>El mensaje es:</h1><br><p>%s</p>', 'Contenido de prueba');
 
    // Texto alternativo
    $mail->AltBody = 'No olvides suscribirte a nuestro canal.';

    // Agregar algún adjunto
    //$mail->addAttachment(IMAGES_PATH.'logo.png');
 
    // Enviar el correo
    if (!$mail->send()) 
      throw new Exception($mail->ErrorInfo);
    echo 'Correo enviado con exito';

    /* if (isset($_POST['accionCorreo'])  && !empty($_POST['accionCorreo'])) {
        $action = $_POST['accionCorreo'];
        switch ($action) {
            case 'validaPresidente':
                break;
            case '':
                break;
            case '':
                break;
        }
    } */

} catch (Exception $e) {
    echo $e->getMessage();
}

?>
