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


}
?>