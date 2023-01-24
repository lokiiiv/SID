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
		#columna{
			border:#9CF solid .1px; 
			padding:0px;
	
		}

		.row1{
			border:#9CF solid .3px; 

		}
		.azul{
			background-color:#9CF;
			font-weight:bolder;
			padding:5px;
		}
	</style>

	
<!-- Title here -->
	<title>Instrumentaciones Didácticas</title>
	<!-- Description, Keywords and Author -->
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
	<!-- Styles -->
	<!-- Bootstrap CSS -->
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<!-- Flex Slider CSS -->
	<link href="css/flexslider.css" rel="stylesheet">
	<!-- Pretty Photo -->
	<link href="css/prettyPhoto.css" rel="stylesheet">
	<!-- Font awesome CSS -->
	<link href="css/font-awesome.min.css" rel="stylesheet">		
	<!-- Custom CSS -->
	<link href="css/style.css" rel="stylesheet">
	<!-- Color Stylesheet - orange, blue, pink, brown, red or green-->
	<link href="css/blue.css" rel="stylesheet"> 
	
<!-- Favicon -->
	<link rel="shortcut icon" href="img/favicon/favicon.png">
	<script type="text/javascript" src="js/accionesinstrumentacion.js"></script>
	
</head>
<body>

<header>
   <div class="container">
      <div class="row">
         <div class="col-md-7 col-sm-7">
            <!-- Logo and site link -->
               <h1><a>Instrumentaciones Didácticas</a></h1>           
         </div>
         <div class="col-md-5 col-sm-5">
            <!-- Logo and site link -->
			<h3><a><?php echo $_SESSION["nombreCompleto"];?></a></h3> 
			<h4> <?php echo $_SESSION["correo"];?></h4>
         </div>
      </div>
   </div>
</header>
	
<?php


	include("BarraMenu.php");
	//include("operacionescuerpo.php");
	//include("pie.php");
?>
			
		<!-- Scroll to top -->
		<span class="totop"><a href="#"><i class="fa fa-angle-up"></i></a></span> 
			
		<!-- Javascript files -->
		<!-- jQuery -->
		<script src="js/jquery.js"></script>
		<!-- Bootstrap JS -->
		<script src="js/bootstrap.min.js"></script>
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
</html>