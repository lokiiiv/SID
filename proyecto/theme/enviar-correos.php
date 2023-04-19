<?php
header("Content-Type: application/json");
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require_once './../../valida.php';
require './../../vendor/autoload.php';
require_once './conexion/conexionNoSQL.php';

try {
    if (isset($_POST['accionCorreo']) && !empty($_POST['accionCorreo'])) {
        $accion = $_POST['accionCorreo'];
        $para = isset($_POST['presidenteCorreo']) ? $_POST['presidenteCorreo'] : '';
        $asunto = "";
        $contenido = "";

        //Preparar el envio del correo electronico
        $mail = new PHPMailer(true);
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->Port = 465;
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
        $mail->SMTPAuth = true;
        //Credenciales de la cuenta origen
        $email = 'programador_isc@itesa.edu.mx';
        $mail->Username = $email;
        $mail->Password = '9641GDH2023';
        $mail->setFrom($email, 'Instrumentaciones didácticas ITESA.');

        //Generar el asunto y contenido del correo conforme a la accion requerida
        switch($accion) {
            case 'validaPresidente':
                $nombrePresidente = $_POST['presidenteNombre'];
                $asignatura = $_POST['asignatura'];
                $grupo = $_POST['grupo'];
                $docente = $_POST['docente'];
                $claveAsignatura = $_POST['claveAsignatura'];

                //Destinatario
                $mail->addAddress($para, $nombrePresidente);

                //Asunto y contenido del correo cuando es para avisar de que el presidente de grupo academico debe validar instrumentacion
                $asunto = "Validación de instrumentación didáctica - Presidente de grupo académico";
                $contenido = "<div style='text-align: justify; text-justify: inter-word;'><h3>La instrumentación didáctica de la asignatura de <b>" . $asignatura . " (" . $claveAsignatura . ")" . "</b> del grupo/grupos <b>" . $grupo . "</b> ha sido generada y enviada por el/la docente <b>" . $docente . "</b> para su respectiva validación.<br><br>Por favor ingrese a la página del sistema de instrumentaciones didácticas y revise la instrumentación para validarla o cancelarla si es necesario.</h3></div>";

                $mail->Subject = $asunto;
                $mail->isHTML(true);
                $mail->CharSet = 'UTF-8';
                $mail->Body = $contenido;

                if(!$mail->send())
                    throw new Exception($mail->ErrorInfo);
                echo json_encode(['success' => true, 'mensaje' => 'El presidente de grupo academico de la asignatura ha sido notificado.']);
                
                break;

            case 'denegarInstruPresidente':
                //Obtener los correos
                break;
        }
    }

} catch (Exception $e) {
    echo json_encode(['success' => false, 'mensaje' => $e->getMessage()]);
}
?>
