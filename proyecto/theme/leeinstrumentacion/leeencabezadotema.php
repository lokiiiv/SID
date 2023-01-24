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
	$indiceHoja=$hoja;

	$hojaActual = $documento->getSheet($indiceHoja);
	//echo "<h3>Hoja: ".$totalDeHojas[$indiceHoja]."</h3>";

	//LEYENDO LAS PARTES QUE COINCIDEN EN TODOS LOS TEMAS
	$compl="";
	///
	$temae = $hojaActual->getCellByColumnAndRow(9, 29);//Nombre del tema
	$compl=$temae;

	$comptem = $hojaActual->getCellByColumnAndRow(2, 32);//comptencia de cada tema
	$compl=$compl."#%&".$comptem;

	$cgenericas = $hojaActual->getCellByColumnAndRow(2, 36);//comptencias genericas
	$compl=$compl."#%&".$cgenericas;
	//$compl=$compl."!#%&/".$totalDeHojas;



	echo $compl;
	//unlink($archivo);

	
?>