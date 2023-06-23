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

    <!-- Datatables -->
    <link rel="stylesheet" href="datatables/datatables.min.css">
    <link rel="stylesheet" href="datatables/DataTables-1.13.1/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="datatables/Responsive-2.4.0/css/responsive.bootstrap4.min.css">

    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/sina-nav.min.css">
</head>

<body>
    <?php
    include("BarraMenu.php");
    ?>

    <div class="content">
        <div class="container">
            <div class="row  mt-3">
                <div class="col-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.php">Inicio</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Leer/editar retícula</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <div class="row">
                <h4 style="padding-left:15px;">Materias registradas en el sistema</h4>
            </div>

            <div class="row">
                <div class="col-md-12 mt-2">
                    <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#modalAddEdit" id="botonCrear">Crear <i class="fa-solid fa-plus"></i></button>
                </div>
            </div>

            <div class="row" style="margin-top: 25px;">
                <div class="col-md-12">
                    <table id="tablaReticula" class="table table-hover" style="margin-top: 30px;">
                        <thead>
                            <tr>
                                <th class="text-center">Clave</th>
                                <th class="text-center">Clave interna</th>
                                <th class="text-center">Nombre corto</th>
                                <th class="text-center">Nombre completo</th>
                                <th class="text-center">Clave oficial</th>
                                <th class="text-center">Temas</th>
                                <th class="text-center">Creditos</th>
                                <th class="text-center">moe_ID</th>
                                <th class="text-center">dep_ID</th>
                                <th class="text-center">pes_ID</th>
                                <th class="text-center">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>


        </div>
    </div>
    <br>

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

    <script src="datatables/DataTables-1.13.1/js/jquery.dataTables.min.js"></script>
    <script src="datatables/DataTables-1.13.1/js/dataTables.bootstrap4.min.js"></script>
    <script src="datatables/Responsive-2.4.0/js/dataTables.responsive.js"></script>
    <script src="datatables/Responsive-2.4.0/js/responsive.bootstrap4.min.js"></script>

    <script src="js/wow.min.js"></script>
    <script src="js/sina-nav.js"></script>

    <!-- For All Plug-in Activation & Others -->
    <script type="text/javascript">
        $(document).ready(function() {
            // WOW animation initialize
            new WOW().init();
        });
    </script>

    <script>
        var tableUsuarios;
        $(document).ready(function() {

            tableUsuarios = $("#tablaReticula").DataTable({
                "autoWidth": true,
                "order": [],
                "responsive": true,
                "language": {
                    "url": "datatables/es-ES.json"
                },
                "ajax": {
                    "data": {
                        "accion": "obtenerReticula"
                    },
                    "url": "conexion/consultasSQL.php",
                    "type": "post",
                    "dataSrc": function(json) {
                        return json;
                    }
                },
                "columns": [
                    {
                        "data": "ret_Clave",
                        "orderable": false
                    },
                    {
                        "data": "ret_ClaveInt",
                        "orderable": false
                    },
                    {
                        "data": "ret_NomCorto",
                        "orderable": false
                    },
                    {
                        "data": "ret_NomCompleto",
                        "orderable": false
                    },
                    {
                        "data": "ret_ClaveOficial",
                        "orderable": false
                    },
                    {
                        "data": "temas",
                        "orderable": false
                    },
                    {
                        "data": "ret_Creditos",
                        "orderable": false
                    },
                    {
                        "data": "moe_ID",
                        "orderable": false
                    },
                    {
                        "data": "dep_ID",
                        "orderable": false
                    },
                    {
                        "data": "pes_ID",
                        "orderable": false
                    },
                    {
                        "data": "acciones",
                        "orderable": false
                    }
                ]
            });
        });
    </script>
</body>

</html>