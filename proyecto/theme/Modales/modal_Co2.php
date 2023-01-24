<button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#myModalA2" onclick="arriba(); escribe();" >
      Sugerencias
    </button>                      
<!-- Modal -->
<div id="myModalA2" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Ítems de Sugerencia</h4>
      </div>
      <div >
        <!--<input id="un" name="un" style="width: 10%; height: 2em" readonly="readonly" value=""/>-->
        <h4><label id="item8" style="width:50%; height:1em"></label></h4>
        <h4>Te sugerimos los siguientes ítems:</h4>
        
          <script>
            var dato2=document.getElementById("nomdoce").value;
          //var nomi2=$("#indi1").val();
          var la;
          var aux;
          var gru;
          var asig;
          var num;
          var ev;
          var dato3;
          var dato4;
          var dato5;
          var dato6;
          var dato7;
          var dato8;
          var dato9;
          var dato10;
          var auxD = "nuevo";
          var unoD = "GermanCuayaSimbro";
          var dosD = "JoséMartínCruzDomínguez";
          var tresD = "HectorHernándezMendoza";
          //var cuatroD = "Hector Hernández Mendoza";

          var unoG = "7F21";
          var dosG = "7F31";
          var tresG = "7F41";

          var unoE = "Informe de Investigación";
          var dosE = "Cuadro comparativo";
          var tresE = "Proyecto";
          var cuatroE = "Reporte de Prácticas";

          var unoN = "1-20";
          var dosN = "21-40";

          var unoA = "REDES";
          var dosA = "Computo en la nube";
          var tresA = "Programacion Web";
            function arriba(){
              gru=$("#indi1").val();
            asig=$("#selecto").val();
            //no=$("indi1").val();
            num=$("#indi11").val();
            ev=$("#indi").val();
            
            //alert(asig);
            
            if (dato2 != unoD && dato2 != dosD && dato2 != tresD) {
              aux = "nuevo";
                      if (aux == auxD && gru == unoG && asig == dosA && num == unoN && ev == unoE){
                    dato3 = "Menciona la posible aplicación de lo expuesto en otras disciplinas de un modo claro y puntual.";
                    dato4 = "Presenta y cita al menos 2 fuentes adicionales de información en un según idioma en formato APA.";
                    dato5 = "Presenta una propuesta de alguna plataforma para desarrollo de aplicaciones en la nube de un modo puntual.";
                    dato6 = "Muestra un ejemplo de una aplicación en la nube existente en donde se resalte la información presentada en su informede manera clara y prescisa.";
                    la = "Parece que eres nuevo, de acuerdo a docentes anteriores en la materia";
                    dato7 = "E";
                    dato8 = "B";
                    dato9 = "A";
                    dato10 = "M";
                  }if (aux == auxD && gru == unoG && asig == dosA && num == unoN && ev == dosE){
                    dato3 = "Incluye una propuesta de uso de alguna plataforma para la implementación del caso de estudio de un modo pertinente a lo presentado.";
                    dato4 = "Muestra un punto de analisis entre computo en la nube y computo tradicional de acuerdo algún trabajo citado en la bibliografía.";
                    dato5 = "Incluye ejemplos de desarrollo de aplicaciones en las plataformas presentadas de un modo concreto. ";
                    dato6 = "Muestra un punto de vista personal sobre el mejor modo de implementación del caso de estudio de una manera concisa.";
                    la = "Parece que eres nuevo, de acuerdo a docentes anteriores en la materia";
                    dato7 = "B";
                    dato8 = "D";
                    dato9 = "A";
                    dato10 = "M";
                  }if (aux == auxD && gru == unoG && asig == dosA && num == unoN && ev == tresE){
                    dato3 = "El estudiante cita y muestra el uso de 3 procedimientos aprendidos en otras asignaturas o propuestos por él para el desarrollo del proyecto. ";
                    dato4 = "El estudiante entrega en el tiempo requerido el proyecto al 100%.";
                    dato5 = "El proyecto puede resolver una problemática de 3 disciplinas diferentes a sistemas computacionales.";
                    dato6 = "El estudiante muestra la arquitectura de la solución propuesta y es capaz de modificar la implementación del proyecto de acuerdo a lo requeirdo por el docente en un 80 y 100 %.";
                    la = "Parece que eres nuevo, de acuerdo a docentes anteriores en la materia";
                    dato7 = "C";
                    dato8 = "F";
                    dato9 = "E";
                    dato10 = "M";
                  }if (aux == auxD && gru == unoG && asig == dosA && num == unoN && ev == cuatroE){
                    dato3 = "Presenta un cronograma de actividades. ";
                    dato4 = "Menciona como la práctica ayuda a otras disciplinas.";
                    dato5 = "Lo entrega en el tiempo solicitado.";
                    dato6 = "El estudiante es capaz de realizar un cambio al código sin nigún problema.";
                    la = "Parece que eres nuevo, de acuerdo a docentes anteriores en la materia";
                    dato7 = "A";
                    dato8 = "E";
                    dato9 = "F";
                    dato10 = "M";
                  }if (aux == auxD && gru == unoG && asig == dosA && num == dosN && ev == unoE){
                    dato3 = "Menciona la posible aplicación de lo expuesto en otras disciplinas de un modo claro y puntual.";
                    dato4 = "Presenta y cita al menos 2 fuentes adicionales de información en un según idioma en formato APA.";
                    dato5 = "Presenta una propuesta de alguna plataforma para desarrollo de aplicaciones en la nube de un modo puntual.";
                    dato6 = "Presenta una propuesta de alguna plataforma para desarrollo de aplicaciones en la nube de un modo puntual.";
                    la = "Parece que eres nuevo, de acuerdo a docentes anteriores en la materia";
                    dato7 = "E";
                    dato8 = "B";
                    dato9 = "A";
                    dato10 = "M";
                  }if (aux == auxD && gru == unoG && asig == dosA && num == dosN && ev == dosE){
                    dato3 = "Incluye una propuesta de uso de alguna plataforma para la implementación del caso de estudio de un modo pertinente a lo presentado.";
                    dato4 = "Incluye ejemplos de desarrollo de aplicaciones en las plataformas presentadas de un modo concreto.";
                    dato5 = "Muestra un punto de analisis entre computo en la nube y computo tradicional de acuerdo algún trabajo citado en la bibliografía. ";
                    dato6 = "Muestra un contraste entre las ventajas y 2 desventajas del desarrollo tradicional y la nube de mayor a menor importancia.";
                    la = "Parece que eres nuevo, de acuerdo a docentes anteriores en la materia";
                    dato7 = "B";
                    dato8 = "A";
                    dato9 = "D";
                    dato10 = "M";
                  }if (aux == auxD && gru == unoG && asig == dosA && num == dosN && ev == tresE){
                    dato3 = "El estudiante cita y muestra el uso de 3 procedimientos aprendidos en otras asignaturas o propuestos por él para el desarrollo del proyecto. ";
                    dato4 = "El estudiante entrega en el tiempo requerido el proyecto al 100%.";
                    dato5 = "El proyecto puede resolver una problemática de 3 disciplinas diferentes a sistemas computacionales.";
                    dato6 = "El proyecto presentado utiliza 3 componentes de computación en la nube para su solución.";
                    la = "Parece que eres nuevo, de acuerdo a docentes anteriores en la materia";
                    dato7 = "C";
                    dato8 = "F";
                    dato9 = "E";
                    dato10 = "M";
                  }if (aux == auxD && gru == unoG && asig == dosA && num == dosN && ev == cuatroE){
                    dato3 = "Presenta un cronograma de actividades. ";
                    dato4 = "Menciona como la práctica ayuda a otras disciplinas.";
                    dato5 = "Lo entrega en el tiempo solicitado.";
                    dato6 = "El estudiante termina de un 80 al 100% la práctica.";
                    la = "Parece que eres nuevo, de acuerdo a docentes anteriores en la materia";
                    dato7 = "A";
                    dato8 = "E";
                    dato9 = "F";
                    dato10 = "M";
                    //Comienza grupo 7F31
                    //Informe
                  }if (aux == auxD && gru == dosG && asig == dosA && num == unoN && ev == unoE){
                    dato3 = "Presenta y cita al menos 2 fuentes adicionales de información en un según idioma en formato APA. ";
                    dato4 = "Menciona la posible aplicación de lo expuesto en otras disciplinas de un modo claro y puntual.";
                    dato5 = "Presenta una propuesta de alguna plataforma para desarrollo de aplicaciones en la nube de un modo puntual.";
                    dato6 = "Menciona sus conclusiones y comentarios del tema expuesto de un modo coherente y de acuerdo a la competencia del tema.";
                    la = "Parece que eres nuevo, de acuerdo a docentes anteriores en la materia";
                    dato7 = "B";
                    dato8 = "E";
                    dato9 = "A";
                    dato10 = "M";
                  }if (aux == auxD && gru == dosG && asig == dosA && num == dosN && ev == unoE){
                    dato3 = "Presenta y cita al menos 2 fuentes adicionales de información en un según idioma en formato APA. ";
                    dato4 = "Menciona la posible aplicación de lo expuesto en otras disciplinas de un modo claro y puntual.";
                    dato5 = "Presenta una propuesta de alguna plataforma para desarrollo de aplicaciones en la nube de un modo puntual.";
                    dato6 = "Muestra un ejemplo de una aplicación en la nube existente en donde se resalte la información presentada en su informe de manera clara y prescisa.";
                    la = "Parece que eres nuevo, de acuerdo a docentes anteriores en la materia";
                    dato7 = "B";
                    dato8 = "E";
                    dato9 = "A";
                    dato10 = "M";
                    //Cuadro
                  }if (aux == auxD && gru == dosG && asig == dosA && num == unoN && ev == dosE){
                    dato3 = "Muestra un punto de analisis entre computo en la nube y computo tradicional de acuerdo algún trabajo citado en la bibliografía.";
                    dato4 = "Incluye una propuesta de uso de alguna plataforma para la implementación del caso de estudio de un modo pertinente a lo presentado.";
                    dato5 = "Incluye ejemplos de desarrollo de aplicaciones en las plataformas presentadas de un modo concreto. ";
                    dato6 = "Muestra un punto de vista personal sobre el mejor modo de implementación del caso de estudio de una manera concisa. ";
                    la = "Parece que eres nuevo, de acuerdo a docentes anteriores en la materia";
                    dato7 = "D";
                    dato8 = "B";
                    dato9 = "A";
                    dato10 = "M";
                  }if (aux == auxD && gru == dosG && asig == dosA && num == dosN && ev == dosE){
                    dato3 = "Muestra un punto de analisis entre computo en la nube y computo tradicional de acuerdo algún trabajo citado en la bibliografía.";
                    dato4 = "Incluye una propuesta de uso de alguna plataforma para la implementación del caso de estudio de un modo pertinente a lo presentado.";
                    dato5 = "Incluye ejemplos de desarrollo de aplicaciones en las plataformas presentadas de un modo concreto. ";
                    dato6 = "Muestra el análisis de un caso de estudio real del 1 desarrollo modo tradicional de un sistema y mediante computacional el uso de la de nube de manera sencilla y condensada.";
                    la = "Parece que eres nuevo, de acuerdo a docentes anteriores en la materia";
                    dato7 = "D";
                    dato8 = "B";
                    dato9 = "A";
                    dato10 = "M";
                    //Proyecto
                  }if (aux == auxD && gru == dosG && asig == dosA && num == unoN && ev == tresE){
                    dato3 = "El proyecto puede resolver una problemática de 3 disciplinas diferentes a sistemas computacionales.";
                    dato4 = "El estudiante entrega en el tiempo requerido el proyecto al 100%.";
                    dato5 = "El estudiante cita y muestra el uso de 3 procedimientos aprendidos en otras asignaturas o propuestos por él para el desarrollo del proyecto.";
                    dato6 = "El estudiante describe de manera clara la funcion de los 3 componentes utilizados de computacion en la nube y su relación para la solución del proyecto.";
                    la = "Parece que eres nuevo, de acuerdo a docentes anteriores en la materia";
                    dato7 = "E";
                    dato8 = "F";
                    dato9 = "C";
                    dato10 = "M";
                  }if (aux == auxD && gru == dosG && asig == dosA && num == dosN && ev == tresE){
                     dato3 = "El proyecto puede resolver una problemática de 3 disciplinas diferentes a sistemas computacionales.";
                    dato4 = "El estudiante entrega en el tiempo requerido el proyecto al 100%.";
                    dato5 = "El estudiante cita y muestra el uso de 3 procedimientos aprendidos en otras asignaturas o propuestos por él para el desarrollo del proyecto.";
                    dato6 = "El proyecto es implementado en un rango del 80 al 100 % .";
                    la = "Parece que eres nuevo, de acuerdo a docentes anteriores en la materia";
                    dato7 = "E";
                    dato8 = "F";
                    dato9 = "C";
                    dato10 = "M";
                    //Reporte
                  }if (aux == auxD && gru == dosG && asig == dosA && num == dosN && ev == cuatroE){
                    dato3 = "Menciona como la práctica ayuda a otras disciplinas.";
                    dato4 = "Menciona las conclusiones de manera clara y precisa de acuerdo a la competencia del tema.";
                    dato5 = "Lo entrega en el tiempo solicitado. ";
                    dato6 = "El estudiante termina de un 80 al 100% la práctica.";
                    la = "Parece que eres nuevo, de acuerdo a docentes anteriores en la materia";
                    dato7 = "E";
                    dato8 = "C";
                    dato9 = "F";
                    dato10 = "M";
                  }if (aux == auxD && gru == dosG && asig == dosA && num == dosN && ev == cuatroE){
                    dato3 = "Menciona como la práctica ayuda a otras disciplinas.";
                    dato4 = "Menciona las conclusiones de manera clara y precisa de acuerdo a la competencia del tema.";
                    dato5 = "Lo entrega en el tiempo solicitado. ";
                    dato6 = "Muestra capturas de la práctica funcionando con lo solicitado.";
                    la = "Parece que eres nuevo, de acuerdo a docentes anteriores en la materia";
                    dato7 = "E";
                    dato8 = "C";
                    dato9 = "F";
                    dato10 = "M";
                    //7F41
                    //Informe
                  }if (aux == auxD && gru == tresG && asig == dosA && num == unoN && ev == unoE){
                    dato3 = "Presenta y cita al menos 2 fuentes adicionales de información en un según idioma en formato APA. ";
                    dato4 = "Presenta una propuesta de alguna plataforma para desarrollo de aplicaciones en la nube de un modo puntual. ";
                    dato5 = "Menciona la posible aplicación de lo expuesto en otras disciplinas de un modo claro y puntual.";
                    dato6 = "Presenta una propuesta de alguna plataforma para desarrollo de aplicaciones en la nube de un modo puntual. ";
                    la = "Parece que eres nuevo, de acuerdo a docentes anteriores en la materia";
                    dato7 = "E";
                    dato8 = "C";
                    dato9 = "F";
                    dato10 = "M";
                  }if (aux == auxD && gru == tresG && asig == dosA && num == dosN && ev == unoE){
                    dato3 = "Presenta y cita al menos 2 fuentes adicionales de información en un según idioma en formato APA. ";
                    dato4 = "Presenta una propuesta de alguna plataforma para desarrollo de aplicaciones en la nube de un modo puntual. ";
                    dato5 = "Menciona la posible aplicación de lo expuesto en otras disciplinas de un modo claro y puntual.";
                    dato6 = "Presenta información sobre algún aspecto para el desarrollo de aplicaciones en la nube y ejemplos del mismo de manera clara y precisa. ";
                    la = "Parece que eres nuevo, de acuerdo a docentes anteriores en la materia";
                    dato7 = "E";
                    dato8 = "C";
                    dato9 = "F";
                    dato10 = "M";
                    //Cuadro
                  }if (aux == auxD && gru == tresG && asig == dosA && num == unoN && ev == dosE){
                    dato3 = "Incluye ejemplos de desarrollo de aplicaciones en las plataformas presentadas de un modo concreto.";
                    dato4 = "Muestra un punto de analisis entre computo en la nube y computo tradicional de acuerdo algún trabajo citado en la bibliografía.";
                    dato5 = "Incluye una propuesta de uso de alguna plataforma para la implementación del caso de estudio de un modo pertinente a lo presentado. ";
                    dato6 = "Muestra un contraste entre las ventajas y 2 desventajas del desarrollo tradicional y la nube de mayor a menor importancia. ";
                    la = "Parece que eres nuevo, de acuerdo a docentes anteriores en la materia";
                    dato7 = "A";
                    dato8 = "D";
                    dato9 = "B";
                    dato10 = "M";
                  }if (aux == auxD && gru == tresG && asig == dosA && num == dosN && ev == dosE){
                    dato3 = "Incluye ejemplos de desarrollo de aplicaciones en las plataformas presentadas de un modo concreto.";
                    dato4 = "Muestra un punto de analisis entre computo en la nube y computo tradicional de acuerdo algún trabajo citado en la bibliografía.";
                    dato5 = "Incluye una propuesta de uso de alguna plataforma para la implementación del caso de estudio de un modo pertinente a lo presentado. ";
                    dato6 = "Muestra el análisis de un caso de estudio real del 1 desarrollo modo tradicional de un sistema y mediante computacional el uso de la de nube de manera sencilla y condensada. ";
                    la = "Parece que eres nuevo, de acuerdo a docentes anteriores en la materia";
                    dato7 = "A";
                    dato8 = "D";
                    dato9 = "B";
                    dato10 = "M";
                    //Proyecto
                  }if (aux == auxD && gru == tresG && asig == dosA && num == unoN && ev == tresE){
                    dato3 = "El estudiante entrega en el tiempo requerido el proyecto al 100%. ";
                    dato4 = "El proyecto puede resolver una problemática de 3 disciplinas diferentes a sistemas computacionales.";
                    dato5 = "El estudiante cita y muestra el uso de 3 procedimientos aprendidos en otras asignaturas o propuestos por él para el desarrollo del proyecto.";
                    dato6 = "El estudiante muestra la arquitectura de la solución propuesta y es capaz de modificar la implementación del proyecto de acuerdo a lo requeirdo por el docente en un 80 y 100 %.";
                    la = "Parece que eres nuevo, de acuerdo a docentes anteriores en la materia";
                    dato7 = "A";
                    dato8 = "D";
                    dato9 = "B";
                    dato10 = "M";
                  }if (aux == auxD && gru == tresG && asig == dosA && num == dosN && ev == tresE){
                     dato3 = "El estudiante entrega en el tiempo requerido el proyecto al 100%. ";
                    dato4 = "El proyecto puede resolver una problemática de 3 disciplinas diferentes a sistemas computacionales.";
                    dato5 = "El estudiante cita y muestra el uso de 3 procedimientos aprendidos en otras asignaturas o propuestos por él para el desarrollo del proyecto.";
                    dato6 = "El estudiante describe de manera clara la funcion de los 3 componentes utilizados de computacion en la nube y su relación para la solución del proyecto.";
                    la = "Parece que eres nuevo, de acuerdo a docentes anteriores en la materia";
                    dato7 = "A";
                    dato8 = "D";
                    dato9 = "B";
                    dato10 = "M";
                    //Reporte
                  }if (aux == auxD && gru == tresG && asig == dosA && num == unoN && ev == cuatroE){
                    dato3 = "Lo entrega en el tiempo solicitado. ";
                    dato4 = "Menciona como la práctica ayuda a otras disciplinas. ";
                    dato5 = "Presenta un cronograma de actividades. ";
                    dato6 = "El estudiante es capaz de realizar un cambio al código sin nigún problema.";
                    la = "Parece que eres nuevo, de acuerdo a docentes anteriores en la materia";
                    dato7 = "A";
                    dato8 = "D";
                    dato9 = "B";
                    dato10 = "M";
                  }if (aux == auxD && gru == tresG && asig == dosA && num == dosN && ev == cuatroE){
                    dato3 = "Lo entrega en el tiempo solicitado. ";
                    dato4 = "Menciona como la práctica ayuda a otras disciplinas. ";
                    dato5 = "Presenta un cronograma de actividades. ";
                    dato6 = "Muestra capturas de la práctica funcionando con lo solicitado.";
                    la = "Parece que eres nuevo, de acuerdo a docentes anteriores en la materia";
                    dato7 = "A";
                    dato8 = "D";
                    dato9 = "B";
                    dato10 = "M";
                    //REDES
                    //7F21
                    //Informe
                  }if (aux == auxD && gru == unoG && asig == unoA && num == unoN && ev == unoE){
                    dato3 = "Incluye imágenes relacionadas con el tema y las explica de forma clara y precisa. ";
                    dato4 = "Utiilza conceptos aprendidos en otras asignaturas para documentar su trabajo.";
                    dato5 = "Presenta en los anexos la organización del trabajo en equipo en un cronograma de actividades, estableciendo tiempos y responsabilidades. ";
                    dato6 = "Muestra estándares y protocolos para redes WAN/LAN.";
                    la = "Parece que eres nuevo, de acuerdo a docentes anteriores en la materia";
                    dato7 = "D";
                    dato8 = "E";
                    dato9 = "F";
                    dato10 = "M";
                  }if (aux == auxD && gru == unoG && asig == unoA && num == unoN && ev == dosE){
                    dato3 = "Se elaboró en equipo y presenta los datos completos de los integrantes. ";
                    dato4 = "Presenta una lista mínimo de tres fuentes de consulta incorporando conocimientos sobre el estilo APA 6ª edición para citar y referenciarlas. ";
                    dato5 = "Muestra el uso de conocimientos de otras disciplinas contribuyendo a la formación integral del estudiante.";
                    dato6 = "Contiene ejemplos descritos correctamente.";
                    la = "Parece que eres nuevo, de acuerdo a docentes anteriores en la materia";
                    dato7 = "A";
                    dato8 = "B";
                    dato9 = "E";
                    dato10 = "M";
                  }if (aux == auxD && gru == unoG && asig == unoA && num == unoN && ev == tresE){
                    dato3 = "Fue entregado en tiempo y forma.";
                    dato4 = "Presenta una lista mínimo de tres fuentes de consulta incorporando conocimientos sobre el estilo APA 6ª edición para citar y referenciarlas. ";
                    dato5 = "Muestra el uso de conocimientos de otras disciplinas contribuyendo a la formación integral del estudiante. ";
                    dato6 = "Presenta la documentación estructurada de acuerdo a la orden de trabajo.";
                    la = "Parece que eres nuevo, de acuerdo a docentes anteriores en la materia";
                    dato7 = "F";
                    dato8 = "B";
                    dato9 = "E";
                    dato10 = "M";
                  }if (aux == auxD && gru == unoG && asig == unoA && num == unoN && ev == cuatroE){
                    dato3 = "Presenta una lista mínimo de tres fuentes de consulta incorporando conocimientos sobre el estilo APA 6ª edición para citar y referenciarlas.";
                    dato4 = "Muestra el uso de conocimientos de otras disciplinas contribuyendo a la formación integral del estudiante.";
                    dato5 = "Contiene imágenes explicadas que demuestran el uso de de dispositivos de red de forma clara y precisa.";
                    dato6 = "Muestra los procedimientos realizados para completar la actividad con base en lo solicitado.";
                    la = "Parece que eres nuevo, de acuerdo a docentes anteriores en la materia";
                    dato7 = "B";
                    dato8 = "E";
                    dato9 = "C";
                    dato10 = "M";
                  }if (aux == auxD && gru == unoG && asig == unoA && num == dosN && ev == unoE){
                    dato3 = "Contiene al menos dos fuentes de información en un segundo idioma, incorporando conocimientos sobre el estilo APA 6ª edición para citar y referenciar las fuentes de consulta.";
                    dato4 = "Utiilza conceptos aprendidos en otras asignaturas para documentar su trabajo.";
                    dato5 = "Presenta en los anexos la organización del trabajo en equipo en un cronograma de actividades, estableciendo tiempos y responsabilidades. ";
                    dato6 = "Muestra conclusiones personales y grupales de acuerdo a la competencia del tema.";
                    la = "Parece que eres nuevo, de acuerdo a docentes anteriores en la materia";
                    dato7 = "B";
                    dato8 = "E";
                    dato9 = "F";
                    dato10 = "M";
                  }if (aux == auxD && gru == unoG && asig == unoA && num == dosN && ev == dosE){
                    dato3 = "Se elaboró en equipo y presenta los datos completos de los integrantes. ";
                    dato4 = "Presenta una lista mínimo de tres fuentes de consulta incorporando conocimientos sobre el estilo APA 6ª edición para citar y referenciarlas. ";
                    dato5 = "Presenta en los anexos la organización del trabajo en equipo en un cronograma de actividades, estableciendo tiempos y responsabilidades. ";
                    dato6 = "Muestra variables de contraste de acuerdo a la competencia del tema.";
                    la = "Parece que eres nuevo, de acuerdo a docentes anteriores en la materia";
                    dato7 = "A";
                    dato8 = "B";
                    dato9 = "F";
                    dato10 = "M";
                  }if (aux == auxD && gru == unoG && asig == unoA && num == dosN && ev == tresE){
                    dato3 = "Presenta en los anexos la organización del trabajo en equipo en un cronograma de actividades, estableciendo tiempos y responsabilidades. ";
                    dato4 = "Presenta una lista mínimo de tres fuentes de consulta incorporando conocimientos sobre el estilo APA 6ª edición para citar y referenciarlas. ";
                    dato5 = "Muestra el uso de conocimientos de otras disciplinas contribuyendo a la formación integral del estudiante. ";
                    dato6 = "Funciona correctamente demostrando la conectividad de la red.";
                    la = "Parece que eres nuevo, de acuerdo a docentes anteriores en la materia";
                    dato7 = "F";
                    dato8 = "B";
                    dato9 = "E";
                    dato10 = "M";
                  }if (aux == auxD && gru == unoG && asig == unoA && num == dosN && ev == cuatroE){
                    dato3 = "Se elaboró en equipo y presenta los datos completos de los integrantes.  ";
                    dato4 = "Presenta en los anexos la organización del trabajo en equipo en un cronograma de actividades, estableciendo tiempos y responsabilidades. ";
                    dato5 = "Muestra el uso de conocimientos de otras disciplinas contribuyendo a la formación integral del estudiante. ";
                    dato6 = "Muestra los procedimientos realizados para completar la actividad con base en lo solicitado.";
                    la = "Parece que eres nuevo, de acuerdo a docentes anteriores en la materia";
                    dato7 = "A";
                    dato8 = "F";
                    dato9 = "E";
                    dato10 = "M";
                    //Comienza grupo 7F31
                    //Informe
                  }if (aux == auxD && gru == dosG && asig == unoA && num == unoN && ev == unoE){
                    dato3 = "Contiene al menos dos fuentes de información en un segundo idioma, incorporando conocimientos sobre el estilo APA 6ª edición para citar y referenciar las fuentes de consulta. ";
                    dato4 = "Presenta en los anexos la organización del trabajo en equipo en un cronograma de actividades, estableciendo tiempos y responsabilidades.";
                    dato5 = "Incluye imágenes relacionadas con el tema y las explica de forma clara y precisa. ";
                    dato6 = "Describe lo solicitado con base en la competencia del tema.";
                    la = "Parece que eres nuevo, de acuerdo a docentes anteriores en la materia";
                    dato7 = "B";
                    dato8 = "F";
                    dato9 = "D";
                    dato10 = "M";
                    dato10 = "M";
                  }if (aux == auxD && gru == dosG && asig == unoA && num == dosN && ev == unoE){
                    dato3 = "Utiilza conceptos aprendidos en otras asignaturas para documentar su trabajo.";
                    dato4 = "Incluye imágenes relacionadas con el tema y las explica de forma clara y precisa.";
                    dato5 = "Contiene al menos dos fuentes de información en un segundo idioma, incorporando conocimientos sobre el estilo APA 6ª edición para citar y referenciar las fuentes de consulta.";
                    dato6 = "Muestra conclusiones personales y grupales de acuerdo a la competencia del tema.";
                    la = "Parece que eres nuevo, de acuerdo a docentes anteriores en la materia";
                    dato7 = "E";
                    dato8 = "D";
                    dato9 = "B";
                    dato10 = "M";
                    //Cuadro
                  }if (aux == auxD && gru == dosG && asig == unoA && num == unoN && ev == dosE){
                    dato3 = "Presenta una lista mínimo de tres fuentes de consulta incorporando conocimientos sobre el estilo APA 6ª edición para citar y referenciarlas.";
                    dato4 = "Presenta en los anexos la organización del trabajo en equipo en un cronograma de actividades, estableciendo tiempos y responsabilidades.";
                    dato5 = "Se elaboró en equipo y presenta los datos completos de los integrantes. ";
                    dato6 = "Muestra variables de contraste de acuerdo a la competencia del tema.";
                    la = "Parece que eres nuevo, de acuerdo a docentes anteriores en la materia";
                    dato7 = "E";
                    dato8 = "D";
                    dato9 = "B";
                    dato10 = "M";
                  }if (aux == auxD && gru == dosG && asig == unoA && num == dosN && ev == dosE){
                    dato3 = "Se elaboró en equipo y presenta los datos completos de los integrantes. ";
                    dato4 = "Presenta en los anexos la organización del trabajo en equipo en un cronograma de actividades, estableciendo tiempos y responsabilidades.";
                    dato5 = "Presenta una lista mínimo de tres fuentes de consulta incorporando conocimientos sobre el estilo APA 6ª edición para citar y referenciarlas.";
                    dato6 = "Contiene ejemplos descritos correctamente.";
                    la = "Parece que eres nuevo, de acuerdo a docentes anteriores en la materia";
                    dato7 = "A";
                    dato8 = "F";
                    dato9 = "B";
                    dato10 = "M";
                    //Proyecto
                  }if (aux == auxD && gru == dosG && asig == unoA && num == unoN && ev == tresE){
                    dato3 = "Muestra el uso de conocimientos de otras disciplinas contribuyendo a la formación integral del estudiante.";
                    dato4 = "Fue entregado en tiempo y forma.";
                    dato5 = "Presenta una lista mínimo de tres fuentes de consulta incorporando conocimientos sobre el estilo APA 6ª edición para citar y referenciarlas.";
                    dato6 = "Presenta la documentación estructurada de acuerdo a la orden de trabajo.";
                    la = "Parece que eres nuevo, de acuerdo a docentes anteriores en la materia";
                    dato7 = "E";
                    dato8 = "D";
                    dato9 = "B";
                    dato10 = "M";
                  }if (aux == auxD && gru == dosG && asig == unoA && num == dosN && ev == tresE){
                     dato3 = "Muestra el uso de conocimientos de otras disciplinas contribuyendo a la formación integral del estudiante.";
                    dato4 = "Fue entregado en tiempo y forma.";
                    dato5 = "Presenta una lista mínimo de tres fuentes de consulta incorporando conocimientos sobre el estilo APA 6ª edición para citar y referenciarlas.";
                    dato6 = "Presenta las conclusiones de manera individual y general.";
                    la = "Parece que eres nuevo, de acuerdo a docentes anteriores en la materia";
                    dato7 = "E";
                    dato8 = "D";
                    dato9 = "B";
                    dato10 = "M";
                    //Reporte
                  }if (aux == auxD && gru == dosG && asig == unoA && num == dosN && ev == cuatroE){
                    dato3 = "Presenta en los anexos la organización del trabajo en equipo en un cronograma de actividades, estableciendo tiempos y responsabilidades.";
                    dato4 = "Contiene imágenes explicadas que demuestran el uso de de dispositivos de red de forma clara y precisa.";
                    dato5 = "Presenta una lista mínimo de tres fuentes de consulta incorporando conocimientos sobre el estilo APA 6ª edición para citar y referenciarlas.";
                    dato6 = "Muestra las pruebas realizadas para garantizar la conectividad de la red.";
                    la = "Parece que eres nuevo, de acuerdo a docentes anteriores en la materia";
                    dato7 = "F";
                    dato8 = "C";
                    dato9 = "B";
                    dato10 = "M";
                  }if (aux == auxD && gru == dosG && asig == unoA && num == dosN && ev == cuatroE){
                    dato3 = "Presenta en los anexos la organización del trabajo en equipo en un cronograma de actividades, estableciendo tiempos y responsabilidades.";
                    dato4 = "Contiene imágenes explicadas que demuestran el uso de de dispositivos de red de forma clara y precisa.";
                    dato5 = "Presenta una lista mínimo de tres fuentes de consulta incorporando conocimientos sobre el estilo APA 6ª edición para citar y referenciarlas.";
                    dato6 = "Presenta las conclusiones de manera individual y general.";
                    la = "Parece que eres nuevo, de acuerdo a docentes anteriores en la materia";
                    dato7 = "F";
                    dato8 = "C";
                    dato9 = "B";
                    dato10 = "M";
                    //7F41
                    //Informe
                  }if (aux == auxD && gru == tresG && asig == unoA && num == unoN && ev == unoE){
                    dato3 = "Utiilza conceptos aprendidos en otras asignaturas para documentar su trabajo.";
                    dato4 = "Incluye imágenes relacionadas con el tema y las explica de forma clara y precisa.";
                    dato5 = "Contiene al menos dos fuentes de información en un segundo idioma, incorporando conocimientos sobre el estilo APA 6ª edición para citar y referenciar las fuentes de consulta.";
                    dato6 = "Describe lo solicitado con base en la competencia del tema.";
                    la = "Parece que eres nuevo, de acuerdo a docentes anteriores en la materia";
                    dato7 = "E";
                    dato8 = "D";
                    dato9 = "B";
                    dato10 = "M";
                  }if (aux == auxD && gru == tresG && asig == unoA && num == dosN && ev == unoE){
                    dato3 = "Contiene al menos dos fuentes de información en un segundo idioma, incorporando conocimientos sobre el estilo APA 6ª edición para citar y referenciar las fuentes de consulta. ";
                    dato4 = "Presenta en los anexos la organización del trabajo en equipo en un cronograma de actividades, estableciendo tiempos y responsabilidades.";
                    dato5 = "Incluye imágenes relacionadas con el tema y las explica de forma clara y precisa. ";
                    dato6 = "Muestra estándares y protocolos para redes WAN/LAN.";
                    la = "Parece que eres nuevo, de acuerdo a docentes anteriores en la materia";
                    dato7 = "B";
                    dato8 = "F";
                    dato9 = "D";
                    dato10 = "M";
                    //Cuadro
                  }if (aux == auxD && gru == tresG && asig == unoA && num == unoN && ev == dosE){
                    dato3 = "Se elaboró en equipo y presenta los datos completos de los integrantes. ";
                    dato4 = "Presenta en los anexos la organización del trabajo en equipo en un cronograma de actividades, estableciendo tiempos y responsabilidades.";
                    dato5 = "Presenta una lista mínimo de tres fuentes de consulta incorporando conocimientos sobre el estilo APA 6ª edición para citar y referenciarlas.";
                    dato6 = "Se presenta de forma estructurada con base en lo indicado en la orden de trabajo.";
                    la = "Parece que eres nuevo, de acuerdo a docentes anteriores en la materia";
                    dato7 = "A";
                    dato8 = "F";
                    dato9 = "B";
                    dato10 = "M";
                  }if (aux == auxD && gru == tresG && asig == unoA && num == dosN && ev == dosE){
                    dato3 = "Presenta una lista mínimo de tres fuentes de consulta incorporando conocimientos sobre el estilo APA 6ª edición para citar y referenciarlas.";
                    dato4 = "Presenta en los anexos la organización del trabajo en equipo en un cronograma de actividades, estableciendo tiempos y responsabilidades.";
                    dato5 = "Se elaboró en equipo y presenta los datos completos de los integrantes. ";
                    dato6 = "Contiene ejemplos descritos correctamente.";
                    la = "Parece que eres nuevo, de acuerdo a docentes anteriores en la materia";
                    dato7 = "E";
                    dato8 = "D";
                    dato9 = "B";
                    dato10 = "M";
                    //Proyecto
                  }if (aux == auxD && gru == tresG && asig == unoA && num == unoN && ev == tresE){
                    dato3 = "Muestra el uso de conocimientos de otras disciplinas contribuyendo a la formación integral del estudiante.";
                    dato4 = "Fue entregado en tiempo y forma.";
                    dato5 = "Presenta una lista mínimo de tres fuentes de consulta incorporando conocimientos sobre el estilo APA 6ª edición para citar y referenciarlas.";
                    dato6 = "Presenta la documentación estructurada de acuerdo a la orden de trabajo.";
                    la = "Parece que eres nuevo, de acuerdo a docentes anteriores en la materia";
                    dato7 = "E";
                    dato8 = "F";
                    dato9 = "B";
                    dato10 = "M";
                  }if (aux == auxD && gru == tresG && asig == unoA && num == dosN && ev == tresE){
                    dato3 = "Muestra el uso de conocimientos de otras disciplinas contribuyendo a la formación integral del estudiante.";
                    dato4 = "Fue entregado en tiempo y forma.";
                    dato5 = "Presenta una lista mínimo de tres fuentes de consulta incorporando conocimientos sobre el estilo APA 6ª edición para citar y referenciarlas.";
                    dato6 = "Presenta las conclusiones de manera individual y general.";
                    la = "Parece que eres nuevo, de acuerdo a docentes anteriores en la materia";
                    dato7 = "E";
                    dato8 = "F";
                    dato9 = "B";
                    dato10 = "M";
                    //Reporte
                  }if (aux == auxD && gru == tresG && asig == unoA && num == dosN && ev == cuatroE){
                    dato3 = "Contiene imágenes explicadas que demuestran el uso de de dispositivos de red de forma clara y precisa.";
                    dato4 = "Muestra el uso de conocimientos de otras disciplinas contribuyendo a la formación integral del estudiante.";
                    dato5 = "Se elaboró en equipo y presenta los datos completos de los integrantes.";
                    dato6 = "Muestra las pruebas realizadas para garantizar la conectividad de la red.";
                    la = "Parece que eres nuevo, de acuerdo a docentes anteriores en la materia";
                    dato7 = "C";
                    dato8 = "E";
                    dato9 = "A";
                    dato10 = "M";
                  }if (aux == auxD && gru == tresG && asig == unoA && num == dosN && ev == cuatroE){
                    dato3 = "Contiene imágenes explicadas que demuestran el uso de de dispositivos de red de forma clara y precisa.";
                    dato4 = "Muestra el uso de conocimientos de otras disciplinas contribuyendo a la formación integral del estudiante.";
                    dato5 = "Se elaboró en equipo y presenta los datos completos de los integrantes.";
                    dato6 = "Se presenta de forma estructurada con base en lo incado en la orden de trabajo. ";
                    la = "Parece que eres nuevo, de acuerdo a docentes anteriores en la materia";
                    dato7 = "C";
                    dato8 = "E";
                    dato9 = "A";
                    dato10 = "M";
                    //Programacion
                    //7F21
                }if (aux == auxD && gru == unoG && asig == tresA && num == unoN && ev == unoE){
                    dato3 = "Presenta en los anexos, un cronograma de actividades, en la que se establecen tiempos, actividades y responsabilidades. ";
                    dato4 = "Incorpora contenido que indica en donde puede ser aplicado los conocimientos aprendidos (menciona al menos tres ambitos de aplicación).";
                    dato5 = "Se elabora en equipo, al presentar los nombres y matrículas sin errores ortográficos.";
                    dato6 = "Contiene imágenes de como se ven textos, vínculos, listas, tablas y contenedores.";
                    la = "Parece que eres nuevo, de acuerdo a docentes anteriores en la materia";
                    dato7 = "F";
                    dato8 = "E";
                    dato9 = "A";
                    dato10 = "M";
                  }if (aux == auxD && gru == unoG && asig == tresA && num == unoN && ev == dosE){
                    dato3 = "Fue entregado en tiempo y forma.";
                    dato4 = "Fue elaborado en digital. ";
                    dato5 = "Fue elaborado en equipo y presenta los datos completos de los integrantes (nombre y matrícula).";
                    dato6 = "Incluye al menos seis criterios de comparación.";
                    la = "Parece que eres nuevo, de acuerdo a docentes anteriores en la materia";
                    dato7 = "F";
                    dato8 = "D";
                    dato9 = "A";
                    dato10 = "M";
                  }if (aux == auxD && gru == unoG && asig == tresA && num == unoN && ev == tresE){
                    dato3 = "Fue realizado en equipo.";
                    dato4 = "Muestra conocimientos de otras asignaturas.";
                    dato5 = "Presenta en los anexos la organización del trabajo en equipo en un cronograma de actividades. ";
                    dato6 = "Es capaz de realizar cambios al código.";
                    la = "Parece que eres nuevo, de acuerdo a docentes anteriores en la materia";
                    dato7 = "A";
                    dato8 = "E";
                    dato9 = "F";
                    dato10 = "M";
                  }if (aux == auxD && gru == unoG && asig == tresA && num == unoN && ev == cuatroE){
                    dato3 = "Presenta en los anexos, un cronograma de actividades, en la que se establecen tiempos, actividades y responsabilidades. ";
                    dato4 = "Escribe correctamente los nombres de los integrantes.";
                    dato5 = "Muestra referencias en formato APA.";
                    dato6 = "Describe detalladamente los pasos realizados.";
                    la = "Parece que eres nuevo, de acuerdo a docentes anteriores en la materia";
                    dato7 = "F";
                    dato8 = "A";
                    dato9 = "B";
                    dato10 = "M";
                  }if (aux == auxD && gru == unoG && asig == tresA && num == dosN && ev == unoE){
                    dato3 = "Contiene al menos dos fuentes deinformación en un segundo idioma, en la cual incorpora conocimientos sobre el estilo APA 6a edición.";
                    dato4 = "Se elabora en equipo, al presentar los nombres y matrículas sin errores ortográficos.";
                    dato5 = "Presenta en los anexos, un cronograma de actividades, en la que se establecen tiempos, actividades y responsabilidades.";
                    dato6 = "Describe detalladamente los pasos realizados.";
                    la = "Parece que eres nuevo, de acuerdo a docentes anteriores en la materia";
                    dato7 = "B";
                    dato8 = "A";
                    dato9 = "F";
                    dato10 = "M";
                  }if (aux == auxD && gru == unoG && asig == tresA && num == dosN && ev == dosE){
                    dato3 = "Muestra al menos un párrafo de una fuente de información en un segundo idioma en formato APA. ";
                    dato4 = "Fue elaborado en digital.";
                    dato5 = "Fue entregado en tiempo y forma.";
                    dato6 = "Compara al menos tres framework para javascript del lado del cliente.";
                    la = "Parece que eres nuevo, de acuerdo a docentes anteriores en la materia";
                    dato7 = "B";
                    dato8 = "D";
                    dato9 = "F";
                    dato10 = "M";
                  }if (aux == auxD && gru == unoG && asig == tresA && num == dosN && ev == tresE){
                    dato3 = "Fue realizado en equipo.";
                    dato4 = "Presenta en los anexos la organización del trabajo en equipo en un cronograma de actividades.";
                    dato5 = "Muestra conocimientos de otras asignaturas.";
                    dato6 = "El proyecto realiza todo lo solicitado sin excepción alguna.";
                    la = "Parece que eres nuevo, de acuerdo a docentes anteriores en la materia";
                    dato7 = "A";
                    dato8 = "F";
                    dato9 = "E";
                    dato10 = "M";
                  }if (aux == auxD && gru == unoG && asig == tresA && num == dosN && ev == cuatroE){
                    dato3 = "Explica con imágenes el funcionamiento de la práctica. ";
                    dato4 = "Escribe relaciones de otras asignaturas. ";
                    dato5 = "Muestra referencias en formato APA.";
                    dato6 = "El proyecto realiza todo lo solicitado sin excepción alguna.";
                    la = "Parece que eres nuevo, de acuerdo a docentes anteriores en la materia";
                    dato7 = "C";
                    dato8 = "E";
                    dato9 = "B";
                    dato10 = "M";
                    //Comienza grupo 7F31
                    //Informe
                  }if (aux == auxD && gru == dosG && asig == tresA && num == unoN && ev == unoE){
                    dato3 = "Incorpora contenido que indica en donde puede ser aplicado los conocimientos aprendidos (menciona al menos tres ambitos de aplicación). ";
                    dato4 = "Contiene al menos dos fuentes deinformación en un segundo idioma, en la cual incorpora conocimientos sobre el estilo APA 6a edición.";
                    dato5 = "Se elabora en equipo, al presentar los nombres y matrículas sin errores ortográficos. ";
                    dato6 = "Cumple con todo lo solicitado en el plan de trabajo.";
                    la = "Parece que eres nuevo, de acuerdo a docentes anteriores en la materia";
                    dato7 = "E";
                    dato8 = "B";
                    dato9 = "A";
                    dato10 = "M";
                  }if (aux == auxD && gru == dosG && asig == tresA && num == dosN && ev == unoE){
                    dato3 = "Incorpora contenido que indica en donde puede ser aplicado los conocimientos aprendidos (menciona al menos tres ambitos de aplicación). ";
                    dato4 = "Contiene al menos dos fuentes deinformación en un segundo idioma, en la cual incorpora conocimientos sobre el estilo APA 6a edición.";
                    dato5 = "Se elabora en equipo, al presentar los nombres y matrículas sin errores ortográficos. ";
                    dato6 = "Presenta nombre de etiqueta, descripción y ejemplo de cómo se escriben.";
                    la = "Parece que eres nuevo, de acuerdo a docentes anteriores en la materia";
                    dato7 = "E";
                    dato8 = "B";
                    dato9 = "A";
                    dato10 = "M";
                    //Cuadro
                  }if (aux == auxD && gru == dosG && asig == tresA && num == unoN && ev == dosE){
                    dato3 = "Fue elaborado en digital. ";
                    dato4 = "Fue elaborado en equipo y presenta los datos completos de los integrantes (nombre y matrícula).";
                    dato5 = "Muestra al menos un párrafo de una fuente de información en un segundo idioma en formato APA.";
                    dato6 = "Presenta conclusión de forma individual la cual está relacionada al tema.";
                    la = "Parece que eres nuevo, de acuerdo a docentes anteriores en la materia";
                    dato7 = "D";
                    dato8 = "A";
                    dato9 = "B";
                    dato10 = "M";
                  }if (aux == auxD && gru == dosG && asig == tresA && num == dosN && ev == dosE){
                    dato3 = "Fue elaborado en digital. ";
                    dato4 = "Fue elaborado en equipo y presenta los datos completos de los integrantes (nombre y matrícula).";
                    dato5 = "Muestra al menos un párrafo de una fuente de información en un segundo idioma en formato APA.";
                    dato6 = "Incluye al menos seis criterios de comparación.";
                    la = "Parece que eres nuevo, de acuerdo a docentes anteriores en la materia";
                    dato7 = "D";
                    dato8 = "A";
                    dato9 = "B";
                    dato10 = "M";
                    //Proyecto
                  }if (aux == auxD && gru == dosG && asig == tresA && num == unoN && ev == tresE){
                    dato3 = "Incorpora contenido que indica en donde puede ser aplicado los conocimientos aprendidos (menciona al menos tres ambitos de aplicación). ";
                    dato4 = "Fue realizado en equipo.";
                    dato5 = "Presenta en los anexos la organización del trabajo en equipo en un cronograma de actividades.";
                    dato6 = "El proyecto realiza todo lo solicitado sin excepción alguna.";
                    la = "Parece que eres nuevo, de acuerdo a docentes anteriores en la materia";
                    dato7 = "E";
                    dato8 = "A";
                    dato9 = "F";
                    dato10 = "M";
                  }if (aux == auxD && gru == dosG && asig == tresA && num == dosN && ev == tresE){
                    dato3 = "Incorpora contenido que indica en donde puede ser aplicado los conocimientos aprendidos (menciona al menos tres ambitos de aplicación). ";
                    dato4 = "Fue realizado en equipo.";
                    dato5 = "Presenta en los anexos la organización del trabajo en equipo en un cronograma de actividades.";
                    dato6 = "Menciona las conclusiones de manera individual.";
                    la = "Parece que eres nuevo, de acuerdo a docentes anteriores en la materia";
                    dato7 = "E";
                    dato8 = "A";
                    dato9 = "F";
                    dato10 = "M";
                    //Reporte
                  }if (aux == auxD && gru == dosG && asig == tresA && num == unoN && ev == cuatroE){
                    dato3 = "Muestra referencias en formato APA. ";
                    dato4 = "Escribe correctamente los nombres de los integrantes.";
                    dato5 = "Escribe relaciones de otras asignaturas.";
                    dato6 = "Incluye capturas de la práctica funcionando y descritas correctamente.";
                    la = "Parece que eres nuevo, de acuerdo a docentes anteriores en la materia";
                    dato7 = "B";
                    dato8 = "A";
                    dato9 = "E";
                    dato10 = "M";
                  }if (aux == auxD && gru == dosG && asig == tresA && num == dosN && ev == cuatroE){
                    dato3 = "Muestra referencias en formato APA. ";
                    dato4 = "Escribe correctamente los nombres de los integrantes.";
                    dato5 = "Escribe relaciones de otras asignaturas.";
                    dato6 = "Termina correctamente todo lo que se le solicita.";
                    la = "Parece que eres nuevo, de acuerdo a docentes anteriores en la materia";
                    dato7 = "B";
                    dato8 = "A";
                    dato9 = "E";
                    dato10 = "M";
                    //7F41
                    //Informe
                  }if (aux == auxD && gru == tresG && asig == tresA && num == unoN && ev == unoE){
                    dato3 = "Contiene al menos dos fuentes deinformación en un segundo idioma, en la cual incorpora conocimientos sobre el estilo APA 6a edición. ";
                    dato4 = "Se elabora en equipo, al presentar los nombres y matrículas sin errores ortográficos. ";
                    dato5 = "Presenta en los anexos, un cronograma de actividades, en la que se establecen tiempos, actividades y responsabilidades. ";
                    dato6 = "Contiene del lenguaje de marcas la instrucción para realizar textos, vínculos, listas, tablas y contenedores.";
                    la = "Parece que eres nuevo, de acuerdo a docentes anteriores en la materia";
                    dato7 = "B";
                    dato8 = "A";
                    dato9 = "F";
                    dato10 = "M";
                  }if (aux == auxD && gru == tresG && asig == tresA && num == dosN && ev == unoE){
                    dato3 = "Contiene al menos dos fuentes deinformación en un segundo idioma, en la cual incorpora conocimientos sobre el estilo APA 6a edición. ";
                    dato4 = "Se elabora en equipo, al presentar los nombres y matrículas sin errores ortográficos. ";
                    dato5 = "Presenta en los anexos, un cronograma de actividades, en la que se establecen tiempos, actividades y responsabilidades. ";
                    dato6 = "Contiene del lenguaje de marcas la instrucción para realizar textos, vínculos, listas, tablas y contenedores.";
                    la = "Parece que eres nuevo, de acuerdo a docentes anteriores en la materia";
                    dato7 = "B";
                    dato8 = "A";
                    dato9 = "F";
                    dato10 = "M";
                    //Cuadro
                  }if (aux == auxD && gru == tresG && asig == tresA && num == unoN && ev == dosE){
                    dato3 = "Fue elaborado en equipo y presenta los datos completos de los integrantes (nombre y matrícula).";
                    dato4 = "Muestra al menos un párrafo de una fuente de información en un segundo idioma en formato APA.";
                    dato5 = "Fue elaborado en digital.";
                    dato6 = "Compara al menos tres framework para javascript del lado del cliente.";
                    la = "Parece que eres nuevo, de acuerdo a docentes anteriores en la materia";
                    dato7 = "A";
                    dato8 = "B";
                    dato9 = "D";
                    dato10 = "M";
                  }if (aux == auxD && gru == tresG && asig == tresA && num == dosN && ev == dosE){
                    dato3 = "Fue elaborado en equipo y presenta los datos completos de los integrantes (nombre y matrícula).";
                    dato4 = "Muestra al menos un párrafo de una fuente de información en un segundo idioma en formato APA.";
                    dato5 = "Fue elaborado en digital.";
                    dato6 = "Incluye al menos seis criterios de comparación.";
                    la = "Parece que eres nuevo, de acuerdo a docentes anteriores en la materia";
                    dato7 = "A";
                    dato8 = "B";
                    dato9 = "D";
                    dato10 = "M";
                    //Proyecto
                  }if (aux == auxD && gru == tresG && asig == tresA && num == unoN && ev == tresE){
                    dato3 = "Incorpora contenido que indica en donde puede ser aplicado los conocimientos aprendidos (menciona al menos tres ambitos de aplicación).";
                    dato4 = "Presenta en los anexos la organización del trabajo en equipo en un cronograma de actividades.";
                    dato5 = "Fue realizado individual.";
                    dato6 = "Es capaz de realizar cambios al código.";
                    la = "Parece que eres nuevo, de acuerdo a docentes anteriores en la materia";
                    dato7 = "E";
                    dato8 = "F";
                    dato9 = "A";
                    dato10 = "M";
                  }if (aux == auxD && gru == tresG && asig == tresA && num == dosN && ev == tresE){
                    dato3 = "Incorpora contenido que indica en donde puede ser aplicado los conocimientos aprendidos (menciona al menos tres ambitos de aplicación).";
                    dato4 = "Presenta en los anexos la organización del trabajo en equipo en un cronograma de actividades.";
                    dato5 = "Fue realizado en equipo.";
                    dato6 = "Menciona las conclusiones de manera individual.";
                    la = "Parece que eres nuevo, de acuerdo a docentes anteriores en la materia";
                    dato7 = "E";
                    dato8 = "F";
                    dato9 = "A";
                    dato10 = "M";
                    //Reporte
                  }if (aux == auxD && gru == tresG && asig == tresA && num == dosN && ev == cuatroE){
                    dato3 = "Presenta en los anexos, un cronograma de actividades, en la que se establecen tiempos, actividades y responsabilidades. ";
                    dato4 = "Escribe correctamente los nombres de los integrantes.";
                    dato5 = "Explica con imágenes el funcionamiento de la práctica.";
                    dato6 = "Describe detalladamente los pasos realizados.";
                    la = "Parece que eres nuevo, de acuerdo a docentes anteriores en la materia";
                    dato7 = "F";
                    dato8 = "A";
                    dato9 = "C";
                    dato10 = "M";
                  }if (aux == auxD && gru == tresG && asig == tresA && num == dosN && ev == cuatroE){
                    dato3 = "Presenta en los anexos, un cronograma de actividades, en la que se establecen tiempos, actividades y responsabilidades. ";
                    dato4 = "Escribe correctamente los nombres de los integrantes.";
                    dato5 = "Explica con imágenes el funcionamiento de la práctica.";
                    dato6 = "Termina correctamente todo lo que se le solicita.";
                    la = "Parece que eres nuevo, de acuerdo a docentes anteriores en la materia";
                    dato7 = "F";
                    dato8 = "A";
                    dato9 = "C";
                    dato10 = "M";
                    
                  }
              //Docente uno
              //Cómputo en la nube
              //Grupo 7F21
            }if (dato2 == unoD && gru == unoG && asig == dosA && num == unoN && ev == unoE){
              dato3 = "Menciona la posible aplicación de lo expuesto en otras disciplinas de un modo claro y puntual.";
              dato4 = "Presenta y cita al menos 2 fuentes adicionales de información en un según idioma en formato APA.";
              dato5 = "Presenta una propuesta de alguna plataforma para desarrollo de aplicaciones en la nube de un modo puntual.";
              dato6 = "Muestra un ejemplo de una aplicación en la nube existente en donde se resalte la información presentada en su informede manera clara y prescisa.";
              la = "Hola, de acuerdo a tus antecedentes";
              dato7 = "E";
              dato8 = "B";
              dato9 = "A";
              dato10 = "M";
            }if (dato2 == unoD && gru == unoG && asig == dosA && num == unoN && ev == dosE){
              dato3 = "Incluye una propuesta de uso de alguna plataforma para la implementación del caso de estudio de un modo pertinente a lo presentado.";
              dato4 = "Muestra un punto de analisis entre computo en la nube y computo tradicional de acuerdo algún trabajo citado en la bibliografía.";
              dato5 = "Incluye ejemplos de desarrollo de aplicaciones en las plataformas presentadas de un modo concreto. ";
              dato6 = "Muestra un punto de vista personal sobre el mejor modo de implementación del caso de estudio de una manera concisa.";
              la = "Hola, de acuerdo a tus antecedentes";
              dato7 = "B";
              dato8 = "D";
              dato9 = "A";
              dato10 = "M";
            }if (dato2 == unoD && gru == unoG && asig == dosA && num == unoN && ev == tresE){
              dato3 = "El estudiante cita y muestra el uso de 3 procedimientos aprendidos en otras asignaturas o propuestos por él para el desarrollo del proyecto. ";
              dato4 = "El estudiante entrega en el tiempo requerido el proyecto al 100%.";
              dato5 = "El proyecto puede resolver una problemática de 3 disciplinas diferentes a sistemas computacionales.";
              dato6 = "El estudiante muestra la arquitectura de la solución propuesta y es capaz de modificar la implementación del proyecto de acuerdo a lo requeirdo por el docente en un 80 y 100 %.";
              la = "Hola, de acuerdo a tus antecedentes";
              dato7 = "C";
              dato8 = "F";
              dato9 = "E";
              dato10 = "M";
            }if (dato2 == unoD && gru == unoG && asig == dosA && num == unoN && ev == cuatroE){
              dato3 = "Presenta un cronograma de actividades. ";
              dato4 = "Menciona como la práctica ayuda a otras disciplinas.";
              dato5 = "Lo entrega en el tiempo solicitado.";
              dato6 = "El estudiante es capaz de realizar un cambio al código sin nigún problema.";
              la = "Hola, de acuerdo a tus antecedentes";
              dato7 = "A";
              dato8 = "E";
              dato9 = "F";
              dato10 = "M";
            }if (dato2 == unoD && gru == unoG && asig == dosA && num == dosN && ev == unoE){
              dato3 = "Menciona la posible aplicación de lo expuesto en otras disciplinas de un modo claro y puntual.";
              dato4 = "Presenta y cita al menos 2 fuentes adicionales de información en un según idioma en formato APA.";
              dato5 = "Presenta una propuesta de alguna plataforma para desarrollo de aplicaciones en la nube de un modo puntual.";
              dato6 = "Presenta una propuesta de alguna plataforma para desarrollo de aplicaciones en la nube de un modo puntual.";
              la = "Hola, de acuerdo a tus antecedentes";
              dato7 = "E";
              dato8 = "B";
              dato9 = "A";
              dato10 = "M";
            }if (dato2 == unoD && gru == unoG && asig == dosA && num == dosN && ev == dosE){
              dato3 = "Incluye una propuesta de uso de alguna plataforma para la implementación del caso de estudio de un modo pertinente a lo presentado.";
              dato4 = "Incluye ejemplos de desarrollo de aplicaciones en las plataformas presentadas de un modo concreto.";
              dato5 = "Muestra un punto de analisis entre computo en la nube y computo tradicional de acuerdo algún trabajo citado en la bibliografía. ";
              dato6 = "Muestra un contraste entre las ventajas y 2 desventajas del desarrollo tradicional y la nube de mayor a menor importancia.";
              la = "Hola, de acuerdo a tus antecedentes";
              dato7 = "B";
              dato8 = "A";
              dato9 = "D";
              dato10 = "M";
            }if (dato2 == unoD && gru == unoG && asig == dosA && num == dosN && ev == tresE){
              dato3 = "El estudiante cita y muestra el uso de 3 procedimientos aprendidos en otras asignaturas o propuestos por él para el desarrollo del proyecto. ";
              dato4 = "El estudiante entrega en el tiempo requerido el proyecto al 100%.";
              dato5 = "El proyecto puede resolver una problemática de 3 disciplinas diferentes a sistemas computacionales.";
              dato6 = "El proyecto presentado utiliza 3 componentes de computación en la nube para su solución.";
              la = "Hola, de acuerdo a tus antecedentes";
              dato7 = "C";
              dato8 = "F";
              dato9 = "E";
              dato10 = "M";
            }if (dato2 == unoD && gru == unoG && asig == dosA && num == dosN && ev == cuatroE){
              dato3 = "Presenta un cronograma de actividades. ";
              dato4 = "Menciona como la práctica ayuda a otras disciplinas.";
              dato5 = "Lo entrega en el tiempo solicitado.";
              dato6 = "El estudiante termina de un 80 al 100% la práctica.";
              la = "Hola, de acuerdo a tus antecedentes";
              dato7 = "A";
              dato8 = "E";
              dato9 = "F";
              dato10 = "M";
              //Comienza grupo 7F31
              //Informe
            }if (dato2 == unoD && gru == dosG && asig == dosA && num == unoN && ev == unoE){
              dato3 = "Presenta y cita al menos 2 fuentes adicionales de información en un según idioma en formato APA. ";
              dato4 = "Menciona la posible aplicación de lo expuesto en otras disciplinas de un modo claro y puntual.";
              dato5 = "Presenta una propuesta de alguna plataforma para desarrollo de aplicaciones en la nube de un modo puntual.";
              dato6 = "Menciona sus conclusiones y comentarios del tema expuesto de un modo coherente y de acuerdo a la competencia del tema.";
              la = "Hola, de acuerdo a tus antecedentes";
              dato7 = "B";
              dato8 = "E";
              dato9 = "A";
              dato10 = "M";
            }if (dato2 == unoD && gru == dosG && asig == dosA && num == dosN && ev == unoE){
              dato3 = "Presenta y cita al menos 2 fuentes adicionales de información en un según idioma en formato APA. ";
              dato4 = "Menciona la posible aplicación de lo expuesto en otras disciplinas de un modo claro y puntual.";
              dato5 = "Presenta una propuesta de alguna plataforma para desarrollo de aplicaciones en la nube de un modo puntual.";
              dato6 = "Muestra un ejemplo de una aplicación en la nube existente en donde se resalte la información presentada en su informe de manera clara y prescisa.";
              la = "Hola, de acuerdo a tus antecedentes";
              dato7 = "B";
              dato8 = "E";
              dato9 = "A";
              dato10 = "M";
              //Cuadro
            }if (dato2 == unoD && gru == dosG && asig == dosA && num == unoN && ev == dosE){
              dato3 = "Muestra un punto de analisis entre computo en la nube y computo tradicional de acuerdo algún trabajo citado en la bibliografía.";
              dato4 = "Incluye una propuesta de uso de alguna plataforma para la implementación del caso de estudio de un modo pertinente a lo presentado.";
              dato5 = "Incluye ejemplos de desarrollo de aplicaciones en las plataformas presentadas de un modo concreto. ";
              dato6 = "Muestra un punto de vista personal sobre el mejor modo de implementación del caso de estudio de una manera concisa. ";
              la = "Hola, de acuerdo a tus antecedentes";
              dato7 = "D";
              dato8 = "B";
              dato9 = "A";
              dato10 = "M";
            }if (dato2 == unoD && gru == dosG && asig == dosA && num == dosN && ev == dosE){
              dato3 = "Muestra un punto de analisis entre computo en la nube y computo tradicional de acuerdo algún trabajo citado en la bibliografía.";
              dato4 = "Incluye una propuesta de uso de alguna plataforma para la implementación del caso de estudio de un modo pertinente a lo presentado.";
              dato5 = "Incluye ejemplos de desarrollo de aplicaciones en las plataformas presentadas de un modo concreto. ";
              dato6 = "Muestra el análisis de un caso de estudio real del 1 desarrollo modo tradicional de un sistema y mediante computacional el uso de la de nube de manera sencilla y condensada.";
              la = "Hola, de acuerdo a tus antecedentes";
              dato7 = "D";
              dato8 = "B";
              dato9 = "A";
              dato10 = "M";
              //Proyecto
            }if (dato2 == unoD && gru == dosG && asig == dosA && num == unoN && ev == tresE){
              dato3 = "El proyecto puede resolver una problemática de 3 disciplinas diferentes a sistemas computacionales.";
              dato4 = "El estudiante entrega en el tiempo requerido el proyecto al 100%.";
              dato5 = "El estudiante cita y muestra el uso de 3 procedimientos aprendidos en otras asignaturas o propuestos por él para el desarrollo del proyecto.";
              dato6 = "El estudiante describe de manera clara la funcion de los 3 componentes utilizados de computacion en la nube y su relación para la solución del proyecto.";
              la = "Hola, de acuerdo a tus antecedentes";
              dato7 = "E";
              dato8 = "F";
              dato9 = "C";
              dato10 = "M";
            }if (dato2 == unoD && gru == dosG && asig == dosA && num == dosN && ev == tresE){
               dato3 = "El proyecto puede resolver una problemática de 3 disciplinas diferentes a sistemas computacionales.";
              dato4 = "El estudiante entrega en el tiempo requerido el proyecto al 100%.";
              dato5 = "El estudiante cita y muestra el uso de 3 procedimientos aprendidos en otras asignaturas o propuestos por él para el desarrollo del proyecto.";
              dato6 = "El proyecto es implementado en un rango del 80 al 100 % .";
              la = "Hola, de acuerdo a tus antecedentes";
              dato7 = "E";
              dato8 = "F";
              dato9 = "C";
              dato10 = "M";
              //Reporte
            }if (dato2 == unoD && gru == dosG && asig == dosA && num == dosN && ev == cuatroE){
              dato3 = "Menciona como la práctica ayuda a otras disciplinas.";
              dato4 = "Menciona las conclusiones de manera clara y precisa de acuerdo a la competencia del tema.";
              dato5 = "Lo entrega en el tiempo solicitado. ";
              dato6 = "El estudiante termina de un 80 al 100% la práctica.";
              la = "Hola, de acuerdo a tus antecedentes";
              dato7 = "E";
              dato8 = "C";
              dato9 = "F";
              dato10 = "M";
            }if (dato2 == unoD && gru == dosG && asig == dosA && num == dosN && ev == cuatroE){
              dato3 = "Menciona como la práctica ayuda a otras disciplinas.";
              dato4 = "Menciona las conclusiones de manera clara y precisa de acuerdo a la competencia del tema.";
              dato5 = "Lo entrega en el tiempo solicitado. ";
              dato6 = "Muestra capturas de la práctica funcionando con lo solicitado.";
              la = "Hola, de acuerdo a tus antecedentes";
              dato7 = "E";
              dato8 = "C";
              dato9 = "F";
              dato10 = "M";
              //7F41
              //Informe
            }if (dato2 == unoD && gru == tresG && asig == dosA && num == unoN && ev == unoE){
              dato3 = "Presenta y cita al menos 2 fuentes adicionales de información en un según idioma en formato APA. ";
              dato4 = "Presenta una propuesta de alguna plataforma para desarrollo de aplicaciones en la nube de un modo puntual. ";
              dato5 = "Menciona la posible aplicación de lo expuesto en otras disciplinas de un modo claro y puntual.";
              dato6 = "Presenta una propuesta de alguna plataforma para desarrollo de aplicaciones en la nube de un modo puntual. ";
              la = "Hola, de acuerdo a tus antecedentes";
              dato7 = "E";
              dato8 = "C";
              dato9 = "F";
              dato10 = "M";
            }if (dato2 == unoD && gru == tresG && asig == dosA && num == dosN && ev == unoE){
              dato3 = "Presenta y cita al menos 2 fuentes adicionales de información en un según idioma en formato APA. ";
              dato4 = "Presenta una propuesta de alguna plataforma para desarrollo de aplicaciones en la nube de un modo puntual. ";
              dato5 = "Menciona la posible aplicación de lo expuesto en otras disciplinas de un modo claro y puntual.";
              dato6 = "Presenta información sobre algún aspecto para el desarrollo de aplicaciones en la nube y ejemplos del mismo de manera clara y precisa. ";
              la = "Hola, de acuerdo a tus antecedentes";
              dato7 = "E";
              dato8 = "C";
              dato9 = "F";
              dato10 = "M";
              //Cuadro
            }if (dato2 == unoD && gru == tresG && asig == dosA && num == unoN && ev == dosE){
              dato3 = "Incluye ejemplos de desarrollo de aplicaciones en las plataformas presentadas de un modo concreto.";
              dato4 = "Muestra un punto de analisis entre computo en la nube y computo tradicional de acuerdo algún trabajo citado en la bibliografía.";
              dato5 = "Incluye una propuesta de uso de alguna plataforma para la implementación del caso de estudio de un modo pertinente a lo presentado. ";
              dato6 = "Muestra un contraste entre las ventajas y 2 desventajas del desarrollo tradicional y la nube de mayor a menor importancia. ";
              la = "Hola, de acuerdo a tus antecedentes";
              dato7 = "A";
              dato8 = "D";
              dato9 = "B";
              dato10 = "M";
            }if (dato2 == unoD && gru == tresG && asig == dosA && num == dosN && ev == dosE){
              dato3 = "Incluye ejemplos de desarrollo de aplicaciones en las plataformas presentadas de un modo concreto.";
              dato4 = "Muestra un punto de analisis entre computo en la nube y computo tradicional de acuerdo algún trabajo citado en la bibliografía.";
              dato5 = "Incluye una propuesta de uso de alguna plataforma para la implementación del caso de estudio de un modo pertinente a lo presentado. ";
              dato6 = "Muestra el análisis de un caso de estudio real del 1 desarrollo modo tradicional de un sistema y mediante computacional el uso de la de nube de manera sencilla y condensada. ";
              la = "Hola, de acuerdo a tus antecedentes";
              dato7 = "A";
              dato8 = "D";
              dato9 = "B";
              dato10 = "M";
              //Proyecto
            }if (dato2 == unoD && gru == tresG && asig == dosA && num == unoN && ev == tresE){
              dato3 = "El estudiante entrega en el tiempo requerido el proyecto al 100%. ";
              dato4 = "El proyecto puede resolver una problemática de 3 disciplinas diferentes a sistemas computacionales.";
              dato5 = "El estudiante cita y muestra el uso de 3 procedimientos aprendidos en otras asignaturas o propuestos por él para el desarrollo del proyecto.";
              dato6 = "El estudiante muestra la arquitectura de la solución propuesta y es capaz de modificar la implementación del proyecto de acuerdo a lo requeirdo por el docente en un 80 y 100 %.";
              la = "Hola, de acuerdo a tus antecedentes";
              dato7 = "A";
              dato8 = "D";
              dato9 = "B";
              dato10 = "M";
            }if (dato2 == unoD && gru == tresG && asig == dosA && num == dosN && ev == tresE){
               dato3 = "El estudiante entrega en el tiempo requerido el proyecto al 100%. ";
              dato4 = "El proyecto puede resolver una problemática de 3 disciplinas diferentes a sistemas computacionales.";
              dato5 = "El estudiante cita y muestra el uso de 3 procedimientos aprendidos en otras asignaturas o propuestos por él para el desarrollo del proyecto.";
              dato6 = "El estudiante describe de manera clara la funcion de los 3 componentes utilizados de computacion en la nube y su relación para la solución del proyecto.";
              la = "Hola, de acuerdo a tus antecedentes";
              dato7 = "A";
              dato8 = "D";
              dato9 = "B";
              dato10 = "M";
              //Reporte
            }if (dato2 == unoD && gru == tresG && asig == dosA && num == unoN && ev == cuatroE){
              dato3 = "Lo entrega en el tiempo solicitado. ";
              dato4 = "Menciona como la práctica ayuda a otras disciplinas. ";
              dato5 = "Presenta un cronograma de actividades. ";
              dato6 = "El estudiante es capaz de realizar un cambio al código sin nigún problema.";
              la = "Hola, de acuerdo a tus antecedentes";
              dato7 = "A";
              dato8 = "D";
              dato9 = "B";
              dato10 = "M";
            }if (dato2 == unoD && gru == tresG && asig == dosA && num == dosN && ev == cuatroE){
              dato3 = "Lo entrega en el tiempo solicitado. ";
              dato4 = "Menciona como la práctica ayuda a otras disciplinas. ";
              dato5 = "Presenta un cronograma de actividades. ";
              dato6 = "Muestra capturas de la práctica funcionando con lo solicitado.";
              la = "Hola, de acuerdo a tus antecedentes";
              dato7 = "A";
              dato8 = "D";
              dato9 = "B";
              dato10 = "M";
              //REDES
              //7F21
              //Informe
            }if (dato2 == unoD && gru == unoG && asig == unoA && num == unoN && ev == unoE){
              dato3 = "Incluye imágenes relacionadas con el tema y las explica de forma clara y precisa. ";
              dato4 = "Utiilza conceptos aprendidos en otras asignaturas para documentar su trabajo.";
              dato5 = "Presenta en los anexos la organización del trabajo en equipo en un cronograma de actividades, estableciendo tiempos y responsabilidades. ";
              dato6 = "Muestra estándares y protocolos para redes WAN/LAN.";
              la = "Hola, de acuerdo a los antecedentes de otros docentes en esta materia";
              dato7 = "D";
              dato8 = "E";
              dato9 = "F";
              dato10 = "M";
            }if (dato2 == unoD && gru == unoG && asig == unoA && num == unoN && ev == dosE){
              dato3 = "Se elaboró en equipo y presenta los datos completos de los integrantes. ";
              dato4 = "Presenta una lista mínimo de tres fuentes de consulta incorporando conocimientos sobre el estilo APA 6ª edición para citar y referenciarlas. ";
              dato5 = "Muestra el uso de conocimientos de otras disciplinas contribuyendo a la formación integral del estudiante.";
              dato6 = "Contiene ejemplos descritos correctamente.";
              la = "Hola, de acuerdo a los antecedentes de otros docentes en esta materia";
              dato7 = "A";
              dato8 = "B";
              dato9 = "E";
              dato10 = "M";
            }if (dato2 == unoD && gru == unoG && asig == unoA && num == unoN && ev == tresE){
              dato3 = "Fue entregado en tiempo y forma.";
              dato4 = "Presenta una lista mínimo de tres fuentes de consulta incorporando conocimientos sobre el estilo APA 6ª edición para citar y referenciarlas. ";
              dato5 = "Muestra el uso de conocimientos de otras disciplinas contribuyendo a la formación integral del estudiante. ";
              dato6 = "Presenta la documentación estructurada de acuerdo a la orden de trabajo.";
              la = "Hola, de acuerdo a los antecedentes de otros docentes en esta materia";
              dato7 = "F";
              dato8 = "B";
              dato9 = "E";
              dato10 = "M";
            }if (dato2 == unoD && gru == unoG && asig == unoA && num == unoN && ev == cuatroE){
              dato3 = "Presenta una lista mínimo de tres fuentes de consulta incorporando conocimientos sobre el estilo APA 6ª edición para citar y referenciarlas.";
              dato4 = "Muestra el uso de conocimientos de otras disciplinas contribuyendo a la formación integral del estudiante.";
              dato5 = "Contiene imágenes explicadas que demuestran el uso de de dispositivos de red de forma clara y precisa.";
              dato6 = "Muestra los procedimientos realizados para completar la actividad con base en lo solicitado.";
              la = "Hola, de acuerdo a los antecedentes de otros docentes en esta materia";
              dato7 = "B";
              dato8 = "E";
              dato9 = "C";
              dato10 = "M";
            }if (dato2 == unoD && gru == unoG && asig == unoA && num == dosN && ev == unoE){
              dato3 = "Contiene al menos dos fuentes de información en un segundo idioma, incorporando conocimientos sobre el estilo APA 6ª edición para citar y referenciar las fuentes de consulta.";
              dato4 = "Utiilza conceptos aprendidos en otras asignaturas para documentar su trabajo.";
              dato5 = "Presenta en los anexos la organización del trabajo en equipo en un cronograma de actividades, estableciendo tiempos y responsabilidades. ";
              dato6 = "Muestra conclusiones personales y grupales de acuerdo a la competencia del tema.";
              la = "Hola, de acuerdo a los antecedentes de otros docentes en esta materia";
              dato7 = "B";
              dato8 = "E";
              dato9 = "F";
              dato10 = "M";
            }if (dato2 == unoD && gru == unoG && asig == unoA && num == dosN && ev == dosE){
              dato3 = "Se elaboró en equipo y presenta los datos completos de los integrantes. ";
              dato4 = "Presenta una lista mínimo de tres fuentes de consulta incorporando conocimientos sobre el estilo APA 6ª edición para citar y referenciarlas. ";
              dato5 = "Presenta en los anexos la organización del trabajo en equipo en un cronograma de actividades, estableciendo tiempos y responsabilidades. ";
              dato6 = "Muestra variables de contraste de acuerdo a la competencia del tema.";
              la = "Hola, de acuerdo a los antecedentes de otros docentes en esta materia";
              dato7 = "A";
              dato8 = "B";
              dato9 = "F";
              dato10 = "M";
            }if (dato2 == unoD && gru == unoG && asig == unoA && num == dosN && ev == tresE){
              dato3 = "Presenta en los anexos la organización del trabajo en equipo en un cronograma de actividades, estableciendo tiempos y responsabilidades. ";
              dato4 = "Presenta una lista mínimo de tres fuentes de consulta incorporando conocimientos sobre el estilo APA 6ª edición para citar y referenciarlas. ";
              dato5 = "Muestra el uso de conocimientos de otras disciplinas contribuyendo a la formación integral del estudiante. ";
              dato6 = "Funciona correctamente demostrando la conectividad de la red.";
              la = "Hola, de acuerdo a los antecedentes de otros docentes en esta materia";
              dato7 = "F";
              dato8 = "B";
              dato9 = "E";
              dato10 = "M";
            }if (dato2 == unoD && gru == unoG && asig == unoA && num == dosN && ev == cuatroE){
              dato3 = "Se elaboró en equipo y presenta los datos completos de los integrantes.  ";
              dato4 = "Presenta en los anexos la organización del trabajo en equipo en un cronograma de actividades, estableciendo tiempos y responsabilidades. ";
              dato5 = "Muestra el uso de conocimientos de otras disciplinas contribuyendo a la formación integral del estudiante. ";
              dato6 = "Muestra los procedimientos realizados para completar la actividad con base en lo solicitado.";
              la = "Hola, de acuerdo a los antecedentes de otros docentes en esta materia";
              dato7 = "A";
              dato8 = "F";
              dato9 = "E";
              dato10 = "M";
              //Comienza grupo 7F31
              //Informe
            }if (dato2 == unoD && gru == dosG && asig == unoA && num == unoN && ev == unoE){
              dato3 = "Contiene al menos dos fuentes de información en un segundo idioma, incorporando conocimientos sobre el estilo APA 6ª edición para citar y referenciar las fuentes de consulta. ";
              dato4 = "Presenta en los anexos la organización del trabajo en equipo en un cronograma de actividades, estableciendo tiempos y responsabilidades.";
              dato5 = "Incluye imágenes relacionadas con el tema y las explica de forma clara y precisa. ";
              dato6 = "Describe lo solicitado con base en la competencia del tema.";
              la = "Hola, de acuerdo a los antecedentes de otros docentes en esta materia";
              dato7 = "B";
              dato8 = "F";
              dato9 = "D";
              dato10 = "M";
              dato10 = "M";
            }if (dato2 == unoD && gru == dosG && asig == unoA && num == dosN && ev == unoE){
              dato3 = "Utiilza conceptos aprendidos en otras asignaturas para documentar su trabajo.";
              dato4 = "Incluye imágenes relacionadas con el tema y las explica de forma clara y precisa.";
              dato5 = "Contiene al menos dos fuentes de información en un segundo idioma, incorporando conocimientos sobre el estilo APA 6ª edición para citar y referenciar las fuentes de consulta.";
              dato6 = "Muestra conclusiones personales y grupales de acuerdo a la competencia del tema.";
              la = "Hola, de acuerdo a los antecedentes de otros docentes en esta materia";
              dato7 = "E";
              dato8 = "D";
              dato9 = "B";
              dato10 = "M";
              //Cuadro
            }if (dato2 == unoD && gru == dosG && asig == unoA && num == unoN && ev == dosE){
              dato3 = "Presenta una lista mínimo de tres fuentes de consulta incorporando conocimientos sobre el estilo APA 6ª edición para citar y referenciarlas.";
              dato4 = "Presenta en los anexos la organización del trabajo en equipo en un cronograma de actividades, estableciendo tiempos y responsabilidades.";
              dato5 = "Se elaboró en equipo y presenta los datos completos de los integrantes. ";
              dato6 = "Muestra variables de contraste de acuerdo a la competencia del tema.";
              la = "Hola, de acuerdo a los antecedentes de otros docentes en esta materia";
              dato7 = "E";
              dato8 = "D";
              dato9 = "B";
              dato10 = "M";
            }if (dato2 == unoD && gru == dosG && asig == unoA && num == dosN && ev == dosE){
              dato3 = "Se elaboró en equipo y presenta los datos completos de los integrantes. ";
              dato4 = "Presenta en los anexos la organización del trabajo en equipo en un cronograma de actividades, estableciendo tiempos y responsabilidades.";
              dato5 = "Presenta una lista mínimo de tres fuentes de consulta incorporando conocimientos sobre el estilo APA 6ª edición para citar y referenciarlas.";
              dato6 = "Contiene ejemplos descritos correctamente.";
              la = "Hola, de acuerdo a los antecedentes de otros docentes en esta materia";
              dato7 = "A";
              dato8 = "F";
              dato9 = "B";
              dato10 = "M";
              //Proyecto
            }if (dato2 == unoD && gru == dosG && asig == unoA && num == unoN && ev == tresE){
              dato3 = "Muestra el uso de conocimientos de otras disciplinas contribuyendo a la formación integral del estudiante.";
              dato4 = "Fue entregado en tiempo y forma.";
              dato5 = "Presenta una lista mínimo de tres fuentes de consulta incorporando conocimientos sobre el estilo APA 6ª edición para citar y referenciarlas.";
              dato6 = "Presenta la documentación estructurada de acuerdo a la orden de trabajo.";
              la = "Hola, de acuerdo a los antecedentes de otros docentes en esta materia";
              dato7 = "E";
              dato8 = "D";
              dato9 = "B";
              dato10 = "M";
            }if (dato2 == unoD && gru == dosG && asig == unoA && num == dosN && ev == tresE){
               dato3 = "Muestra el uso de conocimientos de otras disciplinas contribuyendo a la formación integral del estudiante.";
              dato4 = "Fue entregado en tiempo y forma.";
              dato5 = "Presenta una lista mínimo de tres fuentes de consulta incorporando conocimientos sobre el estilo APA 6ª edición para citar y referenciarlas.";
              dato6 = "Presenta las conclusiones de manera individual y general.";
              la = "Hola, de acuerdo a los antecedentes de otros docentes en esta materia";
              dato7 = "E";
              dato8 = "D";
              dato9 = "B";
              dato10 = "M";
              //Reporte
            }if (dato2 == unoD && gru == dosG && asig == unoA && num == dosN && ev == cuatroE){
              dato3 = "Presenta en los anexos la organización del trabajo en equipo en un cronograma de actividades, estableciendo tiempos y responsabilidades.";
              dato4 = "Contiene imágenes explicadas que demuestran el uso de de dispositivos de red de forma clara y precisa.";
              dato5 = "Presenta una lista mínimo de tres fuentes de consulta incorporando conocimientos sobre el estilo APA 6ª edición para citar y referenciarlas.";
              dato6 = "Muestra las pruebas realizadas para garantizar la conectividad de la red.";
              la = "Hola, de acuerdo a los antecedentes de otros docentes en esta materia";
              dato7 = "F";
              dato8 = "C";
              dato9 = "B";
              dato10 = "M";
            }if (dato2 == unoD && gru == dosG && asig == unoA && num == dosN && ev == cuatroE){
              dato3 = "Presenta en los anexos la organización del trabajo en equipo en un cronograma de actividades, estableciendo tiempos y responsabilidades.";
              dato4 = "Contiene imágenes explicadas que demuestran el uso de de dispositivos de red de forma clara y precisa.";
              dato5 = "Presenta una lista mínimo de tres fuentes de consulta incorporando conocimientos sobre el estilo APA 6ª edición para citar y referenciarlas.";
              dato6 = "Presenta las conclusiones de manera individual y general.";
              la = "Hola, de acuerdo a los antecedentes de otros docentes en esta materia";
              dato7 = "F";
              dato8 = "C";
              dato9 = "B";
              dato10 = "M";
              //7F41
              //Informe
            }if (dato2 == unoD && gru == tresG && asig == unoA && num == unoN && ev == unoE){
              dato3 = "Utiilza conceptos aprendidos en otras asignaturas para documentar su trabajo.";
              dato4 = "Incluye imágenes relacionadas con el tema y las explica de forma clara y precisa.";
              dato5 = "Contiene al menos dos fuentes de información en un segundo idioma, incorporando conocimientos sobre el estilo APA 6ª edición para citar y referenciar las fuentes de consulta.";
              dato6 = "Describe lo solicitado con base en la competencia del tema.";
              la = "Hola, de acuerdo a los antecedentes de otros docentes en esta materia";
              dato7 = "E";
              dato8 = "D";
              dato9 = "B";
              dato10 = "M";
            }if (dato2 == unoD && gru == tresG && asig == unoA && num == dosN && ev == unoE){
              dato3 = "Contiene al menos dos fuentes de información en un segundo idioma, incorporando conocimientos sobre el estilo APA 6ª edición para citar y referenciar las fuentes de consulta. ";
              dato4 = "Presenta en los anexos la organización del trabajo en equipo en un cronograma de actividades, estableciendo tiempos y responsabilidades.";
              dato5 = "Incluye imágenes relacionadas con el tema y las explica de forma clara y precisa. ";
              dato6 = "Muestra estándares y protocolos para redes WAN/LAN.";
              la = "Hola, de acuerdo a los antecedentes de otros docentes en esta materia";
              dato7 = "B";
              dato8 = "F";
              dato9 = "D";
              dato10 = "M";
              //Cuadro
            }if (dato2 == unoD && gru == tresG && asig == unoA && num == unoN && ev == dosE){
              dato3 = "Se elaboró en equipo y presenta los datos completos de los integrantes. ";
              dato4 = "Presenta en los anexos la organización del trabajo en equipo en un cronograma de actividades, estableciendo tiempos y responsabilidades.";
              dato5 = "Presenta una lista mínimo de tres fuentes de consulta incorporando conocimientos sobre el estilo APA 6ª edición para citar y referenciarlas.";
              dato6 = "Se presenta de forma estructurada con base en lo indicado en la orden de trabajo.";
              la = "Hola, de acuerdo a los antecedentes de otros docentes en esta materia";
              dato7 = "A";
              dato8 = "F";
              dato9 = "B";
              dato10 = "M";
            }if (dato2 == unoD && gru == tresG && asig == unoA && num == dosN && ev == dosE){
              dato3 = "Presenta una lista mínimo de tres fuentes de consulta incorporando conocimientos sobre el estilo APA 6ª edición para citar y referenciarlas.";
              dato4 = "Presenta en los anexos la organización del trabajo en equipo en un cronograma de actividades, estableciendo tiempos y responsabilidades.";
              dato5 = "Se elaboró en equipo y presenta los datos completos de los integrantes. ";
              dato6 = "Contiene ejemplos descritos correctamente.";
              la = "Hola, de acuerdo a los antecedentes de otros docentes en esta materia";
              dato7 = "E";
              dato8 = "D";
              dato9 = "B";
              dato10 = "M";
              //Proyecto
            }if (dato2 == unoD && gru == tresG && asig == unoA && num == unoN && ev == tresE){
              dato3 = "Muestra el uso de conocimientos de otras disciplinas contribuyendo a la formación integral del estudiante.";
              dato4 = "Fue entregado en tiempo y forma.";
              dato5 = "Presenta una lista mínimo de tres fuentes de consulta incorporando conocimientos sobre el estilo APA 6ª edición para citar y referenciarlas.";
              dato6 = "Presenta la documentación estructurada de acuerdo a la orden de trabajo.";
              la = "Hola, de acuerdo a los antecedentes de otros docentes en esta materia";
              dato7 = "E";
              dato8 = "F";
              dato9 = "B";
              dato10 = "M";
            }if (dato2 == unoD && gru == tresG && asig == unoA && num == dosN && ev == tresE){
              dato3 = "Muestra el uso de conocimientos de otras disciplinas contribuyendo a la formación integral del estudiante.";
              dato4 = "Fue entregado en tiempo y forma.";
              dato5 = "Presenta una lista mínimo de tres fuentes de consulta incorporando conocimientos sobre el estilo APA 6ª edición para citar y referenciarlas.";
              dato6 = "Presenta las conclusiones de manera individual y general.";
              la = "Hola, de acuerdo a los antecedentes de otros docentes en esta materia";
              dato7 = "E";
              dato8 = "F";
              dato9 = "B";
              dato10 = "M";
              //Reporte
            }if (dato2 == unoD && gru == tresG && asig == unoA && num == dosN && ev == cuatroE){
              dato3 = "Contiene imágenes explicadas que demuestran el uso de de dispositivos de red de forma clara y precisa.";
              dato4 = "Muestra el uso de conocimientos de otras disciplinas contribuyendo a la formación integral del estudiante.";
              dato5 = "Se elaboró en equipo y presenta los datos completos de los integrantes.";
              dato6 = "Muestra las pruebas realizadas para garantizar la conectividad de la red.";
              la = "Hola, de acuerdo a los antecedentes de otros docentes en esta materia";
              dato7 = "C";
              dato8 = "E";
              dato9 = "A";
              dato10 = "M";
            }if (dato2 == unoD && gru == tresG && asig == unoA && num == dosN && ev == cuatroE){
              dato3 = "Contiene imágenes explicadas que demuestran el uso de de dispositivos de red de forma clara y precisa.";
              dato4 = "Muestra el uso de conocimientos de otras disciplinas contribuyendo a la formación integral del estudiante.";
              dato5 = "Se elaboró en equipo y presenta los datos completos de los integrantes.";
              dato6 = "Se presenta de forma estructurada con base en lo incado en la orden de trabajo. ";
              la = "Hola, de acuerdo a los antecedentes de otros docentes en esta materia";
              dato7 = "C";
              dato8 = "E";
              dato9 = "A";
              dato10 = "M";
              //Programacion
              //7F21
          }if (dato2 == unoD && gru == unoG && asig == tresA && num == unoN && ev == unoE){
              dato3 = "Presenta en los anexos, un cronograma de actividades, en la que se establecen tiempos, actividades y responsabilidades. ";
              dato4 = "Incorpora contenido que indica en donde puede ser aplicado los conocimientos aprendidos (menciona al menos tres ambitos de aplicación).";
              dato5 = "Se elabora en equipo, al presentar los nombres y matrículas sin errores ortográficos.";
              dato6 = "Contiene imágenes de como se ven textos, vínculos, listas, tablas y contenedores.";
              la = "Hola, de acuerdo a los antecedentes de otros docentes en esta materia";
              dato7 = "F";
              dato8 = "E";
              dato9 = "A";
              dato10 = "M";
            }if (dato2 == unoD && gru == unoG && asig == tresA && num == unoN && ev == dosE){
              dato3 = "Fue entregado en tiempo y forma.";
              dato4 = "Fue elaborado en digital. ";
              dato5 = "Fue elaborado en equipo y presenta los datos completos de los integrantes (nombre y matrícula).";
              dato6 = "Incluye al menos seis criterios de comparación.";
              la = "Hola, de acuerdo a los antecedentes de otros docentes en esta materia";
              dato7 = "F";
              dato8 = "D";
              dato9 = "A";
              dato10 = "M";
            }if (dato2 == unoD && gru == unoG && asig == tresA && num == unoN && ev == tresE){
              dato3 = "Fue realizado en equipo.";
              dato4 = "Muestra conocimientos de otras asignaturas.";
              dato5 = "Presenta en los anexos la organización del trabajo en equipo en un cronograma de actividades. ";
              dato6 = "Es capaz de realizar cambios al código.";
              la = "Hola, de acuerdo a los antecedentes de otros docentes en esta materia";
              dato7 = "A";
              dato8 = "E";
              dato9 = "F";
              dato10 = "M";
            }if (dato2 == unoD && gru == unoG && asig == tresA && num == unoN && ev == cuatroE){
              dato3 = "Presenta en los anexos, un cronograma de actividades, en la que se establecen tiempos, actividades y responsabilidades. ";
              dato4 = "Escribe correctamente los nombres de los integrantes.";
              dato5 = "Muestra referencias en formato APA.";
              dato6 = "Describe detalladamente los pasos realizados.";
              la = "Hola, de acuerdo a los antecedentes de otros docentes en esta materia";
              dato7 = "F";
              dato8 = "A";
              dato9 = "B";
              dato10 = "M";
            }if (dato2 == unoD && gru == unoG && asig == tresA && num == dosN && ev == unoE){
              dato3 = "Contiene al menos dos fuentes deinformación en un segundo idioma, en la cual incorpora conocimientos sobre el estilo APA 6a edición.";
              dato4 = "Se elabora en equipo, al presentar los nombres y matrículas sin errores ortográficos.";
              dato5 = "Presenta en los anexos, un cronograma de actividades, en la que se establecen tiempos, actividades y responsabilidades.";
              dato6 = "Describe detalladamente los pasos realizados.";
              la = "Hola, de acuerdo a los antecedentes de otros docentes en esta materia";
              dato7 = "B";
              dato8 = "A";
              dato9 = "F";
              dato10 = "M";
            }if (dato2 == unoD && gru == unoG && asig == tresA && num == dosN && ev == dosE){
              dato3 = "Muestra al menos un párrafo de una fuente de información en un segundo idioma en formato APA. ";
              dato4 = "Fue elaborado en digital.";
              dato5 = "Fue entregado en tiempo y forma.";
              dato6 = "Compara al menos tres framework para javascript del lado del cliente.";
              la = "Hola, de acuerdo a los antecedentes de otros docentes en esta materia";
              dato7 = "B";
              dato8 = "D";
              dato9 = "F";
              dato10 = "M";
            }if (dato2 == unoD && gru == unoG && asig == tresA && num == dosN && ev == tresE){
              dato3 = "Fue realizado en equipo.";
              dato4 = "Presenta en los anexos la organización del trabajo en equipo en un cronograma de actividades.";
              dato5 = "Muestra conocimientos de otras asignaturas.";
              dato6 = "El proyecto realiza todo lo solicitado sin excepción alguna.";
              la = "Hola, de acuerdo a los antecedentes de otros docentes en esta materia";
              dato7 = "A";
              dato8 = "F";
              dato9 = "E";
              dato10 = "M";
            }if (dato2 == unoD && gru == unoG && asig == tresA && num == dosN && ev == cuatroE){
              dato3 = "Explica con imágenes el funcionamiento de la práctica. ";
              dato4 = "Escribe relaciones de otras asignaturas. ";
              dato5 = "Muestra referencias en formato APA.";
              dato6 = "El proyecto realiza todo lo solicitado sin excepción alguna.";
              la = "Hola, de acuerdo a los antecedentes de otros docentes en esta materia";
              dato7 = "C";
              dato8 = "E";
              dato9 = "B";
              dato10 = "M";
              //Comienza grupo 7F31
              //Informe
            }if (dato2 == unoD && gru == dosG && asig == tresA && num == unoN && ev == unoE){
              dato3 = "Incorpora contenido que indica en donde puede ser aplicado los conocimientos aprendidos (menciona al menos tres ambitos de aplicación). ";
              dato4 = "Contiene al menos dos fuentes deinformación en un segundo idioma, en la cual incorpora conocimientos sobre el estilo APA 6a edición.";
              dato5 = "Se elabora en equipo, al presentar los nombres y matrículas sin errores ortográficos. ";
              dato6 = "Cumple con todo lo solicitado en el plan de trabajo.";
              la = "Hola, de acuerdo a los antecedentes de otros docentes en esta materia";
              dato7 = "E";
              dato8 = "B";
              dato9 = "A";
              dato10 = "M";
            }if (dato2 == unoD && gru == dosG && asig == tresA && num == dosN && ev == unoE){
              dato3 = "Incorpora contenido que indica en donde puede ser aplicado los conocimientos aprendidos (menciona al menos tres ambitos de aplicación). ";
              dato4 = "Contiene al menos dos fuentes deinformación en un segundo idioma, en la cual incorpora conocimientos sobre el estilo APA 6a edición.";
              dato5 = "Se elabora en equipo, al presentar los nombres y matrículas sin errores ortográficos. ";
              dato6 = "Presenta nombre de etiqueta, descripción y ejemplo de cómo se escriben.";
              la = "Hola, de acuerdo a los antecedentes de otros docentes en esta materia";
              dato7 = "E";
              dato8 = "B";
              dato9 = "A";
              dato10 = "M";
              //Cuadro
            }if (dato2 == unoD && gru == dosG && asig == tresA && num == unoN && ev == dosE){
              dato3 = "Fue elaborado en digital. ";
              dato4 = "Fue elaborado en equipo y presenta los datos completos de los integrantes (nombre y matrícula).";
              dato5 = "Muestra al menos un párrafo de una fuente de información en un segundo idioma en formato APA.";
              dato6 = "Presenta conclusión de forma individual la cual está relacionada al tema.";
              la = "Hola, de acuerdo a los antecedentes de otros docentes en esta materia";
              dato7 = "D";
              dato8 = "A";
              dato9 = "B";
              dato10 = "M";
            }if (dato2 == unoD && gru == dosG && asig == tresA && num == dosN && ev == dosE){
              dato3 = "Fue elaborado en digital. ";
              dato4 = "Fue elaborado en equipo y presenta los datos completos de los integrantes (nombre y matrícula).";
              dato5 = "Muestra al menos un párrafo de una fuente de información en un segundo idioma en formato APA.";
              dato6 = "Incluye al menos seis criterios de comparación.";
              la = "Hola, de acuerdo a los antecedentes de otros docentes en esta materia";
              dato7 = "D";
              dato8 = "A";
              dato9 = "B";
              dato10 = "M";
              //Proyecto
            }if (dato2 == unoD && gru == dosG && asig == tresA && num == unoN && ev == tresE){
              dato3 = "Incorpora contenido que indica en donde puede ser aplicado los conocimientos aprendidos (menciona al menos tres ambitos de aplicación). ";
              dato4 = "Fue realizado en equipo.";
              dato5 = "Presenta en los anexos la organización del trabajo en equipo en un cronograma de actividades.";
              dato6 = "El proyecto realiza todo lo solicitado sin excepción alguna.";
              la = "Hola, de acuerdo a los antecedentes de otros docentes en esta materia";
              dato7 = "E";
              dato8 = "A";
              dato9 = "F";
              dato10 = "M";
            }if (dato2 == unoD && gru == dosG && asig == tresA && num == dosN && ev == tresE){
              dato3 = "Incorpora contenido que indica en donde puede ser aplicado los conocimientos aprendidos (menciona al menos tres ambitos de aplicación). ";
              dato4 = "Fue realizado en equipo.";
              dato5 = "Presenta en los anexos la organización del trabajo en equipo en un cronograma de actividades.";
              dato6 = "Menciona las conclusiones de manera individual.";
              la = "Hola, de acuerdo a los antecedentes de otros docentes en esta materia";
              dato7 = "E";
              dato8 = "A";
              dato9 = "F";
              dato10 = "M";
              //Reporte
            }if (dato2 == unoD && gru == dosG && asig == tresA && num == dosN && ev == cuatroE){
              dato3 = "Muestra referencias en formato APA. ";
              dato4 = "Escribe correctamente los nombres de los integrantes.";
              dato5 = "Escribe relaciones de otras asignaturas.";
              dato6 = "Incluye capturas de la práctica funcionando y descritas correctamente.";
              la = "Hola, de acuerdo a los antecedentes de otros docentes en esta materia";
              dato7 = "B";
              dato8 = "A";
              dato9 = "E";
              dato10 = "M";
            }if (dato2 == unoD && gru == dosG && asig == tresA && num == dosN && ev == cuatroE){
              dato3 = "Muestra referencias en formato APA. ";
              dato4 = "Escribe correctamente los nombres de los integrantes.";
              dato5 = "Escribe relaciones de otras asignaturas.";
              dato6 = "Termina correctamente todo lo que se le solicita.";
              la = "Hola, de acuerdo a los antecedentes de otros docentes en esta materia";
              dato7 = "B";
              dato8 = "A";
              dato9 = "E";
              dato10 = "M";
              //7F41
              //Informe
            }if (dato2 == unoD && gru == tresG && asig == tresA && num == unoN && ev == unoE){
              dato3 = "Contiene al menos dos fuentes deinformación en un segundo idioma, en la cual incorpora conocimientos sobre el estilo APA 6a edición. ";
              dato4 = "Se elabora en equipo, al presentar los nombres y matrículas sin errores ortográficos. ";
              dato5 = "Presenta en los anexos, un cronograma de actividades, en la que se establecen tiempos, actividades y responsabilidades. ";
              dato6 = "Contiene del lenguaje de marcas la instrucción para realizar textos, vínculos, listas, tablas y contenedores.";
              la = "Hola, de acuerdo a los antecedentes de otros docentes en esta materia";
              dato7 = "B";
              dato8 = "A";
              dato9 = "F";
              dato10 = "M";
            }if (dato2 == unoD && gru == tresG && asig == tresA && num == dosN && ev == unoE){
              dato3 = "Contiene al menos dos fuentes deinformación en un segundo idioma, en la cual incorpora conocimientos sobre el estilo APA 6a edición. ";
              dato4 = "Se elabora en equipo, al presentar los nombres y matrículas sin errores ortográficos. ";
              dato5 = "Presenta en los anexos, un cronograma de actividades, en la que se establecen tiempos, actividades y responsabilidades. ";
              dato6 = "Contiene del lenguaje de marcas la instrucción para realizar textos, vínculos, listas, tablas y contenedores.";
              la = "Hola, de acuerdo a los antecedentes de otros docentes en esta materia";
              dato7 = "B";
              dato8 = "A";
              dato9 = "F";
              dato10 = "M";
              //Cuadro
            }if (dato2 == unoD && gru == tresG && asig == tresA && num == unoN && ev == dosE){
              dato3 = "Fue elaborado en equipo y presenta los datos completos de los integrantes (nombre y matrícula).";
              dato4 = "Muestra al menos un párrafo de una fuente de información en un segundo idioma en formato APA.";
              dato5 = "Fue elaborado en digital.";
              dato6 = "Compara al menos tres framework para javascript del lado del cliente.";
              la = "Hola, de acuerdo a los antecedentes de otros docentes en esta materia";
              dato7 = "A";
              dato8 = "B";
              dato9 = "D";
              dato10 = "M";
            }if (dato2 == unoD && gru == tresG && asig == tresA && num == dosN && ev == dosE){
              dato3 = "Fue elaborado en equipo y presenta los datos completos de los integrantes (nombre y matrícula).";
              dato4 = "Muestra al menos un párrafo de una fuente de información en un segundo idioma en formato APA.";
              dato5 = "Fue elaborado en digital.";
              dato6 = "Incluye al menos seis criterios de comparación.";
              la = "Hola, de acuerdo a los antecedentes de otros docentes en esta materia";
              dato7 = "A";
              dato8 = "B";
              dato9 = "D";
              dato10 = "M";
              //Proyecto
            }if (dato2 == unoD && gru == tresG && asig == tresA && num == unoN && ev == tresE){
              dato3 = "Incorpora contenido que indica en donde puede ser aplicado los conocimientos aprendidos (menciona al menos tres ambitos de aplicación).";
              dato4 = "Presenta en los anexos la organización del trabajo en equipo en un cronograma de actividades.";
              dato5 = "Fue realizado individual.";
              dato6 = "Es capaz de realizar cambios al código.";
              la = "Hola, de acuerdo a los antecedentes de otros docentes en esta materia";
              dato7 = "E";
              dato8 = "F";
              dato9 = "A";
              dato10 = "M";
            }if (dato2 == unoD && gru == tresG && asig == tresA && num == dosN && ev == tresE){
              dato3 = "Incorpora contenido que indica en donde puede ser aplicado los conocimientos aprendidos (menciona al menos tres ambitos de aplicación).";
              dato4 = "Presenta en los anexos la organización del trabajo en equipo en un cronograma de actividades.";
              dato5 = "Fue realizado en equipo.";
              dato6 = "Menciona las conclusiones de manera individual.";
              la = "Hola, de acuerdo a los antecedentes de otros docentes en esta materia";
              dato7 = "E";
              dato8 = "F";
              dato9 = "A";
              dato10 = "M";
              //Reporte
            }if (dato2 == unoD && gru == tresG && asig == tresA && num == dosN && ev == cuatroE){
              dato3 = "Presenta en los anexos, un cronograma de actividades, en la que se establecen tiempos, actividades y responsabilidades. ";
              dato4 = "Escribe correctamente los nombres de los integrantes.";
              dato5 = "Explica con imágenes el funcionamiento de la práctica.";
              dato6 = "Describe detalladamente los pasos realizados.";
              la = "Hola, de acuerdo a los antecedentes de otros docentes en esta materia";
              dato7 = "F";
              dato8 = "A";
              dato9 = "C";
              dato10 = "M";
            }if (dato2 == unoD && gru == tresG && asig == tresA && num == dosN && ev == cuatroE){
              dato3 = "Presenta en los anexos, un cronograma de actividades, en la que se establecen tiempos, actividades y responsabilidades. ";
              dato4 = "Escribe correctamente los nombres de los integrantes.";
              dato5 = "Explica con imágenes el funcionamiento de la práctica.";
              dato6 = "Termina correctamente todo lo que se le solicita.";
              la = "Hola, de acuerdo a los antecedentes de otros docentes en esta materia";
              dato7 = "F";
              dato8 = "A";
              dato9 = "C";
              dato10 = "M";
              //Programacion
              //7F21
              //Docente dos
              //
            }if (dato2 == dosD && gru == unoG && asig == dosA && num == unoN && ev == unoE){
              dato3 = "Menciona la posible aplicación de lo expuesto en otras disciplinas de un modo claro y puntual.";
              dato4 = "Presenta y cita al menos 2 fuentes adicionales de información en un según idioma en formato APA.";
              dato5 = "Presenta una propuesta de alguna plataforma para desarrollo de aplicaciones en la nube de un modo puntual.";
              dato6 = "Muestra un ejemplo de una aplicación en la nube existente en donde se resalte la información presentada en su informede manera clara y prescisa.";
              la = "Hola, de acuerdo a los antecedentes de otros docentes en esta materia";
              dato7 = "E";
              dato8 = "B";
              dato9 = "A";
              dato10 = "M";
            }if (dato2 == dosD && gru == unoG && asig == dosA && num == unoN && ev == dosE){
              dato3 = "Incluye una propuesta de uso de alguna plataforma para la implementación del caso de estudio de un modo pertinente a lo presentado.";
              dato4 = "Muestra un punto de analisis entre computo en la nube y computo tradicional de acuerdo algún trabajo citado en la bibliografía.";
              dato5 = "Incluye ejemplos de desarrollo de aplicaciones en las plataformas presentadas de un modo concreto. ";
              dato6 = "Muestra un punto de vista personal sobre el mejor modo de implementación del caso de estudio de una manera concisa.";
              la = "Hola, de acuerdo a los antecedentes de otros docentes en esta materia";
              dato7 = "B";
              dato8 = "D";
              dato9 = "A";
              dato10 = "M";
            }if (dato2 == dosD && gru == unoG && asig == dosA && num == unoN && ev == tresE){
              dato3 = "El estudiante cita y muestra el uso de 3 procedimientos aprendidos en otras asignaturas o propuestos por él para el desarrollo del proyecto. ";
              dato4 = "El estudiante entrega en el tiempo requerido el proyecto al 100%.";
              dato5 = "El proyecto puede resolver una problemática de 3 disciplinas diferentes a sistemas computacionales.";
              dato6 = "El estudiante muestra la arquitectura de la solución propuesta y es capaz de modificar la implementación del proyecto de acuerdo a lo requeirdo por el docente en un 80 y 100 %.";
              la = "Hola, de acuerdo a los antecedentes de otros docentes en esta materia";
              dato7 = "C";
              dato8 = "F";
              dato9 = "E";
              dato10 = "M";
            }if (dato2 == dosD && gru == unoG && asig == dosA && num == unoN && ev == cuatroE){
              dato3 = "Presenta un cronograma de actividades. ";
              dato4 = "Menciona como la práctica ayuda a otras disciplinas.";
              dato5 = "Lo entrega en el tiempo solicitado.";
              dato6 = "El estudiante es capaz de realizar un cambio al código sin nigún problema.";
              la = "Hola, de acuerdo a los antecedentes de otros docentes en esta materia";
              dato7 = "A";
              dato8 = "E";
              dato9 = "F";
              dato10 = "M";
            }if (dato2 == dosD && gru == unoG && asig == dosA && num == dosN && ev == unoE){
              dato3 = "Menciona la posible aplicación de lo expuesto en otras disciplinas de un modo claro y puntual.";
              dato4 = "Presenta y cita al menos 2 fuentes adicionales de información en un según idioma en formato APA.";
              dato5 = "Presenta una propuesta de alguna plataforma para desarrollo de aplicaciones en la nube de un modo puntual.";
              dato6 = "Presenta una propuesta de alguna plataforma para desarrollo de aplicaciones en la nube de un modo puntual.";
              la = "Hola, de acuerdo a los antecedentes de otros docentes en esta materia";
              dato7 = "E";
              dato8 = "B";
              dato9 = "A";
              dato10 = "M";
            }if (dato2 == dosD && gru == unoG && asig == dosA && num == dosN && ev == dosE){
              dato3 = "Incluye una propuesta de uso de alguna plataforma para la implementación del caso de estudio de un modo pertinente a lo presentado.";
              dato4 = "Incluye ejemplos de desarrollo de aplicaciones en las plataformas presentadas de un modo concreto.";
              dato5 = "Muestra un punto de analisis entre computo en la nube y computo tradicional de acuerdo algún trabajo citado en la bibliografía. ";
              dato6 = "Muestra un contraste entre las ventajas y 2 desventajas del desarrollo tradicional y la nube de mayor a menor importancia.";
              la = "Hola, de acuerdo a los antecedentes de otros docentes en esta materia";
              dato7 = "B";
              dato8 = "A";
              dato9 = "D";
              dato10 = "M";
            }if (dato2 == dosD && gru == unoG && asig == dosA && num == dosN && ev == tresE){
              dato3 = "El estudiante cita y muestra el uso de 3 procedimientos aprendidos en otras asignaturas o propuestos por él para el desarrollo del proyecto. ";
              dato4 = "El estudiante entrega en el tiempo requerido el proyecto al 100%.";
              dato5 = "El proyecto puede resolver una problemática de 3 disciplinas diferentes a sistemas computacionales.";
              dato6 = "El proyecto presentado utiliza 3 componentes de computación en la nube para su solución.";
              la = "Hola, de acuerdo a los antecedentes de otros docentes en esta materia";
              dato7 = "C";
              dato8 = "F";
              dato9 = "E";
              dato10 = "M";
            }if (dato2 == dosD && gru == unoG && asig == dosA && num == dosN && ev == cuatroE){
              dato3 = "Presenta un cronograma de actividades. ";
              dato4 = "Menciona como la práctica ayuda a otras disciplinas.";
              dato5 = "Lo entrega en el tiempo solicitado.";
              dato6 = "El estudiante termina de un 80 al 100% la práctica.";
              la = "Hola, de acuerdo a los antecedentes de otros docentes en esta materia";
              dato7 = "A";
              dato8 = "E";
              dato9 = "F";
              dato10 = "M";
              //Comienza grupo 7F31
              //Informe
            }if (dato2 == dosD && gru == dosG && asig == dosA && num == unoN && ev == unoE){
              dato3 = "Presenta y cita al menos 2 fuentes adicionales de información en un según idioma en formato APA. ";
              dato4 = "Menciona la posible aplicación de lo expuesto en otras disciplinas de un modo claro y puntual.";
              dato5 = "Presenta una propuesta de alguna plataforma para desarrollo de aplicaciones en la nube de un modo puntual.";
              dato6 = "Menciona sus conclusiones y comentarios del tema expuesto de un modo coherente y de acuerdo a la competencia del tema.";
              la = "Hola, de acuerdo a los antecedentes de otros docentes en esta materia";
              dato7 = "B";
              dato8 = "E";
              dato9 = "A";
              dato10 = "M";
            }if (dato2 == dosD && gru == dosG && asig == dosA && num == dosN && ev == unoE){
              dato3 = "Presenta y cita al menos 2 fuentes adicionales de información en un según idioma en formato APA. ";
              dato4 = "Menciona la posible aplicación de lo expuesto en otras disciplinas de un modo claro y puntual.";
              dato5 = "Presenta una propuesta de alguna plataforma para desarrollo de aplicaciones en la nube de un modo puntual.";
              dato6 = "Muestra un ejemplo de una aplicación en la nube existente en donde se resalte la información presentada en su informe de manera clara y prescisa.";
              la = "Hola, de acuerdo a los antecedentes de otros docentes en esta materia";
              dato7 = "B";
              dato8 = "E";
              dato9 = "A";
              dato10 = "M";
              //Cuadro
            }if (dato2 == dosD && gru == dosG && asig == dosA && num == unoN && ev == dosE){
              dato3 = "Muestra un punto de analisis entre computo en la nube y computo tradicional de acuerdo algún trabajo citado en la bibliografía.";
              dato4 = "Incluye una propuesta de uso de alguna plataforma para la implementación del caso de estudio de un modo pertinente a lo presentado.";
              dato5 = "Incluye ejemplos de desarrollo de aplicaciones en las plataformas presentadas de un modo concreto. ";
              dato6 = "Muestra un punto de vista personal sobre el mejor modo de implementación del caso de estudio de una manera concisa. ";
              la = "Hola, de acuerdo a los antecedentes de otros docentes en esta materia";
              dato7 = "D";
              dato8 = "B";
              dato9 = "A";
              dato10 = "M";
            }if (dato2 == dosD && gru == dosG && asig == dosA && num == dosN && ev == dosE){
              dato3 = "Muestra un punto de analisis entre computo en la nube y computo tradicional de acuerdo algún trabajo citado en la bibliografía.";
              dato4 = "Incluye una propuesta de uso de alguna plataforma para la implementación del caso de estudio de un modo pertinente a lo presentado.";
              dato5 = "Incluye ejemplos de desarrollo de aplicaciones en las plataformas presentadas de un modo concreto. ";
              dato6 = "Muestra el análisis de un caso de estudio real del 1 desarrollo modo tradicional de un sistema y mediante computacional el uso de la de nube de manera sencilla y condensada.";
              la = "Hola, de acuerdo a los antecedentes de otros docentes en esta materia";
              dato7 = "D";
              dato8 = "B";
              dato9 = "A";
              dato10 = "M";
              //Proyecto
            }if (dato2 == dosD && gru == dosG && asig == dosA && num == unoN && ev == tresE){
              dato3 = "El proyecto puede resolver una problemática de 3 disciplinas diferentes a sistemas computacionales.";
              dato4 = "El estudiante entrega en el tiempo requerido el proyecto al 100%.";
              dato5 = "El estudiante cita y muestra el uso de 3 procedimientos aprendidos en otras asignaturas o propuestos por él para el desarrollo del proyecto.";
              dato6 = "El estudiante describe de manera clara la funcion de los 3 componentes utilizados de computacion en la nube y su relación para la solución del proyecto.";
              la = "Hola, de acuerdo a los antecedentes de otros docentes en esta materia";
              dato7 = "E";
              dato8 = "F";
              dato9 = "C";
              dato10 = "M";
            }if (dato2 == dosD && gru == dosG && asig == dosA && num == dosN && ev == tresE){
               dato3 = "El proyecto puede resolver una problemática de 3 disciplinas diferentes a sistemas computacionales.";
              dato4 = "El estudiante entrega en el tiempo requerido el proyecto al 100%.";
              dato5 = "El estudiante cita y muestra el uso de 3 procedimientos aprendidos en otras asignaturas o propuestos por él para el desarrollo del proyecto.";
              dato6 = "El proyecto es implementado en un rango del 80 al 100 % .";
              la = "Hola, de acuerdo a los antecedentes de otros docentes en esta materia";
              dato7 = "E";
              dato8 = "F";
              dato9 = "C";
              dato10 = "M";
              //Reporte
            }if (dato2 == dosD && gru == dosG && asig == dosA && num == dosN && ev == cuatroE){
              dato3 = "Menciona como la práctica ayuda a otras disciplinas.";
              dato4 = "Menciona las conclusiones de manera clara y precisa de acuerdo a la competencia del tema.";
              dato5 = "Lo entrega en el tiempo solicitado. ";
              dato6 = "El estudiante termina de un 80 al 100% la práctica.";
              la = "Hola, de acuerdo a los antecedentes de otros docentes en esta materia";
              dato7 = "E";
              dato8 = "C";
              dato9 = "F";
              dato10 = "M";
            }if (dato2 == dosD && gru == dosG && asig == dosA && num == dosN && ev == cuatroE){
              dato3 = "Menciona como la práctica ayuda a otras disciplinas.";
              dato4 = "Menciona las conclusiones de manera clara y precisa de acuerdo a la competencia del tema.";
              dato5 = "Lo entrega en el tiempo solicitado. ";
              dato6 = "Muestra capturas de la práctica funcionando con lo solicitado.";
              la = "Hola, de acuerdo a los antecedentes de otros docentes en esta materia";
              dato7 = "E";
              dato8 = "C";
              dato9 = "F";
              dato10 = "M";
              //7F41
              //Informe
            }if (dato2 == dosD && gru == tresG && asig == dosA && num == unoN && ev == unoE){
              dato3 = "Presenta y cita al menos 2 fuentes adicionales de información en un según idioma en formato APA. ";
              dato4 = "Presenta una propuesta de alguna plataforma para desarrollo de aplicaciones en la nube de un modo puntual. ";
              dato5 = "Menciona la posible aplicación de lo expuesto en otras disciplinas de un modo claro y puntual.";
              dato6 = "Presenta una propuesta de alguna plataforma para desarrollo de aplicaciones en la nube de un modo puntual. ";
              la = "Hola, de acuerdo a los antecedentes de otros docentes en esta materia";
              dato7 = "E";
              dato8 = "C";
              dato9 = "F";
              dato10 = "M";
            }if (dato2 == dosD && gru == tresG && asig == dosA && num == dosN && ev == unoE){
              dato3 = "Presenta y cita al menos 2 fuentes adicionales de información en un según idioma en formato APA. ";
              dato4 = "Presenta una propuesta de alguna plataforma para desarrollo de aplicaciones en la nube de un modo puntual. ";
              dato5 = "Menciona la posible aplicación de lo expuesto en otras disciplinas de un modo claro y puntual.";
              dato6 = "Presenta información sobre algún aspecto para el desarrollo de aplicaciones en la nube y ejemplos del mismo de manera clara y precisa. ";
              la = "Hola, de acuerdo a los antecedentes de otros docentes en esta materia";
              dato7 = "E";
              dato8 = "C";
              dato9 = "F";
              dato10 = "M";
              //Cuadro
            }if (dato2 == dosD && gru == tresG && asig == dosA && num == unoN && ev == dosE){
              dato3 = "Incluye ejemplos de desarrollo de aplicaciones en las plataformas presentadas de un modo concreto.";
              dato4 = "Muestra un punto de analisis entre computo en la nube y computo tradicional de acuerdo algún trabajo citado en la bibliografía.";
              dato5 = "Incluye una propuesta de uso de alguna plataforma para la implementación del caso de estudio de un modo pertinente a lo presentado. ";
              dato6 = "Muestra un contraste entre las ventajas y 2 desventajas del desarrollo tradicional y la nube de mayor a menor importancia. ";
              la = "Hola, de acuerdo a los antecedentes de otros docentes en esta materia";
              dato7 = "A";
              dato8 = "D";
              dato9 = "B";
              dato10 = "M";
            }if (dato2 == dosD && gru == tresG && asig == dosA && num == dosN && ev == dosE){
              dato3 = "Incluye ejemplos de desarrollo de aplicaciones en las plataformas presentadas de un modo concreto.";
              dato4 = "Muestra un punto de analisis entre computo en la nube y computo tradicional de acuerdo algún trabajo citado en la bibliografía.";
              dato5 = "Incluye una propuesta de uso de alguna plataforma para la implementación del caso de estudio de un modo pertinente a lo presentado. ";
              dato6 = "Muestra el análisis de un caso de estudio real del 1 desarrollo modo tradicional de un sistema y mediante computacional el uso de la de nube de manera sencilla y condensada. ";
              la = "Hola, de acuerdo a los antecedentes de otros docentes en esta materia";
              dato7 = "A";
              dato8 = "D";
              dato9 = "B";
              dato10 = "M";
              //Proyecto
            }if (dato2 == dosD && gru == tresG && asig == dosA && num == unoN && ev == tresE){
              dato3 = "El estudiante entrega en el tiempo requerido el proyecto al 100%. ";
              dato4 = "El proyecto puede resolver una problemática de 3 disciplinas diferentes a sistemas computacionales.";
              dato5 = "El estudiante cita y muestra el uso de 3 procedimientos aprendidos en otras asignaturas o propuestos por él para el desarrollo del proyecto.";
              dato6 = "El estudiante muestra la arquitectura de la solución propuesta y es capaz de modificar la implementación del proyecto de acuerdo a lo requeirdo por el docente en un 80 y 100 %.";
              la = "Hola, de acuerdo a los antecedentes de otros docentes en esta materia";
              dato7 = "A";
              dato8 = "D";
              dato9 = "B";
              dato10 = "M";
            }if (dato2 == dosD && gru == tresG && asig == dosA && num == dosN && ev == tresE){
               dato3 = "El estudiante entrega en el tiempo requerido el proyecto al 100%. ";
              dato4 = "El proyecto puede resolver una problemática de 3 disciplinas diferentes a sistemas computacionales.";
              dato5 = "El estudiante cita y muestra el uso de 3 procedimientos aprendidos en otras asignaturas o propuestos por él para el desarrollo del proyecto.";
              dato6 = "El estudiante describe de manera clara la funcion de los 3 componentes utilizados de computacion en la nube y su relación para la solución del proyecto.";
              la = "Hola, de acuerdo a los antecedentes de otros docentes en esta materia";
              dato7 = "A";
              dato8 = "D";
              dato9 = "B";
              dato10 = "M";
              //Reporte
            }if (dato2 == dosD && gru == tresG && asig == dosA && num == unoN && ev == cuatroE){
              dato3 = "Lo entrega en el tiempo solicitado. ";
              dato4 = "Menciona como la práctica ayuda a otras disciplinas. ";
              dato5 = "Presenta un cronograma de actividades. ";
              dato6 = "El estudiante es capaz de realizar un cambio al código sin nigún problema.";
              la = "Hola, de acuerdo a los antecedentes de otros docentes en esta materia";
              dato7 = "A";
              dato8 = "D";
              dato9 = "B";
              dato10 = "M";
            }if (dato2 == dosD && gru == tresG && asig == dosA && num == dosN && ev == cuatroE){
              dato3 = "Lo entrega en el tiempo solicitado. ";
              dato4 = "Menciona como la práctica ayuda a otras disciplinas. ";
              dato5 = "Presenta un cronograma de actividades. ";
              dato6 = "Muestra capturas de la práctica funcionando con lo solicitado.";
              la = "Hola, de acuerdo a los antecedentes de otros docentes en esta materia";
              dato7 = "A";
              dato8 = "D";
              dato9 = "B";
              dato10 = "M";
              //REDES
              //7F21
              //Informe
            }if (dato2 == dosD && gru == unoG && asig == unoA && num == unoN && ev == unoE){
              dato3 = "Incluye imágenes relacionadas con el tema y las explica de forma clara y precisa. ";
              dato4 = "Utiilza conceptos aprendidos en otras asignaturas para documentar su trabajo.";
              dato5 = "Presenta en los anexos la organización del trabajo en equipo en un cronograma de actividades, estableciendo tiempos y responsabilidades. ";
              dato6 = "Muestra estándares y protocolos para redes WAN/LAN.";
              la = "Hola, de acuerdo a tus antecedentes";
              dato7 = "D";
              dato8 = "E";
              dato9 = "F";
              dato10 = "M";
            }if (dato2 == dosD && gru == unoG && asig == unoA && num == unoN && ev == dosE){
              dato3 = "Se elaboró en equipo y presenta los datos completos de los integrantes. ";
              dato4 = "Presenta una lista mínimo de tres fuentes de consulta incorporando conocimientos sobre el estilo APA 6ª edición para citar y referenciarlas. ";
              dato5 = "Muestra el uso de conocimientos de otras disciplinas contribuyendo a la formación integral del estudiante.";
              dato6 = "Contiene ejemplos descritos correctamente.";
              la = "Hola, de acuerdo a tus antecedentes";
              dato7 = "A";
              dato8 = "B";
              dato9 = "E";
              dato10 = "M";
            }if (dato2 == dosD && gru == unoG && asig == unoA && num == unoN && ev == tresE){
              dato3 = "Fue entregado en tiempo y forma.";
              dato4 = "Presenta una lista mínimo de tres fuentes de consulta incorporando conocimientos sobre el estilo APA 6ª edición para citar y referenciarlas. ";
              dato5 = "Muestra el uso de conocimientos de otras disciplinas contribuyendo a la formación integral del estudiante. ";
              dato6 = "Presenta la documentación estructurada de acuerdo a la orden de trabajo.";
              la = "Hola, de acuerdo a tus antecedentes";
              dato7 = "F";
              dato8 = "B";
              dato9 = "E";
              dato10 = "M";
            }if (dato2 == dosD && gru == unoG && asig == unoA && num == unoN && ev == cuatroE){
              dato3 = "Presenta una lista mínimo de tres fuentes de consulta incorporando conocimientos sobre el estilo APA 6ª edición para citar y referenciarlas.";
              dato4 = "Muestra el uso de conocimientos de otras disciplinas contribuyendo a la formación integral del estudiante.";
              dato5 = "Contiene imágenes explicadas que demuestran el uso de de dispositivos de red de forma clara y precisa.";
              dato6 = "Muestra los procedimientos realizados para completar la actividad con base en lo solicitado.";
              la = "Hola, de acuerdo a tus antecedentes";
              dato7 = "B";
              dato8 = "E";
              dato9 = "C";
              dato10 = "M";
            }if (dato2 == dosD && gru == unoG && asig == unoA && num == dosN && ev == unoE){
              dato3 = "Contiene al menos dos fuentes de información en un segundo idioma, incorporando conocimientos sobre el estilo APA 6ª edición para citar y referenciar las fuentes de consulta.";
              dato4 = "Utiilza conceptos aprendidos en otras asignaturas para documentar su trabajo.";
              dato5 = "Presenta en los anexos la organización del trabajo en equipo en un cronograma de actividades, estableciendo tiempos y responsabilidades. ";
              dato6 = "Muestra conclusiones personales y grupales de acuerdo a la competencia del tema.";
              la = "Hola, de acuerdo a tus antecedentes";
              dato7 = "B";
              dato8 = "E";
              dato9 = "F";
              dato10 = "M";
            }if (dato2 == dosD && gru == unoG && asig == unoA && num == dosN && ev == dosE){
              dato3 = "Se elaboró en equipo y presenta los datos completos de los integrantes. ";
              dato4 = "Presenta una lista mínimo de tres fuentes de consulta incorporando conocimientos sobre el estilo APA 6ª edición para citar y referenciarlas. ";
              dato5 = "Presenta en los anexos la organización del trabajo en equipo en un cronograma de actividades, estableciendo tiempos y responsabilidades. ";
              dato6 = "Muestra variables de contraste de acuerdo a la competencia del tema.";
              la = "Hola, de acuerdo a tus antecedentes";
              dato7 = "A";
              dato8 = "B";
              dato9 = "F";
              dato10 = "M";
            }if (dato2 == dosD && gru == unoG && asig == unoA && num == dosN && ev == tresE){
              dato3 = "Presenta en los anexos la organización del trabajo en equipo en un cronograma de actividades, estableciendo tiempos y responsabilidades. ";
              dato4 = "Presenta una lista mínimo de tres fuentes de consulta incorporando conocimientos sobre el estilo APA 6ª edición para citar y referenciarlas. ";
              dato5 = "Muestra el uso de conocimientos de otras disciplinas contribuyendo a la formación integral del estudiante. ";
              dato6 = "Funciona correctamente demostrando la conectividad de la red.";
              la = "Hola, de acuerdo a tus antecedentes";
              dato7 = "F";
              dato8 = "B";
              dato9 = "E";
              dato10 = "M";
            }if (dato2 == dosD && gru == unoG && asig == unoA && num == dosN && ev == cuatroE){
              dato3 = "Se elaboró en equipo y presenta los datos completos de los integrantes.  ";
              dato4 = "Presenta en los anexos la organización del trabajo en equipo en un cronograma de actividades, estableciendo tiempos y responsabilidades. ";
              dato5 = "Muestra el uso de conocimientos de otras disciplinas contribuyendo a la formación integral del estudiante. ";
              dato6 = "Muestra variables de contraste de acuerdo a la competencia del tema.";
              la = "Hola, de acuerdo a tus antecedentes";
              dato7 = "A";
              dato8 = "F";
              dato9 = "E";
              dato10 = "M";
              //Comienza grupo 7F31
              //Informe
            }if (dato2 == dosD && gru == dosG && asig == unoA && num == unoN && ev == unoE){
              dato3 = "Utiilza conceptos aprendidos en otras asignaturas para documentar su trabajo.";
              dato4 = "Incluye imágenes relacionadas con el tema y las explica de forma clara y precisa.";
              dato5 = "Contiene al menos dos fuentes de información en un segundo idioma, incorporando conocimientos sobre el estilo APA 6ª edición para citar y referenciar las fuentes de consulta.";
              dato6 = "Describe lo solicitado con base en la competencia del tema.";
              la = "Hola, de acuerdo a tus antecedentes";
              dato7 = "E";
              dato8 = "D";
              dato9 = "B";
              dato10 = "M";
            }if (dato2 == dosD && gru == dosG && asig == unoA && num == dosN && ev == unoE){
              dato3 = "Utiilza conceptos aprendidos en otras asignaturas para documentar su trabajo.";
              dato4 = "Incluye imágenes relacionadas con el tema y las explica de forma clara y precisa.";
              dato5 = "Contiene al menos dos fuentes de información en un segundo idioma, incorporando conocimientos sobre el estilo APA 6ª edición para citar y referenciar las fuentes de consulta.";
              dato6 = "Muestra conclusiones personales y grupales de acuerdo a la competencia del tema.";
              la = "Hola, de acuerdo a tus antecedentes";
              dato7 = "E";
              dato8 = "D";
              dato9 = "B";
              dato10 = "M";
              //Cuadro
            }if (dato2 == dosD && gru == dosG && asig == unoA && num == unoN && ev == dosE){
              dato3 = "Presenta una lista mínimo de tres fuentes de consulta incorporando conocimientos sobre el estilo APA 6ª edición para citar y referenciarlas.";
              dato4 = "Presenta en los anexos la organización del trabajo en equipo en un cronograma de actividades, estableciendo tiempos y responsabilidades.";
              dato5 = "Se elaboró en equipo y presenta los datos completos de los integrantes. ";
              dato6 = "Muestra variables de contraste de acuerdo a la competencia del tema.";
              la = "Hola, de acuerdo a tus antecedentes";
              dato7 = "E";
              dato8 = "D";
              dato9 = "B";
              dato10 = "M";
            }if (dato2 == dosD && gru == dosG && asig == unoA && num == dosN && ev == dosE){
              dato3 = "Presenta una lista mínimo de tres fuentes de consulta incorporando conocimientos sobre el estilo APA 6ª edición para citar y referenciarlas.";
              dato4 = "Presenta en los anexos la organización del trabajo en equipo en un cronograma de actividades, estableciendo tiempos y responsabilidades.";
              dato5 = "Se elaboró en equipo y presenta los datos completos de los integrantes. ";
              dato6 = "Contiene ejemplos descritos correctamente.";
              la = "Hola, de acuerdo a tus antecedentes";
              dato7 = "E";
              dato8 = "D";
              dato9 = "B";
              dato10 = "M";
              //Proyecto
            }if (dato2 == dosD && gru == dosG && asig == unoA && num == unoN && ev == tresE){
              dato3 = "Muestra el uso de conocimientos de otras disciplinas contribuyendo a la formación integral del estudiante.";
              dato4 = "Fue entregado en tiempo y forma.";
              dato5 = "Presenta una lista mínimo de tres fuentes de consulta incorporando conocimientos sobre el estilo APA 6ª edición para citar y referenciarlas.";
              dato6 = "Presenta la documentación estructurada de acuerdo a la orden de trabajo.";
              la = "Hola, de acuerdo a tus antecedentes";
              dato7 = "E";
              dato8 = "D";
              dato9 = "B";
              dato10 = "M";
            }if (dato2 == dosD && gru == dosG && asig == unoA && num == dosN && ev == tresE){
               dato3 = "Muestra el uso de conocimientos de otras disciplinas contribuyendo a la formación integral del estudiante.";
              dato4 = "Fue entregado en tiempo y forma.";
              dato5 = "Presenta una lista mínimo de tres fuentes de consulta incorporando conocimientos sobre el estilo APA 6ª edición para citar y referenciarlas.";
              dato6 = "Presenta las conclusiones de manera individual y general.";
              la = "Hola, de acuerdo a tus antecedentes";
              dato7 = "E";
              dato8 = "D";
              dato9 = "B";
              dato10 = "M";
              //Reporte
            }if (dato2 == dosD && gru == dosG && asig == unoA && num == dosN && ev == cuatroE){
              dato3 = "Presenta en los anexos la organización del trabajo en equipo en un cronograma de actividades, estableciendo tiempos y responsabilidades.";
              dato4 = "Contiene imágenes explicadas que demuestran el uso de de dispositivos de red de forma clara y precisa.";
              dato5 = "Presenta una lista mínimo de tres fuentes de consulta incorporando conocimientos sobre el estilo APA 6ª edición para citar y referenciarlas.";
              dato6 = "Muestra las pruebas realizadas para garantizar la conectividad de la red.";
              la = "Hola, de acuerdo a tus antecedentes";
              dato7 = "F";
              dato8 = "C";
              dato9 = "B";
              dato10 = "M";
            }if (dato2 == dosD && gru == dosG && asig == unoA && num == dosN && ev == cuatroE){
              dato3 = "Presenta en los anexos la organización del trabajo en equipo en un cronograma de actividades, estableciendo tiempos y responsabilidades.";
              dato4 = "Contiene imágenes explicadas que demuestran el uso de de dispositivos de red de forma clara y precisa.";
              dato5 = "Presenta una lista mínimo de tres fuentes de consulta incorporando conocimientos sobre el estilo APA 6ª edición para citar y referenciarlas.";
              dato6 = "Presenta las conclusiones de manera individual y general.";
              la = "Hola, de acuerdo a tus antecedentes";
              dato7 = "F";
              dato8 = "C";
              dato9 = "B";
              dato10 = "M";
              //7F41
              //Informe
            }if (dato2 == dosD && gru == tresG && asig == unoA && num == unoN && ev == unoE){
              dato3 = "Contiene al menos dos fuentes de información en un segundo idioma, incorporando conocimientos sobre el estilo APA 6ª edición para citar y referenciar las fuentes de consulta. ";
              dato4 = "Presenta en los anexos la organización del trabajo en equipo en un cronograma de actividades, estableciendo tiempos y responsabilidades.";
              dato5 = "Incluye imágenes relacionadas con el tema y las explica de forma clara y precisa. ";
              dato6 = "Describe lo solicitado con base en la competencia del tema.";
              la = "Hola, de acuerdo a tus antecedentes";
              dato7 = "B";
              dato8 = "F";
              dato9 = "D";
              dato10 = "M";
            }if (dato2 == dosD && gru == tresG && asig == unoA && num == dosN && ev == unoE){
              dato3 = "Contiene al menos dos fuentes de información en un segundo idioma, incorporando conocimientos sobre el estilo APA 6ª edición para citar y referenciar las fuentes de consulta. ";
              dato4 = "Presenta en los anexos la organización del trabajo en equipo en un cronograma de actividades, estableciendo tiempos y responsabilidades.";
              dato5 = "Incluye imágenes relacionadas con el tema y las explica de forma clara y precisa. ";
              dato6 = "Muestra estándares y protocolos para redes WAN/LAN.";
              la = "Hola, de acuerdo a tus antecedentes";
              dato7 = "B";
              dato8 = "F";
              dato9 = "D";
              dato10 = "M";
              //Cuadro
            }if (dato2 == dosD && gru == tresG && asig == unoA && num == unoN && ev == dosE){
              dato3 = "Se elaboró en equipo y presenta los datos completos de los integrantes. ";
              dato4 = "Presenta en los anexos la organización del trabajo en equipo en un cronograma de actividades, estableciendo tiempos y responsabilidades.";
              dato5 = "Presenta una lista mínimo de tres fuentes de consulta incorporando conocimientos sobre el estilo APA 6ª edición para citar y referenciarlas.";
              dato6 = "Se presenta de forma estructurada con base en lo indicado en la orden de trabajo.";
              la = "Hola, de acuerdo a tus antecedentes";
              dato7 = "A";
              dato8 = "F";
              dato9 = "B";
              dato10 = "M";
            }if (dato2 == dosD && gru == tresG && asig == unoA && num == dosN && ev == dosE){
              dato3 = "Se elaboró en equipo y presenta los datos completos de los integrantes. ";
              dato4 = "Presenta en los anexos la organización del trabajo en equipo en un cronograma de actividades, estableciendo tiempos y responsabilidades.";
              dato5 = "Presenta una lista mínimo de tres fuentes de consulta incorporando conocimientos sobre el estilo APA 6ª edición para citar y referenciarlas.";
              dato6 = "Contiene ejemplos descritos correctamente.";
              la = "Hola, de acuerdo a tus antecedentes";
              dato7 = "A";
              dato8 = "F";
              dato9 = "B";
              dato10 = "M";
              //Proyecto
            }if (dato2 == dosD && gru == tresG && asig == unoA && num == unoN && ev == tresE){
              dato3 = "Muestra el uso de conocimientos de otras disciplinas contribuyendo a la formación integral del estudiante.";
              dato4 = "Fue entregado en tiempo y forma.";
              dato5 = "Presenta una lista mínimo de tres fuentes de consulta incorporando conocimientos sobre el estilo APA 6ª edición para citar y referenciarlas.";
              dato6 = "Presenta la documentación estructurada de acuerdo a la orden de trabajo.";
              la = "Hola, de acuerdo a tus antecedentes";
              dato7 = "E";
              dato8 = "F";
              dato9 = "B";
              dato10 = "M";
            }if (dato2 == dosD && gru == tresG && asig == unoA && num == dosN && ev == tresE){
              dato3 = "Muestra el uso de conocimientos de otras disciplinas contribuyendo a la formación integral del estudiante.";
              dato4 = "Fue entregado en tiempo y forma.";
              dato5 = "Presenta una lista mínimo de tres fuentes de consulta incorporando conocimientos sobre el estilo APA 6ª edición para citar y referenciarlas.";
              dato6 = "Presenta las conclusiones de manera individual y general.";
              la = "Hola, de acuerdo a tus antecedentes";
              dato7 = "E";
              dato8 = "F";
              dato9 = "B";
              dato10 = "M";
              //Reporte
            }if (dato2 == dosD && gru == tresG && asig == unoA && num == dosN && ev == cuatroE){
              dato3 = "Contiene imágenes explicadas que demuestran el uso de de dispositivos de red de forma clara y precisa.";
              dato4 = "Muestra el uso de conocimientos de otras disciplinas contribuyendo a la formación integral del estudiante.";
              dato5 = "Se elaboró en equipo y presenta los datos completos de los integrantes.";
              dato6 = "Muestra las pruebas realizadas para garantizar la conectividad de la red.";
              la = "Hola, de acuerdo a tus antecedentes";
              dato7 = "C";
              dato8 = "E";
              dato9 = "A";
              dato10 = "M";
            }if (dato2 == dosD && gru == tresG && asig == unoA && num == dosN && ev == cuatroE){
              dato3 = "Contiene imágenes explicadas que demuestran el uso de de dispositivos de red de forma clara y precisa.";
              dato4 = "Muestra el uso de conocimientos de otras disciplinas contribuyendo a la formación integral del estudiante.";
              dato5 = "Se elaboró en equipo y presenta los datos completos de los integrantes.";
              dato6 = "Se presenta de forma estructurada con base en lo incado en la orden de trabajo. ";
              la = "Hola, de acuerdo a tus antecedentes";
              dato7 = "C";
              dato8 = "E";
              dato9 = "A";
              dato10 = "M";
              //Programacion
              //7F21
          }if (dato2 == dosD && gru == unoG && asig == tresA && num == unoN && ev == unoE){
              dato3 = "Presenta en los anexos, un cronograma de actividades, en la que se establecen tiempos, actividades y responsabilidades. ";
              dato4 = "Incorpora contenido que indica en donde puede ser aplicado los conocimientos aprendidos (menciona al menos tres ambitos de aplicación).";
              dato5 = "Se elabora en equipo, al presentar los nombres y matrículas sin errores ortográficos.";
              dato6 = "Contiene imágenes de como se ven textos, vínculos, listas, tablas y contenedores.";
              la = "Hola, de acuerdo a los antecedentes de otros docentes en esta materia";
              dato7 = "F";
              dato8 = "E";
              dato9 = "A";
              dato10 = "M";
            }if (dato2 == dosD && gru == unoG && asig == tresA && num == unoN && ev == dosE){
              dato3 = "Fue entregado en tiempo y forma.";
              dato4 = "Fue elaborado en digital. ";
              dato5 = "Fue elaborado en equipo y presenta los datos completos de los integrantes (nombre y matrícula).";
              dato6 = "Incluye al menos seis criterios de comparación.";
              la = "Hola, de acuerdo a los antecedentes de otros docentes en esta materia";
              dato7 = "F";
              dato8 = "D";
              dato9 = "A";
              dato10 = "M";
            }if (dato2 == dosD && gru == unoG && asig == tresA && num == unoN && ev == tresE){
              dato3 = "Fue realizado en equipo.";
              dato4 = "Muestra conocimientos de otras asignaturas.";
              dato5 = "Presenta en los anexos la organización del trabajo en equipo en un cronograma de actividades. ";
              dato6 = "Es capaz de realizar cambios al código.";
              la = "Hola, de acuerdo a los antecedentes de otros docentes en esta materia";
              dato7 = "A";
              dato8 = "E";
              dato9 = "F";
              dato10 = "M";
            }if (dato2 == dosD && gru == unoG && asig == tresA && num == unoN && ev == cuatroE){
              dato3 = "Presenta en los anexos, un cronograma de actividades, en la que se establecen tiempos, actividades y responsabilidades. ";
              dato4 = "Escribe correctamente los nombres de los integrantes.";
              dato5 = "Muestra referencias en formato APA.";
              dato6 = "Describe detalladamente los pasos realizados.";
              la = "Hola, de acuerdo a los antecedentes de otros docentes en esta materia";
              dato7 = "F";
              dato8 = "A";
              dato9 = "B";
              dato10 = "M";
            }if (dato2 == dosD && gru == unoG && asig == tresA && num == dosN && ev == unoE){
              dato3 = "Contiene al menos dos fuentes deinformación en un segundo idioma, en la cual incorpora conocimientos sobre el estilo APA 6a edición.";
              dato4 = "Se elabora en equipo, al presentar los nombres y matrículas sin errores ortográficos.";
              dato5 = "Presenta en los anexos, un cronograma de actividades, en la que se establecen tiempos, actividades y responsabilidades.";
              dato6 = "Describe detalladamente los pasos realizados.";
              la = "Hola, de acuerdo a los antecedentes de otros docentes en esta materia";
              dato7 = "B";
              dato8 = "A";
              dato9 = "F";
              dato10 = "M";
            }if (dato2 == dosD && gru == unoG && asig == tresA && num == dosN && ev == dosE){
              dato3 = "Muestra al menos un párrafo de una fuente de información en un segundo idioma en formato APA. ";
              dato4 = "Fue elaborado en digital.";
              dato5 = "Fue entregado en tiempo y forma.";
              dato6 = "Compara al menos tres framework para javascript del lado del cliente.";
              la = "Hola, de acuerdo a los antecedentes de otros docentes en esta materia";
              dato7 = "B";
              dato8 = "D";
              dato9 = "F";
              dato10 = "M";
            }if (dato2 == dosD && gru == unoG && asig == tresA && num == dosN && ev == tresE){
              dato3 = "Fue realizado en equipo.";
              dato4 = "Presenta en los anexos la organización del trabajo en equipo en un cronograma de actividades.";
              dato5 = "Muestra conocimientos de otras asignaturas.";
              dato6 = "El proyecto realiza todo lo solicitado sin excepción alguna.";
              la = "Hola, de acuerdo a los antecedentes de otros docentes en esta materia";
              dato7 = "A";
              dato8 = "F";
              dato9 = "E";
              dato10 = "M";
            }if (dato2 == dosD && gru == unoG && asig == tresA && num == dosN && ev == cuatroE){
              dato3 = "Explica con imágenes el funcionamiento de la práctica. ";
              dato4 = "Escribe relaciones de otras asignaturas. ";
              dato5 = "Muestra referencias en formato APA.";
              dato6 = "El proyecto realiza todo lo solicitado sin excepción alguna.";
              la = "Hola, de acuerdo a los antecedentes de otros docentes en esta materia";
              dato7 = "C";
              dato8 = "E";
              dato9 = "B";
              dato10 = "M";
              //Comienza grupo 7F31
              //Informe
            }if (dato2 == dosD && gru == dosG && asig == tresA && num == unoN && ev == unoE){
              dato3 = "Incorpora contenido que indica en donde puede ser aplicado los conocimientos aprendidos (menciona al menos tres ambitos de aplicación). ";
              dato4 = "Contiene al menos dos fuentes deinformación en un segundo idioma, en la cual incorpora conocimientos sobre el estilo APA 6a edición.";
              dato5 = "Se elabora en equipo, al presentar los nombres y matrículas sin errores ortográficos. ";
              dato6 = "Cumple con todo lo solicitado en el plan de trabajo.";
              la = "Hola, de acuerdo a los antecedentes de otros docentes en esta materia";
              dato7 = "E";
              dato8 = "B";
              dato9 = "A";
              dato10 = "M";
            }if (dato2 == dosD && gru == dosG && asig == tresA && num == dosN && ev == unoE){
              dato3 = "Incorpora contenido que indica en donde puede ser aplicado los conocimientos aprendidos (menciona al menos tres ambitos de aplicación). ";
              dato4 = "Contiene al menos dos fuentes deinformación en un segundo idioma, en la cual incorpora conocimientos sobre el estilo APA 6a edición.";
              dato5 = "Se elabora en equipo, al presentar los nombres y matrículas sin errores ortográficos. ";
              dato6 = "Presenta nombre de etiqueta, descripción y ejemplo de cómo se escriben.";
              la = "Hola, de acuerdo a los antecedentes de otros docentes en esta materia";
              dato7 = "E";
              dato8 = "B";
              dato9 = "A";
              dato10 = "M";
              //Cuadro
            }if (dato2 == dosD && gru == dosG && asig == tresA && num == unoN && ev == dosE){
              dato3 = "Fue elaborado en digital. ";
              dato4 = "Fue elaborado en equipo y presenta los datos completos de los integrantes (nombre y matrícula).";
              dato5 = "Muestra al menos un párrafo de una fuente de información en un segundo idioma en formato APA.";
              dato6 = "Presenta conclusión de forma individual la cual está relacionada al tema.";
              la = "Hola, de acuerdo a los antecedentes de otros docentes en esta materia";
              dato7 = "D";
              dato8 = "A";
              dato9 = "B";
              dato10 = "M";
            }if (dato2 == dosD && gru == dosG && asig == tresA && num == dosN && ev == dosE){
              dato3 = "Fue elaborado en digital. ";
              dato4 = "Fue elaborado en equipo y presenta los datos completos de los integrantes (nombre y matrícula).";
              dato5 = "Muestra al menos un párrafo de una fuente de información en un segundo idioma en formato APA.";
              dato6 = "Incluye al menos seis criterios de comparación.";
              la = "Hola, de acuerdo a los antecedentes de otros docentes en esta materia";
              dato7 = "D";
              dato8 = "A";
              dato9 = "B";
              dato10 = "M";
              //Proyecto
            }if (dato2 == dosD && gru == dosG && asig == tresA && num == unoN && ev == tresE){
              dato3 = "Incorpora contenido que indica en donde puede ser aplicado los conocimientos aprendidos (menciona al menos tres ambitos de aplicación). ";
              dato4 = "Fue realizado en equipo.";
              dato5 = "Presenta en los anexos la organización del trabajo en equipo en un cronograma de actividades.";
              dato6 = "El proyecto realiza todo lo solicitado sin excepción alguna.";
              la = "Hola, de acuerdo a los antecedentes de otros docentes en esta materia";
              dato7 = "E";
              dato8 = "A";
              dato9 = "F";
              dato10 = "M";
            }if (dato2 == dosD && gru == dosG && asig == tresA && num == dosN && ev == tresE){
              dato3 = "Incorpora contenido que indica en donde puede ser aplicado los conocimientos aprendidos (menciona al menos tres ambitos de aplicación). ";
              dato4 = "Fue realizado en equipo.";
              dato5 = "Presenta en los anexos la organización del trabajo en equipo en un cronograma de actividades.";
              dato6 = "Menciona las conclusiones de manera individual.";
              la = "Hola, de acuerdo a los antecedentes de otros docentes en esta materia";
              dato7 = "E";
              dato8 = "A";
              dato9 = "F";
              dato10 = "M";
              //Reporte
            }if (dato2 == dosD && gru == dosG && asig == tresA && num == dosN && ev == cuatroE){
              dato3 = "Muestra referencias en formato APA. ";
              dato4 = "Escribe correctamente los nombres de los integrantes.";
              dato5 = "Escribe relaciones de otras asignaturas.";
              dato6 = "Incluye capturas de la práctica funcionando y descritas correctamente.";
              la = "Hola, de acuerdo a los antecedentes de otros docentes en esta materia";
              dato7 = "B";
              dato8 = "A";
              dato9 = "E";
              dato10 = "M";
            }if (dato2 == dosD && gru == dosG && asig == tresA && num == dosN && ev == cuatroE){
              dato3 = "Muestra referencias en formato APA. ";
              dato4 = "Escribe correctamente los nombres de los integrantes.";
              dato5 = "Escribe relaciones de otras asignaturas.";
              dato6 = "Termina correctamente todo lo que se le solicita.";
              la = "Hola, de acuerdo a los antecedentes de otros docentes en esta materia";
              dato7 = "B";
              dato8 = "A";
              dato9 = "E";
              dato10 = "M";
              //7F41
              //Informe
            }if (dato2 == dosD && gru == tresG && asig == tresA && num == unoN && ev == unoE){
              dato3 = "Contiene al menos dos fuentes deinformación en un segundo idioma, en la cual incorpora conocimientos sobre el estilo APA 6a edición. ";
              dato4 = "Se elabora en equipo, al presentar los nombres y matrículas sin errores ortográficos. ";
              dato5 = "Presenta en los anexos, un cronograma de actividades, en la que se establecen tiempos, actividades y responsabilidades. ";
              dato6 = "Contiene del lenguaje de marcas la instrucción para realizar textos, vínculos, listas, tablas y contenedores.";
              la = "Hola, de acuerdo a los antecedentes de otros docentes en esta materia";
              dato7 = "B";
              dato8 = "A";
              dato9 = "F";
              dato10 = "M";
            }if (dato2 == dosD && gru == tresG && asig == tresA && num == dosN && ev == unoE){
              dato3 = "Contiene al menos dos fuentes deinformación en un segundo idioma, en la cual incorpora conocimientos sobre el estilo APA 6a edición. ";
              dato4 = "Se elabora en equipo, al presentar los nombres y matrículas sin errores ortográficos. ";
              dato5 = "Presenta en los anexos, un cronograma de actividades, en la que se establecen tiempos, actividades y responsabilidades. ";
              dato6 = "Contiene del lenguaje de marcas la instrucción para realizar textos, vínculos, listas, tablas y contenedores.";
              la = "Hola, de acuerdo a los antecedentes de otros docentes en esta materia";
              dato7 = "B";
              dato8 = "A";
              dato9 = "F";
              dato10 = "M";
              //Cuadro
            }if (dato2 == dosD && gru == tresG && asig == tresA && num == unoN && ev == dosE){
              dato3 = "Fue elaborado en equipo y presenta los datos completos de los integrantes (nombre y matrícula).";
              dato4 = "Muestra al menos un párrafo de una fuente de información en un segundo idioma en formato APA.";
              dato5 = "Fue elaborado en digital.";
              dato6 = "Compara al menos tres framework para javascript del lado del cliente.";
              la = "Hola, de acuerdo a los antecedentes de otros docentes en esta materia";
              dato7 = "A";
              dato8 = "B";
              dato9 = "D";
              dato10 = "M";
            }if (dato2 == dosD && gru == tresG && asig == tresA && num == dosN && ev == dosE){
              dato3 = "Fue elaborado en equipo y presenta los datos completos de los integrantes (nombre y matrícula).";
              dato4 = "Muestra al menos un párrafo de una fuente de información en un segundo idioma en formato APA.";
              dato5 = "Fue elaborado en digital.";
              dato6 = "Incluye al menos seis criterios de comparación.";
              la = "Hola, de acuerdo a los antecedentes de otros docentes en esta materia";
              dato7 = "A";
              dato8 = "B";
              dato9 = "D";
              dato10 = "M";
              //Proyecto
            }if (dato2 == dosD && gru == tresG && asig == tresA && num == unoN && ev == tresE){
              dato3 = "Incorpora contenido que indica en donde puede ser aplicado los conocimientos aprendidos (menciona al menos tres ambitos de aplicación).";
              dato4 = "Presenta en los anexos la organización del trabajo en equipo en un cronograma de actividades.";
              dato5 = "Fue realizado individual.";
              dato6 = "Es capaz de realizar cambios al código.";
              la = "Hola, de acuerdo a los antecedentes de otros docentes en esta materia";
              dato7 = "E";
              dato8 = "F";
              dato9 = "A";
              dato10 = "M";
            }if (dato2 == dosD && gru == tresG && asig == tresA && num == dosN && ev == tresE){
              dato3 = "Incorpora contenido que indica en donde puede ser aplicado los conocimientos aprendidos (menciona al menos tres ambitos de aplicación).";
              dato4 = "Presenta en los anexos la organización del trabajo en equipo en un cronograma de actividades.";
              dato5 = "Fue realizado en equipo.";
              dato6 = "Menciona las conclusiones de manera individual.";
              la = "Hola, de acuerdo a los antecedentes de otros docentes en esta materia";
              dato7 = "E";
              dato8 = "F";
              dato9 = "A";
              dato10 = "M";
              //Reporte
            }if (dato2 == dosD && gru == tresG && asig == tresA && num == dosN && ev == cuatroE){
              dato3 = "Presenta en los anexos, un cronograma de actividades, en la que se establecen tiempos, actividades y responsabilidades. ";
              dato4 = "Escribe correctamente los nombres de los integrantes.";
              dato5 = "Explica con imágenes el funcionamiento de la práctica.";
              dato6 = "Describe detalladamente los pasos realizados.";
              la = "Hola, de acuerdo a los antecedentes de otros docentes en esta materia";
              dato7 = "F";
              dato8 = "A";
              dato9 = "C";
              dato10 = "M";
            }if (dato2 == dosD && gru == tresG && asig == tresA && num == dosN && ev == cuatroE){
              dato3 = "Presenta en los anexos, un cronograma de actividades, en la que se establecen tiempos, actividades y responsabilidades. ";
              dato4 = "Escribe correctamente los nombres de los integrantes.";
              dato5 = "Explica con imágenes el funcionamiento de la práctica.";
              dato6 = "Termina correctamente todo lo que se le solicita.";
              la = "Hola, de acuerdo a los antecedentes de otros docentes en esta materia";
              dato7 = "F";
              dato8 = "A";
              dato9 = "C";
              dato10 = "M";
              //Programacion
              //7F21
              //Docente 3
              //
          }if (dato2 == tresD && gru == unoG && asig == dosA && num == unoN && ev == unoE){
              dato3 = "Menciona la posible aplicación de lo expuesto en otras disciplinas de un modo claro y puntual.";
              dato4 = "Presenta y cita al menos 2 fuentes adicionales de información en un según idioma en formato APA.";
              dato5 = "Presenta una propuesta de alguna plataforma para desarrollo de aplicaciones en la nube de un modo puntual.";
              dato6 = "Muestra un ejemplo de una aplicación en la nube existente en donde se resalte la información presentada en su informede manera clara y prescisa.";
              la = "Hola, de acuerdo a los antecedentes de otros docentes en esta materia";
              dato7 = "E";
              dato8 = "B";
              dato9 = "A";
              dato10 = "M";
            }if (dato2 == tresD && gru == unoG && asig == dosA && num == unoN && ev == dosE){
              dato3 = "Incluye una propuesta de uso de alguna plataforma para la implementación del caso de estudio de un modo pertinente a lo presentado.";
              dato4 = "Muestra un punto de analisis entre computo en la nube y computo tradicional de acuerdo algún trabajo citado en la bibliografía.";
              dato5 = "Incluye ejemplos de desarrollo de aplicaciones en las plataformas presentadas de un modo concreto. ";
              dato6 = "Muestra un punto de vista personal sobre el mejor modo de implementación del caso de estudio de una manera concisa.";
              la = "Hola, de acuerdo a los antecedentes de otros docentes en esta materia";
              dato7 = "B";
              dato8 = "D";
              dato9 = "A";
              dato10 = "M";
            }if (dato2 == tresD && gru == unoG && asig == dosA && num == unoN && ev == tresE){
              dato3 = "El estudiante cita y muestra el uso de 3 procedimientos aprendidos en otras asignaturas o propuestos por él para el desarrollo del proyecto. ";
              dato4 = "El estudiante entrega en el tiempo requerido el proyecto al 100%.";
              dato5 = "El proyecto puede resolver una problemática de 3 disciplinas diferentes a sistemas computacionales.";
              dato6 = "El estudiante muestra la arquitectura de la solución propuesta y es capaz de modificar la implementación del proyecto de acuerdo a lo requeirdo por el docente en un 80 y 100 %.";
              la = "Hola, de acuerdo a los antecedentes de otros docentes en esta materia";
              dato7 = "C";
              dato8 = "F";
              dato9 = "E";
              dato10 = "M";
            }if (dato2 == tresD && gru == unoG && asig == dosA && num == unoN && ev == cuatroE){
              dato3 = "Presenta un cronograma de actividades. ";
              dato4 = "Menciona como la práctica ayuda a otras disciplinas.";
              dato5 = "Lo entrega en el tiempo solicitado.";
              dato6 = "El estudiante es capaz de realizar un cambio al código sin nigún problema.";
              la = "Hola, de acuerdo a los antecedentes de otros docentes en esta materia";
              dato7 = "A";
              dato8 = "E";
              dato9 = "F";
              dato10 = "M";
            }if (dato2 == tresD && gru == unoG && asig == dosA && num == dosN && ev == unoE){
              dato3 = "Menciona la posible aplicación de lo expuesto en otras disciplinas de un modo claro y puntual.";
              dato4 = "Presenta y cita al menos 2 fuentes adicionales de información en un según idioma en formato APA.";
              dato5 = "Presenta una propuesta de alguna plataforma para desarrollo de aplicaciones en la nube de un modo puntual.";
              dato6 = "Presenta una propuesta de alguna plataforma para desarrollo de aplicaciones en la nube de un modo puntual.";
              la = "Hola, de acuerdo a los antecedentes de otros docentes en esta materia";
              dato7 = "E";
              dato8 = "B";
              dato9 = "A";
              dato10 = "M";
            }if (dato2 == tresD && gru == unoG && asig == dosA && num == dosN && ev == dosE){
              dato3 = "Incluye una propuesta de uso de alguna plataforma para la implementación del caso de estudio de un modo pertinente a lo presentado.";
              dato4 = "Incluye ejemplos de desarrollo de aplicaciones en las plataformas presentadas de un modo concreto.";
              dato5 = "Muestra un punto de analisis entre computo en la nube y computo tradicional de acuerdo algún trabajo citado en la bibliografía. ";
              dato6 = "Muestra un contraste entre las ventajas y 2 desventajas del desarrollo tradicional y la nube de mayor a menor importancia.";
              la = "Hola, de acuerdo a los antecedentes de otros docentes en esta materia";
              dato7 = "B";
              dato8 = "A";
              dato9 = "D";
              dato10 = "M";
            }if (dato2 == tresD && gru == unoG && asig == dosA && num == dosN && ev == tresE){
              dato3 = "El estudiante cita y muestra el uso de 3 procedimientos aprendidos en otras asignaturas o propuestos por él para el desarrollo del proyecto. ";
              dato4 = "El estudiante entrega en el tiempo requerido el proyecto al 100%.";
              dato5 = "El proyecto puede resolver una problemática de 3 disciplinas diferentes a sistemas computacionales.";
              dato6 = "El proyecto presentado utiliza 3 componentes de computación en la nube para su solución.";
              la = "Hola, de acuerdo a los antecedentes de otros docentes en esta materia";
              dato7 = "C";
              dato8 = "F";
              dato9 = "E";
              dato10 = "M";
            }if (dato2 == tresD && gru == unoG && asig == dosA && num == dosN && ev == cuatroE){
              dato3 = "Presenta un cronograma de actividades. ";
              dato4 = "Menciona como la práctica ayuda a otras disciplinas.";
              dato5 = "Lo entrega en el tiempo solicitado.";
              dato6 = "El estudiante termina de un 80 al 100% la práctica.";
              la = "Hola, de acuerdo a los antecedentes de otros docentes en esta materia";
              dato7 = "A";
              dato8 = "E";
              dato9 = "F";
              dato10 = "M";
              //Comienza grupo 7F31
              //Informe
            }if (dato2 == tresD && gru == dosG && asig == dosA && num == unoN && ev == unoE){
              dato3 = "Presenta y cita al menos 2 fuentes adicionales de información en un según idioma en formato APA. ";
              dato4 = "Menciona la posible aplicación de lo expuesto en otras disciplinas de un modo claro y puntual.";
              dato5 = "Presenta una propuesta de alguna plataforma para desarrollo de aplicaciones en la nube de un modo puntual.";
              dato6 = "Menciona sus conclusiones y comentarios del tema expuesto de un modo coherente y de acuerdo a la competencia del tema.";
              la = "Hola, de acuerdo a los antecedentes de otros docentes en esta materia";
              dato7 = "B";
              dato8 = "E";
              dato9 = "A";
              dato10 = "M";
            }if (dato2 == tresD && gru == dosG && asig == dosA && num == dosN && ev == unoE){
              dato3 = "Presenta y cita al menos 2 fuentes adicionales de información en un según idioma en formato APA. ";
              dato4 = "Menciona la posible aplicación de lo expuesto en otras disciplinas de un modo claro y puntual.";
              dato5 = "Presenta una propuesta de alguna plataforma para desarrollo de aplicaciones en la nube de un modo puntual.";
              dato6 = "Muestra un ejemplo de una aplicación en la nube existente en donde se resalte la información presentada en su informe de manera clara y prescisa.";
              la = "Hola, de acuerdo a los antecedentes de otros docentes en esta materia";
              dato7 = "B";
              dato8 = "E";
              dato9 = "A";
              dato10 = "M";
              //Cuadro
            }if (dato2 == tresD && gru == dosG && asig == dosA && num == unoN && ev == dosE){
              dato3 = "Muestra un punto de analisis entre computo en la nube y computo tradicional de acuerdo algún trabajo citado en la bibliografía.";
              dato4 = "Incluye una propuesta de uso de alguna plataforma para la implementación del caso de estudio de un modo pertinente a lo presentado.";
              dato5 = "Incluye ejemplos de desarrollo de aplicaciones en las plataformas presentadas de un modo concreto. ";
              dato6 = "Muestra un punto de vista personal sobre el mejor modo de implementación del caso de estudio de una manera concisa. ";
              la = "Hola, de acuerdo a los antecedentes de otros docentes en esta materia";
              dato7 = "D";
              dato8 = "B";
              dato9 = "A";
              dato10 = "M";
            }if (dato2 == tresD && gru == dosG && asig == dosA && num == dosN && ev == dosE){
              dato3 = "Muestra un punto de analisis entre computo en la nube y computo tradicional de acuerdo algún trabajo citado en la bibliografía.";
              dato4 = "Incluye una propuesta de uso de alguna plataforma para la implementación del caso de estudio de un modo pertinente a lo presentado.";
              dato5 = "Incluye ejemplos de desarrollo de aplicaciones en las plataformas presentadas de un modo concreto. ";
              dato6 = "Muestra el análisis de un caso de estudio real del 1 desarrollo modo tradicional de un sistema y mediante computacional el uso de la de nube de manera sencilla y condensada.";
              la = "Hola, de acuerdo a los antecedentes de otros docentes en esta materia";
              dato7 = "D";
              dato8 = "B";
              dato9 = "A";
              dato10 = "M";
              //Proyecto
            }if (dato2 == tresD && gru == dosG && asig == dosA && num == unoN && ev == tresE){
              dato3 = "El proyecto puede resolver una problemática de 3 disciplinas diferentes a sistemas computacionales.";
              dato4 = "El estudiante entrega en el tiempo requerido el proyecto al 100%.";
              dato5 = "El estudiante cita y muestra el uso de 3 procedimientos aprendidos en otras asignaturas o propuestos por él para el desarrollo del proyecto.";
              dato6 = "El estudiante describe de manera clara la funcion de los 3 componentes utilizados de computacion en la nube y su relación para la solución del proyecto.";
              la = "Hola, de acuerdo a los antecedentes de otros docentes en esta materia";
              dato7 = "E";
              dato8 = "F";
              dato9 = "C";
              dato10 = "M";
            }if (dato2 == tresD && gru == dosG && asig == dosA && num == dosN && ev == tresE){
               dato3 = "El proyecto puede resolver una problemática de 3 disciplinas diferentes a sistemas computacionales.";
              dato4 = "El estudiante entrega en el tiempo requerido el proyecto al 100%.";
              dato5 = "El estudiante cita y muestra el uso de 3 procedimientos aprendidos en otras asignaturas o propuestos por él para el desarrollo del proyecto.";
              dato6 = "El proyecto es implementado en un rango del 80 al 100 % .";
              la = "Hola, de acuerdo a los antecedentes de otros docentes en esta materia";
              dato7 = "E";
              dato8 = "F";
              dato9 = "C";
              dato10 = "M";
              //Reporte
            }if (dato2 == tresD && gru == dosG && asig == dosA && num == dosN && ev == cuatroE){
              dato3 = "Menciona como la práctica ayuda a otras disciplinas.";
              dato4 = "Menciona las conclusiones de manera clara y precisa de acuerdo a la competencia del tema.";
              dato5 = "Lo entrega en el tiempo solicitado. ";
              dato6 = "El estudiante termina de un 80 al 100% la práctica.";
              la = "Hola, de acuerdo a los antecedentes de otros docentes en esta materia";
              dato7 = "E";
              dato8 = "C";
              dato9 = "F";
              dato10 = "M";
            }if (dato2 == tresD && gru == dosG && asig == dosA && num == dosN && ev == cuatroE){
              dato3 = "Menciona como la práctica ayuda a otras disciplinas.";
              dato4 = "Menciona las conclusiones de manera clara y precisa de acuerdo a la competencia del tema.";
              dato5 = "Lo entrega en el tiempo solicitado. ";
              dato6 = "Muestra capturas de la práctica funcionando con lo solicitado.";
              la = "Hola, de acuerdo a los antecedentes de otros docentes en esta materia";
              dato7 = "E";
              dato8 = "C";
              dato9 = "F";
              dato10 = "M";
              //7F41
              //Informe
            }if (dato2 == tresD && gru == tresG && asig == dosA && num == unoN && ev == unoE){
              dato3 = "Presenta y cita al menos 2 fuentes adicionales de información en un según idioma en formato APA. ";
              dato4 = "Presenta una propuesta de alguna plataforma para desarrollo de aplicaciones en la nube de un modo puntual. ";
              dato5 = "Menciona la posible aplicación de lo expuesto en otras disciplinas de un modo claro y puntual.";
              dato6 = "Presenta una propuesta de alguna plataforma para desarrollo de aplicaciones en la nube de un modo puntual. ";
              la = "Hola, de acuerdo a los antecedentes de otros docentes en esta materia";
              dato7 = "E";
              dato8 = "C";
              dato9 = "F";
              dato10 = "M";
            }if (dato2 == tresD && gru == tresG && asig == dosA && num == dosN && ev == unoE){
              dato3 = "Presenta y cita al menos 2 fuentes adicionales de información en un según idioma en formato APA. ";
              dato4 = "Presenta una propuesta de alguna plataforma para desarrollo de aplicaciones en la nube de un modo puntual. ";
              dato5 = "Menciona la posible aplicación de lo expuesto en otras disciplinas de un modo claro y puntual.";
              dato6 = "Presenta información sobre algún aspecto para el desarrollo de aplicaciones en la nube y ejemplos del mismo de manera clara y precisa. ";
              la = "Hola, de acuerdo a los antecedentes de otros docentes en esta materia";
              dato7 = "E";
              dato8 = "C";
              dato9 = "F";
              dato10 = "M";
              //Cuadro
            }if (dato2 == tresD && gru == tresG && asig == dosA && num == unoN && ev == dosE){
              dato3 = "Incluye ejemplos de desarrollo de aplicaciones en las plataformas presentadas de un modo concreto.";
              dato4 = "Muestra un punto de analisis entre computo en la nube y computo tradicional de acuerdo algún trabajo citado en la bibliografía.";
              dato5 = "Incluye una propuesta de uso de alguna plataforma para la implementación del caso de estudio de un modo pertinente a lo presentado. ";
              dato6 = "Muestra un contraste entre las ventajas y 2 desventajas del desarrollo tradicional y la nube de mayor a menor importancia. ";
              la = "Hola, de acuerdo a los antecedentes de otros docentes en esta materia";
              dato7 = "A";
              dato8 = "D";
              dato9 = "B";
              dato10 = "M";
            }if (dato2 == tresD && gru == tresG && asig == dosA && num == dosN && ev == dosE){
              dato3 = "Incluye ejemplos de desarrollo de aplicaciones en las plataformas presentadas de un modo concreto.";
              dato4 = "Muestra un punto de analisis entre computo en la nube y computo tradicional de acuerdo algún trabajo citado en la bibliografía.";
              dato5 = "Incluye una propuesta de uso de alguna plataforma para la implementación del caso de estudio de un modo pertinente a lo presentado. ";
              dato6 = "Muestra el análisis de un caso de estudio real del 1 desarrollo modo tradicional de un sistema y mediante computacional el uso de la de nube de manera sencilla y condensada. ";
              la = "Hola, de acuerdo a los antecedentes de otros docentes en esta materia";
              dato7 = "A";
              dato8 = "D";
              dato9 = "B";
              dato10 = "M";
              //Proyecto
            }if (dato2 == tresD && gru == tresG && asig == dosA && num == unoN && ev == tresE){
              dato3 = "El estudiante entrega en el tiempo requerido el proyecto al 100%. ";
              dato4 = "El proyecto puede resolver una problemática de 3 disciplinas diferentes a sistemas computacionales.";
              dato5 = "El estudiante cita y muestra el uso de 3 procedimientos aprendidos en otras asignaturas o propuestos por él para el desarrollo del proyecto.";
              dato6 = "El estudiante muestra la arquitectura de la solución propuesta y es capaz de modificar la implementación del proyecto de acuerdo a lo requeirdo por el docente en un 80 y 100 %.";
              la = "Hola, de acuerdo a los antecedentes de otros docentes en esta materia";
              dato7 = "A";
              dato8 = "D";
              dato9 = "B";
              dato10 = "M";
            }if (dato2 == tresD && gru == tresG && asig == dosA && num == dosN && ev == tresE){
               dato3 = "El estudiante entrega en el tiempo requerido el proyecto al 100%. ";
              dato4 = "El proyecto puede resolver una problemática de 3 disciplinas diferentes a sistemas computacionales.";
              dato5 = "El estudiante cita y muestra el uso de 3 procedimientos aprendidos en otras asignaturas o propuestos por él para el desarrollo del proyecto.";
              dato6 = "El estudiante describe de manera clara la funcion de los 3 componentes utilizados de computacion en la nube y su relación para la solución del proyecto.";
              la = "Hola, de acuerdo a los antecedentes de otros docentes en esta materia";
              dato7 = "A";
              dato8 = "D";
              dato9 = "B";
              dato10 = "M";
              //Reporte
            }if (dato2 == tresD && gru == tresG && asig == dosA && num == unoN && ev == cuatroE){
              dato3 = "Lo entrega en el tiempo solicitado. ";
              dato4 = "Menciona como la práctica ayuda a otras disciplinas. ";
              dato5 = "Presenta un cronograma de actividades. ";
              dato6 = "El estudiante es capaz de realizar un cambio al código sin nigún problema.";
              la = "Hola, de acuerdo a los antecedentes de otros docentes en esta materia";
              dato7 = "A";
              dato8 = "D";
              dato9 = "B";
              dato10 = "M";
            }if (dato2 == tresD && gru == tresG && asig == dosA && num == dosN && ev == cuatroE){
              dato3 = "Lo entrega en el tiempo solicitado. ";
              dato4 = "Menciona como la práctica ayuda a otras disciplinas. ";
              dato5 = "Presenta un cronograma de actividades. ";
              dato6 = "Muestra capturas de la práctica funcionando con lo solicitado.";
              la = "Hola, de acuerdo a los antecedentes de otros docentes en esta materia";
              dato7 = "A";
              dato8 = "D";
              dato9 = "B";
              dato10 = "M";
              //REDES
              //7F21
              //Informe
            }if (dato2 == tresD && gru == unoG && asig == unoA && num == unoN && ev == unoE){
              dato3 = "Incluye imágenes relacionadas con el tema y las explica de forma clara y precisa. ";
              dato4 = "Utiilza conceptos aprendidos en otras asignaturas para documentar su trabajo.";
              dato5 = "Presenta en los anexos la organización del trabajo en equipo en un cronograma de actividades, estableciendo tiempos y responsabilidades. ";
              dato6 = "Muestra estándares y protocolos para redes WAN/LAN.";
              la = "Hola, de acuerdo a tus antecedentes";
              dato7 = "D";
              dato8 = "E";
              dato9 = "F";
              dato10 = "M";
            }if (dato2 == tresD && gru == unoG && asig == unoA && num == unoN && ev == dosE){
              dato3 = "Se elaboró en equipo y presenta los datos completos de los integrantes. ";
              dato4 = "Presenta una lista mínimo de tres fuentes de consulta incorporando conocimientos sobre el estilo APA 6ª edición para citar y referenciarlas. ";
              dato5 = "Muestra el uso de conocimientos de otras disciplinas contribuyendo a la formación integral del estudiante.";
              dato6 = "Contiene ejemplos descritos correctamente.";
              la = "Hola, de acuerdo a tus antecedentes";
              dato7 = "A";
              dato8 = "B";
              dato9 = "E";
              dato10 = "M";
            }if (dato2 == tresD && gru == unoG && asig == unoA && num == unoN && ev == tresE){
              dato3 = "Fue entregado en tiempo y forma.";
              dato4 = "Presenta una lista mínimo de tres fuentes de consulta incorporando conocimientos sobre el estilo APA 6ª edición para citar y referenciarlas. ";
              dato5 = "Muestra el uso de conocimientos de otras disciplinas contribuyendo a la formación integral del estudiante. ";
              dato6 = "Presenta la documentación estructurada de acuerdo a la orden de trabajo.";
              la = "Hola, de acuerdo a tus antecedentes";
              dato7 = "F";
              dato8 = "B";
              dato9 = "E";
              dato10 = "M";
            }if (dato2 == tresD && gru == unoG && asig == unoA && num == unoN && ev == cuatroE){
              dato3 = "Presenta una lista mínimo de tres fuentes de consulta incorporando conocimientos sobre el estilo APA 6ª edición para citar y referenciarlas.";
              dato4 = "Muestra el uso de conocimientos de otras disciplinas contribuyendo a la formación integral del estudiante.";
              dato5 = "Contiene imágenes explicadas que demuestran el uso de de dispositivos de red de forma clara y precisa.";
              dato6 = "Muestra los procedimientos realizados para completar la actividad con base en lo solicitado.";
              la = "Hola, de acuerdo a tus antecedentes";
              dato7 = "B";
              dato8 = "E";
              dato9 = "C";
              dato10 = "M";
            }if (dato2 == tresD && gru == unoG && asig == unoA && num == dosN && ev == unoE){
              dato3 = "Contiene al menos dos fuentes de información en un segundo idioma, incorporando conocimientos sobre el estilo APA 6ª edición para citar y referenciar las fuentes de consulta.";
              dato4 = "Utiilza conceptos aprendidos en otras asignaturas para documentar su trabajo.";
              dato5 = "Presenta en los anexos la organización del trabajo en equipo en un cronograma de actividades, estableciendo tiempos y responsabilidades. ";
              dato6 = "Muestra conclusiones personales y grupales de acuerdo a la competencia del tema.";
              la = "Hola, de acuerdo a tus antecedentes";
              dato7 = "B";
              dato8 = "E";
              dato9 = "F";
              dato10 = "M";
            }if (dato2 == tresD && gru == unoG && asig == unoA && num == dosN && ev == dosE){
              dato3 = "Se elaboró en equipo y presenta los datos completos de los integrantes. ";
              dato4 = "Presenta una lista mínimo de tres fuentes de consulta incorporando conocimientos sobre el estilo APA 6ª edición para citar y referenciarlas. ";
              dato5 = "Presenta en los anexos la organización del trabajo en equipo en un cronograma de actividades, estableciendo tiempos y responsabilidades. ";
              dato6 = "Muestra variables de contraste de acuerdo a la competencia del tema.";
              la = "Hola, de acuerdo a tus antecedentes";
              dato7 = "A";
              dato8 = "B";
              dato9 = "F";
              dato10 = "M";
            }if (dato2 == tresD && gru == unoG && asig == unoA && num == dosN && ev == tresE){
              dato3 = "Presenta en los anexos la organización del trabajo en equipo en un cronograma de actividades, estableciendo tiempos y responsabilidades. ";
              dato4 = "Presenta una lista mínimo de tres fuentes de consulta incorporando conocimientos sobre el estilo APA 6ª edición para citar y referenciarlas. ";
              dato5 = "Muestra el uso de conocimientos de otras disciplinas contribuyendo a la formación integral del estudiante. ";
              dato6 = "Funciona correctamente demostrando la conectividad de la red.";
              la = "Hola, de acuerdo a tus antecedentes";
              dato7 = "F";
              dato8 = "B";
              dato9 = "E";
              dato10 = "M";
            }if (dato2 == tresD && gru == unoG && asig == unoA && num == dosN && ev == cuatroE){
              dato3 = "Se elaboró en equipo y presenta los datos completos de los integrantes.  ";
              dato4 = "Presenta en los anexos la organización del trabajo en equipo en un cronograma de actividades, estableciendo tiempos y responsabilidades. ";
              dato5 = "Muestra el uso de conocimientos de otras disciplinas contribuyendo a la formación integral del estudiante. ";
              dato6 = "Muestra variables de contraste de acuerdo a la competencia del tema.";
              la = "Hola, de acuerdo a tus antecedentes";
              dato7 = "A";
              dato8 = "F";
              dato9 = "E";
              dato10 = "M";
              //Comienza grupo 7F31
              //Informe
            }if (dato2 == tresD && gru == dosG && asig == unoA && num == unoN && ev == unoE){
              dato3 = "Utiilza conceptos aprendidos en otras asignaturas para documentar su trabajo.";
              dato4 = "Incluye imágenes relacionadas con el tema y las explica de forma clara y precisa.";
              dato5 = "Contiene al menos dos fuentes de información en un segundo idioma, incorporando conocimientos sobre el estilo APA 6ª edición para citar y referenciar las fuentes de consulta.";
              dato6 = "Describe lo solicitado con base en la competencia del tema.";
              la = "Hola, de acuerdo a tus antecedentes";
              dato7 = "E";
              dato8 = "D";
              dato9 = "B";
              dato10 = "M";
            }if (dato2 == tresD && gru == dosG && asig == unoA && num == dosN && ev == unoE){
              dato3 = "Utiilza conceptos aprendidos en otras asignaturas para documentar su trabajo.";
              dato4 = "Incluye imágenes relacionadas con el tema y las explica de forma clara y precisa.";
              dato5 = "Contiene al menos dos fuentes de información en un segundo idioma, incorporando conocimientos sobre el estilo APA 6ª edición para citar y referenciar las fuentes de consulta.";
              dato6 = "Muestra conclusiones personales y grupales de acuerdo a la competencia del tema.";
              la = "Hola, de acuerdo a tus antecedentes";
              dato7 = "E";
              dato8 = "D";
              dato9 = "B";
              dato10 = "M";
              //Cuadro
            }if (dato2 == tresD && gru == dosG && asig == unoA && num == unoN && ev == dosE){
              dato3 = "Presenta una lista mínimo de tres fuentes de consulta incorporando conocimientos sobre el estilo APA 6ª edición para citar y referenciarlas.";
              dato4 = "Presenta en los anexos la organización del trabajo en equipo en un cronograma de actividades, estableciendo tiempos y responsabilidades.";
              dato5 = "Se elaboró en equipo y presenta los datos completos de los integrantes. ";
              dato6 = "Muestra variables de contraste de acuerdo a la competencia del tema.";
              la = "Hola, de acuerdo a tus antecedentes";
              dato7 = "E";
              dato8 = "D";
              dato9 = "B";
              dato10 = "M";
            }if (dato2 == tresD && gru == dosG && asig == unoA && num == dosN && ev == dosE){
              dato3 = "Presenta una lista mínimo de tres fuentes de consulta incorporando conocimientos sobre el estilo APA 6ª edición para citar y referenciarlas.";
              dato4 = "Presenta en los anexos la organización del trabajo en equipo en un cronograma de actividades, estableciendo tiempos y responsabilidades.";
              dato5 = "Se elaboró en equipo y presenta los datos completos de los integrantes. ";
              dato6 = "Contiene ejemplos descritos correctamente.";
              la = "Hola, de acuerdo a tus antecedentes";
              dato7 = "E";
              dato8 = "D";
              dato9 = "B";
              dato10 = "M";
              //Proyecto
            }if (dato2 == tresD && gru == dosG && asig == unoA && num == unoN && ev == tresE){
              dato3 = "Muestra el uso de conocimientos de otras disciplinas contribuyendo a la formación integral del estudiante.";
              dato4 = "Fue entregado en tiempo y forma.";
              dato5 = "Presenta una lista mínimo de tres fuentes de consulta incorporando conocimientos sobre el estilo APA 6ª edición para citar y referenciarlas.";
              dato6 = "Presenta la documentación estructurada de acuerdo a la orden de trabajo.";
              la = "Hola, de acuerdo a tus antecedentes";
              dato7 = "E";
              dato8 = "D";
              dato9 = "B";
              dato10 = "M";
            }if (dato2 == tresD && gru == dosG && asig == unoA && num == dosN && ev == tresE){
               dato3 = "Muestra el uso de conocimientos de otras disciplinas contribuyendo a la formación integral del estudiante.";
              dato4 = "Fue entregado en tiempo y forma.";
              dato5 = "Presenta una lista mínimo de tres fuentes de consulta incorporando conocimientos sobre el estilo APA 6ª edición para citar y referenciarlas.";
              dato6 = "Presenta las conclusiones de manera individual y general.";
              la = "Hola, de acuerdo a tus antecedentes";
              dato7 = "E";
              dato8 = "D";
              dato9 = "B";
              dato10 = "M";
              //Reporte
            }if (dato2 == tresD && gru == dosG && asig == unoA && num == dosN && ev == cuatroE){
              dato3 = "Presenta en los anexos la organización del trabajo en equipo en un cronograma de actividades, estableciendo tiempos y responsabilidades.";
              dato4 = "Contiene imágenes explicadas que demuestran el uso de de dispositivos de red de forma clara y precisa.";
              dato5 = "Presenta una lista mínimo de tres fuentes de consulta incorporando conocimientos sobre el estilo APA 6ª edición para citar y referenciarlas.";
              dato6 = "Muestra las pruebas realizadas para garantizar la conectividad de la red.";
              la = "Hola, de acuerdo a tus antecedentes";
              dato7 = "F";
              dato8 = "C";
              dato9 = "B";
              dato10 = "M";
            }if (dato2 == tresD && gru == dosG && asig == unoA && num == dosN && ev == cuatroE){
              dato3 = "Presenta en los anexos la organización del trabajo en equipo en un cronograma de actividades, estableciendo tiempos y responsabilidades.";
              dato4 = "Contiene imágenes explicadas que demuestran el uso de de dispositivos de red de forma clara y precisa.";
              dato5 = "Presenta una lista mínimo de tres fuentes de consulta incorporando conocimientos sobre el estilo APA 6ª edición para citar y referenciarlas.";
              dato6 = "Presenta las conclusiones de manera individual y general.";
              la = "Hola, de acuerdo a tus antecedentes";
              dato7 = "F";
              dato8 = "C";
              dato9 = "B";
              dato10 = "M";
              //7F41
              //Informe
            }if (dato2 == tresD && gru == tresG && asig == unoA && num == unoN && ev == unoE){
              dato3 = "Contiene al menos dos fuentes de información en un segundo idioma, incorporando conocimientos sobre el estilo APA 6ª edición para citar y referenciar las fuentes de consulta. ";
              dato4 = "Presenta en los anexos la organización del trabajo en equipo en un cronograma de actividades, estableciendo tiempos y responsabilidades.";
              dato5 = "Incluye imágenes relacionadas con el tema y las explica de forma clara y precisa. ";
              dato6 = "Describe lo solicitado con base en la competencia del tema.";
              la = "Hola, de acuerdo a tus antecedentes";
              dato7 = "B";
              dato8 = "F";
              dato9 = "D";
              dato10 = "M";
            }if (dato2 == tresD && gru == tresG && asig == unoA && num == dosN && ev == unoE){
              dato3 = "Contiene al menos dos fuentes de información en un segundo idioma, incorporando conocimientos sobre el estilo APA 6ª edición para citar y referenciar las fuentes de consulta. ";
              dato4 = "Presenta en los anexos la organización del trabajo en equipo en un cronograma de actividades, estableciendo tiempos y responsabilidades.";
              dato5 = "Incluye imágenes relacionadas con el tema y las explica de forma clara y precisa. ";
              dato6 = "Muestra estándares y protocolos para redes WAN/LAN.";
              la = "Hola, de acuerdo a tus antecedentes";
              dato7 = "B";
              dato8 = "F";
              dato9 = "D";
              dato10 = "M";
              //Cuadro
            }if (dato2 == tresD && gru == tresG && asig == unoA && num == unoN && ev == dosE){
              dato3 = "Se elaboró en equipo y presenta los datos completos de los integrantes. ";
              dato4 = "Presenta en los anexos la organización del trabajo en equipo en un cronograma de actividades, estableciendo tiempos y responsabilidades.";
              dato5 = "Presenta una lista mínimo de tres fuentes de consulta incorporando conocimientos sobre el estilo APA 6ª edición para citar y referenciarlas.";
              dato6 = "Se presenta de forma estructurada con base en lo indicado en la orden de trabajo.";
              la = "Hola, de acuerdo a tus antecedentes";
              dato7 = "A";
              dato8 = "F";
              dato9 = "B";
              dato10 = "M";
            }if (dato2 == tresD && gru == tresG && asig == unoA && num == dosN && ev == dosE){
              dato3 = "Se elaboró en equipo y presenta los datos completos de los integrantes. ";
              dato4 = "Presenta en los anexos la organización del trabajo en equipo en un cronograma de actividades, estableciendo tiempos y responsabilidades.";
              dato5 = "Presenta una lista mínimo de tres fuentes de consulta incorporando conocimientos sobre el estilo APA 6ª edición para citar y referenciarlas.";
              dato6 = "Contiene ejemplos descritos correctamente.";
              la = "Hola, de acuerdo a tus antecedentes";
              dato7 = "A";
              dato8 = "F";
              dato9 = "B";
              dato10 = "M";
              //Proyecto
            }if (dato2 == tresD && gru == tresG && asig == unoA && num == unoN && ev == tresE){
              dato3 = "Muestra el uso de conocimientos de otras disciplinas contribuyendo a la formación integral del estudiante.";
              dato4 = "Fue entregado en tiempo y forma.";
              dato5 = "Presenta una lista mínimo de tres fuentes de consulta incorporando conocimientos sobre el estilo APA 6ª edición para citar y referenciarlas.";
              dato6 = "Presenta la documentación estructurada de acuerdo a la orden de trabajo.";
              la = "Hola, de acuerdo a tus antecedentes";
              dato7 = "E";
              dato8 = "F";
              dato9 = "B";
              dato10 = "M";
            }if (dato2 == tresD && gru == tresG && asig == unoA && num == dosN && ev == tresE){
              dato3 = "Muestra el uso de conocimientos de otras disciplinas contribuyendo a la formación integral del estudiante.";
              dato4 = "Fue entregado en tiempo y forma.";
              dato5 = "Presenta una lista mínimo de tres fuentes de consulta incorporando conocimientos sobre el estilo APA 6ª edición para citar y referenciarlas.";
              dato6 = "Presenta las conclusiones de manera individual y general.";
              la = "Hola, de acuerdo a tus antecedentes";
              dato7 = "E";
              dato8 = "F";
              dato9 = "B";
              dato10 = "M";
              //Reporte
            }if (dato2 == tresD && gru == tresG && asig == unoA && num == dosN && ev == cuatroE){
              dato3 = "Contiene imágenes explicadas que demuestran el uso de de dispositivos de red de forma clara y precisa.";
              dato4 = "Muestra el uso de conocimientos de otras disciplinas contribuyendo a la formación integral del estudiante.";
              dato5 = "Se elaboró en equipo y presenta los datos completos de los integrantes.";
              dato6 = "Muestra las pruebas realizadas para garantizar la conectividad de la red.";
              la = "Hola, de acuerdo a tus antecedentes";
              dato7 = "C";
              dato8 = "E";
              dato9 = "A";
              dato10 = "M";
            }if (dato2 == tresD && gru == tresG && asig == unoA && num == dosN && ev == cuatroE){
              dato3 = "Contiene imágenes explicadas que demuestran el uso de de dispositivos de red de forma clara y precisa.";
              dato4 = "Muestra el uso de conocimientos de otras disciplinas contribuyendo a la formación integral del estudiante.";
              dato5 = "Se elaboró en equipo y presenta los datos completos de los integrantes.";
              dato6 = "Se presenta de forma estructurada con base en lo incado en la orden de trabajo. ";
              la = "Hola, de acuerdo a tus antecedentes";
              dato7 = "C";
              dato8 = "E";
              dato9 = "A";
              dato10 = "M";
              //Programacion
              //7F21
          }if (dato2 == tresD && gru == unoG && asig == tresA && num == unoN && ev == unoE){
              dato3 = "Presenta en los anexos, un cronograma de actividades, en la que se establecen tiempos, actividades y responsabilidades. ";
              dato4 = "Incorpora contenido que indica en donde puede ser aplicado los conocimientos aprendidos (menciona al menos tres ambitos de aplicación).";
              dato5 = "Se elabora en equipo, al presentar los nombres y matrículas sin errores ortográficos.";
              dato6 = "Contiene imágenes de como se ven textos, vínculos, listas, tablas y contenedores.";
              la = "Hola, de acuerdo a tus antecedentes";
              dato7 = "F";
              dato8 = "E";
              dato9 = "A";
              dato10 = "M";
            }if (dato2 == tresD && gru == unoG && asig == tresA && num == unoN && ev == dosE){
              dato3 = "Fue entregado en tiempo y forma.";
              dato4 = "Fue elaborado en digital. ";
              dato5 = "Fue elaborado en equipo y presenta los datos completos de los integrantes (nombre y matrícula).";
              dato6 = "Incluye al menos seis criterios de comparación.";
              la = "Hola, de acuerdo a tus antecedentes";
              dato7 = "F";
              dato8 = "D";
              dato9 = "A";
              dato10 = "M";
            }if (dato2 == tresD && gru == unoG && asig == tresA && num == unoN && ev == tresE){
              dato3 = "Fue realizado en equipo.";
              dato4 = "Muestra conocimientos de otras asignaturas.";
              dato5 = "Presenta en los anexos la organización del trabajo en equipo en un cronograma de actividades. ";
              dato6 = "Es capaz de realizar cambios al código.";
              la = "Hola, de acuerdo a tus antecedentes";
              dato7 = "A";
              dato8 = "E";
              dato9 = "F";
              dato10 = "M";
            }if (dato2 == tresD && gru == unoG && asig == tresA && num == unoN && ev == cuatroE){
              dato3 = "Presenta en los anexos, un cronograma de actividades, en la que se establecen tiempos, actividades y responsabilidades. ";
              dato4 = "Escribe correctamente los nombres de los integrantes.";
              dato5 = "Muestra referencias en formato APA.";
              dato6 = "Describe detalladamente los pasos realizados.";
              la = "Hola, de acuerdo a tus antecedentes";
              dato7 = "F";
              dato8 = "A";
              dato9 = "B";
              dato10 = "M";
            }if (dato2 == tresD && gru == unoG && asig == tresA && num == dosN && ev == unoE){
              dato3 = "Contiene al menos dos fuentes deinformación en un segundo idioma, en la cual incorpora conocimientos sobre el estilo APA 6a edición.";
              dato4 = "Se elabora en equipo, al presentar los nombres y matrículas sin errores ortográficos.";
              dato5 = "Presenta en los anexos, un cronograma de actividades, en la que se establecen tiempos, actividades y responsabilidades.";
              dato6 = "Describe detalladamente los pasos realizados.";
              la = "Hola, de acuerdo a tus antecedentes";
              dato7 = "B";
              dato8 = "A";
              dato9 = "F";
              dato10 = "M";
            }if (dato2 == tresD && gru == unoG && asig == tresA && num == dosN && ev == dosE){
              dato3 = "Muestra al menos un párrafo de una fuente de información en un segundo idioma en formato APA. ";
              dato4 = "Fue elaborado en digital.";
              dato5 = "Fue entregado en tiempo y forma.";
              dato6 = "Compara al menos tres framework para javascript del lado del cliente.";
              la = "Hola, de acuerdo a tus antecedentes";
              dato7 = "B";
              dato8 = "D";
              dato9 = "F";
              dato10 = "M";
            }if (dato2 == tresD && gru == unoG && asig == tresA && num == dosN && ev == tresE){
              dato3 = "Fue realizado en equipo.";
              dato4 = "Presenta en los anexos la organización del trabajo en equipo en un cronograma de actividades.";
              dato5 = "Muestra conocimientos de otras asignaturas.";
              dato6 = "El proyecto realiza todo lo solicitado sin excepción alguna.";
              la = "Hola, de acuerdo a tus antecedentes";
              dato7 = "A";
              dato8 = "F";
              dato9 = "E";
              dato10 = "M";
            }if (dato2 == tresD && gru == unoG && asig == tresA && num == dosN && ev == cuatroE){
              dato3 = "Explica con imágenes el funcionamiento de la práctica. ";
              dato4 = "Escribe relaciones de otras asignaturas. ";
              dato5 = "Muestra referencias en formato APA.";
              dato6 = "El proyecto realiza todo lo solicitado sin excepción alguna.";
              la = "Hola, de acuerdo a tus antecedentes";
              dato7 = "C";
              dato8 = "E";
              dato9 = "B";
              dato10 = "M";
              //Comienza grupo 7F31
              //Informe
            }if (dato2 == tresD && gru == dosG && asig == tresA && num == unoN && ev == unoE){
              dato3 = "Incorpora contenido que indica en donde puede ser aplicado los conocimientos aprendidos (menciona al menos tres ambitos de aplicación). ";
              dato4 = "Contiene al menos dos fuentes deinformación en un segundo idioma, en la cual incorpora conocimientos sobre el estilo APA 6a edición.";
              dato5 = "Se elabora en equipo, al presentar los nombres y matrículas sin errores ortográficos. ";
              dato6 = "Cumple con todo lo solicitado en el plan de trabajo.";
              la = "Hola, de acuerdo a tus antecedentes";
              dato7 = "E";
              dato8 = "B";
              dato9 = "A";
              dato10 = "M";
            }if (dato2 == tresD && gru == dosG && asig == tresA && num == dosN && ev == unoE){
              dato3 = "Incorpora contenido que indica en donde puede ser aplicado los conocimientos aprendidos (menciona al menos tres ambitos de aplicación). ";
              dato4 = "Contiene al menos dos fuentes deinformación en un segundo idioma, en la cual incorpora conocimientos sobre el estilo APA 6a edición.";
              dato5 = "Se elabora en equipo, al presentar los nombres y matrículas sin errores ortográficos. ";
              dato6 = "Presenta nombre de etiqueta, descripción y ejemplo de cómo se escriben.";
              la = "Hola, de acuerdo a tus antecedentes";
              dato7 = "E";
              dato8 = "B";
              dato9 = "A";
              dato10 = "M";
              //Cuadro
            }if (dato2 == tresD && gru == dosG && asig == tresA && num == unoN && ev == dosE){
              dato3 = "Fue elaborado en digital. ";
              dato4 = "Fue elaborado en equipo y presenta los datos completos de los integrantes (nombre y matrícula).";
              dato5 = "Muestra al menos un párrafo de una fuente de información en un segundo idioma en formato APA.";
              dato6 = "Presenta conclusión de forma individual la cual está relacionada al tema.";
              la = "Hola, de acuerdo a tus antecedentes";
              dato7 = "D";
              dato8 = "A";
              dato9 = "B";
              dato10 = "M";
            }if (dato2 == tresD && gru == dosG && asig == tresA && num == dosN && ev == dosE){
              dato3 = "Fue elaborado en digital. ";
              dato4 = "Fue elaborado en equipo y presenta los datos completos de los integrantes (nombre y matrícula).";
              dato5 = "Muestra al menos un párrafo de una fuente de información en un segundo idioma en formato APA.";
              dato6 = "Incluye al menos seis criterios de comparación.";
              la = "Hola, de acuerdo a tus antecedentes";
              dato7 = "D";
              dato8 = "A";
              dato9 = "B";
              dato10 = "M";
              //Proyecto
            }if (dato2 == tresD && gru == dosG && asig == tresA && num == unoN && ev == tresE){
              dato3 = "Incorpora contenido que indica en donde puede ser aplicado los conocimientos aprendidos (menciona al menos tres ambitos de aplicación). ";
              dato4 = "Fue realizado en equipo.";
              dato5 = "Presenta en los anexos la organización del trabajo en equipo en un cronograma de actividades.";
              dato6 = "El proyecto realiza todo lo solicitado sin excepción alguna.";
              la = "Hola, de acuerdo a tus antecedentes";
              dato7 = "E";
              dato8 = "A";
              dato9 = "F";
              dato10 = "M";
            }if (dato2 == tresD && gru == dosG && asig == tresA && num == dosN && ev == tresE){
              dato3 = "Incorpora contenido que indica en donde puede ser aplicado los conocimientos aprendidos (menciona al menos tres ambitos de aplicación). ";
              dato4 = "Fue realizado en equipo.";
              dato5 = "Presenta en los anexos la organización del trabajo en equipo en un cronograma de actividades.";
              dato6 = "Menciona las conclusiones de manera individual.";
              la = "Hola, de acuerdo a tus antecedentes";
              dato7 = "E";
              dato8 = "A";
              dato9 = "F";
              dato10 = "M";
              //Reporte
            }if (dato2 == tresD && gru == dosG && asig == tresA && num == dosN && ev == cuatroE){
              dato3 = "Muestra referencias en formato APA. ";
              dato4 = "Escribe correctamente los nombres de los integrantes.";
              dato5 = "Escribe relaciones de otras asignaturas.";
              dato6 = "Incluye capturas de la práctica funcionando y descritas correctamente.";
              la = "Hola, de acuerdo a tus antecedentes";
              dato7 = "B";
              dato8 = "A";
              dato9 = "E";
              dato10 = "M";
            }if (dato2 == tresD && gru == dosG && asig == tresA && num == dosN && ev == cuatroE){
              dato3 = "Muestra referencias en formato APA. ";
              dato4 = "Escribe correctamente los nombres de los integrantes.";
              dato5 = "Escribe relaciones de otras asignaturas.";
              dato6 = "Termina correctamente todo lo que se le solicita.";
              la = "Hola, de acuerdo a tus antecedentes";
              dato7 = "B";
              dato8 = "A";
              dato9 = "E";
              dato10 = "M";
              //7F41
              //Informe
            }if (dato2 == tresD && gru == tresG && asig == tresA && num == unoN && ev == unoE){
              dato3 = "Contiene al menos dos fuentes deinformación en un segundo idioma, en la cual incorpora conocimientos sobre el estilo APA 6a edición. ";
              dato4 = "Se elabora en equipo, al presentar los nombres y matrículas sin errores ortográficos. ";
              dato5 = "Presenta en los anexos, un cronograma de actividades, en la que se establecen tiempos, actividades y responsabilidades. ";
              dato6 = "Contiene del lenguaje de marcas la instrucción para realizar textos, vínculos, listas, tablas y contenedores.";
              la = "Hola, de acuerdo a tus antecedentes";
              dato7 = "B";
              dato8 = "A";
              dato9 = "F";
              dato10 = "M";
            }if (dato2 == tresD && gru == tresG && asig == tresA && num == dosN && ev == unoE){
              dato3 = "Contiene al menos dos fuentes deinformación en un segundo idioma, en la cual incorpora conocimientos sobre el estilo APA 6a edición. ";
              dato4 = "Se elabora en equipo, al presentar los nombres y matrículas sin errores ortográficos. ";
              dato5 = "Presenta en los anexos, un cronograma de actividades, en la que se establecen tiempos, actividades y responsabilidades. ";
              dato6 = "Contiene del lenguaje de marcas la instrucción para realizar textos, vínculos, listas, tablas y contenedores.";
              la = "Hola, de acuerdo a tus antecedentes";
              dato7 = "B";
              dato8 = "A";
              dato9 = "F";
              dato10 = "M";
              //Cuadro
            }if (dato2 == tresD && gru == tresG && asig == tresA && num == unoN && ev == dosE){
              dato3 = "Fue elaborado en equipo y presenta los datos completos de los integrantes (nombre y matrícula).";
              dato4 = "Muestra al menos un párrafo de una fuente de información en un segundo idioma en formato APA.";
              dato5 = "Fue elaborado en digital.";
              dato6 = "Compara al menos tres framework para javascript del lado del cliente.";
              la = "Hola, de acuerdo a tus antecedentes";
              dato7 = "A";
              dato8 = "B";
              dato9 = "D";
              dato10 = "M";
            }if (dato2 == tresD && gru == tresG && asig == tresA && num == dosN && ev == dosE){
              dato3 = "Fue elaborado en equipo y presenta los datos completos de los integrantes (nombre y matrícula).";
              dato4 = "Muestra al menos un párrafo de una fuente de información en un segundo idioma en formato APA.";
              dato5 = "Fue elaborado en digital.";
              dato6 = "Incluye al menos seis criterios de comparación.";
              la = "Hola, de acuerdo a tus antecedentes";
              dato7 = "A";
              dato8 = "B";
              dato9 = "D";
              dato10 = "M";
              //Proyecto
            }if (dato2 == tresD && gru == tresG && asig == tresA && num == unoN && ev == tresE){
              dato3 = "Incorpora contenido que indica en donde puede ser aplicado los conocimientos aprendidos (menciona al menos tres ambitos de aplicación).";
              dato4 = "Presenta en los anexos la organización del trabajo en equipo en un cronograma de actividades.";
              dato5 = "Fue realizado individual.";
              dato6 = "Es capaz de realizar cambios al código.";
              la = "Hola, de acuerdo a tus antecedentes";
              dato7 = "E";
              dato8 = "F";
              dato9 = "A";
              dato10 = "M";
            }if (dato2 == tresD && gru == tresG && asig == tresA && num == dosN && ev == tresE){
              dato3 = "Incorpora contenido que indica en donde puede ser aplicado los conocimientos aprendidos (menciona al menos tres ambitos de aplicación).";
              dato4 = "Presenta en los anexos la organización del trabajo en equipo en un cronograma de actividades.";
              dato5 = "Fue realizado en equipo.";
              dato6 = "Menciona las conclusiones de manera individual.";
              la = "Hola, de acuerdo a tus antecedentes";
              dato7 = "E";
              dato8 = "F";
              dato9 = "A";
              dato10 = "M";
              //Reporte
            }if (dato2 == tresD && gru == tresG && asig == tresA && num == dosN && ev == cuatroE){
              dato3 = "Presenta en los anexos, un cronograma de actividades, en la que se establecen tiempos, actividades y responsabilidades. ";
              dato4 = "Escribe correctamente los nombres de los integrantes.";
              dato5 = "Explica con imágenes el funcionamiento de la práctica.";
              dato6 = "Describe detalladamente los pasos realizados.";
              la = "Hola, de acuerdo a tus antecedentes";
              dato7 = "F";
              dato8 = "A";
              dato9 = "C";
              dato10 = "M";
            }if (dato2 == tresD && gru == tresG && asig == tresA && num == dosN && ev == cuatroE){
              dato3 = "Presenta en los anexos, un cronograma de actividades, en la que se establecen tiempos, actividades y responsabilidades. ";
              dato4 = "Escribe correctamente los nombres de los integrantes.";
              dato5 = "Explica con imágenes el funcionamiento de la práctica.";
              dato6 = "Termina correctamente todo lo que se le solicita.";
              la = "Hola, de acuerdo a tus antecedentes";
              dato7 = "F";
              dato8 = "A";
              dato9 = "C";
              dato10 = "M";
              //Programacion
              //7F21
          }



            
            }
            function escribe(){
              document.getElementById("item7").innerHTML=dato3;
              document.getElementById("item4").innerHTML=dato4;
              document.getElementById("item2").innerHTML=dato5;
              document.getElementById("item5").innerHTML=dato6;
              document.getElementById("item8").innerHTML=la;
              document.getElementById("item72").innerHTML=dato7;
              document.getElementById("item42").innerHTML=dato8;
              document.getElementById("item22").innerHTML=dato9;
              document.getElementById("item52").innerHTML=dato10;
            }
            function copia(id_elemento){
              var aux = document.createElement("input");
              aux.setAttribute("value", document.getElementById(id_elemento).innerHTML);
              document.body.appendChild(aux);
              aux.select();
              document.execCommand("copy");
              document.body.removeChild(aux);
              alert("Item copiado al cortapapeles.");
            }

            function pasa(id, id_2){

              var auxP = document.getElementById(id_2).innerHTML;
              document.getElementById(id).value=auxP;
              alert("El ítem: '"+auxP+"' ha sido añadido correctamente a la lista de cotejo. Por favor selecciona el indicador que le corresponde y el valor a asignar.");
            }
            
            function pasardos(id1, id2, id3, id){
              var auxP = document.getElementById(id).innerHTML;
              var uno = document.getElementById(id1).value;
              var dos = document.getElementById(id2).value;
              var tres = document.getElementById(id3).value;
              if (uno == auxP || dos == auxP || tres == auxP) {
                alert("Este ítem ya ha sido añadido. Por favor selecciona otro.");
              }else{
                if (uno == "") {
                  document.getElementById(id1).value=auxP;
                  alert("El ítem: '"+auxP+"' ha sido añadido correctamente a la lista de cotejo. Por favor selecciona el indicador que le corresponde y el valor a asignar.");
                }if (uno != "" && dos == "") {
                  document.getElementById(id2).value=auxP;
                  alert("El ítem: '"+auxP+"' ha sido añadido correctamente a la lista de cotejo. Por favor selecciona el indicador que le corresponde y el valor a asignar.");
                }if (uno != "" && dos != "") {
                  document.getElementById(id3).value=auxP;
                  alert("El ítem: '"+auxP+"' ha sido añadido correctamente a la lista de cotejo. Por favor selecciona el indicador que le corresponde y el valor a asignar.");
                }if (uno != "" && dos != "" && tres != "") {
                  alert("Borra un ítem para poder reescribirlo.");
                }
              }


            }

          </script>
        
        <h4><button onclick="pasardos('nombres','it2','it3','item7')">Usar</button><span class="color" ><label id="item7" style="width:50%; height:5em"></label><label id="item72" style="width:10%; height:5em"></label></span></h4>
        <h4><button onclick="pasardos('nombres','it2','it3','item4')">Usar</button><span class="color" ><label id="item4" style="width:50%; height:5em"></label><label id="item42" style="width:10%; height:5em"></label></span></h4>
        <h4><button onclick="pasardos('nombres','it2','it3','item2')">Usar</button><span class="color" ><label id="item2" style="width:50%; height:5em"></label><label id="item22" style="width:10%; height:5em"></label></span></h4>
        <h4><button onclick="copia('item5')">Copiar</button><span class="color" ><label id="item5" style="width:50%; height:5em"></label><label id="item52" style="width:10%; height:5em"></label></span></h4>

        
       
        
        
      </div>
      <div class="modal-footer">
        
      </div>
    </div>

  </div>
</div>
            <!-- Fin modal -->