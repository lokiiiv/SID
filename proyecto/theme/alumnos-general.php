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

    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/sina-nav.min.css">

	<!-- Font awesome CSS -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style>
        #modal-instrumento .modal-dialog {
			position: relative;
			display: table;
			overflow: auto;
			width: auto;
			min-width: 300px;
		}
		#modal-instrumento .modal-body { /* Restrict Modal width to 90% */
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
        <?php if($u->hasPrivilegio("consultar_instrumentacion_alumno")) { ?>
            <div class="container">
                <div class="row  mt-3">
                    <div class="col-12">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.php">Inicio</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Alumnos</li>
                            </ol>
                        </nav>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 d-flex flex-wrap">
                        <div id="conte-periodo">
                            <form action="" method="POST">
                                <div class="form-group">
                                    <label class="control-label" for="select"><h4>Periodo</h4></label>
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
                        <div class="d-flex align-items-end ml-lg-3 ml-md-3 ml-sm-3 ml-0">
                            <div class="form-group" id="conte-buscar-grupo" style="display: none;">
                                <div class="input-group">
                                    <input type="text" name="search" id="search-input-grupo" class="form-control rounded-1 border-info" placeholder="Ingrese grupo" autocomplete="off" required onkeyup="this.value = this.value.toUpperCase();">
                                    <div class="input-group-append">
                                        <input type="button" name="search" value="Cancelar" class="btn btn-danger cancelar-search rounded-1">
                                    </div>
                                </div>
                                
                                <div class="list-group" id="show-list-grupos" style="position: absolute; z-index: 999;">
                                    <!-- Aqui se mostraran los grupos que se vayan buscando -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div id="contenedor-instru">

                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>

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
        var periodo = "";
        function seleccionarPeriodo(periodo) {
            if(periodo != "&nbsp;") {
                //Mostrar el input para ingresar el grupo a buscar
                $("#conte-buscar-grupo").css("display", "block");
                $("#search-input-grupo").val("");
                $("#show-list-grupos").html("");
            } else {
                $("#conte-buscar-grupo").css("display", "none");
                $("#search-input-grupo").val("");
                $("#show-list-grupos").html("");
            }
        }

        $(document).on('click', '.cancelar-search', function() {
            $("#search-input-grupo").val("");
            $("#selectPeriodo").prop("selectedIndex", 0);
            $("#conte-buscar-grupo").css("display", "none");
            $("#show-list-grupos").html("");
        });

        $(document).on('keyup', '#search-input-grupo', function() {
            var searchText = $(this).val().trim();
            var periodo = $("#selectPeriodo").val();
            if(searchText != "" && searchText.length >= 4) {
                $.ajax({
                    data: {
                        'accion': 'obtenerGruposAlumnos',
                        'periodo': periodo,
                        'texto': searchText
                    },
                    url: 'conexion/consultasNoSQL.php',
                    method: 'post',
                    success: function(response) {
                        $("#show-list-grupos").html(JSON.parse(response).data);
                    }
                });
            } else {
                $("#show-list-grupos").html("");
            }
        });
        $("#show-list-grupos").on('click', 'a', function(e){
            e.preventDefault();

            periodo = $("#selectPeriodo").val();
            var claveAsignatura = $(this).attr('data-clave-asignatura');
            var grupo = $(this).attr('data-id');
            var nombreDocente = $(this).attr('data-docente');
            var correoDocente = $(this).attr('data-correo-docente');

            $("#search-input-grupo").val();
            $("#selectPeriodo").prop("selectedIndex", 0);
            $("#conte-buscar-grupo").css("display", "none");
            $("#show-list-grupos").html("");
            
            $.ajax({
                data: {
                    'accion': 'obtenerInstrumentacionAlumno',
                    'clave-asignatura': claveAsignatura,
                    'grupo': grupo,
                    'periodo': periodo
                },
                url: 'conexion/consultasNoSQL.php',
                method: 'post',
                success: function(response) {
                    var res = JSON.parse(response);
                    if(res.success) {
                       var instrumentacion = res.data;
                        var htmlContenido = '';
                        htmlContenido += '<div class="list-group-item list-group-item-action flex-column align-items-start item-instrumentacion">' + 
                                            '<div class="row">' + 
                                                '<div class="col-12">' +
                                                    '<h5 class="grupo" data-grupo="' + grupo + '">' + grupo + '</h5>' +
                                                    '<h5 class="nombre-asignatura">' + (instrumentacion.Materia != undefined ? instrumentacion.Materia : '') + '</h5>' + 
                                                    '<h5 class="instru-periodo">' + periodo + '</h5>' +
                                                    '<h6 class="nombre-docente" data-docente="' + nombreDocente + '" data-correo-docente="' + correoDocente + '">' + nombreDocente + '</h6>' +
                                                    '<h6 class="clave-asignatura" data-clave="' + (instrumentacion.ClaveAsignatura != undefined ? instrumentacion.ClaveAsignatura : '') + '">Clave de asignatura: ' + (instrumentacion.ClaveAsignatura != undefined ? instrumentacion.ClaveAsignatura : '') + '</h6>' +
                                                    '<h6>Número de temas: ' + (instrumentacion.TotalTemas != undefined ? instrumentacion.TotalTemas: '') + '</h6>' +
                                                    '<h6 class="programa-educativo" data-clave="' + (instrumentacion.TodasMaterias.PE != undefined ? instrumentacion.TodasMaterias.PE : '') + '">Programa educativo: ' + (instrumentacion.TodasMaterias.PE != undefined ? instrumentacion.TodasMaterias.PE : '') + '</h6>' +
                                                    '<div class="row mt-3">' + 
                                                        '<div class="col">';
                        if(instrumentacion.Temas != undefined && instrumentacion.Temas != null) {
                            instrumentacion.Temas.forEach(tema => {
                                htmlContenido +=            '<div class="btn-group m-1">' + 
                                                                '<button type="button" class="btn btn-info btn-sm abrirInstruTema" data-tema="' + tema.Tema + '">Tema ' + tema.Tema + '</button>' +
                                                                '<button type="button" class="btn btn-sm btn-info dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">' +
																	'<span class="sr-only">Toggle Dropdown</span>' +
																'</button>';
                                if(tema.Matriz != undefined && tema.Matriz != null) {
                                    htmlContenido +=		'<div class="dropdown-menu">';
                                    tema.Matriz.forEach(tem => {
                                        htmlContenido +=	    '<a class="dropdown-item abrirEvidencia" href="#" data-evidencia="' + tem[12] + '">' + tem[0] + '</a>';
                                    });
                                } else {
                                    htmlContenido += 		'<div class="dropdown-menu">' +
																	'<a class="dropdown-item" href="#">¡No se generaron evidencias!</a>';
                                }
                                htmlContenido +=                '</div>'+
                                                            '</div>';
                            });
                        } else {
                            htmlContenido += '<h6>¡No se llenaron temas en la instrumentación!</h6>';
                        }
                        htmlContenido +=                '</div>' +
                                                    '</div>' +
                                                '</div>' +
                                            '</div>' +
                                        '</div>';

                        $("#contenedor-instru").html(htmlContenido);
                    } else {
                        alertify.warning('<h3>' + res.mensaje + '</h3>');
                        $("#contenedor-instru").html("");
                    }
                }
            });
        });

        $(document).on('click', '.abrirEvidencia', function(e) {
            e.preventDefault();
        });
        $(document).on('click', '.abrirInstruTema', function(e) {
            var claveAsignatura = $(this).closest('.item-instrumentacion').find('.clave-asignatura').attr('data-clave');
			var tema = $(this).attr('data-tema');
            var grupo = $(this).closest('.item-instrumentacion').find('.grupo').text();
            var asignatura = $(this).closest('.item-instrumentacion').find('.nombre-asignatura').text();
            var nombreDocente = $(this).closest('.item-instrumentacion').find('.nombre-docente').attr('data-docente');
            var correoDocente = $(this).closest('.item-instrumentacion').find('.nombre-docente').attr('data-correo-docente');

            $("#contenedor-instrumento").load("generarInstrumentacion.php?grupo=" + encodeURI(grupo) + "&periodo=" + encodeURI(periodo) + "&tema=" + encodeURI(tema) + "&docenteEjemplo=" + encodeURI(nombreDocente) + "&claveAsignatura=" + encodeURI(claveAsignatura) + "&correoDocente=" + encodeURI(correoDocente), function(response) {
                $("#modal-instrumento .modal-title").text("Instrumentación didáctica del Tema No. " + tema + " de la asignatura de " + asignatura + " (" + claveAsignatura + ").");
				$("#modal-instrumento").modal('show');
            });
        });
        $('#modal-instrumento').on('show.bs.modal', function() {
			$(".modal-body").css("padding",'0px');
		});
		$('#modal-instrumento').on('hidden.bs.modal', function() {
			$(".modal-body").removeAttr('style');
		});
    </script>
</body>
</html>