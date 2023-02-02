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

    <!-- Datatables -->
    <link rel="stylesheet" href="datatables/datatables.min.css">
    <link rel="stylesheet" href="datatables/DataTables-1.13.1/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="datatables/Responsive-2.4.0/css/responsive.bootstrap4.min.css">
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
        <div class="container">
            <div class="row" style="margin-top: 25px;">
                <h3 style="padding-left:15px;">Usuarios registrados en el sistema</h3>
            </div>
            <div class="row" style="margin-top: 25px;">
                <div class="col-md-12">
                    <table id="tablaUsuarios" class="table table-hover" style="margin-top: 30px; padding-left:15px; padding-right:15px">
                        <thead>
                            <tr>
                                <th class="text-center">ID</th>
                                <th class="text-center">Clave</th>
                                <th class="text-center">Apellido paterno</th>
                                <th class="text-center">Apellido materno</th>
                                <th class="text-center">Nombre</th>
                                <th class="text-center">Correo</th>
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
        </div>
        
    </div>

    <!-- Scroll to top -->
    <span class="totop"><a href="#"><i class="fa fa-angle-up"></i></a></span>

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

    <script src="datatables/DataTables-1.13.1/js/jquery.dataTables.min.js"></script>
    <script src="datatables/DataTables-1.13.1/js/dataTables.bootstrap4.min.js"></script>
    <script src="datatables/Responsive-2.4.0/js/dataTables.responsive.js"></script>
    <script src="datatables/Responsive-2.4.0/js/responsive.bootstrap4.min.js"></script>
    
    <script>
        $(document).ready(function(){
            //Al cargar la pagina, cargar los datos con la información de los usuarios registrados en la tabla y personalizarla
            var parametros = {
                "accion": "listarUsuarios",
            };
            var tableUsuarios = $("#tablaUsuarios").DataTable({
                "autoWidth": false,
                "responsive": true,
                "ajax": {
                    "data" : {
                        "accion": "listarUsuarios"
                    },
                    "url": "conexion/consultasSQL.php",
                    "type": "post",
                    "dataSrc": "",
                    "error": function(jqXHR, textStatus, errorThrown) {
                        $('#estatus' + campo).html("");
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
                    }
                },
                "columns": [
                    {
                        "data": "cat_ID",
                        "visible": false
                    },
                    {
                        "data": "cat_Clave",
                        "width": "30px"
                    },
                    {
                        "data": "cat_ApePat",
                        "width": "100px"
                    },
                    {
                        "data": "cat_ApeMat",
                        "width": "100px"
                    },
                    {
                        "data": "cat_Nombre",
                        "width": "150px"
                    },
                    {
                        "data": "cat_CorreoE",
                        "width": "100px"
                    },
                    {
                        "data": "roles",
                        "render": function(data, type, row, meta) {
                            //Obtener el string del JSON que contiene los roles que tiene el usuario
                            var roles = JSON.parse(data);
                            var vista = '';
                            //Si si tiene roles, entonces mostrarlos
                            if(roles.length > 0) {
                                roles.forEach(val => {
                                    vista += '<div class="row" style="padding:1px;">' +
                                                '<span class="badge badge-primary" style="font-size:11px;margin: auto;">' + val['descripcion'] + '</span>' +
                                            '</div>';
                                });
                                return vista;
                            } else {
                                vista = '<div class="row"><p style="margin: auto;">Aún no se asignan roles</p></div>'
                                return vista;
                            }
                            
                        }
                    },
                    {"data": "firma"},
                    {"defaultContent": '<div class="btn-group">' + 
                                            '<button type="button" class="btn btn-success btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">' +
                                                'Acciones'+
                                            '</button>' +
                                            '<div class="dropdown-menu">' +
                                                '<a class="dropdown-item" href="">Editar</a>' +
                                                '<a class="dropdown-item" href="">Eliminar</a>' +
                                            '</div>' +
                                        '</div>'}
                ]
            });
        });
    </script>

</body>

</html>