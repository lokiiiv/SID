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
	<link href="css/style_2.css" rel="stylesheet">
	<!-- Estiles generales personalizados -->
	<link rel="stylesheet" href="css/general_styles.css">
	<!-- Favicon -->
	<link rel="shortcut icon" href="img/favicon/favicon.png">
	<link href="css/blue.css" rel="stylesheet">

	<!-- Font awesome CSS -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Datatables -->
    <link rel="stylesheet" href="datatables/datatables.min.css">
    <link rel="stylesheet" href="datatables/DataTables-1.13.1/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="datatables/Responsive-2.4.0/css/responsive.bootstrap4.min.css">
</head>

<body>
	<?php
	include("BarraMenu.php");
	?>

	<div class="content">
		<div class="container">
            <div class="row" style="margin-top: 25px;">
                <h4 style="padding-left:15px;">Programas educativos registrados en el sistema</h4>
            </div>

            <div class="row">
                <div class="col-md-12 mt-2">
                    <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#modalAddEdit" id="botonCrear">Crear <i class="fa-solid fa-plus"></i></button>
                </div>
            </div>

            <div class="row" style="margin-top: 25px;">
                <div class="col-md-12">
                    <table id="tablaProgramas" class="table table-hover" style="margin-top: 30px;">
                        <thead>
                            <tr>
                                <th class="text-center">Nombre</th>
                                <th class="text-center">Plan de estudios</th>
                                <th class="text-center">Letra</th>
                                <th class="text-center">Iniciales</th>
                                <th class="text-center">Jefe de división</th>
                                <th class="text-center">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
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
                                        <label for="inputNombrePrograma">Nombre del programa educativo</label>
                                        <input type="text" class="form-control" id="inputNombrePrograma" name="inputNombrePrograma" placeholder="Ingrese el nombre del programa educativo">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="inputClavePlan">Clave de plan de estudios</label> 
                                        <input type="text" class="form-control" id="inputClavePlan" name="inputClavePlan" placeholder="Clave del plan de estudios">       
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="inputLetra">Letra</label>
                                        <input type="text" class="form-control" id="inputLetra" name="inputLetra" placeholder="Letra">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="inputIniciales">Iniciales</label>
                                        <input type="text" class="form-control" id="inputIniciales" name="inputIniciales" placeholder="Iniciales">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="inputJefe">Jefe de división</label>
                                        <select name="inputJefe" id="inputJefe" class="form-control"></select>
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
        var tablaProgramas;
        var validate;
        var idPrograma;

        $(document).ready(function() {
            tablaProgramas = $("#tablaProgramas").DataTable({
                "responsive": true,
                "autoWidth": false,
                "language": {
                    "url": "datatables/es-ES.json"
                },
                "ajax": {
                    "data": {
                        "accion": "listarProgramasEducativos"
                    },
                    "url": "conexion/consultasSQL.php",
                    "type": "post",
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
                    },
                    "dataSrc": "",
                },
                "order": [],
                "columns": [
                    { "data": "nombrePE", "orderable": false },
                    { "data": "planEstudio", "orderable": false },
                    { "data": "letra", "orderable": false },
                    { "data": "iniciales", "orderable": false },
                    { "data": "JefeDivision", "orderable": false },
                    { "data": "acciones", "orderable": false }
                ]
            });
        });

        validate = $("#formAddEdit").validate({
            rules: {
                inputNombrePrograma: {
                    required: true,
                    normalizer: function(value) {
                        return $.trim(value);
                    }
                },
                inputClavePlan: {
                    required: true,
                    normalizer: function(value) {
                        return $.trim(value);
                    }
                },
                inputLetra: {
                    required: true,
                    normalizer: function(value) {
                        return $.trim(value);
                    }
                },
                inputIniciales: {
                    required: true,
                    normalizer: function(value) {
                        return $.trim(value);
                    }
                },
                inputJefe: {
                    required: true
                }
            },
            messages: {
                inputNombrePrograma: {
                    required: "Se requiere el nombre del programa educativo."
                },
                inputClavePlan: {
                    required: "Se requiere la clave del plan de estudios."
                },
                inputLetra: {
                    required: "Se requiere la letra."
                },
                inputIniciales: {
                    required: "Se requieren las iniciales."
                },
                inputJefe: {
                    required: "Se requiere el jefe de división."
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

                //Agregar o actualizar programa educativo
                var formData = new FormData(form);
                formData.append('accion', 'crearActualizarProgramaEducativo');
                formData.append('idPrograma', idPrograma);

                $.ajax({
                    data: formData,
                    url: 'conexion/consultasSQL.php',
                    method: 'post',
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        var res = JSON.parse(response);
                        if(res.success) {
                            alertify.success('<h3>' + res.mensaje + '</h3>');
                            $("#formAddEdit").trigger('reset');
                            $("#modalAddEdit").modal('hide');
                            //Recargar la tabla nuevamente
                            tablaProgramas.ajax.reload();
                        } else {
                            alertify.warning('<h3>' + res.mensaje + '</h3>');
                        }
                    }
                });
            }
        });

        $("#botonCrear").on('click', function() {
            validate.resetForm();
            $("#formAddEdit").find('.is-invalid').removeClass('is-invalid');

            $("#modalAddEdit #formAddEdit").trigger('reset')
            $("#modalAddEdit .modal-title").text('Crear nuevo programa educativo.');
            //Se asigna el valor de "Crear" dentro de un input type hiden
            $("#action").val("Crear");
            $("#operacion").val("Crear");

            //Obtener los jefes de division desde la base de datos
            $.ajax({
                data: {
                    "accion": "obtenerJefesDivision"
                },
                url: "conexion/consultasSQL.php",
                type: "post",
                success: function(response) {
                    var res = JSON.parse(response);
                    if (res.success) {
                        var jefesDivision = res.data.jefesDivision;

                        var optionsJefes = '';

                        optionsJefes = '<option value="" disable selected>Seleccione jefe de división</option>';
                        jefesDivision.forEach(p => {
                            optionsJefes += '<option data-id="' + p.cat_ID + '" data-clave="' + p.cat_Clave + '" data-correo="' + p.correo + '" value="' + p.cat_ID + '">' + p.cat_Clave + ' - ' + p.nombre + '</option>';
                        });
                        $("#inputJefe").html(optionsJefes);

                    }
                }
            });
        });

        $(document).on('click', '.editar', function(e) {
            e.preventDefault();
            idPrograma = $(this).data('id');
            console.log(idPrograma);

            $.ajax({
                data: {
                    "accion": "obtenerProgramaEducativoById",
                    "idPrograma": idPrograma
                },
                url: "conexion/consultasSQL.php",
                type: "post",
                success: function(respuesta) {
                    var resp = JSON.parse(respuesta);
                    if (resp.success) {
                        resp = resp.data[0];
                        //resp = resp.data[0];
                        validate.resetForm();
                        $("#formAddEdit").find('.is-invalid').removeClass('is-invalid');

                        $("#accion").val("Actualizar");
                        $("#operacion").val("Actualizar");

                        //Abrir el modal y mostrar los valores
                        $("#modalAddEdit").modal("show");
                        $("#modalAddEdit .modal-title").text("Editar programa educativo");

                        $("#modalAddEdit #inputNombrePrograma").val(resp.nombrePE);
                        $("#modalAddEdit #inputClavePlan").val(resp.planEstudio);
                        $("#modalAddEdit #inputLetra").val(resp.letra);
                        $("#modalAddEdit #inputIniciales").val(resp.iniciales);
                        
                        //Obtener los jefes de division desde la base de datos
                        $.ajax({
                            data: {
                                "accion": "obtenerJefesDivision"
                            },
                            url: "conexion/consultasSQL.php",
                            type: "post",
                            success: function(response) {
                                var res = JSON.parse(response);
                                if (res.success) {
                                    var jefesDivision = res.data.jefesDivision;

                                    var optionsJefes = '';
                                    //Poner los select como seleccionados conforme a los datos
                                    optionsJefes = resp.id_jefe_division == null ? '<option value="" disable selected>Seleccione jefe de división</option>' : '<option value="" disable>Seleccione jefe de división</option>';
                                    jefesDivision.forEach(p => {
                                        var isSelected = resp.id_jefe_division == p.cat_ID ? 'selected' : '';
                                        optionsJefes += '<option data-id="' + p.cat_ID + '" data-clave="' + p.cat_Clave + '" data-correo="' + p.correo + '" value="' + p.cat_ID + '" ' + isSelected + '>' + p.cat_Clave + ' - ' + p.nombre + '</option>';
                                    });
                                    $("#inputJefe").html(optionsJefes);
                                }
                            }
                        });
                    } else {
                        alertify.warning('<h3>' + resp.mensaje + '</h3>')
                    }
                }
            });
        });

        $(document).on('click', '.eliminar', function(e){
            e.preventDefault();

            var fila = $(this).closest('tr');
            if(fila.hasClass('child')) {
                fila = fila.prev();
            }

            idPrograma = $(this).data('id');

            alertify.confirm("Aviso", "¿Está seguro(a) de eliminar el programa educativo de " + fila.find('td:eq(0)').text() + "?",
                function() {
                    //Eliminar el programa educativo
                    $.ajax({
                        data: {
                            "accion": "eliminarProgramaEducativo",
                            "idPrograma": idPrograma
                        },
                        url: 'conexion/consultasSQL.php',
                        type: 'post',
                        success: function(response) {
                            var res = JSON.parse(response);
                            if (res.success) {
                                alertify.success('<h3>' + res.mensaje + '</h3>');
                                tablaProgramas.ajax.reload();
                            } else {
                                alertify.warning('<h3>' + res.mensaje + '</h3>');
                            }
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