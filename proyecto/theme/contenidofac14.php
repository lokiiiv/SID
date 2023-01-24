<?php
  require_once("../../valida.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta charset="utf-8">
    <!-- Title here -->
    <title>Instrumentación Didáctica</title>
    <!-- Description, Keywords and Author -->
    <meta name="description" content="Your description">
    <meta name="keywords" content="Your,Keywords">
    <meta name="author" content="ResponsiveWebInc">
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <script src="alertify/alertify.js"></script>
  
    <!-- estilos de instrumentación -->
  <style type="text/css">
    #columna{
      border:#9CF solid .1px; 
      padding:0px;
  
    }

    .row1{
      border:#9CF solid .3px; 

    }
    .azul{
      background-color:#9CF;
      font-weight:bolder;
      padding:5px;
    }
  </style>
    <!-- ESTILOS DISEÑO -->
    <link href="css/style_2.css" rel="stylesheet">
      <link href="css/font-awesome.min.css" rel="stylesheet">   



<!-- Flex Slider CSS -->
    <link href="css/flexslider.css" rel="stylesheet">
    <!-- Pretty Photo -->
    <link href="css/prettyPhoto.css" rel="stylesheet">
    <link href="css/blue.css" rel="stylesheet"> 
    
  <!-- Favicon -->
    <link rel="shortcut icon" href="img/favicon/favicon.png">
    
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">

    <script type="text/javascript" src="bootstrap/js/bootstrap.js"></script>
  </head>
  <body>
    <header>
    <div class="container">
        <div class="row">
          <div class="col-md-7 col-sm-7">
              <!-- Logo and site link -->
                <h1><a>Instrumentaciones Didácticas</a></h1>           
          </div>
          <div class="col-md-5 col-sm-5">
              <!-- Logo and site link -->
              <h1><a>Hola <?php echo ucwords(strtolower($_SESSION["userData"]['first_name']));?></a></h1>
              <h5> <?php echo $_SESSION["correo"];?> </h5>        
          </div>
        </div>
    </div>
  </header>
    <?
      include("BarraMenu.php");
      require_once 'conexion/conexionSQL.php';
      $connSQL = connSQL::singleton();
      
  ?>

  <!-- Content strats -->
  <div class="content">
    <div class="container">
  <div class="row">

    <form action="indexi.php">
          <input type="submit" class="btn btn-success" value="Regresar" />
    </form>
    
  </div>
  <br>
  



 





    <?php include("fac14/fac14.php"); ?>

      <script type="text/javascript" src="bootstrap/js/jquery.js"></script>
    

  </body>
</html>
    