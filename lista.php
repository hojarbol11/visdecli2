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
	$active_distribuir="";
	$active_orden="";
	$active_carga="active";
	$active_usuarios="";		
	$title="Carga | Lista de Precios";
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
		    <h4><i class='glyphicon glyphicon-sort-by-order'></i> Carga Masiva de Datos: Lista de Precios</h4>
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
	<script type="text/javascript" src="js/carga.js"></script> 
	
  </body>
</html>
//<script>
//			$(function(){
//				$('#carga').on('click', function (e){
//					e.preventDefault(); // Evitamos que salte el enlace.
					/* Creamos un nuevo objeto FormData. Este sustituye al 
					atributo enctype = "multipart/form-data" que, tradicionalmente, se 
					incluía en los formularios (y que aún se incluye, cuando son enviados 
					desde HTML. */
//					var paqueteDeDatos = new FormData();
					/* Todos los campos deben ser añadidos al objeto FormData. Para ello 
					usamos el método append. Los argumentos son el nombre con el que se mandará el 
					dato al script que lo reciba, y el valor del dato.
					Presta especial atención a la forma en que agregamos el contenido 
					del campo de fichero, con el nombre 'archivo'. */
//					paqueteDeDatos.append('archivo', $('#file')[0].files[0]);
//					paqueteDeDatos.append('mes', $('#mes').prop('value'));
					//paqueteDeDatos.append('correo', $('#campoCorreo').prop('value'));
//					var destino = "ajax/recibir.php"; // El script que va a recibir los campos de formulario.
					/* Se envia el paquete de datos por ajax. */
//					$.ajax({
//						url: destino,
//						type: 'POST', // Siempre que se envíen ficheros, por POST, no por GET.
//						contentType: false,
//						data: paqueteDeDatos, // Al atributo data se le asigna el objeto FormData.
//						processData: false,
//						cache: false, 
//						success: function(resultado){ // En caso de que todo salga bien.
//							console.log(resultado);
//						},
//						error: function (){ // Si hay algún error.
//							alert("Algo ha fallado.");
//						}
//					});
//				});
//			});






//$(document).ready(function () {
//    $("#datos_mes").bind("submit",function(){
        // Capturamnos el boton de envío
//        var btnEnviar = $("#carga");
//        $.ajax({
//            type: $(this).attr("method"),
//            url: $(this).attr("action"),
//            data:$(this).serialize(),
//            beforeSend: function(){
                /*
                * Esta función se ejecuta durante el envió de la petición al
                * servidor.
                * */
                // btnEnviar.text("Enviando"); Para button 
//                btnEnviar.val("Enviando"); // Para input de tipo button
//                btnEnviar.attr("disabled","disabled");
//            },
//            complete:function(data){
                /*
                * Se ejecuta al termino de la petición
                * */
//                btnEnviar.val("Enviar formulario");
//                btnEnviar.removeAttr("disabled");
//            },
//            success: function(data){
                /*
                * Se ejecuta cuando termina la petición y esta ha sido
                * correcta
                * */
///                $(".respuesta").html(data);
//            },
//            error: function(data){
                /*
                * Se ejecuta si la peticón ha sido erronea
                * */
//                alert("Problemas al tratar de enviar el formulario");
//            }
//        });
        // Nos permite cancelar el envio del formulario
//        return false;
//    });
///});


//$(document).on('ready',function(){       
//    $('#submit').click(function(){
//        var url = "ajax/cargar_precios.php?action=ajax";
//        $.ajax({                        
//           type: "POST",                 
//           url: url,                     
//           data: $("#datos_mes").serialize(), 
//           success: function(data)             
//           {
//             $('#resp').html(data);               
//           }
//       });
//    });
//});

//$(function(){
//        $("#datos_mes").on("submit", function(e){
//            e.preventDefault();
//            var f = $(this);
///            var formData = new FormData(document.getElementById("datos_mes"));
			
            //formData.append("carga", f);
//			formData.append(f.attr("#carga"), $(this)[0].files[0]);
//			alert(formData);

 //           $.ajax({
 //               url: "ajax/cargar_precios.php?action=ajax",
 //               type: "post",
 //               dataType: "html",
//				data: {varFormData: formData},                
//                cache: false,
//                contentType: false,
//	            processData: false
//            })
 //               .done(function(res){
 //                   $("#mensaje").html("Respuesta: " + res);
 //               });
 //       });
 //   });



//$(document).ready(function() {

//    $('#submit').click(function(){

//        var dataString = $('#datos_mes').serialize();

//        alert('Datos serializados: '+dataString);

//        $.ajax({
//            type: "POST",
//            url: "account.php",
//            data: dataString,
//            success: function(data) {

 //           }
 //       });
 //   });
//});
</script>
