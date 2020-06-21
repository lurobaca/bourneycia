<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.0/jquery.min.js"></script>
<script type="text/javascript">
<link rel="stylesheet" type="text/css" href="css/Taps.css"/>
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
				
        				
});
</script>
<section>
  <article>
  
  
    
<!--este over es el que esta encima del cuadro de fondo oscuto-->  
	<div id="overAyuda" class="overbox" style="display: none;">
     <div id="AyudaContenedor">
  
      <div id="content">
      
      <div id="ModuloAyuda">
       <DIV style="border-bottom:thin solid #999; margin-bottom:5px;">
        <H5 class="titulo">PASOS PARA HACER UN PEDIDO</H5>
        <a href="javascript:hideLightboxAyuda();" style="border-radius:5PX; background:#C60; color:#FFF; margin-TOP:-35PX; border:thin solid #000; padding:5PX; float:right;">X</a>
       </DIV>
       
       <div id="InfoAYUDA">
             
       <div class="IndexAyuda">
            <a href='javascript:Help("INGRESA");' >
            
            <H5 class="tituloAyuda">INGRESA</H5>
            <P> Inicia Sesion con los datos que nuestro agente de ventas le ha brindado ,si aun no tiene esta informacion puede solicitarla al agente de ventas<br />.DE CLICK AQUI PARA MAS INFORMACION <br /></P>
             <P><br /> </P>
            </a>
        </div>
         
      <div class="IndexAyuda">
            <a href='javascript:Help("AGREGA");' >
              
            <H5 class="tituloAyuda">AGREGA</H5>
            <P> Agrega Todas las unidades de todos los articulos que desee , luego podra ver la cantidad y modificarlas o eliminar el articulo del pedido <br />.DE CLICK AQUI PARA MAS INFORMACION <br /></P>
               <P><br /> </P>
            </a>
          </div>
      
      <div class="IndexAyuda">
            <a href='javascript:Help("ENVIA");' >
              
                <H5 class="tituloAyuda">ENVIA</H5>
              <P> Luego de aver agregado el primer articulo , aparesera el boton de enviar pedido el cual hara que su pedido llegue hasta la puerta de su negocio<br />.DE CLICK AQUI PARA MAS INFORMACION <br /></P>
                <P><br /> </P>
               </a>
          </div>
       
          
      </div> 
    
      </div>
    </div>
    </div>
      </div>
    <!--este Fade es el cuadro oscuro de fondo-->
     
<div id="fadeAyuda" class="fadebox" style="display: none;" >&nbsp;</div>
 
 
  </article>
</section>
