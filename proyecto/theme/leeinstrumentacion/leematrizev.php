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
		$celda = $hojaActual->getCellByColumnAndRow(2, $fila);
		$practica = $celda->getValue();
		$fila++;

	}while($practica!="Evidencia de aprendizaje" && $fila<$limite);
	$limite=$fila+5;
	//se encontró
	$todo="";
	$ban=false;
	do{
		$fila++;//fila después
		$celda = $hojaActual->getCellByColumnAndRow(2, $fila);
		$dato = $celda->getValue();
		if ($dato!="Total" && $dato!="") {
			$celda = $hojaActual->getCellByColumnAndRow(2, $fila);
			$evidencia = $celda->getValue();
			$celda = $hojaActual->getCellByColumnAndRow(9, $fila);
			$por = $celda->getValue();
			$celda = $hojaActual->getCellByColumnAndRow(11, $fila);
			$A = $celda->getValue();
			$celda = $hojaActual->getCellByColumnAndRow(12, $fila);
			$B = $celda->getValue();
			$celda = $hojaActual->getCellByColumnAndRow(13, $fila);
			$C = $celda->getValue();
			$celda = $hojaActual->getCellByColumnAndRow(14, $fila);
			$D = $celda->getValue();
			$celda = $hojaActual->getCellByColumnAndRow(15, $fila);
			$E = $celda->getValue();
			$celda = $hojaActual->getCellByColumnAndRow(16, $fila);
			$F = $celda->getValue();
			$celda = $hojaActual->getCellByColumnAndRow(17, $fila);
			$instrumento = $celda->getValue();
			$celda = $hojaActual->getCellByColumnAndRow(24, $fila);
			$PP = $celda->getValue();
			$celda = $hojaActual->getCellByColumnAndRow(25, $fila);
			$CC = $celda->getValue();
			$celda = $hojaActual->getCellByColumnAndRow(26, $fila);
			$AA = $celda->getValue();
			if ($ban==true) {
				$todo=$todo."??¡¡";
			}
			$ban=true;
			$todo=$todo.$evidencia."$%&".$por."$%&".$A."$%&".$B."$%&".$C."$%&".$D."$%&".$E."$%&".$F."$%&".$instrumento."$%&".$PP."$%&".$CC."$%&".$AA;
		}
	}while($dato!="Total" && $fila<$limite);
	echo $todo."##))".$fila;
	//unlink($archivo);

	
?>