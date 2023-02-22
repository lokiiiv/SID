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
                    <h1><a>Hola <?php echo ucwords(strtolower($_SESSION["userData"]['first_name'])); ?></a></h1>
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
                <h4 style="padding-left:15px;">Grupos académicos</h4>
            </div>
            <div class="row">
                <div class="col-md-12 mt-2">
                    <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#modalAddEdit" id="botonCrear">Crear <i class="fa-solid fa-plus"></i></button>
                </div>
            </div>
            <div class="row" style="margin-top: 25px;">
                <div class="col-md-12">
                    <table id="tablaGrupos" class="table table-hover" style="margin-top: 30px;">
                        <thead>
                            <tr>
                                <th class="text-center">Nombre</th>
                                <th class="text-center">Programa educativo</th>
                                <th class="text-center">Presidente de grupo acádemico</th>
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

    <!-- Modal para editar y registrar un nuevo usuario -->
    <div class="modal fade" tabindex="-1" role="dialog" id="modalAddEdit">
        <div class="modal-dialog" role="document">
            <form method="POST" id="formAddEdit" enctype="multipart/form-data">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title"></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label for="inputNombre">Nombre</label>
                                    <input type="text" class="form-control" id="inputNombre" name="inputNombre" placeholder="Ingrese el nombre del grupo académico">
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label for="inputPrograma">Programa educativo</label>
                                    <select class="form-control" id="inputPrograma" name="inputPrograma">

                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label for="inputPresidente">Presidente de grupo académico</label>
                                    <select class="form-control" id="inputPresidente" name="inputPresidente">

                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" name="id_usuario" id="id_usuario">
                        <input type="hidden" name="operacion" id="operacion">
                        <button type="submit" class="btn btn-success" name="action" id="action">Aceptar</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    </div>
                </div>
            </form>
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

    <script>
        var tablaGrupos;

        $(document).ready(function() {
            tablaGrupos = $("#tablaGrupos").DataTable({
                "autoWidth": false,
                "responsive": true,
                "order": [],
                "language": {
                    "url": "datatables/es-ES.json"
                },
                "columns": [{
                        "width": "20%",
                        "orderable": false
                    },
                    {
                        "width": "40%",
                        "orderable": false
                    },
                    {
                        "width": "30%",
                        "orderable": false
                    },
                    {
                        "width": "10%",
                        "orderable": false
                    }
                ]
            });

            //Obtener los grupos academicos desde la base de datos
            $.ajax({
                data: {
                    "accion": "mostrarGruposAcademicos"
                },
                url: "conexion/consultasSQL.php",
                type: "post",
                success: function(response) {
                    var res = JSON.parse(response);
                    if (res.success) {
                        //Mostrar información en el DataTable
                        //Obtener los grupos
                        var grupos = res.data;
                        console.log(res.data);
                        grupos.forEach(grupo => {
                            agregarGrupo(grupo);
                        });

                    } else {
                        alertify.warning('<h3>' + res['mensaje'] + '</h3>');
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


            var validate = $("#formAddEdit").validate({
                rules: {
                    inputNombre: {
                        required: true,
                        normalizer: function(value) {
                            return $.trim(value);
                        }
                    },
                    inputPresidente: {
                        required: true
                    }
                },
                messages: {
                    inputNombre: {
                        required: "Se requiere la clave."
                    },
                    inputPresidente: {
                        required: "Se requiere el apellido materno."
                    }
                },
                errorElement: "span",
                errorPlacement: function(error, element) {
                    error.addClass('invalid-feedback');
                    element.closest('.form-group').append(error);
                },
                highlight: function(element, errorClass, validClass) {
                    $(element).addClass('is-invalid');
                },
                unhighlight: function(element, errorClass, validClass) {
                    $(element).removeClass('is-invalid');
                },
                submitHandler: function(form, event) {
                    event.preventDefault();
                    
                }
            });

            $("#botonCrear").on('click', function() {
                validate.resetForm(); //Resetar el validador de campos
                $("#formAddEdit").find('.is-invalid').removeClass('is-invalid');

                $("#modalAddEdit #formAddEdit").trigger('reset')
                $("#modalAddEdit .modal-title").text('Crear nuevo grupo académico');
                //Se asigna el valor de "Crear" dentro de un input type hiden
                $("#action").val("Crear");
                $("#operacion").val("Crear");

                //Obtener los grupos academicos desde la base de datos
                $.ajax({
                    data: {
                        "accion": "mostrarProgramasYPresidentes"
                    },
                    url: "conexion/consultasSQL.php",
                    type: "post",
                    success: function(response) {
                        var res = JSON.parse(response);
                        if (res.success) {
                            //Obtener los programas educativos y presidentes de academia
                            var programas = res.data.programas;
                            var presidentes = res.data.presidentes;

                            //Generar los Select de los programas educativos y los presidentes
                            var optionsPE = '';
                            var optionsPresidentes = '';

                            optionsPE = '<option value="" disable selected>NINGUNO (NO APLICA)</option>';
                            programas.forEach(p => {
                                optionsPE += '<option data-id="' + p.id_programaE + '" data-letra="' + p.letra + '" data-nombre="' + p.nombrePE + '" data-plan="' + p.planEstudio + '" value="' + p.id_programaE + '">' + p.nombrePE + ' - ' + p.planEstudio + '</option>';
                            });
                            $("#inputPrograma").html(optionsPE);

                            optionsPresidentes = '<option value="" disable selected>Seleccione presidente</option>';
                            presidentes.forEach(p => {
                                optionsPresidentes += '<option data-id="' + p.cat_ID + '" data-clave="' + p.cat_Clave + '" data-correo="' + p.correo + '">' + p.nombre + '</option>';
                            });
                            $("#inputPresidente").html(optionsPresidentes);

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
        });

        function agregarGrupo(grupo) {
            var nombre = "";
            var programaEdu = "";
            var presidente = "";
            var acciones = '<div class="row">' +
                '<div class="col-md-12">' +
                '<div style="margin: 0 auto;">' +
                '<button type="button" class="btn btn-warning btn-sm m-1"><i class="fa-solid fa-pen-to-square"></i></button>' +
                '<button type="button" class="btn btn-danger btn-sm"><i class="fa-solid fa-trash"></i></button>' +
                '</div>' +
                '</div>' +
                '</div>';

            nombre = '<h6>' + grupo.nombre.toUpperCase() + '</h6>';

            programaEdu = '<h6>' + (grupo.nombrePE != null ? grupo.nombrePE : 'NO APLICA.') + '</h6>';

            presidente = '<h6>' + grupo.nombreDoc + '</h6>';

            tablaGrupos.row.add([
                nombre,
                programaEdu,
                presidente,
                acciones
            ]).draw();
        }
    </script>
</body>

</html>