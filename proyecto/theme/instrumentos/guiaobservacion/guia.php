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
$cadeindi = "";

if (strcmp($A, "0") != 0 && strcmp($A, "") != 0) {
	# code...
	$cadeindi = $cadeindi . "A,";
}
if (strcmp($B, "0") != 0 && strcmp($B, "") != 0) {
	# code...
	$cadeindi = $cadeindi . "B,";
}
if (strcmp($C, "0") != 0 && strcmp($C, "") != 0) {
	# code...
	$cadeindi = $cadeindi . "C,";
}
if (strcmp($D, "0") != 0 && strcmp($D, "") != 0) {
	# code...
	$cadeindi = $cadeindi . "D,";
}
if (strcmp($E, "0") != 0 && strcmp($E, "") != 0) {
	# code...
	$cadeindi = $cadeindi . "E,";
}
if (strcmp($F, "0") != 0 && strcmp($F, "") != 0) {
	# code...
	$cadeindi = $cadeindi . "F,";
}
//$indalc=$_POST["taa"];//indicadores de alcance
$CNCPTL = $_POST["CNCPTL"];
$CTTDNL = $_POST["CTTDNL"];
$PRCDMNTL = $_POST["PRCDMTL"];
$cadeindi = "";

$general = $_POST["general"];


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



$MarcaMetodoP = $PRCDMNTL;
$MarcaMetodoC = $CNCPTL;
$MarcaMetodoA = $CTTDNL;


$FechaEntrega = "2-04-2021";
$FechaRetroalimentacion = "2-04-2021";





?>

<?php
//$Materia="Fundamentos de Programación";
$Instrumento = $ins;
$ProgEducativo = $_POST["PE"];
$Semestre = $_POST["CS"];
$NomDocente = $nomdoc;
$ClaveGrupo = $gru;
$NomEstudiantes = "<div style='color:white;'>j</div>";
$FechaAplicacion = $fa;
$TiempoEvaluacion = $te;
$Evidencia = $evi;
$Competencia = $CoT;


$criterioUno = "Dominio del Tema";

$ItemUno = "Presenta Capturas de la menos tres pantallas en cliente y al menos dos de administrador";
$ValItemUno = "7";
$IndItemUno = "M";
$MarcaSiItemUno = "X";
$MarcaNoItemUno = "";
$PuntosItemUno = "7";

$ItemDos = "Presenta captura de al menos una regla css propia externa, interna o en linea, asi como, captura de la aplicación de una clase para el diseño de bootstrap";
$ValItemDos = "7";
$IndItemDos = "M";
$MarcaSiItemDos = "X";
$MarcaNoItemDos = "";
$PuntosItemDos = "7";

$ItemTres = "Presenta su pagina en un alojamiento gratuito o de paga, con capturas";
$ValItemTres = "7";
$IndItemTres = "M";
$MarcaSiItemTres = "X";
$MarcaNoItemTres = "";
$PuntosItemTres = "7";

$criterioDos = "Desenvolvimiento";

$ItemCuatro = "Expone en equipo de al menos tres estudiantes, manifiestan total seguridad, además se expone en el enlace de equipo de meet en el tiempo asignado.";
$ValItemCuatro = "2";
$IndItemCuatro = "A";
$MarcaSiItemCuatro = "";
$MarcaNoItemCuatro = "X";
$PuntosItemCuatro = "0";

$ItemCinco = "Expresa su punto de vista sobre css, que complementa lo presentado en la conclusión";
$ValItemCinco = "2";
$IndItemCinco = "B";
$MarcaSiItemCinco = "X";
$MarcaNoItemCinco = "";
$PuntosItemCinco = "2";

$criterioTres = "Conocimiento y preparación del Tema";

$ItemSeis = "Menciona procedimientos no vistos en clase de manera clara para reforzar la actividad presentada";
$ValItemSeis = "1";
$IndItemSeis = "C";
$MarcaSiItemSeis = "X";
$MarcaNoItemSeis = "";
$PuntosItemSeis = "1";


$ItemSiete = "La presentación contiene los apartados: portada, contenido de la presentación, desarrollo, conclusión, además las diapositivas incluyen de manera clara: número de diapositiva, cada diapositiva contiene el nombre de quien expone.";
$ValItemSiete = "2";
$IndItemSiete = "D";
$MarcaSiItemSiete = "X";
$MarcaNoItemSiete = "";
$PuntosItemSiete = "2";

$ItemOcho = "Incluye en la presentación solo una diapositiva que explica la forma en como se subio a un alojamiento la pagina";
$ValItemOcho = "1";
$IndItemOcho = "E";
$MarcaSiItemOcho = "X";
$MarcaNoItemOcho = "";
$PuntosItemOcho = "1";

