<?php

use GuzzleHttp\Promise\Is;

require_once 'conexionSQL.php';
require_once './../manejo-usuarios/UsuarioPrivilegiado.php';
require_once './../../../valida.php';
$connSQL = connSQL::singleton();

$u = UsuarioPrivilegiado::getByCorreo($_SESSION["correo"]);


if (isset($_POST['accion'])  && !empty($_POST['accion'])) {
    $action = $_POST['accion'];
    switch ($action) {
        case 'buscarPlanEstudios':
            $pe = $_POST['programa'];
            $query = "Select distinct planEstudio from programae where nombrePE='" . $pe . "'";
            $planes = $connSQL->consulta($query);
            $selected = "";
            foreach ($planes as $plan) {
                if (isset($_POST['selected']))
                    if ($_POST['selected'] == $plan[0]) $selected = "selected='selected'";
                echo "<option " . $selected . ">" . $plan[0] . "</option>";
            }
            break;
        case 'buscarLaboratorios':
            $query = "Select laboratorio from laboratorios";
            $labs = $connSQL->consulta($query);

            foreach ($labs as $lab) {
                $selected = "";
                if (isset($_POST['selected']))
                    if ($_POST['selected'] == $lab[0]) $selected = "selected='selected'";

                echo "<option " . $selected . " value='" . $lab[0] . "'>" . $lab[0] . "</option>";
            }
            break;
        case 'buscarCatalogo':
            $query = "Select distinct " . $_POST['catalogo'] . " from " . $_POST['tabla'] . " order by " . $_POST['catalogo'] . " asc";
            $catalogo = $connSQL->consulta($query);
            foreach ($catalogo as $option) {
                $selected = "";
                if (isset($_POST['selected']))
                    if ($_POST['selected'] == $option[0]) {
                        $selected = "selected='selected'";
                        $si = 2;
                    }
                echo "<option " . $selected . " value='" . $option[0] . "'>" . $option[0] . "</option>";
            }
            break;
        case 'buscarCarrera':
            $le = $_POST['letrae'];
            $lex = substr($le, 1, 1);
            $query = "Select distinct nombrePE from programae where letra='" . $lex . "'";
            $letras = $connSQL->consulta($query);
            $selected = "";
            foreach ($letras as $let) {
                if (isset($_POST['selected']))
                    if ($_POST['selected'] == $let[0]) $selected = "selected='selected'";
                echo $selected . $let[0];
            }
            break;
        case 'buscarMateria':
            $le = $_POST['letrae'];
            $lex = substr($le, 0, 3);
            $query = "Select distinct ret_NomCompleto, temas from cereticula where ret_Clave='" . $lex . "'";
            $materia = $connSQL->consulta($query);
            $selected = "";
            foreach ($materia as $mat) {
                if (isset($_POST['selected']))
                    if ($_POST['selected'] == $mat[0]) $selected = "selected='selected'";

                //Incluir el nombre de materia y la cantidad de temas
                echo $selected . $mat[0] . '-' . $selected . $mat[1];
            }
            break;
        case 'buscarClave':
            $le = $_POST['letrae'];
            $lex = substr($le, 0, 3);
            $query = "Select distinct ret_ClaveOficial from cereticula where ret_Clave='" . $lex . "'";
            $clave = $connSQL->consulta($query);
            $selected = "";
            foreach ($clave as $clav) {
                if (isset($_POST['selected']))
                    if ($_POST['selected'] == $clav[0]) $selected = "selected='selected'";
                echo $selected . $clav[0];
            }
            break;
        case 'buscarencabezado':
            $query = "Select * from formato where id_formato = '1'";
            $clave = $connSQL->consulta($query);

            foreach ($clave as $clav) {
                for ($i = 1; $i < 7; $i++) {
                    echo $clav[$i];
                }
            }
            break;
        case 'buscarfechasrevision':
            $revision = $_POST['periodo'];
            $query = "Select p.periodo, r.revision,r.fecha_inicio, r.fecha_termino from revisiones r, periodos p where p.periodo = '" . $revision . "' AND p.id_periodo=r.id_periodo";
            $revisionesit = $connSQL->consulta($query);
            $datos = array();
            $cont = 0;
            foreach ($revisionesit as $revi) {
                $temp = array();
                $temp[0] = $revi["periodo"];
                $temp[1] = $revi["revision"];
                $temp[2] = $revi["fecha_inicio"];
                $temp[3] = $revi["fecha_termino"];
                $datos[$cont] = $temp;
                $cont++;
            }
            echo json_encode($datos);
            break;


        case 'buscarDatosMateria':
            $grupo = $_POST['grupo'];
        
            //Buscar la carrera del grupo de la instrumentacion a generar
            $carrera = "";
            $letrac = substr($grupo, 1, 1);
            $sql = "SELECT DISTINCT nombrePE
                    FROM programae
                    WHERE letra = :letra";
            $res = $connSQL->singlePreparedQuery($sql, ['letra' => $letrac]);
            if($res) $carrera = $res['nombrePE'];

            //Buscar la clave oficial de asignatura o clave de plan de estudio
            $claveOficial = "";
            $clave = substr($grupo, 0, 3);
            $sql = "SELECT DISTINCT ret_ClaveOficial
                    FROM cereticula
                    WHERE ret_Clave = :clave";
            $res = $connSQL->singlePreparedQuery($sql, ['clave' => $clave]);
            if($res) $claveOficial = $res['ret_ClaveOficial'];

            //Obtener las claves de asignatura que pertenecen a la clave oficial de asignatura o clave de plan de estudio
            $sql = "SELECT ce.ret_Clave AS Clave, pro.nombrePE AS PE,
                    CASE
                        WHEN SUBSTRING(ce.ret_Clave, 1, 1) = '1' THEN 'PRIMERO'
                        WHEN SUBSTRING(ce.ret_Clave, 1, 1) = '2' THEN 'SEGUNDO'
                        WHEN SUBSTRING(ce.ret_Clave, 1, 1) = '3' THEN 'TERCERO'
                        WHEN SUBSTRING(ce.ret_Clave, 1, 1) = '4' THEN 'CUARTO'
                        WHEN SUBSTRING(ce.ret_Clave, 1, 1) = '5' THEN 'QUINTO'
                        WHEN SUBSTRING(ce.ret_Clave, 1, 1) = '6' THEN 'SEXTO'
                        WHEN SUBSTRING(ce.ret_Clave, 1, 1) = '7' THEN 'SEPTIMO'
                        WHEN SUBSTRING(ce.ret_Clave, 1, 1) = '8' THEN 'OCTAVO'
                        WHEN SUBSTRING(ce.ret_Clave, 1, 1) = '9' THEN 'NOVENO'
                    END AS Semestre
                    FROM cereticula ce
                    INNER JOIN programae pro ON SUBSTRING(ce.ret_Clave, 2, 1) = pro.letra
                    WHERE ce.ret_ClaveOficial = :claveOficial
                    GROUP BY ce.ret_Clave";
            $claves = $connSQL->preparedQuery($sql, ['claveOficial' => $claveOficial]);

            //Buscar encabezado
            $encabezado = "";
            $sql = "SELECT *
                    FROM formato
                    WHERE id_formato = :idFormato";
            $res = $connSQL->singlePreparedQuery($sql, ['idFormato' => '1']);
            if($res) $encabezado = $res;

            //Buscar nombre materia y temas
            $materiaNombre = "";
            $temas = 0;
            $creditos = 0;
            $sql = "SELECT DISTINCT ret_NomCompleto, temas, ret_Creditos
                    FROM cereticula 
                    WHERE ret_Clave = :clave";
            $res = $connSQL->singlePreparedQuery($sql, ['clave' => $clave]);
            if($res) {
                $materiaNombre = $res['ret_NomCompleto'];
                $temas = $res['temas'];
                $creditos = $res['ret_Creditos'];
            }

            echo json_encode(['success' => true, 'data' => ['carrera' => $carrera, 'clave' => $claveOficial, 'encabezado' => $encabezado, 'materia' => $materiaNombre, 'temas' => $temas, 'creditos' => $creditos, 'todasMaterias' => $claves]]);
            break;

        case 'listarUsuarios':

            if ($u->hasPrivilegio("consultar_usuarios")) {
                //AQUI SE REALIZA EL SERVER SIDE DE DATATABLES, es decir, la busqueda, el ordenamiento y la paginacion
                //se ejecutan desde aqui en lugar desde el cliente, esto para aumentar la eficiencia al cargar muchos datos
                //evitando dejar todo el trabajao al cliente y solo devolviendo lo necesario

                //Definir la consulta para listar usuarios
                $sql = "SELECT d.cat_ID AS ID, d.cat_Clave AS clave, d.cat_ApePat AS ap, d.cat_ApeMat AS am, d.cat_Nombre as nombre, d.cat_CorreoE as correo, d.firma as firma, IF(r.id_rol IS NOT NULL, CONCAT('[', GROUP_CONCAT(JSON_OBJECT('id', r.id_rol, 'descripcion', r.descripcion_rol)), ']'), '[]') AS roles
                        FROM docentes d
                        LEFT JOIN docente_rol d_r on d.cat_ID = d_r.cat_ID
                        LEFT JOIN rol r on r.id_rol = d_r.id_rol ";

                //Verificar si el usuario manda valores para filtrar los datos de la tabla
                $bindings = [];
                if (isset($_POST["search"]["value"]) && !empty($_POST["search"]["value"])) {
                    //Obtener el valor a buscar
                    $str = trim($_POST["search"]["value"]);

                    //Añadir a la consulta base las condiciones WHERE o LIKE conforme a los valores que se quieren buscar de manera preparada
                    $sql .= 'WHERE d.cat_Clave LIKE ' . ':clave ';
                    $sql .= 'OR d.cat_ApePat LIKE ' . ':ap ';
                    $sql .= 'OR d.cat_ApeMat LIKE ' . ':am ';
                    $sql .= 'OR d.cat_Nombre LIKE ' . ':nombre ';
                    $sql .= 'OR d.cat_CorreoE LIKE ' . ':correo ';

                    //Generar el array con los paramaetros para la consulta preparada
                    $bindings = ["clave" => "%" . $str . "%", "ap" => "%" . $str . "%", "am" => "%" . $str . "%", "nombre" => "%" . $str . "%", "correo" => "%" . $str . "%"];
                }

                //Agrupar para completar la consulta original
                $sql .= " GROUP BY d.cat_ID ";

                //Si el usuario elige ordenar los datos conforme a los valores de una tabla
                if (isset($_POST["order"])) {
                    //Adjuntar a la consultar principal los operadores ORDER BY correspondientes
                    $sql .= 'ORDER BY ' . $_POST['columns'][$_POST["order"]["0"]["column"]]['data'] . ' ' . $_POST["order"][0]['dir'] . ' ';
                } else {
                    $sql .= 'ORDER BY ID ASC ';
                }

                //Limitar la cantidad de datos, paginacion...
                if ($_POST["length"] != -1) {
                    $sql .= 'LIMIT ' . $_POST["start"] . ',' . $_POST["length"];
                }

                //Ejecutar y obtener el resultado de la consulta
                $usuarios = $connSQL->preparedQuery($sql, $bindings);

                $final_data = [];
                //Recorrer el resultado para hacer una verificaciones extras y agregar datos extras
                foreach ($usuarios as $usuario) {
                    $firma = "";
                    $roles = "";

                    //Si la firma es vacia, retornar un nuevo html
                    if ($usuario['firma'] == "") {
                        $firma = '<div class="row"><p style="margin: auto;">Sin firma.</p></div>';
                    } else {
                        $firma = '<div class="row"><span style="margin: 0 auto;"><i class="fa-solid fa-circle-check"></i></span></div>';
                    }

                    //Verificar el datos de roles, si es diferente de vacio, retonar un html con la informacion
                    if ($usuario['roles'] != "[]") {
                        $jsonRoles = json_decode($usuario['roles']);

                        foreach ($jsonRoles as $rol) {
                            $roles .= '<div class="row" style="padding:1px;">' .
                                '<span class="badge badge-primary" style="font-size:11px;margin: auto;">' . $rol->descripcion . '</span>' .
                                '</div>';
                        }
                    } else {
                        $roles = '<div class="row"><p style="margin: auto;">Sin roles.</p></div>';
                    }

                    //Adjuntar el valor del ID del usuario a la propiedad ID del boton desplegable
                    $htmlEditar = $u->hasPrivilegio("actualizar_usuarios") ? '<a class="dropdown-item editar" href="" data-id="' . $usuario['ID'] . '">Editar</a>' : '';
                    $htmlBorrar = $u->hasPrivilegio("eliminar_usuarios") ? '<a class="dropdown-item eliminar" href="" data-id="' . $usuario['ID'] . '">Eliminar</a>' : '';
                    $htmlDefault = !$u->hasPrivilegio("actualizar_usuarios") && !$u->hasPrivilegio("eliminar_usuarios") ? '<button class="dropdown-item disabled">Ninguna acción disponible</button>' : '';
                    $acciones = '<div class="row"><div class="btn-group" style="margin: 0 auto;">' .
                        '<button type="button" class="btn btn-success btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">' .
                        'Acciones' .
                        '</button>' .
                        '<div class="dropdown-menu">' .
                        $htmlEditar .
                        $htmlBorrar .
                        $htmlDefault .
                        '</div>' .
                        '</div></div>';

                    $final_data[] = [
                        'ID' => $usuario['ID'],
                        'clave' => $usuario['clave'],
                        'ap' => $usuario['ap'],
                        'am' => $usuario['am'],
                        'nombre' => $usuario['nombre'],
                        'correo' => $usuario['correo'],
                        'firma' => $firma,
                        'roles' => $roles,
                        'acciones' => $acciones
                    ];
                }

                //Ejecutar la consulta para obtener la cantidad de datos total de usuarios
                $sql2 = "SELECT COUNT(x.ID) AS cant
                        FROM (SELECT d.cat_ID AS ID, d.cat_Clave AS clave, d.cat_ApePat AS ap, d.cat_ApeMat AS am, d.cat_Nombre as nombre, d.cat_CorreoE as correo, d.firma as firma, IF(r.id_rol IS NOT NULL, CONCAT('[', GROUP_CONCAT(JSON_OBJECT('id', r.id_rol, 'descripcion', r.descripcion_rol)), ']'), '[]') AS roles
                        FROM docentes d
                        LEFT JOIN docente_rol d_r on d.cat_ID = d_r.cat_ID
                        LEFT JOIN rol r on r.id_rol = d_r.id_rol
                        GROUP BY d.cat_ID) x";
                $total = $connSQL->preparedQuery($sql2);

                //Mostrar la respuesta conforme a los requerimientos de Datatables
                $salida = [
                    "draw" => intval($_POST["draw"]),
                    "recordsFiltered" => !isset($_POST["search"]["value"]) || empty($_POST["search"]["value"]) ? $total[0]['cant'] : count($usuarios),
                    "recordsTotal" => $total[0]['cant'],
                    "data" => $final_data
                ];
                echo json_encode($salida);
            } else {
                echo json_encode(['success' => false, 'mensaje' => 'No estas autorizado(a) para ver la lista de usuarios.']);
            }

            break;

            //Método para obtener un solo usuario a través de su ID
        case 'listarUsuarioById':

            if ($u->hasPrivilegio("actualizar_usuarios")) {
                $idUser = $_POST['idUser'];

                $sql = "SELECT d.cat_ID AS ID, 
                               d.cat_Clave AS clave, 
                               d.cat_ApePat AS ap, 
                               d.cat_ApeMat AS am, 
                               d.cat_Nombre as nombre, 
                               d.cat_CorreoE as correo, 
                               d.firma as firma, 
                               IF(r.id_rol IS NOT NULL, CONCAT('[', GROUP_CONCAT(JSON_OBJECT('id', r.id_rol, 'descripcion', r.descripcion_rol)), ']'), '[]') as roles 
                        FROM docentes d 
                        LEFT JOIN docente_rol d_r on d.cat_ID = d_r.cat_ID 
                        LEFT JOIN rol r on r.id_rol = d_r.id_rol 
                        WHERE d.cat_ID = :idUser 
                        GROUP BY d.cat_ID";
                $usuario = $connSQL->singlePreparedQuery($sql, ['idUser' => $idUser]);

                if (!empty($usuario)) {
                    //Verificar si la firma esta vacia, en caso de que no, devolver una etiqueta html
                    if ($usuario['firma'] != "") {
                        $usuario['firma'] = '<div class="row">
                                            <div class="col-md-9">
                                                <img src="./firmasimagenes/' . $usuario['firma'] . '" class="rounded mx-auto d-block img-fluid" width="100px"/>
                                                <input type="hidden" name="imagen_firma_oculta" value="' . $usuario['firma'] . '">
                                            </div>
                                            <div class="col-md-3 d-flex justify-content-center align-items-center">
                                                <button type="button" class="btn btn-danger btn-sm m-2" onclick="eliminarFirma(this)" data-firma="' . $usuario['firma'] . '" data-idUser="' . $usuario['ID'] . '"><i class="fa-solid fa-trash"></i></button>
                                            </div>
                                        </div>';
                    } else {
                        $usuario['firma'] = '<div class="row">
                                            <div class="col-md-12">
                                                <input type="hidden" name="imagen_firma_oculta" value="' . $usuario['firma'] . '">
                                            </div>
                                        </div>';
                    }
                    echo json_encode(['success' => true, 'data' => $usuario]);
                } else {
                    echo json_encode(['success' => false, 'mensaje' => 'Usuario no encontrado.']);
                }
            } else {
                echo json_encode(['success' => false, 'mensaje' => 'No estas autorizado (a) para ver la información de este usuario.']);
            }

            break;

            //Lista los roles incluyendo sus permisos
        case 'listarRoles':

            if ($u->hasPrivilegio("consultar_roles")) {
                $sql = "SELECT r.*, IF(p.id_permiso IS NOT NULL, CONCAT('[', GROUP_CONCAT(JSON_OBJECT('id', p.id_permiso, 'descripcion', p.descripcion_permiso)), ']'), '[]') AS permisos
                        FROM rol r
                        LEFT JOIN rol_permisos rp ON r.id_rol = rp.id_rol
                        LEFT JOIN permisos p ON p.id_permiso = rp.id_permiso
                        GROUP BY r.id_rol
                        ORDER BY r.id_rol ASC";
                $roles = $connSQL->preparedQuery($sql);

                $final_data = [];
                foreach ($roles as $rol) {

                    $htmlEditar = $u->hasPrivilegio("actualizar_roles") ? '<a class="dropdown-item editar" href="" data-id="' . $rol['id_rol'] . '">Editar</a>' : '';
                    $htmlBorrar = $u->hasPrivilegio("eliminar_roles") ? '<a class="dropdown-item eliminar" href="" data-id="' . $rol['id_rol'] . '">Eliminar</a>' :  '';
                    $htmlDefault = !$u->hasPrivilegio("actualizar_roles") && !$u->hasPrivilegio("eliminar_roles") ? '<button class="dropdown-item disabled">Ninguna acción disponible</button>' : '';
                    $acciones = '<div class="row">' .
                        '<div class="btn-group" style="margin: 0 auto;">' .
                        '<button type="button" class="btn btn-success btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">' .
                        'Acciones' .
                        '</button>' .
                        '<div class="dropdown-menu">' .
                        $htmlEditar .
                        $htmlBorrar .
                        $htmlDefault .
                        '</div>' .
                        '</div>' .
                        '</div>';

                    $final_data[] = [
                        'id_rol' => $rol['id_rol'],
                        'nombre_rol' => $rol['nombre_rol'],
                        'descripcion_rol' => $rol['descripcion_rol'],
                        'permisos' => $rol['permisos'],
                        'acciones' => $acciones
                    ];
                }

                echo json_encode($final_data, JSON_UNESCAPED_UNICODE);
            } else {
                echo json_encode(['success' => false, 'mensaje' => 'No estas autorizado (a) para ver la información de los roles.']);
            }

            break;

            //Método para obtener un solo rol a través de su ID
        case 'listarRolById':

            if ($u->hasPrivilegio("actualizar_roles")) {
                $idRol = $_POST['idRol'];

                $sql = "SELECT r.*, IF(p.id_permiso IS NOT NULL, CONCAT('[', GROUP_CONCAT(JSON_OBJECT('id', p.id_permiso, 'descripcion', p.descripcion_permiso)), ']'), '[]') AS permisos
                    FROM rol r
                    LEFT JOIN rol_permisos rp ON r.id_rol = rp.id_rol
                    LEFT JOIN permisos p ON p.id_permiso = rp.id_permiso
                    WHERE r.id_rol = :idRol
                    GROUP BY r.id_rol";

                $rol = $connSQL->singlePreparedQuery($sql, ['idRol' => $idRol]);
                if (!empty($rol)) {
                    echo json_encode(['success' => true, 'data' => $rol]);
                } else {
                    echo json_encode(['success' => false, 'mensaje' => 'Rol no encontrado.']);
                }
            } else {
                echo json_encode(['success' => false, 'mensaje' => 'No estas autorizado (a) para ver la información de este rol.']);
            }

            break;

            //Listar los roles de manera general
        case 'listarRolesGeneral':
            $sql = "SELECT * FROM rol";
            $roles = $connSQL->preparedQuery($sql);
            echo json_encode($roles);
            break;

            //Listar los permisos de manera general
        case 'listarPermisosGeneral':
            $sql = "SELECT * FROM permisos";
            $roles = $connSQL->preparedQuery($sql);
            echo json_encode($roles);
            break;


        case 'crearActualizarUsuario':
            //Verificar que operacion es, si crear o actualizar
            if (isset($_POST['operacion']) && isset($_POST['inputClave']) && isset($_POST['inputAp']) && isset($_POST['inputAm']) && isset($_POST['inputNombre']) && isset($_POST['inputCorreo'])) {

                if ($_POST["operacion"] === "Crear") {

                    if ($u->hasPrivilegio("agregar_usuarios")) {

                        //Primero verificar que no exista un usuario con un correo ya existente al que se desea ingresar
                        $sql = "SELECT cat_CorreoE FROM docentes WHERE cat_CorreoE = :correo";
                        $correo = $connSQL->singlePreparedQuery($sql, ['correo' => $_POST['inputCorreo']]);
                        if ($correo) {
                            echo json_encode(['success' => false, 'mensaje' => 'Ya existe un usuario con el correo indicado']);
                            //echo "Ya existe un usuario con el correo indicado.";
                            die();
                        } else {
                            //Verificar si al crear usuario se ha elegido subir el archivo de la firma
                            $imagen = "";
                            if (isset($_FILES["inputFirma"])) {
                                //Generar un nuevo nombre de la imagen y almacenar la misma en el servidor
                                if ($_FILES["inputFirma"]["name"] != "") {
                                    $extension = explode('.', $_FILES["inputFirma"]["name"]);
                                    $imagen = rand() . '_' . $_POST["inputCorreo"] . '.' . end($extension);
                                    $ubicacion = "./../firmasimagenes/" . $imagen;
                                    move_uploaded_file($_FILES["inputFirma"]["tmp_name"], $ubicacion);
                                }
                            }

                            //Una vez guardada la imagen, almacenar el nuevo usuario y el nombre de la imagen en la base de datos
                            //Tambien almacenar y gurdar los roles que se hayan elegido
                            $sql = "INSERT INTO docentes (cat_Clave, cat_ApePat, cat_ApeMat, cat_Nombre, cat_CorreoE, firma)
                                VALUES (:clave, :ap, :am, :nombre, :correo, :firma)";
                            $params = [
                                ':clave' => $_POST['inputClave'],
                                ':ap' => $_POST['inputAp'],
                                ':am' => $_POST['inputAm'],
                                ':nombre' => $_POST['inputNombre'],
                                ':correo' => $_POST['inputCorreo'],
                                ':firma' => $imagen
                            ];
                            $connSQL->addUsuarioRoles($sql, $params, json_decode($_POST['idRoles']));
                            echo json_encode(['success' => true, 'mensaje' => 'Usuario registrado correctamente.']);
                            //echo 'Usuario registrado correctamente.';
                        }
                    } else {
                        echo json_encode(['success' => false, 'mensaje' => 'No estas autorizado (a) para crear nuevos usuarios.']);
                    }
                } else if ($_POST["operacion"] === "Actualizar") {

                    if ($u->hasPrivilegio("actualizar_usuarios")) {
                        //Primero, obtener la informacion del usuario a actualizar
                        $sql = "SELECT * FROM docentes WHERE cat_ID = :idUser";
                        $usuario = $connSQL->singlePreparedQuery($sql, ['idUser' => $_POST['idUser']]);
                        if ($usuario) {
                            $correo = "";
                            $imagen = "";
                            //Verificar si el correo del usuario a actualizar coincide con el que se quiere actualizar
                            if ($usuario['cat_CorreoE'] == $_POST['inputCorreo']) {
                                //Si este es el caso, entonces el usuario no ha elegido modificar su correo
                                $correo = $usuario['cat_CorreoE'];
                            } else {
                                //Es probable que el usuario eliga actualizar el correo de alguien
                                //Por lo tanto verificar que el nuevo correo no existan en la base de datos, es decir, no haya un usuario con el correo existente
                                $sql = "SELECT cat_CorreoE FROM docentes WHERE cat_CorreoE = :correo";
                                $correo = $connSQL->singlePreparedQuery($sql, ['correo' => $_POST['inputCorreo']]);
                                if ($correo) {
                                    echo json_encode(['success' => false, 'mensaje' => 'Ya existe un usuario con el correo que está intentando actualizar.']);
                                    //echo "Ya existe un usuario con el correo que está intentado actualizar.";
                                    die();
                                } else {
                                    //En caso contrario, proceder a registrar el correo que quiere actualizar del usuario
                                    $correo = $_POST['inputCorreo'];
                                }
                            }

                            //Verificar si el usuario ha elegido subir una nueva firma para actualizar sus datos
                            if (isset($_FILES["inputFirma"])) {
                                //Si decide subir una imagen, subirla y guardar su nombre en la base de datos
                                //Si el usuario ya tiene imagen de firma, solo actualizar el archivo eliminando el anterior

                                //Generar un nuevo nombre de la imagen y almacenar la misma en el servidor
                                if ($_FILES["inputFirma"]["name"] != "") {
                                    $extension = explode('.', $_FILES["inputFirma"]["name"]);
                                    $imagen = rand() . '_' . $_POST["inputCorreo"] . '.' . end($extension);
                                    $ubicacion = "./../firmasimagenes/" . $imagen;

                                    //si el usuario ya tiene la imagen de su firma
                                    if (isset($_POST["imagen_firma_oculta"])) {
                                        if ($_POST["imagen_firma_oculta"] != "") {
                                            unlink("./../firmasimagenes/" . $_POST["imagen_firma_oculta"]);
                                            move_uploaded_file($_FILES["inputFirma"]["tmp_name"], $ubicacion);
                                        } else {
                                            move_uploaded_file($_FILES["inputFirma"]["tmp_name"], $ubicacion);
                                        }
                                    }
                                } else {
                                    //si no se elige actualiza o subir una nueva firma, dejar el valor con el valor que tenia siempre
                                    $imagen = $_POST["imagen_firma_oculta"];
                                }
                            }

                            //Si todas las comprobaciones estan bien, proceder a actualizar los datos del usuario y en su caso sus roles si es necesario
                            $sql = "UPDATE docentes 
                                SET cat_Clave = :clave, cat_ApePat = :ap, cat_ApeMat = :am, cat_Nombre = :nombre, cat_CorreoE = :correo, firma = :firma
                                WHERE cat_ID = :idUser";
                            $params = [
                                'clave' => $_POST['inputClave'],
                                'ap' => $_POST['inputAp'],
                                'am' => $_POST['inputAm'],
                                'nombre' => $_POST['inputNombre'],
                                'correo' => $_POST['inputCorreo'],
                                'firma' => $imagen,
                                'idUser' => $_POST['idUser']
                            ];

                            $res = $connSQL->preparedUpdate($sql, $params);
                            if ($res) {
                                echo json_encode(['success' => true, 'mensaje' => 'Usuario actualizado correctamente.']);
                                //echo 'Usuario actualizado correctamente.';
                            } else {
                                echo json_encode(['success' => false, 'mensaje' => 'Error al actualizar el usuario.']);
                                //echo 'Error al actualizar al usuario';
                            }
                        } else {
                            echo json_encode(['success' => false, 'mensaje' => 'Usuario no encontrado.']);
                            //echo "Usuario no encontrado.";
                            die();
                        }
                    } else {
                        echo json_encode(['success' => false, 'mensaje' => 'No estas autorizado (a) para actualizar usuarios.']);
                    }
                }
            } else {
                echo json_encode(['success' => false, 'mensaje' => 'Ingrese todos los datos requeridos.']);
                //echo 'Ingrese todos los datos requeridos';
            }
            break;

        case 'eliminarRolDeUsuario':
            if ($u->hasPrivilegio("actualizar_usuarios")) {

                if (isset($_POST['idUser']) && isset($_POST['idRol'])) {
                    $sql = "DELETE FROM docente_rol WHERE cat_ID = :idUser AND id_rol = :idRol";
                    $params = ['idUser' => $_POST['idUser'], 'idRol' => $_POST['idRol']];

                    $res = $connSQL->preparedDelete($sql, $params);
                    if ($res) {
                        echo json_encode(['success' => true, 'mensaje' => 'Rol eliminado correctamente.']);
                        //echo 'Rol eliminado correctamente.';
                    } else {
                        echo json_encode(['success' => false, 'mensaje' => 'Error al eliminar el rol.']);
                        //echo 'Error al eliminar el rol.';
                    }
                } else {
                    echo json_encode(['success' => false, 'mensaje' => 'Ingrese todos los datos requeridos.']);
                }
            } else {
                echo json_encode(['success' => false, 'mensaje' => 'No estas autorizado (a) para eliminar roles a los usuarios.']);
            }

            break;

        case 'agregarRolDeUsuario':
            if ($u->hasPrivilegio("actualizar_usuarios")) {
                if (isset($_POST['idUser']) && isset($_POST['idRol'])) {
                    $sql = "INSERT INTO docente_rol (cat_ID, id_rol) VALUES (:idUser, :idRol)";
                    $params = ['idUser' => $_POST['idUser'], 'idRol' => $_POST['idRol']];

                    $res = $connSQL->preparedInsert($sql, $params);
                    if ($res) {
                        echo json_encode(['success' => true, 'mensaje' => 'Rol agregado correctamente.']);
                    } else {
                        echo json_encode(['success' => false, 'mensaje' => 'Error al agregar el rol.']);
                    }
                } else {
                    echo json_encode(['success' => false, 'mensaje' => 'Ingrese todos los datos requeridos.']);
                }
            } else {
                echo json_encode(['success' => false, 'mensaje' => 'No estas autorizado (a) para agregar roles a los usuarios.']);
            }

            break;

        case 'eliminarUsuario':
            if ($u->hasPrivilegio("eliminar_usuarios")) {
                if (isset($_POST['idUser'])) {

                    //Primero hay que obtener el nombre de la imagen que guarda su firma para poder eliminarlo posteriormente
                    $sql = "SELECT firma FROM docentes WHERE cat_ID = :idUser";
                    $correo = $connSQL->singlePreparedQuery($sql, ['idUser' => $_POST['idUser']]);
                    $firma = "";
                    if ($correo) {
                        $firma = $correo['firma'];
                    }

                    //Eliminar la imagen de su firma si es que existe
                    if ($firma != "") {
                        unlink("./../firmasimagenes/" . $firma);
                    }

                    $sql = "DELETE FROM docentes WHERE cat_ID = :idUser";
                    $params = ['idUser' => $_POST['idUser']];
                    $res = $connSQL->preparedDelete($sql, $params);
                    if ($res) {
                        echo json_encode(['success' => true, 'mensaje' => 'Usuario eliminado existosamente.']);
                    } else {
                        echo json_encode(['success' => false, 'mensaje' => 'Error al intentar eliminar al usuario']);
                    }
                } else {
                    echo json_encode(['success' => false, 'mensaje' => 'Ingrese todos los datos requeridos']);
                }
            } else {
                echo json_encode(['success' => false, 'mensaje' => 'No estas autorizado (a) para eliminar usuarios.']);
            }
            break;


        case 'crearActualizarRol':
            //Verificar que operacion es, si crear o actualizar
            if (isset($_POST['operacion']) && isset($_POST['inputRol'])) {
                if ($_POST["operacion"] === "Crear") {

                    if ($u->hasPrivilegio("agregar_roles")) {
                        //El nombre del rol sera el mismo que ingrese el usuario pero sin espacios remplazandolos por guion bajo
                        setlocale(LC_ALL, 'en_US.utf8');
                        $nombre = mb_strtolower(str_replace(' ', '_', preg_replace('/[^A-Za-z0-9 ]/', '', iconv('UTF-8', 'ASCII//TRANSLIT', $_POST['inputRol']))), 'UTF-8');
                        $descripcion = $_POST['inputRol'];
                        $permisos = $_POST['idPermisos'];
                        //Almacenar el nuevo rol
                        //Tambien almacenar y gurdar los permisos que se hayan elegido
                        $sql = "INSERT INTO rol (nombre_rol, descripcion_rol) VALUES (:nombre, :descripcion)";
                        $params = [
                            ':nombre' => $nombre,
                            ':descripcion' => $descripcion
                        ];
                        $connSQL->addRolesPermisos($sql, $params, json_decode($permisos));
                        echo json_encode(['success' => true, 'mensaje' => 'Rol registrado correctamente.']);
                    } else {
                        echo json_encode(['success' => false, 'mensaje' => 'No estas autorizado (a) para agregar roles.']);
                    }
                } else if ($_POST["operacion"] === "Actualizar") {

                    if ($u->hasPrivilegio("actualizar_roles")) {
                        $nombre = mb_strtolower(str_replace(' ', '_', preg_replace('/[^A-Za-z0-9 ]/', '', iconv('UTF-8', 'ASCII//TRANSLIT', $_POST['inputRol']))), 'UTF-8');
                        $descripcion = $_POST['inputRol'];
                        $idRol = $_POST['idRol'];

                        $sql = "UPDATE rol SET nombre_rol = :nombre, descripcion_rol = :descripcion WHERE id_rol = :idRol";
                        $params = [
                            'nombre' => $nombre,
                            'descripcion' => $descripcion,
                            'idRol' => $idRol
                        ];

                        $res = $connSQL->preparedUpdate($sql, $params);
                        if ($res) {
                            echo json_encode(['success' => true, 'mensaje' => 'Rol actualizado correctamente.']);
                        } else {
                            echo json_encode(['success' => false, 'mensaje' => 'Error al actualizar el rol.']);
                        }
                    } else {
                        echo json_encode(['success' => false, 'mensaje' => 'No estas autorizado (a) para actualizar roles.']);
                    }
                }
            } else {
                echo json_encode(['success' => false, 'mensaje' => 'Ingrese todos los datos requeridos.']);
            }

            break;

        case 'eliminarPermisoDeRol':
            if ($u->hasPrivilegio("actualizar_roles")) {
                if (isset($_POST['idRol']) && isset($_POST['idPermiso'])) {
                    $sql = "DELETE FROM rol_permisos WHERE id_rol = :idRol AND id_permiso = :idPermiso";
                    $params = ['idRol' => $_POST['idRol'], 'idPermiso' => $_POST['idPermiso']];

                    $res = $connSQL->preparedDelete($sql, $params);
                    if ($res) {
                        echo json_encode(['success' => true, 'mensaje' => 'Permiso eliminado correctamente.']);
                        //echo 'Rol eliminado correctamente.';
                    } else {
                        echo json_encode(['success' => false, 'mensaje' => 'Error al eliminar el permiso.']);
                        //echo 'Error al eliminar el rol.';
                    }
                } else {
                    echo json_encode(['success' => false, 'mensaje' => 'Ingrese todos los datos requeridos.']);
                }
            } else {
                echo json_encode(['success' => false, 'mensaje' => 'No estas autorizado (a) para eliminar permisos a los roles.']);
            }

            break;

        case 'agregarPermisoDeRol':

            if ($u->hasPrivilegio("actualizar_roles")) {
                if (isset($_POST['idRol']) && isset($_POST['idPermiso'])) {
                    $sql = "INSERT INTO rol_permisos (id_rol, id_permiso) VALUES (:idRol, :idPermiso)";
                    $params = ['idRol' => $_POST['idRol'], 'idPermiso' => $_POST['idPermiso']];

                    $res = $connSQL->preparedInsert($sql, $params);
                    if ($res) {
                        echo json_encode(['success' => true, 'mensaje' => 'Permiso agregado correctamente.']);
                    } else {
                        echo json_encode(['success' => false, 'mensaje' => 'Error al agregar el permiso.']);
                    }
                } else {
                    echo json_encode(['success' => false, 'mensaje' => 'Ingrese todos los datos requeridos.']);
                }
            } else {
                echo json_encode(['success' => false, 'mensaje' => 'No estas autorizado (a) para asignar permisos a los roles.']);
            }

            break;

        case 'eliminarRol':

            if ($u->hasPrivilegio("eliminar_roles")) {
                if (isset($_POST['idRol'])) {

                    $sql = "DELETE FROM rol WHERE id_rol = :idRol";
                    $params = ['idRol' => $_POST['idRol']];
                    $res = $connSQL->preparedDelete($sql, $params);
                    if ($res) {
                        echo json_encode(['success' => true, 'mensaje' => 'Rol eliminado existosamente.']);
                    } else {
                        echo json_encode(['success' => false, 'mensaje' => 'Error al intentar eliminar al rol.']);
                    }
                } else {
                    echo json_encode(['success' => false, 'mensaje' => 'Ingrese todos los datos requeridos']);
                }
            } else {
                echo json_encode(['success' => false, 'mensaje' => 'No estas autorizado (a) para eliminar roles.']);
            }

            break;

        case 'eliminarFotoFirma':

            if ($u->hasPrivilegio("actualizar_usuarios")) {
                if (isset($_POST['nombreFirma']) && isset($_POST['idUsuario'])) {
                    //Eliminar la foto de la firma en el servidor
                    unlink("./../firmasimagenes/" . $_POST['nombreFirma']);

                    //Actualizar y poner el vacio el campo de firma del usuario
                    $sql = "UPDATE docentes SET firma = :firma WHERE cat_ID = :idUsuario";
                    $params = [
                        'firma' => '',
                        'idUsuario' => $_POST['idUsuario'],
                    ];
                    $res = $connSQL->preparedUpdate($sql, $params);
                    if ($res) {
                        echo json_encode(['success' => true, 'mensaje' => 'Imagen de la firma eliminada correctamente.']);
                    } else {
                        echo json_encode(['success' => false, 'mensaje' => 'Error al intentar eliminar la imagen de la firma.']);
                    }
                }
            } else {
                echo json_encode(['success' => false, 'mensaje' => 'No estas autorizado (a) para eliminar las firmas de los usuarios.']);
            }
            break;


            //Metodos para la administración de grupos academicos
        case 'mostrarGruposAcademicos': 
            if($u->hasPrivilegio("consultar_grupos_academico")) {
                //Consultar los grupos academicos del sistema
                $sql = "SELECT ga.id_grupoacademico, 
                        ga.nombre, 
                        pro.*, 
                        d.cat_ID, 
                        CONCAT(d.cat_Nombre, ' ', d.cat_ApePat, ' ', d.cat_ApeMat) as nombreDoc, 
                        d.cat_CorreoE as correo
                    FROM gruposacademicos ga
                    LEFT OUTER JOIN programae pro ON pro.id_programaE = ga.id_programaE
                    LEFT JOIN docentes d ON d.cat_ID = ga.cat_ID";
                $grupos = $connSQL->preparedQuery($sql);

                $final_data = [];
                foreach ($grupos as $grupo) {
                    $htmlEditar = $u->hasPrivilegio("actualizar_grupo_academico") ? '<a class="dropdown-item editar" href="" data-id="' . $grupo['id_grupoacademico'] . '"><i class="fa-solid fa-pen-to-square mr-2"></i>Editar</a>' :  '';
                    $htmlBorrar = $u->hasPrivilegio("eliminar_grupo_academico") ? '<a class="dropdown-item eliminar" href="" data-id="' . $grupo['id_grupoacademico'] . '"><i class="fa-solid fa-trash mr-2"></i>Eliminar</a>' : '';
                    $htmlDefault = !$u->hasPrivilegio("actualizar_grupo_academico") && !$u->hasPrivilegio("eliminar_grupo_academico") ? '<button class="dropdown-item disabled">Ninguna acción disponible</button>' : '';
                    $acciones = '<div class="row"><div class="btn-group" style="margin: 0 auto;">' .
                        '<button type="button" class="btn btn-success btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">' .
                        'Acciones' .
                        '</button>' .
                        '<div class="dropdown-menu">' .
                        $htmlEditar . 
                        $htmlBorrar .
                        $htmlDefault . 
                        '</div>' .
                        '</div></div>';

                    $final_data[] = [
                        'ID' => $grupo['id_grupoacademico'],
                        'nombre' => $grupo['nombre'],
                        'nombrePrograma' => $grupo['id_programaE'] != null ? $grupo['planEstudio'] . ' / ' . $grupo['nombrePE'] : 'NO APLICA',
                        'presidente' => $grupo['cat_ID'] != null ? $grupo['nombreDoc'] : 'SIN PRESIDENTE',
                        'acciones' => $acciones
                    ];
                }

                echo json_encode(['success' => true, 'data' => $final_data]);
            } else {
                echo json_encode(['success' => false, 'mensaje' => 'No estas autorizado (a) para ver la información de los grupos académicos.']);
            }
            break;

        case 'mostrarProgramasYPresidentes':
            //Consultar de igual forma los programas educativos 
            $sql = "SELECT * FROM programae";
            $programas = $connSQL->preparedQuery($sql);

            //Consultar a todos los usuarios cuyo rol sea jefe de grupo academico
            $sql = "SELECT d.cat_ID, 
                           d.cat_Clave, 
                           CONCAT(d.cat_Nombre, ' ', d.cat_ApePat, ' ', d.cat_ApeMat) as nombre, 
                           d.cat_CorreoE as correo
                    FROM docentes d 
                    INNER JOIN docente_rol dr ON d.cat_ID = dr.cat_ID
                    WHERE dr.id_rol = 3";
            $presidentes = $connSQL->preparedQuery($sql);

            echo json_encode(['success' => true, 'data' => ['programas' => $programas, 'presidentes' => $presidentes]]);
            break;

        case 'searchMaterias':
            //Hacer una consulta con el operador LIKE de las materias disponibles
            if (isset($_POST['search'])) {
                $str = trim($_POST['search']);
                $sql = "SELECT *
                        FROM cereticula
                        WHERE ret_Clave LIKE :clave
                        OR ret_ClaveInt LIKE :claveInt
                        OR ret_NomCorto LIKE :nomCorto
                        OR ret_NomCompleto LIKE :nomCompleto
                        OR ret_ClaveOficial LIKE :claveOficial";
                $materias = $connSQL->preparedQuery($sql, ["clave" => "%" . $str . "%", "claveInt" => "%" . $str . "%", "nomCorto" => "%" . $str . "%", "nomCompleto" => "%" . $str . "%", "claveOficial" => "%" . $str . "%"]);

                //Devolver la información en forma de enlaces para agregarlos directamente a la lista HTML de Boostrap
                $final_data = '';
                if (count($materias) > 0) {
                    foreach ($materias as $materia) {
                        $final_data .= '<a href="#" class="list-group-item list-group-item-action border-1" data-id="' . $materia['ret_ID'] . '" data-clave="' . $materia['ret_Clave'] . '" data-nombre="' . $materia['ret_NomCompleto'] . '" data-claveOficial="' . $materia['ret_ClaveOficial'] . '">' . $materia['ret_Clave'] . ' - ' . $materia['ret_NomCompleto'] . '</a>';
                    }
                } else {
                    $final_data .= '<p class="list-group-item border-1">No se encontraron resultados.</p>';
                }
                echo json_encode(['success' => true, 'data' => $final_data]);
            } else {
                echo json_encode(['success' => false, 'mensaje' => 'Ingrese todos los datos requeridos']);
            }
            break;

        case 'crearActualizarGrupoAcademico':
            //Verificar que operacion es, si crear o actualizar
            if (isset($_POST['operacion']) && isset($_POST['inputNombre']) && isset($_POST['selectPrograma']) && isset($_POST['selectPresidente'])) {
                if ($_POST["operacion"] === "Crear") {
                    if($u->hasPrivilegio("agregar_grupo_academico")) {
                        $nombre = $_POST['inputNombre'];
                        $idPrograma = $_POST['selectPrograma'] != '' ? $_POST['selectPrograma'] : null;
                        $idPresidente = $_POST['selectPresidente'];

                        //Insertar el nuevo grupo academico
                        $sql = "INSERT INTO gruposacademicos (nombre, id_programaE, cat_ID) VALUES(:nombre, :idPrograma, :idUser)";
                        $params = [':nombre' => $nombre, ':idPrograma' => $idPrograma, ':idUser' => $idPresidente];

                        $connSQL->addGrupoAcaMaterias($sql, $params, json_decode($_POST['idMaterias']));
                        echo json_encode(['success' => true, 'mensaje' => 'Grupo académico registrado correctamente.']);
                    } else {
                        echo json_encode(['success' => false, 'mensaje' => 'No estas autorizado (a) para agregar grupos académicos.']);
                    }
                } else if ($_POST["operacion"] === "Actualizar") {
                    if($u->hasPrivilegio("actualizar_grupo_academico")) {
                        $nombre = $_POST['inputNombre'];
                        $idPrograma = $_POST['selectPrograma'] != '' ? $_POST['selectPrograma'] : null;
                        $idPresidente = $_POST['selectPresidente'];

                        $sql = "UPDATE gruposacademicos SET nombre = :nombre, id_programaE = :idPrograma, cat_ID = :idPresidente WHERE id_grupoacademico = :idGrupo";
                        $params = [':nombre' => $nombre, ':idPrograma' => $idPrograma, ':idPresidente' => $idPresidente, ':idGrupo' => $_POST['idGrupo']];

                        $connSQL->updateGrupoAcaMaterias($sql, $params, $_POST['idGrupo'], json_decode($_POST['idMaterias']));
                        echo json_encode(['success' => true, 'mensaje' => 'Grupo académico actualizado correctamente.']);
                    } else {
                        echo json_encode(['success' => false, 'mensaje' => 'No estas autorizado (a) para actualizar grupos académicos.']);
                    }
                }
            } else {
                echo json_encode(['success' => false, 'mensaje' => 'Ingrese todos los datos requeridos']);
            }
            break;

        case 'obtenerGrupoAcademicoById':
            if($u->hasPrivilegio("actualizar_grupo_academico")) {
                if (isset($_POST['idGrupo'])) {
                    $sql = "SELECT ga.*, ce.ret_ID, ce.ret_Clave, ce.ret_NomCompleto, ce.ret_ClaveOficial
                            FROM gruposacademicos ga 
                            LEFT JOIN cereticula ce ON ga.id_grupoacademico = ce.id_grupoacademico 
                            WHERE ga.id_grupoacademico = :idGrupoAcademico";

                    $grupo = $connSQL->preparedQuery($sql, ['idGrupoAcademico' => $_POST['idGrupo']]);
                    if (count($grupo) > 0) {
                        //Al ejecutar el LEFT JOIN, devuelve una o varias filas, sin embargo, se requiere un
                        //formato parecido al siguiente, por ejemplo:
                        /* 
                        [
                            {
                                "id_grupoacademico": 16,
                                "nombre": "Arquitectura de computadoras",
                                "id_programaE": 10,
                                "cat_ID": 162,
                                "materias": [
                                    {
                                        "id": 824,
                                        "clave": "4F6",
                                        "nombre": "PRINCIPIOS ELÉCTRICOS Y APLICACIONES DIGITALES"
                                    },
                                {
                                        "id": 830,
                                        "clave": "5F4",
                                        "nombre": "SIMULACIÓN"
                                },
                                {...},
                                {...}
                            },
                            {...},
                            {...}
                        ] 
                        */

                        //Manejar el resultado y los arrays para generar la salida deseada
                        $finalData = [];
                        foreach ($grupo as $row) {
                            if (!isset($finalData[$row['id_grupoacademico']])) {
                                $finalData[$row['id_grupoacademico']] = [
                                    'id_grupoacademico' => $row['id_grupoacademico'],
                                    'nombre' => $row['nombre'],
                                    'id_programaE' => $row['id_programaE'],
                                    'cat_ID' => $row['cat_ID']
                                ];
                            }

                            if ($row['ret_ID'] != null) {
                                $finalData[$row['id_grupoacademico']]['materias'][] = [
                                    'id' => $row['ret_ID'],
                                    'clave' => $row['ret_Clave'],
                                    'nombre' => $row['ret_NomCompleto']
                                ];
                            } else {
                                $finalData[$row['id_grupoacademico']]['materias'] = [];
                            }
                        }
                        echo json_encode(['success' => true, 'data' => array_values($finalData)]);
                    } else {
                        echo json_encode(['success' => false, 'mensaje' => 'Grupo académico no encontrado.']);
                    }
                } else {
                    echo json_encode(['success' => false, 'mensaje' => 'Ingrese todos los datos requeridos.']);
                }
            } else {
                echo json_encode(['success' => false, 'mensaje' => 'No estas autorizado (a) para ver la información de este grupo académico.']);
            }
            break;

        case 'quitarMateriaDeGrupoAcademico':
            if($u->hasPrivilegio("actualizar_grupo_academico")) {
                if (isset($_POST['idMateria'])) {
                    $sql = "UPDATE cereticula SET id_grupoacademico = :idGrupoAcademico WHERE ret_ID = :idMateria";
                    $params = [
                        'idGrupoAcademico' => null,
                        'idMateria' => $_POST['idMateria'],
                    ];
                    $res = $connSQL->preparedUpdate($sql, $params);
                    if ($res) {
                        echo json_encode(['success' => true, 'mensaje' => 'La materia ya no forma parte del grupo académico.']);
                    } else {
                        echo json_encode(['success' => false, 'mensaje' => 'Error al quitar materia del grupo académico.']);
                    }
                } else {
                    echo json_encode(['success' => false, 'mensaje' => 'Ingrese todos los datos requeridos.']);
                }
            } else {
                echo json_encode(['success' => false, 'mensaje' => 'No estas autorizado (a) para actualizar grupos académicos.']);
            }
            break;

        case 'eliminarGrupoAcademico':
            if($u->hasPrivilegio("eliminar_grupo_academico")) {
                if (isset($_POST['idGrupo'])) {
                    $sql = "DELETE FROM gruposacademicos WHERE id_grupoacademico = :idGrupo";
                    $res = $connSQL->preparedDelete($sql, ['idGrupo' => $_POST['idGrupo']]);
                    if ($res) {
                        echo json_encode(['success' => true, 'mensaje' => 'Grupo académico eliminado correctamente.']);
                    } else {
                        echo json_encode(['success' => false, 'mensaje' => 'Error al eliminar el grupo académico.']);
                    }
                } else {
                    echo json_encode(['success' => false, 'mensaje' => 'Ingrese todos los datos requeridos.']);
                }
            } else {
                echo json_encode(['success' => false, 'mensaje' => 'No estas autorizado (a) para eliminar grupos académicos.']);
            }
            break;

        case 'obtenerDetalleCuenta':
            $correoUser = $_POST['correoUser'];

            $sql = "SELECT d.cat_ID AS ID, 
                               d.cat_Clave AS clave, 
                               CONCAT(d.cat_Nombre, ' ', d.cat_ApePat, ' ', d.cat_ApeMat) as nombre,
                               d.cat_CorreoE as correo, 
                               d.firma as firma, 
                               IF(r.id_rol IS NOT NULL, CONCAT('[', GROUP_CONCAT(JSON_OBJECT('id', r.id_rol, 'descripcion', r.descripcion_rol)), ']'), '[]') as roles 
                        FROM docentes d 
                        LEFT JOIN docente_rol d_r on d.cat_ID = d_r.cat_ID 
                        LEFT JOIN rol r on r.id_rol = d_r.id_rol 
                        WHERE d.cat_CorreoE = :correo
                        GROUP BY d.cat_ID";
            $usuario = $connSQL->singlePreparedQuery($sql, ['correo' => $correoUser]);

            if (!empty($usuario)) {

                $roles = json_decode($usuario['roles']);
                $rolesHTML = '';
                if (count($roles) > 0) {
                    foreach ($roles as $rol) {
                        $rolesHTML .= '<div class="row pl-3" style="padding:1px;">' .
                            '<span class="badge badge-primary" style="font-size:11px;">' . $rol->descripcion . '</span>' .
                            '</div>';
                    }
                } else {
                    $rolesHTML = '<div class="row"><p style="margin: auto;">Sin roles.</p></div>';
                }
                $usuario['roles'] = $rolesHTML;

                if ($usuario['firma'] != "") {
                    $usuario['firma'] = '<div class="row">
                                            <div class="col-md-9 col-lg-9 col-sm-9 col-9" id="firmaImg">
                                                <img src="./firmasimagenes/' . $usuario['firma'] . '" class="rounded img-fluid" width="80"/>
                                            </div>
                                            <div class="col-md-3 col-lg-3 col-sm-3 col-3 d-flex justify-content-end align-items-center">
                                                <button type="button" class="btn btn-warning btn-sm m-2" onclick="actualizarFirma(this)" data-firma="' . $usuario['firma'] . '" data-iduser="' . $usuario['ID'] . '"><i class="fa-solid fa-pen-to-square"></i></button>
                                            </div>
                                        </div>';
                } else {
                    $usuario['firma'] = '<div class="row">
                                            <div class="col-md-9 col-lg-9 col-sm-9 col-9" id="firmaImg">
                                                <h6>Aún no sube firma.</h6>
                                            </div>
                                            <div class="col-md-3 col-lg-3 col-sm-3 col-3 d-flex justify-content-end align-items-center">
                                                <button type="button" class="btn btn-warning btn-sm m-2" onclick="actualizarFirma(this)" data-firma="' . $usuario['firma'] . '" data-iduser="' . $usuario['ID'] . '"><i class="fa-solid fa-pen-to-square"></i></button>
                                            </div>
                                        </div>';
                }
                echo json_encode(['success' => true, 'data' => $usuario]);
            } else {
                echo json_encode(['success' => false, 'mensaje' => 'Usuario no encontrado.']);
            }
            break;

        case 'actualizarFirmaUsuario':
            //Verificar si un usuario ya subio su firma
            if (isset($_FILES['nuevaFirma']) && $_FILES['nuevaFirma']['name']) {
                $extension = explode('.', $_FILES["nuevaFirma"]["name"]);
                $imagen = rand() . '_' . $_POST["correo"] . '.' . end($extension);
                $ubicacion = "./../firmasimagenes/" . $imagen;

                $sql = "UPDATE docentes SET firma = :firma WHERE cat_ID = :id";
                $res = $connSQL->preparedUpdate($sql, ['firma' => $imagen, 'id' => $_POST['idUser']]);
                if ($res) {
                    if (file_exists("./../firmasimagenes/" . $_POST["nombreImagen"])) {
                        if($_POST["nombreImagen"] != "") 
                            unlink("./../firmasimagenes/" . $_POST["nombreImagen"]);
                    }

                    move_uploaded_file($_FILES["nuevaFirma"]["tmp_name"], $ubicacion);
                    echo json_encode(['success' => true, 'mensaje' => 'Imagen de la firma actualizada correctamente.', 'data' => $imagen]);
                } else {
                    echo json_encode(['success' => false, 'mensaje' => 'Error al actualizar la firma.']);
                }
            } else {
                echo json_encode(['success' => false, 'mensaje' => 'No seleccionó ninguna imagen.']);
            }
            break;

        
        case 'verificarFirmaUsuario':
            if(isset($_POST["idUsuario"])) {
                $sql = "SELECT firma FROM docentes WHERE cat_ID = :idUsuario";
                $usuario = $connSQL->singlePreparedQuery($sql, ["idUsuario" => $_POST["idUsuario"]]);
                if($usuario) {
                    if($usuario["firma"] != "") {
                        echo json_encode(["success" => true, "data" => $usuario["firma"]]);
                    } else {
                        echo json_encode(["success" => false, "mensaje" => "Aún no sube la firma, por favor, actualice o suba su firma en el apartado de cuenta."]);
                    }
                } else {
                    echo json_encode(["success" => false, "mensaje" => "Usuario no encontrado."]);
                }
            } else {
                echo json_encode(["success" => false, "mensaje" => "Ingrese toda la información."]);
            }
            break;

        case 'obtenerPresidenteDeGrupoAcademico':
            //Obtener los grupos academicos de un usuario o presidente de academica
            if (isset($_POST["grupo"])) {
                $grupoins = substr($_POST["grupo"], 0, 3);
                $sql = "SELECT cr.ret_ID, cr.ret_Clave, cr.ret_NomCompleto, ga.id_grupoacademico, ga.nombre, d.cat_ID, CONCAT(d.cat_Nombre, ' ', d.cat_ApePat, ' ', d.cat_ApeMat) as nombre, d.cat_CorreoE
                        FROM cereticula cr
                        INNER JOIN gruposacademicos ga ON cr.id_grupoacademico = ga.id_grupoacademico
                        INNER JOIN docentes d ON ga.cat_ID = d.cat_ID
                        WHERE cr.ret_Clave = :grupo";
                $presidente = $connSQL->singlePreparedQuery($sql, ['grupo' => $grupoins]);
                if($presidente) {
                    echo json_encode(['success' => true, 'data' => $presidente]);
                } else {
                    echo json_encode(['success' => false, 'mensaje' => 'Esta materia aún no tiene grupo académico asignado ni presidente, por favor notifique al administrador.']);
                }
            } else {
                echo json_encode(["success" => false, "mensaje" => "Ingrese todos los datos."]);
            }
            break;

        
        case 'obtenerGruposAcademicosPorPresidente':
            if (isset($_POST["idUsuario"])) {
                $idUsuario = $_POST["idUsuario"];
                $sql = "SELECT gr.*, GROUP_CONCAT(cr.ret_Clave) as materias
                        FROM gruposacademicos gr
                        INNER JOIN cereticula cr ON gr.id_grupoacademico = cr.id_grupoacademico
                        WHERE cat_ID = :idUsuario
                        GROUP BY gr.id_grupoacademico";
                $grupos = $connSQL->preparedQuery($sql, ["idUsuario" => $idUsuario]);
                echo json_encode(['success' => true, 'data' => $grupos]);
            } else {
                echo json_encode(['success' => false, 'mensaje' => 'Ingrese todos los datos.']);
            }
            break;

        case 'listarProgramasEducativos':
            if($u->hasPrivilegio("consultar_programa_educativo")) {
                $sql = "SELECT pro.* , CONCAT(doce.cat_Nombre, ' ', doce.cat_ApePat, ' ', doce.cat_ApeMat) as JefeDivision 
                        FROM programae pro 
                        LEFT JOIN docentes doce ON pro.id_jefe_division = doce.cat_ID";
                $programas = $connSQL->preparedQuery($sql);

                $final_data = [];
                foreach ($programas as $programa) {
                    $htmlEditar = $u->hasPrivilegio("actualizar_programa_educativo") ? '<a class="dropdown-item editar" href="" data-id="' . $programa['id_programaE'] . '"><i class="fa-solid fa-pen-to-square mr-2"></i>Editar</a>' : '';
                    $htmlBorrar = $u->hasPrivilegio("eliminar_programa_educativo") ? '<a class="dropdown-item eliminar" href="" data-id="' . $programa['id_programaE'] . '"><i class="fa-solid fa-trash mr-2"></i>Eliminar</a>' : '';
                    $htmlDefault = !$u->hasPrivilegio("actualizar_programa_educativo") && !$u->hasPrivilegio("eliminar_programa_educativo") ? '<button class="dropdown-item disabled">Ninguna acción disponible</button>' : '';
                    $acciones = '<div class="row">' .
                        '<div class="btn-group" style="margin: 0 auto;">' .
                        '<button type="button" class="btn btn-success btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">' .
                        'Acciones' .
                        '</button>' .
                        '<div class="dropdown-menu">' .
                        $htmlEditar .
                        $htmlBorrar .
                        $htmlDefault . 
                        '</div>' .
                        '</div>' .
                        '</div>';

                    $final_data[] = [
                        'id_programaE' => $programa['id_programaE'],
                        'nombrePE' => $programa['nombrePE'],
                        'planEstudio' => $programa['planEstudio'],
                        'letra' => $programa['letra'],
                        'iniciales' => $programa['iniciales'],
                        'JefeDivision' => $programa['JefeDivision'] == null ? 'Aún no se asigna.' : $programa['JefeDivision'],
                        'acciones' => $acciones
                    ];
                }

                echo json_encode(['success' => true, 'data' => $final_data], JSON_UNESCAPED_UNICODE);
            } else {
                echo json_encode(['success' => false, 'mensaje' => 'No estas autorizado (a) para consultar la información de los programas educativos.']);
            }
            break;

        case 'obtenerJefesDivision':
             //Consultar a todos los usuarios cuyo rol sea jefe de division
             $sql = "SELECT d.cat_ID, 
                            d.cat_Clave, 
                            CONCAT(d.cat_Nombre, ' ', d.cat_ApePat, ' ', d.cat_ApeMat) as nombre, 
                            d.cat_CorreoE as correo
                    FROM docentes d 
                    INNER JOIN docente_rol dr ON d.cat_ID = dr.cat_ID
                    WHERE dr.id_rol = 5";
            $jefesDivision = $connSQL->preparedQuery($sql);

            echo json_encode(['success' => true, 'data' => ['jefesDivision' => $jefesDivision]]);
            break;

        case 'obtenerProgramaEducativoById':
            if($u->hasPrivilegio("actualizar_programa_educativo")) {
                if (isset($_POST['idPrograma'])) {

                    $sql = "SELECT pro.* , CONCAT(doce.cat_Nombre, ' ', doce.cat_ApePat, ' ', doce.cat_ApeMat) as JefeDivision 
                            FROM programae pro 
                            LEFT JOIN docentes doce ON pro.id_jefe_division = doce.cat_ID
                            WHERE pro.id_programaE = :idPrograma";

                    $programa = $connSQL->preparedQuery($sql, ['idPrograma' => $_POST['idPrograma']]);
                    if (count($programa) > 0) {
                        echo json_encode(['success' => true, 'data' => $programa]);
                    } else {
                        echo json_encode(['success' => false, 'mensaje' => 'Grupo académico no encontrado.']);
                    }
                } else {
                    echo json_encode(['success' => false, 'mensaje' => 'Ingrese todos los datos requeridos.']);
                }
            } else {
                echo json_encode(['success' => false, 'mensaje' => 'No estas autorizado (a) para editar programas educativos.']);
            }
            break;
        case 'crearActualizarProgramaEducativo':
            //Verificar que operacion es, si crear o actualizar
            if (isset($_POST['operacion']) && isset($_POST['inputNombrePrograma']) && isset($_POST['inputClavePlan']) && isset($_POST['inputLetra']) && isset($_POST['inputIniciales']) && isset($_POST['inputJefe']) && isset($_POST['idPrograma'])) {
                if ($_POST["operacion"] === "Crear") {
                    if($u->hasPrivilegio("agregar_programa_educativo")) {
                        $nombrePrograma = $_POST['inputNombrePrograma'];
                        $clavePlan = $_POST['inputClavePlan'];
                        $letra = $_POST['inputLetra'];
                        $iniciales = $_POST['inputIniciales'];
                        $idJefe = $_POST['inputJefe'];

                        //Insertar el nuevo programa educativo
                        $sql = "INSERT INTO programae (nombrePE, planEstudio, letra, iniciales, id_jefe_division) VALUES(:nombre, :plan, :letra, :iniciales, :idJefe)";
                        $connSQL->preparedInsert($sql, ['nombre' => $nombrePrograma, 'plan' => $clavePlan, 'letra' => $letra, 'iniciales' => $iniciales, 'idJefe' => $idJefe]);
                        echo json_encode(['success' => true, 'mensaje' => 'Programa educativo registrado correctamente.']);
                    } else {
                        echo json_encode(['success' => false, 'mensaje' => 'No estas autorizado (a) para agregar programas educativos.']);
                    }
                } else if ($_POST["operacion"] === "Actualizar") {
                    if($u->hasPrivilegio("actualizar_programa_educativo")) {
                        $nombrePrograma = $_POST['inputNombrePrograma'];
                        $clavePlan = $_POST['inputClavePlan'];
                        $letra = $_POST['inputLetra'];
                        $iniciales = $_POST['inputIniciales'];
                        $idJefe = $_POST['inputJefe'];
                        $idPrograma = $_POST['idPrograma'];

                        //Actualizar el programa educativo seleccionado
                        $sql = "UPDATE programae SET nombrePE = :nombre, planEstudio = :plan, letra = :letraPro, iniciales = :iniciales, id_jefe_division = :idJefe WHERE id_programaE = :idPrograma";
                        $connSQL->preparedUpdate($sql, ['nombre' => $nombrePrograma, 'plan' => $clavePlan, 'letraPro' => $letra, 'iniciales' => $iniciales, 'idJefe' => $idJefe, 'idPrograma' => $idPrograma]);
                        echo json_encode(['success' => true, 'mensaje' => 'Programa educativo actualizado correctamente.']);
                    } else {
                        echo json_encode(['success' => false, 'mensaje' => 'No estas autorizado (a) para actualizar programas educativos.']);
                    }
                }
            } else {
                echo json_encode(['success' => false, 'mensaje' => 'Ingrese todos los datos requeridos']);
            }
            break;
        case 'eliminarProgramaEducativo':
            if($u->hasPrivilegio("eliminar_programa_educativo")) {
                if (isset($_POST['idPrograma'])) {
                    $sql = "DELETE FROM programae WHERE id_programaE = :idPrograma";
                    $res = $connSQL->preparedDelete($sql, ['idPrograma' => $_POST['idPrograma']]);
                    if ($res) {
                        echo json_encode(['success' => true, 'mensaje' => 'Programa educativo eliminado correctamente.']);
                    } else {
                        echo json_encode(['success' => false, 'mensaje' => 'Error al eliminar programa educativo.']);
                    }
                } else {
                    echo json_encode(['success' => false, 'mensaje' => 'Ingrese todos los datos requeridos.']);
                }
            } else {
                echo json_encode(['success' => false, 'mensaje' => 'No estas autorizado (a) para eliminar programas educativos.']);
            }
            break;
        
        case 'obtenerProgramasPorJefeDivision':
            if (isset($_POST["idUsuario"])) {
                $idUsuario = $_POST["idUsuario"];
                $sql = "SELECT DISTINCT letra 
                        FROM programae 
                        WHERE id_jefe_division = :idUsuario";
                $grupos = $connSQL->preparedQuery($sql, ["idUsuario" => $idUsuario]);
                echo json_encode(['success' => true, 'data' => $grupos]);
            } else {
                echo json_encode(['success' => false, 'mensaje' => 'Ingrese todos los datos.']);
            }
            break;
    
        case 'searchAlumnosCorreo':
            if($u->hasPrivilegio("acceso_alumnos_al_fac14")) {
                if(isset($_POST['search'])) {
                    $search = $_POST['search'];
                    //Mostrar solo los usuarios que tengan como rol alumno o jefe de grupo
                    $sql = "SELECT DISTINCT d.cat_ID, d.cat_Clave, CONCAT(d.cat_Nombre, ' ', d.cat_ApePat, ' ', d.cat_ApeMat) as nombre, d.cat_CorreoE
                            FROM docentes d
                            INNER JOIN docente_rol dr ON d.cat_ID = dr.cat_ID
                            WHERE d.cat_CorreoE LIKE :correoSearch
                            AND (dr.id_rol = 4 OR dr.id_rol = 11)";
                    $alumnos = $connSQL->preparedQuery($sql, ['correoSearch' => '%' . $search . '%']);

                    $final_data = "";
                    if(count($alumnos) > 0) {
                        foreach($alumnos as $alumno) {
                            $final_data .= '<a href="#" class="list-group-item list-group-item-action border-1" data-id="' . $alumno['cat_ID'] . '" data-clave="' . $alumno['cat_Clave'] . '" data-correo="' . $alumno['cat_CorreoE'] . '" data-nombre="' . $alumno['nombre'] . '">' . $alumno['cat_CorreoE'] . ' - ' . $alumno['nombre'] . '</a>';
                        }
                    } else {
                        $final_data .= '<p class="list-group-item border-1">No se encontraron resultados.</p>';
                    }
                    echo json_encode(['success' => true, 'data' => $final_data]);
                } else {
                    echo json_encode(['success' => false, 'mensaje' => 'Ingrese todos los datos.']);
                }
            } else {
                echo json_encode(['success' => false, 'mensaje' => 'No estas autorizado (a) para administrar el acceso al FAC-14 a los alumnos.']);
            }
            break;
        case 'obtenerFAC14Alumno':
            if($u->hasPrivilegio("acceso_alumnos_al_fac14")) {
                if(isset($_POST['idAlumno']) && isset($_POST['idPeriodo'])) {
                    $idAlumno = $_POST['idAlumno'];
                    $idPeriodo = $_POST['idPeriodo'];

                    $sql = "SELECT al.*, CONCAT(d.cat_Nombre, ' ', d.cat_ApePat, ' ', d.cat_ApeMat) as nombre, per.periodo 
                            FROM alumnos_fac14 al 
                            INNER JOIN docentes d ON d.cat_ID = al.id_alumno 
                            INNER JOIN periodos per ON per.id_periodo = al.id_periodo 
                            WHERE al.id_alumno = :idAlumno AND al.id_periodo = :idPeriodo";
                    $facs_14 = $connSQL->preparedQuery($sql, ['idAlumno' => $idAlumno, 'idPeriodo' => $idPeriodo]);
                    echo json_encode(['success' => true, 'data' => $facs_14]);
                } else {
                    echo json_encode(['success' => false, 'mensaje' => 'Ingrese todos los datos.']);
                }
            } else {
                echo json_encode(['success' => false, 'mensaje' => 'No estas autorizado (a) para administrar el acceso al FAC-14 a los alumnos.']);
            }
            break;

        case 'agregarFAC14Alumno':
            if($u->hasPrivilegio("acceso_alumnos_al_fac14")) {
                if(isset($_POST['idAlumno']) && isset($_POST['idPeriodo']) && isset($_POST['grupo'])) {
                    $idAlumno = $_POST['idAlumno'];
                    $idPeriodo = $_POST['idPeriodo'];
                    $grupo = $_POST['grupo'];
                    
                    //Verificar que el grupo no se repitan para el mismo alumno en el mismo periodo
                    $sql = "SELECT *
                            FROM alumnos_fac14
                            WHERE id_periodo = :idPeriodo AND id_alumno = :idAlumno AND grupos_fac14 = :grupo";
                    $grupos = $connSQL->preparedQuery($sql, ['idPeriodo' => $idPeriodo, 'idAlumno' => $idAlumno, 'grupo' => $grupo]);
                    if(is_array($grupos) && count($grupos) > 0) {
                        echo json_encode(['success' => false, 'mensaje' => 'Ya se ha añadido el grupo, intente con otro grupo.']);
                    } else {
                        //Insertar el grupo en la tabla
                        $sql = "INSERT INTO alumnos_fac14 (id_alumno, id_periodo, grupos_fac14) VALUES (:idAlumno, :idPeriodo, :grupo)";
                        $res = $connSQL->preparedInsert($sql, ['idAlumno' => $idAlumno, 'idPeriodo' => $idPeriodo, 'grupo' => $grupo]);
                        if($res) {
                            echo json_encode(['success' => true, 'mensaje' => 'Grupo agregado correctamente.']);
                        } else {
                            echo json_encode(['success' => false, 'mensaje' => 'Error al guardar información, intente nuevamente.']);
                        }
                    }
                } else {
                    echo json_encode(['success' => false, 'mensaje' => 'Ingrese todos los datos.']);
                }
            } else {
                echo json_encode(['success' => false, 'mensaje' => 'No estas autorizado (a) para administrar el acceso al FAC-14 a los alumnos.']);
            }
            break;
        
        case 'eliminarFAC14Alumno':
            if($u->hasPrivilegio("acceso_alumnos_al_fac14")) {
                if(isset($_POST['idFAC'])) {
                    $id = $_POST['idFAC'];
                    $sql = "DELETE FROM alumnos_fac14 WHERE id = :id";
                    $res = $connSQL->preparedDelete($sql, ['id' => $id]);
                    if($res) {
                        echo json_encode(['success' => true, 'mensaje' => 'Grupo eliminado correctamente.']);
                    } else {
                        echo json_encode(['success' => false, 'mensaje' => 'Error al eliminar grupo, intente nuevamente.']);
                    }
                } else {
                    echo json_encode(['success' => false, 'mensaje' => 'Ingrese todos los datos.']);
                }
            } else {
                echo json_encode(['success' => false, 'mensaje' => 'No estas autorizado (a) para administrar el acceso al FAC-14 a los alumnos.']);
            }
            break;
        
        case 'obtenerReticula':

            $sql = "SELECT * FROM cereticula";
            $reticula = $connSQL->preparedQuery($sql);

            $final_data = [];
            foreach($reticula as $materia) {
                $htmlEditar = '<a class="dropdown-item editar" href="" data-id="' . $materia['ret_ID'] . '"><i class="fa-solid fa-pen-to-square mr-2"></i>Editar</a>';
                $htmlBorrar = '<a class="dropdown-item eliminar" href="" data-id"' . $materia['ret_ID'] . '"><i class="fa-solid fa-trash mr-2"></i>Eliminar</a>';
                $htmlDefault = '';

                $acciones = '<div class="row">' . 
                                '<div class="btn-group" style="margin: 0 auto;">' .
                                    '<button type="button" class="btn btn-success btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">' .
                                        'Acciones' .
                                    '</button>' .
                                    '<div class="dropdown-menu">' . 
                                        $htmlEditar .
                                        $htmlBorrar . 
                                        $htmlDefault .
                                    '</div>' . 
                                '</div>' . 
                            '</div>';
                $final_data[] = [
                    'ret_ID' => $materia['ret_ID'],
                    'ret_Clave' => $materia['ret_Clave'],
                    'ret_ClaveInt' => $materia['ret_ClaveInt'],
                    'ret_NomCorto' => $materia['ret_NomCorto'],
                    'ret_NomCompleto' => $materia['ret_NomCompleto'],
                    'ret_ClaveOficial' => $materia['ret_ClaveOficial'],
                    'temas' => $materia['temas'] != null ? $materia['temas'] : 0,
                    'ret_Creditos' => $materia['ret_Creditos'] != null ? $materia['ret_Creditos'] : 0,
                    'moe_ID' => $materia['moe_ID'] != null ? $materia['moe_ID'] : 0,
                    'dep_ID' => $materia['dep_ID'] != null ? $materia['dep_ID'] : 0,
                    'pes_ID' => $materia['pes_ID'] != null ? $materia['pes_ID'] : 0,
                    'acciones' => $acciones
                ];

                
            }
            echo json_encode($final_data, JSON_UNESCAPED_UNICODE);
            break;
    }
        
}
