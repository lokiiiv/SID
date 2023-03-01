<?php
//require_once realpath(dirname(__FILE__))  . '/conexion/conexionSQL.php';
require_once realpath(dirname(__DIR__) . '/conexion/conexionSQL.php');
require_once 'Usuario.php';
require_once 'Rol.php';

class UsuarioPrivilegiado extends Usuario{

    private $roles;
    private static $connSQL;

    public function __construct()
    {
        self::$connSQL = connSQL::singleton();
    }

    //Obtener la información completa del usuario
    //incluyendo sus roles y permisos de esos roles
    public static function getByCorreo($correo) {
        $usuarioPriv = new UsuarioPrivilegiado();

        //Obtener la información del usuario loeguado
        $sql = "SELECT *
                FROM docentes
                WHERE cat_CorreoE = :correo";
        $result = self::$connSQL->preparedQuery($sql, ['correo' => $correo]);
        
        //Generar el objeto indicando sus propiedades conforme a la consulta
        if(!empty($result)) {
            $usuarioPriv->user_id = $result[0]["cat_ID"];
            $usuarioPriv->initRoles();
            return $usuarioPriv;
        } else {
            return false;
        }
    }

    //Llenar roles con sus permisos asociados
    protected function initRoles(){
        $this->roles = [];
        //Obtener todos los roles que tiene el usuario logueado
        $sql = "SELECT dr.id_rol, r.nombre_rol
                FROM docente_rol as dr
                JOIN rol as r ON dr.id_rol = r.id_rol
                WHERE dr.cat_ID = :id_user";
        
        $result = self::$connSQL->preparedQuery($sql, ['id_user' => $this->user_id]);
        foreach($result as $row) {
            //Cada rol se llenara con sus correspondientes permisos usando el metodo de la clase Rol
            $this->roles[$row["nombre_rol"]] = Rol::getRolPermisos($row["id_rol"]);
        }
    }

    //Verificar si un usuario tiene un privilegio especifico
    public function hasPrivilegio($perm) {
        foreach($this->roles as $rol) {
            if($rol->hasPermiso($perm)) {
                return true;
            }
        }
        return false;
    }

    //Verificar si un usuario tiene un rol especifico
    public function hasRol($rolNombre) {
        return isset($this->roles[$rolNombre]);
    }
}
?>