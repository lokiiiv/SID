<?php 	
	//session_start();
	$_SESSION['cm']="2232";//clave docente o matrícula alumno
	$_SESSION['tipo']="docente";
 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<title>FAC-14</title>
	<meta name="HandheldFriendly" content="true" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">	
	<style type="text/css">
	.ce{
		text-align: center;
	}
	.gris{
		 background-color:#f0f0ee;
	}
	.azul{
		background-color: #c4d9ed;
	}
	.t10{
		font-size: 9px;
	}

	.t13{
		font-size: 12px;	
	}

	.bordedb{
		border-bottom: solid;
		border-color: black;
		border.height: .5px;
	}
	.bordetodo{
		border: solid;
		border-color: white;
		
	}
	.cajasEIDAR{
		border-color: black;
		border-style: solid;
		border-bottom-style: dotted;

	}
	.cajasEIDAB{
		border-color: black;
		border-style: solid;
		border-top-style: none;		
	}
	.cajasSolid{
		border-style: solid;
		border-color: black;
	}
	.cajasDoted{
		border-style: solid;
		border-color: black;
		border-width: 1px;
	}
</style>


<script type="text/javascript">
	var firmaf="no";
</script>

<style type="text/css">
	#firmar, #firmarprimera, #firmar2, #firmar3{

		border-width: 3px;
  		border-style: solid;
		animation-duration: 1s;
  		animation-name: animafirmar;
  		animation-iteration-count: infinite;
  		animation-direction: alternate;
	}
	@keyframes animafirmar {
	  from {
	    border-color: red;
	    
	  }

	  to {
	    border-color:  yellow;
	    
	  }
	}


</style>

