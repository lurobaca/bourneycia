<?php 
include_once("conexion.class.php");

class Articulos{
 //constructor	
 	var $con;
 	function Articulos(){
 		$this->con=new conexion;
 	}

	/*function insertar($campos){
		if($this->con->conectar()==true){
			//print_r($campos);
			//echo "INSERT INTO cliente (nombres, ciudad, sexo, telefono, fecha_nacimiento) VALUES ('".$campos[0]."', '".$campos[1]."','".$campos[2]."','".$campos[3]."','".$campos[4]."')";
			return mysql_query("INSERT INTO usuarios (nombres,apellidos, ciudad, sexo, clave, fecha_nacimiento) VALUES ('".$campos[0]."', '".$campos[1]."','".$campos[2]."','".$campos[3]."','".$campos[4]."','".$campos[5]."')");
		}
	}
	
	function actualizar($campos,$id){
		if($this->con->conectar()==true){
			//print_r($campos);
			return mysql_query("UPDATE usuarios SET nombres = '".$campos[0]."',apellidos='".$campos[1]."', ciudad = '".$campos[2]."', sexo = '".$campos[3]."', clave = '".$campos[4]."', fecha_nacimiento = '".$campos[5]."' WHERE id = ".$id);
		}
	}
	
	function mostrar_Articulo($id){
		if($this->con->conectar()==true){
			return mysql_query("SELECT * FROM usuarios WHERE id=".$id);
		}
	}
	function eliminar($id)
	{
		if($this->con->conectar()==true){
			return mysql_query("DELETE FROM usuarios WHERE id=".$id);
		}
	}
*/
   
     function AutoCompletar(){
		if($this->con->conectar()==true){
			//consulta para seleccionar las palabras a buscar, esto va a depender de su base de datos
			$con = "select * from Articulos order by PuntosWeb desc";
     		return mysql_query($con);
			
		}else {echo "no pudo conectar";}
	}
	
   function Top100_Articulo(){
		if($this->con->conectar()==true){
		
			return mysql_query("select top 100 * from Articulos");
			
		}else {echo "no pudo conectar";}
	}

	function mostrar_Articulo($PalabraABuscar){
		if($this->con->conectar()==true){
		    //Primero buscamos por descipcion
			$Resultad1= mysql_query("SELECT * FROM Articulos WHERE ItemName LIKE  '".$PalabraABuscar."%'  ORDER BY PuntosWeb DESC  ");          
			$Contador= mysql_num_rows ($Resultad1);
			 $Datos = "Consulto ItemName [" . $Contador . " ]" ;				
			//si no se encontro por descripcion buscamos por FAMILIA
			if( $Contador == 0 ){
			    $Resultad2= mysql_query("SELECT * FROM Articulos WHERE FAMILIA LIKE  '%".$PalabraABuscar."%'  ORDER BY PuntosWeb DESC  ");          
			   			 $Datos = "Consulto FAMILIA ";				
			  }
				  //$Datos =$Resultad1;
			 
			//  $Datos =$Resultad2;
			/* $Contador = 0;
			while( $Articulos = mysql_fetch_array($Resultad2) ) {
				 $Contador+=1;
				 }	
			  //si no se encontro por descripcion buscamos por MARCA
			 $FilasObtenidas = mysql_affected_rows($Resultad2);
			 if( $FilasObtenidas = 0){
				$Resultad3= mysql_query("SELECT * FROM Articulos WHERE  MARCA LIKE  '%".$PalabraABuscar."%'  ORDER BY PuntosWeb DESC  ");          
			   }else
			    $Datos =$Resultad2;
			 
			 
			  $Contador = 0;
			while( $Articulos = mysql_fetch_array($Resultad3) ) {
				 $Contador+=1;
				 }	
			 
			 //si no se encontro por descripcion buscamos por CATEGLORIA
			    $FilasObtenidas = mysql_affected_rows($Resultad3);
			  if($FilasObtenidas = 0){
				$Resultad4= mysql_query("SELECT * FROM Articulos WHERE CATEGORIA LIKE  '%".$PalabraABuscar."%'  ORDER BY PuntosWeb DESC  ");          
				$Datos =$Resultad4;
			   	} else
				$Datos =$Resultad3;
				
			$Contador = 0;
			while( $Articulos = mysql_fetch_array($Resultad3) ) {
				 $Contador+=1;
				 }  
				  
				  
				  $FilasObtenidas = mysql_affected_rows($Resultad4);
				 if($FilasObtenidas = 0){
					$Datos ="No se encontraron Datos con la palabra [ " + $PalabraABuscar +  " ]";
				} 	*/
					
			
			return $Datos;
			
		}else {echo "no pudo conectar";}
	}//fin de funcion
	
	
		function mostrar_Articulo_familia($familia){
		if($this->con->conectar()==true){
			return mysql_query("SELECT * FROM Articulos WHERE FAMILIA LIKE  '%".$familia."%'  ORDER BY PuntosWeb DESC  ");

		}else {echo "no pudo conectar";}
	}
		function mostrar_Articulo_categoria($categoria){
		if($this->con->conectar()==true){
			return mysql_query("SELECT * FROM Articulos WHERE CATEGORIA LIKE  '%".$categoria."%'  ORDER BY PuntosWeb DESC  ");

		}else {echo "no pudo conectar";}
	}
	function mostrar_Articulo_marca($marca){
		if($this->con->conectar()==true){
			return mysql_query("SELECT * FROM Articulos WHERE MARCA LIKE  '%".$marca."%'  ORDER BY PuntosWeb DESC  ");

		}else {echo "no pudo conectar";}
	}
	function mostrar_Articulos(){
		if($this->con->conectar()==true){
	
     			return mysql_query("SELECT * FROM Articulos ORDER BY PuntosWeb DESC");
			
		}
	}

	function mostrar_FAMILIAS(){
		if($this->con->conectar()==true){
			return mysql_query("SELECT  `FAMILIA` FROM  `Articulos` GROUP BY FAMILIA ");
		}
	}
	function mostrar_CATEGORIAS(){
		if($this->con->conectar()==true){
			return mysql_query("SELECT  `CATEGORIA` FROM  `Articulos` GROUP BY CATEGORIA ");
		}
	}
	function mostrar_MARCAS(){
		if($this->con->conectar()==true){
			return mysql_query("SELECT  `MARCA` FROM  `Articulos` GROUP BY MARCA ");
		}
	}

function mostrar_OFERTAS(){
		if($this->con->conectar()==true){
			return mysql_query("SELECT * FROM  `Articulos` WHERE  `ItemName` LIKE  'OF%' GROUP BY ItemName LIMIT 0 , 50");
		}
	}

function mostrar_Cubo_VEntas($Cod_Proveedor){
		if($this->con->conectar()==true){
			return mysql_query("SELECT * FROM  `Cubo_Ventas` WHERE  `Cod Proveedor` =  'P005'");
		}
	}
}
?>