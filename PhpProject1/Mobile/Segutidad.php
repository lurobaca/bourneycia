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
 
	}	
?>