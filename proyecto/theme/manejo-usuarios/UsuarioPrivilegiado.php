<?php
//require_once realpath(dirname(__FILE__))  . '/conexion/conexionSQL.php';
require_once realpath(dirname(__DIR__) . '/conexion/conexionSQL.php');
require_once 'Usuario.php';
require_once 'Rol.php';

class UsuarioPrivilegiado extends Usuario{

    public $roles;
    public static $connSQL;

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
    public function initRoles(){
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

    //Verificar si un usuario tiene un privilegio especifico de alguno de sus roles en especifico
    public function hasPrivilegioRol($rol, $perm) {
        if(isset($this->roles[$rol])) {
            if($this->roles[$rol]->hasPermiso($perm)) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        } 
    }

    //Verificar si un usuario tiene acceso a una pagina del sistema
    public function hasPagina($pagina) {
        foreach($this->roles as $rol) {
            if($rol->hasPagina($pagina)) {
                return true;
            }
        }
        return false;
    } 

    //Verificar si un usuario tiene acceso a una pagina del sistema de uno de sus roles en especificos
    public function hasPaginaRol($pagina, $rol) {
        if(isset($this->roles[$rol])){
            if($this->roles[$rol]->hasPagina($pagina)) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }


    public function getRoles() {
        return $this->roles;
    }

    public function createMenu($parent, $menu) {
        $html = "";
        if(isset($menu['parents'][$parent])) {
            foreach($menu['parents'][$parent] as $itemId) {
                if(!isset($menu['parents'][$itemId])) {
                    if(self::hasPagina($itemId)) {
                        $html .= "<li class='nav-item'>
                                    <a class='nav-link' href='" . "http://" . $_SERVER['SERVER_NAME'] . "/" . $menu['items'][$itemId]['pagina'] . "'>" . $menu['items'][$itemId]['titulo'] . "</a>
                                </li>";
                    }
                }
                if(isset($menu['parents'][$itemId])) {
                    $html .= "<li class='nav-item dropdown'>";
                    $html .= "  <a class='nav-link dropdown-toggle' href='#' role='button' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>" . $menu['items'][$itemId]['titulo'] . "</a>";
                    $html .= "  <ul class='submenu dropdown-menu'>";
                    $html .=        self::createMenu($itemId, $menu);
                    $html .= "  </ul>";
                    $html .= "</li>";
                }
            }
        }

        return $html;
    }

    public function generarMenu() {
        //Generar un array donde se visualice los menus padre e hijos para llenearlos recursivamente
        $resultado = self::$connSQL->preparedQuery("SELECT * FROM paginas ORDER BY orden ASC");
        $menus = [
            'items' => [],
            'parents' => []
        ];
        foreach($resultado as $row) {
            $menus['items'][$row['id_pagina']] = $row;
            $menus['parents'][$row['parent_menu_id']][] = $row['id_pagina'];
        }

        foreach($menus['parents'] as $key => $value) {
            //No evaluar el elemento con key 0, ya que el 0 representa los primeros elementos padre del menu
            if($key != 0) {
                //Verificar si cada pagina del item padre del menu tiene acceso conforme a sus permisos
                for($i = 0; $i < count($value); $i++) {
                    if(!self::hasPagina($value[$i])) {
                        //si no tiene acceso, eliminar el elemento de ambos array
                        unset($menus['items'][$value[$i]]);
                        unset($menus['parents'][$key][$i]);
                    }
                }
            }
            //si se da el caso de que no quedan paginas del submenu con acceso, eliminar el item padre para que no se muestre en la vista
            if(count($menus['parents'][$key]) == 0){
                unset($menus['parents'][$key]);
            }
        }

        //Mandar a generar el html para el menu conforme a los filtros anteriores
        return self::createMenu(0, $menus);
    }
}
?>
