<?php
require_once("../../valida.php");
?>
<header>
   <div class="container">
      <div class="row">
         <div class="col-md-7 col-sm-7">
            <!-- Logo and site link -->
               <h1><a>Instrumentaciones Didácticas</a></h1>           
         </div>
         <div class="col-md-5 col-sm-5">
            <!-- Logo and site link -->
			<h3><a><?php echo $_SESSION["nombreCompleto"];?></a></h3> 
			<h4> <?php echo $_SESSION["correo"];?></h4>
         </div>
      </div>
   </div>
</header>

<div id="contenedor-navbar">
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
		<a class="navbar-brand" href="#"></a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>

		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<ul class="navbar-nav mr-auto">
				<li class="nav-item active">
					<a class="nav-link" href="indexD.php">Inicio <span class="sr-only">(current)</span></a>
				</li>
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
						Web master
					</a>
					<div class="dropdown-menu">
						<a class="dropdown-item" href="usuarios.php">Administrar usuarios</a>
						<a class="dropdown-item" href="roles.php">Administrar roles</a>
						<a class="dropdown-item" href="grupos-academicos.php">Administrar grupos académicos</a>
					</div>
				</li>
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
						Docente
					</a>
					<div class="dropdown-menu">
						<a class="dropdown-item" href="indexi.php">Administrar instrumentaciones</a>
					</div>
				</li>
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" href="" role="button" data-toggle="dropdown" aria-expanded="false">
						Jefe de división
					</a>
					<div class="dropdown-menu">
						<a class="dropdown-item" href="cordi.php">Validar instrumentaciones</a>
					</div>
				</li>
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
						Cuenta
					</a>
					<div class="dropdown-menu">
						<a class="dropdown-item" href="destruyesesion.php">Cerrar sesion</a>
					</div>
				</li>
			</ul>
		</div>
	</nav>
</div>
