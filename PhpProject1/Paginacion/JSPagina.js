// JavaScript Document
var Anterios_rutero ="";
var PagActivoIni =0;
var Pag =0;
var PrimerReg =0;
var UltimoReg =0;
var PagBackup =1;
var backMaxPaginasAMostrar;
var elemento
var LimitINICIO =0;
var Busqueda ="";
var BusquedaAnterior ="";
//indica donde inicia el bloque de 10 paginas
var IniBloque=-10;
//muestra el fin del bloque de 10 paginas
var FinBloque=0;

/*Muestra imagen de espera*/
function loading_show(ID) { 


$('#'+ID).html("<img align='center' src='Paginacion/img/iconoEspera.gif' width='50' height='50' />").fadeIn('slow');
//$('#DatosDePagina').html("<img align='center' src='Paginacion/img/iconoEspera.gif' width='50' height='50' />").fadeIn('slow'); 
} 
/*Oculta imagen de espera*/
function loading_hide(ID) { 
$('#'+ID).fadeOut(); 
//$('#loading').fadeOut(); 
}

/*Obtiene el ID del numero de pagina clikeado el cual lo enviamos para que sirva de LIMIT loadData(page) */

function PasarPagina( clicked_id ,FilasAMostrarXPagina,MaxPaginasAMostrar,usuario){   
	
	loading_show('DatosDePagina');
    Pag = parseInt(clicked_id); 
	cont = 0;
	LimitINICIO = 0;
	
	//Cambia los limites segun el ide de la pagina
	if (Pag>=0){
		//while(cont <= Pag){
			try
			{
				LimitINICIO = Pag*FilasAMostrarXPagina;
			}catch (e){//alert("Error " + e)
			LimitINICIO = 0;
			} 
			
			// alert("while cont : "+cont+" Pag: "+ Pag+" LimitINICIO : " + LimitINICIO );
			//cont+=1;
			//}
		}
		
		if (Pag > PagActivoIni)
		{
			
		//limpia Primer cuadro de los 10 al pasar al segundo cuadro
	    $("#"+PagActivoIni).removeClass("NumPaginaACTIVO");
	    $("#"+PagActivoIni).addClass("NumPagina");
	  
		}
		
		//if (Pag==0)
   //  $("#Anterior").css("display","none");
	  if (Pag > 0)
	      $("#Anterior").css("display","inline");
	 
	 
// alert("Pag: "+ Pag+" LimitINICIO : " + LimitINICIO );
	 //llama a la funcion que devuelve los datos de la pagina
	 
	 ObtieneDatosDePagia(LimitINICIO,25,usuario,Busqueda,"NOMostrarRutero");
	//ObtieneDatosDePagia(LimitINICIO,25,usuario,Busqueda,"");
	

	//elemento = document.getElementById(clicked_id);
		elemento = document.getElementById(Pag);
	
			 
		 /*el elemento es null cuando se pasa de 9 a 10 ya que el elemento 10 se crea hasta despues de salir de la funcion Siguiente()*/ 
		
	if (elemento != null){
		PagBackup.className = "NumPagina";
	    PagBackup = elemento;
		}
	
	//activa y desactiva los cuadros
	if (elemento.className == "NumPaginaACTIVO") {
		elemento.className = "NumPagina";
		}
	else {
		 elemento.className = "NumPaginaACTIVO";
	     }

     //Si el numero de la pagina es mayor al bloque de paginas mostradas
	if (Pag > PagActivoIni){
		
		$("#Anterior").className = "NumPagina";
		//limpia Primer cuadro de los 10 al pasar al segundo cuadro
	    $("#"+PagActivoIni).removeClass("NumPaginaACTIVO");
	    $("#"+PagActivoIni).addClass("NumPagina");
		}
	
	
 	//ObtieneDatosDePagia(LimiteINICIO,LimiteFIN); 
	
	  //  loading_hide('DatosDePagina');
	
}


//----------------------------------------------------------------------------
//------------------------ Siguiente --------------------------------------
//--------------------------------------------------------------------------


