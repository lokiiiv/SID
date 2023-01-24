<?php
require("valida.php");

$p=$_SESSION["privilegio"];
		if ($p==1) {
			header("Location:proyecto/theme/indexD.php");
		} 
		if ($p==2) {
			header("Location:proyecto/theme/presi.php");
		}
		if ($p==3) {
			header("Location:proyecto/theme/cordi.php");
		}

?>