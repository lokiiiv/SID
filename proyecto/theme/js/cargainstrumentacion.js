//var posicionhojas=0;

function completa(fecha){
  if (fecha.length==1) {
    return "0"+fecha;
  }
  return fecha;
}

$("#cargainstrumentacionexcel").click(function(){
  $("#msie")[0].innerHTML="Cargando excel, espere...";    
  var $inputarchivo=document.querySelector("#aexex"); 
  var archivosubir=$inputarchivo.files[0];
  //alert("lk");
  var formdata=new FormData();
  formdata.append("archivo",archivosubir);
  
  const respuesta = fetch("leeinstrumentacion/subeexcel.php",{
    method:"POST",
    body : formdata,
  }).then( function(response){
    $("#msie")[0].innerHTML="Revisando cuantos temas son, espere...";    
    $.post("leeinstrumentacion/leenombreshojas.php",function(totalh)  {
      //alert(totalh);
      var totaltemasexcel=JSON.parse(totalh);      
      if (totaltemasexcel.length==0) {
        $("#msie")[0].innerHTML="";    
        alertify.error("<h3>Al parecer no es una instrumentación, por favor revise el archivo</h3>");
        return 0;
      }
      alertify.success("<h3>Se leerán "+(totaltemasexcel.length)+" temas</h3>");
      //posicionhojas=content;
      
      //alert(content.length);

    
    //alert(content);



    $("#msie")[0].innerHTML="Leyendo encabezado principal";
    $.post("leeinstrumentacion/leesencsim.php",function(values)  {
      $("#msie")[0].innerHTML="Fijando los valores leídos";
      //alert("okoko"+values);
      var array=values.split("!#%&/");
      $("#campoPE").val(array[0]);
      //alert(array[1]);
      //add1(array[0],array[1]);
      //buscarPlanEstudios(array[0]);
      $("#campoPlanEstudios").append("<option>"+array[1]+"</option>")
      $("#campoClaveAsignatura")[0].value=array[3];
      $("#campoCreditos")[0].value=array[4];
      $("#campoTemas")[0].innerHTML=array[5];
      $("#campoSemestre")[0].value=array[6];
      $("#campoMateria")[0].value=array[2];
      $("#campoPeriodo")[0].value=array[11];
      //$("#selectTema").val(array[5]);
      
      
      //plnstudi(array[0],masplnstudios(array[1]));
      guardarDatosGenerales();

      document.getElementById("campoCaracterizacion").innerHTML=array[12];
      $("#msie")[0].innerHTML="Guardando caracterización de la asignatura";

      guardarCampo('Caracterizacion');
      document.getElementById("campoIntencionDidactica").innerHTML=array[13];
      $("#msie")[0].innerHTML="Guardando intención didáctica";
      guardarCampo('IntencionDidactica');
      document.getElementById("campoCompetenciasPrevias").innerHTML=array[14];
      $("#msie")[0].innerHTML="Guardando competencias previas";
      guardarCampo('CompetenciasPrevias');

      document.getElementById("campoCompetenciaEA").innerHTML=array[15];
      $("#msie")[0].innerHTML="Guardando competencia específica de la asignatura";
      guardarCampo('CompetenciaEA');
      document.getElementById("Caracterizacion").innerHTML="";
      document.getElementById("IntencionDidactica").innerHTML="";
      document.getElementById("CompetenciasPrevias").innerHTML="";
      document.getElementById("CompetenciaEA").innerHTML="";
      //var numtemas=array[16];

      //alert(array[16]);
      //////////////////////////////////////////////
      //////////////////////////////////////////////
      //////////////////////////////////////////////
      //////////////////////////////////////////////
      ////////////////////f//////////////////////////
      //////////////////////////////////////////////
    });//fin de donde se lee todo lo que se repite en los temas
    //aqui propongo el for para leer cada tema
    $('#selectTema').val(1);
    leesincro(totaltemasexcel,totaltemasexcel.length,0);

    
  });//fin de la lectura de cuantas hojas hay
  });//fin del then del que sube el archivo

     

}); //fin del clic de carga instrumentación

function leesincro(totaltemasexcel,tte,cte){  //tte total de temas, cte contador de tema por tema
  
  //alertify.success("--"+(cte+1));
  leetemainstru(totaltemasexcel,tte,cte);  
}

