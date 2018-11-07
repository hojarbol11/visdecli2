		$(function(){
			$('#carga').on('click', function (e){
			e.preventDefault(); // Evitamos que salte el enlace.
			$("#loader").fadeIn('slow');
			var paqueteDeDatos = new FormData();
			paqueteDeDatos.append('archivo', $('#file')[0].files[0]);
			paqueteDeDatos.append('mes', $('#mes').prop('value'));
			$.ajax({
				type: 'POST', // Siempre que se envíen ficheros, por POST, no por GET.
				url:'./ajax/cargar_inventario.php?action=ajax',
				contentType: false,
				data: paqueteDeDatos, // Al atributo data se le asigna el objeto FormData.
				processData: false,
				cache: false, 
				beforeSend: function(objeto){
				$('#loader').html('<img src="./img/ajax-loader.gif"> Cargando...');
			  },
				success:function(data){
					$(".outer_div").html(data).fadeIn('slow');
					$('#loader').html('');
				}
			})
			$('input').val(""); //todos los inputs quedarán vacíos 
		});
		
		});

	
		
			function eliminar (id)
		{
			var q= $("#q").val();
		if (confirm("Realmente deseas eliminar la factura")){	
		$.ajax({
        type: "GET",
        url: "./ajax/buscar_facturas.php",
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
		
		function imprimir_factura(id_factura){
			VentanaCentrada('./pdf/documentos/ver_factura.php?id_factura='+id_factura,'Factura','','1024','768','true');
		}
