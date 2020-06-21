// JavaScript Document
/*
Parámetros

Estos son los parámetros que podemos configurar para nuestro Slider:

previous_class = la clase del elemento que navega al item anterior

next_class = la clase que navega al próximo item / slide

inactive = la clase que será seteada a la navegación anterior/posterior cuando están inactivos

elem = los elementos que son los items del slider.

animation = la animacion por default está seteada a fade pero si incluimos el archivo custom_animations.js se pueden utilizar las siguientes : slideDown, slideUp, slideRight, slideLeft, bounce, explode, fold, scale, random.

speed = la velocidad de la animación

navi = verdadero/falso si queremos tener la lista de navegación

navi_active_class = si navi es verdadero podemos elegir una clase para usar el item activo de navegación

navi_class = si navi es verdadero podemos elegir la clase para usar la navegación.

auto_slide = verdadero/falso para que pase de forma automáticamente

auto_slide_interval = tiempo en millisegundos entre slides

auto_pause_hover = si auto_slide esta activo podemos elegir cuando parar el slider cuando pasamos el mouse arriba

click_next = verdadero/falso si queremos activar que pase al siguiente slide con un click

infinite = verdadero/falso. Si está activo cuando llegamos al último slider y clickeamos el botón siguiente pasa al primer slider. Lo mismo para el botón anterior.

images= verdadero/falso. Si es verdadero entonces al cambiar de slide la imagen de fondo del slider es el slide anterior quedando la transición de forma mas natural . Si es falso entonces el fondo es blanco.

*/
$(document).ready(function(){

	$(".slider").jSlider({elem:"div",
	                      images:true, 
						  animation: "slideLeft",
						  auto_slide: true,
						  auto_slide_interval:5000, 
						  infinite: true,
						  speed: 1200});

});