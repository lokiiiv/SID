<?php
	session_start();

 	$evi=$_POST["evi"]; //evidencia de evaluaci+on
 	$ins=$_POST["ins"]; //instrumento de evaluación
 	$num=$_POST["num"]; //número de instrumento en tabla 0, 1, 2 para buscarlo en el mongo
 	$per=$_POST["per"]; //periodo ej20
 	$A=$_POST["A"]; 
 	$B=$_POST["B"]; 
 	$C=$_POST["C"]; 
 	$D=$_POST["D"]; 
 	$E=$_POST["E"]; 
 	$F=$_POST["F"];
 	//$indalc=$_POST["taa"];//indicadores de alcance
 	$CNCPTL=$_POST["CNCPTL"];
 	$CTTDNL=$_POST["CTTDNL"];
 	$PRCDMNTL=$_POST["PRCDMTL"];
 	$cadeindi="";

 	//$indmin=$_POST["tma"];


 	$contAF=0;
 	if (strcmp($A,"0")!=0 && strcmp($A,"")!=0) {
 	 	# code...
 		$cadeindi=$cadeindi."A,";
 		$vecAF[$contAF]=$A;
 		$contAF++;
 	} 
 	if (strcmp($B,"0")!=0 && strcmp($B,"")!=0) {
 	 	# code...
 		$cadeindi=$cadeindi."B,";
 		$vecAF[$contAF]=$B;
 		$contAF++;
 	}
 	if (strcmp($C,"0")!=0 && strcmp($C,"")!=0) {
 	 	# code...
 		$cadeindi=$cadeindi."C,";
 		$vecAF[$contAF]=$C;
 		$contAF++;
 	}  
 	if (strcmp($D,"0")!=0 && strcmp($D,"")!=0) {
 	 	# code...
 		$cadeindi=$cadeindi."D,";
 		$vecAF[$contAF]=$D;
 		$contAF++;
 	} 
 	if (strcmp($E,"0")!=0 && strcmp($E,"")!=0) {
 	 	# code...
 		$cadeindi=$cadeindi."E,";
 		$vecAF[$contAF]=$E;
 		$contAF++;
 	} 
 	if (strcmp($F,"0")!=0 && strcmp($F,"")!=0) {
 	 	# code...
 		$cadeindi=$cadeindi."F,";
 		$vecAF[$contAF]=$F;
 		$contAF++;
 	} 
 	$fa=$_POST["fa"];
 	$te=$_POST["te"];
 	$por=$_POST["por"];//porcenjaje 30 de 100
 	$mat=$_POST["mat"];//materia nombre
 	$gru=$_POST["gru"];//grupo
	$tem=$_POST["tem"]; 
	$CoT=$_POST["CoT"]; 	
	$_SESSION["A"]=$A;
	$_SESSION["B"]=$B;
	$_SESSION["C"]=$C;
	$_SESSION["D"]=$D;
	$_SESSION["E"]=$E;
	$_SESSION["F"]=$F;
	$nomdoc=$_SESSION["nombreCompleto"];
	$listapr=$_POST["listapr"];
	$listasb2=$_POST["listasb2"];
	$listapvf=$_POST["listapvf"];
	//echo count($listapr);
	$contpr=0;
	for ($i=0; $i <count($listapr) ; $i+=4) { 
		$listapr1[$contpr]=$listapr[$i];
		$listapr2[$contpr]=$listapr[$i+1];
		$listapr3[$contpr]=$listapr[$i+2];
		$listapr4[$contpr]=$listapr[$i+3];
		$listaprr[$contpr]=$contpr+1;
		$contpr++;
	}
	//revolviendo respuestas
	for ($i=0; $i <50 ; $i+=4) { 
		$or1=rand(0, count($listapr1)-1);
		$or2=rand(0, count($listapr1)-1);

		$tep=$listapr2[$or1];
		$listapr2[$or1]=$listapr2[$or2];
		$listapr2[$or2]=$tep;

		$tep=$listaprr[$or1];
		$listaprr[$or1]=$listaprr[$or2];
		$listaprr[$or2]=$tep;
	}

