<?php
require_once '../../valida.php';
?>

<!DOCTYPE HTML>
<html lang="es">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">

    <!-- Title here -->
    <title>Instrumentaciones Didácticas</title>
    <!-- Description, Keywords and Author -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Styles -->
    <!-- Bootstrap CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Flex Slider CSS -->
    <link href="css/flexslider.css" rel="stylesheet">
    <!-- Pretty Photo -->
    <link href="css/prettyPhoto.css" rel="stylesheet">
    <!-- Font awesome CSS -->
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="css/style.css" rel="stylesheet">
    <link href="css/custom.css" rel="stylesheet">
    <!-- Color Stylesheet - orange, blue, pink, brown, red or green-->
    <link href="css/blue.css" rel="stylesheet">
    <!-- Alertify JS -->
    <link rel="stylesheet" href="alertify/css/alertify.min.css">
    <link rel="stylesheet" href="alertify/css/themes/bootstrap.min.css">

    <!-- Favicon -->
    <link rel="shortcut icon" href="img/favicon/favicon.png">
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
                    <h1><a>Hola <? echo ucwords(strtolower($_SESSION["userData"]['first_name'])); ?></a></h1>
                    <h5> <?php echo $_SESSION["correo"]; ?> </h5>
                </div>
            </div>
        </div>
    </header>

    <?php
    include("BarraMenu.php");
    ?>

    <div class="content">
        <div class="row">
            <h3>Usuarios registrados en el sistema</h3>
        </div>
        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-10">
                <table id="tablaUsuarios" class="table table-hover" style="margin-top: 30px;">
                    <thead>
                        <tr>
                            <th class="text-center">Clave</th>
                            <th class="text-center">Apellido paterno</th>
                            <th class="text-center">Apellido materno</th>
                            <th class="text-center">Nombre</th>
                            <th class="text-center">Roles</th>
                            <th class="text-center">Firma</th>
                            <th class="text-center">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Scroll to top -->
    <span class="totop"><a href="#"><i class="fa fa-angle-up"></i></a></span>

    <!-- Javascript files -->
    <!-- jQuery -->
    <script src="js/jquery.js"></script>
    <!-- Bootstrap JS -->
    <script src="js/bootstrap.min.js"></script>
    <!-- Isotope, Pretty Photo JS -->
    <script src="js/jquery.isotope.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <!-- Support Page Filter JS -->
    <script src="js/filter.js"></script>
    <!-- Flex slider JS -->
    <script src="js/jquery.flexslider-min.js"></script>
    <!-- Respond JS for IE8 -->
    <script src="js/respond.min.js"></script>
    <!-- HTML5 Support for IE -->
    <script src="js/html5shiv.js"></script>
    <!-- Custom JS -->
    <script src="js/custom.js"></script>
    <script src="alertify/alertify.min.js"></script>


</body>

</html>