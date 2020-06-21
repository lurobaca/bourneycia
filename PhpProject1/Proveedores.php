<?php
//En todos los archivos que integren nuestra aplicación 
//tenemos que iniciar la sesión y lo haremos con el siguiente código:
	require_once("Class/sesion.class.php");
	
	$sesion = new sesion();
	$usuario = $sesion->get("usuario");
	
	
	?>
    <!doctype html>
    <!-- <html lang="es"> indica el lenguaje, para hacer una web multi lenguaje lo recomendable es hacer una web en cada idioma y 	alojarlo en subdominio o dominios independientes -->
    <html lang="es"><!-- InstanceBegin template="/Templates/Plantilla_HTML5.dwt" codeOutsideHTMLIsLocked="false" -->
     
    <head>
    <?php include("Mobil_O_PC.php");?>
    <!-- ESTE PAGINA A SIDO DESARROLLADA POR LUIS ROBERTO BASTOS CASTILLO CED:603820988 ,EN EL DOMINIO DE bourneycia.net PERO LOS ARCHIVOS DE ESTA PAGINA WEB NO ES PROPIEDAD DE Bourne y Cia S.A Ced.Jur 3101200575, ESTA PAGINA SIRVE COMO SERVICIO EL CUAL DEBE SER PAGADO POR Bourne y Cia S.A Ced.Jur 3101200575 a LUIS ROBERTO BASTOS CASTILLO CED:603820988 EN CASO DE NO SER PAGADO  LUIS ROBERTO BASTOS CASTILLO CED:603820988 TIENE TODO EL DERECHO DE ENBARGAR LOS ARCHIVOS DE DICHA PAGINA WEB Y TODOS LOS SISTEMAS RELACIONADOS (SISTEMA SINCRO CLIENTE Y SERVIDOR)  CON EL FUNCIONAMIENTO DE ESTA PAGINA (DATOS ACTUALIZADOS AL 21/04/2014) -->
    <meta http-equiv="content-type" content="text/html; charset=UTF-8" /> 
     
        
   <!--SEO -->
        <meta name="copyright" CONTENT="Todos los derechos reservados para LUIS ROBERTO BASTOS CASTILLO ">
        <meta name="Geography" CONTENT="COSTA RICA">
        <meta NAME="city" CONTENT="GUANACASTE">
        <meta http-equiv="Content-Language" content="es"/>
        <meta name="country" content="COSTA RICA"/>
        <meta NAME="Language" CONTENT="es">
        <meta charset="encoding">
               
        <meta name="keywords" content="distribuidora bourne ,DISTRIBUCION,VENTAS,VENTA DE PRODUCTOS DE COSUMO MASIVO,BOURNE,BOURNEYCIA,BOURNEYCIA.NET,BOURNE Y COMPAÑIA,VENTAS DE ATUN,VENTA DE PAPEL HIGIENICO, VENTA DE JABON,SAN LUIS,TOÑOS,VINICIO FALLAS,SANDILLAL ,CAÑAS GUANASTE, TRABAJO EN CAÑAS GUANACASTE,DISTRIBUIDORA BOURNE,DISTRIBUIDORAS EN COSTA RICA,DISTRIBUIDORAS EN GUANACASTE,DISTRIBUIDORAS EN COSTA RICA,,DISTRIBUIDORAS EN CAÑAS" />
        
        <meta name="description" content="PAGINA OFICIAL de la Distribuidora Bourne Y Cía. S.A. Empresa Dedicada a la Distribucion de alimentos de consumo masivo ,Ubicada en Sandillal de Cañas, Guanacaste, Costa Rica.  CONTACTENOSTel:(506)2669-6103,(506)2669-6250." />
        
        <meta name="author" content="Luis Roberto Bastos Castillo lurobaca@gmail.com">
        <meta name="robots" CONTENT="index,falow">
        <!--SEO -->

        <!-- <meta charset="utf-8"> es importante para usarlo en windows -->

        <!-- InstanceBeginEditable name="doctitle" -->
  <title>BourneyCia S.A</title>
        <!-- InstanceEndEditable -->
        
       <script src="js/Jquery.js"></script>
      <!--  <link rel="stylesheet" type="text/css" href="../SISTEMAS ROBERTO/BourneNueva/css/Estilos.css">-->

           
         <link rel="stylesheet" type="text/css" href="css/Tablas.css">
        <link rel="stylesheet" type="text/css" href="css/IDs.css">
        <link rel="stylesheet" type="text/css" href="css/Clases.css">
        <link rel="stylesheet" type="text/css" href="css/Efecto_LightBox.css">
        
        <link rel="stylesheet" type="text/css" href="Plantilla/css/IDs.css">
        <link rel="stylesheet" type="text/css" href="Plantilla/css/Clases.css">
        <link rel="stylesheet" type="text/css" href="Plantilla/css/Stilos_de_Etiquetas.css">
        <link rel="stylesheet" type="text/css" href="Plantilla/css/Menu.css">
      
        <link rel="stylesheet" type="text/css" href="Plantilla/css/FijaFondoBody.css">
        <link rel="stylesheet" type="text/css" href="Paginacion/css/StylePagina.css">
        <link rel="stylesheet" type="text/css" href="autocompletar/css/jqueryui.css">
      
      
       
     <!--    Datos para autocompletar
    <link rel="stylesheet" type="text/css" href="../SISTEMAS ROBERTO/BourneNueva/css/ui-lightness/jquery-ui-1.8.13.custom.css">
       <script src="../SISTEMAS ROBERTO/BourneNueva/js/jquery-1.5.1.min.js"></script> 
       <script src="../SISTEMAS ROBERTO/BourneNueva/js/jquery-ui-1.8.13.custom.min.js"></script>
         -->
  
         <script src="js/Efecto_LightBox.js"></script>
         <script src="js/FuncionesJS.js"></script>
        <script src="js/CarritoJS.js"></script>
        <script src="Paginacion/JSPagina.js"></script> 
        
       
        <script src="js/IndentificaNavegador.js"></script>
      
        <script src="js/PHP_AJAX_MYSQL/Articulos_Funciones.js"></script>
        <script src="js/DisenoTabla.js"></script>
        <script src="js/ValidadorCampos.js"></script>
         
        <script type="text/javascript">	
	
		var NumArti = 0;
	
		NumArti = CuentaArticulosCarrito('<?php  echo $usuario; ?>');
		SumaTotalPedido('<?php echo $usuario; ?>');
		
		$(document).ready(parpadear);
		function parpadear(){
			if(Palpitar==0)
	    	 	 $('#CarBtn').fadeIn(500).delay(250).fadeOut(500, parpadear) ;
			 else
				 $('#CarBtn').fadeIn(500);
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
        
        $(document).ready(function(){
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
              alert("sube"); $('html, body').animate({
				 
                   						scrollTop: $(document).height()
               							},
               						1500);
               return false;
           });
         
        });
		</script>
        
        
        <!-- InstanceBeginEditable name="head" -->
        
         <!-- InstanceEndEditable -->
    </head>
  
    <body>
    <!--<?php /*include_once("../SISTEMAS ROBERTO/BourneNueva/analyticstracking.php")*/ ?>
     REFEENCIA http://www.youtube.com/watch?v=RBbviZLKEG0 -->
    
    <!-- IMPORTANTE deberia hacerse un solo h1 para que google pueda dar una mejor ubicacion a nuestro sitio web-->
      <div id="Contenido">
       <DIV id="LogoName">
          <section>
             <article>
               <header>
                <a href="index.php">
                  <img src="img/General/Head.jpg" width="1200" height="159" style="margin-left:-50px;margin-top:-10px;" alt="Bourne Y Cia S.A" >
                </a>
            </header>
          </article>
          </section>
        
        <div id="Login">
         <section>
          <article>
           <nav id="BarTop">  
           
         <!--  <form action="../SISTEMAS ROBERTO/index.php" method="post" class="formulario">
             <input name="nombre" id="QueBuscas" type="text" class="Buscar" placeholder="Que Buscas?" required /><br />
           </form> -->
            
	
		    <form  class="formulario" method="post" action="Paginacion/ObtieneDatosDePagia.php" onsubmit="ObtieneDatosDePagia(0,50,<?php 
			   																									  if (trim($_SESSION ['usuario']) <> "")
																												     echo trim("'".$_SESSION ['usuario']."'"); 																											  else 
																												     echo "0"; 
																												  ?>); return false">
                <!-- <input name="Enviar" type="submit" value="Buscar"  />
                <input id="tags" name="tags"  class="Buscar" placeholder="Que Buscas?"  /> 
                 <input name="nombre" id="QueBuscas" type="text" class="Buscar" placeholder="Que Buscas?" required  />--><br />
            
               </form>
				<!--(" . $sesion->get('NameUsuario') . ")-->
          <div id="InfoUsuario" >
          <div class='BarSesion'>
             <?php 
               if (isset( $_SESSION ['usuario']))
                   echo "
                            <div>
                              <a href='../MiCuenta.php?Tap=1' >Hola,". $sesion->get('NameUsuario')." </a>
                            </div>
                            <div>
                              <a  href='../Class/cerrarsesion.php'> Cerrar Sesion </a>
                           </div>
                           <div> <a  id='Ayuda' href='javascript:showLightboxAyuda();'>Ayuda</a> </div>
                        
                       ";
               else 
                 echo "
                     <div  >
                       <a  id='IrInicio' href='javascript:showLightbox();'>Iniciar Sesion</a>
                       
                      <!--<a href='../1Bourneycia New/Login.php'>Iniciar Sesion </a>-->
                     </div>
                     <div>
                      <a href='../SolicitudRegistro.php'>Registrarse </a>
                    </div>
                     
                    ";
            ?>
             
             </div>
           </div>
        </nav>
          </article>         
         </section>
        </div>
        
          <article>
              <!--  <div id="ContactoHome">
                <p>Correo:  bournecia@hotmail.com</p>
                <p>Tel: 2669 6250 ó 2669 6103 </p>
                <p>Horario: De 8 am a 5 pm de Lunes a Sabado</p>
                </div>-->
            </article> 
          
       </DIV>
    
    
       <article>
        <nav id="NavMenu" >
         
        <ul id="menu">
                <a  href="index.php"><li>   INICIO </li></a>
        <?php if (isset( $_SESSION ['usuario'])){?>
            <li class="SubMenu" > 
      <!-- <a href="#"> -->
        	PEDIDOS
        	<img  src="img/General/sort_desc.png" class="Fecha" width="20" height="20" alt="Ver Más">
            
       		<ul>
              <a href="Productos.php?Nuevo=New&Tap=1"><li>NUEVO</li></a>
              <a  href="MiCuenta.php?Tap=3"> <li>HECHOS</li></a>
               <a  href="Carrito.php"><li class="ultimo">EN CARRITO</li></a>
              
           </ul>
          
         <!-- </a>  -->     
         </li>
           <?php }?>   
        <a  href="Productos.php?Tap=1">  <li>ARTICULOS </li></a>
       <a  href="Marcas.php"><li>   MARCAS  </li></a>
        
       <li class="SubMenu" > 
      <!-- <a href="#"> -->
        	PERSONAL 
        	<img  src="img/General/sort_desc.png" class="Fecha" width="20" height="20" alt="Ver Más">
            
       		<ul>
              <a href="Agentes.php"><li>  AGENTE</li></a>
              <a  href="Choferes.php"> <li>CHOFERES</li></a>
               <a  href="Oficina.php"><li>OFICINA</li></a>
               <a  href="Bodega.php"><li class="ultimo">BODEGA</li></a>
           </ul>
          
         <!-- </a>  -->     
         </li>  
         
       <!-- <a  href="../SISTEMAS ROBERTO/BourneNueva/Proveedores.php"> <li >PROVEEDORES</li></a>-->
      <a  href="Empleo.php"> <li >  EMPLEO</li></a>
      <li class="SubMenu" > 
      <!-- <a href="#"> -->
        	BOURNE 
        	<img  src="img/General/sort_desc.png" class="Fecha" width="20" height="20" alt="Ver Más">
            
       		<ul>
              <a href="Bourne.php"><li>VISION MISION HISTORIA</li></a>
              <a  href="TradeMarketing.php"> <li>TRADE MARKETING</li></a>
               <a  href="Revista.php" ><li class="ultimo">REVISTA</li></a>
              
           </ul>
          
         <!-- </a>  -->     
         </li > 
        <a  href="Contactenos.php"><li  style="border-right:none;">CONTACTENOS</li></a>
        </ul>
        
        </nav>
       </article>
     
       <!-- dentro de <section> siempre va un <article> o tambien se puede meter otro <section> 
       El <section> es para definir secciones definica como la de un post y otro <section> para los comentarios de ese post--> 
       <!-- un <article> es la ultima etiqueta semantica del HTML5 PERO si pueden meterse las etiquetas normales
       como DIV, H1 , tablas
       Los <article> se usan para comentarios   <--> 
      <section>
     
        <aside>
            <div id="fb-root"></div>
                <script>
                 (function(d, s, id) {
                  var js, fjs = d.getElementsByTagName(s)[0];
                  if (d.getElementById(id)) return;
                  js = d.createElement(s); js.id = id;
                  js.src = "//connect.facebook.net/es_LA/all.js#xfbml=1";
                  fjs.parentNode.insertBefore(js, fjs);
                  }(document, 'script', 'facebook-jssdk'));
                </script>
    
            <div id="FBLike" class="fb-like" data-href="http://bourneycia.net/" data-send="true" data-layout="box_count" data-width="450" data-show-faces="true">
            
            </div>
            
           <!--<div class="fb-like" data-href="http://bourneycia.net/" data-width="10" data-layout="standard" data-action="like" data-show-faces="true" data-share="true"></div>
            -->
            
            
        </aside>
        
        
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
    
        <!--<aside>
          <a href="../SISTEMAS ROBERTO/BourneNueva/Contactenos.php" >
                <div id="OpinionClientes" >
                  Que opinas de Bourne&amp;Cia?
                </div>
           </a>
        </aside>-->
    
       <aside>
       
        <?php 
               if (isset( $_SESSION ['usuario']))
               {
               $Usuario = trim($_SESSION ['usuario']);
             
               echo " 
                <div id='Carrito1'>
                  <a href='Carrito.php'>
     
                   <div id='CarImg'>
                 	<img src='img/General/Carrito.png' width='80' height='80' title='VER MI PEDIDO' alt='VER MI PEDIDO'>
                  </div>
                  <br>
                  </a>
                   <div id='DatosCar'>
                       <div align='center' style='background-color:#FF6702;color:#FFF;'>Articulos</div>
                       <div id='NumArticulos' align='center' >0</div>
                        <div align='center' style='background-color:#FF6702;color:#FFF;' >Monto</div>
                       <div id='MontoPedido' align='center'  >00.00</div>
                 </div>
                   <br>
                    <div id='CarBtn'>
                    
                      
                    </div>
                    
                </div>  ";
                }
          
          
     
                
                ?>
       </aside>
       
      
      <?php include("Ayuda.php");  ?>
            <!-- InstanceBeginEditable name="EditRegion3" -->
            
             <section>
    <article>
    <div class="TitulpPagina" >
       <H5 class="titulos"  >NUESTROS PROVEEDORES</H5>
       </div>
    </article>
     <article>

	     <div class="CuadroInfo">  
    	 <a href= "#" 
            onClick="ControlaDescarga('P005','<?php echo $_SESSION ['usuario']; ?>'); return false" 
            title="P005 Descargar Ultima Actualizacion <?php  include('PHP_ObtieneFechaCorte.php'); ?>" 
            target="_parent" >
               <img src="img/Proveedores/P005.gif">
    	 </a>
	     </div>
	
     <div class="CuadroInfo">  
    	 <a href= "#" 
            onClick="ControlaDescarga('P008','<?php echo $_SESSION ['usuario']; ?>'); return false" 
            title="P005 Descargar Ultima Actualizacion <?php  include('PHP_ObtieneFechaCorte.php'); ?>" 
            target="_parent" >
               <img src="img/Proveedores/P008.gif">
    	 </a>
	     </div>
         
         
       	<div class="CuadroInfo">
	    	 <a href= "#" 
            onClick="ControlaDescarga('P006','<?php echo $_SESSION ['usuario']; ?>'); return false" 
            title="P006 Descargar Ultima Actualizacion <?php  include('PHP_ObtieneFechaCorte.php'); ?>" 
            target="_parent" >
    	<img src="img/Proveedores/P006.gif">
	    </a>
        </div>
	
    	<div class="CuadroInfo">
	    	 <a href= "#" 
            onClick="ControlaDescarga('P038','<?php echo $_SESSION ['usuario']; ?>'); return false" 
            title="P038 Descargar Ultima Actualizacion <?php  include('PHP_ObtieneFechaCorte.php'); ?>" 
            target="_parent" >
    	<img src="img/Proveedores/P038.gif">
	    </a>
    	</div>

    	<div class="CuadroInfo">
	    	 <a href= "#" 
            onClick="ControlaDescarga('P060','<?php echo $_SESSION ['usuario']; ?>'); return false" 
            title="P060 Descargar Ultima Actualizacion <?php  include('PHP_ObtieneFechaCorte.php'); ?>" 
            target="_parent" >
    	<img src="img/Proveedores/P060.gif">
	    </a>
    	</div>
	   
    	<div class="CuadroInfo">
	    	 <a href= "#" 
            onClick="ControlaDescarga('P094','<?php echo $_SESSION ['usuario']; ?>'); return false" 
            title="P094 Descargar Ultima Actualizacion <?php  include('PHP_ObtieneFechaCorte.php'); ?>" 
            target="_parent" >
    	<img src="img/Proveedores/P094.gif">
	    </a>
    	</div>
	 
	    <div class="CuadroInfo">
    		 <a href= "#" 
            onClick="ControlaDescarga('P062','<?php echo $_SESSION ['usuario']; ?>'); return false" 
            title="P062 Descargar Ultima Actualizacion <?php  include('PHP_ObtieneFechaCorte.php'); ?>" 
            target="_parent" >
	    <img src="img/Proveedores/P062.gif">
	    </a>
    	</div>
  
	    <div class="CuadroInfo">
	    	 <a href= "#" 
            onClick="ControlaDescarga('P081','<?php echo $_SESSION ['usuario']; ?>'); return false" 
            title="P081 Descargar Ultima Actualizacion <?php  include('PHP_ObtieneFechaCorte.php'); ?>" 
            target="_parent" >
	    <img src="img/Proveedores/P081.gif">
	    </a>
	    </div>

    	<div class="CuadroInfo">
	   	 <a href= "#" 
            onClick="ControlaDescarga('P059','<?php echo $_SESSION ['usuario']; ?>'); return false" 
            title="P059 Descargar Ultima Actualizacion <?php  include('PHP_ObtieneFechaCorte.php'); ?>" 
            target="_parent" >
	    <img src="img/Proveedores/P059.gif">
	    </a>
    	</div>
   
	
	    
    	<div class="CuadroInfo">
	    	 <a href= "#" 
            onClick="ControlaDescarga('P068','<?php echo $_SESSION ['usuario']; ?>'); return false" 
            title="P068 Descargar Ultima Actualizacion <?php  include('PHP_ObtieneFechaCorte.php'); ?>" 
            target="_parent" >
    	<img src="img/Proveedores/P068.gif" >
	    </a>
	    </div>
	   
    	<div class="CuadroInfo">
	   	 <a href= "#" 
            onClick="ControlaDescarga('P040','<?php echo $_SESSION ['usuario']; ?>'); return false" 
            title="P040 Descargar Ultima Actualizacion <?php  include('PHP_ObtieneFechaCorte.php'); ?>" 
            target="_parent" >
    	<img src="img/Proveedores/P040.gif">
	    </a>
	    </div>
	   
    	<div class="CuadroInfo">
	   	 <a href= "#" 
            onClick="ControlaDescarga('P002','<?php echo $_SESSION ['usuario']; ?>'); return false" 
            title="P002 Descargar Ultima Actualizacion <?php  include('PHP_ObtieneFechaCorte.php'); ?>" 
            target="_parent" >
    	<img src="img/Proveedores/P002.gif">
	    </a>
	    </div>
	   
    	<div class="CuadroInfo">
	   	 <a href= "#" 
            onClick="ControlaDescarga('P045','<?php echo $_SESSION ['usuario']; ?>'); return false" 
            title="P045 Descargar Ultima Actualizacion <?php  include('PHP_ObtieneFechaCorte.php'); ?>" 
            target="_parent" >
    	<img src="img/Proveedores/P045.gif">
	    </a>
    	</div>
   
   		<div class="CuadroInfo">
	    	 <a href= "#" 
            onClick="ControlaDescarga('P061','<?php echo $_SESSION ['usuario']; ?>'); return false" 
            title="P061 Descargar Ultima Actualizacion <?php  include('PHP_ObtieneFechaCorte.php'); ?>" 
            target="_parent" >
    	<img src="img/Proveedores/P061.gif">
	    </a>
    	</div>
     
     	<div class="CuadroInfo">
	    	 <a href= "#" 
            onClick="ControlaDescarga('P074','<?php echo $_SESSION ['usuario']; ?>'); return false" 
            title="P074 Descargar Ultima Actualizacion <?php  include('PHP_ObtieneFechaCorte.php'); ?>" 
            target="_parent" >
	    <img src="img/Proveedores/P074.gif">
	    </a>
	    </div>
 
    	<div class="CuadroInfo">
	   	 <a href= "#" 
            onClick="ControlaDescarga('P091','<?php echo $_SESSION ['usuario']; ?>'); return false" 
            title="P091 Descargar Ultima Actualizacion <?php  include('PHP_ObtieneFechaCorte.php'); ?>" 
            target="_parent" >
	    <img src="img/Proveedores/P091.gif">
	    </a>
	    </div>
     
    	<div class="CuadroInfo">
	   	 <a href= "#" 
            onClick="ControlaDescarga('P052','<?php echo $_SESSION ['usuario']; ?>'); return false" 
            title="P052 Descargar Ultima Actualizacion <?php  include('PHP_ObtieneFechaCorte.php'); ?>" 
            target="_parent" >
	    <img src="img/Proveedores/P052.gif">
	    </a>
    	</div>
 
	
  
    	<div class="CuadroInfo">
		 <a href= "#" 
            onClick="ControlaDescarga('P025','<?php echo $_SESSION ['usuario']; ?>'); return false" 
            title="P025 Descargar Ultima Actualizacion <?php  include('PHP_ObtieneFechaCorte.php'); ?>" 
            target="_parent" >
	    <img src="img/Proveedores/P025.gif">
	    </a>
    	</div>
   
	    <div class="CuadroInfo">
	   	 <a href= "#" 
            onClick="ControlaDescarga('P024','<?php echo $_SESSION ['usuario']; ?>'); return false" 
            title="P024 Descargar Ultima Actualizacion <?php  include('PHP_ObtieneFechaCorte.php'); ?>" 
            target="_parent" >
    	<img src="img/Proveedores/P024.gif">
	    </a>
	    </div>
               
    	<div class="CuadroInfo">
	   	 <a href= "#" 
            onClick="ControlaDescarga('P023','<?php echo $_SESSION ['usuario']; ?>'); return false" 
            title="P023 Descargar Ultima Actualizacion <?php  include('PHP_ObtieneFechaCorte.php'); ?>" 
            target="_parent" >
    	<img src="img/Proveedores/ProveedorSinImagen.gif"> 
	    </a>
	    </div>
  
     
    	<div class="CuadroInfo">
	    	 <a href= "#" 
            onClick="ControlaDescarga('P031','<?php echo $_SESSION ['usuario']; ?>'); return false" 
            title="P031 Descargar Ultima Actualizacion <?php  include('PHP_ObtieneFechaCorte.php'); ?>" 
            target="_parent" >
    	<img src="img/Proveedores/ProveedorSinImagen.gif"> 
	     </a>
    	 </div>
    
    	<div class="CuadroInfo">
	    	 <a href= "#" 
            onClick="ControlaDescarga('P036','<?php echo $_SESSION ['usuario']; ?>'); return false" 
            title="P036 Descargar Ultima Actualizacion <?php  include('PHP_ObtieneFechaCorte.php'); ?>" 
            target="_parent" >
	    <img src="img/Proveedores/ProveedorSinImagen.gif"> 
	    </a>
    	</div>
    
	    <div class="CuadroInfo">
	    	 <a href= "#" 
            onClick="ControlaDescarga('P069','<?php echo $_SESSION ['usuario']; ?>'); return false" 
            title="P069 Descargar Ultima Actualizacion <?php  include('PHP_ObtieneFechaCorte.php'); ?>" 
            target="_parent" >
	    <img src="img/Proveedores/ProveedorSinImagen.gif">
    	</a>
	    </div>
     
 
    	<div class="CuadroInfo">
	   	 <a href= "#" 
            onClick="ControlaDescarga('P090','<?php echo $_SESSION ['usuario']; ?>'); return false" 
            title="P090 Descargar Ultima Actualizacion <?php  include('PHP_ObtieneFechaCorte.php'); ?>" 
            target="_parent" >
	     <img src="img/Proveedores/ProveedorSinImagen.gif">
	    </a>
    	</div>
   
	     <div class="CuadroInfo">
	     	 <a href= "#" 
            onClick="ControlaDescarga('P021','<?php echo $_SESSION ['usuario']; ?>'); return false" 
            title="P021 Descargar Ultima Actualizacion <?php  include('PHP_ObtieneFechaCorte.php'); ?>" 
            target="_parent" >
           <img src="img/Proveedores/ProveedorSinImagen.gif">
	     </a>
    	 </div>
    
               
	     <div class="CuadroInfo">
	     	 <a href= "#" 
            onClick="ControlaDescarga('P003','<?php echo $_SESSION ['usuario']; ?>'); return false" 
            title="P003 Descargar Ultima Actualizacion <?php  include('PHP_ObtieneFechaCorte.php'); ?>" 
            target="_parent" >
	     <img src="img/Proveedores/ProveedorSinImagen.gif">
	     </a>
    	 </div>
	
        </article>
        <article>
        <p style="color:#F63">
        Notas: 
        <br/> * Las fechas del la ultima actualizacion , son las fechas en que se subio el cubo el cual lleva la facturacion actualizada . <br/> 
        
        * Las fechas de corte de venta real son 2 dias atras de la fecha indicada por la actualizacion ya que hoy se facturan los pedidos del dia de ayer <br/>
        * Estos cubos solo llevan las ventas del mes actual , para cubos con mas meses deberan llamar a oficina <br/>
        * Estos cubos se Actualizan automaticamente cada 4 horas 
        
        </p>
        </article>
     </section>
			
			<!-- InstanceEndEditable -->
    
      
      </section>
       </div>
        <?php include("CuadroLogin.PHP");  ?>
         
           
            <?php include("Paginacion/DetalleArticulo.php");  ?>
               
          <div id="DetArti" style="display:none; "></div>
          
          <DIV id="Espera" style="background:#FFF; display:none; z-index:1002;overflow: none; position:fixed; top:50%; left:45%; height:50px; weight:50px;"><img src="Mobile/Paginacion/img/iconoEspera.gif" width="50" height="50"></DIV>
          
   <DIV id="Factura" align="center"style="background:#FFF; display:none; z-index:1002;overflow: none; position:fixed; top:25%; left:25%; height:auto; weight:100px; padding:5px; border-radius:5px; border:thin solid #FF6702;">
   
   </DIV>
    
        <footer>

              <p>Copyright Luis Roberto Bastos Castillo ( Tel: 8880-1662 ,lurobaca@gmail.com )</p>
        
        </footer>
    </body>
    <!-- InstanceEnd --></html>

