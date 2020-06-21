<?php

include_once("conexion.class.php");


class Inventario{
 //constructor	
 	var $con;
 	function Inventario(){
 		$this->con=new conexion;
 	}

 	function Login($CodGrupo){
       
		if($this->con->conectar()==true){
			//Verifica si el grupo existe y si el conteo indicado esta habilitado
			 $Grupo='';
			 $Conteo='';
			 $cadena=$CodGrupo; 
			 $Retorna="";
			 $CodInventario="";
             $CargarCodInventario=false;
			
			$longitud = strlen($cadena);

			for ($i=0; $i<=$longitud ;$i++){
				
		  		  if(is_numeric($cadena[$i])) {
				    	//es numero
				    	$Conteo=$Conteo.$cadena[$i];
				  }else {
	        		    $Grupo=$Grupo.$cadena[$i];
	        		}
			}

		
		//$con = "SELECT COUNT(Conteo) FROM `Inv_ConActivo` WHERE `Grupo`='".$Grupo."' AND `Conteo`='".$Conteo."'";
        $con = "SELECT COUNT(Conteo) FROM `Inv_ConActivo` WHERE `Grupo`='".$Grupo."' AND `Conteo`=".$Conteo."' AND `IdInventario`=(SELECT IdInventario FROM `inv_inventario` where Cerrado='0' limit 1)";
			  $Resultado=mysql_query($con,$this->con->conect);

			if(mysql_num_rows($Resultado)) {
				$row=mysql_fetch_row($Resultado);
					$Retorna=$row[0];
		    	}
		    else 
		       $Returna= "";


     		return $Retorna;
			
		}else {return "no pudo conectar";}
	


	}
	function ObtieneCasasEnGrupo($CodGrupo){
		$con;
		 $resultado;
		  $LineaIntercalada=0;
		  	 $Busqueda="";
		  $Articulos='';
 //Verifica si el grupo existe y si el conteo indicado esta habilitado
			 $Grupo='';
			 $Conteo='';
			 $cadena=$CodGrupo; 
			 $Retorna="";
			 $CodInventario="";
             $CargarCodInventario=false;
		
			$longitud = count($cadena);

			for ($i=0; $i<=$longitud ;$i++){
				  if(is_numeric($cadena[$i])) {
				    	//es numero
				    	if($CargarCodInventario==true){
							$CodInventario=$CodInventario.$cadena[$i];
				    	}else{
							$Conteo=$Conteo.$cadena[$i];
				    	}
				  }else {
	        			//no es numerico
	        			//busca el guion 
	        			if($cadena[$i]=="-"){
	        				 $CargarCodInventario=true;
	        			}else{
							$Grupo=$Grupo.$cadena[$i];
	        			}
        			}
			}//fin for
	//$Retorna="Grupo=". $Grupo ." Conteo= ".$Conteo ;

		if($this->con->conectar()==true){
			$con="SELECT `CodProveedor`,`NombreProveedor` FROM `Inv_Grupos` where idGrupo='".trim($Grupo)."' AND CodInventario=(SELECT IdInventario FROM `inv_inventario` where Cerrado='0' limit 1)";
  		 
		   $Resultado=mysql_query($con,$this->con->conect);
			if(mysql_num_rows($Resultado)){
				//se genera la tabla a mostrar
 				echo "<table border='1' >
			    	<tr>
			      	<td ><strong><div  class='Linea1'>Codigo</div></strong></td>
			      	<td><strong><div  class='Linea1'>Nombre</div></strong></td>
			      	</tr>";
				  while( $Articulos = mysql_fetch_array($Resultado) ) {	 
		  	
					  	if ( $LineaIntercalada==0){
					  		$LineaIntercalada=1;
								 $Retorna= $Retorna."<tr>
						    	<td><div  class='Linea1'>".$Articulos['CodProveedor']."</div></td>
						      	<td><div id='fila-".$Articulos['CodProveedor']."' class='Linea1' ><a href=\"javascript:IrALista('".$CodGrupo."','".$Grupo."',$Conteo,'".$Articulos['CodProveedor']."','".$Busqueda."');\">".$Articulos['NombreProveedor']."</a></div></td>
						      
						    	</tr>";
					  	}else{
					  		 $LineaIntercalada=0;
					  		 	 $Retorna= $Retorna."<tr>
						    	<td  class='Linea11'><div  class='Linea1'>".$Articulos['CodProveedor']."</div></td>
						      	<td  class='Linea11'><div id='fila-".$Articulos['CodProveedor']."' class='Linea1' ><a href=\"javascript:IrALista('".$CodGrupo."','".$Grupo."',$Conteo,'".$Articulos['CodProveedor']."','".$Busqueda."');\">".$Articulos['NombreProveedor']."</a></div></td>
						      
						    	</tr>";
					  	}
						}
 			
	               } 
         		 $Retorna= $Retorna."</table>";

		}

		return $Retorna;
		
	}
	

