<?php 
if (!isset($_SESSION)) {
  session_start();
}
?>
<!doctype html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="../bourneycia.net/css/FijaFondoBody.css">
<meta charset="utf-8">
<!-- TemplateBeginEditable name="doctitle" -->
<title>Bourne&amp;Cia</title>
<!-- TemplateEndEditable -->
<!-- TemplateBeginEditable name="head" -->
<!-- TemplateEndEditable -->
<style type="text/css">
<!--
body {
	font: 100%/1.4 Verdana, Arial, Helvetica, sans-serif;
	background-color:#FFFFFF;
	margin: 0;
	padding: 0;
	color: #000;	
}

/* ~~ Selectores de elemento/etiqueta ~~ */
ul, ol, dl { /* Debido a las diferencias existentes entre los navegadores, es recomendable no añadir relleno ni márgenes en las listas. Para lograr coherencia, puede especificar las cantidades deseadas aquí o en los elementos de lista (LI, DT, DD) que contienen. Recuerde que lo que haga aquí se aplicará en cascada en la lista .nav, a no ser que escriba un selector más específico. */
	padding: 0;
	margin: 0;
}
h1, h2, h3, h4, h5, h6, p {
	margin-top: 0;	 /* la eliminación del margen superior resuelve un problema que origina que los márgenes escapen de la etiqueta div contenedora. El margen inferior restante lo mantendrá separado de los elementos de que le sigan. */
	padding-right: 15px;
	padding-left: 15px; /* la adición de relleno a los lados del elemento dentro de las divs, en lugar de en las divs propiamente dichas, elimina todas las matemáticas de modelo de cuadro. Una div anidada con relleno lateral también puede usarse como método alternativo. */
}
a img { /* este selector elimina el borde azul predeterminado que se muestra en algunos navegadores alrededor de una imagen cuando está rodeada por un vínculo */
	border: none;
}

/* ~~ La aplicación de estilo a los vínculos del sitio debe permanecer en este orden (incluido el grupo de selectores que crea el efecto hover -paso por encima-). ~~ */
a:link {
	color: #42413C;
	text-decoration: underline; /* a no ser que aplique estilos a los vínculos para que tengan un aspecto muy exclusivo, es recomendable proporcionar subrayados para facilitar una identificación visual rápida */
}
a:visited {
	color: #6E6C64;
	text-decoration: underline;
}
a:hover, a:active, a:focus { /* este grupo de selectores proporcionará a un usuario que navegue mediante el teclado la misma experiencia de hover (paso por encima) que experimenta un usuario que emplea un ratón. */
	text-decoration: none;
}

/* ~~ Este contenedor de anchura fija rodea a todas las demás divs ~~ */
.container {
	width: 960px;
		background-color:#FFFFFF;
	margin: 0 auto; 

	/* el valor automático de los lados, unido a la anchura, centra el diseño */
}

/* ~~ No se asigna una anchura al encabezado. Se extenderá por toda la anchura del diseño. Contiene un marcador de posición de imagen que debe sustituirse por su propio logotipo vinculado. ~~ */
.header {
	background-color: #FFFFFF;
background:url(img/head.gif) no-repeat right top;
	clear: both; 
}
.menu {
	background-color: #F0910F;
	
	overflow: hidden;
background:url(img/menubar.gif) repeat-x;
}

/* ~~ Estas son las columnas para el diseño. ~~ 

1) El relleno sólo se sitúa en la parte superior y/o inferior de las divs. Los elementos situados dentro de estas divs tienen relleno a los lados. Esto le ahorra las "matemáticas de modelo de cuadro". Recuerde que si añade relleno o borde lateral a la div propiamente dicha, éste se añadirá a la anchura que defina para crear la anchura *total*. También puede optar por eliminar el relleno del elemento en la div y colocar una segunda div dentro de ésta sin anchura y el relleno necesario para el diseño deseado.

2) No se asigna margen a las columnas, ya que todas ellas son flotantes. Si es preciso añadir un margen, evite colocarlo en el lado hacia el que se produce la flotación (por ejemplo: un margen derecho en una div configurada para flotar hacia la derecha). En muchas ocasiones, puede usarse relleno como alternativa. En el caso de divs para las que deba incumplirse esta regla, deberá añadir una declaración "display:inline" a la regla de la div para evitar un error que provoca que algunas versiones de Internet Explorer dupliquen el margen.

3) Dado que las clases se pueden usar varias veces en un documento (y que también se pueden aplicar varias clases a un elemento), se ha asignado a las columnas nombres de clases en lugar de ID. Por ejemplo, dos divs de barra lateral podrían apilarse si fuera necesario. Si lo prefiere, éstas pueden cambiarse a ID fácilmente, siempre y cuando las utilice una sola vez por documento.

4) Si prefiere que la navegación esté a la derecha en lugar de a la izquierda, simplemente haga que estas columnas floten en dirección opuesta (todas a la derecha en lugar de todas a la izquierda) y éstas se representarán en orden inverso. No es necesario mover las divs por el código fuente HTML.

*/
.sidebar1 {
	
	float: left;
	width: 178px;
		/*min-height:800px;
	max-height:100%;*/
	height:100%;
	background-color: #FDEED9;
	padding-bottom: 10px;
	-webkit-border-radius: 8px;
-moz-border-radius: 8px;
border-radius: 8px;
border:#E0E0E0 thin solid;



}

