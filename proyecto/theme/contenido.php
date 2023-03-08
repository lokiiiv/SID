<?php
require_once("../../valida.php");

//if(!isset($_GET["grupo"])) header("Location:indexi.php");

?>
<!DOCTYPE HTML>
<html lang="es">

<head>
  <meta charset="utf-8">
  <!-- Title here -->
  <title>Instrumentación Didáctica</title>
  <!-- Description, Keywords and Author -->
  <meta name="description" content="Your description">
  <meta name="keywords" content="Your,Keywords">
  <meta name="author" content="ResponsiveWebInc">

  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Styles -->
  <!-- Bootstrap CSS -->
  <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <script src="js/html2pdf.bundle.min.js"></script>

  <!-- Alertify JS -->
  <link rel="stylesheet" href="alertify/css/alertify.min.css">
  <link rel="stylesheet" href="alertify/css/themes/bootstrap.min.css">

  <!-- Flex Slider CSS -->
  <link href="css/flexslider.css" rel="stylesheet">
  <!-- Pretty Photo -->
  <link href="css/prettyPhoto.css" rel="stylesheet">
  <!-- Font awesome CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <!-- Custom CSS -->
  <link href="css/style_2.css" rel="stylesheet">
  <!-- Custom CSS -->
  <!-- Estiles generales personalizados -->
  <link rel="stylesheet" href="css/general_styles.css">

  <!-- Color Stylesheet - orange, blue, pink, brown, red or green-->
  <link href="css/blue.css" rel="stylesheet">

  <!-- Favicon -->
  <link rel="shortcut icon" href="img/favicon/favicon.png">

  <script type="text/javascript">
    var estatusActual = null;
    window.onload = function() {
      ocultar_mostrar(0);
      actualizarCampos();
    }

    var mostrarValor = function(x) {
      var el_color = "#2d792d";
      //alert("ok");
      var matrizborr = [];
      matrizborrado = matrizborr;
      if (x != "&nbsp;") {
        ocultar_mostrar(1);
        if (x == 1) {
          el_color = "#0B3861";
        } else if (x == 2) {
          var el_color = "#0B614B";
        } else if (x == 3) {
          var el_color = "#21610B";

        } else if (x == 4) {
          var el_color = "#4B8A08";

        } else if (x == 5) {
          var el_color = "#3B7A08";

        } else if (x == 6) {
          var el_color = "#4B8A08";

        } else if (x == 7) {
          var el_color = "#4B8A08";

        } else if (x == 8) {
          var el_color = "#4B8A08";

        } else {
          el_color = "#2d792d";
        }

        var valor1 = $('#selectTema').val();
        realizaProceso(valor1);
        actualizaCamposTema(valor1);
        document.getElementById('campoTemas').innerHTML = valor1;
      } else {
        document.getElementById('campoTemas').innerHTML = "[Seleccione un tema]"
        ocultar_mostrar(0);
      }

      document.getElementById('miColor1').style.backgroundColor = el_color;
      document.getElementById('miColor2').style.backgroundColor = el_color;
      document.getElementById('miColor3').style.backgroundColor = el_color;
      document.getElementById('miColor4').style.backgroundColor = el_color;
      document.getElementById('miColor5').style.backgroundColor = el_color;
      document.getElementById('miColor6').style.backgroundColor = el_color;
      document.getElementById('miColor7').style.backgroundColor = el_color;
      document.getElementById('miColor8').style.backgroundColor = el_color;

      //ProcesoEA(valor1);
    }

    function actualizarCampos() {
      var parametros = {
        "accion": "obtenerCampos",
        "grupo": document.getElementById("campoGrupo").innerHTML,
        "periodo": document.getElementById("campoPeriodo").innerHTML
      };

      $.ajax({
        data: parametros,
        url: 'conexion/consultasNoSQL.php',
        type: 'post',
        beforeSend: function() {
          //$("#).html("Guardando..");
        },
        success: function(x) {
          if (x != "") {
            x = JSON.parse(x);
          }

          //Verificar el estatus de la instrumentación y habilitar o deshabilitar inputs, botones, etc conforme al estatus
          estatusActual = (typeof x['Estatus'] != "undefined") ? x['Estatus'] : "";
          switch (estatusActual) {
            case "A":
              $("#mensajeEstatus").addClass("text-success").text("Ahora puede editar o administrar la instrumentación.");
              break;
            case "B":
              $("#mensajeEstatus").addClass("text-danger").text("Ya no puede editar la instrumentación, se encuentra en proceso de validación por parte del presidente de grupo académico de la asignatura.");
              break;
            case "C":
              $("#mensajeEstatus").addClass("text-danger").text("Ya no puede editar la instrumentación, se encuentra en proceso de validación por parte del jefe de división correspondiente.");
              break;
            case "D":
              $("#mensajeEstatus").addClass("text-success").text("La instrumentación ya ha sido validada y ahora puede ser publicada.");
              break;
          }

          document.getElementById("campoMateria").innerHTML = (typeof x['Materia'] != "undefined") ? x['Materia'] : "-";
          document.getElementById("Caracterizacion").innerHTML = (typeof x['Caracterizacion'] != "undefined") ? x['Caracterizacion'] : "";
          document.getElementById("campoCaracterizacion").innerHTML = (typeof x['Caracterizacion'] != "undefined") ? x['Caracterizacion'] : "";
          document.getElementById("IntencionDidactica").innerHTML = (typeof x['IntencionDidactica'] != "undefined") ? x['IntencionDidactica'] : "";
          document.getElementById("campoIntencionDidactica").innerHTML = (typeof x['IntencionDidactica'] != "undefined") ? x['IntencionDidactica'] : "";
          document.getElementById("CompetenciasPrevias").innerHTML = (typeof x['CompetenciasPrevias'] != "undefined") ? x['CompetenciasPrevias'] : "";
          document.getElementById("campoCompetenciasPrevias").innerHTML = (typeof x['CompetenciasPrevias'] != "undefined") ? x['CompetenciasPrevias'] : "";
          document.getElementById("CompetenciaEA").innerHTML = (typeof x['CompetenciaEA'] != "undefined") ? x['CompetenciaEA'] : "";
          document.getElementById("campoCompetenciaEA").innerHTML = (typeof x['CompetenciaEA'] != "undefined") ? x['CompetenciaEA'] : "";
          document.getElementById("campoDocumento").innerHTML = (typeof x['Documento'] != "undefined") ? x['Documento'] : "";
          document.getElementById("campoClausula").innerHTML = (typeof x['Clausula'] != "undefined") ? x['Clausula'] : "";
          document.getElementById("campoRevision").innerHTML = (typeof x['Revision'] != "undefined") ? x['Revision'] : "";
          document.getElementById("campoResponsable").innerHTML = (typeof x['Responsable'] != "undefined") ? x['Responsable'] : "";
          document.getElementById("campoFechaEmision").innerHTML = (typeof x['FechaEmision'] != "undefined") ? x['FechaEmision'] : "";
          document.getElementById("campoCodigoDocumento").innerHTML = (typeof x['CodigoDocumento'] != "undefined") ? x['CodigoDocumento'] : "";

          document.getElementById("campoSemestre").innerHTML = (typeof x['Semestre'] != "undefined") ? x['Semestre'] : "";
          document.getElementById("campoCreditos").value = (typeof x['Creditos'] != "undefined") ? x['Creditos'] : "";
          document.getElementById("campoClaveAsignatura").innerHTML = (typeof x['ClaveAsignatura'] != "undefined") ? x['ClaveAsignatura'] : "";


          buscarCatalogo("nombrePE", "programae", (typeof x["PE"] != "undefined") ? x['PE'] : "", function(res) {
            document.getElementById("PE").innerHTML = '<select class="form-control editable" Onchange = "buscarPlanEstudios(this.options[this.selectedIndex].innerHTML);" style="width: 90%" readonly="true" id="campoPE" name="evidencia"><option>&nbsp;</option>' + res + '</select>';
            habilitarDeshabilitarCampos();
          });

          buscarPlanEstudios((typeof x["PE"] != "undefined") ? x['PE'] : "", (typeof x["PlanEstudios"] != "undefined") ? x['PlanEstudios'] : "")


          //Habilitar/mostrar inputs/botones conforme al estatus de la instrumentacion
          habilitarDeshabilitarCampos();
        }
      });
    }

    function realizaProceso(valorCaja1) { //Nombre tema

      var parametros = {
        "valorCaja1": valorCaja1
      };

      $.ajax({
        data: parametros,
        url: 'miphp.php',
        type: 'post',
        beforeSend: function() {
          $("#NombreTema").html("Cargando...")
        },
        success: function(respuesta) {
          $("#NombreTema").html("");
        }

      });

      $.ajax({
        data: parametros,
        url: '2_miphp_competencia_et.php',
        type: 'post',
        beforeSend: function() {
          $("#etq_espT").html("Procesandoo")
        },
        success: function(respuesta) {
          $("#etq_espT").html(respuesta);
        }

      });

    }

    function guardarCampo(campo) {
      var textarea = document.getElementById("campo" + campo);
      array = textarea.value;

      var parametros = {
        "accion": "guardarCampo",
        "valor": array,
        "grupo": document.getElementById("campoGrupo").innerHTML,
        "campo": campo,
        "periodo": document.getElementById("campoPeriodo").innerHTML
      };

      $.ajax({
        data: parametros,
        url: 'conexion/consultasNoSQL.php',
        type: 'post',
        beforeSend: function() {
          $("#estatus" + campo).html("Guardando..");
        },
        success: function() {
          $('#estatus' + campo).html("¡Guardado!");
          setTimeout(function() {
            //alert("okok"+array);
            $('#' + campo).html(document.getElementById("campo" + campo).value);
            $('#estatus' + campo).html("");
          }, 1500); // The millis to wait before executing this block
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

    function guardarCampoValor(campo, valor, btn) {
      var array = "";
      if (typeof valor != "undefined")
        array = valor;
      else
        array = document.getElementById("campo" + campo).innerHTML;

      var parametros = {
        "accion": "guardarCampo",
        "valor": array,
        "grupo": document.getElementById("campoGrupo").innerHTML,
        "campo": campo,
        "periodo": document.getElementById("campoPeriodo").innerHTML
      };

      $.ajax({
        data: parametros,
        url: 'conexion/consultasNoSQL.php',
        type: 'post',
        beforeSend: function() {
          $("#estatus" + btn).html("Guardando...");
        },
        success: function() {
          $('#estatus' + btn).html("¡Guardado!");
          setTimeout(function() {
            $('#estatus' + btn).html("");
          }, 1500); // The millis to wait before executing this block
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

    function actualizaCamposTema(tema) {
      var parametros = {
        "accion": "obtenerTemas",
        "tema": tema,
        "grupo": document.getElementById("campoGrupo").innerHTML,
        "periodo": document.getElementById("campoPeriodo").innerHTML
      };

      $.ajax({
        data: parametros,
        url: 'conexion/consultasNoSQL.php',
        type: 'post',
        beforeSend: function() {
          //$("#).html("Guardando..");
        },
        success: function(x) {
          var grupo = document.getElementById("campoGrupo").innerHTML;
          document.getElementById("enviarTema").value = tema;
          document.getElementById("enviarGrupo").value = grupo;
          document.getElementById("enviarPeriodo").value = document.getElementById("campoPeriodo").innerHTML;
          //alert(x);
          x = JSON.parse(x);

          if (typeof x[tema] != 'undefined') {

            document.getElementById("CompetenciaET").innerHTML = (typeof x[tema]['CompetenciaET'] != "undefined") ? x[tema]['CompetenciaET'] : "";
            document.getElementById("campoCompetenciaET").value = (typeof x[tema]['CompetenciaET'] != "undefined") ? x[tema]['CompetenciaET'] : '';
            document.getElementById("CompetenciasGen").innerHTML = (typeof x[tema]['CompetenciasGen'] != "undefined") ? x[tema]['CompetenciasGen'] : "";
            document.getElementById("campoCompetenciasGen").value = (typeof x[tema]['CompetenciasGen'] != "undefined") ? x[tema]['CompetenciasGen'] : "";
            document.getElementById("Indicadores").innerHTML = (typeof x[tema]['Indicadores'] != "undefined") ? x[tema]['Indicadores'] : '';
            document.getElementById("campoIndicadores").value = (typeof x[tema]['Indicadores'] != "undefined") ? x[tema]['Indicadores'] : '';
            document.getElementById("Recursos").innerHTML = (typeof x[tema]['Recursos'] != "undefined") ? x[tema]['Recursos'] : '';
            document.getElementById("campoRecursos").value = (typeof x[tema]['Recursos'] != "undefined") ? x[tema]['Recursos'] : '';
            document.getElementById("TemasSubtemas").innerHTML = (typeof x[tema]['TemasSubtemas'] != "undefined") ? x[tema]['TemasSubtemas'] : '';

            document.getElementById("campoTemasSubtemas").value = (typeof x[tema]['TemasSubtemas'] != "undefined") ? x[tema]['TemasSubtemas'] : '';

            document.getElementById("TituloTema").value = (typeof x[tema]['TituloTema'] != "undefined") ? x[tema]['TituloTema'] : '';


            if (typeof x[tema]['ValorIndicadores'] != "undefined")
              actualizarValorIndicadores(x[tema]['ValorIndicadores']);
            else
              actualizarValorIndicadores([0, 0, 0, 0, 0, 0]);

            if (typeof x[tema]['Practicas'] != "undefined")
              actualizarPracticas(x[tema]['Practicas']);
            else
              actualizarPracticas();

            if (typeof x[tema]['Actividades'] != "undefined")
              actualizarActividades(x[tema]['Actividades']);
            else
              actualizarActividades();

            if (typeof x[tema]['HTP'] != "undefined")
              actualizarHTP(x[tema]['HTP']);
            else
              actualizarHTP("");

            if (typeof x[tema]['MatrizEvaluacion'] != "undefined")
              actualizarEvidencias(x[tema]['MatrizEvaluacion']);
            else
              actualizarEvidencias();

            if (typeof x[tema]['Fechas'] != "undefined")
              actualizaFechas(x[tema]['Fechas'], x[tema]['Semanas']);
            else
              actualizaFechas();


            document.getElementById("campoFuentes").value = (typeof x[tema]['Fuentes'] != "undefined") ? x[tema]['Fuentes'] : '';
            agregarFuentes();




          } else {
            document.getElementById("CompetenciaET").innerHTML = "";
            document.getElementById("CompetenciasGen").innerHTML = "";
            document.getElementById("campoCompetenciaET").value = "";
            document.getElementById("campoCompetenciasGen").value = "";
            document.getElementById("Indicadores").innerHTML = "";
            document.getElementById("campoIndicadores").value = "";
            document.getElementById("Recursos").innerHTML = "";
            document.getElementById("campoRecursos").value = "";
            document.getElementById("TemasSubtemas").innerHTML = "";
            document.getElementById("campoTemasSubtemas").value = "";
            document.getElementById("campoFuentes").value = "";
            document.getElementById("TituloTema").value = ""
            actualizarValorIndicadores([0, 0, 0, 0, 0, 0]);
            actualizarPracticas();
            actualizarHTP("");
            actualizarActividades();
            actualizarEvidencias();
            actualizaFechas();
            agregarFuentes();
          }


          habilitarDeshabilitarCampos()

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

    function ocultar_mostrar(x) {
      var display = "none";
      if (x) display = "block";
      document.getElementById('panelCompetenciaET').style.display = display;;
      document.getElementById('panelProcesoEA').style.display = display;
      document.getElementById('panelPracticas').style.display = display;
      document.getElementById('panelEstrategiaEvaluacion').style.display = display;
      document.getElementById('panelIndicadores').style.display = display;
      document.getElementById('panelMatriz').style.display = display;
      document.getElementById('panelCalendarizacion').style.display = display;
      document.getElementById('panelFuentes').style.display = display;
      document.getElementById('panelGen').style.display = display;

    }


    // --------------- METODO PARA HABILITAR O DESHABILITAR LOS CAMPOS CONFORME AL ESTATUS DE LA INSTRUMENTACION -----------------
    function habilitarDeshabilitarCampos() {
      var elementos = document.getElementsByClassName("editable");
      if (estatusActual != "") {
        //console.log(elementos);
        switch (estatusActual) {
          case "A":
            for (var i = 0; i < elementos.lenght; i++) {
              elementos[i].disabled = false;
            }
            break;
          case "B":
            for (var i = 0; i < elementos.length; i++) {
              elementos[i].disabled = true;
              elementos[i].classList.add("disabled");
            }
            break;
        }
      } else {
        for (var i = 0; i < elementos.length; i++) {
          elementos[i].disabled = true;
        }
      }
    }
  </script>

  <!-- Conexiones a bases de datos -->
</head>

<body>
  <?php
  include("BarraMenu.php");
  require_once 'conexion/conexionSQL.php';
  $connSQL = connSQL::singleton();
  ?>
  <!--<input type="text" name="comida" id="pruebaR" value="" /> -->

  <!-- Content strats -->

  <div class="content">
    <div class="container" style="margin-top: 30px; margin-bottom:30px;">
      <div class="row">

        <form action="indexi.php">
          <input type="submit" class="btn btn-success" value="Regresar" />
        </form>

      </div>
      <br>
      <div class="row">
        <div class="col-md-4 col-xs-4 col-sm-4 col-lg-4">
          <input name="archivo" type="file" id="aexex">
        </div>
        <div class="col-md-3 col-xs-3 col-sm-3 col-lg-3">
          <input type="Button" id="cargainstrumentacionexcel" class="btn btn-warning" value="Cargar instrumentación desde Excel" />
        </div>
        <div class="col-md-1 col-xs-1 col-sm-1 col-lg-1"></div>
        <div class="col-md-3 col-xs-3 col-sm-3 col-lg-3" id="msie">
          ...
        </div>

      </div>



      <br>
      <div class="row">
        <div class="col-md-12">

          <!-- Events starts -->
          <div class="events">
            <div class="row">
              <div class="col-md-12">

                <!--row -->
                <div class="row">
                  <div class="col-md-3 col-sm-12 col-12 col-lg-3">
                    <div class="form-group">
                      <label class="control-label col-md-3" for="select">
                        <h4>Tema</h4>
                      </label>
                      <form action="miphp.php" method="POST">
                        <select class="form-control color" id="selectTema" name="nombreTema" Onchange="mostrarValor(this.options[this.selectedIndex].innerHTML);">
                          <option>&nbsp;</option>
                          <?php
                          //Mostrar la cantidad de temas conforme a lo obtenido al generar la instrumentacion anteriormente
                          for ($i = 1; $i <= intval($_GET['temas']); $i++) {
                            echo "<option value='" . $i . "'>" . $i . "</option>";
                          }
                          ?>
                          <!--<option value='1'>1</option>
                            <option value='2'>2</option>
                            <option value='3'>3</option>
                            <option value='4'>4</option>
                            <option value='5'>5</option>
                            <option value='6'>6</option>
                            <option value='7'>7</option>
                            <option value='8'>8</option> 
                            -->
                        </select>
                        <p id="prueba1"></p>
                      </form>
                    </div>
                  </div>
                  <div class="col-md-9 col-sm-12 col-12 col-lg-9 d-flex align-items-end pb-2 justify-content-md-end justify-content-sm-center justify-content-center">
                    <h5 id="mensajeEstatus"></h5>
                  </div>

                  <!-- <div class="col-md-6 azul" id="columna">
                    <div class="form-group">


                      <div class="col-md-7">

                      </div>
                    </div>
                  </div>

                  <div class="col-md-6 azul" id="columna">
                    <h4>
                      <span class="color" id="NombreTema" value="NombreTema"></span>
                    </h4>
                  </div>
                </div>Fin row -->
                </div>




                <div id="accordion" style="text-align: center;">

                  <!-- First Accordion [Detalles generales]-->
                  <div class="panel">
                    <div class="panel-heading" id="headingOne">
                      <a data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        <h5 class="panel-title">Formato</h5>
                      </a>
                    </div>
                    <script type="text/javascript">
                      function guardarDatosGenerales() {

                        guardarCampoValor("Documento");
                        guardarCampoValor("Revision");
                        guardarCampoValor("Responsable");
                        guardarCampoValor("FechaEmision");
                        guardarCampoValor("CodigoDocumento");
                        guardarCampoValor("Documento");

                        var select = document.getElementById("campoPE");
                        var pe = select.options[select.selectedIndex].innerHTML;
                        guardarCampoValor("PE", pe);

                        var select = document.getElementById("campoPlanEstudios");
                        var pe = select.options[select.selectedIndex].innerHTML;
                        guardarCampoValor("PlanEstudios", pe);

                        var campo = document.getElementById("campoSemestre").value;
                        guardarCampoValor("Semestre", campo);

                        var campo = document.getElementById("campoCreditos").value;
                        guardarCampoValor("Creditos", campo);

                        var campo = document.getElementById("campoClaveAsignatura").value;
                        guardarCampoValor("ClaveAsignatura", campo);

                        guardarCampoValor("Clausula", undefined, "DetallesGenerales");
                      }
                    </script>
                    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                      <div class="panel-body">

                        <!-- Contenido                  -->
                        <!--row  -->
                        <div class="row">
                          <div class="col-md-3 azul" id="columna">
                            <h5>Documento: <span class="color" id="campoDocumento"></span></h5>
                          </div>
                          <div class="col-md-6 azul" id="columna">
                            <h5>Cláusula ISO 9001 2008: <span class="color" id="campoClausula"></span></h5>
                          </div>
                          <div class="col-md-3 azul" id="columna">
                            <h5>Revisión: <span class="color" id="campoRevision"></span></h5>
                          </div>
                        </div><!--Fin row -->

                        <!--row -->
                        <div class="row">
                          <div class="col-md-3 azul" id="columna">
                            <h5>Responsable: <span class="color" id="campoResponsable"></span></h5>
                          </div>
                          <div class="col-md-6 azul" id="columna">
                            <h5>Fecha de emisión: <span class="color" id="campoFechaEmision"></span></h5>
                          </div>
                          <div class="col-md-3 azul" id="columna">
                            <h5>Código del documento: <span class="color" id="campoCodigoDocumento"></span></h5>
                          </div>
                        </div><!--Fin row-->

                        <div class="dividerM" style="margin-bottom: 15px"></div>

                        <!--row -->
                        <div class="row">
                          <div class="col-md-6 azul" id="columna">
                            <!-- Select box -->
                            <div class="form-group">
                              <label class="control-label col-md-3" for="select">
                                <h5>Programa Educativo:</h5>
                              </label>
                              <div class="col-md-12" id="PE">

                              </div>
                            </div>
                          </div>

                          <script type="text/javascript">
                            function buscarPlanEstudios(programae, selected) {
                              var parametros = {
                                "accion": "buscarPlanEstudios",
                                "programa": programae,
                                "selected": selected
                              };

                              $.ajax({
                                data: parametros,
                                url: 'conexion/consultasSQL.php',
                                type: 'post',
                                success: function(respuesta) {
                                  document.getElementById("campoPlanEstudios").innerHTML = respuesta;
                                  //alert(respuesta);
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
                          </script>

                          <div class="col-md-6 azul" id="columna">

                            <!-- Select box -->
                            <div class="form-group">
                              <label class="control-label col-md-3" for="select">
                                <h5>Plan de estudios:</h5>
                              </label>
                              <div class="col-md-12">
                                <select class="form-control color editable" id="campoPlanEstudios">
                                  <option>&nbsp;</option>
                                </select>
                              </div>
                            </div>
                          </div>
                        </div><!--Fin row -->

                        <!--row -->
                        <div class="row">
                          <div class="col-md-3 azul" id="columna">
                            <h5>Nombre de la asignatura: <span class="color" id="campoMateria"></span></h5>
                          </div>
                          <div class="col-md-3 azul" id="columna">
                            <h5>Clave de la asignatura: <span class="color" id="campoClaveAsignatura"></span></h5>
                          </div>
                          <div class="col-md-3 azul" id="columna">
                            <h5>Créditos: <input width="40px" class="color text-center editable" id="campoCreditos"></h5>
                          </div>
                          <div class="col-md-3 azul" id="columna">
                            <h5>Número de Tema: <span class="color" id="campoTemas">[Seleccione un tema]</span></h5>
                          </div>
                        </div><!--Fin row -->
                        <!--row -->
                        <div class="row">
                          <div class="col-md-4 azul" id="columna">
                            <h5>Semestre: <span class="color" id="campoSemestre"></span></h5>
                          </div>
                          <div class="col-md-4 azul" id="columna">
                            <h5>Clave de grupo: <span class="color" id="campoGrupo"><?php echo $_GET["grupo"] ?></span></h5>
                          </div>
                          <div class="col-md-4 azul" id="columna">
                            <label class="control-label" for="select">
                              <h5>Periodo: <span class="color" id="campoPeriodo"><?php echo $_GET["p"] ?></span></h5>
                            </label>

                          </div>
                        </div><!--Fin row -->

                        <div class="dividerM"></div>

                        <div align="center" id="guardarDetallesGenerales" style="margin-bottom: 10px; margin-top: 5px">
                          <h4 id="estatusDetallesGenerales"></h4>
                          <button type="button" class="btn btn-secondary editable" onclick="guardarDatosGenerales()">Guardar</button>
                        </div>
                        <!-- Fin Contenido                  -->

                      </div>
                    </div>
                  </div>
                  <!-- Fin Accordion -->


                  <div class="panel">
                    <div class="panel-heading" id="headingTwo">
                      <a data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        <h5 class="panel-title">Caracterización de la asignatura</h5>
                      </a>
                    </div>
                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                      <div class="panel-body">
                        <div class="mostrarContenido">
                          <p id="Caracterizacion"></p>
                        </div>

                        <!-- Modal -->
                        <!-- Trigger the modal with a button -->
                        <div class="button editable" data-toggle="modal" data-target="#myModal1"><a href="#responsive" class="btn btn-info editable">Editar</a> </div>

                        <!-- Modal -->
                        <div id="myModal1" class="modal fade">
                          <div class="modal-dialog" role="document">
                            <!-- Modal content-->
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title">Caracterización de la asignatura</h5>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                              </div>

                              <div class="modal-body">
                                <p>
                                  <textarea style="width:100%; height:30em" id="campoCaracterizacion"></textarea>
                                </p>
                              </div>

                              <div class="modal-footer">
                                <h4 id="estatusCaracterizacion"></h4>
                                <button type="button" class="btn btn-secondary" onclick="guardarCampo('Caracterizacion')">Guardar</button>
                              </div>

                            </div>
                          </div>
                        </div>
                        <!-- Fin modal -->
                      </div>
                    </div>
                  </div>
                  <!-- fin acoordeon -->

                  <!-- Three accordion [Intencion Didactica]-->
                  <div class="panel">
                    <div class="panel-heading" id="headingThree">
                      <a data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                        <h5 class="panel-title">Intención didáctica</h5>
                      </a>
                    </div>
                    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                      <div class="panel-body">
                        <div class="mostrarContenido">
                          <p id="IntencionDidactica"></p>
                        </div>

                        <!-- Modal -->
                        <!-- Trigger the modal with a button -->
                        <div class="button editable" data-toggle="modal" data-target="#myModal2"><a href="#responsive" class="btn btn-info editable">Editar</a> </div>

                        <!-- Modal -->
                        <div id="myModal2" class="modal fade" role="dialog">
                          <div class="modal-dialog">
                            <!-- Modal content-->
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title">Intención didáctica</h5>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                              </div>
                              <div class="modal-body">
                                <p><textarea style="width:100%; height:30em" id="campoIntencionDidactica"></textarea></p>
                              </div>
                              <div class="modal-footer">
                                <h4 id="estatusIntencionDidactica"></h4>
                                <button type="button" class="btn btn-secondary" onclick="guardarCampo('IntencionDidactica')">Guardar</button>
                              </div>
                            </div>
                          </div>
                        </div>
                        <!-- Fin modal -->
                      </div>
                    </div>
                  </div>
                  <!-- fin acoordeon -->

                  <!-- Fourth accordion [Competencias previas]-->
                  <div class="panel">
                    <div class="panel-heading" id="headingFour">
                      <a data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                        <h5 class="panel-title">Competencias previas</h5>
                      </a>
                    </div>
                    <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordion">
                      <div class="panel-body">
                        <div class="mostrarContenido">
                          <p id="CompetenciasPrevias"></p>
                        </div>
                        <!-- Modal -->
                        <!-- Trigger the modal with a button -->
                        <div class="button editable" data-toggle="modal" data-target="#myModal3"><a href="#responsive" class="btn btn-info editable">Editar</a> </div>

                        <!-- Modal -->
                        <div id="myModal3" class="modal fade" role="dialog">
                          <div class="modal-dialog">
                            <!-- Modal content-->
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title">Competencias previas</h5>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                              </div>
                              <div class="modal-body">
                                <p><textarea style="width:100%; height:30em" id="campoCompetenciasPrevias"></textarea></p>
                              </div>
                              <div class="modal-footer">
                                <h4 id="estatusCompetenciasPrevias"></h4>
                                <button type="button" class="btn btn-secondary" onclick="guardarCampo('CompetenciasPrevias')">Guardar</button>
                              </div>
                            </div>
                          </div>
                        </div>
                        <!-- Fin modal -->
                      </div>
                    </div>
                  </div>
                  <!-- fin acoordeon -->

                  <!-- Fifth accordion [CompetenciaEA]-->
                  <div class="panel">
                    <div class="panel-heading" id="headingFive">
                      <a data-toggle="collapse" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                        <h5 class="panel-title">Competencia específica de la asignatura</h5>
                      </a>
                    </div>
                    <div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#accordion">
                      <div class="panel-body">
                        <div class="mostrarContenido">
                          <p id="CompetenciaEA"></p>
                        </div>
                        <!-- Modal -->

                        <!-- Trigger the modal with a button -->
                        <div class="button editable" data-toggle="modal" data-target="#myModal4"><a href="#responsive" class="btn btn-info editable">Editar</a> </div>

                        <!-- Modal -->
                        <div id="myModal4" class="modal fade" role="dialog">
                          <div class="modal-dialog">
                            <!-- Modal content-->
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title">Competencia específica de la asignatura</h5>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                              </div>
                              <div class="modal-body">
                                <p><textarea style="width:100%; height:30em" id="campoCompetenciaEA"></textarea></p>
                              </div>
                              <div class="modal-footer">
                                <h4 id="estatusCompetenciaEA"></h4>
                                <button type="button" class="btn btn-secondary" onclick="guardarCampo('CompetenciaEA')">Guardar</button>
                              </div>
                            </div>
                          </div>
                        </div>
                        <!-- Fin modal -->
                      </div>
                    </div>
                  </div>
                  <!-- fin acordeon -->

                  <script type="text/javascript">
                    function guardarCampoTema(campo) {
                      var textarea = document.getElementById("campo" + campo);
                      array = textarea.value;
                      var tema = $('#selectTema').val();
                      //alert(tema);
                      var parametros = {
                        "accion": "guardarCampoTema",
                        "valor": array,
                        "grupo": document.getElementById("campoGrupo").innerHTML,
                        "campo": campo,
                        "tema": tema,
                        "periodo": document.getElementById("campoPeriodo").innerHTML
                      };

                      $.ajax({
                        data: parametros,
                        url: 'conexion/consultasNoSQL.php',
                        type: 'post',
                        beforeSend: function() {
                          $("#estatus" + campo).html("Guardando..");
                        },
                        success: function(resultado) {
                          $('#estatus' + campo).html("¡Guardado!");
                          setTimeout(function() {
                            //document.getElementById("campo"+campo).value
                            $('#' + campo).html(document.getElementById("campo" + campo).value);
                            $('#estatus' + campo).html("");
                          }, 1500); // The millis to wait before executing this block
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
                  </script>


                  <!--INICIAN ACORDEONES DE TEMA-->

                  <!-- Six accordion [CompetenciaET]-->
                  <div class="panel" id="panelCompetenciaET">
                    <div class="panel-heading" id="headingSix">
                      <a data-toggle="collapse" data-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                        <h5 class="panel-title " id="miColor1">Tema</h5>
                      </a>
                    </div>
                    <div id="collapseSix" class="collapse" aria-labelledby="headingSix" data-parent="#accordion">
                      <div class="panel-body">

                        <h5>Tema: <input id="TituloTema" class="editable"></h5>
                        <h4 id="estatusTituloTema"></h4>
                        <button type="button" class="btn btn-secondary editable" onclick="guardarCampoTemaValor('TituloTema',document.getElementById('TituloTema').value)">Guardar</button></p>

                        <div class="dividerM"></div>

                        <h5 class="subTitulo"> Competencia específica del tema</h5><br>
                        <div class="mostrarContenido">
                          <p id="CompetenciaET"></p>
                        </div>
                        <!-- Modal -->

                        <!-- Trigger the modal with a button -->
                        <div class="button editable" data-toggle="modal" data-target="#myModal5"><a href="#responsive" class="btn btn-info editable">Editar</a> </div>

                        <!-- Modal -->
                        <div id="myModal5" class="modal fade" role="dialog">
                          <div class="modal-dialog">
                            <!-- Modal content-->
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title">Competencia específica del tema</h5>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                              </div>
                              <div class="modal-body">
                                <p><textarea style="width:100%; height:30em" id="campoCompetenciaET"></textarea></p>
                              </div>
                              <div class="modal-footer">
                                <h4 id="estatusCompetenciaET"></h4>
                                <button type="button" class="btn btn-secondary" onclick="guardarCampoTema('CompetenciaET')">Guardar</button>
                              </div>
                            </div>
                          </div>
                        </div>
                        <!-- Fin modal -->


                        <!-- Competencias genericas -->
                        <div class="dividerM"></div>
                        <h5 class="subTitulo"> Competencias genéricas a desarrollar </h5><br>
                        <div class="mostrarContenido">
                          <p id="CompetenciasGen"></p>
                        </div>
                        <!-- Modal -->

                        <!-- Trigger the modal with a button -->

                        <div class="button editable" data-toggle="modal" data-target="#myModal51"><a href="#responsive" class="btn btn-info editable">Editar</a> </div>

                        <!-- Modal -->
                        <div id="myModal51" class="modal fade" role="dialog">
                          <div class="modal-dialog">
                            <!-- Modal content-->
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title">Competencias genéricas a desarrollar</h5>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                              </div>
                              <div class="modal-body">
                                <p><textarea style="width:100%; height:30em" id="campoCompetenciasGen"></textarea></p>
                              </div>
                              <div class="modal-footer">
                                <h4 id="estatusCompetenciasGen"></h4>
                                <button type="button" class="btn btn-secondary" onclick="guardarCampoTema('CompetenciasGen')">Guardar</button>
                              </div>
                            </div>
                          </div>
                        </div>
                        <!-- Fin modal -->
                      </div>
                    </div>
                  </div>
                  <!-- end accordion -->

                  <!-- Seven accordion [ProcesoEA]-->
                  <div class="panel" id="panelProcesoEA">
                    <div class="panel-heading" id="headingSeven">
                      <a data-toggle="collapse" data-target="#collapseSeven" aria-expanded="false" aria-controls="collapseSeven">
                        <h5 class="panel-title " id="miColor2">Proceso enseñanza aprendizaje</h5>
                      </a>
                    </div>
                    <div id="collapseSeven" class="collapse" aria-labelledby="headingSeven" data-parent="#accordion">
                      <div class="panel-body">

                        <h5>Temas y subtemas</h5><br>
                        <div class="mostrarContenido">
                          <p id="TemasSubtemas"></p>
                        </div>

                        <!-- Trigger the modal with a button -->
                        <div class="button editable" data-toggle="modal" data-target="#myModalTemas"><a href="#responsive" class="btn btn-info editable">Editar</a> </div>

                        <!-- Modal -->
                        <div id="myModalTemas" class="modal fade" role="dialog">
                          <div class="modal-dialog">
                            <!-- Modal content-->
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title">Temas y subtemas</h5>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                              </div>
                              <div class="modal-body">
                                <p><textarea style="width:100%; height:20em" id="campoTemasSubtemas"></textarea></p>
                              </div>
                              <div class="modal-footer">
                                <h4 id="estatusTemasSubtemas"></h4>
                                <button type="button" class="btn btn-secondary" onclick="guardarCampoTema('TemasSubtemas')">Guardar</button>
                              </div>
                            </div>
                          </div>
                        </div>
                        <!-- Fin modal -->

                        <div class="dividerM" style="margin-bottom: 5px"></div>

                        <script type="text/javascript">
                          function agregarActividad() {
                            var tablaActividades = document.getElementById("tablaActividades");
                            var fila = tablaActividades.insertRow(tablaActividades.rows.length - 1);
                            var docente = fila.insertCell(0);
                            var estudiante = fila.insertCell(1);
                            var borrar = fila.insertCell(2);

                            docente.innerHTML = '<textarea class="mostrarContenido editable" align="center" style="width:100%; height: 12em"></textarea>';
                            estudiante.innerHTML = '<textarea class="mostrarContenido editable" align="center" style="width: 100%; height: 12em"></textarea>';
                            borrar.innerHTML = '<button onclick="borrarActividad($(this).closest(\'tr\').index()+1)" type="button" class="btn btn-danger btn-sm editable" style="margin-left:10px"><i class="fa-solid fa-trash"></button>';
                          }

                          function agregarActividad2(aa, bb) {
                            var tablaActividades = document.getElementById("tablaActividades");
                            var fila = tablaActividades.insertRow(tablaActividades.rows.length - 1);
                            var docente = fila.insertCell(0);
                            var estudiante = fila.insertCell(1);
                            var borrar = fila.insertCell(2);

                            docente.innerHTML = '<textarea class="mostrarContenido editable" align="center" style="width:100%; height: 12em">' + aa + '</textarea>';
                            estudiante.innerHTML = '<textarea class="mostrarContenido editable" align="center" style="width: 100%; height: 12em">' + bb + '</textarea>';
                            borrar.innerHTML = '<button onclick="borrarActividad($(this).closest(\'tr\').index()+1)" type="button" class="btn btn-danger btn-sm editable" style="margin-left:10px"><i class="fa-solid fa-trash"></button>';
                          }

                          function borrarActividad(x) {
                            var tabla = document.getElementById("tablaActividades");
                            tabla.deleteRow(x);
                          }

                          function guardarActividades() {
                            var actividades = [];
                            var tabla = document.getElementById("tablaActividades");
                            for (var i = 1, row; row = tabla.rows[i]; i++) {
                              if (i != tabla.rows.length - 1) {
                                var docente = row.cells[0].getElementsByTagName("textarea")[0].value;
                                var alumno = row.cells[1].getElementsByTagName("textarea")[0].value;
                                if (!(docente == "" && alumno == "")) {
                                  var actividad = [docente, alumno];
                                  actividades.push(actividad);
                                }
                              }
                            }


                            var tema = $('#selectTema').val();
                            var parametros = {
                              "accion": "guardarCampoTema",
                              "valor": actividades,
                              "grupo": document.getElementById("campoGrupo").innerHTML,
                              "campo": "Actividades",
                              "tema": tema,
                              "periodo": document.getElementById("campoPeriodo").innerHTML
                            };

                            $.ajax({
                              data: parametros,
                              url: 'conexion/consultasNoSQL.php',
                              type: 'post',
                              beforeSend: function() {
                                $("#estatusActividades").html("Guardando..");
                              },
                              success: function(resultado) {
                                $('#estatusActividades').html("¡Guardado!");
                                setTimeout(function() {
                                  $('#estatusActividades').html("");
                                }, 1500); // The millis to wait before executing this block
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

                          function actualizarHTP(htp) {
                            document.getElementById("HTP").innerHTML = htp;
                            document.getElementById("campoHTP").value = htp;
                          }

                          function actualizarActividades(actividades) {
                            var tabla = document.getElementById("tablaActividades");
                            var l = tabla.rows.length;
                            for (var i = 1; i < l - 1; i++) {
                              tabla.deleteRow(1);
                            }

                            if (actividades != null) {
                              actividades.forEach(actividad => {
                                var fila = tabla.insertRow(tabla.rows.length - 1);
                                var docente = fila.insertCell(0);
                                var estudiante = fila.insertCell(1);
                                var borrar = fila.insertCell(2);

                                docente.innerHTML = '<textarea class="mostrarContenido editable" align="center" style="width:100%; height: 12em">' + actividad[0] + '</textarea>';
                                estudiante.innerHTML = '<textarea class="mostrarContenido editable" align="center" style="width: 100%; height: 12em">' + actividad[1] + '</textarea>';
                                borrar.innerHTML = '<button onclick="borrarActividad($(this).closest(\'tr\').index()+1)" type="button" class="btn btn-danger btn-sm editable" style="margin-left:10px"><i class="fa-solid fa-trash"></button>';
                              });
                            }
                          }
                        </script>

                        <table class="table table-hover" id="tablaActividades">
                          <thead>
                            <tr>
                              <th>
                                <h5> Actividades de enseñanza (Docente) </h5>
                              </th>
                              <th>
                                <h5> Actividades de aprendizaje (Estudiante) </h5>
                              </th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <td colspan="2">
                              <td>
                                <button onclick="agregarActividad()" align="center" type="button" class="btn btn-success btn-sm editable" style="font-size: 12px">Agregar
                                </button>
                              </td>
                            </tr>
                          </tbody>
                        </table>

                        <div class="row">
                          <div class="col-md-12" align="right" id="guardarDetallesGenerales" style="margin-bottom: 10px;">
                            <h4 id="estatusActividades"></h4>
                            <button type="button" class="btn btn-secondary editable" onclick="guardarActividades()">Guardar</button>
                          </div>
                        </div>



                        <!-- Héctor -->

                        <div class="dividerM" style="margin-bottom: 5px"></div>

                        <h5> Horas teórico-prácticas</h5><br>
                        <div class="mostrarContenido">
                          <p id="HTP"></p>
                        </div>

                        <!-- Trigger the modal with a button -->
                        <div class="button editable" data-toggle="modal" data-target="#myModalHTP"><a href="#responsive" class="btn btn-info editable">Editar</a> </div>

                        <!-- Modal -->
                        <div id="myModalHTP" class="modal fade" role="dialog">
                          <div class="modal-dialog">
                            <!-- Modal content-->
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title">Horas teórico-prácticas</h5>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                              </div>
                              <div class="modal-body">
                                <p><textarea style="width:100%; height:20em" id="campoHTP"></textarea></p>
                              </div>
                              <div class="modal-footer">
                                <h4 id="estatusHTP"></h4>
                                <button type="button" class="btn btn-secondary" onclick="guardarCampoTema('HTP')">Guardar</button>
                              </div>
                            </div>
                          </div>
                        </div>
                        <!-- Fin modal -->


                        <!-- Termina Héctor -->
                        <div class="dividerM" style="margin-bottom: 5px"></div>

                        <h5> Recursos y apoyos didácticos</h5><br>
                        <div class="mostrarContenido">
                          <p id="Recursos"></p>
                        </div>

                        <!-- Trigger the modal with a button -->
                        <div class="button editable" data-toggle="modal" data-target="#myModalRecursos"><a href="#responsive" class="btn btn-info editable">Editar</a> </div>

                        <!-- Modal -->
                        <div id="myModalRecursos" class="modal fade" role="dialog">
                          <div class="modal-dialog">
                            <!-- Modal content-->
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title">Recursos y apoyos didácticos</h5>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                              </div>
                              <div class="modal-body">
                                <p><textarea style="width:100%; height:20em" id="campoRecursos"></textarea></p>
                              </div>
                              <div class="modal-footer">
                                <h4 id="estatusRecursos"></h4>
                                <button type="button" class="btn btn-secondary" onclick="guardarCampoTema('Recursos')">Guardar</button>
                              </div>
                            </div>
                          </div>
                        </div>
                        <!-- Fin modal -->
                      </div>
                    </div>
                  </div>
                  <!-- end acordion -->

                  <!-- Eight accordion [Practicas]-->
                  <div class="panel" id="panelPracticas">
                    <div class="panel-heading" id="headingEight">
                      <a data-toggle="collapse" data-target="#collapseEight" aria-expanded="false" aria-controls="collapseEight">
                        <h5 class="panel-title" id="miColor3">Prácticas en laboratorios o talleres</h5>
                      </a>
                    </div>
                    <script type="text/javascript">
                      function agregarPractica() {
                        var tablaPracticas = document.getElementById("tablaPracticas");
                        var fila = tablaPracticas.insertRow(tablaPracticas.rows.length - 1);
                        var celdaNo = fila.insertCell(0);
                        var titulo = fila.insertCell(1);
                        var laboratorio = fila.insertCell(2);
                        var borrar = fila.insertCell(3);
                        titulo.style.width = "450px";

                        var parametros = {
                          "accion": "buscarLaboratorios"
                        };
                        var labs = "";
                        $.ajax({
                          data: parametros,
                          url: 'conexion/consultasSQL.php',
                          type: 'post',
                          success: function(resultado) {
                            laboratorio.innerHTML =
                              '<select class="form-control editable" align="center" style=""' +
                              'id="selectLaboratorio' + (tablaPracticas.rows.length - 2) + '" name="laboratorio">' +
                              '<option>&nbsp;</option>' + resultado + '</select>';
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



                        titulo.innerHTML = '<textarea class="mostrarContenido editable" align="center" style="width:100%" id="tituloPractica' + (tablaPracticas.rows.length - 2) + '"></textarea>';
                        borrar.innerHTML = '<button onclick="borrarPractica($(this).closest(\'tr\').index())" type="button" class="btn btn-danger btn-sm editable" style="margin-left:10px"><i class="fa-solid fa-trash"></button>';
                        celdaNo.innerHTML = tablaPracticas.rows.length - 2;

                      }

                      async function agregarPractica2(ti, la, cualap) {
                        var tablaPracticas = document.getElementById("tablaPracticas");
                        var fila = tablaPracticas.insertRow(tablaPracticas.rows.length - 1);
                        var celdaNo = fila.insertCell(0);
                        var titulo = fila.insertCell(1);
                        var laboratorio = fila.insertCell(2);
                        var borrar = fila.insertCell(3);
                        titulo.style.width = "450px";
                        //alert("apoco");
                        var parametros = {
                          "accion": "buscarLaboratorios"
                        };
                        var labs = "";
                        $.ajax({
                          data: parametros,
                          url: 'conexion/consultasSQL.php',
                          type: 'post',
                          success: function(resultado) {
                            laboratorio.innerHTML =
                              '<select value="' + la + '" class="form-control editable" align="center" style=""' +
                              'id="selectLaboratorio' + cualap + '" name="laboratorio">' +
                              '<option>&nbsp;</option>' + resultado + '</select>';
                            $num = cualap;
                            $("#selectLaboratorio" + $num + " option:contains('" + la + "')").attr('selected', true);
                            //alert("Creado");
                            guardarPracticas();
                            //alert(" -"+la+"- ");
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



                        titulo.innerHTML = '<textarea class="mostrarContenido editable" align="center" style="width:100%" id="tituloPractica' + (tablaPracticas.rows.length - 2) + '">' + ti + '</textarea>';
                        borrar.innerHTML = '<button onclick="borrarPractica($(this).closest(\'tr\').index())" type="button" class="btn btn-danger btn-sm editable" style="margin-left:10px"><i class="fa-solid fa-trash"></button>';
                        celdaNo.innerHTML = tablaPracticas.rows.length - 2;

                      }

                      function actualizarPracticas(practicas) {
                        var tablaPracticas = document.getElementById("tablaPracticas");
                        var l = tablaPracticas.rows.length;
                        for (var i = 1; i < l - 1; i++) {
                          tablaPracticas.deleteRow(1);
                        }

                        if (practicas != null) {
                          practicas.forEach(practica => {
                            var fila = tablaPracticas.insertRow(tablaPracticas.rows.length - 1);
                            var celdaNo = fila.insertCell(0);
                            var titulo = fila.insertCell(1);
                            var laboratorio = fila.insertCell(2);
                            var borrar = fila.insertCell(3);

                            titulo.style.width = "450px";

                            var parametros = {
                              "accion": "buscarLaboratorios",
                              "selected": practica[1]
                            };


                            $.ajax({
                              data: parametros,
                              url: 'conexion/consultasSQL.php',
                              type: 'post',
                              success: function(resultado) {
                                laboratorio.innerHTML = '<select class="form-control editable" align="center"' +
                                  'id="selectLaboratorio' + (tablaPracticas.rows.length - 2) + '" name="laboratorio">' +
                                  '<option>&nbsp;</option>' + resultado + '</select>';
                                habilitarDeshabilitarCampos();
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

                            titulo.innerHTML = '<textarea class="mostrarContenido editable" align="center" style="width:100%" id="tituloPractica' + (tablaPracticas.rows.length - 2) + '">' + practica[0] + '</textarea>';
                            borrar.innerHTML = '<button onclick="borrarPractica($(this).closest(\'tr\').index())" type="button" class="btn btn-danger btn-sm editable" style="margin-left:10px"><i class="fa-solid fa-trash"></button>';
                            celdaNo.innerHTML = tablaPracticas.rows.length - 2;
                          });
                        }
                      }

                      function borrarPractica(x) {
                        var tablaPracticas = document.getElementById("tablaPracticas");
                        tablaPracticas.deleteRow(x + 1);
                        for (var i = 1, row; row = tablaPracticas.rows[i]; i++) {
                          if (i != tablaPracticas.rows.length - 1)
                            row.cells[0].innerHTML = i;
                        }
                      }

                      async function guardarPracticas() {

                        var practicas = [];
                        var tablaPracticas = document.getElementById("tablaPracticas");
                        //alert("ok nuevo"+tablaPracticas.rows.length);
                        for (var i = 1, row; row = tablaPracticas.rows[i]; i++) {
                          if (i != tablaPracticas.rows.length - 1) {

                            var titulo = row.cells[1].getElementsByTagName("textarea")[0].value;
                            //alert(titulo);
                            var select = row.cells[2].getElementsByTagName("select")[0];
                            //alert(select);
                            var laboratorio = select.options[select.selectedIndex].innerHTML;
                            //alert("labo1");
                            if (titulo != "" && laboratorio != "&nbsp;") {
                              var practica = [titulo, laboratorio];
                              practicas.push(practica);

                            }

                          }
                        }

                        var tema = $('#selectTema').val();
                        var parametros = {
                          "accion": "guardarCampoTema",
                          "valor": practicas,
                          "grupo": document.getElementById("campoGrupo").innerHTML,
                          "campo": "Practicas",
                          "tema": tema,
                          "periodo": document.getElementById("campoPeriodo").innerHTML
                        };

                        $.ajax({
                          data: parametros,
                          url: 'conexion/consultasNoSQL.php',
                          type: 'post',
                          beforeSend: function() {
                            $("#estatusPracticas").html("Guardando..");
                          },
                          success: function(resultado) {
                            $('#estatusPracticas').html("¡Guardado!");
                            setTimeout(function() {
                              $('#estatusPracticas').html("");
                            }, 1500); // The millis to wait before executing this block
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
                    </script>
                    <div id="collapseEight" class="collapse" aria-labelledby="headingEight" data-parent="#accordion">
                      <div class="panel-body">
                        <table id="tablaPracticas" class="table table-hover">
                          <thead>
                            <tr>
                              <th class="text-center">
                                <h6>No.</h6>
                              </th>
                              <th class="text-center">
                                <h6>Título de la práctica</h6>
                              </th>
                              <th class="text-center">
                                <h6>Laboratorio</h6>
                              </th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <td colspan="3"></td>
                              <td>
                                <button onclick="agregarPractica()" align="center" type="button" class="btn btn-success btn-sm editable" style="font-size: 12px">Agregar
                                </button>
                              </td>
                            </tr>
                          </tbody>
                        </table>

                        <div class="dividerM" style="margin-bottom: 5px"></div>

                        <div class="row">
                          <div class="col-md-12" align="right" id="guardarDetallesGenerales" style="margin-bottom: 10px;">
                            <h4 id="estatusPracticas"></h4>
                            <button type="button" class="btn btn-secondary editable" onclick="guardarPracticas()">Guardar</button>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

                  <!-- fin acordeon -->

                  <!-- Nine accordion [Indicadores]-->
                  <div class="panel" id="panelIndicadores">
                    <div class="panel-heading" id="headingTen">
                      <a data-toggle="collapse" data-target="#collapseTen" aria-expanded="false" aria-controls="collapseTen">
                        <h5 class="panel-title" id="miColor5">Indicadores de alcance</h5>
                      </a>
                    </div>
                    <div id="collapseTen" class="collapse" aria-labelledby="headingTen" data-parent="#accordion">
                      <div class="panel-body">
                        <h5>Competencia alcanzada</h5>
                        <div class="mostrarContenido">
                          <p id="Indicadores"></p>
                        </div>
                        <!-- Modal -->

                        <!-- Trigger the modal with a button -->

                        <div class="button editable" data-toggle="modal" data-target="#myModal10"><a href="#responsive" class="btn btn-info editable">Editar</a> </div>

                        <!-- Modal -->
                        <div id="myModal10" class="modal fade" role="dialog">
                          <div class="modal-dialog">
                            <!-- Modal content-->
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title">Competencia alcanzada</h5>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                              </div>
                              <div class="modal-body">
                                <p><textarea style="width:100%; height:30em" id="campoIndicadores"></textarea></p>
                              </div>
                              <div class="modal-footer">
                                <h4 id="estatusIndicadores"></h4>
                                <button type="button" class="btn btn-secondary" onclick="guardarCampoTema('Indicadores')">Guardar</button>
                              </div>
                            </div>
                          </div>
                        </div>
                        <!-- Fin modal -->
                      </div>
                    </div>
                  </div>
                  <!-- fin acordeon -->

                  <!-- Ten accordion [EstrategiaEvaluacion-->
                  <div class="panel" id="panelEstrategiaEvaluacion">
                    <div class="panel-heading" id="headingNine">
                      <a data-toggle="collapse" data-target="#collapseNine" aria-expanded="false" aria-controls="collapseNine">
                        <h5 class="panel-title" id="miColor4">Estrategia de evaluación</h5>
                      </a>
                    </div>
                    <div id="collapseNine" class="collapse" aria-labelledby="headingNine" data-parent="#accordion">
                      <div class="panel-body">

                        <h5>Criterios de evaluación</h5>

                        <script type="text/javascript">
                          function actualizarValorIndicadores(x) {
                            document.getElementById("numA").value = x[0];
                            document.getElementById("numB").value = x[1];
                            document.getElementById("numC").value = x[2];
                            document.getElementById("numD").value = x[3];
                            document.getElementById("numE").value = x[4];
                            document.getElementById("numF").value = x[5];
                            sumar();
                          }

                          function sumar() {
                            var suma = 0;
                            var a = parseInt(document.getElementById("numA").value, 10);
                            var b = parseInt(document.getElementById("numB").value, 10);
                            var c = parseInt(document.getElementById("numC").value, 10);
                            var d = parseInt(document.getElementById("numD").value, 10);
                            var e = parseInt(document.getElementById("numE").value, 10);
                            var f = parseInt(document.getElementById("numF").value, 10);


                            suma = a + b + c + d + e + f;
                            var total = document.getElementById("totalIndicadores");
                            if (suma != 30) {
                              total.style.color = "red";
                            } else {
                              total.style.color = "black";
                            }

                            total.innerHTML = suma;
                          }


                          function guardadito() {
                            var a = parseInt(document.getElementById("numA").value, 10);
                            var b = parseInt(document.getElementById("numB").value, 10);
                            var c = parseInt(document.getElementById("numC").value, 10);
                            var d = parseInt(document.getElementById("numD").value, 10);
                            var e = parseInt(document.getElementById("numE").value, 10);
                            var f = parseInt(document.getElementById("numF").value, 10);
                            var suma = a + b + c + d + e + f;
                            var valor = [a, b, c, d, e, f];
                            if (suma == 30) {

                              var tema = $('#selectTema').val();
                              var parametros = {
                                "accion": "guardarCampoTema",
                                "valor": valor,
                                "grupo": document.getElementById("campoGrupo").innerHTML,
                                "campo": "ValorIndicadores",
                                "tema": tema,
                                "periodo": document.getElementById("campoPeriodo").innerHTML
                              };

                              $.ajax({
                                data: parametros,
                                url: 'conexion/consultasNoSQL.php',
                                type: 'post',
                                beforeSend: function() {
                                  $("#estatusValorIndicadores").html("Guardando..");
                                },
                                success: function(resultado) {
                                  $('#estatusValorIndicadores').html("¡Guardado!");
                                  setTimeout(function() {
                                    $('#estatusValorIndicadores').html("");
                                  }, 1500); // The millis to wait before executing this block
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

                          }
                        </script>

                        <table class="table table-hover text-justify" style="width: 100%;">
                          <thead>
                            <tr>
                              <th class="text-center">
                                <h6>Indicador</h6>
                              </th>
                              <th class="text-center">
                                <h6>Descripción del indicador</h6>
                              </th>
                              <th class="text-center">
                                <h6>Valor del indicador</h6>
                              </th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <td class="text-center"><strong>A</strong></td>
                              <td class="text-justify">Se adapta a situaciones y contextos complejos
                              <td align="center">
                                <div style="width:60%;"><strong><input readonly class="form-control text-center" value="0" type="number" min="0" id="numA" onchange="sumar()"></strong></div>
                              </td>
                            </tr>
                            <tr>
                              <td class="text-center"><strong>B</strong></td>
                              <td>Hace aportaciones a las actividades académicas desarrolladas</td>
                              <td align="center">
                                <div style="width:60%;"><strong><input readonly class="form-control text-center" value="0" type="number" min="0" id="numB" onchange="sumar()"></strong></div>
                              </td>
                            </tr>
                            <tr>
                              <td class="text-center"><strong>C</strong></td>
                              <td>Propone y/o explica soluciones o procedimientos no vistos en clase (creatividad)</td>
                              <td align="center">
                                <div style="width:60%;"><strong><input readonly class="form-control text-center" value="0" type="number" min="0" id="numC" onchange="sumar()"></strong></div>
                              </td>
                            </tr>
                            <tr>
                              <td class="text-center"><strong>D</strong></td>
                              <td>Introduce recursos y experiencias que promueven un pensamiento crítico</td>
                              <td align="center">
                                <div style="width:60%;"><strong><input readonly class="form-control text-center" value="0" type="number" min="0" id="numD" onchange="sumar()"></strong></div>
                              </td>
                            </tr>
                            <tr>
                              <td class="text-center"><strong>E</strong></td>
                              <td>Incorpora conocimientos y actividades interdisciplinarias en su aprendizaje</td>
                              <td align="center">
                                <div style="width:60%;"><strong><input readonly class="form-control text-center" value="0" type="number" min="0" id="numE" onchange="sumar()"></strong></div>
                              </td>
                            </tr>
                            <tr>
                              <td class="text-center"><strong>F</strong></td>
                              <td>Realiza su trabajo de manera autónoma y autorregulada</td>
                              <td align="center">
                                <div style="width:60%;"><strong><input readonly class="form-control text-center" value="0" type="number" min="0" id="numF" onchange="sumar()"></strong></div>
                              </td>
                            </tr>
                            <tr>
                              <td></td>
                              <td></td>
                              <td align="center">TOTAL: <strong>
                                  <p id="totalIndicadores">0</p>
                                </strong></td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                  <!-- fin acordeon -->

                  <!-- Eleven accordion [Matriz]-->
                  <div class="panel" id="panelMatriz">
                    <div class="panel-heading" id="headingEleven">
                      <a data-toggle="collapse" data-target="#collapseEleven" aria-expanded="false" aria-controls="collapseEleven">
                        <h5 class="panel-title" id="miColor6">Matríz de evaluación</h5>
                      </a>
                    </div>
                    <div id="collapseEleven" class="collapse" aria-labelledby="headingEleven" data-parent="#accordion">
                      <div class="panel-body">

                        <!-- Contenido                  -->

                        <!--row -->
                        <div class="row">

                        </div><!--Fin row -->
                        <!--row -->
                        <div class="row">
                          <div class="col-md-3 azul" id="columna">
                            <h4> <span class="color"></span></h4>
                          </div>
                        </div><!--Fin row -->

                        <script type="text/javascript">
                          var ban = true;

                          function actualizarEvidencias(matriz) {
                            var tabla = document.getElementById("matrizEvaluacion");

                            var l = tabla.rows.length;

                            for (var i = 2; i < l - 1; i++) {
                              tabla.deleteRow(2);

                            }
                            var total = document.getElementById("totalPerc");
                            total.style.color = "red";
                            total.innerHTML = 0;
                            document.getElementById("totalA").innerHTML = 0;
                            document.getElementById("totalB").innerHTML = 0;
                            document.getElementById("totalC").innerHTML = 0;
                            document.getElementById("totalD").innerHTML = 0;
                            document.getElementById("totalE").innerHTML = 0;
                            document.getElementById("totalF").innerHTML = 0;

                            document.getElementById("numA").value = 0;
                            document.getElementById("numB").value = 0;
                            document.getElementById("numC").value = 0;
                            document.getElementById("numD").value = 0;
                            document.getElementById("numE").value = 0;
                            document.getElementById("numF").value = 0;

                            sumar();

                            if (matriz != null) {
                              continstru = 2;
                              matriz.forEach(fila => {
                                agregarEvidencia(fila);
                              });
                            }

                            //if (matriz != null) 
                            //continstru = 2;
                            //matriz.forEach(fila => {
                            //ban=true;    
                            //agregarEvidencia(fila);
                            //});
                            //ban=false;

                          }


                          function agregarEvidencia(filaEvidencia) {
                            //alert(ban);
                            var matriz = document.getElementById("matrizEvaluacion");
                            var continstru = 0;
                            var fila = matriz.insertRow(matriz.rows.length - 1);

                            var evidencia = fila.insertCell(0);
                            var perc = fila.insertCell(1);
                            var a = fila.insertCell();
                            var b = fila.insertCell();
                            var c = fila.insertCell();
                            var d = fila.insertCell();
                            var e = fila.insertCell();
                            var f = fila.insertCell();
                            var instrumento = fila.insertCell();
                            var mp = fila.insertCell();
                            var mc = fila.insertCell();
                            var ma = fila.insertCell();
                            var borrar = fila.insertCell();

                            continstru = matriz.rows.length - 2;
                            var cadeextra = "";
                            var botonborrarevi = "";
                            if (typeof filaEvidencia != 'undefined') {
                              if (buscarEvidenciaExiste(filaEvidencia[12])) {
                                cadeextra = "disabled";
                                botonborrarevi = '<button type="button" class="btn btn-danger btn-sm editable"  onclick="borrainstrumentoevi(\'' + filaEvidencia[12] + '\');"><i class="fa-solid fa-trash"></i></button>';
                              }
                            }

                            //alert(cadeextra);
                            var catalogoEvidencias = "";
                            buscarCatalogo("evidencia", "evidencias", (typeof filaEvidencia != "undefined") ? filaEvidencia[0] : "", function(res) {
                              evidencia.innerHTML = '<select ' + cadeextra + ' class="form-control editable" style="width: 90%" id="selectEvidencia" name="evidencia"><option>&nbsp;</option>' + res + '</select>';
                              habilitarDeshabilitarCampos();
                            });

                            //alert(buscarEvidenciaExiste(filaEvidencia[12]));

                            buscarCatalogo("instrumento", "instrumentos", (typeof filaEvidencia != "undefined") ? filaEvidencia[8] : "", function(res) {
                              //alert(res);
                              instrumento.innerHTML = '<select ' + cadeextra + ' class="form-control editable" style="width: 90%' + cadeextra + '" id="selectInstrumento" onchange="cambiainstruH()" name="instrumento"><option>&nbsp;</option>' + res + '</select>';

                              //alert(filaEvidencia);
                              if (typeof filaEvidencia == 'undefined') {
                                instrumento.innerHTML = instrumento.innerHTML + '<input class="editable" value="" type="text" style="display:none"/>';
                                //alert("ok");
                              }

                              if (typeof filaEvidencia[8] != 'undefined') {


                                instrumento.innerHTML = instrumento.innerHTML + '<button  type="button" class="ediInstruH btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModal" onclick="abreinstrumento(' + continstru + ');"><i class="fa-solid fa-pen-to-square"></i></button>' + botonborrarevi + '<input value="' + filaEvidencia[12] + '" style="display:none"/>';

                                //alert("kkkkk");
                              }

                              habilitarDeshabilitarCampos();
                            });


                            //ban=false;

                            perc.innerHTML = '<strong><input type="text" ' + cadeextra + ' class="border editable" size="3" style="text-align: center;" onkeypress="return soloLetras(event)" onchange="sumarPerc()" value=' + ((typeof filaEvidencia != "undefined") ? filaEvidencia[1] : "") + '></strong>';
                            a.innerHTML = '<strong><input ' + cadeextra + ' type="text"class="border editable" size="1" style="text-align: center;" onkeypress="return soloLetras(event)" onchange="sumarPerc()" value=' + ((typeof filaEvidencia != "undefined") ? filaEvidencia[2] : "") + '></strong>';
                            b.innerHTML = '<strong><input ' + cadeextra + ' type="text"class="border editable" size="1" style="text-align: center;" onkeypress="return soloLetras(event)" onchange="sumarPerc()" value=' + ((typeof filaEvidencia != "undefined") ? filaEvidencia[3] : "") + '></strong>';
                            c.innerHTML = '<strong><input ' + cadeextra + ' type="text"class="border editable" size="1" style="text-align: center;" onkeypress="return soloLetras(event)" onchange="sumarPerc()" value=' + ((typeof filaEvidencia != "undefined") ? filaEvidencia[4] : "") + '></strong>';
                            d.innerHTML = '<strong><input ' + cadeextra + ' type="text"class="border editable" size="1" style="text-align: center;" onkeypress="return soloLetras(event)" onchange="sumarPerc()" value=' + ((typeof filaEvidencia != "undefined") ? filaEvidencia[5] : "") + '></strong>';
                            e.innerHTML = '<strong><input ' + cadeextra + ' type="text"class="border editable" size="1" style="text-align: center;" onkeypress="return soloLetras(event)" onchange="sumarPerc()" value=' + ((typeof filaEvidencia != "undefined") ? filaEvidencia[6] : "") + '></strong>';
                            f.innerHTML = '<strong><input ' + cadeextra + ' type="text"class="border editable" size="1" style="text-align: center;" onkeypress="return soloLetras(event)" onchange="sumarPerc()" value=' + ((typeof filaEvidencia != "undefined") ? filaEvidencia[7] : "") + '></strong>';
                            mp.innerHTML = '<div class="custom-control custom-checkbox"><input ' + cadeextra + '  ' + ((typeof filaEvidencia != "undefined") ? ((filaEvidencia[9] == "1") ? "checked" : "") : "") + ' type="checkbox" class="form-check-input editable" id="defaultUnchecked"></div>';
                            mc.innerHTML = '<div class="custom-control custom-checkbox"><input ' + cadeextra + '  ' + ((typeof filaEvidencia != "undefined") ? ((filaEvidencia[10] == "1") ? "checked" : "") : "") + ' type="checkbox" class="form-check-input editable" id="defaultUnchecked"></div>';
                            ma.innerHTML = '<div class="custom-control custom-checkbox"><input ' + cadeextra + '  ' + ((typeof filaEvidencia != "undefined") ? ((filaEvidencia[11] == "1") ? "checked" : "") : "") + ' type="checkbox" class="form-check-input editable" id="defaultUnchecked"></div>';
                            borrar.innerHTML = '<button ' + cadeextra + ' onclick="borrarEvidencia($(this).closest(\'tr\').index())" type="button" class="btn btn-danger btn-sm editable" style="margin-left:10px"><i class="fa-solid fa-trash"></i></button>';
                            sumarPerc();

                            //alert("ok");


                          }
                          //siguiente función oculta boton de editar instrumento cuando se elige otro instrumento
                          function cambiainstruH() {
                            $(".ediInstruH").hide();
                            alertify.success("<h3>Guarde los cambios para poder editar los instrumentos</h3>", 5);
                            //document.getElementsByClassName("ediInstruH").style.display= 'none';
                            //alert("ok");
                          }

                          $("#selectInstrumento").change(function() {
                            // alert("ok");
                          });

                          var matrizborrado = [];

                          function borrarEvidencia(x) {

                            var tabla = document.getElementById("matrizEvaluacion");

                            const row = tabla.rows[x + 2];

                            var a = row.cells[8].getElementsByTagName("input")[0].value;
                            matrizborrado.push(a);

                            //alert(matrizborrado.length);
                            //alert(a);

                            tabla.deleteRow(x + 2);
                            sumarPerc();
                          }

                          function guardarEvidencia() {

                            //var materia=$("#campoMateria")[0].innerHTML;
                            //alert(cual+evidencia+instrumento);
                            var periodo = document.getElementById("campoPeriodo").innerHTML;
                            var grupo = document.getElementById("campoGrupo").innerHTML;
                            var tem = document.getElementById("selectTema").value;
                            //alert("ok");
                            //matrizborrado.push("j");
                            for (var i = 0; i < matrizborrado.length; i++) {
                              var mb = matrizborrado[i];
                              //mb="T1qd7xXKevListEnsa";
                              //alert(periodo+grupo+tem+mb);
                              var parametros = {
                                "accion": "borrarInstrumentoHec",
                                "grupo": grupo,
                                "periodo": periodo,
                                "tema": tem,
                                "instru": mb
                              };
                              //alert(mb);
                              $.post("conexion/consultasNoSQL.php", parametros, function(res) {
                                //alert(res);
                              });

                            }

                            var matriz = [];
                            var tabla = document.getElementById("matrizEvaluacion");
                            for (let i = 2; i < tabla.rows.length - 1; i++) {
                              const row = tabla.rows[i];
                              var r = [];
                              var select = row.cells[0].getElementsByTagName("select")[0];

                              var val = select.options[select.selectedIndex].innerHTML;
                              var evi = val;
                              r.push(val);
                              val = row.cells[1].getElementsByTagName("input")[0].value;
                              r.push((val != "") ? parseInt(val) : "");
                              val = row.cells[2].getElementsByTagName("input")[0].value;
                              r.push((val != "") ? parseInt(val) : "");
                              val = row.cells[3].getElementsByTagName("input")[0].value;
                              r.push((val != "") ? parseInt(val) : "");
                              val = row.cells[4].getElementsByTagName("input")[0].value;
                              r.push((val != "") ? parseInt(val) : "");
                              val = row.cells[5].getElementsByTagName("input")[0].value;
                              r.push((val != "") ? parseInt(val) : "");
                              val = row.cells[6].getElementsByTagName("input")[0].value;
                              r.push((val != "") ? parseInt(val) : "");
                              val = row.cells[7].getElementsByTagName("input")[0].value;
                              r.push((val != "") ? parseInt(val) : "");
                              select = row.cells[8].getElementsByTagName("select")[0];
                              val = select.options[select.selectedIndex].innerHTML;
                              var instru = val;
                              r.push(val);
                              val = row.cells[9].getElementsByTagName("input")[0].checked;
                              r.push((val) ? 1 : 0);
                              val = row.cells[10].getElementsByTagName("input")[0].checked;
                              r.push((val) ? 1 : 0);
                              val = row.cells[11].getElementsByTagName("input")[0].checked;
                              r.push((val) ? 1 : 0);


                              select = row.cells[8].getElementsByTagName("input")[0].value;
                              //alert("okok"+select);
                              var result = '';
                              if (select == "") {
                                var characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
                                var charactersLength = characters.length;
                                for (var j = 0; j < 10; j++) {
                                  result += characters.charAt(Math.floor(Math.random() * charactersLength));
                                }

                                result = result + instru.substring(0, 4) + evi.substring(0, 4);
                              } else {
                                result = select;
                              }
                              r.push(result);
                              matriz.push(r);
                            }
                            //alert("ok");
                            guardarCampoTemaValor("MatrizEvaluacion", matriz);

                            var totales = [];

                            totales.push(document.getElementById("totalPerc").innerHTML);
                            totales.push(document.getElementById("totalA").innerHTML);
                            totales.push(document.getElementById("totalB").innerHTML);
                            totales.push(document.getElementById("totalC").innerHTML);
                            totales.push(document.getElementById("totalD").innerHTML);
                            totales.push(document.getElementById("totalE").innerHTML);
                            totales.push(document.getElementById("totalF").innerHTML);


                            guardarCampoTemaValor("ValorIndicadores", totales);
                            actualizaCamposTema(document.getElementById("selectTema").value);
                            //mostrarValor(document.getElementById("selectTema").value);

                          }

                          function totalIndicadores(m) {
                            var ind = [0, 0, 0, 0, 0, 0];
                            m.forEach(row => {
                              ind[0] += row[1];
                              ind[1] += row[2];
                              ind[2] += row[3];
                              ind[3] += row[4];
                              ind[4] += row[5];
                              ind[5] += row[6];
                            });
                            return ind;
                          }

                          function sumarPerc() {
                            var suma = 0;
                            var m = obtenerMatriz();
                            var totalInd = totalIndicadores(m);


                            var tabla = document.getElementById("matrizEvaluacion");
                            for (let i = 2; i < tabla.rows.length - 1; i++) {
                              var rowCells = tabla.rows[i];
                              const rowNumb = m[i - 2];
                              suma += rowNumb[0];
                              if (sumaIndicadores(rowNumb)) {
                                rowCells.cells[1].getElementsByTagName("input")[0].style.color = "black";
                              } else {
                                rowCells.cells[1].getElementsByTagName("input")[0].style.color = "red";
                              }

                            }


                            var total = document.getElementById("totalPerc");
                            if (suma != 100) {
                              total.style.color = "red";
                            } else {
                              total.style.color = "black";
                            }

                            total.innerHTML = suma;

                            document.getElementById("totalA").innerHTML = totalInd[0];
                            document.getElementById("totalB").innerHTML = totalInd[1];
                            document.getElementById("totalC").innerHTML = totalInd[2];
                            document.getElementById("totalD").innerHTML = totalInd[3];
                            document.getElementById("totalE").innerHTML = totalInd[4];
                            document.getElementById("totalF").innerHTML = totalInd[5];

                            document.getElementById("numA").value = totalInd[0];
                            document.getElementById("numB").value = totalInd[1];
                            document.getElementById("numC").value = totalInd[2];
                            document.getElementById("numD").value = totalInd[3];
                            document.getElementById("numE").value = totalInd[4];
                            document.getElementById("numF").value = totalInd[5];
                            sumar();

                            return suma;
                          }

                          function sumaIndicadores(row) {
                            var suma = 0;
                            var perc = row[0] * .30;
                            for (let i = 1; i < row.length; i++) {
                              suma += row[i];
                            }
                            if (suma == perc) return true;
                            else return false;

                          }

                          function obtenerMatriz() {
                            var m = [];
                            var matriz = document.getElementById("matrizEvaluacion");
                            for (let i = 2; i < matriz.rows.length - 1; i++) {
                              const row = matriz.rows[i];
                              var r = [];
                              var val = row.cells[1].getElementsByTagName("input")[0].value;
                              r.push((val != "") ? parseInt(val) : 0);
                              val = row.cells[2].getElementsByTagName("input")[0].value;
                              r.push((val != "") ? parseInt(val) : 0);
                              val = row.cells[3].getElementsByTagName("input")[0].value;
                              r.push((val != "") ? parseInt(val) : 0);
                              val = row.cells[4].getElementsByTagName("input")[0].value;
                              r.push((val != "") ? parseInt(val) : 0);
                              val = row.cells[5].getElementsByTagName("input")[0].value;
                              r.push((val != "") ? parseInt(val) : 0);
                              val = row.cells[6].getElementsByTagName("input")[0].value;
                              r.push((val != "") ? parseInt(val) : 0);
                              val = row.cells[7].getElementsByTagName("input")[0].value;
                              r.push((val != "") ? parseInt(val) : 0);
                              m.push(r);
                            }
                            return m;
                          }

                          function soloLetras(e) {
                            key = e.keyCode || e.which;
                            tecla = String.fromCharCode(key).toLowerCase();
                            letras = " 0123456789";
                            especiales = "8-37-39-46";

                            tecla_especial = false
                            for (var i in especiales) {
                              if (key == especiales[i]) {
                                tecla_especial = true;
                                break;
                              }
                            }

                            if (letras.indexOf(tecla) == -1 && !tecla_especial) {
                              return false;
                            }
                          }
                        </script>

                        <div style="overflow-x:auto;">
                          <table id="matrizEvaluacion" class="table table-hover text-justify" style="width: 100%;">
                            <thead>
                              <tr>
                                <td colspan="2" class="text-center">
                                </td>
                                <td colspan="6" class="text-center">
                                  <strong>
                                    <h6>Indicador de alcance</h6>
                                  </strong>
                                </td>
                                <td colspan="4" class="text-center">
                                  <strong>
                                    <h6>Método de evaluación</h6>
                                  </strong>
                                </td>
                              </tr>
                              <tr>
                                <th class="text-center"><strong> Evidencia del aprendizaje </strong></th>
                                <th> % </th>
                                <th> A </th>
                                <th> B </th>
                                <th> C </th>
                                <th> D </th>
                                <th> E </th>
                                <th> F </th>
                                <th>Instrumento</th>
                                <th> P </th>
                                <th> C </th>
                                <th> A </th>
                                <td class="text-center" align="center">
                                  <button onclick="agregarEvidencia()" align="center" type="button" class="btn btn-success btn-sm editable" style="font-size: 12px">
                                    Agregar
                                  </button>
                                </td>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <td align="right">Total</td>
                                <td><strong>
                                    <p id="totalPerc">0</p>
                                  </strong></td>
                                <td id="totalA">0</td>
                                <td id="totalB">0</td>
                                <td id="totalC">0</td>
                                <td id="totalD">0</td>
                                <td id="totalE">0</td>
                                <td id="totalF">0</td>
                                <td> </td>
                                <td> </td>
                                <td> </td>
                                <td> </td>
                              </tr>
                            </tbody>
                          </table>
                        </div>
                        <h6>Si el porcentaje de cada evidencia aparece en rojo la suma de los indicadores no es igual al 30% del porcentaje de esa evidencia</h6>
                        <h6>La suma total de porcentaje debe ser igual a 100, mientras no se cumpla el número se marcará en rojo</h6>
                        <div class="dividerM" style="margin-bottom: 5px"></div>

                        <div class="row">
                          <div class="col-md-12" align="right" id="guardarDetallesGenerales" style="margin-bottom: 10px;">
                            <h4 id="estatusMatrizEvaluacion"></h4>
                            <button type="button" class="btn btn-secondary editable" onclick="guardarEvidencia()">Guardar</button>
                          </div>
                        </div>
                        <!--Fin contenido -->
                      </div>
                    </div>
                  </div>
                  <!-- fin acordeon -->

                  <!-- Twelve accordion [Calendarización]-->
                  <div class="panel" id="panelCalendarizacion">
                    <div class="panel-heading" id="headingTwelve">
                      <a data-toggle="collapse" data-target="#collapseTwelve" aria-expanded="false" aria-controls="collapseTwelve">
                        <h5 class="panel-title" id="miColor7">Calendarización de evaluación en semanas</h5>
                      </a>
                    </div>
                    <div id="collapseTwelve" class="collapse" aria-labelledby="headingTwelve" data-parent="#accordion">
                      <div class="panel-body">

                        <script type="text/javascript">
                          /*function guardarCalendarizacion(){
                            var tabla = document.getElementById("tablaFechas");
                            var fechas = [];
                            for (let i = 1; i < tabla.rows.length; i++) {
                              const row = tabla.rows[i];
                              var grupo = row.cells[0].getElementsByTagName("h4")[0].innerHTML;
                              fechas.push(grupo);

                              var inicio = row.cells[1].getElementsByTagName("input")[0].value;
                              inicio = (inicio!="") ? convertirFecha("/",inicio):"";
                              fechas.push(inicio);

                              var fin = row.cells[2].getElementsByTagName("input")[0].value;
                              fin = (fin!="") ? convertirFecha("/",fin):"";
                              fechas.push(fin);
                              //row.cells[1].getElementsByTagName("input")[0].value = "2020-11-02";
                            }

                          
                            var semanas = [];
                            for (let i = 1; i < 19; i++) {
                              semanas.push(document.getElementById("sem"+i).value);
                            }

                            guardarCampoTemaValor("Fechas",fechas);
                            guardarCampoTemaValor("Semanas",semanas);

                          }
                          */
                          function guardarCalendarizacion() {
                            var tabla = document.getElementById("tablaFechas");
                            var fechas = [];
                            var fechasT = [];
                            for (let i = 1; i < tabla.rows.length; i++) {
                              //for (let i = 1; i < 2; i++) {
                              const row = tabla.rows[i];
                              var grupo = row.cells[0].getElementsByTagName("h3")[0].innerHTML;
                              //grupo="4F54";
                              fechas.push(grupo);

                              var inicio = row.cells[1].getElementsByTagName("input")[0].value;
                              inicio = (inicio != "") ? convertirFecha("/", inicio) : "";
                              fechas.push(inicio);

                              var fin = row.cells[2].getElementsByTagName("input")[0].value;
                              fin = (fin != "") ? convertirFecha("/", fin) : "";
                              fechas.push(fin);

                              //row.cells[1].getElementsByTagName("input")[0].value = "2020-11-02";
                            }


                            var semanas = [];
                            for (let i = 1; i < 19; i++) {
                              semanas.push(document.getElementById("sem" + i).value);
                            }
                            var gruph = $("#campoGrupo").html();
                            //gruph="4F54";
                            //fechasT.push({gruph:fechas});
                            guardarCampoTemaValor("Fechas." + gruph, fechas);
                            guardarCampoTemaValor("Semanas." + gruph, semanas);

                          }




                          /*
                          function actualizaFechas(fechas,semanas){
                            if(typeof fechas != "undefined"){
                              var tablaFechas = document.getElementById("tablaFechas");
                              for (let i = 1; i < tablaFechas.rows.length; i++) {
                                const row = tablaFechas.rows[i];
                                row.cells[0].getElementsByTagName("h4")[0].innerHTML = fechas[0];
                                row.cells[1].getElementsByTagName("input")[0].value = convertirFecha("-",fechas[1]);
                                row.cells[2].getElementsByTagName("input")[0].value = convertirFecha("-",fechas[2]);
                              }

                              for (let i = 0; i < 18; i++) {
                                document.getElementById("sem"+(i+1)).value = semanas[i];                       
                              }
                            }else{
                              var tablaFechas = document.getElementById("tablaFechas");
                              for (let i = 1; i < tablaFechas.rows.length; i++) {
                                const row = tablaFechas.rows[i];
                                row.cells[0].getElementsByTagName("h4")[0].innerHTML = "";
                                row.cells[1].getElementsByTagName("input")[0].value = "";
                                row.cells[2].getElementsByTagName("input")[0].value = "";
                              }

                              for (let i = 0; i < 18; i++) {
                                document.getElementById("sem"+(i+1)).value = "";                       
                              }
                            }
                          }




                          */


                          function actualizaFechas(fechas1, semanas1) {
                            //alert(fechas1);

                            if (typeof fechas1 != "undefined") {
                              let fe = Object.values(fechas1); //rescata valores de objeto
                              //alert(fe);
                              let fek = Object.keys(fechas1); //rescata keys de objeto
                              let fechass = [];
                              //recorre array para pasar los valores a un nuevo array
                              for (var i = 0; i < fe.length; i++) {
                                let aux = [];
                                let cont = 0;
                                aux.push(fek[i]); //clave asig. instrumentacion 2F22,2F23
                                for (var j = 0; j < fe[i].length; j++) {
                                  aux.push(fe[i][j]);
                                  cont++;
                                  if (cont == 3) {
                                    cont = 0;
                                    fechass.push(aux);
                                    let auxx = [];
                                    aux = auxx;
                                    aux.push(fek[i]);
                                    //alert("ok");
                                  }
                                }
                              } //fin pasar valores a nuevo array
                              if (fechass.length > 0) {
                                $("#otrosdatos").hide();
                                var gruph = $("#campoGrupo").html();
                                //alert(gruph);
                                var grupht = gruph.split(",");

                                //gruph="4F53";
                                //alert(grupht[1]);
                                var tablaFechass = $("#cuerpoTablafechas");
                                var tablaFechassNM = $("#ctnm");
                                //$("#tablaFechasNM").hide();
                                tablaFechass.html("");
                                tablaFechassNM.html("");
                                var cont = 0;
                                //alert(fechass.length);
                                for (let jj = 0; jj < fechass.length; jj++) {
                                  let fi = fechass[jj][2].split("/")[2] + "-" + fechass[jj][2].split("/")[1] + "-" + fechass[jj][2].split("/")[0];
                                  let fff = fechass[jj][3].split("/")[2] + "-" + fechass[jj][3].split("/")[1] + "-" + fechass[jj][3].split("/")[0];
                                  let ban = false;
                                  //alert("ok");
                                  //alert(grupht.length);
                                  for (let jjjj = 0; jjjj < grupht.length; jjjj++) {
                                    //alert("-"+fechass[jj][1]+"- -"+grupht[jjjj].trim()+"-"+" "+fechass[jj][1]==grupht[jjjj].trim());
                                    if (fechass[jj][1] == grupht[jjjj]) {
                                      ban = true;
                                      //alert("ok");
                                    }
                                    //alert(ban);
                                  }
                                  if (ban) { //fechass[jj][0]==gruph){//mis grupos
                                    //alert(fff);
                                    tablaFechass.append('<tr><td><h3 id="calendarClaveGrupo">' + fechass[jj][1] + '</h3></td><td><input class="editable" id="inicio" type="date" value="' + fi + '"></td><td><input class="editable" id="fin" type="date" value="' + fff + '"></td><td></td></tr>');
                                    cont++;
                                  } else { //Grupos de alguien mas                        
                                    //tablaFechass.append('<tr><td>hola<h3 id="calendarClaveGrupo">'+grupht[0]+'</h3></td><td><input id="inicio" type="date" value="3-3-2022"></td><td><input id="fin" type="date" value="3-3-2022"></td><td></td></tr>');
                                    //alert(fi);
                                    if (fi == undefined || fi == "undefined-undefined-") {
                                      fi = "No se ha definido";
                                    }
                                    if (fff == undefined || fff == "undefined-undefined-") {
                                      fff = "No se ha definido";
                                    }
                                    $("#otrosdatos").show();
                                    let yy = '<tr><td><h3>' + fechass[jj][1] + '</h3></td><td><h3>' + fi + '</h3></td><td><h3>' + fff + '</h3></td><td></td></tr>';
                                    tablaFechassNM.append(yy);
                                    //alert("ok2");
                                  }
                                }

                                if (cont == 0) {
                                  //alert(grupht.length);

                                  for (let jjjj = 0; jjjj < grupht.length; jjjj++) {
                                    tablaFechass.append('<tr><td><h3 id="calendarClaveGrupo">' + grupht[jjjj] + '</h3></td><td><input id="inicio" class="editable" type="date" value="3/3/2022"></td><td><input id="fin" class="editable" type="date" value="3/3/2022"></td><td></td></tr>');
                                    //alert("oksi");
                                  }
                                  //$("#cuerpoTablafechas").show();
                                }
                                // empezar con lo de las semanas
                                //recuperando los contenidos 
                                let se = Object.values(semanas1);
                                //recuperando las claves de los contenidos
                                let sek = Object.keys(semanas1);
                                let semanas = [];
                                for (var i = 0; i < fe.length; i++) {
                                  let aux = [];
                                  let cont = 0;

                                  aux.push(sek[i]); //la instrumentación
                                  //alert(se);
                                  for (var j = 0; j < se[i].length; j++) {

                                    aux.push(se[i][j]);
                                    cont++;
                                    //alert(fe[i][j]);
                                    if (cont == 18) {
                                      cont = 0;
                                      semanas.push(aux);
                                      let auxx = [];
                                      aux = auxx;

                                    }
                                  }
                                }
                                //alert(semanas.length);
                                //alert(semanas[0].length);
                                //alert(semanas[1].length);
                                $("#otrassemanas").html("");

                                let temsem = "";
                                for (let jj = 0; jj < semanas.length; jj++) {
                                  //alert(semanas[jj][0]);
                                  if (semanas[jj][0] != gruph) {
                                    temsem = '<tr><td><button onclick="copiarsemanas(this)" type="button" class="btn btn-default btn-xl editable"><i class="fa-solid fa-arrow-up"></i></button>' + semanas[jj][0] + '</td><td>Tiempo planeado</td>';
                                  }
                                  for (let jjj = 1; jjj < 19; jjj++) {
                                    if (semanas[jj][0] == gruph) { //mis grupos
                                      //alert(semanas[jj][jjj]);
                                      $("#sem" + (jjj)).val(semanas[jj][jjj]);
                                    } else { //otros grupos
                                      //alert("okk");
                                      temsem = temsem + '<td><textarea class="editable" disabled style="font-size:12px;" cols=3 rows="3">' + semanas[jj][jjj] + '</textarea></td>';
                                      //alert("okkk");
                                    }
                                  }
                                  //alert(semanas[jj][0]+" "+gruph);
                                  if (semanas[jj][0] != gruph) {

                                    temsem = temsem + '<td><button onclick="copiarsemanas(this)" type="button" class="btn btn-default btn-sm editable">Copiar</button></td></tr>';
                                    //alert(temsem);
                                    $("#otrassemanas").append(temsem);
                                    $("#otrosdatos").show();
                                  }
                                }





                              }


                            } else { //si se eligió otro tema y no se tiene nada

                              $("#otrosdatos").hide();
                              $("#cuerpoTablafechas").html("");
                              let tablaFechass = $("#cuerpoTablafechas");
                              //alert("okhector");
                              $("#tablaFechassNM").html("");

                              <?php
                              $porciones = explode(",", $_GET["grupo"]);
                              //$sines=array();
                              $textomio = '';
                              for ($ij = 0; $ij < count($porciones); $ij++) {
                                $sines = str_replace(" ", "", $porciones[$ij]);
                                $textomio = $textomio . '<tr><td><h3 id="calendarClaveGrupo">' . $sines . '</h3></td><td><input class="editable" id="inicio" type="date"></td><td><input class="editable" id="fin" type="date"></td><td></td></tr>';
                              }
                              ?>
                              //let texx= ;
                              tablaFechass.append('<?php echo $textomio; ?>');

                              //EMPIEZA LO DE LAS SEMANAS
                              for (let iij = 1; iij < 19; iij++) {
                                $("#sem" + (iij)).val("");
                              }

                            }
                          }

                          function copiarsemanas(boton) {
                            alertify.confirm("<h3>¿Deseas pasar estos datos a tu calendarización?</h3>Después de pasar los datos, debes hacer clic en guardar", function() {

                              let inputs = boton.parentNode.parentNode.getElementsByTagName("textarea");
                              //alertify.success("-"+inputs.length+"-");

                              for (var i = 0; i < 18; i++) {
                                document.getElementById("sem" + (i + 1)).value = inputs[i].value;
                              }

                              alertify.success("<h3>Se copió con éxito, si deseas conservar estos cambios en tu calendarización, debes hacer clic en guardar</h3>", 7);
                            });
                          }






                          function convertirFecha(separador, fecha) {
                            var convertida = "";
                            if (fecha != "")
                              if (separador == "/") {
                                convertida = fecha.split("-");
                                convertida = convertida[2] + "/" + convertida[1] + "/" + convertida[0];
                              } else {
                                convertida = fecha.split("/");
                                convertida = convertida[2] + "-" + convertida[1] + "-" + convertida[0];
                              }
                            return convertida;
                          }
                        </script>



                        <div style="overflow-x:auto;">
                          <table id="tablaFechas" class="table table-hover" style="width: 100%">
                            <thead>
                              <tr>
                                <th class="text-center">
                                  <h6>Grupo</h6>
                                </th>
                                <th class="text-center">
                                  <h6>Fecha de inicio programado</h6>
                                </th>
                                <th class="text-center">
                                  <h6>Fecha de Término</h6>
                                </th>
                              </tr>
                            </thead>
                            <tbody id="cuerpoTablafechas">
                              <?php
                              $porciones = explode(",", $_GET["grupo"]);

                              for ($i = 0; $i < count($porciones); $i++) {
                                // code...
                                $sines = str_replace(" ", "", $porciones[$i]); //quita espacios

                              ?>
                                <tr>

                                  <td>
                                    <h3 id="calendarClaveGrupo"><?php echo $sines; ?></h3>
                                  </td>
                                  <td><input id="inicio" type="date"></td>
                                  <td><input id="fin" type="date"></td>
                                  <td></td>
                                </tr>
                              <?php } ?>
                            </tbody>
                          </table>
                        </div>




                        <div class="dividerM" style="margin-bottom: 15px"></div>

                        <div style="overflow-x:auto;">
                          <table class="table table-hover" style="width: 100%;">
                            <thead>
                              <tr>
                                <th>Semana</th>
                                <th class="text-center">1</th>
                                <th class="text-center">2</th>
                                <th class="text-center">3</th>
                                <th class="text-center">4</th>
                                <th class="text-center">5</th>
                                <th class="text-center">6</th>
                                <th class="text-center">7</th>
                                <th class="text-center">8</th>
                                <th class="text-center">9</th>
                                <th class="text-center">10</th>
                                <th class="text-center">11</th>
                                <th class="text-center">12</th>
                                <th class="text-center">13</th>
                                <th class="text-center">14</th>
                                <th class="text-center">15</th>
                                <th class="text-center">16</th>
                                <th class="text-center">17</th>
                                <th class="text-center">18</th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <th>Tiempo planeado</th>
                                <td><strong><textarea class="editable" style="font-size:12px;" name="" id="sem1" cols=3 rows="3"></textarea></strong></td>
                                <td><strong><textarea class="editable" style="font-size:12px;" name="" id="sem2" cols=3 rows="3"></textarea></strong></td>
                                <td><strong><textarea class="editable" style="font-size:12px;" name="" id="sem3" cols=3 rows="3"></textarea></strong></td>
                                <td><strong><textarea class="editable" style="font-size:12px;" name="" id="sem4" cols=3 rows="3"></textarea></strong></td>
                                <td><strong><textarea class="editable" style="font-size:12px;" name="" id="sem5" cols=3 rows="3"></textarea></strong></td>
                                <td><strong><textarea class="editable" style="font-size:12px;" name="" id="sem6" cols=3 rows="3"></textarea></strong></td>
                                <td><strong><textarea class="editable" style="font-size:12px;" name="" id="sem7" cols=3 rows="3"></textarea></strong></td>
                                <td><strong><textarea class="editable" style="font-size:12px;" name="" id="sem8" cols=3 rows="3"></textarea></strong></td>
                                <td><strong><textarea class="editable" style="font-size:12px;" name="" id="sem9" cols=3 rows="3"></textarea></strong></td>
                                <td><strong><textarea class="editable" style="font-size:12px;" name="" id="sem10" cols=3 rows="3"></textarea></strong></td>
                                <td><strong><textarea class="editable" style="font-size:12px;" name="" id="sem11" cols=3 rows="3"></textarea></strong></td>
                                <td><strong><textarea class="editable" style="font-size:12px;" name="" id="sem12" cols=3 rows="3"></textarea></strong></td>
                                <td><strong><textarea class="editable" style="font-size:12px;" name="" id="sem13" cols=3 rows="3"></textarea></strong></td>
                                <td><strong><textarea class="editable" style="font-size:12px;" name="" id="sem14" cols=3 rows="3"></textarea></strong></td>
                                <td><strong><textarea class="editable" style="font-size:12px;" name="" id="sem15" cols=3 rows="3"></textarea></strong></td>
                                <td><strong><textarea class="editable" style="font-size:12px;" name="" id="sem16" cols=3 rows="3"></textarea></strong></td>
                                <td><strong><textarea class="editable" style="font-size:12px;" name="" id="sem17" cols=3 rows="3"></textarea></strong></td>
                                <td><strong><textarea class="editable" style="font-size:12px;" name="" id="sem18" cols=3 rows="3"></textarea></strong></td>
                              </tr>
                            </tbody>
                          </table>
                        </div>

                        <div class="row">
                          <div class="col-md-3 azul" id="columna">
                            <h6>SD <span class="color">Seguimiento departamental</span></h6>
                          </div>
                          <div class="col-md-3 azul" id="columna">
                            <h6>ED <span class="color">Evaluación diagnóstica</span></h6>
                          </div>
                          <div class="col-md-3 azul" id="columna">
                            <h6>Efn <span class="color">Evaluación formativa (competencia específica)</span></h6>
                          </div>
                          <div class="col-md-3 azul" id="columna">
                            <h6>ES <span class="color">Evaluación sumativa</span></h6>
                          </div>
                        </div>

                        <div class="dividerM row" style="margin-bottom: 5px"></div>

                        <div class="row">
                          <div class="col-md-12" align="right" id="guardarDetallesGenerales" style="margin-bottom: 10px;">
                            <h4 id="estatusSemanas"></h4>
                            <button type="button" class="btn btn-secondary editable" onclick="guardarCalendarizacion()">Guardar</button>
                          </div>
                        </div>

                      </div>

                      <br>
                      <div id="otrosdatos">
                        <h3>Otros grupos</h3>
                        <table id="tablaFechasNM" class="table table-hover" style="width: 100%;">
                          <thead>
                            <tr>
                              <th class="text-center">
                                <h6>Grupo</h6>
                              </th>
                              <th class="text-center">
                                <h6>Fecha de inicio programado</h6>
                              </th>
                              <th class="text-center">
                                <h6>Fecha de Término</h6>
                              </th>
                              <th></th>
                            </tr>
                          </thead>
                          <tbody id="ctnm">
                          </tbody>
                        </table>

                        <!-- tabla de semanas de otros grupos -->
                        <table id="tablasemanaso" class="table table-hover table-responsive">
                          <thead>
                            <tr>

                              <th>Grupo[s]</th>
                              <th>Semana</th>
                              <?php for ($ist = 1; $ist <= 18; $ist++) {
                                echo '<th class="text-center">' . $ist . '</th>';
                              } ?>

                            </tr>
                          </thead>
                          <tbody id="otrassemanas">

                          </tbody>
                        </table>


                      </div>
                    </div> <!-- fin acoordeon -->

                    <script type="text/javascript">
                      function agregarFuentes() {
                        var separado = $('#campoFuentes').val().split("\n");
                        var tablaFuentes = document.getElementById("tablaFuentes");

                        var l = tablaFuentes.rows.length;

                        for (var i = 1; i < l; i++) {
                          tablaFuentes.deleteRow(1);
                        }

                        separado.forEach(fuente => {
                          if (fuente != "") {
                            var tablaFuentes = document.getElementById("tablaFuentes");
                            var fila = tablaFuentes.insertRow(tablaFuentes.rows.length);
                            var celdaNo = fila.insertCell(0);
                            var celdaFuente = fila.insertCell(1);
                            celdaFuente.classList.add("text-justify");
                            celdaFuente.innerHTML = fuente;
                            celdaNo.innerHTML = '<strong>' + (tablaFuentes.rows.length - 1) + '</strong>';
                          }
                        });

                      }
                    </script>

                    <!-- Thirteen accordion [Fuentes de informacion]-->
                    <div class="panel" id="panelFuentes">
                      <div class="panel-heading" id="headingThirteen">
                        <a data-toggle="collapse" data-target="#collapseThirteen" aria-expanded="false" aria-controls="collapseThirteen">
                          <h5 class="panel-title" id="miColor8">Fuentes de Información</h5>
                        </a>
                      </div>
                      <div id="collapseThirteen" class="collapse" aria-labelledby="headingThirteen" data-parent="#accordion">
                        <div class="panel-body">
                          <table class="table table-hover" id="tablaFuentes" style="width: 100%;">
                            <thead>
                              <tr>
                                <th>
                                  <h5> No.</h5>
                                </th>
                                <th class="text-center">
                                  <h5> Fuente de Información</h5>
                                </th>
                                <td>
                                  <button align="center" type="button" class="btn btn-success btn-sm editable" style="font-size: 14px" data-toggle="modal" data-target="#myModalFuentes">Editar
                                  </button>
                                </td>
                              </tr>
                            </thead>
                          </table>
                          <!-- Modal -->
                          <div id="myModalFuentes" class="modal fade" role="dialog">
                            <div class="modal-dialog">

                              <!-- Modal content-->
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title">Fuentes de información</h5>
                                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>
                                <div class="modal-body">
                                  <p><textarea style="width:100%; height:30em; font-size: 13px" id="campoFuentes"></textarea></p>
                                </div>
                                <div class="modal-footer">
                                  <h4 id="estatusFuentes"></h4>
                                  <button type="button" class="btn btn-secondary" onclick="guardarCampoTema('Fuentes'); agregarFuentes()">Guardar</button>
                                </div>
                              </div>

                            </div>
                          </div>
                          <!-- Fin modal -->
                        </div>
                      </div>
                    </div><!-- fin acoordeon -->

                    <div class="panel" id="panelGen">
                      <div class="panel-heading" id="headingGen">
                        <a data-toggle="collapse" data-target="#collapseGen" aria-expanded="false" aria-controls="collapseGen">
                          <h5 class="panel-title" id="miColor8">Generar Instrumentacion del Tema</h5>
                        </a>
                      </div>
                      <div id="collapseGen" class="collapse" aria-labelledby="headingGen" data-parent="#accordion">
                        <div class="panel-body">
                          <form target="_blank" action="generarInstrumentacion.php" method="get" id="formGenerarInstru">
                            <input type="hidden" id="enviarGrupo" name="grupo" />
                            <input type="hidden" id="enviarPeriodo" name="periodo" />
                            <input type="hidden" id="enviarTema" name="tema" />
                            <p><input type="submit" class="btn btn-secondary" value="Generar" /></p>
                          </form>
                        </div>
                      </div>
                    </div>

                    <div class="panel">
                      <div class="panel-heading" id="headingSave">
                        <a data-toggle="collapse" data-target="#collapseSave" aria-expanded="false" aria-controls="collapseSave">
                          <h5 class="panel-title" id="miColor9">Guardar instrumentación</h5>
                        </a>
                      </div>
                      <div id="collapseSave" class="collapse" aria-labelledby="headingSave" data-parent="#accordion">
                        <div class="panel-body">
                          <div class="form-group">
                            <p class="text-danger" id="textGuardar"></p>
                            <button type="button" class="btn btn-secondary editable" value="Guardar" id="btnGuardarInstru">Guardar</button>
                          </div>
                        </div>
                      </div>
                    </div>

                  </div>
                </div>
              </div>
            </div>
            <!-- Events ends -->
          </div>
        </div>
      </div>
    </div>

    <!-- Content ends -->

    <script type="text/javascript">
      function buscarEvidenciaExiste(cualevi) {
        var periodo = document.getElementById("campoPeriodo").innerHTML;
        var grupo = document.getElementById("campoGrupo").innerHTML;
        var tema = $('#selectTema').val();
        var parametros = {
          "accion": "buscarEviHec",
          "cualevi": cualevi,
          "periodo": periodo,
          "grupo": grupo,
          "tema": tema
        };
        var ata = false;
        $.ajax({
          async: false,
          data: parametros,
          url: 'conexion/consultasNoSQL.php',
          type: 'post',
          success: function(resultado) {
            //alert(resultado+"---");
            if (resultado == "si") {
              ata = true;
            } else {
              ata = false;
            }

          }
        });
        return ata;
      }
      //var ata;
      function buscarCatalogo(nombre, tabla, seleccionado, callback) {

        var parametros = {
          "accion": "buscarCatalogo",
          "catalogo": nombre,
          "tabla": tabla,
          "selected": seleccionado
        };

        $.ajax({
          data: parametros,
          url: 'conexion/consultasSQL.php',
          type: 'post',
          success: function(resultado) {
            callback(resultado);
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


      function guardarCampoTemaValor(campo, valor) {
        var tema = $('#selectTema').val();
        var parametros = {
          "accion": "guardarCampoTema",
          "valor": valor,
          "grupo": document.getElementById("campoGrupo").innerHTML,
          "campo": campo,
          "tema": tema,
          "periodo": document.getElementById("campoPeriodo").innerHTML
        };

        $.ajax({
          data: parametros,
          url: 'conexion/consultasNoSQL.php',
          type: 'post',

          beforeSend: function() {
            $("#estatus" + campo).html("Guardando..");
          },
          success: function(resultado) {
            //alertify.success("Guardado "+'#estatus'+campo);
            campo = campo.split(".")[0];
            //alert(campo);
            $('#estatus' + campo).html("¡Guardado!");
            setTimeout(function() {
              //alert("ok");           
              $('#estatus' + campo).html("");
            }, 1500); // The millis to wait before executing this block
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
    </script>




    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div id="instrumentos" class="modal-body" style="height: auto;">

            </div>
          </div>
          <div class="modal-footer">
            <button id="ginstind" type="button" class="btn btn-success">Guardar</button>
            <button id="ver" type="button" class="btn btn-info">Ver instrumento en PDF</button>
          </div>
        </div>
      </div>
    </div>

    <?php
    require 'footer.php';
    ?>



    <script>
      var cualinstru;

      function abreinstrumento(cual) {
        cualinstru = cual;
        var tabla = document.getElementById("matrizEvaluacion");
        var evidencia = tabla.rows[cual].cells[0].getElementsByTagName("select")[0].value;
        var instrumento = tabla.rows[cual].cells[8].getElementsByTagName("select")[0].value;
        var instrug = tabla.rows[cual].cells[8].getElementsByTagName("input")[0].value;
        //alert(instrumento);
        //PORCENTAJE 30% DE 100
        var por = tabla.rows[cual].cells[1].getElementsByTagName("input")[0].value;
        //indicadores
        var A = tabla.rows[cual].cells[2].getElementsByTagName("input")[0].value;
        var B = tabla.rows[cual].cells[3].getElementsByTagName("input")[0].value;
        var C = tabla.rows[cual].cells[4].getElementsByTagName("input")[0].value;
        var D = tabla.rows[cual].cells[5].getElementsByTagName("input")[0].value;
        var E = tabla.rows[cual].cells[6].getElementsByTagName("input")[0].value;
        var F = tabla.rows[cual].cells[7].getElementsByTagName("input")[0].value;
        var materia = $("#campoMateria")[0].innerHTML;
        //alert(cual+evidencia+instrumento);
        var periodo = document.getElementById("campoPeriodo").innerHTML;
        var grupo = document.getElementById("campoGrupo").innerHTML;
        var tem = document.getElementById("selectTema").value;

        if (instrumento == "Guía de observación") {
          //$("#instrumentos").load("listaguia.php",{evi:evidencia, ins:instrumento, num:cual,per:periodo,A:A,B:B,C:C,D:D,E:E,F:F,por:por},function(res){
          //alert(res);
          //});
          $("#exampleModalLabel")[0].innerHTML = "GUÍA DE OBSERVACIÓN";
          $("#instrumentos").load("instrumentos/guiaobservacion/datosguia.php", {
            evi: evidencia,
            ins: instrumento,
            num: cual,
            per: periodo,
            A: A,
            B: B,
            C: C,
            D: D,
            E: E,
            F: F,
            por: por,
            mat: materia,
            gru: grupo,
            tem: tem,
            instrug: instrug
          }, function(res) {
            //alert(res);

          });
        } else if (instrumento == "Lista de cotejo") {
          //alert("ok");
          $("#exampleModalLabel")[0].innerHTML = "LISTA DE COTEJO";
          $("#instrumentos").load("instrumentos/listacotejo/datoslista.php", {
            evi: evidencia,
            ins: instrumento,
            num: cual,
            per: periodo,
            A: A,
            B: B,
            C: C,
            D: D,
            E: E,
            F: F,
            por: por,
            mat: materia,
            gru: grupo,
            tem: tem,
            instrug: instrug
          }, function(res) {
            //alert(res);

          });
        } else if (instrumento == "Cuestionario") {
          $("#exampleModalLabel")[0].innerHTML = "CUESTIONARIO";
          $("#instrumentos").load("instrumentos/cuestionario/datoscuestionario.php", {
            evi: evidencia,
            ins: instrumento,
            num: cual,
            per: periodo,
            A: A,
            B: B,
            C: C,
            D: D,
            E: E,
            F: F,
            por: por,
            mat: materia,
            gru: grupo,
            tem: tem,
            instrug: instrug
          }, function(res) {
            //alert(res);

          });

        } else if (instrumento == "Rúbrica") {
          $("#exampleModalLabel")[0].innerHTML = "RÚBRICA";
          $("#instrumentos").load("instrumentos/rubrica/datosrubrica.php", {
            evi: evidencia,
            ins: instrumento,
            num: cual,
            per: periodo,
            A: A,
            B: B,
            C: C,
            D: D,
            E: E,
            F: F,
            por: por,
            mat: materia,
            gru: grupo,
            tem: tem,
            instrug: instrug
          }, function(res) {
            //alert(res);

          });

        }
        //alert(document.getElementById("campoGrupo").innerHTML);
        /*for (let i = 2; i < tabla.rows.length-1; i++) {
          const row = tabla.rows[i];
          var r = [];
          var select = row.cells[0].getElementsByTagName("select")[0];
          var val = select.options[select.selectedIndex].innerHTML;
          r.push(val);*/
      }
    </script>







    <!-- Scroll to top -->
    <span class="totop"><a href="#"><i class="fa fa-angle-up"></i></a></span>

    <!-- Javascript files -->
    <!-- jQuery -->
    <script src="bootstrap/js/jquery.js"></script>
    <!-- Bootstrap JS -->
    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Isotope, Pretty Photo JS -->
    <script src="js/jquery.isotope.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="alertify/alertify.min.js"></script>
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

    <script>
      //Antes de generar la instrumentación, verificar si el usuario actual ya subio su firma correspondiente
      $("#formGenerarInstru").on("submit", function(e) {
        e.preventDefault();
        $.ajax({
          data: {
            'idUsuario': '<?php echo $_SESSION['idUsuario']; ?>',
            'accion': 'verificarFirmaUsuario'
          },
          url: 'conexion/consultasSQL.php',
          type: 'post',
          success: function(resultado) {
            var res = JSON.parse(resultado);
            if (res.success) {
              //formulario.submit();
              $('#formGenerarInstru').append('<input type="hidden" name="firma" value="' + res.data + '" id="enviarFirma"/>');
              e.currentTarget.submit();
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

      $("#collapseSave").on("show.bs.collapse", function() {
        //Cuando se abra el ultimo panel de guardar, verificar si la materia de la instrumentacion
        //ya tiene asignado un grupo academico y por ende un presidente de grupo academico
        //habilitar/deshabilitar el boton dependiendo al resultado
        var boton = $(this).find('button');
        boton.prop('disabled', true);

        var grupo = document.getElementById("campoGrupo").innerHTML;
        $.ajax({
          data: {
            'grupo': grupo,
            'accion': 'obtenerPresidenteDeGrupoAcademico'
          },
          url: 'conexion/consultasSQL.php',
          type: 'post',
          success: function(resultado) {
            var res = JSON.parse(resultado);
            if (res.success) {
              boton.prop('disabled', false);
              $("#textGuardar").css("display", "none");
              $("#textGuardar").text("");

              boton.attr("data-materia", res.data.ret_NomCompleto);
              boton.attr("data-presidente", res.data.nombre);
              boton.attr("data-idpresidente", res.data.cat_ID);
              habilitarDeshabilitarCampos();

            } else {
              $("#textGuardar").css("display", "block");
              $("#textGuardar").text(res.mensaje);
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

      $("#btnGuardarInstru").on("click", function() {

        var materia = $(this).attr("data-materia");
        var presidente = $(this).attr("data-presidente");

        var textoMensaje = "La presente instrumentación deberá ser validada por el presidente de grupo académico de la asignatura de " + materia.toUpperCase() + ".\nEl/la presidente " + presidente.toUpperCase() + " podrá revisar la instrumentación y autorizar la misma, o en caso contrario, invalidarla para su posterior corrección o retroalimentación si es necesario.\n¿Esta seguro(a) de guardar la información ingresada?"


        $.ajax({
          data: {
            'idUsuario': '<?php echo $_SESSION['idUsuario']; ?>',
            'accion': 'verificarFirmaUsuario'
          },
          url: 'conexion/consultasSQL.php',
          type: 'post',
          success: function(resultado) {
            var res = JSON.parse(resultado);
            if (res.success) {
              //Mostrar un mensaje de confirmación indicando que no se pueden deshacer cambios.
              alertify.confirm("Aviso", textoMensaje,
                function() {
                  var parametros = {
                    "accion": "mandarInstrumentacionDocente",
                    "grupo": document.getElementById("campoGrupo").innerHTML,
                    "periodo": document.getElementById("campoPeriodo").innerHTML
                  };

                  $.ajax({
                    data: parametros,
                    url: 'conexion/consultasNoSQL.php',
                    type: 'post',
                    success: function(response) {
                      var resp = JSON.parse(response);
                      if (resp.success) {
                        alertify.success('<h3>' + resp.mensaje + '</h3>', 2, function(){
                          //Recargar la pagina y mostrar nuevamente la informacion
                          window.location.reload();
                        });
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
    </script>
    <script>
      function VerinstrumentoLista() {
        var cual = cualinstru;
        var tabla = document.getElementById("matrizEvaluacion");
        var evidencia = tabla.rows[cual].cells[0].getElementsByTagName("select")[0].value;
        var instrumento = tabla.rows[cual].cells[8].getElementsByTagName("select")[0].value;
        var ComT = document.getElementById("CompetenciaET").innerHTML;
        var divalcance = document.getElementById("alcance");
        var ta = divalcance.getElementsByTagName("textarea");
        var taa = new Array(ta.length);
        for (var i = 0; i < ta.length; i++) {
          taa[i] = ta[i].value + "!#$%&/()=" + ta[i].id;
        }


        var divminimo = document.getElementById("minimos");
        var tm = divminimo.getElementsByTagName("textarea");
        if (tm.length == 0) {
          alertify.error('<h3 style="color:white;">Aún no se ha creado indicadores mínimos</h3>', 5);
        } else {
          var tma = new Array(tm.length);
          var contminimos = 0;
          for (var i = 0; i < tm.length; i += 2) {
            tma[contminimos] = tm[i].value + "!#$%&/()=" + tm[i + 1].value;
            contminimos++;
          }

          //alert(taa[0]);
          //PORCENTAJE 30% DE 100
          var por = tabla.rows[cual].cells[1].getElementsByTagName("input")[0].value;
          //indicadores
          var A = tabla.rows[cual].cells[2].getElementsByTagName("input")[0].value;
          var B = tabla.rows[cual].cells[3].getElementsByTagName("input")[0].value;
          var C = tabla.rows[cual].cells[4].getElementsByTagName("input")[0].value;
          var D = tabla.rows[cual].cells[5].getElementsByTagName("input")[0].value;
          var E = tabla.rows[cual].cells[6].getElementsByTagName("input")[0].value;
          var F = tabla.rows[cual].cells[7].getElementsByTagName("input")[0].value;
          var P = tabla.rows[cual].cells[9].getElementsByTagName("input")[0].checked;
          var procedimental = "";
          if (P) {
            procedimental = "x";
          }

          var CONC = tabla.rows[cual].cells[10].getElementsByTagName("input")[0].checked;
          var conceptual = "";
          if (CONC) {
            conceptual = "x";
          }

          var ACT = tabla.rows[cual].cells[11].getElementsByTagName("input")[0].checked;
          var actitudinal = "";
          if (ACT) {
            actitudinal = "x";
          }
          var materia = $("#campoMateria")[0].innerHTML;
          //alert(cual+evidencia+instrumento);
          var periodo = document.getElementById("campoPeriodo").innerHTML;
          var grupo = document.getElementById("campoGrupo").innerHTML;
          var tem = document.getElementById("selectTema").value;
          var fa = document.getElementById("fa").value;
          var te = document.getElementById("te").value;
          var PE = document.getElementById("campoPE").value;
          var CS = document.getElementById("campoSemestre").value;
          $("#instrumentos").load("instrumentos/listacotejo/lista.php", {
            CS: CS,
            PE: PE,
            evi: evidencia,
            ins: instrumento,
            num: cual,
            per: periodo,
            A: A,
            B: B,
            C: C,
            D: D,
            E: E,
            F: F,
            por: por,
            mat: materia,
            gru: grupo,
            tem: tem,
            fa: fa,
            te: te,
            CoT: ComT,
            taa: taa,
            tma: tma,
            PRCDMTL: procedimental,
            CNCPTL: conceptual,
            CTTDNL: actitudinal
          }, function() {

          });
        }
      }
      $("#ver").click(function() {
        var cual = cualinstru;
        var tabla = document.getElementById("matrizEvaluacion");

        var instrumento = tabla.rows[cual].cells[8].getElementsByTagName("select")[0].value;
        //alert(instrumento);
        alertify.confirm("<h4>Si realizó alguna modificación y no guardó, perderá los cambios, desea continuar</h4>",
          function() {
            if (instrumento == "Lista de cotejo") {
              VerinstrumentoLista();
            } else if (instrumento == "Guía de observación") {
              VerinstrumentoGuia();
            } else if (instrumento == "Cuestionario") {

              verinstrumentoCuestionario();
            } else if (instrumento == "Rúbrica") {

              verinstrumentoRubrica();
            }
          },
          function() {
            alertify.success("De clic en el botón de guardar", 5);
          });

      });


      function verinstrumentoRubrica() {
        var cual = cualinstru;
        var tabla = document.getElementById("matrizEvaluacion");
        var evidencia = tabla.rows[cual].cells[0].getElementsByTagName("select")[0].value;
        var instrumento = tabla.rows[cual].cells[8].getElementsByTagName("select")[0].value;
        var ComT = document.getElementById("CompetenciaET").innerHTML;
        //PORCENTAJE 30% DE 100
        var por = tabla.rows[cual].cells[1].getElementsByTagName("input")[0].value;
        var A = tabla.rows[cual].cells[2].getElementsByTagName("input")[0].value;
        var B = tabla.rows[cual].cells[3].getElementsByTagName("input")[0].value;
        var C = tabla.rows[cual].cells[4].getElementsByTagName("input")[0].value;
        var D = tabla.rows[cual].cells[5].getElementsByTagName("input")[0].value;
        var E = tabla.rows[cual].cells[6].getElementsByTagName("input")[0].value;
        var F = tabla.rows[cual].cells[7].getElementsByTagName("input")[0].value;
        var P = tabla.rows[cual].cells[9].getElementsByTagName("input")[0].checked;
        var procedimental = "";
        if (P) {
          procedimental = "x";
        }
        var CONC = tabla.rows[cual].cells[10].getElementsByTagName("input")[0].checked;
        var conceptual = "";
        if (CONC) {
          conceptual = "x";
        }
        var ACT = tabla.rows[cual].cells[11].getElementsByTagName("input")[0].checked;
        var actitudinal = "";
        if (ACT) {
          actitudinal = "x";
        }
        var materia = $("#campoMateria")[0].innerHTML;
        var periodo = document.getElementById("campoPeriodo").innerHTML;
        var grupo = document.getElementById("campoGrupo").innerHTML;
        var tem = document.getElementById("selectTema").value;
        var fa = document.getElementById("fa").value;
        var te = document.getElementById("te").value;
        var contenedor = document.getElementById("contenedor");
        var elems = contenedor.querySelectorAll('input,textarea,select');
        var general = new Array();
        for (var i = 0; i < elems.length; i += 12) {
          var vp = new Array();
          vp.push(elems[i].value);
          vp.push(elems[i + 1].value);
          var vi = new Array();
          var vii1 = new Array();
          vii1.push(elems[i + 2].value);
          vii1.push(elems[i + 3].value);
          vi.push(vii1);
          var vii2 = new Array();
          vii2.push(elems[i + 4].value);
          vii2.push(elems[i + 5].value);
          vi.push(vii2);
          var vii3 = new Array();
          vii3.push(elems[i + 6].value);
          vii3.push(elems[i + 7].value);
          vi.push(vii3);
          var vii4 = new Array();
          //alert("ok");
          vii4.push(elems[i + 8].value);
          //alert("ok");


          vii4.push(elems[i + 9].value);
          //alert("ok");
          vi.push(vii4);
          //alert("ok");
          var vii5 = new Array();
          vii5.push(elems[i + 10].value);
          vii5.push(elems[i + 11].value);
          vi.push(vii5);
          vp.push(vi);
          general.push(vp);

        }
        //alert("ok");
        var PE = document.getElementById("campoPE").value;
        var CS = document.getElementById("campoSemestre").value;
        var CTema = document.getElementById("TituloTema").value;

        //alert(CTema);
        $("#instrumentos").load("instrumentos/rubrica/rubrica.php", {
          CTema: CTema,
          CS: CS,
          PE: PE,
          evi: evidencia,
          ins: instrumento,
          num: cual,
          per: periodo,
          A: A,
          B: B,
          C: C,
          D: D,
          E: E,
          F: F,
          por: por,
          mat: materia,
          gru: grupo,
          tem: tem,
          fa: fa,
          te: te,
          CoT: ComT,
          PRCDMTL: procedimental,
          CNCPTL: conceptual,
          CTTDNL: actitudinal,
          general: general
        }, function() {

        });
      }


      function VerinstrumentoGuia() {
        var cual = cualinstru;
        var tabla = document.getElementById("matrizEvaluacion");
        var evidencia = tabla.rows[cual].cells[0].getElementsByTagName("select")[0].value;
        var instrumento = tabla.rows[cual].cells[8].getElementsByTagName("select")[0].value;
        var ComT = document.getElementById("CompetenciaET").innerHTML;
        //PORCENTAJE 30% DE 100
        var por = tabla.rows[cual].cells[1].getElementsByTagName("input")[0].value;
        var A = tabla.rows[cual].cells[2].getElementsByTagName("input")[0].value;
        var B = tabla.rows[cual].cells[3].getElementsByTagName("input")[0].value;
        var C = tabla.rows[cual].cells[4].getElementsByTagName("input")[0].value;
        var D = tabla.rows[cual].cells[5].getElementsByTagName("input")[0].value;
        var E = tabla.rows[cual].cells[6].getElementsByTagName("input")[0].value;
        var F = tabla.rows[cual].cells[7].getElementsByTagName("input")[0].value;
        var P = tabla.rows[cual].cells[9].getElementsByTagName("input")[0].checked;
        var procedimental = "";
        if (P) {
          procedimental = "x";
        }
        var CONC = tabla.rows[cual].cells[10].getElementsByTagName("input")[0].checked;
        var conceptual = "";
        if (CONC) {
          conceptual = "x";
        }
        var ACT = tabla.rows[cual].cells[11].getElementsByTagName("input")[0].checked;
        var actitudinal = "";
        if (ACT) {
          actitudinal = "x";
        }
        var materia = $("#campoMateria")[0].innerHTML;
        var periodo = document.getElementById("campoPeriodo").innerHTML;
        var grupo = document.getElementById("campoGrupo").innerHTML;
        var tem = document.getElementById("selectTema").value;
        var fa = document.getElementById("fa").value;
        var te = document.getElementById("te").value;
        var contenedor = document.getElementById("contenedor");
        var divs = contenedor.getElementsByClassName("categ");
        var general = new Array();
        general.push(fa);
        general.push(te);
        var ban1 = true;
        var ban2 = true;
        if (divs.length == 0) {
          ban1 = false;
        }
        for (var i = 0; i < divs.length; i++) {
          var acateg = new Array();

          var cat = divs[i].getElementsByTagName("input")[0].value;
          acateg.push(cat);
          divs2 = divs[i].getElementsByClassName("items");
          var aitemsg = new Array();
          if (divs2.length == 0) {
            ban2 = false;
          }
          for (var j = 0; j < divs2.length; j++) {
            var aitems = new Array();
            var items = divs2[j].getElementsByTagName("input");
            var indi = divs2[j].getElementsByTagName("select")[0].value;

            var ited = items[0].value;
            var pund = items[1].value;
            aitems.push(ited);
            aitems.push(pund);
            aitems.push(indi);
            aitemsg.push(aitems);
          }
          acateg.push(aitemsg);
          general.push(acateg);
        }
        //alert("ok2");
        if (ban1 && ban2) {
          var PE = document.getElementById("campoPE").value;
          var CS = document.getElementById("campoSemestre").value;


          $("#instrumentos").load("instrumentos/guiaobservacion/guia.php", {
            CS: CS,
            PE: PE,
            evi: evidencia,
            ins: instrumento,
            num: cual,
            per: periodo,
            A: A,
            B: B,
            C: C,
            D: D,
            E: E,
            F: F,
            por: por,
            mat: materia,
            gru: grupo,
            tem: tem,
            fa: fa,
            te: te,
            CoT: ComT,
            PRCDMTL: procedimental,
            CNCPTL: conceptual,
            CTTDNL: actitudinal,
            general: general
          }, function() {

          });
        }
      }

      function verinstrumentoCuestionario() {
        var cual = cualinstru;

        var tabla = document.getElementById("matrizEvaluacion");
        var evidencia = tabla.rows[cual].cells[0].getElementsByTagName("select")[0].value;
        var instrumento = tabla.rows[cual].cells[8].getElementsByTagName("select")[0].value;
        var ComT = document.getElementById("CompetenciaET").innerHTML;
        //PORCENTAJE 30% DE 100
        var por = tabla.rows[cual].cells[1].getElementsByTagName("input")[0].value;
        var A = tabla.rows[cual].cells[2].getElementsByTagName("input")[0].value;
        var B = tabla.rows[cual].cells[3].getElementsByTagName("input")[0].value;
        var C = tabla.rows[cual].cells[4].getElementsByTagName("input")[0].value;
        var D = tabla.rows[cual].cells[5].getElementsByTagName("input")[0].value;
        var E = tabla.rows[cual].cells[6].getElementsByTagName("input")[0].value;
        var F = tabla.rows[cual].cells[7].getElementsByTagName("input")[0].value;
        var P = tabla.rows[cual].cells[9].getElementsByTagName("input")[0].checked;
        var procedimental = "";
        if (P) {
          procedimental = "x";
        }
        var CONC = tabla.rows[cual].cells[10].getElementsByTagName("input")[0].checked;
        var conceptual = "";
        if (CONC) {
          conceptual = "x";
        }
        var ACT = tabla.rows[cual].cells[11].getElementsByTagName("input")[0].checked;
        var actitudinal = "";
        if (ACT) {
          actitudinal = "x";
        }
        var materia = $("#campoMateria")[0].innerHTML;
        var periodo = document.getElementById("campoPeriodo").innerHTML;
        var grupo = document.getElementById("campoGrupo").innerHTML;
        var tem = document.getElementById("selectTema").value;
        var fa = document.getElementById("fa").value;
        var te = document.getElementById("te").value;
        var pregrel1 = document.getElementById("minimos");
        var pregrel2 = pregrel1.getElementsByTagName("input");
        var contmin1 = pregrel2.length;
        var pregrel3 = pregrel1.getElementsByTagName("select");
        var contpr = 0;
        var listapr = [];
        for (var i = 0; i < pregrel2.length; i += 3) {
          listapr.push(pregrel2[i].value);
          listapr.push(pregrel2[i + 1].value);
          listapr.push(pregrel2[i + 2].value);
          listapr.push(pregrel3[contpr].value);
          contpr++;
        }

        pregrel1 = document.getElementById("minimos2");
        pregrel2 = pregrel1.getElementsByTagName("input");
        pregrel3 = pregrel1.getElementsByTagName("select")
        var contmin2 = pregrel2.length;
        var mps = document.getElementById("mps").value;
        //alert("okd"+mps);
        contpr = 0;

        var listasb2 = [];
        //var j;
        //alert("ok");

        for (var i = 0; i < pregrel2.length; i += (2 + (mps * 2))) {
          var listasb1 = [];
          for (var j = i; j < i + (2 + (mps * 2)); j++) {
            if (pregrel2[j].value == "on") {
              //alert(pregrel2[j].checked);
              listasb1.push(pregrel2[j].checked);
            } else {
              listasb1.push(pregrel2[j].value);
            }
          }
          listasb1.push(pregrel3[contpr].value);
          //alert("ok");
          listasb2.push(listasb1);
          //alert("ok3");
          contpr++;
        }

        pregrel1 = document.getElementById("minimos3");
        pregrel2 = pregrel1.getElementsByTagName("input");
        var contmin3 = pregrel2.length;
        pregrel3 = pregrel1.getElementsByTagName("select");
        contpr = 0;
        var listapvf = [];
        for (var i = 0; i < pregrel2.length; i += 2) {
          listapvf.push(pregrel2[i].value);
          listapvf.push(pregrel3[contpr].value);
          contpr++;
          listapvf.push(pregrel2[i + 1].value);
          listapvf.push(pregrel3[contpr].value);

          contpr++;
        }
        //alert(contmin1+" "+contmin2+" "+contmin3);
        if (contmin1 < 1 || contmin2 < 1 || contmin3 < 1) {
          alertify.error('<h3 style="color:white;">Aún no se ha creado todos los indicadores </h3>', 5);
        } else {
          var PE = document.getElementById("campoPE").value;
          var CS = document.getElementById("campoSemestre").value;


          $("#instrumentos").load("instrumentos/cuestionario/cuestionario.php", {
            CS: CS,
            PE: PE,
            evi: evidencia,
            ins: instrumento,
            num: cual,
            per: periodo,
            A: A,
            B: B,
            C: C,
            D: D,
            E: E,
            F: F,
            por: por,
            mat: materia,
            gru: grupo,
            tem: tem,
            fa: fa,
            te: te,
            CoT: ComT,
            PRCDMTL: procedimental,
            CNCPTL: conceptual,
            CTTDNL: actitudinal,
            listapr: listapr,
            listasb2: listasb2,
            listapvf: listapvf
          }, function() {

          });
        }
        //alert(listapvf.length);
        //alert(evidencia+instrumento+ComT+"- "+listapr.length);
      }

      function descargaPDF() {
        //alert("ok");
        var $elemento = document.getElementById("imprimir");
        html2pdf().set({
            //margin: [1, 1, 1, 1],
            margin: 1,
            filename: "instrumento.pdf",
            image: {
              type: 'jpg',
              quality: 0.99
            },
            html2canvas: {
              scale: 3,
              legalRendering: true,
            },
            jsPDF: {
              unit: "mm",
              format: "a3",
              orientation: "portrait"
            }
          })
          .from($elemento)
          .save()
          .catch(err => console.log(err));
        /*alert("ok");

        var pdf = new jsPDF('p', 'pt', 'letter');
        source = $('#imprimir')[0];

        specialElementHandlers = {
            '#bypassme': function (element, renderer) {
                return true
            }
        };
        margins = {
            top: 80,
            bottom: 60,
            left: 40,
            width: 522
        };

        pdf.fromHTML(
            source, 
            margins.left, // x coord
            margins.top, { // y coord
                'width': margins.width, 
                'elementHandlers': specialElementHandlers
            },

            function (dispose) {
                pdf.save('Prueba.pdf');
            }, margins
        );*/
      }

      function GuardainfoLista() {
        var materia = $("#campoMateria")[0].innerHTML;
        //alert(cual+evidencia+instrumento);
        var periodo = document.getElementById("campoPeriodo").innerHTML;
        var grupo = document.getElementById("campoGrupo").innerHTML;
        var tem = document.getElementById("selectTema").value;
        var fa = document.getElementById("fa").value;
        var te = document.getElementById("te").value;
        if (fa == "" || te == "") {

        }
        var cual = cualinstru;
        var tabla = document.getElementById("matrizEvaluacion");
        var evidencia = tabla.rows[cual].cells[0].getElementsByTagName("select")[0].value;
        var instrumento = tabla.rows[cual].cells[8].getElementsByTagName("input")[0].value;

        var divalcance = document.getElementById("alcance");
        var ta = divalcance.getElementsByTagName("textarea");

        var taa = new Array();
        var contin = 0;

        taa[contin] = fa;
        contin++;
        taa[contin] = te;
        contin++;
        for (var i = 0; i < ta.length; i++) {
          taa[contin] = ta[i].value;
          contin++;
          taa[contin] = ta[i].id;
          contin++;
          if (taa[contin - 1] == "A") {
            taa[contin] = tabla.rows[cual].cells[2].getElementsByTagName("input")[0].value;
          }
          if (taa[contin - 1] == "B") {
            taa[contin] = tabla.rows[cual].cells[3].getElementsByTagName("input")[0].value;
          }
          if (taa[contin - 1] == "C") {
            taa[contin] = tabla.rows[cual].cells[4].getElementsByTagName("input")[0].value;
          }
          if (taa[contin - 1] == "D") {
            taa[contin] = tabla.rows[cual].cells[5].getElementsByTagName("input")[0].value;
          }
          if (taa[contin - 1] == "E") {
            taa[contin] = tabla.rows[cual].cells[6].getElementsByTagName("input")[0].value;
          }
          if (taa[contin - 1] == "F") {
            taa[contin] = tabla.rows[cual].cells[7].getElementsByTagName("input")[0].value;
          }
          contin++;
        }

        //alert(cual);

        var divminimo = document.getElementById("minimos");
        var tm = divminimo.getElementsByTagName("textarea");
        //var tma = new Array(tm.length);
        var contminimos = 0;
        for (var i = 0; i < tm.length; i += 2) {
          taa[contin] = tm[i].value;
          contin++;
          taa[contin] = "M";
          contin++;
          taa[contin] = tm[i + 1].value;
          contin++;
        }
        var matriz = [];
        matriz.push(taa);
        //alert(taa.length);
        //PORCENTAJE 30% DE 100


        //alert("ok-");

        var parametros = {
          "accion": "gindinst",
          "evidencia": evidencia,
          "instrumento": instrumento,
          "numero": cual,
          "periodo": periodo,
          "fechaaplicacion": fa,
          "tiempoevaluacion": te,
          "grupo": grupo,
          "tema": tem,
          "alcance": matriz,
          "minimos": matriz
        };
        //alert("oj");
        $.post("conexion/consultasNoSQL.php", parametros, function(mensaje) {

          alertify.success("Guardado", 5);

        });
        actualizaCamposTema(document.getElementById("selectTema").value);
      }

      $("#ginstind").click(function() {
        var cual = cualinstru;
        var tabla = document.getElementById("matrizEvaluacion");
        var instrumento = tabla.rows[cual].cells[8].getElementsByTagName("select")[0].value;

        if (instrumento == "Lista de cotejo") {
          GuardainfoLista();
        } else if (instrumento == "Cuestionario") {

          GuardainfoCuestionario();
        } else if (instrumento == "Guía de observación") {

          GuardainfoGuia();
        } else if (instrumento == "Rúbrica") {

          GuardainfoRubrica();
        }

        /*$.ajax({
          data: parametros,
          url: 'conexion/consultasNoSQL.php',
          type:'post',
          success: function(resultado){
            alert(resultado);  
          }          
        });*/
      });

      function GuardainfoRubrica() {
        var materia = $("#campoMateria")[0].innerHTML;
        var fa = document.getElementById("fa").value;
        var te = document.getElementById("te").value;
        var contenedor = document.getElementById("contenedor");
        var general = new Array();
        general.push(fa);
        general.push(te);
        var elems = contenedor.querySelectorAll('input,textarea,select');
        if (elems.length == 0) {
          alertify.error("<h4>Agregue indicadores</h4>");
        } else {
          for (var i = 0; i < elems.length; i += 12) {
            var vp = new Array();
            vp.push(elems[i].value);
            vp.push(elems[i + 1].value);
            var vi = new Array();
            var vii1 = new Array();
            vii1.push(elems[i + 2].value);
            vii1.push(elems[i + 3].value);
            vi.push(vii1);
            var vii2 = new Array();
            vii2.push(elems[i + 4].value);
            vii2.push(elems[i + 5].value);
            vi.push(vii2);
            var vii3 = new Array();
            vii3.push(elems[i + 6].value);
            vii3.push(elems[i + 7].value);
            vi.push(vii3);
            var vii4 = new Array();
            //alert("ok");
            vii4.push(elems[i + 8].value);
            //alert("ok");


            vii4.push(elems[i + 9].value);
            //alert("ok");
            vi.push(vii4);
            //alert("ok");
            var vii5 = new Array();
            vii5.push(elems[i + 10].value);
            vii5.push(elems[i + 11].value);
            vi.push(vii5);
            vp.push(vi);
            general.push(vp);

          }

          var cual = cualinstru;
          var periodo = document.getElementById("campoPeriodo").innerHTML;
          var grupo = document.getElementById("campoGrupo").innerHTML;
          var tem = document.getElementById("selectTema").value;

          var tabla = document.getElementById("matrizEvaluacion");
          var evidencia = tabla.rows[cual].cells[0].getElementsByTagName("select")[0].value;
          var instrumento = tabla.rows[cual].cells[8].getElementsByTagName("input")[0].value;
          var parametros = {
            "accion": "gindinst",
            "evidencia": evidencia,
            "instrumento": instrumento,
            "numero": cual,
            "periodo": periodo,
            "fechaaplicacion": fa,
            "tiempoevaluacion": te,
            "grupo": grupo,
            "tema": tem,
            "alcance": general,
            "minimos": general
          };
          //alert("oj");
          $.post("conexion/consultasNoSQL.php", parametros, function(mensaje) {

            alertify.success("Guardado", 5);

          });
          actualizaCamposTema(document.getElementById("selectTema").value);
        }
      }

      function GuardainfoGuia() {
        var materia = $("#campoMateria")[0].innerHTML;
        //alert(cual+evidencia+instrumento);

        var contenedor = document.getElementById("contenedor");
        var divs = contenedor.getElementsByClassName("categ");
        var fa = document.getElementById("fa").value;
        var te = document.getElementById("te").value;

        var general = new Array();
        general.push(fa);
        general.push(te);
        var ban1 = true;
        var ban2 = true;
        if (divs.length == 0) {
          ban1 = false;
        }
        for (var i = 0; i < divs.length; i++) {
          var acateg = new Array();

          var cat = divs[i].getElementsByTagName("input")[0].value;
          acateg.push(cat);
          divs2 = divs[i].getElementsByClassName("items");
          var aitemsg = new Array();
          if (divs2.length == 0) {
            ban2 = false;
          }
          for (var j = 0; j < divs2.length; j++) {
            var aitems = new Array();
            var items = divs2[j].getElementsByTagName("input");
            var indi = divs2[j].getElementsByTagName("select")[0].value;

            var ited = items[0].value;
            var pund = items[1].value;
            aitems.push(ited);
            aitems.push(pund);
            aitems.push(indi);
            aitemsg.push(aitems);
          }
          acateg.push(aitemsg);
          general.push(acateg);
        }
        if (ban1 && ban2) {
          var cual = cualinstru;
          var periodo = document.getElementById("campoPeriodo").innerHTML;
          var grupo = document.getElementById("campoGrupo").innerHTML;
          var tem = document.getElementById("selectTema").value;

          var tabla = document.getElementById("matrizEvaluacion");
          var evidencia = tabla.rows[cual].cells[0].getElementsByTagName("select")[0].value;
          var instrumento = tabla.rows[cual].cells[8].getElementsByTagName("input")[0].value;
          var parametros = {
            "accion": "gindinst",
            "evidencia": evidencia,
            "instrumento": instrumento,
            "numero": cual,
            "periodo": periodo,
            "fechaaplicacion": fa,
            "tiempoevaluacion": te,
            "grupo": grupo,
            "tema": tem,
            "alcance": general,
            "minimos": general
          };
          //alert("oj");
          $.post("conexion/consultasNoSQL.php", parametros, function(mensaje) {

            alertify.success("Guardado", 5);

          });
          actualizaCamposTema(document.getElementById("selectTema").value);
        } else {
          if (ban1 == false) {
            alertify.error("<h4>No hay categorías</h4>");
          }
          if (ban2 == false) {
            alertify.error("<h4>No hay indicadores en alguna categoría</h4>");
          }
        }

      }

      function GuardainfoCuestionario() {
        //alert("ok");
        var materia = $("#campoMateria")[0].innerHTML;
        //alert(cual+evidencia+instrumento);
        var periodo = document.getElementById("campoPeriodo").innerHTML;
        var grupo = document.getElementById("campoGrupo").innerHTML;
        var tem = document.getElementById("selectTema").value;
        var fa = document.getElementById("fa").value;
        var te = document.getElementById("te").value;
        if (fa == "" || te == "") {

        }

        var cual = cualinstru;
        var tabla = document.getElementById("matrizEvaluacion");
        var evidencia = tabla.rows[cual].cells[0].getElementsByTagName("select")[0].value;
        var instrumento = tabla.rows[cual].cells[8].getElementsByTagName("input")[0].value;

        var taa = new Array();
        var contin = 0;

        taa[contin] = fa;
        contin++;
        taa[contin] = te;
        contin++;
        ////////////////////////////////////////////////////////////7

        var vecgenpreg = [];
        vecgenpreg.push(fa);
        vecgenpreg.push(te);
        var pregrel1 = document.getElementById("minimos");
        var pregrel2 = pregrel1.getElementsByTagName("input");
        var pregrel3 = pregrel1.getElementsByTagName("select");
        var contpr = 0;

        var listaprorg = []; //para almacenar cada sección depreguntas
        if (pregrel2.length == 0) {
          alertify.error("<h4>Agregue preguntas de relacionar</h4>");
        } else {
          for (var i = 0; i < pregrel2.length; i += 3) {
            var listapr = [];
            listapr.push(pregrel2[i].value);
            listapr.push(pregrel2[i + 1].value);
            listapr.push(pregrel2[i + 2].value);
            listapr.push(pregrel3[contpr].value);
            listaprorg.push(listapr);
            contpr++;
          }

          vecgenpreg.push(listaprorg); //se añade al vector general de preguntas
          pregrel1 = document.getElementById("minimos2");
          pregrel2 = pregrel1.getElementsByTagName("input");
          pregrel3 = pregrel1.getElementsByTagName("select");
          var mps = document.getElementById("mps").value;
          //alert("okd"+mps);
          contpr = 0;
          if (pregrel2.length == 0) {
            alertify.error("<h4>Agregue preguntas de subrayar</h4>");
          } else {

            //var j;
            //alert("ok");
            var listapsorg = []; //para almacenar las preguntas de relacionar

            for (var i = 0; i < pregrel2.length; i += (2 + (mps * 2))) {
              var listasb2 = [];
              var listasb1 = [];
              //alert(i);
              for (var j = i; j < i + (2 + (mps * 2)); j++) {
                //alert(j);
                if (pregrel2[j].value == "on") {
                  //alert(pregrel2[j].checked);
                  listasb1.push(pregrel2[j].checked);
                } else {
                  listasb1.push(pregrel2[j].value);
                }
              }
              listasb1.push(pregrel3[contpr].value);
              //alert("ok");
              listasb2.push(listasb1);
              listapsorg.push(listasb2);
              //alert("ok3");
              contpr++;
            }
            //alert(""); 
            vecgenpreg.push(listapsorg);
            pregrel1 = document.getElementById("minimos3");
            pregrel2 = pregrel1.getElementsByTagName("input");
            pregrel3 = pregrel1.getElementsByTagName("select");
            if (pregrel2.length == 0) {
              alertify.error("<h4>Agregue preguntas de falso verdadero</h4>");
            } else {
              contpr = 0;
              var listapfvorg = [];
              for (var i = 0; i < pregrel2.length; i += 2) {
                var listapvf = [];
                listapvf.push(pregrel2[i].value);
                listapvf.push(pregrel3[contpr].value);
                contpr++;
                listapvf.push(pregrel2[i + 1].value);
                listapvf.push(pregrel3[contpr].value);
                listapfvorg.push(listapvf);
                contpr++;
              }
              vecgenpreg.push(listapfvorg);
              //alert(cual);

              var matriz = [];
              matriz.push(vecgenpreg);
              //alert(taa.length);
              //PORCENTAJE 30% DE 100

              //alert("ok");
              //alert("ok-");

              var parametros = {
                "accion": "gindinst",
                "evidencia": evidencia,
                "instrumento": instrumento,
                "numero": cual,
                "periodo": periodo,
                "fechaaplicacion": fa,
                "tiempoevaluacion": te,
                "grupo": grupo,
                "tema": tem,
                "alcance": matriz,
                "minimos": matriz
              };
              //alert("oj");
              $.post("conexion/consultasNoSQL.php", parametros, function(mensaje) {

                alertify.success("Guardado", 5);

              });
              actualizaCamposTema(document.getElementById("selectTema").value);
            }
          }
        }
      }
    </script>

    <script>
      //        function leerindicadoresinstru(){

      function borrainstrumentoevi(evidencia) {
        //alert("ik");
        alertify.confirm("Confirma que deseas borrar el instrumento guardado", function(e) {
          //alert("ok");
          var periodo = document.getElementById("campoPeriodo").innerHTML;
          var grupo = document.getElementById("campoGrupo").innerHTML;
          var tema = $('#selectTema').val();
          var parametros = {
            "accion": "borrarInstrumentoHec",
            "instru": evidencia,
            "periodo": periodo,
            "grupo": grupo,
            "tema": tema,
          };
          //var ata=false;
          $.post('conexion/consultasNoSQL.php', parametros, function() {});

          alertify.success("borrado", 5);
          actualizaCamposTema(document.getElementById("selectTema").value);
        });
      }
    </script>
    <input type="" name="" id="filatodo" style="display:none;">


    <script src="js/cargainstrumentacion.js"></script>


    <link rel="stylesheet" href="alertify/css/alertify.min.css" />

</body>

</html>