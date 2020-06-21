<?php
$server = "69.162.154.57:3307";//nombre del servidor
$usuario = "arquitect_bourne";//nombre del usuario
$pwd = "SoporteBourne2013";//contraseña de mysql
$db = "arquitect_bourne";//nombre de la base de datos, en nuestro caso se llama autocompleta

$conexion = mysql_connect($server,$usuario,$pwd);

	if($conexion){
		//echo "conectado<br>";
	}else{
		echo "No hay Conexion";
}

$base = mysql_select_db($db);

	if($base){
		//echo "Conectado a las base de datos: ".$db;
	}else{
		echo "Error en la base de datos";
}


?>
