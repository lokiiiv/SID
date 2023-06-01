<?php
	require_once './proyecto/theme/conexion/conexionSQL.php';
	$connSQL = connSQL::singleton();

	if (isset($_POST['accion'])  && !empty($_POST['accion'])) {
		$action = $_POST['accion'];
		switch ($action) {
			case 'registroAlumno':
				if (isset($_POST['nombre']) && isset($_POST['ap']) && isset($_POST['ap']) && isset($_POST['correo'])) {
					
					$matricula = $_POST['matricula'];
					$nombre = $_POST['nombre'];
					$ap = $_POST['ap'];
					$am = $_POST['am'];
					$correo = $_POST['correo'];

					//Verificar si ya existe
					$alumno = $connSQL->singlePreparedQuery("SELECT cat_CorreoE FROM docentes WHERE cat_CorreoE = :correo", ['correo' => $correo]);
					if(!$alumno) {
						try {
							$connSQL->getDB()->beginTransaction();
							//Insertar el usuario 
							$statement = $connSQL->getDB()->prepare("INSERT INTO docentes (cat_Clave, cat_ApePat, cat_ApeMat, cat_Nombre, cat_CorreoE) VALUES (:clave, :ap, :am, :nombre, :correo)");
							$statement->execute(['clave' => $matricula, 'ap' => $ap, 'am' => $am, 'nombre' => $nombre, 'correo' => $correo]);
				
							$idUsuario = $connSQL->getDB()->lastInsertId();
				
							//Definir el usuario registrado como alumno
							$statement = $connSQL->getDB()->prepare("INSERT INTO docente_rol (cat_ID, id_rol) VALUES (:cat_id, :id_rol)");
							$statement->execute(['cat_id' => $idUsuario, 'id_rol' => 4]);
				
							$connSQL->getDB()->commit();
							echo json_encode(['success' => true, 'mensaje' => 'Has sido registrado correctamente, por favor inicie sesión nuevamente.']);
						} catch (PDOException $e) {
							$connSQL->getDB()->rollback();
							echo json_encode(['success' => false, 'mensaje' => 'Error al registrar usuario, intente nuevamente.']);
						}
					} else {
						echo json_encode(['success' => false, 'mensaje' => 'Ya esta registrado, por favor inicie sesión con su cuenta institucional.']);
					}
				} 
			break;
		}
	}
