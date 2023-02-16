<?php
require_once 'config.php';
if (isset($_GET['code'])) {
	$gClient->authenticate($_GET['code']);
	$_SESSION['token'] = $gClient->getAccessToken();
	header('Location: ' . filter_var(GOOGLE_REDIRECT_URL, FILTER_SANITIZE_URL));
}
if (isset($_SESSION['token'])) {
	$gClient->setAccessToken($_SESSION['token']);
}

if ($gClient->getAccessToken()) {
	// Get user profile data from google 
	$gpUserProfile = $google_oauthV2->userinfo->get();
	// Getting user profile info 
	$gpUserData = array();
	$gpUserData['oauth_uid']  = !empty($gpUserProfile['id']) ? $gpUserProfile['id'] : '';
	$gpUserData['first_name'] = !empty($gpUserProfile['given_name']) ? $gpUserProfile['given_name'] : '';
	$gpUserData['last_name']  = !empty($gpUserProfile['family_name']) ? $gpUserProfile['family_name'] : '';
	$gpUserData['email']      = !empty($gpUserProfile['email']) ? $gpUserProfile['email'] : '';


	//Verificar si el docente o usuario ya existe en la base de datos
	//Buscar mediante correo en el catagolo de docentes
	require_once 'proyecto/theme/conexion/conexionSQL.php';
	$connSQL = connSQL::singleton();
	$query = "Select cat_Nombre, cat_ApePat, cat_ApeMat from docentes where cat_CorreoE='" . $gpUserData['email'] . "'";
	$docente = $connSQL->consulta($query);

	if (count($docente) > 0 && !is_null($docente)) {
		//Insert or update user data to the database 
		// Storing user data in the session 
		$_SESSION['correo'] = $gpUserData['email'];
		$_SESSION['userData'] = $gpUserData;

		$_SESSION["nombreCompleto"] = $docente[0][0] . " " . $docente[0][1] . " " . $docente[0][2];
	}
	header("Location:proyecto/theme/indexD.php");


	//Buscar mediante correo en el catalogo de docentes
	//require_once 'proyecto/theme/conexion/conexionSQL.php';
	//$connSQL = connSQL::singleton();
	//$query = "Select cat_Nombre, cat_ApePat, cat_ApeMat from docentes where cat_CorreoE='".$gpUserData['email']."'";

	//$docente = $connSQL->consulta($query);

	//$_SESSION["nombreCompleto"] = $docente[0][0]." ".$docente[0][1]." ".$docente[0][2];
	//header("Location:proyecto/theme/indexD.php");

} else {

	$authUrl = $gClient->createAuthUrl();
	// Render google login button 
	$output =
		'<div class="content">
				<div class="container">
					<div class="row">
						<div class="col-md-5 d-flex justify-content-center align-items-center">
							<img  class="img-fluid" src="images/itesa.png">
						</div>
			
						<div class="col-md-5">
							<h2>Sistema de Instrumentaciones Didacticas</h2>
							<h2>Bienvenido (a)</h2>
							<h4>Esta es la primera fase en prueba del sistema de Instrumentaciones didacticas, favor de reportar cualquier anomalia al área de sistemas</h4>
							<hr>
						</div>	
					</div>	
					<div class="row">
						<div class="col-md-5">
						</div>
						<div class="col-md-5 justify-content-center">
							<p class="text-danger"> Para acelerar su acceso le recomendamos abrir su correo electrónico <b>institucional</b> en otra pestaña. </p>            
							
							<a 	class="btn btn-success" 
								href="' . filter_var($authUrl, FILTER_SANITIZE_URL) . '" 
								style="margin-bottom: 20px;">
								Iniciar Sesión
							</a>
						</div>
					</div>
				</div>
			</div>  ';
	echo $output;
}
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>

<head>

	<!--------------------
LOGIN FORM
by: Amit Jakhu
www.amitjakhu.com
--------------------->

	<!--META-->
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>ITESA | SID</title>

	<!-- Description, Keywords and Author -->
	<meta name="description" content="Ingreso al sistema de instrumentaciones didacticas">
	<meta name="keywords" content="SID, Ingreso, Login">
	<meta name="author" content="Alumnos y personal docente de Ingeniería en Sistemas Computacionales ITESA">

	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- Styles -->
	<!-- Bootstrap CSS -->
	<link href="proyecto/theme/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<!-- SLIDER REVOLUTION 4.x CSS SETTINGS -->
	<link rel="stylesheet" href="proyecto/theme/css/settings.css" media="screen" />
	<!-- Pretty Photo -->
	<link href="proyecto/theme/css/prettyPhoto.css" rel="stylesheet">
	<!-- Font awesome CSS -->
	<link href="proyecto/theme/css/font-awesome.min.css" rel="stylesheet">
	<!-- Custom CSS -->
	<link href="proyecto/theme/css/style.css" rel="stylesheet">
	<!-- Color Stylesheet - orange, blue, pink, brown, red or green-->
	<link href="proyecto/theme/css/green.css" rel="stylesheet">
	<!--STYLESHEETS-->

	<!--SCRIPTS-->
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.2.6/jquery.min.js"></script>
	<!--Slider-in icons-->
</head>

<body>

	<body>

	</body>

</html>