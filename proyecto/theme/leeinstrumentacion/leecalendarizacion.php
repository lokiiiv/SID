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

	
	
	///
	$limite=$fila+50;
	$ban=false;

	//echo $fila;
	do{
		$celda = $hojaActual->getCellByColumnAndRow(2, $fila);//Fuentes de información
		$refe="";
		$refe = $celda->getValue();
		if ($refe=="8.- Calendarización de evaluación en semanas") {
			// code...
			$fila++;
			break;
		}
		//echo "ok".$refe;
		$fila++;
	}while($refe!="8.- Calendarización de evaluación en semanas");//si encuentra la calendarización romple ciclo y se comienza con la lectura de la calendarización
	//echo $fila;
	$gen=array();
	$grupf=array();
	$sem=array();
	$fila++;
	//$fila++;
	$cont=0;
	$celda = $hojaActual->getCellByColumnAndRow(7, $fila);
	//echo $fila;
	$ant=$celda->getCalculatedValue();
	$ant=substr($ant, 0, -1);
	$fff="";
	//echo $ant;
	do {
		$grup=array();
		//grupo
		$celda = $hojaActual->getCellByColumnAndRow(7, $fila);
		$grupo = $celda->getCalculatedValue();
		$celda = $hojaActual->getCellByColumnAndRow(15, $fila);
		if($celda!="")
			$fi = $celda->getFormattedValue();
		else
			$fi = "3/3/22";
		$celda = $hojaActual->getCellByColumnAndRow(22, $fila);		
		if($celda!="")
			$ff = $celda->getFormattedValue();
		else
			$ff = "3/3/22";
		//echo "-".$grupo."-";
		if ($ant==substr($grupo, 0, -1)) {
			//$ant=$grupo;
			$grup[0]=$grupo;
			$grup[1]=$fi;
			$grup[2]=$ff;
			$grupf[$cont]=$grup;
			$cont++;
			//echo "ok";
		}
		$fila++;
		
		$celda = $hojaActual->getCellByColumnAndRow(22, $fila);
		$fff = $celda->getFormattedValue();
	} while ($fff!="" );
	//echo $fila;
	$fila++;
	$gen[0]=$grupf;
	$fila++;
	$cont=7;
	$contv=0;
	do {
		$celda = $hojaActual->getCellByColumnAndRow($cont, $fila);
		$tp = $celda->getValue();
		$cont++;
		$sem[$contv]=$tp;
		$contv++;
	} while ($cont<25);
	$gen[1]=$sem;

	echo json_encode($gen);
	//$compl=$compl."!#%&/".$totalDeHojas;

	//unlink($archivo);

	
?>