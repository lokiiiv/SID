<?php
	
	try{
		
		$base=new PDO('mysql:host=localhost; dbname=proyecto2', 'root', ''); 
		$base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$base->exec("SET CHARACTER SET utf8");
		
		//$sql= "asignatura.temas FROM formato INNER JOIN asignatura ON formato.id_asignatura = asignatura.id_asignatura WHERE formato.id_formato = 1" ; //Numero de temas de la asignatura
		
		
		$sql="SELECT temas FROM asignatura WHERE id_asignatura= ? ";
		$sql="SELECT tema FROM procesoea WHERE id_procesoea= ? ";
		
		
		$resultado1=$base->prepare($sql);
		$id=$_POST['valorCaja1'];
		$resultado1->execute(array($id));
		
		if($registro=$resultado1->fetch(PDO::FETCH_ASSOC)   ){
				
				echo $registro['tema'];
				echo "hola";

		}else{
			header('Location: index.php');
		}
		
	
	}catch(Exception $e){
		die ('Error'.$e->GetMessage());
	}

?>