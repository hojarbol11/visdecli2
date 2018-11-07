	<?php
		if (isset($con))
		{
	?>
	<!-- Modal -->
	<div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	  <div class="modal-dialog" role="document">
		<div class="modal-content">
		  <div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<h4 class="modal-title" id="myModalLabel"><i class='glyphicon glyphicon-edit'></i> Editar cliente</h4>
		  </div>
		  <div class="modal-body">
			<form class="form-horizontal" method="post" id="editar_cliente" name="editar_cliente" autocomplete="off">
			<div id="resultados_ajax2"></div>
			  <div class="form-group">
				<label for="mod_nombre" class="col-sm-3 control-label">Nombre</label>
				<div class="col-sm-8">
				  <input type="text" class="form-control" id="mod_nombre" name="mod_nombre"  required>
					<input type="hidden" name="mod_id" id="mod_id">
				</div>
			  </div>
			   <div class="form-group">
				<label for="mod_telefono" class="col-sm-3 control-label">Teléfono</label>
				<div class="col-sm-8">
				  <input type="text" class="form-control" id="mod_telefono" name="mod_telefono">
				</div>
			  </div>
			  
			  <div class="form-group">
				<label for="mod_email" class="col-sm-3 control-label">Email</label>
				<div class="col-sm-8">
				 <input type="email" class="form-control" id="mod_email" name="mod_email">
				</div>
			  </div>
			  <div class="form-group">
				<label for="mod_direccion" class="col-sm-3 control-label">Dirección</label>
				<div class="col-sm-8">
				  <textarea class="form-control" id="mod_direccion" name="mod_direccion" ></textarea>
				</div>
			  </div>
			  
			  <div class="form-group">
				<label for="rif" class="col-sm-3 control-label">R.I.F.</label>
				<div class="col-sm-8">
					<input type="text" class="form-control" id="mod_rif" name="mod_rif" title="R.I.F.: J-00000000-0" maxlength="12" required>
				</div>
			  </div>
			  <div class="form-group">
				<label for="ent" class="col-sm-3 control-label">Cód. Entrega</label>
				<div class="col-sm-8">
					<input type="text" class="form-control" id="mod_cod" name="mod_cod" onkeypress="return valida(event)" maxlength="5" required>
				</div>
			  </div>
			  <div class="form-group">
				<label for="por" class="col-sm-3 control-label">Porcentaje de Distribución Regional</label>
				<div class="col-sm-8">
					<input type="number" class="form-control" id="mod_por" name="mod_por" value="0" min="0.01" max="99.99" step="0.01" required>
				</div>
			  </div>
			  
			  <div class="form-group">
				<label for="region" class="col-sm-3 control-label">Región</label>
				<div class="col-sm-8">
				 <select class="form-control" id="mod_reg" name="mod_reg" required>
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
			  
			  <div class="form-group">
				<label for="mod_estado" class="col-sm-3 control-label">Estado</label>
				<div class="col-sm-8">
				 <select class="form-control" id="mod_estado" name="mod_estado" required>
					<option value="">-- Selecciona estado --</option>
					<option value="1" selected>Activo</option>
					<option value="0">Inactivo</option>
				  </select>
				</div>
			  </div>
			 
			
		  </div>
		  <div class="modal-footer">
			<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
			<button type="submit" class="btn btn-primary" id="actualizar_datos">Actualizar datos</button>
		  </div>
		  </form>
		</div>
	  </div>
	</div>
	<?php
		}
	?>