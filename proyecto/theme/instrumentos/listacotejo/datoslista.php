<?php
	session_start();

 	$evi=$_POST["evi"]; //evidencia de evaluaci+on
 	$ins=$_POST["ins"]; //instrumento de evaluación
 	$num=$_POST["num"]; //número de instrumento en tabla 0, 1, 2 para buscarlo en el mongo
 	//$intrug=$_POST["intrug"];
 	$per=$_POST["per"]; //periodo ej20
 	$A=$_POST["A"]; 
 	$B=$_POST["B"]; 
 	$C=$_POST["C"]; 
 	$D=$_POST["D"]; 
 	$E=$_POST["E"]; 
 	$F=$_POST["F"]; 
 	$por=$_POST["por"];//porcenjaje 30 de 100
 	$mat=$_POST["mat"];//materia nombre
 	$gru=$_POST["gru"];//grupo
	$tem=$_POST["tem"]; 	
	$_SESSION["A"]=$A;
	$_SESSION["B"]=$B;
	$_SESSION["C"]=$C;
	$_SESSION["D"]=$D;
	$_SESSION["E"]=$E;
	$_SESSION["F"]=$F;
	$num=$num-2;
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
	<link href="../../css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
	<div class="container">
 		<!–– primer encabezado ––>
 		<div class="row">
 			<div class=" col-md-offset-2 col-md-8 col-xs-8 col-sm-8 col-lg-8">
 				<form style="color: black !important;">
 					<div style="text-align: left; ">
 						<div class="col-md-12 col-xs-12 col-sm-12 col-lg-12" style="text-align: right;">
								
								<input type="button" id="ElegirExistente" class="btn btn-success " style="margin:0 auto;" value="Elegir de uno existente">
						</div>
						<br>
					  	<div class="form-group">
						    Ingrese fecha de aplicación
						    <input type="text" class="form-control" id="fa" placeholder="<?php $fecha=date('d/m/Y'); echo $fecha; ?>">
						    Ingrese tiempo de evaluación
						    <input type="text" class="form-control" id="te" placeholder="1 hora; 30 minutos">
						</div>


						<div style="background-color: #F1F7F7;">
							<br>
							<div>
								<input name="archivo" type="file" id="aex" class="col-md-6 col-xs-6 col-sm-6 col-lg-6">
								<input type="button" id="leerexcel" class="btn btn-success " style="margin:0 auto;" value="Leer Excel">
							</div>




							<br><br><br>
							<!––indicadores de alcance-->

							<div class="form-group" id="alcance">
								<?php 
									if ($A!="0" && $A!="") {
										# code...
										echo 'Ingrese indicador A <textarea rows="4" class="form-control" id="A" placeholder=""></textarea>';
									}
									if ($B!="0" && $B!="") {
										# code...
										echo 'Ingrese indicador B <textarea rows="4" class="form-control" id="B" placeholder=""></textarea>';
									}
									if ($C!="0" && $C!="") {
										# code...
										echo 'Ingrese indicador C <textarea rows="4"  class="form-control" id="C" placeholder=""></textarea>';
									}
									if ($D!="0" && $D!="") {
										# code...
										echo 'Ingrese indicador D <textarea rows="4"  class="form-control" id="D" placeholder=""></textarea>';
									}
									if ($E!="0" && $E!="") {
										# code...
										echo 'Ingrese indicador E <textarea rows="4"  class="form-control" id="E" placeholder=""></textarea>';
									}
									if ($F!="0" && $F!="") {
										# code...
										echo 'Ingrese indicador F <textarea rows="4"  class="form-control" id="F" placeholder=""></textarea>';
									}

								 ?>    
							</div>
							<!––indicadores mínimos-->
							
							<button id="agregar" type="button" class="btn btn-success">
						    	Agregar indicador mínimo  	
						    </button>
							<div class="form-group">
								<div class="col-md-9 col-xs-9 col-sm-9 col-lg-9">Indicador</div>
								<div class="col-md-2 col-xs-2 col-sm-2 col-lg-2">Puntaje</div>
							</div>
							<div class="form-group" id="minimos">
								
							</div>
						</div>

					</div>	

					<br><br>
					
					
				</div>
 			</div>
 		</div>
 	</div>
	<script src="js/jquery.js"></script>
	<script>
		var cont=0;
		$("#agregar").click(function(){
			var contt=cont;
			cont++;
			$("#minimos").append('<div id="d'+contt+'"><textarea id="M'+contt+'" rows="4" class="col-lg-9 col-sm-9 col-md-9 M"></textarea><textarea id="M'+contt+'" rows="4" class="col-lg-2 col-sm-2 col-md-2" class="PM"></textarea><button type="button" class="btn btn-danger col-lg-1 col-sm-1 col-md-1" onclick="bot('+contt+')">X</button><div>');
			

		});
		
	</script>
	<script>
		function bot(n){
			$("#d"+n).remove();
		} 
	</script>
	<script>

		function contar(){
			var d=$("#minimos")[0];
			var b=d.getElementsByTagName("button");
			var num = b.length;
			//alert(num);
			cont=num+1;
		}

		$("#leerexcel").click(function(data){
			//alert("ok");
			var $inputarchivo=document.querySelector("#aex");	
			var archivosubir=$inputarchivo.files[0];
			//alert("lk");
			var formdata=new FormData();
			formdata.append("archivo",archivosubir);
			//alert("ok1");
			const respuesta = fetch("instrumentos/listacotejo/subeexcel.php",{
				method:"POST",
				body : formdata,
			}).then(function(response){
				$("#alcance").load("instrumentos/listacotejo/leeexcelA.php",function()	{
					$("#minimos").load("instrumentos/listacotejo/leeexcelM.php",function(){
				contar();	//actualiza el valor de cont para los mínimos

			});

			});
			

			});
			
			//$.post("leeexcel.php",function(datas){
				//alert(datas);
			

			$inputarchivo.value=null;
			//contar();
		});
		
		

	</script>

	<script>

		//leerindicadoresinstru();
		//alert("ok");
		var cual=cualinstru;
          //alert(cual);
          var tabla = document.getElementById("matrizEvaluacion");
          var evidencia=tabla.rows[cual].cells[0].getElementsByTagName("select")[0].value;
    //alert(evidencia);
        var instrumento=tabla.rows[cual].cells[8].getElementsByTagName("input")[0].value;
        //alert("ok");
        var cual=cualinstru;
        //alert(cual);
        var periodo=document.getElementById("campoPeriodo").innerHTML;
        var grupo=document.getElementById("campoGrupo").innerHTML;
        var tem=document.getElementById("selectTema").value;
    //alert("ok1");
	    var parametros={
	        "accion":"obtenerCamposListaHec",
	        "grupo":grupo,
	        "periodo":periodo,
	        "instrumento":instrumento,
	        "evidencia":evidencia,
	        "numero":cual,
	        "tema":tem,
	    };
	        
	    $.post("conexion/consultasNoSQL.php",parametros,function(x){
	    	if (x!="") {
	      	v = JSON.parse(x);

	      	//alert(instrumento+(cual-2));
	      	var cadA="";
	      	var cadM="";
	      	var fa=v[0][0];//fecha aplicación

	      	var te=v[0][1];//tiempo de evaluación
	      	//alert(te);
	      	document.getElementById("fa").value=fa;
          	document.getElementById("te").value=te;
	      	var contMin=0;
	      	//alert("ok");
		    for (var i = 2; i < v[0].length; i=i+3) {
		    	if (v[0][i+1]!="M") {
		    		cadA=cadA+'Ingrese indicador '+v[0][i+1]+' <textarea rows="4" class="form-control" id="'+v[0][i+1]+'" placeholder="">'+v[0][i]+'</textarea>';  
		    	}else{
		    		cadM=cadM+'<div id="d'+contMin+'"><textarea id="M'+contMin+'" rows="4" class="col-lg-9 col-sm-9 col-md-9" class="M">'+v[0][i]+'</textarea><textarea id="M'+contMin+'" rows="4" class="col-lg-2 col-sm-2 col-md-2" class="PM">'+v[0][i+2]+'</textarea><button type="button" class="btn btn-danger col-lg-1 col-sm-1 col-md-1" onclick="bot('+contMin+')">X</button></div>';
					contMin++;
		    	}
		    }
		    cont=contMin;
		    //alert(cadA);
		    //var divminimo=document.getElementById("minimos");
		    $("#minimos")[0].innerHTML=cadM;
		    $("#alcance")[0].innerHTML=cadA;
		    
		}
	    });
	        
        
		
	</script>

	<script>
		$("#ElegirExistente").click(function(event) {
			//alert("ok");

			var parametros = {
              "accion":"trinstrumentosHec",
              "instru":"Lista de cotejo"
            };
            //var ata=false;
            
            $.ajax({
          		data: parametros,
          		url: 'conexion/consultasNoSQL.php',
          		type:'post',
          		beforeSend: function(){
            //$("#).html("Guardando..");
          		},
          		success: function(x){
					//alert(x);
					var textoeh="";
					var xx = JSON.parse(x);
					//var xxx=Object.keys(xx);
	            	$("#eliginstru").empty();
	            	for (key in xx) {
    					//El periodo guardar key

    					textoeh=textoeh+"<div class='row'><div style='background-color:blue; width:100%;'><h3 style='color: black;'>"+key+"</h3></div></div>";
    					var periodo=xx[key];
    					for (key1 in periodo) {
    						if (key1!="Grupos") {
    							//Guardar los grupos 1F22 etc con key1
    							
    							//alert(key1);
    							var grupo=periodo[key1];
    							var tema=grupo["Temas"];
    							var materia=grupo["Materia"];
    							textoeh=textoeh+"<div class='row'><div style='background-color:#B9B2B0; width:100%;'><h4 style='color: black;'>"+key1+" - " +materia+"</h4></div></div>";
    							//guardar en que tema
    							for (key2 in tema) {
    								//$("#eliginstru").append("<h5>------Tema "+key2+"</h5>");
    								var temaa=tema[key2];
    								var m=temaa["MatrizEvaluacion"];
    								for(var i=0;i<m.length;i++){
    									var ins=m[i][8];
    									
    									if (ins=="Lista de cotejo") {
    										var cla=m[i][12];
    										var evide=m[i][0];
    										//echo temaa[cla];
    										//alert (typeof temaa[cla]);
    										if(typeof temaa[cla] != 'undefined'){
	    										var instrumentofinal=temaa[cla];

	    										textoeh=textoeh+"<div class='row'><div style='width:100%;'><a href='#' onclick='utilizainstruH(\""+key+"\",\""+key1+"\",\""+key2+"\",\""+materia+"\",\""+cla+"\",\""+evide+"\")'><h4>"+evide+"</h4></a></div></div>";
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
		function utilizainstruH(periodo,grupo,tema,materia,ins,evide){
			
			reabreinstru(periodo,grupo,tema,materia,ins,evide);
//alert(ins);
		}

	</script>
	<script>
		function reabreinstru(periodo,grupo,tema,materia,ins,evide){
			var cual=cualinstru;
          
          	//var tabla = document.getElementById("matrizEvaluacion");
         	 var evidencia=evide;
    		//alert(evidencia);
        	var instrumento=ins;
	        //alert("ok");
	        //var cual=cualinstru;
	        //alert(cual);
	        var periodo=periodo;
	        var grupo=grupo;
	        var tem=tema;
	        var parametros={
	        "accion":"obtenerCamposListaHec",
	        "grupo":grupo,
	        "periodo":periodo,
	        "instrumento":instrumento,
	        "evidencia":evidencia,
	        "numero":cual,
	        "tema":tem,
	    };
	        
	    $.post("conexion/consultasNoSQL.php",parametros,function(x){
	    	if (x!="") {
	      	v = JSON.parse(x);
	      	$("#minimos").empty();
	      	$("#alcance").empty();
	      	//alert(instrumento+(cual-2));
	      	var cadA="";
	      	var cadM="";
	      	var fa=v[0][0];//fecha aplicación

	      	var te=v[0][1];//tiempo de evaluación
	      	//alert(te);
	      	document.getElementById("fa").value=fa;
          	document.getElementById("te").value=te;
	      	var contMin=0;
	      	//alert("ok");
		    for (var i = 2; i < v[0].length; i=i+3) {
		    	if (v[0][i+1]!="M") {
		    		cadA=cadA+'Ingrese indicador '+v[0][i+1]+' <textarea rows="4" class="form-control" id="'+v[0][i+1]+'" placeholder="">'+v[0][i]+'</textarea>';  
		    	}else{
		    		cadM=cadM+'<div id="d'+contMin+'"><textarea id="M'+contMin+'" rows="4" class="col-lg-9 col-sm-9 col-md-9" class="M">'+v[0][i]+'</textarea><textarea id="M'+contMin+'" rows="4" class="col-lg-2 col-sm-2 col-md-2" class="PM">'+v[0][i+2]+'</textarea><button type="button" class="btn btn-danger col-lg-1 col-sm-1 col-md-1" onclick="bot('+contMin+')">X</button></div>';
					contMin++;
		    	}
		    }
		    cont=contMin;
		    //alert(cadA);
		    //var divminimo=document.getElementById("minimos");
		    $("#minimos")[0].innerHTML=cadM;
		    $("#alcance")[0].innerHTML=cadA;
		    
		}
	    });
        
		}
    </script>

</body>
</html>