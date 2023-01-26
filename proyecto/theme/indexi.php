<?php
require_once("../../valida.php");
//require_once("../../valida2.php");

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<!-- estilos de instrumentación -->
	<style type="text/css">
		#columna{
			border:#9CF solid .1px; 
			padding:0px;
	
		}

		.row1{
			border:#9CF solid .3px; 

		}
		.azul{
			background-color:#9CF;
			font-weight:bolder;
			padding:5px;
		}
	</style>

	
<!-- Title here -->
	<title>Instrumentaciones Didácticas</title>
	<!-- Description, Keywords and Author -->
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
	<!-- Styles -->
	<!-- Bootstrap CSS -->
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<!-- Flex Slider CSS -->
	<link href="css/flexslider.css" rel="stylesheet">
	<!-- Pretty Photo -->
	<link href="css/prettyPhoto.css" rel="stylesheet">
	<!-- Font awesome CSS -->
	<link href="css/font-awesome.min.css" rel="stylesheet">		
	<!-- Custom CSS -->
    <link href="css/style.css" rel="stylesheet">
    <link href="css/custom.css" rel="stylesheet">
	<!-- Color Stylesheet - orange, blue, pink, brown, red or green-->
	<link href="css/blue.css" rel="stylesheet"> 
    <!-- Alertify JS -->
    <link rel="stylesheet" href="alertify/css/alertify.min.css">
    <link rel="stylesheet" href="alertify/css/themes/bootstrap.min.css">

<!-- Favicon -->
	<link rel="shortcut icon" href="img/favicon/favicon.png">
	<script type="text/javascript" src="js/accionesinstrumentacion.js"></script>
	
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
            <h1><a>Hola <? echo ucwords(strtolower($_SESSION["userData"]['first_name']));?></a></h1>  
            <h5> <?php echo $_SESSION["correo"];?> </h5>
         </div>
      </div>
   </div>
</header>
	
<?php
	include("BarraMenu.php");
?>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
<script src="alertify/alertify.min.js"></script>

