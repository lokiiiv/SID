<?php 
	session_start();

	$cm=$_SESSION['cm'];//clave docente o matrícula alumno
	$tipo=$_SESSION['tipo'];
	if ($tipo=="docente") {
		
	}else if($tipo=="alumno"){

	}
	$operacion=$_POST['operacion'];
	require_once("../../../CRUD/class/Consultas.php");
	$usuarios = Usuarios::singleton();
	if ($operacion=="existe") {
		$data = $usuarios->existeFirma("docentes","cat_Clave",$cm);
		if(count($data)>0){
			$firm="";
			foreach($data as $fila){
				$firm=$fila["firma"];
			}			
			echo $firm;
			
		}
	}

 ?>