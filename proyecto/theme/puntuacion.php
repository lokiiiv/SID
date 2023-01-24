<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
		<meta charset="utf-8">
		<!-- Title here -->
		<title>LISTA DE COTEJO</title>
    
		<!-- Description, Keywords and Author -->
		<meta name="description" content="Your description">
		<meta name="keywords" content="Your,Keywords">
		<meta name="author" content="ResponsiveWebInc">
		
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		
		<!-- Styles -->
        
        
		<!-- Bootstrap CSS -->
		<link href="css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
		<!-- Flex Slider CSS -->
		<link href="css/flexslider.css" rel="stylesheet">
		<!-- Pretty Photo -->
		<link href="css/prettyPhoto.css" rel="stylesheet">
		<!-- Font awesome CSS -->
		<link href="css/font-awesome.min.css" rel="stylesheet">		
		<!-- Custom CSS -->
		<link href="css/style_2.css" rel="stylesheet">
		<!-- Color Stylesheet - orange, blue, pink, brown, red or green-->
		<link href="css/blue.css" rel="stylesheet"> 
		
		<!-- Favicon -->
		<link rel="shortcut icon" href="img/favicon/favicon.png">
        
        
<script type="text/javascript">

var mostrarValor = function(x){
            
			
			var el_color="#2d792d";
			if(x==1){
				el_color="#0B3861";
			}else if(x==2){
				var el_color="#0B614B";
			}else if(x==3){
				var el_color="#21610B";
				
			}else if(x==4){
				var el_color="#4B8A08";
				
			}else{
				el_color="#2d792d";
				
			}
			document.getElementById('miColor1').style.backgroundColor = el_color;
			document.getElementById('miColor2').style.backgroundColor = el_color;
			document.getElementById('miColor3').style.backgroundColor = el_color;
			document.getElementById('miColor4').style.backgroundColor = el_color;
			document.getElementById('miColor5').style.backgroundColor = el_color;
			document.getElementById('miColor6').style.backgroundColor = el_color;
			document.getElementById('miColor7').style.backgroundColor = el_color;
			document.getElementById('miColor8').style.backgroundColor = el_color;
 
 
  var valor1=$('#select').val();
  realizaProceso(valor1);
  //ProcesoEA(valor1);
  }
 
function realizaProceso(valorCaja1){//Nombre tema

		var parametros={
			"valorCaja1":valorCaja1
		};
		$.ajax({
			data: parametros,
			url: 'miphp.php',
			type:'post',
			beforeSend: function(){
				$("#NombreTema").html("Procesandoo")
			},
			success: function(respuesta){
				$("#NombreTema").html(respuesta);
			}

		});
		
		$.ajax({
			data: parametros,
			url: '2_miphp_competencia_et',
			type:'post',
			beforeSend: function(){
				$("#etq_espT").html("Procesandoo")
			},
			success: function(respuesta){
				$("#etq_espT").html(respuesta);
			}

		});
		

	}
	


</script>
        
    </head>  

<body>
<!-- Header starts -->
<!--<input type="text" name="comida" id="pruebaR" value="" /> -->

<!-- Content strats -->
<div class="logo">
             <h1><a href="index.html">Lista de cotejo<span class="color">.</span></a></h1>
          </div>

<div class="content">
   <div class="container">
      <div class="row">
         <div class="col-md-12">
            
            <!-- Events starts -->
            
            <div class="events">
               <div class="row">
                  <div class="col-md-12">
                  
                   <!--row -->
                                     <div class="row">
  								<div class="col-md-6 azul" id="columna">
                                <div class="form-group">
                                            <label class="control-label col-md-3" for="select"><h4>Tema</h4></label>
                                            <div class="col-md-9" >                               
                                               <form action="miphp.php" method="POST" >
                                                <select class="form-control color" id="select" name="nombreTema" Onchange = "mostrarValor(this.options[this.selectedIndex].innerHTML);" >
                                                <option>&nbsp;</option>
                                                <option value='1'>1</option>
                                                <option value='2'>2</option>
                                                <option value='3'>3</option>
                                                <option value='4'>4</option>
                                                </select>  
                                                <p id="prueba1"></p>
                                                </form>
                                            </div>
                                          </div> 
                                
                                </div>

 								<div class="col-md-6 azul" id="columna"><h4><span class="color"  id="NombreTema"  value="NombreTema">Introducción a Programación Web</span></h4></div>
                                
   								
  
							</div><!--Fin row -->
                     <!-- Events Accordion Panel -->
                     
                     <div class="panel-group" id="accordion">
                        <!-- Each item should be enclosed inside the class "accordion-group". Note down the below markup. -->
                        
                        <!-- First Accordion -->
                        <!--**************************************************PHP*******************************************************************-->