<script type="text/javascript">

        window.onload = function(){
           
            ocultar_mostrar(0);
            
            
        }

        function mostrarIns(x){      
            if(x!="&nbsp;"){
                ocultar_mostrar(1);
                var tabla = document.getElementById("tablaInstrumentaciones");

                var l = tabla.rows.length;
                for(var i = 1; i < l; i++) {
                tabla.deleteRow(1);
                }
                var select = document.getElementById("selectPeriodo");
                var periodo = select.options[select.selectedIndex].value;
                var parametros = {
                    "accion":"obtenerGrupos",
                    "periodo":periodo
                };
                $.ajax({
                data: parametros,
                url: 'conexion/consultasNoSQL.php',
                type:'post',
                success: function(resultado){
                    var grupos = JSON.parse(resultado);

                    if(Object.keys(grupos).length != 0) {
                        Object.keys(grupos).forEach((key, index) => {
                            agregarInstrumentacion(grupos[key]);
                        });
                    }

                    //if(grupos.length!=0)
                      //  grupos.forEach(grupo => {
                        //    agregarInstrumentacion(grupo);
                        //}); 
                }          
                }).fail(function(jqXHR, textStatus, errorThrown ) {
                    $('#estatus'+campo).html("");
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
            }else{
                ocultar_mostrar(0);
            }
        }

        var carrera = "";
        var semestreletra = "";
        var clavemate = "";
        var datosencabezado = "";

        function crearInstrumentacion(x){
            var ins = document.getElementById("tablaInstrumentaciones").rows[x];
            var grupo =  ins.cells[0].getElementsByTagName("input")[0];
            var materia =  ins.cells[1].getElementsByTagName("input")[0];
            var temas =  ins.cells[2].getElementsByTagName("input")[0];
            var instrumentacion = [];

            if(materia.value!="" && grupo.value!="" && parseInt(temas.value)>=1){

                var semestre = grupo.value;
                letraSemestre(semestre.substring(0,1));
                var select = document.getElementById("selectPeriodo");
                var periodo = select.options[select.selectedIndex].value;

                //Verificar que el grupo de la instrumentación no se repita o ya lo haya generado antes para el periodo seleccionado
                var parametros = {
                    "accion":"obtenerGrupos",
                    "periodo":periodo
                };
                $.ajax({
                data: parametros,
                url: 'conexion/consultasNoSQL.php',
                type:'post',
                success: function(resultado){
                    var grupos = JSON.parse(resultado);

                    //Si dentro de las keys de los grupos ya se encuentra el grupo que se desea agregar, mostrar una advertencia
                    if(Object.keys(grupos).some(key => key === grupo.value)) {
                        alertify.warning('Ya existe una instrumentación para el grupo ' + grupo.value + ' para el período ' + periodo + '. Intente nuevamente.');
                        //Limpiar los valores de los cuadros de texto
                        grupo.value = "";
                        grupo.focus();
                        materia.value = "";
                        temas.value = 1;
                    } else {
                        //En caso contrario, proceder a almacenar la nueva documentacion
                        var parametros = {
                            "accion":"crearInstrumentacion",
                            "grupo":grupo.value,
                            "periodo":periodo,
                            "temas":temas.value,
                            "materia":materia.value,
                            "carrera":carrera,
                            "semestre":semestreletra,
                            "clave":clavemate,
                            "encabezado":datosencabezado,
                            "grupos":obtenerGrupos()
                        };
                        $.ajax({
                            data: parametros,
                            url: 'conexion/consultasNoSQL.php',
                            type:'post',
                            success: function(resultado){
                                grupo.readOnly = true;
                                temas.readOnly = true;
                                ins.cells[3].innerHTML = '<button onclick="editarInstrumentacion($(this).closest(\'tr\').index())" class="btn btn-success btn-sm" style="margin-left:10px">Editar</button><button  onclick="abrirFAC14($(this).closest(\'tr\').index())" class="btn btn-primary btn-sm" style="margin-left:10px">FAC-14</button>';
                            }          
                        }).fail(function(jqXHR, textStatus, errorThrown ) {
                            $('#estatus'+campo).html("");
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
                    
                }          
                }).fail(function(jqXHR, textStatus, errorThrown ) {
                    $('#estatus'+campo).html("");
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
 
            }else{
                alertify.error("Llene correctamente los campos.");
            }
        }


        function abrirFAC14(x){
            var ins = document.getElementById("tablaInstrumentaciones").rows[x];
            
            var grupo = ins.cells[0].getElementsByTagName("input")[0].value;
            var asign = ins.cells[1].getElementsByTagName("input")[0].value;
            var select = document.getElementById("selectPeriodo");
            var periodo = select.options[select.selectedIndex].value;
            window.location = "contenidofac14.php?grupo=" + encodeURIComponent(grupo) +"&p="+ encodeURIComponent(periodo)+"&as="+ encodeURIComponent(asign);
        }

        function editarInstrumentacion(x){
            var ins = document.getElementById("tablaInstrumentaciones").rows[x];
            
            var grupo = ins.cells[0].getElementsByTagName("input")[0].value;
            var select = document.getElementById("selectPeriodo");
            var periodo = select.options[select.selectedIndex].value;
            var cantTemas = ins.cells[2].getElementsByTagName("input")[0].value;

            window.location = "contenido.php?grupo=" + encodeURIComponent(grupo) +"&p="+ encodeURIComponent(periodo) + "&temas=" + encodeURIComponent(cantTemas);
            
        }

        var mater  = "";
        function agregarInstrumentacion(instrumentacion){
            var grupo = "";
            mater = "";
            var temas = 1;
            var estatus = "";
            var boton = '<button onclick="crearInstrumentacion($(this).closest(\'tr\').index())" class="btn btn-info btn-sm" style="margin-left:10px">Crear</button> ';
            if(typeof instrumentacion != "undefined"){
                //grupo = instrumentacion[0];
                //mater = instrumentacion[1];
                //temas = parseInt(instrumentacion[2]);

                grupo = instrumentacion["Grupo"];
                mater = instrumentacion["Materia"];
                temas = parseInt(instrumentacion["totalTemas"]);
                boton =  '<button onclick="editarInstrumentacion($(this).closest(\'tr\').index())" class="btn btn-success btn-sm" style="margin-left:10px">Editar</button><button  onclick="abrirFAC14($(this).closest(\'tr\').index())" class="btn btn-primary btn-sm" style="margin-left:10px">FAC-14</button>';
                estatus = "readonly";
            }

            var tabla = document.getElementById("tablaInstrumentaciones");
            //Celdas y Renglones
            var row = tabla.insertRow(tabla.rows.length);
            var cell = row.insertCell(0);
            cell.innerHTML = "<input "+estatus+" id=letracarrera Onchange = buscarMateria($(this).closest(\'tr\').index()); value='"+grupo+"'>";
            cell = row.insertCell(1);
            cell.innerHTML = "<input readOnly=true; "+estatus+" value='"+mater+"'>";
            cell = row.insertCell(2);
            cell.innerHTML = "<input "+estatus+"  class='form-control text-center' max=8 min=1 type='number' value="+temas+">";
            cell = row.insertCell(3);
            cell.innerHTML= boton;
            cell = row.insertCell(4);
            cell.innerHTML= '<button onclick="borrar($(this).closest(\'tr\').index())" type="button" class="btn btn-danger btn-sm" style="margin-left:10px">Eliminar</button>';
        }

        function borrar(x){
            var tabla = document.getElementById("tablaInstrumentaciones");
            var ins = tabla.rows[x];
            var grupo =  ins.cells[0].getElementsByTagName("input")[0];
            var materia =  ins.cells[1].getElementsByTagName("input")[0];
            var select = document.getElementById("selectPeriodo");
            var periodo = select.options[select.selectedIndex].value;
            tabla.deleteRow(x);  
            var parametros = {
                    "accion":"borrarInstrumentacion",
                    "grupo":grupo.value,
                    "periodo":periodo,
                    "grupos":obtenerGrupos()
                };
                $.ajax({
                data: parametros,
                url: 'conexion/consultasNoSQL.php',
                type:'post',
                success: function(resultado){
                    
                            }          
                }).fail(function(jqXHR, textStatus, errorThrown ) {
                    $('#estatus'+campo).html("");
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

        function obtenerGrupos(){
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

        function ocultar_mostrar(x){
            var display = "none";
            if(x) display = "block"; 
            document.getElementById('tabla').style.display = display;
        }

        function buscarCarrera(letrac){
            var parametros={
                "accion":"buscarCarrera",
                "letrae":letrac,
            };
            $.ajax({
                data: parametros,
                url: 'conexion/consultasSQL.php',
                type:'post',
                success: function(respuesta){
                    carrera = respuesta;
                }
            }).fail(function(jqXHR, textStatus, errorThrown ) {
                $('#estatus'+campo).html("");
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

        function buscarMateria(x){
            var ins = document.getElementById("tablaInstrumentaciones").rows[x];
            var busMate = ins.cells[0].getElementsByTagName("input")[0].value;
            buscarCarrera(busMate);
            buscarClave(busMate);
            encabezado();

            var parametros={
                "accion":"buscarMateria",
                "letrae":busMate,
            };
            $.ajax({
                data: parametros,
                url: 'conexion/consultasSQL.php',
                type:'post',
                success: function(respuesta){

                    //Obtener el nombre de la materia
                    mater =  respuesta.split("-")[0];

                    //Obtener la cantidad de temas
                    temas = respuesta.split("-")[1];

                    var ins = document.getElementById("tablaInstrumentaciones");
                    ins.rows[x].cells[1].getElementsByTagName("input")[0].value = mater;

                    //Mostrar la cantidad de temas de la materia, si no hay valor es nulo entonces mostrar el número 1 en el input de cantidad de temas
                    ins.rows[x].cells[2].getElementsByTagName("input")[0].value = respuesta.split("-")[1] != "" && respuesta.split("-")[1] != null ? parseInt(respuesta.split("-")[1]) : 1;
                }
            }).fail(function(jqXHR, textStatus, errorThrown ) {
                $('#estatus'+campo).html("");
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

        function buscarClave(busClav){
            var parametros={
                "accion":"buscarClave",
                "letrae":busClav,
            };
            $.ajax({
                data: parametros,
                url: 'conexion/consultasSQL.php',
                type:'post',
                success: function(respuesta){
                    clavemate = respuesta;
                }
            }).fail(function(jqXHR, textStatus, errorThrown ) {
                $('#estatus'+campo).html("");
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

        function encabezado(){
            var parametros={
            "accion":"buscarencabezado",
            };
            $.ajax({
                data: parametros,
                url: 'conexion/consultasSQL.php',
                type:'post',
                success: function(respuesta){
                    datosencabezado = respuesta;
            }
        }).fail(function(jqXHR, textStatus, errorThrown ) {
                $('#estatus'+campo).html("");
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


        function letraSemestre(letraSem){
            switch(letraSem){
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

<div class="content">
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label class="control-label col-md-3" for="select"><h4>Periodo</h4></label>
                <div class="col-md-5">                               
                    <form action="" method="POST" >
                    <select class="form-control" id="selectPeriodo" name="periodo" Onchange = "mostrarIns(this.options[this.selectedIndex].innerHTML);">
                        <option>&nbsp;</option>
                        <?php 
                          require_once 'conexion/conexionSQL.php';
                          $connSQL = connSQL::singleton();                                    
                            $query = "Select periodo from periodos";
                            $periodos = $connSQL->consulta($query);
                            
                            foreach ($periodos as $periodo) {
                            echo "<option>".$periodo[0]."</option>";
                            }
                        ?>
                    </select>
                    </form>                          
                </div>
            </div> 
        </div>
    </div>

    <br>
    
    <div class="row" id="tabla">
        <div class="col-md-1"></div>   
        <div class="col-md-10">                               
            <table id="tablaInstrumentaciones" class="table table-hover">
                <thead>
                    <tr>
                        <th class="text-center">Grupo</th>
                        <th class="text-center">Materia</th>
                        <th class="text-center">Temas</th>
                    </tr>
                </thead>
                <tbody>
                </tbody> 
            </table>
            <button onclick="agregarInstrumentacion()" align="center" type="button" class="btn btn-success btn-sm" style="font-size: 12px">Agregar
            </button>
        </div>
    </div>

</div>
<?php
    //include("contenido.php");
	//include("pie.php");
?>
		<!-- Scroll to top -->
		<span class="totop"><a href="#"><i class="fa fa-angle-up"></i></a></span> 
			
		<!-- Javascript files -->
		<!-- jQuery -->
		<script src="js/jquery.js"></script>
		<!-- Bootstrap JS -->
		<script src="js/bootstrap.min.js"></script>
		<!-- Isotope, Pretty Photo JS -->
		<script src="js/jquery.isotope.js"></script>
		<script src="js/jquery.prettyPhoto.js"></script>
		<!-- Support Page Filter JS -->
		<script src="js/filter.js"></script>
		<!-- Flex slider JS -->
		<script src="js/jquery.flexslider-min.js"></script>
		<!-- Respond JS for IE8 -->
		<script src="js/respond.min.js"></script>
		<!-- HTML5 Support for IE -->
		<script src="js/html5shiv.js"></script>
		<!-- Custom JS -->
		<script src="js/custom.js"></script>
	</body>	
</html>