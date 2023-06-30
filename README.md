# Sistema de instrumentaciones didácticas del ITESA

<h4>Credenciales de la cuenta de Google que se usa para el OAuth de Google.</h4>
<p>Cuenta: siditesa7@gmail.com<br>
Contraseña: dostres4#</p>
<br>
<h4>Cambios que realizar al subir a producción o al servidor de ITESA</h4>
<p>En el archivo config.php que esta en la raiz del proyecto, modificar la URL de redireccionamiento de Google OAuth como se muestra:<br>define('GOOGLE_REDIRECT_URL', 'https://sid.itesa.edu.mx/loginGoogle.php');</p>
<br>
<p>En el archivo index.php que esta en la raiz del proyecto, modificar la linea 97 tal como se muestra:</p>
window.history.pushState({}, 'Hide', '<?php echo (!empty($_SERVER['HTTPS']) ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST']; ?>')
