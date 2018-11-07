		$(document).ready(function(){
			load(1);
		});

		function load(page){
			var q= $("#q").val();
			$("#loader").fadeIn('slow');			 
			$.ajax({
				url:'./ajax/buscar_productos.php?action=ajax&page='+page+'&q='+q,
				 beforeSend: function(objeto){
				 $('#loader').html('<img src="./img/ajax-loader.gif"> Cargando...');
			  },
				success:function(data){
					$(".outer_div").html(data).fadeIn('slow');
					$('#loader').html('');
					
				}
			})
		}

	
		
		function eliminar (id)
		{
			var q= $("#q").val();
		if (confirm("Realmente deseas eliminar el producto")){	
		$.ajax({
        type: "GET",
        url: "./ajax/buscar_productos.php",
        data: "id="+id,"q":q,
		 beforeSend: function(objeto){
			$("#resultados").html("Mensaje: Cargando...");
		  },
        success: function(datos){
		$("#resultados").html(datos);
		load(1);
		}
			});
		}
		}
		
$( "#guardar_producto" ).submit(function( event ) {
  $('#guardar_datos').attr("disabled", true);  
  var parametros = $(this).serialize();  
	 $.ajax({
			type: "POST",
			url: "ajax/nuevo_producto.php",
			data: parametros,
			 beforeSend: function(objeto){
				$("#resultados_ajax_productos").html("Mensaje: Cargando...");
			  },
			success: function(datos){
			$("#resultados_ajax_productos").html(datos);
			$('#guardar_datos').attr("disabled", false);			
			load(1);
		  }
	    });
        $('input').val(""); //todos los inputs quedarán vacíos 		
        event.preventDefault();
 })

 $( "#editar_producto" ).submit(function( event ) {
 $('#actualizar_datos').attr("disabled", true);
  
 var parametros = $(this).serialize();
	 $.ajax({
			type: "POST",
			url: "ajax/editar_producto.php",
			data: parametros,
			 beforeSend: function(objeto){
				$("#resultados_ajax2").html("Mensaje: Cargando...");
			  },
			success: function(datos){
			$("#resultados_ajax2").html(datos);
			$('#actualizar_datos').attr("disabled", false);
			load(1);
		  }
	});
  $('input').val(""); //todos los inputs quedarán vacíos 		
  event.preventDefault();
})

	function obtener_datos(id){
			var codigo_producto = $("#codigo_producto"+id).val();
			var marca_producto = $("#marca_producto"+id).val();
			var principio_producto = $("#principio"+id).val();
			var presentacion_producto = $("#presentacion"+id).val();
			var unidad_producto = $("#unidad"+id).val();
			var division_producto = $("#division_producto"+id).val();
			var precio_producto = $("#precio"+id).val();
			var cantidad_producto = $("#cantidad"+id).val();
			$("#mod_id").val(id);
			$("#mod_codigo").val(codigo_producto);
			$("#mod_marca").val(marca_producto);
			$("#mod_principio").val(principio_producto);
			$("#mod_presentacion").val(presentacion_producto);
			$("#mod_unidad").val(unidad_producto);
			$("#mod_division").val(division_producto);
			$("#mod_precio").val(precio_producto);
			$("#mod_cantidad").val(cantidad_producto);
		}
		
// Función que permite Validar que en un Input de Texto sólo coloquemos números
	function valida(e){
    tecla = (document.all) ? e.keyCode : e.which;

    //Tecla de retroceso para borrar, siempre le permite al cursor no avanzar
    if (tecla==8){
        return true;
    }
        
    // Patron de entrada, en este caso solo acepta numeros
    patron =/[0-9]/;
    tecla_final = String.fromCharCode(tecla);
    return patron.test(tecla_final);
  }
	
		
		
		

