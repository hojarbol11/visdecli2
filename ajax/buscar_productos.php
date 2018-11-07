<?php

	/*-------------------------
	Autor: Obed Alvarado
	Web: obedalvarado.pw
	Mail: info@obedalvarado.pw
	---------------------------*/
	include('is_logged.php');//Archivo verifica que el usario que intenta acceder a la URL esta logueado
	/* Connect To Database*/
	require_once ("../config/db.php");//Contiene las variables de configuracion para conectar a la base de datos
	require_once ("../config/conexion.php");//Contiene funcion que conecta a la base de datos
	//Archivo de funciones PHP
	include("../funciones.php");
	$action = (isset($_REQUEST['action'])&& $_REQUEST['action'] !=NULL)?$_REQUEST['action']:'';
	if (isset($_GET['id'])){
		$id_producto=intval($_GET['id']);
		$query=mysqli_query($con, "select * from vis_productos where p_cod_pro='".$id_producto."'");
		$count=mysqli_num_rows($query);
		if ($count==0){
			if ($delete1=mysqli_query($con,"DELETE FROM products WHERE id_producto='".$id_producto."'")){
			?>
			<div class="alert alert-success alert-dismissible" role="alert">
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			  <strong>Aviso!</strong> Datos eliminados exitosamente.
			</div>
			<?php 
		}else {
			?>
			<div class="alert alert-danger alert-dismissible" role="alert">
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			  <strong>Error!</strong> Lo siento algo ha salido mal intenta nuevamente.
			</div>
			<?php
			
		}
			
		} else {
			?>
			<div class="alert alert-danger alert-dismissible" role="alert">
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			  <strong>Error!</strong> No se pudo eliminar éste  producto. Existen cotizaciones vinculadas a éste producto. 
			</div>
			<?php
		}
		
		
		
	}
	if($action == 'ajax'){
		// escaping, additionally removing everything that could be (html/javascript-) code
         $q = mysqli_real_escape_string($con,(strip_tags($_REQUEST['q'], ENT_QUOTES)));
		 $sColumn = 'p_marca_pro' ;//Columna de búsqueda
		// $sCampos = "vis_productos.p_div_pro, vis_productos.p_cod_int, vis_productos.p_marca_pro, vis_productos.p_princ_act,vis_productos.p_presen_pro,vis_productos.p_unid_man,vis_precios.p_precio,vis_inventario.i_cant_uni";
		 $sTable = "vis_productos";
		 $aUnion = array('vis_precios ON vis_precios.p_cod_int = vis_productos.p_cod_int','vis_inventario ON vis_inventario.i_cod_int = vis_productos.p_cod_int');
		 $sWhere = "WHERE ";
		 $aWhere = array('vis_precios.p_cod_mes = ','vis_inventario.i_mes_inv = ','vis_inventario.i_est_pro = "1"');
		 $iMes=date("m");
		 $aWhere[0] .= '"'.strval($iMes).'"';
		 $aWhere[1] .= '"'.strval($iMes).'"';
		 
		 
		if ( $_GET['q'] != "" )
		{
			$sWhere .= $sColumn." LIKE '%".$q."%' AND ";
			//for ( $i=0 ; $i<count($aColumns) ; $i++ )
			//{
			//	$sWhere .= $aColumns[$i]." LIKE '%".$q."%' OR ";
			//}
			//$sWhere = substr_replace( $sWhere, "", -3 );
			//$sWhere .= ')';
		}
		
		$sWhere.=$aWhere[0]." AND ".$aWhere[1]." AND ".$aWhere[2]." order by p_div_pro desc";
		include 'pagination.php'; //include pagination file
		//pagination variables
		$page = (isset($_REQUEST['page']) && !empty($_REQUEST['page']))?$_REQUEST['page']:1;
		$per_page = 7; //how much records you want to show
		$adjacents  = 4; //gap between pages after number of adjacents
		$offset = ($page - 1) * $per_page;
		
		//Sumar las unidades disponibles para la districución*/
		$suma_query = mysqli_query($con, "SELECT SUM(vis_inventario.i_cant_uni) AS numrows FROM $sTable INNER JOIN $aUnion[0] INNER JOIN $aUnion[1] $sWhere");
		$suma_unid = mysqli_fetch_array($suma_query);
		$suma_un = $suma_unid['numrows'];
		
		//Count the total number of row in your table*/
		$count_query = mysqli_query($con, "SELECT count(*) AS numrows FROM $sTable INNER JOIN $aUnion[0] INNER JOIN $aUnion[1] $sWhere");
		$row = mysqli_fetch_array($count_query);
		$numrows = $row['numrows'];
		$total_pages = ceil($numrows/$per_page);
		$reload = './productos.php';
		//main query to fetch the data */
		// $sql="select * from vis_productos inner join vis_precios on vis_productos.p_cod_pro=vis_precios.p_cod_pro where vis_precios.p_cod_mes='10'"; */
        //		SELECT vis_productos.p_div_pro, vis_productos.p_cod_int, vis_productos.p_marca_pro, vis_productos.p_princ_act,vis_productos.p_presen_pro,vis_productos.p_unid_man,vis_precios.p_precio,vis_inventario.i_cant_uni */
        //FROM vis_productos */
        //INNER JOIN vis_precios ON vis_precios.p_cod_int = vis_productos.p_cod_int*/
        //INNER JOIN vis_inventario ON vis_inventario.i_cod_int = vis_productos.p_cod_int*/
        //WHERE vis_precios.p_cod_mes = "10" AND vis_inventario.i_mes_inv = "10" */
        //ORDER BY vis_productos.p_div_pro DESC */
		
		$sql="SELECT * FROM  $sTable INNER JOIN $aUnion[0] INNER JOIN $aUnion[1] $sWhere LIMIT $offset,$per_page"; 
		$query = mysqli_query($con, $sql);
		
		//loop through fetched data*/
		if ($numrows>0){
			
			?>
			<div class="table-responsive">
			  <table class="table">
				<tr  class="info">
				    <th>División</th>
					<th>Código</th>
					<th>Presentación</th>
					<th>Unidad de Manejo</th>
					<th>Precio Bs. S.</th> 
					<th>Cantidad</th>
					<th class='text-right'>Acción</th>
					
				</tr>
				<?php
				while ($row=mysqli_fetch_array($query)){
						$id_producto=$row['p_cod_pro'];
						$division_producto=$row['p_div_pro'];
						$codigo_producto=$row['p_cod_int'];
						$marca_producto=$row['p_marca_pro'];
						$principio_producto=$row['p_princ_act'];
						$presentacion_producto=$row['p_presen_pro'];
						$unidad_producto=$row['p_unid_man'];
						$precio_producto=$row['p_precio'];
						$cantidad_producto=$row['i_cant_uni'];
					?>
					
					<input type="hidden" value="<?php echo $division_producto;?>" id="division_producto<?php echo $id_producto;?>">
					<input type="hidden" value="<?php echo $codigo_producto;?>" id="codigo_producto<?php echo $id_producto;?>">
					<input type="hidden" value="<?php echo $marca_producto;?>" id="marca_producto<?php echo $id_producto;?>">
					<input type="hidden" value="<?php echo $principio_producto;?>" id="principio<?php echo $id_producto;?>">
					<input type="hidden" value="<?php echo $presentacion_producto;?>" id="presentacion<?php echo $id_producto;?>">
					<input type="hidden" value="<?php echo $unidad_producto;?>" id="unidad<?php echo $id_producto;?>">
					<input type="hidden" value="<?php echo $precio_producto;?>" id="precio<?php echo $id_producto;?>">
					<input type="hidden" value="<?php echo $cantidad_producto;?>" id="cantidad<?php echo $id_producto;?>">
					<tr>
						
						<td><?php echo "<div align=\"center\">".$division_producto."</div>"; ?></td>
						<td><?php echo $codigo_producto; ?></td>
						<td ><?php echo $marca_producto .' '. $principio_producto .' '. $presentacion_producto; ?></td>
						<td><?php echo "<div align=\"center\">".$unidad_producto."</div>"; ?></td>
						<td><?php echo "<div align=\"center\">".number_format($precio_producto,2,",",".")."</div>"; ?></td>
						<td><?php echo "<div align=\"center\">".number_format($cantidad_producto,0,"",".")."</div>"; ?></td>
					
					<td ><span class="pull-right">
					<a href="#" class='btn btn-default' title='Editar producto' onclick="obtener_datos('<?php echo $id_producto;?>');" data-toggle="modal" data-target="#myModal2"><i class="glyphicon glyphicon-edit"></i></a> 
					<!-- <a href="#" class='btn btn-default' title='Editar precio' onclick="obtener_datosprecio('<?php echo $id_producto;?>');" data-toggle="modal" data-target="#myModal3"><i class="glyphicon glyphicon-tags"></i></a> -->
						
					</tr>
					<?php
				}
				?>
				<tr  class="info">
					<td colspan=7><span class="pull-left"><b>
					<?php
					 echo "   -   Total Productos o SKU's = ".$numrows."   -   Total Cantidad de Unidades Disponibles = ".number_format($suma_un,0,"",".");
					?></b></span></td>
				</tr>
				<tr>
					<td colspan=6><span class="pull-right">
					<?php
					 echo paginate($reload, $page, $total_pages, $adjacents);
					?></span></td>
				</tr>
			  </table>
			</div>
			<?php
		}
	}
?>