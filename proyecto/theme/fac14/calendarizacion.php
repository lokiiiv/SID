<div class="t13 col-md-12 col-lg-12 col-sm-12" style="margin-top:10px; font-size: 13px; ">
		<div class="row" style="display: flex; ">
			<div class="ce azul col-md-12 col-lg-12 col-sm-12" style="padding: 5px;">
				<b>Calendarización de la evaluación:</b>
			</div>
		</div>
		<div class="row">
			<div class="bordetodo col-md-12 col-lg-12 col-sm-12 gris">
				<table class="table table-bordered" style="border-style: dotted;">
					<tbody>
						<tr>
							<td>Semana</td>
							<?php for ($i=0; $i <18 ; $i++) { 
								echo '<td>'.($i+1).'</td>';
							} ?>
							<td>SD</td><td>Seguimiento departamental</td>
						</tr>
						<tr>
							<td>Tiempo planeado</td>
							<?php for ($i=0; $i <18 ; $i++) { 
								echo '<td id="S'.$i.'">'.$VTP[$i].'</td>';
							} ?>
							<td>ED</td><td>Evaluación diagnóstica</td>
						</tr>
						<tr>
							<td>Semana</td>
							<?php for ($i=0; $i <18 ; $i++) { 
								echo '<td class="tablacalendario" onclick="pasa(this,'.$i.')">'.$vtablat[$i].'</td>';
							} ?>
							<td> 
								<table>
									<tr>
										<td>Efn<br><br><br></td>		
									</tr>
									<tr>
										<td>ES</td>								
									</tr>
								</table>
							</td>
							<td>
								<table>
									<tr>										
										<td>Evaluación formativa (competencia específica)</td>
									</tr>
									<tr>										
										<td>Evaluación sumativa</td>
									</tr>
								</table>
							</td>
						</tr>
					</tbody>

				</table>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
	function pasa(elem,i){
		
		if (elem.innerHTML=="") {

			var n=document.getElementById("S"+i).innerHTML;
			if (n!="") {
				elem.innerHTML=n;
				$(elem).css("color","red");
			}
		}else{
			//alert($(elem)[0].style.color);
			if ($(elem)[0].style.color=="red") {
				elem.innerHTML="";	
			}else{
				alertify.error("<h3>En seguimientos anteriores no puedes modificar la fecha</h3>",2);
			}
			
		}

	}
</script>