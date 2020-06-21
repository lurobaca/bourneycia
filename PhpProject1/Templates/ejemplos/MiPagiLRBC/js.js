// JavaScript Document
var Pag =0;
var PagBackup =1;
var backMaxPaginasAMostrar;
var elemento
/*Muestra imagen de espera*/
function loading_show() { 
$('#loading').html("<img src='iconoEspera.gif' width='189' height='189' />").fadeIn('slow'); 
} 
/*Oculta imagen de espera*/
function loading_hide() { 
$('#loading').fadeOut(); 
}

/*Obtiene el ID del numero de pagina clikeado el cual lo enviamos para que sirva de LIMIT loadData(page) */


function PasarPagina( clicked_id ,FilasAMostrarXPagina,MaxPaginasAMostrar){    
    loading_show() ;
	Pag = parseInt(clicked_id); 
	
	elemento = document.getElementById(clicked_id);
	PagBackup.className = "NumPagina";
		PagBackup = elemento;
		
	if (elemento.className == "NumPaginaACTIVO") {
	elemento.className = "NumPagina";
	
	}
	else {
	elemento.className = "NumPaginaACTIVO";
	}
	
	
 	//ObtieneDatosDePagia(LimiteINICIO,LimiteFIN); 
	loading_hide() ;
}

function Siguiente( clicked_id ,FilasAMostrarXPagina,MaxPaginasAMostrar){   
try{
    loading_show() ;
	Ocultar = MaxPaginasAMostrar-10;
	/*
	 if (Pag >= Ocultar )
	 { 
	 $("#Siguiente").style.display='none';
	 }*/
	 
	Pag+=1;
	
	if (Pag >= MaxPaginasAMostrar-2)	{
	   
	
	/*Ira a buscar los guientes 10 link de paginas*/
	ObtienePaginas(Pag,MaxPaginasAMostrar + 10);
	}
	
	/*Si dio click a el boton siguiente le asigna la clase activa segun la variable Pag*/
	if (clicked_id = "Siguiente"){
	  	elemento = document.getElementById(Pag);
	}
	else{
		 elemento = document.getElementById(clicked_id);
		 }
		 
		 /*el elemento es null cuando se pasa de 9 a 10 ya que el elemento 10 se crea hasta despues de salir de la funcion Siguiente()*/ 
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
	
	//loadData(Pag,FilasAMostrarXPagina); 
	loading_hide() ;
	}
catch (e){//alert("Error " + e)
} 
}

function Anterior( clicked_id ,FilasAMostrarXPagina,MaxPaginasAMostrar){    
  loading_show() ;
  alert("Anterior MaxPaginasAMostrar Pag " + MaxPaginasAMostrar + Pag); 
  elemento = document.getElementById(clicked_id);
  
 
	/*Oculta
	 if (Pag <= MaxPaginasAMostrar )
	 { 
	 $("#Anterior").style.display='none';
	 }
	 */
   if(Pag > 1) {Pag-=1;}
  /*Si dio click a el boton siguiente le asigna la calse activa segun la variable Pag*/
	if (elemento = "Anterior")
	   {
    	elemento = document.getElementById(Pag);
		   }
		   
	PagBackup.className = "NumPagina";
	PagBackup = elemento;
		
	if (elemento.className == "NumPaginaACTIVO") {
	elemento.className = "NumPagina";
	
	}
	else {
	elemento.className = "NumPaginaACTIVO";
	}
	
 

  if (Pag <= MaxPaginasAMostrar-10)
	{
	    alert("MaxPaginasAMostrar Pag " + MaxPaginasAMostrar + Pag); 
	 alert("Mostrar las ANTERIORES 3 paginas " + MaxPaginasAMostrar   );
	 LiminIni = Pag-Pag
	/*Ira a buscar los guientes 10 link de paginas*/
	ObtienePaginas(LiminIni,MaxPaginasAMostrar - 10);
	}
 // loadData(Pag,FilasAMostrarXPagina);
  loading_hide() ;
}

/*Carga la informacion de la pagina segun los limites de la paginacion */
function ObtieneDatosDePagia(LimiteINICIO,LimiteFIN) { 
	
	  loading_show();
	var Datos = "submit=&LimiteINICIO="+LimiteINICIO+"&LimiteFIN="+LimiteFIN;
	$.ajax({
			url: 'ObtieneDatosDePagia.php',
			type: "POST",
			data: Datos,
			beforeSend: function () { 
			$("#DatosDePagina").empty;
			
			 $("#DatosDePagina").html("Procesando, espere por favor...");
		    
                },
			success: function(datos){
						//$("#container").empty;
						$("#DatosDePagina").html(datos);
			},
           error: function() {
			  $("#DatosDePagina").empty;
			  $("#DatosDePagina").html("ERROR ");
                     
        }});return false;
		
		  loading_hide() ;
  }
  
/*Carga la informacion los numeros de las paginas ANTERIOR 1 2 3 4 SIGUIENTE */  
  function ObtienePaginas(Pag, MaxPaginasAMostrar) { 
	try{
	
 
	var Datos = "submit=&page="+Pag+"&MaxPaginasAMostrar="+MaxPaginasAMostrar;
	
	$.ajax({
			url: 'ObtienePaginas.php',
			type: "POST",
			data: Datos,
			beforeSend: function () { 
			$("#NavPaginas").empty;
			$("#container").empty;
			$("#container").html("Procesando, espere por favor...");
		     },
			success: function(datos){
						$("#container").empty;
						$("#NavPaginas").html(datos);
			},
           error: function() {
			  $("#NavPaginas").empty; 
			   $("#container").empty;
			  $("#NavPaginas").html("ERROR ");
                     
        }});return false;
		
		  }
	catch(e){ //alert("ERROR" +e);
	}
  }
  
  
  


	
