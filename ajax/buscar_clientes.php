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
	
	$action = (isset($_REQUEST['action'])&& $_REQUEST['action'] !=NULL)?$_REQUEST['action']:'';
	if (isset($_GET['id'])){
		$id_cliente=intval($_GET['id']);
		$query=mysqli_query($con, "select * from facturas where id_cliente='".$id_cliente."'");
		$count=mysqli_num_rows($query);
		if ($count==0){
			if ($delete1=mysqli_query($con,"DELETE FROM clientes WHERE id_cliente='".$id_cliente."'")){
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
			  <strong>Error!</strong> No se pudo eliminar éste  cliente. Existen facturas vinculadas a éste producto. 
			</div>
			<?php
		}
		
	}
	if($action == 'ajax'){
		// escaping, additionally removing everything that could be (html/javascript-) code
         $q = mysqli_real_escape_string($con,(strip_tags($_REQUEST['q'], ENT_QUOTES)));
		 $aColumns = array('c_nom_cli');//Columnas de busqueda
		 $sTable = "vis_clientes";
		 $sWhere = "";
		if ( $_GET['q'] != "" )
		{
			$sWhere = "WHERE (";
			for ( $i=0 ; $i<count($aColumns) ; $i++ )
			{
				$sWhere .= $aColumns[$i]." LIKE '%".$q."%' OR ";
			}
			$sWhere = substr_replace( $sWhere, "", -3 );
			$sWhere .= ')';
		}
		$sWhere.=" order by c_cod_reg";
		include 'pagination.php'; //include pagination file
		//pagination variables
		$page = (isset($_REQUEST['page']) && !empty($_REQUEST['page']))?$_REQUEST['page']:1;
		$per_page = 7; //how much records you want to show
		$adjacents  = 4; //gap between pages after number of adjacents
		$offset = ($page - 1) * $per_page;
		// Contar los clientes por región */
		$aRegion=Array();
		$contar_queryREG = mysqli_query($con, "SELECT c_cod_reg, COUNT(*) FROM vis_clientes GROUP BY c_cod_reg");
		$i=0;
		while($FilasReg = mysqli_fetch_array($contar_queryREG,MYSQLI_NUM)){
			  $aRegion[$i] = $FilasReg[1];
			  $i++;
		}	  
		
		//Count the total number of row in your table*/
		$count_query   = mysqli_query($con, "SELECT count(*) AS numrows FROM $sTable  $sWhere");
		$row= mysqli_fetch_array($count_query);
		$numrows = $row['numrows'];
		$total_pages = ceil($numrows/$per_page);
		$reload = './clientes.php';
		//main query to fetch the data
		$sql="SELECT * FROM  $sTable $sWhere LIMIT $offset,$per_page";
		$query = mysqli_query($con, $sql);
		$reg = array(0,"Occidente","Andes","Centro Occ.","Caracas","Centro","Oriente");
		//loop through fetched data
		
		if ($numrows>0){
			
			?>
			<div class="table-responsive">
			  <table class="table">
				<tr  class="info">
				    
					<th>Nombre</th>
					<th>Teléfono</th>
					<th>Email</th>
					<th>Cód_Entrega</th>
					<th>Región</th>
					<th>% de Dist.</th>
					<th>Estado</th>					
					<th class='text-right'>Acción</th>
					
				</tr>
				<?php
				
				while ($row=mysqli_fetch_array($query)){
					    
						$id_cliente=$row['c_cod_cli'];
						$nombre_cliente=$row['c_nom_cli'];
						$telefono_cliente=$row['c_tel_cli'];
						$email_cliente=$row['c_email_cli'];
						$cod_ent=$row['c_cod_ent'];
						$region1=$row['c_cod_reg'];
						$region=$reg[$region1];
						$status_cliente=$row['c_est_cli'];
						$porcentaje=$row['c_por_dis']*100;						
						$direccion_cliente=$row['c_dir_cli'];
						$rif=$row['c_rif_cli'];
						if ($status_cliente==1){$estado="Activo";}
						else {$estado="Inactivo";}
						$date_added= date('d/m/Y', strtotime($row['c_fec_agre']));
						
					?>
					
					<input type="hidden" value="<?php echo $nombre_cliente;?>" id="nombre_cliente<?php echo $id_cliente;?>">
					<input type="hidden" value="<?php echo $telefono_cliente;?>" id="telefono_cliente<?php echo $id_cliente;?>">
					<input type="hidden" value="<?php echo $email_cliente;?>" id="email_cliente<?php echo $id_cliente;?>">
					<input type="hidden" value="<?php echo $cod_ent;?>" id="cod_ent<?php echo $id_cliente;?>">
					<input type="hidden" value="<?php echo $region;?>" id="region<?php echo $id_cliente;?>">
					<input type="hidden" value="<?php echo $status_cliente;?>" id="status_cliente<?php echo $id_cliente;?>">
					<input type="hidden" value="<?php echo $direccion_cliente;?>" id="direccion_cliente<?php echo $id_cliente;?>">
					<input type="hidden" value="<?php echo $rif;?>" id="rif<?php echo $id_cliente;?>">
					<input type="hidden" value="<?php echo $porcentaje;?>" id="porcentaje<?php echo $id_cliente;?>">
					<input type="hidden" value="<?php echo $region1;?>" id="region1<?php echo $id_cliente;?>">
					
					<tr>
					
						<td><?php echo $nombre_cliente; ?></td>
						<td ><?php echo $telefono_cliente; ?></td>
						<td><?php echo $email_cliente;?></td>
						<td><?php echo $cod_ent;?></td>
						<td><?php echo $region;?></td>
						<td><?php echo number_format($porcentaje,2,",","");?></td>
						<td><?php echo $estado;?></td>				
						
					<td ><span class="pull-right">
					<a href="#" class='btn btn-default' title='Editar cliente' onclick="obtener_datos('<?php echo $id_cliente;?>');" data-toggle="modal" data-target="#myModal2"><i class="glyphicon glyphicon-edit"></i></a> 
					
					<!-- <a href="#" class='btn btn-default' title='Borrar cliente' onclick="eliminar('<?php echo $id_cliente; ?>')"><i class="glyphicon glyphicon-trash"></i> </a></span></td> -->
						
					</tr>
					<?php
				}
				?>
				<tr  class="info">
					<td colspan=7><span class="pull-left"><b>
					<?php
					 echo "Reg. 1 = ".$aRegion[0]."   -   Reg. 2 = ".$aRegion[1]."   -   Reg. 3 = ".$aRegion[2]."   -   Reg. 4 = ".$aRegion[3]."   -   Reg. 5 = ".$aRegion[4]."   -   Reg. 6 = ".$aRegion[5]."   -   Total Clientes = ".$numrows;
					?></b></span></td>
				</tr>
				<tr>
					<td colspan=7><span class="pull-right">
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