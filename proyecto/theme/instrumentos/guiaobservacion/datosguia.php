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
		<!–– primer encabezado ––>
			<div class="row">
				<div class=" col-md-offset-2 col-md-12 col-xs-12 col-sm-12 col-lg-12">
					<div class="row" style="text-align: end">
						<div class="col-md-12 col-xs-12 col-sm-12 col-lg-12">
							<div class="form-group">
								<input type="button" id="ElegirExistente" class="btn btn-success " style="margin:0 auto;" value="Elegir de uno existente">
							</div>
						</div>
					</div>
					<div class="row" style="text-align: left;">
						<div class="col-md-6 col-xs-6 col-sm-12 col-lg-6">
							<div class="form-group">
								<label for="fa">Ingrese fecha de aplicación:</label>
								<input type="text" class="form-control" id="fa" placeholder="<?php $fecha = date('d/m/Y');
																								echo $fecha; ?>">
							</div>
						</div>
						<div class="col-md-6 col-xs-6 col-sm-12 col-lg-6">
							<div class="form-group">
								<label for="te">Ingrese tiempo de evaluación:</label>
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

					<div class="row mt-4" style="text-align: left;">
						<div class="col-md-12 col-xs-12 col-sm-12 col-lg-12">
							<div class="row">
								<div class="col-md-10 col-sm-10 col-lg-10 col-10">
									<div class="form-group">
										<h5>Con el siguiente boton agregará las categorías, y después tendrá que agregar indicadores a cada categoría.</h5>
									</div>
								</div>
								<div class="col-md-2 col-sm-2 col-lg-2 col-2 d-flex justify-content-end align-items-center">
									<div class="form-group">
										<button class="btn btn-primary btn-sm" id="agregarcateguia">
											<i class="fa-solid fa-plus"></i>
										</button>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12 col-xs-12 col-sm-12 col-lg-12" id="contenedor">
						</div>
					</div>
				</div>
			</div>
	</div>




	<script>
		$("#agregarcateguia").click(function() {
			//alert("ok");
			//var ncate = '<div class="categ row"><br><h5>Nueva categoría</h5><div class="col-md-10 col-xs-10 col-sm-10 col-lg-10"><input class="form-control" type="text" placeholder="Digite la categoría a observar"></div><div class="col-md-2 col-xs-2 col-sm-2 col-lg-2"><button class="btn btn-success" onclick="agregarindicador(this)"><i class="fa-solid fa-plus"></i></button><button class="btn btn-danger" onclick="quitacategoria(this)"><i class="fa-solid fa-trash"></i></button></div><div class="col-md-12 col-xs-12 col-sm-12 col-lg-12"> </div></div>';
			var ncate = '<div class="categ row">' +
							'<div class="col-md-9 col-sm-9 col-lg-9 col-9">' +
								'<div class="form-group" style="text-align: left;">' +
									'<h6>Nueva categoría</h6>' +
									'<input class="form-control" type="text" placeholder="Digite la categoría a observar">' +
								'</div>' +
							'</div>' + 
							'<div class="col-md-3 col-sm-3 col-lg-3 col-3 d-flex justify-content-end align-items-center">' +
								'<div class="btn-group mt-2" role="group" aria-label="Basic example">' +
									'<button type="button" class="btn btn-success btn-sm" onclick="agregarindicador(this)"><i class="fa-solid fa-plus"></i></button>' +
									'<button type="button" class="btn btn-danger btn-sm" onclick="quitacategoria(this)"><i class="fa-solid fa-trash"></i></button>' +
									'</div>' +
							'</div>' + 
						'</div>';
			$("#contenedor").append(ncate);
		});

		function quitacategoria(tag) {
			tag.closest('.categ').remove();
		}

		function quitaindicador(tag) {
			tag.closest('.items').remove();
		}

		function agregarindicador(tag) {
			var nindi = '<div class="col-md-12 col-xs-12 col-sm-12 col-lg-12">' + 
							'<div class="items row" style="margin-left: 10px;">' + 
								'<div class="col-md-6 col-xs-6 col-sm-12 col-lg-6">'+
									'<div class="form-group">' +
										'<input class="form-control" type="text" placeholder="Digite el indicador">' + 
									'</div>' +
								'</div>' +
								'<div class="col-md-2 col-xs-2 col-sm-12 col-lg-2">'+
									'<div class="form-group">' +
										'<input class="form-control" type="number" placeholder="Valor">' +
									'</div>' +
								'</div>' +
								'<div class="col-md-2 col-xs-2 col-sm-12 col-lg-2">'+
									'<div class="form-group">' +
										'<?php echo $INDALC; ?>' + 
									'</div>' +
								'</div>' +
								'<div class="col-md-2 col-xs-2 col-sm-12 col-lg-2 d-flex justify-content-end align-items-center">' + 
									'<div class="form-group">' + 
										'<button class="btn btn-danger btn-sm" onclick="quitaindicador(this)"><i class="fa-solid fa-trash"></i></button>' +
									'</div>' +	
								'</div>' +
							'</div>'+
						'</div>';
			//alert(tag.parentNode.nextElementSibling.innerHTML);
			//var htmll = $.parseHTML(nindi);
			//alert("ok");
			///tag.parentNode.nextSibling.insertAdjacentHTML('beforeend', nindi);
			//alert("ok");
			//tag.parentNode.nextSibling.innerHTML=nindi;
			//var a=tag.parentNode.nextSibling;

			tag.closest('.categ').insertAdjacentHTML('beforeend', nindi);
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
			const respuesta = fetch("instrumentos/guiaobservacion/subeexcel.php", {
				method: "POST",
				body: formdata,
			}).then(function(response) {
				//alert("ok");
				$.post("instrumentos/guiaobservacion/leeexcelA.php", function(values) {
					//var v=values.split("**********");
					$("#contenedor")[0].innerHTML = values;
					//alert(values);
					//$("#minimos")[0].innerHTML=v[0];
					//$("#minimos2")[0].innerHTML=v[1];
					//$("#minimos3")[0].innerHTML=v[2];
					//alert(v[3]);
					//$("#mps")[0].value=v[3];
					//$("#mps")[0].disabled=true;
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
		//alert("ok1");
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

				var te = v[1]; //tiempo de evaluación
				//alert(te);
				document.getElementById("fa").value = fa;
				document.getElementById("te").value = te;
				//var contMin=0;
				var ncate = "";
				for (var i = 2; i < v.length; i++) {
					var general = v[i][0];
					var general2 = v[i][1];

					var nindi = "";
					for (var j = 0; j < general2.length; j++) {
						var tex = general2[j][0];
						var val = general2[j][1];
						var indi = indicadoresselect(general2[j][2]);

						//nindi = nindi + '<div class="items row"><div class="col-md-7 col-xs-7 col-sm-7 col-lg-7"><input class="form-control" type="text" placeholder="Digite el indicador" value="' + tex + '"></div><div class="col-md-2 col-xs-2 col-sm-2 col-lg-2"><input class="form-control" type="number" placeholder="Valor" value="' + val + '"></div><div class="col-md-2 col-xs-2 col-sm-2 col-lg-2">' + indi + '</div><div class="col-md-1 col-xs-1 col-sm-1 col-lg-1"><button class="btn btn-danger" onclick="quitaindicador(this)"><i class="fa-solid fa-trash"></i></button></div></div>';
						
						nindi = nindi + '<div class="col-md-12 col-xs-12 col-sm-12 col-lg-12">' +
											'<div class="items row" style="margin-left: 10px;">' +
												'<div class="col-md-6 col-xs-6 col-sm-12 col-lg-6">' +
													'<div class="form-group">' +
														'<input class="form-control" type="text" placeholder="Digite el indicador" value="' +  tex + '">' + 
													'</div>' +
												'</div>' +
												'<div class="col-md-2 col-xs-2 col-sm-12 col-lg-2">'+
													'<div class="form-group">' +
														'<input class="form-control" type="number" placeholder="Valor" value="' + val + '">' +
													'</div>' +
												'</div>' +
												'<div class="col-md-2 col-xs-2 col-sm-12 col-lg-2">'+
													'<div class="form-group">' +
														indi + 
													'</div>' +
												'</div>' +
												'<div class="col-md-2 col-xs-2 col-sm-12 col-lg-2 d-flex justify-content-end align-items-center">' + 
													'<div class="form-group">' + 
														'<button class="btn btn-danger btn-sm" onclick="quitaindicador(this)"><i class="fa-solid fa-trash"></i></button>' +
													'</div>' +	
												'</div>' +
											'</div>' +
										'</div>';
					}
					//ncate = ncate + '<div class="categ row"><br><h4>Nueva categoría</h4><div class="col-md-10 col-xs-10 col-sm-10 col-lg-10"><input class="form-control" type="text" placeholder="Digite la categoría a observar" value="' + general + '"></div><div class="col-md-2 col-xs-2 col-sm-2 col-lg-2"><button class="btn btn-success" onclick="agregarindicador(this)"><i class="fa-solid fa-plus"></i></button><button class="btn btn-danger" onclick="quitacategoria(this)"><i class="fa-solid fa-trash"></i></button></div><div class="col-md-12 col-xs-12 col-sm-12 col-lg-12">' + nindi + '</div></div>';
					//ncate = ncate  + nindi + '</div></div>';
					
					ncate = ncate + '<div class="categ row">' +
										'<div class="col-md-9 col-sm-9 col-lg-9 col-9">' +
											'<div class="form-group" style="text-align: left;">' +
												'<h6>Nueva categoría</h6>' +
												'<input class="form-control" type="text" placeholder="Digite la categoría a observar" value="' + general + '">' +
											'</div>' +
										'</div>' + 
										'<div class="col-md-3 col-sm-3 col-lg-3 col-3 d-flex justify-content-end align-items-center">' +
											'<div class="btn-group mt-2" role="group" aria-label="Basic example">' +
												'<button type="button" class="btn btn-success btn-sm" onclick="agregarindicador(this)"><i class="fa-solid fa-plus"></i></button>' +
												'<button type="button" class="btn btn-danger btn-sm" onclick="quitacategoria(this)"><i class="fa-solid fa-trash"></i></button>' +
											'</div>' +
										'</div>' + 
										nindi +
									'</div>';
				}
				$("#contenedor").append(ncate);
				//alert(general+" "+general2.length);

				var texto = "";

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
				"instru": "Guía de observación"
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

										if (ins == "Guía de observación") {
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

					var te = v[1]; //tiempo de evaluación
					//alert(te);
					document.getElementById("fa").value = fa;
					document.getElementById("te").value = te;
					//var contMin=0;
					var ncate = "";
					for (var i = 2; i < v.length; i++) {
						var general = v[i][0];
						var general2 = v[i][1];

						var nindi = "";
						for (var j = 0; j < general2.length; j++) {
							var tex = general2[j][0];
							var val = general2[j][1];
							var indi = indicadoresselect(general2[j][2]);

							nindi = nindi + '<div class="items row"><div class="col-md-7 col-xs-7 col-sm-7 col-lg-7"><input class="form-control" type="text" placeholder="Digite el indicador" value="' + tex + '"></div><div class="col-md-2 col-xs-2 col-sm-2 col-lg-2"><input class="form-control" type="number" placeholder="Valor" value="' + val + '"></div><div class="col-md-2 col-xs-2 col-sm-2 col-lg-2">' + indi + '</div><div class="col-md-1 col-xs-1 col-sm-1 col-lg-1"><button class="btn btn-danger" onclick="quitaindicador(this)"><i class="fa-solid fa-trash"></i></button></div></div>';
						}
						ncate = ncate + '<div class="categ row"><br><h4>Nueva categoría</h4><div class="col-md-10 col-xs-10 col-sm-10 col-lg-10"><input class="form-control" type="text" placeholder="Digite la categoría a observar" value="' + general + '"></div><div class="col-md-2 col-xs-2 col-sm-2 col-lg-2"><button class="btn btn-success" onclick="agregarindicador(this)"><i class="fa-solid fa-plus"></i></button><button class="btn btn-danger" onclick="quitacategoria(this)"><i class="fa-solid fa-trash"></i></button></div><div class="col-md-12 col-xs-12 col-sm-12 col-lg-12">' + nindi + '</div></div>';
					}
					$("#contenedor").append(ncate);
					//alert(general+" "+general2.length);

					var texto = "";

				}
			});
		}
	</script>
</body>

</html>