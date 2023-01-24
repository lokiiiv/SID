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
	$indalc=$_POST["ia"];
	//echo $indalc;
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
	$fila = 8;
	//buscando el indicador 1 en el while
	do{
		$fila++;
		$celda = $hojaActual->getCellByColumnAndRow(2, $fila);
		$valorRaw = $celda->getValue();
		$cade=explode("I.",$valorRaw);
	}while(count($cade)<2 && $fila<50); //mientras sea menor a 2 o la fila supere los 50 (quiere decir que no hay)	
	$guardaf=$fila;
	$cont=0;
	$fila++;
	do{
		$fila++;
		$celda = $hojaActual->getCellByColumnAndRow(2, $fila);
		$valorRaw = $celda->getValue();
		$cade=explode("I.",$valorRaw);
		if (count($cade)<2 && $valorRaw!="") {
			$pr[$cont]=$valorRaw;
			$cont++;
		}
		$celda = $hojaActual->getCellByColumnAndRow(2, $fila);
		$valorRaw = $celda->getValue();
		$cade=explode("I.",$valorRaw);
	}while(count($cade)<2 && $fila<50);

	$filat=$guardaf+2;
	//echo "--".$guardaf."---";
	
	$col=2;
	//buscando columna respuestas de las de relacionar
	do{
		$col++;
		$celda = $hojaActual->getCellByColumnAndRow($col, $filat);
		$valorRaw = $celda->getValue();
		if (str_replace(" ","",$valorRaw)=="()") {
			$valorRaw="";
		}
		//echo "/".$valorRaw."/";
		//$col++;
	}while($valorRaw=="" && $col<100);
	$filatt=$filat;
	$cont=0;
	do {
		$celda = $hojaActual->getCellByColumnAndRow($col, $filat);
		$valorRaw = $celda->getValue();
		if ($valorRaw!="") {
			$rr[$cont]=$valorRaw;
			$cont++;
		}
		$filat++;
		
	} while ($valorRaw!="" && $filat<100 );
	//echo "--col".$col."--";
	$fila=$filat;
	/*do{
		$fila++;
		$celda = $hojaActual->getCellByColumnAndRow(2, $fila);
		$valorRaw = $celda->getValue();
		$cade=explode("I.",$valorRaw);
	}while(count($cade)<2 && $fila<50);
*/
	$fila++;
	//echo $fila;
	$cont=0;
	do{
		$fila++;
		$celda = $hojaActual->getCellByColumnAndRow(2, $fila);
		$valorRaw = $celda->getValue();
		$cade=explode("I.",$valorRaw);
		if (count($cade)<2) {
			$ps[$cont]=$valorRaw;//preguntas subrayar
		}else{
			break;
		}

		$fila++;
		$col=2;
		$contr=0;
		do {
			$celda = $hojaActual->getCellByColumnAndRow($col, $fila);
			$valorRaw = $celda->getValue();
			
			if ($valorRaw!="") {
				$rst[$contr]=$valorRaw;//respuestas subrayar
				$contr++;
			}	
			$col++;
		} while ( $col<100);
		$rs[$cont]=$rst;
		$cont++;
		$fila++;
		$celda = $hojaActual->getCellByColumnAndRow(2, $fila+1);
		$valorRaw = $celda->getValue();
		$cade=explode("I.",$valorRaw);
		//echo $valorRaw;
	}while(count($cade)<2 && $fila<50);
	$cont=0;
	$fila+=2;
	//echo $fila;
	do{
		$fila++;
		$celda = $hojaActual->getCellByColumnAndRow(2, $fila);
		$valorRaw = $celda->getValue();
		if ($valorRaw!="") {
			$pf[$cont]=$valorRaw;$cont++;
		}
		
		//$cade=explode("I.",$valorRaw);
	}while($valorRaw!="" && $fila<350);

	$textoo="";
	for ($i=0; $i < count($pr); $i++) { 
		$botoncerrar='<div class="col-lg-1 col-sm-1 col-md-1"><button type="button" class="btn btn-danger" onclick="botonecr(this)"><span class="glyphicon glyphicon-remove"></span></button></div>';
		$textoind= $indalc;
		$texto2=$textoind;
		$textoo=$textoo.'<div class="form-group"><div class="col-lg-4 col-sm-4 col-md-4"><input title="'.$pr[$i].'" class="form-control" value="'.$pr[$i].'"></div><div class="col-lg-3 col-sm-3 col-md-3"><input onkeyup="funckp(event,this);" class="form-control"  value="'.$rr[$i].'" ></div><div class="col-lg-2 col-sm-2 col-md-2"><input  class="form-control" type="number"></div><div class="col-lg-2 col-sm-2 col-md-2">'.$texto2.'</div>'.$botoncerrar.'</div>';
	}
	$textoo=$textoo."**********";
	$texto="";
	$texto3='<div  class="col-lg-12 col-sm-12 col-md-12" > Ingrese las respuetas y elija la o las respuestas correctas</div>';
	
	for ($i=0; $i < count($ps); $i++) { 
		//echo $ps[$i];
		$botoncerrar='<div class="col-lg-1 col-sm-1 col-md-1"><button type="button" class="btn btn-danger" onclick="botonecs(this)"><span class="glyphicon glyphicon-remove"></span></button></div>';
		$texto3="";
		$texto2='<div class="col-lg-2 col-sm-2 col-md-2">'.$indalc.'</div>';
		$totalrii=count($rs[$i]);
		for ($j=0; $j <count($rs[$i]) ; $j++) { 
			# code...
			$cal=12/count($rs[$i]);
		
			$texto3=$texto3.'<div class="col-lg-'.$cal.' col-sm-'.$cal.' col-md-'.$cal.'"><input placeholder="Respuesta '.($i+1).'" value="'.$rs[$i][$j].'" class="form-control"><input type="checkbox"></div>';
		}

	
		$texto=$texto.'<div class="form-group" style="padding-top:10px; padding-bottom:10px;"><hr style="height:1px; width: 100%; border-style:dotted;  background-color: black;"><div class="col-lg-11 col-sm-11 col-md-11">Ingrese la pregunta, el puntaje y en caso de que sea de alcance, elija tipo de indicador</div>'.$botoncerrar.'<div class="col-lg-7 col-sm-7 col-md-7"><input  title="'.$ps[$i].'" placeholder="Ingrese la pregunta" value="'.$ps[$i].'" class="form-control"></div><div class="col-lg-3 col-sm-3 col-md-3"><input placeholder="Ingrese puntaje" type="number" class="form-control"></div>'.$texto2.$texto3.'</div>';
	}

	$textoo=$textoo.$texto."**********";
	$texto="";
	for ($i=0; $i <count($pf) ; $i++) { 
		$textoind= $indalc;
	     $botoncerrar='<div class="col-lg-1 col-sm-1 col-md-1"><button type="button" class="btn btn-danger" onclick="botonecfv(this)"><span class="glyphicon glyphicon-remove"></span></button></div>';
				
		$texto2=$textoind;
		$fv='<select class="form-control"><option selected>V</option><option>F</option></select>';
		$texto=$texto.'<div class="form-group"><div class="col-lg-4 col-sm-4 col-md-4"><input  title="'.$pf[$i].'" class="form-control" value="'.$pf[$i].'"></div><div class="col-lg-3 col-sm-3 col-md-3">'.$fv.'</div><div class="col-lg-2 col-sm-2 col-md-2"><input  class="form-control" type="number"></div><div class="col-lg-2 col-sm-2 col-md-2">'.$texto2.'</div>'.$botoncerrar.'</div>';
	}
	//echo strlen($textoo);
	$textoo=$textoo.$texto."**********".$totalrii;
	echo $textoo;
	unlink($archivo);

	
?>