<?php 
			
try{
		
		$base=new PDO('mysql:host=localhost; dbname=proyecto', 'root', ''); 
		$base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$base->exec("SET CHARACTER SET utf8");
		
		
		$sql="SELECT * FROM instdidactica WHERE id_instDidactica= ? ";
		
		
		$resultado1=$base->prepare($sql);
		$id=1;
		$resultado1->execute(array($id));
		$caracte;
		$intDi;
		$comPre;
		$comEA;
		$comG;
		
		if($registro=$resultado1->fetch(PDO::FETCH_ASSOC)   ){
				
				//echo $registro['competencia_t'];
		$caracte=$registro['caracterizacion'];
		$intDi=$registro['intencionDidactica'];
		$comPre=$registro['competenciasPrevias'];
		$comEA=$registro['competenciaEA'];
		$comG=$registro['competenciaGenerica'];

		}else{
			header('Location: index.html');
		}
		
	
	}catch(Exception $e){
		die ('Error'.$e->GetMessage());
	}
						
 ?>
<!-- ***********************************************fin   PHP****************************************************************-->                                
           
                       <div class="panel">
                         <div class="panel-heading">
                           <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                              <!-- Title. -->
                             <h5 class="panel-title">Instrucciones</h5>
                             
                           </a>
                         </div>
                         <div id="collapseOne" class="panel-collapse collapse in">
                           <div class="panel-body">
                              <!-- Contenido                  -->
                              
                             <div><h4> <span class="color"><form method="post" action = "pro.php"><p align="center"><input type="text" size ="30" name="materia"></form></span></h4></div>


                             <div class="row">
                  <div class="col-md-6 azul" id="columna">
                                <!-- Select box -->
                                          <div class="form-group">
                                           <label class="control-label col-md-3" for="select"><h4><font color ="#RRVAA">Programa Educativo:</h4></label></font>
                                            <div class="col-md-9" >                               
                                                <select class="form-control color" id="select" >
                                                <option>&nbsp;</option>
                                                <option>Ingeniería en Sistemas Computacionales</option>
                                                <option>Ingeniería en Sistemas Automotrices</option>
                                                <option>Ingeniería en Industrias Alimentarias</option>
                                                <option>Ingeniería en Gestión Empresarial</option>
                                                <option>Ingeniería Logística</option>
                                                <option>Ingeniería Mecatrónica</option>
                                                <option>Ingeniería Electromecánica</option>
                                                <option>Ingeniería Civil</option>
                                                <option>Licenciatura en Turismo</option>
                                                <option>Licenciatura en Administración</option>
                                                </select>  
                                            </div>
                                          </div> 
                                </div>
                <div class="col-md-5 azul" id="columna">
                                 <!-- Select box -->
                                       
                             <div class="form-group">
                  <label class="control-label col-md-3" for="select"><h4><font color ="#RRVAA">Semestre: </h4></label></font>
                  
                              <div class="col-md-5" >  
                                 <select class="form-control color" id="select" >
                                            <option>&nbsp;</option>
                                  <option>Primero</option>
                                  <option>Segundo</option>    
                                  <option>Tercero</option>
                                  <option>Cuarto</option>
                                  <option>Quinto</option>
                                  <option>Sexto</option>
                                  <option>Septimo</option>
                                  <option>Octavo</option>
                                    </select>
                                     

                                     </div>
                          </div>
                          </div>
 

  </div>


  <div class="row">
                  <div class="col-md-6 azul" id="columna"><h4><font color ="#RRVAA">Nombre del 
                    docente: <input type="text" size ="37" name="namee"></span></h4> </div>
                  <div class="col-md-6 azul" id="columna"><h4><font color ="#RRVAA">Evidencia: <input type="text" size ="20" name="clave"></span></h4> </div>
                     
              </div><!--Fin row -->
                            <!--row -->
            
                 <div class="row">

                  <div class="col-md-3 azul" id="columna"><h4><font color ="#RRVAA">Nombre del (la) estudiantes o integrantes del equipo
                  <textarea name="comentarios" style="width: 95%; height: 6em"></textarea></span></h4> </div>
                   <div class="col-md-3 azul" id="columna"><h4><font color ="#RRVAA">Competencia del tema:
                  <textarea name="comentarios" style="width: 95%; height: 7em"></textarea></span></h4> </div>
                   <div class="col-md-3 azul" id="columna"><h4><font color ="#RRVAA">Fecha de aplicación:
                  <textarea name="comentarios" style="width: 95%; height: 2em"></textarea></span></h4> </div>
                   <div class="col-md-3 azul" id="columna"><h4><font color ="#RRVAA">Duración:
                  <textarea name="comentarios" style="width: 95%; height: 2em"></textarea></span></h4> </div>

                    
                 
                
              </div><!--Fin row -->

              <div class="row">

                    
                 <div class="col-md-3 azul" id="columna"><h4><font color ="#RRVAA">Intrucciones:<textarea  name="comentarios" style="width: 428%; height: 13em">1.-El docente llenará con la lista de cotejo en función de la calidad del producto entregado por el estudiantes (es).   

