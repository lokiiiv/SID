<?php
// Cargamos la librería dompdf que hemos instalado en la carpeta dompdf
require_once 'dompdf/autoload.inc.php';
use Dompdf\Dompdf;

$grupo = $_GET['grupo'];

$html= file_get_contents_curl("http://localhost/webs/proyectoIns/V2/proyecto/theme/generarInstrumentacion.php");


 
// Instanciamos un objeto de la clase DOMPDF.
$pdf = new DOMPDF();
 
// Definimos el tamaño y orientación del papel que queremos.
$pdf->set_paper("A3", "portrait");
//$pdf->set_paper(array(0,0,104,250));
 
// Cargamos el contenido HTML.
$pdf->load_html($html);
 
// Renderizamos el documento PDF.
$pdf->render();
 
// Enviamos el fichero PDF al navegador.
$pdf->stream('Tema.pdf');


function file_get_contents_curl($url) {
	$crl = curl_init();
	$timeout = 5;
	curl_setopt($crl, CURLOPT_URL, $url);
	curl_setopt($crl, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($crl, CURLOPT_CONNECTTIMEOUT, $timeout);
	$ret = curl_exec($crl);
	curl_close($crl);
	return $ret;
}
/*$header = 'From: rortega@itesa.edu.mx' . " \r\n";
$header .= "X-Mailer: PHP/" . phpversion() . " \r\n";
$header .= "Mime-Version: 1.0 \r\n";
$header .= "Content-Type: text/plain";

$mensaje .= "Tu jefe de división: Roman "."\r\n";

$mensaje .= "Envió un comentario acerca de la lista de la lista de cotejo: ha sido validada "." \r\n";
$mensaje .= "Enviado el " . date('d/m/Y', time());

$para = "gcuaya@itesa.edu.mx";
$asunto = 'Ya funciona';

mail($para, $asunto, utf8_decode($mensaje), $header);

//header("Location:cordi.php");
*/
?>