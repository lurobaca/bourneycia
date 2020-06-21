// JavaScript Document

function OcultaMuestraFotos(usuario,Accion)
{

	
var Datos = "submit=&usuario="+usuario+"&Accion="+Accion;
		
	$.ajax({
			url: 'OcultaMuestraFotos.php',
			type: "POST",
			data: Datos,
			beforeSend: function () { 
			$("#DatosDePagina").empty;
			// $("#DatosDePagina").html("Procesando, espere por favor...");
		    
                },
			success: function(datos){
				
						$("#tags").empty;
						try{
						   /*1,50 significa los LIMITES QUE INCIA EN 0 Y MUESTRA 50 REGISTROS*/
						   ObtieneDatosDePagia(0,15,usuario,"","NOMostrarRutero");
						   ObtienePaginas(0,0,5,usuario,"");
	  					   //ObtieneRutero(usuario);
						  }catch(e){alert(e);}
							},
           error: function() {
			  $("#DatosDePagina").empty;
			  $("#DatosDePagina").html("ERROR ");
                     
        }});return false;

}


function ValidaSoloNumeros(Cant_ItemCode,ItemCode,Descripcion,cantidad,Precio,Total,CardCode,Agente,ComdicionPago,Fecha,Impuesto,MontoImpuesto,Descuento,MontoDescuento,ItemCode,codbarras,ItemName,existencia,lotes,Unidad,precio,PrchseItem,SellItem,InvntItem,AvgPrice,Price,frozenFor,SalUnitMsr,VATLiable,lote,U_Grupo,SalPackUn,FAMILIA,CATEGORIA,MARCA,CardCode,Disponible,U_Gramaje,DETALLE_1,LISTA_A_DETALLE,LISTA_A_SUPERMERCADO,LISTA_A_MAYORISTA,LISTA_A_2_MAYORISTA,PANALERA,SUPERMERCADOS,MAYORISTAS,HUELLAS_DORADAS,ALSER,COSTO,PRECIO_SUGERIDO,PuntosWeb,Ranking,CodCliente) {

		
			if(event.keyCode === 13) {
           			cantidad=document.getElementById(Cant_ItemCode).value;

				/*	if(Accion == "Modificar")
					{
						alert("Actualizara por dar enter");
					ActualizarArticuloCarrito(Cant_ItemCode,ItemCode,Descripcion,cantidad,Precio,Total,CardCode,Agente,ComdicionPago,Fecha,Impuesto,MontoImpuesto,Descuento,MontoDescuento,Ventana);
					alert("actualizado");
					}
					else
					{*/
					
					AgregarAlCarrito(ItemCode,Descripcion,cantidad,Precio,Total,CodCliente,Agente,ComdicionPago,Fecha,Impuesto,MontoImpuesto,Descuento,MontoDescuento,ItemCode,codbarras,ItemName,existencia,lotes,Unidad,precio,PrchseItem,SellItem,InvntItem,AvgPrice,Price,frozenFor,SalUnitMsr,VATLiable,lote,U_Grupo,SalPackUn,FAMILIA,CATEGORIA,MARCA,CardCode,Disponible,U_Gramaje,DETALLE_1,LISTA_A_DETALLE,LISTA_A_SUPERMERCADO,LISTA_A_MAYORISTA,LISTA_A_2_MAYORISTA,PANALERA,SUPERMERCADOS,MAYORISTAS,HUELLAS_DORADAS,ALSER,COSTO,PRECIO_SUGERIDO,PuntosWeb,Ranking,CodCliente);
					
					
					//}
			
					
        			} 
					
 if ((event.keyCode < 48) || (event.keyCode > 57)) 
  event.returnValue = false;
}

function ControlaDescarga(CodProveedorAutorizado,CodProveedor){

	if (CodProveedorAutorizado == CodProveedor)	
	{	
         window.location.href="DescargarEXCELL.php?Cod_Proveedor=" + CodProveedorAutorizado  
	}
	else
     alert ("No tiene permiso para descarga esta informacion" );
}



function MostrasOfertas(){
	
	
	var Datos = "submit=&OFERTA=OF";
	$('#tags1').val("of ");
	
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


//Informacion de Facturas y pedidos


	
function MostrasPagosAFactura(Factura){
	
	
	var Datos = "submit=&Factura="+Factura;
	
	$.ajax({
			url: '../Mobile/PagosAFactura.php',
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

function ObtieneFacturasPendientes(){

	var Datos = "submit=&Tipo=Pendientes";
	
	$.ajax({
			url: '../Mobile/Facturas.php',
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

function Help(Dato){

	var Datos = "submit=&Dato="+Dato;
	
	$.ajax({
			url: 'AyudaShow.php',
			type: "POST",
			data: Datos,
			beforeSend: function () { 
						$("#InfoAYUDA").empty;
						$("#InfoAYUDA").html("Procesando, espere por favor...");
		     },
			success: function(datos){
							$("#InfoAYUDA").html(datos);
			},
           error: function() {
			  $("#InfoAYUDA").empty;
			  $("#InfoAYUDA").html("ERROR ");
                     
        }});return false;
}
	
function Regresar(Dato){

	var Datos = "submit=&Dato="+Dato;
	
	$.ajax({
			url: 'AyudaShow.php',
			type: "POST",
			data: Datos,
			beforeSend: function () { 
						$("#InfoAYUDA").empty;
						$("#InfoAYUDA").html("Procesando, espere por favor...");
		     },
			success: function(datos){
							$("#InfoAYUDA").html(datos);
			},
           error: function() {
			  $("#InfoAYUDA").empty;
			  $("#InfoAYUDA").html("ERROR ");
                     
        }});return false;
	
	
	
	
	}