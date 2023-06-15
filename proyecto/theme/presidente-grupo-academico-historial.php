<?php
require_once '../../valida.php';
require_once 'manejo-usuarios/UsuarioPrivilegiado.php';
$u = UsuarioPrivilegiado::getByCorreo($_SESSION["correo"]);
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Instrumentaciones Didáctica</title>

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

    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/sina-nav.min.css">

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
        <div class="container mb-4">
			<div class="row  mt-3">
                <div class="col-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.php">Inicio</a></li>
							<li class="breadcrumb-item"><a href="presidente-grupo-academico.php">Instrumentaciones a validar</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Historial de instrumentaciones validadas</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <h5>Historial de instrumentaciones validadas.</h5>
                </div>
			</div>
			<?php if($u->hasPrivilegio("historial_instrumentaciones_validadas")) { ?>
			<div>
				<div class="row mt-3">
					<div class="col-12 d-flex flex-wrap">
						<div id="conte-periodo">
							<form action="" method="POST">
								<div class="form-group">
									<label class="control-label" for="select">
										<h4>Periodo</h4>
									</label>
									<select class="form-control" id="selectPeriodo" name="periodo" Onchange="seleccionarPeriodo(this.options[this.selectedIndex].innerHTML);">
										<option>&nbsp;</option>
										<?php
										require_once 'conexion/conexionSQL.php';
										$connSQL = connSQL::singleton();
										$query = "Select periodo from periodos";
										$periodos = $connSQL->consulta($query);
										foreach ($periodos as $periodo) {
											echo "<option>" . $periodo[0] . "</option>";
										}
										?>
									</select>
								</div>
							</form>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col">
						<div id="contenedor-instru-historial-presidente">

						</div>
					</div>
				</div>
			</div>
            <?php } ?>
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

    <script src="js/wow.min.js"></script>
    <script src="js/sina-nav.js"></script>
    <script src="js/html2pdf.bundle.min.js"></script>

    <!-- For All Plug-in Activation & Others -->
    <script type="text/javascript">
        $(document).ready(function() {
            // WOW animation initialize
            new WOW().init();
        });
    </script>

    <script>
        function seleccionarPeriodo(periodo) {
            if(periodo != "&nbsp;") {
                $.ajax({
                    data: {
                        'accion': 'historialValidacionesPresidente',
                        'periodo': periodo,
                        'idPresidente': '<?php echo $_SESSION["idUsuario"]; ?>'
                    },
                    url: 'conexion/consultasNoSQL.php',
                    method: 'post',
                    success: function(response) {
                        var res = JSON.parse(response);
                        if(res.success) {
                            $("#contenedor-instru-historial-presidente").css("display", "block");
                            mostrarInstrumentaciones(res.data);
                        }
                    }
                });
            } else {
                $("#contenedor-instru-historial-presidente").css("display", "none");
            }
        }

        function mostrarInstrumentaciones(instrumentaciones){
            var htmlListaContenido = '';
            var hasInstru = instrumentaciones.length != 0 ? true: false;

            if(hasInstru) {
                instrumentaciones.forEach(inst => {
                    htmlListaContenido += '<div class="list-group-item list-group-item-action flex-column align-items-start item-instrumentacion">' +
												'<div class="row">' +
													'<div class="col-lg-12 informacion">' +
														'<h5 class="nombre-asignatura">' + (inst.v.Materia != undefined ? inst.v.Materia : '') + '</h5>' +
															'<h6 class="clave-asignatura" data-clave="' + (inst.k != undefined ? inst.k: '') +'">Clave de asignatura: ' + (inst.k != undefined ? inst.k: '') +'</h6>' +
															'<h6>Número de temas: ' + (inst.v.totalTemas != undefined ? inst.v.totalTemas: '') + '</h6>' +
															'<h6>Los siguientes grupos comparten la presente instrumentación.</h6>' + 
															'<div class="row mb-2">';
						inst.v.TodasMaterias.forEach(carreras => {
							carreras.Docentes.forEach(doce => {
                                htmlListaContenido += 		    '<div class="col-md-4 col-sm-6 col-12 mb-1">' +
                                                                    '<h6 style="font-size: 13px;" class="nombre-programa-edu"><span class="badge badge-pill badge-info font-weight-normal" style="font-size: 14px;" data-semestre="' + (carreras.Semestre != undefined ? carreras.Semestre : '') + '" data-grupo="' + (doce.grupo != undefined ? doce.grupo : '') + '">' + (doce.grupo != undefined ? doce.grupo : '') + '</span> - ' + (carreras.PE != undefined ? carreras.PE : '') + '</h6>' +
                                                                    '<h6 style="font-size: 12px;" class="nombre-docente" data-nombre-docente="' + (doce.nombre != undefined ? doce.nombre : '') + '" data-correo-docente="' + (doce.correo != undefined ? doce.correo : '') + '">Docente: ' + (doce.nombre != undefined ? doce.nombre : '') + '</h6>' +
                                                                '</div>';
							});
						});
						htmlListaContenido += 			    '</div>';
						htmlListaContenido += 			    '<div class="row">' +
																'<div class="col">';
						if(inst.v.Temas != undefined && inst.v.Temas != null) {
							inst.v.Temas.forEach(tema => {
								htmlListaContenido += 			    '<div class="btn-group m-1">' +
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
									htmlListaContenido += 			    '<div class="dropdown-menu">' +
																			'<a class="dropdown-item" href="#">¡No se generaron evidencias!</a>';
								}
								htmlListaContenido += 			        '</div>' + 
																    '</div>';
															
																	
							});
						} else {
							htmlListaContenido +=  '<h6>¡No se llenaron temas en la instrumentación!</h6>'
						}

						htmlListaContenido +=				    '</div>' +
																	'</div>' +
																'</div>' +
															'</div>' +
														'</div>';
                });
            } else {
                htmlListaContenido += '<div class="list-group-item list-group-item-action flex-column align-items-start">' +
											'<h5>No se encontraron instrumentaciones.</h5>' +
										'</div>';
            }
            $("#contenedor-instru-historial-presidente").html(htmlListaContenido);
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
			var correoDocenteEjemplo = $(this).closest('.item-instrumentacion').find('.nombre-docente').first().attr('data-correo-docente');
			var periodo = $("#selectPeriodo").val();

			if(claveAsignatura != undefined && tema != undefined && grupoEjemplo != undefined && periodo != undefined && nombreDocenteEjemplo != undefined) {
				$("#contenedor-instrumento").load("generarinstrumentacion.php?grupo=" + encodeURI(grupoEjemplo) + "&periodo=" + encodeURI(periodo) + "&tema=" + encodeURI(tema) + "&claveAsignatura=" + encodeURI(claveAsignatura) + "&docenteEjemplo=" + encodeURI(nombreDocenteEjemplo) + "&correoDocente=" + encodeURIComponent(correoDocenteEjemplo), function(response) {
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
            var periodo = $("#selectPeriodo").val();

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
			})
		});


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
    </script>
</body>

</html>