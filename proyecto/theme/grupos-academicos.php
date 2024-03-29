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
                            <li class="breadcrumb-item active" aria-current="page">Leer/editar grupos académicos</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <div class="row">
                <h4 style="padding-left:15px;">Grupos académicos</h4>
            </div>
            <?php if($u->hasPrivilegio("agregar_grupo_academico")) { ?>
                <div class="row">
                    <div class="col-md-12 mt-2">
                        <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#modalAddEdit" id="botonCrear">Crear <i class="fa-solid fa-plus"></i></button>
                    </div>
                </div>
            <?php } ?>
            <div class="row" style="margin-top: 25px;">
                <div class="col-md-12">
                    <table id="tablaGrupos" class="table table-hover" style="margin-top: 30px;">
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Programa educativo</th>
                                <th>Presidente de grupo acádemico</th>
                                <th>Acciones</th>
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
        <div class="modal-dialog modal-lg" role="document">
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
                            <div class="col-md-12 col-xs-12 col-sm-12 col-lg-12">
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
                                            <label for="inputNombre">Nombre</label>
                                            <input type="text" class="form-control" id="inputNombre" name="inputNombre" placeholder="Ingrese el nombre del grupo académico">
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-6">
                                        <div class="form-group">
                                            <label for="inputPrograma">Programa educativo</label>
                                            <select class="form-control" id="selectPrograma" name="selectPrograma">

                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <label for="inputPresidente">Presidente de grupo académico</label>
                                            <select class="form-control" id="selectPresidente" name="selectPresidente">

                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-10 col-xs-10 col-sm-10 col-lg-10 col-10 d-flex align-items-center">
                                        <h6>Asignación de materias</h6>
                                    </div>
                                    <div class="col-md-2 col-xs-2 col-sm-2 col-lg-2 col-2 d-flex justify-content-center justify-content-sm-center justify-content-md-end align-items-center">
                                        <button id="agregar" type="button" class="btn btn-info btn-sm">
                                            <i class="fa-solid fa-plus"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col d-flex justify-content-start flex-wrap" id="contenedor-materias">

                                    </div>
                                </div>
                                <div class="row mt-3" id="div-search" style="display: none;">
                                    <div class="col-md-12 col-sm-12 col-12">
                                        <div class="input-group">
                                            <input type="text" name="search" id="search" class="form-control rounded-1 border-info" placeholder="Clave o nombre de materia." autocomplete="off" required>
                                            <div class="input-group-append">
                                                <input type="button" name="search" value="Cancelar" class="btn btn-danger cancelar-search rounded-1">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-8" style="position: absolute; z-index: 999;">
                                        <div class="list-group" id="show-list-materias">
                                            <!-- Aqui se mostraran las materias que se vayan buscando -->
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
        var tablaGrupos;
        var idGrupo;
        var validate;

        $(document).ready(function() {
            tablaGrupos = $("#tablaGrupos").DataTable({
                "autoWidth": false,
                "responsive": true,
                "order": [],
                "language": {
                    "url": "datatables/es-ES.json"
                },
                "ajax": {
                    "data": {
                        "accion": "mostrarGruposAcademicos"
                    },
                    "url": "conexion/consultasSQL.php",
                    "type": "post",
                    "dataSrc": function(json) {
                        if (json.success) {
                            return json.data;
                        } else {
                            alertify.warning('<h3>' + json.mensaje + '</h3>');
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
                        "data": "nombre",
                        "width": "10%",
                    },
                    {
                        "data": "nombrePrograma",
                        "width": "40%",
                    },
                    {
                        "data": "presidente",
                        "width": "40%",
                    },
                    {
                        "data": "acciones",
                        "width": "10%",
                    }
                ],
                "columnDefs": [{
                        "targets": "_all",
                        "orderable": false
                    },
                    {
                        "targets": [0, 1, 2],
                        "render": function(data, type, row, meta) {
                            return '<h6>' + data + '</h6>'
                        }
                    }
                ]
            });

            validate = $("#formAddEdit").validate({
                rules: {
                    inputNombre: {
                        required: true,
                        normalizer: function(value) {
                            return $.trim(value);
                        }
                    },
                    selectPresidente: {
                        required: true
                    },
                    search: {
                        required: false
                    }
                },
                messages: {
                    inputNombre: {
                        required: "Se requiere el nombre."
                    },
                    selectPresidente: {
                        required: "Se requiere el presidente de grupo académico."
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

                    var formData = new FormData(form);
                    formData.append('accion', 'crearActualizarGrupoAcademico');
                    formData.append('idGrupo', idGrupo);

                    //Obtener los ID de las materias que se vayan seleccionado en caso de agregar un nuevo grupo academico
                    var selectedMaterias = [];
                    if ($("#operacion").val() == "Crear") {
                        $("#contenedor-materias a").each(function() {
                            selectedMaterias.push($(this).data('id'));
                        });
                    } else if ($("#operacion").val() == "Actualizar") {
                        $("#contenedor-materias a").each(function() {
                            if ($(this).data('nuevo') == 1) {
                                selectedMaterias.push($(this).data('id'));
                            }
                        });
                    }

                    formData.append('idMaterias', JSON.stringify(selectedMaterias));

                    $.ajax({
                        data: formData,
                        url: 'conexion/consultasSQL.php',
                        type: 'post',
                        contentType: false,
                        processData: false,
                        success: function(response) {
                            var res = JSON.parse(response);
                            if (res.success) {
                                alertify.success('<h3>' + res.mensaje + '</h3>');
                                $("#formAddEdit").trigger('reset');
                                $("#modalAddEdit").modal('hide');
                                //Recargar la tabla nuevamente
                                tablaGrupos.ajax.reload();
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
                }
            });

            $("#botonCrear").on('click', function() {
                validate.resetForm(); //Resetar el validador de campos
                $("#formAddEdit").find('.is-invalid').removeClass('is-invalid');
                $("#div-search").css('display', 'none');
                $("#contenedor-materias").html("");

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
                            $("#selectPrograma").html(optionsPE);

                            optionsPresidentes = '<option value="" disable selected>Seleccione presidente</option>';
                            presidentes.forEach(p => {
                                optionsPresidentes += '<option data-id="' + p.cat_ID + '" data-clave="' + p.cat_Clave + '" data-correo="' + p.correo + '" value="' + p.cat_ID + '">' + p.cat_Clave + ' - ' + p.nombre + '</option>';
                            });
                            $("#selectPresidente").html(optionsPresidentes);

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

        $("#agregar").on('click', function() {
            //Cuando se le de click al botón de agregar, mostrar la barra de busqueda para buscar materia
            $("#div-search").css('display', 'block');
        });

        $(".cancelar-search").on('click', function() {
            //Ocultar el buscador de materias
            $(this).closest('#div-search').css('display', 'none');
        });

        //Obtener las materias que vayan coincidiendo con lo que el usuario va ingresando
        $("#search").keyup(function() {
            var searchText = $(this).val().trim();
            if (searchText != "") {
                $.ajax({
                    data: {
                        "accion": "searchMaterias",
                        "search": searchText
                    },
                    url: "conexion/consultasSQL.php",
                    type: "post",
                    success: function(response) {
                        $("#show-list-materias").html(JSON.parse(response).data);
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
                $("#show-list-materias").html("");
            }
        });

        //Al dar click en alguna materia encontrada al buscarla en el input search
        $("#div-search").on('click', 'a', function(e) {
            e.preventDefault();
            $("#show-list-materias").html("");
            $("#search").val("");
            $("#search").focus();

            var idMateria = $(this).data('id');
            var claveMateria = $(this).data('clave');
            var nombreMateria = $(this).data('nombre');

            //Antes de agregar la materia al contendor de materias, verificar que no se repitan e ingresen la misma materia
            var ban = true;
            $("#contenedor-materias a").each(function() {
                if (idMateria == $(this).data('id')) {
                    alertify.warning("<h3>La materia de " + nombreMateria + " (" + claveMateria + ") ya fue seleccionada.</h3>");
                    ban = false;
                    return false;
                } else {
                    ban = true;
                }
            });
            if (ban) {
                var html = '<div class="item-materia"><h5><span class="badge badge-dark">' + claveMateria + ' - ' + nombreMateria + '<a href="" data-id="' + idMateria + '" data-nuevo="1"><i class="fa-solid fa-circle-xmark remove"></i></a></span></h5></div>';
                $("#contenedor-materias").append(html);
            }
        });

        //Eliminar las metarias que va agregando por si es necesario
        $("#contenedor-materias").on('click', 'a', function(e) {
            e.preventDefault();

            //Si la operacion es crear, solo eliminar el elemento del DOM
            if ($("#operacion").val() == "Crear") {
                $(this).closest('.item-materia').remove();

            } else if ($("#operacion").val() == "Actualizar") {
                //Si es actualizar, entonces se elige eliminar y quitar la metaria del grupo academico seleccionado

                //Si en la actualización, se decide agregar una materia nuevo, verificar si su data "nuevo" es igual a 1
                //Si el data "nuevo" es igual a 0, quiere decir que la materia ya esta asignada en la base de datos, por lo que se debe mostrar advertancia y realizar modificación
                if ($(this).data('nuevo') == 1) {
                    $(this).closest('.item-materia').remove();
                } else if ($(this).data('nuevo') == 0) {
                    var idMateria = $(this).data('id');
                    alertify.confirm("Aviso", "¿Está seguro(a) de quitar la materia:  " + $(this).closest('.badge').text() + "?",
                        function() {
                            //Eliminar la relacion que tiene la materia con el grupo academico
                            $.ajax({
                                data: {
                                    "accion": "quitarMateriaDeGrupoAcademico",
                                    "idMateria": idMateria
                                },
                                url: 'conexion/consultasSQL.php',
                                type: 'post',
                                success: function(response) {
                                    var res = JSON.parse(response);
                                    if (res.success) {
                                        alertify.success('<h3>' + res.mensaje + '</h3>');
                                        mostrarMateriasActuales(idGrupo);
                                        tablaGrupos.ajax.reload();
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
                        },
                        function() {

                        }
                    ).set('labels', {
                        ok: 'Aceptar',
                        cancel: 'Cancelar'
                    });
                }
            }
        });


        //Funcionalidad para cuando se eliga la opción de editar en alguno de los grupos academicos
        $(document).on('click', '.editar', function(e) {
            e.preventDefault();
            $("#div-search").css('display', 'none');
            //Obtener el ID del grupo, el cual esta dentro de la propieda data-id del boton
            idGrupo = $(this).data('id');

            mostrarMateriasActuales(idGrupo);
        });

        function mostrarMateriasActuales(idGrupo) {
            //Metodo para llenar los datos del grupo académico, además de las materias que forman parte del mismo
            $.ajax({
                data: {
                    "accion": "obtenerGrupoAcademicoById",
                    "idGrupo": idGrupo
                },
                url: "conexion/consultasSQL.php",
                type: "post",
                success: function(respuesta) {
                    var resp = JSON.parse(respuesta);
                    if (resp.success) {
                        resp = resp.data[0];
                        validate.resetForm();
                        $("#formAddEdit").find('.is-invalid').removeClass('is-invalid');

                        $("#accion").val("Actualizar");
                        $("#operacion").val("Actualizar");

                        //Abrir el modal y mostrar los valores
                        $("#modalAddEdit").modal("show");
                        $("#modalAddEdit .modal-title").text("Editar grupo académico");
                        $("#modalAddEdit #inputNombre").val(resp.nombre);

                        //Obtener los programas educativos y presidentes registrados en el sistema
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

                                    //Obtener el ID del programa educativo que tiene asignado este grupo academico
                                    var idPrograma = resp.id_programaE;
                                    var idPresidente = resp.cat_ID;

                                    //Generar los Select de los programas educativos y los presidentes
                                    var optionsPE = '';
                                    var optionsPresidentes = '';

                                    //Ponser los select como seleccionados conforme a los datos
                                    optionsPE = idPrograma == null ? '<option value="" disable selected>NINGUNO (NO APLICA)</option>' : '<option value="" disable>NINGUNO (NO APLICA)</option>';
                                    programas.forEach(p => {
                                        var isSelected = idPrograma == p.id_programaE ? 'selected' : '';
                                        optionsPE += '<option data-id="' + p.id_programaE + '" data-letra="' + p.letra + '" data-nombre="' + p.nombrePE + '" data-plan="' + p.planEstudio + '" value="' + p.id_programaE + '" ' + isSelected + '>' + p.nombrePE + ' - ' + p.planEstudio + '</option>';
                                    });
                                    $("#modalAddEdit #selectPrograma").html(optionsPE);

                                    optionsPresidentes = '<option value="" disable>Seleccione presidente</option>';
                                    presidentes.forEach(p => {
                                        var isSelected = idPresidente == p.cat_ID ? 'selected' : '';
                                        optionsPresidentes += '<option data-id="' + p.cat_ID + '" data-clave="' + p.cat_Clave + '" data-correo="' + p.correo + '" value="' + p.cat_ID + '" ' + isSelected + '>' + p.cat_Clave + ' - ' + p.nombre + '</option>';
                                    });
                                    $("#modalAddEdit #selectPresidente").html(optionsPresidentes);

                                    //Llenar el contenedor de materias con las materias que el grupo academico tiene asignadas
                                    var materiasDelGrupo = resp.materias;
                                    var html = '';
                                    materiasDelGrupo.forEach(mat => {
                                        html += '<div class="item-materia"><h5><span class="badge badge-dark">' + mat.clave + ' - ' + mat.nombre + '<a href="" data-id="' + mat.id + '" data-nuevo="0"><i class="fa-solid fa-circle-xmark remove"></i></a></span></h5></div>';
                                    });
                                    $("#contenedor-materias").html(html);
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
                    } else {
                        alertify.warning('<h3>' + resp.mensaje + '</h3>')
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

        //Acciones para eliminar un grupo academico por completo
        $(document).on('click', '.eliminar', function(e) {
            e.preventDefault();

            var fila = $(this).closest('tr');
            if(fila.hasClass('child')) {
                fila = fila.prev();
            }

            idGrupo = $(this).data('id');

            alertify.confirm("Aviso", "¿Está seguro(a) de eliminar el grupo académico de " + fila.find('td:eq(0)').text() + "?",
                function() {
                    //Eliminar la relacion que tiene la materia con el grupo academico
                    $.ajax({
                        data: {
                            "accion": "eliminarGrupoAcademico",
                            "idGrupo": idGrupo
                        },
                        url: 'conexion/consultasSQL.php',
                        type: 'post',
                        success: function(response) {
                            var res = JSON.parse(response);
                            if (res.success) {
                                alertify.success('<h3>' + res.mensaje + '</h3>');
                                tablaGrupos.ajax.reload();
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
                },
                function() {

                }
            ).set('labels', {
                ok: 'Aceptar',
                cancel: 'Cancelar'
            });
        });
    </script>
</body>

</html>