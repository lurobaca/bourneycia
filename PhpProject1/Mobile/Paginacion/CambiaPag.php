<?php
if(isset( $_POST['FilasAMostrarXPagina']) && isset( $_POST['page']) ) 	{ 

	$MaxPaginasAMostrar = $_POST['FilasAMostrarXPagina']; 
	$page = $_POST['page']; 
	
	$IndexFinal=0 ;
	$IndexInicial=0 ;
	$Cont=0;
	
	while ($Cont < $page)
	{
	     $IndexFinal += $MaxPaginasAMostrar;
		$Cont +=1;
	}
	
	$IndexInicial = $IndexFinal - $MaxPaginasAMostrar;

	
	
	echo "Pagina (" .$page. ") SELECT * FROM Articulos LIMIT " . $IndexInicial . "," . $IndexFinal ;
}


?>