/* Let's get this party started */ 
::-webkit-scrollbar { width: 12px; } 
/* Track */ ::-webkit-scrollbar-track { -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
 -webkit-border-radius: 10px; border-radius: 10px; } /* Handle */ 
 ::-webkit-scrollbar-thumb { -webkit-border-radius: 10px; border-radius: 10px; background: rgba(255,0,0,0.8); -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.5); } 
 ::-webkit-scrollbar-thumb:window-inactive { background: rgba(255,0,0,0.4); }
 
 
.content {
	/*min-height:800px;
	max-height:100%;*/
	height:100%;
	padding: 10px 0;
	width: 596px;
	float: left;
	background-color: #FFFFFF;
	-webkit-border-radius: 5px;
-moz-border-radius: 5px;
border-radius: 5px;
}
.sidebar2 {
		
	float: left;
	width: 178px;
	background-color: #FDEED9;
	padding: 10px 0;
	/*min-height:800px;
	max-height:100%;*/
	height:100%;
	-webkit-border-radius: 8px;
    -moz-border-radius: 8px;
    border-radius: 8px;
   border:#E0E0E0 thin solid;
}

/* ~~ Este selector agrupado da espacio a las listas del área de .content ~~ */
.content ul, .content ol { 
	padding: 0 15px 15px 40px; /* este relleno reproduce en espejo el relleno derecho de la regla de encabezados y de párrafo incluida más arriba. El relleno se ha colocado en la parte inferior para que el espacio existente entre otros elementos de la lista y a la izquierda cree la sangría. Estos pueden ajustarse como se desee. */
}

/* ~~ Los estilos de lista de navegación (pueden eliminarse si opta por usar un menú desplegable predefinido como el de Spry) ~~ */
ul.nav {
	
	list-style: none; /* esto elimina el marcador de lista */
	border-top: 1px solid #666; /* esto crea el borde superior de los vínculos (los demás se sitúan usando un borde inferior en el LI) */
	margin-bottom: 15px; /* esto crea el espacio entre la navegación en el contenido situado debajo */
}
ul.nav li {
	border-bottom: 1px solid #666; /* esto crea la separación de los botones */
}
ul.nav a, ul.nav a:visited { /* al agrupar estos selectores, se asegurará de que los vínculos mantengan el aspecto de botón incluso después de haber sido visitados */
	padding: 5px 5px 5px 15px;
	display: block; /* esto da al anclaje propiedades de bloque, de manera que llene todo el LI en el que está contenido para que toda el área reaccione a un clic de ratón. */
	width: 160px;  /*esta anchura hace que se pueda hacer clic en todo el botón para IE6. Puede eliminarse si no es necesario proporcionar compatibilidad con IE6. Calcule la anchura adecuada restando el relleno de este vínculo de la anchura del contenedor de barra lateral. */
	text-decoration: none;
	background-color: #C6D580;
}
ul.nav a:hover, ul.nav a:active, ul.nav a:focus { /* esto cambia el color de fondo y del texto tanto para usuarios que naveguen con ratón como para los que lo hagan con teclado */
	background-color: #ADB96E;
	color: #FFF;
}

