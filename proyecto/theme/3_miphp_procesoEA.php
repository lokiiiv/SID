<?php
	
	try{
		
		$base=new PDO('mysql:host=localhost; dbname=instrumentaciones', 'root', ''); 
		$base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$base->exec("SET CHARACTER SET utf8");
		
		
		$sql="SELECT competencia_t FROM competencia_et WHERE id_competencia_et= ? ";
		
		
		$resultado1=$base->prepare($sql);
		$id=$_POST['valorCaja1'];
		$resultado1->execute(array($id));
		
		if($registro=$resultado1->fetch(PDO::FETCH_ASSOC)   ){
				
				echo $registro['competencia_t'];

		}else{
			header('Location: index.php');
		}
		
	
	}catch(Exception $e){
		die ('Error'.$e->GetMessage());
	}

?>