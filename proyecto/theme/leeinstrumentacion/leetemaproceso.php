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
	$hoja=$_POST["tema"]; //iniciando en la cero
	//echo "ok";	
	//leyendo archivo de excel
	$documento=IOFactory::load($archivo);
	//echo $documento->getSheetNames();
	//$totalDeHojas = $documento->getSheetNames();
		//echo "okok";
	$indiceHoja=$hoja;

	$hojaActual = $documento->getSheet($indiceHoja);
	//echo "<h3>Hoja: ".$totalDeHojas[$indiceHoja]."</h3>";

	$compl="";
	///


	$temae = $hojaActual->getCellByColumnAndRow(6, 41);//Nombre del tema

	$fila = 41;
	//buscando el indicador 1 en el while

	do{
		$fila++;
		$celda = $hojaActual->getCellByColumnAndRow(6, $fila);
		$docenn = $celda->getValue();
		$celda = $hojaActual->getCellByColumnAndRow(14, $fila);
		$alumn = $celda->getValue();
		$celda = $hojaActual->getCellByColumnAndRow(2, $fila);
		if ($celda!="Horas teórico-prácticas") {
			$compl=$compl.$docenn."&%#!".$alumn."!#%&";
		}else{
			break;
		}
	}while($fila<100);
	$ts = $hojaActual->getCellByColumnAndRow(2, 42);
	$poss=0;
	do{
		$celda = $hojaActual->getCellByColumnAndRow(2, (42+$poss));
		if ($celda->getValue()!="") {
			$ts = $celda->getValue();
			// code...
		}else{
			break;
		}
		$poss++;

	}while($poss<100);	
	if ($ts=="") {
		$ts="No se encontró escrito en el excel los temas y subtemas";
	}
	$rad = $hojaActual->getCellByColumnAndRow(21, 42);
	$HTP=$hojaActual->getCellByColumnAndRow(21, $fila);
	$compl=$compl."($%&".$fila."&?&".$ts."&?&".$rad."&?&".$HTP;	
	echo $compl;
	//unlink($archivo);

	
?>