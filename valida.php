<?php 
	require_once 'proyecto/theme/conexion/conexionSQL.php';
	$connSQL = connSQL::singleton();
	if(!session_id()){
		session_start();
	}
	if (!isset($_SESSION["correo"])) {
		// Include configuration file
		require_once 'config.php';

		// Remove token and user data from the session
		//unset($_SESSION['token']);
		unset($_SESSION['userData']);
		unset($_SESSION['correo']);

		// Reset OAuth access token
		$gClient->revokeToken();

		// Destroy entire session data
		session_destroy();

		// Redirect to homepage
		$actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
		$actual_link = strtok($actual_link, "?");
		if($actual_link == "http://localhost/sid/" || $actual_link == "https://localhost/sid/" || $actual_link == "http://localhost/sid/index.php" || $actual_link == "https://localhost/sid/index.php") {
			//header("Location: http://localhost/sid/index.php"); 
		} else {
			header("Location: http://localhost/sid/"); 
		}
		
	} else {
		$actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
		if($actual_link == "http://localhost/sid/" || $actual_link == "https://localhost/sid/" || $actual_link == "http://localhost/sid/index.php" || $actual_link == "https://localhost/sid/index.php") {
			header("Location: http://localhost/sid/proyecto/theme/index.php");
		}

	}
