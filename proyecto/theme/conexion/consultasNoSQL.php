<?php

use Google\Service\ShoppingContent\Resource\Pos;

    if(!isset($_SESSION)) { 
        session_start();
    }
    require_once 'conexionNoSQL.php';
    $connNoSQL = connNoSQL::singleton();
    if(isset($_POST['accion'])  && !empty($_POST['accion'])){
        $action = $_POST['accion'];
        switch($action){
            case 'crearInstrumentacion':
                //$instrumentacion = $_POST['ins'];
                $grupo = $_POST['grupo'];
                $grupoins = substr($grupo, 0,3);
                $semestre = $_POST['semestre'];
                $periodo = $_POST['periodo'];
                $materia = $_POST['materia'];
                $temas =$_POST['temas'];
                $carrera = $_POST['carrera'];
                $clave = $_POST["clave"];
                $correo = $_SESSION['correo'];
                //$estatus = $_POST['estatus'];
                //Encabezado
                $encabezado = $_POST['encabezado'];
                //$revision = substr($encabezado, 36, 1);
                //$documento = substr($encabezado, 0,7);
                //$responsable = substr($encabezado, 37,21);
                //$fechaemision = substr($encabezado, 58,20);
                //$codigodocumento = substr($encabezado, 78,7);
                //$clausula = substr($encabezado, 7,29);

                $revision = $encabezado['revision'];
                $documento = $encabezado['documento'];
                $responsable = $encabezado['responsable'];
                $fechaemision = $encabezado['fechaEmision'];
                $codigodocumento = $encabezado['codigo'];
                $clausula = $encabezado['clausula'];
                $creditos = $_POST['creditos'];
            

                //Después del grupo. //Para guardar en docentes. //Carrera - Periodo - Clave de grupo - Materia.
                //$connNoSQL->modificar("docentes",["correo"=>$correo],["periodos_Inst.".$periodo.".Grupos"=>$grupos]);
                $connNoSQL->modificar("docentes",["correo"=>$correo],["periodos_Inst.".$periodo.".".$grupo.".Carrera"=>$carrera]);
                $connNoSQL->modificar("docentes",["correo"=>$correo],["periodos_Inst.".$periodo.".".$grupo.".Periodo"=>$periodo]);
                $connNoSQL->modificar("docentes",["correo"=>$correo],["periodos_Inst.".$periodo.".".$grupo.".Grupo"=>$grupo]);
                $connNoSQL->modificar("docentes",["correo"=>$correo],["periodos_Inst.".$periodo.".".$grupo.".Materia"=>$materia]);
                $connNoSQL->modificar("docentes",["correo"=>$correo],["periodos_Inst.".$periodo.".".$grupo.".totalTemas"=>$temas]);
                $connNoSQL->modificar("docentes",["correo"=>$correo],["periodos_Inst.".$periodo.".".$grupo.".Semestre"=>$semestre]);
                $connNoSQL->modificar("docentes",["correo"=>$correo],["periodos_Inst.".$periodo.".".$grupo.".ClaveAsignatura"=>$clave]);


                $connNoSQL->modificar("instrumentaciones", ["Instrumentos"=>"Carreras"],["periodos_Inst.".$periodo.".".$clave.".Materia"=>$materia]);
                //$connNoSQL->modificar("instrumentaciones", ["Instrumentos"=>"Carreras"],["periodos_Inst.".$periodo.".".$clave.".PE"=>$carrera]);
                //$connNoSQL->modificar("instrumentaciones", ["Instrumentos"=>"Carreras"],["periodos_Inst.".$periodo.".".$clave.".Semestre"=>$semestre]);
                $connNoSQL->modificar("instrumentaciones", ["Instrumentos"=>"Carreras"],["periodos_Inst.".$periodo.".".$clave.".totalTemas"=>$temas]);
                $connNoSQL->modificar("instrumentaciones", ["Instrumentos"=>"Carreras"],["periodos_Inst.".$periodo.".".$clave.".ClaveAsignatura"=>$clave]);

                /* Agregar al array del grupos que pertenecen a esa clave de asignatura solo si no existe */ 
                $connNoSQL->agregarAlArray(
                    "instrumentaciones", 
                    [
                        "Instrumentos"=>"Carreras", 
                        "periodos_Inst.".$periodo.".".$clave.".TodasMaterias.Clave" => [
                            '$ne' => $grupoins
                        ]
                    ], 
                    [
                        'periodos_Inst.'.$periodo.'.'.$clave.'.TodasMaterias' => ['Clave' => $grupoins, 'PE' => $carrera, 'Semestre' => $semestre]
                    ]
                );
                

                //Encabezado dentro de instrumentaciones
                $connNoSQL->modificar("instrumentaciones", ["Instrumentos"=>"Carreras"],["periodos_Inst.".$periodo.".".$clave.".Revision"=>$revision]);
                $connNoSQL->modificar("instrumentaciones", ["Instrumentos"=>"Carreras"],["periodos_Inst.".$periodo.".".$clave.".Documento"=>$documento]);
                $connNoSQL->modificar("instrumentaciones", ["Instrumentos"=>"Carreras"],["periodos_Inst.".$periodo.".".$clave.".Responsable"=>$responsable]);
                $connNoSQL->modificar("instrumentaciones", ["Instrumentos"=>"Carreras"],["periodos_Inst.".$periodo.".".$clave.".FechaEmision"=>$fechaemision]);
                $connNoSQL->modificar("instrumentaciones", ["Instrumentos"=>"Carreras"],["periodos_Inst.".$periodo.".".$clave.".CodigoDocumento"=>$codigodocumento]);
                $connNoSQL->modificar("instrumentaciones", ["Instrumentos"=>"Carreras"],["periodos_Inst.".$periodo.".".$clave.".Clausula"=>$clausula]);
                $connNoSQL->modificar("instrumentaciones", ["Instrumentos"=>"Carreras"],["periodos_Inst.".$periodo.".".$clave.".Creditos"=>$creditos]);
                $connNoSQL->modificar("instrumentaciones", ["Instrumentos"=>"Carreras", "periodos_Inst.".$periodo.".".$clave.".SoloLectura" => ['$exists' => false]],["periodos_Inst.".$periodo.".".$clave.".SoloLectura"=>false]);
                $connNoSQL->modificar("instrumentaciones", ["Instrumentos"=>"Carreras", "periodos_Inst.".$periodo.".".$clave.".Validacion.Estatus" => ['$exists' => false]],["periodos_Inst.".$periodo.".".$clave.".Validacion"=>["Estatus"=>false]]);
            break;
            case 'borrarInstrumentacion':
                //$instrumentacion = $_POST['ins'];
                $grupo = $_POST['grupo'];
                $grupoins = substr($grupo, 0,3);
                $periodo = $_POST['periodo'];
                $correo = $_SESSION['correo'];
                $claveAsignatura = $_POST['claveAsignatura'];
                //$connNoSQL->modificar("docentes",["correo"=>$correo],["periodos_Inst.".$periodo.".Grupos"=>$grupos]);
                $campo = ["periodos_Inst.".$periodo.".".$grupo=>1];
                $campoins = ["periodos_Inst.".$periodo.".".$grupoins=>1];
                $connNoSQL->eliminarCampo("docentes",["correo"=>$correo],$campo);
                //$connNoSQL->eliminarCampo("instrumentaciones",["Instrumentos"=>"Carreras"],$campoins);

                //Una vez que se borra la instrumentacion de la coleccion de docentes, es necesario eliminar
                //alguna referencia de la misma en la colecciones de instrumentaciones, especificamente
                //dentro del campo de Temas y asu ves dentro de los campos de Fechas y Semanas
                $projeccion = ["projection" => ["periodos_Inst." . $periodo . "." . $claveAsignatura . ".Temas" => 1, "_id" => 0]];
                $temasInst = $connNoSQL->consultaProjeccion("instrumentaciones", ["Instrumentos" => "Carreras"], $projeccion);

                //Si la consulta arroja datos, iterar los temas que tiene para eliminar los grupos que estan dentro del campo Fecha y Semanas
                if(isset($temasInst[0]->periodos_Inst->$periodo->$claveAsignatura->Temas)) {
                    $t = $temasInst[0]->periodos_Inst->$periodo->$claveAsignatura->Temas;
                    //echo json_encode($t);
                    foreach($t as $key => $value) {
                        if(isset($value->Fechas->$grupo)) {
                            //Si existe el campo del grupo a eliminar dentro de Fechas, actualizar y eliminarlo de la coleccion
                            $campoins = ["periodos_Inst." . $periodo . "." . $claveAsignatura . ".Temas." . $key . ".Fechas." . $grupo => 1];
                            $connNoSQL->eliminarCampo("instrumentaciones", ["Instrumentos" => "Carreras"], $campoins);
                        }
                    }
                    foreach($t as $key => $value) {
                        if(isset($value->Semanas->$grupo)) {
                            //Si existe el campor del grupo a eliminar dentro de Semanas, actualizar y eliminarlo de la collecion
                            $campoins = ["periodos_Inst." . $periodo . "." . $claveAsignatura . ".Temas." . $key . ".Semanas." . $grupo => 1];
                            $connNoSQL->eliminarCampo("instrumentaciones", ["Instrumentos" => "Carreras"], $campoins);
                        }
                    }
                } 
                
            break;
            case 'obtenerGrupos':
                $periodo = $_POST['periodo'];
                $correo = $_SESSION['correo'];
                //$projeccion = ["projection" => ["periodos_Inst.".$periodo.".Grupos"=>1,"_id"=>0]];
                $projeccion = ["projection" => ["periodos_Inst." . $periodo => 1, "_id" => 0]];
                $tema = $connNoSQL->consultaProjeccion("docentes",["correo"=>$correo],$projeccion);
                if(isset($tema[0]->periodos_Inst->$periodo)) {
                    $t = $tema[0]->periodos_Inst->$periodo;
                    echo json_encode($t);
                } else {
                    echo json_encode("");
                }
                
                //if(isset($tema[0]->periodos_Inst->$periodo->Grupos)){
                  //  $t = $tema[0]->periodos_Inst->$periodo->Grupos;
                    //echo json_encode($t);//$tema[0]->periodos_Inst->{'JULIO-DICIEMBRE 2018'}->{'1F11'}->Tema->$tema;
                //}else{
                  //  echo json_encode("");
                //}
                

            break;
            case 'guardarCampo':         
                $valor=$_POST['valor'];
                $campo=$_POST['campo'];
                $grupo=$_POST['grupo'];
                $grupoins = substr($grupo, 0,3);
                $periodo = $_POST['periodo'];
                $correo = $_SESSION['correo'];
                $claveAsignatura = $_POST['claveAsignatura'];
                $connNoSQL->modificar("instrumentaciones",["Instrumentos"=>"Carreras"],["periodos_Inst.".$periodo.".".$claveAsignatura.".".$campo=>$valor]);
            break;
            case 'guardarCampoPlanEstudio':
                $valor = $_POST['valor'];
                $campo = $_POST['campo'];
                $grupo = $_POST['grupo'];
                $grupoins = substr($grupo, 0, 3);
                $periodo = $_POST['periodo'];
                $correo = $_SESSION['correo'];
                $claveAsignatura = $_POST['claveAsignatura'];
                
                $filtro = ["Instrumentos"=>"Carreras", "periodos_Inst.".$periodo.".".$claveAsignatura.".TodasMaterias.Clave" => $grupoins];
                $nuevo = ["periodos_Inst.".$periodo.".".$claveAsignatura.".TodasMaterias.$.PlanEstudios" => $valor];
                $connNoSQL->modificar("instrumentaciones", $filtro, $nuevo);
                break;
            case 'guardarCampoTema': //Cambia, se crea la nueva instrumentación
                $valor=$_POST['valor'];
                $campo=$_POST['campo'];
                $grupo=$_POST['grupo'];
                $grupoins = substr($grupo, 0,3);
                $tema=$_POST['tema'];
                $periodo=$_POST['periodo'];
                $correo = $_SESSION['correo'];
                $claveAsignatura = $_POST['claveAsignatura'];
                $connNoSQL->modificar("instrumentaciones",["Instrumentos"=>"Carreras"],["periodos_Inst.".$periodo.".".$claveAsignatura.".Temas.".$tema.".".$campo=>$valor]);
            break;
            case 'obtenerTemas':
                $tema=$_POST['tema'];
                $grupo=$_POST['grupo'];
                $grupoins = substr($grupo, 0,3);
                $periodo=$_POST['periodo'];
                $correo = $_SESSION['correo'];
                $claveAsignatura = $_POST['claveAsignatura'];
                $projeccion = ["projection" => ["periodos_Inst.".$periodo.".".$claveAsignatura.".Temas.".$tema=>1,"_id"=>0]];
                $tema = $connNoSQL->consultaProjeccion("instrumentaciones",["Instrumentos"=>"Carreras"],$projeccion);
                if(isset($tema[0]->periodos_Inst->{$periodo}->$claveAsignatura->Temas)){
                    $t = $tema[0]->periodos_Inst->{$periodo}->$claveAsignatura->Temas;
                    echo json_encode($t);
                    //$tema[0]->periodos_Inst->{'JULIO-DICIEMBRE 2018'}->{'1F11'}->Tema->$tema;
                }else{
                    echo json_encode("");
                }
            break;
            //Cambiar grupo
            case 'obtenerCampos':
                $grupo=$_POST['grupo'];
                $grupoins = substr($grupo, 0,3);
                $periodo=$_POST['periodo'];
                $correo = $_SESSION['correo'];
                $claveAsignatura = $_POST['claveAsignatura'];
                $caracterizacion = "";
                $intencionDidactica = "";
                $competenciasPrevias = "";
                $competenciaEA = "";

                /* $projeccion = ["projection" => 
                                ["periodos_Inst.".$periodo.".".$claveAsignatura.".Caracterizacion"=>1,
                                 "periodos_Inst.".$periodo.".".$claveAsignatura.".totalTemas"=>1,
                                 "periodos_Inst.".$periodo.".".$claveAsignatura.".Materia"=>1,
                                 "periodos_Inst.".$periodo.".".$claveAsignatura.".IntencionDidactica"=>1,
                                 "periodos_Inst.".$periodo.".".$claveAsignatura.".CompetenciasPrevias"=>1,
                                 //"periodos_Inst.".$periodo.".".$grupoins.".PE"=>1,
                                 "periodos_Inst.".$periodo.".".$claveAsignatura.".PlanEstudios"=>1,
                                 "periodos_Inst.".$periodo.".".$claveAsignatura.".ClaveAsignatura"=>1,
                                 "periodos_Inst.".$periodo.".".$claveAsignatura.".Creditos"=>1,
                                 //"periodos_Inst.".$periodo.".".$grupoins.".Semestre"=>1,
                                 "periodos_Inst.".$periodo.".".$claveAsignatura.".CompetenciaEA"=>1,
                                 "periodos_Inst.".$periodo.".".$claveAsignatura.".Documento"=>1,
                                 "periodos_Inst.".$periodo.".".$claveAsignatura.".Clausula"=>1,
                                 "periodos_Inst.".$periodo.".".$claveAsignatura.".Revision"=>1,
                                 "periodos_Inst.".$periodo.".".$claveAsignatura.".Responsable"=>1,
                                 "periodos_Inst.".$periodo.".".$claveAsignatura.".FechaEmision"=>1,
                                 "periodos_Inst.".$periodo.".".$claveAsignatura.".CodigoDocumento"=>1,
                                 "periodos_Inst.".$periodo.".".$claveAsignatura.".TodasMaterias"=>1,

                                 "_id"=>0]];
                $instrumentacion = $connNoSQL->consultaProjeccion("instrumentaciones",["Instrumentos"=>"Carreras"],$projeccion); */

                $agregacion = [
                    [
                        '$match' => [
                            'Instrumentos' => 'Carreras'
                        ]
                    ], 
                    [
                        '$project' => [
                            'periodos_Inst.'.$periodo.'.'.$claveAsignatura.'.Caracterizacion' => 1, 
                            'periodos_Inst.'.$periodo.'.'.$claveAsignatura.'.totalTemas' => 1, 
                            'periodos_Inst.'.$periodo.'.'.$claveAsignatura.'.Materia' => 1, 
                            'periodos_Inst.'.$periodo.'.'.$claveAsignatura.'.IntencionDidactica' => 1, 
                            'periodos_Inst.'.$periodo.'.'.$claveAsignatura.'.CompetenciasPrevias' => 1, 
                            'periodos_Inst.'.$periodo.'.'.$claveAsignatura.'.PlanEstudios' => 1, 
                            'periodos_Inst.'.$periodo.'.'.$claveAsignatura.'.ClaveAsignatura' => 1, 
                            'periodos_Inst.'.$periodo.'.'.$claveAsignatura.'.Creditos' => 1, 
                            'periodos_Inst.'.$periodo.'.'.$claveAsignatura.'.CompetenciaEA' => 1, 
                            'periodos_Inst.'.$periodo.'.'.$claveAsignatura.'.Documento' => 1, 
                            'periodos_Inst.'.$periodo.'.'.$claveAsignatura.'.Clausula' => 1, 
                            'periodos_Inst.'.$periodo.'.'.$claveAsignatura.'.Revision' => 1, 
                            'periodos_Inst.'.$periodo.'.'.$claveAsignatura.'.Responsable' => 1, 
                            'periodos_Inst.'.$periodo.'.'.$claveAsignatura.'.FechaEmision' => 1, 
                            'periodos_Inst.'.$periodo.'.'.$claveAsignatura.'.CodigoDocumento' => 1, 
                            'periodos_Inst.'.$periodo.'.'.$claveAsignatura.'.TodasMaterias' => [
                                '$filter' => [
                                    'input' => '$periodos_Inst.'.$periodo.'.'.$claveAsignatura.'.TodasMaterias', 
                                    'cond' => [
                                        '$eq' => [
                                            '$$this.Clave', $grupoins
                                        ]
                                    ]
                                ]
                            ], 
                            'periodos_Inst.'.$periodo.'.'.$claveAsignatura.'.SoloLectura' => 1,
                            'periodos_Inst.'.$periodo.'.'.$claveAsignatura.'.Validacion.Estatus' => 1,
                            '_id' => 0
                        ]
                    ],
                    [
                        '$unwind' => [
                            'path' => '$periodos_Inst.'.$periodo.'.'.$claveAsignatura.'.TodasMaterias'
                        ]
                    ]
                ];
                $instrumentacion = $connNoSQL->agregacion("instrumentaciones", $agregacion);
                
                if(isset($instrumentacion[0]->periodos_Inst->$periodo->$claveAsignatura)){
                    $instrumentacion = $instrumentacion[0]->periodos_Inst->$periodo->$claveAsignatura;
                    echo json_encode($instrumentacion);
                }else{
                    echo "";
                }

            break;
            case 'obtenerInstrumentacion':
                $grupo=$_POST['grupo'];
                $grupoins = substr($grupo, 0,3);
                $claveAsignatura = $_POST['claveAsignatura'];
                $periodo=$_POST['periodo']; 
                $correo = $_SESSION['correo'];
                $projeccion = ["projection" => 
                                ["periodos_Inst.".$periodo.".".$claveAsignatura=>1,
                                "_id"=>0]];

                $instrumentacion = $connNoSQL->consultaProjeccion("instrumentaciones",["Instrumentos"=>"Carreras"],$projeccion);
                if(isset($instrumentacion[0]->periodos_Inst->$periodo->$claveAsignatura)){
                    $instrumentacion = $instrumentacion[0]->periodos_Inst->$periodo->$claveAsignatura;
                    echo json_encode($instrumentacion);
                }else{
                    echo "";
                }

            break;  

            case 'buscarEviHec':
                $correo = $_SESSION['correo'];
                //$numero=$_POST["numero"];
                $periodo=$_POST["periodo"];
                $grupo=$_POST["grupo"];
                $grupoins = substr($grupo, 0, 3);
                $tema=$_POST["tema"];
                $cualevi=$_POST["cualevi"];
                $claveAsignatura = $_POST['claveAsignatura'];
                $projeccion = ["projection" => 
                    ["periodos_Inst.".$periodo.".".$claveAsignatura.".InstrumentosMatriz.Temas.".$tema.".".$cualevi=>1,
                     "_id"=>0]];
                $instrumentacion = $connNoSQL->consultaProjeccion("instrumentaciones",["Instrumentos"=>"Carreras"],$projeccion);
                //echo $cualevi;
                if(isset($instrumentacion[0]->periodos_Inst->$periodo->$claveAsignatura->InstrumentosMatriz->Temas->$tema->$cualevi)){
                    $instrumentacion = $instrumentacion[0]->periodos_Inst->$periodo->$claveAsignatura->InstrumentosMatriz->Temas->$tema->$cualevi;
                    echo "si";
                    //return $instrumenta
                }else{
                    echo "";
                }
            break;
            case 'obtenerCamposListaHec':
                $correo = $_SESSION['correo'];
                $evidencia=$_POST["evidencia"];
                $instrumento=$_POST["instrumento"];
                $numero=$_POST["numero"];
                $periodo=$_POST["periodo"];
                $grupo=$_POST["grupo"];
                $claveAsignatura = $_POST["claveAsignatura"];
                $grupoins = substr($grupo, 0, 3);
                $tema=$_POST["tema"];
                $numero=$numero-2;
                $instru=$instrumento;
                //echo "ok".$grupo;
                $projeccion = ["projection" => 
                    ["periodos_Inst.".$periodo.".".$claveAsignatura.".InstrumentosMatriz.Temas.".$tema.".".$instru=>1,
                     "_id"=>0]];
                //echo $projeccion["projection"];
                $instrumentacion = $connNoSQL->consultaProjeccion("instrumentaciones",["Instrumentos"=>"Carreras"],$projeccion);

                if(isset($instrumentacion[0]->periodos_Inst->$periodo->$claveAsignatura->InstrumentosMatriz->Temas->$tema->$instru)){
                    $instrumentacion = $instrumentacion[0]->periodos_Inst->$periodo->$claveAsignatura->InstrumentosMatriz->Temas->$tema->$instru;
                    echo json_encode($instrumentacion);
                    //return $instrumenta
                }else{
                    echo "";
                }

            break;

            case 'gindinst':
                $correo = $_SESSION['correo'];
                $evidencia=$_POST["evidencia"];
                $instrumento=$_POST["instrumento"];
                $numero=$_POST["numero"];
                $periodo=$_POST["periodo"];
                $fa=$_POST["fechaaplicacion"];
                $te=$_POST["tiempoevaluacion"];
                $grupo=$_POST["grupo"];
                $tema=$_POST["tema"];
                $alcances=$_POST["alcance"];
                $minimos=$_POST["minimos"];
                $campo="12";
                $grupoins = substr($grupo, 0, 3);
                $claveAsignatura = $_POST["claveAsignatura"];
                //$numero=$numero-2;
                 //$connNoSQL->modificar("docentes",["correo"=>$correo],["periodos_Inst.".$periodo.".".$grupo.".Temas.".$tema.".".$campo=>$valor]);
                //$connNoSQL->modificar("docentes",["correo"=>$correo],["periodos_Inst.".$periodo.".".$grupo.".Temas.".$tema.".".$instrumento=>$alcances]);              
                //$connNoSQL->modificar("instrumentaciones",["Instrumentos"=>"Carreras"],["periodos_Inst.".$periodo.".".$grupo.".Temas.".$tema.".".$instrumento=>$alcances]);
                
                $connNoSQL->modificar("instrumentaciones",["Instrumentos"=>"Carreras"],["periodos_Inst.".$periodo.".".$claveAsignatura.".InstrumentosMatriz.Temas.".$tema.".".$instrumento=>$alcances]);

            break;
            case 'borrarInstrumentoHec':
                //$instrumentacion = $_POST['ins'];
                //echo "ok";
                $grupo = $_POST['grupo'];
                $grupoins = substr($grupo, 0, 3);
                $periodo = $_POST['periodo'];
                //$grupo = $_POST['grupo'];
                $correo = $_SESSION['correo'];
                $tema = $_POST['tema'];
                $instru = $_POST['instru'];
                //$instru="UvLDel6Be9ListEnsa";
                $claveAsignatura = $_POST['claveAsignatura'];

                //$connNoSQL->modificar("docentes",["correo"=>$correo],["periodos_Inst.".$periodo.".Grupos"=>$grupos]);
                //$campo = ["periodos_Inst.".$periodo.".".$grupo=>1];
                $campo = ["periodos_Inst.".$periodo.".".$claveAsignatura.".InstrumentosMatriz.Temas.".$tema.".".$instru=>1];
                echo $instru;
                $connNoSQL->eliminarCampo("instrumentaciones",["Instrumentos"=>"Carreras"],$campo);
            break;
            
            case 'trinstrumentosHec':
                $instrumento=$_POST["instru"];
                $correo = $_SESSION['correo'];
                
                $projeccion = ["projection"=>["periodos_Inst"=>1]];
                //echo $projeccion["projection"];
                $instrumentacion = $connNoSQL->consultaProjeccion("instrumentaciones",["Instrumentos"=>"Carreras"],$projeccion);

                if(isset($instrumentacion[0]->periodos_Inst)){
                    $instrumentacion = $instrumentacion[0]->periodos_Inst;
                    echo json_encode($instrumentacion);
                    //return $instrumenta
                }else{
                    echo "";
                }              
            break;
            case "guardarseguimiento":
                //$instrumento=$_POST["instru"];
                $grupoins = $_POST['grupo'];
                $periodo=$_POST['periodo'];
                $tipo=$_POST["tipo"];
                $nseg=$_POST["nseg"];
                $correo = $_SESSION['correo'];
                $datos=$_POST['datos'];      
                $connNoSQL->modificar("docentes",["correo"=>$correo],["periodos_Inst.".$periodo.".".$grupoins.".seguimiento.".$nseg.".".$tipo=>$datos]);              
            break;
            case "guardarseguimientof":
                //$instrumento=$_POST["instru"];
                $grupoins = $_POST['grupo'];
                $periodo=$_POST['periodo'];
                $tipo=$_POST["tipo"];
                $nseg=$_POST["nseg"];
                $correo = $_SESSION['correo'];
                $datos=$_POST['datos'];      
                $connNoSQL->modificar("docentes",["correo"=>$correo],["periodos_Inst.".$periodo.".".$grupoins.".seguimiento.".$nseg.".".$tipo.".rf"=>$datos]);              
            break;
            case "getseguimientophp":
                $grupoins = $_POST['grupo'];
                $periodo=$_POST['periodo'];
                $correo = $_SESSION['correo'];


                $projeccion = ["projection" => 
                    ["periodos_Inst.".$periodo.".".$grupoins.".seguimiento"=>1,
                     "_id"=>0]];
                //echo $projeccion["projection"];
                $docentes = $connNoSQL->consultaProjeccion("docentes",["correo"=>$correo],$projeccion);

                if(isset($docentes[0]->periodos_Inst->$periodo->$grupoins->seguimiento)){
                    $docente = $docentes[0]->periodos_Inst->$periodo->$grupoins->seguimiento;
                    $a= json_encode($docente);
                    //return $instrumenta
                }else{
                    echo "";
                }
            break;



            case 'mandarInstrumentacionDocente':
                //Cambiar el estatus de la instrumentacion y ponerlo como Solo lectura
                //Almacenar la firma en el documento de la coleccion de docentes
                $grupo=$_POST['grupo'];
                $grupoins = substr($grupo, 0,3);
                $periodo = $_POST['periodo'];
                $correo = $_SESSION['correo'];
                $claveAsignatura = $_POST['claveAsignatura'];
                $connNoSQL->modificar("instrumentaciones",["Instrumentos"=>"Carreras"],["periodos_Inst.".$periodo.".".$claveAsignatura.".SoloLectura"=>true]);
                //$connNoSQL->modificar("instrumentaciones",["Instrumentos"=>"Carreras"],["periodos_Inst.".$periodo.".".$claveAsignatura.".Validacion.Responsable"=>["ID" => $idPresidente, "Nombre" => $nombrePresidente, "Correo" => $correoPresidente]]);
                echo json_encode(['success' => true, 'mensaje' => 'La instrumentación ahora podrá ser vista por el presidente de grupo académico para su respectiva validación.']);
            break;

            case 'obtenerInstrumentacionesPorPresidente':
                $periodo = $_POST['periodo'];
                $materiasLista = $_POST['materiasLista'];
                //Obtener que instrumentaciones debe de validar el presidente de grupo academico
                //Esto se obtiene gracias a la lista de materias que el presidente tiene a cargo
                //Se hace una busqueda en MongoDB con la finalidad de obtener solo las instrumentaciones que incluyan las materias antes mencionadas conforme los docentes van generando instrumentaciones
                //Esto se hace con una agregacion 

                $pipeline = [
                    [
                        '$match' => ['Instrumentos' => 'Carreras']
                    ], 
                    [
                        '$project' => [
                            '_id' => 0, 
                            'instrumentaciones' => [
                                '$objectToArray' => '$periodos_Inst.' . $periodo
                            ]
                        ]
                    ], 
                    [
                        '$unwind' => ['path' => '$instrumentaciones']
                    ], 
                    [
                        '$project' => [
                            'instrumentaciones.k' => 1, 
                            'instrumentaciones.v.Materia' => 1, 
                            'instrumentaciones.v.totalTemas' => 1, 
                            'instrumentaciones.v.ClaveAsignatura' => 1, 
                            'instrumentaciones.v.TodasMaterias' => 1, 
                            'instrumentaciones.v.SoloLectura' => 1, 
                            'instrumentaciones.v.Validacion' => 1, 
                            'instrumentaciones.v.Temas' => [
                                '$map' => [
                                    'input' => [
                                        '$objectToArray' => '$instrumentaciones.v.Temas'
                                    ],
                                    'in' => [
                                        'Tema' => '$$this.k',
                                        'Matriz' => '$$this.v.MatrizEvaluacion'
                                    ]
                                ]
                            ]
                        ]
                    ],
                    [
                        '$match' => [
                            'instrumentaciones.v.TodasMaterias.Clave' => [
                                '$in' => $materiasLista
                            ], 
                            'instrumentaciones.v.SoloLectura' => true
                        ]
                    ], 
                    [
                        '$unwind' => ['path' => '$instrumentaciones.v.TodasMaterias']
                    ], 
                    [
                        '$lookup' => [
                            'from' => 'docentes', 
                            'let' => ['grupoinst' => '$instrumentaciones.v.TodasMaterias.Clave'], 
                            'pipeline' => [
                                [
                                    '$project' => [
                                        '_id' => 0, 
                                        'nombre' => 1, 
                                        'correo' => 1, 
                                        'grupo' => [
                                            '$map' => [
                                                'input' => ['$objectToArray' => '$periodos_Inst.' . $periodo], 
                                                'in' => [
                                                    'k' => ['$substr' => ['$$this.k', 0, 3]], 
                                                    'v' => '$$this.v'
                                                ]
                                            ]
                                        ]
                                    ]
                                ], 
                                [
                                    '$unwind' => ['path' => '$grupo']
                                ], 
                                [
                                    '$match' => [
                                        '$expr' => [
                                            '$eq' => ['$grupo.k', '$$grupoinst']
                                        ]
                                    ]
                                ]
                            ], 
                            'as' => 'instrumentaciones.v.TodasMaterias.Docentes'
                        ]
                    ], 
                    [
                        '$addFields' => [
                            'instrumentaciones.v.TodasMaterias.Docentes' => [
                                '$map' => [
                                    'input' => '$instrumentaciones.v.TodasMaterias.Docentes', 
                                    'in' => [
                                        'correo' => '$$this.correo', 
                                        'nombre' => '$$this.nombre', 
                                        'grupo' => '$$this.grupo.v.Grupo'
                                    ]
                                ]
                            ]
                        ]
                    ], 
                    [
                        '$group' => [
                            '_id' => '$instrumentaciones.k', 
                            'docentes' => [
                                '$push' => '$instrumentaciones.v.TodasMaterias'
                            ]
                        ]
                    ], 
                    [
                        '$lookup' => [
                            'from' => 'instrumentaciones', 
                            'let' => ['claveinst' => '$_id'], 
                            'pipeline' => [
                                [
                                    '$project' => [
                                        '_id' => 0, 
                                        'instrumentaciones' => [
                                            '$objectToArray' => '$periodos_Inst.' . $periodo
                                        ]
                                    ]
                                ], 
                                [
                                    '$unwind' => ['path' => '$instrumentaciones']
                                ], 
                                [
                                    '$project' => [
                                        'instrumentaciones.k' => 1, 
                                        'instrumentaciones.v.Materia' => 1, 
                                        'instrumentaciones.v.totalTemas' => 1, 
                                        'instrumentaciones.v.ClaveAsignatura' => 1, 
                                        'instrumentaciones.v.TodasMaterias' => 1, 
                                        'instrumentaciones.v.SoloLectura' => 1, 
                                        'instrumentaciones.v.Validacion' => 1, 
                                        'instrumentaciones.v.Temas' => [
                                            '$map' => [
                                                'input' => [
                                                    '$objectToArray' => '$instrumentaciones.v.Temas'
                                                ],
                                                'in' => [
                                                    'Tema' => '$$this.k',
                                                    'Matriz' => '$$this.v.MatrizEvaluacion'
                                                ]
                                            ]
                                        ]
                                    ],
                                ],
                                [
                                    '$match' => [
                                        'instrumentaciones.v.TodasMaterias.Clave' => [
                                            '$in' => $materiasLista
                                        ], 
                                        'instrumentaciones.v.SoloLectura' => true
                                    ]
                                ], 
                                [
                                    '$match' => [
                                        '$expr' => [
                                            '$eq' => ['$instrumentaciones.k', '$$claveinst']
                                        ]
                                    ]
                                ]
                            ], 
                            'as' => 'instruDetalle'
                        ]
                    ], 
                    [
                        '$unwind' => ['path' => '$instruDetalle']
                    ], 
                    [
                        '$project' => [
                            '_id' => 1, 
                            'docentes' => 1, 
                            'instruDetalle' => '$instruDetalle.instrumentaciones'
                        ]
                    ], 
                    [
                        '$addFields' => ['instruDetalle.v.TodasMaterias' => '$docentes']
                    ], 
                    [
                        '$replaceRoot' => ['newRoot' => '$instruDetalle']
                    ]
                ];

                $instrumentaciones = $connNoSQL->agregacion("instrumentaciones", $pipeline);
                echo json_encode(['success' => true, 'data' => $instrumentaciones]);

            break;
            
            case 'mostrarVistaEvidenciaAprendizaje': 
                $periodo = $_POST['periodo'];
                $claveAsignatura = $_POST['claveAsignatura'];
                $tema = $_POST['tema'];
                $evidencia = $_POST['evidencia'];
                //Obtener la información de una evidencia de aprendizaje de algun tema para mostrarlo en las vistas correspondientes
                $pipeline = [
                    [
                        '$match' => ['Instrumentos' => 'Carreras']
                    ], 
                    [
                        '$project' => [
                            '_id' => 0, 
                            'Materia' => '$periodos_Inst.' . $periodo . '.' . $claveAsignatura . '.Materia', 
                            'CompetenciaET' => '$periodos_Inst.' . $periodo . '.' . $claveAsignatura . '.Temas.' . $tema. '.CompetenciaET', 
                            'NombreTema' => '$periodos_Inst.' . $periodo . '.' . $claveAsignatura . '.Temas.' . $tema . '.TituloTema',
                            'DatosEvidencia' => [
                                '$filter' => [
                                    'input' => '$periodos_Inst.' . $periodo . '.' . $claveAsignatura . '.Temas.' . $tema .'.MatrizEvaluacion', 
                                    'as' => 'evidencia', 
                                    'cond' => [
                                        '$eq' => [
                                            [
                                                '$arrayElemAt' => ['$$evidencia', 12]
                                            ], 
                                            $evidencia
                                        ]
                                    ]
                                ]
                            ], 
                            'ContenidoInstrumento' => '$periodos_Inst.' . $periodo . '.' . $claveAsignatura . '.InstrumentosMatriz.Temas.' . $tema . '.' . $evidencia
                        ]
                    ], 
                    [
                        '$unwind' => ['path' => '$DatosEvidencia']
                    ]
                ];

                $instrumento = $connNoSQL->agregacion("instrumentaciones", $pipeline);
                echo json_encode(['success' => true, 'data' => $instrumento]);
            break;

            //Denegar una instrumentacion por parte del presidente de grupo academico
            case 'denegarInstruPresidente': 
                $periodo = $_POST['periodo'];
                $claveAsignatura = $_POST['clave-asignatura'];
                $observaciones = $_POST['observaciones'];
                $idPresidente = $_POST['idPresi'];
                $nombrePresidente = $_POST['nombrePresi'];
                $correoPresidente = $_POST['correo'];

                //Actualizar la instrumentacion de ReadOnly a false para que se puede editar nuevamente
                $connNoSQL->modificar("instrumentaciones",["Instrumentos"=>"Carreras"],["periodos_Inst.".$periodo.".".$claveAsignatura.".SoloLectura" => false]);
                //$connNoSQL->modificar("instrumentaciones",["Instrumentos"=>"Carreras"],["periodos_Inst.".$periodo.".".$claveAsignatura.".Validacion.Estatus" => false]);
                //$connNoSQL->eliminarCampo("instrumentaciones",["Instrumentos"=>"Carreras"],["periodos_Inst.".$periodo.".".$claveAsignatura.".Validacion.InfoPresidente" => 1]);

                //Guardar los mensajes u observaciones en Mongo para que los docentes puedan verlos en su sección correspondiente
                date_default_timezone_set('America/Mexico_City');
                $connNoSQL->agregarAlArray("instrumentaciones", ["Instrumentos" => "Carreras"], ["periodos_Inst." . $periodo . "." . $claveAsignatura . ".Validacion.Observaciones" => ['IdObservacion' => new MongoDB\BSON\ObjectId(),'IdPresidente' => $idPresidente, 'CorreoPresidente' => $correoPresidente, 'NombrePresidente' => $nombrePresidente, 'InfoMensaje' => ['Mensaje' => $observaciones, 'FechaHora' => date('I') ? date('Y-m-d H:i:s', strtotime('-1 hour')) : date('Y-m-d H:i:s'), 'Leido' => false]]]);

                echo json_encode(['success' => true, 'mensaje' => 'Ahora los docentes podrán modificar la instrumentación, recibirán las observaciones o retroalimentación ingresada.']);
            break;

            //Autorizar una instrumentación por parte del presidente de grupo academico
            case 'autorizarInstruPresidente':
                $periodo = $_POST['periodo'];
                $claveAsignatura = $_POST['clave-asignatura'];
                $idPresidente = $_POST['idPresi'];
                $nombrePresidente = $_POST['nombrePresi'];
                $correoPresidente = $_POST['correo'];
                $grupoAcademico = $_POST['grupoAcademico'];
                
                //Actualizar el valor de estatus validacion (Presidente) a true y poner los datos del presidente que valido la misma
                $connNoSQL->modificar("instrumentaciones", ["Instrumentos"=>"Carreras"], ["periodos_Inst." . $periodo . "." . $claveAsignatura . ".Validacion.Estatus" => true]);
                $connNoSQL->modificar("instrumentaciones", ["Instrumentos"=>"Carreras"], ["periodos_Inst." . $periodo . "." . $claveAsignatura . ".Validacion.InfoPresidente" => ['IdPresidente' => $idPresidente, 'NombrePresidente' => $nombrePresidente, 'CorreoPresidente' => $correoPresidente, 'GrupoAcademico' => $grupoAcademico]]);

                echo json_encode(['success' => true, 'mensaje' => 'Has validado la instrumentación, ahora puede ser vista por los respectivos jefes de división para su revisión y autorización.']);
            break;

            //Autorizar multiples instrumentaciones al mismo tiempo por parte del presidente de grupo academico
            case 'autorizarMultipleInstruPresidente': 
                $periodo = $_POST['periodo'];
                $idPresidente = $_POST['idPresi'];
                $nombrePresidente = $_POST['nombrePresi'];
                $correoPresidente = $_POST['correo'];
                $listaInstrumentos = $_POST['listaInstrumentos'];

                foreach($listaInstrumentos as $instru) {
                    $connNoSQL->modificar("instrumentaciones", ["Instrumentos"=>"Carreras"], ["periodos_Inst." . $periodo . "." . $instru[0] . ".Validacion.Estatus" => true]);
                    $connNoSQL->modificar("instrumentaciones", ["Instrumentos"=>"Carreras"], ["periodos_Inst." . $periodo . "." . $instru[0] . ".Validacion.InfoPresidente" => ["IdPresidente" => $idPresidente, "NombrePresidente" => $nombrePresidente, "CorreoPresidente" => $correoPresidente]]);
                }

                echo json_encode(["success" => true, "mensaje" => "Has autorizado las instrumentaciones, ahora podrán ser vistas por los respectivos jefes de división para su revisión y autorización."]);
            break;

            case 'obtenerInstrumentacionesPorJefeDivision':
                $periodo = $_POST['periodo'];
                $listaCarreras = $_POST['carrerasLista'];

                //Consulta para obtener información general de las instrumentaciones que puede autorizar los jefes de division
                $pipeline = [
                    [
                        '$match' => [
                            'Instrumentos' => 'Carreras'
                        ]
                    ], 
                    [
                        //Solo obtener las instrumentaciones del periodo elegido en forma de array key value
                        '$project' => [
                            '_id' => 0, 
                            'instrumentaciones' => [
                                '$objectToArray' => '$periodos_Inst.' . $periodo
                            ]
                        ]
                    ], 
                    [
                        //Pasar cada elemento del array en nuevos documentos
                        '$unwind' => ['path' => '$instrumentaciones']
                    ], 
                    [
                        //Mostrar solo los campos deseados
                        '$project' => [
                            'instrumentaciones.k' => 1, 
                            'instrumentaciones.v.Materia' => 1, 
                            'instrumentaciones.v.totalTemas' => 1, 
                            'instrumentaciones.v.ClaveAsignatura' => 1, 
                            'instrumentaciones.v.TodasMaterias' => [
                                //En el array de todoas las materias que pertenecen a la instrumentacion
                                //a cada una agregarle un nuevo campo que incluye la letra de carrera conforme al la clave de materia
                                '$map' => [
                                    'input' => '$instrumentaciones.v.TodasMaterias', 
                                    'as' => 'materias', 
                                    'in' => [
                                        '$mergeObjects' => [
                                            '$$materias', 
                                            [
                                                'LetraCarrera' => [
                                                    '$substr' => ['$$materias.Clave', 1, 1]
                                                ]
                                            ]
                                        ]
                                    ]
                                ]
                            ], 
                            'instrumentaciones.v.SoloLectura' => 1, 
                            'instrumentaciones.v.Validacion' => 1, 
                            'instrumentaciones.v.Temas' => [
                                //En la parte de temas, a cada tema solo mostrar el numero de tema y la matriz de evaluacion del mismo
                                '$map' => [
                                    'input' => [
                                        '$objectToArray' => '$instrumentaciones.v.Temas'
                                    ], 
                                    'in' => [
                                        'Tema' => '$$this.k', 
                                        'Matriz' => '$$this.v.MatrizEvaluacion'
                                    ]
                                ]
                            ]
                        ]
                    ], 
                    [
                        //solo mostrar las instrumentaciones donde en la lista de TodasMaterias, la letra se encuentre dentro de las letras de carrera que los jefes de division tienen a cargo
                        //Por lo general cada jefe de division esta a carga de una carrera o porgrama educativo, pero esto permite que se muestren en caso de que el jefe este cargo de mas de 1 una carrera
                        '$match' => [
                            'instrumentaciones.v.TodasMaterias.LetraCarrera' => [
                                '$in' => $listaCarreras
                            ],
                            //Solo mostrar las instrumentaciones que ya han sido validas por su presidente de grupo academico
                            'instrumentaciones.v.Validacion.Estatus' => true
                        ]
                    ], 
                    [
                        //Del campo "TodasMaterias", solo filtrar los elementos que corresponden a la letra de las carreras del respectivo jefe de division
                        '$addFields' => [
                            'instrumentaciones.v.TodasMaterias' => [
                                '$filter' => [
                                    'input' => '$instrumentaciones.v.TodasMaterias', 
                                    'cond' => [
                                        '$in' => [
                                            '$$this.LetraCarrera', $listaCarreras
                                        ]
                                    ]
                                ]
                            ]
                        ]
                    ], 
                    [
                        '$unwind' => ['path' => '$instrumentaciones.v.TodasMaterias']
                    ], 
                    [
                        //Hacer una relacion con la coleccion de docentes para mostrar que grupos se imparten en la respectiva instrumentacion
                        '$lookup' => [
                            'from' => 'docentes', 
                            'let' => ['grupoinst' => '$instrumentaciones.v.TodasMaterias.Clave'], 
                            'pipeline' => [
                                [
                                    '$project' => [
                                        '_id' => 0, 
                                        'nombre' => 1, 
                                        'correo' => 1, 
                                        'grupo' => [
                                            '$map' => [
                                                'input' => ['$objectToArray' => '$periodos_Inst.' . $periodo], 
                                                'in' => [
                                                    'k' => ['$substr' => ['$$this.k', 0, 3]], 
                                                    'v' => '$$this.v'
                                                ]
                                            ]
                                        ]
                                    ]
                                ], 
                                [
                                    '$unwind' => ['path' => '$grupo']
                                ], 
                                [
                                    '$match' => [
                                        '$expr' => [
                                            '$eq' => ['$grupo.k', '$$grupoinst']
                                        ]
                                    ]
                                ], 
                                [
                                    '$addFields' => ['grupo' => '$grupo.v.Grupo']
                                ]
                            ], 
                            'as' => 'instrumentaciones.v.TodasMaterias.Grupos'
                        ]
                    ], 
                    [
                        //Solo mostrar instrumentaciones que tengan grupos relacionados de la instrumentacion de docentes despues de hacer el lookup
                        '$match' => [
                            'instrumentaciones.v.TodasMaterias.Grupos' => [
                                '$exists' => true, '$ne' => []
                            ]
                        ]
                    ]
                ];

                $instrumentaciones = $connNoSQL->agregacion("instrumentaciones", $pipeline);
                echo json_encode(['success' => true, 'data' => $instrumentaciones]);
            break;

            case 'autorizarInstruJefeDivision':
                $periodo = $_POST['periodo'];
                $claveAsignatura = $_POST['clave-asignatura'];
                $claveMateria = $_POST['clave-materia'];
                $idJefe = $_POST['idJefe'];
                $nombreJefe = $_POST['nombreJefe'];
                $correoJefe = $_POST['correo'];

                $connNoSQL->modificar("instrumentaciones", ["Instrumentos" => "Carreras", "periodos_Inst." . $periodo . "." . $claveAsignatura . ".TodasMaterias.Clave" => $claveMateria], ["periodos_Inst." . $periodo . "." . $claveAsignatura . ".TodasMaterias.$.Validacion.Estatus" => true]);
                $connNoSQL->modificar("instrumentaciones", ["Instrumentos" => "Carreras", "periodos_Inst." . $periodo . "." . $claveAsignatura . ".TodasMaterias.Clave" => $claveMateria], ["periodos_Inst." . $periodo . "." . $claveAsignatura . ".TodasMaterias.$.Validacion.InfoJefeDivision" => ['IdJefeDivision' => $idJefe, 'NombreJefeDivision' => $nombreJefe, 'CorreoJefeDivision' => $correoJefe]]);
                echo json_encode(['success' => true, 'mensaje' => 'Has autorizado la instrumentación, ahora puede ser vista por todos.']);
            break;

            case 'denegarInstruJefeDivision':
                $periodo = $_POST['periodo'];
                $claveAsignatura = $_POST['clave-asignatura'];
                $observaciones = $_POST['observaciones'];
                $idJefeDivision = $_POST['idJefe'];
                $nombreJefeDivision = $_POST['nombreJefe'];
                $correoJefeDivision = $_POST['correo'];
                $claveMateria = $_POST['clave-materia'];

                //Poner la instrumentacion como solo lectura a false, para permitir la edición.
                $connNoSQL->modificar("instrumentaciones", ["Instrumentos" => "Carreras"], ["periodos_Inst." . $periodo . "." . $claveAsignatura . ".SoloLectura" => false]);

                //Revertir la validacion por parte del presidente de grupo academico
                $connNoSQL->modificar("instrumentaciones", ["Instrumentos" => "Carreras"], ["periodos_Inst." . $periodo . "." . $claveAsignatura . ".Validacion.Estatus" => false]);
                $connNoSQL->eliminarCampo("instrumentaciones", ["Instrumentos" => "Carreras"], ["periodos_Inst." . $periodo . "." . $claveAsignatura . ".Validacion.InfoPresidente" => 1]);

                //Revertir la autorización de los otros jefes de division que compartan la asignatura, en caso de que aplique
                $connNoSQL->modificar("instrumentaciones", ["Instrumentos" => "Carreras"], ["periodos_Inst." . $periodo . "." . $claveAsignatura . ".TodasMaterias.$[].Validacion.Estatus" => false]);
                $connNoSQL->eliminarCampo("instrumentaciones", ["Instrumentos" => "Carreras"], ["periodos_Inst." . $periodo . "." . $claveAsignatura . ".TodasMaterias.$[].Validacion.InfoJefeDivision" => 1]);

                //Guardar los mensajes u observaciones en Mongo para que los docentes puedan verlos en su sección correspondiente
                date_default_timezone_set('America/Mexico_City');
                $connNoSQL->agregarAlArray("instrumentaciones", ["Instrumentos" => "Carreras", "periodos_Inst." . $periodo . "." . $claveAsignatura . ".TodasMaterias.Clave" => $claveMateria], ["periodos_Inst." . $periodo . "." . $claveAsignatura . ".TodasMaterias.$.Validacion.Observaciones" => ['IdObservacion' => new MongoDB\BSON\ObjectId(),'IdJefeDivision' => $idJefeDivision, 'CorreoJefeDivision' => $correoJefeDivision, 'NombreJefeDivision' => $nombreJefeDivision, 'InfoMensaje' => ['Mensaje' => $observaciones, 'FechaHora' => date('I') ? date('Y-m-d H:i:s', strtotime('-1 hour')) : date('Y-m-d H:i:s'), 'Leido' => false]]]);
                
                echo json_encode(['success' => true, 'mensaje' => 'Ahora los docentes podrán modificar la instrumentación, recibirán las observaciones o retroalimentación ingresada.']);
            break;

            case 'autorizarMultipleInstruJefeDivision':
                $periodo = $_POST['periodo'];
                $idJefeDivision = $_POST['idJefe'];
                $nombreJefeDivision = $_POST['nombreJefe'];
                $correoJefeDivision = $_POST['correoJefe'];
                $listaInstrumentos = $_POST['listaInstrumentos'];

                foreach($listaInstrumentos as $instru) {
                    $connNoSQL->modificar("instrumentaciones", ["Instrumentos" => "Carreras", "periodos_Inst." . $periodo . "." . $instru[0] . ".TodasMaterias.Clave" => $instru[2]], ["periodos_Inst." . $periodo . "." . $instru[0] . ".TodasMaterias.$.Validacion.Estatus" => true]);
                    $connNoSQL->modificar("instrumentaciones", ["Instrumentos" => "Carreras", "periodos_Inst." . $periodo . "." . $instru[0] . ".TodasMaterias.Clave" => $instru[2]], ["periodos_Inst." . $periodo . "." . $instru[0] . ".TodasMaterias.$.Validacion.InfoJefeDivision" => ['IdJefeDivision' => $idJefeDivision, 'NombreJefeDivision' => $nombreJefeDivision, 'CorreoJefeDivision' => $correoJefeDivision]]);
                }
                echo json_encode(['success' => true, 'mensaje' => 'Has autorizado las instrumentaciones, ahora pueden ser vistas por todos.']);
            break;

            case 'obtenerGruposAlumnos':
                //Mostrar los grupos disponibles conforme el alumno los vaya buscando
                //Se aplica una consulta equivalente al LIKE en SQL.
                $periodo = $_POST['periodo'];
                $texto = $_POST['texto'];

                $pipeline = [
                    [
                        '$project' => [
                            '_id' => 0, 
                            'correo' => 1, 
                            'nombre' => 1, 
                            'grupos' => [
                                '$objectToArray' => '$periodos_Inst.' . $periodo
                            ]
                        ]
                    ], 
                    [
                        '$unwind' => [
                            'path' => '$grupos'
                        ]
                    ], 
                    [
                        '$match' => [
                            'grupos.k' => new MongoDB\BSON\Regex($texto)
                        ]
                    ]
                ];

                $grupos = $connNoSQL->agregacion("docentes", $pipeline);
                $final_data = "";
                if(count($grupos) > 0) {
                    foreach($grupos as $grupo) {
                        $final_data .= '<a href="#" class="list-group-item list-group-item-action border-1" data-id="' . $grupo->grupos->k . '" data-docente="' . $grupo->nombre . '" data-correo-docente="' . $grupo->correo . '" data-carrera="' . $grupo->grupos->v->Carrera . '" data-periodo="' . $grupo->grupos->v->Periodo . '" data-materia="' . $grupo->grupos->v->Materia . '" data-total-temas="' . $grupo->grupos->v->totalTemas . '" data-semestre="' . $grupo->grupos->v->Semestre . '" data-clave-asignatura="' . $grupo->grupos->v->ClaveAsignatura . '">' . $grupo->grupos->k . ' - ' . $grupo->grupos->v->Materia . '</a>';
                    }
                } else {
                    $final_data .= '<p class="list-group-item border-1">No se encontraron resultados.</p>';
                }
                echo json_encode(['success' => true, 'data' => $final_data]);
            break;

            case 'obtenerInstrumentacionAlumno':
                $periodo = $_POST['periodo'];
                $claveAsignatura = $_POST['clave-asignatura'];
                $claveGrupo = substr($_POST['grupo'], 0, 3);

                $pipeline = [
                    [
                        '$match' => ['Instrumentos' => 'Carreras']
                    ], 
                    [
                        '$project' => [
                            '_id' => 0, 
                            'Materia' => '$periodos_Inst.' . $periodo . '.' . $claveAsignatura . '.Materia', 
                            'TotalTemas' => '$periodos_Inst.' . $periodo . '.' . $claveAsignatura . '.totalTemas', 
                            'ClaveAsignatura' => '$periodos_Inst.' . $periodo . '.' . $claveAsignatura . '.ClaveAsignatura', 
                            'TodasMaterias' => [
                                '$map' => [
                                    'input' => [
                                        '$filter' => [
                                            'input' => '$periodos_Inst.' . $periodo . '.' . $claveAsignatura . '.TodasMaterias', 
                                            'cond' => [
                                                '$eq' => ['$$this.Clave', $claveGrupo]
                                            ]
                                        ]
                                    ], 
                                    'in' => [
                                        'Clave' => '$$this.Clave', 
                                        'PE' => '$$this.PE', 
                                        'Semestre' => '$$this.Semestre', 
                                        'PlanEstudios' => '$$this.PlanEstudios', 
                                        'ValidacionEstatus' => '$$this.Validacion.Estatus'
                                    ]
                                ]
                            ], 
                            'ValidacionEstatus' => '$periodos_Inst.' . $periodo . '.' . $claveAsignatura . '.Validacion.Estatus', 
                            'Temas' => [
                                '$map' => [
                                    'input' => [
                                        '$objectToArray' => '$periodos_Inst.' . $periodo . '.' . $claveAsignatura . '.Temas'
                                    ], 
                                    'in' => [
                                        'Tema' => '$$this.k', 
                                        'Matriz' => '$$this.v.MatrizEvaluacion'
                                    ]
                                ]
                            ]
                        ]
                    ], 
                    [
                        '$unwind' => [
                            'path' => '$TodasMaterias'
                        ]
                    ]
                ];

                $instrumentacion = $connNoSQL->agregacion("instrumentaciones", $pipeline);
                if((isset($instrumentacion[0]->ValidacionEstatus) && $instrumentacion[0]->ValidacionEstatus) && (isset($instrumentacion[0]->TodasMaterias->ValidacionEstatus) && $instrumentacion[0]->TodasMaterias->ValidacionEstatus)) {
                    echo json_encode(['success' => true, 'data' => $instrumentacion[0]]);
                } else {
                    echo json_encode(['success' => false, 'mensaje' => 'Instrumentación didáctica no disponible.']);
                }
                
            break;

            case 'obtenerGruposFAC14':
                $periodo = $_POST['periodo'];
                $texto = $_POST['texto'];

                $pipeline = [
                    [
                        '$project' => [
                            '_id' => 0, 
                            'grupo' => [
                                '$objectToArray' => '$periodos_Inst.' . $periodo
                            ]
                        ]
                    ], 
                    [
                        '$unwind' => ['path' => '$grupo']
                    ], 
                    [
                        '$match' => [
                            'grupo.k' => new MongoDB\BSON\Regex($texto)
                        ]
                    ],
                    [
                        '$replaceRoot' => ['newRoot' => '$grupo']
                    ], 
                    [
                        '$project' => [
                            'k' => 1, 
                            'v.Carrera' => 1, 
                            'v.Periodo' => 1, 
                            'v.Materia' => 1, 
                            'v.totalTemas' => 1, 
                            'v.Semestre' => 1, 
                            'v.ClaveAsignatura' => 1
                        ]
                    ]
                ];

                $grupos = $connNoSQL->agregacion("docentes", $pipeline);
                $final_data = "";
                if(count($grupos) > 0) {
                    foreach($grupos as $grupo) {
                        $final_data .= '<a href="#" class="list-group-item list-group-item-action border-1" data-id="' . $grupo->k . '" data-carrera="' . $grupo->v->Carrera . '" data-periodo="' . $grupo->v->Periodo . '" data-materia="' . $grupo->v->Materia . '" data-total-temas="' . $grupo->v->totalTemas . '" data-semestre="' . $grupo->v->Semestre . '" data-clave-asignatura="' . $grupo->v->ClaveAsignatura . '">' . $grupo->k . ' - ' . $grupo->v->Materia . '</a>';
                    }
                } else {
                    $final_data .= '<p class="list-group-item border-1">No se encontraron resultados.</p>';
                }
                echo json_encode(['success' => true, 'data' => $final_data]);
            break;

            case 'historialValidacionesPresidente':
                $periodo = $_POST['periodo'];
                $idPresidente = $_POST['idPresidente'];

                $pipeline = [
                    [
                        '$match' => ['Instrumentos' => 'Carreras']
                    ], 
                    [
                        '$project' => [
                            '_id' => 0, 
                            'instrumentaciones' => [
                                '$objectToArray' => '$periodos_Inst.' . $periodo
                            ]
                        ]
                    ], 
                    [
                        '$unwind' => ['path' => '$instrumentaciones']
                    ], 
                    [
                        '$project' => [
                            'instrumentaciones.k' => 1, 
                            'instrumentaciones.v.Materia' => 1, 
                            'instrumentaciones.v.totalTemas' => 1, 
                            'instrumentaciones.v.ClaveAsignatura' => 1, 
                            'instrumentaciones.v.TodasMaterias' => 1, 
                            'instrumentaciones.v.SoloLectura' => 1, 
                            'instrumentaciones.v.Validacion' => 1, 
                            'instrumentaciones.v.Temas' => [
                                '$map' => [
                                    'input' => [
                                        '$objectToArray' => '$instrumentaciones.v.Temas'
                                    ],
                                    'in' => [
                                        'Tema' => '$$this.k',
                                        'Matriz' => '$$this.v.MatrizEvaluacion'
                                    ]
                                ]
                            ]
                        ]
                    ],
                    [
                        '$match' => [
                            'instrumentaciones.v.Validacion.Estatus' => true,
                            'instrumentaciones.v.Validacion.InfoPresidente.IdPresidente' => $idPresidente
                        ]
                    ], 
                    [
                        '$unwind' => ['path' => '$instrumentaciones.v.TodasMaterias']
                    ], 
                    [
                        '$lookup' => [
                            'from' => 'docentes', 
                            'let' => ['grupoinst' => '$instrumentaciones.v.TodasMaterias.Clave'], 
                            'pipeline' => [
                                [
                                    '$project' => [
                                        '_id' => 0, 
                                        'nombre' => 1, 
                                        'correo' => 1, 
                                        'grupo' => [
                                            '$map' => [
                                                'input' => ['$objectToArray' => '$periodos_Inst.' . $periodo], 
                                                'in' => [
                                                    'k' => [
                                                        '$substr' => ['$$this.k', 0, 3]
                                                    ], 
                                                    'v' => '$$this.v'
                                                ]
                                            ]
                                        ]
                                    ]
                                ], 
                                [
                                    '$unwind' => ['path' => '$grupo']
                                ], 
                                [
                                    '$match' => [
                                        '$expr' => [
                                            '$eq' => ['$grupo.k', '$$grupoinst']
                                        ]
                                    ]
                                ]
                            ], 
                            'as' => 'instrumentaciones.v.TodasMaterias.Docentes'
                        ]
                    ], 
                    [
                        '$addFields' => [
                            'instrumentaciones.v.TodasMaterias.Docentes' => [
                                '$map' => [
                                    'input' => '$instrumentaciones.v.TodasMaterias.Docentes', 
                                    'in' => [
                                        'correo' => '$$this.correo', 
                                        'nombre' => '$$this.nombre', 
                                        'grupo' => '$$this.grupo.v.Grupo'
                                    ]
                                ]
                            ]
                        ]
                    ], 
                    [
                        '$group' => [
                            '_id' => '$instrumentaciones.k', 
                            'docentes' => [
                                '$push' => '$instrumentaciones.v.TodasMaterias'
                            ]
                        ]
                    ], 
                    [
                        '$lookup' => [
                            'from' => 'instrumentaciones', 
                            'let' => ['claveinst' => '$_id'], 
                            'pipeline' => [
                                [
                                    '$project' => [
                                        '_id' => 0, 
                                        'instrumentaciones' => [
                                            '$objectToArray' => '$periodos_Inst.' . $periodo
                                        ]
                                    ]
                                ], 
                                [
                                    '$unwind' => ['path' => '$instrumentaciones']
                                ], 
                                [
                                    '$project' => [
                                        'instrumentaciones.k' => 1, 
                                        'instrumentaciones.v.Materia' => 1, 
                                        'instrumentaciones.v.totalTemas' => 1, 
                                        'instrumentaciones.v.ClaveAsignatura' => 1, 
                                        'instrumentaciones.v.TodasMaterias' => 1, 
                                        'instrumentaciones.v.SoloLectura' => 1, 
                                        'instrumentaciones.v.Validacion' => 1, 
                                        'instrumentaciones.v.Temas' => [
                                            '$map' => [
                                                'input' => [
                                                    '$objectToArray' => '$instrumentaciones.v.Temas'
                                                ],
                                                'in' => [
                                                    'Tema' => '$$this.k',
                                                    'Matriz' => '$$this.v.MatrizEvaluacion'
                                                ]
                                            ]
                                        ]
                                    ],
                                ],
                                [
                                    '$match' => [
                                        'instrumentaciones.v.Validacion.Estatus' => true,
                                        'instrumentaciones.v.Validacion.InfoPresidente.IdPresidente' => $idPresidente
                                    ]
                                ], 
                                [
                                    '$match' => [
                                        '$expr' => [
                                            '$eq' => ['$instrumentaciones.k', '$$claveinst']
                                        ]
                                    ]
                                ]
                            ], 
                            'as' => 'instruDetalle'
                        ]
                    ], 
                    [
                        '$unwind' => ['path' => '$instruDetalle']
                    ], 
                    [
                        '$project' => [
                            '_id' => 1, 
                            'docentes' => 1, 
                            'instruDetalle' => '$instruDetalle.instrumentaciones'
                        ]
                    ], 
                    [
                        '$addFields' => ['instruDetalle.v.TodasMaterias' => '$docentes']
                    ], 
                    [
                        '$replaceRoot' => ['newRoot' => '$instruDetalle']
                    ]
                ];

                $instrumentaciones = $connNoSQL->agregacion("instrumentaciones", $pipeline);
                echo json_encode(['success' => true, 'data' => $instrumentaciones]);
            break;

            case 'historialValidacionesJefeDivision':
                $periodo = $_POST['periodo'];
                $idJefeDivision = $_POST['idJefeDivision'];

                $pipeline = [
                    [
                        '$match' => ['Instrumentos' => 'Carreras']
                    ], 
                    [
                        '$project' => [
                            '_id' => 0, 
                            'instrumentaciones' => [
                                '$objectToArray' => '$periodos_Inst.' . $periodo
                            ]
                        ]
                    ], 
                    [
                        '$unwind' => ['path' => '$instrumentaciones']
                    ], 
                    [
                        '$project' => [
                            'instrumentaciones.k' => 1, 
                            'instrumentaciones.v.Materia' => 1, 
                            'instrumentaciones.v.totalTemas' => 1, 
                            'instrumentaciones.v.ClaveAsignatura' => 1, 
                            'instrumentaciones.v.TodasMaterias' => [
                                '$map' => [
                                    'input' => '$instrumentaciones.v.TodasMaterias', 
                                    'as' => 'materias', 
                                    'in' => [
                                        '$mergeObjects' => [
                                            '$$materias', 
                                            [
                                                'LetraCarrera' => [
                                                    '$substr' => ['$$materias.Clave', 1, 1]
                                                ]
                                            ]
                                        ]
                                    ]
                                ]
                            ], 
                            'instrumentaciones.v.SoloLectura' => 1, 
                            'instrumentaciones.v.Validacion' => 1, 
                            'instrumentaciones.v.Temas' => [
                                '$map' => [
                                    'input' => [
                                        '$objectToArray' => '$instrumentaciones.v.Temas'
                                    ], 
                                    'in' => [
                                        'Tema' => '$$this.k', 
                                        'Matriz' => '$$this.v.MatrizEvaluacion'
                                    ]
                                ]
                            ]
                        ]
                    ], 
                    [
                        '$match' => [
                            'instrumentaciones.v.TodasMaterias' => [
                                '$elemMatch' => [
                                    '$and' => [
                                        [
                                            'Validacion.Estatus' => true
                                        ], 
                                        [
                                            'Validacion.InfoJefeDivision.IdJefeDivision' => $idJefeDivision
                                        ]
                                    ]
                                ]
                            ]
                        ]
                    ], 
                    [
                        '$addFields' => [
                            'instrumentaciones.v.TodasMaterias' => [
                                '$filter' => [
                                    'input' => '$instrumentaciones.v.TodasMaterias', 
                                    'cond' => [
                                        '$and' => [
                                            [
                                                '$eq' => ['$$this.Validacion.Estatus', true]
                                            ], 
                                            [
                                                '$eq' => ['$$this.Validacion.InfoJefeDivision.IdJefeDivision', $idJefeDivision]
                                            ]
                                        ]
                                    ]
                                ]
                            ]
                        ]
                    ], 
                    [
                        '$unwind' => ['path' => '$instrumentaciones.v.TodasMaterias']
                    ], 
                    [
                        '$lookup' => [
                            'from' => 'docentes', 
                            'let' => ['grupoinst' => '$instrumentaciones.v.TodasMaterias.Clave'], 
                            'pipeline' => [
                                [
                                    '$project' => [
                                        '_id' => 0, 
                                        'nombre' => 1, 
                                        'correo' => 1, 
                                        'grupo' => [
                                            '$map' => [
                                                'input' => ['$objectToArray' => '$periodos_Inst.' . $periodo], 
                                                'in' => [
                                                    'k' => [
                                                        '$substr' => ['$$this.k', 0, 3]
                                                    ], 
                                                    'v' => '$$this.v'
                                                ]
                                            ]
                                        ]
                                    ]
                                ], 
                                [
                                    '$unwind' => ['path' => '$grupo']
                                ], 
                                [
                                    '$match' => [
                                        '$expr' => [
                                            '$eq' => ['$grupo.k', '$$grupoinst']
                                        ]
                                    ]
                                ], 
                                [
                                    '$addFields' => ['grupo' => '$grupo.v.Grupo']
                                ]
                            ], 
                            'as' => 'instrumentaciones.v.TodasMaterias.Grupos'
                        ]
                    ], 
                    [
                        '$match' => [
                            'instrumentaciones.v.TodasMaterias.Grupos' => [
                                '$exists' => true, 
                                '$ne' => []
                            ]
                        ]
                    ]
                ];

                $instrumentaciones = $connNoSQL->agregacion("instrumentaciones", $pipeline);
                echo json_encode(['success' => true, 'data' => $instrumentaciones]);
            break;

            case 'obtenerObservacionesIntrumentacion':
                $periodo = $_POST['periodo'];
                $claveAsignatura = $_POST['claveAsignatura'];
                $grupoins = substr($_POST['grupo'], 0, 3);
                //Obtener observaciones de presidente de cierta instrumentacion 
                $pipeline = [
                    [
                        '$match' => ['Instrumentos' => 'Carreras']
                    ], 
                    [
                        '$project' => [
                            '_id' => 0, 
                            'Materia' => '$periodos_Inst.' . $periodo . '.' . $claveAsignatura . '.Materia', 
                            'ClaveAsignatura' => '$periodos_Inst.' . $periodo . '.' . $claveAsignatura . '.ClaveAsignatura', 
                            'ObservacionesPresidente' => '$periodos_Inst.' . $periodo . '.' . $claveAsignatura . '.Validacion.Observaciones'
                        ]
                    ],
                    [
                        '$unwind' => [
                            'path' => '$ObservacionesPresidente'
                        ]
                    ],
                    [
                        '$addFields' => [
                            'ObservacionesPresidente.InfoMensaje.FechaHora' => [
                                '$dateFromString' => [
                                    'dateString' => '$ObservacionesPresidente.InfoMensaje.FechaHora'
                                ]
                            ]
                        ]
                    ],
                    [
                        '$sort' => [
                            'ObservacionesPresidente.InfoMensaje.FechaHora' => -1
                        ]
                    ],
                    [
                        '$addFields' => [
                            'ObservacionesPresidente.InfoMensaje.FechaHora' => [
                                '$dateToString' => [
                                    'date' => '$ObservacionesPresidente.InfoMensaje.FechaHora', 
                                    'format' => '%Y-%m-%d %H-%M-%S'
                                ]
                            ]
                        ]
                    ]
                ];
                $observacionesPresidente = $connNoSQL->agregacion("instrumentaciones", $pipeline);

                //Obtener observaciones de jefe de division
                $pipeline = [
                    [
                        '$match' => ['Instrumentos' => 'Carreras']
                    ], 
                    [
                        '$project' => [
                            '_id' => 0, 
                            'Materia' => 
                            '$periodos_Inst.' . $periodo . '.' . $claveAsignatura . '.Materia', 
                            'ClaveAsignatura' => '$periodos_Inst.' . $periodo . '.' . $claveAsignatura . '.ClaveAsignatura', 
                            'ObservacionesJefeDivision' => [
                                '$filter' => [
                                    'input' => '$periodos_Inst.' . $periodo . '.' . $claveAsignatura . '.TodasMaterias', 
                                    'cond' => [
                                        '$eq' => ['$$this.Clave', $grupoins]
                                    ]
                                ]
                            ]
                        ]
                    ], 
                    [
                        '$unwind' => ['path' => '$ObservacionesJefeDivision']
                    ], 
                    [
                        '$project' => [
                            'Materia' => 1, 
                            'ClaveAsignatura' => 1, 
                            'ObservacionesJefeDivision.Clave' => 1, 
                            'ObservacionesJefeDivision.PE' => 1, 
                            'ObservacionesJefeDivision.Validacion.Observaciones' => 1
                        ]
                    ],
                    [
                        '$unwind' => [
                            'path' => '$ObservacionesJefeDivision.Validacion.Observaciones'
                        ]
                    ],
                    [
                        '$addFields' => [
                            'ObservacionesJefeDivision.Validacion.Observaciones.InfoMensaje.FechaHora' => [
                                '$dateFromString' => [
                                    'dateString' => '$ObservacionesJefeDivision.Validacion.Observaciones.InfoMensaje.FechaHora'
                                ]
                            ]
                        ]
                    ], 
                    [
                        '$sort' => [
                            'ObservacionesJefeDivision.Validacion.Observaciones.InfoMensaje.FechaHora' => -1
                        ]
                    ],
                    [
                        '$addFields' => [
                            'ObservacionesJefeDivision.Validacion.Observaciones.InfoMensaje.FechaHora' => [
                                '$dateToString' => [
                                    'date' => '$ObservacionesJefeDivision.Validacion.Observaciones.InfoMensaje.FechaHora', 
                                    'format' => '%Y-%m-%d %H-%M-%S'
                                ]
                            ]
                        ]
                    ]
                ];
                $observacionesJefeDivision = $connNoSQL->agregacion("instrumentaciones", $pipeline);

                echo json_encode(['success' => true, 'data' => ['Presidente' => $observacionesPresidente, 'JefeDivision' => $observacionesJefeDivision]]);
                break;
        }
    }
