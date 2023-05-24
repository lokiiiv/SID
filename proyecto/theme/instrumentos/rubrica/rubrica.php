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
$Ctema = isset($_POST["CTema"]) ? $_POST["CTema"] : "";
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
$PE = $_POST["PE"];
$te = $_POST["te"];
$por = $_POST["por"]; //porcenjaje 30 de 100
$mat = $_POST["mat"]; //materia nombre
$gru = $_POST["gru"]; //grupo
$tem = $_POST["tem"];
$CoT = isset($_POST["CoT"]) ? $_POST["CoT"] : "";
$CS = $_POST["CS"];
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
//ss$Materia=$mat;
$Instrumento = $ins;
$ProgEducativo = $PE;
$Semestre = $CS;
$NomDocente = $nomdoc;
$ClaveGrupo = $gru;
$NomEstudiantes = ""; //Kenny Arriaga Hernandez - Jose Artemio Gonzalez Fernandez";
$FechaAplicacion = $fa;
$TiempoEvaluacion = $te;
$Tema = $Ctema;
$Evidencia = $evi;
$Competencia = $CoT; //"Conoce la evolución, arquitectura, tecnologías y planificación de las aplicaciones Web para la preparación de un ambiente de desarrollo.";

$ItemUno = "1. servidores web";
$NumItemUno = "(9 puntos)";
$Punto1Item1 = "Identifica de manera clara al menos cinco características de servidores web como WAMP, XAMPP, LAMP, MEAN.";
$Num1Item1 = "(9 puntos)";
$Punto2Item1 = "Identifica de manera clara al menos cuatro características de servidores web como WAMP, XAMPP, LAMP, MEAN.";
$Num2Item1 = "(6 puntos)";
$Punto3Item1 = "Identifica de manera clara al menos tres características de servidores web como WAMP, XAMPP, LAMP, MEAN.";
$Num3Item1 = "(3 puntos)";
$Punto4Item1 = "Identifica de manera clara al menos dos características de servidores web como WAMP, XAMPP, LAMP, MEAN.";
$Num4Item1 = "(1 puntos)";
$Punto5Item1 = "Identifica de manera clara al menos cero o una características de servidores web como WAMP, XAMPP, LAMP, MEAN.";
$Num5Item1 = "(0 puntos)";
$IndItem1 = "M";
$Punto1 = "9";

$ItemDos = "2. compiladores e intérpretes";
$NumItemDos = "(9 puntos)";
$Punto1Item2 = "Describe de manera clara al menos cinco características de los intérpretes y compiladores orientados a web: como: asp, php, jsp, html, javascript.";
$Num1Item2 = "(9 puntos)";
$Punto2Item2 = "Enumera de manera clara al menos cuatro características de los intérpretes y compiladores orientados a web: como: asp, php, jsp, html, javascript.";
$Num2Item2 = "(6 puntos)";
$Punto3Item2 = "Enumera de manera clara al menos tres características de los intérpretes y compiladores orientados a web: como: asp, php, jsp, html, javascript.";
$Num3Item2 = "(3 puntos)";
$Punto4Item2 = "Enumera de manera clara al menos dos características de los intérpretes y compiladores orientados a web: como: asp, php, jsp, html, javascript.";
$Num4Item2 = "(1 puntos)";
$Punto5Item2 = "Enumera de manera clara entre cero y una características de los intérpretes y compiladores orientados a web: como: asp, php, jsp, html, javascript.";
$Num5Item2 = "(0 puntos)";
$IndItem2 = "M";
$Punto2 = "9";

