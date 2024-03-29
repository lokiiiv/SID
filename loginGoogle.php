<?php
require_once 'config.php';
require_once 'proyecto/theme/manejo-usuarios/UsuarioPrivilegiado.php';

//Obtener los datos de la autenticación de Google
if (isset($_GET["code"])) {
	$token = $gClient->fetchAccessTokenWithAuthCode($_GET["code"]);
} else {
	header("Location: index.php");
	die();
}

//Si no hay error de autenticación
if (isset($token["error"]) != "invalid_grant") {

	//Obtener los datos desde la cuenta de Google
	//Almacenar los datos en un nuevo array
	$oAuth = new Google_Service_Oauth2($gClient);
	$gpUserProfile = $oAuth->userinfo_v2_me->get();

	$gpUserData = [];
	$gpUserData['oauth_uid'] = !empty($gpUserProfile['id']) ? $gpUserProfile['id'] : '';
	$gpUserData['first_name'] = !empty($gpUserProfile['givenName']) ? $gpUserProfile['givenName'] : '';
	$gpUserData['last_name'] = !empty($gpUserProfile['familyName']) ? $gpUserProfile['familyName'] : '';
	$gpUserData['email'] = !empty($gpUserProfile['email']) ? $gpUserProfile['email'] : '';
	$gpUserData['picture'] = !empty($gpUserProfile['picture']) ? $gpUserProfile['picture'] : '';

	//Verificar que la cuenta que este ingresando sea del dominio de itesa.edu.mx
	if (explode('@', $gpUserData['email'])[1] == 'itesa.edu.mx') {
		//Verificar si el docente o usuario ya existe en la base de datos
		//Buscar mediate correo en el catalogo de docentes
		require_once 'proyecto/theme/conexion/conexionSQL.php';
		$connSQL = connSQL::singleton();
		$query = "Select cat_ID, cat_Nombre, cat_ApePat, cat_ApeMat from docentes where cat_CorreoE='" . $gpUserData['email'] . "'";
		$usuario = $connSQL->consulta($query);

		//El usuario existe, independientemente de su rol, permitir el acceso y guardar las variables de sesion
		if(count($usuario) > 0 && !is_null($usuario)) {
			//Insert or update user data to the database 
			// Storing user data in the session 
			$_SESSION["correo"] = $gpUserData["email"];
			$_SESSION["userData"] = $gpUserData;

			$_SESSION["nombreCompleto"] = $usuario[0][1] . " " . $usuario[0][2] . " " . $usuario[0][3];
			$_SESSION["idUsuario"] = $usuario[0][0];
			
			require_once './proyecto/theme/conexion/verificaMongo.php';

			//Redirigir a la pagina principal
			header("Location:proyecto/theme/index.php");
		} else {
			//Si no existe, no permitir el acceso...
			//Pero hay que verificar si el usuario que intenta acceder es un alumno, si es asi, registrar automaticamente como usuario nuevo y alumno.
			$posibleMatricula = explode('@', $gpUserData['email'])[0];
			//Verificar que sea una matricula de 8 digitos
			$regexMatricula = "/^[0-9]{8}$/";
			if(preg_match($regexMatricula, $posibleMatricula)) {
				//require_once './registroAlumno.php';
				header("Location: registroAlumno.php?matricula=" . $posibleMatricula . '&correo=' . $gpUserData['email']);
			} else {
				//Si no coincide, son correos que no pertenecen a alumnos
				header("Location: index.php?mensaje=2");
				die();	
			}
		}

		/* $docente = $connSQL->consulta($query);

		if (count($docente) > 0 && !is_null($docente)) {
			//Insert or update user data to the database 
			// Storing user data in the session 
			$_SESSION["correo"] = $gpUserData["email"];
			$_SESSION["userData"] = $gpUserData;

			$_SESSION["nombreCompleto"] = $docente[0][1] . " " . $docente[0][2] . " " . $docente[0][3];
			$_SESSION["idUsuario"] = $docente[0][0];
			
			require_once './proyecto/theme/conexion/verificaMongo.php';

			//Redirigir a la pagina principal
			header("Location:proyecto/theme/index.php");
		} else {
			//Si el usuario no existe aun en el catalgo, redirigir con su mensaje
			header("Location: index.php?mensaje=2");
			die();	
		} */

	} else {
		//Redireccionar al index, mandando un mensaje de alerta
		header("Location: index.php?mensaje=1");
		die();
	}
} else {
	header("Location: index.php");
	die();
}