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
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Alertify JS -->
    <link rel="stylesheet" href="alertify/css/alertify.min.css">
    <link rel="stylesheet" href="alertify/css/themes/bootstrap.min.css">

    <!-- Estiles generales personalizados -->
    <link rel="stylesheet" href="css/general_styles.css">
    <!-- Favicon -->
    <link rel="shortcut icon" href="img/favicon/favicon.png">

    <!-- Font awesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/sina-nav.min.css">

</head>

<body>
    <?php
    include("BarraMenu.php");
    ?>

    <?php
    require 'footer.php';
    ?>

    <!-- Javascript files -->
    <!-- jQuery -->
    <script src="bootstrap/js/jquery.js"></script>
    <!-- Bootstrap JS -->
    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Respond JS for IE8 -->
    <script src="js/respond.min.js"></script>
    <!-- HTML5 Support for IE -->
    <script src="js/html5shiv.js"></script>
    <!-- Custom JS -->
    <script src="js/custom.js"></script>
    <script src="alertify/alertify.min.js"></script>

    <script src="js/wow.min.js"></script>
    <script src="js/sina-nav.js"></script>

    <!-- For All Plug-in Activation & Others -->
    <script type="text/javascript">
        $(document).ready(function() {
            // WOW animation initialize
            new WOW().init();
        });
    </script>

</body>

</html>