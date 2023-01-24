<?php 
	$subir_archivo = $directorio.basename($_FILES['archivo']['name']);
	$permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyz';
	// Output: 54esmdr0qf
	$cadealea= substr(str_shuffle($permitted_chars), 0, 15);
	$a=explode(".",$subir_archivo);
	$extension=".".$a[1];
	if (move_uploaded_file($_FILES['archivo']['tmp_name'], "archivoss/".$cadealea.".xlsx")) {
		$archivo="archivoss/".$cadealea.".xlsx";
		session_start();
		$_SESSION["archivo"]=$archivo;
		$_SESSION["extension"]=".xlsx";
		$_SESSION["cadealea"]=$cadealea;
		$_SESSION["subirarchivo"]=$subir_archivo;

	}

 ?>