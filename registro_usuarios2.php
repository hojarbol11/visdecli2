<?php
     require_once("libraries/password_compatibility_library.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>  
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
  <title>VISDECLI | Nuevo Usuario</title>
  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
  <!-- CSS  -->
  <link href="css/login.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link rel="icon" href="favicon.ico" type="image/x-icon"/>  
  
</head>

<body>
	<div class="modal-dialog" role="document">
		<div class="modal-content">
             <div class="modal-header">		  		     
			      <a href="logout2.php"><img src="img/cerrar.png" align="right" alt="Cerrar págína" /></a>
		          <h4 class="modal-title" id="myModalLabel"><i class='glyphicon glyphicon-edit'></i> Agregar nuevo usuario</h4>			
		     </div>
		     <div class="modal-body">
			      <form class="form-horizontal" method="post" id="guardar_usuario" name="guardar_usuario">
			            <div id="resultados_ajax"></div>
			            <div class="form-group">
				             <label for="firstname" class="col-sm-3 control-label">Nombres</label>
				             <div class="col-sm-8">
				                  <input type="text" class="form-control" id="firstname" name="firstname" placeholder="Nombres" required>
				             </div>
			            </div>
			            <div class="form-group">
				             <label for="lastname" class="col-sm-3 control-label">Apellidos</label>
				             <div class="col-sm-8">
				                  <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Apellidos" required>
				             </div>
			            </div>
			            <div class="form-group">
				             <label for="user_name" class="col-sm-3 control-label">Usuario</label>
				             <div class="col-sm-8">
				                  <input type="text" class="form-control" id="user_name" name="user_name" placeholder="Usuario" pattern="[a-zA-Z0-9]{2,64}" title="Nombre de usuario ( sólo letras y números, 2-64 caracteres)"required>
				             </div>
			            </div>
			            <div class="form-group">
				             <label for="user_email" class="col-sm-3 control-label">Email</label>
				             <div class="col-sm-8">
				                  <input type="email" class="form-control" id="user_email" name="user_email" placeholder="Correo electrónico" required>
				             </div>
			            </div>
			            <div class="form-group">
				             <label for="user_password_new" class="col-sm-3 control-label">Contraseña</label>
				             <div class="col-sm-8">
				                  <input type="password" class="form-control" id="user_password_new" name="user_password_new" placeholder="Contraseña" pattern=".{6,}" title="Contraseña ( min . 6 caracteres)" required>
				             </div>
			            </div>
			            <div class="form-group">
				             <label for="user_password_repeat" class="col-sm-3 control-label">Repite contraseña</label>
				             <div class="col-sm-8">
				                  <input type="password" class="form-control" id="user_password_repeat" name="user_password_repeat" placeholder="Repite contraseña" pattern=".{6,}" required>
				             </div>
			            </div>
			
		                </div>
		                <div class="modal-footer">
		                     <a href="logout2.php"><img src="img/cerrar2.jpg" align="center" alt="Cerrar págína" /></a>			
			                 <button type="submit" class="btn btn-primary" id="guardar_datos">Guardar datos</button>
		                </div>
		          </form>
				  
		</div><!-- /modal-content -->
	</div><!-- /modal-dialog -->
	
	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
	<script type="text/javascript" src="js/usuarios.js"></script>	
</body>
</html>	
<script>
$( "#guardar_usuario" ).submit(function( event ) {
  $('#guardar_datos').attr("disabled", true);
  alert("Voy");
 var parametros = $(this).serialize();
	 $.ajax({		    
		    async: true,
			type: "POST",
			url: "ajax/nuevo_usuario.php",
			data: parametros,
			 beforeSend: function(objeto){
				$("#resultados_ajax").html("Mensaje: Cargando...");
			  },
			done: function(datos){
			$("#resultados_ajax").html(datos);
			$('#guardar_datos').attr("disabled", false);
			load(1);			
		  }
		  
	});
  event.preventDefault();
});	
</script>