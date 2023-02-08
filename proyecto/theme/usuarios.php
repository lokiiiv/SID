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
                <h4 style="padding-left:15px;">Usuarios registrados en el sistema</h4>
            </div>
            <div class="row">
                <div class="col-md-12 mt-2">
                    <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#modalAddEdit" id="botonCrear">Crear <i class="fa-solid fa-plus"></i></button>
                </div>
            </div>
            <div class="row" style="margin-top: 25px;">
                <div class="col-md-12">
                    <table id="tablaUsuarios" class="table table-hover" style="margin-top: 30px;">
                        <thead>
                            <tr>
                                <th class="text-center">Clave</th>
                                <th class="text-center">Apellido paterno</th>
                                <th class="text-center">Apellido materno</th>
                                <th class="text-center">Nombre</th>
                                <th class="text-center">Correo</th>
                                <th class="text-center">Firma</th>
                                <th class="text-center">Roles</th>
                                <th class="text-center">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
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
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <h6>Información general</h6>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12 col-md-6">
                                        <div class="form-group">
                                            <label for="inputClave">Clave</label>
                                            <input type="text" class="form-control" id="inputClave" name="inputClave" placeholder="Ingrese la clave">
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-6">
                                        <div class="form-group">
                                            <label for="inputAp">Apellido paterno</label>
                                            <input type="text" class="form-control" id="inputAp" name="inputAp" placeholder="Ingrese el apellido paterno">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12 col-md-6">
                                        <div class="form-group">
                                            <label for="inputAm">Apellido materno</label>
                                            <input type="text" class="form-control" id="inputAm" name="inputAm" placeholder="Ingrese el apellido materno">
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-6">
                                        <div class="form-group">
                                            <label for="inputNombre">Nombre</label>
                                            <input type="text" class="form-control" id="inputNombre" name="inputNombre" placeholder="Ingrese el nombre">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="inputCorreo">Correo institucional</label>
                                            <input type="email" class="form-control" id="inputCorreo" name="inputCorreo" placeholder="Ingrese el correo institucional correctamente">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="inputFirma">Firma</label>
                                            <input type="file" class="form-control-file" id="inputFirma">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="row">
                                            <span id="imagen_subida" style="margin: auto"></span>
                                        </div>

                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <h6>Asignación de roles</h6>
                                                    <small id="rolHelp" class="form-text text-muted" style="font-size: 13px;">¿No ve el rol que necesita? <a href="roles.php">Click aqui para administrar roles</a></small>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <div id="contenedor-roles">
                                                        <!-- Aqui se llenaran los roles conforme a la base de datos !-->
                                                    </div>
                                                </div>
                                            </div>
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
        </div>
    </div>
    <br>

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

    <script src="js/jquery.validate.min.js"></script>

    <script src="datatables/DataTables-1.13.1/js/jquery.dataTables.min.js"></script>
    <script src="datatables/DataTables-1.13.1/js/dataTables.bootstrap4.min.js"></script>
    <script src="datatables/Responsive-2.4.0/js/dataTables.responsive.js"></script>
    <script src="datatables/Responsive-2.4.0/js/responsive.bootstrap4.min.js"></script>

    <script>
        $(document).ready(function() {
            //Al cargar la pagina, cargar los datos con la información de los usuarios registrados en la tabla y personalizarla
            var parametros = {
                "accion": "listarUsuarios",
            };
            //La carga de los datos de esta tabla se realiza de manera ServerSide, es decir
            //cada accion en la tabla como busquedas, ordenamiento, etc, se realizan desde el servidor y no desde el cliente
            var tableUsuarios = $("#tablaUsuarios").DataTable({
                "processing": true,
                "serverSide": true,
                "autoWidth": false,
                "order": [],
                "responsive": true,
                "ajax": {
                    "data": {
                        "accion": "listarUsuarios"
                    },
                    "url": "conexion/consultasSQL.php",
                    "type": "post",
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
                "columns": [{
                        "data": "clave",
                        "width": "50px"
                    },
                    {
                        "data": "ap",
                        "width": "100px"
                    },
                    {
                        "data": "am",
                        "width": "100px"
                    },
                    {
                        "data": "nombre",
                        "width": "150px"
                    },
                    {
                        "data": "correo",
                        "width": "100px"
                    },
                    {
                        "data": "firma",
                        "orderable": false
                    },
                    {
                        "data": "roles",
                        "orderable": false
                    },
                    {
                        "data": "acciones",
                        "orderable": false
                    }
                ]
            });

            //Al presionar el boton de crear, se debe limpiar el formulario y sus campos, dejarlos en blanco
            $("#botonCrear").click(function() {
                $("#modalAddEdit #formAddEdit")[0].reset();
                $("#modalAddEdit .modal-title").text('Crear usuario');
                //Se asigna el valor de "Crear" dentro de un input type hiden
                $("#action").val("Crear");
                $("#operacion").val("Crear");
                $("#imagen_subida").html("");

                $("#modalAddEdit #contenedor-roles").html("");
                //Obtener una lista de los roles disponibles para mostrarlos en el modal
                $.ajax({
                    data: {
                        "accion": "listarRolesGeneral"
                    },
                    "url": "conexion/consultasSQL.php",
                    "type": "post",
                    success: function(response) {
                        //Obtener los roles que existen en el sistema y mostrarlos en forma de Checkbox
                        var roles = JSON.parse(response);
                        var checkRoles = '';
                        roles.forEach(rol => {
                            checkRoles += '<div class="form-check">' +
                                                '<input class="form-check-input" type="checkbox" value="" id="rol_' + rol['id_rol'] + '">' +
                                                    '<label class="form-check-label" for="rol_' + rol['id_rol'] + '">' +
                                                        rol['descripcion_rol'] +
                                                    '</label>' +
                                                '</div>' +
                                            '</div>';
                        });
                        $("#modalAddEdit #contenedor-roles").html(checkRoles);
                    }
                }).fail(function(jqXHR, textStatus, errorThrown) {
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
                });
            });

            //Validaciones del formulario de agregar/editar usando JQuery Validate
            var validate = $("#formAddEdit").validate({
                rules: {
                    inputClave: {
                        required: true,
                        normalizer: function(value) {
                            return $.trim(value);
                        }
                    },
                    inputAp: {
                        required: true,
                        normalizer: function(value) {
                            return $.trim(value);
                        }
                    },
                    inputAm: {
                        required: true,
                        normalizer: function(value) {
                            return $.trim(value);
                        }
                    },
                    inputNombre: {
                        required: true,
                        normalizer: function(value) {
                            return $.trim(value);
                        }
                    },
                    inputCorreo: {
                        required: true,
                        email: true,
                        normalizer: function(value) {
                            return $.trim(value);
                        }
                    }
                },
                messages: {
                    inputClave: {
                        required: "Se requiere la clave."
                    },
                    inputAp: {
                        required: "Se requiere el apellido paterno."
                    },
                    inputAm: {
                        required: "Se requiere el apellido materno."
                    },
                    inputNombre: {
                        required: "Se requiere el nombre."
                    },
                    inputCorreo: {
                        required: "Se requiere el correo.",
                        email: "El valor debe ser un email."
                    }
                },
                errorElement: "h4",
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



            //Funcionalidad para eliminar un usuario
            $(document).on('click', '.eliminar', function(e) {
                e.preventDefault();
                var fila = $(this).closest('tr');
                //Obtener la fila donde se encuentra el boton o link de eliminar
                if (fila.hasClass('child')) {
                    fila = fila.prev();
                }

                //Obtener el id del usuario a eliminar, el cual esta incrustado en la propiedad ID de los botones desplegables
                var idUser = $(this).closest('.btn-group').attr('id');

                var correoUser = fila.find('td:eq(4)').text();
                var usuarioActual = "<?php echo $_SESSION['correo'] ?>";
                if (correoUser === usuarioActual) {
                    alertify.error("<h3>No puedes eliminarte en este momento, tienes la sesión activa.</h3>");
                } else {
                    var nombreCompleto = fila.find('td:eq(1)').text() + " " + fila.find('td:eq(2)').text() + " " + fila.find('td:eq(3)').text();
                    alertify.confirm("Aviso", "¿Esta seguro(a) de eliminar al usuario " + nombreCompleto + "?",
                        function() {

                        },
                        function() {

                        }
                    ).set('labels', {
                        ok: 'Aceptar',
                        cancel: 'Cancelar'
                    });
                }



            });

            //Funcionalidad para editar un usuario
            $(document).on('click', '.editar', function(e) {
                e.preventDefault();

                //Obtener el id del usuario el cual esta incrustado en la propiedad ID del grupo de botones desplegables
                var idUser = $(this).closest('.btn-group').attr('id');

                //Ejecutar una petición al servidor para obtener al usuario
                $.ajax({
                    data: {
                        "accion": "listarUsuarioById",
                        "idUser": idUser
                    },
                    "url": "conexion/consultasSQL.php",
                    "type": "post",
                    success: function(respuesta) {
                        var resp = JSON.parse(respuesta);
                        //Abrir el modal y mostrar los valores del usuario en los inputs correspondientes
                        $("#modalAddEdit").modal('show');
                        $("#modalAddEdit .modal-title").text("Editar usuario");
                        $("#modalAddEdit #inputClave").val(resp['clave'])
                        $("#modalAddEdit #inputAp").val(resp['ap']);
                        $("#modalAddEdit #inputAm").val(resp['am']);
                        $("#modalAddEdit #inputNombre").val(resp['nombre']);
                        $("#modalAddEdit #inputCorreo").val(resp['correo']);

                        $("#modalAddEdit #contenedor-roles").html("");
                        //Obtener una lista de los roles disponibles para mostrarlos en el modal
                        $.ajax({
                            data: {
                                "accion": "listarRolesGeneral"
                            },
                            "url": "conexion/consultasSQL.php",
                            "type": "post",
                            success: function(response) {
                                //Obtener los roles que existen en el sistema y mostrarlos en forma de Checkbox
                                var roles = JSON.parse(response);
                                var checkRoles = '';
                                roles.forEach(rol => {
                                    checkRoles += '<div class="form-check">' +
                                        '<input class="form-check-input" type="checkbox" value="" id="rol_' + rol['id_rol'] + '">' +
                                        '<label class="form-check-label" for="rol_' + rol['id_rol'] + '">' +
                                        rol['descripcion_rol'] +
                                        '</label>' +
                                        '</div>' +
                                        '</div>';
                                });
                                $("#modalAddEdit #contenedor-roles").html(checkRoles);

                                //Una vez que se muestran, poner como seleccionados aquellos roles que el usuario ya tiene asignados
                                var roles = JSON.parse(resp['roles']);
                                roles.forEach(rol => {
                                    $("#modalAddEdit #contenedor-roles #rol_" + rol['id']).prop('checked', true);
                                });
                            }
                        }).fail(function(jqXHR, textStatus, errorThrown) {
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
                        });
                    }

                }).fail(function(jqXHR, textStatus, errorThrown) {
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
                });
            });
        });
    </script>

</body>

</html>