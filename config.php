<?php
/*
 * Basic Site Settings and API Configuration
 */
// Google API configuration
define('GOOGLE_CLIENT_ID', '4414698938-gffsr4rb7k7dn8m98i45ft9mcchpo0bs.apps.googleusercontent.com');
define('GOOGLE_CLIENT_SECRET', 'lOABU6r2gn-OiwHhIFYxlH8N');
//define('GOOGLE_REDIRECT_URL', 'http://sid.itesa.edu.mx/index.php');
//define('GOOGLE_REDIRECT_URL', 'http://localhost/sid/v1.1/index.php');
define('GOOGLE_REDIRECT_URL', 'http://localhost:80/sid_1/index.php');
// Start session
if(!session_id()){
    session_start();
}

// Include Google API client library
require_once 'src/Google_Client.php';
require_once 'src/contrib/Google_Oauth2Service.php';

// Call Google API
$gClient = new Google_Client();
$gClient->setApplicationName('Sistema de Instrumentaciones Didácticas');
$gClient->setClientId(GOOGLE_CLIENT_ID);
$gClient->setClientSecret(GOOGLE_CLIENT_SECRET);
$gClient->setRedirectUri(GOOGLE_REDIRECT_URL);

$google_oauthV2 = new Google_Oauth2Service($gClient);
?>