<?php
require_once '../../valida.php';
require_once 'manejo-usuarios/UsuarioPrivilegiado.php';
$u = UsuarioPrivilegiado::getByCorreo($_SESSION["correo"]);
?>

<!DOCTYPE HTML>
<html lang="es">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">

	<!-- Title here -->
	<title>Instrumentaciones Didácticas</title>
	<!-- Description, Keywords and Author -->
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- Styles -->
	<!-- Bootstrap CSS -->
	<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<!-- Alertify JS -->
	<link rel="stylesheet" href="alertify/css/alertify.min.css">
	<link rel="stylesheet" href="alertify/css/themes/bootstrap.min.css">
	<link href="css/style_2.css" rel="stylesheet">
	<!-- Estiles generales personalizados -->
	<link rel="stylesheet" href="css/general_styles.css">
	<!-- Favicon -->
	<link rel="shortcut icon" href="img/favicon/favicon.png">
	<link href="css/blue.css" rel="stylesheet">

	<!-- Font awesome CSS -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />

	<style>
		#modal-instrumento .modal-dialog, #modal-evidencia .modal-dialog {
			position: relative;
			display: table;
			overflow: auto;
			width: auto;
			min-width: 300px;
		}
		#modal-instrumento .modal-body, #modal-evidencia .modal-body { /* Restrict Modal width to 90% */
			overflow-x: auto !important;
			max-width: 90vw !important;
		}
	</style>

</head>