async function leetemainstru(totaltemasexcel,tte,cte){
  var i=totaltemasexcel[cte];
  //alertify.success("este: "+i);
      //alertify.warning("Se comenzó con la lectura del tema "+(ili+1));

      $.post("leeinstrumentacion/leeencabezadotema.php",{tema:i},function(values1)  {
        //alert(values1);
        var array1=values1.split("#%&");
        //alert(array1.length);
        document.getElementById("TituloTema").value=array1[0];
        $("#msie")[0].innerHTML="Guardando nombre de tema";
        guardarCampoTemaValor('TituloTema',document.getElementById('TituloTema').value);
        $("#msie")[0].innerHTML="Guardando competencia específica del tema";
        document.getElementById("campoCompetenciaET").value=array1[1];
        guardarCampoTema('CompetenciaET');

        document.getElementById("campoCompetenciasGen").value=array1[2];
        $("#msie")[0].innerHTML="Guardando competencias genéricas";
        guardarCampoTema('CompetenciasGen');
      }); //fin lee encabezado temas

        
      $("#msie")[0].innerHTML="Leyendo proceso enseñanza aprendizaje";  
      $.post("leeinstrumentacion/leetemaproceso.php",{tema:i},function(values1)  {
        var arrayx=values1.split("&?&");

        var array1=arrayx[0].split("($%&");
        var tms=arrayx[1];
        var htp=arrayx[3];
        var rad=arrayx[2];
        var filafinal=array1[1];
        var valores=array1[0];
        var array2=valores.split("!#%&");

        document.getElementById("tablaActividades").innerHTML='<thead><tr><th><h4> Actividades de enseñanza (Docente) </h4></th><th> <h4> Actividades de aprendizaje (Estudiante) </h4></th></tr></thead><tbody><tr><td colspan="2"><td><button onclick="agregarActividad()" align="center" type="button" class="btn btn-success btn-sm" style="font-size: 12px">Agregar</button></td></tr></tbody>';


        //alertify.success(tms,5000);


        for(var j=0;j<array2.length;j++){
          var colum=array2[j].split("&%#!");

          //alert(colum[0]+"   "+colum[1]);
          if ((colum[0]!="" || colum[1]!="") && colum[0]!=undefined && colum[1]!=undefined) {

          agregarActividad2(colum[0],colum[1]);   
          }
        }

        $("#msie")[0].innerHTML="Guardando proceso enseñanza aprendizaje";
        guardarActividades();


        document.getElementById("campoTemasSubtemas").value=tms;
        document.getElementById("campoRecursos").value=rad;
        document.getElementById("campoHTP").value=htp;
        guardarCampoTema('Recursos');
        guardarCampoTema('TemasSubtemas');
        guardarCampoTema('HTP');
        filafinal=parseInt(filafinal);
        //alert("ok");
        $.post("leeinstrumentacion/leepracticaslaboratorio.php",{tema:i,fila:filafinal},function(values2)  {
          let x=0;
          //alert("ok1");
          $("#msie")[0].innerHTML="Leyendo prácticas de laboratorio";
          //const promesa=new Promise((resolve,reject)=>{
            //setTimeout(()=>{
              var arrayy=values2.split("??¡¡");  
              var fila=arrayy[1];
              document.getElementById("filatodo").value=fila;
              
              var arrayx=arrayy[0].split("#$%$#");  

              let phtml='<thead><tr><th class="text-center">No.</th><th class="text-center">Título de la práctica</th><th class="text-center">Laboratorio</th></tr></thead><tbody><tr><td colspan="3"></td><td><button onclick="agregarPractica()" align="center" type="button" class="btn btn-success btn-sm" style="font-size: 12px">Agregar</button></td></tr></tbody>';
              $("#msie")[0].innerHTML="Guardando prácticas de laboratorio";
              $("#tablaPracticas")[0].innerHTML=phtml;
               for(var j=0;j<arrayx.length;j++){
                var colum=arrayx[j].split("$%&%$");
                agregarPractica2(colum[0], colum[1],j+1);
              
                //alert(j+" "+(arrayx.length-1));
                //if (j==arrayx.length-1) {
                //  resolve(x);
                //}
              }
              //$("#msie")[0].innerHTML="Terminó de leer prácticas";
              
              //guardarPracticas();
              //$("#msie")[0].innerHTML="Teminó 2";
            //},2000);
            
            
          //});
          $("#msie")[0].innerHTML="Leyendo indicadores de alcance";
          var filaf=document.getElementById("filatodo").value;
          $.post("leeinstrumentacion/leeindicadoralcance.php",{tema:i,fila:filaf},function(values3)  {
            var array=values3.split("??¡¡");  
            document.getElementById("filatodo").value=array[1];
            //alert(array[0]);
            document.getElementById("campoIndicadores").value=array[0];
            $("#msie")[0].innerHTML="Guardando indicadores de alcance";
            guardarCampoTema('Indicadores');

          });//fin indicador alcance
            

          $("#msie")[0].innerHTML="Leyendo matriz evaluación";
          filaf=document.getElementById("filatodo").value;
          $.post("leeinstrumentacion/leematrizev.php",{tema:i,fila:filaf},function(values3)  {

            var me='<thead><tr><td colspan="2" class="text-center"></td><td colspan="6" class="text-center"><strong>Indicador de alcance </strong></td><td colspan="4" class="text-center"><strong> Método de evaluación </strong></td></tr><tr><th class="text-center"><strong> Evidencia del aprendizaje </strong></th><th> % </th><th> A </th><th> B </th><th> C </th><th> D </th><th> E </th><th> F </th><th>Instrumento</th><th> P </th><th> C </th><th> A </th><td class="text-center" align="center"><button onclick="agregarEvidencia()"align="center" type="button" class="btn btn-success btn-sm" style="font-size: 12px">Agregar</button></td></tr></thead><tbody><tr><td align="right">Total</td><td><strong><p id="totalPerc">0</p></strong></td><td id="totalA">0</td><td id="totalB">0</td><td id="totalC">0</td><td id="totalD">0</td><td id="totalE">0</td><td id="totalF">0</td><td>  </td><td>  </td><td>  </td><td>  </td></tr></tbody>';
            $("#matrizEvaluacion")[0].innerHTML=me;

            var array=values3.split("##))");  
            //alert(array[0]);
            document.getElementById("filatodo").value=array[1];
            //alert(array[0]);
            var todo=array[0].split("??¡¡");

            for(var j=0;j<todo.length;j++){
              var colum=todo[j].split("$%&");
              agregarEvidencia3(colum[0],colum[1],colum[2],colum[3],colum[4],colum[5],colum[6],colum[7],colum[8],colum[9],colum[10],colum[11],j);
              verificaexistenciainstrumento(colum[0],colum[8]);
            }
            $("#msie")[0].innerHTML="Guardando matriz de evaluación";
            //guardarCampoTema('Indicadores');
            
            guardarEvidencia();
            //lectura de calendarización
            $("#msie")[0].innerHTML="Leyendo caledarización";
            var filaf=document.getElementById("filatodo").value;

            $.post("leeinstrumentacion/leecalendarizacion.php",{tema:i,fila:filaf},function(values6)  {//inicio lee bibliografía
              //alert(values6);
              var contentm=JSON.parse(values6);

              //alert("ok");
              var gru=contentm[0];
              var sem=contentm[1];
              //alert(values6+" okkkkk");
              var tabla = $("#cuerpoTablafechas");
              $("#cuerpoTablafechas").html("");
              //alert("ok1");
              let cgff=document.getElementById("campoGrupo").innerHTML;
              let diviff=cgff.split(",");
              let totalff=diviff.length;
              //alert(totalff);
              let grup="";
              let filll="";
              let fflll="";
              for(var ig=0;ig<totalff;ig++){
                if(gru[ig]!=undefined){
                  //alert("ok");
                  grup=diviff[ig];

                  filll=gru[ig][1];
                  fflll=gru[ig][2];
                  filll = filll.split("/")[2]+"-"+completa(filll.split("/")[0])+"-"+completa(filll.split("/")[1]);
                  fflll = fflll.split("/")[2]+"-"+completa(fflll.split("/")[0])+"-"+completa(fflll.split("/")[1]);
                  //alert(grup+" "+filll+" "+fflll);
                }else{
                  grup=diviff[ig];
                  filll = "2022-3-2";
                  fflll = "2022-3-3";
                  //alert(grup+" "+filll+" "+fflll);
                }

                //alertify.success(filll);
                let cadena='<tr><td><h3 id="calendarClaveGrupo">'+grup+'</h3></td><td><input id="inicio" type="date" value="'+filll+'"></td><td><input id="fin" type="date" value="'+fflll+'"></td><td></td></tr>';
                //alert(cadena);
                tabla.append(cadena);
              }
              //alert("okj");
              //alertify.success("fechas cargadas con exito");
              for(var is=0;is<sem.length;is++){
                var tp=sem[is];
                var iss=is+1;
                document.getElementById("sem"+iss).value=tp;
              }

              guardarCalendarizacion();
              //alert("okh");
              $("#msie")[0].innerHTML="Caledarización, leída con éxito";
            //});


            //alert("ok");
            //lectura de fuentes de información

            $("#msie")[0].innerHTML="Leyendo fuentes de información";
            var filaf=document.getElementById("filatodo").value;
            $.post("leeinstrumentacion/leebibliografia.php",{tema:i,fila:filaf},function(values4)  {//inicio lee bibliografía
              //alert(values4);
              var content=JSON.parse(values4);
              //alert(content.length);
              var tbi="";
              for (var i = 0; i < content.length-1; i++) {
                var rb=content[i];
                tbi=tbi+rb+"\n";
              }
              $("#msie")[0].innerHTML="Guardando fuentes de información";
              document.getElementById("campoFuentes").value=tbi;
              guardarCampoTema('Fuentes'); 
              agregarFuentes();
              alertify.success("<h3>Se teminó de cargar el tema "+(cte+1)+"</h3>");
              //alert((cte+1)+" -- "+tte);
              if ((cte+1)<tte) {
                $('#selectTema').val((cte+2));
                leesincro(totaltemasexcel,tte,(cte+1));
              }else{
                $("#msie")[0].innerHTML="";
                //mostrarValor($('#selectTema').val());
                //alert("Borrando");
                $.post("leeinstrumentacion/borraarchivo.php",function(r){
                  alertify.success("<h1>Se teminó de cargar todos los temas, puede revisar y hacer cambios"+"</h3>",5);
			
		});
		
              }
              
            });//fin lee bibliografía

            });


          });//fin matriz evaluación
           
        });//fin del que lee prácticas y laboratorio


            //});
              //alert("okgu");
        
      });//fin del que lee el proceso docente estudiante
      

      mostrarValor($('#selectTema').val());
      actualizarCampos();
      
}


