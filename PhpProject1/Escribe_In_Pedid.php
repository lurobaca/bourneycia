<?php  
    $nombre = $_POST["nombre"]; 
	$nombre_archivo = '20/impo/in_pedid.mbg'; 
	$contenido = "".$nombre; 
	$contenido = 	"20000000,mes,año,#s lineas,Fecha,Hora,Cod Cliente,1,1,1,Condicion PAGO,1,Cod Agente,Nombre cliente,\" \",Codigo Articulo,Tipo venta,Descripcion articulo,1,Cantidad,Cantidad,0,0,Precio Unitario,0,0,0,0,%Descuento,Monto Descuento,%Impuesto,0,Monto Impuesto,0,0,0,0,0,0,0,0,\" \",0,0,\" \",\" \",";
 
	fopen($nombre_archivo, 'a+'); 

	// Asegurarse primero de que el archivo existe y puede escribirse sobre el. 
	if (is_writable($nombre_archivo)) { 
   // En nuestro ejemplo estamos abriendo $nombre_archivo en modo de adicion. 
   // El apuntador de archivo se encuentra al final del archivo, asi que 
   // alli es donde ira $contenido cuando llamemos fwrite(). 
   if (!$gestor = fopen($nombre_archivo, 'a')) { 
         echo "No se puede abrir el archivo ($nombre_archivo)"; 
         exit; 
   } 
   // Escribir $contenido a nuestro arcivo abierto. 
   if (fwrite($gestor, $contenido."\n") === FALSE) { 
       echo "No se puede escribir al archivo ($nombre_archivo)"; 
       exit; 
   } 
    //echo "&Eacute;xito, se escribi&oacute; ($contenido) al archivo ($nombre_archivo)"; 
   fclose($gestor); 
	 /*
	$archivo="20/impo/in_pedid.mbg"; 
	$fp = fopen($archivo,"w"); 
	fclose($fp); */
	
	
	} else { 
	   echo "No se puede escribir sobre el archivo $nombre_archivo"; 
	} 
?>