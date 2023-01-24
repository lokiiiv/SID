require_once 'proyecto/theme/conexion/conexionSQL.php';
			$connSQL = connSQL::singleton();
            $query = "Select cat_Nombre, cat_ApePat, cat_ApeMat from docentes where cat_CorreoE='".$gpUserData['email']."'";
			
			$docente = $connSQL->consulta($query);

			$_SESSION["nombreCompleto"] = $docente[0][0]." ".$docente[0][1]." ".$docente[0][2];
			header("Location:proyecto/theme/indexD.php");