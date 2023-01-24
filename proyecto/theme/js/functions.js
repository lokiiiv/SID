/*Curso JavaScript aprenderaprogramar.com */
var editando=false;
 
function transformarEnEditable(nodo){
//El nodo recibido es SPAN
if (editando == false) {
var nodoTd = nodo.parentNode; //Nodo TD
var nodoTr = nodoTd.parentNode; //Nodo TR
var nodoContenedorForm = document.getElementById('contenedorForm'); //Nodo DIV
var nodosEnTr = nodoTr.getElementsByTagName('td');
//variales
var Num = nodosEnTr[0].textContent; 
var Item = nodosEnTr[1].textContent;
var Valor = nodosEnTr[2].textContent; 
var Indicador = nodosEnTr[3].textContent;
var Si = nodosEnTr[4].textContent; 
var No = nodosEnTr[5].textContent;
var Observacion = nodosEnTr[6].textContent;
var Accion = nodosEnTr[7].textContent;
//acaban variables
var nuevoCodigoHtml = '<td><input type="text" name="Num" id="Num" value="'+Num+'" size="10"></td>'+
'<td><input type="text" name="Item" id="Item" value="'+Item+'" size="5"></td>'+
'<td><input type="text" name="Valor" id="Valor" value="'+Valor+'" size="5"></td>'+
'<td><input type="text" name="Indicador" id="Indicador" value="'+Indicador+'" size="5"></td>'+
'<td><input type="text" name="Si" id="Si" value="'+Si+'" size="5"></td>'+
'<td><input type="text" name="No" id="Si" value="'+No+'" size="5"></td>'+
'<td><input type="text" name="Observacion" id="Si" value="'+Observacion+'" size="5"></td> <td>En edición</td>';
 
nodoTr.innerHTML = nuevoCodigoHtml;
 
nodoContenedorForm.innerHTML = 'Pulse Aceptar para guardar los cambios o cancelar para anularlos'+
'<form name = "formulario" action="http://localhost:8080/UNo/proyecto/theme/puntuacion2.php" method="get" onsubmit="capturarEnvio()" onreset="anular()">'+
'<input class="boton" type = "submit" value="Aceptar"> <input class="boton" type="reset" value="Cancelar">';
editando = "true";}
else {alert ('Solo se puede editar una línea. Recargue la página para poder editar otra');
}
}
 
function capturarEnvio(){
var nodoContenedorForm = document.getElementById('contenedorForm'); //Nodo DIV
nodoContenedorForm.innerHTML = 'Pulse Aceptar para guardar los cambios o cancelar para anularlos'+
'<form name = "formulario" action="http://aprenderaprogramar.com" method="get" onsubmit="capturarEnvio()" onreset="anular()">'+
'<input type="hidden" name="Num" value="'+document.querySelector('#Num').value+'">'+
'<input type="hidden" name="Item" value="'+document.querySelector('#Item').value+'">'+
'<input type="hidden" name="Valor" value="'+document.querySelector('#Valor').value+'">'+
'<input type="hidden" name="Indicador" value="'+document.querySelector('#Indicador').value+'">'+
'<input type="hidden" name="Si" value="'+document.querySelector('#Si').value+'">'+
'<input type="hidden" name="No" value="'+document.querySelector('#No').value+'">'+
'<input type="hidden" name="Observacion" value="'+document.querySelector('#Observacion').value+'">'+
'<input class="boton" type = "submit" value="Aceptar"> <input class="boton" type="reset" value="Cancelar">';
document.formulario.submit();
}
 
function anular(){
window.location.reload();
}