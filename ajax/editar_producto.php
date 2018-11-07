<?php
	include('is_logged.php');//Archivo verifica que el usario que intenta acceder a la URL esta logueado
	/*Inicia validacion del lado del servidor*/
	if (empty($_POST['mod_id'])) {
           $errors[] = "ID vacío";
        }else if (empty($_POST['mod_codigo'])) {
           $errors[] = "Código vacío";
        } else if (empty($_POST['mod_marca'])){
			$errors[] = "Nombre de la marca vacío";
		} else if ($_POST['mod_principio']==""){
			$errors[] = "Nombre del Principio Activo vacio";
		} else if (empty($_POST['mod_presentacion'])){
			$errors[] = "Presentación del producto vacío";
		} else if (empty($_POST['mod_unidad'])){
			$errors[] = "Unidad de Manejo del producto vacío";	
		} else if (
			!empty($_POST['mod_id']) &&
			!empty($_POST['mod_codigo']) &&
			!empty($_POST['mod_marca']) &&
			!empty($_POST['mod_principio']) &&
			!empty($_POST['mod_presentacion']) &&
			!empty($_POST['mod_unidad'])
		){
		/* Connect To Database*/
		require_once ("../config/db.php");//Contiene las variables de configuracion para conectar a la base de datos
		require_once ("../config/conexion.php");//Contiene funcion que conecta a la base de datos
		// escaping, additionally removing everything that could be (html/javascript-) code
		$codigo=mysqli_real_escape_string($con,(strip_tags($_POST["mod_codigo"],ENT_QUOTES)));
		$marca=mysqli_real_escape_string($con,(strip_tags($_POST["mod_marca"],ENT_QUOTES)));
		$principio=mysqli_real_escape_string($con,(strip_tags($_POST["mod_principio"],ENT_QUOTES)));
		$presentacion=mysqli_real_escape_string($con,(strip_tags($_POST["mod_presentacion"],ENT_QUOTES)));
		$unidad=mysqli_real_escape_string($con,(strip_tags($_POST["mod_unidad"],ENT_QUOTES)));
		$division=mysqli_real_escape_string($con,(strip_tags($_POST["mod_division"],ENT_QUOTES)));
		$precio=mysqli_real_escape_string($con,(strip_tags($_POST["mod_precio"],ENT_QUOTES)));
		$cantidad=mysqli_real_escape_string($con,(strip_tags($_POST["mod_cantidad"],ENT_QUOTES)));
		$id_producto=$_POST['mod_id'];
		$iMes=date("m");
		$sql="UPDATE vis_productos SET p_cod_int='".$codigo."', p_marca_pro='".$marca."', p_princ_act='".$principio."', p_presen_pro='".$presentacion."', p_unid_man='".$unidad."', p_div_pro='".$division."' WHERE p_cod_pro='".$id_producto."'";
		$query_update = mysqli_query($con,$sql);
			if ($query_update){
				$messages[] = "Producto,";
			} else{
				$errors []= "Lo siento algo ha salido mal intenta nuevamente.".mysqli_error($con);
			}
		$sql="UPDATE vis_precios SET p_precio='".floatval($precio)."' WHERE p_cod_int='".$codigo."' AND p_cod_mes='".strval($iMes)."'";
		$query_update1 = mysqli_query($con,$sql);
			if ($query_update1){
				$messages[] = " Precio,";
			} else{
				$errors []= "Lo siento algo ha salido mal intenta nuevamente.".mysqli_error($con);
			}	
		$sql="UPDATE vis_inventario SET i_cant_uni='".($cantidad)."' WHERE i_cod_int='".$codigo."' AND i_mes_inv='".strval($iMes)."'";
		$query_update2 = mysqli_query($con,$sql);
			if ($query_update2){
				$messages[] = " Cantidad han sido actualizados satisfactoriamente.";
			} else{
				$errors []= "Lo siento algo ha salido mal intenta nuevamente.".mysqli_error($con);
			}
			
		} else {
			$errors []= "Error desconocido.";
		}
		
		if (isset($errors)){
			
			?>
			<div class="alert alert-danger" role="alert">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
					<strong>Error!</strong> 
					<?php
						foreach ($errors as $error) {
								echo $error;
							}
						?>
			</div>
			<?php
			}
			if (isset($messages)){
				
				?>
				<div class="alert alert-success" role="alert">
						<button type="button" class="close" data-dismiss="alert">&times;</button>
						<strong>¡Bien hecho!</strong>
						<?php
							foreach ($messages as $message) {
									echo $message;
								}
							?>
				</div>
				<?php
			}

?>