<?php
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
                $connNoSQL->modificar("instrumentaciones", ["Instrumentos"=>"Carreras"],["periodos_Inst.".$periodo.".".$clave.".SoloLectura"=>false]);
                $connNoSQL->modificar("instrumentaciones", ["Instrumentos"=>"Carreras"],["periodos_Inst.".$periodo.".".$clave.".Validacion"=>["Estatus"=>false]]);
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
                            '_id' => 0
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
                //Crear un nuevo campo indicando el id y nombre del presidente de grupo academico responsable de validar
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
        }
    }