2.-Se marca con una "x" si cumplió o no con el criterio.

3.-Se llenará el apartado de "Puntos totales" con los puntos que considere corresponden con la calidad del producto.

4.-El puntaje máximo de la evaluación es de: 

5.-Para que el estudiante sea evaluado en los indicadore B,D,F deberá cumplir con los indicadores M(mínimos).

6.-Realizar la sumatoria.
                 </textarea></span></h4> </div>
                
              </div><!--Fin row -->
  
            
                            <!--row -->
                          


            
                                <!-- Select box -->
                                          
                                
  
              
                            <!-- Fin Contenido                  -->
                           </div>
                         </div>
                       </div>
                       
                    
            
     

                       
                       <!-- Seven accordion -->
                       <div class="panel">
                         <div class="panel-heading">
                           <a data-toggle="collapse" data-parent="#accordion" href="#collapseSeven">
                             <h5 class="panel-title " id="miColor2">Ítems y puntaje</h5>
                           </a>
                         </div>
                         <div id="collapseSeven" class="panel-collapse collapse">
                           <div class="panel-body">
                              
                             
  <table class="table table-hover">
    <thead>
      <tr>
        <th> <h3> No.</h3></th>
        <th> <h3>Ítem </h3></th>
        <th> <h3> Valor</h3></th>
        <th> <h3>Indicador</h3></th>
        <th> <h3> Si</h3></th>
        <th> <h3>No </h3></th>
        <th> <h3> Observación</h3></th>
        
        <td><?php include 'Modales/modal_Co.php'; ?></td>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>1</td>
         <td>Cumple en tiempo</td>
         <td>7</td>
         <td>M</td>
         <td>X</td>
         <td> </td>
         <td> Good</td>
         
         <td><button type="button" class="btn btn-danger btn-sm" style="margin-left:10px">

      <span class="glyphicon glyphicon-remove"></span>
    </button></td>
      
      <tr>
        <td>2</td>
         <td>Incluye citas.</td>
         <td>8</td>
         <td>M</td>
         <td> </td>
         <td> X </td>
         <td> </td>
         
         <td><button type="button" class="btn btn-danger btn-sm" style="margin-left:10px">
          
      <span class="glyphicon glyphicon-remove"></span>
    </button></td>
     
     <tr>
        <td>3</td>
         <td>Añade temas extras.</td>
         <td>6</td>
         <td>M</td>
         <td>X</td>
         <td> </td>
         <td> </td>
         
         <td><button type="button" class="btn btn-danger btn-sm" style="margin-left:10px">
          
      <span class="glyphicon glyphicon-remove"></span>
    </button></td>
    </tbody>
  </table>
  
                           </div>
                         </div>
                       </div><!-- fin acoordeon -->
                       <!-- Eight accordion -->
                                    <div class="panel">
                         <div class="panel-heading">
                           <a data-toggle="collapse" data-parent="#accordion" href="#collapseEleven">
                             <h5 class="panel-title" id="miColor6">Puntaje final y firmas</h5>
                           </a>
                         </div>
                         <div id="collapseEleven" class="panel-collapse collapse">
                           <div class="panel-body">
                              
                              
                              <!-- Contenido                  -->

                                 <!--row -->
                                 <div class="row">
                     <div class="col-md-3 azul" id="columna"><h4> <span class="color"></span></h4> </div>
                     <div class="col-md-6 azul" id="columna"><h4> <span class="color">Puntaje total</span></h4></div>
                       <div class="col-md-3 azul" id="columna"><h4> <span class="color"> </span></h4></div>

                 </div><!--Fin row -->
                                <!--row -->
                                 <div class="row">
                     <div class="col-md-3 azul" id="columna"><h4> <span class="color"></span></h4> </div>
                        </div><!--Fin row -->

                        <table class="table table-hover">
