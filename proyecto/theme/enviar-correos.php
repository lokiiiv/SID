<?php
header("Content-Type: application/json");
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require_once './../../valida.php';
require './../../vendor/autoload.php';
require_once './conexion/conexionNoSQL.php';

$connNoSQL = connNoSQL::singleton();
try {
    if (isset($_POST['accionCorreo']) && !empty($_POST['accionCorreo'])) {
        $accion = $_POST['accionCorreo'];
        $para = isset($_POST['presidenteCorreo']) ? $_POST['presidenteCorreo'] : '';
        $asunto = "";
        $contenido = "";

        //Preparar el envio del correo electronico
        $mail = new PHPMailer(true);
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->Port = 465;
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
        $mail->SMTPAuth = true;
        //Credenciales de la cuenta origen
        $email = 'programador_isc@itesa.edu.mx';
        $mail->Username = $email;
        $mail->Password = '9641GDH2021a';
        $mail->setFrom($email, 'Instrumentaciones didácticas ITESA.');

        //Generar el asunto y contenido del correo conforme a la accion requerida
        switch($accion) {
            case 'validaPresidente':
                $nombrePresidente = $_POST['presidenteNombre'];
                $asignatura = $_POST['asignatura'];
                $grupo = $_POST['grupo'];
                $docente = $_POST['docente'];
                $claveAsignatura = $_POST['claveAsignatura'];

                //Destinatario
                $mail->addAddress($para, $nombrePresidente);

                //Asunto y contenido del correo cuando es para avisar de que el presidente de grupo academico debe validar instrumentacion
                $asunto = "Validación de instrumentación didáctica - Presidente de grupo académico";
                $contenido = "<div style='text-align: justify; text-justify: inter-word;'><h3>La instrumentación didáctica de la asignatura de <b>" . $asignatura . " (" . $claveAsignatura . ")" . "</b> del grupo/grupos <b>" . $grupo . "</b> ha sido generada y enviada por el/la docente <b>" . $docente . "</b> para su respectiva validación.<br><br>Por favor ingrese a la página del sistema de instrumentaciones didácticas y revise la instrumentación para validarla o cancelarla si es necesario.</h3></div>";

                $mail->Subject = $asunto;
                $mail->isHTML(true);
                $mail->CharSet = 'UTF-8';
                $mail->Body = $contenido;

                //if(!$mail->send())
                  //  throw new Exception($mail->ErrorInfo);
                //echo json_encode(['success' => true, 'mensaje' => 'El presidente de grupo academico de la asignatura ha sido notificado.']);
                
            break;

            case 'denegarInstruPresidente':
                //A partir de una instrumentación, obtener los correos de los docentes que imparten la asignatura de la misma y notificar
                $periodo = $_POST['periodo'];
                $claveAsignatura = $_POST['clave-asignatura'];

                $pipeline = [
                    [
                        '$match' => ['Instrumentos' => 'Carreras']
                    ], 
                    [
                        '$project' => [
                            '_id' => 0, 
                            'Materia' => '$periodos_Inst.' . $periodo . '.' . $claveAsignatura . '.Materia',
                            'TodasMaterias' => '$periodos_Inst.' . $periodo . '.' . $claveAsignatura . '.TodasMaterias'
                        ]
                    ], 
                    [
                        '$unwind' => ['path' => '$TodasMaterias']
                    ], 
                    [
                        '$lookup' => [
                            'from' => 'docentes', 
                            'let' => ['grupoinst' => '$TodasMaterias.Clave'], 
                            'pipeline' => [
                                [
                                    '$project' => [
                                        '_id' => 0, 
                                        'correo' => 1, 
                                        'nombre' => 1, 
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
                            'as' => 'TodasMaterias.docentes'
                        ]
                    ], 
                    [
                        '$unwind' => ['path' => '$TodasMaterias.docentes']
                    ], 
                    [
                        '$project' => [
                            'materia' => '$Materia',
                            'correo' => '$TodasMaterias.docentes.correo', 
                            'nombre' => '$TodasMaterias.docentes.nombre', 
                            'grupo' => '$TodasMaterias.docentes.grupo.v.Grupo'
                        ]
                    ], 
                    [
                        '$group' => [
                            '_id' => '$correo', 
                            'materia' => ['$first' => '$materia'],
                            'nombre' => ['$first' => '$nombre'], 
                            'grupos' => ['$push' => '$grupo']
                        ]
                    ]
                ];

                $correos = $connNoSQL->agregacion("instrumentaciones", $pipeline);
                foreach($correos as $correo) {
                    $mail->addAddress($correo->_id, $correo->nombre);

                    $asunto = "Corrección de instrumentación didáctica";
                    $contenido = "<div style='text-align: justify; text-justify: inter-word;'><h3>La instrumentación didáctica de la asignatura de <b>" . $correo->materia . " (" . $claveAsignatura . ")" . "</b>  que imparte al grupo/grupos <b>" . implode(', ', $correo->grupos) . "</b> no ha sido autorizada por parte del/la presidente de grupo academico <b>" . $_POST['nombrePresi'] . "</b>. A continuación se muestra las observaciones o retroalimentación ingresada por el presidente:<br><br>" . $_POST['observaciones'] . "</h3></div>";

                    $mail->Subject = $asunto;
                    $mail->isHTML(true);
                    $mail->CharSet = 'UTF-8';
                    $mail->Body = $contenido;

                    //if(!$mail->send())
                      //  throw new Exception($mail->ErrorInfo);
                        
                    $mail->clearAddresses();
                }

            break;
            
            case 'autorizarInstruPresidente':
                //A partir de una instrumentación, obtener los correos de los docentes que imparten la asignatura de la misma y notificar
                $periodo = $_POST['periodo'];
                $claveAsignatura = $_POST['clave-asignatura'];
                $pipeline = [
                    [
                        '$match' => ['Instrumentos' => 'Carreras']
                    ], 
                    [
                        '$project' => [
                            '_id' => 0, 
                            'Materia' => '$periodos_Inst.' . $periodo . '.' . $claveAsignatura . '.Materia',
                            'TodasMaterias' => '$periodos_Inst.' . $periodo . '.' . $claveAsignatura . '.TodasMaterias'
                        ]
                    ], 
                    [
                        '$unwind' => ['path' => '$TodasMaterias']
                    ], 
                    [
                        '$lookup' => [
                            'from' => 'docentes', 
                            'let' => ['grupoinst' => '$TodasMaterias.Clave'], 
                            'pipeline' => [
                                [
                                    '$project' => [
                                        '_id' => 0, 
                                        'correo' => 1, 
                                        'nombre' => 1, 
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
                            'as' => 'TodasMaterias.docentes'
                        ]
                    ], 
                    [
                        '$unwind' => ['path' => '$TodasMaterias.docentes']
                    ], 
                    [
                        '$project' => [
                            'materia' => '$Materia',
                            'correo' => '$TodasMaterias.docentes.correo', 
                            'nombre' => '$TodasMaterias.docentes.nombre', 
                            'grupo' => '$TodasMaterias.docentes.grupo.v.Grupo'
                        ]
                    ], 
                    [
                        '$group' => [
                            '_id' => '$correo', 
                            'materia' => ['$first' => '$materia'],
                            'nombre' => ['$first' => '$nombre'], 
                            'grupos' => ['$push' => '$grupo']
                        ]
                    ]
                ];

                $correos = $connNoSQL->agregacion("instrumentaciones", $pipeline);
                foreach($correos as $correo) {
                    $mail->addAddress($correo->_id, $correo->nombre);

                    $asunto = "Autorización de instrumentación didáctica por el presidente de grupo académico";
                    $contenido = "<div style='text-align: justify; text-justify: inter-word;'><h3>La instrumentación didáctica de la asignatura de <b>" . $correo->materia . " (" . $claveAsignatura . ")" . "</b>  que imparte al grupo/grupos <b>" . implode(', ', $correo->grupos) . "</b> se ha considerado apropiada, por lo que ha sido autorizada por parte del/la presidente de grupo academico <b>" . $_POST['nombrePresi'] . ".</b> Ahora deberá ser autorizada por el jefe de divisiòn del programa educativo correspondiente.</h3></div>";

                    $mail->Subject = $asunto;
                    $mail->isHTML(true);
                    $mail->CharSet = 'UTF-8';
                    $mail->Body = $contenido;

                    //if(!$mail->send())
                      //  throw new Exception($mail->ErrorInfo);
                        
                    $mail->clearAddresses();
                }

            break;

            case 'autorizarMultiInstruPresidente':
                //Notificar a los docentes de la autorización de la instrumentación cuando el presidente deicde autorizar varias al mismo tiempo
                $periodo = $_POST['periodo'];
                $listaInstrumentos = $_POST['listaInstrumentos'];

                foreach($listaInstrumentos as $instru) {
                    $pipeline = [
                        [
                            '$match' => ['Instrumentos' => 'Carreras']
                        ], 
                        [
                            '$project' => [
                                '_id' => 0, 
                                'Materia' => '$periodos_Inst.' . $periodo . '.' . $instru[0] . '.Materia',
                                'TodasMaterias' => '$periodos_Inst.' . $periodo . '.' . $instru[0] . '.TodasMaterias'
                            ]
                        ], 
                        [
                            '$unwind' => ['path' => '$TodasMaterias']
                        ], 
                        [
                            '$lookup' => [
                                'from' => 'docentes', 
                                'let' => ['grupoinst' => '$TodasMaterias.Clave'], 
                                'pipeline' => [
                                    [
                                        '$project' => [
                                            '_id' => 0, 
                                            'correo' => 1, 
                                            'nombre' => 1, 
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
                                'as' => 'TodasMaterias.docentes'
                            ]
                        ], 
                        [
                            '$unwind' => ['path' => '$TodasMaterias.docentes']
                        ], 
                        [
                            '$project' => [
                                'materia' => '$Materia',
                                'correo' => '$TodasMaterias.docentes.correo', 
                                'nombre' => '$TodasMaterias.docentes.nombre', 
                                'grupo' => '$TodasMaterias.docentes.grupo.v.Grupo'
                            ]
                        ], 
                        [
                            '$group' => [
                                '_id' => '$correo', 
                                'materia' => ['$first' => '$materia'],
                                'nombre' => ['$first' => '$nombre'], 
                                'grupos' => ['$push' => '$grupo']
                            ]
                        ]
                    ];
                    $correos = $connNoSQL->agregacion("instrumentaciones", $pipeline);
                    foreach($correos as $correo) {
                        $mail->addAddress($correo->_id, $correo->nombre);

                        $asunto = "Autorización de instrumentación didáctica";
                        $contenido = "<div style='text-align: justify; text-justify: inter-word;'><h3>La instrumentación didáctica de la asignatura de <b>" . $correo->materia . " (" . $instru[0] . ")" . "</b>  que imparte al grupo/grupos <b>" . implode(', ', $correo->grupos) . "</b> se ha considerado apropiada, por lo que ha sido autorizada por parte del/la presidente de grupo academico. <b>" . $_POST['nombrePresi'] . ".</b></h3></div>";

                        $mail->Subject = $asunto;
                        $mail->isHTML(true);
                        $mail->CharSet = 'UTF-8';
                        $mail->Body = $contenido;

                        //if(!$mail->send())
                          //  throw new Exception($mail->ErrorInfo);
                            
                        $mail->clearAddresses();
                    }
                }

            break;
            


            case 'autorizarInstruJefeDivision':
                $periodo = $_POST['periodo'];
                $claveAsignatura = $_POST['clave-asignatura'];
                $claveMateria = $_POST['clave-materia'];
                $nombreJefeDivision = $_POST['nombreJefe'];

                $pipeline = [
                    [
                        '$match' => ['Instrumentos' => 'Carreras']
                    ], 
                    [
                        '$project' => [
                            '_id' => 0, 
                            'Materia' => '$periodos_Inst.' . $periodo . '.' . $claveAsignatura . '.Materia', 
                            'ClaveMateria' => [
                                '$filter' => [
                                    'input' => '$periodos_Inst.' . $periodo . '.' . $claveAsignatura . '.TodasMaterias', 
                                    'cond' => [
                                        '$eq' => ['$$this.Clave', $claveMateria]
                                    ]
                                ]
                            ]
                        ]
                    ], 
                    [
                        '$unwind' => ['path' => '$ClaveMateria']
                    ], 
                    [
                        '$project' => [
                            'Materia' => 1, 
                            'ClaveMateria' => '$ClaveMateria.Clave',
                            'PE' => '$ClaveMateria.PE'
                        ]
                    ], 
                    [
                        '$lookup' => [
                            'from' => 'docentes', 
                            'let' => ['grupoinst' => '$ClaveMateria'], 
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
                            'as' => 'Docentes'
                        ]
                    ], 
                    [
                        '$unwind' => ['path' => '$Docentes']
                    ], 
                    [
                        '$project' => [
                            'Materia' => 1, 
                            'ClaveMateria' => 1, 
                            'PE' => 1,
                            'Correo' => '$Docentes.correo', 
                            'Nombre' => '$Docentes.nombre', 
                            'Grupo' => '$Docentes.grupo.v.Grupo'
                        ]
                    ], 
                    [
                        '$group' => [
                            '_id' => '$Correo', 
                            'PE' => ['$first' => '$PE'],
                            'materia' => ['$first' => '$Materia'], 
                            'nombre' => ['$first' => '$Nombre'], 
                            'grupos' => ['$push' => '$Grupo']
                        ]
                    ]
                ];

                $correos = $connNoSQL->agregacion("instrumentaciones", $pipeline);
                foreach($correos as $correo) {
                    $mail->addAddress($correo->_id, $correo->nombre);

                    $asunto = "Autorización de instrumentación didáctica por el jefe de división.";
                    $contenido = "<div style='text-align: justify; text-justify: inter-word;'><h3>La instrumentación didáctica de la asignatura de <b>" . $correo->materia . " (" . $claveAsignatura . ")" . "</b>  que imparte al grupo/grupos <b>" . implode(', ', $correo->grupos) . "</b> se ha considerado apropiada, por lo que ha sido autorizada por parte del/la jefe de división del programa educativo de <b>" . $correo->PE . ": </b>" . $nombreJefeDivision . ". Ahora esta instrumentación es válida de forma oficial.</h3></div>";

                    $mail->Subject = $asunto;
                    $mail->isHTML(true);
                    $mail->CharSet = 'UTF-8';
                    $mail->Body = $contenido;

                    //if(!$mail->send())
                      //  throw new Exception($mail->ErrorInfo);
                        
                    $mail->clearAddresses();
                }
            break;

            case 'denegarInstruJefeDivision':
            break;

            case 'autorizarMultiInstruJefeDivision':
            break;
        }
    }

} catch (Exception $e) {
    echo json_encode(['success' => false, 'mensaje' => $e->getMessage()]);
}
?>
