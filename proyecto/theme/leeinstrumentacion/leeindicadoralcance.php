<?php 
	//error_reporting(0);

	require '../../../vendor/autoload.php';
	session_start();
	//echo "okok";
	use PhpOffice\PhpSpreadsheet\Spreadsheet;
	use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
	use PhpOffice\PhpSpreadsheet\IOFactory;
	$directorio = 'archivoss/';
	$archivo=$_SESSION["archivo"];
	$extension=$_SESSION["extension"];
	$cadealea=$_SESSION["cadealea"];
	$subir_archivo=$_SESSION["subirarchivo"];
	//echo "ok";	
	//leyendo archivo de excel
	$documento=IOFactory::load($archivo);
	//echo $documento->getSheetNames();
	//$totalDeHojas = $documento->getSheetNames();
		//echo "okok";
	$hoja=$_POST["tema"];
	$fila=$_POST["fila"];
	$indiceHoja=$hoja;

	$hojaActual = $documento->getSheet($indiceHoja);
	//echo "<h3>Hoja: ".$totalDeHojas[$indiceHoja]."</h3>";

	
	$compl="";
	///
	//$limite=$fila+4;
	//$ban=false;
	//echo $fila;
	//$celda = $hojaActual->getCellByColumnAndRow(2, $fila);//leyendo la fila en la que se quedó la ultima vez para buscar el título "Indicadores de alcance"

	$limite=$fila+100;
	do{
		$celda = $hojaActual->getCellByColumnAndRow(8, $fila);
		$practica = $celda->getValue();
		$fila++;

	}while($practica!="Indicadores de alcance" && $fila<$limite);

	//se encontró
	//$fila++;
	$celda = $hojaActual->getCellByColumnAndRow(8, $fila);
	$valor = $celda->getValue();

	echo $valor."??¡¡".$fila;
	//unlink($archivo);

	
?>