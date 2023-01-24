<?php 
$p=$_SESSION["privilegio"];
   if ($p == 2) {
   	header("Location:proyecto/theme/presi.php");
   } if ($p == 1){
   	header("Location:proyecto/theme/indexD.php");
   }if ($p == 3){
   	header("Location:proyecto/theme/cordi.php");
   }
    header("Location:../../index.php");
?>