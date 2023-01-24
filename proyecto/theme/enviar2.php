<?php
$nombre = $_POST['nombre'];

$empresa = $_POST['Mensaje'];
//https://www.jose-aguilar.com/blog/autocompletar-campo-con-jquery-ajax-y-php/

$header = 'From: rortega@itesa.edu.mx' . " \r\n";
$header .= "X-Mailer: PHP/" . phpversion() . " \r\n";
$header .= "Mime-Version: 1.0 \r\n";
$header .= "Content-Type: text/plain";

$mensaje = "Tu jefe de división: " . $nombre . ",\r\n";

$mensaje .= "Envió un comentario acerca de la lista de la lista de cotejo: " . $_POST['Mensaje'] . " \r\n";
$mensaje .= "Enviado el " . date('d/m/Y', time());

$para = $_POST['emailD'];
$asunto = 'Acerca de la lista de cotejo';

mail($para, $asunto, utf8_decode($mensaje), $header);

header("Location:cordi.php");
?>