function verificaexistenciainstrumento(ee, ii){

$.post("consultaevidencia.php",{tabla:"evidencias",columna:"evidencia",dato:ee},function(){});
//alert("ok");
$.post("consultainstrumento.php",{tabla:"instrumentos",columna:"instrumento",dato:ii},function(r){
  //alert(r);
});
//alert("ok");
}

function agregarEvidencia3(a,b,c,d,e,f,g,h,i,j,k,l,m){
  agregarEvidenciam(a,i,j,k,l);
  llenar(a,b,c,d,e,f,g,h,i,j,k,l,m);
  sumarPerc();
}

function llenar(a,b,c,d,e,f,g,h,i,j,k,l,m){
  m=m+2;
  var tabla = document.getElementById("matrizEvaluacion");
      
  tabla.rows[m].cells[1].getElementsByTagName("input")[0].value=b;
  //indicadores
  tabla.rows[m].cells[2].getElementsByTagName("input")[0].value=c;
  tabla.rows[m].cells[3].getElementsByTagName("input")[0].value=d;
  tabla.rows[m].cells[4].getElementsByTagName("input")[0].value=e;
  tabla.rows[m].cells[5].getElementsByTagName("input")[0].value=f;
  tabla.rows[m].cells[6].getElementsByTagName("input")[0].value=g;
  tabla.rows[m].cells[7].getElementsByTagName("input")[0].value=h;
      //tabla.rows[m].cells[8].getElementsByTagName("select")[0].append("<option>"+i+"</option>");
      //alert(tabla.rows[m].cells[9].getElementsByTagName("checkbox")[0]);
}