function Siguiente( clicked_id ,FilasAMostrarXPagina,MaxPaginasAMostrar,usuario){   

try{
	$("#Anterior").css("display","inline");
	

			loading_show('DatosDePagina');

	/*if(rutero=="MostrarRutero")
					
					else
					loading_show('tab-2');*/
	Ocultar = MaxPaginasAMostrar-10;
	cont = 0;
	LimitINICIO = 0;
	//Cambia los limites segun el id de la pagina
	if (Pag>=0){
		while(cont <= Pag){
			//suma o brinca los registros de las paginas ya mostradas
			LimitINICIO = LimitINICIO+FilasAMostrarXPagina
			cont+=1;
		   }
		}

  ObtieneDatosDePagia(LimitINICIO,25,usuario,Busqueda,"NOMostrarRutero");
	 //llama a la funcion que devuelve los datos de la pagina
	// ObtieneDatosDePagia(LimitINICIO,25,usuario,Busqueda,"");
	
	 //incrementa el idice de la pagina
	if(Pag <= MaxPaginasAMostrar)
	   Pag+=1;

     //controla el llamado de las 10 sgts paginas
	if (Pag >= MaxPaginasAMostrar)	{
		//permite marcar el primer cuadro cada ves que se optienen las paginas
		 PagActivoIni=PagActivoIni+10;
			     
       /*Ira a buscar los guientes 10 link de paginas*/
		ObtienePaginas(Pag,Pag,MaxPaginasAMostrar + 10,usuario,Busqueda,"Siguiente");
	}
	
	/*Si dio click a el boton siguiente le asigna la clase activa segun la variable Pag*/
	if (clicked_id = "Siguiente"){
	  	elemento = document.getElementById(Pag);
	}
			 
		 /*el elemento es null cuando se pasa de 9 a 10 ya que el elemento 10 se crea hasta despues de salir de la funcion Siguiente()*/ 
		
	if (elemento != null){
		PagBackup.className = "NumPagina";
	    PagBackup = elemento;
		}
	
	//activa y desactiva los cuadros
	if (elemento.className == "NumPaginaACTIVO") {
		elemento.className = "NumPagina";
		}
	else {
		 elemento.className = "NumPaginaACTIVO";
	     }

     //Si el numero de la pagina es mayor al bloque de paginas mostradas
	if (Pag > PagActivoIni){
		
		$("#Anterior").className = "NumPagina";
		//limpia Primer cuadro de los 10 al pasar al segundo cuadro
	    $("#"+PagActivoIni).removeClass("NumPaginaACTIVO");
	    $("#"+PagActivoIni).addClass("NumPagina");
		}
		
		//Muestra el boton anterior ya que se avanzo 1 campo
	
					//loading_hide('DatosDePagina');
					
	

	}
catch (e){//alert("Error " + e)
			} 
}

//----------------------------------------------------------------------------
//------------------------ ANTERIOR --------------------------------------
//--------------------------------------------------------------------------


