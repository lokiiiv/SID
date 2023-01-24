<?php



$para = '16030583@itesa.edu.mx';
$asunto = 'Validación lista de cotejo';

mail($para, $asunto, utf8_decode("La lista de cotejo ha sido validada, por favor revísala." ));

header("Location:presi.php");
?>