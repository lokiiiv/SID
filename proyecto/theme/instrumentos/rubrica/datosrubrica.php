<?php
session_start();

$evi = $_POST["evi"]; //evidencia de evaluaci+on
$ins = $_POST["ins"]; //instrumento de evaluación
$num = $_POST["num"]; //número de instrumento en tabla 0, 1, 2 para buscarlo en el mongo
//$intrug=$_POST["intrug"];
$per = $_POST["per"]; //periodo ej20
$A = $_POST["A"];
$B = $_POST["B"];
$C = $_POST["C"];
$D = $_POST["D"];
$E = $_POST["E"];
$F = $_POST["F"];

$por = $_POST["por"]; //porcenjaje 30 de 100
$mat = $_POST["mat"]; //materia nombre
$gru = $_POST["gru"]; //grupo
$tem = $_POST["tem"];
$_SESSION["A"] = $A;
$_SESSION["B"] = $B;
$_SESSION["C"] = $C;
$_SESSION["D"] = $D;
$_SESSION["E"] = $E;
$_SESSION["F"] = $F;
$num = $num - 2;
$INDALC = '<select  onchange="cambioInd(this)" class="form-control">';
if ($A != "0" && $A != "") {
	$INDALC = $INDALC . '<option value="A">A</option>';
}
if ($B != "0" && $B != "") {
	$INDALC = $INDALC . '<option value="B">B</option>';
}
if ($C != "0" && $C != "") {
	$INDALC = $INDALC . '<option value="C">C</option>';
}
if ($D != "0" && $D != "") {
	$INDALC = $INDALC . '<option value="D">D</option>';
}
if ($E != "0" && $E != "") {
	$INDALC = $INDALC . '<option value="E">E</option>';
}
if ($F != "0" && $F != "") {
	$INDALC = $INDALC . '<option value="F">F</option>';
}
$INDALC = $INDALC . '<option value="M" selected>M</option>';
$INDALC = $INDALC . "</select>";
/*echo $evi;
	echo $ins;
	echo $num;
	echo $per;
	echo $A;
	echo $B;
	echo $C;
	echo $D;
	echo $E;
	echo $F;
	echo $por;*/
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>DATOS FALTANTES LISTA</title>
</head>

