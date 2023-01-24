<br>
   <div class="container">
      <div class="row">
         
		<?php
			require_once '../../CRUD/class/Consultas.php';
			$conexion = Usuarios::singleton();
			if(!isset($_GET['opcion'])){	
				echo '<div class="col-md-12">'; 
        			echo '<img class="img-fluid" style="max-width: 100%;" src="../../images/itesa.png"> ';
			}else{
				$op=$_GET['opcion'];
				if($op==1){//carga instrumentaciones
					echo '<div class="col-md-12">';
					if(isset($_GET['id_materia'])){
						
						$data = $conexion->get_DatosInstrumentacion($_GET['id_materia']);
						foreach($data as $fila){
							$tcreditos= $fila['totalCreditos']; 
							$casignatura= $fila['claveAsignatura']; 
							$nasignatura= $fila['nombreAsignatura']; 
							$num_temas= $fila['temas'];
						}
					}
					include("instrume.php");
				}else if($op==2){
					include("contenido.php");
				}
			}
		?>
	</div>
      </div>
   </div>