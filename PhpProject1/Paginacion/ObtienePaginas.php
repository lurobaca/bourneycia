<?php
 	/*Obtiene Paginas sirve para crear los Numeros de pagina del ANTERIOR 1 2 3 4 5 6 7 8 9 SIGUIENTE*/
	include("Pagina.php");
	
	$Class = "NumPaginaACTIVO";
	
	if($_POST['DESCRIPCION'] <> ""){
		$DESCRIPCION = $_POST['DESCRIPCION'];
	}else
	   $DESCRIPCION = "";
	/*Si se envia page es por que se desea mostrar los siguientes 10 link de paginas*/
	if($_POST['page']){
		$Cont = $_POST['page'];
		$pagina = $_POST['page'];
		$MaxPaginasAMostrar  =  $_POST['MaxPaginasAMostrar'];
		
		
		   
	}else{
		$Cont = 0;
		$pagina= 0;
		$MaxPaginasAMostrar = 10;
	}
		
	$Boton;
	if (isset($_POST['Boton'])) 
		$Boton = $_POST ['Boton'];
	//si se esta precionando el boton hacia atras
	if($Boton=="Anterior")
	   $Cont =$Cont-9;
	   
	//$FilasAMostrarXPagina con esto indicamos el numero de finas a mostrar x pagina , este valor tambine se usa como el LIMIT dek SELECT * FROM Articulos LIMIT 50
	$FilasAMostrarXPagina = 25;
	//$MaxPaginasAMostrar con esto controlamos cuantas paginas mostraremos luego de este numero usamos SIGUIENTE Y ANTERIOR
	
	$PrimerPagina = 0 ;
	$UltimaPagina = 5;
		$user;
		
	if (isset($_POST['usuario'])) 
		$user = $_POST ['usuario']; 
	else  $user = "0";
	$objArticulos=new Paginas;
	
	$NumPaginas=$objArticulos->ConsultaPagina($user,$FilasAMostrarXPagina,$DESCRIPCION);
				
	$ultimaPagina = $NumPaginas;
				
	$NumPaginas+1;

	
	
	   
	if($NumPaginas>1)
	{
		
	if($pagina-1  <= 0)
	echo "<a href='#' class='NumPagina' id ='Anterior' style='cursor:pointer; display:none;'  onclick='Anterior(this.id,". $FilasAMostrarXPagina ."," .$MaxPaginasAMostrar.",\"".trim($user)."\",\"Anterior\");return false;' disable >Anterior </a>";
	else
    echo "<a href='#'  class='NumPagina' id ='Anterior' style='cursor:pointer'  onclick='Anterior(this.id,". $FilasAMostrarXPagina ."," .$MaxPaginasAMostrar.",\"".trim($user)."\",\"Anterior\");return false;' >  Anterior </a>";
    
	/*Recorro*/
	while ($Cont < $NumPaginas){
		if ($Cont < $MaxPaginasAMostrar ){
				
			if($Cont==0)
			  $Class = "NumPaginaACTIVO";
			else
        	   $Class = "NumPagina";	
		   	   
		      
			echo "<a href='#'  class='".$Class ."'  id ='".$Cont."' style='cursor:pointer' onclick='PasarPagina(this.id,". $FilasAMostrarXPagina ."," .$MaxPaginasAMostrar.",\"".trim($user)."\",\"\");return false;' >".$Cont."</a>";
		   }else{//Habilitar siguiente
		     break;
		     }
		
		
		   
		$Cont+=1;
		}
	if($pagina+9  >= $ultimaPagina)
	echo "<a href='#'  class='NumPagina' id ='Siguiente' style='cursor:pointer; display:none;' onclick='Siguiente(this.id,". $FilasAMostrarXPagina ."," .$MaxPaginasAMostrar.",\"".trim($user)."\",\"Siguiente\");return false;' disable >Siguiente</a>";
	else
		echo "<a href='#'  class='NumPagina' id ='Siguiente' style='cursor:pointer' onclick='Siguiente(this.id,". $FilasAMostrarXPagina ."," .$MaxPaginasAMostrar.",\"".trim($user)."\",\"Siguiente\");return false;' >Siguiente </a>";
		
	}
	
	

?>



