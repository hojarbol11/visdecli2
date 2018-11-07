	<?php
		if (isset($con))
		{
	?>
	<!-- Modal -->
	<div class="modal fade" id="nuevoProducto" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	  <div class="modal-dialog" role="document">
		<div class="modal-content">
		  <div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<h4 class="modal-title" id="myModalLabel"><i class='glyphicon glyphicon-edit'></i> Agregar nuevo producto</h4>
		  </div>
		  <div class="modal-body">
			<form class="form-horizontal" method="post" id="guardar_producto" name="guardar_producto" autocomplete="off">
			<div id="resultados_ajax_productos"></div>
			  <div class="form-group">
				<label for="codigo" class="col-sm-3 control-label">Código Interno</label>
				<div class="col-sm-8">
				  <input type="text" class="form-control" id="codigo" name="codigo" onkeypress="return valida(event)" placeholder="Código del producto" required>
				</div>
			  </div>
			  
			  <div class="form-group">
				<label for="division" class="col-sm-3 control-label">División</label>
				<div class="col-sm-8">
				  <input type="text" class="form-control" id="division" name="division" onKeyUp="this.value=this.value.toUpperCase();" placeholder="División a la que pertenece el Producto" maxlength="1" required>
				</div>				
			  </div>
			  <div class="form-group">
				<label for="nombre" class="col-sm-3 control-label">Marca</label>
				<div class="col-sm-8">
				  <input type="text" class="form-control" id="marca" name="marca" onKeyUp="this.value=this.value.toUpperCase();" placeholder="Marca del Producto" required>
				</div>				
			  </div>			  
			  <div class="form-group">
				<label for="principio" class="col-sm-3 control-label">Principio Activo</label>
				<div class="col-sm-8">
				  <input type="text" class="form-control" id="principio" name="principio" placeholder="Principio Activo ó Molécula" required>
				</div>				
			  </div>
			  <div class="form-group">
				<label for="presentacion" class="col-sm-3 control-label">Presentación del Producto</label>
				<div class="col-sm-8">
				  <input type="text" class="form-control" id="presentacion" name="presentacion" placeholder="Presentación de Producto ó SKU" required>
				</div>				
			  </div>
			  <div class="form-group">
				<label for="unidad" class="col-sm-3 control-label">Unidad de Manejo</label>
				<div class="col-sm-8">
				  <input type="text" class="form-control" id="unidad" name="unidad" onkeypress="return valida(event)" placeholder="Unidad de Manejo del producto" maxlength="3" required>
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
