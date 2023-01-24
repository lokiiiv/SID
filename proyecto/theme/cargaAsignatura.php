<?php
	$asignatura=$_GET["materia"];
	require_once '../../CRUD/class/Consultas.php';
	$conexion = Usuarios::singleton();
	$data = $conexion->get_Instrumentacion($asignatura);
	if(count($data)){//exite la instrumentación
		foreach($data as $fila){
			$es= $fila['id_asignatura']; 
		}
		header("location:index.php?opcion=1&id_materia=".$es);
	}else{//no existe y hay que crearla
		$data = $conexion->get_IdMateria($asignatura);
		foreach($data as $fila){
			$es= $fila['id_asignatura']; 
		}
		
		$data = $conexion->insert_Instrumentacion($es);
		header("location:index.php?opcion=1&id_materia=".$es);		
	}
?>