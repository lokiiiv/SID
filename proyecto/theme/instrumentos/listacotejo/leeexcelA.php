<?php 
	error_reporting(0);
	require '../../../../vendor/autoload.php';
	session_start();
	$A=$_SESSION["A"];
	$B=$_SESSION["B"];
	$C=$_SESSION["C"];
	$D=$_SESSION["D"];
	$E=$_SESSION["E"];
	$F=$_SESSION["F"];
	if(strcmp($A,"")!=0){
		$AAA='Ingrese indicador A <textarea rows="4" class="form-control" id="A" placeholder=""></textarea>';	
	}
	if(strcmp($B,"")!=0){
		$BBB='Ingrese indicador B <textarea rows="4" class="form-control" id="B" placeholder=""></textarea>';	
	}
	if(strcmp($C,"")!=0){
		$CCC='Ingrese indicador C <textarea rows="4" class="form-control" id="C" placeholder=""></textarea>';	
	}
	if(strcmp($D,"")!=0){
		$DDD='Ingrese indicador D <textarea rows="4" class="form-control" id="D" placeholder=""></textarea>';	
	}
	if(strcmp($E,"")!=0){
		$EEE='Ingrese indicador E <textarea rows="4" class="form-control" id="E" placeholder=""></textarea>';	
	}
	if(strcmp($F,"")!=0){
		$FFF='Ingrese indicador F <textarea rows="4" class="form-control" id="F" placeholder=""></textarea>';	
	}
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
	$banA=true;
	$banB=true;
	$banC=true;
	$banD=true;
	$banE=true;
	$banF=true;
	do{
		$aspectoe = $hojaActual->getCellByColumnAndRow(3, $fila);
		 $aspectoee = $aspectoe->getValue();//esta es la variable del aspecto
		$ban=$aspectoee<>"PUNTAJE MÁXIMO";
		if(strcmp($aspectoee,"PUNTAJE MÁXIMO")==0){
			break;
		}


		//leyendo valor o puntaje
		$colu=3;
		$ban=false;
		do{//buscando el valor hacia delante
			$colu++;
			$celda = $hojaActual->getCellByColumnAndRow($colu, $fila);
			$valorRaw = $celda->getValue();
			
		}while(strcmp($valorRaw,"")==0 && $colu<150); 
		
		$puntaje = $hojaActual->getCellByColumnAndRow($colu, $fila);
		$puntajee = $puntaje->getValue();//este es la variable del puntaje
			
		//leyendo indicador
		$indicador = $hojaActual->getCellByColumnAndRow(9, $fila);
		$indicadore="";
		$indicadore = $indicador->getValue();//este es la variable del tipo de indicador

		
			//leyendo puro indicador M
			$tempc=$contfili;
			//echo "-".$A."-";
			$cadeee="";
			if ($banA  && strcmp($A,"0")!=0 && strcmp($A,"")!=0 && strcmp($indicadore,"A")==0) {
				$banA=false;
				# code...
				$AAA='Ingrese indicador A <textarea rows="4" class="form-control" id="A" placeholder="">'.$aspectoee.'</textarea>';
			}
			if ($banB && strcmp($B,"0")!=0 && strcmp($B,"")!=0 && strcmp($indicadore,"B")==0) {
				# code...
				$banB=false;
				$BBB='Ingrese indicador B <textarea rows="4" class="form-control" id="B" placeholder="">'.$aspectoee.'</textarea>';
			}
			if ($banC && strcmp($C,"0")!=0 && strcmp($C,"")!=0 && strcmp($indicadore,"C")==0) {
				# code...
				$banC=false;
				$CCC='Ingrese indicador C <textarea rows="4"  class="form-control" id="C" placeholder="">'.$aspectoee.'</textarea>';
			}
			if ($banD && strcmp($D,"0")!=0 && strcmp($D,"")!=0 && strcmp($indicadore,"D")==0) {
				# code...
				$banD=false;
				$DDD='Ingrese indicador D <textarea rows="4"  class="form-control" id="D" placeholder="">'.$aspectoee.'</textarea>';
			}
			if ($banE && strcmp($E,"0")!=0 && strcmp($E,"")!=0 && strcmp($indicadore,"E")==0) {
				# code...
				$banE=false;
				$EEE='Ingrese indicador E <textarea rows="4"  class="form-control" id="E" placeholder="">'.$aspectoee.'</textarea>';
			}
			if ($banF && strcmp($F,"0")!=0 && strcmp($F,"")!=0 && strcmp($indicadore,"F")==0) {
				# code...
				$banF=false;
				$FFF='Ingrese indicador F <textarea rows="4"  class="form-control" id="F" placeholder="">'.$aspectoee.'</textarea>';
			}

				$contfili++;
		
		$fila ++;

	}while (strcmp($valorRaw,"PUNTAJE MÁXIMO")!=0 && $fila<50);
	//echo $archivo;
//	unlink($archivo);
	$cad=$AAA.$BBB.$CCC.$DDD.$EEE.$FFF;
	echo $cad; 
?>