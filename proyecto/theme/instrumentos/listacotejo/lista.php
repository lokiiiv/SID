<?php
session_start();

$evi = $_POST["evi"]; //evidencia de evaluaci+on
$ins = $_POST["ins"]; //instrumento de evaluación
$num = $_POST["num"]; //número de instrumento en tabla 0, 1, 2 para buscarlo en el mongo
$per = $_POST["per"]; //periodo ej20
$A = $_POST["A"];
$B = $_POST["B"];
$C = $_POST["C"];
$D = $_POST["D"];
$E = $_POST["E"];
$F = $_POST["F"];
$indalc = $_POST["taa"]; //indicadores de alcance
$CNCPTL = $_POST["CNCPTL"];
$CTTDNL = $_POST["CTTDNL"];
$PRCDMNTL = $_POST["PRCDMTL"];
$cadeindi = "";

$indmin = isset($_POST["tma"]) ? $_POST["tma"] : [];


$contAF = 0;
if (strcmp($A, "0") != 0 && strcmp($A, "") != 0) {
	# code...
	$cadeindi = $cadeindi . "A,";
	$vecAF[$contAF] = $A;
	$contAF++;
}
if (strcmp($B, "0") != 0 && strcmp($B, "") != 0) {
	# code...
	$cadeindi = $cadeindi . "B,";
	$vecAF[$contAF] = $B;
	$contAF++;
}
if (strcmp($C, "0") != 0 && strcmp($C, "") != 0) {
	# code...
	$cadeindi = $cadeindi . "C,";
	$vecAF[$contAF] = $C;
	$contAF++;
}
if (strcmp($D, "0") != 0 && strcmp($D, "") != 0) {
	# code...
	$cadeindi = $cadeindi . "D,";
	$vecAF[$contAF] = $D;
	$contAF++;
}
if (strcmp($E, "0") != 0 && strcmp($E, "") != 0) {
	# code...
	$cadeindi = $cadeindi . "E,";
	$vecAF[$contAF] = $E;
	$contAF++;
}
if (strcmp($F, "0") != 0 && strcmp($F, "") != 0) {
	# code...
	$cadeindi = $cadeindi . "F,";
	$vecAF[$contAF] = $F;
	$contAF++;
}
$fa = $_POST["fa"];
$te = $_POST["te"];
$por = $_POST["por"]; //porcenjaje 30 de 100
$mat = $_POST["mat"]; //materia nombre
$gru = $_POST["gru"]; //grupo
$tem = $_POST["tem"];
$CoT = isset($_POST["CoT"]) ? $_POST["CoT"] : "";
$_SESSION["A"] = $A;
$_SESSION["B"] = $B;
$_SESSION["C"] = $C;
$_SESSION["D"] = $D;
$_SESSION["E"] = $E;
$_SESSION["F"] = $F;
$nomdoc = isset($_POST['nomDocenteEjemplo']) ? $_POST['nomDocenteEjemplo'] : $_SESSION["nombreCompleto"];

$Materia = $mat . " (TEMA " . $tem . ")"; //yo lo hice
$Instrumento = $ins; //yo lo pase
$ProgEducativo = $_POST["PE"];
$Semestre = $_POST["CS"];
$NomDocente = $nomdoc;
$ClaveGrupo = $gru;
$NomEstudiantes = "";
$FechaAplicacion = $fa;
$TiempoEvaluacion = $te;
$Evidencia = $evi; //yo lo pase
$Competencia = $CoT;
$ObjetoEvaluar = "El (La) " . $evi; //yo lo pase


$ItemUno = "Interpreta correctamente el modelo de simulación desarrollado y lo sabe explicar ante preguntas del profesor <Son Ejemplos>";
$ValItemUno = "2";
$IndItemUno = "A";
$MarcaSiItemUno = "X";
$MarcaNoItemUno = "";
$PuntosItemUno = "2";

$ItemDos = "Incluye una fuente de informacion externa en la que se baso para realizar el proyecto";
$ValItemDos = "2";
$IndItemDos = "B";
$MarcaSiItemDos = "X";
$MarcaNoItemDos = "";
$PuntosItemDos = "2";

$ItemTres = "Presenta una perspectiva creativa al abordar la soluccion de su proyecto";
$ValItemTres = "2";
$IndItemTres = "C";
$MarcaSiItemTres = "";
$MarcaNoItemTres = "X";
$PuntosItemTres = "0";

