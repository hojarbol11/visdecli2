<?php

	/*-------------------------
	Autor: José Vivas
	
	Mail: 
	---------------------------*/
	include('is_logged.php');//Archivo verifica que el usario que intenta acceder a la URL esta logueado
	/* Connect To Database*/
	require_once ("../config/db.php");//Contiene las variables de configuracion para conectar a la base de datos
	require_once ("../config/conexion.php");//Contiene funcion que conecta a la base de datos
	require_once("../classes/excel_reader2.php");
    require_once("../classes/SpreadsheetReader.php");
	
	$action = (isset($_REQUEST['action'])&& $_REQUEST['action'] !=NULL)?$_REQUEST['action']:'';
	/* Validación de Campos de información*/
	if (empty($_POST['mes'])){
			$errors = "MES sin nombre ";
			$action = "No Proceso";
	} elseif (empty($_FILES['archivo']['name'])){
			$errors = "ARCHIVO sin nombre ";
			$action = "No Proceso";
	} 
	if($action == 'ajax'){
		
		$error = false;
		$Table = "vis_inventario";
		$mes = ($_POST["mes"]);
		$fecha_agre=date("Y-m-d H:i:s");
		$conta = 0;
 
        $allowedFileType = ['application/vnd.ms-excel','text/xls','text/xlsx','application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'];
        if(in_array($_FILES['archivo']['type'],$allowedFileType)){
	       $ruta = "../tmp/" . $_FILES['archivo']['name'];
		 
           move_uploaded_file($_FILES['archivo']['tmp_name'], $ruta);
	       $Reader = new SpreadsheetReader($ruta);
	       $sheetCount = count($Reader->sheets());
 
           for($i=0;$i<$sheetCount;$i++){
 
              $Reader->ChangeSheet($i);
 
              $primera = true;
              foreach ($Reader as $Row)
                {                
                     // Evitamos la primer linea
                     if($primera){
                        $primera = false;
                        continue;
                     }
 
                     // Obtenemos informacion
   
                     $campo1= "";
                     if(isset($Row[0])) {
                        $campo1= mysqli_real_escape_string($con,$Row[0]);
                     }
 
                     $campo2= "";
                     if(isset($Row[4])) {
                       $campo2 = mysqli_real_escape_string($con,$Row[4]);
					   $campo4 = 1;
					   if(intval($campo2) < 100) {
						  $campo4 = 0;
					   }			      
                     }
					 $campo3= "";
					 if(intval($campo2) == 0){
						  $campo2="";						  
					 }elseif(isset($Row[5])){
                       $campo3 = mysqli_real_escape_string($con,$Row[5]);
				       $conta++;					   
                     }
				
	 
	                 // Guardar en Base de datos
	                 if (!empty($campo1) && !empty($campo2)) {
                        
						$query = "INSERT INTO ".$Table."(i_mes_inv,i_cod_int,i_cant_uni,i_est_dis,i_est_pro,i_fec_agre) values('".$mes."','".$campo1."','".$campo2."','".$campo3."','".$campo4."','".$fecha_agre."')";
                   		
						$result = mysqli_query($con, $query);
 
                        if (empty($result)) {							
                            $error = true;
                        }
                     }
				}
	        }
        }
		?>
		<div class="table-responsive">
		     <table class="table">
			     <div class="alert alert-success alert-dismissible" role="alert">
			         <strong>Proceso Culminado Exitosamente se agregaron <?php echo $conta; ?> Registros a la Base de Datos </strong>
			     </div> 
			 </table>
		</div>
			<?php
		} else{
			?>
		    <div class="table-responsive">
		         <table class="table">
			        <div class="alert alert-success alert-dismissible" role="alert">
			             <strong> Usted debe llenar el campo <?php echo $errors; ?> para continuar con el proceso</strong>
			        </div> 
			     </table>
		    </div>
			<?php
		}
				
			
?>