<?php
/*
 * Basic Site Settings and API Configuration
 */
// Google API configuration
define('GOOGLE_CLIENT_ID', '267854973830-i0jgpl392364tgu17ebltdq3os64bn56.apps.googleusercontent.com');
define('GOOGLE_CLIENT_SECRET', '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');
//define('GOOGLE_REDIRECT_URL', 'http://sid.itesa.edu.mx/index.php');
//define('GOOGLE_REDIRECT_URL', 'http://localhost/sid/v1.1/index.php');
define('GOOGLE_REDIRECT_URL', 'http://localhost:80/sid/loginGoogle.php');
// Start session
if(!session_id()){
    session_start();
}

// Include Google API client library
//require_once 'src/Google_Client.php';
//require_once 'src/contrib/Google_Oauth2Service.php';

// Call Google API
//$gClient = new Google_Client();
//$gClient->setApplicationName('Sistema de Instrumentaciones Didácticas');
//$gClient->setClientId(GOOGLE_CLIENT_ID);
//$gClient->setClientSecret(GOOGLE_CLIENT_SECRET);
//$gClient->setRedirectUri(GOOGLE_REDIRECT_URL);

//$google_oauthV2 = new Google_Oauth2Service($gClient);

require_once 'vendor/autoload.php';
$gClient = new Google_Client();
$gClient->setClientid(GOOGLE_CLIENT_ID);
$gClient->setApplicationName("Sistema de Instrumentaciones Didácticas");
$gClient->setClientSecret(GOOGLE_CLIENT_SECRET);
$gClient->setRedirectUri(GOOGLE_REDIRECT_URL);
$gClient->addScope("https://www.googleapis.com/auth/plus.login https://www.googleapis.com/auth/userinfo.email");

?>