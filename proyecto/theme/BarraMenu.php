<?php
require_once("../../valida.php");
?>
<!-- Navigation Starts -->
	<div class="navbar bs-docs-nav" role="banner">
		<div class="container">
			<div class="navbar-header">
				<button class="navbar-toggle" href="menu" type="button" data-toggle="collapse" data-target=".bs-navbar-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
			</div>

			<ul class="nav navbar-nav" id="#menu">
				<li class="dropdown">
					<a href="indexD.php" class="dropdown-toggle" >Inicio</a>
				</li>

				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">Web master<b class="caret"></b></a>
					<ul class="dropdown-menu">
						<li><a href="usuarios.php">Administrar usuarios</a></li>
					</ul>
				</li>

				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">Docente<b class="caret"></b></a>
					<ul class="dropdown-menu">
						<li><a href="indexi.php">Instrumentaciones</a></li>
						
					</ul>
				</li>   
				<!--
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">Presidente academia<b class="caret"></b></a>
					
				</li>  
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">Coordinador <b class="caret"></b></a>
					
				</li> 
				-->
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">Sesion <b class="caret"></b></a>
					<ul class="dropdown-menu">
									
						<li><a href="destruyesesion.php">Cerrar Sesion</a></li>
					</ul>
				</li>

			</ul>
		</div>
	</div>
		<!--/ Navigation Ends -->   
