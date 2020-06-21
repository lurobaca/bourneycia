<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>

     <link rel="stylesheet" type="text/css" href="css/Inventario.css">
      <link rel="stylesheet" type="text/css" href="css/Normalyse.css">
    
      <script src="JS/Jquery.js"></script>
     <!--<script src="http://code.jquery.com/jquery-latest.js"></script>-->
     <script src="JS/Inventario.js"></script>

    <!-- <script src="https://code.jquery.com/jquery-1.9.1.min.js"></script>-->

    <?php 

			echo "
		   <script>
    	    $( document ).ready(function() {
       
   		   		ObtieneCasasEnGrupo('".$_GET['CodGrupo']."');
				if(history.forward(1)){
				history.replace(history.forward(1));
				}
		    });
   			</script>";
	
	?>
    
</head>

<body>

<div >

<H1 align="center" class="Linea1"> PROVEEDORES ASIGNADOS A CONTAR</H1>
</div>
<div id="Lista" class="Lista">
			<div id="ListaCasasEnGrupo"></div>	
			<button name="btsend" id="btRegresar" type="submit" class="myButton" onclick="Regresar('Login','','',''); return false">REGRESAR</button>
			</div>

</body>
</html>