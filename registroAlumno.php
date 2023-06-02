<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de alumno</title>

    <!-- Bootstrap CSS -->
    <link href="./proyecto/theme/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Alertify JS -->
    <link rel="stylesheet" href="./proyecto/theme/alertify/css/alertify.min.css">
    <link rel="stylesheet" href="./proyecto/theme/alertify/css/themes/bootstrap.min.css">
    <link href="./proyecto/theme/css/style_2.css" rel="stylesheet">
    <!-- Estiles generales personalizados -->
    <link rel="stylesheet" href="./proyecto/theme/css/general_styles.css">
    <link href="./proyecto/theme/css/blue.css" rel="stylesheet">

    <!-- Favicon -->
    <link rel="shortcut icon" href="./proyecto/theme/img/favicon/favicon.png">

    <!-- Font awesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>

<body>
    <div class="content">
        <div class="container">
            <div class="row mt-3">
                <div class="col-12 d-flex justify-content-center">
                    <h4>Completa tu registro</h4>
                </div>
            </div>
            <div class="row mt-3 mb-3">
                <div class="col-12 d-flex justify-content-center">
                    <form style="width: 400px" id="form-registro-alumno">
                        <div class="form-group">
                            <label for="matricula">Matrícula</label>
                            <input type="text" class="form-control" id="matricula" name="matricula" placeholder="Ingrese matricula" readonly value="<?php echo isset($_GET['matricula']) ? $_GET['matricula'] : '' ?>">
                        </div>
                        <div class="form-group">
                            <label for="nombre">Nombre</label>
                            <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Ingresa tu nombre" required>
                        </div>
                        <div class="form-group">
                            <label for="ap">Apellido paterno</label>
                            <input type="text" class="form-control" id="ap" name="ap" placeholder="Ingresa apellido paterno" required>
                        </div>
                        <div class="form-group">
                            <label for="am">Apellido materno</label>
                            <input type="text" class="form-control" id="am" name="am" placeholder="Ingresa apellido materno">
                        </div>
                        <button type="submit" class="btn btn-info">Registrar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php
    include_once('./proyecto/theme/footer.php');
    ?>

    <!-- Javascript files -->
    <!-- jQuery -->
    <script src="./proyecto/theme/bootstrap/js/jquery.js"></script>
    <!-- Bootstrap JS -->
    <script src="./proyecto/theme/bootstrap/js/bootstrap.bundle.min.js"></script>

    <script src="proyecto/theme/alertify/alertify.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#form-registro-alumno').submit(function(e) {
                e.preventDefault();

                var data = new FormData(e.target);
                data.append('accion', 'registroAlumno');
                data.append('correo', '<?php echo $_GET['correo']; ?>');
                $.ajax({
                    url: 'registro.php',
                    data: data,
                    processData: false,
                    contentType: false,
                    type: 'POST',
                    success: function(response) {
                        var res = JSON.parse(response);
                        if (res.success) {
                            alertify.alert("Aviso", res.mensaje, function() {
                                window.location.href = "index.php";
                            });
                        } else {
                            alertify.alert("Aviso", res.mensaje, function() {
                                window.location.href = "index.php";
                            });
                        }
                    }
                });
            });
        });
    </script>
</body>

</html>