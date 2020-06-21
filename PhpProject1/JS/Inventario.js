
function iniciar_sesion(CodGrupo){

	    var Datos = "submit=&Accion=CONSULTA&CodGrupo="+CodGrupo;	
		$.ajax({
			url: 'Class/Inventario_Login.php',
			type: "POST",
			data: Datos,
			beforeSend: function () { 
				//$("#OpLogin").empty;
				//$("#OpLogin").html("<img align='center' src='../Vista/imagenes/espera.gif' width='50' height='50' />").fadeIn('slow');
		    },
			success: function(datos){

				//muestra el resultado de la validacion
				//$("#OpLogin").html(datos);
				if($.trim(datos) >="1"){
				   //window.location.href = "Invet_ListaAContar.php";
				   window.location.href = "Invet_CasasEnGrupo.php?CodGrupo="+CodGrupo;
				}else{
					alert("Acceso Bloqueado al Grupo : " +CodGrupo);
			 		$("#CodGrupo").val("");
			 	}
			},
           error: function(xhr) {
           	alert("Error iniciar_sesion" +xhr);
			   //var jsonResponse = JSON.parse(xhr.responseText);
			  // alert(jsonResponse.message);
    		   //$(".alert").html(jsonResponse.message);   
        	}
        });return false;
};



function ObtieneGrupo(){

	    var Datos = "submit=&Accion=ObtieneGrupo" ;	

		$.ajax({
			url: 'Class/Inventario_Login.php',
			type: "POST",
			data: Datos,
			beforeSend: function () {  },
			success: function(datos){
				
			$("#GrupoConteo").html(datos);
		
			},
           error: function(xhr) {
           	alert("Error ObtieneGrupo" +xhr);
			 
        	}
        });

        return false;
};

function ObtieneCasasEnGrupo(CodGrupo){

	    var Datos = "submit=&Accion=ObtieneCasasEnGrupo&CodGrupo="+CodGrupo;	

		$.ajax({
			url: 'Class/Inventario_Login.php',
			type: "POST",
			data: Datos,
			beforeSend: function () {  },
			success: function(datos){
				
			$("#ListaCasasEnGrupo").html(datos);
		
			},
           error: function(xhr) {
           	alert("Error ObtieneCasasEnGrupo" +xhr);
			 
        	}
        });

        return false;
};
function ObtieneLista(Busqueda){

	    var Datos = "submit=&Accion=LISTA&Busqueda="+Busqueda ;	

		$.ajax({
			url: 'Class/Inventario_Login.php',
			type: "POST",
			data: Datos,
			beforeSend: function () { 
				//$("#OpLogin").empty;
				//$("#OpLogin").html("<img align='center' src='../Vista/imagenes/espera.gif' width='50' height='50' />").fadeIn('slow');
		    },
			success: function(datos){
				
			$("#Lista").html(datos);
				//alert(datos);
			},
           error: function(xhr) {
          	//alert("ERROR ObtieneLista: DEBE USAR EL BOTON REGRESAR DE LA PAGINA" +xhr);
			   //var jsonResponse = JSON.parse(xhr.responseText);
			  // alert(jsonResponse.message);
    		   //$(".alert").html(jsonResponse.message);   
        	}
        });

        return false;
};

function IrALista(CodGrupo,Grupo,NumConteo,CodProveedor,Busqueda){
	


window.location.href = "Invet_ListaAContar.php?Busqueda="+Busqueda+"&CodGrupo="+CodGrupo+"&Grupo="+Grupo+"&NumConteo="+NumConteo+"&CodProveedor="+CodProveedor;
}