<thead>


<table border="2px">
  
<tr>
  <td width="10%" class="col-md-3 azul"  style="color: black" >Puntaje Maximo</td>
  <td width="20%" bgcolor=" lightcyan" style="color: black" > <input type="text" name="valor" size="30"style="background: transparent; border-top:none; text-align: center;" ></td>
  <td width="10%"  class="col-md-3 azul"  style="color: black" >Puntaje Obtenido</td>
  <td width="40%" bgcolor=" lightcyan">      </td>
</tr>

<tr>
  <td colspan="4" width="40%">. </td>


</tr>

</table>






<table border="2px">
            <tr>
                <td rowspan="2" width="20%" bgcolor=" lightcyan" style="color: black" >Evidencia de Aprendizaje</td>
                <td rowspan="2" width="10%" bgcolor=" lightcyan" style="color: black" >%</td>
                <td colspan="6" width="40%" bgcolor=" lightcyan" style="color: black" >Indicadores de alcance</td>
                <td colspan="4" width="35%" bgcolor=" lightcyan" style="color: black" >Metodos de Evaluación</td>
                
            </tr>
            <tr>
                <td bgcolor=" lightcyan" style="color: black" > A </td>
                <td bgcolor=" lightcyan" style="color: black" > B </td>
                <td bgcolor=" lightcyan" style="color: black" > C </td>
                <td bgcolor=" lightcyan" style="color: black" > D </td>
                <td bgcolor=" lightcyan" style="color: black" > E </td>
                <TD bgcolor=" lightcyan" style="color: black" > F </TD>
                <td width="10%" bgcolor=" lightcyan" style="color: black" >Instrumento</td>
                <td width="5%" bgcolor=" lightcyan" style="color: black"> P </td>
                <td width="5%" bgcolor=" lightcyan"> C </td>
                <TD width="10%" bgcolor=" lightcyan"> A </TD>

            </tr>
            <tr>
                <td> Mapa Conceptual </td>
                <td style="color: #DC143C"> 30 </td>
                <td ><input type="text" name="B" size="1" style="background: transparent;border-top-style: none; text-align: center;"> </td>
                <td style="color: #DC143C"> 3 </td>
                <td><input type="text" name="D" size="1" style="background: transparent;border-top-style: none; text-align: center;"> </td>
                <td style="color: #DC143C"> 4 </td>
                <td><input type="text" name="E" size="1" style="background: transparent;border-top-style: none; text-align: center;"></td>
                <TD style="color: #DC143C"> 2 </TD>
                <td>Lista de Cotejo</td>
                <td style="color: #DC143C"> X </td>
                <TD style="color: #DC143C"> X </TD>
        <TD style="color: #DC143C"> X </TD>
            </tr>
        </table>
<table >
<td colspan="4">. </td>
<td colspan="4">. </td>
</table>

<table >
  
<td width="60%" bgcolor=" lightcyan" style="color: black" align="left"> Nombre y Firma del Docente </td>
<td> <input type="text" name="Docente" size="30" style="background: transparent;border-top-style: none; text-align: center;"></td>
<tr>
<td bgcolor=" lightcyan" style="color: black" align="left">Nombre y Firma del Alumno </td> 
<td><input type="text" name="Alumno" size="30" style="background: transparent;border-top-style: none; text-align: center;"></td>
</tr> 
</table>


</tbody>
</table>

                              
                              
                              
                              
                              <!--Fin contenido -->
                           </div>
                         </div>
                       </div><!-- fin acoordeon -->
                       <!-- Twelve accordion -->
                       
		
		<!-- Scroll to top -->
		<span class="totop"><a href="#"><i class="fa fa-angle-up"></i></a></span> 
			
		<!-- Javascript files -->
		<!-- jQuery -->
		<script src="js/jquery.js"></script>
		<!-- Bootstrap JS -->
		<script src="js/bootstrap.min.js"></script>
		<!-- Isotope, Pretty Photo JS -->
		<script src="js/jquery.isotope.js"></script>
		<script src="js/jquery.prettyPhoto.js"></script>
		<!-- Support Page Filter JS -->
		<script src="js/filter.js"></script>
		<!-- Flex slider JS -->
		<script src="js/jquery.flexslider-min.js"></script>
		<!-- Respond JS for IE8 -->
		<script src="js/respond.min.js"></script>
		<!-- HTML5 Support for IE -->
		<script src="js/html5shiv.js"></script>
		<!-- Custom JS -->
		<script src="js/custom.js"></script>
	</body>	
</html>