function Anterior( clicked_id ,FilasAMostrarXPagina,MaxPaginasAMostrar,usuario){   
  
  try{
	  $("#Siguiente").css("display","inline");
	  
	 
					loading_show('DatosDePagina');
					
  /*if(rutero=="MostrarRutero")
					
					else
					loading_show('tab-2');*/
       	
	 //Cambia los limites segun el ide de la pagina
	 if (Pag>=0)
			LimitINICIO = LimitINICIO-FilasAMostrarXPagina
		
	 //llama a la funcion que devuelve los datos de la pagina
	 ObtieneDatosDePagia(LimitINICIO,25,usuario,Busqueda,"NOMostrarRutero");
	// ObtieneDatosDePagia(LimitINICIO,25,usuario,Busqueda,"");
	 
     //retrocede el idice de la pagina
	 if(Pag > 0) 
	    Pag-=1; 
	
	 
	 
	 if (Pag <= MaxPaginasAMostrar-11){
		//permite marcar el ultimo cuadro cada ves que se optienen las paginas
		  PagActivoIni=PagActivoIni-1;
		  LiminIni = Pag-Pag
		  
		 
		    
		  /*Ira a buscar los guientes 10 link de paginas*/
		  ObtienePaginas(Pag,LiminIni,MaxPaginasAMostrar - 10,usuario,Busqueda,"Anterior");
		}
  			
		/*Si dio click a el boton siguiente le asigna la calse activa segun la variable Pag*/
		
	if (clicked_id = "Anterior"){
    	elemento = document.getElementById(Pag);
		
		}
	 
	
	/*el elemento es null cuando se pasa de 9 a 10 ya que el elemento 10 se crea hasta despues de salir de la funcion Anterior()*/  
		 
	if (elemento != null){   
		PagBackup.className = "NumPagina";
		PagBackup = elemento;
		}
		
	if (elemento.className == "NumPaginaACTIVO") {
	    elemento.className = "NumPagina";
		}
	else {
	    elemento.className = "NumPaginaACTIVO";
	   }
	  
	
	//if (Pag==0)
      // 	$("#Anterior").css("display","none");
						
		 //Si el numero de la pagina es mayor al bloque de paginas mostradas
	if (Pag == PagActivoIni){
		
		$("#Anterior").className = "NumPagina";
		
		//limpia Primer cuadro de los 10 al pasar al segundo cuadro
	    $("#"+LiminIni).removeClass("NumPaginaACTIVO");
	    $("#"+LiminIni).addClass("NumPagina");
		}						
	
					//loading_hide('DatosDePagina');
					
 // loadData(Pag,FilasAMostrarXPagina);
/*if(rutero=="MostrarRutero")
					
					else
					loading_show('tab-2');*/
  }
  catch (e){//alert("Error " + e)
			} 
}

/*Carga la informacion los numeros de las paginas ANTERIOR 1 2 3 4 SIGUIENTE */  
  function ObtienePaginas(IdPag,ContInicio, MaxPaginasAMostrar,usuario,DESCRIPCION,Boton) { 
	try{
		  	
	var Datos = "submit=&page="+IdPag+"&MaxPaginasAMostrar="+MaxPaginasAMostrar+"&usuario="+usuario+"&DESCRIPCION="+DESCRIPCION+"&Boton="+Boton;
	  
	$.ajax({
			url: 'Paginacion/ObtienePaginas.php',
			type: "POST",
			data: Datos,
			beforeSend: function () { 
				$("#NavPaginas").empty;
				$("#container").empty;
				//$("#container").html("Procesando, espere por favor...");
		     },
			success: function(datos){
						$("#container").empty;
						$("#NavPaginas").html(datos);
						
	  					/*if (IdPag==0)
       						$("#Anterior").css("display","none");
						else
						    $("#Anterior").css("display","inline");*/
							
					//marca como activo el primer cuadro luego de cambia de bloque de paginas , si el id de la pagina es el primero del bloque lo marca   si no lo desmarca    
					 
											 
					    elemento = document.getElementById(IdPag);
						if (elemento != null){   
							PagBackup.className = "NumPagina";
							PagBackup = elemento;
							}
							
						if (elemento.className == "NumPaginaACTIVO") {
						elemento.className = "NumPagina";
						
						}
						else {
						elemento.className = "NumPaginaACTIVO";
						}
	
						if(IdPag==PagActivoIni)
						  {   
						   $("#"+LiminIni).removeClass("NumPaginaACTIVO");
	    				   $("#"+LiminIni).addClass("NumPagina");							
							//	$("#"+IdPag).removeClass("NumPagina"); 
							//$("#"+IdPag).addClass("NumPaginaACTIVO"); 
							 }
					        	
									
			},
           error: function() {
			  $("#NavPaginas").empty; 
			   $("#container").empty;
			  $("#NavPaginas").html("ERROR al obtener las paginas");
                     
        }});return false;
		
		
		  }
	catch(e){ //alert("ERROR" +e);
	}
  }
