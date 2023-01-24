/*function cargainstrumentacion(){
	var a=document.getElementById("nmaterias").value;
	window.location="cargaAsignatura.php?materia="+a;	
}
*/
function agregarActividad(){
	var tablaActividades = document.getElementById("tablaActividades");
	var fila = tablaActividades.insertRow(tablaActividades.rows.length-1);
	var docente = fila.insertCell(0);
	var estudiante = fila.insertCell(1);
	var borrar = fila.insertCell(2);

	docente.innerHTML='<textarea class="mostrarContenido" align="center" style="width:100%; height: 12em"></textarea>';
	estudiante.innerHTML='<textarea class="mostrarContenido" align="center" style="width: 100%; height: 12em"></textarea>';
	borrar.innerHTML= '<button onclick="borrarActividad($(this).closest(\'tr\').index()+1)" type="button" class="btn btn-danger btn-sm" style="margin-left:10px"><span class="glyphicon glyphicon-remove"></span></button>';
  }