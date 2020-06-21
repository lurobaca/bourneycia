<?php
	  include('../Class/conexion.class.php'); 
	class Paginas{
 //constructor	
 	var $con;
 	function Paginas(){
 		$this->con=new conexion;
 	}
	
	/* Obtiene El numero de Paginas Totales y El numero de paginas a mostrar segun el numero de finlas a mostrar*/
	function ConsultaPagina($user,$FilasAMostrar,$Descripcion){
		try{
		 if($this->con->conectar()==true){
			$NumPaginas ;
			$TotalFinalas;
			
			$Restriccion = $this->ObtieneRestriccion($user);
					
			
			if ($Descripcion<>"" && $Restriccion<>"")
			$result = mysql_query("SELECT COUNT(*) FROM  `Articulos` WHERE ItemName LIKE  '%".$Descripcion."%' and ".$Restriccion."  ORDER BY PuntosWeb DESC"); 
			elseif ($Descripcion<>"" )
			$result = mysql_query("SELECT COUNT(*) FROM  `Articulos` WHERE ItemName LIKE  '%".$Descripcion."%'   ORDER BY PuntosWeb DESC"); 
			elseif ($Restriccion<>"" )
			$result = mysql_query("SELECT COUNT(*) FROM  `Articulos` WHERE ".$Restriccion." ORDER BY PuntosWeb DESC"); 
			else
			$result = mysql_query("SELECT COUNT(*) FROM  `Articulos` ORDER BY PuntosWeb DESC ");     
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
	function ConsultaDatosdePagina($user,$LimiteINICIO,$LimiteFIN){
		try{
			//si no esta vacio
				if(empty($user)== false)
			   $Restriccion = $this->ObtieneRestriccion($user);
			   else 
			   $Restriccion ="";
			   
		 if($this->con->conectar()==true){
			$NumPaginas ;
			$TotalFinalas;
			if(empty($Restriccion)== false)
			   $result = mysql_query("SELECT * FROM  `Articulos` where ".$Restriccion." ORDER BY PuntosWeb DESC LIMIT ".$LimiteINICIO.",".$LimiteFIN."  ");
			else
			$result = mysql_query("SELECT * FROM  `Articulos` ORDER BY PuntosWeb DESC LIMIT ".$LimiteINICIO.",".$LimiteFIN."  ");
			return $result;
		 }
		}
        catch(Exception $e){ echo $e;}
	}

	 function mostrar_Rutero($user,$LimiteINICIO,$LimiteFIN){
		   try{
		if($this->con->conectar()==true){
			
			//obtiene los codigos de los articulos en el rutero
			return mysql_query("SELECT * FROM  `RUTEROS` WHERE CodCliente = '".$user."' ORDER BY PuntosWeb DESC LIMIT ".$LimiteINICIO.",".$LimiteFIN." "); 
				
					
		}
		  }catch(Exception $e){ echo $e;}
	 
		 }
	//genera la restriccion segun el ususario que logee
	function ObtieneRestriccion($user)
	{
	try{
		if($this->con->conectar()==true){
		//seleccionar agente
		$ResulAgente= mysql_query("SELECT `SlpCode`,`CardName` FROM `Cliente_Proveedores` WHERE `CardCode`='".$user."'"); 
		 if($ResulAgente){
						
		
		// if(mysql_num_rows($ResulAgente) == "0"){
			 $Info = mysql_fetch_array($ResulAgente);
		  
			
			
			 //Restringe Articulos segun el cliente
			if( $Info['SlpCode']== "2" ||  $Info['SlpCode']== "3" || $Info['SlpCode']== "4" || $Info['SlpCode']== "6" || $Info['SlpCode']== "10" || $Info['SlpCode']== "12"  || $Info['SlpCode']== "15" || $Info['SlpCode']== "17" || $Info['SlpCode']== "18" || $Info['SlpCode']== "19" || $Info['SlpCode']== "21")
				 {
				$Restriccion =""; 
			 }		
			 
			 
			
			if( $Info['SlpCode']== "11" || $Info['SlpCode']== "13" || $Info['SlpCode']== "14" || $Info['SlpCode']== "16" || $Info['SlpCode']== "22" || $Info['SlpCode']== "5" || $Info['SlpCode']== "8" || $Info['SlpCode']== "9" || strpos($Info['CardName'], 'UPALA')  || strpos($Info['CardName'], 'CANALETE') )
			{
			    $Restriccion = "CardCode <> 'P094' and CardCode <> 'P074' and CardCode <> 'P005'";
			}
						
			//GRUPO TICOTRADE
			if(strpos($Info['CardName'], 'QUEPOS')   || strpos($Info['CardName'], 'PARRITA') || strpos($Info['CardName'], 'MANUEL ANTONIO') ) 
			{ 
    			$Restriccion = "CardCode <> 'P038' and CardCode <> 'P052' and CardCode <> 'P006' and CardCode <> 'P069' and CardCode <> 'P008' and CardCode <> 'P091'";
			} 
			 
		 }
		
		}
		
		return $Restriccion;
		
		
		 }catch(Exception $e){  return "Error ".$e;}
	       
		
		
		}
  function mostrar_Articulo($user,$PalabraABuscar,$LimiteINICIO,$LimiteFIN){
	  try{
		if($this->con->conectar()==true){
		
				
		$Restriccion = $this->ObtieneRestriccion($user);
		
		//cargar la variable $RestriccionProveedor con todas las restricciones mediante un ciclo
		//$RestriccionProveedor = "and CardCode <> 'P094'"
		
		
		//si tiene algo
		if ($PalabraABuscar<>"" && $Restriccion<>"")
			$Resultad1= mysql_query("SELECT * FROM Articulos WHERE ItemName LIKE  '".$PalabraABuscar."%'  and ".$Restriccion."  ORDER BY PuntosWeb DESC LIMIT ".$LimiteINICIO.",".$LimiteFIN." "); 
		elseif ($PalabraABuscar<>"" )
		$Resultad1= mysql_query("SELECT * FROM Articulos WHERE ItemName LIKE  '".$PalabraABuscar."%'  ORDER BY PuntosWeb DESC LIMIT ".$LimiteINICIO.",".$LimiteFIN." "); 
		elseif ( $Restriccion<>"")
		$Resultad1= mysql_query("SELECT * FROM Articulos WHERE ".$Restriccion."  ORDER BY PuntosWeb DESC LIMIT ".$LimiteINICIO.",".$LimiteFIN." "); 
		
		
		    //Primero buscamos por descipcion
			
			
			  $Datos = "Resultado de descripcion [ " . mysql_num_rows($Resultad1) ." ]";  
			//si no se encontro por descripcion buscamos por FAMILIA
			 if(mysql_num_rows($Resultad1) == "0"){
					if(empty($Restriccion)== false)
				 $Resultad2= mysql_query("SELECT * FROM Articulos WHERE FAMILIA LIKE  '%".$PalabraABuscar."%' and ".$Restriccion." ORDER BY PuntosWeb DESC LIMIT ".$LimiteINICIO.",".$LimiteFIN."  "); 
				 else
				 	 $Resultad2= mysql_query("SELECT * FROM Articulos WHERE FAMILIA LIKE  '%".$PalabraABuscar."%' ORDER BY PuntosWeb DESC LIMIT ".$LimiteINICIO.",".$LimiteFIN."  "); 
				 
				 //si no se encontro por descripcion buscamos por MARCA
			 	if(mysql_num_rows($Resultad2) == "0"){
						if(empty($Restriccion)== false)
					$Resultad3= mysql_query("SELECT * FROM Articulos WHERE  MARCA LIKE  '%".$PalabraABuscar."%' and ".$Restriccion." ORDER BY PuntosWeb DESC LIMIT ".$LimiteINICIO.",".$LimiteFIN."  ");    
					else
					$Resultad3= mysql_query("SELECT * FROM Articulos WHERE  MARCA LIKE  '%".$PalabraABuscar."%' ORDER BY PuntosWeb DESC LIMIT ".$LimiteINICIO.",".$LimiteFIN."  ");   
					      
			  	 	//si no se encontro por descripcion buscamos por CATEGLORIA
					if(mysql_num_rows($Resultad3) == "0"){
							if(empty($Restriccion)== false)
						$Resultad4= mysql_query("SELECT * FROM Articulos WHERE CATEGORIA LIKE  '%".$PalabraABuscar."%' and ".$Restriccion." ORDER BY PuntosWeb DESC LIMIT ".$LimiteINICIO.",".$LimiteFIN."  "); 
						else
							$Resultad4= mysql_query("SELECT * FROM Articulos WHERE CATEGORIA LIKE  '%".$PalabraABuscar."%' ORDER BY PuntosWeb DESC LIMIT ".$LimiteINICIO.",".$LimiteFIN."  "); 
						       			   	//Si no encontro nada manda el mensaje	
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