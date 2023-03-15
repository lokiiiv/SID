<?php
require_once("../../valida.php");
//require_once("../../valida2.php");

?>
<!DOCTYPE html>
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
    <?php
    include("BarraMenu.php");
    ?>

    <div class="content">
        <div class="container">
            <div class="row" style="margin-top: 25px;">
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label col-md-3" for="select">
                            <h4>Periodo</h4>
                        </label>
                        <div class="col-md-5">
                            <form action="" method="POST">
                                <select class="form-control" id="selectPeriodo" name="periodo" Onchange="mostrarIns(this.options[this.selectedIndex].innerHTML);">
                                    <option>&nbsp;</option>
                                    <?php
                                    require_once 'conexion/conexionSQL.php';
                                    $connSQL = connSQL::singleton();
                                    $query = "Select periodo from periodos";
                                    $periodos = $connSQL->consulta($query);

                                    foreach ($periodos as $periodo) {
                                        echo "<option>" . $periodo[0] . "</option>";
                                    }
                                    ?>
                                </select>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row" style="margin-left: 3px; margin-right: 3px; margin-top: 20px;" id="tabla">
                <div class="col-md-12 mb-3">
                    <button onclick="agregarInstrumentacion()" align="center" type="button" class="btn btn-success btn-sm">Agregar
                    </button>
                </div>
                <div class="col-md-12">
                    <table id="tablaInstrumentaciones" class="table table-hover">
                        <thead>
                            <tr>
                                <th class="text-center">Grupo</th>
                                <th class="text-center">Materia</th>
                                <th class="text-center">Temas</th>
                                <th class="text-center">Administrar</th>
                                <th class="text-center">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><input readonly></td>
                                <td><input readonly></td>
                                <td><input readonly class='form-control text-center' max=8 min=1 type='number'></td>
                                <td><button class="btn btn-info btn-sm" style="margin-left:10px">Crear</button> </td>
                                <td><button type="button" class="btn btn-danger btn-sm" style="margin-left:10px">Eliminar</button></td>
                            </tr>
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

    <script src="datatables/DataTables-1.13.1/js/jquery.dataTables.min.js"></script>
    <script src="datatables/DataTables-1.13.1/js/dataTables.bootstrap4.min.js"></script>
    <script src="datatables/Responsive-2.4.0/js/dataTables.responsive.js"></script>
    <script src="datatables/Responsive-2.4.0/js/responsive.bootstrap4.min.js"></script>

    <script>
        var tablaInstrumentaciones = null;
        tablaInstrumentaciones = $("#tablaInstrumentaciones").DataTable({
            "autoWidth": false,
            "bDestroy": true,
            "responsive": true,
            "language": {
                "url": "datatables/es-ES.json"
            },
            "order": [],
            "paging": false,
            "columns": [{
                    "width": "80px",
                    "orderable": false
                },
                {
                    "width": "300px",
                    "orderable": false
                },
                {
                    "width": "50px",
                    "orderable": false
                },
                {
                    "width": "80px",
                    "orderable": false
                },
                {
                    "width": "50px",
                    "orderable": false
                }
            ]
        });

        $(document).ready(function() {
            ocultar_mostrar(0);
        });

        function mostrarIns(x) {
            if (x != "&nbsp;") {
                ocultar_mostrar(1);
                var tabla = document.getElementById("tablaInstrumentaciones");


                //var l = tabla.rows.length;
                //for (var i = 1; i < l; i++) {
                //  tabla.deleteRow(1);
                //}

                tablaInstrumentaciones.clear().draw();

                var select = document.getElementById("selectPeriodo");
                var periodo = select.options[select.selectedIndex].value;
                var parametros = {
                    "accion": "obtenerGrupos",
                    "periodo": periodo
                };
                $.ajax({
                    data: parametros,
                    url: 'conexion/consultasNoSQL.php',
                    type: 'post',
                    success: function(resultado) {
                        var grupos = JSON.parse(resultado);

                        if (Object.keys(grupos).length != 0) {
                            Object.keys(grupos).forEach((key, index) => {
                                agregarInstrumentacion(grupos[key]);
                            });
                        }

                        //if(grupos.length!=0)
                        //  grupos.forEach(grupo => {
                        //    agregarInstrumentacion(grupo);
                        //}); 
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

            } else {
                ocultar_mostrar(0);
            }
        }

        var carrera = "";
        var semestreletra = "";
        var clavemate = "";
        var datosencabezado = "";

        function crearInstrumentacion(boton) {

            var fila = $(boton).closest('tr');
            if (fila.hasClass('child')) {
                fila = fila.prev();
            }

            var grupo = fila.find('td:eq(0) input');
            var materia = fila.find('td:eq(1) h6');
            var temas = fila.find('td:eq(2) input');
            var instrumentacion = [];

            if (materia.text() != "" && grupo.val() != "" && parseInt(temas.val()) >= 1) {

                var semestre = grupo.val();
                letraSemestre(semestre.substring(0, 1));
                var select = document.getElementById("selectPeriodo");
                var periodo = select.options[select.selectedIndex].value;

                //Verificar que el grupo de la instrumentación no se repita o ya lo haya generado antes para el periodo seleccionado
                var parametros = {
                    "accion": "obtenerGrupos",
                    "periodo": periodo
                };
                $.ajax({
                    data: parametros,
                    url: 'conexion/consultasNoSQL.php',
                    type: 'post',
                    success: function(resultado) {
                        var grupos = JSON.parse(resultado);

                        //Dividir la cadena ingresada del grupo desde el cuadro de texto separados por comas
                        var aux = grupo.val().split(',');
                        //Generar un array con los valores claves de los grupos que ya estan creados en base de datos
                        var gruposKeys = Object.keys(grupos);

                        //Si al dividir la cadena, el valor del array es 1, quiere decir que el usuario esta intentando ingresar un solo grupo
                        if (aux.length === 1) {

                            //Recorrer el array de los valores con los grupos desde la base de datos
                            for (let i = 0; i < gruposKeys.length; i++) {
                                //Dividir cada uno de sus elementos usando el delimitador ','
                                var keys = gruposKeys[i].split(',');
                                //Si el tamaño del array resultante es 1 quiere decir que solo hay un grupo
                                if (keys.length === 1) {
                                    //Si el grupo que se intenta ingresar es igual al que esta en la base de datos, terminar
                                    if (aux[0].trim() === keys[0]) {
                                        fila.find('td:eq(1) h6').text("");
                                        fila.find('td:eq(2) input').val(0);
                                        alertify.warning('<h3>Ya existe una instrumentación para el grupo ' + aux[0] + ' para el período ' + periodo + '. Intente nuevamente.</h3>');
                                        return;
                                    }
                                } else {
                                    for (let i = 0; i < keys.length; i++) {
                                        if (aux[0].trim() === keys[i]) {
                                            fila.find('td:eq(1) h6').text("");
                                            fila.find('td:eq(2) input').val(0);
                                            alertify.warning('<h3>Ya existe una instrumentación para el grupo ' + aux[0] + ' para el período ' + periodo + '. Intente nuevamente.</h3>');
                                            return;
                                        }
                                    }
                                }
                            }
                        } else if (aux.length > 1) {
                            //Si al dividir el array el resultado de su tamaño es mayor a 1, entonces el usuario esta intenado ingresar dos o más grupos
                            //Verificar cada uno de los grupos que el usuario intenta agregar para vericar si ya existe o ya esta creado
                            for (let i = 0; i < aux.length; i++) {
                                //Recorrer el array de los valores con los grupos desde la base de datos
                                for (let j = 0; j < gruposKeys.length; j++) {
                                    var keys = gruposKeys[j].split(',');
                                    //Si el tamaño del array resultante es 1 quiere decir que solo hay un grupo
                                    if (keys.length === 1) {
                                        //Si el grupo que se intenta ingresar es igual al que esta en la base de datos, terminar
                                        if (aux[i].trim() === keys[0]) {
                                            fila.find('td:eq(1) h6').text("");
                                            fila.find('td:eq(2) input').val(0);
                                            alertify.warning('<h3>Ya existe una instrumentación para el grupo ' + aux[i] + ' para el período ' + periodo + '. Intente nuevamente.</h3>');
                                            return;
                                        }
                                    } else {
                                        for (let k = 0; k < keys.length; k++) {
                                            if (aux[i].trim() === keys[k]) {
                                                fila.find('td:eq(1) h6').text("");
                                                fila.find('td:eq(2) input').val(0);
                                                alertify.warning('<h3>Ya existe una instrumentación para el grupo ' + aux[0] + ' para el período ' + periodo + '. Intente nuevamente.</h3>');
                                                return;
                                            }
                                        }
                                    }
                                }
                            }
                        }

                        //Si noy incovenientes, proceder a guardar la instrumentaciones
                        var parametros = {
                            "accion": "crearInstrumentacion",
                            "grupo": grupo.val(),
                            "periodo": periodo,
                            "temas": temas.val(),
                            "materia": materia.text(),
                            "carrera": carrera,
                            "semestre": semestreletra,
                            "clave": clavemate,
                            "encabezado": datosencabezado,
                            "estatus": "A"
                        };
                        $.ajax({
                            data: parametros,
                            url: 'conexion/consultasNoSQL.php',
                            type: 'post',
                            success: function(resultado) {
                                grupo.attr('readonly', true);
                                temas.attr('readonly', true);
                                tablaInstrumentaciones.cell(fila, 3).data('<div class="row"><div style="margin: 0 auto;"><button onclick="editarInstrumentacion(this)" class="btn btn-success btn-sm" style="margin-left:10px">Editar</button><button  onclick="abrirFAC14(this)" class="btn btn-primary btn-sm" style="margin-left:10px">FAC-14</button></div></div>').draw();
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

            } else {
                alertify.error("<h3 style='color: white;'>Llene correctamente los campos.</h3>");
            }
        }


        function abrirFAC14(boton) {

            var fila = $(boton).closest('tr');
            if (fila.hasClass('child')) {
                fila = fila.prev();
            }

            var grupo = fila.find('td:eq(0) input').val();
            var asign = fila.find('td:eq(1) h6').text();
            var select = document.getElementById("selectPeriodo");
            var periodo = select.options[select.selectedIndex].value;
            window.location = "contenidofac14.php?grupo=" + encodeURIComponent(grupo) + "&p=" + encodeURIComponent(periodo) + "&as=" + encodeURIComponent(asign);
        }

        function editarInstrumentacion(boton) {

            var fila = $(boton).closest('tr');
            if (fila.hasClass('child')) {
                fila = fila.prev();
            }

            var grupo = fila.find('td:eq(0) input').val();
            var cantTemas = fila.find('td:eq(2) input').val();
            var select = document.getElementById("selectPeriodo");
            var periodo = select.options[select.selectedIndex].value;


            window.location = "contenido.php?grupo=" + encodeURIComponent(grupo) + "&p=" + encodeURIComponent(periodo) + "&temas=" + encodeURIComponent(cantTemas);

        }

        var mater = "";

        function agregarInstrumentacion(instrumentacion) {
            var grupo = "";
            mater = "";
            var temas = 0;
            var estatus = "";
            var boton = '<div class="row"><div class="col d-flex justify-content-center align-items-center"><button onclick="crearInstrumentacion(this)" class="btn btn-info btn-sm" style="margin-right: 3px;">Crear</button></div></div>';
            if (typeof instrumentacion != "undefined") {
                //grupo = instrumentacion[0];
                //mater = instrumentacion[1];
                //temas = parseInt(instrumentacion[2]);

                grupo = instrumentacion["Grupo"];
                mater = instrumentacion["Materia"];
                temas = parseInt(instrumentacion["totalTemas"]);
                boton = '<div class="row"><div class="col d-flex justify-content-center align-items-center"><button onclick="editarInstrumentacion(this)" class="btn btn-success btn-sm" style="margin-right: 3px;">Editar</button><button  onclick="abrirFAC14(this)" class="btn btn-primary btn-sm">FAC-14</button></div></div>';
                estatus = "readonly";
            }

            //Agregar la nueva fila usando el plugin de Datatables
            tablaInstrumentaciones.row.add([
                "<input " + estatus + " class='form-control form-control-sm' onkeyup='this.value = this.value.toUpperCase();' id=letracarrera onchange = buscarMateria(this); value='" + grupo + "'>",
                "<h6>" + mater + "</h6>",
                "<input " + estatus + "  class='form-control text-center form-control-sm' max=8 min=1 type='number' value=" + temas + ">",
                boton,
                '<div class="row"><div class="col d-flex justify-content-center align-items-center"><button onclick="borrar($(this).closest(\'tr\').index(), this)" type="button" class="btn btn-danger btn-sm" style="margin-right: 3px;">Eliminar</button></div></div>'
            ]).draw();

            //var tabla = document.getElementById("tablaInstrumentaciones");
            //Celdas y Renglones
            //var row = tabla.insertRow(tabla.rows.length);
            //var cell = row.insertCell(0);
            //cell.innerHTML = "<input " + estatus + " onkeyup='this.value = this.value.toUpperCase();' id=letracarrera onchange = buscarMateria($(this).closest(\'tr\').index()); value='" + grupo + "'>";
            //cell = row.insertCell(1);
            //cell.innerHTML = "<input readOnly=true; " + estatus + " value='" + mater + "'>";
            //cell = row.insertCell(2);
            //cell.innerHTML = "<input " + estatus + "  class='form-control text-center' max=8 min=1 type='number' value=" + temas + ">";
            //cell = row.insertCell(3);
            //cell.innerHTML = boton;
            //cell = row.insertCell(4);
            //cell.innerHTML = '<button onclick="borrar($(this).closest(\'tr\').index())" type="button" class="btn btn-danger btn-sm" style="margin-left:10px">Eliminar</button>';
        }

        function borrar(x, boton) {
            //Si el boton de eliminar al buscar el tr padre tiene como clase 'child' es por que se aplico el responsive en datatable
            var fila = $(boton).closest('tr');
            if (fila.hasClass('child')) {
                fila = fila.prev();
            }

            //Al borrar, mostrar el mensaje de alerta de eliminacion solamente cuando la instrumentacion ya esta creada
            if (typeof(fila.find('td:eq(3) .btn-info')[0]) === "undefined") {
                alertify.confirm("Aviso", "¿Está seguro(a) de eliminar la instrumentación del grupo(s) " + fila.find('td:eq(0) input').val() + " seleccionado?",
                    function() {
                        var grupo = fila.find('td:eq(0) input').val();
                        var materia = fila.find('td:eq(1) h6').text();
                        var select = document.getElementById("selectPeriodo");
                        var periodo = select.options[select.selectedIndex].value;

                        var parametros = {
                            "accion": "borrarInstrumentacion",
                            "grupo": grupo,
                            "periodo": periodo
                        };
                        $.ajax({
                            data: parametros,
                            url: 'conexion/consultasNoSQL.php',
                            type: 'post',
                            success: function(resultado) {
                                tablaInstrumentaciones.row(fila).remove().draw();
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
                    },
                    function() {

                    }
                ).set('labels', {
                    ok: 'Aceptar',
                    cancel: 'Cancelar'
                });
            } else {
                //Si aún no esta creada la instrumentacion, proceder a eliminar la fila automaticamente
                tablaInstrumentaciones.row(fila).remove().draw();
            }
        }

        function obtenerGrupos() {
            var tabla = document.getElementById("tablaInstrumentaciones");
            var grupos = [];
            for (let i = 1; i < tabla.rows.length; i++) {
                const row = tabla.rows[i];
                var grupo = [];
                grupo.push(row.cells[0].getElementsByTagName("input")[0].value);
                grupo.push(row.cells[1].getElementsByTagName("input")[0].value);
                grupo.push(row.cells[2].getElementsByTagName("input")[0].value);
                grupos.push(grupo);
            }
            return grupos;
        }

        function ocultar_mostrar(x) {
            var display = "none";
            if (x) display = "block";
            document.getElementById('tabla').style.display = display;
        }

        function buscarCarrera(letrac) {
            var parametros = {
                "accion": "buscarCarrera",
                "letrae": letrac,
            };
            $.ajax({
                data: parametros,
                url: 'conexion/consultasSQL.php',
                type: 'post',
                success: function(respuesta) {
                    carrera = respuesta;
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

        function buscarMateria(input) {

            var fila = $(input).closest('tr');
            if (fila.hasClass('child')) {
                fila = fila.prev();
            }

            var busMate = fila.find('td:eq(0) input').val().trim();
            //Verificar que la entrada de los grupos sean en 4 letras y separados por comas
            //Para esto se usa una expresion regular
            var regex = /^(?:[^,]{4},)*[^,]{4}$/;
            if (regex.test(busMate)) {
                //En caso de buscar la materia cuando se ingresan dos o más grupos separados por comas,
                //se debe verificar que ambos grupos pertenezcan a la misma materia
                //Se deben obtener los grupos en caso de que sean varios y verificar que sus tres primeras letras sean iguales
                var aux = busMate.split(',');
                if (aux.length == 1) {
                    //Si al dividir la cadena, solo hay un elemento, quiere decir que se ingreso un solo grupo unicamente
                    //Entonces la variable del grupo será igual al primer elemento del array resultante al realizar split()
                    busMate = aux[0].trim();
                } else if (aux.length > 1) {
                    //En caso de que al divir la cadena, se encuentren más grupos, verificar que no ingresen los mismos
                    //y verificar al igual que los grupos tengan las tres primeras letras iguales
                    if (aux.every(v => v.trim() === aux[0].trim())) {
                        //Si se detecta que los grupos son iguales, variar los cuadros de texto
                        fila.find('td:eq(1) h6').text("");
                        fila.find('td:eq(2) input').val(0);

                        alertify.warning("<h3>Los grupos que ha ingresado son iguales, intente de nuevo.</h3>");
                        return;
                    } else {
                        //Ahora, verificar que los grupos correspondan a la misma materia
                        for (let i = 0; i < aux.length; i++) {
                            if ((i + 1) < aux.length) {
                                //Si el siguiente grupo del array es diferentes al actual, notificar
                                if (aux[i].trim().substring(0, 3) != aux[i + 1].trim().substring(0, 3)) {
                                    fila.find('td:eq(1) h6').text("");
                                    fila.find('td:eq(2) input').val(0);

                                    alertify.warning("<h3>Solo se permite ingresar grupos que pertenezcan a la misma materia.</h3>");
                                    return;
                                }
                            }
                        }
                    }
                }
            } else {
                fila.find('td:eq(1) h6').text("");
                fila.find('td:eq(2) input').val(0);
                alertify.warning("<h3>Ingrese un grupo válido o si son varios grupos separados por comas.</h3>");
                return;
            }


            buscarCarrera(busMate);
            buscarClave(busMate);
            encabezado();

            var parametros = {
                "accion": "buscarMateria",
                "letrae": busMate,
            };
            $.ajax({
                data: parametros,
                url: 'conexion/consultasSQL.php',
                type: 'post',
                success: function(respuesta) {

                    //Obtener el nombre de la materia
                    mater = respuesta.split("-")[0];

                    //Obtener la cantidad de temas
                    temas = respuesta.split("-")[1];


                    //Mostrar la cantidad de temas de la materia, si no hay valor es nulo entonces mostrar el número 1 en el input de cantidad de temas
                    var cantTemas = respuesta.split("-")[1] != "" && respuesta.split("-")[1] != null ? parseInt(respuesta.split("-")[1]) : 0;
                    tablaInstrumentaciones.cell(fila, 1).data("<h6>" + mater + "</h6>").draw();
                    tablaInstrumentaciones.cell(fila, 2).data("<input class='form-control form-control-sm text-center' max=8 min=1 type='number' value=" + cantTemas + ">").draw();
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

        function buscarClave(busClav) {
            var parametros = {
                "accion": "buscarClave",
                "letrae": busClav,
            };
            $.ajax({
                data: parametros,
                url: 'conexion/consultasSQL.php',
                type: 'post',
                success: function(respuesta) {
                    clavemate = respuesta;
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

        function encabezado() {
            var parametros = {
                "accion": "buscarencabezado",
            };
            $.ajax({
                data: parametros,
                url: 'conexion/consultasSQL.php',
                type: 'post',
                success: function(respuesta) {
                    datosencabezado = respuesta;
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


        function letraSemestre(letraSem) {
            switch (letraSem) {
                case '1':
                    semestreletra = "PRIMERO";
                    break;
                case '2':
                    semestreletra = "SEGUNDO";
                    break;
                case '3':
                    semestreletra = "TERCERO";
                    break;
                case '4':
                    semestreletra = "CUARTO";
                    break;
                case '5':
                    semestreletra = "QUINTO";
                    break;
                case '6':
                    semestreletra = "SEXTO";
                    break;
                case '7':
                    semestreletra = "SÉPTIMO";
                    break;
                case '8':
                    semestreletra = "OCTAVO";
                    break;
                case '9':
                    semestreletra = "NOVENO";
                    break;
            }
        }
    </script>

</body>

</html>