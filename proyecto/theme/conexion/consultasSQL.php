<?php
require_once 'conexionSQL.php';
$connSQL = connSQL::singleton();


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

        case 'listarUsuarios':

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
                $acciones = '<div class="row"><div class="btn-group" style="margin: 0 auto;">' .
                    '<button type="button" class="btn btn-success btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">' .
                    'Acciones' .
                    '</button>' .
                    '<div class="dropdown-menu">' .
                    '<a class="dropdown-item editar" href="" data-id="' . $usuario['ID'] . '">Editar</a>' .
                    '<a class="dropdown-item eliminar" href="" data-id="' . $usuario['ID'] . '">Eliminar</a>' .
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
                "recordsTotal" => intval(count($usuarios)),
                "recordsFiltered" => intval($total[0]['cant']),
                "data" => $final_data
            ];
            echo json_encode($salida);
            break;

            //Método para obtener un solo usuario a través de su ID
        case 'listarUsuarioById':
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
                    $usuario['firma'] = '<img src="./img/firmas/' . $usuario['firma'] . '" class="rounded mx-auto d-block img-fluid" width="100px"/><input type="hidden" name="imagen_firma_oculta" value="' . $usuario['firma'] . '">';
                } else {
                    $usuario['firma'] = '<input type="hidden" name="imagen_firma_oculta" value="' . $usuario['firma'] . '">';
                }
                echo json_encode($usuario);
            }

            break;

            //Lista los roles incluyendo sus permisos
        case 'listarRoles':
            $sql = "SELECT r.*, IF(p.id_permiso IS NOT NULL, CONCAT('[', GROUP_CONCAT(JSON_OBJECT('id', p.id_permiso, 'descripcion', p.descripcion_permiso)), ']'), '[]') AS permisos
                        FROM rol r
                        LEFT JOIN rol_permisos rp ON r.id_rol = rp.id_rol
                        LEFT JOIN permisos p ON p.id_permiso = rp.id_permiso
                        GROUP BY r.id_rol
                        ORDER BY r.id_rol ASC";
            $roles = $connSQL->preparedQuery($sql);
            echo json_encode($roles, JSON_UNESCAPED_UNICODE);
            break;

            //Listar los roles de manera general
        case 'listarRolesGeneral':
            $sql = "SELECT * FROM rol";
            $roles = $connSQL->preparedQuery($sql);
            echo json_encode($roles);
            break;

        case 'crearActualizarUsuario':
            //Verificar que operacion es, si crear o actualizar
            if ($_POST["operacion"] === "Crear") {
                //Verificar si al crear usuario se ha elegido subir el archivo de la firma
                $imagen = "";
                if ($_FILES["inputFirma"]["name"] != "") {
                    //Generar un nuevo nombre de la imagen y almacenar la misma en el servidor
                    if (isset($_FILES["inputFirma"])) {
                        $extension = explode('.', $_FILES["inputFirma"]["name"]);
                        $imagen = rand() . '_' . $_POST["inputCorreo"] . '.' . $extension[1];
                        $ubicacion = "./../img/firmas/" . $imagen;
                        move_uploaded_file($_FILES["inputFirma"]["tmp_name"], $ubicacion);
                    }
                }

                //Una vez guardada la imagen, almacenar el nuevo usuario y el nombre de la imagen en la base de datos
                $sql = "INSERT INTO docentes (cat_Clave, cat_ApePat, cat_ApeMat, cat_Nombre, cat_CorreoE, firma)
                            VALUES (:clave, :ap, :am, :nombre, :correo, :firma)";
                $params = [
                    'clave' => $_POST['inputClave'],
                    'ap' => $_POST['inputAp'],
                    'am' => $_POST['inputAm'],
                    'nombre' => $_POST['inputNombre'],
                    'correo' => $_POST['inputCorreo'],
                    'firma' => $imagen
                ];
                echo $connSQL->preparedInsert($sql, $params);
                
            } else if ($_POST["operacion"] === "Actualizar") {
            }
            break;
    }
}
