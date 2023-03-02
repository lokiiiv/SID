<?php
//require_once '../conexion/conexionSQL.php';
require_once realpath(dirname(__DIR__) . '/conexion/conexionSQL.php');
class Rol
{
    protected $permisos;
    private static $connSQL;

    protected function __construct()
    {
        //Permisos es un array que contiene los nombre de los permisos de este rol
        $this->permisos = [];
        self::$connSQL = connSQL::singleton();
    }

    //Retornar un objecto del rol con sus permisos asociados
    public static function getRolPermisos($rol_id){
        //Crear un nuevo objecto de tipo Rol
        $rol = new Rol();

        //Generar la consulta para obtener los permisos que tiene un rol
        $sql = "SELECT p.*, m.nombre_modulo
                FROM rol_permisos as rp
                JOIN permisos as p ON rp.id_permiso = p.id_permiso
                JOIN modulos m ON p.id_modulo = m.id_modulo
                WHERE rp.id_rol = :id_rol";

        $permisos = self::$connSQL->preparedQuery($sql, ['id_rol' => $rol_id]);
        foreach($permisos as $row) {
            //Ir añadiendo el nombre de los permisos como clave y un true como valor
            $rol->permisos[$row["nombre_permiso"]]["has"] = true;
            $rol->permisos[$row["nombre_permiso"]]["modulo"] = $row["nombre_modulo"];
        }
        return $rol;
    }


    //Verificar si un permiso esta establecido
    public function hasPermiso($permiso) {
        return isset($this->permisos[$permiso]);
    }

    //Verificar si existe un modulo conforme a los permisos del usuario
    public function hasModulo($modulo) {
        foreach($this->permisos as $permiso) {
            if($permiso["modulo"] == $modulo) {
                return true;
            }
        }
        return false;
    } 
}
