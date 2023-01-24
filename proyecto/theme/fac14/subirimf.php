<?php
error_reporting(0);
   if(isset($_FILES['image'])){
      $errors= array();
      $file_name = $_FILES['image']['name'];
      $file_size = $_FILES['image']['size'];
      $file_tmp = $_FILES['image']['tmp_name'];
      $file_type = $_FILES['image']['type'];
      $file_ext=strtolower(end(explode('.',$file_name)));
     
      $expensions= array("jpeg","jpg","png");
     
      if(in_array($file_ext,$expensions)=== false){
         $errors[]="extensión no permitida, por favor elija JPEG o PNG";
      }
     
      if($file_size > 2097152) {
         $errors[]='El archivo excel los dos megas';
      }
     
      if(empty($errors)==true) {
         session_start();
         $cm=$_SESSION["cm"];
         $file_name=$_SESSION["cm"].".". $file_ext;
         move_uploaded_file($file_tmp,"firmas/".$file_name);
         echo "ARCHIVO SUBIDO CON ÉXITO, PUEDE CERRAR ESTA PESTAÑA Y CONTINUAR";
         $tipo=$_SESSION['tipo'];
         require_once("../../../CRUD/class/Consultas.php");
         $usuarios = Usuarios::singleton();
         if ($tipo=="docente") {//guardar el nombre de la firma en base de datos                     
            $data = $usuarios->guardaFirma("docentes","cat_Clave",$cm,$file_name);
            if(count($data)>0){
               $firm="";
               foreach($data as $fila){
                  $firm=$fila["firma"];
               }        
               echo $firm;
                  
               
            }
         }
      }else{
         print_r($errors);
      }
   }
?>