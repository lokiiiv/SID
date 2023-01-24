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

	do{
		$fila++;
		$celda = $hojaActual->getCellByColumnAndRow(2, $fila);//práctica
		$practica="";
		$practica = $celda->getValue();
	}while($practica!="Prácticas en laboratorios o talleres");
	$fila=$fila+3;
	$compl="";



	///
	$limite=$fila+4;
	$ban=false;
	//echo $fila;
	do{
		$celda = $hojaActual->getCellByColumnAndRow(3, $fila);//práctica
		$practica="";
		$practica = $celda->getValue();
		$laboratorio="";
		$celda = $hojaActual->getCellByColumnAndRow(19, $fila);//laboratorio
		$laboratorio = $celda->getValue();
		if ($practica!="") {
			// code...
			if ($ban) {
				// code...
				$compl=$compl."#$%$#";	
			}
			$ban=true;
			$compl=$compl.$practica."$%&%$".$laboratorio;
		}
		$fila++;

	}while($practica!="" || $fila<$limite);

	
	//$compl=$compl."!#%&/".$totalDeHojas;



	echo $compl."??¡¡".$fila;
	//unlink($archivo);

	
?>