//	echo "<br><br>";
/*
	
	echo "<br><br>";
	for ($i=0; $i <count($listapvf) ; $i++) { 
		
		echo $listapvf[$i];
	}
	*/
	///////////////////////////////////////////////////////
	///////////////////////////////////////////////////////
	///////////////////////////////////////////////////////
	///////////////////////////////////////////////////////

$Materia=$mat." (TEMA ".$tem.")";
	$Instrumento=$ins;

	$ProgEducativo = $_POST["PE"];

	$Semestre = $_POST["CS"];
	$NomDocente = $nomdoc;
	$ClaveGrupo = $gru;
	$NomEstudiantes = "";
	$FechaAplicacion = $fa;
	$TiempoEvaluacion = $te; 
	$Evidencia = $evi;
	$Competencia = $CoT;

	$Instrucciones1 = "Relacione ambas columnas. ";
	
	$Instrucciones2 = "Subraye la respuesta correcta. ";
	$Instrucciones3 = "Coloque frente al reactivo si es falso con (F) o Verdadero (V). ";
	$Porcentaje = $por;
	$PuntosObtenidos = "";


	$PuntosIndA = $A;
	$PuntosIndB = $B;
	$PuntosIndC = $C;
	$PuntosIndD = $D;
	$PuntosIndE = $E;
	$PuntosIndF = $F;

	$MarcaMetodoP = $PRCDMNTL;
	$MarcaMetodoC = $CNCPTL;
	$MarcaMetodoA = $CTTDNL;


	$FechaEntrega = "";
	$FechaRetroalimentacion = "";
 ?>

 <!DOCTYPE html>
 <html lang="en">
 <head>
 	<meta charset="UTF-8">
 	<title>Document</title>
 	<link href="bootstrap.min.css" rel="stylesheet">
 	<style>
 		.rotar {
		    -webkit-transform: rotate(-90deg);
		    transform: rotate(-90deg);
		}
 		.margen{
			margin:0 !important;
			padding: 0 !important;
 		}
		
		.table{
			display: block;
			column-span: all;
		}

		.box img{
		  width: 100%;
		}

 		@supports(object-fit: cover){
		    .box img{
		      height: 100%;
		      object-fit: cover;
		      object-position: center center;
		    }
		}
		.coltit{
			background-color: #acb9ca;
			font-weight: bold;
		}
		.colcon{
			background-color: #d9e1f2;
		}
		.colwhitef{
			background-color: white;
			font-weight: bold;	
		}

		.bordewhite {
			border-width:0.5px;
			border-style: solid;
			border-color: white ;
		}
		.bordeblack {
			border-width:0.5px;
			border-style: solid;
			border-color: black;
		}
		.aiz{
			text-align: left;
		}	
		.voltea{
			-webkit-transform: rotate(-90deg); 
			-moz-transform: rotate(-90deg);
		}
 	</style>
 </head>

 <body>
 	<button id="descargarPDF" type="button" class="btn btn-info" onclick="descargaPDF()">descargar PDF</button>
	<button id="verocultarprr" type="button" class="btn btn-info">Ver|ocultar respuestas</button>
 	<div class="container" id="imprimir" style="margin-top: 50px;">
 <!–– Primer encabezado ––>
 		<div class="row">
 			<div class="box col-md-2 col-xs-2 col-sm-2 col-lg-2">
 				<img src="img/logoitesa.png" alt="">
 			</div>
			<div class="col-md-10 col-xs-10 col-sm-10 col-lg-10">
 				<div class="row">
 					<div class="col-md-12 col-xs-12 col-sm-12 col-lg-12 coltit" style="text-align: center; font-size: 16px;" >
 						<?php echo $Materia; ?>
 					</div>
 				</div>
 				<div class="row">
 					<div class="col-md-12 col-xs-12 col-sm-12 col-lg-12 colwhitef" style="text-align: center; font-size: 16px;" >
 						<?php echo $Instrumento; ?>
 					</div>
 				</div>
 			</div>
 		</div>

