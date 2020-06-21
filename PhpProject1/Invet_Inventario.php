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

     <script src="js/Inventario.js"></script>
     <script>
    $(document).ready(parpadear);
    function parpadear() {
    	$('#Label').fadeIn(200).delay(200).fadeOut(200, parpadear);
    	$('#Label').css({
    		color: '#FA8816',
    		fond: 'bold'
    	});
    	 }
</script>
	</head>

	<body>
		<header>
			<h1 >INVENTARIO </h1>
		</header>
		
		<section>
			<article>
					<div id="Contiene">
				<form action="#" method="post" class="formul">
					 <br/>
     			
				<input name="nombre" id="CodGrupo" type="text" class="CajaTexto" value="" style="text-transform:uppercase; "  placeholder="Codigo de Grupo Aqui" required autocomplete="off" onkeyup="javascript:this.value=this.value.toUpperCase();"><br />
		 <br/>


				<button name="btsend" id="btsendContact" type="submit" class="myButton2" onclick="iniciar_sesion($('#CodGrupo').val()); return false">Aceptar</button>
				</form>
				
		 <br/><br/>
					
				
				
			                         
				
				<P><br/>TERMINE HE INDIQUELE EL CODIGO DEL GRUPO A LOS ENCARGADOS DEL INVENTARIO</P>
				<P>BUSCAR POR LOS ULTIMOS 6 DIGITOS DEL CODIGO DE BARRA FACILITA ENCONTRAR LAS LINEAS</P>
                <div id="Label" >
     				  <P >USE EL BOTON REGRESAR DE LA APLICACION, NO EL DE SU CELULAR</P>
				</div>

 <br/>
</div>	
			</article>
		</section>

		<footer>
			<p>Desarrollado por Luis Roberto Bastos Castillo ( Tel: 8880-1662 ,lurobaca@gmail.com )</p>
		</footer>
	</body>
</html>