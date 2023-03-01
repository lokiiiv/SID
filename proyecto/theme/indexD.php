<?php
require_once("../../valida.php");
//require_once("../../valida2.php");
require("conexion/verificaMongo.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<!-- estilos de instrumentación -->
	<style type="text/css">
		#columna {
			border: #9CF solid .1px;
			padding: 0px;

		}

		.row1 {
			border: #9CF solid .3px;

		}

		.azul {
			background-color: #9CF;
			font-weight: bolder;
			padding: 5px;
		}
	</style>


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

	<!-- Estiles generales personalizados -->
	<link rel="stylesheet" href="css/general_styles.css">
	<!-- Favicon -->
	<link rel="shortcut icon" href="img/favicon/favicon.png">

	<!-- Font awesome CSS -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />

	<script type="text/javascript" src="js/accionesinstrumentacion.js"></script>

</head>

<body>

	<?php
	include("BarraMenu.php");
	//include("operacionescuerpo.php");
	//include("pie.php");
	?>

	<!-- Scroll to top -->
	<span class="totop"><a href="#"><i class="fa fa-angle-up"></i></a></span>

	<!-- Javascript files -->
	<!-- jQuery -->
	<script src="bootstrap/js/jquery.js"></script>
	<!-- Bootstrap JS -->
	<script src="bootstrap/js/bootstrap.bundle.min.js"></script>
	<!-- Isotope, Pretty Photo JS -->
	<script src="js/jquery.isotope.js"></script>
	<script src="js/jquery.prettyPhoto.js"></script>
	<!-- Support Page Filter JS -->
	<script src="js/filter.js"></script>
	<!-- Flex slider JS -->
	<script src="js/jquery.flexslider-min.js"></script>
	<!-- Respond JS for IE8 -->
	<script src="js/respond.min.js"></script>
	<!-- HTML5 Support for IE -->
	<script src="js/html5shiv.js"></script>
	<!-- Custom JS -->
	<script src="js/custom.js"></script>
</body>

<?php require 'footer.php'; ?>

</html>