$ItemCuatro = "Realizo cuestionamientos economicos o de optimización al observar la simulación que realizo";
$ValItemCuatro = "1";
$IndItemCuatro = "D";
$MarcaSiItemCuatro = "X";
$MarcaNoItemCuatro = "";
$PuntosItemCuatro = "1";

$ItemCinco = "Incorporo aspectos de asignaturas previas como topicos avanzados de programación";
$ValItemCinco = "1";
$IndItemCinco = "E";
$MarcaSiItemCinco = "X";
$MarcaNoItemCinco = "";
$PuntosItemCinco = "1";

$ItemSeis = "Entrega el trabajo en tiempo y forma establecidos por el docente";
$ValItemSeis = "1";
$IndItemSeis = "F";
$MarcaSiItemSeis = "X";
$MarcaNoItemSeis = "";
$PuntosItemSeis = "1";

$ItemSiete = "Contienen al menos 5 palabras seleccionadas de acuerdo al tema";
$ValItemSiete = "10";
$IndItemSiete = "M";
$MarcaSiItemSiete = "X";
$MarcaNoItemSiete = "";
$PuntosItemSiete = "10";

$ItemOcho = "Adecuada y coherente definición de las palabras escogidas";
$ValItemOcho = "11";
$IndItemOcho = "M";
$MarcaSiItemOcho = "X";
$MarcaNoItemOcho = "";
$PuntosItemOcho = "11";


$Retroalimentación = "";
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


$FechaEntrega = "2-04-2021";
$FechaRetroalimentacion = "2-04-2021";





?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>Document</title>

	<style>
		.rotar {
			-webkit-transform: rotate(-90deg);
			transform: rotate(-90deg);
		}

		.margen {
			margin: 0 !important;
			padding: 0 !important;
		}

		.box img {
			width: 100%;

		}

		@supports(object-fit: cover) {
			.box img {
				height: 100%;
				object-fit: cover;
				object-position: center center;
			}
		}

		.coltit {
			background-color: #acb9ca;
			font-weight: bold;
		}

		.colcon {
			background-color: #d9e1f2;
		}

		.colwhitef {
			background-color: white;
			font-weight: bold;
		}

		.bordewhite {
			border-width: 0.5px;
			border-style: solid;
			border-color: white;
		}

		.bordeblack {
			border-width: 0.5px;
			border-style: solid;
			border-color: black;
		}

		.aiz {
			text-align: left;
		}
	</style>

</head>

