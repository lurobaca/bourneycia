<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.0/jquery.min.js"></script>
<script type="text/javascript">
<link rel="stylesheet" type="text/css" href="css/Taps.css"/>
<link rel="stylesheet" type="text/css" href="css/Clases.css"/>


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
<link href="css/Clases.css" rel="stylesheet" type="text/css" />

<section>
  <article>
  
  
    
<!--este over es el que esta encima del cuadro de fondo oscuto-->  
	<div id="overAyuda" class="overbox" style="display: none;">
     <div id="AyudaContenedor">
  
      <div id="content">
      
      <div id="ModuloAyuda" align="center">
        <video width="640" height="378" controls>
		  <source src="Videos/HacerPedidos.mp4" type="video/mp4">
  		  Tu navegador de Internet no soporta esta seccion
		</video>
             <div id="CerrarVentana" style="right:1px;" >
     <a href="javascript:hideLightboxAyuda();"><img src="img/General/Cerrar.png" width="25" height="25" /></a>
   </div>
        </div>
    </div>
    </div>
      </div>
    <!--este Fade es el cuadro oscuro de fondo-->
     
<div id="fadeAyuda" class="fadebox" style="display: none;" >&nbsp;</div>
 
 
  </article>
</section>
