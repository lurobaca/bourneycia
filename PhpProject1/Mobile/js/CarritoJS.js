// JavaScript Document

function OcultaBarraPedido(USER)
{

	
		
		/*Palpitar es una variable global que optiene realmente el numero de articulos en carrito*/
		if(Palpitar==0)
	    	 	{//indica que NO tiene articulos en carrito
					
					 $("#Carrito1").stop().animate({"top" : "-80px"});
					 $("#OcultaMuestra").html("<a href='#' onClick='javascript:MostrarBarraPedido(\""+USER.trim()+"\");' ><img src='img/General/Mostrar.jpg' width='50' height='50'></a>");
				}
			 else
				{//indica que tiene articulos en carrito
				
				 $("#Carrito1").stop().animate({"top" : "-200px"});
$("#OcultaMuestra").html("<a href='#' onClick='javascript:MostrarBarraPedido(\""+USER.trim()+"\");' ><img src='img/General/Mostrar.jpg' width='50' height='50'></a>");
				}
	

}
function MostrarBarraPedido(USER)
{
	
$("#Carrito1").stop().animate({"top" : "15px"});
$("#OcultaMuestra").html("<a href='#' onClick='javascript:OcultaBarraPedido(\""+USER.trim()+"\");' ><img src='img/General/Ocultar.jpg' width='50' height='50'></a>");
}
 
 
var Palpitar = 0;
function Habilitaeditar(ItemCode,Accion)
{


		 if(Accion=="Habilitar")
		 {
			 
			//$("#Cant_"+ItemCode).attr('readonly', false);
			$("#Cant_"+ItemCode).attr({'disabled': 'disabled'});
			$("#Cant_"+ItemCode).removeAttr('disabled');
			$("#Cant_"+ItemCode).removeAttr('disabled');
			
			$("#Canti_"+ItemCode).attr({'disabled': 'disabled'});
			$("#Canti_"+ItemCode).removeAttr('disabled');
			$("#Canti_"+ItemCode).removeAttr('disabled');
			
			
			$("#ActualizaArt_"+ItemCode).css("display","none");
			$("#GardModifArt_"+ItemCode).css("display","inline");
			
			//$("#Cant_"+ItemCode).focus()
			}
		if(Accion=="DESHabilitar")
		 {
			 
		$("#Cant_"+ItemCode).attr({'disabled': 'disabled'});
		$("#Canti_"+ItemCode).attr({'disabled': 'disabled'});
		 $("#ActualizaArt_"+ItemCode).css("display","inline");
         $("#GardModifArt_"+ItemCode).css("display","none");
		    
		 }
		 
		/* 
 if ($("#"+Cant_ItemCode).attr('disabled'))
    {
        $("#"+Cant_ItemCode).removeAttr('disabled');
		$("#ActualizaArt").css("display","none");
		$("#GardModifArt").css("display","inline");
     }
 else {
         $("#"+Cant_ItemCode).attr({'disabled': 'disabled'});
		 $("#ActualizaArt").css("display","inline");
         $("#GardModifArt").css("display","none");
                }*/
	
}


	
function VerDetallePedido(CardCode,NumPedido)
{
	var Datos = "submit=&Accion=DETALLE_PEDIDOSPRONTOAFACTURAR&CardCode="+CardCode+"&NumPedido="+NumPedido;
	var NumArtiCar=0;
	$.ajax({
			url: 'Carrito_Show.php',
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
function ObtienePedidosProntosAFacturar(CardCode)
{
	var Datos = "submit=&Accion=CUENTAPEDIDOSPRONTOAFACTURAR&CardCode="+CardCode;
	var NumArtiCar=0;
	$.ajax({
			url: 'Carrito_Show.php',
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
function CuentaArticulosCarrito(CardCode)
{
	
	var Datos = "submit=&Accion=CUENTAARTICULOS&CardCode="+CardCode;
	var NumArtiCar=0;
	$.ajax({
			url: 'Carrito_Show.php',
			type: "POST",
			data: Datos,
			beforeSend: function () { 
			$("#NumArticulos").empty;
			 $("#NumArticulos").html("Contando...");
		       },
			success: function(datos){
			    $("#NumArticulos").html(datos);
				NumArtiCar = datos;
				$("#CarBtn").empty;
				 Palpitar = NumArtiCar;
				 OcultaBarraPedido(CardCode)
				// alert("Palpitar:"+Palpitar)
				if (NumArtiCar > 0)
					{
						$("#CarBtn").html("<div  align='center'><a href='Carrito.php'  style='height:20px; font-size:15px;' onClick='javascript:CambiarInicio();'>VER</a></div><div align='center'><a href='javascript:CrearPedido(\""+CardCode+"\")'  style='height:20px; font-size:15px;'>ENVIAR</a></div><div  align='center'><a href='javascript:EliminaCarrito(\""+CardCode+"\")'  style='height:20px; font-size:15px;'>ELIMINAR</a></div><div  align='center'><a href='Productos.php'  style='height:20px; font-size:15px;' onClick='javascript:CambiarInicio();'>PEDIR</a></div>");  
					}else {
						Palpitar =0;
						$("#CarBtn").html("<div  align='center' ><a   href='Productos.php' style='height:40px; font-size:15px;' onClick='javascript:CambiarInicio();'>NUEVO</a></div>"); 
						}
					
				
			},
           error: function() {
			  
			  // alert("Error al Contar Articulos , favor comunicar este error al encargado de sistemas de Bourne&Cia S.A");              
        }});
	
	return NumArtiCar;
	}
	
	
function SumaTotalPedido(CardCode)
{
	var Datos = "submit=&Accion=SUMATOTAL&CardCode="+CardCode;
	$.ajax({
			url: 'Carrito_Show.php',
			type: "POST",
			data: Datos,
			beforeSend: function () { 
			$("#MontoPedido").empty;
			 $("#MontoPedido").html("Sumando...");
			 $("#TotalGeneral_"+CardCode).html("Sumando...");
		       },
			success: function(datos){
				$("#TotalGeneral_"+CardCode).html(datos);
				$("#MontoPedido").html(datos);
				//Number(datos).toFixed(2)
				
			},
           error: function() {
			  // alert("Error al sumar el Total del pedido , favor comunicar este error al encargado de sistemas de Bourne&Cia S.A");   
        }});return false;
	return 0;
	}

                         
function AgregarAlCarrito(ItemCode,Descripcion,cantidad,Precio,Total,CardCode,Agente,ComdicionPago,Fecha,Impuesto,MontoImpuesto,Descuento,MontoDescuento,ItemCode,codbarras,ItemName,existencia,lotes,Unidad,precio,PrchseItem,SellItem,InvntItem,AvgPrice,Price,frozenFor,SalUnitMsr,VATLiable,lote,U_Grupo,SalPackUn,FAMILIA,CATEGORIA,MARCA,CardCode,Disponible,U_Gramaje,DETALLE_1,LISTA_A_DETALLE,LISTA_A_SUPERMERCADO,LISTA_A_MAYORISTA,LISTA_A_2_MAYORISTA,PANALERA,SUPERMERCADOS,MAYORISTAS,HUELLAS_DORADAS,ALSER,COSTO,PRECIO_SUGERIDO,PuntosWeb,Ranking,CodCliente){

	cantidad=document.getElementById("Cant_"+ItemCode).value;
		
	//if(cantidad=0)
      //cantidad=document.getElementById("DETCant_"+ItemCode).value;
	  
	//alert(cantidad);;
	//cantidad=prompt('Ingrese la Cantidad Deseana en UNIDADES','');
 if(Impuesto==13){
		Total=((parseInt(Precio)+((parseInt(Precio)*13)/100))*parseInt(cantidad))-parseInt(MontoDescuento);
	}
 else{
	  Total=(parseInt(Precio)*parseInt(cantidad))-parseInt(MontoDescuento);
	}

	if(cantidad==0)
		alert("No puede Agregar Cantidades en Cero");
	else{

		Habilitaeditar(ItemCode,"DESHabilitar");

		var Datos = "submit=&Accion=INSERTAR&ItemCode="+ItemCode + "&Descripcion="+Descripcion+ "&cantidad="+cantidad+ "&Precio="+Precio+ "&Total="+Total+ "&CardCode="+CardCode+ "&Agente="+Agente+ "&ComdicionPago="+ComdicionPago+ "&Fecha="+Fecha+ "&Impuesto="+Impuesto+ "&MontoImpuesto="+MontoImpuesto+ "&Descuento="+Descuento+ "&MontoDescuento="+MontoDescuento+ "&ItemCode="+ItemCode+ "&codbarras="+codbarras+ "&ItemName="+ItemName+ "&existencia="+existencia+ "&lotes="+lotes+ "&Unidad="+Unidad+ "&precio="+precio+ "&PrchseItem="+PrchseItem+ "&SellItem="+SellItem+ "&InvntItem="+InvntItem+ "&AvgPrice="+AvgPrice+ "&Price="+Price+ "&frozenFor="+frozenFor+ "&SalUnitMsr="+SalUnitMsr+ "&VATLiable="+VATLiable	+ "&lote="+lote+ "&U_Grupo="+U_Grupo+ "&SalPackUn="+SalPackUn+ "&FAMILIA="+FAMILIA+ "&CATEGORIA="+CATEGORIA+ "&MARCA="+MARCA+ "&Disponible="+Disponible	+ "&U_Gramaje="+U_Gramaje+ "&DETALLE_1="+DETALLE_1+ "&LISTA_A_DETALLE="+LISTA_A_DETALLE+ "&LISTA_A_SUPERMERCADO="+LISTA_A_SUPERMERCADO+ "&LISTA_A_MAYORISTA="+LISTA_A_MAYORISTA+ "&LISTA_A_2_MAYORISTA="+LISTA_A_2_MAYORISTA+ "&PANALERA="+PANALERA+ "&SUPERMERCADOS="+SUPERMERCADOS+ "&MAYORISTAS="+MAYORISTAS+ "&HUELLAS_DORADAS="+HUELLAS_DORADAS+ "&ALSER="+ALSER+ "&COSTO="+COSTO	+ "&PRECIO_SUGERIDO="+PRECIO_SUGERIDO+ "&PuntosWeb="+PuntosWeb+ "&Ranking="+Ranking+ "&CodCliente="+CodCliente;	

	$.ajax({
			url: 'Carrito_Show.php',
			type: "POST",
			data: Datos,
			beforeSend: function () { 
			$("#CarImg").empty;
			 $("#CarImg").html("<img align='center' src='Paginacion/img/iconoEspera.gif' width='50' height='50' />").fadeIn('slow');
		       },
			success: function(datos){
				
											
						//luego de agregar habilita las opciones para eliminar y actualizar
						
							
				$("#btnAdd_"+ItemCode).html( "<div class='Agregado'><input name='Cant' id='Cant_"+ItemCode+"' style='margin-top:-30px;' type='text' class='Cant' placeholder='Cantidad AQUI' onkeypress='ValidaSoloNumeros(\"Cant_"+ItemCode+"\",\""+ItemCode+"\",\""+Descripcion+"\",\""+cantidad+"\",\""+Precio+"\",\""+Total+"\",\""+CardCode+"\",\"20\",\""+ComdicionPago+"\",\""+Fecha+"\",\""+Impuesto+"\",\""+MontoImpuesto+"\",\""+Descuento+"\",\""+MontoDescuento+"\");'value='"+cantidad+"'/><div id='AccionesAgregado'><a id='GardModifArt_"+ItemCode+"' style='float:left; display:none' href='javascript:ActualizarArticuloCarrito(\"Cant_"+ItemCode+"\",\""+ItemCode+"\",\""+Descripcion+"\",\""+cantidad+"\",\""+Precio+"\",\""+Total+"\",\""+CardCode+"\",\""+Agente+"\",\""+ComdicionPago+"\",\""+Fecha+"\",\""+Impuesto+"\",\""+MontoImpuesto+"\",\""+Descuento+"\",\""+MontoDescuento+"\",\"Articulos\");'><img style='float:left;' src='img/General/Guardar.jpg' width='22' height='24' alt='Guardar' /></a><a id='ActualizaArt_"+ItemCode+"' style='float:left; ' href='javascript:Habilitaeditar(\""+ItemCode+"\",\"Habilitar\");'><img style='float:left;' src='img/General/Editar.png' width='22' height='24' alt='Modificar' /></a><a id='EliminaArt' style='float:left;' href='javascript:EliminaArticuloCarrito(\"Cant_"+ItemCode+"\",\""+ItemCode+"\",\""+Descripcion+"\",\""+cantidad+"\",\""+Precio+"\",\""+Total+"\",\""+CardCode+"\",\"20\",\""+ComdicionPago+"\",\""+Fecha+"\",\""+Impuesto+"\",\""+MontoImpuesto+"\",\""+Descuento+"\",\""+MontoDescuento+"\",\"Articulos\",\""+codbarras+"\",\""+ItemName+"\",\""+existencia+"\",\""+lotes+"\",\""+Unidad+"\",\""+precio+"\",\""+PrchseItem+"\",\""+SellItem+"\",\""+InvntItem+"\",\""+AvgPrice+"\",\""+Price+"\",\""+frozenFor+"\",\""+SalUnitMsr+"\",\""+VATLiable+"\",\""+lote+"\",\""+U_Grupo+"\",\""+SalPackUn+"\",\""+FAMILIA+"\",\""+CATEGORIA+"\",\""+MARCA+"\",\""+Disponible+"\",\""+U_Gramaje+"\",\""+DETALLE_1+"\",\""+LISTA_A_DETALLE+"\",\""+LISTA_A_SUPERMERCADO+"\",\""+LISTA_A_MAYORISTA+"\",\""+LISTA_A_2_MAYORISTA+"\",\""+PANALERA+"\",\""+SUPERMERCADOS+"\",\""+MAYORISTAS+"\",\""+HUELLAS_DORADAS+"\",\""+ALSER+"\",\""+COSTO+"\",\""+PRECIO_SUGERIDO+"\",\""+PuntosWeb+"\",\""+Ranking+"\",\""+CodCliente+"\");'><img style='float:left;' src='img/General/Borrar.png' width='22' height='24' alt='Eliminar'/></a></div></div>");
				

				CuentaArticulosCarrito(CardCode);
				SumaTotalPedido(CardCode);
				
				$("#CarImg").html("<img src='img/General/Carrito.png' width='80' height='80'>").fadeIn('slow');
						//$("#fila-"+ItemCode).html(datos);	
				Habilitaeditar(ItemCode,"DESHabilitar");		
			},
           error: function() {
			   alert("Error al Agregar Articulo , favor comunicar este error al encargado de sistemas de Bourne&Cia S.A");   
        }});return false;
	}
	}
	
function MostrarCarrito(CardCode){
		
	var Datos = "submit=&CardCode="+CardCode + "&Accion=MOSTRAR";
	$.ajax({
			url: 'Carrito_Show.php',
			type: "POST",
			data: Datos,
			beforeSend: function () { 
			$("#Carrito").empty;
			 $("#Carrito").html("Procesando, espere por favor...");
             },
			success: function(datos){
			       $("#Carrito").html(datos);
				   
			},
           error: function() {
			   alert("Error al Mostrar El carrito , favor comunicar este error al encargado de sistemas de Bourne&Cia S.A");
		  }});return false;
	}
	
	
function EliminaCarrito(CardCode){
		if (confirm("Seguro que deseas Eliminar Todos los datos de Carrito "+CardCode+"?")) {
		
	var Datos = "submit=&Accion=ELIMINARTODO&CardCode="+CardCode;
	
	$.ajax({
			url: 'Carrito_Show.php',
			type: "POST",
			data: Datos,
			beforeSend: function () { 
			$("#RespuestaAddCard").empty;
			 $("#RespuestaAddCard").html("Procesando, espere por favor...");
             },
			success: function(datos){
				
				ObtieneDatosDePagia(0,25,CardCode,"","");
					$("#CarBtn").html(" ");
			        //$("#"+Codarticulo).remove();
					//esto remueve una sola fila seria bueno hacer esteo en actualizar
					/* 
					    $("#"+Codarticulo).slideUp("fast",function() {
        												$("#"+Codarticulo).remove();
    					}); */
		CuentaArticulosCarrito(CardCode);
				SumaTotalPedido(CardCode);
					   MostrarCarrito(CardCode);
					   
				  // MostrarCarrito(CardCode)
			},
           error: function() {
			   alert("Error al eliminar Carrito , favor comunicar este error al encargado de sistemas de Bourne&Cia S.A");
		  }});return false;	
		}
		else {
		//alert("HAS SELECCIONADO NO")
		}
	
	}
	
	//elimina articulos del carrtio o desde la ventana de productos
function  EliminaArticuloCarrito(Cant_ItemCode,ItemCode,Descripcion,cantidad,Precio,Total,CardCode,Agente,ComdicionPago,Fecha,Impuesto,MontoImpuesto,Descuento,MontoDescuento,Ventana,codbarras,ItemName,existencia,lotes,Unidad,precio,PrchseItem,SellItem,InvntItem,AvgPrice,Price,frozenFor,SalUnitMsr,VATLiable,lote,U_Grupo,SalPackUn,FAMILIA,CATEGORIA,MARCA,Disponible,U_Gramaje,DETALLE_1,LISTA_A_DETALLE,LISTA_A_SUPERMERCADO,LISTA_A_MAYORISTA,LISTA_A_2_MAYORISTA,PANALERA,SUPERMERCADOS,MAYORISTAS,HUELLAS_DORADAS,ALSER,COSTO,PRECIO_SUGERIDO,PuntosWeb,Ranking,CodCliente){
	
	
	if (confirm("Seguro que deseas Eliminar el articulo "+ItemCode +"?")) {
		var Datos = "submit=&Accion=ELIMINAR&CardCode="+CardCode + "&Codarticulo="+ItemCode;
	$.ajax({
			url: 'Carrito_Show.php',
			type: "POST",
			data: Datos,
			beforeSend: function () { 
			//$("#RespuestaAddCard").empty;
			 //$("#RespuestaAddCard").html("Procesando, espere por favor...");
             },
			success: function(datos){
					
			try{
			 //$("#"+Codarticulo).remove();
			 	if(Ventana=="Carrito") 
					{						//esto remueve una sola fila seria bueno hacer esteo en actualizar
						$("#"+ItemCode).slideUp("slow",function() {
        				      $("#"+ItemCode).remove();
    					}); 
					}
					else
		       			{
			      		 //pone el boton de agregar nuevamente ya que se elimino el articulo del pedido
						$("#btnAdd_"+ItemCode).empty;
						$("#btnAdd_"+ItemCode).html("<input name='Cant' id='Cant_"+ItemCode+"' type='text' class='Cant' placeholder='Cantidad AQUI ' onkeypress='ValidaSoloNumeros(\"Cant_"+ ItemCode +"\",\""+ ItemCode +"\",\"" + ItemName +"\",\"1\",\"" +Precio  +"\",\"" +Total+"\",\""+CardCode+"\",\"25\",\""+  ComdicionPago +"\",\""+ Fecha +"\",\""+Impuesto+"\",\""+MontoImpuesto+"\",\""+Descuento+"\",\""+MontoDescuento+"\",\""+ItemCode+"\",\""+codbarras+"\",\""+ItemName+"\",\""+existencia+"\",\""+lotes+"\",\""+Unidad+"\",\""+precio+"\",\""+PrchseItem+"\",\""+SellItem+"\",\""+InvntItem+"\",\""+AvgPrice+"\",\""+Price+"\",\""+frozenFor+"\",\""+SalUnitMsr+"\",\""+VATLiable+"\",\""+lote+"\",\""+U_Grupo+"\",\""+SalPackUn+"\",\""+FAMILIA+"\",\""+CATEGORIA+"\",\""+MARCA+"\",\""+CardCode+"\",\""+Disponible+"\",\""+U_Gramaje+"\",\""+DETALLE_1+"\",\""+LISTA_A_DETALLE+"\",\""+LISTA_A_SUPERMERCADO+"\",\""+LISTA_A_MAYORISTA+"\",\""+ LISTA_A_2_MAYORISTA+"\",\""+PANALERA+"\",\""+SUPERMERCADOS+"\",\""+MAYORISTAS+"\",\""+HUELLAS_DORADAS+"\",\""+ALSER+"\",\""+COSTO+"\",\""+PRECIO_SUGERIDO+"\",\""+PuntosWeb+"\",\""+Ranking+"\",\""+CodCliente+"\");' value=''/><a href='javascript:AgregarAlCarrito(\""+ ItemCode +"\",\"" + Descripcion +"\",\"1\",\"" +Precio  +"\",\""+Precio+"\",\""+CardCode+"\",\"20\",\""+  ComdicionPago +"\",\""+ Fecha +"\",\""+Impuesto+"\",\""+MontoImpuesto+"\",\""+Descuento+"\",\""+MontoDescuento+"\",\""+ItemCode+"\",\""+codbarras+"\",\""+ItemName+"\",\""+existencia+"\",\""+lotes+"\",\""+Unidad+"\",\""+precio+"\",\""+PrchseItem+"\",\""+SellItem+"\",\""+InvntItem+"\",\""+AvgPrice+"\",\""+Price+"\",\""+frozenFor+"\",\""+SalUnitMsr+"\",\""+VATLiable+"\",\""+lote+"\",\""+U_Grupo+"\",\""+SalPackUn+"\",\""+FAMILIA+"\",\""+CATEGORIA+"\",\""+MARCA+"\",\""+CardCode+"\",\""+Disponible+"\",\""+U_Gramaje+"\",\""+DETALLE_1+"\",\""+LISTA_A_DETALLE+"\",\""+LISTA_A_SUPERMERCADO+"\",\""+LISTA_A_MAYORISTA+"\",\""+LISTA_A_2_MAYORISTA+"\",\""+PANALERA+"\",\""+SUPERMERCADOS+"\",\""+MAYORISTAS+"\",\""+HUELLAS_DORADAS+"\",\""+ALSER+"\",\""+COSTO+"\",\""+PRECIO_SUGERIDO+"\",\""+PuntosWeb+"\",\""+Ranking+"\",\""+CodCliente+");'><div id='Add' > Agregar</div></a>");
				

			   }
					//calculo articulo y monto total
					  CuentaArticulosCarrito(CardCode);
				     SumaTotalPedido(CardCode); 
				  		  }
	     catch (e){ alert("ERROR R " + e) } 
				  
			},
           error: function() {
			   alert("Error al Eliminar El articulo del curriculo , favor comunicar este error al encargado de sistemas de Bourne&Cia S.A");
		  }});return false;
		  
	}
	}
	
	
	
function ObtieneCantidad(IdInput)
{
	 
	  return  document.getElementById(IdInput).value;
	  
	  document.getElementsByTagName('input').disabled
	}


function ObtieneRutero(Usuario)
{

var Datos = "submit=&CardCode="+Usuario + "&Accion=RUTERO";
	$.ajax({
			url: 'Carrito_Show.php',
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
			   alert("Error al Mostrar El carrito , favor comunicar este error al encargado de sistemas de Bourne&Cia S.A");
		  }});return false;

}
	
function ActualizarArticuloCarrito(Cant_ItemCode,ItemCode,Descripcion,cantidad,Precio,Total,CardCode,Agente,ComdicionPago,Fecha,Impuesto,MontoImpuesto,Descuento,MontoDescuento,Ventana){
	
	try{
		
	
	
	if(Ventana=="Articulos")
	Cantidad=document.getElementById("Cant_"+ItemCode).value;
			//Cantidad=prompt('Ingrese la Cantidad Deseana en UNIDADES','');
		if(Ventana=="Carrito")
			Cantidad=document.getElementById("Canti_"+ItemCode).value;



	if (Cantidad==0 || Cantidad==null)
		  alert("No puede ingresar cantidad en Cero");
		else
		  {
			 var PrecioIVI = parseInt(Precio)+parseInt(MontoImpuesto)-parseInt(MontoDescuento);
			Total=Cantidad*PrecioIVI;
			
			var Datos = "submit=&Accion=ACTUALIZACARRITO" + "&CardCode="+CardCode + "&Cantidad="+Cantidad + "&Codarticulo="+ItemCode + "&Total="+Total;
			
			
			
			$.ajax({
			url: 'Carrito_Show.php',
			type: "POST",
			data: Datos,
			beforeSend: function () { 
			//$("#RespuestaAddCard").empty;
			 //$("#RespuestaAddCard").html("Procesando, espere por favor...");
			  $("#TotaLinea_"+ItemCode).empty;
			  $("#TotaLinea_"+ItemCode).html("Calculando....");
			  $("#Canti_"+ItemCode).empty;
		      $("#Canti_"+ItemCode).html("Calculando....");
					
             },
			success: function(datos){
			
				 $("#ActualizaArt_"+ItemCode).css("display","inline");
		 $("#GardModifArt_"+ItemCode).css("display","none");
		 
			if(Ventana=="Carrito")
					{
					//document.getElementById(IdInput).value = Cantidad
				    $("#TotaLinea_"+ItemCode).html(Number(Total).toFixed(2));
						
						
					}
			else{
						/* $("#btnAdd_"+Codarticulo).html( "<div class='Agregado'><div style='float:left;' > "+Cantidad+" UNID</div><div id='AccionesAgregado'><a style='float:left;' href='javascript:ActualizarArticuloCarrito(\""+CardCode+"\",\""+Cantidad+"\",\""+ Codarticulo +"\",\""+ Precio +"\",\""+ Precio +"\",\""+ Codarticulo +"\",\"Articulos\");'><img style='margin-top:-1px; float:left;' src='img/General/Editar.png'width='22' height='24' /></a><a style='float:left;' href='javascript:EliminaArticuloCarrito(\""+ Codarticulo +"\",\""+CardCode+"\");'><img style='float:left;' src='img/General/Borrar.png' width='22' height='24' /></a></div></div>");*/
		
						
					
						
			$("#btnAdd_"+ItemCode).html("<div class='Agregado'><input name='Cant' id='Cant_"+ItemCode+"' type='text' class='Cant' placeholder='Cantidad AQUI' style='margin-top:-30px;' onkeypress='ValidaSoloNumeros(\"Cant_"+ItemCode+"\",\""+ItemCode+"\",\""+Descripcion+"\",\""+Cantidad+"\",\""+Precio+"\",\""+Total+"\",\""+CardCode+"\",\"20\",\""+ComdicionPago+"\",\""+Fecha+"\",\""+Impuesto+"\",\""+MontoImpuesto+"\",\""+Descuento+"\",\""+MontoDescuento+"\");'value='"+Cantidad+"'/><div id='AccionesAgregado'><a id='GardModifArt_"+ItemCode+"' style='float:left; display:none' href='javascript:ActualizarArticuloCarrito(\""+Cant_ItemCode+"\",\""+ItemCode+"\",\""+Descripcion+"\",\""+cantidad+"\",\""+Precio+"\",\""+Total+"\",\""+CardCode+"\",\""+Agente+"\",\""+ComdicionPago+"\",\""+Fecha+"\",\""+Impuesto+"\",\""+MontoImpuesto+"\",\""+Descuento+"\",\""+MontoDescuento+"\",\"Articulos\");'><img style='float:left;' src='img/General/Guardar.jpg' width='22' height='24' alt='Guardar'/></a><a id='ActualizaArt_"+ItemCode+"' style='float:left; ' href='javascript:Habilitaeditar(\""+ItemCode+"\",\"Habilitar\");'><img style='float:left;' src='img/General/Editar.png' width='22' height='24' alt='Modificar' /></a><a id='EliminaArt' style='float:left;'href='javascript:EliminaArticuloCarrito(\"Cant_"+ItemCode+"\",\""+ItemCode+"\",\""+Descripcion+"\",\""+Cantidad+"\",\""+Precio+"\",\""+Total+"\",\""+CardCode+"\",\"20\",\""+ComdicionPago+"\",\""+Fecha+"\",\""+Impuesto+"\",\""+MontoImpuesto+"\",\""+MontoImpuesto+"\",\""+Descuento+"\",\""+MontoDescuento+"\",\"Articulos\");'><img style='float:left;' src='img/General/Borrar.png' width='22' height='24' alt='Eliminar' /></a></div></div>");
						}
						
				
						CuentaArticulosCarrito(CardCode);
				SumaTotalPedido(CardCode);
				
						$("#TotaLinea_"+ItemCode).empty;
					$("#TotaLinea_"+ItemCode).html(datos);
					$("#Canti_"+ItemCode).empty;
					$("#Canti_"+ItemCode).html(Cantidad);
							
							
				
					
					Habilitaeditar(ItemCode,"DESHabilitar");
					
			},
           error: function() {
			   alert("Error al Actualizar articulo del Carrito , favor comunicar este error al encargado de sistemas de Bourne&Cia S.A");
		         }});return false;
		  }
		  	
		  }
		  
	catch (e){ alert("ERROR R " + e);}
	}



/*EL cliente a aceptado crear el pedido y enviarlo a BOURNE Y COMPAÑIA */
function CrearPedido(CardCode)
{
	 if (confirm("Seguro que deseas mandar el Pedido a Bourne y Cia S.A?? Se le Recuerda que por enviar el pedido este iniciara el proceso hasta llegar a su negocio")) {
		
		
		/*Se procede a enviar los datos del carrito a la tabla de pedidos solicitados 
		Luego se le agregara las lineas al archivo In_pedido.mbg para que sea jalado por el sistema
		luego se borrara los datos del carrito 
		luego se le indicara al cliente que puede ver su pedido solicitado en la seccion de informacion y dar seguimiento a este*/
			try{
	
			var Datos = "submit=&Accion=ENVIAR&CardCode="+CardCode;
	
	
	$.ajax({
			url: 'Carrito_Show.php',
			type: "POST",
			data: Datos,
			beforeSend: function () { 
			$("#CarImg").empty;
			 $("#CarImg").html("<img align='center' src='Paginacion/img/iconoEspera.gif' width='50' height='50' />").fadeIn('slow');
		       },
			success: function(datos){
				alert(datos)
				ObtieneDatosDePagia(0,50,CardCode,"","");	
					$("#CarBtn").html(" ");
					
					location.href="../MiCuenta.php?Tap=3";
				CuentaArticulosCarrito(CardCode);
				SumaTotalPedido(CardCode);
				$("#CarImg").html("<img src='../img/General/Carrito.png' width='80' height='80'>").fadeIn('slow');
						//$("#fila-"+ItemCode).html(datos);
			},
           error: function() {
			   alert("Error al Enviar Pedido , favor comunicar este error al encargado de sistemas de Bourne&Cia S.A");   
        }});return false;
		  
		  }
	catch (e){ alert("ERROR R " + e);}
	}
		else {
		//alert("HAS SELECCIONADO NO")
		}
	  return  document.getElementById(IdInput).value;
	}