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
	$fila = 11;
	$contii=0;
	$vecpri=[];

	$celda = $hojaActual->getCellByColumnAndRow(2, $fila);
	$celdai = $celda->getValue();
	$conti=0;
	$general="";
	$vowels = array("PUNTOS", "PUNTO", "(", ")"," ");
	do{
		$fila++;
		//bucando aspeto a evaluar
		do{
			$fila++;
		 	$val = $hojaActual->getCellByColumnAndRow(2, $fila);
		 	$dato = $val->getValue(); //leyendo valor
		}while(strcmp($dato,"")==0);
		$col=2;
		//Leyendo aspecto a evaluar
		$ae=$dato = $val->getValue();
		
		//excelente
		do{
			$col++;
		 	$val = $hojaActual->getCellByColumnAndRow($col, $fila);
		 	$dato = $val->getValue(); //leyendo valor
		}while(strcmp($dato,"")==0);
		//Leyendo Excelente y valor del mismo
		$m = $val->getValue();
		$val = $hojaActual->getCellByColumnAndRow($col, $fila+1);
		$vm=$val->getValue();
		$vm = strtoupper($vm);
		$vm = str_replace($vowels, "", $vm);
		//notable
		do{
			$col++;
		 	$val = $hojaActual->getCellByColumnAndRow($col, $fila);
		 	$dato = $val->getValue(); //leyendo valor
		}while(strcmp($dato,"")==0);
		//Leyendo notable y valor del mismo
		$n = $val->getValue();
		$val = $hojaActual->getCellByColumnAndRow($col, $fila+1);
		$vn=$val->getValue();
		$vn = strtoupper($vn);
		$vn = str_replace($vowels, "", $vn);
		//bueno
		do{
			$col++;
		 	$val = $hojaActual->getCellByColumnAndRow($col, $fila);
		 	$dato = $val->getValue(); //leyendo valor
		}while(strcmp($dato,"")==0);
		//Leyendo bueno y valor del mismo
		$b = $val->getValue();
		$val = $hojaActual->getCellByColumnAndRow($col, $fila+1);
		$vb=$val->getValue();
		$vb = strtoupper($vb);
		$vb = str_replace($vowels, "", $vb);
		do{
			$col++;
		 	$val = $hojaActual->getCellByColumnAndRow($col, $fila);
		 	$dato = $val->getValue(); //leyendo valor
		}while(strcmp($dato,"")==0);
		//Leyendo suficiente y valor del mismo
		$s = $val->getValue();
		$val = $hojaActual->getCellByColumnAndRow($col, $fila+1);
		$vs=$val->getValue();
		$vs = strtoupper($vs);
		$vs = str_replace($vowels, "", $vs);
		//insuficiente
		do{
			$col++;
		 	$val = $hojaActual->getCellByColumnAndRow($col, $fila);
		 	$dato = $val->getValue(); //leyendo valor
		}while(strcmp($dato,"")==0);
		//Leyendo insuficiente y valor del mismo
		$i = $val->getValue();
		$val = $hojaActual->getCellByColumnAndRow($col, $fila+1);
		$vi=$val->getValue();
		$vi = strtoupper($vi);
		$vi = str_replace($vowels, "", $vi);
		//indicador
		do{
			$col++;
		 	$val = $hojaActual->getCellByColumnAndRow($col, $fila);
		 	$dato = $val->getValue(); //leyendo valor
		}while(strcmp($dato,"")==0);
		//Leyendo Excelente y valor del mismo
		$ind = $val->getValue();


		$indic='<select class="form-control" onchange="cambioInd(this)">';
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
			$indis='<div class="col-md-2 col-xs-2 col-sm-2 col-lg-2">Excelente<textarea onblur="nfoco(this)" onfocus="foco(this)" class="form-control" style="resize: none;">'.$m.'</textarea><input value="'.$vm.'" type="number" placeholder="Valor" class="form-control"></div><div class="col-md-2 col-xs-2 col-sm-2 col-lg-2">Notable<textarea  onblur="nfoco(this)" onfocus="foco(this)" style="resize: none;" class="form-control">'.$n.'</textarea><input  type="number"  value="'.$vn.'"  placeholder="Valor"  class="form-control"></div><div class="col-md-2 col-xs-2 col-sm-2 col-lg-2">Bueno<textarea onblur="nfoco(this)" onfocus="foco(this)"  class="form-control" style="resize: none;">'.$b.'</textarea><input  value="'.$vb.'"  placeholder="Valor"   type="number" class="form-control"></div><div class="col-md-2 col-xs-2 col-sm-2 col-lg-2">Suficiente<textarea onblur="nfoco(this)" onfocus="foco(this)"  class="form-control" style="resize: none;">'.$s.'</textarea><input  placeholder="Valor"  value="'.$vs.'"  type="number" class="form-control"></div><div class="col-md-2 col-xs-2 col-sm-2 col-lg-2">Insuficiente<textarea  onblur="nfoco(this)" onfocus="foco(this)"  style="resize: none;" class="form-control">'.$i.'</textarea><input placeholder="Valor"  value="'.$vi.'"  type="number" class="form-control"></div>';
			$ncate='<div class="categ row"><br><h4>Ingrese lo siguiente</h4><div class="col-md-9 col-xs-9 col-sm-9 col-lg-9"><input value="'.$ae.'" class="form-control" type="text" placeholder="Ingrese el aspecto a evaluar"></div><div class="col-md-2 col-xs-2 col-sm-2 col-lg-2">'.$indic.'</div><div class="col-md-1 col-xs-1 col-sm-1 col-lg-1"><button class="btn btn-danger" onclick="quitacategoria(this)"><span class="glyphicon glyphicon-remove"></span></button></div>'.$indis.'</div>';
			$general=$general.$ncate;

		}	
		$vali = $hojaActual->getCellByColumnAndRow(2, $fila+2);
		$tempi = $vali->getValue();	
		
		//echo "-".$fila."-";
	}while (strcmp($tempi,"")!=0 && strcmp($tempi,"PUNTAJE MÁXIMO")!=0 && $fila<100);//lee cada item de cierta categoría
		//echo $contii;
		
		//echo "hectorohoho";
	//echo count($veci);
	//echo count($vecpri);
	
	
	
	
		# code...
	
	
	echo $general;
	unlink($archivo);
	
?>