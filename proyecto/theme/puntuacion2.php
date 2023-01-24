<?php
require_once("../../valida.php");
?>
<!DOCTYPE html>
<html  lang="en">
<head>
      <meta charset="utf-8">
      <!-- Title here -->
      <title>LISTA DE COTEJO</title>

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
            right: 80%;}
        
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

      function ms(){
            var nomi=$("#nombres")[0].value;
            var vale=$("#valores")[0].value;
            var ind=$("#indica1")[0].value;
            var sec=$("#selecto")[0].value;
            var sec2=$("#select2")[0].value;
            var grup=$("#indi1")[0].value;
              var evi=$("#indi")[0].value;
            $.get("recibe.php?v1=" + nomi + "&v2=" + vale + "&v3=" + ind + "&v4=" + sec + "&v5=" + sec2 + "&v6=" + grup + "&v7=" + evi, function(data){

            });

          }  
          function ms1(){
            var nomi=$("#it2")[0].value;
            var vale=$("#autov2")[0].value;
            var ind=$("#indi2")[0].value;
            var sec=$("#selecto")[0].value;
            var sec2=$("#select2")[0].value;
            var grup=$("#indi1")[0].value;
              var evi=$("#indi")[0].value;
            $.get("recibe.php?v1=" + nomi + "&v2=" + vale + "&v3=" + ind + "&v4=" + sec + "&v5=" + sec2 + "&v6=" + grup + "&v7=" + evi, function(data){

            });

          }  
      function ms2(){
            var nomi=$("#it3")[0].value;
            var vale=$("#autov3")[0].value;
            var ind=$("#indi3")[0].value;
            var sec=$("#selecto")[0].value;
            var sec2=$("#select2")[0].value;
            var grup=$("#indi1")[0].value;
              var evi=$("#indi")[0].value;
            $.get("recibe.php?v1=" + nomi + "&v2=" + vale + "&v3=" + ind + "&v4=" + sec + "&v5=" + sec2 + "&v6=" + grup + "&v7=" + evi, function(data){

            });

          }  

          function msx(){
          // var numi=$("#NI0")[0].value;
            
            var sec=$("#selecto")[0].value;
            var sec2=$("#select2")[0].value;
            var grup=$("#indi1")[0].value;
              var evi=$("#indi")[0].value;
            $.get("recibe.php?v1=" + nomi + "&v2=" + vale + "&v3=" + ind + "&v4=" + sec + "&v5=" + sec2 + "&v6=" + grup + "&v7=" + evi, function(data){

            });

          }  


        $(document).ready(function(){
          $('#add').click(function(){
            agregar();
          });
          $('#dele').click(function(){
            eliminar(id_fila_selected);
          });
        

        });
        var cont = 1;
        function agregar(){
          cont++;
          var fila='<tr id="fila'+cont+'"onclick="seleccionar(this.id ,'+cont+')" class="seleccionada2">'+
          '<td >'+cont+'</td> '+
          '<td > <span style="Color: black"><textarea id="it0'+cont+'""  class="datee" rows="30" cols="3" name="it0'+cont+'"></textarea></span> </td>'+
          '<td ><input type="text" id="vall'+cont+'""  class="border" size="1"  onkeypress="return soloLetras(event)" oninput="plos(this.value)"></td>'+
          '<td ><label></label></td>'+
          '<td ><label id="indi'+cont+'"">M</label></td>'+
          '<td ><label id="ses'+cont+'""> </label></td>'+
          '<td ><label id="nel'+cont+'""> </label></td>'+
          '<td ><label id="ver'+cont+'""> </label></td>'+
          '<td> <button id="Guardadito'+cont+'" onclick="msx()" class="btn btn-success btn-sm">Guardar Fila</button> </td>'+
          '</tr>';
          $('#tabla').append(fila);
          reordenar();
        }
        // function seleccionar(id_fila , s){
        //  conteo = s;

        //  if($('#'+id_fila).hasClass('seleccionada')){

        //    $('seleccionada').removeClass('seleccionada2');

        //  }else{
        //    $('#'+id_fila).addClass('seleccionada');
        //  }
        //  id_fila_selected=id_fila;
        // }
        
        function seleccionar(id_fila , s){
          conteo = s;

        $('.seleccionada2').removeClass('bgtd');
        $('#'+id_fila).addClass('bgtd');
          id_fila_selected=id_fila;
          
        }

      function enviar(pagina){
      document.nombreDelFormulario.action = pagina;
      document.nombreDelFormulario.submit();

      }
        
        $(document).ready(function(){

      $('.seleccionada2').click(function(){
      $('.seleccionada2').removeClass('bgtd');
      $(this).addClass('bgtd');
      });

      });

        

        function eliminar(id_fila){
        

          $('#'+id_fila).remove();
          reordenar();

        
        }

        


        function reordenar(){
          var num=1;
          $('#tabla tbody tr').each(function(){
            $(this).find('td').eq(0).text(num);
            num++;
            
          });
        }
        
        
        function agregarform(){
          var dato1=document.getElementById("it0"+conteo).value;
          document.getElementById("item2").value=dato1;

        var dato2=document.getElementById("vall"+conteo).value;
          document.getElementById("Valor2").value=dato2;

          // var dato3=document.getElementById("indi"+conteo).innerHTML;
          // document.getElementById("Indicador2").value=dato3;
      }

      // function editable(){
      //   var dato7=document.getElementById("item2").value;
      //     document.getElementById("it" +conteo).value=dato7;

      //   var dato8=document.getElementById("Valor2").value;
      //     document.getElementById("vall"+conteo).value=dato8;

      //     var dato9=document.getElementById("Indicador2").value;
      //     document.getElementById("indi"+conteo).innerHTML=dato9;
      

      // }

      function firmar(){
        var dato100=document.getElementById("nomdoce").value;
          document.getElementById("Docentee").value=dato10;
        var dato10=document.getElementById("fechaA").value;
          document.getElementById("Docentee").value=dato10;
          var dato18=document.getElementById("spTotal").innerHTML;
        document.getElementById("Docentee").value=dato100+ dato10 + dato18;
          




      }
      function soloLetras(e){
            key = e.keyCode || e.which;
            tecla = String.fromCharCode(key).toLowerCase();
            letras = " 0123456789";
            especiales = "8-37-39-46";

            tecla_especial = false
            for(var i in especiales){
                  if(key == especiales[i]){
                      tecla_especial = true;
                      break;
                  }
              }

              if(letras.indexOf(tecla)==-1 && !tecla_especial){
                  return false;
              }
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
      
      $(document).ready(inicio);
        function inicio(){
            var posibilidades = [
              "Manzana",
        "Melon",
        "Pepino",
        "Papaya",
        "Sandia",
        "Fresa",
        "Limon",
        "Mamey",
        "Melocoton",
        "Mandarina",
              "Naranja",
              "Guayaba",
              "Mango",
              "Fresa",
        ];
            $("#nombres").autocomplete({source:posibilidades});
        }

          function pasara(id,id2,id3){
        document.getElementById(id).value="";
        document.getElementById(id2).value="";
        document.getElementById(id3).value="";
      
      }
      
      
    


  </script>
  
  <script type="text/javascript" src="/functions.js"></script>

</head>  

<body>
<!-- Header starts -->
<!--<input type="text" name="comida" id="pruebaR" value="" /> -->

<!-- Content strats -->

<div class="logo">
             <h1>Lista de cotejo</h1>
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
                                            <label class="control-label col-md-3" for="select"><h4>Asignatura</h4></label>
                                                    <div class="col-md-9" >                               
                                                     <!-- <form action="miphp.php" method="POST" > -->
                                                        <select class="form-control color" id="selecto" name="selecto"  onchange="pasara('nombres','it2','it3');">
                                                        <option>&nbsp;</option>
                                                        <option value='REDES'>REDES</option>
                                                        <option value='Computo en la nube'>Computo en la nube</option>
                                                        <option value='Programacion Web'>Programación Web</option>
                                                        </select>  
                                                        <!-- <p id="prueba1"></p> -->
                                                      </div> 
                                </div>    
                                        <div class="form-group">
                                            <label class="control-label col-md-3" for="select"><h4>Unidad</h4></label>
                                                    <div class="col-md-9" >                               
                                                     <!-- <form action="miphp.php" method="POST" > -->
                                                        <select class="form-control color" id="select2" name="select2"  >
                                                        <option>&nbsp;</option>
                                                        <option value='Uno'>Uno</option>
                                                        <option value='Dos'>Dos</option>
                                                        <option value='Tres'>Tres</option>
                                                        <option value='Cuatro'>Cuatro</option>
                                                        </select>  
                                                        <!-- <p id="prueba1"></p> -->
                                                      </div> 
                                </div>      
                                
                        </div>

 								<div class="col-md-6" >
                                <div class="form-group">
                                            <label class="control-label col-md-3" for="select"><h4>Grupo:</h4></label>
                                                    <div class="col-md-3" >                               
                                                     <!-- <form action="miphp.php" method="POST" > -->
                                                        <select class="form-control color" id="indi1" name="indi1"onchange="pasara('nombres','it2','it3');">
                                                                                <option>&nbsp;</option>
                                                                                <option value='7F21'>7F21</option>
                                                                                <option value='7F31'>7F31</option>
                                                                                <option value='7F41'>7F41</option>
                                                                                </select> 
                                                        <!-- <p id="prueba1"></p> -->
                                                      </div>
                                                      <label class="control-label col-md-3" for="select"><h4>Número de alumnos del grupo:</h4></label>
                                                    <div class="col-md-3" >                               
                                                     <!-- <form action="miphp.php" method="POST" > -->
                                                        <select class="form-control color" id="indi11" name="indi11" onchange="pasara('nombres','it2','it3');"> 
                                                                                <option>&nbsp;</option>
                                                                                <option value='1-20'>1-20</option>
                                                                                <option value='21-40'>21-40</option>
                                                                                </select> 
                                                        <!-- <p id="prueba1"></p> -->
                                                      </div>  
                                </div>         
                        </div>

 								
              </div><!--Fin row -->

                                  <div class="col-md-3" > <h4> <font color ="#RRVAA">Fecha de aplicación:
                                  </font> <input type="text" id="fechaA" name="fechaA" style="width: 70%; height: 2em" value="<?php echo date("d/m/Y"); ?>" size="10" readonly="readonly" /> </h4> </div>

                                   <div class="col-md-3 " > <h4> <font color ="#RRVAA">Duración:
                                   </font> <input id="dura" name="dura" style="width: 95%; height: 2em" readonly="readonly" value="11"/> </h4> </div>

                                  <div class="col-md-6 "> <h4> <font color ="#RRVAA">Evidencia: </font> <select class="form-control color" id="indi" name="indi" onchange="pasara('nombres','it2','it3');"> 
                                                                                <option>&nbsp;</option>
                                                                                <option value='Informe de Investigación'>Informe de Investigación</option>
                                                                                <option value='Cuadro comparativo'>Cuadro comparativo</option>
                                                                                <option value='Proyecto'>Proyecto</option>
                                                                                <option value='Reporte de Prácticas'>Reporte de Prácticas</option>
                                                                                </select> </h4> </div>
                            </div>





                               <div class="row">
                                              <div class="col-md-5 "> <h4> <font color ="#RRVAA">Nombre del 
                                                  docente: </font> <input type="text" id="nomdoce" name="nomdoce" style="width: 100%; height: 5%"  readonly="readonly" value="<?php echo $_SESSION["nombre"];?>" /> </h4> 
                                              </div>

                                              

                                                <div class="col-md-5 " ><h4 id="ho"><font color ="#RRVAA">Nombre del (la) estudiantes o integrantes del equipo
                                               </font> <input type="text" id="nomestu" name="comentarios" style="width: 100%; height: 5%" disabled/></h4> 
                                               </div> 
                              </div>
                     <!-- Events Accordion Panel -->
                    
                          
                     <?php include 'Modales/modal_Co2.php'; ?>
                 
              </div><!--Fin row -->
                     <!-- Events Accordion Panel -->
                     
                     <div class="panel-group" id="accordion">
                        

<!-- ***********************************************fin   PHP****************************************************************-->                                
             
      <div class="panel"> 
                        
                                     <div class="panel-heading">
                                       <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                                          <!-- Title. -->
                                         <h5 class="panel-title" >Instrucciones</h5>
                                         
                                       </a>
                                     </div>
                         <div id="collapseOne" class="panel-collapse collapse in">     



                            <div class="panel-body">
                                    
                                  
                   
                  

                    
                 
                
             <!--Fin row -->

              <div class="row">

                          <h4 class="divv" style="color: black; font-size:22px" >Intrucciones</h4>                  
                         <div class="col-md-12" >
                         	<textarea  id="comentarios" name="comentarios" style="width: 428%; height: 13em" class="border0" disabled >
                        1.-El docente llenará con la lista de cotejo en función de la calidad del producto entregado por el estudiantes (es).   

                        2.-Se marca con una "x" si cumplió o no con el criterio.

                        3.-Se llenará el apartado de "Puntos totales" con los puntos que considere corresponden con la calidad del producto.

                        4.-El puntaje máximo de la evaluación es de: 

                        5.-Para que el estudiante sea evaluado en los indicadore B,D,F deberá cumplir con los indicadores M(mínimos).

                        6.-Realizar la sumatoria.
                                         </textarea> </div>


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
                              
                          <label>Presiona agregar o eliminar</label>
                          <button id= "add"type="button" class="btn btn-success btn-sm">
                              Agregar
                            </button> 
                             <button id="dele" type="button" class="btn btn-danger btn-sm" onclick="ConfirmDemo()">
                              Eliminar
                            </button>

  
<?php include 'Modales/modal_ayuda.php'; ?> 
                        

  <table id="tabla" class="table-hover">

  <div id="contenedorForm">
    <thead class="table-hover">
      <tr class="active">
        <td width="10%"> <h3> No.</h3> </td>
        <td width="30%"> <h3 >Ítem </h3> </td>
        <td width="5%"> <h3> Valor</h3> </td>
        <td width="5%"> <h3> Puntos</h3> </td>
        <td width="5%"> <h3>Indicador</h3> </td>
        <td width="5%"> <h3> Si</h3> </td>
        <td width="5%"> <h3> No </h3> </td>
        <td width="10%"> <h3> Observación</h3> </td>
      </tr>
    </thead>

    	<tbody>

<tr class="seleccionada2" >
    <td >1</td>
      <td> <textarea id="nombres" name="nombres" class="datee" rows="30" cols="3"> </textarea> </td>

    <td> <input type="text" id="valores" name="valores" class="border" size="1" style="text-align: center;" onkeypress="return soloLetras(event)" oninput="plos(this.value)"> </td>

    <td> <label> </label> </td>
<td ><select class="form-control color" id="indica1" name="indica1"> 
      <option>&nbsp;</option>
      <option value='A'>A</option>
      <option value='B'>B</option>
      <option value='C'>C</option>
      <option value='D'>D</option>
      <option value='E'>E</option>
      <option value='F'>F</option>
      </select> </td>
    <td><label id="ses"> </label> </td>
    <td><label id="nel"> </label> </td>
    <td><label id="ver"> </label> </td>
     <td> <button id="Guardadito" onclick="ms()" class="btn btn-success btn-sm">Guardar Fila</button> </td>
</tr>   


<tr class="seleccionada2"> 
    <td>2</td>
     <td> <span style="Color: black"><textarea name="it2" id="it2"  class="datee" rows="30" cols="3"></textarea> </span> </td>
    <td> <input type="text" id="autov2" name="valores2" class="border" size="1" style="text-align: center;" onkeypress="return soloLetras(event)" oninput="plos(this.value)"> </td>
    <td>  <label> </label>  </td>
    <td ><select class="form-control color" id="indi2" name="indi2"> 
      <option>&nbsp;</option>
      <option value='A'>A</option>
      <option value='B'>B</option>
      <option value='C'>C</option>
      <option value='D'>D</option>
      <option value='E'>E</option>
      <option value='F'>F</option>
      </select> </td>
    <td> <label id="ses"> </label> </td>
    <td> <label id="nel"> </label> </td>
    <td> <label id="ver"> </label> </td>
<td> <button id="Guardadito" onclick="ms1()" class="btn btn-success btn-sm">Guardar Fila</button> </td>
</tr>  
<tr class="seleccionada2"> 
    <td>3</td>
    <td> <span style="Color: black"><textarea name="it3" id="it3"  class="datee" rows="30" cols="3"></textarea> </span> </td>
    <td> <input type="text" id="autov3" name="autov3" class="border" size="1" style="text-align: center;"  onkeypress="return soloLetras(event)" oninput="plos(this.value)"></td>
    <td>  <label> </label>   </td>
    <td ><select class="form-control color" id="indi3" name="indi3"> 
      <option>&nbsp;</option>
      <option value='A'>A</option>
      <option value='B'>B</option>
      <option value='C'>C</option>
      <option value='D'>D</option>
      <option value='E'>E</option>
      <option value='F'>F</option>
      </select> </td>
    <td> <label id="ses"> </label> </td>
    <td> <label id="nel"> </label> </td>
    <td> <label id="ver"> </label> </td>
    <td> <button id="Guardadito" onclick="ms2()" class="btn btn-success btn-sm">Guardar Fila</button> </td>
    

</tr>  


    </tbody> 

   </table>

</div>
  
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
                                     <div class="col-md-3 " > <h4> <span class="color"></span> </h4> </div>
                                     <div class="col-md-6 " > <h4> <span class="color">Puntaje total </span> </h4> </div>
                                     <div class="col-md-3 " > <h4> <span class="color"> </span> </h4> </div>

                               </div><!--Fin row -->
                                <!--row -->
                                 <div class="row">
                                    <div class="col-md-3 "><h4> <span class="color"></span></h4> </div>
                                 </div>

<table border="2px">
  
<tr>
  <td width="10%" class="col-md-3 azul"  style="color: black" >Puntaje Maximo</td>
  <td width="20%" bgcolor=" lightcyan" style="color: black" > <span id="spTotal" >  </span></td>
  <td width="10%"  class="col-md-3 azul"  style="color: black" >Puntaje Obtenido</td>
  <td width="20%" bgcolor=" lightcyan" style="color: black" > <span id="spTotal2" > </span></td>
 
    <!-- <td><input type="button" value="sent" onclick ="enviar('validar.PHP')" class="btn-success btn"/></td> -->
  
 <!--  <td width="40%" bgcolor=" lightcyan">      </td> -->
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
                <td bgcolor=" lightcyan" style="color: black" > F </td>
                <td width="10%" bgcolor=" lightcyan" style="color: black" >Instrumento</td>
                <td width="5%" bgcolor=" lightcyan" style="color: black"> P </td>
                <td width="5%" bgcolor=" lightcyan"> C </td>
                <td width="10%" bgcolor=" lightcyan"> A </td>

            </tr>
            <tr>
                <td> Mapa Conceptual </td>
                <td style="color: #DC143C"> 30 </td>
                <td> <input type="text" name="B" size="1" style="background: transparent;border-top-style: none; text-align: center;"/> </td>
                <td style="color: #DC143C"> 3 </td>
                <td> <input type="text" name="D" size="1" style="background: transparent;border-top-style: none; text-align: center;"/> </td>
                <td style="color: #DC143C"> 4 </td>
                <td> <input type="text" name="E" size="1" style="background: transparent;border-top-style: none; text-align: center;"/> </td>
                <td style="color: #DC143C"> 2 </td>
                <td>Lista de Cotejo</td>
                <td style="color: #DC143C"> X </td>
                <td style="color: #DC143C"> X </td>
                <td style="color: #DC143C"> X </td>
            </tr>
</table>


<table >
      <td colspan="4">. </td>
      <td colspan="4">. </td>
</table>

<table >
  
<td width="60%" bgcolor=" lightcyan" style="color: black" align="left"> Nombre y Firma del Docente </td>

<td> <input type="text" id="Docentee" name="Docente" size="30" style="background: transparent;border-top-style: none; text-align: center;"> </td>
<!-- <?php 
// include("firmaimagen.php");

 ?> -->
<td> <button type="button" onclick="firmar()">Firmar</button> </td>

<tr>
      <td bgcolor=" lightcyan" style="color: black" align="left">Nombre y Firma del Alumno </td> 
      <td> <input type="text" name="Alumno" size="30" style="background: transparent;border-top-style: none; text-align: center;"/> </td>
      <td> <button type="button">Firmar</button> </td>
</tr> 
</table>

                              

<?php 
          require_once("CRUD/class/Consultas.php");
          $usuarios=Usuarios::singleton();
          $data = $usuarios->firma_imagen();
           if (count($data)>0) {
           foreach ($data as $fila) {
      
      $nom=$fila['Nombre_D'];
      $ima=$fila['Imagen_D'];

    echo '<a href="#"><img class="card-img-top" width ="250" src="firmasimagenes/'.$ima.'" alt=""></a>';
     echo  '<p class="card-text">'.$nom.'</p>';
              }
            }
?>

                              
                              
                                 </div>
                               </div>
                             </div>
                           </div>

                    </div>
                  </div>
                </div>

      </div>
    </div>
  </div>
</div>

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