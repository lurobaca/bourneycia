<?php
//En todos los archivos que integren nuestra aplicación 
//tenemos que iniciar la sesión y lo haremos con el siguiente código:
	require_once("Class/sesion.class.php");
	
	$sesion = new sesion();
	$usuario = $sesion->get("usuario");
	
	if( $usuario == false )
	{	//si no ha iniciado sesion se devuelve a login
		header("Location: Login.php");		
	}
	else 
	{
	?>
    <?php
$aviso = "";
// check form  
if (isset($_POST['email']) != "") {
	// email de destino
	$email = "lurobaca@bourneycia.net";
	
	// asunto del email
	$subject = "Cambio de informacion";
	
	// Cuerpo del mensaje
	$mensaje = "---------------------------------- \n";
	$mensaje.= "    Cambio de informacion         \n";
	$mensaje.= "---------------------------------- \n";
	$mensaje.= "EMPRESA:  ".$_POST['nombre']."\n";
	$mensaje.= "RESPONSABLE:".$_POST['NombrResponsable']."\n";
	$mensaje.= "EMAIL:    ".$_POST['email']."\n";
	$mensaje.= "TELEFONO: ".$_POST['telefono']."\n";
	$mensaje.= "Direccion: ".$_POST['empresa']."\n";
	$mensaje.= "FECHA:    ".date("d/m/Y")."\n";
	$mensaje.= "HORA:     ".date("h:i:s a")."\n";
	$mensaje.= "IP:       ".$_SERVER['REMOTE_ADDR']."\n\n";
	$mensaje.= "---------------------------------- \n\n";
	$mensaje.= "El cliente [ ".$_POST['Codcliente']."  ] Solicita la r actualizacion de su informacion \n\n";
	$mensaje.= "---------------------------------- \n";
	$mensaje.= "Enviado desde http://bourneycia.net \n";
	
	// headers del email
	$headers = "From: ".$_POST['email']."\r\n";
	$aviso ="";
	// Enviamos el mensaje
	if (mail($email, $subject, $mensaje, $headers)) {
		$aviso = "Su mensaje fue enviado correctamente";
	} else {
		$aviso = "Error de envío";
	}
}
?>
<!doctype html>
<!--[if lt IE 7]> <html class="ie6 oldie"> <![endif]-->
<!--[if IE 7]>    <html class="ie7 oldie"> <![endif]-->
<!--[if IE 8]>    <html class="ie8 oldie"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class=""><!-- InstanceBegin template="/Templates/Plantilla Mobile.dwt.php" codeOutsideHTMLIsLocked="false" -->
<!--<![endif]-->
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">





<!--
Para obtener más información sobre los comentarios condicionales situados alrededor de las etiquetas html en la parte superior del archivo:
paulirish.com/2008/conditional-stylesheets-vs-css-hacks-answer-neither/
  
Haga lo siguiente si usa su compilación personalizada de modernizr (http://www.modernizr.com/):
* inserte el vínculo del código js aquí
* elimine el vínculo situado debajo para html5shiv
* añada la clase "no-js" a las etiquetas html en la parte superior
* también puede eliminar el vínculo con respond.min.js si ha incluido MQ Polyfill en su compilación de modernizr 
-->
<!--[if lt IE 9]>
<script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<![endif]--> 

<script src="../js/Jquery.js"></script>
<script src="js/respond.min.js"></script>

<link href="css/boilerplate.css" rel="stylesheet" type="text/css">
 
   
   <link rel="stylesheet" type="text/css" href="css/Menu.css">
   <link rel="stylesheet" type="text/css" href="css/Tablas.css">
  
   <link rel="stylesheet" type="text/css" href="css/Efecto_LightBox.css">
   <link rel="stylesheet" type="text/css" href="css/IDs.css">
   <link rel="stylesheet" type="text/css" href="css/Estilos.css">
<link rel="stylesheet" type="text/css" href="css/boilerplate.css">

   
  
<!---->   <link  rel="stylesheet" type="text/css" href="Paginacion/css/Clases.css">
    <link rel="stylesheet" type="text/css" href="css/Clases.css"> 
    
   <link rel="stylesheet" type="text/css" href="Paginacion/css/FijaFondoBody.css">
   <link rel="stylesheet" type="text/css" href="Paginacion/css/IDs.css">
   <link rel="stylesheet" type="text/css" href="Paginacion/css/Stilos_de_Etiquetas.css">
   <link rel="stylesheet" type="text/css" href="Paginacion/css/StylePagina.css">
   <link rel="stylesheet" type="text/css" href="css/Menu.css">

  
         <script src="js/Efecto_LightBox.js"></script>
         <script src="js/FuncionesJS.js"></script>
        <script src="js/CarritoJS.js"></script>
        <script src="Paginacion/JSPagina.js"></script> 

       
        <script src="js/IndentificaNavegador.js"></script>
      
        <script src="js/PHP_AJAX_MYSQL/Articulos_Funciones.js"></script>
        <script src="js/DisenoTabla.js"></script>
        <script src="../js/ValidadorCampos.js"></script>

        <script type="text/javascript">	
	   
	    
		var NumArti = 0;
	
		NumArti = CuentaArticulosCarrito('<?php  echo $usuario; ?>');
		SumaTotalPedido('<?php echo $usuario; ?>');
	
	
		
		$(document).ready(
		parpadear
		);
	
		
		function parpadear(){
			if(Palpitar==0)
	    	 	{//indica que NO tiene articulos en carrito
					 $('#CarBtn').fadeIn(500).delay(250).fadeOut(500, parpadear) ;
					
				}
			 else
				{//indica que tiene articulos en carrito
				 $('#CarBtn').fadeIn(500);
				
				}
		 }
		
		
		
	
		
		</script>
        
        <!-- autocompletar 
       <script>
		$(function() {
				<?php
					while($row= mysql_fetch_array($QueryAutocompletar)) {//se reciben los valores y se almacenan en un arreglo
				      $elementos[]= '"'.$row['ItemName'].'"';
	  					}
					$arreglo= implode(", ", $elementos);//junta los valores del array en una sola cadena de texto
				?>	
		
				var availableTags=new Array(<?php echo $arreglo; ?>);//imprime el arreglo dentro de un array de javascript
				
				$( "#tags" ).autocomplete({
					source: availableTags
				});
		});
		</script>
-->
        <script type="text/javascript">
        
        $(document).ready(
		
		
		function(){
			         			    $('#menu li:hover > ul').hover(function(){ 
                        			$('#menu li.SubMenu:hover').parent().addClass('SubMenuHover'); 
                                    return false;
                                   });
								   
        });
		
		
	
	
	 
        </script>
             <!-- Javascript goes in the document HEAD -->
   		<script type="text/javascript">	
		   window.onload=function(){
	        altRows('alternatecolor');
    		}
    	</script>
        
          <!--CODIGO DE SEGUIMIENTOS DE GoogleAnalytics  -->
        <script>
		
		
          (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
          (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
          m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
          })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
        
          ga('create', 'UA-42644587-1', 'bourneycia.net');
          ga('send', 'pageview');
        
        </script>
        <!--FIN CODIGO DE SEGUIMIENTOS DE GoogleAnalytics  -->
        <!--Codigo para ir a inicio o fin de pagina  -->
        <script type="text/javascript">
	
		
		 $(function () {
           $('#IrFinal').click(function () {
               $('html, body').animate({
                   						scrollTop: $(document).height()
               							},
               						1500);
               return false;
           });
         
        });
		
		
		
		
		 $(document).ready( 
		
			
		 CambiarFin();
		 
        });
		
		</script>
        

<!-- InstanceBeginEditable name="head" -->
<title>Mi Cuenta - Distribuidora Bourne y Cia S.A</title>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.0/jquery.min.js"></script>
<script type="text/javascript">

$(document).ready(function(){
	
$('#tabs div').hide();	
	var NumElemento = <?php echo $_GET ['Tap'];?>;
	
	if(NumElemento==1)
	{
	$("#tabs ul li:nth-of-type(1)").addClass('active');
    $("#tabs Div:nth-of-type(1)").show();
	}
	
	if(NumElemento==2)
	{
	$("#tabs ul li:nth-of-type(2)").addClass('active');
    $("#tabs Div:nth-of-type(2)").show();
	}
	
	if(NumElemento==3)
	{
	$("#tabs ul li:nth-of-type(3)").addClass('active');
    $("#tabs Div:nth-of-type(3)").show();
	}
	

//$('#tabs div:first').show();
//$('#tabs ul li:first').addClass('active');
//$("#tabs ul li:nth-of-type(2)").addClass('active');
//$("#tabs Div:nth-of-type(2)").show();

$('#tabs ul li a').click(function(){ 
			$('#tabs ul li').removeClass('active');
			$(this).parent().addClass('active'); 
			
			var currentTab = $(this).attr('href'); 
			$('#tabs div').hide();
			$(currentTab).show();
			return false;
			});
			
			
	/*1,50 significa los LIMITES QUE INCIA EN 0 Y MUESTRA 50 REGISTROS*/
				
        		ObtieneFacturasPendientes();
				ObtienePedidosProntosAFacturar(<?php echo "\"".$usuario ."\""; ?>);		
			
});
</script>



<link rel="stylesheet" type="text/css" href="css/Taps.css">
<!-- InstanceEndEditable -->
</head>
<body>
<div class="gridContainer clearfix" style="background:#D3F0FE;" >

<div id="Login">
         
           <nav id="BarTop">  
           
		
          <div id="InfoUsuario" align="left">
             <?php 
               if (isset( $_SESSION ['usuario']))
                   echo "
                        <div>
                          <a href='MiCuenta.php?Tap=1' onClick='javascript:CambiarInicio();'> VER MI PERFIL </a>
                        </div>
                        
						<div>
                          <a  href='Class/cerrarsesion.php'> CERRAR SESION </a>
                        </div>
                       ";
               else 
                 echo "
                     <div>
                       <a  id='IrInicio' href='javascript:showLightbox();' >INICIAR SESION</a>
                     </div>
                    ";
             ?>
            
           </div>
        </nav>
        
        </div>
<div style=" margin:5px;  margin-top:20px; border:thin solid #039; padding:3px; border-radius:3px; overflow:hidden;height:AUTO; background:#FFFFFF;" >
<div align="center">
<a  href="index.php" align="LEFT">

<img src="img/General/Head_Mobil.jpg" >
</a>
</div>
  

  <nav id="NavMenu" >
        
        <ul id="menu">
                <a  href="index.php" onClick='javascript:CambiarInicio();'><li>   INICIO </li></a>
        <?php if (isset( $_SESSION ['usuario'])){?>
            <li class="SubMenu" > 
      <!-- <a href="#"> -->
        	PEDIDOS
        	<img  src="img/General/sort_desc.png" class="Fecha" width="20" height="20" alt="Ver Más">
            
       		<ul>
              <a href="Productos.php?Nuevo=New&Tap=1" onClick='javascript:CambiarInicio();'><li>NUEVO</li></a>
              <a  href="MiCuenta.php?Tap=3" onClick='javascript:CambiarInicio();'> <li>HECHOS</li></a>
               <a  href="Carrito.php" onClick='javascript:CambiarInicio();'><li class="ultimo">EN CARRITO</li></a>
              
           </ul>
          
         <!-- </a>  -->     
         </li>
           <?php }else{?>   
        <a  href="Productos.php?Tap=1" onClick='javascript:CambiarInicio();'>  <li>ARTICULOS </li></a>
        <?php }?> 
       <a  href="Marcas.php" onClick='javascript:CambiarInicio();'><li>   MARCAS  </li></a>
        
     <!--   <li class="SubMenu" > 
     
        	PERSONAL 
        	<img  src="img/General/sort_desc.png" class="Fecha" width="20" height="20" alt="Ver Más">
            
       		<ul>
              <a href="../SISTEMAS ROBERTO/BourneNueva/Agentes.php"><li>  AGENTE</li></a>
              <a  href="../SISTEMAS ROBERTO/BourneNueva/Choferes.php"> <li>CHOFERES</li></a>
               <a  href="../SISTEMAS ROBERTO/BourneNueva/Oficina.php"><li>OFICINA</li></a>
               <a  href="../SISTEMAS ROBERTO/BourneNueva/Bodega.php"><li class="ultimo">BODEGA</li></a>
           </ul>
          
           
         </li>  -->     
         
       <!-- <a  href="../SISTEMAS ROBERTO/BourneNueva/Proveedores.php"> <li >PROVEEDORES</li></a>-->
      <a  href="Empleo.php" onClick='javascript:CambiarInicio();'> <li >  EMPLEO</li></a>
      <li class="SubMenu" > 
      <!-- <a href="#"> -->
        	BOURNE 
        	<img  src="img/General/sort_desc.png" class="Fecha" width="20" height="20" alt="Ver Más">
            
       		<ul>
              <a href="Bourne.php" onClick='javascript:CambiarInicio();'><li>VISION MISION HISTORIA</li></a>
              <a  href="TradeMarketing.php" onClick='javascript:CambiarInicio();'> <li>TRADE MARKETING</li></a>
               <a  href="Revista.php" onClick='javascript:CambiarInicio();'><li class="ultimo">REVISTA</li></a>
              
           </ul>
          
         <!-- </a>  -->     
         </li> 
        <a  href="Contacto.php" onClick='javascript:CambiarInicio();'><li >CONTACTENOS</li></a>
        </ul>
        
      </nav>

  <div id="LayoutDiv1" style="margin-top:120px; padding:3px; border-radius:3px; border:thin solid #F60; ">
    <!-- InstanceBeginEditable name="EditRegion1" --> 
	
	             <section>
    <article>
    <div style="height:30px;   margin-bottom:5px; border-bottom:thin solid #C0C0C0; " align="center">
        <H1 class="titulos" > INFORMACION DE <?PHP echo $usuario; ?></H1>
    </div>
    
    
        
    </article>
    <article>
      <div id="container">
        <div id="tabs">
        <ul>
          <li><a href="#tab-1">Info</a></li>
          <li><a href="#tab-2">Fac Pendientes</a></li>
          <li><a href="#tab-3">Pedidos WEB </a></li>
        </ul>
       <div id="tab-1">
        <?php 
        require('Class/Usuarios.class.php');
        $objUsuarios=new Usuarios;
        if (isset($_SESSION ['usuario']))
        $Informacion=$objUsuarios->Informacion($_SESSION ['usuario']);
        
        if($aviso<>"")
		  { echo "</br>".$aviso."</br>";
		   $aviso="";
		  }
		   
         if(mysql_num_rows($Informacion)){
              while( $Info = mysql_fetch_array($Informacion) ) {
         ?>
         
        <form action="#" method="post" class="formul">
      
       <label class="Textos">Codigo de cliente</label>
        <input name="Codcliente" id="Codcliente" type="text" class="CajaTexto" placeholder="Codigo del negocio" readonly value="<?php echo $Info['CardCode']; ?>" /><br />
        
   
        
        <label class="Textos">Monto de la D151</label>
        <input name="D151" id="D151" type="text" class="CajaTexto" placeholder="Monto de la D151" readonly value="<?php  //	echo $Info['D151']; ?>"/><br>
       
            
         <label class="Textos">Agente asignado</label>
        <input name="Agente" id="Agente" type="text" class="CajaTexto" placeholder="Agente asignado" readonly value="<?php  echo  $Info['SlpName']; ?>"/><br>
        
                
        <label class="Textos">Dia de visita</label>
        <input name="Supervisor" id="Supervisor" type="text" class="CajaTexto" placeholder="Supervisor asignado"  readonly="readonly" value="<?php  echo $Info['DiaVisita']; ?>"/><br><br><br>
        
        
        <hr style="color:#F60">
        <h3 class="Subtitulos">Campos Editables</h3>
        
        
        
              <label class="Textos">Nombre del Negocio</label>
        <input name="nombre" id="nombre" type="text" class="CajaTexto" placeholder="Nombre del negocio"  value="<?php echo $Info['CardName']; ?>" /><br />
        
        <label class="Textos">Direccion del Negocio</label>
        <input name="empresa" id="empresa" type="text" class="CajaTexto"  placeholder="Direccion el negocio"  value="<?php echo $Info['Street']; ?>" /><br />
    
        <label class="Textos">Nombre del Responsable Tributario</label>
        <input name="NombrResponsable" id="NombrResponsable" type="text" class="CajaTexto" placeholder="Nombre de Responsable" value=" <?php  echo $Info['Name']; ?>"/><br>
            <label class="Textos">Correo del Responsable Tributario</label>
        <input name="email" id="email" type="text" class="CajaTexto" placeholder="Correo del Responsable Tributario" required value=" <?php  echo $Info['E_Mail']; ?>"/><br>
        
        <label class="Textos">Telefono del Responsable Tributario</label>
        <input name="telefono" id="telefono" type="text" class="CajaTexto" placeholder="Telefono del Responsable Tributario" required value="<?php  echo  $Info['Phone1'] ." ó ". $Info['Phone2']; ?>"/><br>
        <label class="Textos">Contraseña</label>
        <input name="contrasenia" id="telefono" type="text" class="CajaTexto" placeholder="contrasenia" required value="<?php  echo  $Info['contrasenia']; ?>"/><br> <a href="CambioClave.php" class="ClassBotones">Cambiar Contraseña</a>
       
         <button name="Actualizar" id="Actualizar"  class="ClassBotones" type="submit">Actualizar</button>
         
       
    </form>
                  
         <?php   }} ?>
         </br>
          </br>
        </div>
    
        <div id="tab-2">
          <h3>Facturas Pendientes</h3> 
        </div>
   <!-- EL TAP 3 ALMACENA LAS FACTURAS PENDIENTES -->
        <div id="tab-3">           
        </div>
    <!-- EL TAP 3 ALMACENA LOS PEDIDOS HECHOS EN WEB -->
        <div id="tab-4">
        </div>
     
       </div>
     </div>
  </article>
      </section>
<script type="text/javascript">
var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
</script>
<script type="text/javascript">
try {
var pageTracker = _gat._getTracker("UA-7025232-1");
pageTracker._trackPageview();
} catch(err) {}</script>
	
	<!-- InstanceEndEditable -->
 </div>
</div>
</div>
<div>

        <!--Compartir a facebook 
        <aside>
    
         <div id="FBShare" >
        
          <a href="#"   onclick="
            window.open(
              'https://www.facebook.com/sharer/sharer.php?u='+encodeURIComponent(location.href), 
              'facebook-share-dialog', 
              'width=626,height=436'); 
            return false;">
          Compartir 
          </a>
        </div>
        </aside>-->
    
        <aside>
          <a href="Contacto.php" onClick='javascript:CambiarInicio();' >
                <div id="OpinionClientes" >
                  Que opinas de Bourne&amp;Cia?
                </div>
           </a>
        </aside>
    
       <aside>
       
        <?php 
               if (isset( $_SESSION ['usuario']))
               {
               $Usuario = trim($_SESSION ['usuario']);
             
               echo " 
                <div id='Carrito1' >
                  <a href='Carrito.php'>
                  <br>
                  </a>
                   <div id='DatosCar'>
                       <div align='center' style='background-color:#F60;color:#FFF;'>Articulos</div>
                       <div id='NumArticulos' align='center' >0</div>
                        <div align='center' style='background-color:#F60;color:#FFF;' >Monto</div>
                       <div id='MontoPedido' align='center'  >00.00</div>
                 </div>
                   <br>
                    <div id='CarBtn'>
                    
                      
                    </div>
                    <div id='OcultaMuestra'>
						<a href='#' onClick='javascript:MostrarBarraPedido(\"".$Usuario."\");' >
						   <img src='img/General/Mostrar.jpg' width='50' height='50'>
						</a>
					</div>
                </div>  ";
                }
          
     
     
                
                ?>
       </aside>
       
</div>
<?php include("CuadroLogin.PHP");  ?>

<DIV id="Espera" style="background:#FFF; display:none; z-index:1002;overflow: none; position:absolute; top:50%; left:45%; height:50px; weight:50px;"><img src="Paginacion/img/iconoEspera.gif" width="50" height="50"></DIV>
 <footer >
 <aside>
 
 <div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/es_LA/sdk.js#xfbml=1&version=v2.0";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<div class="fb-like" data-href="http://bourneycia.net/" data-layout="button_count" data-action="like" data-show-faces="true" data-share="true"></div>
           
         
            
       </aside>
              <p align="center">Copyright Luis Roberto Bastos Castillo ( Tel: 8880-1662 ,lurobaca@gmail.com )</p><br/><br/>
        
        </footer>
</body>
<!-- InstanceEnd --></html>
<?php 
	}	
?>