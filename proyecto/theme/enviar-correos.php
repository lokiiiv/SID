<?php
header("Content-Type: application/json");
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require_once './../../valida.php';
require './../../vendor/autoload.php';
require_once './conexion/conexionNoSQL.php';

try {
    if (isset($_POST['accionCorreo']) && !empty($_POST['accionCorreo'])) {
        $accion = $_POST['accionCorreo'];
        $para = $_POST['presidenteCorreo'];
        $nombrePresidente = $_POST['presidenteNombre'];
        $asignatura = $_POST['asignatura'];
        $grupo = $_POST['grupo'];
        $docente = $_POST['docente'];
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
        $mail->Password = '9641GDH2023';
        $mail->setFrom($email, 'Instrumentaciones didácticas ITESA.');

        //Destinatario
        $mail->addAddress($para, $nombrePresidente);

        //Generar el asunto y contenido del correo conforme a la accion requerida
        switch($accion) {
            case 'validaPresidente':
                //Asunto y contenido del correo cuando es para avisar de que el presidente de grupo academico debe validar instrumentacion
                $asunto = "Validación de instrumentación didáctica - Presidente de grupo académico";
                $contenido = "<div style='text-align: justify; text-justify: inter-word;'><h3>La instrumentación didáctica de la asignatura de <b>" . $asignatura . "</b> del grupo/grupos <b>" . $grupo . "</b> ha sido generada y enviada por el/la docente <b>" . $docente . "</b> para su respectiva validación.<br><br>Por favor ingrese a la página del sistema de instrumentaciones didácticas y revise la instrumentación para validarla o cancelarla si es necesario.</h3></div>";
                break;
            case '':
                break;
        }

        $mail->Subject = $asunto;
        $mail->isHTML(true);
        $mail->CharSet = 'UTF-8';
        $mail->Body = $contenido;

        //if(!$mail->send())
          //  throw new Exception($mail->ErrorInfo);
        echo json_encode(['success' => true, 'mensaje' => 'El presidente de grupo academico de la asignatura ha sido notificado.']);

    }

} catch (Exception $e) {
    echo json_encode(['success' => false, 'mensaje' => $e->getMessage()]);
}

$connNoSQL = connNoSQL::singleton();
$pipeline = [
    [
        '$match' => [
            'Instrumentos' => 'Carreras'
        ]
    ], 
    [
        '$project' => [
            '_id' => 0, 
            'instrumentaciones' => [
                '$objectToArray' => '$periodos_Inst.ENERO-JUNIO-2023'
            ]
        ]
    ], 
    [
        '$unwind' => [
            'path' => '$instrumentaciones'
        ]
    ], 
    [
        '$match' => [
            'instrumentaciones.v.Validacion.Responsable.ID' => '96'
        ]
    ], 
    [
        '$unwind' => [
            'path' => '$instrumentaciones.v.TodasMaterias'
        ]
    ], 
    [
        '$lookup' => [
            'from' => 'docentes', 
            'let' => [
                'grupoinst' => '$instrumentaciones.v.TodasMaterias.Clave'
            ], 
            'pipeline' => [
                [
                    '$project' => [
                        '_id' => 0, 
                        'nombre' => 1, 
                        'correo' => 1, 
                        'grupo' => [
                            '$map' => [
                                'input' => [
                                    '$objectToArray' => '$periodos_Inst.ENERO-JUNIO-2023'
                                ], 
                                'in' => [
                                    'k' => [
                                        '$substr' => [
                                            '$$this.k', 0, 3
                                        ]
                                    ], 
                                    'v' => '$$this.v'
                                ]
                            ]
                        ]
                    ]
                ], 
                [
                    '$unwind' => [
                        'path' => '$grupo'
                    ]
                ], 
                [
                    '$match' => [
                        '$expr' => [
                            '$eq' => [
                                '$grupo.k', '$$grupoinst'
                            ]
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
            'let' => [
                'claveinst' => '$_id'
            ], 
            'pipeline' => [
                [
                    '$project' => [
                        '_id' => 0, 
                        'instrumentaciones' => [
                            '$objectToArray' => '$periodos_Inst.ENERO-JUNIO-2023'
                        ]
                    ]
                ], 
                [
                    '$unwind' => [
                        'path' => '$instrumentaciones'
                    ]
                ], 
                [
                    '$match' => [
                        'instrumentaciones.v.Validacion.Responsable.ID' => '96'
                    ]
                ], 
                [
                    '$match' => [
                        '$expr' => [
                            '$eq' => [
                                '$instrumentaciones.k', '$$claveinst'
                            ]
                        ]
                    ]
                ]
            ], 
        'as' => 'instruDetalle'
        ]
    ], 
    [
        '$unwind' => [
            'path' => '$instruDetalle'
        ]
    ], 
    [
        '$project' => [
            '_id' => 1, 
            'docentes' => 1, 
            'instruDetalle' => '$instruDetalle.instrumentaciones'
        ]
    ], 
    [
        '$addFields' => [
            'instruDetalle.v.TodasMaterias' => '$docentes'
        ]
    ], 
    [
        '$replaceRoot' => [
            'newRoot' => '$instruDetalle'
        ]
    ]
];


echo json_encode($connNoSQL->agregacion('instrumentaciones', $pipeline), JSON_UNESCAPED_UNICODE);

?>
