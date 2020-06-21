// JavaScript Document
//

/*efecto espera caundo cambiad de ventana*/
function CambiarInicio() 
{
	// "
	
//document.getElementById('fade').style.display='block';
document.getElementById('Espera').style.display='block';
}
function CambiarFin() 
{
document.getElementById('fade').style.display='none';
document.getElementById('Espera').style.display='none';
}
function showLightboxDetalle() {
	
	
document.body.style.overflowY = 'none';
	document.getElementById('DetArti').style.display='block';
	document.getElementById('DetalleContenedor1').style.display='block';
	
	document.getElementById('overDetalle').style.display='block';
		
	document.getElementById('fade').style.display='block';
	 $('html, body').animate({
           scrollTop: '0px'
       },
       	   0);
		   Regresar("Regresar");
}


function hideLightboxDetalle() {
	document.body.style.overflowY = 'scroll';
	document.getElementById('DetalleContenedor1').style.display='none';
	document.getElementById('overDetalle').style.display='none';
	document.getElementById('over').style.display='none';
	document.getElementById('fade').style.display='none';
	document.getElementById('DetArti').style.display='none';
	$("#DetArti").empty();
}
//Mostrar Ayuda

function showLightboxAyuda() {
	
	//$("#AyudaContenedor").css("display","inline");
	document.getElementById('AyudaContenedor').style.display='block';
	document.getElementById('overAyuda').style.display='block';
	document.getElementById('fade').style.display='block';
	 $('html, body').animate({
           scrollTop: '0px'
       },
       	   0);
		   Regresar("Regresar");
}


function hideLightboxAyuda() {
	document.getElementById('overAyuda').style.display='none';
	document.getElementById('over').style.display='none';
	document.getElementById('fade').style.display='none';
}


//muestra ventana de login
function showLightbox() {
	document.getElementById('over').style.display='block';
	document.getElementById('fade').style.display='block';
	 $('html, body').animate({
           scrollTop: '0px'
       },
       	   0);
}
function hideLightbox() {
	document.getElementById('over').style.display='none';
	document.getElementById('fade').style.display='none';
}


// JavaScript  Facturas Pendientes
function showLightboxFac() {
	
	document.getElementById('overFac').style.display='block';
	document.getElementById('fadeFac').style.display='block';
	 $('html, body').animate({
           scrollTop: '0px'
       },
       	   0);
}
function hideLightboxFac() {
	document.getElementById('overFac').style.display='none';
	document.getElementById('fadeFac').style.display='none';
}