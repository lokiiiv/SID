<!-- Modal -->

<!-- Trigger the modal with a button -->
 
 
     <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#myModalA2" onclick="agregarform()">
      Editar
    </button>                      
<!-- Modal -->
<div id="myModalA2" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Llene los campos correctamente</h4>
      </div>
      <div class="panel-body">
          
        <h4>Ítem <span class="color" ><p><textarea  style="width:100%; height:5em" id="item2" name="item2">
        
        </textarea></p></span></h4>
        <h4>Valor<span class="color" ><p><textarea id="Valor2" name="Valor2" onkeypress="return soloLetras(event)" >  
          
        
        </textarea></p></span></h4>
        <h4>Indicador<span class="color" ><p><textarea  style="width:30%; height:3em" id="Indicador2" name="Indicador2">
        
        
        </textarea></p></span></h4>
        
       
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success" data-dismiss="modal">
          Guardar 
        </button>
      </div>
    </div>

  </div>
</div>
						<!-- Fin modal -->