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
		.modal-dialog {
			position: relative;
			display: table;
			overflow: auto;
			width: auto;
			min-width: 300px;
		}
		.modal-body { /* Restrict Modal width to 90% */
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
			<div class="row mb-4 mt-4">
				<div class="col-12">
					<div class="row" id="contenedor">
					</div>
				</div>
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

		<!-- Modal para mostrar un instrumento de una de las 3 eveidencias de aprendizaje por tema -->
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
		var periodo;
		$(document).ready(function() {
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
					"accion": "obtenerGruposAcademicosPorPresidente",
					"idUsuario": "<?php echo $_SESSION["idUsuario"]; ?>"
				},
				url: "conexion/consultasSQL.php",
				method: "post",
				success: function(response) {
					var res = JSON.parse(response);
					if (res.success) {
						mostrarInstrumentaciones(res.data);
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
		});

		function mostrarInstrumentaciones(gruposAcademicos) {
			var active = true;
			var htmlLista = '';
			var htmlListaContenenido = '';

			var html = '<div class="col-12 col-sm-12 col-md-4 col-lg-4 mb-3">' +
							'<div class="list-group" id="list-tab" role="tablist">' +
							'</div>' +
						'</div>' + 
						'<div class="col-12 col-sm-12 col-md-8 col-lg-8">' + 
							'<div class="tab-content" id="nav-tabContent">' +
							'</div>' +
						'</div>';
			$("#contenedor").append(html);

			//Generar una peticion para obtener las instrumentaciones de cada grupo academico al que este a cargo un presidente de grupo academico
			var allAJAX = gruposAcademicos.map(m => {
				return $.ajax({
					url: "conexion/consultasNoSQL.php",
					method: "post",
					data: {
						"accion": "obtenerInstrumentacionesPorPresidente",
						"periodo": periodo,
						"materiasLista": m.materias.split(',')

					}
				}).done(function(res) {
					//Obtener la lista de instrumentaciones a validar
					var instru = typeof(JSON.parse(res).data) != "undefined" ? JSON.parse(res).data: null;
					if(instru != null) {
						htmlLista += '<a class="list-group-item list-group-item-action ' + (active ? 'active': '') + '" id="list-' + m.id_grupoacademico + '-list" data-toggle="list" href="#list-' + m.id_grupoacademico + '" role="tab" aria-controls="' + m.id_grupoacademico + '">' + m.nombre + '</a>';
						

						var hasInstru = instru.length != 0 ? true : false;
						htmlListaContenenido += '<div class="tab-pane fade show ' + (active ? 'active': '') + '" id="list-' + m.id_grupoacademico + '" role="tabpanel" aria-labelledby="list-' + m.id_grupoacademico + '-list">' +
													'<div class="list-group">';
						if(hasInstru) {
							//Recorrer el array de instrumentaciones
							instru.forEach(inst => {
								htmlListaContenenido += '<div class="list-group-item list-group-item-action flex-column align-items-start item-instrumentacion">' +
															'<h5 class="nombre-asignatura">' + (inst.v.Materia != undefined ? inst.v.Materia : '') + '</h5>' +
															'<h6 class="clave-asignatura" data-clave="' + (inst.k != undefined ? inst.k: '') +'">Clave de asignatura: ' + (inst.k != undefined ? inst.k: '') +'</h6>' +
															'<h6>Número de temas: ' + (inst.v.totalTemas != undefined ? inst.v.totalTemas: '') + '</h6>' +
															'<h6>Los siguientes grupos comparten la presente instrumentación.</h6>' + 
															'<div class="row mb-2">';
								inst.v.TodasMaterias.forEach(carreras => {
									carreras.Docentes.forEach(doce => {
										htmlListaContenenido += '<div class="col-md-4 col-sm-6 col-12 mb-1">' +
																	'<h6 style="font-size: 13px;" class="nombre-programa-edu"><span class="badge badge-pill badge-info font-weight-normal" style="font-size: 14px;" data-semestre="' + (carreras.Semestre != undefined ? carreras.Semestre : '') + '" data-grupo="' + (doce.grupo != undefined ? doce.grupo : '') + '">' + (doce.grupo != undefined ? doce.grupo : '') + '</span> - ' + (carreras.PE != undefined ? carreras.PE : '') + '</h6>' +
																	'<h6 style="font-size: 12px;" class="nombre-docente" data-nombre-docente="' + (doce.nombre != undefined ? doce.nombre : '') + '">Docente: ' + (doce.nombre != undefined ? doce.nombre : '') + '</h6>' +
																'</div>';
									});
								});
								htmlListaContenenido += 	'</div>';
								htmlListaContenenido += 	'<div class="row">' +
																'<div class="col">';
								if(inst.v.Temas != undefined && inst.v.Temas != null) {
									inst.v.Temas.forEach(tema => {
										htmlListaContenenido += 	'<div class="btn-group m-1">' +
																		'<button type="button" class="btn btn-info btn-sm abrirInstruTema" data-tema="' + tema.Tema + '">Tema ' + tema.Tema + '</button>' +
																		'<button type="button" class="btn btn-sm btn-info dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">' +
																			'<span class="sr-only">Toggle Dropdown</span>' +
																		'</button>';
										if(tema.Matriz != undefined && tema.Matriz != null) {
											htmlListaContenenido +=		'<div class="dropdown-menu">';
											tema.Matriz.forEach(tem => {
												htmlListaContenenido +=		'<a class="dropdown-item abrirEvidencia" href="#" data-evidencia="' + tem[12] + '">' + tem[0] + '</a>';
											});
										} else {
											htmlListaContenenido += 	'<div class="dropdown-menu">' +
																			'<a class="dropdown-item" href="#">¡No se generaron evidencias!</a>' +	
																		'</div>';
										}
										htmlListaContenenido += '</div></div>';
									});
								} else {
									htmlListaContenenido += '<h6>¡No se llenaron temas en la instrumentación!</h6>'
								}
								
								htmlListaContenenido +=	'</div></div></div>';
							});
						} else {
							htmlListaContenenido += '<div class="list-group-item list-group-item-action flex-column align-items-start">' +
															'<h5>Aún no se envían instrumentaciones.</h5>' +
													'</div>';
						}
						htmlListaContenenido += '</div></div>';

						active = false;
					}
					
				});
			});
			Promise.all(allAJAX).then(function(response) {
				$("#list-tab").append(htmlLista);
				$("#nav-tabContent").append(htmlListaContenenido);
			})
		}

		//Mostar la vista correspondiente a una instrumentacion del tema
		$(document).on('click', '.abrirInstruTema', function() {
			//Obtener la clave de asignatura de la actual instrumentacion seleccionada
			var claveAsignatura = $(this).closest('.item-instrumentacion').find('.clave-asignatura').attr('data-clave');
			//Obtener que tema mostrar
			var tema = $(this).attr('data-tema');

			//Obtener el primer grupo que comparte esa instrumentacion, solo para mostrarlo como ejemplo
			var grupoEjemplo = $(this).closest('.item-instrumentacion').find('.nombre-programa-edu span').first().attr('data-grupo');
			var asignatura = $(this).closest('.item-instrumentacion').find('.nombre-asignatura').text();
			var nombreDocenteEjemplo = $(this).closest('.item-instrumentacion').find('.nombre-docente').first().attr('data-nombre-docente');
			
			if(claveAsignatura != undefined && tema != undefined && grupoEjemplo != undefined && periodo != undefined && nombreDocenteEjemplo != undefined) {
				$("#contenedor-instrumento").load("generarinstrumentacion.php?grupo=" + encodeURI(grupoEjemplo) + "&periodo=" + encodeURI(periodo) + "&tema=" + encodeURI(tema) + "&claveAsignatura=" + encodeURI(claveAsignatura) + "&docenteEjemplo=" + encodeURI(nombreDocenteEjemplo), function(response) {
					$("#modal-instrumento .modal-title").text("Instrumentación didáctica del Tema No. " + tema + " de la asignatura de " + asignatura + " (" + claveAsignatura + ").");
					$("#modal-instrumento").modal('show');
				});
			}
		});

		//Mostrar la vista correspondiente a una evidencia de cierto tema
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
							var PE = botonActual.closest('.item-instrumentacion').find('.nombre-programa-edu:first').text().split('-')[1].trim();
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
									CTTDNL: actitudinal
								}, function() {
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
									general: general
								}, function() {
									$("#modal-evidencia").modal('show');
								});
							}
						}
					}
				}
			})
		})

		$('#modal-instrumento').on('show.bs.modal', function() {
			$(".modal-body").css("padding",'0px');
			$(".modal-body").css("margin",'0px');
		});
	</script>

</body>

</html>