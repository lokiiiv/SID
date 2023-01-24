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
	$limite=$fila+50;
	$ban=false;

	//echo $fila;
	do{
		$celda = $hojaActual->getCellByColumnAndRow(2, $fila);//Fuentes de información
		$refe="";
		$refe = $celda->getValue();
		if ($refe=="9- Fuentes de Información") {
			// code...
			$fila++;
			break;
		}
		//echo "ok".$refe;
		$fila++;
	}while($refe!="9- Fuentes de Información");//si encuentra la referencia romple ciclo y se comienza con la lectura de las referencias
	//echo $fila;
	$data=array();
	$fila++;
	$cont=0;
	do {
		$celda = $hojaActual->getCellByColumnAndRow(3, $fila);//Fuentes de información
		$refe="";
		$refe = $celda->getValue();
		if ($refe!="") {
			$refe = preg_replace("/[\r\n|\n|\r]+/", " ", $refe);
			$data[$cont]=$refe;
			//echo $refe."----";
			$cont++;
			// code...
		}
		$fila++;
	} while ($refe!="");
	$data[$cont]=$fila;

	echo json_encode($data);
	//$compl=$compl."!#%&/".$totalDeHojas;

	//unlink($archivo);

	
?>