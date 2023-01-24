<?php  
require_once"conexion.php";
require_once"CRUD/class/metodo.php";
$email=$_POST['email'];
$nombre=$_POST['nombre'];
$pass=$_POST['pass'];
$puesto=$_POST['privi'];
$datos=array(
	$email,
	$nombre,
	$pass,
	$puesto,
	);
$obj= new metodos();
if($obj-> insertara($datos)==1){
    //alert("Registrado con éxito");
	header("location:index.php");
}else{

}

?>