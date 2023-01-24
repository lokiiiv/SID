<?php
$host="localhost";
$bd="proyecto2";
$usuario="root";
$contraseña="";

$tabla="firmasdocentes";

error_reporting(0);

$conexion = new mysqli($host,$usuario,$contraseña,$bd);

if (!$conexion){
	die ("Conexion fallida: ".mysqli_connect_error());
}
	echo  "Conectado";
	exit();
}
?>