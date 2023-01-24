<?php



if(isset($_FILES['firmarr'])){

include  ('firmas.php');
$conexion="";
$nom=$_REQUEST['nombrefirma']; //Lo que mandamos de nuestra tabla
$nombreimagen=$_FILES ['firmarr']['name']; //Nombre de la foto
$ruta=$_FILES['firmarr']['tmp_name']; //Donde viene la foto
$destino="firmasimagenes/".$nombreimagen; // Donde se va a guardar la foto

if (copy($ruta, $destino)){
$sql = ("INSERT INTO 'firmasdocentes' (firma.nombrefirma) VALUES ('', '$nom','$destino',)");
$res = mysqli_query($sql,$conexion);
if ($res)
{
echo '';
}else{
	die ("Error: ".mysqli_error($conexion));
}

}

}















?>