<?php 
	if (isset($_GET["grupo"])) {
		$GRUPA=substr($_GET["grupo"],0,3);//iniciales del grupo
		//echo $GRUPA;
	}else{
		echo '<h1>Grupo no existe</h1>';

	}





	$PE="";
	$PES="ISIC-2010-224";
	$NT="5";
	$CRED="2-3-5";
	$CA="SCD-1008";
	$NA=$_GET["as"];;
	$SE="PRIMERO";
	$grupp=explode(",",$_GET["grupo"]);


	$CG[0]="XXXXX";
	$CG[1]="XXXXX";
	$CG[2]="XXXXX";
	$CG[3]="XXXXX";
	$texto="";
	$texto2="";
	for($i=0;$i<count($grupp);$i++){
		$CG[$i]=$grupp[$i];

		$texto=$texto."<div><label onclick='cambia1(this)'>".$CG[$i]."</label> / <label onclick='cambia1(this)'>Tema 1</label> </div>";
		$texto2=$texto2."<div><label onclick='cambia1(this)'>100</label><label>%</label></div>";
	}


	$PER=$_GET["p"];
	//session_start();
	$ND=$_SESSION['nombreCompleto'];



	for ($i=0; $i <18 ; $i++) { 
		// code...
		$VTP[$i]="ED Ef1 SD";
	}
	


	$FEN="26-ago-2022";
	$FS1="16 septiembre 2022";

	$VTFR[0]="2F21/Tema 1";
	$VTFR[1]="2F21/Tema 2";

	$VPCFR[0]="100%";
	$VPCFR[1]="100%";
	
	$MESUNOSEGUIMIENTO="16 septiembre 2022";
	$MESDOSSEGUIMIENTO="14 octubre 2022";
	$MESTRESSEGUIMIENTO="18 noviembre 2022";
	$MESCUATROSEGUIMIENTO="16 diciembre 2022";
	
	$MATRICULA="031303182";


	/*
		Validando las fechas para firmar 

		

	*/

	require_once("../../CRUD/class/Consultas.php");
	//$tipo=$_SESSION['tipo'];
         //require_once("../../../CRUD/class/Consultas.php");
    $usuarios = Usuarios::singleton();

    $revision = $PER;

    $data = $usuarios->getFechasRevision($revision);

    for ($j=0; $j <18 ; $j++) { 
    	$vtablat[$j]="";
    }

    $datos=array();
    $cont=0;
    foreach ($data as $revi) {
        $temp=array();
        $temp[0]=$revi["periodo"];
        $temp[1]=$revi["revision"];
        $temp[2]=$revi["fecha_inicio"];
        $temp[3]=$revi["fecha_termino"];
        $datos[$cont]=$temp;
        $cont++;
    }


    $_POST['accion']="getseguimientophp";
    $_POST['grupo']=$_GET["grupo"];
    $_POST['periodo']=$PER;

    //el resultado se accede con variable $docente
    require_once("conexion/consultasNoSQL.php");
    $ff1d='';
    $ff2d='';
    $ff3d='';
    $ff4d='';
    $ff5d='';
    $fff5d='';
    $banf1=false;
	$banf2=false;
	$banf3=false;
	$banf4=false;
	$banf5=false;
	$agregafrt1d="";
	$agregafrt2d="";
	$agregafrt3d="";
	$agregafrt4d="";
	$agregafrt5d="";
	$agregafrtp1d="";
	$agregafrtp2d="";
	$agregafrtp3d="";
	$agregafrtp4d="";
	$agregafrtp5d="";
	$ff1c='';
	$ff2c='';
	$ff3c='';
	$ff4c='';
	$ff5c='';
	$fff5c='';
	$fc1c='';
	$fc2c='';
	$fc3c='';
	$fc4c='';
	$fc5c='';
    if (isset($a)) {
    	// code...
    	$b=json_decode($a);
    	$var = get_object_vars($b);
    	//print_r($var[1]->docente->fecha);
    	//echo count($var);
    	for ($i=1; $i <= count($var); $i++) { 
    		//echo $i;
    		$posp=$i;
			if ($i==5) {
				$posp="f";
				//echo "si";
			}
			//echo $posp;

    		if (isset($var[$posp]->docente)) {
    			//$f=$var[2]->docente->fecha;
    			$ff=$var[$posp]->docente->firma;
    			if(isset($var[$posp]->docente->rf->firmaf)){
    				$fff=$var[$posp]->docente->rf->firmaf;
    				$fff5d='<img id="" src="fac14/firmas/'.$fff.'" style="width:50px !important;">';
    			}
    			
    			if (isset($var[$posp]->docente->calendario)) {
    				$calendariog=$var[$posp]->docente->calendario;
    				//echo count($calendariog);
    				
    				for ($j=0; $j < count($calendariog); $j++) { 
    					$ttht= $calendariog[$j][0];
    					$ttit= $calendariog[$j][1];
    					$vtablat[$ttit]=$ttht;
    					//echo " -posicion:".$ttit." dato:". $vtablat[$ttit];
    				}
    				//echo "-".count($calendariog)."-";
    			}
    			//echo $ff;
    			$s="";
    			if (isset($var[$posp]->docente->seguimiento)) {
    				// code...
    				$s=$var[$posp]->docente->seguimiento;

    			}
    			
    			//en la siguiente instrucción se genera de manera dinámica
    			//la variable y lo permiten las llaves
    			//echo $ff;
    			${"ff" . $i."d"}='<img id="" src="fac14/firmas/'.$ff.'" style="width:50px !important;">';
    			if ($i=="f"){ 
	    			echo '<script>firmaf="si";</script>';
	    			
	    		}
    			if ($i==1) {
    				${"ff" . $i."d"}='<img id="" src="fac14/firmas/'.$ff.'" style="height:50px !important;">';
    			}		
    			 
    			//echo ${"ff" . $i."d"};

    			${"agregafrt" . $i."d"}="";
    			${"agregafrtp" . $i."d"}="";
    			//echo $s[0][0]; //grupo
    			//echo $s[0][1]; //Tema
    			//echo $s[0][2]; //porcentage
    			//echo "-".count($s)."-";
    			if (isset($s[0][0])) {    				
    				//echo $s[0][1];
    				//echo "-".count($s)."-";
    				${"banf".$i}=true;
    				//echo ${"banf".$i}."-si". $i;
					for ($j=0; $j < count($s); $j++) { 
    					${"agregafrt" . $i."d"}=${"agregafrt" . $i."d"}."<div><div><label>".$s[$j][0]."</label> / <label>".$s[$j][1]."</label> </div></div>";
    					${"agregafrtp" . $i."d"}=${"agregafrtp" . $i."d"}."<div><label>".$s[$j][2]."</label><label>%</label></div>";
    				}
    				//echo ${"agregafrt" . $i."d"};

    			}
    			//print_r( $f); 
    		}
    		if (isset($var[$posp]->coordinador->firma)) {
    			//echo $i;
    			if ($i=="5"){ 
    				//echo $i;
	    			echo '<script>firmaf="si";</script>';
	    			
	    			
	    		}
    			$ffttc=$var[$posp]->coordinador->firma;
    			//echo "-".$ffttc.$i."-";
    			${"ff".$i."c"}='<img id="" src="fac14/firmas/'.$ffttc.'" style="width:50px !important;">';
    			$comentariod=$var[$posp]->coordinador->comentario;
    			//echo $comentariod;
    			if ($comentariod!="") {
	    			${"fc".$i."c"}="<label style='font-size:8px;'>Coordinador: </label>".$comentariod;
	    		}


    		}
    		if (isset($var[$posp]->coordinador->rf->firmaf)) {
    			$ffttc=$var[$posp]->coordinador->rf->firmaf;
    			//echo "-".$ffttc.$i."-";
    			${"fff".$i."c"}='<img id="" src="fac14/firmas/'.$ffttc.'" style="width:50px !important;">';
    		}
    		//echo "</br>";
    		// code...
    	}
    	//echo $ff1d;
    	//print_r($var[2]);
    }
    
	//echo "si".$fff5d;   	
   	//print_r($a);
	
	//print_r("---------------------");
	


    //print_r($b);
    //echo $a->{"coordinador->fecha"};

    //echo count($datos);
    $FEN=$datos[0][3];
    $MESUNOSEGUIMIENTO=$datos[1][3];
	$MESDOSSEGUIMIENTO=$datos[2][3];
	$MESTRESSEGUIMIENTO=$datos[3][3];
	$MESCUATROSEGUIMIENTO=$datos[4][3];
	//Variables de seguimiento de la instrumentación
	//agregafrt3d para temas de revisión 1F22/Tema 1
	//ff1d  ff1c mano para firma por tema el número indica el tema
	//banf1  son las banderas por tema para ver si aparece o no el agregar temas de la variable agregafrt3d

	if($ff1d=="") $ff1d="";
	//$ff1c="<br><br><br>";
	 //echo $ff2d;
	if($ff2d=="") $ff2d="";
	//$ff2c="<br><br><br>";
	//$agregafrt2d="";
	
	if($ff3d=="") $ff3d="";
	//$ff3c="<br><br><br>";
	//$agregafrt3d="";
	
	if($ff4d=="") $ff4d="";
	//$ff4c="<br><br><br>";
	//$agregafrt4d="";
	
	if($ff5d==""){ $ff5d="";$fff5c="";}
	//$ff5c="<br><br><br>";
	//$agregafrt5d="";

	
	$nseguimiento="";
	date_default_timezone_set('MST');//GMT 
	$hoy = date("Y-n-j");
	$fecha_actual = strtotime(date($hoy));//la que se utilizará
	$_SESSION['tipo']="coordinador";//comentar cuando ya no se esté probando
	/////PRIMERA 
	if (strtotime($datos[0][2])<=$fecha_actual && $fecha_actual<=strtotime($datos[0][3])) {
		$banf1=true;
		$nseguimiento="1";
		//echo "Dentro Intervalo uno";
		if($_SESSION['tipo']=="docente"){
			//echo "-".$ff1d."-";
			if ($ff1d=="") {
				//echo "sidd";
			$ff1d='<img id="firmarprimera" src="fac14/firmas/firma.png" style="height:50px !important;">';
		}
		
		}
		if($_SESSION['tipo']=="alumno"){

		}
		if($_SESSION['tipo']=="coordinador"){
			//$ff1c; 
			if ($ff1c=="") {
				$ff1c='<img id="firmar2" src="fac14/firmas/firma.png" style="width:50px !important;">';
			}
		}	

		// code...
	}
	//echo $ff2d;
	////////SEGUNDA 
	if (strtotime($datos[1][2])<=$fecha_actual && $fecha_actual<=strtotime($datos[1][3])) {
		$nseguimiento="2";
		//echo "Dentro Intervalo dos";
		$banf2=true;
		if($_SESSION['tipo']=="docente"){			

			if ($ff2d=="") 
				$ff2d='<img id="firmar" src="fac14/firmas/firma.png" style="height:50px !important;">';
			if ($agregafrt2d=="") 
				$agregafrt2d="<div>".$texto."</div><button onclick='agregando(this)' class='btn btn-success'>+</button>";//para agregar en temas en revisión del seguimiento uno

		}
		if($_SESSION['tipo']=="alumno"){

		}
		if($_SESSION['tipo']=="coordinador"){
			if ($ff2c=="") {
				$ff2c='<img id="firmar2" src="fac14/firmas/firma.png" style="width:50px !important;">';
			}
		}

		// code...
	}
	if (strtotime($datos[2][2])<=$fecha_actual && $fecha_actual<=strtotime($datos[2][3])) {
		//echo "Dentro Intervalo tres";
		$banf3=true;
		$nseguimiento="3";
		if($_SESSION['tipo']=="docente"){
			if ($ff3d=="") $ff3d='<img id="firmar" src="fac14/firmas/firma.png" style="height:50px !important;">';
			if ($agregafrt3d=="") 
				$agregafrt3d="<div>".$texto."</div><button onclick='agregando(this)' class='btn btn-success'>+</button>";//para agregar en temas en revisión del seguimiento uno

		}
		if($_SESSION['tipo']=="alumno"){

		}
		if($_SESSION['tipo']=="coordinador"){
			if ($ff3c=="") {
				$ff3c='<img id="firmar2" src="fac14/firmas/firma.png" style="width:50px !important;">';
			}
		}

		// code...
	}
	if (strtotime($datos[3][2])<=$fecha_actual && $fecha_actual<=strtotime($datos[3][3])) {
		$banf4=true;
		$nseguimiento="4";
		if($_SESSION['tipo']=="docente"){
			if ($ff4d=="") $ff4d='<img id="firmar" src="fac14/firmas/firma.png" style="height:50px !important;">';
			if ($agregafrt4d=="") 
				$agregafrt4d="<div>".$texto."</div><button onclick='agregando(this)' class='btn btn-success'>+</button>";//para agregar en temas en revisión del seguimiento uno

		}
		if($_SESSION['tipo']=="alumno"){

		}
		if($_SESSION['tipo']=="coordinador"){
			if ($ff4c=="") {
				$ff4c='<img id="firmar2" src="fac14/firmas/firma.png" style="width:50px !important;">';
			}
		}
		// code...
	}
	if (strtotime($datos[4][2])<=$fecha_actual && $fecha_actual<=strtotime($datos[4][3])) {
		$banf5=true;
		$nseguimiento="f";
		//echo "ok".$banf5;
		if($_SESSION['tipo']=="docente"){
			if ($ff5d==""){ $ff5d='<img id="firmar" src="fac14/firmas/firma.png" style="width:50px !important;">';
			}
			if ($fff5d=="") {
				$fff5d='<img id="firmar3" src="fac14/firmas/firma.png" style="width:50px !important;">';	
			}
			if ($agregafrt5d=="") 
				$agregafrt5d="<div>".$texto."</div><button onclick='agregando(this)' class='btn btn-success'>+</button>";//para agregar en temas en revisión del seguimiento uno

		}
		if($_SESSION['tipo']=="alumno"){

		}
		if($_SESSION['tipo']=="coordinador"){
			if ($ff5c=="") {
				$ff5c='<img id="firmar2" src="fac14/firmas/firma.png" style="width:50px !important;">';						
			}
			if ($fff5c=="") {
				$fff5c='<img id="firmar3" src="fac14/firmas/firma.png" style="width:50px !important;">';

			}
		}
		// code...
	}
	//echo $fecha_actual." ".$fecha_entrada;
	//if($fecha_actual < $fecha_entrada){
	//	echo "iguales";
	//}

 ?>

