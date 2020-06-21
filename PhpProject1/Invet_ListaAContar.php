

<!doctype html>
<html lang="es">
	<head>
	 <title>Inventario</title>
	 <meta charset="utf-8">
	 <meta http-equiv="Expires" content="0" />
	 <meta http-equiv="Pragma" content="no-cache" />
     <meta name"viewport" content"width=divice-with,initial-scale=1,maximum-scale=1"/>
     <link rel="stylesheet" type="text/css" href="css/Inventario.css">
      <link rel="stylesheet" type="text/css" href="css/Normalyse.css">
    
    <script src="js/Jquery.js"></script>
      <!-- <script src="http://code.jquery.com/jquery-latest.js"></script>-->
     <script src="js/Inventario.js">

     </script>

    <!-- <script src="https://code.jquery.com/jquery-1.9.1.min.js"></script>-->

    <?php 
	if($_GET['Busqueda'] <>""){
		echo "
		   <script>
    	    $( document ).ready(function() {
    	    	     	$( '.Cliquear' ).click(function() {
  alert( 'Handler for .click() called.' );
});
    	ObtieneGrupo();
    	    	$('#Busqueda').val('".$_GET['Busqueda']."');
  				CargaLista('".$_GET['CodGrupo']."','".$_GET['Grupo']."','".$_GET['NumConteo']."','".$_GET['CodProveedor']."','".$_GET['Busqueda']."')
				if(history.forward(1)){
				history.replace(history.forward(1));
				}
		    });
   			</script>";
		}else
		{
			echo "
		   <script>
    	    $( document ).ready(function() {
    	    	
               ObtieneGrupo();
   		   		CargaLista('".$_GET['CodGrupo']."','".$_GET['Grupo']."','".$_GET['NumConteo']."','".$_GET['CodProveedor']."','');
				if(history.forward(1)){
				history.replace(history.forward(1));
				}
		    });
			
window.onload = (function(){
try{
    $('input').on('keyup', function(){
      	//se hara una busqeuda con like 
      	//
      	//
      	//
      CargaLista('".$_GET['CodGrupo']."','".$_GET['Grupo']."','".$_GET['NumConteo']."','".$_GET['CodProveedor']."',$(this).val());
      
        var value = $(this).val().length;
        $('p').html(value);
    }).keyup();
}catch(e){}});
   			</script>";
		}
	?>

   <script>/*
window.onload = (function(){
try{
    $("input").on('keyup', function(){
      	//se hara una busqeuda con like 
      	//
      	//
      	//
      CargaLista('".$_GET['CodGrupo']."','".$_GET['Grupo']."','".$_GET['NumConteo']."','".$_GET['CodProveedor']."',$(this).val());
      	ObtieneLista($(this).val());
        var value = $(this).val().length;
        $("p").html(value);
    }).keyup();
}catch(e){}});
*/



    </script>


  </script>
	</head>

	<body>
		
		
		<section>
			<article>
				<form action="#" method="post" class="formul">
				
				  
					
				  
				    
				    <div style=" height:190px; width: 180%;	background-color:#0033FF;  overflow: auto;">

						<DIV style="float: left; display:inline-block;">
							<button name="btsend" id="btsendContact" type="submit" class="myButton" onclick="Limpia('<?php echo $_GET['CodGrupo']; ?>','<?php echo $_GET['Grupo']; ?>','<?php echo $_GET['NumConteo']; ?>','<?php echo $_GET['CodProveedor']; ?>',''); return false">LIMPIAR</button>
						</DIV>
                        
                        <DIV id="GrupoConteo" style="float: left; margin-top:1%; margin-left:13%; display:inline-block;
	font-family:Arial;
	font-size:80px; font-weight:bold; color: #FFFFFF"> </DIV>

						<DIV style="float: right; display:inline-block;">
							<button name="btsend" id="btRegresar" type="submit" class="myButton" onclick="Regresar('Proveedores','','<?php echo $_GET['CodGrupo']; ?>','<?php echo $_GET['Grupo']; ?>','<?php echo $_GET['NumConteo']; ?>','<?php echo $_GET['CodProveedor']; ?>'); return false">REGRESAR</button>
						</DIV>


					</div>


				<DIV style="background-color:#0033FF; padding: 5px; height:190px; width: 180%;"">	
				<DIV style=" display:inline-block; float: left;">

<input name="Busqueda" id="Busqueda" type="text" align="left" class="CajaTexto2" placeholder="Escriba aqui para buscar" autocomplete="off" />
				 
				  </DIV>  
				</form>
			</article>
			
			<article>
			<div id="Lista" class="Lista">
			lista de lineas	
			</div>
			
			</article>

		</section>

		<footer>
			
		</footer>
	</body>
</html>	