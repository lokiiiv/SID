<?php
class Usuarios
{
    private static $instancia;
    private $dbh;
 
    private function __construct()
    {
        try {
            $this->dbh = new PDO('mysql:host=localhost;dbname=u120726997_base', 'root', '');
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

     
    
    public function get_Usuario($email)
    {
        try {
            $query = $this->dbh->prepare("SELECT * FROM usuarios WHERE email LIKE ? ");
                        //  $query->bindParam(1, $nombre);
                        $query->bindParam(1, $email);
                        // $query->bindParam(3, $contra);
                        
            $query->execute();
            return $query->fetchAll();
            $this->dbh = null;
        }catch (PDOException $e) {
            $e->getMessage();
        }
    }
 
    public function firma_imagen()
    {
        try {
            $query = $this->dbh->prepare("SELECT * FROM imagee");
                        //  $query->bindParam(1, $nombre);
                        //$query->bindParam(1, $email);
                        // $query->bindParam(3, $contra);
                        
            $query->execute();
            return $query->fetchAll();
            $this->dbh = null;
        }catch (PDOException $e) {
            $e->getMessage();
        }
    }
    


    public function get_Materias()
    {
        try {
            $query = $this->dbh->prepare("SELECT nombreAsignatura FROM asignatura");
            $query->execute();
            return $query->fetchAll();
            $this->dbh = null;
        }catch (PDOException $e) {
            $e->getMessage();
        }
    }

    public function get_Instrumentacion($asignatura)
    {
        try {
            $query = $this->dbh->prepare("SELECT A.id_asignatura FROM asignatura A, instrumentacion B WHERE A.nombreAsignatura= ? AND A.id_asignatura=B.id_asignatura");
            $query->bindParam(1, $asignatura);
	    $query->execute();
            return $query->fetchAll();
            $this->dbh = null;
        }catch (PDOException $e) {
            $e->getMessage();
        }
    }
	
    public function get_IdMateria($asignatura)
    {
        try {
            $query = $this->dbh->prepare("SELECT id_asignatura FROM asignatura WHERE nombreAsignatura= ?");
            $query->bindParam(1, $asignatura);
	    $query->execute();
            return $query->fetchAll();
            $this->dbh = null;
        }catch (PDOException $e) {
            $e->getMessage();
        }
    }
 

    public function get_DatosInstrumentacion($id)
    {
        try {
            $query = $this->dbh->prepare("SELECT totalCreditos,claveAsignatura, nombreAsignatura, temas FROM asignatura WHERE 	id_asignatura= ?");
            $query->bindParam(1, $id);
	    $query->execute();
            return $query->fetchAll();
            $this->dbh = null;
        }catch (PDOException $e) {
            $e->getMessage();
        }
    }


    public function delete_usuario($id)
    {
        try {
						$query = $this->dbh->prepare("DELETE FROM usuario WHERE ID = ?");
            $query->bindParam(1, $id);
            $query->execute();
            $this->dbh = null;
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }
 
    public function insert_usuario($usuario,$contrasenia)
    {
        try {
            $query = $this->dbh->prepare("INSERT INTO usuarios VALUES(null,?,?)");
            $query->bindParam(1, $usuario);
				$query->bindParam(2, $contrasenia);		
            $query->execute();
            $this->dbh = null;
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }
    public function insert_item($item,$valor,$indicador,$Asignatura,$Unidad,$Grupo,$Evidencia)
    {
        try {
            $query = $this->dbh->prepare("INSERT INTO listadecotejo VALUES(null, ?, ?, ?, ?, ?,?,?)");
             $query->bindParam(1,$item);
            $query->bindParam(2, $valor);
            $query->bindParam(3, $indicador);
            $query->bindParam(4, $Asignatura);
            $query->bindParam(5, $Unidad);
            $query->bindParam(6, $Grupo);
            $query->bindParam(7, $Evidencia);
            $query->execute();
            $this->dbh = null;
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }

 
    public function update_escuela($nombre,$usuario, $contrasenia,$id)
    {
    	try {
	    $query = $this->dbh->prepare("UPDATE usuario SET Nombre = ?, Usuario = ?, Contrasenia = ? WHERE id_Usuario = ?");
            $query->bindParam(1, $nombre);
            $query->bindParam(2, $usuario);
            $query->bindParam(3, $contrasenia);
	    $query->bindParam(4, $id);
            $query->execute();
            $this->dbh = null;
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }
 
    public function __clone()
    {
        trigger_error('La clonación no es permitida!.', E_USER_ERROR);
    }
}
?>