</head>
<body>
	<br><br>
	





	<div class="container">
		
		<?php
			include_once("encabezado.php");
			include_once("calendarizacion.php");
			include_once("entregainstrumentacion.php");
			include_once("seguimientodepartamental.php");
		?>


	</div> 

	



	
	<br><br><br><br><br><br>

	


	<script type="text/javascript" src="js/jquery.js"></script>

	
	<script type="text/javascript">
		var grupo="<?php echo $_GET["grupo"]; ?>";
		var periodo="<?php echo $_GET["p"]; ?>";
		var gred=grupo.substring(0,3);
		var fechas=new Array();
		//alert(gred);
		var parametros={
          "accion":"obtenerCampos",
          "grupo":grupo,
          "periodo":periodo
        };
        
        $.ajax({
        	async:false,
          	data: parametros,
          	url: 'conexion/consultasNoSQL.php',
          	type:'post',
          	beforeSend: function(){
            //$("#).html("Guardando..");
        	},
        	success: function(x){
            	//alert(x);
            	x = JSON.parse(x);
				let tote=x['totalTemas'];
				//alert(x['PE']);
				$("#PEH")[0].innerHTML=x['PE'];
				$("#PLEH")[0].innerHTML=x['PlanEstudios'];

				//alert(x['Materia']);
				$("#NAH")[0].innerHTML=x['Materia'];
				$("#CLAH")[0].innerHTML=x['ClaveAsignatura'];
				$("#CREDH")[0].innerHTML=x['Creditos'];
				$("#NUTH")[0].innerHTML=x['totalTemas'];
				$("#SEH")[0].innerHTML=x['Semestre'];
				$("#FORH")[0].innerHTML=x['Documento'];
				$("#CLAIH")[0].innerHTML=x['Clausula'];
				$("#REVH")[0].innerHTML=x['Revision'];
				$("#RESPOH")[0].innerHTML=x['Responsable'];
				$("#FEEH")[0].innerHTML=x['FechaEmision'];
				$("#CODDH")[0].innerHTML=x['CodigoDocumento'];
				//$("#PERH")[0].innerHTML=x['C'];
				//alert(tote+5);
				
				for (var i = 1; i <=parseInt(tote); i++) {
					var tema=i;
					//alert(tema);
					var parametros={
			          "accion":"obtenerTemas",
			          "tema":tema,
			          "grupo":grupo,
			          "periodo":periodo
			        };
			        $.ajax({
			        	async:false,
          				data: parametros,
			          	url: 'conexion/consultasNoSQL.php',
			          	type:'post',
			          	beforeSend: function(){
			            	//$("#).html("Guardando..");
			          	},
			          	success: function(x){
			            	//alert("ok");
			            	x = JSON.parse(x);
			            	//alert(x);
			            	let sem=x[tema]["Semanas"];
			            	//alert(sem);
			            	let se = Object.values(sem);
			            	for (var i = 0; i <se[0].length; i++) {
			            		if (se[0][i]!="") {
			            			fechas[i]=se[0][i];
			            		}
			            	}			            	
			            }
        
					});
				}
				
        	}
    	});
    	for (var i = 0; i <fechas.length; i++) {
    		if (fechas[i]!=undefined) 
    			document.getElementById("S"+i).innerHTML=fechas[i];
    		else
    			document.getElementById("S"+i).innerHTML="";
    	}
    	//alert("ok");
    	parametros={
    		"accion":"buscarfechasrevision",
    		"periodo":"<?php echo $PER; ?>"
    	};
    	/*
    	//consulta de las fechas de revisión
    	$.ajax({
        	async:false,
          	data: parametros,
          	url: 'conexion/consultasSQL.php',
          	type:'post',
          	beforeSend: function(){
            //$("#).html("Guardando..");
        	},
        	success: function(x){
            	var content=JSON.parse(x);       

            	if (!(content[0]===undefined) && content[0][1]=="primera")
            		$("#mesuno")[0].innerHTML=content[0][3];
            	else
            		$("#mesuno")[0].innerHTML="";
            	if (!(content[1]===undefined)  && content[1][1]=="segunda") 
            		$("#mesdos")[0].innerHTML=content[1][3];
            	else
            		$("#mesdos")[0].innerHTML="";
            	if (!(content[2]===undefined)  && content[2][1]=="tercera")
            		$("#mestres")[0].innerHTML=content[2][3];
            	else
            		$("#mestres")[0].innerHTML="";
            	if (!(content[3]===undefined)  && content[3][1]=="cuarta")
            		$("#mescuatro")[0].innerHTML=content[3][3];
            	else
            		$("#mescuatro")[0].innerHTML="";
            	if (!(content[4]===undefined)  && content[4][1]=="quinta")
            		$("#mescinco")[0].innerHTML=content[4][3];
            	else
            		$("#mescinco")[0].innerHTML="";
            	//obteniendo fecha hoy
            	let date = new Date();
            	const anio=date.getFullYear();
            	const mes=date.getMonth()+1; //devuelve de 0 a 11 por eso +1
            	const dia=date.getDate();
            	
            	//se convierten a días transcurridos hasta hoy
            	let fhoy=Date.parse(anio+"-"+mes+"-"+dia);           

            	//habilita primera revisión
            	const fi1=Date.parse(content[0][2]);
            	const ff1=Date.parse(content[0][3]);            	
            	$("#primerafirmadoc").css("visibility","hidden");
            	$("#primerafirmacor").css("visibility","hidden");
            	if (fhoy>=fi1 && fhoy<=ff1) {
            		<?php if ($_SESSION['tipo']=="docente") {
            		?>
            		$("#primerafirmadoc").css("visibility","visible");
            		$("#primerafirmadoc").attr('id', 'firmar');

            		<?php 
            		}else if($_SESSION['tipo']=="coordinador"){
            		 ?>
            		 $("#primerafirmacor").css("visibility","visible");	 
            		 $("#primerafirmacor").attr('id', 'firmar');
            		<?php 
            		} ?>
            		
            	}
            	//se compara si es la fecha
            	//const a=aaa>=fhoy;
            	//alert(a);


			}
		});

		*/


        //alert(fechas.length);

		
        //alert("ok");
        
        //alert("si");

	</script>


	<script type="text/javascript">
		var ban=false;
		$("#firmar3").click(function(){
			var v=$(this);
			
			//alert(firmaf);
			if (typeof firmaf != 'undefined') {
				if (firmaf=="no") {
					alertify.alert("<h3>Primero firme el seguimiento</h3>");
				}else{
					alertify.confirm("<h3>Confirme que desea firmar para concluir con el seguimiento de este semestre</h3>",function(){
							var tipo="docente";
							if ("<?php echo $_SESSION['tipo'] ?>"=="coordinador") {
									tipo="coordinador";
									//comentario=;
							}

					//alert("si");

							$.post("fac14/operacionesfirma.php",{operacion:"existe"},function(resp){		
								//alert(resp);
								var clave="<?php echo $_SESSION['cm']; ?>";
								var firma=resp;
								let date = new Date();
	            				const anio=date.getFullYear();
	            				const mes=date.getMonth()+1; //devuelve de 0 a 11 por eso +1
	            				const dia=date.getDate();
	            	
	            	
	            				var fecha=anio+"-"+mes+"-"+dia;
	            				var para={			
									"firmaf":firma
								};
								var paraf={
									"firmf":para
								};
								var para2={
									"<?php echo $nseguimiento; ?>":paraf
								};
								//alert(tipo);
								var para3={
									"datos":para,
									"nseg":"<?php echo $nseguimiento; ?>",
									"tipo":tipo,
									"accion":"guardarseguimientof",
									"grupo":"<?php echo $_GET["grupo"]; ?>",
									"periodo":"<?php echo $_GET["p"]; ?>"	
								};
								//alert("ok");

								$.ajax({
									data:para3,								
									async:false,
									url:'conexion/consultasNoSQL.php',
									type:'post',
									success:function(resp){
										//alert(resp);
										alertify.success("Se guardó con éxito los cambios");
										v.attr("src","fac14/firmas/"+firma);
										v.attr("id","none");
									}
								});

								
							});

						},function(){
						
					});
				}
			}else{
				alertify.error("<h3>Primero debe firmar el seguimiento</h3>");
			}
		});
		$("#firmarprimera").click(function(){
			if (ban==false) {
				var v=$(this);
				//alert("si");

				$.post("fac14/operacionesfirma.php",{operacion:"existe"},function(resp){
					//alert(resp);
					if (resp=="") {//abrir apartado para subir firma
						var win = window.open("fac14/subirfirma.php", '_blank');
	        			// Cambiar el foco al nuevo tab (punto opcional)
	        			win.focus();
					}else{//ya existe y se puede firmar
						//alert("fac14/firmas/"+resp);
						//alert (v[0].previousElementSibling.getElementsByTagName("div")[0].getElementsByTagName("label")[0].innerHTML);
						

						
						alertify.confirm("<h4>SISTEMA DE INSTRUMENTACIONES<h4>","<h2>Deseas firmar el formato FAC-14</h2>, <h3>considere que estos cambios se harán permanentes en la base de datos</h3>",function(){
							v.attr("src","fac14/firmas/"+resp);
							v.attr("id","none");

							var comentario="";					

							ban=true;
							<?php if ($_SESSION['tipo']=="coordinador")
							{
								echo '
								alertify.prompt("<h4>En caso de tener algún comentario, favor de ingresarlo</h4>", "",function(evt, value) {
										document.getElementById("comentarioJD'.$nseguimiento.'").innerHTML=value;';
								echo 'comentario=value;';
							
							} ?>
							
							var tipo="";
							var clave="<?php echo $_SESSION['cm']; ?>";
							var firma=resp;
							let date = new Date();
            				const anio=date.getFullYear();
            				const mes=date.getMonth()+1; //devuelve de 0 a 11 por eso +1
            				const dia=date.getDate();
            	
            	
            				var fecha=anio+"-"+mes+"-"+dia;
							
							var gppp=new Array();

							if ("<?php echo $_SESSION['tipo'] ?>"=="docente") {
								tipo="docente";
								//alert("si");
								gppp.push("");
								

								//alert(gppp.length);

							}
							//alert("si");
							if ("<?php echo $_SESSION['tipo'] ?>"=="coordinador") {
								tipo="coordinador";
								//comentario=;
							}
							//alert(gppp[0]["grupo"]);
							var para={								
								"fecha":fecha,
								"clave":clave,
								"firma":firma,
								"comentario":comentario,
								"seguimiento":gppp
							};
							
							var para2={
								"<?php echo $nseguimiento; ?>":para
							};
							//alert(tipo);
							var para3={
								"datos":para,
								"nseg":"<?php echo $nseguimiento; ?>",
								"tipo":tipo,
								"accion":"guardarseguimiento",
								"grupo":"<?php echo $_GET["grupo"]; ?>",
								"periodo":"<?php echo $_GET["p"]; ?>"	
							};
							//alert("ok");

							$.ajax({
								data:para3,								
								async:false,
								url:'conexion/consultasNoSQL.php',
								type:'post',
								success:function(resp){
									//alert(resp);
									alertify.success("Se guardó con éxito los cambios");
								}
							});

							<?php if ($_SESSION['tipo']=="coordinador") 
							{
								echo '});';
							}?>
							//alert("ok2");
						},function(){});
						
					}
				});
			}
		});
		
		var bcalendario=true;//falso si no he elegido una fecha
		$("#firmar").click(function(){
			//alert("si");
			if (ban==false) {
				var v=$(this);
				//alert("si");

				$.post("fac14/operacionesfirma.php",{operacion:"existe"},function(resp){
					//alert(resp);
					if (resp=="") {//abrir apartado para subir firma
						var win = window.open("fac14/subirfirma.php", '_blank');
	        			// Cambiar el foco al nuevo tab (punto opcional)
	        			win.focus();
					}else{//ya existe y se puede firmar
						//alert("fac14/firmas/"+resp);
						//alert (v[0].previousElementSibling.getElementsByTagName("div")[0].getElementsByTagName("label")[0].innerHTML);
						
						var respimg=resp;
						
						alertify.confirm("<h4>SISTEMA DE INSTRUMENTACIONES<h4>","<h2>Deseas firmar el formato FAC-14</h2>, <h3>¿Ya colocó los temas de revisión y el porcentaje de avance?<br> ¿Ya eligió en el calendario las fechas?<br>además considere que estos cambios se harán permanentes en la base de datos</h3>",function(){
							

							var comentario="";					
							
							
							<?php if ($_SESSION['tipo']=="coordinador")
							{
								echo '
								alertify.prompt("<h4>En caso de tener algún comentario, favor de ingresarlo</h4>", "",function(evt, value) {
										document.getElementById("comentarioJD'.$nseguimiento.'").innerHTML=value;';
								echo 'comentario=value;';
								echo 'calfech1="";';
							
							} ?>
							
							var tipo="";
							var clave="<?php echo $_SESSION['cm']; ?>";
							var firma=resp;
							let date = new Date();
            				const anio=date.getFullYear();
            				const mes=date.getMonth()+1; //devuelve de 0 a 11 por eso +1
            				const dia=date.getDate();
            	
            	
            				var fecha=anio+"-"+mes+"-"+dia;
							
							var gppp=new Array();
							
							if ("<?php echo $_SESSION['tipo'] ?>"=="docente") {
								tipo="docente";
								var calfech=new Array();
								//alert("si");
								var ggg=v[0].parentNode.previousElementSibling.getElementsByTagName("div")[0].getElementsByTagName("label");

								var ppp=v[0].previousElementSibling.getElementsByTagName("label");
								
														
								var tabla=document.getElementsByClassName("tablacalendario");
								//var bantb=true;
								var iniciocalendario=19;
								var fincalendario=-1;
								
								//alert(iniciocalendario);
								for (var i = 0; i <=17; i++) {
									//alert($(tabla[i])[0].style.color=="red");
									if (tabla[i].innerHTML==document.getElementById("S"+i).innerHTML && $(tabla[i])[0].style.color=="red") {
										//alert("si"+i);
										if (iniciocalendario>i) {
											iniciocalendario=i;
										}
										fincalendario=i;
										//alert("si");
									}
									
								}
								//alert(iniciocalendario+" "+fincalendario);
								if (iniciocalendario>fincalendario) {
									alertify.error("<h2>verifique que haya elegido fechas en el calendario</h2>");
									return;	
								}
								for (var i = iniciocalendario; i <=fincalendario; i++) {
									if (tabla[i].innerHTML!=document.getElementById("S"+i).innerHTML) {
										alertify.error("<h2>verifique que la calendarización elegida sea correcta, tal vez falta completar las fechas por elegir</h2>");
										//alert(iniciocalendario+" "+fincalendario);
										return "invalido";
									}
									
									if (tabla[i].style.color=="red") {
										var calfech1=new Array();
										calfech1.push(tabla[i].innerHTML);
										calfech1.push(i);
										calfech.push(calfech1);
										//alert(tabla[i].innerHTML);
									}
									//alert(tabla[i].style.color);
								}
								//alert(calfech.length);
								if (ppp.length==0) {
									ppp=v[0].parentNode.getElementsByTagName("label");
									//alert(ppp[0].innerHTML);
										
								}
								for (var i = 0; i <ppp.length; i+=2) {
									var ppp1=new Array();
									ppp1.push(ggg[i].innerHTML);
									
									ppp1.push(ggg[i+1].innerHTML);							
									ppp1.push(ppp[i].innerHTML);
									//alert(ppp1["grupo"]+" "+ppp1["tema"]+" "+ppp1["porcentaje"]);					
									gppp.push(ppp1);
								}
								
								//alert(gppp.length);

							}
							//alert("si");
							if ("<?php echo $_SESSION['tipo'] ?>"=="coordinador") {
								tipo="coordinador";
								gppp.push("");
								//comentario=;
							}
							//alert(gppp[0]["grupo"]);
							var para={								
								"fecha":fecha,
								"clave":clave,
								"firma":firma,
								"comentario":comentario,
								"seguimiento":gppp,
								"calendario":calfech
							};
							
							var para2={
								"<?php echo $nseguimiento; ?>":para
							};
							//alert(tipo);
							var para3={
								"datos":para,
								"nseg":"<?php echo $nseguimiento; ?>",
								"tipo":tipo,
								"accion":"guardarseguimiento",
								"grupo":"<?php echo $_GET["grupo"]; ?>",
								"periodo":"<?php echo $_GET["p"]; ?>"	
							};
							//alert("ok");

							$.ajax({
								data:para3,								
								async:false,
								url:'conexion/consultasNoSQL.php',
								type:'post',
								success:function(resp){
									//alert(resp);
									alertify.success("Se guardó con éxito los cambios");
									if (firmaf!=undefined) {
										firmaf="si";
									}
									v.attr("src","fac14/firmas/"+respimg);
							v.attr("id","none");
							ban=true;
								}
							});

							<?php if ($_SESSION['tipo']=="coordinador") 
							{
								echo '});';
							}?>
							//alert("ok2");
						},function(){});
						
					}
				});
			}
		});
		


		$("#firmar2").click(function(){
			//alert("si");
			if (ban==false) {
				var v=$(this);
				//alert("si");

				$.post("fac14/operacionesfirma.php",{operacion:"existe"},function(resp){
					//alert(resp);
					if (resp=="") {//abrir apartado para subir firma
						var win = window.open("fac14/subirfirma.php", '_blank');
	        			// Cambiar el foco al nuevo tab (punto opcional)
	        			win.focus();
					}else{//ya existe y se puede firmar
						//alert("fac14/firmas/"+resp);
						//alert (v[0].previousElementSibling.getElementsByTagName("div")[0].getElementsByTagName("label")[0].innerHTML);
						
						var respimg=resp;
						
						alertify.confirm("<h4>SISTEMA DE INSTRUMENTACIONES<h4>","<h2>Deseas firmar el formato FAC-14</h2>, <h3>Considere que estos cambios se harán permanentes en la base de datos</h3>",function(){
							

							var comentario="";					
							
							
							<?php if ($_SESSION['tipo']=="coordinador")
							{
								echo '
								alertify.prompt("<h4>En caso de tener algún comentario, favor de ingresarlo</h4>", "",function(evt, value) {
										document.getElementById("comentarioJD'.$nseguimiento.'").innerHTML=value;';
								echo 'comentario=value;';
								echo 'calfech1="";';
							
							} ?>
							
							var tipo="";
							var clave="<?php echo $_SESSION['cm']; ?>";
							var firma=resp;
							let date = new Date();
            				const anio=date.getFullYear();
            				const mes=date.getMonth()+1; //devuelve de 0 a 11 por eso +1
            				const dia=date.getDate();
            	
            	
            				var fecha=anio+"-"+mes+"-"+dia;
							
							var gppp=new Array();
							
							if ("<?php echo $_SESSION['tipo'] ?>"=="docente") {
								tipo="docente";
								var calfech=new Array();
								//alert("si");
								var ggg=v[0].parentNode.previousElementSibling.getElementsByTagName("div")[0].getElementsByTagName("label");

								var ppp=v[0].previousElementSibling.getElementsByTagName("label");
								
														
								var tabla=document.getElementsByClassName("tablacalendario");
								//var bantb=true;
								var iniciocalendario=19;
								var fincalendario=-1;
								
								//alert(iniciocalendario);
								for (var i = 0; i <=17; i++) {
									//alert($(tabla[i])[0].style.color=="red");
									if (tabla[i].innerHTML==document.getElementById("S"+i).innerHTML && $(tabla[i])[0].style.color=="red") {
										//alert("si"+i);
										if (iniciocalendario>i) {
											iniciocalendario=i;
										}
										fincalendario=i;
										//alert("si");
									}
									
								}
								//alert(iniciocalendario+" "+fincalendario);
								if (iniciocalendario>fincalendario) {
									alertify.error("<h2>verifique que haya elegido fechas en el calendario</h2>");
									return;	
								}
								for (var i = iniciocalendario; i <=fincalendario; i++) {
									if (tabla[i].innerHTML!=document.getElementById("S"+i).innerHTML) {
										alertify.error("<h2>verifique que la calendarización elegida sea correcta, tal vez falta completar las fechas por elegir</h2>");
										//alert(iniciocalendario+" "+fincalendario);
										return "invalido";
									}
									
									if (tabla[i].style.color=="red") {
										var calfech1=new Array();
										calfech1.push(tabla[i].innerHTML);
										calfech1.push(i);
										calfech.push(calfech1);
										//alert(tabla[i].innerHTML);
									}
									//alert(tabla[i].style.color);
								}
								//alert(calfech.length);
								if (ppp.length==0) {
									ppp=v[0].parentNode.getElementsByTagName("label");
									//alert(ppp[0].innerHTML);
										
								}
								for (var i = 0; i <ppp.length; i+=2) {
									var ppp1=new Array();
									ppp1.push(ggg[i].innerHTML);
									
									ppp1.push(ggg[i+1].innerHTML);							
									ppp1.push(ppp[i].innerHTML);
									//alert(ppp1["grupo"]+" "+ppp1["tema"]+" "+ppp1["porcentaje"]);					
									gppp.push(ppp1);
								}
								
								//alert(gppp.length);

							}
							//alert("si");
							if ("<?php echo $_SESSION['tipo'] ?>"=="coordinador") {
								tipo="coordinador";
								gppp.push("");
								//comentario=;
							}
							//alert(gppp[0]["grupo"]);
							var para={								
								"fecha":fecha,
								"clave":clave,
								"firma":firma,
								"comentario":comentario,
								"seguimiento":gppp,
								"calendario":calfech
							};
							
							var para2={
								"<?php echo $nseguimiento; ?>":para
							};
							//alert(tipo);
							var para3={
								"datos":para,
								"nseg":"<?php echo $nseguimiento; ?>",
								"tipo":tipo,
								"accion":"guardarseguimiento",
								"grupo":"<?php echo $_GET["grupo"]; ?>",
								"periodo":"<?php echo $_GET["p"]; ?>"	
							};
							//alert("ok");

							$.ajax({
								data:para3,								
								async:false,
								url:'conexion/consultasNoSQL.php',
								type:'post',
								success:function(resp){
									//alert(resp);
									alertify.success("Se guardó con éxito los cambios");
									v.attr("src","fac14/firmas/"+respimg);
							v.attr("id","none");
							ban=true;
								}
							});

							<?php if ($_SESSION['tipo']=="coordinador") 
							{
								echo '});';
							}?>
							//alert("ok2");
						},function(){});
						
					}
				});
			}
		});

	</script>

	<script type="text/javascript">
      function agregando(b){
        //alert("<?php echo $texto; ?>");
        alertify.confirm("Confirme que deseas agregar otra revisión",function(){
        	$(b.previousElementSibling).append("<?php echo $texto; ?>");
        	$(b.parentNode.parentNode.parentNode.nextElementSibling.getElementsByTagName("div")[0]).append("<?php echo $texto2; ?>");
        	//alert("ok");
        },function(){

        });
        
        
      }
      function cambia1(labe){
        alertify.prompt("Modifique lo siguiente",labe.innerHTML,function(evt,data){
        	labe.innerHTML=data;
        });
      }
      function quita(b){
        b.parentNode.remove();
        alert("koko");
      }
    </script>
	<script type="text/javascript">
		$("#atrseg").click(function(){
			//alert("ok");

			//$(this).style.visibility="visible";
		});
		


	</script>
	<link rel="stylesheet" type="text/css" href="alertify/css/alertify.css">
	<script type="text/javascript" src="alertify/alertify.js"></script>
</body>
</html>
