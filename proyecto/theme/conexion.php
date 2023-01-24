<?php
	try {
	$conexion = new PDO('mysql:host=localhost; dbname=u120726997_base', 'u120726997_base', 'Daal1224*10-5klo'); 
	$conexion ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$conexion->exec("SET CHARACTER SET utf8");

	
	} catch (PDOException $e){
		echo $e->getMessage();
	}
