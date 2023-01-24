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
 	//echo $A;
 	$INDALC='<select  onchange="cambioInd(this)" class="form-control"><option value=""></option>';
 	if ($A!="0" && $A!="") {
 		$INDALC=$INDALC.'<option value="A">A</option>';
 	}
 	if ($B!="0" && $B!="") {
 		$INDALC=$INDALC.'<option value="B">B</option>';	
 	}
 	if ($C!="0" && $C!="") {
 		$INDALC=$INDALC.'<option value="C">C</option>';
 	}
 	if ($D!="0" && $D!="") {
 		$INDALC=$INDALC.'<option value="D">D</option>';
 	}
 	if ($E!="0" && $E!="") {
 		$INDALC=$INDALC.'<option value="E">E</option>';
 	}
 	if ($F!="0" && $F!="") {
 		$INDALC=$INDALC.'<option value="F">F</option>';
 	}

 	$INDALC=$INDALC."</select>";
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


						<div >
							<br>
							
							<div>
								<input name="archivo" type="file" id="aex" class="col-md-6 col-xs-6 col-sm-6 col-lg-6">
								<input type="button" id="leerexcel" class="btn btn-success " style="margin:0 auto;" value="Leer Excel">
							</div>




							<br><br><br>
												
							<div class="row">
								<div class="form-group">
									<div class="col-md-11 col-xs-11 col-sm-11 col-lg-11">
										<h3>Preguntas de relacionar</h3>
									</div>
									<div class="col-md-1 col-xs-1 col-sm-1 col-lg-1">
										<button id="agregar" type="button" class="btn btn-primary">
							    			<span class="glyphicon glyphicon-plus"></span>	
							    		</button>
							    	</div>
								</div>
							</div>
							<div class="row">
								<div class="form-group">
									<div class="col-md-4 col-xs-4 col-sm-4 col-lg-4">Pregunta</div>
									<div class="col-md-3 col-xs-3 col-sm-3 col-lg-3">Respuesta</div>
									<div class="col-md-2 col-xs-2 col-sm-2 col-lg-2">Puntaje</div>
									<div class="col-md-2 col-xs-2 col-sm-2 col-lg-2">indicador</div>
									<div class="col-md-1 col-xs-1 col-sm-1 col-lg-1"></div>
								</div>
							</div>
							<div class="row" id="minimos">
								
							</div>


							<br><br><br>
												
							<div class="row">
								<div class="form-group">
									<div class="col-md-12 col-xs-12 col-sm-12 col-lg-12">
										<h3>Preguntas de subrayar</h3>
									</div>
									
								</div>
								
									<div class="col-md-5 col-xs-5 col-sm-5 col-lg-5">
										Ingrese el número máximo de respuestas
									</div>
									<div class="col-md-2 col-xs-2 col-sm-2 col-lg-2">
										<input id="mps"	type="number" class="" min="2" max="6">
									</div>
									<div class="col-md-4 col-xs-4 col-sm-4 col-lg-4">
									</div>
									<div class="col-md-1 col-xs-1 col-sm-1 col-lg-1">
									<button id="agregar2" type="button" class="btn btn-primary">
							    			<span class="glyphicon glyphicon-plus"></span>	
							    	</button>
							    	</div>
								</div>
							
							<div class="row" id="minimos2">
								
							</div>




							<br><br><br>
												
							<div class="row">
								<div class="form-group">
									<div class="col-md-11 col-xs-11 col-sm-11 col-lg-11">
										<h3>Preguntas de verdadero-falso</h3>
									</div>
									<div class="col-md-1 col-xs-1 col-sm-1 col-lg-1">
										<button id="agregar3" type="button" class="btn btn-primary">
							    			<span class="glyphicon glyphicon-plus"></span>	
							    		</button>
							    	</div>
								</div>
							</div>
							<div class="row">
								<div class="form-group">
									<div class="col-md-4 col-xs-4 col-sm-4 col-lg-4">Pregunta</div>
									<div class="col-md-3 col-xs-3 col-sm-3 col-lg-3">Falso|Verdadero</div>
									<div class="col-md-2 col-xs-2 col-sm-2 col-lg-2">Puntaje</div>
									<div class="col-md-2 col-xs-2 col-sm-2 col-lg-2">indicador</div>
									<div class="col-md-1 col-xs-1 col-sm-1 col-lg-1"></div>
								</div>
							</div>
							<div class="row" id="minimos3">
								
							</div>

