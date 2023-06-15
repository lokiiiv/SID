<?php
//require_once '../conexion/conexionSQL.php';
require_once realpath(dirname(__DIR__) . '/conexion/conexionSQL.php');
class Rol
{
    public $permisos;
    public static $connSQL;

    public function __construct()
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
        $sql = "SELECT p.*, pag.pagina
                FROM rol_permisos as rp
                JOIN permisos as p ON rp.id_permiso = p.id_permiso
                LEFT JOIN paginas pag ON p.id_pagina = pag.id_pagina
                WHERE rp.id_rol = :id_rol";

        $permisos = self::$connSQL->preparedQuery($sql, ['id_rol' => $rol_id]);
        foreach($permisos as $row) {
            //Ir añadiendo el nombre de los permisos como clave y un true como valor
            $rol->permisos[$row["nombre_permiso"]]["has"] = true;
            $rol->permisos[$row["nombre_permiso"]]["pagina"] = $row["pagina"];
            $rol->permisos[$row["nombre_permiso"]]['id_pagina'] = $row["id_pagina"];
        }
        return $rol;
    }


    //Verificar si un permiso esta establecido
    public function hasPermiso($permiso) {
        return isset($this->permisos[$permiso]);
    }

    //Verificar si existe una pagina conforme a los permisos del usuario
    public function hasPagina($pagina) {
        foreach($this->permisos as $permiso) {
            if($permiso["id_pagina"] == $pagina) {
                return true;
            }
        }
        return false;
    } 
}
