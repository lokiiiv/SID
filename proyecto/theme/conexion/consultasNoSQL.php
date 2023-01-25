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
                $grupos = $_POST['grupos'];
                $carrera = $_POST['carrera'];
                $clave = $_POST["clave"];
                $correo = $_SESSION['correo'];
                //Encabezado
                $encabezado = $_POST['encabezado'];
                $revision = substr($encabezado, 36, 1);
                $documento = substr($encabezado, 0,7);
                $responsable = substr($encabezado, 37,21);
                $fechaemision = substr($encabezado, 58,20);
                $codigodocumento = substr($encabezado, 78,7);
                $clausula = substr($encabezado, 7,29);

                //Después del grupo. //Para guardar en docentes. //Carrera - Periodo - Clave de grupo - Materia.
                //$connNoSQL->modificar("docentes",["correo"=>$correo],["periodos_Inst.".$periodo.".Grupos"=>$grupos]);
                $connNoSQL->modificar("docentes",["correo"=>$correo],["periodos_Inst.".$periodo.".".$grupo.".Carrera"=>$carrera]);
                $connNoSQL->modificar("docentes",["correo"=>$correo],["periodos_Inst.".$periodo.".".$grupo.".Periodo"=>$periodo]);
                $connNoSQL->modificar("docentes",["correo"=>$correo],["periodos_Inst.".$periodo.".".$grupo.".Grupo"=>$grupo]);
                $connNoSQL->modificar("docentes",["correo"=>$correo],["periodos_Inst.".$periodo.".".$grupo.".Materia"=>$materia]);
                $connNoSQL->modificar("docentes",["correo"=>$correo],["periodos_Inst.".$periodo.".".$grupo.".totalTemas"=>$temas]);

                //Para guardar dentro de instrumentaciones //Carrera > Periodo > Grupo > Todo lo demás.
                $connNoSQL->modificar("instrumentaciones", ["Instrumentos"=>"Carreras"],["periodos_Inst.".$periodo.".".$grupoins.".Materia"=>$materia]);
                $connNoSQL->modificar("instrumentaciones", ["Instrumentos"=>"Carreras"],["periodos_Inst.".$periodo.".".$grupoins.".PE"=>$carrera]);
                $connNoSQL->modificar("instrumentaciones", ["Instrumentos"=>"Carreras"],["periodos_Inst.".$periodo.".".$grupoins.".Semestre"=>$semestre]);
                $connNoSQL->modificar("instrumentaciones", ["Instrumentos"=>"Carreras"],["periodos_Inst.".$periodo.".".$grupoins.".totalTemas"=>$temas]); 
                $connNoSQL->modificar("instrumentaciones", ["Instrumentos"=>"Carreras"],["periodos_Inst.".$periodo.".".$grupoins.".ClaveAsignatura"=>$clave]);
                //Encabezado dentro de instrumentaciones
                $connNoSQL->modificar("instrumentaciones", ["Instrumentos"=>"Carreras"],["periodos_Inst.".$periodo.".".$grupoins.".Revision"=>$revision]);
                $connNoSQL->modificar("instrumentaciones", ["Instrumentos"=>"Carreras"],["periodos_Inst.".$periodo.".".$grupoins.".Documento"=>$documento]);
                $connNoSQL->modificar("instrumentaciones", ["Instrumentos"=>"Carreras"],["periodos_Inst.".$periodo.".".$grupoins.".Responsable"=>$responsable]);
                $connNoSQL->modificar("instrumentaciones", ["Instrumentos"=>"Carreras"],["periodos_Inst.".$periodo.".".$grupoins.".FechaEmision"=>$fechaemision]);
                $connNoSQL->modificar("instrumentaciones", ["Instrumentos"=>"Carreras"],["periodos_Inst.".$periodo.".".$grupoins.".CodigoDocumento"=>$codigodocumento]);
                $connNoSQL->modificar("instrumentaciones", ["Instrumentos"=>"Carreras"],["periodos_Inst.".$periodo.".".$grupoins.".Clausula"=>$clausula]);

            break;
            case 'borrarInstrumentacion':
                //$instrumentacion = $_POST['ins'];
                $grupo = $_POST['grupo'];
                $grupoins = substr($grupo, 0,3);
                $periodo = $_POST['periodo'];
                $grupos = $_POST['grupos'];
                $correo = $_SESSION['correo'];
                //$connNoSQL->modificar("docentes",["correo"=>$correo],["periodos_Inst.".$periodo.".Grupos"=>$grupos]);
                $campo = ["periodos_Inst.".$periodo.".".$grupo=>1];
                $campoins = ["periodos_Inst.".$periodo.".".$grupoins=>1];
                $connNoSQL->eliminarCampo("docentes",["correo"=>$correo],$campo);
                //$connNoSQL->eliminarCampo("instrumentaciones",["Instrumentos"=>"Carreras"],$campoins);
                
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
                $connNoSQL->modificar("instrumentaciones",["Instrumentos"=>"Carreras"],["periodos_Inst.".$periodo.".".$grupoins.".".$campo=>$valor]);
            break;
            case 'guardarCampoTema': //Cambia, se crea la nueva instrumentación
                $valor=$_POST['valor'];
                $campo=$_POST['campo'];
                $grupo=$_POST['grupo'];
                $grupoins = substr($grupo, 0,3);
                $tema=$_POST['tema'];
                $periodo=$_POST['periodo'];
                $correo = $_SESSION['correo'];
                $connNoSQL->modificar("instrumentaciones",["Instrumentos"=>"Carreras"],["periodos_Inst.".$periodo.".".$grupoins.".Temas.".$tema.".".$campo=>$valor]);
            break;
            case 'obtenerTemas':
                $tema=$_POST['tema'];
                $grupo=$_POST['grupo'];
                $grupoins = substr($grupo, 0,3);
                $periodo=$_POST['periodo'];
                $correo = $_SESSION['correo'];
                $projeccion = ["projection" => ["periodos_Inst.".$periodo.".".$grupoins.".Temas.".$tema=>1,"_id"=>0]];
                $tema = $connNoSQL->consultaProjeccion("instrumentaciones",["Instrumentos"=>"Carreras"],$projeccion);
                if(isset($tema[0]->periodos_Inst->{$periodo}->$grupoins->Temas)){
                    $t = $tema[0]->periodos_Inst->{$periodo}->$grupoins->Temas;
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
                $caracterizacion = "";
                $intencionDidactica = "";
                $competenciasPrevias = "";
                $competenciaEA = "";

                $projeccion = ["projection" => 
                                ["periodos_Inst.".$periodo.".".$grupoins.".Caracterizacion"=>1,
                                "periodos_Inst.".$periodo.".".$grupoins.".totalTemas"=>1,
                                 "periodos_Inst.".$periodo.".".$grupoins.".Materia"=>1,
                                 "periodos_Inst.".$periodo.".".$grupoins.".IntencionDidactica"=>1,
                                 "periodos_Inst.".$periodo.".".$grupoins.".CompetenciasPrevias"=>1,
                                 "periodos_Inst.".$periodo.".".$grupoins.".PE"=>1,
                                 "periodos_Inst.".$periodo.".".$grupoins.".PlanEstudios"=>1,
                                 "periodos_Inst.".$periodo.".".$grupoins.".ClaveAsignatura"=>1,
                                 "periodos_Inst.".$periodo.".".$grupoins.".Creditos"=>1,
                                 "periodos_Inst.".$periodo.".".$grupoins.".Semestre"=>1,
                                 "periodos_Inst.".$periodo.".".$grupoins.".CompetenciaEA"=>1,
                                 "periodos_Inst.".$periodo.".".$grupoins.".Documento"=>1,
                                 "periodos_Inst.".$periodo.".".$grupoins.".Clausula"=>1,
                                 "periodos_Inst.".$periodo.".".$grupoins.".Revision"=>1,
                                 "periodos_Inst.".$periodo.".".$grupoins.".Responsable"=>1,
                                 "periodos_Inst.".$periodo.".".$grupoins.".FechaEmision"=>1,
                                 "periodos_Inst.".$periodo.".".$grupoins.".CodigoDocumento"=>1,

                                 "_id"=>0]];

                $instrumentacion = $connNoSQL->consultaProjeccion("instrumentaciones",["Instrumentos"=>"Carreras"],$projeccion);
                if(isset($instrumentacion[0]->periodos_Inst->$periodo->$grupoins)){
                    $instrumentacion = $instrumentacion[0]->periodos_Inst->$periodo->$grupoins;
                    echo json_encode($instrumentacion);
                }else{
                    echo "";
                }

            break;
            case 'obtenerInstrumentacion':
                $grupo=$_POST['grupo'];
                $grupoins = substr($grupo, 0,3);
                $periodo=$_POST['periodo']; 
                $correo = $_SESSION['correo'];
                $projeccion = ["projection" => 
                                ["periodos_Inst.".$periodo.".".$grupoins=>1,
                                "_id"=>0]];

                $instrumentacion = $connNoSQL->consultaProjeccion("instrumentaciones",["Instrumentos"=>"Carreras"],$projeccion);
                if(isset($instrumentacion[0]->periodos_Inst->$periodo->$grupoins)){
                    $instrumentacion = $instrumentacion[0]->periodos_Inst->$periodo->$grupoins;
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
                $tema=$_POST["tema"];
                $cualevi=$_POST["cualevi"];
                $projeccion = ["projection" => 
                    ["periodos_Inst.".$periodo.".".$grupo.".Temas.".$tema.".".$cualevi=>1,
                     "_id"=>0]];
                $instrumentacion = $connNoSQL->consultaProjeccion("instrumentaciones",["Instrumentos"=>"Carreras"],$projeccion);
                //echo $cualevi;
                if(isset($instrumentacion[0]->periodos_Inst->$periodo->$grupo->Temas->$tema->$cualevi)){
                    $instrumentacion = $instrumentacion[0]->periodos_Inst->$periodo->$grupo->Temas->$tema->$cualevi;
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
                $tema=$_POST["tema"];
                $numero=$numero-2;
                $instru=$instrumento;
                //echo "ok".$grupo;
                $projeccion = ["projection" => 
                    ["periodos_Inst.".$periodo.".".$grupo.".Temas.".$tema.".".$instru=>1,
                     "_id"=>0]];
                //echo $projeccion["projection"];
                $instrumentacion = $connNoSQL->consultaProjeccion("instrumentaciones",["Instrumentos"=>"Carreras"],$projeccion);

                if(isset($instrumentacion[0]->periodos_Inst->$periodo->$grupo->Temas->$tema->$instru)){
                    $instrumentacion = $instrumentacion[0]->periodos_Inst->$periodo->$grupo->Temas->$tema->$instru;
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
                //$numero=$numero-2;
                 //$connNoSQL->modificar("docentes",["correo"=>$correo],["periodos_Inst.".$periodo.".".$grupo.".Temas.".$tema.".".$campo=>$valor]);
                //$connNoSQL->modificar("docentes",["correo"=>$correo],["periodos_Inst.".$periodo.".".$grupo.".Temas.".$tema.".".$instrumento=>$alcances]);              
                $connNoSQL->modificar("instrumentaciones",["Instrumentos"=>"Carreras"],["periodos_Inst.".$periodo.".".$grupo.".Temas.".$tema.".".$instrumento=>$alcances]);

            break;
            case 'borrarInstrumentoHec':
                //$instrumentacion = $_POST['ins'];
                //echo "ok";
                $grupo = $_POST['grupo'];
                $periodo = $_POST['periodo'];
                //$grupo = $_POST['grupo'];
                $correo = $_SESSION['correo'];
                $tema = $_POST['tema'];
                $instru = $_POST['instru'];
                //$instru="UvLDel6Be9ListEnsa";

                //$connNoSQL->modificar("docentes",["correo"=>$correo],["periodos_Inst.".$periodo.".Grupos"=>$grupos]);
                //$campo = ["periodos_Inst.".$periodo.".".$grupo=>1];
                $campo = ["periodos_Inst.".$periodo.".".$grupo.".Temas.".$tema.".".$instru=>1];
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
        }
    }
?>