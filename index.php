<?php
require_once 'config.php';
require_once 'valida.php';
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
    <link href="proyecto/theme/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Alertify JS -->
    <link rel="stylesheet" href="proyecto/theme/alertify/css/alertify.min.css">
    <link rel="stylesheet" href="proyecto/theme/alertify/css/themes/bootstrap.min.css">

    <!-- Custom CSS -->
    <link href="proyecto/theme/css/general_styles.css" rel="stylesheet">
    <!-- Color Stylesheet - orange, blue, pink, brown, red or green-->
    <link href="proyecto/theme/css/green.css" rel="stylesheet">
    <!--STYLESHEETS-->

    <!-- Favicon -->
    <link rel="shortcut icon" href="proyecto/theme/img/favicon/favicon.png">

    <!-- Font awesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>

<body>
    <div class="content">
        <div class="container mt-3 pl-4 pr-4">
            <div class="row justify-content-center">
                <div class="col-lg-5 col-md-12 col-sm-12 col-12 d-flex justify-content-center align-items-center">
                    <img class="img-fluid" src="images/itesa.png" width="400px">
                </div>

                <div class="col-lg-5 col-md-12 col-sm-12 col-12 text-center">
                    <h2>Sistema de Instrumentaciones Didacticas</h2>
                    <h2>Bienvenido (a)</h2>
                    <h4>Esta es la primera fase en prueba del sistema de Instrumentaciones didacticas, favor de reportar cualquier anomalia al área de sistemas</h4>
                    <hr>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-5 col-md-12 col-sm-12 col-12">
                </div>
                <div class="col-lg-5 col-md-12 col-sm-12 col-12 justify-content-center text-center">
                    <p class="text-danger"> Para acelerar su acceso le recomendamos abrir su correo electrónico <b>institucional</b> en otra pestaña. </p>

                    <a class="btn btn-success" href="<?php echo filter_var($gClient->createAuthUrl(), FILTER_SANITIZE_URL); ?>" style="margin-bottom: 20px; color:white;">
                        <i class="fa-solid fa-right-to-bracket mr-2"></i>
                        Iniciar Sesión
                    </a>
                </div>
            </div>
        </div>
    </div>

    <?php
    include 'proyecto/theme/footer.php';
    ?>

    <!-- Javascript files -->
    <!-- jQuery -->
    <script src="proyecto/theme/bootstrap/js/jquery.js"></script>
    <!-- Bootstrap JS -->
    <script src="proyecto/theme/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Respond JS for IE8 -->
    <script src="proyecto/theme/js/respond.min.js"></script>
    <!-- HTML5 Support for IE -->
    <script src="proyecto/theme/js/html5shiv.js"></script>
    <!-- Custom JS -->
    <script src="proyecto/theme/js/custom.js"></script>
    <script src="proyecto/theme/alertify/alertify.min.js"></script>

    <?php
    //Este es un array de mensajes para mostrar conforme al parametro $_GET que se reciba
    $mensajes = [
        1 => 'Está intentando acceder con una cuenta que no pertenece a ITESA, intente con otra cuenta.',
        2 => 'Aún no ha sido registrado en el sistema. Por favor, notifique al administrador.'
    ];
    $mensaje_id = isset($_GET['mensaje']) ? intval($_GET['mensaje']) : 0;
    ?>

    <script>
        <?php
        //Si hay mensaje, mostrar el un alert y limpiar los parametros de la URL
        if ($mensaje_id != 0) { ?>
            alertify.alert("Aviso", "<?php echo $mensajes[$mensaje_id]; ?>");
            if (typeof window.history.pushState == 'function') {
                window.history.pushState({}, 'Hide', '<?php echo (!empty($_SERVER['HTTPS']) ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] . '/sid'; ?>')
            }
        <?php
        }
        ?>
    </script>
</body>

</html>