<body>
	<div class="container mt-3" id="imprimir" style="max-width: 1276px; min-width: 950px;">
		<div class="col-12 d-flex justify-content-end mb-2" data-html2canvas-ignore="true">
			<div class="row">
				<button type="button" class="btn btn-info" onclick="descargarPDFEvidencia(this)"><i class="fa-solid fa-file-pdf pr-2"></i>Descargar PDF</button>
			</div>
		</div>
		<div class="col">
			<!–– primer encabezado ––>
				<div class="row">
					<div class="box col-md-2 col-xs-2 col-sm-2 col-lg-2 col-2">
						<img src="img/logoitesa.png" alt="">
					</div>
					<div class="col-md-10 col-xs-10 col-sm-10 col-lg-10 col-10">
						<div class="row">
							<div class="col-md-12 col-xs-12 col-sm-12 col-lg-12 col-12 coltit" style="text-align: center; font-size: 16px;">
								<?php echo $Materia; ?>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12 col-xs-12 col-sm-12 col-lg-12 col-12 colwhitef" style="text-align: center; font-size: 16px;">
								<?php echo $Instrumento; ?>
							</div>
						</div>
					</div>
				</div>


				<!–– segundo encabezado ––>
					<div class="row aiz">
						<!–– linea 1 ––>
							<div class="col-md-3 col-xs-3 col-sm-3 col-lg-3 col-3 coltit bordewhite d-flex justify-content-start align-items-center">
								Programa Educativo
							</div>
							<div class="col-md-5 col-xs-5 col-sm-5 col-lg-5 col-5 colcon bordewhite d-flex justify-content-center align-items-center" style="text-align: center">
								<?php echo $ProgEducativo; ?>
							</div>
							<div class="col-md-2 col-xs-2 col-sm-2 col-lg-2 col-2 coltit bordewhite d-flex justify-content-start align-items-center">
								Semestre
							</div>
							<div class="col-md-2 col-xs-2 col-sm-2 col-lg-2 col-2 colcon bordewhite d-flex justify-content-center align-items-center" style="text-align: center">
								<?php echo $Semestre; ?>
							</div>
					</div>
					<div class="row aiz" style="display: flex;">
						<!–– linea 2 ––>
							<div class=" col-md-2 col-xs-2 col-sm-2 col-lg-2 col-2 coltit bordewhite d-flex justify-content-start align-items-center">
								Nombre del docente
							</div>
							<div class="col-md-6 col-xs-6 col-sm-6 col-lg-6 col-6 colcon bordewhite d-flex justify-content-center align-items-center" style="text-align: center">
								<?php echo $NomDocente; ?>
							</div>
							<div class="col-md-2 col-xs-2 col-sm-2 col-lg-2 col-2 coltit bordewhite d-flex justify-content-start align-items-center">
								Clave de Grupo
							</div>
							<div class="col-md-2 col-xs-2 col-sm-2 col-lg-2 col-2 colcon bordewhite d-flex justify-content-center align-items-center" style="text-align: center">
								<?php echo $ClaveGrupo; ?>
							</div>
					</div>
					<div class="row aiz" style="display: flex;">
						<!–– linea 3 ––>
							<div class="col-md-3 col-xs-3 col-sm-3 col-lg-3 col-3 coltit bordewhite d-flex justify-content-start align-items-center">
								Nombre del (la) Estudiante o integrantes de equipo
							</div>
							<div class="col-md-4 col-xs-4 col-sm-4 col-lg-4 col-4 colcon bordewhite d-flex justify-content-start align-items-center" style="text-align: center">
								<?php echo $NomEstudiantes; ?>
							</div>
							<div class="col-md-2 col-xs-2 col-sm-2 col-lg-2 col-2 coltit bordewhite d-flex justify-content-start align-items-center">
								Fecha de aplicación
							</div>
							<div class="col-md-1 col-xs-1 col-sm-1 col-lg-1 col-1 colcon bordewhite d-flex justify-content-center align-items-center" style="text-align: center">
								<?php echo $FechaAplicacion; ?>
							</div>
							<div class="col-md-1 col-xs-1 col-sm-1 col-lg-1 col-1 coltit bordewhite d-flex justify-content-center align-items-center">
								Tiempo de evaluación
							</div>
							<div class="col-md-1 col-xs-1 col-sm-1 col-lg-1 col-1 colcon bordewhite d-flex justify-content-center align-items-center" style="text-align: center">
								<?php echo $TiempoEvaluacion; ?>
							</div>
					</div>
					<div class="row aiz" style="display: flex;">
						<!–– linea 4 ––>
							<div class="box col-md-3 col-xs-3 col-sm-3 col-lg-3 col-3 coltit bordewhite d-flex justify-content-start align-items-center">
								Evidencia
							</div>
							<div class="col-md-9 col-xs-9 col-sm-9 col-lg-9 col-9 colcon bordewhite d-flex justify-content-center align-items-center" style="text-align: center">
								<?php echo $Evidencia; ?>
							</div>
					</div>
					<div class="row aiz" style="display: flex;">
						<!–– linea 5 ––>
							<div class="col-md-3 col-xs-3 col-sm-3 col-lg-3 col-3 coltit bordewhite d-flex justify-content-start align-items-center">
								Competencia
							</div>
							<div class="col-md-9 col-xs-9 col-sm-9 col-lg-9 col-9 colcon bordewhite d-flex justify-content-center align-items-center" style="text-align: center">
								<?php echo $Competencia; ?>
							</div>
					</div>


					<!–– Tercer encabezado ––>
						<div class="row aiz">
							<div class="colwhitef box col-md-12 col-xs-12 col-sm-12 col-lg-12 col-12" style="border-bottom:1px; border-color: black; border-bottom-style: solid; ">
								Instrucciones
							</div>
							<div class=" col-md-12 col-xs-12 col-sm-12 col-lg-12 col-12 colcon">
								1.- El docente llenará la lista de cotejo en función de la calidad del producto entregado por el(los) estudiante (es).
							</div>
							<div class=" col-md-12 col-xs-12 col-sm-12 col-lg-12 col-12 colcon">
								2.- Se marca con una "X" si cumple o no con el criterio.
							</div>
							<div class="col-md-12 col-xs-12 col-sm-12 col-lg-12 col-12 colcon">
								3.- Se llenará el apartado "puntos totales", con los puntos que considere corresponden con la calidad del producto.
							</div>
							<div class=" col-md-12 col-xs-12 col-sm-12 col-lg-12 col-12 colcon">
								4.- El puntaje máximo de la evaluación es de <?php echo $por; ?> puntos.
							</div>
							<div class=" col-md-12 col-xs-12 col-sm-12 col-lg-12 col-12 colcon">
								5.- Para que el estudiante sea evaluado en los indicadores <?php echo $cadeindi; ?> deberá cumplir con los indicadores marcados con M (mínimos).
							</div>
							<div class=" col-md-12 col-xs-12 col-sm-12 col-lg-12 col-12 colcon">
								6.- Realizar la sumatoria.
							</div>
						</div>


						<!–– Cuarto encabezado ––>
							<div class="row" style="display: flex;">
								<!--línea 7 -->
								<div class="col-md-9 col-xs-9 col-sm-9 col-lg-9 col-9">
									<!--nuevamente 12 lineas -->
									<div class="row" style="display: flex;">
										<div class=" coltit col-md-1 col-xs-1 col-sm-1 col-lg-1 col-1">
											<div class="row">
												<div class="bordewhite col-md-12 col-xs-12 col-sm-12 col-lg-12 col-12 d-flex justify-content-center align-items-center" style="text-align: center">
													No.
												</div>
												<div class="bordewhite col-md-12 col-xs-12 col-sm-12 col-lg-12 col-12 bo d-flex justify-content-center align-items-center">
													<label for=""></label>
												</div>
											</div>
										</div>

										<div class=" col-md-6 col-xs-6 col-sm-6 col-lg-6 col-6">
											<div class="row">
												<div class="bordewhite coltit col-md-12 col-xs-12 col-sm-12 col-lg-12 col-12 d-flex justify-content-center align-items-center" style="text-align: center">
													Aspecto a evaluar
												</div>
												<div class="bordewhite colwhitef col-md-12 col-xs-12 col-sm-12 col-lg-12 col-12 d-flex justify-content-center align-items-center" style="text-align: center">
													<?php echo $ObjetoEvaluar; ?>
												</div>
											</div>
										</div>

										<div class=" bordewhite coltit col-md-1 col-xs-1 col-sm-1 col-lg-1 col-1 d-flex justify-content-center align-items-center" style="text-align: center;">
											VALOR
										</div>
										<div class=" bordewhite coltit col-md-1 col-xs-1 col-sm-1 col-lg-1 col-1 d-flex justify-content-center align-items-center" style="text-align: center;">
											IND.
										</div>
										<div class=" bordewhite coltit col-md-1 col-xs-1 col-sm-1 col-lg-1 col-1 d-flex justify-content-center align-items-center" style="text-align: center">
											SI
										</div>
										<div class="bordewhite coltit col-md-1 col-xs-1 col-sm-1 col-lg-1 col-1 d-flex justify-content-center align-items-center" style="text-align: center">
											NO
										</div>
										<div class=" bordewhite coltit col-md-1 col-xs-1 col-sm-1 col-lg-1 col-1 d-flex justify-content-center align-items-center" style="text-align: center">
											PUNTOS
										</div>
									</div>
								</div>
								<div class="bordewhite coltit col-md-3 col-xs-3 col-sm-3 col-lg-3 col-3 d-flex justify-content-center align-items-center" style="text-align: center">
									Retroalimentación
								</div>
							</div>


							<!–– Quinto encabezado (ITEMS)––>
								<div class="row bordewhite" style="display: flex;">
									<!--línea 7 -->
									<div class="col-md-9 col-xs-9 col-sm-9 col-lg-9 col-9">
										<!--Nuevamente 12 lineas -->
										<!--Punto 1-->

										<!-- indicadores de alcance-->
										<?php
										$continstru = 1;

										for ($i = 0; $i < count($indalc); $i++) {
											$vecalc = $indalc[$i];

										?>
											<div class="row" style="display: flex; text-align: left;">
												<div class=" coltit bordewhite col-md-1 col-xs-1 col-sm-1 col-lg-1 col-1 d-flex justify-content-center align-items-center" style="text-align: center">
													<?php echo ($continstru);
													$continstru++; ?>
												</div>
												<div class="colcon col-md-6 col-xs-6 col-sm-6 col-lg-6 col-6 d-flex justify-content-start align-items-center">
													<?php echo $vecalc[0]; ?>
												</div>
												<div class="colcon bordewhite  col-md-1 col-xs-1 col-sm-1 col-lg-1 col-1 d-flex justify-content-center align-items-center" style="text-align: center">
													<?php echo $vecAF[$i]; ?>
												</div>
												<div class=" bordewhite colcon	 col-md-1 col-xs-1 col-sm-1 col-lg-1 col-1 d-flex justify-content-center align-items-center" style="text-align: center">
													<?php echo $vecalc[1];	?>
												</div>
												<div class=" bordeblack  col-md-1 col-xs-1 col-sm-1 col-lg-1 col-1 d-flex justify-content-center align-items-center" style="text-align: center">

												</div>
												<div class="bordeblack  col-md-1 col-xs-1 col-sm-1 col-lg-1 col-1 d-flex justify-content-center align-items-center" style="text-align: center">

												</div>
												<div class=" bordeblack col-md-1 col-xs-1 col-sm-1 col-lg-1 col-1 d-flex justify-content-center align-items-center" style="text-align: center">

												</div>
											</div>
										<?php } ?>


										<!-- indicadores mínimos-->

										<?php

										for ($i = 0; $i < count($indmin); $i++) {
											$vecmin = $indmin[$i];

										?>
											<div class="row" style="display: flex; text-align: left;">
												<div class=" coltit bordewhite col-md-1 col-xs-1 col-sm-1 col-lg-1 col-1 d-flex justify-content-center align-items-center" style="text-align: center">
													<?php echo $continstru;
													$continstru++; ?>
												</div>
												<div class="colcon col-md-6 col-xs-6 col-sm-6 col-lg-6 col-6 d-flex justify-content-start align-items-center">
													<?php echo $vecmin[0]; ?>
												</div>
												<div class="colcon bordewhite  col-md-1 col-xs-1 col-sm-1 col-lg-1 col-1 d-flex justify-content-center align-items-center" style="text-align: center">
													<?php echo $vecmin[2]; ?>
												</div>
												<div class=" bordewhite colcon	 col-md-1 col-xs-1 col-sm-1 col-lg-1 col-1 d-flex justify-content-center align-items-center" style="text-align: center">
													<?php echo $vecmin[1]; ?>
												</div>
												<div class=" bordeblack  col-md-1 col-xs-1 col-sm-1 col-lg-1 col-1 d-flex justify-content-center align-items-center" style="text-align: center">

												</div>
												<div class="bordeblack  col-md-1 col-xs-1 col-sm-1 col-lg-1 col-1 d-flex justify-content-center align-items-center" style="text-align: center">

												</div>
												<div class=" bordeblack col-md-1 col-xs-1 col-sm-1 col-lg-1 col-1 d-flex justify-content-center align-items-center" style="text-align: center">

												</div>
											</div>
										<?php } ?>



									</div>
									<div class="bordeblack  col-md-3 col-xs-3 col-sm-3 col-lg-3 col-3 d-flex justify-content-center align-items-center" style="text-align: center">
										<?php echo $Retroalimentación; ?>
									</div>
								</div>
								<div class="row" style="display: flex;">
									<div class="coltit bordewhite  col-md-3 col-xs-3 col-sm-3 col-lg-3 col-3 d-flex justify-content-center align-items-center" style="text-align: center">
										Puntaje Maximo
									</div>
									<div class="colcon bordewhite  col-md-3 col-xs-3 col-sm-3 col-lg-3 col-3 d-flex justify-content-center align-items-center" style="text-align: center">
										<?php echo $por; ?>
									</div>
									<div class="coltit bordewhite  col-md-3 col-xs-3 col-sm-3 col-lg-3 col-3 d-flex justify-content-center align-items-center" style="text-align: center">
										Puntaje Obtenido
									</div>
									<div class="colcon bordewhite  col-md-3 col-xs-3 col-sm-3 col-lg-3 col-3 d-flex justify-content-center align-items-center" style="text-align: center">
										<?php echo $PuntosObtenidos; ?>
									</div>

								</div>


								<!–– Sexto encabezado ––>
									<div class="row aiz">
										<div class="colwhitef box col-md-12 col-xs-12 col-sm-12 col-lg-12 col-12">
											ㅤ
										</div>
									</div>

									<div class=" bordeblack row aiz" style="display: flex;">
										<div class="colcon bordewhite  col-md-2 col-xs-2 col-sm-2 col-lg-2 col-2 d-flex justify-content-center align-items-center" style="text-align: center; font-weight: bold;">
											Evidencia de Aprendizaje
										</div>
										<div class="colcon bordewhite  col-md-1 col-xs-1 col-sm-1 col-lg-1 col-1 d-flex justify-content-center align-items-center" style="text-align: center; font-weight: bold;">
											%
										</div>
										<div class="col-md-9col-xs-9 col-sm-9 col-lg-9 col-9">
											<div class="row" style="display: flex;">
												<div class=" colcon bordewhite col-md-6 col-xs-6 col-sm-6 col-lg-6 col-6 d-flex justify-content-center align-items-center" style="text-align: center; font-weight: bold;">
													Indicadores de Alcance
												</div>
												<div class="colcon bordewhite col-md-6 col-xs-6 col-sm-6 col-lg-6 col-6 d-flex justify-content-center align-items-center" style="text-align: center; font-weight: bold;">
													Metodo de Evaluacion
												</div>
											</div>
											<div class="row" style="display: flex;">
												<div class="col-md-1 col-xs-1 col-sm-1 col-lg-1 col-1 colcon bordewhite d-flex justify-content-center align-items-center" style="text-align: center; font-weight: bold;">
													A
												</div>
												<div class="col-md-1 col-xs-1 col-sm-1 col-lg-1 col-1 colcon bordewhite d-flex justify-content-center align-items-center" style="text-align: center; font-weight: bold;">
													B
												</div>
												<div class="col-md-1 col-xs-1 col-sm-1 col-lg-1 col-1 colcon bordewhite d-flex justify-content-center align-items-center" style="text-align: center; font-weight: bold;">
													C
												</div>
												<div class="col-md-1 col-xs-1 col-sm-1 col-lg-1 col-1 colcon bordewhite d-flex justify-content-center align-items-center" style="text-align: center; font-weight: bold;">
													D
												</div>
												<div class="col-md-1 col-xs-1 col-sm-1 col-lg-1 col-1 colcon bordewhite d-flex justify-content-center align-items-center" style="text-align: center; font-weight: bold;">
													E
												</div>
												<div class="col-md-1 col-xs-1 col-sm-1 col-lg-1 col-1 colcon bordewhite d-flex justify-content-center align-items-center" style="text-align: center; font-weight: bold;">
													F
												</div>
												<div class="col-md-3 col-xs-3 col-sm-3 col-lg-3 col-3 colcon bordewhite d-flex justify-content-center align-items-center" style="text-align: center; font-weight: bold;">
													Instrumento
												</div>
												<div class="col-md-1 col-xs-1 col-sm-1 col-lg-1 col-1 colcon bordewhite d-flex justify-content-center align-items-center" style="text-align: center; font-weight: bold;">
													P
												</div>
												<div class="col-md-1 col-xs-1 col-sm-1 col-lg-1 col-1 colcon bordewhite d-flex justify-content-center align-items-center" style="text-align: center; font-weight: bold;">
													C
												</div>
												<div class="col-md-1 col-xs-1 col-sm-1 col-lg-1 col-1 colcon bordewhite d-flex justify-content-center align-items-center" style="text-align: center; font-weight: bold;">
													A
												</div>
											</div>
										</div>
									</div>
									<div class="row aiz">
										<div class="bordeblack  col-md-2 col-xs-2 col-sm-2 col-lg-2 col-2 d-flex justify-content-center align-items-center" style="text-align: center">
											<?php echo $Evidencia; ?>
										</div>
										<div class="bordeblack  col-md-1 col-xs-1 col-sm-1 col-lg-1 col-1 d-flex justify-content-center align-items-center" style="text-align: center">
											<?php echo $Porcentaje; ?>
										</div>
										<div class="col-md-9col-xs-9 col-sm-9 col-lg-9 col-9">
											<div class="row" style="display: flex;">
												<div class="col-md-1 col-xs-1 col-sm-1 col-lg-1 col-1 d-flex justify-content-center align-items-center bordeblack" style="text-align: center">
													<?php echo $PuntosIndA; ?>
												</div>
												<div class="col-md-1 col-xs-1 col-sm-1 col-lg-1 col-1 d-flex justify-content-center align-items-center bordeblack" style="text-align: center">
													<?php echo $PuntosIndB; ?>
												</div>
												<div class="col-md-1 col-xs-1 col-sm-1 col-lg-1 col-1 d-flex justify-content-center align-items-center bordeblack" style="text-align: center">
													<?php echo $PuntosIndC; ?>
												</div>
												<div class="col-md-1 col-xs-1 col-sm-1 col-lg-1 col-1 d-flex justify-content-center align-items-center bordeblack" style="text-align: center">
													<?php echo $PuntosIndD; ?>
												</div>
												<div class="col-md-1 col-xs-1 col-sm-1 col-lg-1 col-1 d-flex justify-content-center align-items-center bordeblack" style="text-align: center">
													<?php echo $PuntosIndE; ?>
												</div>
												<div class="col-md-1 col-xs-1 col-sm-1 col-lg-1 col-1 d-flex justify-content-center align-items-center bordeblack" style="text-align: center">
													<?php echo $PuntosIndF; ?>
												</div>
												<div class="col-md-3 col-xs-3 col-sm-3 col-lg-3 col-3 d-flex justify-content-center align-items-center bordeblack" style="text-align: center">
													<?php echo $Instrumento; ?>
												</div>
												<div class="col-md-1 col-xs-1 col-sm-1 col-lg-1 col-1 d-flex justify-content-center align-items-center bordeblack" style="text-align: center">
													<?php echo $MarcaMetodoP; ?>
												</div>
												<div class="col-md-1 col-xs-1 col-sm-1 col-lg-1 col-1 d-flex justify-content-center align-items-center bordeblack" style="text-align: center">
													<?php echo $MarcaMetodoC; ?>
												</div>
												<div class="col-md-1 col-xs-1 col-sm-1 col-lg-1 col-1 d-flex justify-content-center align-items-center bordeblack" style="text-align: center">
													<?php echo $MarcaMetodoA; ?>
												</div>

											</div>
										</div>
									</div>


									<!–– Septimo encabezado ––>
										<div class="row aiz">
											<div class="colwhitef box col-md-12 col-xs-12 col-sm-12 col-lg-12 col-12">
												ㅤ
											</div>
										</div>
										<div class="row bordeblack">
											<div class="bordewhite colcon col-md-12 col-xs-12 col-sm-12 col-lg-12 col-12 d-flex justify-content-center align-items-center" style="text-align: center; font-weight: bold;">
												Entrega Instrumento
											</div>
											<div class="col-md-12 col-xs-12 col-sm-12 col-lg-12 col-12">
												<div class="row aiz">
													<div class="bordewhite colcon col-md-4 col-xs-4 col-sm-4 col-lg-4 col-4 d-flex justify-content-start align-items-center" style="font-weight: bold;">
														Nombre y Firma del Docente
													</div>
													<div class="col-md-8 col-xs-8 col-sm-8 col-lg-8 col-8 d-flex justify-content-start align-items-center" style="border-bottom:1px; border-color: black; border-bottom-style: solid;">
														<?php echo $NomDocente; ?>
													</div>
												</div>
											</div>
											<div class="col-md-12 col-xs-12 col-sm-12 col-lg-12 col-12">
												<div class="row aiz">
													<div class="bordewhite colcon col-md-4 col-xs-4 col-sm-4 col-lg-4 col-4 d-flex justify-content-start align-items-center" style="font-weight: bold;">
														Nombre y Firma del Estudiante
													</div>
													<div class="col-md-8 col-xs-8 col-sm-8 col-lg-8 col-8 d-flex justify-content-start align-items-center" style="border-bottom:1px; border-color: black; border-bottom-style: solid;">
														<?php echo $NomEstudiantes; ?>
													</div>
												</div>
											</div>
											<div class="col-md-12 col-xs-12 col-sm-12 col-lg-12 col-12">
												<div class="row aiz">
													<div class="bordewhite colcon col-md-4 col-xs-4 col-sm-4 col-lg-4 col-4 d-flex justify-content-start align-items-center" style="font-weight: bold;">
														Fecha de Entrega
													</div>
													<div class="col-md-8 col-xs-8 col-sm-8 col-lg-8 col-8 d-flex justify-content-start align-items-center">
														<?php echo $FechaEntrega; ?>
													</div>
												</div>
											</div>
										</div>


										<!–– Octavo encabezado ––>
											<div class="row aiz">
												<div class="colwhitef box col-md-12 col-xs-12 col-sm-12 col-lg-12 col-12">
													ㅤ
												</div>
											</div>
											<div class="row bordeblack">
												<div class="bordewhite colcon col-md-12 col-xs-12 col-sm-12 col-lg-12 col-12 d-flex justify-content-center align-items-center" style="text-align: center; font-weight: bold;">
													Retroalimentación
												</div>
												<div class="col-md-12 col-xs-12 col-sm-12 col-lg-12 col-12 bordeblack">
													<div class="row aiz">
														<div class="bordewhite colcon col-md-4 col-xs-4 col-sm-4 col-lg-4 col-4 d-flex justify-content-start align-items-center" style="font-weight: bold;">
															Nombre y Firma del Docente
														</div>
														<div class="col-md-8 col-xs-8 col-sm-8 col-lg-8 col-8 d-flex justify-content-start align-items-center" style="border-bottom:1px; border-color: black; border-bottom-style: solid;">
															<?php echo $NomDocente; ?>
														</div>
													</div>
												</div>
												<div class="col-md-12 col-xs-12 col-sm-12 col-lg-12 col-12">
													<div class="row aiz">
														<div class="bordewhite colcon col-md-4 col-xs-4 col-sm-4 col-lg-4 col-4 d-flex justify-content-start align-items-center" style="font-weight: bold;">
															Nombre y Firma del Estudiante
														</div>
														<div class="col-md-8 col-xs-8 col-sm-8 col-lg-8 col-8 d-flex justify-content-start align-items-center" style="border-bottom:1px; border-color: black; border-bottom-style: solid;">
															<?php echo $NomEstudiantes; ?>
														</div>
													</div>
												</div>
												<div class="col-md-12 col-xs-12 col-sm-12 col-lg-12 col-12">
													<div class="row aiz">
														<div class="bordewhite colcon col-md-4 col-xs-4 col-sm-4 col-lg-4 col-4 d-flex justify-content-start align-items-center" style="font-weight: bold;">
															Fecha de Entrega
														</div>
														<div class="col-md-8 col-xs-8 col-sm-8 col-lg-8 col-8 d-flex justify-content-start align-items-center">
															<?php echo $FechaRetroalimentacion; ?>
														</div>
													</div>
												</div>
											</div>
		</div>
	</div>

	<script>
		function descargarPDFEvidencia(elemento) {
			$(elemento).prop('disabled', true);
			$(elemento).html('<span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>Descargando...');

			var nombrePDF = '<?php echo 'LISTA-DE-COTEJO_' . $Evidencia . '_' . $mat . '_Tema-' . (isset($_POST['tem']) ? $_POST['tem'] : '') . '_' . ($per) . '_' . $ClaveGrupo . '.pdf'  ?>';
			var instrumentoElemento = document.getElementById("contenedor-evidencia");
			html2pdf().set({
				margin: [0, 0, 20, 0],
				filename: nombrePDF,
				image: {
					type: 'jpeg',
					quality: 1
				},
				html2canvas: {
					scale: 3,
					scrollY: 0
				},
				//pagebreak: { mode: ['css']},
				pagebreak: {
					mode: ['avoid-all', 'css', 'legacy']
				},
				jsPDF: {
					unit: "mm",
					format: "a3",
					orientation: "portrait"
				}
			}).
			from(instrumentoElemento)
			.save()
			.then(function() {
				$(elemento).html('<i class="fa-solid fa-file-pdf pr-2"></i>Descargar PDF');
				$(elemento).prop("disabled", false);
			})
			.error(function() {
				$(elemento).html('<i class="fa-solid fa-file-pdf pr-2"></i>Descargar PDF');
				$(elemento).prop("disabled", false);
			});
		}
	</script>
</body>

</html>