/*Carga la lista de articulo de la casa comercial elegida*/
function CargaLista (CodGrupo,Grupo,NumConteo,CodProveedor,Busqueda)
{  





		  var Datos = "submit=&Accion=LISTA2&Busqueda="+Busqueda+"&CodGrupo="+CodGrupo+"&Grupo="+Grupo+"&NumConteo="+NumConteo+"&CodProveedor="+CodProveedor ;	
		  
		
     $.ajax({
			url: 'Class/Inventario_Login.php',
			type: "POST",
			data: Datos,
			beforeSend: function () { 
				//$("#OpLogin").empty;
				//$("#OpLogin").html("<img align='center' src='../Vista/imagenes/espera.gif' width='50' height='50' />").fadeIn('slow');
		    },
			success: function(datos){
			
			
				 
			$("#Lista").html(datos);
				//alert(datos);
			},
           error: function(xhr) {
          	//alert("ERROR ObtieneLista: DEBE USAR EL BOTON REGRESAR DE LA PAGINA" +xhr);
			   //var jsonResponse = JSON.parse(xhr.responseText);
			  // alert(jsonResponse.message);
    		   //$(".alert").html(jsonResponse.message);   
        	}
        });

        return false;
	}
	
	
 function AgregaCuenta(CodArticulo,Grupo,Conteo,Busqueda,CodGrupo,CodProveedor){     
   
       window.location.href = "Invet_DetLineaConteo.php?Accion=Actualiza&CodArticulo="+CodArticulo+"&Grupo="+Grupo+"&Conteo="+Conteo+"&Busqueda="+Busqueda+"&CodGrupo="+CodGrupo+"&CodProveedor="+CodProveedor
	   
	   
	   
};

//LLAMADA DESDE DetLineaConteo del boton Aceptar
  function Conto(CodArticulo,Contaron,Apuntes,Conteo,Costo,Stock,Busqueda,Grupo,ConteoActivo,CodProveedor){
	
   	//llamada js actualiza conteo
  	 var Datos = "submit=&Accion=ACTUALIZA&CodArticulo="+CodArticulo+"&Conteo="+Conteo+"&Apuntes="+Apuntes+"&Contaron="+Contaron+"&Costo="+Costo+"&Stock="+Stock+"&Grupo="+Grupo+"&ConteoActivo="+ConteoActivo;	



		$.ajax({
			url: 'Class/Inventario_Login.php',
			type: "POST",
			data: Datos,
			beforeSend: function () { 
				
				//$("#OpLogin").empty;
				//$("#OpLogin").html("<img align='center' src='../Vista/imagenes/espera.gif' width='50' height='50' />").fadeIn('slow');
		    },
			success: function(datos){
			
				if(datos==1){
				 window.location.href = "Invet_ListaAContar.php?Busqueda="+Busqueda+"&CodGrupo="+CodGrupo+ConteoActivo+"&Grupo="+Grupo+"&NumConteo="+ConteoActivo+"&CodProveedor="+CodProveedor;
					 
				}else{
					alert("Error al actualizar  " +datos);
				}
			},
           error: function(xhr) {
           	alert("ERROR: DEBE USAR EL BOTON REGRESAR DE LA PAGINA" +xhr);
			   //var jsonResponse = JSON.parse(xhr.responseText);
			  // alert(jsonResponse.message);
    		   //$(".alert").html(jsonResponse.message);   
        	}
        });

        return false;

      
};

 
 function Limpia(CajaTexto){
 	$("#"+CajaTexto).val("");
 	//ObtieneLista('');
	
	CargaLista (CodGrupo,Grupo,NumConteo,CodProveedor,Busqueda);
 };


function Regresar(Pagina,Busqueda,CodGrupo,Grupo,NumConteo,CodProveedor){
	

	
	
		if(Pagina=="Proveedores")
 	  window.location.href = "Invet_CasasEnGrupo.php?CodGrupo="+CodGrupo;
	  
 	if(Pagina=="Lista")
window.location.href = "Invet_ListaAContar.php?Busqueda="+Busqueda+"&CodGrupo="+CodGrupo+"&Grupo="+Grupo+"&NumConteo="+NumConteo+"&CodProveedor="+CodProveedor;


	
	if(Pagina=="Login")
 	  window.location.href = "Invet_Inventario.php";
 };