/*Carga la informacion de la pagina segun los limites de la paginacion */
function IdentificaFacturasVencidas(usuario) { 
var FacVencida = "NO";

	if (usuario!="0"){
					
		var Datos = "submit=&usuario="+usuario;

		$.ajax({
					url: 'Paginacion/IdentificaFacturasVencidas.php',
					type: "POST",
					data: Datos,
					beforeSend: function () { 
						$("#DatosDePagina").empty;
						$("#DatosDePagina").html("espere por favor...");
					
						},
					success: function(datos){
						
						FacVencida=datos;
				
						},
				   error: function() {
					 
					  $("#DatosDePagina").empty;
					  $("#DatosDePagina").html("ERROR al obtener los datos ");
							 
						}
						});

	  }
	return FacVencida;
}

function LIMPIAR(LimiteINICIO,LimiteFIN,usuario,Descripcion,rutero) {
		 $("#Familias").val(0);
		 $("#Marcas").val(0);
		 $("#Categoria").val(0);
		 
		$('#tags1').val("");
		$('#tags1').empty();
	
	ObtieneDatosDePagia(LimiteINICIO,LimiteFIN,usuario,Descripcion,rutero);
}
/*Carga la informacion de la pagina segun los limites de la paginacion */
function ObtieneDatosDePagia(LimiteINICIO,LimiteFIN,usuario,Descripcion,rutero) { 

var DESCRIPCION = "";
	try
	  { 
	  if(rutero=="Select")
	     {
			 rutero="NoMostrarRutero"
			 $('#tab-1').hide(); 
			 $('#tabs ul li:nth-of-type(2)').removeClass('active');
			 $("#tabs ul li:nth-of-type(1)").addClass('active');
   			 $("#tabs Div:nth-of-type(1)").show();
			
			 
		 // $("#tabs Div:nth-of-type(2)").hide();
		 }
	
	Anterios_rutero=rutero;
	//si la descripcion es difetente de vacio
	  if (Descripcion != ""){
		  
		   DESCRIPCION = Descripcion;
		  $("#EliminarBusqueda").css("display","inline");	
		  $("#tags1").css("weight","500px");
		  }
	  else
		 {  
		 
		
		 DESCRIPCION = $('#tags1').val();
		 //alert("else DESCRIPCION :"+DESCRIPCION);
		 $("#EliminarBusqueda").css("display","none");	
		  $("#tags1").css("weight","600px");
		 }
					
	
	  DESCRIPCION.trim();
	  Busqueda = DESCRIPCION;
		 
	  if(BusquedaAnterior != Busqueda)
	     Pag=0;
 	 //si no estan buscando ninguna descriocion , manda a buscar todos los articulos
					if (DESCRIPCION == ""  || DESCRIPCION == " " ){
						
						$('#tags1').val("");
							$('#tags1').empty()
							
						if(BusquedaAnterior == DESCRIPCION)
							   Pag == 0
							   
							if(LimiteINICIO == 0)
							ObtienePaginas(0,0,10,usuario," ","Siguiente");	
						}//si estan buscando una descripcion manda a buscar datos segun la descripcion
					else{
							 
							Busqueda= DESCRIPCION;
							if(BusquedaAnterior == DESCRIPCION)
							   Pag == 0
						if(LimiteINICIO == 0)
						   ObtienePaginas(0,0,10,usuario,DESCRIPCION,"Siguiente")
						}
					//respalda busqueda para comparar en la siguiente busqueda y saber cuando se debe de reiniciar el LimiteINICIO
					BusquedaAnterior =DESCRIPCION;
						
					
					var Datos = "submit=&LimiteINICIO="+LimiteINICIO+"&LimiteFIN="+LimiteFIN+"&usuario="+usuario+"&DESCRIPCION="+DESCRIPCION+"&Rutero="+rutero;
				
					$.ajax({
							url: 'Paginacion/ObtieneDatosDePagia.php',
							type: "POST",
							data: Datos,
							beforeSend: function () { 
							
//Controla si muestra todo o solo los articulos en RUTERO
							$("#DatosDePagina").html("");
							$("#tab-2").html("");
									$("tab-2").empty;
							      $("#DatosDePagina").empty;
							
							
							 if(rutero=="MostrarRutero")
								{
								$('#tab-2').show();
								loading_show('tab-2');
								}
							else{
								loading_show('DatosDePagina');
								$('#tab-2').hide();
								}
					
							// $("#DatosDePagina").html("Procesando, espere por favor...");
							},
							success: function(datos){
								$(".ui-menu-item").hide();
								     if(rutero=="MostrarRutero")
					  				   {
										$("#DatosDePagina").empty;
										//$("#tab-2").css("display","inline");
										$("#tab-2").html("<article class='FondoArticulos'>"+datos+"</article>");
											 $("#Familias").val(0);
						    				$("#Marcas").val(0);
						 					 $("#Categoria").val(0);
										}
								     else
								        {
										//loading_hide('DatosDePagina') ;
										$("tab-2").empty;
										$("#DatosDePagina").css("display","inline");
										
										
										$("#DatosDePagina").html(datos);
										//$("#tags1").val("");
								        }
								},
							   error: function() {
								   
								   if(rutero=="MostrarRutero")
									{
																	
									 $("#tab-2").empty;
								  $("#tab-2").html("ERROR al obtener los datos ");
									}
									else
									{
								 $("#DatosDePagina").empty;
								  $("#DatosDePagina").html("ERROR al obtener los datos ");
									}
					 
							}});return false;
	  	
		}catch(e)
			{ //alert("ERROR");
			}
			
			
  }//fin de funcion
  


  
  /*Esta funcion ayuda a realizar las busquedas de ofertas*/