$criterioCuatro = "Planeación y secuencia";

$ItemNueve = "Presenta en no mas de 15 minutos de exposición y respeta el tiempo de participación de sus compañeros";
$ValItemNueve = "1";
$IndItemNueve = "F";
$MarcaSiItemNueve = "X";
$MarcaNoItemNueve = "";
$PuntosItemNueve = "1";



$Retroalimentación = "";
$Porcentaje = $por;
$PuntosObtenidos = "3";


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
<html lang="es">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
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

	<div class="container mt-3" style="max-width: 1276px; min-width: 950px;">
		<div class="col-12 d-flex justify-content-end mb-2" data-html2canvas-ignore="true">
			<div class="row">
				<button type="button" class="btn btn-info" onclick="descargarPDFEvidencia(this)"><i class="fa-solid fa-file-pdf pr-2"></i>Descargar PDF</button>
			</div>
		</div>
		<div class="col">
			<!–– primer encabezado ––>
				<div class="row">
					<div class="box col-md-2 col-xs-2 col-sm-2 col-lg-2 col-2 d-flex justify-content-center align-items-center">
						<img src="img/logoitesa.png" alt="" class="img-fluid">
					</div>
					<div class="col-md-10 col-xs-10 col-sm-10 col-lg-10 col-10">
						<div class="row">
							<div class="col-md-12 col-xs-12 col-sm-12 col-lg-12 col-12 coltit d-flex justify-content-center align-items-center" style="text-align: center; font-size: 16px;">
								<?php echo $Materia; ?>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12 col-xs-12 col-sm-12 col-lg-12 col-12 colwhitef d-flex justify-content-center align-items-center" style="text-align: center; font-size: 16px;">
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
							<div class="col-md-2 col-xs-2 col-sm-2 col-lg-2 col-2 colcon bordewhite" style="text-align: center">
								<?php echo $Semestre; ?>
							</div>
					</div>
					<div class="row aiz" style="display: flex;">
						<!–– linea 2 ––>
							<div class=" col-md-3 col-xs-3 col-sm-3 col-lg-3 col-3 coltit bordewhite d-flex justify-content-start align-items-center">
								Nombre del docente
							</div>
							<div class="col-md-5 col-xs-5 col-sm-5 col-lg-5 col-5 colcon bordewhite d-flex justify-content-center align-items-center" style="text-align: center">
								<?php echo $NomDocente; ?>
							</div>
							<div class="col-md-2 col-xs-2 col-sm-2 col-lg-2 col-2 coltit bordewhite d-flex justify-content-start align-items-center">
								Clave de Grupo
							</div>
							<div class="col-md-2 col-xs-2 col-sm-2 col-lg-2 col-2 colcon bordewhite d-flex justify-content-center align-items-center" style="text-align: center">
								<?php echo $ClaveGrupo; ?>
							</div>
					</div>
					<div class="row aiz" style="display: flex; min-height: 70px;">
						<!–– linea 3 ––>
							<div class="col-md-3 col-xs-3 col-sm-3 col-lg-3 col-3 coltit bordewhite d-flex justify-content-start align-items-center">
								Nombre del (la) Estudiante o integrantes de equipo
							</div>
							<div class="col-md-4 col-xs-4 col-sm-4 col-lg-4 col-4 colcon bordewhite d-flex justify-content-center align-items-center" style="text-align: center">

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
							<div class="box col-md-3 col-xs-3 col-sm-3 col-lg-3 col-3 coltit bordewhite">
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
							<div class="col-md-9 col-xs-9 col-sm-9 col-lg-9 col-3 colcon bordewhite d-flex justify-content-center align-items-center" style="text-align: center">
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
								4.- El puntaje máximo de la evaluación es de 30 puntos.
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
										<div class="bordewhite coltit col-md-1 col-xs-1 col-sm-1 col-lg-1 col-1 d-flex justify-content-center align-items-center">
											No.
										</div>
										<div class="bordewhite coltit col-md-6 col-xs-6 col-sm-6 col-lg-6 col-6 d-flex justify-content-center align-items-center">
											Ítem
										</div>
										<div class=" bordewhite coltit col-md-1 col-xs-1 col-sm-1 col-lg-1 col-1 d-flex justify-content-center align-items-center">
											VALOR
										</div>
										<div class=" bordewhite coltit col-md-1 col-xs-1 col-sm-1 col-lg-1 col-1 d-flex justify-content-center align-items-center">
											IND.
										</div>
										<div class=" bordewhite coltit col-md-1 col-xs-1 col-sm-1 col-lg-1 col-1 d-flex justify-content-center align-items-center">
											SI
										</div>
										<div class="bordewhite coltit col-md-1 col-xs-1 col-sm-1 col-lg-1 col-1 d-flex justify-content-center align-items-center">
											NO
										</div>
										<div class=" bordewhite coltit col-md-1 col-xs-1 col-sm-1 col-lg-1 col-1 d-flex justify-content-center align-items-center">
											PUNTOS
										</div>
									</div>
								</div>
								<div class="bordewhite coltit col-md-3 col-xs-3 col-sm-3 col-lg-3 col-3 d-flex justify-content-center align-items-center">
									Observaciones/Retroalimentación
								</div>
							</div>


							<!–– Quinto encabezado (ITEMS)––>
								<div class="row bordewhite" style="display: flex;">
									<!--línea 7 -->
									<div class="col-md-9 col-xs-9 col-sm-9 col-lg-9 col-9">
										<?php
										//echo count($general);
										$contitems = 1;
										for ($i = 2; $i < count($general); $i++) {
											# code...
											$criterioUno = $general[$i][0];
											//echo $criterioUno;
											$vec = $general[$i][1];
											//echo count($vec);
											echo '<div class="row" style="display: flex;"><div class=" colcon bordewhite col-md-12 col-xs-12 col-sm-12 col-lg-12 col-12 d-flex justify-content-center align-items-center"">' . $criterioUno . '
					</div></div>';
											for ($j = 0; $j < count($vec); $j++) {
												# code...
												$vec1 = $vec[$j];
												echo '<div class="row" style="display: flex; text-align:left;">

					<div class=" colcon bordewhite col-md-1 col-xs-1 col-sm-1 col-lg-1 col-1 d-flex justify-content-center align-items-center">
						' . $contitems . '
					</div>
					<div class="colcon bordewhite  col-md-6 col-xs-6 col-sm-6 col-lg-6 col-6 d-flex justify-content-center align-items-center">
						' . $vec1[0] . '
					</div>
					<div class="colcon bordewhite  col-md-1 col-xs-1 col-sm-1 col-lg-1 col-1 d-flex justify-content-center align-items-center">
						' . $vec1[1] . '
					</div>
					<div class=" bordewhite colcon	 col-md-1 col-xs-1 col-sm-1 col-lg-1 col-1 d-flex justify-content-center align-items-center">
						' . $vec1[2] . '				
					</div>
					<div class=" bordeblack  col-md-1 col-xs-1 col-sm-1 col-lg-1 col-1  d-flex justify-content-center align-items-center">
						
					</div>
					<div class="bordeblack  col-md-1 col-xs-1 col-sm-1 col-lg-1 col-1  d-flex justify-content-center align-items-center">
						
					</div>
					<div class=" bordeblack col-md-1 col-xs-1 col-sm-1 col-lg-1 col-1  d-flex justify-content-center align-items-center">
						
					</div>
				</div>';
												$contitems++;
										?>

												<!--primer encabezado-->

												<!--Nuevamente 12 lineas -->
												<!--Punto 1-->



										<?php
											} //llave for interno
										} //llave del primer for  count()
										?>

















									</div>
									<div class="bordeblack  col-md-3 col-xs-3 col-sm-3 col-lg-3 col-3  d-flex justify-content-center align-items-center">
										<?php echo $Retroalimentación; ?>
									</div>
								</div>
								<div class="row">
									<div class="coltit bordewhite  col-md-3 col-xs-3 col-sm-3 col-lg-3 col-3 d-flex justify-content-center align-items-center">
										PUNTAJE MÁXIMO
									</div>
									<div class="colcon bordewhite  col-md-3 col-xs-3 col-sm-3 col-lg-3 col-3 d-flex justify-content-center align-items-center" style="font-weight: bold;">
										<?php echo $Porcentaje; ?> PUNTOS
									</div>
									<div class="coltit bordewhite  col-md-3 col-xs-3 col-sm-3 col-lg-3 col-3 d-flex justify-content-center align-items-center">
										PUNTAJE OBTENIDO
									</div>
									<div class="colcon bordewhite  col-md-3 col-xs-3 col-sm-3 col-lg-3 col-3 d-flex justify-content-center align-items-center">
										<label style="color:#d9e1f2;"><?php echo $PuntosObtenidos; ?></label>
									</div>

								</div>


								<!–– Sexto encabezado ––>
									<div class="row aiz">
										<div class="colwhitef box col-md-12 col-xs-12 col-sm-12 col-lg-12 col-12">
											ㅤ
										</div>
									</div>

									<div class="row aiz" style="display: flex;">
										<div class="colcon bordeblack  col-md-2 col-xs-2 col-sm-2 col-lg-2 col-2" style="text-align: center; font-weight: bold;">
											Evidencia de Aprendizaje
										</div>
										<div class="colcon bordeblack  col-md-1 col-xs-1 col-sm-1 col-lg-1 col-1" style="text-align: center; font-weight: bold;">
											%
										</div>
										<div class="col-md-9col-xs-9 col-sm-9 col-lg-9 col-9" style="display:grid;">
											<div class="row" style="display: flex;">
												<div class=" colcon bordeblack col-md-6 col-xs-6 col-sm-6 col-lg-6 col-6" style="text-align: center; font-weight: bold;">
													Indicadores de Alcance
												</div>
												<div class="colcon bordeblack col-md-6 col-xs-6 col-sm-6 col-lg-6 col-6" style="text-align: center; font-weight: bold;">
													Método de Evaluación
												</div>
											</div>
											<div class="row" style="display: flex;">
												<div class="col-md-1 col-xs-1 col-sm-1 col-lg-1 col-1 colcon bordeblack" style="text-align: center; font-weight: bold;">
													A
												</div>
												<div class="col-md-1 col-xs-1 col-sm-1 col-lg-1 col-1 colcon bordeblack" style="text-align: center; font-weight: bold;">
													B
												</div>
												<div class="col-md-1 col-xs-1 col-sm-1 col-lg-1 col-1 colcon bordeblack" style="text-align: center; font-weight: bold;">
													C
												</div>
												<div class="col-md-1 col-xs-1 col-sm-1 col-lg-1 col-1 colcon bordeblack" style="text-align: center; font-weight: bold;">
													D
												</div>
												<div class="col-md-1 col-xs-1 col-sm-1 col-lg-1 col-1 colcon bordeblack" style="text-align: center; font-weight: bold;">
													E
												</div>
												<div class="col-md-1 col-xs-1 col-sm-1 col-lg-1 col-1 colcon bordeblack" style="text-align: center; font-weight: bold;">
													F
												</div>
												<div class="col-md-3 col-xs-3 col-sm-3 col-lg-3 col-3 colcon bordeblack" style="text-align: center; font-weight: bold;">
													Instrumento
												</div>
												<div class="col-md-1 col-xs-1 col-sm-1 col-lg-1 col-1 colcon bordeblack" style="text-align: center; font-weight: bold;">
													P
												</div>
												<div class="col-md-1 col-xs-1 col-sm-1 col-lg-1 col-1 colcon bordeblack" style="text-align: center; font-weight: bold;">
													C
												</div>
												<div class="col-md-1 col-xs-1 col-sm-1 col-lg-1 col-1 colcon bordeblack" style="text-align: center; font-weight: bold;">
													A
												</div>
											</div>
										</div>
									</div>
									<div class="row aiz" style="display: flex;">
										<div class="bordeblack  col-md-2 col-xs-2 col-sm-2 col-lg-2 col-2 d-flex justify-content-center align-items-center">
											<?php echo $Evidencia; ?>
										</div>
										<div class="bordeblack  col-md-1 col-xs-1 col-sm-1 col-lg-1 col-1 d-flex justify-content-center align-items-center">
											<?php echo $Porcentaje; ?>
										</div>
										<div class="col-md-9col-xs-9 col-sm-9 col-lg-9 col-9" style="display:grid;">
											<div class="row" style="display: flex;">
												<div class="col-md-1 col-xs-1 col-sm-1 col-lg-1 col-1 bordeblack d-flex justify-content-center align-items-center">
													<?php echo $PuntosIndA; ?>
												</div>
												<div class="col-md-1 col-xs-1 col-sm-1 col-lg-1 col-1 bordeblack d-flex justify-content-center align-items-center">
													<?php echo $PuntosIndB; ?>
												</div>
												<div class="col-md-1 col-xs-1 col-sm-1 col-lg-1 col-1 bordeblack d-flex justify-content-center align-items-center">
													<?php echo $PuntosIndC; ?>
												</div>
												<div class="col-md-1 col-xs-1 col-sm-1 col-lg-1 col-1 bordeblack d-flex justify-content-center align-items-center">
													<?php echo $PuntosIndD; ?>
												</div>
												<div class="col-md-1 col-xs-1 col-sm-1 col-lg-1 col-1 bordeblack d-flex justify-content-center align-items-center">
													<?php echo $PuntosIndE; ?>
												</div>
												<div class="col-md-1 col-xs-1 col-sm-1 col-lg-1 col-1 bordeblack d-flex justify-content-center align-items-center">
													<?php echo $PuntosIndF; ?>
												</div>
												<div class="col-md-3 col-xs-3 col-sm-3 col-lg-3 col-3 bordeblack d-flex justify-content-center align-items-center">
													<?php echo $Instrumento; ?>
												</div>
												<div class="col-md-1 col-xs-1 col-sm-1 col-lg-1 col-1 bordeblack d-flex justify-content-center align-items-center">
													<?php echo $MarcaMetodoP; ?>
												</div>
												<div class="col-md-1 col-xs-1 col-sm-1 col-lg-1 col-1 bordeblack d-flex justify-content-center align-items-center">
													<?php echo $MarcaMetodoC; ?>
												</div>
												<div class="col-md-1 col-xs-1 col-sm-1 col-lg-1 col-1 bordeblack d-flex justify-content-center align-items-center">
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
											<div class="bordewhite colcon col-md-12 col-xs-12 col-sm-12 col-lg-12 col-12" style="text-align: center; font-weight: bold;">
												Entrega Instrumento
											</div>
											<div class="col-md-12 col-xs-12 col-sm-12 col-lg-12 col-12">
												<div class="row aiz">
													<div class="bordewhite colcon col-md-4 col-xs-4 col-sm-4 col-lg-4 col-4" style="font-weight: bold;">
														Nombre y Firma del Docente
													</div>
													<div class="col-md-8 col-xs-8 col-sm-8 col-lg-8 col-8" style="border-bottom:1px; border-color: black; border-bottom-style: solid;">
														<?php echo $NomDocente; ?>
													</div>
												</div>
											</div>
											<div class="col-md-12 col-xs-12 col-sm-12 col-lg-12 col-12">
												<div class="row aiz">
													<div class="bordewhite colcon col-md-4 col-xs-4 col-sm-4 col-lg-4 col-4" style="font-weight: bold;">
														Nombre y Firma del Estudiante
													</div>
													<div class="col-md-8 col-xs-8 col-sm-8 col-lg-8 col-8" style="border-bottom:1px; border-color: black; border-bottom-style: solid;"><?php echo $NomEstudiantes; ?></div>
												</div>
											</div>
											<div class="col-md-12 col-xs-12 col-sm-12 col-lg-12 col-12">
												<div class="row aiz">
													<div class="bordewhite colcon col-md-4 col-xs-4 col-sm-4 col-lg-4 col-4" style="font-weight: bold;">
														Fecha de Entrega
													</div>
													<div class="col-md-8 col-xs-8 col-sm-8 col-lg-8 col-8">
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
												<div class="bordewhite colcon col-md-12 col-xs-12 col-sm-12 col-lg-12 col-12" style="text-align: center; font-weight: bold;">
													Retroalimentación
												</div>
												<div class="col-md-12 col-xs-12 col-sm-12 col-lg-12 col-12">
													<div class="row aiz">
														<div class="bordewhite colcon col-md-4 col-xs-4 col-sm-4 col-lg-4 col-4" style="font-weight: bold;">
															Nombre y Firma del Docente
														</div>
														<div class="col-md-8 col-xs-8 col-sm-8 col-lg-8 col-8" style="border-bottom:1px; border-color: black; border-bottom-style: solid;">
															<?php echo $NomDocente; ?>
														</div>
													</div>
												</div>
												<div class="col-md-12 col-xs-12 col-sm-12 col-lg-12 col-12">
													<div class="row aiz">
														<div class="bordewhite colcon col-md-4 col-xs-4 col-sm-4 col-lg-4 col-4" style="font-weight: bold;">
															Nombre y Firma del Estudiante
														</div>
														<div class="col-md-8 col-xs-8 col-sm-8 col-lg-8 col-8" style="border-bottom:1px; border-color: black; border-bottom-style: solid;">
															<?php echo $NomEstudiantes; ?>
														</div>
													</div>
												</div>
												<div class="col-md-12 col-xs-12 col-sm-12 col-lg-12 col-12">
													<div class="row aiz">
														<div class="bordewhite colcon col-md-4 col-xs-4 col-sm-4 col-lg-4 col-4" style="font-weight: bold;">
															Fecha de Entrega
														</div>
														<div class="col-md-8 col-xs-8 col-sm-8 col-lg-8 col-8">
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

			var nombrePDF = '<?php echo 'GUIA DE OBERVACIÓN_' . $Evidencia . '_' . $mat . '_Tema-' . (isset($_POST['tem']) ? $_POST['tem'] : '') . '_' . ($per) . '_' . $ClaveGrupo . '.pdf'  ?>';
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