/* ~~ Los estilos de pie de página ~~ */
.footer {
	padding: 10px 0;
	background-color: #FF9900;
	position: relative;/* esto da a IE6 hasLayout para borrar correctamente */
	clear: both; /* esta propiedad de borrado fuerza a .container a conocer dónde terminan las columnas y a contenerlas */
	-webkit-border-radius: 5px;
-moz-border-radius: 5px;
border-radius: 5px;
border:#F60 thin solid;
}

/* ~~ Clases float/clear varias ~~ */
.fltrt {  /* esta clase puede utilizarse para que un elemento flote en la parte derecha de la página. El elemento flotante debe preceder al elemento junto al que debe aparecer en la página. */
	float: right;
	margin-left: 8px;
}
.fltlft { /* esta clase puede utilizarse para que un elemento flote en la parte izquierda de la página. El elemento flotante debe preceder al elemento junto al que debe aparecer en la página. */
	float: left;
	margin-right: 8px;
}
.clearfloat { /* esta clase puede situarse en una <br /> o div vacía como elemento final tras la última div flotante (dentro de .container) si .footer se elimina o se saca fuera de .container */
	clear:both;
	height:0;
	font-size: 1px;
	line-height: 0px;
}
-->
</style>

<link href="css/boilerplate.css" rel="stylesheet" type="text/css">
<link href="../bourneycia.net/Plantilla/css/Adaptable.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="../bourneycia.net/Plantilla/css/EstiloPlantilla.css">
<link href="../SpryAssets/SpryMenuBarHorizontal.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="../bourneycia.net/css/Contactenos.css">
<link rel="stylesheet" type="text/css" href="../bourneycia.net/css/style.css">
<script src="../bourneycia.net/js/jquery-1.3.1.min.js"></script>
<script src="../bourneycia.net/js/login.js"></script>
<script src="../bourneycia.net/js/jquery.functions.js"></script>
<link rel="stylesheet" type="text/css" href="../bourneycia.net/css/Cubo_Ventas.css">

<!-- AUTOCOMPLETAR-->

<link rel="stylesheet" type="text/css" href="../bourneycia.net/css/ui-lightness/jquery-ui-1.8.13.custom.css">
<script src="../bourneycia.net/js/jquery-ui-1.8.13.custom.min.js"></script>

<link rel="stylesheet" type="text/css" href="../bourneycia.net/Plantilla/css/Adaptable.css">

</head>

<body >

<div class="container" >
  <div class="header" style="position:relative;" >
  <a href="#" >
  <img src="img/Logo.gif" alt="Insertar logotipo aquí" name="Insert_logo" width="179" height="95" id="Insert_logo" style="background-color: #C6D580; display:block;" />
  </a> 
  
  <div style="float:right; width: 488px; height: 92px;  position: relative; top:2px;
    right:2px; margin-left:150px; margin-top:-100px; " >
    
    
    <?php

//si las variables tienen datos se procesde a corroborarlas con la BD
if (!isset($_SESSION['MM_Username']) and !isset($_SESSION['MM_Clave'])  ) {
echo "user : " & $_SESSION['MM_Username'] & "clave :" & $_SESSION['MM_Clave'];

}else
{
	echo "hol
	<form name='form1' method='post' action=''>
    <label for='Cliente'></label>
    <input type='text' name='Cliente' id='Cliente' style='margin-left:160px;width:130px; background-color:#FFFFBF;'>
    <label for='Clave'></label>
    <input type='password' name='Clave' id='Clave' style='margin-left:50px; width:130px;  background-color:#FFFFBF;' >
    <input name='Ingresar' type='button' value=' ' style='margin-left:350px; margin-top:5px; height:30PX; width:130px; background-image:url(img/boton.gif)' >
    </form>";
}
?>

  </div>
   
   
    <!-- end .header -->
    
    </div>
  <div class="menu">
      <ul id="MenuBar1" class="MenuBarHorizontal" >
 
     <li><a  href="../bourneycia.net/index4.php">INICIO</a>
      
     </li>
     <li><a href="Articulos.php">ARTICULOS</a>
     
     </li>
     <li><a  href="../bourneycia.net/Proveedores.php">PROVEEDORES</a>
     <li><a  href="../bourneycia.net/Marcas.php"> MARCAS</a></li>
     <li><a href="#">CLIENTES</a></li>

     <li>    <a href="../bourneycia.net/SobreBourne.php">BOURNE</a></li>
     <li><a href="../bourneycia.net/Contactenos.php">CONTACTENOS</a></li>
   </ul>
    
    </div>
  <!-- TemplateBeginEditable name="EditRegion2" -->
    
  <div id="RedesSociales">
  <div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