function BuscaOfertas(LimiteINICIO,LimiteFIN,usuario){	
				
		var DESCRIPCION = "of "
		$('#tags1').val("of ");
		ObtienePaginas(1,10,usuario,DESCRIPCION,"Siguiente") 
		
		if (DESCRIPCION == "")
		{
		ObtieneDatosDePagia(0,25,usuario);
        ObtienePaginas(1,10,usuario,"","Siguiente");
		}else
		{

		//var DESCRIPCION = $('#tags').attr('value');
		//var Datos = $('#frmClienteActualizar').serialize();
		var Datos = "submit=&DESCRIPCION="+DESCRIPCION+"&LimiteINICIO="+LimiteINICIO+"&LimiteFIN="+LimiteFIN+"&usuario="+usuario;

     	$.ajax({
			url: 'Paginacion/ObtieneDatosDePagia.php',
			type: "POST",
			data: Datos,
			beforeSend: function () { 
			$("#DatosDePagina").empty;
			  $("#DatosDePagina").html("Procesando, espere por favor...");
		
                },
			success: function(datos){
						$("#DatosDePagina").empty;
						$("#DatosDePagina").html(datos);
						
			},
           error: function() {
			  $("#DatosDePagina").empty;
			  $("#DatosDePagina").html("ERROR ");
                     
        }});return false;
		}}


  /*Esta funcion ayuda a realizar las busquedas de ofertas*/
