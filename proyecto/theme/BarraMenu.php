<?php
require_once("../../valida.php");
require_once("manejo-usuarios/UsuarioPrivilegiado.php");
//Obtener objeto con información de roles y permisos del usuario para mostrar/ocultar paginas dinamicamento conforme al rol
$u = UsuarioPrivilegiado::getByCorreo($_SESSION["correo"]);
?>
<header class="header">
	<!-- Header Main -->
	<div class="header_main">
		<div class="container">
			<div class="row">
				<!-- Logo -->
				<div class="col-lg-3 col-md-3 col-12 col-sm-12">
					<div class="logo_container">
						<div class="logo"><a href="index.php">Instrumentaciones didácticas</a></div>
					</div>
				</div>

				<!-- Wishlist -->
				<div class="col-lg-9 col-md-9 col-12 col-sm-12 d-flex justify-content-md-end justify-content-sm-start align-items-center" id="fotoNombre">
					<div class="wishlist_cart">
						<div class="wishlist d-flex flex-row align-items-center justify-content-end">
							<div class="wishlist_icon"><img src="<?php header('Access-Control-Allow-Origin: *');
																	echo $_SESSION["userData"]["picture"]; ?>" class="img-fluid rounded-circle" alt="" style="width: 45px;" referrerpolicy="no-referrer"></div>
							<div class="wishlist_content">
								<div class="wishlist_text"><a href="cuenta.php"><?php echo $_SESSION["nombreCompleto"]; ?></a></div>
								<div class="wishlist_count"><?php echo $_SESSION["correo"]; ?></div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div id="contenedor-navbar">
		<nav class="navbar navbar-expand-lg navbar-light bg-light">
			<a class="navbar-brand" href="#"></a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>

			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav mr-auto">
					<li class="nav-item active">
						<a class="nav-link" href="index.php">Inicio <span class="sr-only">(current)</span></a>
					</li>

					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
							Administración
						</a>
						<div class="dropdown-menu">
							<?php if ($u->hasModulo("administrar_usuarios")) { ?>
								<a class="dropdown-item" href="usuarios.php">Leer/editar usuarios</a>
							<?php } ?>

							<?php if ($u->hasModulo("administrar_roles")) { ?>
								<a class="dropdown-item" href="roles.php">Leer/editar roles</a>
							<?php } ?>

							<?php if ($u->hasModulo("administrar_grupos_academicos")) { ?>
								<a class="dropdown-item" href="grupos-academicos.php">Leer/editar grupos académicos</a>
							<?php } ?>
						</div>
					</li>
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
							Instrumentaciones
						</a>
						<div class="dropdown-menu">
							<?php if ($u->hasModulo("administrar_instrumentaciones")) { ?>
								<a class="dropdown-item" href="indexi.php">Administrar instrumentaciones (Docente)</a>
							<?php } ?>
							<!-- <a class="dropdown-item" href="#">Consultar instrumentaciones (Alumno)</a>
							<a class="dropdown-item" href="#">Validar instrumentaciones (Presidente de grupo académico)</a>
							<a class="dropdown-item" href="cordi.php">Validar instrumentaciones (Jefe de división)</a> -->
						</div>
					</li>

					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
							Cuenta
						</a>
						<div class="dropdown-menu">
							<a class="dropdown-item" href="cuenta.php">Información de cuenta</a>
							<a class="dropdown-item" href="destruyesesion.php">Cerrar sesion</a>
						</div>
					</li>
				</ul>
			</div>
		</nav>
	</div>
</header>