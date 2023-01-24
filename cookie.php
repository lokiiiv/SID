<?php 
	$year = 60 * 60 * 24  * 365 + time();
	$num = time();
	setcookie('val',$num,$year); 
	$vista=$_COOKIE["val"];
	//echo $vista;
	if(!isset($_COOKIE["val"])){
		echo "No hay cookie";
	}else{
		echo " Llevas en total: ";
		$ti=$_COOKIE["val"];
		$ta=time();
		$timepot=$ta-$ti;
		echo $timepot;
		if ($timepot>60){
			session_destroy();
			header("Location:../../index.php");
		}else{
			unset($_COOKIE["val"]);
			$year = 60 * 60 * 24  * 365 + time();
			$num = time();
			setcookie("val",$num,$year);
		}
	}
	
	?>