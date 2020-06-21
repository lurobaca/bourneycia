

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
    
      <script src="JS/Jquery.js"></script>
     <!--<script src="http://code.jquery.com/jquery-latest.js"></script>-->
     <script src="JS/Inventario.js"></script>

    <!-- <script src="https://code.jquery.com/jquery-1.9.1.min.js"></script>-->

    <?php 
	if($_GET['Busqueda'] <>""){
		echo "
		   <script>
    	    $( document ).ready(function() {
    	ObtieneGrupo();
    	    	$('#Busqueda').val('".$_GET['Busqueda']."');
   		   		ObtieneLista('".$_GET['Busqueda']."');
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
   		   		ObtieneLista('');
				if(history.forward(1)){
				history.replace(history.forward(1));
				}
		    });
   			</script>";
		}
	?>

   <script>
window.onload = (function(){
try{
    $("input").on('keyup', function(){
      	//se hara una busqeuda con like 
      	//
      	//
      	//
      
      	ObtieneLista($(this).val());
        var value = $(this).val().length;
        $("p").html(value);
    }).keyup();
}catch(e){}});




    </script>

 <!-- <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script>
  $(function() {
    var availableTags = [
      "ActionScript",
      "AppleScript",
      "Asp",
      "BASIC",
      "C",
      "C++",
      "Clojure",
      "COBOL",
      "ColdFusion",
      "Erlang",
      "Fortran",
      "Groovy",
      "Haskell",
      "Java",
      "JavaScript",
      "Lisp",
      "Perl",
      "PHP",
      "Python",
      "Ruby",
      "Scala",
      "Scheme"
    ];
    $( "#Busqueda" ).autocomplete({
      source: availableTags
    });
  });-->
  </script>
	</head>

	<body>
		
		
		<section>
			<article>
				<form action="#" method="post" class="formul">
				
					<label for="tags">Buscar: </label>
				  
					<input name="Busqueda" id="Busqueda" type="text" class="CajaTexto2" placeholder="Escriba aqui para buscar" autocomplete="off" /><br />
				  
				    
				    <div style="width:180%;  overflow: auto;">
						<DIV style="float: left; ">
							<button name="btsend" id="btsendContact" type="submit" class="myButton" onclick="Limpia('Busqueda'); return false">LIMPIAR</button>
						</DIV>
                        
                        <DIV id="GrupoConteo" style="float: left; margin-top:1%; margin-left:13%; display:inline-block;
	font-family:Arial;
	font-size:80px; font-weight:bold; "> </DIV>
						<DIV style="float: right;">
							<button name="btsend" id="btRegresar" type="submit" class="myButton" onclick="Regresar('Login'); return false">REGRESAR</button>
						</DIV>
					</div>
				   
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