</div>
	<DIV style="width: 960px; height:auto;"> 
  <div class="sidebar2">
    
    <h4 style="margin-top:-5px;">OFERTAS</h4>
    <p> Los vínculos anteriores muestran una estructura de navegación básica que emplea una lista no ordenada con estilo de CSS. Utilícela como punto de partida y modifique las propiedades para lograr el aspecto deseado. Si necesita menús desplegables, créelos empleando un menú de Spry, un widget de menú de Adobe Exchange u otras soluciones de javascript o CSS.</p>
    <p>Si desea que la navegación se sitúe a lo largo de la parte superior, simplemente mueva ul.nav a la parte superior de la página y vuelva a crear el estilo.</p>
  <!-- end .sidebar1 -->
  </div>
  
  <div class="fb-like" data-href="http://www.bourneycia.net/" data-send="true" data-layout="button_count" data-width="450" data-show-faces="true" data-font="arial">
  </div>
 
  <div class="content">
 
    <h4 >Novedades</h4>
    <p>Tenga en cuenta que la CSS para estos diseños cuenta con numerosos comentarios. Si realiza la mayor parte de su trabajo en la vista Diseño, eche un vistazo al código para obtener sugerencias sobre cómo trabajar con la CSS para diseños fijos. Puede quitar estos comentarios antes de lanzar el sitio. Para obtener más información sobre las técnicas usadas en estos diseños CSS, lea este artículo en el Centro de desarrolladores de Adobe: <a href="http://www.adobe.com/go/adc_css_layouts">http://www.adobe.com/go/adc_css_layouts</a>.</p>
    <h2>Método de borrado</h2>
    <p>Dado que todas las columnas son flotantes, este diseño usa una declaración clear:both en la regla .footer. Esta técnica de borrado fuerza a .container a conocer dónde terminan las columnas con el fin de mostrar cualquier borde o color de fondo que coloque en .container. Si su diseño exige la eliminación de .footer de .container, deberá usar un método de borrado diferente. El más fiable consiste en añadir una &lt;br class=&quot;clearfloat&quot; /&gt; o &lt;div  class=&quot;clearfloat&quot;&gt;&lt;/div&gt; tras la última columna flotante (pero antes de que se cierre .container). Esto proporcionará el mismo efecto de borrado.</p>
    <h3>Sustitución de logotipo</h3>
    <p>Se ha utilizado un marcador de posición de imagen en el .header de este diseño, en el que lo más probable es que desee colocar un logotipo. Se recomienda quitar el marcador de posición y reemplazarlo por su propio logotipo vinculado. </p>
    <p> Tenga en cuenta que si utiliza el inspector de propiedades para navegar hasta la imagen de su logotipo empleando el campo Origen (en lugar de quitar y reemplazar el marcador de posición), deberá quitar el fondo en línea y mostrar las propiedades. Estos estilos en línea sólo se utilizan para hacer que el marcador de posición del logotipo aparezca en los navegadores para fines de demostración. </p>
    <p>Para quitar los estilos en línea, asegúrese de que el panel Estilos CSS está configurado como Actual. Seleccione la imagen y, en la sección Propiedades del panel Estilos CSS, haga clic con el botón derecho del ratón y elimine las propiedades de visualización y de fondo. (Por supuesto que siempre podrá ir directamente al código y eliminar allí los estilos en línea de la imagen o el marcador de posición.)</p>
     
    <!-- end .content -->
   
  </div>
  
  <div class="sidebar2">
  
    <h4 style="margin-top:-5px;">bonificaciones</h4>
    <p>Por naturaleza, el color de fondo de cualquier div sólo se muestra a lo largo del contenido. Si desea usar una línea divisora en lugar de un color, coloque un borde en el lado de la div de .content (pero sólo en el caso de que siempre vaya a tener más contenido).</p>
    EditRegion4
  <!-- end .sidebar2 -->
  </div>
  
  </DIV>	
  <!-- TemplateEndEditable -->
  
  <div class="footer" align="center">
   <div style="margin-bottom:1px;" >Todos los derechos reservador para BourneyCia S.A </div>
<div >Sitio desarrollado por Luis Roberto Bastos Castillo</div>
    <!-- end .footer --></div>
  <!-- end .container --></div>
</body>
</html>
