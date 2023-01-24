
<!-- <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"> -->
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

    <link href="=css/main.css rel =stylesheet">

		<link rel="stylesheet" type="text/css" href="/estilo.css">
		
		<!-- Favicon -->
		<link rel="shortcut icon" href="img/favicon/favicon.png">

       
        
<script type="text/javascript">
  function realizaProceso(valorCaja1){
  var parametros={
      "valorCaja1":valorCaja1
    };
$.ajax({
      data: parametros,
      url: 'ultimo.php',
      type:'post',
      beforeSend: function(){
        $("#NombreTema1").html("Procesandoo")
      },
      success: function(respuesta){
        $("#NombreTema1").html(respuesta);
      }

    });

}



</script>
<script src="js/jquery-2.1.1.min.js"></script>
<script src="js/bootstrap.js"></script>
<style>

.botoon {
        padding:10px;
        background:cyan;
        color:black;
        font:bold 10px;
        width:70px;
        cursor:pointer;
        cursor:hand;
        text-align:center;
    }
    
    #boton1 {
        position:absolute;
        right: 80%;
        
      
        
    }
    
    #boton2 {

        position:absolute;
        right:3%;
        
    }

.divv{
	 position:center;
        
}
.div12{
	position: absolute;
	right: 50%;
}
.div13{
	position: absolute;
	left: 60%;
}

  .seleccionada{
    background: lightskyblue;
    
  }
  .seleccionada2{

  }

.datee {
        width: 100%;
        height: 120px;
        border: 5px color;
        background: no-repeat;
        text-align: left;
        font-size: 14px;
 }

 .border {

  border: 5px color solid;
  background:no-repeat;
  font-size: 14px;
  align-content: center;
  text-align: center;
   color: black;
 }
 .border2 {

  border: 5px color solid;
  background:no-repeat;
  font-size: 14px;
  align-content: center;
  text-align: center;
   color: black;
 }
 .border0 {

  border: none;
  background:no-repeat;
  font-size: 14px;
  align-content: center;
  color: black;
  
 }
 .fondo{
 	background: no-repeat;
 	border-radius: 100px;
 	position: relative;
 }
.bgtd{
  background-color:paleturquoise;
}


</style>   
<script>
  $(document).ready(function(){
    $('#add').click(function(){
      agregar();
    });
    $('#dele').click(function(){
      eliminar(id_fila_selected);
    });
	

  });

  
   
  function seleccionar(id_fila , s){
    conteo = s;

   $('.seleccionada2').removeClass('bgtd');
   $('#'+id_fila).addClass('bgtd');
    id_fila_selected=id_fila;
    alert(conteo);
   }

$(document).ready(function(){

$('.seleccionada2').click(function(){
$('.seleccionada2').removeClass('bgtd');
$(this).addClass('bgtd');
});

});

  

   function enviar(pagina){
document.nombreDelFormulario.action = pagina;
document.nombreDelFormulario.submit();

}

    function plos(valor) {

    var total = 0 ;
      var sum = document.getElementById("tabla");
      var inp =tabla.getElementsByTagName("input");
        for (var i =0; i<inp.length; i++) {
          if(inp[i].value!=""){
       ente = parseInt(inp[i].value);
       total += ente
     }
   }
       document.getElementById('spTotal').innerHTML=total;

}

   


</script> 
<script type="text/javascript" src="/functions.js"></script>   
    </head>  

<body>




<div class="logo">
             <h1> Presidente Académico </h1>
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
  								<div class="col-md-6" >
                        <div class="form-group">
                                            <label class="control-label col-md-10 "><h4>Seleccionar la materia </h4></label>
                              
                        </div> 
                  </div>

 							<!-- Contenido -->
      
<?php
$mysqli = new mysqli('localhost', 'root','','u120726997_base');
?>
                                        <div align="left">
                                                    <form class="form-inline" action="ultimo.PHP" method="POST">
                                                      <div class="form-group mb-2"></div>
                                              <div class="form-group mx-sm-3 mb-2">
                                                        <select class="form-control" name="nombretema" Onchange = "realizaProceso(this.options[this.selectedIndex].innerHTML);">
                                                          <option value="">Seleccione la Asignatura:</option>
<?php
    $query = $mysqli -> query ("SELECT DISTINCT Asignatura FROM listadecotejo");
     while ($valores = mysqli_fetch_array($query)) {
   echo '<option value="'.$valores[id].'">'.$valores[Asignatura].'</option>';
                                                      }