<!--Segundo enabezado -->
 		<div class="row aiz" style="display: flex;">
 			<!–– linea 1 ––>
 			<div class="col-md-3 col-xs-3 col-sm-3 col-lg-3 coltit bordewhite">
 				Programa Educativo
 			</div>
			<div class="col-md-5 col-xs-5 col-sm-5 col-lg-5 colcon bordewhite" style="text-align: center">
				<?php echo $ProgEducativo; ?>
 			</div>
 			<div class="col-md-2 col-xs-2 col-sm-2 col-lg-2 coltit bordewhite" style="text-align: center">
 				Semestre:
 			</div>
 			<div class="col-md-2 col-xs-2 col-sm-2 col-lg-2 colcon bordewhite" style="text-align: center">
 				<?php echo $Semestre; ?>
 			</div>
 		</div>
		<div class="row aiz" style="display: flex;">
 			<!–– linea 2 ––>
 			<div class=" col-md-2 col-xs-2 col-sm-2 col-lg-2 coltit bordewhite">
 				Nombre del docente:
 			</div>
			<div class="col-md-6 col-xs-6 col-sm-6 col-lg-6 colcon bordewhite" style="text-align: center">
 				<?php echo $NomDocente; ?>
 			</div>
 			<div class="col-md-2 col-xs-2 col-sm-2 col-lg-2 coltit bordewhite">
 				Clave de Grupo:
 			</div>
 			<div class="col-md-2 col-xs-2 col-sm-2 col-lg-2 colcon bordewhite" style="text-align: center">
 				<?php echo $ClaveGrupo; ?>
 			</div>
		</div>
 		<div class="row aiz" style="display: flex;">
 			<!–– linea 3 ––>
 			<div class="box col-md-3 col-xs-3 col-sm-3 col-lg-3 coltit bordewhite">
 				Nombre de (la) Estudiante o Integrantes de equipo:
 			</div>
 			<div class="col-md-3 col-xs-3 col-sm-3 col-lg-3 colcon bordewhite" style="text-align: center">
				<?php echo $NomEstudiantes; ?>
 			</div>	
 			<div class="box col-md-2 col-xs-2 col-sm-2 col-lg-2 coltit bordewhite" style="text-align: center">
 				Fecha de aplicación: 
 			</div>
 			<div class="col-md-1 col-xs-1 col-sm-1 col-lg-1 colcon bordewhite" style="text-align: center">
				<?php echo $FechaAplicacion; ?>
 			</div>	
 			<div class="col-md-2 col-xs-2 col-sm-2 col-lg-2 coltit bordewhite" style="text-align: center">
				Duración:
 			</div>	
 			<div class="col-md-1 col-xs-1 col-sm-1 col-lg-1 colcon bordewhite" style="text-align: center">
				<?php echo $TiempoEvaluacion; ?>
 			</div>	
 		</div>
 		<div class="row aiz" style="display: flex;">
 			<!–– linea 4 ––>
 			<div class="col-md-3 col-xs-3 col-sm-3 col-lg-3 coltit bordewhite">
 				Evidencia:
 			</div>
			<div class="col-md-9 col-xs-9 col-sm-9 col-lg-9 colcon bordewhite" style="text-align: center">
				<?php echo $Evidencia; ?>
 			</div>	
 		</div>
 		<div class="row aiz" style="display: flex;">
 			<!–– linea 5 ––>
 			<div class="col-md-3 col-xs-3 col-sm-3 col-lg-3 coltit bordewhite">
 				Competencia
 			</div>
			<div class="col-md-9 col-xs-9 col-sm-9 col-lg-9 colcon bordewhite" style="text-align: center">
				<?php echo $Competencia; ?>
 			</div>	
 		</div>
 <!-- Tercer encabezado-->
 		<div class="row" style="display: flex; text-align: left;">
 			<div class="box col-md-12 col-xs-12 col-sm-12 col-lg-12">
 				<b>I. Instrucciones: </b><?php echo $Instrucciones1; ?> <label style="color: #C5c7c7;">REACTIVO COLUMNAS RELACIONADAS</label>
 			</div>
		</div>

		<div class="row" style="display: flex; text-align: left;">
			<div class="box col-md-7 col-xs-7 col-sm-7 col-lg-7">
		<?php
			for ($i=0; $i <count($listapr1) ; $i++) { 
				$indiiPRR="";
				if ($listapr4[$i]!="") {
					$indiiPRR="(Indicador ".$listapr4[$i].")";
				}
				echo '
				<div class="row" >'.$listapr1[$i].' ('.$listapr3[$i].' puntos)'.$indiiPRR.'</div>';
 			}
 		?> 		
 			</div>
 			<div class="box col-md-1 col-xs-1 col-sm-1 col-lg-1"></div>
 			<div class="box col-md-4 col-xs-4 col-sm-4 col-lg-4">
				<?php
					for ($i=0; $i <count($listapr1) ; $i++) { 
				echo '
				<div class="row" ><div class="col-md-1 col-xs-1 col-sm-1 col-lg-1">(</div><div class="col-md-1 col-xs-1 col-sm-1 col-lg-1"><div style="display="block;" class="ocultarrr">'.$listaprr[$i].'</div></div><div class="col-md-1 col-xs-1 col-sm-1 col-lg-1">)</div><div class="col-md-7 col-xs-7 col-sm-7 col-lg-7">'.$listapr2[$i].'</div></div>';
 			}
				?>
 			
			</div>
		</div>
		

	<div class="row" style="display: flex;text-align: left;">
		<div class="box col-md-12 col-xs-12 col-sm-12 col-lg-12">
 				<b>II. Instrucciones: </b><?php echo $Instrucciones2; ?><label style="color: #C5c7c7;"> REACTIVO SELECCIÓN MÚLTIPLE</label>
 			</div>
		</div>

		<?php
			for ($i=0; $i <count($listasb2) ; $i++) { 
				$texttoo="";
				//echo $listasb2[$i][2]; 
				if ($listasb2[$i][count($listasb2[$i])-1]!="") {
					$texttoo="(Indicador ".$listasb2[$i][count($listasb2[$i])-1].")";
				}
		echo '<div class="row" style="display: flex;"><div class="box col-md-12 col-xs-12 col-sm-12 col-lg-12" style="text-align:left;">'.$listasb2[$i][0].' ('.$listasb2[$i][1].' puntos)'.$texttoo.'</div></div><div class="row" style="display: flex;">';
		$colum=12/((count($listasb2[$i])-3)/2);

		for ($j=2; $j <count($listasb2[$i])-1 ; $j+=2) { 
			$textolinea="";
			$textoclase="";
			if ($listasb2[$i][$j+1]=="true") {
				$textoclase='ocultarrr2';
				$textolinea='style="text-decoration-line: underline;"';
			}

			echo '<div class="'.$textoclase.' box col-md-'.$colum.' col-xs-'.$colum.' col-sm-'.$colum.' col-lg-'.$colum.'" '.$textolinea.'>'.$listasb2[$i][$j].'</div>';
		}
	echo "</div>";
	}
		?>
		<div class="row" style="display: flex; text-align: left;">
 			<div class="box col-md-12 col-xs-12 col-sm-12 col-lg-12">
 				<b>III. Instrucciones: </b><?php echo $Instrucciones3; ?><label style="color: #C5c7c7;"> REACTIVO FALSO Y VERDADERO</label>
 			</div>
		</div>
		<?php
		for ($i=0; $i <count($listapvf) ; $i+=4) { 
			
			//echo $listapvf[$i];
			$indicC="";
			if ($listapvf[$i+3]!="") {
				$indicC='(indicador '.$listapvf[$i+3].')';
			}
			echo '<div class="row" style="display: flex;">
 			<div class="box col-md-10 col-xs-10 col-sm-10 col-lg-10" style="text-align: left;">
 				'.$listapvf[$i].' ('.$listapvf[$i+2].' puntos) '.$indicC.'
 			</div>
 			<div class="col-md-2 col-xs-2 col-sm-2 col-lg-2">
 			<div class="box col-md-4 col-xs-4 col-sm-4 col-lg-4">
 				(	
 			</div>
 			<div class="box col-md-4 col-xs-4 col-sm-4 col-lg-4"><label class="vistavnv1">
 				'.$listapvf[$i+1].'	
 			</label></div>
 			<div class="box col-md-4 col-xs-4 col-sm-4 col-lg-4">
 				)	
 			</div>
 			</div>
		</div>';
		}
		?>
		</br>
 <!-- Cuarto encabezado-->
 		<div class="row" style="text-align: left;">
 			<div class="box col-md-12 col-xs-12 col-sm-12 col-lg-12 coltit">
 				Retroalimentación
 			</div>
 			<div class="box bordeblack col-md-12 col-xs-12 col-sm-12 col-lg-12" style="height: 50px;">
 			</div>
		</div></br>

 <!-- Quinto encabezado-->
		<div class=" bordeblack row aiz" style="display: flex;">
 			<div class="colcon bordewhite  col-md-2 col-xs-2 col-sm-2 col-lg-2" style="text-align: center; font-weight: bold;">
 				Evidencia de Aprendizaje
 			</div>
 			<div class="colcon bordewhite  col-md-1 col-xs-1 col-sm-1 col-lg-1" style="text-align: center; font-weight: bold;">
 				%
 			</div>
 			<div class="col-md-9col-xs-9 col-sm-9 col-lg-9" style="display:grid;">
 				<div class="row" style="display: flex;">
 					<div class=" colcon bordewhite col-md-6 col-xs-6 col-sm-6 col-lg-6" style="text-align: center; font-weight: bold;">
						Indicadores de Alcance
					</div>
					<div class="colcon bordewhite col-md-6 col-xs-6 col-sm-6 col-lg-6" style="text-align: center; font-weight: bold;">
						Método de Evaluación
					</div>
				</div>
				<div class="row" style="display: flex;">
					<div class="col-md-1 col-xs-1 col-sm-1 col-lg-1 colcon bordewhite" style="text-align: center; font-weight: bold;">
						A
 					</div>
 					<div class="col-md-1 col-xs-1 col-sm-1 col-lg-1 colcon bordewhite" style="text-align: center; font-weight: bold;">
 						B
 					</div>
 					<div class="col-md-1 col-xs-1 col-sm-1 col-lg-1 colcon bordewhite" style="text-align: center; font-weight: bold;">
						C
 					</div>
 					<div class="col-md-1 col-xs-1 col-sm-1 col-lg-1 colcon bordewhite" style="text-align: center; font-weight: bold;">
 						D
 					</div>
 					<div class="col-md-1 col-xs-1 col-sm-1 col-lg-1 colcon bordewhite" style="text-align: center; font-weight: bold;">
						E
 					</div>
 					<div class="col-md-1 col-xs-1 col-sm-1 col-lg-1 colcon bordewhite" style="text-align: center; font-weight: bold;">
 						F
 					</div>
 					<div class="col-md-3 col-xs-3 col-sm-3 col-lg-3 colcon bordewhite" style="text-align: center; font-weight: bold;">
 						Instrumento
 					</div>
 					<div class="col-md-1 col-xs-1 col-sm-1 col-lg-1 colcon bordewhite" style="text-align: center; font-weight: bold;">
 						P
 					</div>
 					<div class="col-md-1 col-xs-1 col-sm-1 col-lg-1 colcon bordewhite" style="text-align: center; font-weight: bold;">
 						C
 					</div>
 					<div class="col-md-1 col-xs-1 col-sm-1 col-lg-1 colcon bordewhite" style="text-align: center; font-weight: bold;">
 						A
 					</div>
 				</div>
 			</div>
		</div>

		<div class="row aiz" style="display: flex;">
 			<div class="bordeblack  col-md-2 col-xs-2 col-sm-2 col-lg-2" style="text-align: center">
 				<?php echo $Evidencia; ?>
 			</div>
 			<div class="bordeblack  col-md-1 col-xs-1 col-sm-1 col-lg-1" style="text-align: center">
 				<?php echo $Porcentaje; ?>
 			</div>
 			<div class="col-md-9col-xs-9 col-sm-9 col-lg-9" style="display:grid;">
				<div class="row" style="display: flex;">
					<div class="col-md-1 col-xs-1 col-sm-1 col-lg-1 bordeblack" style="text-align: center">
						<?php echo $PuntosIndA; ?>
 					</div>
 					<div class="col-md-1 col-xs-1 col-sm-1 col-lg-1 bordeblack" style="text-align: center">
 						<?php echo $PuntosIndB; ?>
 					</div>
 					<div class="col-md-1 col-xs-1 col-sm-1 col-lg-1 bordeblack" style="text-align: center">
						<?php echo $PuntosIndC; ?>
 					</div>
 					<div class="col-md-1 col-xs-1 col-sm-1 col-lg-1 bordeblack" style="text-align: center">
 						<?php echo $PuntosIndD; ?>
 					</div>
 					<div class="col-md-1 col-xs-1 col-sm-1 col-lg-1 bordeblack" style="text-align: center">
						<?php echo $PuntosIndE; ?>
 					</div>
 					<div class="col-md-1 col-xs-1 col-sm-1 col-lg-1 bordeblack" style="text-align: center">
 						<?php echo $PuntosIndF; ?>
 					</div>
 					<div class="col-md-3 col-xs-3 col-sm-3 col-lg-3 bordeblack" style="text-align: center">
 						<?php echo $Instrumento; ?>
 					</div>
 					<div class="col-md-1 col-xs-1 col-sm-1 col-lg-1 bordeblack" style="text-align: center">
 						<?php echo $MarcaMetodoP; ?>
 					</div>
 					<div class="col-md-1 col-xs-1 col-sm-1 col-lg-1 bordeblack" style="text-align: center">
 						<?php echo $MarcaMetodoC; ?>
 					</div>
 					<div class="col-md-1 col-xs-1 col-sm-1 col-lg-1 bordeblack" style="text-align: center">
 						<?php echo $MarcaMetodoA; ?>
 					</div>

 				</div>
 			</div>
		</div></br>

<!–– Sexto encabezado ––>
		<div class="row bordeblack">
 			<div class="bordewhite colcon col-md-12 col-xs-12 col-sm-12 col-lg-12" style="text-align: center; font-weight: bold;">
 				Entrega Instrumento
 			</div>
 			<div class="col-md-12 col-xs-12 col-sm-12 col-lg-12">
 				<div class="row aiz" style="display: flex;">
 					<div class= "bordewhite colcon col-md-4 col-xs-4 col-sm-4 col-lg-4" style="font-weight: bold;">
 						Nombre y Firma del Docente
 					</div>
 					<div class= "col-md-8 col-xs-8 col-sm-8 col-lg-8" style="border-bottom:1px; border-color: black; border-bottom-style: solid;">
 						<?php echo $NomDocente; ?>
 					</div>
 				</div>
 			</div>
 			<div class="col-md-12 col-xs-12 col-sm-12 col-lg-12">
 				<div class="row aiz" style="display: flex;">
 					<div class= "bordewhite colcon col-md-4 col-xs-4 col-sm-4 col-lg-4" style="font-weight: bold;">
 						Nombre y Firma del Estudiante
 					</div>
 					<div class= "col-md-8 col-xs-8 col-sm-8 col-lg-8" style="border-bottom:1px; border-color: black; border-bottom-style: solid;">
 						<?php echo $NomEstudiantes; ?>
 					</div>
 				</div>
 			</div>
 			<div class="col-md-12 col-xs-12 col-sm-12 col-lg-12">
 				<div class="row aiz" style="display: flex;">
 					<div class= "bordewhite colcon col-md-4 col-xs-4 col-sm-4 col-lg-4" style="font-weight: bold;">
 						Fecha de Entrega
 					</div>
 					<div class= "col-md-8 col-xs-8 col-sm-8 col-lg-8">
 						<?php echo $FechaEntrega; ?>
 					</div>
 				</div>
 			</div>
		</div></br>


<!–– Septimo encabezado ––>
		<div class="row bordeblack">
 			<div class="bordewhite colcon col-md-12 col-xs-12 col-sm-12 col-lg-12" style="text-align: center; font-weight: bold;">
 				Retroalimentación
 			</div>
 			<div class="col-md-12 col-xs-12 col-sm-12 col-lg-12">
 				<div class="row aiz" style="display: flex;">
 					<div class= "bordewhite colcon col-md-4 col-xs-4 col-sm-4 col-lg-4" style="font-weight: bold;">
 						Nombre y Firma del Docente
 					</div>
 					<div class= "col-md-8 col-xs-8 col-sm-8 col-lg-8" style="border-bottom:1px; border-color: black; border-bottom-style: solid;">
 						<?php echo $NomDocente; ?>
 					</div>
 				</div>
 			</div>
 			<div class="col-md-12 col-xs-12 col-sm-12 col-lg-12">
 				<div class="row aiz" style="display: flex;">
 					<div class= "bordewhite colcon col-md-4 col-xs-4 col-sm-4 col-lg-4" style="font-weight: bold;">
 						Nombre y Firma del Estudiante
 					</div>
 					<div class= "col-md-8 col-xs-8 col-sm-8 col-lg-8" style="border-bottom:1px; border-color: black; border-bottom-style: solid;">
 						<?php echo $NomEstudiantes; ?>
 					</div>
 				</div>
 			</div>
 			<div class="col-md-12 col-xs-12 col-sm-12 col-lg-12">
 				<div class="row aiz" style="display: flex;">
 					<div class= "bordewhite colcon col-md-4 col-xs-4 col-sm-4 col-lg-4" style="font-weight: bold;">
 						Fecha de Entrega
 					</div>
 					<div class= "col-md-8 col-xs-8 col-sm-8 col-lg-8" >
 						<?php echo $FechaRetroalimentacion; ?>
 					</div>
 				</div>
 			</div>
		</div></br>
 	</div>
 	<script>
 		$("#verocultarprr").click(function(){
 			//alert("oko");
 			var v=document.getElementsByClassName("ocultarrr");
 			var v2=document.getElementsByClassName("ocultarrr2");
 			var v3=document.getElementsByClassName("vistavnv1");
 			//alert(v2.length);
 			var ban=false;
 			for (var i = 0; i <v.length; i++) {
 				//alert("ok");
 				if (v[i].style.display == "block") {
 					v[i].style.display = "none";
 					ban=true;
 				}else{
 					v[i].style.display = "block";
 				}
 			}
 			for (var i = 0; i <v2.length; i++) {
 				if (ban) {
 					
 					v2[i].style.textDecorationLine="none";
 					
 				}else{
 					v2[i].style.textDecorationLine="underline";


 				}
 			}
 			for (var i = 0; i <v3.length; i++) {
 				if (ban) {
 					
 					v3[i].style.display = "none";
 					
 				}else{
 					v3[i].style.display = "block";


 				}
 			}

 		}); 		
 	</script>
 </body>
 </html>