</div>
						</div>

					</div>	

					<br><br>
					
					
				</div>
 			</div>
 		</div>
 	</div>

 	<script>
		
		function funckp(evento,tag){
			if (evento.which==38){
				var a=tag.parentNode.parentNode.previousSibling.getElementsByTagName("input");
				if (typeof a[0] !== 'undefined') {
					var temp=tag.value;
					tag.value=a[1].value;
					a[1].value=temp;
					a[1].focus();
				}
			}if(evento.which==40){
				var a=tag.parentNode.parentNode.nextSibling.getElementsByTagName("input");
				if (typeof a[0] !== 'undefined') {
					var temp=tag.value;
					tag.value=a[1].value;
					a[1].value=temp;
					a[1].focus();
				}
			//alert(a[0].value);
			}
		}
	

	</script>
	<script>
		$("#agregar").click(function(){
			var botoncerrar='<div class="col-lg-1 col-sm-1 col-md-1"><button type="button" class="btn btn-danger" onclick="botonecr(this)"><span class="glyphicon glyphicon-remove"></span></button></div>';
			var texto2='<?php echo $INDALC; ?>';
			var texto='<div class="form-group"><div class="col-lg-4 col-sm-4 col-md-4"><input class="form-control"></div><div class="col-lg-3 col-sm-3 col-md-3"><input  onkeyup="funckp(event,this)"  class="form-control"></div><div class="col-lg-2 col-sm-2 col-md-2"><input  type="number"  class="form-control"></div><div class="col-lg-2 col-sm-2 col-md-2">'+texto2+'</div>'+botoncerrar+'</div>';
			$("#minimos").append(texto);
			

		});
		
		$("#agregar2").click(function(){
			if ($("#mps")[0].value=="" || $("#mps")[0].value=="0") {
				alertify.error("<h3 style='color:white'>Ingrese el número de respuestas </h3>",4);
			}else{
				var texto3='<div  class="col-lg-12 col-sm-12 col-md-12" > Ingrese las respuetas y elija la o las respuestas correctas</div>';
				var n=$("#mps")[0].value;

				var cal=12/n;
				if (n==5) {cal=2;}
				$("#mps")[0].disabled=true;
				var botoncerrar='<div class="col-lg-1 col-sm-1 col-md-1"><button type="button" class="btn btn-danger" onclick="botonecs(this)"><span class="glyphicon glyphicon-remove"></span></button></div>';
				for (var i = 0; i < n; i++) {
					texto3=texto3+'<div class="col-lg-'+cal+' col-sm-'+cal+' col-md-'+cal+'"><input placeholder="Respuesta '+(i+1)+'" class="form-control"><input type="checkbox"></div>';
				}
				var texto2='<div class="col-lg-2 col-sm-2 col-md-2"><?php echo $INDALC; ?></div>';
				var texto='<div class="form-group" style="padding-top:10px;padding-bottom:10px;"><hr style="height:1px; width: 100%; border-style:dotted;  background-color: black;">'+
								'<div class="col-lg-11 col-sm-11 col-md-11">'+
									'Ingrese la pregunta, el puntaje y en caso de que sea de alcance, elija tipo de indicador</div>'+botoncerrar+'<div class="col-lg-7 col-sm-7 col-md-7"><input placeholder="Ingrese la pregunta" class="form-control">'+
								'</div>'+'<div class="col-lg-3 col-sm-3 col-md-3"><input placeholder="Ingrese puntaje" type="number" class="form-control"></div>'+

								texto2+texto3
							'</div>';
				$("#minimos2").append(texto);
			}

		});

		
		$("#agregar3").click(function(){
			var botoncerrar='<div class="col-lg-1 col-sm-1 col-md-1"><button type="button" class="btn btn-danger" onclick="botonecfv(this)"><span class="glyphicon glyphicon-remove"></span></button></div>';
			var fv='<select class="form-control"><option selected>V</option><option>F</option></select>';
			var texto2='<?php echo $INDALC; ?>';
			var texto='<div class="form-group"><div class="col-lg-4 col-sm-4 col-md-4"><input class="form-control"></div><div class="col-lg-3 col-sm-3 col-md-3">'+fv+'</div><div class="col-lg-2 col-sm-2 col-md-2"><input  type="number"  class="form-control"></div><div class="col-lg-2 col-sm-2 col-md-2">'+texto2+'</div>'+botoncerrar+'</div>';
			$("#minimos3").append(texto);
			

		});

	</script>
	
	<script>
		function botonecs(c){
			var a=c.parentNode.parentNode.parentNode.getElementsByTagName("div");
			//alert(a.length);
			if (a.length<=13) {//alert("ok");
				$("#mps")[0].disabled=false;
				//alert("ok");
			}
			c.parentNode.parentNode.remove();

		}
		function botonecr(c){
			c.parentNode.parentNode.remove();
		}
		function botonecfv(c){
			c.parentNode.parentNode.remove();
		}
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

        /*alert(cual);
        alert(evidencia);
        alert(instrumento);
        alert(periodo);
        alert(grupo);
        alert(tem);*/
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
	      	var prel=v[0][2];
	      	var texto="";

	      	for (var ii = 0; ii < prel.length; ii++) {
	      		var prel2=prel[ii];

	      		//for (var j = 0; j < prel2.length; j++) {
	      			//texto=texto+prel2[j];
	      		var p=prel2[0];
	      		var r=prel2[1];
	      		var v2=prel2[2];
	      		var i=prel2[3];
	      		var botoncerrar='<div class="col-lg-1 col-sm-1 col-md-1"><button type="button" class="btn btn-danger" onclick="botonecr(this)"><span class="glyphicon glyphicon-remove"></span></button></div>';
	      		var textoind= indicadoresselect(i);
				var texto2=textoind;
				var texto='<div class="form-group"><div class="col-lg-4 col-sm-4 col-md-4"><input title="'+p+'" class="form-control" value="'+p+'"></div><div class="col-lg-3 col-sm-3 col-md-3"><input  onkeyup="funckp(event,this)" class="form-control"  value="'+r+'"></div><div class="col-lg-2 col-sm-2 col-md-2"><input  class="form-control" type="number" value="'+v2+'"></div><div class="col-lg-2 col-sm-2 col-md-2">'+texto2+'</div>'+botoncerrar+'</div>';
				$("#minimos").append(texto);



				//alert(prel.length+i);


	      		//}
	      	}
	      	
	      	//////////////////////////////////////////////////////////////////////////
	      	
	      	prel=v[0][3];//tipos pregunta dos
	      	var texto="";
	      	//alert(prel.length);
	      	var contps=0;
	      	for (var ii = 0; ii < prel.length; ii++) {
	      		var pregs=prel[ii][0];
	      		contps++;
	      		//alert(ii);
	      		//alert(pregs.length+" "+((pregs.length-3)/2));
	      		var pr=pregs[0];
	      		var punr=pregs[1];
	      		var i=pregs[pregs.length-1];
	      		var textoind= indicadoresselect(i);
	      		var vecesr=(pregs.length-3)/2;
	      		$("#mps")[0].value=vecesr;

      			var texto3='<div  class="col-lg-12 col-sm-12 col-md-12" > Ingrese las respuetas y elija la o las respuestas correctas</div>';
				var n=vecesr;
				var cal=12/n;
				if (n==5) {cal=2;}
				$("#mps")[0].disabled=true;
				var botoncerrar='<div class="col-lg-1 col-sm-1 col-md-1"><button type="button" class="btn btn-danger" onclick="botonecs(this)"><span class="glyphicon glyphicon-remove"></span></button></div>';


	      		for (var j = 2; j < pregs.length-1; j+=2) {
	      			var r1=pregs[j];
	      			var h1=pregs[j+1];
	      			var h11="";
	      			//alert(h1);
	      			if (h1=="true") {h11="checked";}

	      			texto3=texto3+'<div class="col-lg-'+cal+' col-sm-'+cal+' col-md-'+cal+'"><input placeholder="Respuesta '+(i+1)+'" value="'+r1+'" class="form-control"><input type="checkbox" '+h11+'></div>';
				


	      		}
				var texto2='<div class="col-lg-2 col-sm-2 col-md-2">'+textoind+'</div>';
				var texto='<div class="form-group" style="padding-top:10px;padding-bottom:10px;"><hr style="height:1px; width: 100%; border-style:dotted;  background-color: black;">'+
								'<div class="col-lg-11 col-sm-11 col-md-11">'+
									'Ingrese la pregunta, el puntaje y en caso de que sea de alcance, elija tipo de indicador</div>'+botoncerrar+'<div class="col-lg-7 col-sm-7 col-md-7"><input  title="'+pr+'" placeholder="Ingrese la pregunta" value="'+pr+'" class="form-control">'+
								'</div>'+'<div class="col-lg-3 col-sm-3 col-md-3"><input placeholder="Ingrese puntaje" type="number" value="'+punr+'" class="form-control"></div>'+

								texto2+texto3
							'</div>';
				$("#minimos2").append(texto);
			
	      	}
	      		
	      	/////////////////////////////7777
	      	
	      	prel=v[0][4];//tipos pregunta dos
	      	var texto="";
	      	for (var ii = 0; ii < prel.length; ii++) {
	      		var prel2=prel[ii];

	      		//for (var j = 0; j < prel2.length; j++) {
	      			//texto=texto+prel2[j];
	      		var p=prel2[0];
	      		var vf=prel2[1];
	      		var pfv=prel2[2];
	      		var i=prel2[3];
	      		var fv=falsoverdaderopreg(vf);
	      		var textoind= indicadoresselect(i);
	      		var botoncerrar='<div class="col-lg-1 col-sm-1 col-md-1"><button type="button" class="btn btn-danger" onclick="botonecfv(this)"><span class="glyphicon glyphicon-remove"></span></button></div>';
				
				var texto2=textoind;
				var texto='<div class="form-group"><div class="col-lg-4 col-sm-4 col-md-4"><input class="form-control"  title="'+p+'" value="'+p+'"></div><div class="col-lg-3 col-sm-3 col-md-3">'+fv+'</div><div class="col-lg-2 col-sm-2 col-md-2"><input  type="number"  class="form-control"  value="'+pfv+'"></div><div class="col-lg-2 col-sm-2 col-md-2">'+texto2+'</div>'+botoncerrar+'</div>';
				$("#minimos3").append(texto);

	      	}//fin for de las preguntas tres







	      
		}
	    });
	        
	    function falsoverdaderopreg(i){
	    	var textoind='<select class="form-control">';
	    	//var ti="";
	    	if (i=="V") {
	    		textoind=textoind+'<option selected>V</option><option>F</option></select>';
	    	}else{
	    		textoind=textoind+'<option>V</option><option selected>F</option></select>';
	    	}
	    	return textoind;
	    }


	    function cambioInd(va){
	    	var v=va.value;
	    	//alert(v);
	    	var val="";
	    	if (v=="A") val="<?php echo $A; ?>";
	    	if (v=="B") val="<?php echo $B; ?>";
	    	if (v=="C") val="<?php echo $C; ?>";
	    	if (v=="D") val="<?php echo $D; ?>";
	    	if (v=="E") val="<?php echo $E; ?>";
	    	if (v=="F") val="<?php echo $F; ?>";
	    	//va.previuosElementSibling;
	    	var selects=document.getElementsByTagName("select");
	    	var contselA=0,contselB=0,contselC=0,contselD=0,contselE=0,contselF=0;
	    	for (var i = 0; i < selects.length; i++) {
	    		if(selects[i].value=="A"){
	    			contselA++;
	    		}
	    		if(selects[i].value=="B"){
	    			contselB++;
	    		}
	    		if(selects[i].value=="C"){
	    			contselC++;
	    		}
	    		if(selects[i].value=="D"){
	    			contselD++;
	    		}
	    		if(selects[i].value=="E"){
	    			contselE++;
	    		}
	    		if(selects[i].value=="F"){
	    			contselF++;
	    		}
	    	}
	    	if(contselA>1 || contselB>1 || contselC>1  || contselD>1  || contselE>1  || contselF>1 ){
	    		alertify.error("Ya no puedes elegir indicador "+va.value);
	    		va.value="";
	    	}else{
	    		//alert(val);
	    		va.parentNode.parentNode.querySelectorAll("input[type='number']")[0].value=val;	
	    	}
	    	


	    }


        function indicadoresselect(i){
        	var textoind='<select onchange="cambioInd(this)" class="form-control"><option value=""></option>';
	      		var ti="";
	      		<?php
	      			if ($A!="0" && $A!="") {
	      		?>
	      		if (i=="A") {ti="selected";}
	      		textoind=textoind+'<option value="A" '+ti+'>A</option>';
	      		ti="";
	      		<?php
	      			}
	      		?>
	      		<?php
	      			if ($B!="0" && $B!="") {
	      		?>
	      		if (i=="B") {ti="selected";}
	      		textoind=textoind+'<option value="B" '+ti+'>B</option>';
	      		ti="";
	      		<?php
	      			}
	      		?>
	      		<?php
	      			if ($C!="0" && $C!="") {
	      		?>
	      		if (i=="C") {ti="selected";}
	      		textoind=textoind+'<option value="C" '+ti+'>C</option>';
	      		ti="";
	      		<?php
	      			}
	      		?>
	      		<?php
	      			if ($D!="0" && $D!="") {
	      		?>
	      		if (i=="D") {ti="selected";}
	      		textoind=textoind+'<option value="D" '+ti+'>D</option>';
	      		ti="";
	      		<?php
	      			}
	      		?>
	      		<?php
	      			if ($E!="0" && $E!="") {
	      		?>
	      		if (i=="E") {ti="selected";}
	      		textoind=textoind+'<option value="E" '+ti+'>E</option>';
	      		ti="";
	      		<?php
	      			}
	      		?>
	      		<?php
	      			if ($F!="0" && $F!="") {
	      		?>
	      		if (i=="F") {ti="selected";}
	      		textoind=textoind+'<option value="F" '+ti+'>F</option>';
	      		ti="";
	      		<?php
	      			}
	      		?>
	      		textoind=textoind+'</select>';
	      		return textoind;
        }

		
	</script>

	<script>
		$("#leerexcel").click(function(data){
			//alert("ok");
			var $inputarchivo=document.querySelector("#aex");	
			var archivosubir=$inputarchivo.files[0];
			//alert("lk");
			var formdata=new FormData();
			formdata.append("archivo",archivosubir);
			//alert("ok1");
			const respuesta = fetch("instrumentos/cuestionario/subeexcel.php",{
				method:"POST",
				body : formdata,
			}).then(function(response){
				//alert("ok");
				$.post("instrumentos/cuestionario/leeexcelA.php",{ia:'<?php echo $INDALC;?>'},function(values)	{
					var v=values.split("**********");
					//alert(v.length);
					$("#minimos")[0].innerHTML=v[0];
					$("#minimos2")[0].innerHTML=v[1];
					$("#minimos3")[0].innerHTML=v[2];
					//alert(v[3]);
					$("#mps")[0].value=v[3];
					$("#mps")[0].disabled=true;
				});

			});
			

			
			
			//$.post("leeexcel.php",function(datas){
				//alert(datas);
			

			$inputarchivo.value=null;
			//contar();
		});

		
	</script>
	<script>
		$("#ElegirExistente").click(function(event) {
			//alert("ok");

			var parametros = {
              "accion":"trinstrumentosHec",
              "instru":"Cuestionario"
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
    									
    									if (ins=="Cuestionario") {
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
       /*alert(cual);
        alert(evidencia);
        alert(instrumento);
        alert(periodo);
        alert(grupo);
        alert(tem);*/
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
	      //alert(parametros);  
	    $.post("conexion/consultasNoSQL.php",parametros,function(x){
	    	//alert(x);
	    	if (x!="") {
	    		//alert("ok");
	      		v = JSON.parse(x);
				$("#minimos").empty();
				$("#minimos2").empty();
				$("#minimos3").empty();
	      	 
	      		//alert(v);
	      		//alert(v[0][0]);
	      		
	      		//alert(instrumento+(cual-2));
	      		var cadA="";
	      		var cadM="";
	      		var fa=v[0][0];//fecha aplicación

	      		var te=v[0][1];//tiempo de evaluación
	      		//alert(te);
	      		document.getElementById("fa").value=fa;
          		document.getElementById("te").value=te;
	      		var contMin=0;
	      		var prel=v[0][2];
	      		var texto="";

	      		for (var ii = 0; ii < prel.length; ii++) {
	      			var prel2=prel[ii];

	      			//for (var j = 0; j < prel2.length; j++) {
	      			//texto=texto+prel2[j];
	      			var p=prel2[0];
	      			var r=prel2[1];
	      			var v2=prel2[2];
	      			var i=prel2[3];
	      			var botoncerrar='<div class="col-lg-1 col-sm-1 col-md-1"><button type="button" class="btn btn-danger" onclick="botonecr(this)"><span class="glyphicon glyphicon-remove"></span></button></div>';
	      			var textoind= indicadoresselect(i);
					var texto2=textoind;
					var texto='<div class="form-group"><div class="col-lg-4 col-sm-4 col-md-4"><input title="'+p+'" class="form-control" value="'+p+'"></div><div class="col-lg-3 col-sm-3 col-md-3"><input  onkeyup="funckp(event,this)" class="form-control"  value="'+r+'"></div><div class="col-lg-2 col-sm-2 col-md-2"><input  class="form-control" type="number" value="'+v2+'"></div><div class="col-lg-2 col-sm-2 col-md-2">'+texto2+'</div>'+botoncerrar+'</div>';
					
					$("#minimos").append(texto);


				}
				//alert(prel.length+i);


	      		//}
	      	
	      	
	      		//////////////////////////////////////////////////////////////////////////
	      	
	      		prel=v[0][3];//tipos pregunta dos
	      		var texto="";
	      		//alert(prel.length);
	      		var contps=0;
	      		for (var ii = 0; ii < prel.length; ii++) {
		      		var pregs=prel[ii][0];
		      		contps++;
		      		//alert(ii);
		      		//alert(pregs.length+" "+((pregs.length-3)/2));
		      		var pr=pregs[0];
		      		var punr=pregs[1];
		      		var i=pregs[pregs.length-1];
		      		var textoind= indicadoresselect(i);
		      		var vecesr=(pregs.length-3)/2;
		      		$("#mps")[0].value=vecesr;

	      			var texto3='<div  class="col-lg-12 col-sm-12 col-md-12" > Ingrese las respuetas y elija la o las respuestas correctas</div>';
					var n=vecesr;
					var cal=12/n;
					if (n==5) {cal=2;}
					$("#mps")[0].disabled=true;
					var botoncerrar='<div class="col-lg-1 col-sm-1 col-md-1"><button type="button" class="btn btn-danger" onclick="botonecs(this)"><span class="glyphicon glyphicon-remove"></span></button></div>';


	      			for (var j = 2; j < pregs.length-1; j+=2) {
		      			var r1=pregs[j];
		      			var h1=pregs[j+1];
		      			var h11="";
		      			//alert(h1);
		      			if (h1=="true") {h11="checked";}

		      			texto3=texto3+'<div class="col-lg-'+cal+' col-sm-'+cal+' col-md-'+cal+'"><input placeholder="Respuesta '+(i+1)+'" value="'+r1+'" class="form-control"><input type="checkbox" '+h11+'></div>';
					


		      		}
					var texto2='<div class="col-lg-2 col-sm-2 col-md-2">'+textoind+'</div>';
					var texto='<div class="form-group" style="padding-top:10px;padding-bottom:10px;"><hr style="height:1px; width: 100%; border-style:dotted;  background-color: black;">'+
								'<div class="col-lg-11 col-sm-11 col-md-11">'+
									'Ingrese la pregunta, el puntaje y en caso de que sea de alcance, elija tipo de indicador</div>'+botoncerrar+'<div class="col-lg-7 col-sm-7 col-md-7"><input  title="'+pr+'" placeholder="Ingrese la pregunta" value="'+pr+'" class="form-control">'+
								'</div>'+'<div class="col-lg-3 col-sm-3 col-md-3"><input placeholder="Ingrese puntaje" type="number" value="'+punr+'" class="form-control"></div>'+

								texto2+texto3
							'</div>';
					$("#minimos2").append(texto);
			
	      		}
	      		
	      	/////////////////////////////7777
	      	
		      	prel=v[0][4];//tipos pregunta dos
		      	var texto="";
		      	for (var ii = 0; ii < prel.length; ii++) {
		      		var prel2=prel[ii];

		      		//for (var j = 0; j < prel2.length; j++) {
		      			//texto=texto+prel2[j];
		      		var p=prel2[0];
		      		var vf=prel2[1];
		      		var pfv=prel2[2];
		      		var i=prel2[3];
		      		var fv=falsoverdaderopreg(vf);
		      		var textoind= indicadoresselect(i);
		      		var botoncerrar='<div class="col-lg-1 col-sm-1 col-md-1"><button type="button" class="btn btn-danger" onclick="botonecfv(this)"><span class="glyphicon glyphicon-remove"></span></button></div>';
					
					var texto2=textoind;
					var texto='<div class="form-group"><div class="col-lg-4 col-sm-4 col-md-4"><input class="form-control"  title="'+p+'" value="'+p+'"></div><div class="col-lg-3 col-sm-3 col-md-3">'+fv+'</div><div class="col-lg-2 col-sm-2 col-md-2"><input  type="number"  class="form-control"  value="'+pfv+'"></div><div class="col-lg-2 col-sm-2 col-md-2">'+texto2+'</div>'+botoncerrar+'</div>';
					$("#minimos3").append(texto);

		      	}//fin for de las preguntas tres

		    }





	      
		
	    });
		
		}
	</script>

	
</body>
</html>