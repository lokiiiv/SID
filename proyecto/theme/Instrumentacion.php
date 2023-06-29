<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>

	<style>
		#instru .color {
			background-color: #C6D9F1;
		}

		#instru .color-claro {
			background-color: #F1F5F9;
			border-left: 3px solid white;
			border-right: 3px solid white;
			box-sizing: border-box;
		}

		#instru .text-bold {
			font-size: 10px;
			font-weight: bold;
			text-align: center;
		}

		#instru .text-general {
			font-size: 14px;
			font-family: 'Arial Narrow';
			line-height: 14px;
			color: black;
			text-align: center;
		}

		#instru .border-b {

			border-bottom: 1px solid #1f497d;
		}

		#instru .border-t {
			border-top: 1px solid #1f497d;
		}

		#instru .border-r {
			border-right: 1px solid #1f497d;
		}

		#instru .border-l {
			border-left: 1px solid #1f497d;
		}

		#instru .border-b-b {
			border-bottom: 1px solid black;
		}

		#instru .border-t-b {
			border-top: 1px solid black;
		}

		#instru .border-r-b {
			border-right: 1px solid black;
		}

		#instru .border-l-b {
			border-left: 1px solid black;
		}



		#instru .all-border {
			border: 1px solid #1f497d;
		}

		#instru .all-border-b {
			border: 1px solid black;
		}

		#instru b {
			font-size: 15px;
		}

		#instru p {
			font-family: arial;
			font-size: 14px;
		}

		#instru i {
			font-size: 16px;
		}

		#practicas p,
		#criterios p,
		#indicadores p,
		#matriz p,
		#calendarizacion p,
		#fuentes p,
		#encabezado p {
			margin-top: 0;
			margin-bottom: 0;
		}
	</style>

</head>

