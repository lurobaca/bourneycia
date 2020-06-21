// JavaScript Document

	
	
function BuscarArticulo(){	
		
		var FAMILIA =  $("#FAMILIA option:selected").text() ;
		var MARCA =  $("#MARCA option:selected").text() ;
		var CATEGORIA =  $("#CATEGORIA option:selected").text() ;
		//var DESCRIPCION = $('#Descripcion').attr('value'); 
			var DESCRIPCION = $('#tags').attr('value');
		
		//var Datos = $('#frmClienteActualizar').serialize();
		var Datos = "submit=&FAMILIA="+FAMILIA+"&CATEGORIA="+CATEGORIA+"&MARCA="+MARCA+"&DESCRIPCION="+DESCRIPCION;

     	$.ajax({
			url: 'Consulta_UN_Articulo.php',
			type: "POST",
			data: Datos,
			beforeSend: function () {
				alert("procesando"); 
			$("#Articulos").empty;
			  $("#Articulos").html("Procesando, espere por favor...");
		
                },
			success: function(datos){
						$("#Articulos").empty;
						$("#Articulos").html(datos);
						
			},
          error: function() {
			  $("#Articulos").empty;
			  $("#Articulos").html("ERROR ");
                     
    }
		});


		return false;
	}