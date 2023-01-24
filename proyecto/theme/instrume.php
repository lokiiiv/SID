 <!-- Encabezado  -->

<div class="row"> 
		

</div>

	<h1> ELIGE LA ASIGNATURA </h1>
	<?php
	require_once '../../CRUD/class/Consultas.php';
	echo "<select id='nmaterias'>"; 
		
			$materia = Usuarios::singleton();
			$data = $materia->get_Materias();
			foreach($data as $fila){
		
				$es= $fila['nombreAsignatura']; 
				echo "<option>$es</option>";
			}
	echo "</select>";
	?>
	<br>
	<button class="btn btn-success" onclick="cargainstrumentacion()"> Cargar</button>
<br><br><hr style="height: 10px; background-color: black;"><br><br>
<div class="row">
  <div class="col-md-6" id="columna"></div>
  <div class="col-md-6" id="columna">
  
  <div class="col-md-12" id="columna">Instituto Tecnológico Superior del Oriente del Estado de Hidalgo</div>
  <div class="col-md-12 azul" id="columna">SISTEMA DE GESTIÓN DE LA CALIDAD</div>
  <div class="col-md-12" id="columna">Instrumentación Didáctica</div>
  
  </div>
</div>
 <!-- Documento  -->

<div class="row">
  <div class="col-md-2 azul" id="columna">DOCUMENTO</div>
  <div class="col-md-2" id="columna"><textarea></textarea></div>
  <div class="col-md-2 azul" id="columna">CLÁUSULA ISO 9001 2008</div>
  <div class="col-md-2" id="columna"><textarea></textarea></div>
   <div class="col-md-2 azul" id="columna">REVISIÓN</div>
  <div class="col-md-2" id="columna"><textarea></textarea></div>
</div>

<!-- Responsable  -->

<div class="row">
  <div class="col-md-2 azul" id="columna">RESPONSABLE</div>
  <div class="col-md-2" id="columna"><textarea></textarea></div>
  <div class="col-md-2 azul" id="columna">FECHA DE EMISIÓN</div>
  <div class="col-md-2" id="columna"><textarea></textarea></div>
   <div class="col-md-2 azul" id="columna">CÓDIGO DEL DOCUMENTO</div>
  <div class="col-md-2" id="columna"><textarea></textarea></div>
</div>

<!--  -->

<div class="row">
  <div class="col-md-2 azul" id="columna">Programa Educativo:</div>
  <div class="col-md-4" id="columna"><textarea></textarea></div>
  <div class="col-md-2 azul" id="columna">Plan de estudios:</div>
  <div class="col-md-4" id="columna"><textarea></textarea></div>
</div>

<!--  -->

<div class="row">
  <div class="col-md-2 azul" id="columna">Nombre de la asignatura:</div>
  <div class="col-md-4" ><textarea id="nasignatura"></textarea></div>
  <div class="col-md-1 azul" id="columna">Clave de la asignatura:</div>
  <div class="col-md-1" ><textarea id="casignatura"></textarea></div>
  <div class="col-md-1 azul" id="columna">Créditos:</div>
  <div class="col-md-1" ><textarea id="tcreditos"></textarea></div>
  <div class="col-md-1 azul" id="columna">Número de Tema:</div>
  <div class="col-md-1" id="columna"><textarea></textarea></div>
</div>

<!--  -->

<div class="row">
  <div class="col-md-2 azul" id="columna">Semestre:</div>
  <div class="col-md-2" id="columna"><textarea></textarea></div>
  <div class="col-md-2 azul" id="columna">Clave de grupo:</div>
  <div class="col-md-2" id="columna"><textarea></textarea></div>
  <div class="col-md-2 azul" id="columna">Periodo:</div>
  <div class="col-md-2" id="columna"><textarea></textarea></div>
</div>

<!--  -->

<div class="row">
  <div class="col-md-2 azul" id="columna">Nombre del docente:</div>
  <div class="col-md-10" id="columna"><textarea></textarea></div>
</div>
<!--  -->

<div class="row1 azul">
  Instrumentación Didáctica
</div>


<div class="row1 azul">
1.- Caracterización de la asignatura
</div>
<div class="row">
  <textarea></textarea>.
