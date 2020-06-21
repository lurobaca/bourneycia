<?php 
include_once("conexion.class.php");

class Usuarios{
 //constructor	
 	var $con;
 	function Usuarios(){
 		$this->con=new conexion;
 	}
	
	   function CambiaClave($usuario,$contrasenia)
      {
	     try{
			if($this->con->conectar()==true){
		 mysql_query("UPDATE `Cliente_Proveedores` SET `contrasenia`= '". $contrasenia ."',`PrimerLogeo`= '1' WHERE `CardCode`  =  '".$usuario."'");
				  
				  return 0; 
				 }
			} catch(Exception $e){
                return 1;
              }	
	   }
	
	function VerificaPrimerLogeo($usuario)
	{
		
      if($this->con->conectar()==true){
			
		$consulta = "SELECT `PrimerLogeo` FROM `Cliente_Proveedores` WHERE `CardCode` =  '".$usuario."'";
		$result = mysql_query($consulta,$this->con->conect);
      // echo $result;
			//si No devuelve nada con el nombre de usuario , es por que lo existe el usuario digitado
		if(mysql_num_rows($result)){
			
		    	$row=mysql_fetch_row($result);
				//si devuelve 1 es por que ya logueo su primera ver
				if($row[0] == "0")
				return "0";
				else
				return "1";
								  
	      }else  { //usuario no existe
        			  return "0";
		          }
					  
					  
		}else 	echo "NO CONECTO <BR/>";
	}
	
	
		
	function validarUsuario($usuario, $password)
	{
		
      if($this->con->conectar()==true){
			
		$consulta = "SELECT  contrasenia,CardName  FROM  Cliente_Proveedores WHERE  CardCode =  '".$usuario."'";
		$result = mysql_query($consulta,$this->con->conect);
      // echo $result;
			//si No devuelve nada con el nombre de usuario , es por que lo existe el usuario digitado
		if(mysql_num_rows($result)){
			
			//	echo "Entro a verificar clabe ";
				$row=mysql_fetch_row($result);
				
				//echo "contasena :".$row[0];
				// Compara la contraseña dijitada con la que esta en la DB
   				if( strcmp($password,$row[0]) == 0 ) {//iniciar sesion 
				  	    return $row[1];						
					}
				else {//contrasena no valida
				     return "";
				      }
					  
	      }else  { //usuario no existe
        			  return "";
		          }
					  
					  
		}else 	echo "NO CONECTO <BR/>";
	}

	
	
	function Montrar_FechaCorteCubos($Cod_Proveedor){
		try{
          if($this->con->conectar()==true){
			  return   mysql_query("SELECT `Fecha` FROM `Fecha_CUBOS` WHERE `Cod_Proveedor` =  '". $Cod_Proveedor . "'" );
			 	     
		     }
            }
        catch(Exception $e){
                echo $e;
              }
		
	}

    function Precio_SegunCliente($Cod_Cliente){
		try{
          if($this->con->conectar()==true){
			  return   mysql_query("SELECT `ListNum` FROM `Cliente_Proveedores` WHERE `CardCode`  =  '". $Cod_Cliente . "'" );
			  }
            }
        catch(Exception $e){
                echo $e;
              }
		
	}

	 function ComdicionPago_SegunCliente($Cod_Cliente){
		try{
          if($this->con->conectar()==true){
			  return   mysql_query("SELECT `GroupNum` FROM `Cliente_Proveedores` WHERE `CardCode`  =  '". $Cod_Cliente . "'" );
			  }
            }
        catch(Exception $e){
                echo $e;
              }
		
	}
	
    function Informacion($Cod_Cliente){
		try{
          if($this->con->conectar()==true){
			  return   mysql_query("SELECT * FROM `Cliente_Proveedores` WHERE `CardCode`  =  '". $Cod_Cliente . "'" );
			  }
            }
        catch(Exception $e){
                echo $e;
              }
		
	}
	

}
?>