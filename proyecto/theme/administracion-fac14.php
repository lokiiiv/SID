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

    <!-- Datatables -->
    <link rel="stylesheet" href="datatables/datatables.min.css">
    <link rel="stylesheet" href="datatables/DataTables-1.13.1/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="datatables/Responsive-2.4.0/css/responsive.bootstrap4.min.css">

    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/sina-nav.min.css">
</head>

<body>
	<?php
	include("BarraMenu.php");
	?>

	<div class="content">
        <?php if($u->hasPrivilegio("acceso_alumnos_al_fac14")) { ?>
            <div class="container">
                <div class="row  mt-3">
                    <div class="col-12">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.php">Inicio</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Alumnos con acceso a FAC-14</li>
                            </ol>
                        </nav>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <h6>En esta sección debe elegir el periodo y alumno al cual le puede asignar el grupo/grupos para permitir firmar los seguimientos FAC-14.</h6>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-12 d-flex flex-wrap">
                        <div id="conte-periodo">
                            <form action="" method="POST">
                                <div class="form-group">
                                    <label class="control-label" for="select"><h4>Periodo</h4></label>
                                    <select class="form-control" id="selectPeriodo" name="periodo" Onchange="seleccionarPeriodo(this);">
                                        <option>&nbsp;</option>
                                        <?php
                                        require_once 'conexion/conexionSQL.php';
                                        $connSQL = connSQL::singleton();
                                        $query = "Select periodo, id_periodo from periodos";
                                        $periodos = $connSQL->consulta($query);
                                        foreach ($periodos as $periodo) {
                                            echo "<option data-idperiodo='" . $periodo[1] . "'>" . $periodo[0] . "</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                            </form>
                        </div> 
                        <div class="d-flex align-items-end ml-lg-3 ml-md-3 ml-sm-3 ml-0">
                            <div class="form-group" id="conte-buscar-alumno" style="display: none;">
                                <div class="input-group">
                                    <input type="text" name="search" id="search-input-alumno" class="form-control rounded-1 border-info" placeholder="Ingrese correo alumno" autocomplete="off" required>
                                    <div class="input-group-append">
                                        <input type="button" name="search" value="Cancelar" class="btn btn-danger cancelar-search rounded-1">
                                    </div>
                                </div>
                                <div class="list-group" id="show-list-alumnos" style="position: absolute; z-index: 999;">
                                    <!-- Aqui se mostraran los grupos que se vayan buscando -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div style="display: none;" id="main-contenedor">
                    <div class="row">
                        <div class="col">
                            <h5 id="nombre-alumno" style="display: none;"></h5>
                            <h5 id="info-periodo" style="display: none;"></h5>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-12">
                            <button align="center" type="button" class="btn btn-success btn-sm" onclick="agregarGrupoFAC14()">Agregar</button>
                        </div>
                        <div class="col-12 mt-3">
                            <table id="tablaFAC14" class="table table-hover">
                                <thead>
                                    <tr>
                                        <th class="text-center">Grupo</th>
                                        <th class="text-center">Alumno</th>
                                        <th class="text-center">Periodo</th>
                                        <th class="text-center">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>

        <div class="modal fade" tabindex="-1" role="dialog" id="modalGruposFAC14">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Elegir grupo</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="input-group">
                        <input type="text" name="search" id="search-input-grupo" class="form-control rounded-1 border-info" placeholder="Ingrese el grupo" autocomplete="off" required onkeyup="this.value = this.value.toUpperCase();">
                        <div class="input-group-append">
                            <input type="button" name="search" value="Limpiar" class="btn btn-danger cancelar-search-grupo rounded-1">
                        </div>
                    </div>
                    <div class="list-group" id="show-list-grupos" style="position: absolute; z-index: 999;">
                        <!-- Aqui se mostraran los grupos que se vayan buscando -->
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
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

    <script src="datatables/DataTables-1.13.1/js/jquery.dataTables.min.js"></script>
    <script src="datatables/DataTables-1.13.1/js/dataTables.bootstrap4.min.js"></script>
    <script src="datatables/Responsive-2.4.0/js/dataTables.responsive.js"></script>
    <script src="datatables/Responsive-2.4.0/js/responsive.bootstrap4.min.js"></script>

    <script src="js/wow.min.js"></script>
    <script src="js/sina-nav.js"></script>

    <!-- For All Plug-in Activation & Others -->
    <script type="text/javascript">
        $(document).ready(function() {
            // WOW animation initialize
            new WOW().init();
        });
    </script>

    <script>
        var idPeriodo;
        var periodo;
        var idAlumno;

        var tablaFac14 = null;
        tablaFac14 = $("#tablaFAC14").DataTable({
            "bDestroy": false,
            "responsive": true,
            "autoWidth": false,
            "language": {
                "url": "datatables/es-ES.json"
            },
            "order": []
        });

        function seleccionarPeriodo(option) {
            periodo = option.options[option.selectedIndex].innerHTML;
            idPeriodo = option.options[option.selectedIndex].dataset.idperiodo;
            $("#main-contenedor").css("display", "none");
            if(periodo != "&nbsp;") {
                //Mostrar el input para ingresar el grupo a buscar
                $("#conte-buscar-alumno").css("display", "block");
                $("#search-input-alumno").val("");
                $("#show-list-alumnos").html("");
            } else {
                $("#conte-buscar-alumno").css("display", "none");
                $("#search-input-alumno").val("");
                $("#show-list-alumnos").html("");
            }
        }

        $(document).on('click', '.cancelar-search', function() {
            $("#search-input-alumno").val("");
            $("#selectPeriodo").prop("selectedIndex", 0);
            $("#conte-buscar-alumno").css("display", "none");
            $("#show-list-alumnos").html("");
        });

        $(document).on('keyup', '#search-input-alumno', function() {
            var searchText = $(this).val().trim();
            var periodo = $("#selectPeriodo").val();

            if(searchText != "" && searchText.length >= 4) {
                $.ajax({
                    data: {
                        'accion': 'searchAlumnosCorreo',
                        'search': searchText
                    },
                    url: 'conexion/consultasSQL.php',
                    method: 'post',
                    success: function(response) {
                        if(JSON.parse(response).success) {
                            $("#show-list-alumnos").html(JSON.parse(response).data);
                        } else {
                            alertify.warning('<h3>' + JSON.parse(response).mensaje + '</h3>');
                        }
                    }
                });
            } else {
                $("#show-list-alumnos").html("");
            }
        });

        $("#show-list-alumnos").on('click', 'a', function(e) {
            e.preventDefault();
            
            idAlumno = $(this).attr('data-id');
            $("#nombre-alumno").css("display", "block");
            $("#nombre-alumno").text("Alumno: " + $(this).text());
            $("#nombre-alumno").attr("data-correo", $(this).attr("data-correo"));
            $("#nombre-alumno").attr("data-nombre", $(this).attr("data-nombre"));
            $("#info-periodo").css("display", "block");
            $("#info-periodo").text(periodo);

            $("#search-input-alumno").val();
            $("#selectPeriodo").prop("selectedIndex", 0);
            $("#conte-buscar-alumno").css("display", "none");
            $("#show-list-alumnos").html("");
            tablaFac14.clear().draw();

            llenarTabla();
           
        });

        function llenarTabla() {
            tablaFac14.clear().draw();
            //Obtener la lista de FAC14 permitido que tiene el alumno para firmar
            $.ajax({
                data: {
                    'accion': 'obtenerFAC14Alumno',
                    'idAlumno': idAlumno,
                    'idPeriodo': idPeriodo
                },
                method: 'post',
                url: 'conexion/consultasSQL.php',
                success: function(response) {
                    var res = JSON.parse(response);
                    if(res.success) {
                        //Mostrar el contenedor con la tabla e informacion
                        $("#main-contenedor").css("display", "block");
                        var datos = res.data;
                         //Llenar la tabla con los FAC14 que tiene permitido firmar el alumno o jefe de grupo
                         datos.forEach(grupoFac => {
                            tablaFac14.row.add([
                                '<h6 class="text-center">' + grupoFac.grupos_fac14 + '</h6>',
                                '<h6 class="text-center">' + grupoFac.nombre + '</h6>',
                                '<h6 class="text-center">' + grupoFac.periodo + '</h6>',
                                '<div class="row"><div class="col d-flex justify-content-center align-items-center"><button data-id="' + grupoFac.id + '" type="button" class="btn btn-danger btn-sm eliminarGrupoFAC">Eliminar</button></div></div>'
                            ]).draw();
                         });
                    } else {
                        alertify.warning('<h3>' + res.mensaje + '</h3>')
                    }
                }
            });
        }

        function agregarGrupoFAC14() {
            //Mostrar los grupos que los docentes ya han agregado para generar su instrumentacion
            $("#modalGruposFAC14").modal('show');
        }

        $(document).on('click', '.cancelar-search-grupo', function() {
            $("#search-input-grupo").val("");
            $("#show-list-grupos").html("");
        });
        $(document).on('keyup', '#search-input-grupo', function(e) {
            var searchText = $(this).val().trim();
            if(searchText != "" && searchText.length >= 3) {
                $.ajax({
                    data: {
                        'accion': 'obtenerGruposFAC14',
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
        $('#show-list-grupos').on('click', 'a', function(e) {
            e.preventDefault();
            var grupo = $(this).attr('data-id');
            alertify.confirm('Aviso', '¿Está seguro(a) de permitir que el/la alumno(a) ' + $('#nombre-alumno').attr('data-nombre') + ' pueda acceder al seguimiento FAC-14 del grupo ' + grupo + '?',
                function() {
                    $.ajax({
                        data: {
                            'idAlumno': idAlumno,
                            'idPeriodo': idPeriodo,
                            'grupo': grupo,
                            'accion': 'agregarFAC14Alumno'
                        },
                        method: 'post',
                        url: 'conexion/consultasSQL.php',
                        success: function(response) {
                            var resp = JSON.parse(response);
                            if(resp.success) {
                                llenarTabla();
                                $("#show-list-grupos").html("");
                                $("#search-input-grupo").val("");
                                $("#modalGruposFAC14").modal('hide');
                                alertify.success('<h3>' + resp.mensaje + '</h3>');
                            } else {
                                $("#search-input-grupo").val("");
                                $("#show-list-grupos").html("");
                                alertify.warning('<h3>' + resp.mensaje + '</h3>')
                            }
                        }
                    });
                },
                function() {}
            ).set('labels', {
                ok: 'Aceptar',
                cancel: 'Cancelar'
            });
        });

        $(document).on('click', '.eliminarGrupoFAC', function() {
            var fila = $(this).closest('tr');
            if(fila.hasClass('child')) {
                fila = fila.prev();
            }
            var grupo = fila.find('td:eq(0)').text();
            var idFAC = $(this).attr('data-id');
            alertify.confirm("Aviso", "¿Está seguro de eliminar el grupo " + grupo + "?",
                function() {
                    $.ajax({
                        data: {
                            'accion': 'eliminarFAC14Alumno',
                            'idFAC': idFAC
                        },
                        method: 'post',
                        url: 'conexion/consultasSQL.php',
                        success: function(response) {
                            var resp = JSON.parse(response);
                            if(resp.success) {
                                llenarTabla();
                                alertify.success('<h3>' + resp.mensaje + '</h3>')
                            } else {
                                alertify.warning('<h3>' + resp.mensaje + '</h3>')
                            }
                        }
                    });
                },
                function() {}
            ).set('labels', {
                ok: 'Aceptar',
                cancel: 'Cancelar'
            });
        });
    </script>
</body>
</html>