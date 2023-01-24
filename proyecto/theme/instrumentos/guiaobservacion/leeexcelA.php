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
	use PhpOffice\PhpSpreadsheet\Spreadsheet;
	use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
	use PhpOffice\PhpSpreadsheet\IOFactory;
	$directorio = 'archivoss/';
	$archivo=$_SESSION["archivo"];
	$extension=$_SESSION["extension"];
	$cadealea=$_SESSION["cadealea"];
	$subir_archivo=$_SESSION["subirarchivo"];
		
	//echo "-".$archivo;	
	//leyendo archivo de excel
	$documento=IOFactory::load($archivo);
	
	//echo $documento->getSheetNames();
	$totalDeHojas = $documento->getSheetNames();
		
	$indiceHoja=0;
//echo "ok0";
	$hojaActual = $documento->getSheet($indiceHoja);
	//echo "<h3>Hoja: ".$totalDeHojas[$indiceHoja]."</h3>";
//	echo "ok2";
	//$cate = $indi->getValue();
	$fila = 17;
	$contii=0;
	$vecpri=[];

	do{

		$celda = $hojaActual->getCellByColumnAndRow(2, $fila);
		$celdai = $celda->getValue();
		$veci=[];
		$conti=0;
		do{
			$fila++;

			$columna=3;
			//leyendo indicador
			$itemi = $hojaActual->getCellByColumnAndRow($columna, $fila);
			$vec[0] = $itemi->getValue(); //leyendo item

			do{

				$columna++;
			 	$val = $hojaActual->getCellByColumnAndRow($columna, $fila);
			 	$vec[1] = $val->getValue(); //leyendo valor
			}while(strcmp($vec[1],"")==0);
			//echo $columna."-";
			$indi = $hojaActual->getCellByColumnAndRow($columna+1, $fila);
			$vec[2] = $indi->getValue(); //leyendo indicador
			$veci[$conti]=$vec;
			$conti++;
			$temp = $hojaActual->getCellByColumnAndRow($columna+1, ($fila+1));
			$tempi = $temp->getValue(); //leyendo siguiente para ver si está vacío
			//echo ">".$tempi."<";
		}while (strcmp($tempi,"")!=0 && strcmp($tempi,"PUNTAJE OBTENIDO:")!=0 && $fila<100);//lee cada item de cierta categoría
		//echo $contii;
		
		$vecpri[$contii]=$celdai;
		//echo $celdai;
		$contii++;
		$vecpri[$contii]=$veci;
		//echo count($veci)."---".$celdai."**";
		$contii++;

		$temp = $hojaActual->getCellByColumnAndRow(2, ($fila+1));
		$tempi = $temp->getValue(); //leyendo siguiente para ver que no diga puntaeg maximo
		$fila++;
		//echo "-".$tempi."-".$fila;
	}while(strcmp($tempi,"PUNTAJE MÁXIMO")!=0 && $fila<100);
	//echo count($veci);
	//echo count($vecpri);
	$general="";
	
	for ($i=0; $i < count($vecpri); $i+=2) { 
		$categoriaa=$vecpri[$i];
		$vec2=$vecpri[$i+1];
		$findicador="";
		$bancate=false;
		for ($j=0; $j <count($vec2) ; $j++) { 
			$vec3=$vec2[$j];
			$item=$vec3[0];
			$valor=$vec3[1];
			$ind=$vec3[2];
			//echo $ind;
			//echo strcmp($ind,"D");
			$indic='<select class="form-control"   onchange="cambioInd(this)">';
			$ban=false;
			
			if (strcmp($A,"0")!=0 && strcmp($A,"")!=0) {
				$tttt="";
				
				if (strcmp($ind,"A")==0){$valor=$A; $ban=true;$tttt="selected";}
				$indic=$indic.'<option '.$tttt.'>A</option>';
			}
			if (strcmp($B,"0")!=0 && strcmp($B,"")!=0) {
				$tttt="";
				
				if (strcmp($ind,"B")==0){$valor=$B; $ban=true; $tttt="selected";}
				$indic=$indic.'<option '.$tttt.'>B</option>';
			}
			if (strcmp($C,"0")!=0 && strcmp($C,"")!=0) {
				$tttt="";
				
				if (strcmp($ind,"C")==0){$valor=$C; $tttt="selected"; $ban=true;}
				$indic=$indic.'<option '.$tttt.'>C</option>';
			}
			if (strcmp($D,"0")!=0 && strcmp($D,"")!=0) {
				$tttt="";
				
				//echo "sidd";
				if (strcmp($ind,"D")==0){$tttt="selected"; $ban=true;$valor=$D;}
				$indic=$indic.'<option '.$tttt.'>D</option>';
			}
			if (strcmp($E,"0")!=0 && strcmp($E,"")!=0) {
				$tttt="";
				
				if (strcmp($ind,"E")==0){ $tttt="selected";$ban=true;$valor=$E;}
				$indic=$indic.'<option '.$tttt.'>E</option>';
			}
			if (strcmp($F,"0")!=0 && strcmp($F,"")!=0) {
				$tttt="";
				
				if (strcmp($ind,"F")==0){ $tttt="selected"; $ban=true;$valor=$F;}
				$indic=$indic.'<option '.$tttt.'>F</option>';
			}
			$tttt="";
			if (strcmp($ind,"M")==0){ $ban=true; $tttt="selected";}
			$indic=$indic.'<option '.$tttt.'>M</option>';
			$indic=$indic.'</select>';
			if ($ban) {
				# code...
				$bancate=true;
				$findicador=$findicador.'<div class="items row"><div class="col-md-7 col-xs-7 col-sm-7 col-lg-7"><input class="form-control" type="text" placeholder="Digite el indicador" value="'.$item.'"></div><div class="col-md-2 col-xs-2 col-sm-2 col-lg-2"><input class="form-control" value="'.$valor.'" type="number" placeholder="Valor"></div><div class="col-md-2 col-xs-2 col-sm-2 col-lg-2">'.$indic.'</div><div class="col-md-1 col-xs-1 col-sm-1 col-lg-1"><button class="btn btn-danger" onclick="quitaindicador(this)"><span class="glyphicon glyphicon-remove"></span></button></div></div>';
			}
			# code...
		}
		if ($bancate) {
			
			$ncate='<div class="categ row"><br><h4>Nueva categoría</h4><div class="col-md-10 col-xs-10 col-sm-10 col-lg-10"><input class="form-control" type="text" placeholder="Digite la categoría a observar" value="'.$categoriaa.'"></div><div class="col-md-2 col-xs-2 col-sm-2 col-lg-2"><button class="btn btn-success" onclick="agregarindicador(this)"><span class="glyphicon glyphicon-plus"></span></button><button class="btn btn-danger" onclick="quitacategoria(this)"><span class="glyphicon glyphicon-remove"></span></button></div><div class="col-md-12 col-xs-12 col-sm-12 col-lg-12">'.$findicador.'</div></div>';
			$general=$general.$ncate;
		}
		# code...
	}
	
	echo $general;
	unlink($archivo);
	
?>