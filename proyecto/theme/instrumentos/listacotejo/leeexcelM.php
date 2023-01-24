<?php 
	error_reporting(0);
	require '../../../../vendor/autoload.php';

	use PhpOffice\PhpSpreadsheet\Spreadsheet;
	use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
	use PhpOffice\PhpSpreadsheet\IOFactory;
	$directorio = 'archivoss/';
	session_start();
	$archivo=$_SESSION["archivo"];
	$extension=$_SESSION["extension"];
	$cadealea=$_SESSION["cadealea"];
	$subir_archivo=$_SESSION["subirarchivo"];
		
	//leyendo archivo de excel
	$documento=IOFactory::load($archivo);
	$totalDeHojas = $documento->getSheetNames();
		
	$indiceHoja=0;

	$hojaActual = $documento->getSheet($indiceHoja);
	//echo "<h3>Hoja: ".$totalDeHojas[$indiceHoja]."</h3>";

	$array = array(2, 3, 8, 9);
	$fila = 16;
	//buscando el indicador 1 en el while
	do{
		$fila++;
		$celda = $hojaActual->getCellByColumnAndRow(2, $fila);
		$valorRaw = $celda->getValue();
	}while(strcmp($valorRaw,"1")!=0 && $fila<50); //mientras sea distinto de 1 o la fila supere los 50 (quiere decir que no hay)
	//echo $fila;
	$cad="";
	$contfili=0;
	do{
		$aspectoe = $hojaActual->getCellByColumnAndRow(3, $fila);
		 $aspectoee = $aspectoe->getValue();//esta es la variable del aspecto
		$ban=$aspectoee<>"PUNTAJE MÁXIMO";
		if(strcmp($aspectoee,"PUNTAJE MÁXIMO")==0){
			break;
		}


		//leyendo valor o puntaje
		$colu=3;
		do{//buscando el valor hacia delante
			$colu++;
			$celda = $hojaActual->getCellByColumnAndRow($colu, $fila);
			$valorRaw = $celda->getValue();
		}while(strcmp($valorRaw,"")==0 && $colu<150); 
		
		$puntaje = $hojaActual->getCellByColumnAndRow($colu, $fila);
		$puntajee = $puntaje->getValue();//este es la variable del puntaje
			
		//leyendo indicador
		$indicador = $hojaActual->getCellByColumnAndRow(9, $fila);
		$indicadore = $indicador->getValue();//este es la variable del tipo de indicador

		
		if (strcmp($indicadore,"M")==0) {
			//leyendo puro indicador M
			$tempc=$contfili;
			$cad=$cad.'<div id="d'.$tempc.'"><textarea id="M'.$tempc.'" rows="4" class="col-lg-9 col-sm-9 col-md-9" class="M">'.$aspectoee.'</textarea><textarea id="M'.$tempc.'" rows="4" class="col-lg-2 col-sm-2 col-md-2" class="PM">'.$puntajee.'</textarea><button type="button" class="btn btn-danger col-lg-1 col-sm-1 col-md-1" onclick="bot('.$tempc.')">X</button></div>';
				$contfili++;
		}
		$fila ++;

	}while (strcmp($valorRaw,"PUNTAJE MÁXIMO")!=0 && $fila<50);
	//echo $archivo;
	unlink($archivo);
	echo $cad; 
?>