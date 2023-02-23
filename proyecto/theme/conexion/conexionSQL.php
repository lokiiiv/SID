<?php
class connSQL
{

	private $dbhost = 'localhost';
	private $dbname = 'sid';
	private $dbuser = 'root';
	private $dbpass = '';

	private static $instancia;
	private $dbh;

	private function __construct()
	{
		try {
			$this->dbh = new PDO(
				'mysql:host=' . $this->dbhost . ';
										dbname=' . $this->dbname,
				$this->dbuser,
				$this->dbpass
			);
			$this->dbh->exec("SET CHARACTER SET utf8");
			$this->dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$this->dbh->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
		} catch (PDOException $e) {
			print "Error!: " . $e->getMessage();
			die();
		}
	}

	public static function singleton()
	{
		if (!isset(self::$instancia)) {
			$miclase = __CLASS__;
			self::$instancia = new $miclase;
		}
		return self::$instancia;
	}

	public function getDB()
	{
		return $this->dbh;
	}

	public function consulta($consulta)
	{
		try {
			$query = $this->dbh->prepare($consulta);
			$query->execute();
			return $query->fetchAll();
			$this->dbh = null;
		} catch (PDOException $e) {
			print "Error!: " . $e->getMessage();
			die();
		}
	}


	public function obtenerProgramasE()
	{
		try {
			$consulta = "SELECT nombrePE";
			$query = $this->dbh->prepare($consulta);
			$query->execute();
			return $query->fetchAll();
			$this->dbh = null;
		} catch (PDOException $e) {
			print "Error!: " . $e->getMessage();
			die();
		}
	}

	public function preparedQuery($sql, $params = [], $types = false)
	{
		try {
			$query = $this->dbh->prepare($sql);
			foreach ($params as $key => $value) {
				if ($types) {
					$query->bindValue(":$key", $value, $types[$key]);
				} else {
					if (is_int($value)) {
						$param = PDO::PARAM_INT;
					} elseif (is_bool($value)) {
						$param = PDO::PARAM_BOOL;
					} elseif (is_null($value)) {
						$param = PDO::PARAM_NULL;
					} elseif (is_string($value)) {
						$param = PDO::PARAM_STR;
					} else {
						$param = FALSE;
					}

					if ($param) $query->bindValue(":$key", $value, $param);
				}
			}
			$query->execute();
			return $query->fetchAll(PDO::FETCH_ASSOC);
		} catch (PDOException $e) {
			//print "Error!: " . $e->getMessage();
			echo json_encode(['success' => false, 'mensaje' => $e->getMessage()]);
			die();
		}
	}

	public function singlePreparedQuery($sql, $params = [], $types = false)
	{
		try {
			$query = $this->dbh->prepare($sql);
			foreach ($params as $key => $value) {
				if ($types) {
					$query->bindValue(":$key", $value, $types[$key]);
				} else {
					if (is_int($value)) {
						$param = PDO::PARAM_INT;
					} elseif (is_bool($value)) {
						$param = PDO::PARAM_BOOL;
					} elseif (is_null($value)) {
						$param = PDO::PARAM_NULL;
					} elseif (is_string($value)) {
						$param = PDO::PARAM_STR;
					} else {
						$param = FALSE;
					}

					if ($param) $query->bindValue(":$key", $value, $param);
				}
			}
			$query->execute();
			return $query->fetch(PDO::FETCH_ASSOC);
		} catch (PDOException $e) {
			//print "Error!: " . $e->getMessage();
			echo json_encode(['success' => false, 'mensaje' => $e->getMessage()]);
			die();
		}
	}

	public function preparedInsert($sql, $params = [])
	{
		try {
			$query = $this->dbh->prepare($sql);
			foreach ($params as $key => $value) {
				if (is_int($value)) {
					$param = PDO::PARAM_INT;
				} elseif (is_bool($value)) {
					$param = PDO::PARAM_BOOL;
				} elseif (is_null($value)) {
					$param = PDO::PARAM_STR;
				} elseif (is_string($value)) {
					$param = PDO::PARAM_STR;
				} else {
					$param = FALSE;
				}

				if ($param) $query->bindValue(":$key", $value, $param);
			}
			return $query->execute();
		} catch (PDOException $e) {
			//print "Error!: " . $e->getMessage();
			echo json_encode(['success' => false, 'mensaje' => $e->getMessage()]);
			die();
		}
	}