<body>
	<div class="container-fluid" style="max-width: 1276px; min-width: 1000px" id="instru">
		<div class="row" data-html2canvas-ignore="true">
			<div class="col-12 d-flex justify-content-end">
				<button type="button" class="btn btn-info" onclick="descargarPDFInstrumento(this)"><i class="fa-solid fa-file-pdf pr-2"></i>Descargar PDF</button>
			</div>
		</div>
		<div class="row" id="instrumento-imprimir">

			<div class="col-12">
				<div class="mt-1 mb-4 ml-3 mr-3">
					<div id="encabezado">
						<div class="row" style="border: 1px solid #000000;">
							<div class="col">
								<div class="row">
									<div class="col d-flex justify-content-start align-items-center">
										<img src="../../images/itesa.png" class="img-fluid" width="175px">
									</div>
									<div class="col pt-5 pb-5 d-flex justify-content-end align-items-center">
										<p style="font-size: 16px;">Instituto Tecnológico Superior del Oriente del Estado de Hidalgo</p>
									</div>
								</div>
								<div class="row d-flex justify-content-end">
									<div class="col-6 color text-right">
										<b>SISTEMA DE GESTIÓN DE LA CALIDAD</b>
									</div>
								</div>
								<div class="row  d-flex justify-content-end">
									<div class="col-6 text-right mb-3">
										<b>Instrumentación Didáctica</b>
									</div>
								</div>
							</div>
						</div>

						<div class="row mt-4">
							<div class="col-2 col-xl-2 col-lg-2 col-sm-2 p-0">
								<div class="color d-flex justify-content-center align-items-center p-1 h-100"><b class="text-bold">DOCUMENTO</b></div>
							</div>
							<div class="col-10 col-xl-10 col-lg-10 col-sm-10">
								<div class="row h-100">
									<div class="col-3 border-b d-flex justify-content-center align-items-center"><b class="text-general"><?php if (isset($instrumentacion->Documento)) echo $instrumentacion->Documento; ?></b></div>
									<div class="col-3 color d-flex justify-content-center align-items-center"><b class="text-bold">CLÁUSULA ISO 9001 2008</b></div>
									<div class="col-3 border-b d-flex justify-content-center align-items-center"><b class="text-general"><?php if (isset($instrumentacion->Clausula)) echo $instrumentacion->Clausula; ?></b></div>
									<div class="col-2 color d-flex justify-content-center align-items-center"><b class="text-bold">REVISIÓN</b></div>
									<div class="col-1 border-b d-flex justify-content-center align-items-center"><b class="text-general"><?php if (isset($instrumentacion->Revision)) echo $instrumentacion->Revision; ?></b></div>
								</div>
							</div>
						</div>
						<div class="row mt-3">
							<div class="col-2 p-0">
								<div class="color d-flex justify-content-center align-items-center p-1 h-100"><b class="text-bold">RESPONSABLE</b></div>
							</div>
							<div class="col-10">
								<div class="row h-100">
									<div class="col-3 border-b d-flex justify-content-center align-items-center"><b class="text-general"><?php if (isset($instrumentacion->Responsable)) echo $instrumentacion->Responsable; ?></b></div>
									<div class="col-3 color d-flex justify-content-center align-items-center"><b class="text-bold">FECHA DE EMISIÓN</b></div>
									<div class="col-3 border-b d-flex justify-content-center align-items-center"><b class="text-general"><?php if (isset($instrumentacion->FechaEmision)) echo $instrumentacion->FechaEmision; ?></b></div>
									<div class="col-2 color d-flex justify-content-center align-items-center"><b class="text-bold">CÓDIGO DEL DOCUMENTO</b></div>
									<div class="col-1 border-b d-flex justify-content-center align-items-center"><b class="text-general"><?php if (isset($instrumentacion->CodigoDocumento)) echo $instrumentacion->CodigoDocumento; ?></b></div>
								</div>
							</div>
						</div>
						<div class="row mt-4">
							<div class="col-2 p-0">
								<div class="color d-flex justify-content-center align-items-center p-1 h-100"><b class="text-center">Programa educativo:</b></div>
							</div>
							<div class="col-10">
								<div class="row h-100">
									<div class="col-5 color-claro d-flex justify-content-center align-items-center text-center"><i><?php if (isset($instrumentacion->TodasMaterias->PE)) echo $instrumentacion->TodasMaterias->PE; ?></i></div>
									<div class="col-2 color d-flex justify-content-center align-items-center"><b class="text-center">Plan de estudios:</b></div>
									<div class="col-5 color-claro d-flex justify-content-center align-items-center"><i><?php if (isset($instrumentacion->TodasMaterias->PlanEstudios)) echo $instrumentacion->TodasMaterias->PlanEstudios; ?></i></div>
								</div>
							</div>
						</div>
						<div class="row mt-2">
							<div class="col-2 p-0">
								<div class="color d-flex justify-content-center align-items-center p-1 h-100"><b class="text-center">Nombre de la asignatura:</b></div>
							</div>
							<div class="col-10">
								<div class="row">
									<div class="col-7">
										<div class="row h-100">
											<div class="col-10 p-0 h-100 color-claro d-flex justify-content-center align-items-center p-1 text-center"><i><?php if (isset($instrumentacion->Materia)) echo $instrumentacion->Materia; ?></i></div>
											<div class="col-2 w-100 color d-flex justify-content-center align-items-center"><b class="text-center">Clave de la asignatura:</b></div>
										</div>
									</div>
									<div class="col-5">
										<div class="row">
											<div class="col-3 color-claro d-flex justify-content-center align-items-center"><i><?php if (isset($instrumentacion->ClaveAsignatura)) echo $instrumentacion->ClaveAsignatura; ?></i></div>
											<div class="col-3 color d-flex justify-content-center align-items-center"><b class="text-center">Créditos:</b></div>
											<div class="col-2 color-claro d-flex justify-content-center align-items-center"><i><?php if (isset($instrumentacion->Creditos)) echo $instrumentacion->Creditos; ?></i></div>
											<div class="col-2 color d-flex justify-content-center align-items-center"><b class="text-center">Número de Tema:</b></div>
											<div class="col-2 color-claro d-flex justify-content-center align-items-center"><i><?php echo $tema ?></i></div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="row mt-2">
							<div class="col-2 p-0">
								<div class="color d-flex justify-content-center align-items-center p-1 h-100"><b class="text-center">Semestre:</b></div>
							</div>
							<div class="col-10">
								<div class="row h-100">
									<div class="col-7">
										<div class="row h-100">
											<div class="col p-0">
												<div class="row ml-0 mr-0 h-100">
													<div class="col-5 color-claro d-flex justify-content-center align-items-center"><i><?php if (isset($instrumentacion->TodasMaterias->Semestre)) echo $instrumentacion->TodasMaterias->Semestre; ?></i></div>
													<div class="col-4 color d-flex justify-content-center align-items-center"><b class="text-center">Clave de grupo:</b></div>
													<div class="col color-claro d-flex justify-content-center align-items-center"><i><?php if (isset($grupo1)) echo $grupo1; ?></i></div>
												</div>
											</div>
											<div class="col-2 w-100 color-claro d-flex justify-content-center align-items-center" style="border-right: 0px; border-left: 0px;"><i><?php if (isset($grupo2)) echo $grupo2; ?></i></div>
										</div>
									</div>
									<div class="col-5">
										<div class="row">
											<div class="col-3 color-claro d-flex justify-content-center align-items-center"><i><?php if (isset($grupo3)) echo $grupo3; ?></i></div>
											<div class="col-3 color-claro d-flex justify-content-center align-items-center" style="border-right: 0px; border-left: 0px;"><i><?php if (isset($grupo4)) echo $grupo4; ?></i></div>
											<div class="col-2 color d-flex justify-content-center align-items-center" style="border-right: 3px solid white; border-left: 3px solid white; box-sizing: border-box;"><b class="text-center">Periodo:</b></div>
											<div class="col-4 color-claro d-flex justify-content-center align-items-center" style="border-left: 3px;"><i class="text-center"><?php if (isset($periodo)) echo $periodo; ?></i></div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="row mt-2">
							<div class="col-2 p-0">
								<div class="color d-flex justify-content-center align-items-center p-1 h-100"><b class="text-center">Nombre del docente:</b></div>
							</div>
							<div class="col-10">
								<div class="row h-100">
									<div class="col color-claro d-flex justify-content-center align-items-center">
										<p><?php if (isset($nombre)) echo $nombre ?></p>
									</div>
								</div>
							</div>
						</div>
						<div class="row mt-2">
							<div class="col color d-flex justify-content-center align-items-center p-1"><b style="font-size: 18px;" class="text-center">Instrumentación Didáctica</b></div>
						</div>

						<div class="row mt-4">
							<div class="col">
								<div class="row color p-1 d-flex justify-content-start align-items-center"><b>1.- Caracterización de la asignatura</b></div>
								<div class="row all-border p-2" style="min-height: 100px;">
									<p class="text-justify"><?php if (isset($instrumentacion->Caracterizacion)) echo $instrumentacion->Caracterizacion; ?></p>
								</div>
							</div>
						</div>
					</div>

					<div class="row mt-4">
						<div class="col">
							<div class="row color p-1 d-flex justify-content-start align-items-center"><b>2.- Intención didáctica</b></div>
							<div class="row all-border p-2" style="min-height: 100px;">
								<p class="text-justify"><?php if (isset($instrumentacion->IntencionDidactica)) echo $instrumentacion->IntencionDidactica; ?></p>
							</div>
						</div>
					</div>
					<div class="row mt-4">
						<div class="col">
							<div class="row color p-1 d-flex justify-content-start align-items-center"><b>3.-Competencias previas</b></div>
							<div class="row all-border p-2" style="min-height: 50px;">
								<p class="text-justify"><?php if (isset($instrumentacion->CompetenciasPrevias)) echo $instrumentacion->CompetenciasPrevias; ?></p>
							</div>
						</div>
					</div>
					<div class="row mt-4">
						<div class="col">
							<div class="row color p-1 d-flex justify-content-start align-items-center"><b>4.- Competencia específica de la asignatura</b></div>
							<div class="row all-border p-2" style="min-height: 50px;">
								<p class="text-justify"><?php if (isset($instrumentacion->CompetenciaEA)) echo $instrumentacion->CompetenciaEA; ?></p>
							</div>
						</div>
					</div>

					<?php if (isset($instrumentacion->Temas)) : ?>

						<div class="row mt-3">
							<div class="col-4 p-3 d-flex justify-content-center align-items-center" style="border-right: 0px; border-left: 0px; background-color: #F1F5F9;"><b>Tema:</b></div>
							<div class="col-8 border-t border-b border-r">
								<div class="row">
									<div class="col-1 d-flex justify-content-start align-items-start p-1"><b><?php echo $tema ?></b></div>
									<div class="col-11 d-flex justify-content-start align-items-center p-1">
										<p class="text-justify"><?php if (isset(((array)$instrumentacion->Temas)[$tema]->TituloTema)) echo (((array)$instrumentacion->Temas)[$tema]->TituloTema); ?></p>
									</div>
								</div>
							</div>
						</div>
						<div class="row mt-3">
							<div class="col">
								<div class="row p-1 d-flex justify-content-start align-items-center" style="background-color: #B9CDE5;"><b>5.- Competencia específica del tema:</b></div>
								<div class="row all-border p-2" style="min-height: 50px;">
									<p class="text-justify"><?php if (isset(((array)$instrumentacion->Temas)[$tema]->CompetenciaET)) print_r(((array)$instrumentacion->Temas)[$tema]->CompetenciaET); ?></p>
								</div>
							</div>
						</div>
						<div class="row mt-3">
							<div class="col">
								<div class="row color-claro p-1 d-flex justify-content-center align-items-center" style="border-right: 0px; border-left: 0px;"><b>Competencias genéricas a desarrollar</b></div>
								<div class="row all-border mt-3 p-2" style="min-height: 50px;">
									<p class="text-justify"><?php if (isset(((array)$instrumentacion->Temas)[$tema]->CompetenciasGen)) print_r(((array)$instrumentacion->Temas)[$tema]->CompetenciasGen); ?></p>
								</div>
							</div>
						</div>
						<div class="row mt-4">
							<div class="col">
								<div class="row color p-1 d-flex justify-content-start align-items-center"><b>6.- Proceso enseñanza aprendizaje</b></div>
								<div class="row pt-4">
									<div class="col">
										<div class="row">
											<div class="col">
												<div class="row" id="tabla">
													<div class="col">
														<div class="row">
															<div class="col-fluid border-l-b border-t-b border-r-b color-claro p-2 d-flex justify-content-center align-items-center" style="width: 20%;"><b class="text-center">Temas y subtemas</b></div>
															<div class="col-fluid" style="width: 60%;">
																<div class="col h-100">
																	<div class="row h-100">
																		<div class="col-6 p-2 d-flex color-claro justify-content-center align-items-center border-t-b border-r-b" style="border-left: none;"><b class="text-center">Actividades de enseñanza (Docente)</b></div>
																		<div class="col-6 p-2 d-flex color-claro justify-content-center align-items-center border-t-b" style="border-left: none; border-right: none;"><b class="text-center">Actividades de aprendizaje (estudiante)</b></div>
																	</div>
																</div>
															</div>
															<div class="col-fluid border-r-b border-t-b border-l-b color-claro p-2 d-flex justify-content-center align-items-center" style="width: 20%;"><b class="text-center">Recursos y apoyos didácticos</b></div>
														</div>

														<?php if (isset(((array)$instrumentacion->Temas)[$tema]->Actividades)) {
															$actividades = ((array)$instrumentacion->Temas)[$tema]->Actividades;
															$htp = (isset(((array)$instrumentacion->Temas)[$tema]->HTP)) ? ((array)$instrumentacion->Temas)[$tema]->HTP : "";
															$temas       = (isset(((array)$instrumentacion->Temas)[$tema]->TemasSubtemas)) ? ((array)$instrumentacion->Temas)[$tema]->TemasSubtemas : "";
															$recursos = (isset(((array)$instrumentacion->Temas)[$tema]->Recursos)) ? (((array)$instrumentacion->Temas)[$tema]->Recursos) : "";   ?>

															<div class="row">
																<!--  Temas y subtemas  -->
																<div class="col-fluid border-t-b border-l-b border-r-b p-2 d-flex justify-content-start align-items-center" style="width: 20%; text-align: justify; white-space: pre-wrap;">
																	<p><?php echo $temas; ?></p>
																</div>

																<!-- Actividades de enseñanza -->
																<div class="col-fluid" style="width: 60%;">
																	<div class="col h-100 d-flex flex-column">
																		<?php for ($i = 0; $i < sizeof($actividades); $i++) { ?>
																			<div class="row" style="flex-grow: 1;">
																				<div class="col-6 p-2 border-t-b border-r-b d-flex justify-content-start align-items-start" style="white-space: pre-wrap; min-height: 80px;">
																					<p class="text-justify"><?php echo $actividades[$i][0]; ?></p>
																				</div>
																				<div class="col-6 p-2 border-t-b d-flex justify-content-start align-items-start" style="white-space: pre-wrap; min-height: 80px;">
																					<p class="text-justify"><?php echo $actividades[$i][1]; ?></p>
																				</div>
																			</div>
																		<?php } ?>
																	</div>
																</div>

																<!-- Recursos y apoyos didacticos -->
																<div class="col fluid p-2 border-l-b border-t-b border-r-b d-flex justify-content-start align-items-center" style="width: 20%; text-align: justify; white-space: pre-wrap;">
																	<p><?php echo $recursos; ?></p>
																</div>
															</div>

														<?php } ?>

														<div class="row">
															<div class="col-fluid color-claro p-3 border-t-b border-l-b border-b-b d-flex justify-content-end align-items-center" style="width: 80%; border-right: none;"><b>Horas teórico-prácticas</b></div>

															<!-- Horas teorico practicas -->
															<div class="col-fluid all-border-b d-flex justify-content-center align-items-center" style="width: 20%;"><b><?php echo isset(((array)$instrumentacion->Temas)[$tema]->Actividades) ? $htp : ''; ?></b></div>
														</div>

													</div>

												</div>
											</div>
										</div>
										<div class="row mt-5">
											<div class="col">
												<div class="row">
													<div class="col color d-flex justify-content-start align-items-center p-1 ml-1 mr-1"><b>Prácticas en laboratorios o talleres</b></div>
												</div>
												<div class="row mt-3" id="practicas">
													<div class="col">
														<div class="row">
															<div class="col-fluid color-claro p-2 border-l-b border-t-b border-b-b d-flex justify-content-center align-items-center" style="width: 4%; border-right: none;"><b class="text-center">No.</b></div>
															<div class="col-fluid color-claro p-2 border-t-b border-l-b border-r-b border-b-b d-flex justify-content-center align-items-center" style="width: 66%;"><b class="text-center">Título de la práctica</b></div>
															<div class="col-fluid color-claro p-2 border-r-b border-t-b border-b-b" style="width: 30%; border-left: none;"><b class="text-center">Laboratorio</b></div>
														</div>
														<?php if (isset(((array)$instrumentacion->Temas)[$tema]->Practicas)) {
															$practicas = ((array)$instrumentacion->Temas)[$tema]->Practicas;
															$i = 1;
															foreach ($practicas as $practica) { ?>
																<div class="row">
																	<div class="col-fluid border-b-b border-l-b p-1 d-flex justify-content-center align-items-center" style="width: 4%;">
																		<p><?php echo $i; ?></p>
																	</div>
																	<div class="col-fluid border-b-b border-l-b border-r-b p-1 d-flex justify-content-start align-items-center" style="width: 66%;">
																		<p><?php echo $practica[0]; ?></p>
																	</div>
																	<div class="col-fluid border-b-b border-r-b p-1 d-flex justify-content-start align-items-center" style="width: 30%;">
																		<p><?php echo $practica[1]; ?></p>
																	</div>
																</div>
															<?php $i++;
															} ?>
														<?php } ?>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="row mt-4">
							<div class="col">
								<div class="row color p-1 d-flex justify-content-start align-items-center"><b>7.- Estrategia de evaluación</b></div>
								<div class="row mt-3 color-claro p-1" style="border-left: none; border-right: none;"><b>Criterios de evaluación</b></div>
								<div class="row mt-3" id="criterios">
									<div class="col">
										<div class="row">
											<div class="col-fluid color-claro p-2 d-flex justify-content-center align-items-center border-b-b border-t-b border-l-b" style="width: 20%; border-right: none;"><b class="text-center">Indicador</b></div>
											<div class="col-fluid color-claro p-2 d-flex justify-content-center align-items-center border-b-b border-t-b border-l-b" style="width: 55%; border-right: none;"><b class="text-center">Descripción del índicador</b></div>
											<div class="col-fluid color-claro p-2 d-flex justify-content-center align-items-center border-b-b border-t-b border-r-b border-l-b" style="width: 25%;"><b class="text-center">Valor del indicador</b></div>
										</div>
										<div class="row">
											<div class="col-fluid p-1 d-flex justify-content-center align-items-center border-b-b border-l-b" style="width: 20%;"><b>A</b></div>
											<div class="col-fluid p-1 d-flex justify-content-start align-items-center border-b-b border-l-b" style="width: 55%;">
												<p>Se adapta a situaciones y contextos complejos.</p>
											</div>
											<div class="col-fluid p-1 d-flex justify-content-center align-items-center border-b-b border-l-b border-r-b" style="width: 25%;"><b><?php if (isset(((array)$instrumentacion->Temas)[$tema]->ValorIndicadores)) print_r(((array)$instrumentacion->Temas)[$tema]->ValorIndicadores[1]); ?></b></div>
										</div>
										<div class="row">
											<div class="col-fluid p-1 d-flex justify-content-center align-items-center border-b-b border-l-b" style="width: 20%;"><b>B</b></div>
											<div class="col-fluid p-1 d-flex justify-content-start align-items-center border-b-b border-l-b" style="width: 55%;">
												<p>Hace aportaciones a las actividades académicas desarrolladas.</p>
											</div>
											<div class="col-fluid p-1 d-flex justify-content-center align-items-center border-b-b border-l-b border-r-b" style="width: 25%;"><b><?php if (isset(((array)$instrumentacion->Temas)[$tema]->ValorIndicadores)) print_r(((array)$instrumentacion->Temas)[$tema]->ValorIndicadores[2]); ?></b></div>
										</div>
										<div class="row">
											<div class="col-fluid p-1 d-flex justify-content-center align-items-center border-b-b border-l-b" style="width: 20%;"><b>C</b></div>
											<div class="col-fluid p-1 d-flex justify-content-start align-items-center border-b-b border-l-b" style="width: 55%;">
												<p>Propone y/o explica soluciones o procedimientos no vistos en clase (creatividad).</p>
											</div>
											<div class="col-fluid p-1 d-flex justify-content-center align-items-center border-b-b border-l-b border-r-b" style="width: 25%;"><b><?php if (isset(((array)$instrumentacion->Temas)[$tema]->ValorIndicadores)) print_r(((array)$instrumentacion->Temas)[$tema]->ValorIndicadores[3]); ?></b></div>
										</div>
										<div class="row">
											<div class="col-fluid p-1 d-flex justify-content-center align-items-center border-b-b border-l-b" style="width: 20%;"><b>D</b></div>
											<div class="col-fluid p-1 d-flex justify-content-start align-items-center border-b-b border-l-b" style="width: 55%;">
												<p>Introduce recursos y experiencias que promueven un pensamiento crítico.</p>
											</div>
											<div class="col-fluid p-1 d-flex justify-content-center align-items-center border-b-b border-l-b border-r-b" style="width: 25%;"><b><?php if (isset(((array)$instrumentacion->Temas)[$tema]->ValorIndicadores)) print_r(((array)$instrumentacion->Temas)[$tema]->ValorIndicadores[4]); ?></b></div>
										</div>
										<div class="row">
											<div class="col-fluid p-1 d-flex justify-content-center align-items-center border-b-b border-l-b" style="width: 20%;"><b>E</b></div>
											<div class="col-fluid p-1 d-flex justify-content-start align-items-center border-b-b border-l-b" style="width: 55%;">
												<p>Incorpora conocimientos y actividades interdisciplinarias en su aprendizaje.</p>
											</div>
											<div class="col-fluid p-1 d-flex justify-content-center align-items-center border-b-b border-l-b border-r-b" style="width: 25%;"><b><?php if (isset(((array)$instrumentacion->Temas)[$tema]->ValorIndicadores)) print_r(((array)$instrumentacion->Temas)[$tema]->ValorIndicadores[5]); ?></b></div>
										</div>
										<div class="row">
											<div class="col-fluid p-1 d-flex justify-content-center align-items-center border-b-b border-l-b" style="width: 20%;"><b>F</b></div>
											<div class="col-fluid p-1 d-flex justify-content-start align-items-center border-b-b border-l-b" style="width: 55%;">
												<p>Realiza su trabajo de manera autónoma y autorregulada.</p>
											</div>
											<div class="col-fluid p-1 d-flex justify-content-center align-items-center border-b-b border-l-b border-r-b" style="width: 25%;"><b><?php if (isset(((array)$instrumentacion->Temas)[$tema]->ValorIndicadores)) print_r(((array)$instrumentacion->Temas)[$tema]->ValorIndicadores[6]); ?></b></div>
										</div>
									</div>
								</div>
								<div class="row mt-3">
									<div class="col">
										<div class="row" id="indicadores">
											<div class="col">
												<div class="row">
													<div class="col-fluid color-claro p-1 d-flex justify-content-center align-items-center border-b-b border-l-b border-t-b" style="width: 20%; border-right: none;"><b class="text-center">Nivel de desempeño</b></div>
													<div class="col">
														<div class="row">
															<div class="col-fluid color-claro p-1 d-flex justify-content-center align-items-center border-b-b border-l-b border-t-b" style="border-right: none; width: 11%;"><b class="text-center">Nivel de desempeño</b></div>
															<div class="col-fluid color-claro p-1 d-flex justify-content-center align-items-center border-b-b border-l-b border-t-b" style="border-right: none; width: 78%;"><b class="text-center">Índicadores de alcance</b></div>
															<div class="col-fluid color-claro p-1 d-flex justify-content-center align-items-center border-b-b border-l-b border-r-b border-t-b" style="width: 11%;"><b class="text-center">Valoración númerica</b></div>
														</div>
													</div>
												</div>
												<div class="row">
													<div class="col-fluid d-flex justify-content-center align-items-center border-l-b border-b-b" style="width: 20%;"><b>Competencia alcanzada</b></div>
													<div class="col-fluid" style="width: 80%;">
														<div class="col h-100 d-flex flex-column">
															<div class="row" style="flex-grow: 1;">
																<div class="col-fluid p-1 d-flex justify-content-center align-items-center border-l-b border-b-b" style="width: 11%;"><b class="text-center">Excelente</b></div>
																<div class="col-fluid p-1 d-flex justify-content-start align-items-center border-l-b border-b-b" style="min-height: 120px; width: 78%">
																	<p><?php if (isset(((array)$instrumentacion->Temas)[$tema]->Indicadores)) print_r(((array)$instrumentacion->Temas)[$tema]->Indicadores); ?></p>
																</div>
																<div class="col-fluid p-1 d-flex justify-content-center align-items-center border-l-b border-b-b border-r-b" style="width: 11%;"><b class="text-center">95-100</b></div>
															</div>
															<div class="row">
																<div class="col-fluid p-1 d-flex justify-content-center align-items-center border-l-b border-b-b" style="width: 11%;"><b class="text-center">Notable</b></div>
																<div class="col-fluid p-1 d-flex justify-content-start align-items-center border-l-b border-b-b" style="width: 78%""><p>Cumple cuatro de los indicadores diferidos en desempeño excelente.</p></div>
															<div class=" col-fluid p-1 d-flex justify-content-center align-items-center border-l-b border-b-b border-r-b" style="width: 11%;"><b class="text-center">85-94</b></div>
															</div>
															<div class="row">
																<div class="col-fluid p-1 d-flex justify-content-center align-items-center border-l-b border-b-b" style="width: 11%;"><b class="text-center">Bueno</b></div>
																<div class="col-fluid p-1 d-flex justify-content-start align-items-center border-l-b border-b-b" style="width: 78%""><p>Cumple tres de los indicadores diferidos en desempeño excelente.</p></div>
															<div class=" col-fluid p-1 d-flex justify-content-center align-items-center border-l-b border-b-b border-r-b" style="width: 11%;"><b class="text-center">75-84</b></div>
															</div>
															<div class="row">
																<div class="col-fluid p-1 d-flex justify-content-center align-items-center border-l-b border-b-b" style="width: 11%;"><b class="text-center">Suficiente</b></div>
																<div class="col-fluid p-1 d-flex justify-content-start align-items-center border-l-b border-b-b" style="width: 78%""><p>Cumple dos de los indicadores diferidos en desempeño excelente.</p></div>
															<div class=" col-fluid p-1 d-flex justify-content-center align-items-center border-l-b border-b-b border-r-b" style="width: 11%;"><b class="text-center">70-74</b></div>
															</div>
														</div>
													</div>
												</div>
												<div class="row">
													<div class="col-fluid p-1 d-flex justify-content-center align-items-center border-l-b border-b-b" style="width: 20%;"><b>Compentencia no alcanzada</b></div>
													<div class="col-fluid" style="width: 80%;">
														<div class="col h-100 d-flex flex-column">
															<div class="row" style="flex-grow: 1;">
																<div class="col-fluid p-1 d-flex justify-content-center align-items-center border-l-b border-b-b" style="width: 11%;"><b class="text-center">Insuficiente </b></div>
																<div class="col-fluid p-1 d-flex justify-content-start align-items-center border-l-b border-b-b" style="width: 78%;">
																	<p>No se cumple con el 100% de evidencias conceptuales, procedimentales y actitudinales de los indicadores diferidos en el desempeño excelente.</p>
																</div>
																<div class="col-fluid p-1 d-flex justify-content-center align-items-center border-l-b border-b-b border-r-b" style="width: 11%;"><b class="text-center">N/A (no alcanzada)</b></div>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="row mt-3 color-claro p-1" style="border-left: none; border-right: none;"><b>Matríz de evaluación</b></div>
								<div class="row mt-3">
									<div class="col" id="matriz">
										<div class="row">
											<div class="col-fluid color-claro border-b-b border-l-b border-t-b d-flex justify-content-center align-items-center" style="width: 32%; border-right: none;"><b>Evidencia de aprendizaje</b></div>
											<div class="col-fluid color-claro border-b-b border-l-b border-t-b d-flex justify-content-center align-items-center" style="width: 10%; border-right: none;"><b>%</b></div>
											<div class="col-fluid" style="width: 25%;">
												<div class="col">
													<div class="row color-claro p-1 border-t-b border-b-b border-l-b d-flex justify-content-center align-items-center" style="border-right: none;"><b>Indicador de alcance</b></div>
													<div class="row color-claro border-l-b border-b-b" style="border-right: none;">
														<div class="col p-1 border-r-b d-flex justify-content-center align-items-center"><b>A</b></div>
														<div class="col p-1 border-r-b d-flex justify-content-center align-items-center"><b>B</b></div>
														<div class="col p-1 border-r-b d-flex justify-content-center align-items-center"><b>C</b></div>
														<div class="col p-1 border-r-b d-flex justify-content-center align-items-center"><b>D</b></div>
														<div class="col p-1 border-r-b d-flex justify-content-center align-items-center"><b>E</b></div>
														<div class="col p-1 d-flex justify-content-center align-items-center"><b>F</b></div>
													</div>
												</div>
											</div>
											<div class="col-fluid" style="width: 33%;">
												<div class="col">
													<div class="row color-claro p-1 border-t-b border-b-b border-l-b border-r-b d-flex justify-content-center align-items-center"><b>Método de evaluación</b></div>
													<div class="row color-claro border-l-b border-r-b border-b-b">
														<div class="col-fluid p-1 border-r-b d-flex justify-content-center align-items-center" style="width: 76%;"><b>Instrumento</b></div>
														<div class="col-fluid p-1 border-r-b d-flex justify-content-center align-items-center" style="width: 8%;"><b>P</b></div>
														<div class="col-fluid p-1 border-r-b d-flex justify-content-center align-items-center" style="width: 8%"><b>C</b></div>
														<div class="col-fluid p-1 d-flex justify-content-center align-items-center" style="width: 8%;"><b>A</b></div>
													</div>
												</div>
											</div>
										</div>
										<?php if (isset(((array)$instrumentacion->Temas)[$tema]->MatrizEvaluacion)) {
											$evaluaciones = ((array)$instrumentacion->Temas)[$tema]->MatrizEvaluacion;
											foreach ($evaluaciones as $evaluacion) {
												$evaluacion[9]  = ($evaluacion[9] == "1")  ? "X" : " ";
												$evaluacion[10] = ($evaluacion[10] == "1") ? "X" : " ";
												$evaluacion[11] = ($evaluacion[11] == "1") ? "X" : " ";  ?>

												<div class="row">
													<div class="col-fluid p-1 border-l-b border-b-b d-flex justify-content-start align-items-center" style="width: 32%;"><b><?php echo $evaluacion[0]; ?></b></div>
													<div class="col-fluid p-1 border-l-b border-b-b d-flex justify-content-center align-items-center" style="width: 10%"><b><?php echo $evaluacion[1]; ?></b></div>
													<div class="col-fluid" style="width: 25%;">
														<div class="col h-100 d-flex flex-column">
															<div class="row border-l-b border-b-b" style="flex-grow: 1;">
																<div class="col p-1 border-r-b d-flex justify-content-center align-items-center"><b><?php echo $evaluacion[2]; ?></b></div>
																<div class="col p-1 border-r-b d-flex justify-content-center align-items-center"><b><?php echo $evaluacion[3]; ?></b></div>
																<div class="col p-1 border-r-b d-flex justify-content-center align-items-center"><b><?php echo $evaluacion[4]; ?></b></div>
																<div class="col p-1 border-r-b d-flex justify-content-center align-items-center"><b><?php echo $evaluacion[5]; ?></b></div>
																<div class="col p-1 border-r-b d-flex justify-content-center align-items-center"><b><?php echo $evaluacion[6]; ?></b></div>
																<div class="col p-1 d-flex justify-content-center align-items-center"><b><?php echo $evaluacion[7]; ?></b></div>
															</div>
														</div>
													</div>
													<div class="col-fluid" style="width: 33%;">
														<div class="col h-100 d-flex flex-column">
															<div class="row border-l-b border-b-b border-r-b" style="flex-grow: 1;">
																<div class="col-fluid p-1 border-r-b d-flex justify-content-start align-items-center" style="width: 76%;"><b><?php echo $evaluacion[8]; ?></b></div>
																<div class="col-fluid p-1 border-r-b d-flex justify-content-center align-items-center" style="width: 8%;"><b><?php echo $evaluacion[9]; ?></b></div>
																<div class="col-fluid p-1 border-r-b d-flex justify-content-center align-items-center" style="width: 8%"><b><?php echo $evaluacion[10]; ?></b></div>
																<div class="col-fluid p-1 d-flex justify-content-center align-items-center" style="width: 8%;"><b><?php echo $evaluacion[11]; ?></b></div>
															</div>
														</div>
													</div>
												</div>
											<?php } ?>
										<?php } ?>
										<div class="row">
											<div class="col-fluid p-1 border-b-b border-l-b d-flex justify-content-center align-items-center" style="width: 32%;"><b>Total</b></div>
											<div class="col-fluid p-1 border-b-b border-l-b d-flex justify-content-center align-items-center" style="width: 10%; border-right: none;">
												<p><?php if (isset(((array)$instrumentacion->Temas)[$tema]->ValorIndicadores)) print_r(((array)$instrumentacion->Temas)[$tema]->ValorIndicadores[0]); ?></p>
											</div>
											<div class="col-fluid" style="width: 25%;">
												<div class="col h-100 d-flex flex-column">
													<div class="row border-l-b border-b-b" style="flex-grow: 1;">
														<div class="col p-1 border-r-b d-flex justify-content-center align-items-center">
															<p><?php if (isset(((array)$instrumentacion->Temas)[$tema]->ValorIndicadores)) print_r(((array)$instrumentacion->Temas)[$tema]->ValorIndicadores[1]); ?></p>
														</div>
														<div class="col p-1 border-r-b d-flex justify-content-center align-items-center">
															<p><?php if (isset(((array)$instrumentacion->Temas)[$tema]->ValorIndicadores)) print_r(((array)$instrumentacion->Temas)[$tema]->ValorIndicadores[2]); ?></p>
														</div>
														<div class="col p-1 border-r-b d-flex justify-content-center align-items-center">
															<p><?php if (isset(((array)$instrumentacion->Temas)[$tema]->ValorIndicadores)) print_r(((array)$instrumentacion->Temas)[$tema]->ValorIndicadores[3]); ?></p>
														</div>
														<div class="col p-1 border-r-b d-flex justify-content-center align-items-center">
															<p><?php if (isset(((array)$instrumentacion->Temas)[$tema]->ValorIndicadores)) print_r(((array)$instrumentacion->Temas)[$tema]->ValorIndicadores[4]); ?></p>
														</div>
														<div class="col p-1 border-r-b d-flex justify-content-center align-items-center">
															<p><?php if (isset(((array)$instrumentacion->Temas)[$tema]->ValorIndicadores)) print_r(((array)$instrumentacion->Temas)[$tema]->ValorIndicadores[5]); ?></p>
														</div>
														<div class="col p-1 d-flex justify-content-center align-items-center">
															<p><?php if (isset(((array)$instrumentacion->Temas)[$tema]->ValorIndicadores)) print_r(((array)$instrumentacion->Temas)[$tema]->ValorIndicadores[6]); ?></p>
														</div>
													</div>
												</div>
											</div>
											<div class="col-fluid" style="width: 33%;">
												<div class="col h-100 d-flex flex-column">
													<div class="row border-l-b border-r-b border-b-b" style="flex-grow: 1;">
														<div class="col-fluid p-1 border-r-b d-flex justify-content-center align-items-center" style="width: 76%;"><b></b></div>
														<div class="col-fluid p-1 border-r-b d-flex justify-content-center align-items-center" style="width: 8%;"><b></b></div>
														<div class="col-fluid p-1 border-r-b d-flex justify-content-center align-items-center" style="width: 8%"><b></b></div>
														<div class="col-fluid p-1 d-flex justify-content-center align-items-center" style="width: 8%;"><b></b></div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="row mt-4">
							<div class="col" id="calendarizacion">
								<div class="row color p-1 d-flex justify-content-start align-items-center"><b>8.- Calendarización de evaluación en semanas</b></div>
								<?php
								$grupo = $grupoins; //$instrumentacion->Grupo;

								$nc = explode(",", $grupo);
								//echo $grupo;
								//echo count($nc);
								if (isset($instrumentacion->Temas->$tema->Fechas->$grupo)) {
									$datos = $instrumentacion->Temas->$tema->Fechas->$grupo;
									//print_r($datos);
									//echo count($datos); 
								?>

									<div class="row mt-3">
										<div class="col">
											<?php for ($ii = 0; $ii < count($datos); $ii += 3) { ?>
												<div class="row">
													<div class="col-fluid p-1 color-claro border-l-b border-t-b d-flex justify-content-center align-items-center" style="border-right: 0; width: 20%"><b class="text-center">Grupo</b></div>
													<div class="col-fluid p-1 border-l-b border-t-b d-flex justify-content-center align-items-center" style="width: 18%;">
														<p><?php print_r($datos[$ii]); ?></p>
													</div>
													<div class="col-fluid p-1 color-claro border-l-b border-t-b d-flex justify-content-center align-items-center" style="border-right: 0; width: 18%;"><b class="text-center">Fecha de inicio programado</b></div>
													<div class="col p-1 border-l-b border-t-b d-flex justify-content-center align-items-center">
														<p><?php print_r($datos[$ii + 1]); ?></p>
													</div>
													<div class="col-fluid p-1 color-claro border-l-b border-t-b d-flex justify-content-center align-items-center" style="border-right: 0; width: 18%"><b class="text-center">Fecha de Término</b></div>
													<div class="col border-l-b p-1 border-t-b border-r-b d-flex justify-content-center align-items-center">
														<p><?php print_r($datos[$ii + 2]); ?></p>
													</div>
												</div>
											<?php }
											$total = count($datos) / 3;
											for ($i = $total; $i < 4; $i++) { ?>
												<div class="row">
													<div class="col-fluid p-1 color-claro border-l-b border-t-b <?php echo $i == 3 ? 'border-b-b' : '' ?> d-flex justify-content-center align-items-center" style="border-right: 0; width: 20%"><b class="text-center">Grupo</b></div>
													<div class="col-fluid p-1 border-l-b border-t-b <?php echo $i == 3 ? 'border-b-b' : '' ?> d-flex justify-content-center align-items-center" style="width: 18%;">
														<p>xxxxx</p>
													</div>
													<div class="col-fluid p-1 color-claro border-l-b border-t-b <?php echo $i == 3 ? 'border-b-b' : '' ?> d-flex justify-content-center align-items-center" style="border-right: 0; width: 18%;"><b class="text-center">Fecha de inicio programado</b></div>
													<div class="col p-1 border-l-b border-t-b <?php echo $i == 3 ? 'border-b-b' : '' ?> d-flex justify-content-center align-items-center">
														<p>xxxxx</p>
													</div>
													<div class="col-fluid p-1 color-claro border-l-b border-t-b <?php echo $i == 3 ? 'border-b-b' : '' ?> d-flex justify-content-center align-items-center" style="border-right: 0; width: 18%"><b class="text-center">Fecha de Término</b></div>
													<div class="col border-l-b p-1 border-t-b border-r-b <?php echo $i == 3 ? 'border-b-b' : '' ?> d-flex justify-content-center align-items-center">
														<p>xxxxx</p>
													</div>
												</div>
											<?php }
											?>
										</div>
									</div>
								<?php
								} else { ?>
									<div class="row mt-3">
										<div class="col">

											<?php for ($i = 0; $i < 4; $i++) { ?>
												<div class="row">
													<div class="col-fluid p-1 color-claro border-l-b border-t-b <?php echo $i == 3 ? 'border-b-b' : '' ?> d-flex justify-content-center align-items-center" style="border-right: 0; width: 20%"><b class="text-center">Grupo</b></div>
													<div class="col-fluid p-1 border-l-b border-t-b <?php echo $i == 3 ? 'border-b-b' : '' ?> d-flex justify-content-center align-items-center" style="width: 18%;"></div>
													<div class="col-fluid p-1 color-claro border-l-b border-t-b <?php echo $i == 3 ? 'border-b-b' : '' ?> d-flex justify-content-center align-items-center" style="border-right: 0; width: 18%;"><b class="text-center">Fecha de inicio programado</b></div>
													<div class="col p-1 border-l-b border-t-b <?php echo $i == 3 ? 'border-b-b' : '' ?> d-flex justify-content-center align-items-center"></div>
													<div class="col-fluid p-1 color-claro border-l-b border-t-b <?php echo $i == 3 ? 'border-b-b' : '' ?> d-flex justify-content-center align-items-center" style="border-right: 0; width: 18%"><b class="text-center">Fecha de Término</b></div>
													<div class="col border-l-b p-1 border-t-b border-r-b <?php echo $i == 3 ? 'border-b-b' : '' ?> d-flex justify-content-center align-items-center"></div>
												</div>
											<?php } ?>
										</div>
									</div>

								<?php } ?>
								<div class="row mt-3">
									<div class="col">
										<div class="row">
											<div class="col-fluid p-1 color-claro border-t-b border-l-b d-flex justify-content-center align-items-center" style="width: 20%; border-right: 0;"><b>Semana</b></div>
											<div class="col color-claro border-t-b border-r-b border-l-b">
												<div class="row h-100">
													<?php for ($i = 1; $i <= 18; $i++) { ?>
														<div class="col p-1 <?php echo $i == 18 ? '' : 'border-r-b' ?> d-flex justify-content-center align-items-center"><b><?php echo $i ?></b></div>
													<?php } ?>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col">
												<div class="row">
													<div class="col-fluid p-1 color-claro border-l-b border-t-b border-b-b d-flex justify-content-center align-items-center" style="width: 20%; border-right: 0;"><b>Tiempo planeado</b></div>
													<div class="col border-t-b border-r-b border-l-b border-b-b">
														<div class="row h-100">
															<?php
															$grupo = $grupoins;
															if (isset($instrumentacion->Temas->$tema->Semanas->$grupo)) {
																$datos = $instrumentacion->Temas->$tema->Semanas->$grupo;
																//print_r($datos);  
																for ($ii = 0; $ii < count($datos); $ii++) { ?>
																	<div class="col p-1 <?php echo $ii == count($datos) - 1 ? '' : 'border-r-b' ?> d-flex justify-content-center align-items-center" style="white-space: pre-wrap;">
																		<p class="text-center"><?php echo $datos[$ii]; ?></p>
																	</div>
																<?php } ?>

																<?php
															} else {
																for ($i = 1; $i <= 18; $i++) { ?>
																	<div class="col p-1 <?php echo $i == 18 ? '' : 'border-r-b' ?> d-flex justify-content-center align-items-center" style="white-space: pre-wrap;"><b class="text-center"></b></div>
																<?php } ?>
															<?php
															}
															?>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="row d-flex justify-content-start align-items-center mt-3">
									<div class="col-fluid" style="width: 12%;"></div>
									<div class="col">
										<div class="row"><b>SD Seguimiento departamental</b></div>
										<div class="row"><b>ED Evaluación diagnóstica</b></div>
										<div class="row"><b>Efn Evaluación formativa (competencia especifica)</b></div>
										<div class="row"><b>ES Evaluación sumativa</b></div>
									</div>
								</div>
							</div>
						</div>
						<div class="row mt-4">
							<div class="col" id="fuentes">
								<div class="row mb-2 color p-1 d-flex justify-content-start align-items-center"><b>9- Fuentes de Información</b></div>
								<?php if (isset(((array)$instrumentacion->Temas)[$tema]->Fuentes)) {
									$fuentes = ((array)$instrumentacion->Temas)[$tema]->Fuentes;
									$fuentes = explode("\n", $fuentes);
									$i = 1;
									foreach ($fuentes as $fuente) {  ?>

										<div class="row border-b-b">
											<div class="col-fluid p-1 d-flex justify-content-center align-items-center" style="width: 5%;"><b><?php echo $i; ?></b></div>
											<div class="col-fluid p-1 d-flex justify-content-start align-items-center" style="width: 95%">
												<p><?php echo $fuente; ?></p>
											</div>
										</div>

									<?php $i++;
									} ?>
								<?php } ?>
							</div>
						</div>
						<div class="row mt-5 mb-2">
							<div class="col">
								<div class="row d-flex justify-content-center align-items-center">
									<div class="col-4">
										<div class="row color p-1 d-flex justify-content-center align-items-center"><b>Docente que imparte asignatura</b></div>
										<div class="row color-claro d-flex justify-content-center align-items-center" style="border: 0; min-height: 110px;">
											<?php
											//Obtener la firma del docente desde la base de datos a partir del ID enviado
											if ($correoDocente != "") {
												$firma = $connSQL->singlePreparedQuery("SELECT firma FROM docentes WHERE cat_CorreoE = :correoDocente", ['correoDocente' => $correoDocente]);
											}
											?>
											<?php echo $firma['firma'] && $firma['firma'] != '' ? '<img src="firmasimagenes/' . $firma['firma'] . '" alt="" class="img-fluid" style="height: 90px;">' : '<i>Firma</i>' ?>
										</div>
										<div class="row p-1 color-claro d-flex justify-content-center align-items-center" style="border: none;"><i><?php echo $nombre ?></i></div>
									</div>
								</div>
								<div class="row mt-4 d-flex justify-content-around">
									<div class="col-4">
										<div class="row color p-1 d-flex justify-content-center align-items-center"><b>Validó</b></div>
										<div class="row color-claro d-flex justify-content-center align-items-center" style="border: 0; min-height: 110px;">
											<?php
											//Verificar que el presidente ya haya validado la instrumentacion, si es asi, mostrar la firma
											$imgFirma = "";
											if (isset($instrumentacion->Validacion->Estatus) && isset($instrumentacion->Validacion->InfoPresidente)) {
												if ($instrumentacion->Validacion->Estatus) {
													$firma = $connSQL->singlePreparedQuery("SELECT firma FROM docentes WHERE cat_CorreoE = :correoPresidente", ['correoPresidente' => $instrumentacion->Validacion->InfoPresidente->CorreoPresidente]);
													$imgFirma = $firma ? $firma['firma'] : '';
												}
											}
											?>
											<?php echo $imgFirma != '' ? '<img src="firmasimagenes/' . $imgFirma . '" alt="" class="img-fluid" style="height: 90px;">' : '<i>Firma</i>'; ?>
										</div>
										<div class="row p-1 color-claro d-flex justify-content-center align-items-center" style="border: none;"><i><?php echo isset($instrumentacion->Validacion->InfoPresidente->NombrePresidente) ? $instrumentacion->Validacion->InfoPresidente->NombrePresidente : '<i>Nombre</i>'  ?></i></div>
										<?php echo isset($instrumentacion->Validacion->InfoPresidente->GrupoAcademico) ? '<div class="row p-1 color-claro d-flex justify-content-center align-items-center" style="border: none; text-align: center;"><i>Presidente de grupo académico de ' . $instrumentacion->Validacion->InfoPresidente->GrupoAcademico . '</i></div>' : '' ?> 
									</div>
									<div class="col-4">
										<div class="row color p-1 d-flex justify-content-center align-items-center"><b>Autorizó</b></div>
										<div class="row color-claro d-flex justify-content-center align-items-center" style="border: 0; min-height: 110px;">
											<?php
											//Verificar que el jefe de division ya haya validado la instrumentacion
											$imgFirma = "";
											if (isset($instrumentacion->TodasMaterias->Validacion->Estatus) && isset($instrumentacion->TodasMaterias->Validacion->InfoJefeDivision)) {
												if ($instrumentacion->TodasMaterias->Validacion->Estatus) {
													$firma = $connSQL->singlePreparedQuery("SELECT firma FROM docentes WHERE cat_CorreoE = :correoJefeDivision", ['correoJefeDivision' => $instrumentacion->TodasMaterias->Validacion->InfoJefeDivision->CorreoJefeDivision]);
													$imgFirma = $firma ? $firma['firma'] : '';
												}
											}
											?>
											<?php echo $imgFirma != '' ? '<img src="firmasimagenes/' . $imgFirma . '" alt="" class="img-fluid" style="height: 90px;">' : '<i>Firma</i>'; ?>
										</div>
										<div class="row p-1 color-claro d-flex justify-content-center align-items-center" style="border: none;"><i><?php echo isset($instrumentacion->TodasMaterias->Validacion->InfoJefeDivision->NombreJefeDivision) ? $instrumentacion->TodasMaterias->Validacion->InfoJefeDivision->NombreJefeDivision : '<i>Nombre</i>' ?></i></div>
										<?php 
										if (isset($instrumentacion->TodasMaterias->Validacion->Estatus) && isset($instrumentacion->TodasMaterias->Validacion->InfoJefeDivision)) {
											if ($instrumentacion->TodasMaterias->Validacion->Estatus) {
												echo '<div class="row p-1 color-claro d-flex justify-content-center align-items-center" style="border: none; text-align: center;"><i>Jefe de división del PE de ' .  mb_convert_case($instrumentacion->TodasMaterias->PE, MB_CASE_TITLE, 'UTF-8') . '</i></div>';
											}
										}
										?>
									</div>
								</div>
							</div>
						</div>
					<?php
					else :
						echo "<div class='row mt-3'><p class='text-warning'>¡No existen campos llenados en el tema!</p></div>";
					endif; ?>
				</div>
			</div>
		</div>
	</div>
	<script type="text/javascript">
		function descargarPDFInstrumento(elemento) {
			$(elemento).prop("disabled", true);
			$(elemento).html('<span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>Descargando...');

			//Generar el PDF con la vista de la instrumentacion, conforme a los datos ingresados
			var nombrePDF = '<?php echo 'INSTRUMENTACIÓN_' . (isset($instrumentacion->Materia) ? $instrumentacion->Materia : '') . '_Tema-' . (isset($tema) ? $tema : '') . '_' . (isset($periodo) ? $periodo : '') . '_' . (isset($grupo1) && $grupo != "" ? $grupo1 . '_' : '') . (isset($grupo2) && $grupo2 != "" ? $grupo2 . '_' : '') . (isset($grupo3) && $grupo3 != "" ? $grupo3 . '_' : '') . (isset($grupo4) && $grupo4 != "" ? $grupo4 . '_' : '') . '_' . (isset($instrumentacion->ClaveAsignatura) ? $instrumentacion->ClaveAsignatura : ''); ?>' + '.pdf';
			var $elemento = document.getElementById("contenedor-instrumento");
			html2pdf().set({
				margin: [0, 0, 10, 0],
				//margin: 0,
				filename: nombrePDF,
				image: {
					type: 'jpeg',
					quality: 1
				},
				html2canvas: {
					scale: 3,
					scrollY: 0
				},
				pagebreak: { mode: ['avoid-all', 'css', 'legacy'] },
				jsPDF: {
					unit: "mm",
					format: "a3",
					orientation: "portrait"
				}
			})
			.from($elemento)
			.save()
			.then(function() {
				$(elemento).html('<i class="fa-solid fa-file-pdf pr-2"></i>Descargar PDF');
				$(elemento).prop("disabled", false);
			})
			.error(function(){
				$(elemento).html('<i class="fa-solid fa-file-pdf pr-2"></i>Descargar PDF');
				$(elemento).prop("disabled", false);
			});
		}
	</script>
</body>

</html>