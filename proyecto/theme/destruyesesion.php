<?php

	session_start();
	
	$_SESSION = array(); 
	session_destroy();
	require_once '../../config.php';
	// Remove token and user data from the session
	//unset($_SESSION['token']);
	unset($_SESSION['userData']);
	unset($_SESSION['correo']);

	// Reset OAuth access token
	$gClient->revokeToken();
	header("Location:../../index.php");

?>