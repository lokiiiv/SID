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
                            <li class="breadcrumb-item active" aria-current="page">Leer/editar roles</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <div class="row">
                <h4 style="padding-left:15px;">Roles registrados en el sistema</h4>
            </div>

            <?php if($u->hasPrivilegio("agregar_roles")) { ?>
                <div class="row">
                    <div class="col-md-12 mt-2">
                        <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#modalAddEdit" id="botonCrear">Crear <i class="fa-solid fa-plus"></i></button>
                    </div>
                </div>
            <?php } ?>
            <div class="row" style="margin-top: 25px;">
                <div class="col-md-12">
                    <table id="tablaRoles" class="table table-hover" style="margin-top: 30px;">
                        <thead>
                            <tr>
                                <th class="text-center" style="vertical-align: middle;">ID</th>
                                <th class="text-center" style="vertical-align: middle;">Nombre en el sistema</th>
                                <th class="text-center" style="vertical-align: middle;">Nombre</th>
                                <th class="text-center" style="vertical-align: middle;">Permisos</th>
                                <th class="text-center" style="vertical-align: middle;">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Modal para editar y registrar un nuevo rol -->
            <div class="modal fade" tabindex="-1" role="dialog" id="modalAddEdit">
                <div class="modal-dialog" role="document">
                    <form method="POST" id="formAddEdit">
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
                                    <div class="col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <label for="inputAp">Nombre del rol</label>
                                            <input type="text" class="form-control" id="inputRol" name="inputRol" placeholder="Ingrese el nombre del rol">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <h6>Asignación de permisos</h6>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <div id="contenedor-permisos">
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

    <?php
    require 'footer.php';
    ?>

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
        var tableRoles;
        var idRol;

        $(document).ready(function() {
            //Al cargar la pagina, cargar los datos con la información de los roles registrados
            var parametros = {
                "accion": "listarRoles",
            };
            tableRoles = $("#tablaRoles").DataTable({
                "autoWidth": false,
                "responsive": true,
                "order": [],
                "language": {
                    "url": "datatables/es-ES.json"
                },
                "ajax": {
                    "data": {
                        "accion": "listarRoles"
                    },
                    "url": "conexion/consultasSQL.php",
                    "type": "post",
                    "dataSrc": function(json) {
                        if (typeof(json.success) != "undefined") {
                            if (!json.success) {
                                alertify.error('<h3 style="color: white;">' + json.mensaje + '</h3>');
                            }
                        } else {
                            return json;
                        }
                    },
                    "error": function(jqXHR, textStatus, errorThrown) {
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
                        "data": "id_rol",
                        "width": "50px"
                    },
                    {
                        "data": "nombre_rol",
                        "width": "110px"
                    },
                    {
                        "data": "descripcion_rol",
                        "width": "110px"
                    },
                    {
                        "data": "permisos",
                        "render": function(data, type, row, meta) {
                            //Obtener el string del JSON que contiene los permisos que tiene el usuario
                            var permisos = JSON.parse(data);
                            var vista = '';
                            //Si si tiene roles, entonces mostrarlos
                            if (permisos.length > 0) {
                                vista += '<div class="row" style="padding:1px;"><div>';
                                permisos.forEach(val => {
                                    vista += '<span class="badge badge-primary" style="font-size:11px; margin: 2px;">' + val['descripcion'] + '</span>';        
                                });
                                vista += '</div></div>';
                                return vista;
                            } else {
                                vista = '<div class="row"><p style="margin: auto;">Sin permisos.</p></div>'
                                return vista;
                            }
                        },
                        "orderable": false
                    },
                    {
                        "data": "acciones",
                        "width": "200px",
                        "orderable": false
                    }
                ]
            });

            //Validación del formulario para agregar/editar roles
            var validate = $("#formAddEdit").validate({
                rules: {
                    inputRol: {
                        required: true,
                        normalizer: function(value) {
                            return $.trim(value);
                        },
                        minlength: 4
                    }
                },
                messages: {
                    inputRol: {
                        required: "Se requiere el nombre del rol.",
                        minlength: "Ingrese un nombre más largo."
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

                    //Crear el formData con los datos a enviar que se ingresen en el formulario
                    var formData = new FormData(form);
                    formData.append('accion', 'crearActualizarRol');

                    //Obtener una lista de los permisos que se selccionaron en caso de que se agrege un nuevo rol
                    var selectedPermisos = [];
                    $("#contenedor-permisos input:checked").each(function() {
                        selectedPermisos.push($(this).data('id'));
                    });
                    formData.append('idPermisos', JSON.stringify(selectedPermisos));

                    //Adjuntar el ID del rol en caso de actualizacion
                    formData.append('idRol', idRol);

                    $.ajax({
                        data: formData,
                        url: "conexion/consultasSQL.php",
                        type: "post",
                        contentType: false,
                        processData: false,
                        success: function(response) {
                            var res = JSON.parse(response);
                            if (res['success']) {
                                alertify.success('<h3>' + res['mensaje'] + '</h3>');
                                $("#formAddEdit").trigger('reset');
                                $("#modalAddEdit").modal('hide');
                                //Recargar la tabla nuevamente
                                tableRoles.ajax.reload();
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
                }
            });

            //Realizar las siguientes acciones al dar click en el boton de agregar nuevo rol
            $("#botonCrear").click(function() {
                //Resetar el formulario para el validador de JQuery
                validate.resetForm();
                $("#formAddEdit").find('.is-invalid').removeClass('is-invalid'); //Remover las clases is-invalid para que no se vean los campos en rojo

                $("#modalAddEdit #formAddEdit").trigger('reset')
                $("#modalAddEdit .modal-title").text('Crear rol');
                //Se asigna el valor de "Crear" dentro de un input type hiden
                $("#action").val("Crear");
                $("#operacion").val("Crear");

                $("#modalAddEdit #contenedor-permisos").html("");
                //Obtener una lista de los permisos disponibles para mostrarlos en el modal
                $.ajax({
                    data: {
                        "accion": "listarPermisosGeneral"
                    },
                    url: "conexion/consultasSQL.php",
                    type: "post",
                    success: function(response) {
                        //Obtener los permisos que existen en el sistema y mostrarlos en forma de Checkbox
                        var permisos = JSON.parse(response);
                        var checkPermisos = '';
                        permisos.forEach(permiso => {
                            checkPermisos += '<div class="form-check">' +
                                '<input class="form-check-input" type="checkbox" value="' + permiso['descripcion_permiso'] + '" id="permiso_' + permiso['id_permiso'] + '" data-id="' + permiso['id_permiso'] + '">' +
                                '<label class="form-check-label" for="permiso_' + permiso['id_permiso'] + '">' +
                                permiso['descripcion_permiso'] +
                                '</label>' +
                                '</div>';
                        });
                        $("#modalAddEdit #contenedor-permisos").html(checkPermisos);
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

            //Acciones para modificar el rol
            $(document).on('click', '.editar', function(e) {
                e.preventDefault();

                //Obtener la información del rol a eliminar a través del ID
                idRol = $(this).data('id');

                $.ajax({
                    data: {
                        "accion": "listarRolById",
                        "idRol": idRol
                    },
                    url: "conexion/consultasSQL.php",
                    type: "post",
                    success: function(respuesta) {
                        var resp = JSON.parse(respuesta);
                        if (resp['success']) {
                            resp = resp['data'];

                            //Resetar la validacion del formulario y limpiar errores por si es necesario
                            validate.resetForm(); //Resetar el validador de campos
                            $("#formAddEdit").find('.is-invalid').removeClass('is-invalid'); //Remover las clases is-invalid para que no se evan los campos en rojo

                            //Definir el el submit del formulario con un valor de actualizar
                            $("#action").val("Actualizar");
                            $("#operacion").val("Actualizar");

                            //Abrir el modal y mostrar los valores del rol en los inputs correspondientes
                            $("#modalAddEdit").modal('show');
                            $("#modalAddEdit .modal-title").text("Editar rol");
                            $("#modalAddEdit #inputRol").val(resp['descripcion_rol']);

                            //Obtener una lista de los permisos disponibles para mostrarlos en el modal
                            $("#modalAddEdit #contenedor-permisos").html("");
                            $.ajax({
                                data: {
                                    "accion": "listarPermisosGeneral"
                                },
                                "url": "conexion/consultasSQL.php",
                                "type": "post",
                                success: function(response) {
                                    //Obtener los roles que existen en el sistema y mostrarlos en forma de Checkbox
                                    var permisos = JSON.parse(response);

                                    //Obtener los permisos que tiene el rol seleccionado, extraer solo los ID 
                                    var permisosRoles = JSON.parse(resp['permisos']).map(obj => obj.id);

                                    var html = '';
                                    permisos.forEach(permiso => {
                                        //Si el id de los permisos en el sistema se encuentra en el array de permisos que el rol tiene. marcar como seleccionado
                                        var isChecked = permisosRoles.includes(permiso['id_permiso']) ? 'checked' : '';
                                        html += '<div class="form-check">' +
                                                    '<input class="form-check-input" type="checkbox" value="' + permiso['descripcion_permiso'] + '" id="permiso_' + permiso['id_permiso'] + '" data-id="' + permiso['id_permiso'] + '" ' + isChecked + '>' +
                                                    '<label class="form-check-label" for="permiso_' + permiso['id_permiso'] + '">' + permiso['descripcion_permiso'] + '</label>' +
                                                '</div>';
                                    });
                                    $("#modalAddEdit #contenedor-permisos").html(html);

                                    //Cuando se va a editar, añadir a los checkbox de permisos la propiedad para onchange
                                    //de este modo se puede elegir eliminar o agregar los permisos de ese rol seleccionado
                                    $("#contenedor-permisos input[type='checkbox']").each(function() {
                                        $(this).attr("onclick", "agregarEliminarPermiso(event, " + idRol + ")");
                                    });

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
                        } else {
                            alertify.warning('<h3>' + resp['mensaje'] + '</h3>');
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
            })

            $(document).on('click', '.eliminar', function(e) {
                e.preventDefault();

                var fila = $(this).closest('tr');
                if (fila.hasClass('child')) {
                    fila = fila.prev();
                }

                //ID del rol a eliminar
                var idRol = $(this).data('id');
                var nombreRol = fila.find('td:eq(2)').text();
                alertify.confirm("Aviso", "¿Está seguro de eliminar el rol " + nombreRol + "? Si lo hace, los usuarios perderán el rol seleccionado.",
                    function() {
                        $.ajax({
                            data: {
                                accion: 'eliminarRol',
                                idRol: idRol
                            },
                            url: 'conexion/consultasSQL.php',
                            type: 'post',
                            success: function(response) {
                                var res = JSON.parse(response);
                                if (res['success']) {
                                    alertify.success('<h3>' + res['mensaje'] + '</h3>');
                                    tableRoles.ajax.reload();
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
                    },
                    function() {

                    }
                ).set("labels", {
                    ok: "Aceptar",
                    cancel: "Cancelar"
                });
            });
        });

        function agregarEliminarPermiso(event, id_rol) {
            event.preventDefault();

            var checkbox = event.target;
            var valueCheck = $(checkbox).val();
            var isChecked = $(checkbox).is(':checked');
            if (isChecked) {
                alertify.confirm("Aviso", "¿Está seguro(a) de agregar el rol " + valueCheck + "?",
                    function() {
                        var permisoSeleccionado = $(checkbox).data('id');
                        //Peticion para agregar el permiso seleccionado al rol
                        $.ajax({
                            data: {
                                accion: 'agregarPermisoDeRol',
                                idRol: id_rol,
                                idPermiso: permisoSeleccionado
                            },
                            url: 'conexion/consultasSQL.php',
                            type: 'post',
                            success: function(response) {
                                var res = JSON.parse(response);
                                if(res['success']) {
                                    alertify.success('<h3>' + res['mensaje'] + '</h3>');
                                    //Poner el checkbox como seleccionado
                                    $(checkbox).prop('checked', true);
                                    //$("#modalAddEdit").modal('hide');
                                    tableRoles.ajax.reload();
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
                        
                    },
                    function() {

                    }
                ).set('labels', {
                    ok: 'Aceptar',
                    cancel: 'Cancelar'
                });
            } else {
                alertify.confirm("Aviso", "¿Está seguro(a) de eliminar el rol " + valueCheck + "?",
                    function() {
                        //Peticion para eliminar el permiso seleccionado al rol
                        var permisoSeleccionado = $(checkbox).data('id');
                        $.ajax({
                            data: {
                                accion: 'eliminarPermisoDeRol',
                                idRol: id_rol,
                                idPermiso: permisoSeleccionado
                            },
                            url: 'conexion/consultasSQL.php',
                            type: 'post',
                            success: function(response) {
                                var res = JSON.parse(response);
                                if(res['success']) {
                                    alertify.success('<h3>' + res['mensaje'] + '</h3>');
                                    //Poner el checkbox como seleccionado
                                    $(checkbox).prop('checked', false);
                                    //$("#modalAddEdit").modal('hide');
                                    tableRoles.ajax.reload();
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
                    },
                    function() {

                    }
                ).set('labels', {
                    ok: 'Aceptar',
                    cancel: 'Cancelar'
                });
            }
        }
    </script>

</body>

</html>