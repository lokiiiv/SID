<?php
require_once '../../valida.php';
require_once 'manejo-usuarios/UsuarioPrivilegiado.php';
$u = UsuarioPrivilegiado::getByCorreo($_SESSION["correo"]);
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

</head>

<body>
    <?php
    include("BarraMenu.php");
    ?>
    <div class="container">
        <div class="main-body">

            <div class="row gutters-sm mt-3">
                <div class="col-md-4 mb-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex flex-column align-items-center text-center">
                                <img src="<?php echo $_SESSION["userData"]["picture"] ?>" alt="Imagen de perfil de cuenta de Google ITESA" class="rounded-circle" width="100">
                                <div class="mt-3">
                                    <h4><?php echo $_SESSION["userData"]["first_name"]; ?></h4>
                                    <h6 class="text-secondary mb-3">Instituto Tecnológico Superior del Oriente del Estado de Hidalgo</h6>
                                    <a class="btn btn-info btn-sm" href="destruyesesion.php"><i class="fas fa-sign-out-alt pr-2"></i>Cerrar sesión</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card mt-3">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                <h6 class="mb-0">
                                    <svg class="mr-1" xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" class="bi bi-google" viewBox="0 0 16 16">
                                        <path d="M15.545 6.558a9.42 9.42 0 0 1 .139 1.626c0 2.434-.87 4.492-2.384 5.885h.002C11.978 15.292 10.158 16 8 16A8 8 0 1 1 8 0a7.689 7.689 0 0 1 5.352 2.082l-2.284 2.284A4.347 4.347 0 0 0 8 3.166c-2.087 0-3.86 1.408-4.492 3.304a4.792 4.792 0 0 0 0 3.063h.003c.635 1.893 2.405 3.301 4.492 3.301 1.078 0 2.004-.276 2.722-.764h-.003a3.702 3.702 0 0 0 1.599-2.431H8v-3.08h7.545z" />
                                    </svg>Gmail
                                </h6>
                                <h6><span class="text-secondary"><?php echo $_SESSION["userData"]["email"] ?></span></h6>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="card mb-3">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Clave/Matrícula</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <h6 id="clave"></h6>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Nombre completo</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <h6 id="nombreCompleto"></h6>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Roles</h6>
                                </div>
                                <div class="col-sm-9 text-secondary" id="roles">

                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Firma</h6>
                                </div>
                                <div class="col-sm-9 text-secondary" id="firma">

                                </div>
                            </div>
                        </div>
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

    <script>
        $(document).ready(function() {
            $("#fotoNombre").remove();
            $.ajax({
                url: 'conexion/consultasSQL.php',
                data: {
                    'accion': 'obtenerDetalleCuenta',
                    'correoUser': '<?php echo $_SESSION["correo"]; ?>'
                },
                method: 'post',
                success: function(response) {
                    var resp = JSON.parse(response);
                    if (resp.success) {
                        $("#clave").text(resp.data.clave);
                        $("#nombreCompleto").text(resp.data.nombre);
                        $("#roles").html(resp.data.roles);
                        $("#firma").html(resp.data.firma);
                    } else {
                        alertify.warning('<h3>' + res.mensaje + '</h3>');
                    }
                }
            }).fail(function(jqXHR, textStatus, errorThrown) {
                if (jqXHR.status === 0) {
                    alert('No conectado, verifique su red.');
                } else if (jqXHR.status == 404) {
                    alert('Pagina no encontrada [404]');
                } else if (jqXHR.status == 500) {
                    alert('Internal Server Error [500].');
                } else if (textStatus === 'parsererror') {
                    alert('Falló la respuesta.');
                } else if (textStatus === 'timeout') {
                    alert('Se acabó el tiempo de espera.');
                } else if (textStatus === 'abort') {
                    alert('Conexión abortada.');
                } else {
                    alert('Error: ' + jqXHR.responseText);
                }
            });
        });

        function actualizarFirma(boton) {
            var nombreImagen = $(boton).attr('data-firma');
            var imagenFirma;

            //Crear un elemento input type file
            var input = document.createElement('input');
            input.type = 'file';
            input.onchange = e => {
                //Validar que solo se permitan imagenes
                imagenFirma = e.target.files[0];
                var re = /(\.jpg|\.jpeg|\.gif|\.png)$/i;
                if (!re.exec(imagenFirma.name)) {
                    alertify.warning('<h3>Solo se permiten subir imágenes.</h3>');
                } else {
                    //Actualizar la firma
                    alertify.confirm("Aviso", "¿Está seguro(a) actualizar la imagen de su firma?",
                        function() {
                            var formData = new FormData();
                            formData.append('nuevaFirma', imagenFirma);
                            formData.append('accion', 'actualizarFirmaUsuario');
                            formData.append('idUser', '<?php echo $_SESSION['idUsuario']; ?>');
                            formData.append('nombreImagen', nombreImagen);
                            formData.append('correo', '<?php echo $_SESSION['correo']; ?>')
                            $.ajax({
                                url: 'conexion/consultasSQL.php',
                                data: formData,
                                method: 'post',
                                contentType: false,
                                processData: false,
                                success: function(response) {
                                    var resp = JSON.parse(response);
                                    if(resp.success) {
                                        console.log(resp.data);
                                        $("#firmaImg").html('<img src="./firmasimagenes/' + resp.data + '" class="rounded img-fluid" width="80"/>');
                                        //$("#firma img").attr('src', './firmasimagenes/' + resp.data);
                                        $("#firmaImg").next().find("button").attr("data-firma", resp.data);
                                        //boton.setAttribute("data-firma", resp.data);
                                        //boton.dataset.firma = resp.data;
                                        alertify.success('<h3>' + resp.mensaje + '</h3>');
                                    } else {
                                        alertify.warning('<h3>' + resp.mensaje + '</h3>');
                                    }
                                }
                            }).fail(function(jqXHR, textStatus, errorThrown) {
                                if (jqXHR.status === 0) {
                                    alert('No conectado, verifique su red.');
                                } else if (jqXHR.status == 404) {
                                    alert('Pagina no encontrada [404]');
                                } else if (jqXHR.status == 500) {
                                    alert('Internal Server Error [500].');
                                } else if (textStatus === 'parsererror') {
                                    alert('Falló la respuesta.');
                                } else if (textStatus === 'timeout') {
                                    alert('Se acabó el tiempo de espera.');
                                } else if (textStatus === 'abort') {
                                    alert('Conexión abortada.');
                                } else {
                                    alert('Error: ' + jqXHR.responseText);
                                }
                            });
                        },
                        function() {}
                    ).set('labels', {
                        ok: 'Aceptar',
                        cancel: 'Cancelar'
                    });
                }
            }
            input.click();
        }
    </script>

</body>

</html>