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
	$totalDeHojas = $documento->getSheetCount();
	$data=array();
	$cont=0;
	for ($indiceHoja = 0; $indiceHoja < $totalDeHojas; $indiceHoja++) {
		$hojaActual = $documento->getSheet($indiceHoja);
		$celda = $hojaActual->getCellByColumnAndRow(13, 4);//Fuentes de información
		$refe = $celda->getValue();
		if ($refe=="Instrumentación Didáctica") {
			$data[$cont]=$indiceHoja;
			$cont++;
		}
	}
	echo json_encode($data);
	//$compl=$compl."!#%&/".$totalDeHojas;

	//unlink($archivo);

	
?>