	public function preparedUpdate($sql, $params = [])
	{
		try {
			$query = $this->dbh->prepare($sql);
			foreach ($params as $key => $value) {
				if (is_int($value)) {
					$param = PDO::PARAM_INT;
				} elseif (is_bool($value)) {
					$param = PDO::PARAM_BOOL;
				} elseif (is_null($value)) {
					$param = PDO::PARAM_NULL;
				} elseif (is_string($value)) {
					$param = PDO::PARAM_STR;
				} else {
					$param = FALSE;
				}

				if ($param) $query->bindValue(":$key", $value, $param);
			}
			return $query->execute();
			//return $query->rowCount();
		} catch (PDOException $e) {
			//print "Error!: " . $e->getMessage();
			echo json_encode(['success' => false, 'mensaje' => $e->getMessage()]);
			die();
		}
	}

	public function preparedDelete($sql, $params = [])
	{
		try {
			$query = $this->dbh->prepare($sql);
			foreach ($params as $key => $value) {
				if (is_int($value)) {
					$param = PDO::PARAM_INT;
				} elseif (is_bool($value)) {
					$param = PDO::PARAM_BOOL;
				} elseif (is_null($value)) {
					$param = PDO::PARAM_NULL;
				} elseif (is_string($value)) {
					$param = PDO::PARAM_STR;
				} else {
					$param = FALSE;
				}

				if ($param) $query->bindValue(":$key", $value, $param);
			}
			return $query->execute();
			//return $query->rowCount();
		} catch (PDOException $e) {
			//print "Error!: " . $e->getMessage();
			echo json_encode(['success' => false, 'mensaje' => $e->getMessage()]);
			die();
		}
	}

	//Metodo para insertar un nuevo usuario y sus roles si es que así se requiere
	public function addUsuarioRoles($sqlUsuario, $paramsUsuario, $idRoles)
	{
		try {
			$this->dbh->beginTransaction();

			//Preparar la sentencia para agregar un nuevo registro de usuario
			$query = $this->dbh->prepare($sqlUsuario);
			$query->execute($paramsUsuario);

			//Una vez generado, obtener cual fue el ultimo ID de usuario generado
			$insertId = $this->dbh->lastInsertId();

			//Ahora, agregar la cantidad de roles que el usuario haya elegido
			$paramRoles = [];
			if (count($idRoles) > 0) {
				//Generar los parametros para la segunda inserción preparada
				foreach ($idRoles as $value) {
					$paramRoles[] = [
						':cat_id' => $insertId,
						':id_rol' => $value
					];
				}

				$query2 = $this->dbh->prepare("INSERT INTO docente_rol (cat_ID, id_rol) VALUES (:cat_id, :id_rol)");
				foreach ($paramRoles as $row) {
					$query2->execute($row);
				}
			}

			$this->dbh->commit();
		} catch (PDOException $e) {
			$this->dbh->rollBack();
			//print "Error!: " . $e->getMessage();
			echo json_encode(['success' => false, 'mensaje' => $e->getMessage()]);
			die();
		}
	}

	public function addRolesPermisos($sqlRol, $paramsRol, $idPermisos)
	{
		try {
			$this->dbh->beginTransaction();

			//Preparar la sentencia para agregar un nuevo rol
			$query = $this->dbh->prepare($sqlRol);
			$query->execute($paramsRol);

			//Obtener el ultimo ID generado del rol que se inserto
			$insertId = $this->dbh->lastInsertId();

			//Ahora, agregar la cantidad de permisos que el usuario haya elegido
			$paramPermisos = [];
			if (count($idPermisos) > 0) {
				//Generar los parametros para la segunda inserción preparada
				foreach ($idPermisos as $value) {
					$paramPermisos[] = [
						':id_rol' => $insertId,
						':id_permiso' => $value
					];
				}

				$query2 = $this->dbh->prepare("INSERT INTO rol_permisos (id_rol, id_permiso) VALUES (:id_rol, :id_permiso)");
				foreach ($paramPermisos as $row) {
					$query2->execute($row);
				}
			}

			$this->dbh->commit();
		} catch (PDOException $e) {
			$this->dbh->rollBack();
			//print "Error!: " . $e->getMessage();
			echo json_encode(['success' => false, 'mensaje' => $e->getMessage()]);
			die();
		}
	}
}
