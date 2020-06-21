function ConsultaConteos()
{
	
	var Datos = "submit=&Accion=ConsultaConteos";
	var NumArtiCar=0;
	$.ajax({
			url: 'ContadorComprobasntes_SHOW.php',
			type: "POST",
			data: Datos,
			beforeSend: function () { 
			$("#Contenedor").empty;
			$("#Contenedor").html("Procesando, espere por favor...");
		                   },
			success: function(datos){
						$("#Contenedor").html(datos);
			},
           error: function( jqXHR, textStatus, errorThrown) {
			   if (jqXHR.status === 0) {

	            alert('Not connect: Verify Network.');

	          } else if (jqXHR.status == 404) {

	            alert('Requested page not found [404]');

	          } else if (jqXHR.status == 500) {

	            alert('Internal Server Error [500].');

	          } else if (textStatus === 'parsererror') {

	            alert('Requested JSON parse failed.');

	          } else if (textStatus === 'timeout') {

	            alert('Time out error.');

	          } else if (textStatus === 'abort') {

	            alert('Ajax request aborted.');

	          } else {

	            alert('Uncaught Error: ' + jqXHR.responseText);

	          } 
        }});return false;
	

	/*$.ajax({
			url: 'ContadorComprobasntes_SHOW.php',
			type: "POST",
			data: Datos,
			beforeSend: function () { 
			$("#Contenedor").empty;
			$("#Contenedor").html("Procesando, espere por favor...");
		                   },
			success: function(datos){
						$("#Contenedor").html(datos);
			},  
			error: function( jqXHR, textStatus, errorThrown ) {

          if (jqXHR.status === 0) {

            alert('Not connect: Verify Network.');

          } else if (jqXHR.status == 404) {

            alert('Requested page not found [404]');

          } else if (jqXHR.status == 500) {

            alert('Internal Server Error [500].');

          } else if (textStatus === 'parsererror') {

            alert('Requested JSON parse failed.');

          } else if (textStatus === 'timeout') {

            alert('Time out error.');

          } else if (textStatus === 'abort') {

            alert('Ajax request aborted.');

          } else {

            alert('Uncaught Error: ' + jqXHR.responseText);

          }

        },
        fail( function( jqXHR, textStatus, errorThrown ) {

  if (jqXHR.status === 0) {

    alert('Not connect: Verify Network.');

  } else if (jqXHR.status == 404) {

    alert('Requested page not found [404]');

  } else if (jqXHR.status == 500) {

    alert('Internal Server Error [500].');

  } else if (textStatus === 'parsererror') {

    alert('Requested JSON parse failed.');

  } else if (textStatus === 'timeout') {

    alert('Time out error.');

  } else if (textStatus === 'abort') {

    alert('Ajax request aborted.');

  } else {

    alert('Uncaught Error: ' + jqXHR.responseText);

  }

});*/

	}