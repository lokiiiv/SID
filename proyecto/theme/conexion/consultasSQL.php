<?php
    require_once 'conexionSQL.php';
    $connSQL = connSQL::singleton();


    if(isset($_POST['accion'])  && !empty($_POST['accion'])){
        $action = $_POST['accion'];
        switch($action){
            case 'buscarPlanEstudios':
                $pe = $_POST['programa'];
                $query = "Select distinct planEstudio from programae where nombrePE='".$pe."'";
                $planes = $connSQL->consulta($query);
                $selected = "";
                foreach ($planes as $plan) {
                    if(isset($_POST['selected']))
                        if($_POST['selected']==$plan[0]) $selected="selected='selected'";
                 echo "<option ".$selected.">".$plan[0]."</option>";
                }
            break;
            case 'buscarLaboratorios':
                $query = "Select laboratorio from laboratorios";
                $labs = $connSQL->consulta($query);
                
                foreach ($labs as $lab) {
                    $selected = "";
                    if(isset($_POST['selected']))
                        if($_POST['selected']==$lab[0]) $selected="selected='selected'";

                    echo "<option ".$selected." value='".$lab[0]."'>".$lab[0]."</option>";
                    
                }
            break;
            case 'buscarCatalogo':
                $query = "Select distinct ".$_POST['catalogo']." from ".$_POST['tabla']." order by ".$_POST['catalogo']." asc";
                $catalogo = $connSQL->consulta($query);
                foreach ($catalogo as $option) {
                    $selected = "";
                    if(isset($_POST['selected']))
                        if($_POST['selected']==$option[0]){ $selected="selected='selected'";
		    		$si=2;
                }
                    echo "<option ".$selected." value='".$option[0]."'>".$option[0]."</option>";
                }
            break;
            case 'buscarCarrera':
                $le = $_POST['letrae'];
                $lex = substr($le, 1,1);
                $query = "Select distinct nombrePE from programae where letra='".$lex."'";
                $letras = $connSQL->consulta($query);
                $selected = "";
                foreach ($letras as $let) {
                    if(isset($_POST['selected']))
                        if($_POST['selected']==$let[0]) $selected="selected='selected'";
                 echo $selected.$let[0];
                }
            break;
            case 'buscarMateria':
                $le = $_POST['letrae'];
                $lex = substr($le, 0,3);
                $query = "Select distinct ret_NomCompleto, temas from cereticula where ret_Clave='".$lex."'";
                $materia = $connSQL->consulta($query);
                $selected = "";
                foreach ($materia as $mat) {
                    if(isset($_POST['selected']))
                        if($_POST['selected']==$mat[0]) $selected="selected='selected'";
                
                //Incluir el nombre de materia y la cantidad de temas
                 echo $selected.$mat[0] . '-' . $selected.$mat[1];
                }
            break;
            case 'buscarClave':
                $le = $_POST['letrae'];
                $lex = substr($le, 0,3);
                $query = "Select distinct ret_ClaveOficial from cereticula where ret_Clave='".$lex."'";
                $clave = $connSQL->consulta($query);
                $selected = "";
                foreach ($clave as $clav) {
                    if(isset($_POST['selected']))
                        if($_POST['selected']==$clav[0]) $selected="selected='selected'";
                 echo $selected.$clav[0];
                }
            break;
            case 'buscarencabezado':
                $query = "Select * from formato where id_formato = '1'";
                $clave = $connSQL->consulta($query);

                foreach ($clave as $clav) {
                    for ($i=1; $i < 7; $i++) { 
                        echo $clav[$i];
                    }
                }
            break;
            case 'buscarfechasrevision':
                $revision = $_POST['periodo'];
                 $query = "Select p.periodo, r.revision,r.fecha_inicio, r.fecha_termino from revisiones r, periodos p where p.periodo = '".$revision."' AND p.id_periodo=r.id_periodo";
                $revisionesit = $connSQL->consulta($query);
                $datos=array();
                $cont=0;
                foreach ($revisionesit as $revi) {
                    $temp=array();
                    $temp[0]=$revi["periodo"];
                    $temp[1]=$revi["revision"];
                    $temp[2]=$revi["fecha_inicio"];
                    $temp[3]=$revi["fecha_termino"];
                    $datos[$cont]=$temp;
                    $cont++;
                }
                echo json_encode($datos);
            break;

            case 'listarUsuarios':
                $sql = "SELECT d.*, IF(r.id_rol IS NOT NULL, CONCAT('[', GROUP_CONCAT(JSON_OBJECT('id', r.id_rol, 'descripcion', r.descripcion_rol)), ']'), '[]') AS roles
                        FROM docentes d
                        LEFT JOIN docente_rol d_r on d.cat_ID = d_r.cat_ID
                        LEFT JOIN rol r on r.id_rol = d_r.id_rol
                        GROUP BY d.cat_ID
                        ORDER BY d.cat_ID ASC";
                $usuarios = $connSQL->preparedQuery($sql);
                echo json_encode($usuarios);
            break;


        }
    }
?>