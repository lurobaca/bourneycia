<?php
/*Obtiene Paginas sirve para crear los Numeros de pagina del ANTERIOR 1 2 3 4 5 6 7 8 9 SIGUIENTE*/



include("Pagina.php");
/*Si se envia page es por que se desea mostrar los siguientes 10 link de paginas*/
if($_POST['page'])
{

$Cont = $_POST['page'];
$MaxPaginasAMostrar  =  $_POST['MaxPaginasAMostrar'];

}else
{
	$Cont = 1;
	$MaxPaginasAMostrar = 10;
}
	//$FilasAMostrarXPagina con esto indicamos el numero de finas a mostrar x pagina , este valor tambine se usa como el LIMIT dek SELECT * FROM Articulos LIMIT 50
	$FilasAMostrarXPagina = 50;
	//$MaxPaginasAMostrar con esto controlamos cuantas paginas mostraremos luego de este numero usamos SIGUIENTE Y ANTERIOR
	
	$PrimerPagina = 1 ;
	$UltimaPagina = 5;
	
	$objArticulos=new Paginas;
	$NumPaginas=$objArticulos->ConsultaPagina($FilasAMostrarXPagina);
	
			
	$NumPaginas+1;
	
    echo "<a class='NumPagina' id ='Anterior'  href='#' onclick='Anterior(this.id,". $FilasAMostrarXPagina ."," .$MaxPaginasAMostrar.")' >Anterior</a>";

	while ($Cont < $NumPaginas){
		if ($Cont < $MaxPaginasAMostrar ){
			echo "<a class='NumPagina' id ='".$Cont."'  href='#' onclick='PasarPagina(this.id,". $FilasAMostrarXPagina ."," .$MaxPaginasAMostrar.")' >".$Cont."</a>";
		   }else{//Habilitar siguiente
		     }
		
		$Cont+=1;
		}
	
		echo "<a class='NumPagina' id ='Siguiente' href='#' onclick='Siguiente(this.id,". $FilasAMostrarXPagina ."," .$MaxPaginasAMostrar.")' >Siguiente</a>";


?>



