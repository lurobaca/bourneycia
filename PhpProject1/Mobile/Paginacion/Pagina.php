<?php
	  include('../Class/conexion.class.php'); 
	class Paginas{
 //constructor	
 	var $con;
 	function Paginas(){
 		$this->con=new conexion;
 	}
	
	/* Obtiene El numero de Paginas Totales y El numero de paginas a mostrar segun el numero de finlas a mostrar*/
	function ConsultaPagina($FilasAMostrar,$Descripcion){
		try{
		 if($this->con->conectar()==true){
			$NumPaginas ;
			$TotalFinalas;
			if ($Descripcion<>"")
			$result = mysql_query("SELECT COUNT(*) FROM  `Articulos` WHERE ItemName LIKE  '%".$Descripcion."%'  ORDER BY PuntosWeb DESC"); 
			else
			$result = mysql_query("SELECT COUNT(*) FROM  `Articulos` ORDER BY `PuntosWeb`DESC ");     
			//si No devuelve nada con el nombre de usuario , es por que lo existe el usuario digitado
			
		 if(mysql_num_rows($result)){
			$row=mysql_fetch_row($result);
			$TotalFinalas = $row[0];
			
			$NumPaginas = $TotalFinalas / $FilasAMostrar  ;	
			
		 }else {	echo "no hay registros " ;}
		 
			//return $NumPaginas;
			return $NumPaginas;
			
		 }
		}
        catch(Exception $e){ echo $e;}
	}
	
		/* Obtiene El numero de Paginas Totales y El numero de paginas a mostrar segun el numero de finlas a mostrar*/
	function ConsultaDatosdePagina($LimiteINICIO,$LimiteFIN){
		try{
		 if($this->con->conectar()==true){
			$NumPaginas ;
			$TotalFinalas;
			$result = mysql_query("SELECT * FROM  `Articulos` ORDER BY `PuntosWeb` DESC LIMIT ".$LimiteINICIO.",".$LimiteFIN."  ");
			return $result;
		 }
		}
        catch(Exception $e){ echo $e;}
	}

	 function mostrar_Rutero($user,$LimiteINICIO,$LimiteFIN){
		   try{
		if($this->con->conectar()==true){
			
			//obtiene los codigos de los articulos en el rutero
			return mysql_query("SELECT * FROM  `RUTEROS` WHERE CodCliente = '".$user."' ORDER BY `PuntosWeb` DESC LIMIT ".$LimiteINICIO.",".$LimiteFIN." "); 
				
					
		}
		  }catch(Exception $e){ echo $e;}
	 
		 }
	
	
  function mostrar_Articulo($PalabraABuscar,$LimiteINICIO,$LimiteFIN){
	  try{
		if($this->con->conectar()==true){
		
		
		    //Primero buscamos por descipcion
			$Resultad1= mysql_query("SELECT * FROM Articulos WHERE ItemName LIKE  '".$PalabraABuscar."%' ORDER BY `PuntosWeb` DESC LIMIT ".$LimiteINICIO.",".$LimiteFIN." "); 
			  $Datos = "Resultado de descripcion [ " . mysql_num_rows($Resultad1) ." ]";  
			//si no se encontro por descripcion buscamos por FAMILIA
			 if(mysql_num_rows($Resultad1) == "0"){
				 $Resultad2= mysql_query("SELECT * FROM Articulos WHERE FAMILIA LIKE  '%".$PalabraABuscar."%' ORDER BY `PuntosWeb` DESC LIMIT ".$LimiteINICIO.",".$LimiteFIN."  "); 
				 //si no se encontro por descripcion buscamos por MARCA
			 	if(mysql_num_rows($Resultad2) == "0"){
					$Resultad3= mysql_query("SELECT * FROM Articulos WHERE  MARCA LIKE  '%".$PalabraABuscar."%' ORDER BY `PuntosWeb` DESC LIMIT ".$LimiteINICIO.",".$LimiteFIN."  ");          
			  	 	//si no se encontro por descripcion buscamos por CATEGLORIA
					if(mysql_num_rows($Resultad3) == "0"){
						$Resultad4= mysql_query("SELECT * FROM Articulos WHERE CATEGORIA LIKE  '%".$PalabraABuscar."%' ORDER BY `PuntosWeb` DESC LIMIT ".$LimiteINICIO.",".$LimiteFIN."  ");        			   	//Si no encontro nada manda el mensaje	
		     			if(mysql_num_rows($Resultad4) == "0"){
						   $Datos ="No se encontraron Datos con la palabra [ " + $PalabraABuscar +  " ]";
						   //$Datos =$Resultad4;
				 	      } else{ $Datos =$Resultad4;}
			   	     } else	{ $Datos =$Resultad3;}
			     }else {$Datos =$Resultad2;}
			  }else { $Datos =$Resultad1;}
			   // $Datos =$Resultad1;
	     
				
		 
				 
		
					
			
			return $Datos;
			
		}else {echo "no pudo conectar";}
	  }catch(Exception $e){ echo $e;}
	}//fin de funcion

} 
?>