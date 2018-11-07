	<?php
		if (isset($con))
		{
	    
	?>
	<!-- Modal -->
	
	<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	  <div class="modal-dialog" role="document">
		<div class="modal-content">
		  <div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<h4 class="modal-title" id="myModalLabel"><i class='glyphicon glyphicon-edit'></i> Carga Masiva de Datos - Lista de Precios</h4>
		  </div>
		  <div class="modal-body">
			<form class="form-horizontal" method="post" id="cargar_datos" name="cargar_datos">
			<div id="resultados_ajax3"></div>
			
			  <div class="form-group">
			       <label for="mes_proceso" class="col-sm-4 control-label">Mes a Procesar</label>
			       <div class="col-sm-8">
				        <input type="text" class="form-control" id="ver_mes" name="ver_mes" placeholder="Mes a Procesar" required>
				   </div>
				
				
				<div class="col-sm-8">
				  <input type="password" class="form-control" id="user_password_new3" name="user_password_new3" placeholder="Nueva contraseña" pattern=".{6,}" title="Contraseña ( min . 6 caracteres)" required>
					<input type="hidden" id="user_id_mod" name="user_id_mod">
				</div>
			  </div>
			  <div class="form-group">
				<label for="user_password_repeat3" class="col-sm-4 control-label">Repite contraseña</label>
				<div class="col-sm-8">
				  <input type="password" class="form-control" id="user_password_repeat3" name="user_password_repeat3" placeholder="Repite contraseña" pattern=".{6,}" required>
				</div>
			  </div>
			 
			  

			 
			 
			
		  </div>
		  <div class="modal-footer">
			<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
			<button type="submit" class="btn btn-primary" id="actualizar_datos3">Cambiar contraseña</button>
		  </div>
		  </form>
		</div>
	  </div>
	</div>
	<?php
		}
	?>	