<?php
  require_once("../../valida.php");

  require_once 'conexion/conexionNoSQL.php';
  $connNoSQL = connNoSQL::singleton();

  $grupoins=$_GET['grupo'];
  $claveAsignatura = $_GET['claveAsignatura'];
  //echo $grupoins;
  //Eliminar espacios en blanco
  $buscar = " ";
  $reemplazar = "";
  $grupocompleto = str_replace($buscar, $reemplazar, $grupoins);
  //Acomodar los grupos por cuadro
  $grupo1 = substr($grupocompleto, 0, 4);
  $grupo2 = substr($grupocompleto, 5, 4);
  $grupo3 = substr($grupocompleto, 10, 4);
  $grupo4 = substr($grupocompleto, 15, 4);

  $grupo = substr($grupoins, 0,3);
  $periodo=$_GET['periodo'];
  $correo = $_SESSION['correo'];
  $nombre = isset($_GET['docenteEjemplo']) ? $_GET['docenteEjemplo'] : $_SESSION['nombreCompleto'];
  $tema = $_GET['tema'];
  $firma = isset($_GET['firma']) ? $_GET['firma'] : '';

  /* $projeccion = ["projection" => 
                  ["periodos_Inst.".$periodo.".".$claveAsignatura=>1,
                  "_id"=>0]];

  //Aqui se extraen los datos de MongoDB
  $instrumentacion = $connNoSQL->consultaProjeccion("instrumentaciones",["Instrumentos"=>"Carreras"],$projeccion); */

  //Aqui se extraen los datos de MongoDB
  //De la coleccion, filtar solamente la información de la carrera del array
  $agregacion = [
    [
      '$match' => ['Instrumentos' => 'Carreras']
    ], 
    [
      '$addFields' => [
        'periodos_Inst.'.$periodo.'.'.$claveAsignatura.'.TodasMaterias' => [
          '$filter' => [
            'input' => '$periodos_Inst.'.$periodo.'.'.$claveAsignatura.'.TodasMaterias', 
            'cond' => [
              '$eq' => [
                '$$this.Clave', $grupo
              ]
            ]
          ]
        ]
      ]
    ], 
    [
      '$project' => [
        '_id' => 0, 
        'periodos_Inst.'.$periodo.'.'.$claveAsignatura => 1
      ]
    ]
  ];
  $instrumentacion = $connNoSQL->agregacion("instrumentaciones", $agregacion);

  if(isset($instrumentacion[0]->periodos_Inst->$periodo->$claveAsignatura)){
    $instrumentacion = $instrumentacion[0]->periodos_Inst->$periodo->$claveAsignatura;
    //print_r($instrumentacion);
    //$temas = $instrumentacion->totalTemas;
 //   for ($tema=0; $tema < $temas; $tema++) { 
      //require("Instrumentacion.php");
   // 
      require("Instrumentacion.php");
    
  }else{
      print_r("No se encontró instrumentación");
  }




?>


<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">

<html>
<head>
<script type="text/javascript">
//window.onload = function(){alert("se cargo")}
</script>
</head>
<body>
<!--<form action="PDF.php" method="get">
<input type="hidden" id="enviarGrupo" name="grupo" value="2F31"/>
<input type="hidden" id="enviarPeriodo" name="periodo"/>
<input type="hidden" id="enviarTema" name="tema"/>
 <p><input type="submit" placeholder="Generar PDF" name="Generar"/></p>
</form>
-->
</body>
</html>