$ItemTres = "3. base de datos";
$NumItemTres = "(10 puntos)";
$Punto1Item3 = "Registra al menos cinco características de los manejadores de bases de datos libre como: MySQL, María DB y PosgreSQL.";
$Num1Item3 = "(10 puntos)";
$Punto2Item3 = "Registra al menos cuatro características de los manejadores de bases de datos libre como: MySQL, María DB y PosgreSQL.";
$Num2Item3 = "(7 puntos)";
$Punto3Item3 = "Registra al menos tres características de los manejadores de bases de datos libre como: MySQL, María DB y PosgreSQL.";
$Num3Item3 = "(4 puntos)";
$Punto4Item3 = "Registra al menos dos características de los manejadores de bases de datos libre como: MySQL, María DB y PosgreSQL.";
$Num4Item3 = "(1 puntos)";
$Punto5Item3 = "Registra entre cero o una características de los manejadores de bases de datos libre como: MySQL, María DB y PosgreSQL.";
$Num5Item3 = "(0 puntos)";
$IndItem3 = "M";
$Punto3 = "10";

$ItemCuatro = "4. Desempeño";
$NumItemCuatro = "(4 puntos)";
$Punto1Item4 = "Trabaja en equipo, incluye los siguientes datos: nombre de la institución, nombre de la materia, nombre del docente y nombde de los integrantes de equipo.";
$Num1Item4 = "(4 puntos)";
$Punto2Item4 = "Trabaja en equipo, incluye 3 de los siguientes datos: nombre de la institución, nombre de la materia, nombre del docente y nombde de los integrantes de equipo.";
$Num2Item4 = "(3 puntos)";
$Punto3Item4 = "Trabaja en equipo, incluye 2 de los siguientes datos: nombre de la institución, nombre de la materia, nombre del docente y nombde de los integrantes de equipo.";
$Num3Item4 = "(2 puntos)";
$Punto4Item4 = "Trabaja en equipo, incluye 1 de los siguientes datos: nombre de la institución, nombre de la materia, nombre del docente y nombde de los integrantes de equipo.";
$Num4Item4 = "(1 puntos)";
$Punto5Item4 = "No trabajo en equipo, incluyó o no sus datos.";
$Num5Item4 = "(0 puntos)";
$IndItem4 = "A";
$Punto4 = "4";

$ItemCinco = "5. procedimientos no vistos en clase";
$NumItemCinco = "(4 puntos)";
$Punto1Item5 = "Elige xampp o wamp para trabajar en el semestre e indica fuera de la tabla al menos cuatro razones del servidor a utilizar.";
$Num1Item5 = "(4 puntos)";
$Punto2Item5 = "Elige xampp o wamp para trabajar en el semestre e indica fuera de la tabla tres razones del servidor a utilizar.";
$Num2Item5 = "(3 puntos)";
$Punto3Item5 = "Elige xampp o wamp para trabajar en el semestre e indica fuera de la tabla dos razones del servidor a utilizar.";
$Num3Item5 = "(2 puntos)";
$Punto4Item5 = "Elige xampp o wamp para trabajar en el semestre e indica fuera de la tabla una razón del servidor a utilizar.";
$Num4Item5 = "(1 puntos)";
$Punto5Item5 = "Elige xampp o wamp para trabajar en el semestre pero no indica fuera de la tabla las razones por el cual se elige.";
$Num5Item5 = "(0 puntos)";
$IndItem5 = "C";
$Punto5 = "4";

$IteamSeis = "6. Incorpora conocimientos y actividades interdiciplicarias en su aprendizaje";
$NumItemSeis = "(4 puntos)";
$Punto1Item6 = "Incluye fuera de la tabla comparatia conocimientos de las asignaturas de base de datos para enriquecer el trabajo al incluir un ejemplo de consulta de las cuatro acciones siguientes: consultar, modificar, guardar y borrar.";
$Num1Item6 = "(4 puntos)";
$Punto2Item6 = "Incluye fuera de la tabla comparatia conocimientos de las asignaturas de base de datos para enriquecer el trabajo al incluir un ejemplo de consulta de tres de las cuatro acciones siguientes: consultar, modificar, guardar y borrar.";
$Num2Item6 = "(3 puntos)";
$Punto3Item6 = "Incluye fuera de la tabla comparatia conocimientos de las asignaturas de base de datos para enriquecer el trabajo al incluir un ejemplo de consulta de dos de las cuatro acciones siguientes: consultar, modificar, guardar y borrar.";
$Num3Item6 = "(2 puntos)";
$Punto4Item6 = "Incluye fuera de la tabla comparatia conocimientos de las asignaturas de base de datos para enriquecer el trabajo al incluir un ejemplo de consulta de una de las cuatro acciones siguientes: consultar, modificar, guardar y borrar.";
$Num4Item6 = "(1 puntos)";
$Punto5Item6 = "No incluye fuera de la tabla comparativa conociminetos de las asignaturas de base de datos para enriquecer el trabajo.";
$Num5Item6 = "(0 puntos)";
$IndItem6 = "E";
$Punto6 = "4";

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
$MarcaMetodoC = $CTTDNL;
$MarcaMetodoA = $CTTDNL;


