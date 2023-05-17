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
							<div class="wishlist_icon"><img src="<?php 
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

		<nav class="sina-nav" data-top="0">
			<div class="container">
				<div class="sina-nav-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
						<i class="fa fa-bars"></i>
					</button>
				</div><!-- .sina-nav-header -->

				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse" id="navbar-menu">
					<ul class="sina-menu sina-menu-left" data-in="fadeInLeft" data-out="fadeInOut">
						<?php echo $u->generarMenu(); ?>
					</ul>
				</div><!-- /.navbar-collapse -->
			</div><!-- .container -->
		</nav>
	</div>
</header>