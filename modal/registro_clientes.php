	<?php
		if (isset($con))
		{
	?>
	<!-- Modal -->
	<div class="modal fade" id="nuevoCliente" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	  <div class="modal-dialog" role="document">
		<div class="modal-content">
		  <div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<h4 class="modal-title" id="myModalLabel"><i class='glyphicon glyphicon-edit'></i> Agregar nuevo cliente</h4>
		  </div>
		  <div class="modal-body">
			<form class="form-horizontal" method="post" id="guardar_cliente" name="guardar_cliente" autocomplete="off">
			<div id="resultados_ajax"></div>
			  <div class="form-group">
				<label for="nombre" class="col-sm-3 control-label">Nombre</label>
				<div class="col-sm-8">
				  <input type="text" class="form-control" id="nombre" name="nombre" required>
				</div>
			  </div>
			  <div class="form-group">
				<label for="telefono" class="col-sm-3 control-label">Teléfono</label>
				<div class="col-sm-8">
				  <input type="text" class="form-control" id="telefono" name="telefono" maxlength="12" >
				</div>
			  </div>
			  
			  <div class="form-group">
				<label for="email" class="col-sm-3 control-label">Email</label>
				<div class="col-sm-8">
					<input type="email" class="form-control" id="email" name="email" placeholder="Correo electrónico">
				    
				</div>
			  </div>
			  
			  <div class="form-group">
				<label for="direccion" class="col-sm-3 control-label">Dirección</label>
				<div class="col-sm-8">
					<textarea class="form-control" id="direccion" name="direccion"   maxlength="100" ></textarea>
				  
				</div>
			  </div>
			 
			 <div class="form-group">
				<label for="rif" class="col-sm-3 control-label">R.I.F.</label>
				<div class="col-sm-8">
					<input type="text" class="form-control" id="rif" name="rif" title="R.I.F.: J-00000000-0" maxlength="12" required>
				</div>
			  </div>
			  <div class="form-group">
				<label for="ent" class="col-sm-3 control-label">Cód. Entrega</label>
				<div class="col-sm-8">
					<input type="text" class="form-control" id="ent" name="ent" onkeypress="return valida(event)" maxlength="6" required>
				</div>
			  </div>
			  
			  <div class="form-group">
				<label for="por" class="col-sm-3 control-label">Porcentaje de Distribución Regional</label>
				<div class="col-sm-8">
					<input type="number" class="form-control" id="por" name="por" value="0" min="0.01" max="99.99" step="0.01" required>
				</div>
			  </div>
			  
			  <div class="form-group">
				<label for="region" class="col-sm-3 control-label">Región</label>
				<div class="col-sm-8">
				 <select class="form-control" id="region" name="region" required>
					<option value="">-- Selecciona Región --</option>
					<option value="1">Occidente</option>
					<option value="2">Andes</option>
					<option value="3">Centro Occ.</option>
					<option value="4">Caracas</option>
					<option value="5">Centro</option>
					<option value="6">Oriente</option>
				  </select>
				</div>
			  </div>
			 
			 
			 
			
		  </div>
		  <div class="modal-footer">
			<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
			<button type="submit" class="btn btn-primary" id="guardar_datos">Guardar datos</button>
		  </div>
		  </form>
		</div>
	  </div>
	</div>
	<?php
		}
	?>