$FechaEntrega = "";
$FechaRetroalimentacion = "";
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

		.table {
			display: block;
			column-span: all;
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

		.centro {
			display: flex;
			justify-content: center;
			align-items: center;
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
					<div class="box col-md-2 col-xs-2 col-sm-2 col-lg-2 col-2 d-flex justify-content-center align-items-center">
						<img src="img/logoitesa.png" alt="">
					</div>
					<div class="col-md-10 col-xs-10 col-sm-10 col-lg-10 col-10">
						<div class="row">
							<div class="col-md-12 col-xs-12 col-sm-12 col-lg-12 d-flex coltit justify-content-center align-items-center" style="text-align: center; font-size: 16px;">
								<?php echo $Materia; ?>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12 col-xs-12 col-sm-12 col-lg-12 colwhitef justify-content-center align-items-center" style="text-align: center; font-size: 16px;">
								<?php echo $Instrumento; ?>
							</div>
						</div>
					</div>
				</div>

				<!--Segundo enabezado -->
				<div class="row aiz" style="display: flex;">
					<!–– linea 1 ––>
						<div class="col-md-3 col-xs-3 col-sm-3 col-lg-3 col-3 coltit bordewhite d-flex justify-content-start align-items-center">
							Programa Educativo
						</div>
						<div class="col-md-3 col-xs-3 col-sm-3 col-lg-3 col-3 colcon bordewhite d-flex justify-content-center align-items-center" style="text-align: center;">
							<?php echo $ProgEducativo; ?>
						</div>
						<div class="col-md-2 col-xs-2 col-sm-2 col-lg-2 col-2 coltit bordewhite d-flex justify-content-start align-items-center">
							Semestre:
						</div>
						<div class="col-md-4 col-xs-4 col-sm-4 col-lg-4 col-4 colcon bordewhite d-flex justify-content-center align-items-center">
							<?php echo $Semestre; ?>
						</div>
				</div>
				<div class="row aiz" style="display: flex;">
					<!–– linea 2 ––>
						<div class=" col-md-3 col-xs-3 col-sm-3 col-lg-3 col-3 coltit bordewhite d-flex justify-content-start align-items-center">
							Nombre del docente:
						</div>
						<div class="col-md-5 col-xs-5 col-sm-5 col-lg-5 col-5 colcon bordewhite d-flex justify-content-center align-items-center">
							<?php echo $NomDocente; ?>
						</div>
						<div class="col-md-2 col-xs-2 col-sm-2 col-lg-2 col-2 coltit bordewhite d-flex justify-content-start align-items-center">
							Clave de Grupo:
						</div>
						<div class="col-md-2 col-xs-2 col-sm-2 col-lg-2 col-2 colcon bordewhite d-flex justify-content-center align-items-center">
							<?php echo $ClaveGrupo; ?>
						</div>
				</div>
				<div class="row aiz" style="display: flex;">
					<!–– linea 3 ––>
						<div class="col-md-3 col-xs-3 col-sm-3 col-lg-3 col-3 coltit bordewhite d-flex justify-content-start align-items-center">
							Nombre del estudiante (s):
						</div>
						<div class="col-md-9 col-xs-9 col-sm1-9 col-lg-9 col-9 colcon bordewhite d-flex justify-content-center align-items-center">
							<?php echo $NomEstudiantes; ?>
						</div>
				</div>
				<div class="row aiz" style="display: flex;">
					<!–– linea 4 ––>
						<div class="box col-md-3 col-xs-3 col-sm-3 col-lg-3 col-3 coltit bordewhite d-flex justify-content-start align-items-center">
							Tema/Subtema:
						</div>
						<div class="col-md-3 col-xs-3 col-sm-3 col-lg-3 col-3 colcon bordewhite d-flex justify-content-center align-items-center">
							<?php echo $Tema; ?>
						</div>
						<div class="box col-md-2 col-xs-2 col-sm-2 col-lg-2 col-2 coltit bordewhite d-flex justify-content-start align-items-center">
							Fecha de aplicación:
						</div>
						<div class="col-md-1 col-xs-1 col-sm-1 col-lg-1 col-1 colcon bordewhite d-flex justify-content-center align-items-center">
							<?php echo $FechaAplicacion; ?>
						</div>
						<div class="col-md-2 col-xs-2 col-sm-2 col-lg-2 col-2 coltit bordewhite d-flex justify-content-start align-items-center">
							Tiempo de evaluación:
						</div>
						<div class="col-md-1 col-xs-1 col-sm-1 col-lg-1 col-1 colcon bordewhite d-flex justify-content-center align-items-center">
							<?php echo $TiempoEvaluacion; ?>
						</div>
				</div>
				<div class="row aiz" style="display: flex;">
					<!–– linea 7 ––>
						<div class="col-md-3 col-xs-3 col-sm-3 col-lg-3 col-3 coltit bordewhite d-flex justify-content-start align-items-center">
							Evidencia:
						</div>
						<div class="col-md-9 col-xs-9 col-sm-9 col-lg-9 col-9 colcon bordewhite d-flex justify-content-center align-items-center" style="text-align: center">
							<?php echo $Evidencia; ?>
						</div>
				</div>
				<div class="row aiz" style="display: flex;">
					<!–– linea 6 ––>
						<div class="col-md-3 col-xs-3 col-sm-3 col-lg-3 col-3 coltit bordewhite d-flex justify-content-start align-items-center">
							Competencia
						</div>
						<div class="col-md-9 col-xs-9 col-sm-9 col-lg-9 col-9 colcon bordewhite d-flex justify-content-center align-items-center">
							<?php echo $Competencia; ?>
						</div>
				</div>
				<!-- Tercer encabezado-->
				<div class="row" style="display: flex;">
					<div class="col-md-2 col-xs-2 col-sm-2 col-lg-2 col-2">
						Instrucciones:
					</div>
					<div class="col-md-10 col-xs-10 col-sm-10 col-lg-10 col-10 bordewhite">
						<div class="row aiz">
							<div class=" col-md-12 col-xs-12 col-sm-12 col-lg-12 col-12 colcon">
								1.- El docente llenará la rúbrica en función del desempeño mostrado por el (los) estudiante (es).
							</div>
							<div class=" col-md-12 col-xs-12 col-sm-12 col-lg-12 col-12 colcon">
								2.- Se marca el puntaje obtenido que corresponda con el desempeño dentro de "puntos", emitiendo las observaciones y retroalimentación que considere necesarias.
							</div>
							<div class="col-md-12 col-xs-12 col-sm-12 col-lg-12 col-12 colcon">
								3.- El puntaje máximo de la evaluación es de <?php echo $por; ?> puntos.
							</div>
							<div class=" col-md-12 col-xs-12 col-sm-12 col-lg-12 col-12 colcon">
								4.- Para que el estudiante sea evaluado en los indicadores <?php echo $cadeindi; ?> deberá cumplir con los indicadores marcados con M (mínimos).
							</div>
							<div class=" col-md-12 col-xs-12 col-sm-12 col-lg-12 col-12 colcon">
								5.- Deberá colocar el puntaje de cada ítem y realizar la sumatoria.
							</div>
						</div>
					</div>
				</div>

				<!-- Cuarto encabezado-->
				<div class="row bordewhite mt-2" style="display: flex;">
					<div class="col-md-10 col-xs-10 col-sm-10 col-lg-10 col-10 col-10">
						<div class="row" style="display: flex;">
							<div class="col-fluid" style="width: 88%;">
								<div class="col">
									<div class="row aiz" style="display: flex;">
										<div class=" col-md-2 col-xs-2 col-sm-2 col-lg-2 col-2 coltit bordewhite d-flex justify-content-center align-items-center" style="text-align: center">
											ASPECTO A EVALUAR
										</div>
										<div class=" col-md-2 col-xs-2 col-sm-2 col-lg-2 col-2 coltit bordewhite d-flex justify-content-center align-items-center" style="text-align: center">
											EXCELENTE
										</div>
										<div class=" col-md-2 col-xs-2 col-sm-2 col-lg-2 col-2 coltit bordewhite d-flex justify-content-center align-items-center" style="text-align: center">
											NOTABLE
										</div>
										<div class=" col-md-2 col-xs-2 col-sm-2 col-lg-2 col-2 coltit bordewhite d-flex justify-content-center align-items-center" style="text-align: center">
											BUENO
										</div>
										<div class=" col-md-2 col-xs-2 col-sm-2 col-lg-2 col-2 coltit bordewhite d-flex justify-content-center align-items-center" style="text-align: center">
											SUFICIENTE
										</div>
										<div class=" col-md-2 col-xs-2 col-sm-2 col-lg-2 col-2 coltit bordewhite d-flex justify-content-center align-items-center" style="text-align: center">
											INSUFICIENTE
										</div>
									</div>
									<!--Indicador 1-->
								</div>
							</div>
							<div class="col-fluid coltit bordewhite d-flex justify-content-center align-items-center" style="text-align: center; width: 5%">
								IND
							</div>
							<div class=" col-fluid coltit bordewhite d-flex justify-content-center align-items-center" style="text-align: center; width: 7%">
								PUNTOS
							</div>
						</div>
					</div>
					<div class=" col-md-2 col-xs-2 col-sm-2 col-lg-2 col-2 coltit bordewhite d-flex justify-content-center align-items-center" style="text-align: center">
						RETROALIMENTACIÓN
					</div>
				</div>
				<!–– Quinto encabezado (ITEMS)––>
					<div class="row bordewhite" style="display: flex;">
						<div class="col-md-10 col-xs-10 col-sm-10 col-lg-10 col-10">
							<!--Item 1-->


							<?php
							for ($i = 2; $i < count($general); $i++) {
								$v = $general[$i];
								$cate = $v[0];
								$indi = $v[1];
								//echo $indi;
								$v2 = $v[2];
								$cont = 0;
								for ($j = 0; $j < count($v2); $j++) {
									$v3 = $v2[$j];
									$ii[$cont] = $v3[0];
									$vi[$cont] = $v3[1];
									$cont++;
								}


							?>


								<div class="row" style="display: flex;">
									<div class="col-fluid" style="width: 88%;">
										<div class="col">
											<div class="row aiz" style="display: flex;">
												<div class=" col-md-2 col-xs-2 col-sm-2 col-lg-2 col-2 coltit bordewhite d-flex justify-content-center align-items-center" style="hyphens: auto; text-align: center;">
													<?php echo $cate; ?>
												</div>

												<div class="col-md-2 col-xs-2 col-sm-2 col-lg-2 col-2 colcon bordewhite p-1 d-flex justify-content-start align-items-center">
													<?php echo $ii[0]; ?>
												</div>
												<div class=" col-md-2 col-xs-2 col-sm-2 col-lg-2 col-2 colcon bordewhite p-1 d-flex justify-content-start align-items-center">
													<?php echo $ii[1]; ?>
												</div>
												<div class=" col-md-2 col-xs-2 col-sm-2 col-lg-2 col-2 colcon bordewhite p-1 d-flex justify-content-start align-items-center">
													<?php echo $ii[2]; ?>
												</div>
												<div class=" col-md-2 col-xs-2 col-sm-2 col-lg-2 col-2 colcon bordewhite p-1 d-flex justify-content-start align-items-center">
													<?php echo $ii[3]; ?>
												</div>
												<div class=" col-md-2 col-xs-2 col-sm-2 col-lg-2 col-2 colcon bordewhite p-1 d-flex justify-content-start align-items-center">
													<?php echo $ii[4]; ?>
												</div>
											</div>
											<!--Puntos Item 1-->
											<div class="row aiz" style="display: flex; text-align: center;">
												<div class=" col-md-2 col-xs-2 col-sm-2 col-lg-2 col-2 coltit bordewhite d-flex justify-content-center align-items-center">
													<?php echo $vi[0]; ?> puntos
												</div>
												<div class=" col-md-2 col-xs-2 col-sm-2 col-lg-2 col-2 colcon bordewhite d-flex justify-content-center align-items-center">
													<?php echo $vi[0]; ?> puntos
												</div>
												<div class=" col-md-2 col-xs-2 col-sm-2 col-lg-2 col-2 colcon bordewhite d-flex justify-content-center align-items-center">
													<?php echo $vi[1]; ?> puntos
												</div>
												<div class=" col-md-2 col-xs-2 col-sm-2 col-lg-2 col-2 colcon bordewhite d-flex justify-content-center align-items-center">
													<?php echo $vi[2]; ?> puntos
												</div>
												<div class=" col-md-2 col-xs-2 col-sm-2 col-lg-2 col-2 colcon bordewhite d-flex justify-content-center align-items-center">
													<?php echo $vi[3]; ?> puntos
												</div>
												<div class=" col-md-2 col-xs-2 col-sm-2 col-lg-2 col-2 colcon bordewhite d-flex justify-content-center align-items-center">
													<?php echo $vi[4]; ?> puntos
												</div>
											</div>
										</div>
									</div>


									<div class="col-fluid colcon bordewhite centro" style="text-align: center; width: 5%;">
										<?php echo $indi; ?>
									</div>
									<div class=" col-fluid bordeblack centro" style="text-align: center; width: 7%;">

									</div>

								</div>

							<?php } ?>




						</div>
						<div class=" col-md-2 col-xs-2 col-sm-2 col-lg-2 col-2 bordeblack d-flex justify-content-center align-items-center" style="text-align: center">
							<?php echo $Retroalimentación; ?>
						</div>
					</div>
					<!–– Sexto encabezado––>
						<div class="row" style="display: flex;">
							<div class="col-md-10 col-xs-10 col-sm-10 col-lg-10 col-10">
								<div class="row">
									<div class="col-fluid" style="width: 88%;">
										<div class="col">
											<div class="row aiz" style="display: flex;">
												<div class=" col-md-2 col-xs-2 col-sm-2 col-lg-2 col-2 coltit bordewhite d-flex justify-content-center align-items-center" style="text-align: center">
													PUNTAJE MÁXIMO
												</div>
												<div class=" col-md-10 col-xs-10 col-sm-10 col-lg-10 col-10 colcon bordewhite centro" style="text-align: center;">
													<?php echo $por; ?>
												</div>
											</div>
											<!--Indicador 1-->
										</div>
									</div>
									<div class="col-fluid coltit bordewhite d-flex justify-content-center align-items-center" style="text-align: center; width: 12%">
										PUNTAJE OBTENIDO
									</div>
								</div>
							</div>
							<div class=" col-md-2 col-xs-2 col-sm-2 col-lg-2 col-2 colcon bordewhite centro" style="text-align: center">
								<?php echo $PuntosObtenidos; ?>
							</div>
						</div></br>

						<!-- Septimo encabezado-->
						<div class=" bordeblack row aiz" style="display: flex;">
							<div class="colcon bordewhite  col-md-2 col-xs-2 col-sm-2 col-lg-2 col-2 d-flex justify-content-center align-items-center" style="text-align: center; font-weight: bold;">
								Evidencia de Aprendizaje
							</div>
							<div class="colcon bordewhite  col-md-1 col-xs-1 col-sm-1 col-lg-1 col-1 d-flex justify-content-center align-items-center" style="text-align: center; font-weight: bold;">
								%
							</div>
							<div class="col-md-9col-xs-9 col-sm-9 col-lg-9 col-9" style="display:grid;">
								<div class="row" style="display: flex;">
									<div class=" colcon bordewhite col-md-6 col-xs-6 col-sm-6 col-lg-6 col-6 d-flex justify-content-center align-items-center" style="text-align: center; font-weight: bold;">
										Indicadores de Alcance
									</div>
									<div class="colcon bordewhite col-md-6 col-xs-6 col-sm-6 col-lg-6 col-6 d-flex justify-content-center align-items-center" style="text-align: center; font-weight: bold;">
										Método de Evaluación
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

						<div class="row aiz" style="display: flex;">
							<div class="bordeblack  col-md-2 col-xs-2 col-sm-2 col-lg-2 col-2 d-flex justify-content-center align-items-center" style="text-align: center">
								<?php echo $Evidencia; ?>
							</div>
							<div class="bordeblack  col-md-1 col-xs-1 col-sm-1 col-lg-1 col-1 d-flex justify-content-center align-items-center" style="text-align: center">
								<?php echo $Porcentaje; ?>
							</div>
							<div class="col-md-9col-xs-9 col-sm-9 col-lg-9 col-9" style="display:grid;">
								<div class="row" style="display: flex;">
									<div class="col-md-1 col-xs-1 col-sm-1 col-lg-1 col-1 bordeblack d-flex justify-content-center align-items-center" style="text-align: center">
										<?php echo $PuntosIndA; ?>
									</div>
									<div class="col-md-1 col-xs-1 col-sm-1 col-lg-1 col-1 bordeblack d-flex justify-content-center align-items-center" style="text-align: center">
										<?php echo $PuntosIndB; ?>
									</div>
									<div class="col-md-1 col-xs-1 col-sm-1 col-lg-1 col-1 bordeblack d-flex justify-content-center align-items-center" style="text-align: center">
										<?php echo $PuntosIndC; ?>
									</div>
									<div class="col-md-1 col-xs-1 col-sm-1 col-lg-1 col-1 bordeblack d-flex justify-content-center align-items-center" style="text-align: center">
										<?php echo $PuntosIndD; ?>
									</div>
									<div class="col-md-1 col-xs-1 col-sm-1 col-lg-1 col-1 bordeblack d-flex justify-content-center align-items-center" style="text-align: center">
										<?php echo $PuntosIndE; ?>
									</div>
									<div class="col-md-1 col-xs-1 col-sm-1 col-lg-1 col-1 bordeblack d-flex justify-content-center align-items-center" style="text-align: center">
										<?php echo $PuntosIndF; ?>
									</div>
									<div class="col-md-3 col-xs-3 col-sm-3 col-lg-3 col-3 bordeblack d-flex justify-content-center align-items-center" style="text-align: center">
										<?php echo $Instrumento; ?>
									</div>
									<div class="col-md-1 col-xs-1 col-sm-1 col-lg-1 col-1 bordeblack d-flex justify-content-center align-items-center" style="text-align: center">
										<?php echo $MarcaMetodoP; ?>
									</div>
									<div class="col-md-1 col-xs-1 col-sm-1 col-lg-1 col-1 bordeblack d-flex justify-content-center align-items-center" style="text-align: center">
										<?php echo $MarcaMetodoC; ?>
									</div>
									<div class="col-md-1 col-xs-1 col-sm-1 col-lg-1 col-1 bordeblack d-flex justify-content-center align-items-center" style="text-align: center">
										<?php echo $MarcaMetodoA; ?>
									</div>
								</div>
							</div>
						</div></br>
						<!–– Sexto encabezado ––>
							<div class="row bordeblack">
								<div class="bordewhite colcon col-md-12 col-xs-12 col-sm-12 col-lg-12 col-12 d-flex justify-content-center align-items-center" style="text-align: center; font-weight: bold;">
									Entrega Instrumento
								</div>
								<div class="col-md-12 col-xs-12 col-sm-12 col-lg-12 col-12">
									<div class="row aiz" style="display: flex;">
										<div class="bordewhite colcon col-md-4 col-xs-4 col-sm-4 col-lg-4 col-4 d-flex justify-content-start align-items-center" style="font-weight: bold;">
											Nombre y Firma del Docente
										</div>
										<div class="col-md-8 col-xs-8 col-sm-8 col-lg-8 col-8 d-flex justify-content-start align-items-center" style="border-bottom:1px; border-color: black; border-bottom-style: solid;">
											<?php echo $NomDocente; ?>
										</div>
									</div>
								</div>
								<div class="col-md-12 col-xs-12 col-sm-12 col-lg-12 col-12">
									<div class="row aiz" style="display: flex;">
										<div class="bordewhite colcon col-md-4 col-xs-4 col-sm-4 col-lg-4 col-4 d-flex justify-content-start align-items-center" style="font-weight: bold;">
											Nombre y Firma del Estudiante
										</div>
										<div class="col-md-8 col-xs-8 col-sm-8 col-lg-8 col-8 d-flex justify-content-start align-items-center" style="border-bottom:1px; border-color: black; border-bottom-style: solid;">
											<?php echo $NomEstudiantes; ?>
										</div>
									</div>
								</div>
								<div class="col-md-12 col-xs-12 col-sm-12 col-lg-12 col-12">
									<div class="row aiz" style="display: flex;">
										<div class="bordewhite colcon col-md-4 col-xs-4 col-sm-4 col-lg-4 col-4 d-flex justify-content-start align-items-center" style="font-weight: bold;">
											Fecha de Entrega
										</div>
										<div class="col-md-8 col-xs-8 col-sm-8 col-lg-8 col-8 d-flex justify-content-start align-items-center">
											<?php echo $FechaEntrega; ?>
										</div>
									</div>
								</div>
							</div></br>


							<!–– Septimo encabezado ––>
								<div class="row bordeblack">
									<div class="bordewhite colcon col-md-12 col-xs-12 col-sm-12 col-lg-12 col-12 d-flex justify-content-center align-items-center" style="text-align: center; font-weight: bold;">
										Retroalimentación
									</div>
									<div class="col-md-12 col-xs-12 col-sm-12 col-lg-12 col-12">
										<div class="row aiz" style="display: flex;">
											<div class="bordewhite colcon col-md-4 col-xs-4 col-sm-4 col-lg-4 col-4 d-flex justify-content-start align-items-center" style="font-weight: bold;">
												Nombre y Firma del Docente
											</div>
											<div class="col-md-8 col-xs-8 col-sm-8 col-lg-8 col-8 d-flex justify-content-start align-items-center" style="border-bottom:1px; border-color: black; border-bottom-style: solid;">
												<?php echo $NomDocente; ?>
											</div>
										</div>
									</div>
									<div class="col-md-12 col-xs-12 col-sm-12 col-lg-12 col-12">
										<div class="row aiz" style="display: flex;">
											<div class="bordewhite colcon col-md-4 col-xs-4 col-sm-4 col-4 col-lg-4 d-flex justify-content-start align-items-center" style="font-weight: bold;">
												Nombre y Firma del Estudiante
											</div>
											<div class="col-md-8 col-xs-8 col-sm-8 col-lg-8 col-8 d-flex justify-content-start align-items-center" style="border-bottom:1px; border-color: black; border-bottom-style: solid;">
												<?php echo $NomEstudiantes; ?>
											</div>
										</div>
									</div>
									<div class="col-md-12 col-xs-12 col-sm-12 col-lg-12 col-12">
										<div class="row aiz" style="display: flex;">
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

			var nombrePDF = '<?php echo 'RUBRICA_' . $Evidencia . '_' . $mat . '_Tema-' . (isset($_POST['tem']) ? $_POST['tem'] : '') . '_' . ($per) . '_' . $ClaveGrupo . '.pdf'  ?>';
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