<?php
	/*-------------------------
	Autor: INNOVAWEBSV
	Web: www.innovawebsv.com
	Mail: info@innovawebsv.com
	---------------------------*/
	session_start();
	if (!isset($_SESSION['user_login_status']) AND $_SESSION['user_login_status'] != 1) {
        header("location: login.php");
		exit;
        }
		
	/* Connect To Database*/
	require_once ("config/db.php");//Contiene las variables de configuracion para conectar a la base de datos
	require_once ("config/conexion.php");//Contiene funcion que conecta a la base de datos	
	
	$active_clientes="";
	$active_productos="";
	$active_distribuir="active";
	$active_orden="";
	$active_carga="";
	$active_usuarios="";		
	$title="Distribuir | Crear x Cliente";
?>
<!DOCTYPE html>
<html lang="en">
  <head>
	<?php include("head.php");?>

  </head>
  <body>
    
	<?php
	include("navbar.php");
	?>  
    <div class="container">
		<div class="panel panel-info">
		<div class="panel-heading">
		    <h4><i class='glyphicon glyphicon-sort-by-order'></i> Crear Distibuci&oacuten por Cliente (Regi&oacuten/Pa&iacutes) </h4>
		</div>
			<div class="panel-body">
				<form class="form-horizontal" method="post" role="form" id="datos_mes" name="datos_mes" enctype="multipart/form-data" >
				        <div class="form-group">
						    <div class="col-sm-3">
                               <div class="form-group">
                                  <div class="fileUpload btn btn-primary">
                                        <span>Busca el archivo "Listaprecios.xlsx" que tiene la data </span>
                                        <input id="file" type="file" class="form-control" name="file" accept=".xls,.xlsx" />
                                  </div>
                               </div>
                            </div>
				            <label for="mes" class="col-sm-3 control-label">Mes:</label>
				            <div class="col-sm-3">
				                <select class="form-control" id="mes" name="mes" required>
					                      <option value="">-- Selecciona Mes --</option>
					                      <option value="1">Enero</option>
					                      <option value="2">Febrero</option>
					                      <option value="3">Marzo</option>
					                      <option value="4">Abril</option>
					                      <option value="5">Mayo</option>
					                      <option value="6">Junio</option>
										  <option value="7">Julio</option>
					                      <option value="8">Agosto</option>
					                      <option value="9">Septiembre</option>
					                      <option value="10">Octubre</option>
					                      <option value="11">Noviembre</option>
					                      <option value="12">Diciembre</option>
				                </select>
				            </div>
							
							<div class="btn-group pull-right">
							     <button type="submit" class="btn btn-lg btn-success btn-block btn-signin" name="carga" id="carga">Carga Data</button>
								 
							     <span id="resultado"></span>
								 <span id="loader"></span>
								 <input type="hidden" value="upload" name="action" />
								<!-- <button type='button' class="btn btn-info" data-toggle="modal" data-target="#myModal"> Cargar Data</button> -->								
							</div>
													
							</div>
							<div class="col-sm-8">
                               <div class="form-group">
                                  <div class="fileUpload btn btn-primary">
								        <span>Descargar Formato en Blanco o Vacio </span>
										<a class="btn btn-primary btn-lg" href="Descargas/Listaprecios.xlsx">ListaPrecios.XLSX</a>								        
                                  </div>
                               </div>
                            </div>
						</div>				
				        	
			    </form>
			    <div id="resultados"></div><!-- Carga los datos ajax -->
				<div class='outer_div'></div><!-- Carga los datos ajax -->
				
			</div>
		</div>	
		
	</div>
	<hr>
	<?php
	include("footer.php");
	?>
	<script type="text/javascript" src="js/VentanaCentrada.js"></script>
	<script type="text/javascript" src="js/distribuir.js"></script> 
	
  </body>
</html>