function agregarEvidenciam(aa,ii,jj,kk,ll){
  //alert(ban);
  var matriz = document.getElementById("matrizEvaluacion");
  var continstru=0;
  var fila = matriz.insertRow(matriz.rows.length-1);
  
  var evidencia = fila.insertCell(0);//
  var perc = fila.insertCell(1);
  var a = fila.insertCell();//
  var b = fila.insertCell();//
  var c = fila.insertCell();//
  var d = fila.insertCell();//
  var e = fila.insertCell();//
  var f = fila.insertCell();//
  var instrumento = fila.insertCell();//
  var mp  = fila.insertCell();
  var mc = fila.insertCell();
  var ma = fila.insertCell();
  var borrar = fila.insertCell();
  //alert(jj+" "+kk+" "+ll);
  continstru=matriz.rows.length-2;
  var cadeextra="";
  var botonborrarevi="";
  var catalogoEvidencias = "";
  evidencia.innerHTML = '<select  class="form-control" style="width: 90%" id="selectEvidencia" name="evidencia"><option value="'+aa+'">'+aa+'</option></select>';
  instrumento.innerHTML = '<select  class="form-control" style="width: 90%'+cadeextra+'" id="selectInstrumento" onchange="cambiainstruH()" name="instrumento"><option value="'+ii+'">'+ii+'</option></select><input value="" style="display:none"/>';
  perc.innerHTML = '<strong><input type="text" '+cadeextra+' class="border" size="3" style="text-align: center;" onkeypress="return soloLetras(event)" onchange="sumarPerc()" value='+((typeof filaEvidencia != "undefined")?filaEvidencia[1]:"")+'></strong>';
  a.innerHTML = '<strong><input  type="text"class="border" size="1" style="text-align: center;" onkeypress="return soloLetras(event)" onchange="sumarPerc()" value='+((typeof filaEvidencia != "undefined")?filaEvidencia[2]:"")+'></strong>';
  b.innerHTML = '<strong><input  type="text"class="border" size="1" style="text-align: center;" onkeypress="return soloLetras(event)" onchange="sumarPerc()" value='+((typeof filaEvidencia != "undefined")?filaEvidencia[3]:"")+'></strong>';
  c.innerHTML = '<strong><input  type="text"class="border" size="1" style="text-align: center;" onkeypress="return soloLetras(event)" onchange="sumarPerc()" value='+((typeof filaEvidencia != "undefined")?filaEvidencia[4]:"")+'></strong>';
  d.innerHTML = '<strong><input  type="text"class="border" size="1" style="text-align: center;" onkeypress="return soloLetras(event)" onchange="sumarPerc()" value='+((typeof filaEvidencia != "undefined")?filaEvidencia[5]:"")+'></strong>';
  e.innerHTML = '<strong><input  type="text"class="border" size="1" style="text-align: center;" onkeypress="return soloLetras(event)" onchange="sumarPerc()" value='+((typeof filaEvidencia != "undefined")?filaEvidencia[6]:"")+'></strong>';
  f.innerHTML = '<strong><input  type="text"class="border" size="1" style="text-align: center;" onkeypress="return soloLetras(event)" onchange="sumarPerc()" value='+((typeof filaEvidencia != "undefined")?filaEvidencia[7]:"")+'></strong>';
  if (jj=="x") {
    mp.innerHTML = '<div class="custom-control custom-checkbox"><input checked type="checkbox" class="custom-control-input" id="defaultUnchecked"></div>';  
  }else{
    mp.innerHTML = '<div class="custom-control custom-checkbox"><input type="checkbox" class="custom-control-input" id="defaultUnchecked"></div>';  
  }
  if (kk=="x") {
    mc.innerHTML = '<div class="custom-control custom-checkbox"><input checked type="checkbox" class="custom-control-input" id="defaultUnchecked"></div>';
  }else{
    mc.innerHTML = '<div class="custom-control custom-checkbox"><input type="checkbox" class="custom-control-input" id="defaultUnchecked"></div>';
  }
  if (ll=="x") {
    ma.innerHTML = '<div class="custom-control custom-checkbox"><input checked type="checkbox" class="custom-control-input" id="defaultUnchecked"></div>';
  }else{
    ma.innerHTML = '<div class="custom-control custom-checkbox"><input type="checkbox" class="custom-control-input" id="defaultUnchecked"></div>';
  }     
  
  
  borrar.innerHTML= '<button '+cadeextra+' onclick="borrarEvidencia($(this).closest(\'tr\').index())" type="button" class="btn btn-danger btn-sm" style="margin-left:10px"><span class="glyphicon glyphicon-remove"></span></button>';
  

  //alert("ok");


}