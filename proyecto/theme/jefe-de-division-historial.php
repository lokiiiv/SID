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
            <div class="row mt-2">
                <div class="col-12">
                    <h5>Historial de instrumentaciones autorizadas.</h5>
                </div>
            </div>
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
                    <div id="contenedor-instru-historial-jefedivision">

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

        function seleccionarPeriodo(periodo) {
            if(periodo != "&nbsp;") {
                $.ajax({
                    data: {
                        'accion': 'historialValidacionesJefeDivision',
                        'periodo': periodo,
                        'idJefeDivision': '<?php echo $_SESSION["idUsuario"]; ?>'
                    },
                    url: 'conexion/consultasNoSQL.php',
                    method: 'post',
                    success: function(response) {
                        console.log(JSON.parse(response));
                        var res = JSON.parse(response);
                        if(res.success) {
                            $("#contenedor-instru-historial-jefedivision").css("display", "block");
                            mostrarInstrumentaciones(res.data);
                        }
                    }
                });
            } else {
                $("#contenedor-instru-historial-jefedivision").css("display", "none");
            }
        }

        function mostrarInstrumentaciones(instrumentaciones) {
            var htmlListaContenido = '';
            var hasInstru = instrumentaciones.length != 0 ? true : false;

            if(hasInstru) {
                instrumentaciones.forEach(inst => {
					htmlListaContenido += 	'<div class="list-group-item list-group-item-action flex-column align-items-start item-instrumentacion">' + 
												'<div class="row">' +
													'<div class="col-lg-12 informacion">' + 
														'<h5 class="nombre-asignatura">' + (inst.instrumentaciones.v.Materia != undefined ? inst.instrumentaciones.v.Materia : '') + '</h5>' + 
														'<h6 class="clave-asignatura" data-clave="' + (inst.instrumentaciones.k != undefined ? inst.instrumentaciones.k : '') + '">Clave de asignatura: ' + (inst.instrumentaciones.k != undefined ? inst.instrumentaciones.k : '') + '</h6>' +
														'<h6>Número de temas: ' + (inst.instrumentaciones.v.totalTemas != undefined ? inst.instrumentaciones.v.totalTemas : '') + '</h6>' +
														'<h6 class="programa-educativo" data-clave="' + (inst.instrumentaciones.v.TodasMaterias.PE != undefined ? inst.instrumentaciones.v.TodasMaterias.PE : '') + '">Programa educativo: ' + (inst.instrumentaciones.v.TodasMaterias.PE != undefined ? inst.instrumentaciones.v.TodasMaterias.PE : '') + '</h6>' +
														'<h6>Los siguientes grupos comparten la presente instrumentación.</h6>' +
												        '<div class="row mb-2">';
					inst.instrumentaciones.v.TodasMaterias.Grupos.forEach(grupo => {
						htmlListaContenido += 			    '<div class="col-md-4 col-sm-6 col-12 mb-1">' +
																'<h6 style="font-size: 13px;" class="nombre-programa-edu"><span class="badge badge-pill badge-info font-weight-normal" style="font-size: 14px;" data-semestre="' + (inst.instrumentaciones.v.TodasMaterias.Semestre != undefined ? inst.instrumentaciones.v.TodasMaterias.Semestre : '') + '" data-grupo="' + (grupo.grupo != undefined ? grupo.grupo : '') + '">' + (grupo.grupo != undefined ? grupo.grupo : '') + '</span></h6>' +	
																'<h6 style="font-size: 12px;" class="nombre-docente" data-nombre-docente="' + (grupo.nombre != undefined ? grupo.nombre : '') + '" data-correo-docente="' + (grupo.correo != undefined ? grupo.correo : '') + '">Docente: ' + (grupo.nombre != undefined ? grupo.nombre : '') + '</h6>' +	
															'</div>';	
						});										
						htmlListaContenido +=			'</div>' +
														'<div class="row">' +
															'<div class="col">';
						if(inst.instrumentaciones.v.Temas != undefined && inst.instrumentaciones.v.Temas != null) {
							inst.instrumentaciones.v.Temas.forEach(tema => {
								htmlListaContenido += 			'<div class="btn-group m-1">' +
																	'<button type="button" class="btn btn-info btn-sm abrirInstruTema" data-tema="' + tema.Tema + '">Tema ' + tema.Tema + '</button>' +
																	'<button type="button" class="btn btn-sm btn-info dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">' +
																		'<span class="sr-only">Toggle Dropdown</span>' +
																	'</button>';
						if(tema.Matriz != undefined && tema.Matriz != null) {
							htmlListaContenido +=				    '<div class="dropdown-menu">';
							tema.Matriz.forEach(tem => {
								htmlListaContenido +=				    '<a class="dropdown-item abrirEvidencia" href="#" data-evidencia="' + tem[12] + '">' + tem[0] + '</a>';
							});
						} else {
							htmlListaContenido += 			        '<div class="dropdown-menu">' +
																		'<a class="dropdown-item" href="#">¡No se generaron evidencias!</a>';
						}
						htmlListaContenido += 				    '</div>' + 
															'</div>';
						});
					} else {
						htmlListaContenido += '<h6>¡No se llenaron temas en la instrumentación!</h6>';
					}										
					htmlListaContenido +=					'</div>' +
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
            $("#contenedor-instru-historial-jefedivision").html(htmlListaContenido);
        }
    </script>
</body>
</html>