<body>

	<div class="container" style="width: 100%;">
		<div class="row">
			<div class="col-md-12 col-xs-12 col-sm-12 col-lg-12">
				<div class="row" style="text-align: end;">
					<div class="col-md-12 col-xs-12 col-sm-12 col-lg-12">
						<div class="form-group">
							<input type="button" id="ElegirExistente" class="btn btn-success " style="margin:0 auto;" value="Elegir de uno existente">
						</div>
					</div>
				</div>
				<div class="row" style="text-align: start;">
					<div class="col-md-6 col-xs-6 col-sm-12 col-lg-6">
						<div class="form-group">
							<label for="fa">Ingrese fecha de aplicación</label>
							<input type="text" class="form-control" id="fa" placeholder="<?php $fecha = date('d/m/Y');
																							echo $fecha; ?>">
						</div>
					</div>
					<div class="col-md-6 col-xs-6 col-sm-12 col-lg-6">
						<div class="form-group">
							<label for="te">Ingrese tiempo de evaluación</label>
							<input type="text" class="form-control" id="te" placeholder="1 hora; 30 minutos">
						</div>
					</div>
				</div>
				<div class="row" style="text-align: left;">
					<div class="col-md-12 col-xs-12 col-sm-12 col-lg-12">
						<div class="form-group">
							<input name="archivo" type="file" id="aex" class="col-md-6 col-xs-6 col-sm-6 col-lg-6">
							<input type="button" id="leerexcel" class="btn btn-success " style="margin:0 auto;" value="Leer Excel">
						</div>
					</div>
				</div>
				<div class="row" style="text-align: left;">
					<div class="col-md-12 col-xs-12 col-sm-12 col-lg-12">
						<div class="row">
							<div class="col-md-10 col-sm-10 col-lg-10 col-10">
								<div class="form-group">
									<h5>Categoría o aspecto a evaluar</h5>
								</div>
							</div>
							<div class="col-md-2 col-sm-2 col-lg-2 col-2 d-flex justify-content-end align-items-center">
								<div class="form-group">
									<button id="agregarcateguia" type="button" class="btn btn-primary btn-sm">
										<i class="fa-solid fa-plus"></i>
									</button>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="row" id="contenedor">

				</div>
			</div>
		</div>


		<script>
			var tag1;
			var ancho;

			function foco(tag) {
				tag.parentNode.classList.add('col-md-12', 'col-xs-12', 'col-sm-12', 'col-lg-12');
				//tag.parentNode.classList.add('col-md-12 col-xs-12 col-sm-12 col-lg-12');
				//ancho = tag.parentNode.style.width;
				//tag.parentNode.style.width = "100%";
				//tag.parentNode.style.width = tag.closest('.row').offsetWidth;
				tag1 = tag;
			}

			function nfoco(tag) {
				//tag1.parentNode.style.width = ancho;
				tag.parentNode.classList.remove('col-md-12', 'col-xs-12', 'col-sm-12', 'col-lg-12');
			}

			$("#agregarcateguia").click(function() {
				//alert("ok");
				//var indis = '<div class="col-md-2 col-xs-2 col-sm-2 col-lg-2">Excelente<textarea onblur="nfoco(this)" onfocus="foco(this)" class="form-control" style="resize: none;"></textarea><input type="number" placeholder="Valor" class="form-control"></div><div class="col-md-2 col-xs-2 col-sm-2 col-lg-2">Notable<textarea  onblur="nfoco(this)" onfocus="foco(this)" style="resize: none;" class="form-control"></textarea><input  type="number"  placeholder="Valor"  class="form-control"></div><div class="col-md-2 col-xs-2 col-sm-2 col-lg-2">Bueno<textarea onblur="nfoco(this)" onfocus="foco(this)"  class="form-control" style="resize: none;"></textarea><input placeholder="Valor"   type="number" class="form-control"></div><div class="col-md-2 col-xs-2 col-sm-2 col-lg-2">Suficiente<textarea onblur="nfoco(this)" onfocus="foco(this)"  class="form-control" style="resize: none;"></textarea><input  placeholder="Valor" type="number" class="form-control"></div><div class="col-md-2 col-xs-2 col-sm-2 col-lg-2">Insuficiente<textarea  onblur="nfoco(this)" onfocus="foco(this)"  style="resize: none;" class="form-control"></textarea><input placeholder="Valor" type="number" class="form-control"></div>';
				//var ncate = '<div class="categ row"><br><h4>Ingrese lo siguiente</h4><div class="col-md-9 col-xs-9 col-sm-9 col-lg-9"><input class="form-control" type="text" placeholder="Ingrese el aspecto a evaluar"></div><div class="col-md-2 col-xs-2 col-sm-2 col-lg-2"><?php echo $INDALC; ?></div><div class="col-md-1 col-xs-1 col-sm-1 col-lg-1"><button class="btn btn-danger" onclick="quitacategoria(this)"><span class="glyphicon glyphicon-remove"></span></button></div>' + indis + '</div>';
				//$("#contenedor").append(ncate);

				
				var texto = '<div class="col-md-12 col-xs-12 col-sm-12 col-lg-12 mb-4 conte-aspecto">' +
								'<div class="row">' +
									'<div class="col-lg-11 col-sm-12 col-md-11 col-xs-11">' +
										'<div class="row" style="text-align: start;">' +
											'<div class="col-lg-9 col-sm-12 col-md-9 col-xs-12">' +
												'<div class="form-group">' +
													'<label>Aspecto a evaluar</label>' +
													'<input class="form-control" type="text" placeholder="Ingrese el aspecto a evaluar">' +
												'</div>' +
											'</div>' +
											'<div class="col-lg-3 col-sm-12 col-md-3 col-xs-12">' +
												'<div class="form-group">' +
													'<label>Indicador</label>' +
													'<?php echo $INDALC; ?>' +
												'</div>' +
											'</div>' +
										'</div>' +
										'<div class="row">' +
											'<div class="col-md-4 col-xs-6 col-sm-4 col-lg-2">' +
												'Excelente<textarea onblur="nfoco(this)" onfocus="foco(this)" class="form-control" style="resize: none;"></textarea>' +
												'<input type="number" placeholder="Valor" class="form-control">' +
											'</div>' + 
											'<div class="col-md-4 col-xs-6 col-sm-4 col-lg-2">' +
												'Notable<textarea  onblur="nfoco(this)" onfocus="foco(this)" style="resize: none;" class="form-control"></textarea>' +
												'<input  type="number"  placeholder="Valor"  class="form-control">' +
											'</div>' +
											'<div class="col-md-4 col-xs-6 col-sm-4 col-lg-2">' + 
												'Bueno<textarea onblur="nfoco(this)" onfocus="foco(this)"  class="form-control" style="resize: none;"></textarea>' +
												'<input placeholder="Valor"   type="number" class="form-control">' +
											'</div>' +
											'<div class="col-md-4 col-xs-6 col-sm-4 col-lg-2">' +
												'Suficiente<textarea onblur="nfoco(this)" onfocus="foco(this)"  class="form-control" style="resize: none;"></textarea>' +
												'<input  placeholder="Valor" type="number" class="form-control">' +
											'</div>' +
											'<div class="col-md-4 col-xs-6 col-sm-4 col-lg-2">' +
												'Insuficiente<textarea  onblur="nfoco(this)" onfocus="foco(this)"  style="resize: none;" class="form-control"></textarea>' +
												'<input placeholder="Valor" type="number" class="form-control">' +
											'</div>' +
										'</div>' +
									'</div>' +
									'<div class="col-lg-1 col-sm-12 col-md-1 col-xs-1 d-flex justify-content-end align-items-center">' +
										'<div class="form-group pt-3">' +
											'<button class="btn btn-danger btn-sm" onclick="quitacategoria(this)"><i class="fa-solid fa-trash"></i></button>' +
										'</div>' +
									'</div>' +
								'</div>';
								
				$("#contenedor").append(texto);
			});

			function quitacategoria(tag) {
				//tag.parentNode.parentNode.remove();

				tag.closest('.conte-aspecto').remove();
			}

			function quitaindicador(tag) {
				tag.parentNode.parentNode.remove();
			}

			function agregarindicador(tag) {
				var nindi = '<div class="items row"><div class="col-md-7 col-xs-7 col-sm-7 col-lg-7"><input class="form-control" type="text" placeholder="Digite el indicador"></div><div class="col-md-2 col-xs-2 col-sm-2 col-lg-2"><input class="form-control" type="number" placeholder="Valor"></div><div class="col-md-2 col-xs-2 col-sm-2 col-lg-2"><?php echo $INDALC; ?></div><div class="col-md-1 col-xs-1 col-sm-1 col-lg-1"><button class="btn btn-danger" onclick="quitaindicador(this)"><span class="glyphicon glyphicon-remove"></span></button></div></div>';
				//alert(tag.parentNode.nextElementSibling.innerHTML);
				var htmll = $.parseHTML(nindi);
				//alert("ok");
				tag.parentNode.nextSibling.insertAdjacentHTML('beforeend', nindi);
				//alert("ok");
				//tag.parentNode.nextSibling.innerHTML=nindi;
				//var a=tag.parentNode.nextSibling;



				//$("#contenedor").append(htmll);


			}
		</script>

		<script>
			$("#leerexcel").click(function() {
				var $inputarchivo = document.querySelector("#aex");
				var archivosubir = $inputarchivo.files[0];
				//alert("lk");
				var formdata = new FormData();
				formdata.append("archivo", archivosubir);
				//alert("ok1");
				const respuesta = fetch("instrumentos/rubrica/subeexcel.php", {
					method: "POST",
					body: formdata,
				}).then(function(response) {
					//alert("ok");
					$.post("instrumentos/rubrica/leeexcelA.php", function(values) {

						$("#contenedor")[0].innerHTML = values;

					});

				});




				//$.post("leeexcel.php",function(datas){
				//alert(datas);


				$inputarchivo.value = null;
			});
		</script>

		<script>
			function cambioInd(va) {
				var v = va.value;
				if (v == "M") {} else {
					//alert(v);
					var val = "";
					if (v == "A") val = "<?php echo $A; ?>";
					if (v == "B") val = "<?php echo $B; ?>";
					if (v == "C") val = "<?php echo $C; ?>";
					if (v == "D") val = "<?php echo $D; ?>";
					if (v == "E") val = "<?php echo $E; ?>";
					if (v == "F") val = "<?php echo $F; ?>";
					//va.previuosElementSibling;
					var selects = document.getElementsByTagName("select");
					var contselA = 0,
						contselB = 0,
						contselC = 0,
						contselD = 0,
						contselE = 0,
						contselF = 0;
					for (var i = 0; i < selects.length; i++) {
						if (selects[i].value == "A") {
							contselA++;
						}
						if (selects[i].value == "B") {
							contselB++;
						}
						if (selects[i].value == "C") {
							contselC++;
						}
						if (selects[i].value == "D") {
							contselD++;
						}
						if (selects[i].value == "E") {
							contselE++;
						}
						if (selects[i].value == "F") {
							contselF++;
						}
					}
					if (contselA > 1 || contselB > 1 || contselC > 1 || contselD > 1 || contselE > 1 || contselF > 1) {
						alertify.error("Ya no puedes elegir indicador " + va.value);
						va.value = "";
					} else {
						va.parentNode.parentNode.querySelectorAll("input[type='number']")[0].value = val;
					}

				}

			}
		</script>


		<script>
			//leerindicadoresinstru();
			//alert("ok");
			var cual = cualinstru;
			//alert(cual);
			var tabla = document.getElementById("matrizEvaluacion");
			var evidencia = tabla.rows[cual].cells[0].getElementsByTagName("select")[0].value;
			//alert(evidencia);
			var instrumento = tabla.rows[cual].cells[8].getElementsByTagName("input")[0].value;
			//alert("ok");
			var cual = cualinstru;
			//alert(cual);
			var periodo = document.getElementById("campoPeriodo").innerHTML;
			var grupo = document.getElementById("campoGrupo").innerHTML;
			var tem = document.getElementById("selectTema").value;
			//alert(instrumento);
			var parametros = {
				"accion": "obtenerCamposListaHec",
				"grupo": grupo,
				"periodo": periodo,
				"instrumento": instrumento,
				"evidencia": evidencia,
				"numero": cual,
				"tema": tem,
			};

			$.post("conexion/consultasNoSQL.php", parametros, function(x) {
				if (x != "") {
					v = JSON.parse(x);

					//alert(instrumento+(cual-2));
					var cadA = "";
					var cadM = "";
					//alert(v.length);
					var fa = v[0]; //fecha aplicación
					//alert(fa);
					var te = v[1]; //tiempo de evaluación
					//alert(te);
					document.getElementById("fa").value = fa;
					document.getElementById("te").value = te;
					//var contMin=0;
					var texto = "";

					for (var i = 2; i < v.length; i++) {
						var v2 = v[i];
						//var nindi="";
						var categoriag = v2[0];
						var icategoria = v2[1];
						var textoind = indicadoresselect(icategoria);
						//alert(icategoria);
						//alert(categoriag);
						var v3 = v2[2];
						var contvi = 0;

						var vvi = new Array();
						var vvvi = new Array();

						for (var j = 0; j < v3.length; j++) {

							var indis = v3[j];
							var iii = indis[0];
							var vii = indis[1];



							vvi[contvi] = iii;
							vvvi[contvi] = vii;
							//alert(vvi[contvi]);
							contvi++;

						}

						//alert("ok");
						//var indis = '<div class="col-md-2 col-xs-2 col-sm-2 col-lg-2">Excelente<textarea onblur="nfoco(this)" onfocus="foco(this)" class="form-control" style="resize: none;">' + vvi[0] + '</textarea><input type="number" placeholder="Valor" value="' + vvvi[0] + '" class="form-control"></div><div class="col-md-2 col-xs-2 col-sm-2 col-lg-2">Notable<textarea  onblur="nfoco(this)" onfocus="foco(this)" style="resize: none;" class="form-control">' + vvi[1] + '</textarea><input  value="' + vvvi[1] + '"  type="number"  placeholder="Valor"  class="form-control"></div><div class="col-md-2 col-xs-2 col-sm-2 col-lg-2">Bueno<textarea onblur="nfoco(this)" onfocus="foco(this)"  class="form-control" style="resize: none;">' + vvi[2] + '</textarea><input  value="' + vvvi[2] + '"  placeholder="Valor"   type="number" class="form-control"></div><div class="col-md-2 col-xs-2 col-sm-2 col-lg-2">Suficiente<textarea onblur="nfoco(this)" onfocus="foco(this)"  class="form-control" style="resize: none;">' + vvi[3] + '</textarea><input  value="' + vvvi[3] + '"  placeholder="Valor" type="number" class="form-control"></div><div class="col-md-2 col-xs-2 col-sm-2 col-lg-2">Insuficiente<textarea  onblur="nfoco(this)" onfocus="foco(this)"  style="resize: none;" class="form-control">' + vvi[4] + '</textarea><input  value="' + vvvi[4] + '"  placeholder="Valor" type="number" class="form-control"></div>';
						//alert("ok");
						//var nate = '<div class="categ row"><br><h4>Ingrese lo siguiente</h4><div class="col-md-9 col-xs-9 col-sm-9 col-lg-9"><input class="form-control" type="text" value="' + categoriag + '" placeholder="Ingrese el aspecto a evaluar"></div><div class="col-md-2 col-xs-2 col-sm-2 col-lg-2">' + textoind + '</div><div class="col-md-1 col-xs-1 col-sm-1 col-lg-1"><button class="btn btn-danger" onclick="quitacategoria(this)"><span class="glyphicon glyphicon-remove"></span></button></div>' + indis + '</div>';
						//alert("okoko");
						//ncate = ncate + nate;


						var texto = '<div class="col-md-12 col-xs-12 col-sm-12 col-lg-12 mb-4 conte-aspecto">' +
								'<div class="row">' +
									'<div class="col-lg-11 col-sm-12 col-md-11 col-xs-11">' +
										'<div class="row" style="text-align: start;">' +
											'<div class="col-lg-9 col-sm-12 col-md-9 col-xs-12">' +
												'<div class="form-group">' +
													'<label>Aspecto a evaluar</label>' +
													'<input class="form-control" type="text" placeholder="Ingrese el aspecto a evaluar" value="' + categoriag + '">' +
												'</div>' +
											'</div>' +
											'<div class="col-lg-3 col-sm-12 col-md-3 col-xs-12">' +
												'<div class="form-group">' +
													'<label>Indicador</label>' +
													textoind +
												'</div>' +
											'</div>' +
										'</div>' +
										'<div class="row">' +
											'<div class="col-md-4 col-xs-6 col-sm-4 col-lg-2">' +
												'Excelente<textarea onblur="nfoco(this)" onfocus="foco(this)" class="form-control" style="resize: none;">' + vvi[0] + '</textarea>' +
												'<input type="number" placeholder="Valor" class="form-control" value="' + vvvi[0] + '">' +
											'</div>' + 
											'<div class="col-md-4 col-xs-6 col-sm-4 col-lg-2">' +
												'Notable<textarea  onblur="nfoco(this)" onfocus="foco(this)" style="resize: none;" class="form-control">' + vvi[1] + '</textarea>' +
												'<input  type="number"  placeholder="Valor"  class="form-control" value="' + vvvi[1] + '">' +
											'</div>' +
											'<div class="col-md-4 col-xs-6 col-sm-4 col-lg-2">' + 
												'Bueno<textarea onblur="nfoco(this)" onfocus="foco(this)"  class="form-control" style="resize: none;">' + vvi[2] + '</textarea>' +
												'<input placeholder="Valor"   type="number" class="form-control" value="' + vvvi[2] + '">' +
											'</div>' +
											'<div class="col-md-4 col-xs-6 col-sm-4 col-lg-2">' +
												'Suficiente<textarea onblur="nfoco(this)" onfocus="foco(this)"  class="form-control" style="resize: none;">' + vvi[3] + '</textarea>' +
												'<input  placeholder="Valor" type="number" class="form-control" value="' + vvvi[3] + '">' +
											'</div>' +
											'<div class="col-md-4 col-xs-6 col-sm-4 col-lg-2">' +
												'Insuficiente<textarea  onblur="nfoco(this)" onfocus="foco(this)"  style="resize: none;" class="form-control"> ' + vvi[4] + '</textarea>' +
												'<input placeholder="Valor" type="number" class="form-control" value="' + vvvi[4] + '">' +
											'</div>' +
										'</div>' +
									'</div>' +
									'<div class="col-lg-1 col-sm-12 col-md-1 col-xs-1 d-flex justify-content-end align-items-center">' +
										'<div class="form-group pt-3">' +
											'<button class="btn btn-danger btn-sm" onclick="quitacategoria(this)"><i class="fa-solid fa-trash"></i></button>' +
										'</div>' +
									'</div>' +
								'</div>';
						
						$("#contenedor").append(texto);
					}


					//alert("ok1");


					
					//alert(general+" "+general2.length);

					//var texto = "";

				}
			});
		</script>
		<script>
			function indicadoresselect(i) {
				var textoind = '<select onchange="cambioInd(this)" class="form-control">';
				var ti = "";
				<?php
				if ($A != "0" && $A != "") {
				?>
					if (i == "A") {
						ti = "selected";
					}
					textoind = textoind + '<option value="A" ' + ti + '>A</option>';
					ti = "";
				<?php
				}
				?>
				<?php
				if ($B != "0" && $B != "") {
				?>
					if (i == "B") {
						ti = "selected";
					}
					textoind = textoind + '<option value="B" ' + ti + '>B</option>';
					ti = "";
				<?php
				}
				?>
				<?php
				if ($C != "0" && $C != "") {
				?>
					if (i == "C") {
						ti = "selected";
					}
					textoind = textoind + '<option value="C" ' + ti + '>C</option>';
					ti = "";
				<?php
				}
				?>
				<?php
				if ($D != "0" && $D != "") {
				?>
					if (i == "D") {
						ti = "selected";
					}
					textoind = textoind + '<option value="D" ' + ti + '>D</option>';
					ti = "";
				<?php
				}
				?>
				<?php
				if ($E != "0" && $E != "") {
				?>
					if (i == "E") {
						ti = "selected";
					}
					textoind = textoind + '<option value="E" ' + ti + '>E</option>';
					ti = "";
				<?php
				}
				?>
				<?php
				if ($F != "0" && $F != "") {
				?>
					if (i == "F") {
						ti = "selected";
					}
					textoind = textoind + '<option value="F" ' + ti + '>F</option>';
					ti = "";
				<?php
				}
				?>
				ti = "";
				if (i == "M") {
					ti = "selected"
				}
				textoind = textoind + '<option value="M" ' + ti + '>M</option>';

				textoind = textoind + '</select>';
				return textoind;
			}
		</script>
		<script>
			$("#ElegirExistente").click(function(event) {
				//alert("ok");

				var parametros = {
					"accion": "trinstrumentosHec",
					"instru": "Rúbrica"
				};
				//var ata=false;

				$.ajax({
					data: parametros,
					url: 'conexion/consultasNoSQL.php',
					type: 'post',
					beforeSend: function() {
						//$("#).html("Guardando..");
					},
					success: function(x) {
						//alert(x);
						var textoeh = "";
						var xx = JSON.parse(x);
						//var xxx=Object.keys(xx);
						$("#eliginstru").empty();
						for (key in xx) {
							//El periodo guardar key

							textoeh = textoeh + "<div class='row'><div style='background-color:blue; width:100%;'><h3 style='color: black;'>" + key + "</h3></div></div>";
							var periodo = xx[key];
							for (key1 in periodo) {
								if (key1 != "Grupos") {
									//Guardar los grupos 1F22 etc con key1

									//alert(key1);
									var grupo = periodo[key1];
									var tema = grupo["Temas"];
									var materia = grupo["Materia"];
									textoeh = textoeh + "<div class='row'><div style='background-color:#B9B2B0; width:100%;'><h4 style='color: black;'>" + key1 + " - " + materia + "</h4></div></div>";
									//guardar en que tema
									for (key2 in tema) {
										//$("#eliginstru").append("<h5>------Tema "+key2+"</h5>");
										var temaa = tema[key2];
										var m = temaa["MatrizEvaluacion"];
										for (var i = 0; i < m.length; i++) {
											var ins = m[i][8];

											if (ins == "Rúbrica") {
												var cla = m[i][12];
												var evide = m[i][0];
												//echo temaa[cla];
												//alert (typeof temaa[cla]);
												if (typeof temaa[cla] != 'undefined') {
													var instrumentofinal = temaa[cla];

													textoeh = textoeh + "<div class='row'><div style='width:100%;'><a href='#' onclick='utilizainstruH(\"" + key + "\",\"" + key1 + "\",\"" + key2 + "\",\"" + materia + "\",\"" + cla + "\",\"" + evide + "\")'><h4>" + evide + "</h4></a></div></div>";
												}
												//alert(cla);	
											}

										}
										//$("#eliginstru").append('Some text');

									}
								}
							}
						}

						alertify.alert(textoeh);

					}
				});
				//alert("ok");
			});

			function utilizainstruH(periodo, grupo, tema, materia, ins, evide) {

				reabreinstru(periodo, grupo, tema, materia, ins, evide);
				//alert(ins);
			}
		</script>
		<script>
			function reabreinstru(periodo, grupo, tema, materia, ins, evide) {
				var cual = cualinstru;

				//var tabla = document.getElementById("matrizEvaluacion");
				var evidencia = evide;
				//alert(evidencia);
				var instrumento = ins;
				//alert("ok");
				//var cual=cualinstru;
				//alert(cual);
				var periodo = periodo;
				var grupo = grupo;
				var tem = tema;
				var parametros = {
					"accion": "obtenerCamposListaHec",
					"grupo": grupo,
					"periodo": periodo,
					"instrumento": instrumento,
					"evidencia": evidencia,
					"numero": cual,
					"tema": tem,
				};

				$.post("conexion/consultasNoSQL.php", parametros, function(x) {
					if (x != "") {
						v = JSON.parse(x);
						$("#contenedor").empty();
						//alert(instrumento+(cual-2));
						var cadA = "";
						var cadM = "";
						//alert(v.length);
						var fa = v[0]; //fecha aplicación
						//alert(fa);
						var te = v[1]; //tiempo de evaluación
						//alert(te);
						document.getElementById("fa").value = fa;
						document.getElementById("te").value = te;
						//var contMin=0;
						var ncate = "";

						for (var i = 2; i < v.length; i++) {
							var v2 = v[i];
							//var nindi="";
							var categoriag = v2[0];
							var icategoria = v2[1];
							var textoind = indicadoresselect(icategoria);
							//alert(icategoria);
							//alert(categoriag);
							var v3 = v2[2];
							var contvi = 0;

							var vvi = new Array();
							var vvvi = new Array();

							for (var j = 0; j < v3.length; j++) {

								var indis = v3[j];
								var iii = indis[0];
								var vii = indis[1];



								vvi[contvi] = iii;
								vvvi[contvi] = vii;
								//alert(vvi[contvi]);
								contvi++;

							}

							//alert("ok");
							var indis = '<div class="col-md-2 col-xs-2 col-sm-2 col-lg-2">Excelente<textarea onblur="nfoco(this)" onfocus="foco(this)" class="form-control" style="resize: none;">' + vvi[0] + '</textarea><input type="number" placeholder="Valor" value="' + vvvi[0] + '" class="form-control"></div><div class="col-md-2 col-xs-2 col-sm-2 col-lg-2">Notable<textarea  onblur="nfoco(this)" onfocus="foco(this)" style="resize: none;" class="form-control">' + vvi[1] + '</textarea><input  value="' + vvvi[1] + '"  type="number"  placeholder="Valor"  class="form-control"></div><div class="col-md-2 col-xs-2 col-sm-2 col-lg-2">Bueno<textarea onblur="nfoco(this)" onfocus="foco(this)"  class="form-control" style="resize: none;">' + vvi[2] + '</textarea><input  value="' + vvvi[2] + '"  placeholder="Valor"   type="number" class="form-control"></div><div class="col-md-2 col-xs-2 col-sm-2 col-lg-2">Suficiente<textarea onblur="nfoco(this)" onfocus="foco(this)"  class="form-control" style="resize: none;">' + vvi[3] + '</textarea><input  value="' + vvvi[3] + '"  placeholder="Valor" type="number" class="form-control"></div><div class="col-md-2 col-xs-2 col-sm-2 col-lg-2">Insuficiente<textarea  onblur="nfoco(this)" onfocus="foco(this)"  style="resize: none;" class="form-control">' + vvi[4] + '</textarea><input  value="' + vvvi[4] + '"  placeholder="Valor" type="number" class="form-control"></div>';
							//alert("ok");
							var nate = '<div class="categ row"><br><h4>Ingrese lo siguiente</h4><div class="col-md-9 col-xs-9 col-sm-9 col-lg-9"><input class="form-control" type="text" value="' + categoriag + '" placeholder="Ingrese el aspecto a evaluar"></div><div class="col-md-2 col-xs-2 col-sm-2 col-lg-2">' + textoind + '</div><div class="col-md-1 col-xs-1 col-sm-1 col-lg-1"><button class="btn btn-danger" onclick="quitacategoria(this)"><span class="glyphicon glyphicon-remove"></span></button></div>' + indis + '</div>';
							//alert("okoko");
							ncate = ncate + nate;

						}


						//alert("ok1");


						$("#contenedor").append(ncate);
						//alert(general+" "+general2.length);

						var texto = "";

					}
				});

			}
		</script>
</body>

</html>