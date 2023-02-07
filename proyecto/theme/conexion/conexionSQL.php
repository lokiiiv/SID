<?php
class connSQL {

	private $dbhost = 'localhost';
	private $dbname = 'sid';
	private $dbuser = 'root';
	private $dbpass = '';

	private static $instancia;
	private $dbh;

	private function __construct()
    {
        try {
			$this->dbh = new PDO('mysql:host='.$this->dbhost.';
										dbname='.$this->dbname,
										$this->dbuser,
										$this->dbpass);
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

	public function getDB(){
		return $this->dbh;
	}
	
	public function consulta($consulta)
	{
		try{
			$query = $this->dbh->prepare($consulta);
			$query->execute();
			return $query->fetchAll();
			$this->dbh = null;
		}catch(PDOException $e){
			print "Error!: " . $e->getMessage();
            die();
		}
	}


	public function obtenerProgramasE()
	{
		try{
			$consulta = "SELECT nombrePE";
			$query = $this->dbh->prepare($consulta);
			$query->execute();
			return $query->fetchAll();
			$this->dbh = null;
		}catch(PDOException $e){
			print "Error!: " . $e->getMessage();
            die();
		}
	}

	public function preparedQuery($sql, $params = [], $types = false){
		try {
			$query = $this->dbh->prepare($sql);
			foreach($params as $key => $value) {
				if($types) {
					$query->bindValue(":$key", $value, $types[$key]);
				} else {
					if(is_int($value))        { $param = PDO::PARAM_INT; }
                	elseif(is_bool($value))   { $param = PDO::PARAM_BOOL; }
					elseif(is_null($value))   { $param = PDO::PARAM_NULL; }
					elseif(is_string($value)) { $param = PDO::PARAM_STR; }
					else { $param = FALSE;}

					if($param) $query->bindValue(":$key",$value,$param);
				}
			}
			$query->execute();
        	return $query->fetchAll(PDO::FETCH_ASSOC);

		} catch(PDOException $e) {
			print "Error!: " . $e->getMessage();
			die();
		}
	}

	public function singlePreparedQuery($sql, $params = [], $types = false){
		try {
			$query = $this->dbh->prepare($sql);
			foreach($params as $key => $value) {
				if($types) {
					$query->bindValue(":$key", $value, $types[$key]);
				} else {
					if(is_int($value))        { $param = PDO::PARAM_INT; }
                	elseif(is_bool($value))   { $param = PDO::PARAM_BOOL; }
					elseif(is_null($value))   { $param = PDO::PARAM_NULL; }
					elseif(is_string($value)) { $param = PDO::PARAM_STR; }
					else { $param = FALSE;}

					if($param) $query->bindValue(":$key",$value,$param);
				}
			}
			$query->execute();
        	return $query->fetch(PDO::FETCH_ASSOC);

		} catch(PDOException $e) {
			print "Error!: " . $e->getMessage();
			die();
		}
	}
}
?>