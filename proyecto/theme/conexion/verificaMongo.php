<?php
    require_once 'conexionNoSQL.php';
    $connNoSQL = connNoSQL::singleton();
    $projeccion = ["projection" => ["correo"=>1,"_id"=>0]];
    $docente = $connNoSQL->consultaProjeccion("docentes", ["correo" => $_SESSION["correo"]], $projeccion);
    if(!isset($docente[0]->correo)) {
        //Creación de la colección "docentes"
        $connNoSQL->insertar("docentes", ["correo" => $_SESSION["correo"], "nombre" => $_SESSION["nombreCompleto"]]);
    }

    //Creación de la colección "instrumentaciones" solo si no existe
    $instrumentaciones = $connNoSQL->consultaFiltrada("instrumentaciones", ["Instrumentos" => "Carreras"]);
    if(count($instrumentaciones) == 0 || is_null($instrumentaciones)) {
        $connNoSQL->insertar("instrumentaciones", ["Instrumentos" => "Carreras"]);
    }
?>