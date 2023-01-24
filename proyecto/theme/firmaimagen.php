<div>
	<?php
require ("CRUD/class/Consultas.php");
$usuarios=Usuarios::singleton();
$data = $usuarios->imagen_firma();
echo count ($data);
  if (count($data)>0) {
    foreach ($data as $fila) {
      
      $firma=$fila['firma'];
      echo '<img src="firmasimagenes/'.$firma.'.jpg"/ width ="100" height ="100">';
    }
  }
?>
</div>