?>
                                                        </select>
                                                         

                                            </div>
                                                    </form>
                                                    

                                                      
                                        </div>
                                                  <!-- Fin Contenido --> 
                                                                            
                                               							<!-- <input type="button" value="Enviar un email" onclick="parent.location='16030600@itesa.edu.mx' "/> -->
                

  
							</div><!--Fin row -->
                     
                     
                     <div class="panel-group" id="accordion">
                         <div class="panel"> 
                        
                                     <div class="panel-heading">
                                               <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                                                <!-- Title. -->
                                               <h5 class="panel-title" >Instrucciones</h5>
                                                </a>
                                     </div>
                         <div id="collapseOne" class="panel-collapse collapse in">
                           <div class="panel-body">
                    
                 
  <form name="nombreDelFormulario" method="post" action="pagw.php">    
                 

                <!-- <input type="submit" value="enviar">  -->
                                              <table>
                                                      <tr >
                                                            <td></td>
                                                            <td>INSTRUCCIONES</td>
                                                            <td></td>
                                                            <td></td>
                                                      </tr>
                                                      <tr>
                                                            <td ></td>
                                                            <td >1.- Primero selecciona la Asignatura a verificar</td>
                                                            <td></td>
                                                            <td></td>
                                                      </tr>
                                                      <tr>
                                                            <td ></td>
                                                            <td >2.- Abrimos la ventana de items y puntaje, es donde se mostraran todos los items y su valor</td>
                                                            <td></td>
                                                            <td></td>
                                                      </tr>
                                                      <tr >
                                                            <td ></td>
                                                            <td >3.Si existe algun detalle hacer clik en declinar para avisar al docente que existio un error, pero si no hay errores hacer click en validar para avisar al Jefe de División que todo esta correcto</td>
                                                            <td></td>
                                                            <td></td>
                                                      </tr>
                                                      <!--<tr >-->
                                                      <!--      <td ></td>-->
                                                      <!--      <td>4.</td>-->
                                                      <!--      <td></td>-->
                                                      <!--      <td></td>-->
                                                      <!--</tr>-->
                                                      <!--<tr >         -->
                                                      <!--      <td ></td>-->
                                                      <!--      <td >5.</td>-->
                                                      <!--      <td></td>-->
                                                      <!--      <td></td>-->
                                                      <!--     </tr>-->
                                                      <!--      <tr >-->
                                                      <!--      <td ></td>-->
                                                      <!--      <td >6.</td>-->
                                                      <!--      <td></td>-->
                                                      <!--      <td></td>-->
                                                      <!--     </tr>-->
                                               </table>
                          </div> 
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
                              
  <label>valida o declina la sita de cotejo</label>
  
  
     <input type="button" class="btn btn-success btn-sm" onclick="enviar('correoP.php')" value="Validar">
   
     <input type="button" class="btn btn-danger btn-sm"  onclick="enviar('correoK.php')"value="Declinar"/> 
     
 

  

                          
  

<tr class="seleccionada2" >
    <td >   <span name="eltexto" id="it1"  class="datee" rows="30" cols="3" id="NombreTema" value="NombreTema">  </span> 
    </td>
   </tr>
   <tr> 
    
    <td>
      <div id="columna" align="center"><h4><span   id="NombreTema1"  value="NombreTema" >Nombre tema</span></h4></div>
    </td>
   
</tr>
    </tbody> 
   </table>
 
  
                           </div>
                         </div>
                       </div>


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
                                         <div class="col-md-3 " ><h4> <span class="color"></span></h4> </div>
                                         <div class="col-md-6 " ><h4> <span class="color">Puntaje total</span></h4></div>
                                           <div class="col-md-3 " ><h4> <span class="color"> </span></h4></div>

                                     </div>
                                 <div class="row">
                                    <div class="col-md-3 "><h4> <span class="color"></span></h4> </div>
                                 </div><!--Fin row -->

                    
<thead>


<table border="2px">
  
<tr>
  <td width="10%" class="col-md-3 azul"  style="color: black" >Puntaje Maximo</td>
  <td width="20%" bgcolor=" lightcyan" style="color: black" > <span id="spTotal2" > 30 </span></td>
  <td width="10%"  class="col-md-3 azul"  style="color: black" >Puntaje Obtenido</td>
  <td width="20%" bgcolor=" lightcyan" style="color: black" > <span id="spTotal" > </span></td>
</tr>

<tr>
  <td colspan="4" width="40%">.</td>


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



                              
                              
              </form>                 
                             <!--Fin contenido -->
                           </div>
                         </div>
                       </div>
                       </thead>
                     </div>
                   </div>
                 </div>
                 
                       <!-- fin acoordeon -->
                       <!-- Twelve accordion -->
                       <!--
                       <form action="firma.php" method="POST" enctype="multipart/form-data">
                  Nombre: <input type="text" name="nombrefirma" value="" required="">
                  <input type="file" name="firmarr" id= "firmarr" required="">
                  <input type="submit" name = "Guardarr"value="Guardar">
                </form>        
                       -->
		
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

    <script src ="js/main.js"></script>

	</body>	
</html>