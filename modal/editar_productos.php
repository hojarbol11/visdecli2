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
			<h4 class="modal-title" id="myModalLabel"><i class='glyphicon glyphicon-edit'></i> Editar producto</h4>
		  </div>
		  <div class="modal-body">
			<form class="form-horizontal" method="post" id="editar_producto" name="editar_producto" autocomplete="off">
			<div id="resultados_ajax2"></div>
			  <div class="form-group">
				<label for="mod_codigo" class="col-sm-3 control-label">Código Interno</label>
				<div class="col-sm-8">
				  <input type="text" class="form-control" id="mod_codigo" name="mod_codigo" readonly="readonly">
					<input type="hidden" name="mod_id" id="mod_id">
				</div>
			  </div>
			  <div class="form-group">
				<label for="mod_marca" class="col-sm-3 control-label">División</label>
				<div class="col-sm-8">
				  <input type="text" class="form-control" id="mod_division" name="mod_division" onKeyUp="this.value=this.value.toUpperCase()"; placeholder="División a la que pertece el producto" required>				 
				</div>
			  </div>
			  <div class="form-group">
				<label for="mod_marca" class="col-sm-3 control-label">Marca</label>
				<div class="col-sm-8">
				  <input type="text" class="form-control" id="mod_marca" name="mod_marca" onKeyUp="this.value=this.value.toUpperCase()"; placeholder="Marca del producto" required>				 
				</div>
			  </div>
			  <div class="form-group">
				<label for="mod_principio" class="col-sm-3 control-label">Principio Activo</label>
				<div class="col-sm-8">
				  <input type="text" class="form-control" id="mod_principio" name="mod_principio" placeholder="Principio Activo ó Molécula" required>				  
				</div>
			  </div>
			  <div class="form-group">
				<label for="mod_presentacion" class="col-sm-3 control-label">Presentación del Producto</label>
				<div class="col-sm-8">
				  <input type="text" class="form-control" id="mod_presentacion" name="mod_presentacion" placeholder="Presentación de Producto ó SKU" required>				  
				</div>
			  </div>
			  <div class="form-group">
				<label for="mod_unidad" class="col-sm-3 control-label">Unidad de Manejo</label>
				<div class="col-sm-8">
				  <input type="number" class="form-control" id="mod_unidad" name="mod_unidad" onkeypress="return valida(event)" placeholder="Unidad de Manejo del producto" maxlength="3" required>
				</div>				
			  </div>
			  <div class="form-group">
				<label for="mod_precio" class="col-sm-3 control-label">Precio Bs. S.</label>
				<div class="col-sm-8">
				  <input type="number" class="form-control" id="mod_precio" name="mod_precio" step="0.01" placeholder="Precio Ex-Factory de la unidad del producto" required>
				</div>				
			  </div>
			  <div class="form-group">
				<label for="mod_cantidad" class="col-sm-3 control-label">Cantidad de Unidades</label>
				<div class="col-sm-8">
				  <input type="number" class="form-control" id="mod_cantidad" name="mod_cantidad" placeholder="Cantidad de unidades disponibles" maxlength="7" required>
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