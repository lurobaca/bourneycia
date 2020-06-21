// JavaScript Document
function ControlaDescarga(CodProveedorAutorizado,CodProveedor){

	if (CodProveedorAutorizado == CodProveedor)	
	{	
         window.location.href="DescargarEXCELL.php?Cod_Proveedor=" + CodProveedorAutorizado  
	}
	else
     alert ("No tiene permiso para descarga esta informacion" );
}


function MostrasOfertas(){
	
	alert("MostrasOfertas");
	var Datos = "submit=&OFERTA=OF";
	
	$.ajax({
			url: 'Productos.php',
			type: "POST",
			data: Datos,
			beforeSend: function () { 
			$("#DatosDePagina").empty;
			// $("#DatosDePagina").html("Procesando, espere por favor...");
		    
                },
			success: function(datos){
						$("#tags").text('...');
						$("#DatosDePagina").html(datos);
			},
           error: function() {
			  $("#DatosDePagina").empty;
			  $("#DatosDePagina").html("ERROR ");
                     
        }});return false;
	}

function MostrasPagosRecibos(Factura){
	
	
	var Datos = "submit=&Factura="+Factura;
	
	$.ajax({
			url: 'PagosAFactura.php',
			type: "POST",
			data: Datos,
			beforeSend: function () { 
			$("#tab-2").empty;
			 $("#tab-2").html("Procesando, espere por favor...");
		    
                },
			success: function(datos){
						$("#tab-2").html(datos);
			},
           error: function() {
			  $("#tab-2").empty;
			  $("#tab-2").html("ERROR ");
                     
        }});return false;
	}

function ObtieneFacturasCanceladas(CodCliente){
	
	var Datos = "submit=&CodCliente="+CodCliente+"&Tipo=Pendientes";
	alert("entro" + CodCliente +" VALORES "+ Datos);
	$.ajax({
			url: 'Facturas.php',
			type: "POST",
			data: Datos,
			beforeSend: function () { 
			
			$("#tab-3").empty;
			$("#tab-3").html("Procesando, espere por favor...");
		     },
			success: function(datos){
			
						$("#tab-3").html(datos);
			},
           error: function() {
			  $("#tab-3").empty;
			  $("#tab-3").html("ERROR ");
                     
        }});return false;
	}