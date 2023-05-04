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

</head>

<body>
	<?php
	include("BarraMenu.php");
	?>

	<div class="content">
		<div class="container">
            <div class="row mt-3">
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
        function seleccionarPeriodo(periodo) {
            if(periodo != "&nbsp;") {
                //Mostrar el input para ingresar el grupo a buscar
                $("#conte-buscar-grupo").css("display", "block");
                $("#search-input-grupo").val("");
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
            if(searchText != "") {
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
        });
    </script>
</body>
</html>