<body>
	<?php
	include("BarraMenu.php");
	?>

	<div class="content">
		<div class="container">
			<div class="list-group mt-4">

			</div>
		</div>

		<!-- Modal para mostrar la instrumentacion de cada tema seleccionado -->
		<div class="modal fade" tabindex="-1" role="dialog" id="modal-instrumento">
			<div class="modal-dialog modal-lg" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title"></h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<div id="contenedor-instrumento"></div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
					</div>
				</div>
			</div>
		</div>

		<!-- Modal para mostrar un instrumento de una de las 3 evidencias de aprendizaje por tema -->
		<div class="modal fade" tabindex="-1" role="dialog" id="modal-evidencia">
			<div class="modal-dialog modal-lg" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title"></h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<div id="contenedor-evidencia"></div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
					</div>
				</div>
			</div>
		</div>
	</div>
	<br>

	<?php
	require 'footer.php';
	?>

	<!-- Javascript files -->
	<!-- jQuery -->
	<script src="bootstrap/js/jquery.js"></script>
	<!-- Bootstrap JS -->
	<script src="bootstrap/js/bootstrap.bundle.min.js"></script>
	<!-- Respond JS for IE8 -->
	<script src="js/respond.min.js"></script>
	<!-- HTML5 Support for IE -->
	<script src="js/html5shiv.js"></script>
	<!-- Custom JS -->
	<script src="js/custom.js"></script>
	<script src="alertify/alertify.min.js"></script>

	<script src="js/jquery.validate.min.js"></script>
	<script>
		$('#modal-instrumento').on('show.bs.modal', function() {
			$(".modal-body").css("padding",'0px');
		});
		$('#modal-instrumento').on('hidden.bs.modal', function() {
			$(".modal-body").removeAttr('style');
		});
		$('#modal-evidencia').on('show.bs.modal', function() {
			$(".modal-body").css("padding",'0px');
		});
		$('#modal-evidencia').on('hidden.bs.modal', function() {
			$(".modal-body").removeAttr('style');
		});

		var periodo = "";
		$(document).ready(function() {
			iniciar();
		});

		function iniciar() {
			$("#contenedor").html();
			//Obtener cual es el periodo actual conforme a la fecha actual

			var mesActual = new Date().getMonth();
			var añoActual = new Date().getFullYear();
			if (mesActual >= 0 && mesActual <= 5) {
				periodo = "ENERO-JUNIO-" + añoActual;
			} else if (mesActual >= 6 && mesActual <= 11) {
				periodo = "JULIO-DICIEMBRE-" + añoActual;
			}

			//Primero, obtener que grupos academico esta a cargo el presidente de academica actual
			$.ajax({
				data: {
					"accion": "obtenerProgramasPorJefeDivision",
					"idUsuario": "<?php echo $_SESSION["idUsuario"]; ?>"
				},
				url: "conexion/consultasSQL.php",
				method: "post",
				success: function(response) {
					var res = JSON.parse(response);
					if(res.success) {
						var programasEducativos = res.data;
						if(programasEducativos.length > 0) {
							var programas = Object.keys(programasEducativos).map(k => programasEducativos[k].letra);
							mostrarInstrumentaciones(programas);
						} else {
							alertify.warning('<h3>No tienes programas educativos asignados.<h3>');
						}
					} else {

					}
				}
			}).fail(function(jqXHR, textStatus, errorThrown) {
				if (jqXHR.status === 0) {
					alert('No conectado, verifique su red.');
				} else if (jqXHR.status == 404) {
					alert('Pagina no encontrada [404]');
				} else if (jqXHR.status == 500) {
					alert('Internal Server Error [500].');
				} else if (textStatus === 'parsererror') {
					alert('Falló la respuesta.');
				} else if (textStatus === 'timeout') {
					alert('Se acabó el tiempo de espera.');
				} else if (textStatus === 'abort') {
					alert('Conexión abortada.');
				} else {
					alert('Error: ' + jqXHR.responseText);
				}
			});
		}

		function mostrarInstrumentaciones(programasEducativos) {
			$.ajax({
				url: "conexion/consultasNoSQL.php",
				method: "post",
				data: {
					'accion': 'obtenerInstrumentacionesPorJefeDivision',
					'periodo': periodo,
					'carrerasLista': programasEducativos
				},
				success: function(response) {
					var res = JSON.parse(response);
					if(res.success) {
						var instrumentaciones = res.data;
						//Generar la vista con la lista de instrumentaciones que puede ver el jefe de division
						var htmlListaContenido = '';

						var hasInstru = instrumentaciones.length != 0 ? true : false;

						if(hasInstru) {
							instrumentaciones.forEach(inst => {
								htmlListaContenido += 	'<div class="list-group-item list-group-item-action flex-column align-items-start item-instrumentacion">' + 
															'<div class="row">' +
																'<div class="col-lg-10 informacion">' + 
																	'<h5 class="nombre-asignatura">' + (inst.instrumentaciones.v.Materia != undefined ? inst.instrumentaciones.v.Materia : '') + '</h5>' + 
																	'<h6 class="clave-asignatura" data-clave="' + (inst.instrumentaciones.k != undefined ? inst.instrumentaciones.k : '') + '">Clave de asignatura: ' + (inst.instrumentaciones.k != undefined ? inst.instrumentaciones.k : '') + '</h6>' +
																	'<h6>Número de temas: ' + (inst.instrumentaciones.v.totalTemas != undefined ? inst.instrumentaciones.v.totalTemas : '') + '</h6>' +
																	'<h6 class="programa-educativo" data-clave="' + (inst.instrumentaciones.v.TodasMaterias.PE != undefined ? inst.instrumentaciones.v.TodasMaterias.PE : '') + '">Programa educativo: ' + (inst.instrumentaciones.v.TodasMaterias.PE != undefined ? inst.instrumentaciones.v.TodasMaterias.PE : '') + '</h6>' +
																	'<h6>Los siguientes grupos comparten la presente instrumentación.</h6>' +
																	'<div class="row mb-2">';
								inst.instrumentaciones.v.TodasMaterias.Grupos.forEach(grupo => {
									htmlListaContenido += 				'<div class="col-md-4 col-sm-6 col-12 mb-1">' +
																			'<h6 style="font-size: 13px;" class="nombre-programa-edu"><span class="badge badge-pill badge-info font-weight-normal" style="font-size: 14px;" data-semestre="' + (inst.instrumentaciones.v.TodasMaterias.Semestre != undefined ? inst.instrumentaciones.v.TodasMaterias.Semestre : '') + '" data-grupo="' + (grupo.grupo != undefined ? grupo.grupo : '') + '">' + (grupo.grupo != undefined ? grupo.grupo : '') + '</span></h6>' +	
																			'<h6 style="font-size: 12px;" class="nombre-docente" data-nombre-docente="' + (grupo.nombre != undefined ? grupo.nombre : '') + '" data-correo-docente="' + (grupo.correo != undefined ? grupo.correo : '') + '">Docente: ' + (grupo.nombre != undefined ? grupo.nombre : '') + '</h6>' +	
																		'</div>';	
								});										
								htmlListaContenido +=				'</div>' +
																	'<div class="row">' +
																		'<div class="col">';
								if(inst.instrumentaciones.v.Temas != undefined && inst.instrumentaciones.v.Temas != null) {
									inst.instrumentaciones.v.Temas.forEach(tema => {
										htmlListaContenido += 				'<div class="btn-group m-1">' +
																				'<button type="button" class="btn btn-info btn-sm abrirInstruTema" data-tema="' + tema.Tema + '">Tema ' + tema.Tema + '</button>' +
																				'<button type="button" class="btn btn-sm btn-info dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">' +
																					'<span class="sr-only">Toggle Dropdown</span>' +
																				'</button>';
										if(tema.Matriz != undefined && tema.Matriz != null) {
											htmlListaContenido +=				'<div class="dropdown-menu">';
											tema.Matriz.forEach(tem => {
												htmlListaContenido +=				'<a class="dropdown-item abrirEvidencia" href="#" data-evidencia="' + tem[12] + '">' + tem[0] + '</a>';
											});
										} else {
											htmlListaContenido += 			'<div class="dropdown-menu">' +
																					'<a class="dropdown-item" href="#">¡No se generaron evidencias!</a>';
										}
										htmlListaContenido += 				'</div>' + 
																			'</div>';
									});
								} else {
									htmlListaContenido += '<h6>¡No se llenaron temas en la instrumentación!</h6>';
								}										
								htmlListaContenido +=					'</div>' +
																	'</div>' +
																'</div>' +
																'<div class="col-lg-2 d-flex justify-content-lg-center align-items-lg-center justify-content-md-start align-items-md-center justify-content-start align-items-center mt-sm-3 mt-md-2 mt-3 mt-lg-0 acciones">' + 
																'</div>' +
															'</div>' + 
														'</div>';
							});
						} else {
							htmlListaContenido += '<div class="list-group-item list-group-item-action flex-column align-items-start">' +
														'<h5>Aún no se envían instrumentaciones.</h5>' +
													'</div>';
						}

						$(".list-group").html(htmlListaContenido);
					} else {
						alertify.warning('<h3>Un un problema al obtener la información, intente nuevamente.</h3>')
					}
				}
			});
		}

		$(document).on('click', '.abrirInstruTema', function() {
			var claveAsignatura = $(this).closest('.item-instrumentacion').find('.clave-asignatura').attr('data-clave');
			var tema = $(this).attr('data-tema');
			var grupoEjemplo = $(this).closest('.item-instrumentacion').find('span').first().attr('data-grupo');
			var asignatura = $(this).closest('.item-instrumentacion').find('.nombre-asignatura').text();
			var nombreDocenteEjemplo = $(this).closest('.item-instrumentacion').find('.nombre-docente').first().attr('data-nombre-docente');
			var correoDocenteEjemplo = $(this).closest('.item-instrumentacion').find('.nombre-docente').first().attr('data-correo-docente');
			
			if(claveAsignatura != undefined && tema != undefined && grupoEjemplo != undefined && periodo != undefined && nombreDocenteEjemplo != undefined) {
				$("#contenedor-instrumento").load("generarinstrumentacion.php?grupo=" + encodeURI(grupoEjemplo) + "&periodo=" + encodeURI(periodo) + "&tema=" + encodeURI(tema) + "&claveAsignatura=" + encodeURI(claveAsignatura) + "&docenteEjemplo=" + encodeURI(nombreDocenteEjemplo) + "&correoDocente=" + encodeURI(correoDocenteEjemplo), function(response) {
					$("#modal-instrumento .modal-title").text("Instrumentación didáctica del Tema No. " + tema + " de la asignatura de " + asignatura + " (" + claveAsignatura + ").");
					$("#modal-instrumento").modal('show');
				});
			}
		});

		$(document).on('click', '.abrirEvidencia', function(e) {
			e.preventDefault();
			var claveAsignatura = $(this).closest('.item-instrumentacion').find('.clave-asignatura').attr('data-clave');
			var tema = $(this).closest('.btn-group').find('.abrirInstruTema').attr('data-tema');
			var evidencia = $(this).attr('data-evidencia');

			var botonActual = $(this);

			//Obtener la información para mostrar la vista de un instrumento de cierto tema
			$.ajax({
				url: "conexion/consultasNoSQL.php",
				method: "post",
				data: {
					"accion": "mostrarVistaEvidenciaAprendizaje",
					"periodo": periodo,
					"claveAsignatura": claveAsignatura,
					"tema": tema,
					"evidencia": evidencia
				},
				success: function(response) {
					var res = JSON.parse(response);
					if(res.success) {
						//Verificar si el docente agrego contenido a la evidencia de aprendizaje
						var infoEvidencia = res.data[0];
						if(infoEvidencia.ContenidoInstrumento == null || infoEvidencia.ContenidoInstrumento == undefined) {
							alertify.warning('<h3>¡No se generó contenido para esta evidencia de aprendizaje!</h3>');
						} else {
							//Obtener que evidencia es (rubrica, lista de cotejo, cuestionario, guia de observacion)
							var cual = infoEvidencia.DatosEvidencia[8];
							var CS = botonActual.closest('.item-instrumentacion').find('.nombre-programa-edu span').first().attr('data-semestre');
							var PE = botonActual.closest('.item-instrumentacion').find('.programa-educativo').text();
							var evidencia = infoEvidencia.DatosEvidencia[0];
							var instrumento = infoEvidencia.DatosEvidencia[8];
							var por = infoEvidencia.DatosEvidencia[1];
							var A = infoEvidencia.DatosEvidencia[2];
							var B = infoEvidencia.DatosEvidencia[3];
							var C = infoEvidencia.DatosEvidencia[4];
							var D = infoEvidencia.DatosEvidencia[5];
							var E = infoEvidencia.DatosEvidencia[6];
							var F = infoEvidencia.DatosEvidencia[7];
							var materia = infoEvidencia.Materia;
							var grupo = botonActual.closest('.item-instrumentacion').find('.nombre-programa-edu span').first().attr('data-grupo');
							var tem = botonActual.closest('.btn-group').find('.abrirInstruTema').attr('data-tema');
							//var fa = infoEvidencia.ContenidoInstrumento[0];
							//var te = infoEvidencia.ContenidoInstrumento[1];
							var ComT = infoEvidencia.CompetenciaET;
							var procedimental = infoEvidencia.DatosEvidencia[9] == "1" ? 'X' : '';
							var conceptual = infoEvidencia.DatosEvidencia[10] == "1" ? 'X' : '';
							var actitudinal = infoEvidencia.DatosEvidencia[11] == "1" ? 'X' : '';
							var nomDocenteEjemplo =botonActual.closest('.item-instrumentacion').find('.nombre-docente').first().attr('data-nombre-docente');

							if(cual == "Guía de observación") {
								var general = infoEvidencia.ContenidoInstrumento;
								$("#contenedor-evidencia").load("instrumentos/guiaobservacion/guia.php", {
									CS: CS,
									PE: PE,
									evi: evidencia,
									ins: instrumento,
									num: cual,
									per: periodo,
									A: A,
									B: B,
									C: C,
									D: D,
									E: E,
									F: F,
									por: por,
									mat: materia,
									gru: grupo,
									tem: tem,
									fa: general[0],
									te: general[1],
									CoT: ComT,
									PRCDMTL: procedimental,
									CNCPTL: conceptual,
									CTTDNL: actitudinal,
									general: general,
									nomDocenteEjemplo: nomDocenteEjemplo
								}, function(){
									$("#modal-evidencia .modal-title").text(infoEvidencia.DatosEvidencia[0] + ' - ' + infoEvidencia.DatosEvidencia[8]);
									$("#modal-evidencia").modal('show');
								});
							} else if (cual == "Lista de cotejo") {
								var taa = infoEvidencia.ContenidoInstrumento[2];
								var tma = infoEvidencia.ContenidoInstrumento[3];
								var fa = infoEvidencia.ContenidoInstrumento[0];
								var te = infoEvidencia.ContenidoInstrumento[1];
								$("#contenedor-evidencia").load("instrumentos/listacotejo/lista.php", {
									CS: CS,
									PE: PE,
									evi: evidencia,
									ins: instrumento,
									num: cual,
									per: periodo,
									A: A,
									B: B,
									C: C,
									D: D,
									E: E,
									F: F,
									por: por,
									mat: materia,
									gru: grupo,
									tem: tem,
									fa: fa,
									te: te,
									CoT: ComT,
									taa: taa,
									tma: tma,
									PRCDMTL: procedimental,
									CNCPTL: conceptual,
									CTTDNL: actitudinal,
									nomDocenteEjemplo: nomDocenteEjemplo
								}, function() {
									$("#modal-evidencia .modal-title").text(infoEvidencia.DatosEvidencia[0] + ' - ' + infoEvidencia.DatosEvidencia[8]);
									$("#modal-evidencia").modal('show');
								});
							} else if (cual == "Cuestionario") {
								var fa = infoEvidencia.ContenidoInstrumento[0][0];
								var te = infoEvidencia.ContenidoInstrumento[0][1];

								//Aqui es necesario modificar el array que contiene las preguntas de relacionar, subrayar y verdadero o falso
								//Esto con la finalidad de adaptar los datos tal como estan establecidos en instrumentos/cuestionario/cuestionario.php, para que se incluyan sin problema al cargar la vista de la instrumentacion
								//Ya que al obtener la información tal como esta en Mongo no se podrá adaptar al cargar la vista, mostrando errores debido a que esta estructurado un poco diferente
								var listapr = [];
								infoEvidencia.ContenidoInstrumento[0][2].forEach(preguntaRela => {
									listapr.push(preguntaRela[0]);
									listapr.push(preguntaRela[1]);
									listapr.push(preguntaRela[2]);
									listapr.push(preguntaRela[3]);
								});
								var listasb2 = [];
								infoEvidencia.ContenidoInstrumento[0][3].forEach(preguntaSubra => {
									listasb2.push(preguntaSubra[0]);
								});
								var listapvf = [];
								infoEvidencia.ContenidoInstrumento[0][4].forEach(preguntasFalsoVer => {
									listapvf.push(preguntasFalsoVer[0]);
									listapvf.push(preguntasFalsoVer[1]);
									listapvf.push(preguntasFalsoVer[2]);
									listapvf.push(preguntasFalsoVer[3]);
								});
								$("#contenedor-evidencia").load("instrumentos/cuestionario/cuestionario.php", {
									CS: CS,
									PE: PE,
									evi: evidencia,
									ins: instrumento,
									num: cual,
									per: periodo,
									A: A,
									B: B,
									C: C,
									D: D,
									E: E,
									F: F,
									por: por,
									mat: materia,
									gru: grupo,
									tem: tem,
									fa: fa,
									te: te,
									CoT: ComT,
									PRCDMTL: procedimental,
									CNCPTL: conceptual,
									CTTDNL: actitudinal,
									listapr: listapr,
									listasb2: listasb2,
									listapvf: listapvf,
									nomDocenteEjemplo: nomDocenteEjemplo
								}, function() {
									$("#modal-evidencia .modal-title").text(infoEvidencia.DatosEvidencia[0] + ' - ' + infoEvidencia.DatosEvidencia[8]);
									$("#modal-evidencia").modal('show');
								});
							} else if (cual = "Rúbrica") {
								var fa = infoEvidencia.ContenidoInstrumento[0];
								var te = infoEvidencia.ContenidoInstrumento[1];
								var general = infoEvidencia.ContenidoInstrumento;
								console.log(general);
								var CTema = infoEvidencia.NombreTema;
								$("#contenedor-evidencia").load("instrumentos/rubrica/rubrica.php", {
									CTema: CTema,
									CS: CS,
									PE: PE,
									evi: evidencia,
									ins: instrumento,
									num: cual,
									per: periodo,
									A: A,
									B: B,
									C: C,
									D: D,
									E: E,
									F: F,
									por: por,
									mat: materia,
									gru: grupo,
									tem: tem,
									fa: fa,
									te: te,
									CoT: ComT,
									PRCDMTL: procedimental,
									CNCPTL: conceptual,
									CTTDNL: actitudinal,
									general: general,
									nomDocenteEjemplo: nomDocenteEjemplo
								}, function() {
									$("#modal-evidencia .modal-title").text(infoEvidencia.DatosEvidencia[0] + ' - ' + infoEvidencia.DatosEvidencia[8]);
									$("#modal-evidencia").modal('show');
								});
							}
						}
					}
				}
			});
		});
	</script>
</body>

</html>