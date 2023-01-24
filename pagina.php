<?php
	$nombre=$_POST['nombre'];
	$contra=$_POST['contra'];
	$correo="";
	require_once("CRUD/class/Consultas.php");
	$usuarios=usuarios::singleton();
	$data=$usuarios->get_Usuario1($nombre,$contra);
	if (count($data)) {
		session_start();
		foreach ($data as $fila) {
			$privilegio=$fila["privi"];
			$correo=$fila["email"];
		}
		$_SESSION["nombre"]=$nombre;
		$_SESSION["privilegio"]=$privilegio;
		$_SESSION["correo"]=$correo;
		
		header("Location:logueado.php");

	}else{
		header("Location:index.php");
	}

?> 
