<?php

class metodos{

	
	public function insertara($datos){
		$c = new conectar();
		$conexion =$c->conexion();
		$sql="INSERT into usuarios(email,nombre,contra,privi) values('$datos[0]','$datos[1]','$datos[2]','$datos[3]')";
		return $result = mysqli_query($conexion,$sql);
	}

	

}
?>