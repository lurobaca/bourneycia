<?php
//http://www.codedrinks.com/formulario-de-login-con-php-y-mysql/

	require_once("Class/sesion.class.php");
    require_once('Class/Usuarios.class.php');
	$sesion = new sesion();
    $Obj_Usuarios=new Usuarios;

	//Una vez que el usuario haya introducido sus datos el script se procesara asi mismo.
	// Mediante el siguiente código:

    if( isset($_POST["iniciar"]) ){
		$usuario = $_SESSION ['usuario'];
		$password1 = $_POST["contrasenia1"];
		$password2 = $_POST["contrasenia2"];
		//las contraseñas son iguales
		if(trim($password1)==trim($password2))
		{
			
			if($Obj_Usuarios->CambiaClave($usuario,trim($password1))==0)
			{// email de destino
				$email = "lurobaca@bourneycia.net";
				
				// asunto del email
				$subject = "CAMBIO DE CLAVE ".$usuario;
				
				// Cuerpo del mensaje
				$mensaje = "---------------------------------- \n";
				$mensaje.= "            CAMBIO DE CALBE       \n";
				$mensaje.= "---------------------------------- \n";
				$mensaje.= "CODIGO:   ".$usuario."\n";
				$mensaje.= "NUEVA CLAVE:  ".trim($password1)."\n";
				$mensaje.= "---------------------------------- \n\n";
				$mensaje.= "Enviado desde http://bourneycia.net \n";
				
				// headers del email
				$headers = "From: bourneenlace@gmail.com \r\n";
				
				// Enviamos el mensaje
				if (mail($email, $subject, $mensaje, $headers)) {
					$aviso = "Su mensaje fue enviado correctamente";
				} else {
					$aviso = "Error de envío";
				}
	
			    header("location: index.php?Cam=1");
			}
			}
		//manda a actualizar a la DB la nueva contraseña
		
		
		
	}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Documento sin título</title>

  
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
        
</head>

<body>
<section>
      <article>
   
    <div id="LoginUser">
   
      <H5 class="titulos"  >CAMBIAR CLAVE</H5>
  

<form name="frmLogin" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
  <div>
      
    <div>
    <label class="Etiquetas">Contrase&ntilde;a: </label><br/>
     <input type="password" name = "contrasenia1" class="CajaTexto"  placeholder="Escribe AQUI tu contraseña" required/>
     </div>
    <div>
    <label class="Etiquetas">Verifica Contrase&ntilde;a: </label><br/>
     <input type="password" name = "contrasenia2" class="CajaTexto"  placeholder="Escribe AQUI tu contraseña" required/>
     </div>
  </div>

<input type="submit" name ="iniciar" value="Cambiar contraseña" id="btsendLogin"/>

</form>
</div>
 </article>
   	</section>
			
</body>
</html>
