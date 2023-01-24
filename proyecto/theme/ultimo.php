<?php
	
	try{
		
		$base=new PDO('mysql:host=localhost; dbname=u120726997_base', 'u120726997_base', 'Daal1224*10-5klo'); 
		$base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$base->exec("SET CHARACTER SET utf8");
		
		//$sql= "asignatura.temas FROM formato INNER JOIN asignatura ON formato.id_asignatura = asignatura.id_asignatura WHERE formato.id_formato = 1" ; //Numero de temas de la asignatura
		
		
		$sql="SELECT * FROM listadecotejo WHERE Asignatura = ? ";
		//$sql="SELECT * FROM listadecotejo WHERE Unidad like ? ";
		
		
		
		$valores=$base->prepare($sql);
		$id=$_POST['valorCaja1'];
		$valores->execute(array($id));
		
		while($registro=$valores->fetch(PDO::FETCH_ASSOC)   ){
				
			printf("ITEM"."<br>"."%s (%s)\n"."<br>"."<br>"."<br>", $registro["item"]."<br>"."Valor ",$registro["valor"]."<br>"."Unidad ".$registro["Unidad"]."<br>"."Asignatura ".$registro["Asignatura"]."<br>"."Evidencia ".$registro["Evidencia"]."<br>"."Indicador ".$registro["indicador"]);

		}
		
	
	}catch(Exception $e){
		die ('Error'.$e->GetMessage());
	}

?>