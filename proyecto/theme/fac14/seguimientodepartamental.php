<div class="t13 col-md-12 col-lg-12 col-sm-12 cajasSolid" style="margin-top:10px; text-align: center; ">
	<div class="row" style="display: flex;">
		<div class="ce azul col-md-12 col-lg-12 col-sm-12" style="padding: 5px; font-size: 13px; ">
			<b>Seguimiento departamental</b>
		</div>
	</div>
	<div class="row" style="margin-top: 5px; display: flex;">
		<div class="ce  gris col-md-1 col-lg-1 col-sm-1" style="font-size: 12px; ">
			<br><br><br><br><br><br><br><br><br><br><br><br><b>Revisión continua</b><br><br><br><br><br><br><br><br><br><br><br><br>
		</div>

		<div class="ce  gris col-md-11 col-lg-11 col-sm-11 " style="font-size: 12px; ">

			<!-- 				ENCABEZADO DEL SEGUIMIENTO 				-->
			<div class="row" style="display: flex;">
				<div class="ce  gris col-md-1 col-lg-1 col-sm-1 cajasDoted" style="font-size: 12px; ">
					Mes de seguimiento/ Fecha
				</div>
				<div class="ce  gris col-md-2 col-lg-2 col-sm-2 cajasDoted" style="font-size: 12px; ">
					<div class="row">Temas en revisión</div>
					<div class="row">Grupo/Tema</div>
				</div>
				<div class="ce  gris col-md-1 col-lg-1 col-sm-1 cajasDoted" style="font-size: 12px; ">
					<div class="row">Cumplimiento</div>
					<div class="row">(avance en %)</div>
					<div class="row">Firma docente / Jefe de División</div>
				</div>
				<div class="ce  gris col-md-3 col-lg-3 col-sm-3 cajasDoted" style="font-size: 12px; ">
					<div class="row">El (la) docente entregó los instrumentos de evaluación al inicio del Tema? </div>
					<div class="row">Matrícula y Firma Estudiante</div>
				</div>
				
				<div class="ce  gris col-md-3 col-lg-3 col-sm-3 cajasDoted" style="font-size: 12px; ">
					<div class="row">¿Recibe realimentación sobre los resultados de sus evaluaciones formativas y sumativas? </div>
					<div class="row">Firma Estudiante</div>
				</div>
				<div class="ce  gris col-md-2 col-lg-2 col-sm-2 cajasDoted" style="font-size: 12px; ">
					Observaciones y/o comentarios
				</div>
			</div>


			<!-- 			PRIMER MES DE SEGUIMIENTO 			-->
			<div class="row" style="display: flex;">
				<div class="ce  gris col-md-1 col-lg-1 col-sm-1 cajasDoted" style="font-size: 12px; ">
					<b><label>Mes 1 </label><label id="mesdos"> <?php echo $MESUNOSEGUIMIENTO ?></label></b>
				</div>
				<div class="ce  gris col-md-2 col-lg-2 col-sm-2 cajasDoted" style="font-size: 12px;">				
				<?php if ($banf2) {?> 
					<b><label id="TRM2" ><?php echo $agregafrt2d; ?></label></b>
				<?php } ?>
				</div>
				<div class="ce  gris col-md-1 col-lg-1 col-sm-1 cajasDoted" style="font-size: 12px; ">
					<div class="row">
					<?php if ($banf2 && $agregafrtp2d=="") {
					for($i=0;$i<count($grupp);$i++){ ?>
					<div><label onclick='cambia1(this)'>100</label><label>%</label></div>
					<?php }}else{
						if($agregafrtp2d!=""){
							echo $agregafrtp2d;
						}
					} ?>

					</div>

					<?php 

					if ($banf2 && $_SESSION['tipo']=="docente") { echo $ff2d; }else{echo $ff2d;}
					if ($banf2 && $_SESSION['tipo']=="coordinador") { echo $ff2c; }else{ echo $ff2c;}?>

				</div>
				<div class="ce  gris col-md-3 col-lg-3 col-sm-3 cajasDoted" style="font-size: 12px; ">
					
					<div class="form-check">
					  <input class="form-check-input" type="radio" name="flexRadioDefault2" id="flexRadioDefault1">
					  <label class="form-check-label" for="flexRadioDefault1">
					    SI
					  </label>
					</div>
					<div class="form-check">
					  <input class="form-check-input" type="radio" name="flexRadioDefault2" id="flexRadioDefault2" checked>
					  <label class="form-check-label" for="flexRadioDefault2">
					    NO
					  </label>
					</div>
					<div class="row">
						<div class="col-md-6 col-lg-6 col-sm-6"><?php echo $MATRICULA; ?></div>
						<div class="col-md-6 col-lg-6 col-sm-6"><img src="fac14/firmas/firma.png" style="height:50px !important;"></div>
					</div>
				


				</div>
				<div class="ce  gris col-md-3 col-lg-3 col-sm-3 cajasDoted" style="font-size: 12px; ">
					<div class="form-check">
					  <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
					  <label class="form-check-label" for="flexRadioDefault1">
					    SI
					  </label>
					</div>
					<div class="form-check">
					  <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>
					  <label class="form-check-label" for="flexRadioDefault2">
					    NO
					  </label>
					</div>
					<div class="row">
						<div class="col-md-6 col-lg-6 col-sm-6"><?php echo $MATRICULA; ?></div>
						<div class="col-md-6 col-lg-6 col-sm-6"><img src="fac14/firmas/firma.png" style="height:50px !important;"></div>
					</div>
				</div>
				
				<div class="ce  gris col-md-2 col-lg-2 col-sm-2 cajasDoted" style="font-size: 12px; ">
					<label id="comentarioJD2"><?php echo $fc2c ?></label>
				</div>
			</div>




			<!-- 			SEGUNDO MES DE SEGUIMIENTO 			-->
			<div class="row" style="display: flex;">
				<div class="ce  gris col-md-1 col-lg-1 col-sm-1 cajasDoted" style="font-size: 12px; ">
					<b><label>Mes 2 </label><label id="mestres"> <?php echo $MESDOSSEGUIMIENTO ?></label></b>
				</div>
				<div class="ce  gris col-md-2 col-lg-2 col-sm-2 cajasDoted" style="font-size: 12px; ">
					<?php if ($banf3) {?>
					<b><label id="TRM3" ><?php echo $agregafrt3d; ?></label></b>
				<?php } ?>
				</div>
				<div class="ce  gris col-md-1 col-lg-1 col-sm-1 cajasDoted" style="font-size: 12px; ">
					<div class="row"><?php if ($banf3 && $agregafrtp3d=="") {for($i=0;$i<count($grupp);$i++){ ?>
					<div><label onclick='cambia1(this)'>100</label><label>%</label></div>
					<?php }}else{
						if($agregafrtp3d!=""){
							echo $agregafrtp3d;
						}
					} ?></div>
					
					<?php 
					if ($banf3 && $_SESSION['tipo']=="docente") { echo $ff3d; }else{echo $ff3d;}
					if ($banf3 && $_SESSION['tipo']=="coordinador") { echo $ff3c; }else{echo $ff3c;}?>
				</div>
				<div class="ce  gris col-md-3 col-lg-3 col-sm-3 cajasDoted" style="font-size: 12px; ">
					
					<div class="form-check">
					  <input class="form-check-input" type="radio" name="flexRadioDefault3" id="flexRadioDefault1">
					  <label class="form-check-label" for="flexRadioDefault1">
					    SI
					  </label>
					</div>
					<div class="form-check">
					  <input class="form-check-input" type="radio" name="flexRadioDefault3" id="flexRadioDefault2" checked>
					  <label class="form-check-label" for="flexRadioDefault2">
					    NO
					  </label>
					</div>
					<div class="row">
						<div class="col-md-6 col-lg-6 col-sm-6"><?php echo $MATRICULA; ?></div>
						<div class="col-md-6 col-lg-6 col-sm-6"><img src="fac14/firmas/firma.png" style="height:50px !important;"></div>
					</div>
				


				</div>
				<div class="ce  gris col-md-3 col-lg-3 col-sm-3 cajasDoted" style="font-size: 12px; ">
					<div class="form-check">
					  <input class="form-check-input" type="radio" name="flexRadioDefault4" id="flexRadioDefault1">
					  <label class="form-check-label" for="flexRadioDefault1">
					    SI
					  </label>
					</div>
					<div class="form-check">
					  <input class="form-check-input" type="radio" name="flexRadioDefault4" id="flexRadioDefault2" checked>
					  <label class="form-check-label" for="flexRadioDefault2">
					    NO
					  </label>
					</div>
					<div class="row">
						<div class="col-md-6 col-lg-6 col-sm-6"><?php echo $MATRICULA; ?></div>
						<div class="col-md-6 col-lg-6 col-sm-6"><img src="fac14/firmas/firma.png" style="height:50px !important;"></div>
					</div>
				</div>
				
				<div class="ce  gris col-md-2 col-lg-2 col-sm-2 cajasDoted" style="font-size: 12px; ">
					<label id="comentarioJD3"><?php echo $fc3c ?></label>
				</div>
			</div>





			<!-- 			TERCER MES DE SEGUIMIENTO 			-->
			<div class="row" style="display: flex;">
				<div class="ce  gris col-md-1 col-lg-1 col-sm-1 cajasDoted" style="font-size: 12px; ">
					<b><label>Mes 3 </label><label id="mescuatro"> <?php echo $MESTRESSEGUIMIENTO ?></label></b>
				</div>
				<div class="ce  gris col-md-2 col-lg-2 col-sm-2 cajasDoted" style="font-size: 12px; ">

					<?php if ($banf4) {?>
					<b><label id="TRM4" ><?php echo $agregafrt4d; ?></label></b>
				<?php } ?>
				</div>
				<div class="ce  gris col-md-1 col-lg-1 col-sm-1 cajasDoted" style="font-size: 12px;">
					<div class="row">
						<?php if ($banf4 && $agregafrtp4d=="") {
						for($i=0;$i<count($grupp);$i++){ ?>
					<div><label onclick='cambia1(this)'>100</label><label>%</label></div>
					<?php }}else{
						if($agregafrtp4d!=""){
							echo $agregafrtp4d;
						}
					} ?></div>
					
					<?php 
					if ($banf4 && $_SESSION['tipo']=="docente") { echo $ff4d; }else{echo $ff4d;}
					if ($banf4 && $_SESSION['tipo']=="coordinador") { echo $ff4c; }else{echo $ff4c;}?>
				</div>
				<div class="ce  gris col-md-3 col-lg-3 col-sm-3 cajasDoted" style="font-size: 12px; ">
					
					<div class="form-check">
					  <input class="form-check-input" type="radio" name="flexRadioDefault5" id="flexRadioDefault1">
					  <label class="form-check-label" for="flexRadioDefault1">
					    SI
					  </label>
					</div>
					<div class="form-check">
					  <input class="form-check-input" type="radio" name="flexRadioDefault5" id="flexRadioDefault2" checked>
					  <label class="form-check-label" for="flexRadioDefault2">
					    NO
					  </label>
					</div>
					<div class="row">
						<div class="col-md-6 col-lg-6 col-sm-6"><?php echo $MATRICULA; ?></div>
						<div class="col-md-6 col-lg-6 col-sm-6"><img src="fac14/firmas/firma.png" style="height:50px !important;"></div>
					</div>
				


				</div>
				<div class="ce  gris col-md-3 col-lg-3 col-sm-3 cajasDoted" style="font-size: 12px; ">
					<div class="form-check">
					  <input class="form-check-input" type="radio" name="flexRadioDefault6" id="flexRadioDefault1">
					  <label class="form-check-label" for="flexRadioDefault1">
					    SI
					  </label>
					</div>
					<div class="form-check">
					  <input class="form-check-input" type="radio" name="flexRadioDefault6" id="flexRadioDefault2" checked>
					  <label class="form-check-label" for="flexRadioDefault2">
					    NO
					  </label>
					</div>
					<div class="row">
						<div class="col-md-6 col-lg-6 col-sm-6"><?php echo $MATRICULA; ?></div>
						<div class="col-md-6 col-lg-6 col-sm-6"><img src="fac14/firmas/firma.png" style="height:50px !important;"></div>
					</div>
				</div>
				
				<div class="ce  gris col-md-2 col-lg-2 col-sm-2 cajasDoted" style="font-size: 12px; ">
					<label id="comentarioJD4"><?php echo $fc4c ?></label>
				</div>
			</div>



		</div>
		
		
		

	</div>


	<!-- SEGUIMIENTO FINAL -->

	<div class="row" style="display: flex;">
		<div class="ce  gris col-md-1 col-lg-1 col-sm-1 cajasDoted" style="font-size: 12px; ">
			<b>Revisión final</b>
		</div>

		<div class="ce  gris col-md-11 col-lg-11 col-sm-11 cajasDoted" style="font-size: 12px; ">
			<div class="row" style="display: flex;">
				<div class="col-md-1 col-lg-1 col-sm-1 cajasDoted">
					<b><label></label><label id="mescinco"> <?php echo $MESCUATROSEGUIMIENTO ?></label></b>
				</div>
				<div class="col-md-9 col-lg-9 col-sm-9 cajasDoted" >
					<div class="row" style="display: flex;">
						<div class="col-md-4 col-lg-4 col-sm-4 cajasDoted">				<div class="row" style="display: flex; height: 100%;">
								<div class="col-md-8 col-lg-8 col-sm-8 cajasDoted">
									<?php if ($banf5) {?>
									<b><label id="TRM5" ><?php echo $agregafrt5d; ?></label></b>
								<?php } ?>
								</div>
								<div class="col-md-4 col-lg-4 col-sm-4 cajasDoted" >
									<div class="row"><?php if ($banf5 && $agregafrtp5d=="") {for($i=0;$i<count($grupp);$i++){ ?>
					<div ><label onclick='cambia1(this)'>100</label><label>%</label></div>
					<?php }} else{
						if($agregafrtp5d!=""){
							echo $agregafrtp5d;
						}
					}?></div>
					<br>
										<?php 
					if ($banf5 && $_SESSION['tipo']=="docente") { echo $ff5d; }else{echo $ff5d;}
					if ($banf5 && $_SESSION['tipo']=="coordinador") { echo $ff5c; }else {echo $ff5c;}?>
								</div>
							</div>
						</div>
						<div class="col-md-8 col-lg-8 col-sm-8 cajasDoted">
							<div class="row" style="display: flex; height: 100%;">

								<div class="col-md-6 col-lg-6 col-sm-6 cajasDoted">
									<div class="form-check">
									  <input class="form-check-input" type="radio" name="flexRadioDefault6" id="flexRadioDefault1">
									  <label class="form-check-label" for="flexRadioDefault1">
									    SI
									  </label>
									</div>
									<div class="form-check">
									  <input class="form-check-input" type="radio" name="flexRadioDefault6" id="flexRadioDefault2" checked>
									  <label class="form-check-label" for="flexRadioDefault2">
									    NO
									  </label>
									</div>
									<div class="row">
										<div class="col-md-6 col-lg-6 col-sm-6"><?php echo $MATRICULA; ?></div>
										<div class="col-md-6 col-lg-6 col-sm-6"><img src="fac14/firmas/firma.png" style="height:50px !important;"></div>

									</div>

								</div>
								<div class="col-md-6 col-lg-6 col-sm-6 cajasDoted">
									<div class="form-check">
									  <input class="form-check-input" type="radio" name="flexRadioDefault6" id="flexRadioDefault1">
									  <label class="form-check-label" for="flexRadioDefault1">
									    SI
									  </label>
									</div>
									<div class="form-check">
									  <input class="form-check-input" type="radio" name="flexRadioDefault6" id="flexRadioDefault2" checked>
									  <label class="form-check-label" for="flexRadioDefault2">
									    NO
									  </label>
									</div>
									<div class="row">
										<div class="col-md-6 col-lg-6 col-sm-6"><?php echo $MATRICULA; ?></div>
										<div class="col-md-6 col-lg-6 col-sm-6"><img src="fac14/firmas/firma.png" style="height:50px !important;"></div>

									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6 col-lg-6 col-sm-6 cajasDoted">
							<div>
								<?php if ($banf5 && $_SESSION['tipo']=="docente") { echo $fff5d; }else{
									if ($fff5d=="") {
										echo "<br><br><br>";
									}else{
									echo $fff5d;}} ?>


							</div>
							<div>
								Firma del docente
							</div>
						</div>
						<div class="col-md-6 col-lg-6 col-sm-6 cajasDoted">
							<div>

								<?php if ($banf5 && $_SESSION['tipo']=="coordinador") { echo $fff5c; }else {
									if ($fff5c=="") {
										echo "<br><br><br>";
									}else{
									echo $fff5c;}}?>
							</div>
						
							<div>
								Firma del jefe de división
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-2 col-lg-2 col-sm-2 cajasDoted">
					<label id="comentarioJDf"><?php echo $fc5c ?></label>
				</div>
			</div>
		</div>

		

		
	</div>


</div>