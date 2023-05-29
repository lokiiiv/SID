<?php
require_once '../../valida.php';
require_once 'manejo-usuarios/UsuarioPrivilegiado.php';
$u = UsuarioPrivilegiado::getByCorreo($_SESSION["correo"]);
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Instrumentaciones Didáctica</title>

    <!-- Bootstrap CSS -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Alertify JS -->
    <link rel="stylesheet" href="alertify/css/alertify.min.css">
    <link rel="stylesheet" href="alertify/css/themes/bootstrap.min.css">
    <link href="css/style_2.css" rel="stylesheet">
    <!-- Estiles generales personalizados -->
    <link rel="stylesheet" href="css/general_styles.css">
    <!-- Favicon -->
    <link rel="shortcut icon" href="img/favicon/favicon.png">
    <link href="css/blue.css" rel="stylesheet">

    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/sina-nav.min.css">

    <!-- Font awesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>

<body>
    <?php
    include("BarraMenu.php");
    ?>

    <div class="content">
        <div class="container">
            <div class="row mt-3">
                <div class="col-12 d-flex flex-wrap">
                    <div id="conte-periodo">
                        <form action="" method="POST">
                            <div class="form-group">
                                <label class="control-label" for="select">
                                    <h4>Periodo</h4>
                                </label>
                                <select class="form-control" id="selectPeriodo" name="periodo" Onchange="seleccionarPeriodo(this.options[this.selectedIndex].innerHTML);">
                                    <option>&nbsp;</option>
                                    <?php
                                    require_once 'conexion/conexionSQL.php';
                                    $connSQL = connSQL::singleton();
                                    $query = "Select periodo from periodos";
                                    $periodos = $connSQL->consulta($query);
                                    foreach ($periodos as $periodo) {
                                        echo "<option>" . $periodo[0] . "</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div id="contenedor-instru-historial-presidente">

                    </div>
                </div>
            </div>
        </div>
    </div>

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

    <script src="js/jquery.validate.min.js"></script>

    <script src="js/wow.min.js"></script>
    <script src="js/sina-nav.js"></script>
    <script src="js/html2pdf.bundle.min.js"></script>

    <!-- For All Plug-in Activation & Others -->
    <script type="text/javascript">
        $(document).ready(function() {
            // WOW animation initialize
            new WOW().init();
        });
    </script>

</body>

</html>