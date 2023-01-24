<?php
$nombre = $_POST['nombre'];
$mail = $_POST['email'];
$empresa = $_POST['mensaje'];

$header = 'From: mcruz@itesa.edu.mx' . " \r\n";
$header .= "X-Mailer: PHP/" . phpversion() . " \r\n";
$header .= "Mime-Version: 1.0 \r\n";
$header .= "Content-Type: text/plain";

$mensaje = "Presidente Académico: " . $nombre . ",\r\n";

$mensaje .= $_POST['Mensaje'] . " \r\n";
$mensaje .= "Enviado el " . date('d/m/Y', time());

$para = $_POST['emailD'];
$asunto = 'Lista de cotejo validada';

mail($para, $asunto, utf8_decode($mensaje), $header);

header("Location:presi.php");
?>