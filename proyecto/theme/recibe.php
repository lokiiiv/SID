<?php
	require("CRUD/class/Consultas.php");
	$listadecotejo = Usuarios::singleton();
	$item=$_GET['v1'];
	$valor=$_GET['v2'];
	$indicador=$_GET['v3'];
	$Asignatura=$_GET['v4'];
	$Unidad=$_GET['v5'];
	$Grupo=$_GET['v6'];
	$Evidencia=$_GET['v7'];
	$data = $listadecotejo->insert_item($item,$valor,$indicador,$Asignatura,$Unidad,$Grupo,$Evidencia);
?>