</div>
<div class="row1 azul">
 2.- Intención didáctica
</div>
<div class="row">
  <textarea></textarea>
</div>
<div class="row1 azul">
 3.-Competencias previas
</div>
<div class="row">
  <textarea></textarea>
</div>
<div class="row1 azul">
4.- Competencia específica de la asignatura
</div>
<div class="row">
  <textarea></textarea>
</div>

<!--  -->

<div class="row">
  <div class="col-md-3" id="columna ">Tema:</div>
  <div class="col-md-9" id="columna"><textarea></textarea></div>
</div>

<div class="row1 azul">
 5.- Competencia específica del tema:
</div>
<div class="row">
  <textarea></textarea>
</div>
<div class="row">
 Competencias genéricas a desarrollar
</div>
<div class="row1">
  <textarea></textarea>
</div>
<div class="row1 azul">
 6.- Proceso enseñanza  aprendizaje
</div>
<!--  -->

<div class="row">
  <div class="col-md-3" id="columna">Temas y subtemas</div>
  <div class="col-md-3" id="columna">Actividades de enseñanza (Docente)</div>
  <div class="col-md-3" id="columna">Actividades de aprendizaje (estudiante)</div>
  <div class="col-md-3" id="columna">Recursos y apoyos didácticos</div>
</div>

<!--  -->

<div class="row">
  <div class="col-md-3" id="columna"><textarea></textarea></div>
  <div class="col-md-3" id="columna"><textarea></textarea></div>
  <div class="col-md-3" id="columna"><textarea></textarea></div>
  <div class="col-md-3" id="columna"><textarea></textarea></div>
</div>

<!--  -->

<div class="row">
  <div class="col-md-9" id="columna">Horas teórico-prácticas</div>
  <div class="col-md-3" id="columna"><textarea></textarea></div>
</div>
<div class="row1 azul">
 Prácticas en laboratorios o talleres
</div>

<!--  -->

<div class="row">
  <div class="col-md-1" id="columna">No.</div>
  <div class="col-md-6" id="columna">Título de la práctica</div>
  <div class="col-md-5" id="columna">Laboratorio</div>
</div>
<!--  -->

<div class="row">
  <div class="col-md-1" id="columna"><textarea></textarea></div>
  <div class="col-md-6" id="columna"><textarea></textarea></div>
  <div class="col-md-5" id="columna"><textarea></textarea></div>
</div>

<div class="row1 azul">
  7.- Estrategia de evaluación
</div>
<div class="row">
 Criterios de evaluación
</div>

<!--  -->

<div class="row">
  <div class="col-md-2" id="columna">Indicador</div>
  <div class="col-md-5" id="columna">Descripción del índicador</div>
  <div class="col-md-5" id="columna">Valor del indicador</div>
</div>

<!--  -->

<div class="row">
  <div class="col-md-2" id="columna"><textarea></textarea></div>
  <div class="col-md-5" id="columna"><textarea></textarea></div>
  <div class="col-md-5" id="columna"><textarea></textarea></div>
</div>
<!--  -->

<div class="row">
  <div class="col-md-3" id="columna">Desempeño</div>
  <div class="col-md-2" id="columna">Nivel de desempeño</div>
  <div class="col-md-4" id="columna">Índicadores de alcance	</div>
  <div class="col-md-3" id="columna">Valoración númerica</div>
</div>
<!--  -->

<div class="row">
  <div class="col-md-3" id="columna"><textarea></textarea></div>
  <div class="col-md-2" id="columna"><textarea></textarea></div>
  <div class="col-md-4" id="columna"><textarea></textarea></div>
  <div class="col-md-3" id="columna"><textarea></textarea></div>
</div>

<div class="row">
 Matríz de evaluación
</div>

<?php
	echo "<script language='JavaScript'>"; 
		echo "function cambio(){";
		
		echo "document.getElementById('casignatura').value='".$casignatura."';";
		echo "document.getElementById('tcreditos').value='".$tcreditos."';"; 		
		echo "document.getElementById('nasignatura').value='".$nasignatura."';"; 
		
		echo "}";
		echo "cambio();";		 
 	echo "</script>";

?>