	function ObtieneListaProveedores($CodGrupo){
		 $con;
		 $resultado;

//SELECT `idGrupo`, `CodProveedor`, `NombreProveedor`, `Responsable`, `Acompanante` FROM `Inv_Grupos` WHERE 1
		if($this->con->conectar()==true){
			$con="SELECT `CodProveedor` FROM `Inv_Grupos` where idGrupo='" . $CodGrupo . "' AND CodInventario=(SELECT IdInventario FROM `inv_inventario` where Cerrado='0' limit 1)";
  			$resultado= mysql_query($con,$this->con->conect);
		}

		return $resultado;
		
	}
	function ObtieneLista2($CodGrupo,$Busqueda,$CodProveedor){
			 $IdInven=$this->ObtieneIdInventario();
     		 //Verifica si el grupo existe y si el conteo indicado esta habilitado
			 $Grupo='';
			 $Conteo='';
			 $cadena=$CodGrupo; 
			 $Retorna="";
			 $CodInventario="";
             $CargarCodInventario=false;
			
			$longitud = count($cadena);

			for ($i=0; $i<=$longitud ;$i++){
				  if(is_numeric($cadena[$i])) {
				    	//es numero
				    	if($CargarCodInventario==true){
							$CodInventario=$CodInventario.$cadena[$i];
				    	}else{
							$Conteo=$Conteo.$cadena[$i];
				    	}
				  }else {
	        			//no es numerico
	        			//busca el guion 
	        			if($cadena[$i]=="-"){
	        				 $CargarCodInventario=true;
	        			}else{
							$Grupo=$Grupo.$cadena[$i];
	        			}
        			}
			}//fin for

      

       	

		if($this->con->conectar()==true){
			
		//DEPENDIENDO del conteo elije el que este activo
        //Genera la consulta para obtener el inventario de las casas asignadas al grupo
			if($Busqueda==""){
				$con = "SELECT 
						T1.Codigo, 
						T1.Descripcion, 
						CASE WHEN T0.Cuenta=0 THEN '' ELSE T0.Cuenta END as Conteo, 
						T1.CodBarras 
						FROM `Inv_Conteos` T0 
						INNER JOIN Inv_Inventario T1 ON T0.CodArticulo = T1.Codigo AND T0.IdInventario= T1.IdInventario  
						WHERE T0.NumConteo='".trim($Conteo)."' AND 
							  T0.Grupo='".trim($Grupo)."' AND T0.CodProveedor='".trim($CodProveedor)."' AND
							  T0.IdInventario='". $IdInven."' AND 
							  T0.Reconteo=0
							  ORDER BY T1.Codigo ASC";
			
	
	       
		   
		    }else
	        {
				//SI bUSQUEDA TIENE ALGO 

$con = "SELECT 
						T1.Codigo, 
						T1.Descripcion, 
						CASE WHEN T0.Cuenta=0 THEN '' ELSE T0.Cuenta END as Conteo, 
						T1.CodBarras 
						FROM `Inv_Conteos` T0 
						INNER JOIN Inv_Inventario T1 ON T0.CodArticulo = T1.Codigo  AND T0.IdInventario= T1.IdInventario  
						WHERE T0.NumConteo='".trim($Conteo)."' AND 
							  T0.Grupo='".trim($Grupo)."' AND  T0.CodProveedor='".trim($CodProveedor)."' AND
							  T0.IdInventario='". $IdInven."' AND 
							  T0.Reconteo=0 AND 
							  T1.Descripcion LIKE '%".$Busqueda."%'";
							  
			
	
        	}


        	$Codigo='';
         	$LineaIntercalada=0;
          	$Descripcion='';
		 
		    $Resultado=mysql_query($con,$this->con->conect);

			if(mysql_num_rows($Resultado)){
				//se genera la tabla a mostrar
 				$Retorna=$Retorna. "<table border='0.5' >
			    ";
				  while( $Articulos = mysql_fetch_array($Resultado) ) {	 
		  	
					  	if ( $LineaIntercalada==0){
					  		$LineaIntercalada=1;
								$Retorna=$Retorna. "<tr class='Cliquear'>
						    	


						      	<td colspan='2'><div id='fila-".$Articulos['Codigo']."' class='Linea' align='left' ><a href=\"javascript:AgregaCuenta('".$Articulos['Codigo']."','$Grupo',".$Conteo.",'".$Busqueda."','".trim($Grupo).$Conteo."','".trim($CodProveedor)."');\">".$Articulos['Descripcion']."</a></div></td>

								
						    	</tr>
<tr>
						    	<td><div  class='Linea1'>  Cto:	  ".$Articulos['Conteo']."</div></td>
						      	<td><div  class='Linea1'>  Barras :	  ".$Articulos['CodBarras']."</div></td>
						      	</tr>";
					  	}else{
					  		 $LineaIntercalada=0;
					  		 	$Retorna=$Retorna. "<tr class='Cliquear'>
						 


						      	<td colspan='2' class='Linea11'><div id='fila-".$Articulos['Codigo']."' class='Linea' align='left' ><a href=\"javascript:AgregaCuenta('".$Articulos['Codigo']."','$Grupo',".$Conteo.",'".$Busqueda."','".trim($Grupo).$Conteo."','".trim($CodProveedor)."');\">".$Articulos['Descripcion']."</a></div></td>

						      	   	
						    	</tr>
<tr>
						    	<td  class='Linea11'><div  class='Linea1'>  Cto:	  ".$Articulos['Conteo']."</div></td>
						      	<td  class='Linea11'><div  class='Linea1'>  Barras :	  ".$Articulos['CodBarras']."</div></td>
</tr>
						      	";
					  	}
 			
	               } 
         		$Retorna=$Retorna. "</table>";



	          }else { echo "No se encontro nada";}

  		
		}//FIN VERIFICA CONEXION
		return $Retorna;
	}
	function ObtieneLista($CodGrupo,$Busqueda){
			 $IdInven=$this->ObtieneIdInventario();
     		 //Verifica si el grupo existe y si el conteo indicado esta habilitado
			 $Grupo='';
			 $Conteo='';
			 $cadena=$CodGrupo; 
			 $Retorna="";
			 $CodInventario="";
             $CargarCodInventario=false;
			
			$longitud = count($cadena);

			for ($i=0; $i<=$longitud ;$i++){
				  if(is_numeric($cadena[$i])) {
				    	//es numero
				    	if($CargarCodInventario==true){
							$CodInventario=$CodInventario.$cadena[$i];
				    	}else{
							$Conteo=$Conteo.$cadena[$i];
				    	}
				  }else {
	        			//no es numerico
	        			//busca el guion 
	        			if($cadena[$i]=="-"){
	        				 $CargarCodInventario=true;
	        			}else{
							$Grupo=$Grupo.$cadena[$i];
	        			}
        			}
			}//fin for

      

       	

		if($this->con->conectar()==true){
			
		//DEPENDIENDO del conteo elije el que este activo
        //Genera la consulta para obtener el inventario de las casas asignadas al grupo
			if($Busqueda==""){
				$con = "SELECT 
						T1.Codigo, 
						T1.Descripcion, 
						CASE WHEN T0.Cuenta=0 THEN '' ELSE T0.Cuenta END as Conteo, 
						T1.CodBarras 
						FROM `Inv_Conteos` T0 
						INNER JOIN Inv_Inventario T1 ON T0.CodArticulo = T1.Codigo AND T0.IdInventario= T1.IdInventario  
						WHERE T0.NumConteo='".trim($Conteo)."' AND 
							  T0.Grupo='".trim($Grupo)."' AND 
							  T0.IdInventario='". $IdInven."' AND 
							  T0.Reconteo=0
							  ORDER BY T1.Codigo ASC";
			
	
	       
		   
		    }else
	        {
				//SI bUSQUEDA TIENE ALGO 

$con = "SELECT 
						T1.Codigo, 
						T1.Descripcion, 
						CASE WHEN T0.Cuenta=0 THEN '' ELSE T0.Cuenta END as Conteo, 
						T1.CodBarras 
						FROM `Inv_Conteos` T0 
						INNER JOIN Inv_Inventario T1 ON T0.CodArticulo = T1.Codigo  AND T0.IdInventario= T1.IdInventario  
						WHERE T0.NumConteo='".trim($Conteo)."' AND 
							  T0.Grupo='".trim($Grupo)."' AND 
							  T0.IdInventario='". $IdInven."' AND 
							  T0.Reconteo=0 AND 
							  T1.Descripcion LIKE '%".$Busqueda."%'";
							  
			
	
        	}


        	$Codigo='';
         	$LineaIntercalada=0;
          	$Descripcion='';
		 
		    $Resultado=mysql_query($con,$this->con->conect);
			if(mysql_num_rows($Resultado)){
				//se genera la tabla a mostrar
 				echo "<table border='1' >
			    	<tr>
			      	<td ><strong><div  class='Linea1'>Conteo</div></strong></td>
			      	<td><strong><div  class='Linea1'>Descripcion</div></strong></td>
			      	<td><strong><div  class='Linea1'>Barras</div></strong></td>
			    	</tr>";
				  while( $Articulos = mysql_fetch_array($Resultado) ) {	 
		  	
					  	if ( $LineaIntercalada==0){
					  		$LineaIntercalada=1;
								echo"<tr>
						    	<td><div  class='Linea1'>".$Articulos['Conteo']."</div></td>
						      	<td><div id='fila-".$Articulos['Codigo']."' class='Linea' ><a href=\"javascript:AgregaCuenta('".$Articulos['Codigo']."','$Grupo',".$Conteo.",'".$Busqueda."');\">".$Articulos['Descripcion']."</a></div></td>
						      	<td><div  class='Linea1'>".$Articulos['CodBarras']."</div></td>
						    	</tr>";
					  	}else{
					  		 $LineaIntercalada=0;
					  		 	echo"<tr>
						    	<td  class='Linea11'><div  class='Linea1'>".$Articulos['Conteo']."</div></td>
						      	<td  class='Linea11'><div id='fila-".$Articulos['Codigo']."' class='Linea1' ><a href=\"javascript:AgregaCuenta('".$Articulos['Codigo']."','$Grupo',".$Conteo.",'".$Busqueda."');\">".$Articulos['Descripcion']."</a></div></td>
						      	<td  class='Linea11'><div  class='Linea1'>".$Articulos['CodBarras']."</div></td>
						    	</tr>";
					  	}
 			
	               } 
         		echo"</table>";



	          }else { echo "No se encontro nada";}

  		
		}//FIN VERIFICA CONEXION
		return $Retorna;
	}


//obtiene la informacion del articulo seleccionado
	function ObtieneDetLinea($CodArticulo,$Grupo,$Conteo){

		if($this->con->conectar()==true){
			$IdInven=$this->ObtieneIdInventario();
			$con = "SELECT 
					T0.Codigo,
					T0.Descripcion,
					(SELECT Apuntes
	 				FROM `Inv_Conteos` 
	 				where NumConteo=(SELECT Conteo 
	 								 FROM `Inv_ConActivo` 
	 								 WHERE Grupo='".$Grupo."' and Conteo='".$Conteo."' AND IdInventario='".$IdInven."') and 
		   				  					CodArticulo=T0.Codigo and Grupo='".$Grupo."' and IdInventario='".$IdInven."'and  
						  			`Reconteo`=0 ) as Contaron,
					T0.CodBarras ,
					(SELECT Apuntes
	 				FROM `Inv_Conteos` 
	 				where NumConteo=(SELECT Conteo 
	 								 FROM `Inv_ConActivo` 
	 								 WHERE Grupo='".$Grupo."' and Conteo='".$Conteo."' AND IdInventario='".$IdInven."') and 
		   				  					CodArticulo=T0.Codigo and Grupo='".$Grupo."' and IdInventario='".$IdInven."'and  
						  			`Reconteo`=0 ) as Apuntes,
					T0.Stock ,
					T0.Costo 
					FROM Inv_Inventario T0 
					WHERE T0.Codigo='".$CodArticulo."' and T0.Cerrado=0 AND IdInventario='".$IdInven."'   order by T0.Codigo asc";

		    $Resultado=mysql_query($con,$this->con->conect);
			return  $Resultado;




		}

	}
function ExiteConteo($CodArticulo,$Contaron,$Apuntes,$Conteo,$Costo,$Stock,$Grupo,$ConteoActivo)
{
	if($this->con->conectar()==true){

 $IdInventario=$this->ObtieneIdInventario();

	$con = "SELECT count(IdInventario) FROM `Inv_Conteos` WHERE `Grupo`='".$Grupo."' and `NumConteo`='".$ConteoActivo."' and `CodArticulo`='".$CodArticulo."' and `IdInventario`='".$IdInventario."'";
	 $Resultado=mysql_query($con,$this->con->conect);

	if(mysql_num_rows($Resultado)) {
		$row=mysql_fetch_row($Resultado);
		$Retorna=$row[0];
	}else
	$Retorna="0";

			 return $Retorna;
	}
}


function ObtieneIdInventario()
{
	if($this->con->conectar()==true){
		$con ="SELECT IdInventario FROM `Inv_Inventario` WHERE `Cerrado`='0' group by IdInventario ORDER BY IdInventario DESC LIMIT 1";
		$Resultado=mysql_query($con,$this->con->conect);
		if(mysql_num_rows($Resultado)) {
				$row=mysql_fetch_row($Resultado);
				$Retorna=$row[0];
			}else
			$Retorna="0";
			
			 return $Retorna;
	}
}

function ActualizaConteo($CodArticulo,$Contaron,$Apuntes,$Conteo,$Costo,$Stock,$Grupo,$ConteoActivo){
	if($this->con->conectar()==true){
          //lñ   $con ="UPDATE `Conteo` SET `C1`='',`D1`='',`MD1`=''`CF`='',`DF`='',`DFM`='',`Apuntes`='' WHERE `IdInventario`='',`Codigo`='".$CodArticulo."'"";

		$Diferencias=intval($Contaron)-intval($Stock);
		
		if($Diferencias==0)
			$MDiferencias=0;
			else
			$MDiferencias=$Diferencias*floatval($Costo);
		
		$IdInventario=$this->ObtieneIdInventario();

		//Debe verificar que no allan insertado el conteo , si ya fue insertado debe actualizar lo contado
		if($this->ExiteConteo($CodArticulo,$Contaron,$Apuntes,$Conteo,$Costo,$Stock,$Grupo,$ConteoActivo)==1)
			{

	//Existe por lo que solo debe actualizar el conteo activo y el final
				$con = "UPDATE `Inv_Inventario` SET `CF`='".$Contaron."',`DF`='".$Diferencias."',`DFM`='".$MDiferencias."',`Apuntes`='".$Apuntes."',`CodGrupoResponsable`='".$Grupo."'  WHERE `Codigo`='".$CodArticulo."'  and `Cerrado`=0  and `Reconteo`=0 AND `IdInventario`='".$IdInventario."' ";
				
				$Resultado=mysql_query($con,$this->con->conect);

				$con ="UPDATE `Inv_Conteos` SET `Cuenta`='".$Contaron."',`Apuntes`='".$Apuntes."' WHERE `IdInventario`='".$IdInventario."' and `Grupo`='".$Grupo."' and `NumConteo`='".$ConteoActivo."' and `CodArticulo`='".$CodArticulo."' ";
				
				$Resultado=mysql_query($con,$this->con->conect);

			}else{
//no existe debe insertar el conteo
		
				$con ="INSERT INTO `Inv_Conteos`(`IdInventario`, `Grupo`, `NumConteo`, `CodArticulo`, `Cuenta`) VALUES ('".$IdInventario."','".$Grupo."','".$ConteoActivo."','".$CodArticulo."','".$Contaron."')";

				$Resultado=mysql_query($con,$this->con->conect);

				$con = "UPDATE `Inv_Inventario` SET `CF`='".$Contaron."',`DF`='".$Diferencias."',`DFM`='".$MDiferencias."',`Apuntes`='".$Apuntes."' ,`CodGrupoResponsable`='".$Grupo."' WHERE `Codigo`='".$CodArticulo."'  and `Cerrado`=0  and `Reconteo`=0 AND `IdInventario`='".$IdInventario."' ";

				$Resultado=mysql_query($con,$this->con->conect);
			}


			 return $Resultado;
		}else
		     return "No Conecto";
	}

}
 

?>