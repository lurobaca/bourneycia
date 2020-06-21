<?php 
	require_once('Class/Usuarios.class.php');
	$Obj_Usuarios =  new Usuarios;
	
	if (isset( $_SESSION ["usuario"]))
	{
	$CodProveedor =  $_SESSION ["usuario"];
	$Prefijo = substr($CodProveedor,0, 1);

	
		if ($Prefijo = "P" ){
		 $Resul = $Obj_Usuarios->Montrar_FechaCorteCubos($CodProveedor );
		 $Fecha=mysql_fetch_array($Resul);
	     // fecha original en formato americano
	     $fecha = $Fecha['Fecha'];
		 $ano = substr($fecha,0, 4);
		 $mes   = substr($fecha,5, 2);
		 $dia = substr($fecha, 8, 2);
		 $Hora = substr($fecha, 10, 3);
		 $Minutos = substr($fecha, 13, 3);
	     $Segundos = substr($fecha, 16, 3);
	
		// fechal final realizada el cambio de formato a las fechas europeas
  		$fecha2 = $dia . '/' . $mes . '/' . $ano . " " .$Hora  .$Minutos.$Segundos;
	 	 echo  $fecha2;
		}
	
	
	}else echo "nada";
	 ?>