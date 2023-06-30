# Sistema de instrumentaciones didácticas del ITESA

<h4>Credenciales de la cuenta de Google que se usa para el OAuth de Google.</h4>
<p>Cuenta: siditesa7@gmail.com<br>
Contraseña: dostres4#</p>
<br>
<h4>Cambios que realizar al subir a producción o al servidor de ITESA</h4>
<p>En el archivo config.php que esta en la raiz del proyecto, modificar la URL de redireccionamiento de Google OAuth como se muestra:<br></p>

```php
define('GOOGLE_REDIRECT_URL', 'https://sid.itesa.edu.mx/loginGoogle.php');
```
<br>En el archivo index.php que esta en la raiz del proyecto, modificar la linea 97 tal como se muestra:
```html
window.history.pushState({}, 'Hide', '<?php echo (!empty($_SERVER['HTTPS']) ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST']; ?>')
```
<br>En el archivo valida.php que estan en la raiz del proyecto, debería de estar de la siguiente forma en producción o ya en ejecución en el servidor de ITESA
```php
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
		if($actual_link == "http://sid.itesa.edu.mx/" || $actual_link == "https://sid.itesa.edu.mx/" || $actual_link == "http://sid.itesa.edu.mx/index.php" || $actual_link == "https://sid.itesa.edu.mx/index.php") {
			
		} else {
			header("Location: https://sid.itesa.edu.mx");
		}
		
	} else {
		$actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
		if($actual_link == "http://sid.itesa.edu.mx/" || $actual_link == "https://sid.itesa.edu.mx/" || $actual_link == "http://sid.itesa.edu.mx/index.php" || $actual_link == "https://sid.itesa.edu.mx/index.php") {
			header("Location: https://sid.itesa.edu.mx/proyecto/theme/index.php");
		}

	}

```
<br>
En la versión de desarrollo (la actual en Github) estan comentadas las líneas de codigo que envian los correos electronicos conforme a las diferentes acciones disponibles, en producción, es necesario descomentarlas para que se envien los correos correctamente. En el archivo /proyecto/theme/enviar-correos.php, es necesario descomentar las siguiente lineas: 53 a 55, 146 a 147, 240 a 241, 335 a 336, 451 a 452, 563 a 564, 676 a 677.