function IrADetalleProducto(ItemCode,ItemName,codbarras,existencia,Precio,U_Gramaje,user,TotalLinea,CPago,fecha,Impuesto,MontoImpuesto,Descuento,MontoDescuento,ItemCode,codbarras,ItemName,existencia,lotes,Unidad,precio,PrchseItem,SellItem,InvntItem,AvgPrice,Price,frozenFor,SalUnitMsr,VATLiable,lote,U_Grupo,SalPackUn,FAMILIA,CATEGORIA,MARCA,CardCode,Disponible,U_Gramaje,DETALLE_1,LISTA_A_DETALLE,LISTA_A_SUPERMERCADO,LISTA_A_MAYORISTA,LISTA_A_2_MAYORISTA,PANALERA,SUPERMERCADOS,MAYORISTAS,HUELLAS_DORADAS,ALSER,COSTO,PRECIO_SUGERIDO,PuntosWeb,Ranking,CodCliente,HayFacVencidas){
		
//\"". $ItemCode ."\",\"". $ItemName ."\",\"". $codbarras ."\",\"". $existencia ."\",\"" .$Precio."\",\"" .$U_Gramaje."\",\"" .$user."\",\"" .$TotalLinea."\",\"" .$CPago."\",\"" .date("Y-m-d")."\",\"" .$Impuesto."\",\"" .$MontoImpuesto."\",\"" .$Descuento."\"\"" .$MontoDescuento."\"
	
$("#fila-"+ItemCode).css("cursor","wait");
$( "#fila-"+ItemCode+" > img" ).css("cursor","wait");
$( "#fila-"+ItemCode+" > p" ).css("cursor","wait");

document.getElementById('DetArti').style.display='block';

		var Datos = "submit=&ItemCode="+ItemCode+"&ItemName="+ItemName+"&codbarras="+codbarras+"&existencia="+existencia+"&Precio="+Precio+"&U_Gramaje="+U_Gramaje+"&user="+user+"&TotalLinea="+TotalLinea+"&CPago="+CPago+"&fecha="+fecha+"&Impuesto="+Impuesto+"&MontoImpuesto="+MontoImpuesto+"&Descuento="+Descuento+"&MontoDescuento="+MontoDescuento+"&ItemCode="+ItemCode+"&codbarras="+codbarras+"&ItemName="+ItemName+"&existencia="+existencia+"&lotes"+lotes+"&Unidad="+Unidad+"&precio="+precio+"&PrchseItem"+PrchseItem+"&SellItem="+SellItem+"&InvntItem="+InvntItem+"&AvgPrice="+"&Price="+"&frozenFor="+frozenFor+"&SalUnitMsr="+SalUnitMsr+"&VATLiable="+VATLiable+"&lote="+lote+"&U_Grupo="+U_Grupo+"&SalPackUn="+SalPackUn+"&FAMILIA="+FAMILIA+"&CATEGORIA="+CATEGORIA+"&MARCA="+MARCA+"&CardCode="+CardCode+"&Disponible="+Disponible+"&U_Gramaje="+U_Gramaje+"&DETALLE_1="+DETALLE_1+"&LISTA_A_DETALLE="+LISTA_A_DETALLE+"&LISTA_A_SUPERMERCADO="+LISTA_A_SUPERMERCADO+"&LISTA_A_MAYORISTA="+LISTA_A_MAYORISTA+"&LISTA_A_2_MAYORISTA="+LISTA_A_2_MAYORISTA+"&PANALERA="+PANALERA+"&SUPERMERCADOS="+SUPERMERCADOS+"&MAYORISTAS="+MAYORISTAS+"&HUELLAS_DORADAS="+HUELLAS_DORADAS+"&ALSER="+ALSER+"&COSTO="+COSTO+"&PRECIO_SUGERIDO="+PRECIO_SUGERIDO+"&PuntosWeb="+PuntosWeb+"&Ranking="+Ranking+"&CodCliente="+CodCliente+"&HayFacVencidas="+HayFacVencidas;
		
     	$.ajax({
			url: 'Paginacion/DetalleArticulo.php',
			type: "POST",
			data: Datos,
			beforeSend: function () { 
									//$("#DatosDePagina").empty;
									//$("#NavPaginas").empty;
								     //$("#container").empty;
									document.getElementById('fade').style.display='block';
									document.getElementById('Espera').style.display='block';
		  						//$("#DetArti").html("Procesando, espere por favor...");
		
                					},
			success: function(datos){
									document.getElementById('Espera').style.display='none';
				                    document.getElementById('fade').style.display='none';
									$("#DetArti").empty;
									//$("#container").empty;
									//$("#DatosDePagina").empty;
									
									   
									$("#DetArti").html(datos);
								
							
									
									document.getElementById('DetalleContenedor').style.display='block';
									document.getElementById('overDetalle').style.display='block';
									document.getElementById('fade').style.display='block';
										$('html, body').animate({scrollTop: '0px'},0);
									},
           	error: function() {
							//  $("#NavPaginas").empty;
				             // $("#container").empty
							  //$("#DatosDePagina").empty;
							  //$("#DatosDePagina").html("ERROR ");
                     
        					  }
			});return false;

	 $('html, body').animate({
           scrollTop: '0px'
       },
       	   0);
		  // Regresar("Regresar");
		}
  
  
  


	
